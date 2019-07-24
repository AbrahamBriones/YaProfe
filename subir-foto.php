<?php
session_start();

include 'conexion.php';
$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}



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
    //$nombreimg=$_FILES['imagen']['name']; //obtiene el nombre
    $nombreimg=$_SESSION['id']; //obtiene el nombre
    $archivo=$_FILES['imagen']['tmp_name']; //obtiene el archivo
    $ruta="images";

    $ruta=$ruta."/".$nombreimg;

    move_uploaded_file($archivo, $ruta);


  //  $query=msql_query("UPDATE users SET foto_perfil = '" .$ruta. "' WHERE id= '".$nombreimg."'");


    if($query){
        header('location: my-perfil.php');
    }else{
        header('location: my-perfil.php');
    }

} 
  
?>