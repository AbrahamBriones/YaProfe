<?php
session_start();

    //$nombreimg=$_FILES['imagen']['name']; //obtiene el nombre
    $nombreimg=$_SESSION['id']; //obtiene el nombre
    $archivo=$_FILES['imagen']['tmp_name']; //obtiene el archivo
    $ruta="images";

    $ruta=$ruta."/".$nombreimg;

    move_uploaded_file($archivo, $ruta);


  //  $query=msql_query("UPDATE users SET foto_perfil = '" .$ruta. "' WHERE id= '".$nombreimg."'");

        header('location: my-perfil.php');
        
  
?>