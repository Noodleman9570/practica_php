<?php headerAdmin($data); 
      getModal('Especialidades', 'formModal', $data);
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
          <h3 class="title">Especialidades</h3>
          <button class="btn btn-primary" type="button"><i class="fa-solid fa-plus"></i> Agregar</button>
        </div>
      <div class="tile-body">
      <?php echo Alertas::mostrarAlerta(); ?>
        <div class="table-responsive">
          <table id="tblEsp" class="display resposive" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripcion</th>
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