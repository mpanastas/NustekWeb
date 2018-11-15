<?php
require 'api/db_config.php';
require 'api/session.php';
$result = true;
$sql = "SELECT * FROM proyectos"; 
$result = $mysqli->query($sql);

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $post = $_POST;
  $sql = "INSERT INTO proyectos (titulo,fecha_inicio, fecha_termino, comentarios, contacto, correo_contacto, telefono_contacto) 
	VALUES ('".$post['titulo']."','".$post['inicio']."','".$post['termino']."','".$post['comentarios']."','".$post['contacto']."','".$post['correo']."','".$post['telefono']."')";
  $result = $mysqli->query($sql);
  if ($result){
    header("Refresh:0");
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

  <title>Proyectos | Nustek</title>
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
            <a class="nav-link js-scroll-trigger" href="api/logout.php">Cerrar sesión</a>
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
            <div class="container">
              <div class="row">
                <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                    <h3 class="table">Hola <?php echo $user_check ?>, estas viendo: Proyectos</h3>
                  </div>
                  <div class="pull-right">
                    <button id="proyecto" type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                      Nuevo Proyecto
                    </button>
                  </div>
                </div>
              </div>


              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha de Termino</th>
                    <th width="200px">Comentarios</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                  </tr>
                </thead>
                <tbody>
                <?php
               while ($row = mysqli_fetch_array($result)) {
                   echo "<tr>";
                   echo "<td>".$row['titulo']."</td>";
                   echo "<td>".$row['fecha_inicio']."</td>";
                   echo "<td>".$row['fecha_termino']."</td>";
                   echo "<td>".$row['comentarios']."</td>";
                   echo "<td>".$row['contacto']."</td>";
                   echo "<td>".$row['correo_contacto']."</td>";
                   echo "<td>".$row['telefono_contacto']."</td>";
                   echo "</tr>";
               }

            ?>
                </tbody>
                <tbody>
                </tbody>
              </table>


              <ul id="pagination" class="pagination-sm"></ul>


              <!-- Create Item Modal -->
              <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                    </div>


                    <div class="modal-body">
                      <form data-toggle="validator" action="" method="POST">
                        <h4 class="modal-title" id="myModalLabel">Crear Proyecto</h4>

                        <div class="form-group">
                          <label class="control-label" for="titulo">Nombre:</label>
                          <input type="text" name="titulo" class="form-control" data-error="Please enter title."
                            required />
                          <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                          <label class="control-label" for="inicio">Fecha Inicio:</label>
                          <input type="date" name="inicio" class="form-control" data-error="Please enter title."
                            required />
                          <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                          <label class="control-label" for="termino">Fecha de Termino:</label>
                          <input type="date" name="termino" class="form-control" data-error="Please enter title."
                            required />
                          <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                          <label class="control-label" for="comentarios">Comentarios:</label>
                          <textarea name="comentarios" class="form-control" data-error="Please enter description."
                            required></textarea>
                          <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                          <label class="control-label" for="contacto">Nombre de contacto:</label>
                          <input type="text" name="contacto" class="form-control" data-error="Please enter title."
                            required />
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="correo">Correo de contacto:</label>
                          <input type="text" name="correo" class="form-control" data-error="Please enter title."
                            required />
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="telefono">Teléfono de contacto:</label>
                          <input type="text" name="telefono" class="form-control" data-error="Please enter title."
                            required />
                          <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                          <button type="submit" class="btn crud-submit btn-success">Crear</button>
                        </div>

                      </form>

                    </div>
                  </div>

                </div>
              </div>


              <!-- Edit Item Modal -->
              <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                    </div>


                    <div class="modal-body">
                      <form data-toggle="validator" action="api/update.php" method="put">
                        <input type="hidden" name="id" class="edit-id">


                        <div class="form-group">
                          <label class="control-label" for="title">Nombre:</label>
                          <input type="text" name="title" class="form-control" data-error="Please enter title."
                            required />
                          <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                          <label class="control-label" for="title">Description:</label>
                          <textarea name="description" class="form-control" data-error="Please enter description."
                            required></textarea>
                          <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                          <button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
                        </div>


                      </form>


                    </div>
                  </div>
                </div>
              </div>


            </div>
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