<?php
session_start();  
    include 'conexion.php';
    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //Obtenemos el id por URL
    $id = $_GET['id'];
?>


<!DOCTYPE html>
<html>

<?php 
        $query = "SELECT * FROM users WHERE id = $id";
        $resultado = $conexion->query($query);
        while ($row=$resultado->fetch_assoc()) {
    ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $row['name'];?> <?php echo $row['lastname'];?> - YaProfe</title>
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
    
    <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-content">
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="gallery">

                                    <div class="sp-wrap"><a href="images/<?php echo $row['id']; ?>"><img class="img-fluid d-block mx-auto" src="images/<?php echo $row['id']; ?>"></a></div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <h3><?php echo $row['name'];?> <?php echo $row['lastname'];?></h3>
                                                <form>
                                                  <p class="clasificacion">
                                                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                                                    --><label style="font-size: 30px" for="radio1">★</label><!--
                                                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                                                    --><label style="font-size: 30px" for="radio2">★</label><!--
                                                    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                                                    --><label style="font-size: 30px" for="radio3">★</label><!--
                                                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                                                    --><label style="font-size: 30px" for="radio4">★</label><!--
                                                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                                                    --><label style="font-size: 30px" for="radio5">★</label>
                                                  </p>
                                                </form>
                                    <div class="price">
                                        <h3>$ <?php echo number_format($row['precio'],0,'.','.');?> / hora</h3>
                                    </div><button class="btn btn-primary" type="button"><i class="icon-envelope"></i>Contactar Profe</button>
                                    <span class="glyphicon glyphicon-envelope"></span>
                                    <div class="summary">
                                        <p><?php echo $row['descripcion'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div>
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#specifications" id="specifications-tabs">Información</a></li>
                                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#reviews" id="reviews-tab">Comentarios</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active specifications" role="tabpanel" id="specifications">
                                    <div class="table-responsive table-bordered">


                                            <?php  
                                                $consulta = $row['telefono'];
                                                if($consulta == '' ):
                                            ?>

                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="stat">Ubicación</td>
                                                    <td> </td>
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
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">E-mail</td>
                                                    <td><?php echo $row['email']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table> 

                                            <?php else: ?>

                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="stat">Ubicación</td>
                                                    <td><?php echo $row['ciudad'];?></td>
                                                </tr>

                                               <?php
                                                    $id_asig = $row['id_asignatura'];

                                                    $query = "SELECT * FROM asignatura WHERE id=$id_asig";
                                                    $resultado = $conexion->query($query);
                                                    while ($row2=$resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="stat">Asignatura</td>
                                                    <td><?php echo $row2['name'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?> 

                                                <?php
                                                    $id_mod = $row['id_modalidad'];

                                                    $query = "SELECT * FROM modalidad WHERE id=$id_mod";
                                                    $resultado = $conexion->query($query);
                                                    while ($row2=$resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="stat">Modalidad de trabajo</td>
                                                    <td><?php echo $row2['name'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                    $id_niv = $row['id_niveleducacional'];

                                                    $query = "SELECT * FROM niveleducacional WHERE id=$id_niv";
                                                    $resultado = $conexion->query($query);
                                                    while ($row2=$resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="stat">Nivel Educacional</td>
                                                    <td><?php echo $row2['name'];?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                                <tr>
                                                    <td class="stat">Teléfono</td>
                                                    <td><?php echo $row['telefono'];?></td>
                                                </tr>
                                                <tr>
                                                    <td class="stat">E-mail</td>
                                                    <td><?php echo $row['email'];?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                                <?php endif; ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" role="tabpanel" id="reviews">
                                    <div class="reviews">
                                        <div class="review-item">
                                            <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Excelente profesor</h4><span class="text-muted"><a href="#">Abraham Del Rio</a>, 20 Mar 2019</span>
                                            <p>Recomiendo al profe Juanito porque es una persona responsable , se caracteriza de saber la materia antes de trabajar, proactivo, organizado, metódico, ordenado, respetuoso, tranquilo para hacer sus clases, y explica hasta que el alumno quede claro. Viene con su pizarra, plumón y borrador.</p>
                                        </div>
                                    </div>
                                    <div class="reviews">
                                        <div class="review-item">
                                            <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div>
                                            <h4>Profesor con buena disposición</h4><span class="text-muted"><a href="#">Cristopher Dueñas</a>, 04 Abr 2019</span>
                                            <p>Recomiendo a Juan Carlos porque es una persona responsable, se caracteriza de saber la materia antes de trabajar, proactivo, organizado, metódico, ordenado, respetuoso, tranquilo para hacer sus clases, y explica hasta que el alumno quede claro..</p>
                                        </div>
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

<?php
    }
    ?> 

</html>