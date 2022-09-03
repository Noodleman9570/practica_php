<?php headerAdmin($data); 
      getModal('Users', 'formModal',$data);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1><i class="fa-solid fa-address-card"></i> <?= $data['page_name'] ?>
              <?php if(Permisos::create()): ?>
                <button class="btn btn-primary" id="newUser" type="button" onclick="openModal('newUser');"><i class="fa-solid fa-plus"></i> Nuevo</button>
              <?php endif; ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= ROOT; ?>/roles"><?= $data['page_tag'] ?></a></li>
        </ul>
      </div>

      <div class="tile">
        <div class="tile-body">
          <!-- <div class="tile-body">Roles de usuario</div>
              <?php dep($data); ?>
          </div> -->
          
          <div class="table-responsive">
            <table id="tblUser" class="display resposive " style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Rol</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Acciones</th>               
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </main>
 
    <?php footerAdmin($data); ?>