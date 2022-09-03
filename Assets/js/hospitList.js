function info(){
    window.location.href = `${base_url}/pacientes`;   
}


let tblHPac;

document.addEventListener("DOMContentLoaded",function(){
            setTimeout(()=>{
                $('#overlayHl').hide();
            }, 700);

    tblHPac = new DataTable("#tblHPac",{
        aProcessing: true,
        aServerSide: true,
        //Opciones de lenguaje
        language: {
            url: `${base_url}/Assets/app/js/dataTables.spanish.json`
        },
        //Consultar los datos a la api
        ajax:{
            url:`${base_url}/hospitList/all`,
            dataSrc:"",
        },
        //Datos desde el servidor
        columns:[
            {data: `id`},
            {data: `ced`},
            {data: `ap`},
            {data: `no`},
            {data: `fechaIngreso`},
            {data: `nroCama`},
            {
                defaultContent:"<div class='btn__container'><button type='button' onclick='chequeo' class='chqFtn btn btn-warning btn-xs'><i class='fa-solid fa-list-check'></i> Chequeos</button><button onclick='alta();' type='button' class='altaFtn btn btn-success btn-xs'><i class='fa-solid fa-check'></i> Dar alta</button><button type='button' onclick='info()' class='infoFtn btn btn-info btn-xs'><i class='fa-solid fa-eye'></i> Ver informacion</button></div>"
            },
        ],
        responsive: "true",
        //Ocultar columnas
        columnDefs:[
            {
                targets:[0],
                visible:false,
                serchable:false,
                extend: false

            },
            { responsivePriority: 1, targets:  1},
            { responsivePriority: 2, targets:  6},
        ],
        //Mostrar botones de exportacion
        lengthMenu:[
            [5,10,25,50,-1],
            [5,10,25,50,"All"],
        ],
        iDisplayLength:5,
        order:[[1,"asc"]],
    });

},false);




//Eliminar

$("#formRegister").on(
    "click",
    "#delete",async function(e){
        event.preventDefault();
        delDialog(id);
    }
);

//Funcion eliminar
    async function alta()
    {
        console.log('hola');
        let data_tabla = tblHPac.row($(this).parents("tr")).data();
        let id = data_tabla.id;
        delDialog(id);
    }

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