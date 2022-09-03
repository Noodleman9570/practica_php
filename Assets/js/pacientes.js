const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	telefono: /^[01246]{4}-[0-9]{7}$/, // 7 a 14 numeros.
    cedula: /^[0-9]{7,8}$/,
}

const campos = {
	nom: false,
	ced: false,
	correo: false,
	telefono: false,
}
const formulario = document.getElementById('formRegister');
const inputs = document.querySelectorAll('#formRegister input');

const validarFormulario = (e) => {
	switch (e.target.id) {
		case "ced":
			validarCampo(expresiones.cedula, e.target, 'ced');
		break;
		case "ap":
			validarCampo(expresiones.nombre, e.target, 'ap');
		break;
		case "nom":
			validarCampo(expresiones.nombre, e.target, 'nom');;
		break;
		case "tf":
			validarCampo(expresiones.telefono, e.target, 'tf');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
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



//Renrizado de la tabla de Pacientes
let refresh = document.getElementById('refresh');
refresh.addEventListener('click', _ => {
            formulario.reset();
})

$("#id").hide();

function openModal()
    {   
        $('#newPaciente').modal('show');     
    }

let tblPac;

document.addEventListener("DOMContentLoaded",function(){
            setTimeout(()=>{
                $('#overlayP').hide();
            }, 700);

    tblPac = new DataTable("#tblPac",{
        aProcessing: true,
        aServerSide: true,
        //Opciones de lenguaje
        language: {
            url: `${base_url}/Assets/app/js/dataTables.spanish.json`
        },
        //Consultar los datos a la api
        ajax:{
            url:`${base_url}/pacientes/all`,
            dataSrc:"",
        },
        //Datos desde el servidor
        columns:[
            {data: `id`},
            {data: `ced`},
            {data: `ap`},
            {data: `no`},
            {data: `sx`},
            {data: 'cedo'},
            {data: 'cmun'},
            {data: 'mnom'},
            {data: `dir`},
            {data: `fn`},
            {data: `tf`},
            {
                defaultContent:"<div><button type='button' class='editarFnt btn btn-warning btn-xs'><i class='fa-regular fa-address-book'></i></button><button type='button' class='eliminarFnt btn btn-danger btn-xs'><i class='fa fa-remove'></i></button></div>"
            },
        ],
        responsive: "true",
        //Ocultar columnas
        columnDefs:[
            {
                targets:[0,5,6],
                visible:false,
                serchable:false,
                extend: false

            },
            { responsivePriority: 1, targets:  0},
            { responsivePriority: 2, targets:  11},
        ],
        //Mostrar botones de exportacion
        dom:"lBfrtip",
        buttons:[
            {
                extend:"print",    
                text:"<i class='fa fa-print'><i/>",
                titleAttr:"Imprimir",
                className: "btn btn-info"
            },
            {
                extend:"excelHtml5",
                text:"<i class='fa fa-file-excel-o'><i/>",
                titleAttr:"Exportar a Excel",
                className: "btn btn-success"
            },
            {
                extend:"pdfHtml5",
                text:"<i class='fa fa-file-pdf-o'><i/>",
                orientation: 'landscape',
                titleAttr:"Exportar a PDF",
                className: "btn btn-danger"
            },
        ],
        lengthMenu:[
            [5,10,25,50,-1],
            [5,10,25,50,"All"],
        ],
        iDisplayLength:5,
        order:[[1,"asc"]],
    });

},false);



//Nuevo registro
async function save(e){
    event.preventDefault();
    formRegister = document.querySelector('#formRegister');
    let datos = new FormData(formRegister);

    try {
        const url = `${base_url}/Pacientes/save`;
    
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
            formRegister.reset(); 
            setTimeout(function(){
                window.location.href = `${base_url}/pacientes`;        
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


async function edit(e){
    event.preventDefault();
    formRegister = document.querySelector('#formRegister');
    let datos = new FormData(formRegister);

    try {
        const url = `${base_url}/Pacientes/edit`;
    
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
            formRegister.reset();
            setTimeout(function(){
                window.location.href = `${base_url}/pacientes`;        
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

$("#formRegister").on(
    "click",
    "#edit",function(){
        event.preventDefault();
        edit();
    
    }
);

//agregar
$("#buttonAdd").on(
    "click",
    "button.btn",function(){
        openModal();
        $('#modal-header').css('background', '#4FCFC3')
        $(".modal-title").text('Nuevo paciente');
        $(".id").hide();
        $("#enviar").show();
        document.getElementById("enviar").style.width = '100vh';
        $("#edit").hide();
        $("#delete").hide();
        formulario.reset();
        listarEDO();
        
    }
    );


//editar
$("#tblPac tbody").on(
    "click",
    "button.editarFnt",
    async function()
    {
        openModal();
        $('#modal-header').css('background', '#FFD24C')
        $(".modal-title").text('Editar Paciente');
        $(".id").show();
        $("#enviar").hide();
        document.getElementById("enviar").style.width = '13vh';
        $("#edit").show();
        $("#delete").show();
        let la = tblPac.row($(this).parents("tr")).data();
        var id = data_tabla.id
        let ced = data_tabla.ced;
        let ap = data_tabla.ap;
        let nom = data_tabla.no;
        let sx = data_tabla.sx;
        let edo = data_tabla.cedo;
        let mun = data_tabla.cmun;
        let dir = data_tabla.dir;
        let fn = data_tabla.fn;
        let tf = data_tabla.tf

        $(".id").text('Paciente Nro '+id);
        $("#id").val(id);
        $("#ced").val(ced);
        $("#ap").val(ap);
        $("#nom").val(nom);
        $("#sx").val(sx); 
        $("#sel_edo").val(edo);
        changeEDO(mun);
        $("#dir").val(dir);
        $("#fn").val(fn);
        $("#tf").val(tf);

    }
);

//Eliminar

$("#formRegister").on(
    "click",
    "#delete",async function(e){
        event.preventDefault();
        delDialog(id);
    }
);

//Funcion eliminar
$("#tblPac tbody").on(
    "click",
    "button.eliminarFnt",
    async function()
    {
        let data_tabla = tblPac.row($(this).parents("tr")).data();
        let id = data_tabla.id;
        delDialog(id);
    }
);

function delDialog(id){
    var n = new Noty({
        text: 'Estas seguro de eliminar a este paciente?',
        type: "error",
        layout: "center",
        modal: "true",
        buttons: [
          Noty.button('YES', 'btn btn-success', async function () {
              
            const datos = new FormData();

            datos.append('id', id);

            try {
                const url = `${base_url}/pacientes/delete`;
                const respuesta = await fetch(url, {
                    method: 'POST',
                    body: datos,
                })
                const resultado = await respuesta.json();

                if(resultado) {
                    new Noty({
                        text: `${resultado.msg}`,
                        type: "success",
                        layout: "topRight",
                        theme: "metroui",
                        timeout: 1500,
                    }).show();
                    setTimeout(function(){
                        window.location.href = `${base_url}/pacientes`;        
                    },2500);  
                }
            } catch (error) {
                console.log(error);
                new Noty({
                    text: `Hubo un problema al eliminar este registro`,
                    type: "warning",
                    layout: "topRight",
                    theme: "metroui",
                    timeout: 2000,
                }).show();
            }

            n.close();
          }, {id: 'button1', 'data-status': 'ok'}),
      
          Noty.button('NO', 'btn btn-error', function () {
              console.log('button 2 clicked');
              n.close();
          })
        ]
      });
      n.show();
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
            $("#sel_edo").html(cadena);
            var idedo = $("#sel_edo").val();
            listarMUN(idedo);
        } else {
            cadena +="<option value=''>No se encontraron registros</option>";
            $("#sel_edo").html(cadena);
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
            $("#sel_mun").html(cadena);
        } else {
            cadena +="<option value=''>No se encontraron registros</option>";
            $("#sel_mun").html(cadena);
        }
        if(mun){ $("#sel_mun").val(mun); }
    })

}


function changeEDO(mun){
       
    var idedo = $("#sel_edo").val();
    listarMUN(idedo, mun);
    
    
}


$(document).ready(function() {
    listarEDO();
});
    $("#sel_edo").change(function(){
    var idedo= $("#sel_edo").val();
    listarMUN(idedo);
})

