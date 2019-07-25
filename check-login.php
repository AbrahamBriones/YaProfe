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
        <div class="container"><a class="navbar-brand logo" href="index.php">YaProfe!</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profesores.php">Profesores</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="login.php">Iniciar Sesión</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="registration.php">Registrarme</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">


                <?php
            // Connection info. file
            include 'conexion.php';
            
            // Connection variables
            $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            // Check connection
            if (!$conexion) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            // data sent from form login.php 
            $email = $_POST['email']; 
            $password = $_POST['password'];
            
            // Query sent to database
            $result = mysqli_query($conexion, "SELECT id, name, lastname, email, password, ciudad, telefono, descripcion, precio, id_modalidad, id_niveleducacional, id_asignatura FROM users WHERE email = '$email'");
            
            // Variable $row hold the result of the query
            $row = mysqli_fetch_assoc($result);
            
            // Variable $hash hold the password hash on database
            $hash = $row['password'];

            if (password_verify($password, $hash)) {    
                
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['ciudad'] = $row['ciudad'];
                $_SESSION['telefono'] = $row['telefono'];
                $_SESSION['descripcion'] = $row['descripcion'];
                $_SESSION['precio'] = $row['precio'];
                $_SESSION['id_modalidad'] = $row['id_modalidad'];
                $_SESSION['id_niveleducacional'] = $row['id_niveleducacional'];
                $_SESSION['id_asignatura'] = $row['id_asignatura'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (100 * 60) ; //Duración en segundos de la sesión                     
                
                echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido!</strong> $row[name]            
                <p><a href='edit-profile.php'>Editar Perfil</a></p> 
                <p><a href='logout.php'>Cerrar Sesión</a></p></div>";   
                header('location: my-perfil.php');
            
            } else {
                echo "<div class='alert alert-danger mt-4' role='alert'>Email o Contraseña incorrecto!
                <p><a href='login.php'><strong>Por favor vuelva a intentarlo!</strong></a></p></div>";          
            }   
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