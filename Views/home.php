<?php headerAdmin($data); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
    
        <div class="jumbotron">
          <h1 class="display-4">Hospital Rafael Rangel</h1>
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            
            <div class="carousel-inner" >
              <div class="carousel-item active">
                <img src="<?=HOME_IMG?>/entrance.jpeg"  class="d-block w-100" alt="camilla">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?=HOME_IMG?>/camilla2.jpg" class="d-block w-100" alt="camilla">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?=HOME_IMG?>/uci.jpg" class="d-block w-100" alt="emergencias">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>

    </main>
    <?php footerAdmin($data); ?>