
$('#newPacBtn').click(function(){
    event.preventDefault();
    console.log("hola");
    $('#cosultFormIn')
    .animate({opacity: '0.4'})
    .removeClass('col-lg-12')
    .addClass('col-lg-5');  
    $('#cosultFormIn input ,#cosultFormIn select, #cosultFormIn textarea')
    .attr('disabled', true)
    $('.npac-form')
    .removeClass('toggle')
    .addClass('pull-left');
    $('#newPacBtn').hide()
    $('.btn-c')
    .attr("onclick","saveP()")
    .html('Enviar datos de paciente');
    
  })

  $('#formClose').click(function(){
    location.reload();
  })
  pixels = $(document).width();

if(pixels < 500){
    alert("pantalla menor a 500px");
}


  //Listar pacientes
  $(document).ready(function() {
    listarPac();
    listarMed();
});

function listarPac(){
    $.ajax({
        url:`${base_url}/consulta/listarPac`,
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp)
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena +="<option value='"+data[i]["TMPAC_PID"]+"'>Cédula: "+data[i]["TMPAC_CI"]+' &nbsp;&nbsp; Nombre: '+data[i]["TMPAC_NO"]+"&nbsp;&nbsp;"+data[i]["TMPAC_AP"]+"</option>";
                
            }
            $("#pac_select").html(cadena);
        } else {
            cadena +="<option value=''>No se encontraron registros</option>";
            $("#pac_select").html(cadena);
        }
    })
}
function listarMed(){
    $.ajax({
        url:`${base_url}/consulta/listarMed`,
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp)
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena +="<option value='"+data[i]["TMMED_MID"]+"'>Cédula: "+data[i]["TMMED_CI"]+' &nbsp;&nbsp; Nombre: '+data[i]["TMMED_NO"]+"&nbsp;&nbsp;"+data[i]["TMMED_AP"]+"&nbsp;&nbsp; Especialidad: "+data[i]["TMESP_NO"]+"</option>";
                
            }
            $("#med_select").html(cadena);
        } else {
            cadena +="<option value=''>No se encontraron registros</option>";
            $("#med_select").html(cadena);
        }
    })
}

  const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	telefono: /^[01246]{4}-[0-9]{7}$/, // 7 a 14 numeros.
    cedula: /^[0-9]{7,8}$/,
    temp: /^[3][5-9]$/,
    peso: /^[2-9][1-9]$/,
}

const campos = {
	nom: false,
	ced: false,
	correo: false,
	telefono: false,
}



const formulario = document.getElementById('consultForm');
const formulario2 = document.getElementById('formNewPaciente');
const inputs = document.querySelectorAll('#consultForm input');
const inputs2 = document.querySelectorAll('#formNewPaciente input');
const textareas = document.querySelectorAll('#consultForm textarea');

const validarFormulario = (e) => {
	switch (e.target.id) {
		case "temp":
			validarCampo(expresiones.temp, e.target, 'temp');
		break;
        case "peso":
			validarCampo(expresiones.peso, e.target, 'peso');
		break;
        case "cedula":
			validarCampo(expresiones.cedula, e.target, 'cedula');
		break;
		case "apellido":
			validarCampo2(expresiones.nombre, e.target, 'apellido');
		break;
		case "nombre":
			validarCampo2(expresiones.nombre, e.target, 'nombre');
		break;
		case "telefono":
			validarCampo2(expresiones.telefono, e.target, 'telefono');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(campo).classList.remove('is-invalid');
		document.getElementById(campo).classList.add('is-valid');	
		campos[campo] = true;
	} else {
		document.getElementById(campo).classList.add('is-invalid');
		document.getElementById(campo).classList.remove('is-valid');
		campos[campo] = false;
	}
}

const validarCampo2 = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');	
        document.querySelector(`#grupo__${campo} .formulario__validacion-estado`).classList.add('fa-circle-check');
		document.querySelector(`#grupo__${campo} .formulario__validacion-estado`).classList.remove('fa-times-circle');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} .formulario__validacion-estado`).classList.add('fa-circle-xmark');
		document.querySelector(`#grupo__${campo} .formulario__validacion-estado`).classList.remove('fa-check-circle');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

inputs2.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

textareas.forEach((textarea) => {
	textarea.addEventListener('keyup', validarFormulario);
	textarea.addEventListener('blur', validarFormulario);
});


$("#pac_select").on(
    'change',
     function(){
        $('#pac_select')
        .removeClass("togg");
    }
);

//Nuevo registro
async function saveC(e){
    
    formNewPaciente = document.querySelector('#consultForm');
    let datos = new FormData(formNewPaciente);
    console.log("registrando consulta");
    try {
        const url = `${base_url}/consulta/save`;
    
        const respuesta = await fetch(url,{
            method: "POST",
            body: datos,
        });
    
        const result = await respuesta.json();

        if (result.status) {
            console.log(result);
            new Noty({
                type: 'success',
                theme: 'metroui',
                text: `${result.msg}`,
                timeout: 2000,
            }).show();
            formNewPaciente.reset(); 
            setTimeout(function(){
                window.location.href = `${base_url}/consulta`;        
            },2500);       
        } else {
            new Noty({
                type: 'error',
                theme: 'metroui',
                text: `${result.error}`,
                timeout: 2000,
            }).show(); 
        }
  
    } catch (err) {
        console.log(err);
    }
}




async function fetchLastInsert()
{
    $.ajax({
        url:`${base_url}/pacientes/lastInsert`,
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp)
        $('#pac_select')
        .val(data[0]["MAX(TMPAC_PID)"])
        .addClass("togg");
        
    })
}

//SaveAll
async function saveP(e){
    event.preventDefault();
    
    formNewPaciente = document.querySelector('#formNewPaciente');
    let datos = new FormData(formNewPaciente);

    try {
        const url = `${base_url}/pacientes/save`;
    
        const respuesta = await fetch(url,{
            method: "POST",
            body: datos,
        });
    
        const result = await respuesta.json();

        if (result.status) {
            console.log(result);
            new Noty({
                type: 'success',
                theme: 'metroui',
                text: `${result.msg}`,
                timeout: 2000,
            }).show();
            setTimeout(function(){
                $('.npac-form')
                .addClass('toggle')
                $('#cosultFormIn')
                .animate({opacity: '1'})
                .removeClass('col-lg-4')
                .addClass('col-lg-12');  
                $('#cosultFormIn input ,#cosultFormIn select, #cosultFormIn textarea')
                .attr('disabled', false)
                $('.btn-c')
                .attr("onclick","saveC()");
                $('#newPacBtn').show()
                formulario2.reset();
                listarPac();
                fetchLastInsert();
            },2000);       
        } else {
            new Noty({
                type: 'error',
                theme: 'metroui',
                text: `${result.error}`,
                timeout: 2000,
            }).show(); 
        }
  
    } catch (err) {
        console.log(err);
    }
}






//Combo para listar Estado Municipio
function listarEDO(){
    $.ajax({
        url:`${base_url}/Pacientes/listarEDO`,
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp)
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena +="<option value='"+data[i]["TMEDO_CE"]+"'>"+data[i]["TMEDO_NO"]+"</option>";
                
            }
            $("#sel_estado").html(cadena);
            var idedo = $("#sel_estado").val();
            listarMUN(idedo);
        } else {
            cadena +="<option value=''>No se encontraron registros</option>";
            $("#sel_estado").html(cadena);
        }
    })
}

function listarMUN(idedo, mun){
    $.ajax({
        url:`${base_url}/Pacientes/listarMUN`,
        type:'POST',
        data:{
            idedo:idedo
        }
    }).done(function(resp){
        var data = JSON.parse(resp)
        var cadena = "";

        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena +="<option value='"+data[i]["TMMUN_CM"]+"'>"+data[i]["TMMUN_NO"]+"</option>";
                
            }
            $("#sel_municipio").html(cadena);
        } else {
            cadena +="<option value=''>No se encontraron registros</option>";
            $("#sel_municipio").html(cadena);
        }
        if(mun){ $("#sel_municipio").val(mun); }
    })

}


function changeEDO(mun){
       
    var idedo = $("#sel_estado").val();
    listarMUN(idedo, mun);
    
    
}


$(document).ready(function() {
    listarEDO();
});
    $("#sel_estado").change(function(){
    var idedo= $("#sel_estado").val();
    listarMUN(idedo);
})