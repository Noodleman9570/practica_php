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

 

<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="<?= URL; ?>/public/js/scriptlogin.js"></script>

</body>
</html>
