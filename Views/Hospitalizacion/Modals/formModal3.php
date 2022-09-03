

<!-- Modal para insertar  -->
<div class="modal fade" id="aplicarVacuna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="modal-header" class="modal-header" style="background: #FFD24C;">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar vacunas</h5>
        <button type="button" id="refresh" style=" margin: 0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
            <form action="" class="formulario" id="putVaccin" method="POST">
              <!-- Grupo: cedula -->

              <div id="sel__pac" class="form-group">
                      <label for="pac_select" class="formulario__label">Elegir paciente</label>
                      <select name="paciente" class="form-control select" id="pac_select">

                      </select>
                    </div>

              <div class="formulario__grupo" id="grupo__vacuna2">
                  <label for="vacuna2">Vacuna:</label>
                    <select  class="form-control select" name="vacuna2" id="sel_vacuna2" style="width: 100%;">
                        <option value="41">Sputnik</option>
                        <option value="42">Moderna</option>
                        <option value="44">Jhonson&Jhonson</option>
                    </select>
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
