<!-- Modal -->
<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" id="newUser" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #359990;">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
        <button type="button" style=" margin: 0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
        <form action="" class="formulario" id="formulario" method="POST">
          <!-- Grupo: Nombre -->
          <div class="formulario__grupo" id="grupo__nombre">
            <label for="nombre" class="formulario__label">Nombre</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
          </div>

          <!-- Grupo: Correo Electronico -->
          <div class="formulario__grupo" id="grupo__correo">
            <label for="correo" class="formulario__label">Correo Electrónico</label>
            <div class="formulario__grupo-input">
              <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
          </div>

          <!-- Grupo: Contraseña -->
          <div class="formulario__grupo" id="grupo__password">
            <label for="password" class="formulario__label">Contraseña</label>
            <div class="formulario__grupo-input">
              <input type="password" class="formulario__input" name="password" id="password">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
          </div>

          <!-- Grupo: Contraseña 2 -->
          <div class="formulario__grupo" id="grupo__password2">
            <label for="password2" class="formulario__label">Repetir Contraseña</label>
            <div class="formulario__grupo-input">
              <input type="password" class="formulario__input" name="password2" id="password2">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
          </div>

          <!-- Grupo: Teléfono -->
          <div class="formulario__grupo" id="grupo__telefono">
            <label for="telefono" class="formulario__label">Teléfono</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567">
              <i class="formulario__validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
          </div>

          <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
          </div>
            <div class="form-group">
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" id="rol" name="rol" required="">
                    <option value="1">Secretari@</option>
                    <option value="2">Usuari@</option>
                </select>
            </div>
            <div class="formulario__grupo formulario__grupo-btn-enviar">
              <button onclick="save();" type="submit" class="formulario__btn">Enviar</button>
              <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

