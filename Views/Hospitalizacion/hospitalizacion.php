<?php headerAdmin($data); 
      getModal('Hospitalizacion', 'formModal',$data);
      getModal('Hospitalizacion', 'formModal2',$data);
      getModal('Hospitalizacion', 'formModal3',$data);
?>
    <main class="app-content">

      <div class="tile">
            <div class="tile-title-w-btn tile-title">
              <h3 class="title">Hospitalizacion por COVID-19</h3>
            </div>
     </div>

      <div class="row">
        <div class="col-md-6">
          <div id="tile1" class="tile tile1">
          <div id="overlay1" class="overlay">
              <div class="m-loader mr-4">
                <svg class="m-circular" viewBox="25 25 50 50">
                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
                </svg>
              </div>
              <h3 class="l-text">Cargando...</h3>
            </div>
               <div class="tile-title-w-btn thead">
                  <h3 class="title">    Ingresar paciente</h3>
                  <i class="fa fa-plus icons"></i>
                </div>
            <div class="embed-responsive body">
              

                  <img class="img img1" style="height: 430px;" src="<?=IMG?>/ingresarpaciente.webp" alt="">


            </div>
            <div class="subtxt">
                <h5>Seccion para hospitalizar pacientes, luego de que dieran positivo para COVID-19</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div id="tile2" class="tile tile2">
            <div id="overlay2" class="overlay" style="z-index: 5;" >
                <div class="m-loader mr-4">
                  <svg class="m-circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
                  </svg>
                </div>
                <h3 class="l-text">Cargando...</h3>
              </div>
              <div class="tile-title-w-btn thead">
                  <h3 class="title">Buscar Paciente</h3>
                  <i class="fa-solid fa-magnifying-glass icons"></i>
                </div>
            <div class="embed-responsive body">
              

                  <img class="img img2" style="height: 430px;" src="<?=IMG?>/buscarpaciente.png" alt="">

            </div>

            <div class="subtxt">
                <h5>Seccion para agregar pacientes a hospitalizacion, luego de que dieran positivo para COVID-19</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="tile">
            <div class="tile-title-w-btn tile-title">
              <h3 class="title">Area de vacunas COVID-19</h3>
            </div>
     </div>
      <div class="row">
        <div class="col-md-6">
          <div id="tile3" class="tile tile3">
          <div id="overlay3" class="overlay">
              <div class="m-loader mr-4">
                <svg class="m-circular" viewBox="25 25 50 50">
                	<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
                </svg>
              </div>
              <h3 class="l-text">Cargando...</h3>
            </div>
               <div class="tile-title-w-btn thead">
                  <h3 class="title">    Aplicar vacuna</h3>
                  <i class="fa fa-plus icons"></i>
                </div>
            <div class="embed-responsive body">
              

                  <img class="img img3" style="height: 430px;" src="<?=IMG?>/vacuna.svg" alt="">


            </div>
            <div class="subtxt">
                <h5>Seccion para hospitalizar pacientes, luego de que dieran positivo para COVID-19</h5>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div id="tile4" class="tile tile4">
            <div id="overlay4" class="overlay" style="z-index: 5;" >
                <div class="m-loader mr-4">
                  <svg class="m-circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
                  </svg>
                </div>
                <h3 class="l-text">Cargando...</h3>
              </div>
              <div class="tile-title-w-btn thead">
                  <h3 class="title">  Agregar vacunas al inventario</h3>
                  <i class="fa-solid fa-magnifying-glass icons"></i>
                </div>
            <div class="embed-responsive body">
              

                  <img class="img img4" style="height: 430px;" src="<?=IMG?>/dosisAplicadas.png" alt="">

            </div>

            <div class="subtxt">
                <h5>Seccion para agregar pacientes a hospitalizacion, luego de que dieran positivo para COVID-19</h5>
            </div>
          </div>
        </div>
      </div>
      
      

    </main>
    <?php footerAdmin($data); ?>