
//abrir los modales
function openModal()
    {   
        $('#newHospitalizacion').modal('show');     
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

    $('#overlay1').hide();
    $('#overlay2').hide();

    $("#tile1").on(
        "click",
        function(){
            $('#overlay1').show();
            setTimeout(()=>{
                openModal();
                console.log("1 Segundo esperado")
            }, 700);
            setTimeout(()=>{
                $('#overlay1').hide();
                console.log("1 Segundo esperado")
            },700);
            
        }
        
        );
        $("#tile2").on(
            "click",
            function(){
                event.preventDefault();
                $('#overlay2').show();
                setTimeout(()=>{
                    window.location.href = base_url+"/medicos";
                    console.log("1 Segundo esperado")
                }, 1000);
            }
            );
    
        function listarCTO(){
                $.ajax({
                    url:`${base_url}/hospitalizacion/listarCTO`,
                    type:'POST'
                }).done(function(resp){
                    var data = JSON.parse(resp)
                    var cadena = "";
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            cadena +="<option value='"+data[i]["TMCTO_NC"]+"'>Cuarto #"+data[i]["TMCTO_NC"]+"</option>";
                            
                        }
                        $("#sel_cuarto").html(cadena);
                        var idedo = $("#sel_cuarto").val();
                        listarCAM(idedo);
                    } else {
                        cadena +="<option value=''>No se encontraron registros</option>";
                        $("#sel_cuarto").html(cadena);
                    }
                })
             }
            
            function listarCAM(idedo, mun){
                $.ajax({
                    url:`${base_url}/hospitalizacion/listarCAM`,
                    type:'POST',
                    data:{
                        idedo:idedo
                    }
                }).done(function(resp){
                    var data = JSON.parse(resp)
                    var cadena = "";
            
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            cadena +="<option value='"+data[i]["TMCAM_NC"]+"'>Cama #"+data[i]["TMCAM_NC"]+"</option>";
                            
                        }
                        $("#sel_cama").html(cadena);
                    } else {
                        cadena +="<option value=''>No se encontraron registros</option>";
                        $("#sel_cama").html(cadena);
                    }
                    if(mun){ $("#sel_cama").val(mun); }
                })
            
            }
            
            
            function changeCTO(mun){
                   
                var idedo = $("#sel_cuarto").val();
                listarCAM(idedo, mun);
                
                
            }
            
            
            $(document).ready(function() {
                listarCTO();
            });
                $("#sel_cuarto").change(function(){
                var idedo= $("#sel_cuarto").val();
                listarMUN(idedo);
            })
            

            //Nuevo registro
async function save(e){
    event.preventDefault();
    formRegister = document.querySelector('#formHospit');
    let datos = new FormData(formRegister);

    try {
        const url = `${base_url}/hospitalizacion/save`;
    
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
            