



<!-- Modal para insertar  -->
<div class="modal fade" id="newVacunaQt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="modal-header" class="modal-header" style="background: #FFD24C;">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar vacunas</h5>
        <button type="button" id="refresh" style=" margin: 0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
            <form action="" class="formulario" id="addVaccine" method="POST">
              <!-- Grupo: cedula -->

              <div class="direction_container">
              <div class="formulario__grupo" id="grupo__vacuna">
                  <label for="cuarto">Vacuna:</label>
                    <select  class="form-control select" name="vacuna" id="sel_vacuna" style="width: 100%;">
                        <option value="41">Sputnik</option>
                        <option value="42">Moderna</option>
                        <option value="44">Jhonson&Jhonson</option>
                    </select>
                </div>

                <div class="formulario__grupo" id="grupo__cantidad">
                  <label for="cantidad">cantidad:</label>
                    <input  name="cantidad" class="form-control input" min="20" max="300" type="number">
                </div>
              </div>

              <div style="margin-top: 20px;" class="formulario__grupo formulario__grupo-btn-enviar">
                <button id="enviar" onclick="addVaccine();" class="formulario__btn col-md-12"><i class="fa-solid fa-download"></i> Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
