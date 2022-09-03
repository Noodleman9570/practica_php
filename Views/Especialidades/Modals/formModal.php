



<!-- Modal para insertar  -->
<div class="modal fade" id="newEspecialidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="modal-header" class="modal-header" style="background: #FFD24C;">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Paciente</h5>
        <button type="button" id="refresh" style=" margin: 0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
            <form action="" class="formulario" id="formRegister" method="POST">
              <h5 class="id">Nro. </h5>
              <!-- Grupo: nombre -->
              <input type="text" class="formulario__input" name="id" id="id">

              <div class="formulario__grupo" id="grupo__cod">
                <label for="nombre" class="formulario__label">Código</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="cod" id="cod" placeholder="HRR-MG1">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>
              
              <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre</label>
                <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Especializacion">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>
              
                   <!-- Grupo: descripcion -->
              <div class="formulario__grupo" id="grupo__descripcion">
                <label for="description" class="formulario__label">Descripcion</label>
                <div class="formulario__grupo-input">
                  <textarea title="Breve descripcion" class="formulario__input" cols="20" rows="3" maxlength="255" name="description" id="description"></textarea>
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
              </div>

              <div style="margin-top: 20px;" class="formulario__grupo formulario__grupo-btn-enviar">
                <button id="enviar" onclick="save();" class="formulario__btn"><i class="fa-solid fa-download"></i> Enviar</button>
                <button id="edit" class="formulario__btn formulario_btn--edit"><i class="fa-solid fa-user-pen"></i> Editar</button>
                <button id="delete" class="formulario__btn formulario_btn--delete"><i class="fa-solid fa-ban"></i> Eliminar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
