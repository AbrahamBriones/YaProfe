<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registro - YaProfe</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.php">Iniciar Sesión</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="registration.php">Registrarme</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
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
    $checkEmail = "SELECT * FROM users WHERE email = '$_POST[email]' ";
    // Variable $result hold the connection data and the query
    $result = $conexion-> query($checkEmail);
    // Variable $count hold the result of the query
    $count = mysqli_num_rows($result);
    // If count == 1 that means the email is already on the database
    if ($count == 1) {
    echo "<div class='alert alert-warning mt-4' role='alert'>
                    <p>Este email ya se encuentra en uso.</p>
                    <p><a href='registration.php'>Intentalo nuevamente</a></p>
                </div>";
    } else {    
    
    /*
    If the email don't exist, the data from the form is sended to the
    database and the account is created
    */
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    /*
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $descripcion = $_POST['descripcion'];
    $id_modalidad = $_POST['id_modalidad'];
    $id_niveleducacional = $_POST['id_niveleducacional'];
    $id_asignatura = $_POST['id_asignatura'];
    $foto_perfil = $_POST['foto_perfil'];
    */
    
    // The password_hash() function convert the password in a hash before send it to the database
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    
    // Query to send Name, Email and Password hash to the database
    $query = "INSERT INTO users (name, lastname, email, password, ciudad, telefono, descripcion, id_modalidad, id_niveleducacional, id_asignatura) VALUES ('$name', '$lastname', '$email', '$passHash', NULL, NULL, NULL, NULL, NULL, NULL)";
    if (mysqli_query($conexion, $query)) {
        echo "<div class='alert alert-success mt-4' role='alert'><h3>Tu cuenta ha sido creada exitosamente.</h3>
        <a class='btn btn-outline-primary' href='login.php' role='button'>Iniciar Sesión</a></div>";
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