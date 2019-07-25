<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Iniciar Sesión - YaProfe</title>
    <meta name="description" content="Encuentra tus profes ya!">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <?php if(isset($_SESSION['loggedin'])): ?>
        
        <div class="container"><a class="navbar-brand logo" href="index.php">YaProfe!</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profesores.php">Profesores</a></li>
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link active" href="my-perfil.php"></a></li> -->
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Cerrar Sesión</a></li> -->
                    <!-- <form class="form-inline">
                        <li class="nav-item" role="presentation"><a href="my-perfil.php"><button class="btn btn-outline-primary my-2 my-sm-0 ml-2" type="button"><?php echo $_SESSION['name']; ?></a></li>                    
                    </form> -->
                    <li>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="my-perfil.php">Mi Perfil</a>
                            <a class="dropdown-item" href="edit-perfil.php">Editar Perfil</a>
                            <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                            </div>
                        </div></li>
                    </div>
                </ul>
            </div>
        </div>

        <?php else: ?>

        <div class="container"><a class="navbar-brand logo" href="index.php">YaProfe!</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profesores.php">Profesores</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="registration.php">Registrarme</a></li>
                </ul>
            </div>
        </div>

        <?php endif; ?>

    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">

  <?php
  include 'conexion.php';
  $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Check connection
  if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Query to check if the email already exist
  $checkId = "SELECT * FROM users WHERE id = '$_POST[id]' ";
  // Variable $result hold the connection data and the query
  $result = $conexion-> query($checkId);
  // Variable $count hold the result of the query
  $count = 2;
  // If count == 1 that means the email is already on the database
  if ($count == 1) {
  echo "<div class='alert alert-warning mt-4' role='alert'>
          <p>Este email ya se encuentra en uso.</p>
          <p><a href='edit-perfil.php'>Intentalo nuevamente</a></p>
        </div>";
  } else {  
  
  /*
  If the email don't exist, the data from the form is sended to the
  database and the account is created
  */
  $id = $_POST['id'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $ciudad = $_POST['ciudad'];
  $telefono = $_POST['telefono'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $id_modalidad = $_POST['id_modalidad'];
  $id_niveleducacional = $_POST['id_niveleducacional'];
  $id_asignatura = $_POST['id_asignatura'];


  /*
  $id_modalidad = $_POST['id_modalidad'];
  $id_niveleducacional = $_POST['id_niveleducacional'];
  $id_asignatura = $_POST['id_asignatura'];
  $foto_perfil = $_POST['foto_perfil'];
  */
  // The password_hash() function convert the password in a hash before send it to the database
  $passHash = password_hash($pass, PASSWORD_DEFAULT);
  
  // Query to send Name, Email and Password hash to the database
  /*
  $query = "UPDATE users SET (name = '$name', lastname = '$lastname', email = '$email', password = '$passHash', ciudad = '$ciudad', telefono = '$telefono', descripcion = '$descripcion', id_modalidad = NULL, id_niveleducacional = NULL, id_asignatura = NULL, foto_perfil = NULL)";
  */

  $query = "UPDATE users SET name = '$name', lastname = '$lastname', email = '$email', password = '$passHash', ciudad = '$ciudad', telefono = '$telefono', descripcion = '$descripcion', precio = '$precio', id_modalidad = '$id_modalidad', id_niveleducacional = '$id_niveleducacional', id_asignatura = '$id_asignatura' WHERE id='$id' ";

  /* `users`.`id` = 5;
  UPDATE `users` SET `ciudad` = 'Chillán', `telefono` = '12345678', `descripcion` = 'Holi', `id_modalidad` = '2', `id_niveleducacional` = '2', `id_asignatura` = '4' WHERE `users`.`id` = 5;
  UPDATE `users` SET `id_modalidad` = '2', `id_niveleducacional` = '4', `id_asignatura` = '1' WHERE `users`.`id` = 10;

  */

  if (mysqli_query($conexion, $query)) {

    echo "<div class='alert alert-success mt-4' role='alert'><h3>Tu perfil ha sido editado exitosamente.</h3>
    <a class='btn btn-outline-primary' href='my-perfil.php' role='button'>Ir a mi perfil</a></div>";

    session_destroy();

    header('location: login.php');

    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conexion);
    } 
  } 
  mysqli_close($conexion);
  ?>
</div>
        </section>
    </main>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>