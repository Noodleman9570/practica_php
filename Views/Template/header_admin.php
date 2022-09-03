<!DOCTYPE html>
<html lang="<?=SITE_LANG?>">
  <head>
    <meta charset="<?=SITE_CHARSET?>">
    <?= getFavicon(); ?>
    <meta name="description" content="Hospital Virtual Kevin">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Kevin Saavedra">
    <meta name="theme-color" content="#009688">
    <link rel="shortcut icon" htref="<?= IMG ?>/logo.png">
    <title><?= $data['page_title'] ?></title>
    <!-- Main CSS-->
    
    <link rel="stylesheet" type="text/css" href="<?= CSS; ?>/style.css">
    <link rel="stylesheet" type="text/css" href="<?= CSS;?>/css<?=$data['style_css']?>">
    
    <!-- css sytle chartjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font-icon css-->
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= ROOT; ?>/Home"><img class="headerlogo" src="<?=ROOT;?>/Assets/images/headerlogo.png" alt=""></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fa-solid fa-bars"></i></a>
      <!-- Navbar Right Menu-->


      <div class="dropdown app-nav">
        <button class="btn dropdown-toggle app-nav__item" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
         <i class="fa fa-user fa-lg"></i></a>
        </button>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
            <li><a class="dropdown-item" href="<?= ROOT; ?>/settings"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?= ROOT; ?>/perfil"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?= ROOT; ?>/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
        </ul>
      </div>



      
    </header>
    <?php require_once("nav_admin.php"); ?>
