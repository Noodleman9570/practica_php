<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="<?= BASE_URL ?>/Views/Dashboard/style.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>
<body>
<!-- partial:index.partial.html -->
  <header class="header">
   <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" alt="Netflix" class="headerLogo"/>
  </header>

  <main>
    <section class="thumbSection">
        <h2 class="thumbTitle">Popular Now</h2>
        <div class="thumbTiles swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABUqwomVyMFsby9zeXLLnkfv744mKCzQDWL7rUDhbwg89bpT-V7qYoW-NNfjFaG3nFcDWu-U49vpUFB_L4njc2GFl6l60Efb4oT-_0e3oi3Dh8nwyLZhG2ciBHGUnRMB_J-D2jQk2Qz_WM4n8A_8b8ZqFDpj80B6KJ9T2bXR7rYcl0M8MaDCsR68.jpg?r=93f"
                            alt="The Queen's Gambit">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABSEl8LWx4tMJIM9Atm3F1Y49Uq6X01tnDe8gPA6d84-gQ767saz9z7Jxj9sFozuI8bcM2vlxeP9IPq3Aa7jxLlkMu8JGjizRLblNEcmD7g-Z2NeZvkvV5nWF9DmJ.jpg?r=393"
                            alt="Dark">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABRItzLGWEqRojd0SS5lkLN56bRwYGctgeybCwPWq-zs_UwEXKX_4CsXsMlWupAdBB5D7KDN-8RzuCvqzTf5Bvo_HQmI.webp?r=3ad"
                            alt="Suits">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABUjsKDiaKwLmrV662pwmVKEtRmbJI-s8M9ojCqr2QEdnPUJPX86RP-n9IGXxGcaHWkTf-cwz5e4kBLN3jYLM7HuBfYA.webp?r=01d"
                            alt="Breaking Bad">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABdPrypf33QcVWc0DHxX7rDoTSbX7EgHSJd_VDlwIr81A40ua4l2F_esQS1u4zB9SkN5TAGO1Bw0SmoEqTICKfx9vbRu-qdKh9KGWuRLasXOrCIUpEYnMffVoebRS.jpg?r=d3b"
                            alt="The Crown">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABRItzLGWEqRojd0SS5lkLN56bRwYGctgeybCwPWq-zs_UwEXKX_4CsXsMlWupAdBB5D7KDN-8RzuCvqzTf5Bvo_HQmI.webp?r=3ad"
                            alt="Suits">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABUjsKDiaKwLmrV662pwmVKEtRmbJI-s8M9ojCqr2QEdnPUJPX86RP-n9IGXxGcaHWkTf-cwz5e4kBLN3jYLM7HuBfYA.webp?r=01d"
                            alt="Breaking Bad">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABdPrypf33QcVWc0DHxX7rDoTSbX7EgHSJd_VDlwIr81A40ua4l2F_esQS1u4zB9SkN5TAGO1Bw0SmoEqTICKfx9vbRu-qdKh9KGWuRLasXOrCIUpEYnMffVoebRS.jpg?r=d3b"
                            alt="The Crown">
                    </a>
                </div><div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABRItzLGWEqRojd0SS5lkLN56bRwYGctgeybCwPWq-zs_UwEXKX_4CsXsMlWupAdBB5D7KDN-8RzuCvqzTf5Bvo_HQmI.webp?r=3ad"
                            alt="Suits">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABUjsKDiaKwLmrV662pwmVKEtRmbJI-s8M9ojCqr2QEdnPUJPX86RP-n9IGXxGcaHWkTf-cwz5e4kBLN3jYLM7HuBfYA.webp?r=01d"
                            alt="Breaking Bad">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="thumbTile" href="#">
                        <img class="thumbTile__image"
                            src="https://occ-0-1433-1432.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABdPrypf33QcVWc0DHxX7rDoTSbX7EgHSJd_VDlwIr81A40ua4l2F_esQS1u4zB9SkN5TAGO1Bw0SmoEqTICKfx9vbRu-qdKh9KGWuRLasXOrCIUpEYnMffVoebRS.jpg?r=d3b"
                            alt="The Crown">
                    </a>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>
  </main>
<!-- partial -->
<script src="<?= BASE_URL; ?>/Views/Dashboard/script.js"></script>
  
</body>
</html>
