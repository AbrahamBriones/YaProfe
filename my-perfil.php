<?php
session_start();
include 'conexion.php';
$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $_SESSION['name']; ?> - YaProfe</title>
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
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">

                                    <div class="sp-wrap"><a href="images/<?php echo $_SESSION['id']; ?>"><img class="img-fluid d-block mx-auto" src="images/<?php echo $_SESSION['id']; ?>"></a></div>

                                    <form action="subir-foto.php" method="POST" enctype="multipart/form-data">
                                        <label>Cambiar Foto de Perfil</label>
                                        <span class="btn btn-primary btn-file">
                                            <input type="file" name="imagen">
                                        </span>
                                        <br>
                                        <br>
                                        <span class="btn btn-primary btn-file">
                                            <input type="submit" name="subir" value="Subir Imagen"/>
                                        </span>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3><?php echo $_SESSION['name']; ?> <?php echo $_SESSION['lastname']; ?> </h3>
                                    <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                    <div class="price">
                                        <h3>$ <?php echo number_format($_SESSION['precio'],0,'.','.'); ?> / hora</h3>
                                    </div><a href='edit-perfil.php'><button class="btn btn-primary" type="button"><i class="icon-edit"></i>Editar mi Perfil</button></a>
                                    <span class="glyphicon glyphicon-envelope"></span>
                                    <div class="summary">
                                        <p><?php echo $_SESSION['descripcion']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div>
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item"><a class="nav-link active">Mi Información</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active specifications" role="tabpanel" id="specifications">
                                    <div class="table-responsive table-bordered">
                                        <table class="table table-bordered">

                                            <?php  
                                                $consulta = $_SESSION['telefono'];
                                                if($consulta == '' ):
                                            ?>

                                            <tbody>
                                                <tr>
                                                    <td class="stat">Ubicación</td>
                                                    <td><?php echo $_SESSION['ciudad']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">Asignatura</td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">Modalidad de trabajo</td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">Nivel Educacional</td>
                                                    <td> </td>
                                                </tr>

                                                <tr>
                                                    <td class="stat">Teléfono</td>
                                                    <td><?php echo $_SESSION['telefono']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">E-mail</td>
                                                    <td><?php echo $_SESSION['email']; ?></td>
                                                </tr>
                                            </tbody>




                                            <?php else: ?>

                                                <tbody>
                                                <tr>
                                                    <td class="stat">Ubicación</td>
                                                    <td><?php echo $_SESSION['ciudad']; ?></td>
                                                </tr>

                                                <?php
                                                    $id_asig = $_SESSION['id_asignatura'];

                                                    $query = "SELECT * FROM asignatura WHERE id=$id_asig";
                                                    $resultado = $conexion->query($query);
                                                    while ($row=$resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="stat">Asignatura</td>
                                                    <td><?php echo $row['name'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?> 

                                                <?php
                                                    $id_mod = $_SESSION['id_modalidad'];

                                                    $query = "SELECT * FROM modalidad WHERE id=$id_mod";
                                                    $resultado = $conexion->query($query);
                                                    while ($row=$resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="stat">Modalidad de trabajo</td>
                                                    <td><?php echo $row['name'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    $id_niv = $_SESSION['id_niveleducacional'];

                                                    $query = "SELECT * FROM niveleducacional WHERE id=$id_niv";
                                                    $resultado = $conexion->query($query);
                                                    while ($row=$resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="stat">Nivel Educacional</td>
                                                    <td><?php echo $row['name'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?> 

                                                <tr>
                                                    <td class="stat">Teléfono</td>
                                                    <td><?php echo $_SESSION['telefono']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">E-mail</td>
                                                    <td><?php echo $_SESSION['email']; ?></td>
                                                </tr>
                                            </tbody>

                                            <?php endif; ?>



                                        </table>
                                    </div>
                                </div>

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