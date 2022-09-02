<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LOGIN CINEMAWEB</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="<?= URL; ?>/public/css/stylelogin.css">

</head>
<style>
  body{
  background-image:url('<?= URL; ?>/public/img/fonfo.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  color: rgb(0, 0, 0);

}
</style>
<body>
    <?php $this->showMessages(); ?>
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
    <form action="<?= constant('URL'); ?>login/authenticate" class="email-login" method="POST">
      <div class="u-form-group">
        <input name="username" type="text" placeholder="Email"/>
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
    <form action="signup/newUser" class="email-signup" method="POST">
      <div class="u-form-group">
        <input name="username" type="text" placeholder="usuario"/>
      </div>
      <div class="u-form-group">
        <input name="password" type="password" placeholder="Contraseña"/>
      </div>
      <div class="u-form-group">
        <button type="submit">Registrarse</button>
      </div>
    </form>
  </div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="<?= URL; ?>/public/js/scriptlogin.js"></script>

</body>
</html>
