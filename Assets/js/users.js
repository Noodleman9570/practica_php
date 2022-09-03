const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
	usuario: false,
	nombre: false,
	password: false,
	correo: false,
	telefono: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
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

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
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


document.addEventListener(
"DOMContentLoaded", 
function(){

},
false
);

async function save(){
    event.preventDefault();
    formRegister = document.querySelector('#formulario');
    let datos = new FormData(formRegister);

    try {
        const url = `${base_url}/users/save`;
    
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

function openModal(modal)
    {
        if(modal == 'newUser'){
            $('#newUser').modal('show');
        } else {
            $('#editPaciente').modal('show');
        }
    }

	document.addEventListener("DOMContentLoaded",function(){
		tblPac = new DataTable("#tblUser",{
			aProcessing: true,
			aServerSide: true,
			//Opciones de lenguaje
			language: {
				url: `${base_url}/Assets/app/js/dataTables.spanish.json`
			},
			//Consultar los datos a la api
			ajax:{
				url:`${base_url}/users/all`,
				dataSrc:"",
			},
			//Datos desde el servidor
			columns:[
				{data: `id`},
				{data: `rol`},
				{data: `no`},
				{data: `email`},
				{data: `tf`},
				{
					defaultContent:"<div class='form-group row'><div class='col-md-4'><button type='button' id='editPaciente' class='editarFnt btn btn-warning btn-xs' id='editPaciente' onclick='listarPAI();' ><i class='fa fa-edit'></i></button></div><div class='col-md-8'><button type='button' class='eliminarFnt btn btn-danger btn-xs'><i class='fa fa-remove'></i></button></div></div>"
				},
			],
			//Ocultar columnas
			// columnDefs:[
			//     {
			//         targets:[0],
			//         visible:false,
			//         serchable:false,
			//     }
			// ],
			//Mostrar botones de exportacion
			dom:"lBfrtip",
			buttons:[
				{
					extend:"copyHtml5",    
					text:"<i class='fa fa-copy'><i/>",
					titleAttr:"copiar",
					className: "btn btn-secondary"
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