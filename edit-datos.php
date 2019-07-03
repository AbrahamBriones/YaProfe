<?php
  ///////////////////////////////////////
  // Este es mi archivo formulario.php //
  ///////////////////////////////////////
  $id = $_GET['id']
  
   //Hago mi consulta.
  $query = "
    SELECT
      email
    FROM
      users
    WHERE
      id = ${id}
   ";
   
   //Obtengo el registro de mi consulta
   //Muestro la información en mi HTML
?>