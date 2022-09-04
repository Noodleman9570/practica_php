<!DOCTYPE html>
<html lang="en" >
<head>
  <?= get_favicon(); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= SITE_DESC; ?>">
  <meta name="author" content="">
  <title><?= SITE_NAME; ?></title>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="<?= PLUGINS; ?>/notify/noty.css">
  <link rel="stylesheet" type="text/css" href="<?= PLUGINS; ?>/notify/noty.css.map">
  <link rel="stylesheet" href="<?= CSS;?>/<?=$data['style_css']?>">

</head>
<style>
  body{
  background-image:url('<?= IMG; ?>/fondo.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  color: rgb(0, 0, 0);

}
</style>
<body>
    <?php 
    // $this->showMessages(); 
    ?>
  <div><br><br><br><br></div>
<!-- partial:index.partial.html -->
<div class="login-box">
    <div class="lb-header">
      <a href="#" class="active" id="login-box-link">Iniciar Sesión</a>
      <a href="#" id="signup-box-link">Registrarse</a>
    </div>
    <div class="social-login">
      <a href="#">
        <i class="fa fa-facebook fa-lg"></i>
    Iniciar con facebook 
      </a>
      <a href="#">
        <i class="fa fa-google-plus fa-lg"></i>
        Iniciar con Google
      </a>
    </div>
    <form id="loginForm" action="" class="email-login" method="POST">
      <div class="u-form-group">
        <input name="email" type="email" placeholder="Email"/>
      </div>
      <div class="u-form-group">
        <input name="password" type="password" placeholder="Password"/>
      </div>
      <div class="u-form-group">
        <button type="submit">Log in</button>
      </div>
      <div class="u-form-group">
        <a href="#" class="forgot-password">Forgot password?</a>
      </div>
      <div class="u-form-group">
        <a href="index.html" class="forgot-password">Exit?</a>
      </div>
    </form>
    <form id="signUpForm" class="email-signup" method="POST">
      <div class="u-form-group">
        <input name="email" type="email" placeholder="usuario"/>
      </div>
      <div class="u-form-group">
        <input name="password" type="password" placeholder="Contraseña"/>
      </div>
      <div class="u-form-group">
        <input name="password_rep" type="password" placeholder="Contraseña"/>
      </div>
      <div class="u-form-group">
        <button type="submit">Registrarse</button>
      </div>
    </form>
  </div>

  <script>
      const base_url = "<?= BASE_URL?>";
  </script>
<!-- partial -->
  <script src="<?= JS; ?>/jquery-3.3.1.min.js"></script>
  <script src="<?= JS; ?>/popper.min.js"></script>

  <!-- The javascript plugin to display page loading on top-->
  <script src="<?= JS; ?>/pace.min.js"></script>
    
  <!-- Noty plugin -->
  <script src="<?= PLUGINS; ?>/notify/noty.min.js"></script>
  <script src="<?= PLUGINS; ?>/notify/noty.min.js.map"></script>

  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="<?= JS; ?>/<?=$data['function_js']?>"></script>

</body>
</html>
