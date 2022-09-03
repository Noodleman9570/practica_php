<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #359990;">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Rol</h5>
        <button type="button" id="refresh" style=" margin: 0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="tile-body">
            <form id="formRol" name="formRol">
            <div class="form-group">
                <label class="control-label">Nombre</label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del rol" required="">
            </div>
            <!-- <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control" id="txtEmail" name="txtEmail" type="email" placeholder="Enter email address" required="">
            </div> -->
            <div class="form-group">
                <label class="control-label">Descripcion</label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del rol" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" id="listStatus" name="listStatus" required="">
                    <option value="1">Secretaria</option>
                    <option value="2">Usuarioy</option>
                </select>
            </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
