



<!-- Modal para insertar  -->
<div class="modal fade" id="newHospitalizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="modal-header" class="modal-header" style="background: #FFD24C;">
        <h5 class="modal-title" id="exampleModalLongTitle">Hospitalizar paciente</h5>
        <button type="button" id="refresh" style=" margin: 0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
            <form action="" class="formulario" id="formHospit" method="POST">
              <!-- Grupo: cedula -->

              <div class="formulario__grupo" id="grupo__hospitCedula">
                <label for="hospitCedula" class="formulario__label">Cédula</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="hospitCedula" id="hospitCedula" placeholder="27369521">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>
              <h7 class="formulario__label" id="exampleModalLongTitle">Ubicar paciente</h7>
              <div class="direction_container">

                <div class="formulario__grupo" id="grupo__cuarto">
                  <label for="cuarto">Cuarto:</label>
                    <select onchange="changeCTO();" class="form-control select" name="cuarto" id="sel_cuarto" style="width: 100%;">
                      
                    </select>
                </div>

                <div class="formulario__grupo" id="grupo__cama">
                  <label for="cama">Cama:</label>
                    <select class="form-control select" name="cama" id="sel_cama" style="width: 100%;">
                      
                    </select>
                </div>
              </div>

              <div style="margin-top: 20px;" class="formulario__grupo formulario__grupo-btn-enviar">
                <button id="enviar" onclick="save();" class="formulario__btn col-md-12"><i class="fa-solid fa-download"></i> Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
