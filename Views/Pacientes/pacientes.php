<?php headerAdmin($data); 
      getModal('Pacientes', 'formModal', $data);
?>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= ROOT; ?>/dashboard"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>

      <div class="tile">
        <div id="buttonAdd" class="tile-title-w-btn">
          <h3 class="title">Pacientes</h3>
          <button class="btn btn-primary" id="newPaciente" type="button"><i class="fa-solid fa-plus"></i> Agregar</button>
        </div>
        <div class="tile-body">
        <?php echo Alertas::mostrarAlerta(); ?>
        <div class="table-responsive">
          <table id="tblPac" class="display resposive" style="width:100%">
          <div id="overlayP" class="overlay" style="z-index: 5;" >
              <div class="m-loader mr-4">
                <svg class="m-circular" viewBox="25 25 50 50">
                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
                </svg>
              </div>
              <h3 class="l-text">Cargando...</h3>
            </div>
            <thead>
              <tr>
                <th>Id</th>
                <th>Cedúla</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Codigo Estado</th>
                <th>Codigo Municipio</th>
                <th>Municipio</th>
                <th>Dirección</th>
                <th>Fecha de nacimiento</th>
                <th>Número telefónico</th>
                <th>Acciones</th>               
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>

    </main>
    

    <?php footerAdmin($data); ?>