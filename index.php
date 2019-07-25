<?php
session_start();
include 'conexion.php';
$mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bienvenidos - YaProfe</title>
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
    <main class="page landing-page">
            
<section class="clean-block features dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">¡Encuentra aquí al profe que buscas!</h2>
                </div>
                <section class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-slt" placeholder="Ingresa tu ciudad">
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>¿Qué materia necesitas?</option>
                                    <?php
                                      $query = $mysqli -> query ("SELECT * FROM asignatura");
                                      while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option value="'.$valores[id].'">'.$valores[name].'</option>';
                                      }
                                    ?>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-12 p-0">
                            <a href='profesores.php'><button type="button" class="btn btn-danger wrn-btn">Buscar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
            </div>
        </section>

        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">¿Qué hacemos?</h2>
                    <p>Te ayudamos a que tú como estudiante puedas encontrar un profesor en línea y como profesor puedas generar ingresos haciendo lo que te apasiona.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 feature-box"><i class="icon-star icon"></i>
                        <h4>Valoraciones</h4>
                        <p>Puedes valorar al profesor con el que tuviste clases, ayudando a los demás a saber su calidad.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-pencil icon"></i>
                        <h4>Categorías</h4>
                        <p>Puedes filtrar el profesor que deseas en base a tus necesidades.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-globe icon"></i> 
                        <h4>Ubicación</h4>
                        <p>Encuentra a tu profe en tu ciudad o donde más te acomode.</p>
                    </div>
                    <div class="col-md-5 feature-box"><i class="icon-refresh icon"></i>
                        <h4>Actualizaciones</h4>
                        <p>A cada minuto se están incorporando nuevos usuarios a nuestra comunidad.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block about-us dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Profes destacados</h2>
                    <p>Te presentamos a los profesores destacados de la semana, filtrado en base a las puntuaciones de estudiantes.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/image1.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Paulo Candia Cea</h4>
                                <p class="card-text">Estudiante de ingeniería civil informática, experto en programación.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/image2.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Teresa Quintana Parra</h4>
                                <p class="card-text">Profesora de matemáticas, egresada de la U de Chile.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/image3.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Josefa Moreno Ortiz</h4>
                                <p class="card-text">Ingeniera Química, que puede ayudarte con tus problemas de universidad.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Comunidad</h5>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Nosotros</h5>
                    <ul>
                        <li><a href="#">Acerca de</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Soporte</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">© 2019 Copyright Text</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>