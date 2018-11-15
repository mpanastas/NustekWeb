<?php    
require 'api/db_config.php';
session_start();
$error = "";

if(isset($_SESSION['login_user_mail'])){
  header("location:projects.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];
  $sql = "SELECT id, nombre, correo, hashed_password FROM admins where correo = '$correo' Order by id desc LIMIT 1"; 
  $result = $mysqli->query($sql);
  $res = mysqli_fetch_array($result);
  if(password_verify($contrasena,$res['hashed_password']))
  {
      $_SESSION['login_user_mail'] = $res['correo'];
      $_SESSION['login_user'] = $res['nombre'];
      header('location: projects.php');  
  }  else{
      $error ="Correo o contraseña inválidos";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap-reboot.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">

  <title>Log In Nustek</title>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.html#page-top"> <img class="logo_small" src="img/N_logo.png"
          alt="nustek"> </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html#about">Quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html#projects">Proyectos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html#signup">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Iniciar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <div class="container d-flex h-100 align-items-center">
          <div class="mx-auto text-center">
            <form class="login" action="" method="post">
              <h2>Iniciar Sesión</h2>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo Electronico</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                  placeholder="Enter email"> </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div>
              <span><?php echo $error; ?></span>
              </div>
              <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>


</body>

</html>