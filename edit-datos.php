<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edición de cuenta YaProfe!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
<body>

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

    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conexion);
    } 
  } 
  mysqli_close($conexion);
  ?>
</div>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>