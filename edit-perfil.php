<?php
session_start();
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Editar Perfil - YaProfe</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profesores.php">Profesores</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="my-perfil.php"><?php echo $_SESSION['name']; ?></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php">Cerrar Sesión</a></li>
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
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Editando Perfil</h2>
                </div>

                    <form method="POST" action="edit_datos.php" enctype="multipart/form-data">
                        <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['lastname'];?>">
                        <button class="btn btn-primary mt-3">Editar</button>
                    </form>
                    
                    <form method="post" action="create-account.php" method="POST">
                        <div class="form-group">
                            <label for="name">Nombre</label><input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Apellidos</label><input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group"><label for="email">Correo electrónico</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group"><label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Ciudad</label><input type="text" class="form-control" name="ubicacion">
                        </div>
                        <div class="form-group">
                            <label for="name">Asignatura</label><input type="text" class="form-control" name="asignatura">
                        </div>
                        <div class="form-group">
                            <label for="name">Nivel Educacional</label><input type="text" class="form-control" name="nivelE">
                        </div>
                        <div class="form-group">
                            <label for="name">Modalidad</label><input type="text" class="form-control" name="modalidad">
                        </div>
                        <div class="form-group">
                            <label for="name">Teléfono</label><input type="text" class="form-control" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="name">Foto Perfil</label><input type="text" class="form-control" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="name">Descripción</label><input type="text" class="form-control" name="descripcion">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Guardar Cambios</button>
                    </form>


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