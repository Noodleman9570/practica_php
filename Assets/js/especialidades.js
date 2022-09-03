let tblEsp;

document.addEventListener("DOMContentLoaded",function(){
    tblEsp = new DataTable("#tblEsp",{
        aProcessing: true,
        aServerSide: true,
        //Opciones de lenguaje
        language: {
            url: `${base_url}/Assets/app/js/dataTables.spanish.json`
        },
        //Consultar los datos a la api
        ajax:{
            url:`${base_url}/especialidades/all`,
            dataSrc:"",
        },
        //Datos desde el servidor
        columns:[
            {data: `id`},
            {data: `cod`},
            {data: `nom`},
            {data: `des`},
            {
                defaultContent:"<div><button type='button' class='editarFnt btn btn-warning btn-xs' ><i class='fa fa-edit'></i></button><button type='button' class='eliminarFnt btn btn-danger btn-xs'><i class='fa fa-remove'></i></button></div>"
            },
        ],
        //Ocultar columnas
        columnDefs:[
            {
                targets:[0],
                visible:false,
                serchable:false,
                extend: false
            },
            { responsivePriority: 1, targets:  0},
            { responsivePriority: 2, targets:  4},
        ],
        //Mostrar botones de exportacion
        responsive: "true",
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

//Ocultar el campo id del form
$("#id").hide();

//abrir los modales
function openModal()
    {   
        $('#newEspecialidad').modal('show');     
    }

    let refresh = document.getElementById('refresh');
    refresh.addEventListener('click', _ => {
                formulario.reset();
    })



// validaciones del formulario
const formulario = document.getElementById('formRegister');
const inputs = document.querySelectorAll('#formRegister input');

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	description: /^[a-zA-ZÀ-ÿ\s]{1,255}$/, // 7 a 14 numeros.
    cod: /^[\w\-+$]{7}$/, //de 7 caracteres
}

const campos = {
	nom: false,
	description: false,
    cod: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "description":
			validarCampo(expresiones.description, e.target, 'descripcion');
		break;
        case "cod":
            validarCampo(expresiones.cod, e.target, 'cod');
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');	
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('#enviar', (e) => {
    event.preventDefault();

	if(campos.nombre && campos.password && campos.correo && campos.telefono && terminos.checked ){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});


// guardar registro nuevo

async function save(e){
    event.preventDefault();
    formRegister = document.querySelector('#formRegister');
    let datos = new FormData(formRegister);

    try {
        const url = `${base_url}/Especialidades/save`;
    
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
                window.location.href = `${base_url}/especialidades`;        
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

//Editar

$("#formRegister").on(
    "click",
    "#edit",function(){
        event.preventDefault();
        edit();
    
    }
);



async function edit(e){
    event.preventDefault();
    formRegister = document.querySelector('#formRegister');
    let datos = new FormData(formRegister);

    try {
        const url = `${base_url}/Especialidades/edit`;
    
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
                window.location.href = `${base_url}/especialidades`;        
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



//agregar
$("#buttonAdd").on(
    "click",
    "button.btn",function(){
        openModal();
        $('#modal-header').css('background', '#4FCFC3')
        $(".modal-title").text('Nueva Especialidad');
        $(".id").hide();
        $("#enviar").show();
        document.getElementById("enviar").style.width = '100vh';
        $("#edit").hide();
        $("#delete").hide();
        formulario.reset();
        
    }
    );


//editar
$("#tblEsp tbody").on(
    "click",
    "button.editarFnt",
    async function()
    {
        openModal();
        $('#modal-header').css('background', '#FFD24C')
        $(".modal-title").text('Editar Especialidad');
        $(".id").show();
        $("#enviar").hide();
        document.getElementById("enviar").style.width = '13vh';
        $("#edit").show();
        $("#delete").show();
        let data_tabla = tblEsp.row($(this).parents("tr")).data();
        let id = data_tabla.id;
        let cod = data_tabla.cod;
        let nom = data_tabla.nom;
        let desc = data_tabla.des;

        $(".id").text('Especialidad codigo '+id);
        $("#id").val(id);
        $("#cod").val(cod);
        $("#nombre").val(nom);
        $("#description").val(desc);

    }
);


//Funcion eliminar
$("#formRegister").on(
    "click",
    "#delete",async function(e){
        event.preventDefault();
        delDialog(id);
    }
);

$("#tblEsp tbody").on(
    "click",
    "button.eliminarFnt",
    async function()
    {

        let data_tabla = tblEsp.row($(this).parents("tr")).data();
        let id = data_tabla.id
        delDialog(id);
    }
);

function delDialog(id){
    var n = new Noty({
        text: 'Estas seguro de eliminar este registro?',
        type: "error",
        layout: "center",
        modal: "true",
        buttons: [
          Noty.button('YES', 'btn btn-success', async function () {
              
            const datos = new FormData();

            datos.append('id', id);

            try {
                const url = `${base_url}/Especialidades/delete`;
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
                        timeout: 2000,
                    }).show();
                    setTimeout(function(){
                        window.location.href = `${base_url}/especialidades`;        
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
              n.close();
          })
        ]
      });
      n.show();
}