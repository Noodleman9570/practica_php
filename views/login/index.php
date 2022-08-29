<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LOGIN CINEMAWEB</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="../../public/css/stylelogin.css">

</head>
<body>
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
    <form class="email-login">
      <div class="u-form-group">
        <input type="email" placeholder="ejemplo@gmail.com"/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Contraseña"/>
      </div>
      <div class="u-form-group">
        <button>Entrar</button>
      </div>
      <div class="u-form-group">
        <a href="#" class="forgot-password"> Olvido Contraseña?</a>
      </div>
      <div class="u-form-group">
        <a href="index.html" class="forgot-password">Salir</a>
      </div>
    </form>
    <form class="email-signup">
      <div class="u-form-group">
        <input type="email" placeholder="Correo"/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Contraseña"/>
      </div>
      <div class="u-form-group">
        <input type="password" placeholder="Confirmar Contraseña"/>
      </div>
      <div class="u-form-group">
        <button>Registrarse</button>
      </div>
    </form>
  </div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="../../public/js/scriptlogin.js"></script>

</body>
</html>
