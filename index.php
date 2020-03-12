<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title -->
        <title>Delicious - Food Blog Template | Home</title>

        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <?php
        require_once 'header.php';
        require_once 'conexion.php';
        ?>
        <!-- ##### Header Area End ##### -->

        <?php
        if (!empty($_SESSION["usuario"])) {

            if (empty($_SESSION["usuario"]["intolerancias"])) {
                ?>
                <div class="modal fade show" id="modalMasDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog <!--modal-dialog-centered-->" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Completa tu perfil</h5>
                                <button type="button" class="close" title="Mas tarde" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="frmUlDts">
                                    <div class="row m-3">
                                        <div class="col-sm-12 text-center"><a>Alergico a:</a></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" id="alnada" value="Ninguna" checked>Ninguna</label></div>
                                        <div class="col-sm-4">
                                            <label>
                                                <input type="checkbox" name="alergias[]" value="Melocotón">Melocotón</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Kiwi">Kiwi</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Frutos secos">Frutos secos</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Plátano">Plátano</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Fresa">Fresa</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Almendra">Almendra</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Manzana">Manzana</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Melón">Melón</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="alergias[]" value="Nuez">Nuez</label></div>
                                    </div>
                                    <div class="row m-3">
                                        <div class="col-sm-12 text-center"><a>Intolerancia a:</a></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="intolerancias[]" id="intnada" value="Ninguna" checked>Ninguna</label></div>
                                        <div class="col-sm-4">
                                            <label>
                                                <input type="checkbox" name="intolerancias[]" value="Lactosa">Lactosa</label></div>
                                        <div class="col-sm-4"><label>
                                                <input type="checkbox" name="intolerancias[]" value="Gluten">Gluten</label></div>
                                    </div>
                                    <div class="row m-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone-square"></i></span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="# telefonico" name="nTelefonoC" aria-label="telefono" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 m3 text-center">
                                            <input type="hidden" name="mtd" value="completar" />
                                            <input type="hidden" name="nUsuario" value="<?php echo $_SESSION["usuario"]["id"]; ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-info"><i class="fa fa-plus-circle"></i> Agregar</button>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="alert alert-info" role="alert" style="display: none;" id="alertsCP">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="modal fade" id="modalAcceder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog <!--modal-dialog-centered-->" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Acceder</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#registro" role="tab" aria-controls="profile" aria-selected="false">Registro</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                                    <form class="formAcceder" autocomplete="off">
                                        <div class="input-group mt-3 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input type="email" name="emailL" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input type="password" name="passwordL" class="form-control" placeholder="Contraseña"  required>
                                            <input type="hidden" name="mtd" value="login" />
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-outline-success"><i class="fa fa-sign-in"></i> Acceder</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
                                    <form class="formAcceder" autocomplete="off">
                                        <div class="input-group mt-3 mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" name="nombreR" class="form-control text-capitalize" placeholder="Nombre" required><span class="input-group-text">-</span>
                                            <input type="text" name="apellidoR" class="form-control text-capitalize" placeholder="Apellidos" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input type="email" name="correoR" class="form-control" placeholder="Correo electronico" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                                            </div>
                                            <input type="password" name="passwordR" class="form-control" placeholder="Contraseña"  required>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-birthday-cake"></i></span>
                                                    </div>
                                                    <input type="date" name="fechaR" class="form-control" placeholder="Fecha Nacimiento" aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <select name="gustoR" required>
                                                        <option disabled selected value="">Selecciona tu postre favorito</option>
                                                        <option value="Flan">Flan</option>
                                                        <option value="Pastel">Pastel</option>
                                                        <option value="Gelatina">Gelatina</option>
                                                        <option value="Cupcake">CupCake</option>
                                                        <option value="Galleta">Galleta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <select name="generoR" required>
                                                        <option disabled selected value="">Genero</option>
                                                        <option value="Femenino">Mujer</option>
                                                        <option value="Masculino">Hombre</option>
                                                        <option value="Otro">Prefiero no decirlo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row text-center">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-6">
                                                        <canvas id="myCanvas" style="border:1px solid #d3d3d3;">
                                                            Your browser does not support the canvas element.
                                                        </canvas>
                                                    </div>
                                                    <div class="col-sm-3"></div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-7 text-center">
                                                        <input id="captcha1" w class="form-control" placeholder="Introduce el codigo de la imagen aqui"/>

                                                    </div>
                                                    <div class="col-sm-2">
                                                        <a class="btn btn-outline-primary" onclick="drawCanvas()" title="Generar otro codigo"><i class="fa fa-refresh"></i></a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div>

                                            </div>
                                            <input type="hidden" name="mtd" value="register" />
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <button id="registroUsr" type="submit" class="btn btn-outline-success"><i class="fa fa-edit"></i> Registrarse</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <script>
                                var contrase = "";
                                function drawCanvas() {
                                    contrase = "";
                                    var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHJKMNPQRTUVWXYZ2346789";
                                    for (i = 0; i < 6; i++)
                                        contrase += caracteres.charAt(Math.floor(Math.random() * caracteres.length));

                                    var canvas = document.getElementById("myCanvas");
                                    var ctx = canvas.getContext("2d");
                                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                                    ctx.font = "50px Comic Sans MS";
                                    ctx.fillStyle = "red";
                                    ctx.textAlign = "center";
                                    ctx.fillText(contrase, canvas.width / 2, canvas.height / 2);
                                    document.getElementById('registroUsr').disabled = true;
                                }
                                drawCanvas();
                            </script>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-info" role="alert" style="display: none;" id="alertsLR">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- ##### Hero Area Start ##### -->
        <section class="hero-area">
            <div class="hero-slides owl-carousel">
                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg1.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                    <h2 data-animation="fadeInUp" data-delay="300ms">Riquisimo</h2>
                                    <p data-animation="fadeInUp" data-delay="700ms">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget dui tristique, ac posuere arcu varius.</p>
                                    <a href="#" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Receipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg6.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                    <h2 data-animation="fadeInUp" data-delay="300ms">Delicioso</h2>
                                    <p data-animation="fadeInUp" data-delay="700ms">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget dui tristique, ac posuere arcu varius.</p>
                                    <a href="#" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Receipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg7.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                    <h2 data-animation="fadeInUp" data-delay="300ms">Fuera de lo comun</h2>
                                    <p data-animation="fadeInUp" data-delay="700ms">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget dui tristique, ac posuere arcu varius.</p>
                                    <a href="#" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Receipe</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Hero Area End ##### -->
        <!-- ##### Top Catagory Area Start ##### -->
        <section class="top-catagory-area section-padding-80-0">
            <div class="container">
                <div class="row">
                    <!-- Top Catagory Area -->
                    <div class="col-12 col-lg-6">
                        <div class="single-top-catagory">
                            <img src="img/bg-img/bg2.jpg" alt="">
                            <!-- Content -->
                            <div class="top-cta-content">
                                <h3>Postre especial</h3>
                                <h6>Ricos y de buen aroma</h6>
                                <a href="receipe-post.html" class="btn delicious-btn">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <!-- Top Catagory Area -->
                    <div class="col-12 col-lg-6">
                        <div class="single-top-catagory">
                            <img src="img/bg-img/bg3.jpg" alt="">
                            <!-- Content -->
                            <div class="top-cta-content">
                                <h3>Fuera de lo comun</h3>
                                <h6>¡¡Pruebalos!!</h6>
                                <a href="receipe-post.html" class="btn delicious-btn">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Top Catagory Area End ##### -->
        <!-- ##### Best Receipe Area Start ##### -->
        <style>
            .thumbnail {
                position: relative;
            }
            .caption {
                position: absolute;
                top: 35%;
                left: 0;
                width: 100%;
            }
            .caption:hover {
                border: #ffffff;
                background-color: rgba(255,255,255,.5);
                position: absolute;
                top: 35%;
                left: 0;
                width: 100%;
            }
            .caption2 {
                position: absolute;
                top: 65%;
                left: 0;
                width: 100%;
            }
        </style>
        <section class="best-receipe-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading">
                            <h3>Los mejores postres</h3>
                        </div>
                    </div>
                </div>
                <input id="busquedaPostres" class="form-control mb-5 text-center" placeholder="Filtrar postres">
                <div class="row" id="totalPostres">
                    <?php
                    $arrayFotos;
                    //$sqlP = $pdo->prepare("SELECT * FROM tblPropiedades WHERE cEstatus is null LIMIT 9");
                    $sqlP = $pdo->prepare("SELECT nIdPostre, cNombre, cFotos, nPrecio, cTipo, cNombreNegocio FROM catpostre t1 INNER JOIN tblcliente t2 ON t1.nIdClienteRegistro = t2.nIdCliente WHERE t1.cEstatus IS NULL");
                    $sqlP->execute();
                    $rsqlP = $sqlP->fetchAll();
                    ?>
                    <!-- Single Best Receipe Area -->
                    <?php
                    if(Count($rsqlP) >= 1)
                    {foreach ($rsqlP as $item) {
                        $arrayFotos = explode(",", $item["cFotos"]);
                        ?>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-best-receipe-area mb-30 thumbnail">
                                <img class="img-responsive" src="<?php echo 'img/postres/' . str_replace(" ", "-", $item["cNombreNegocio"]) . '/' . str_replace(" ", "-", $item["cNombre"]) . "/" . $arrayFotos[0]; ?>" alt="">
                                <div class="receipe-content">
                                    <a class="caption" style="color:transparent;">
                                        <h6 class="text-center"><?php echo $item["cTipo"]; ?></h6>
                                        <h5><?php echo $item["cNombre"]; ?></h5>
                                        <form action="receipe-post.php" method="POST">
                                            <input type="hidden" name="nId_Postre" value="<?php echo $item["nIdPostre"]; ?>"/>
                                            <br><button class="btn btn-sm btn-info mb-3">Ver más</button>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }}else{    echo '<div class="col-sm-12">No hay publicaciones</div>';} ?>

                    <!-- Single Best Receipe Area -->
                    <!--                    <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="single-best-receipe-area mb-30">
                                                <img src="img/bg-img/r2.jpg" alt="">
                                                <div class="receipe-content">
                                                    <a href="receipe-post.html">
                                                        <h5>Homemade Burger</h5>
                                                    </a>
                                                    <div class="ratings">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->

                </div>
            </div>
        </section>
        <!-- ##### Best Receipe Area End ##### -->
        <!-- ##### CTA Area Start ##### -->
        <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg4.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Cta Content -->
                        <div class="cta-content text-center">
                            <h2>Los mejores postres, en el mejor lugar</h2>
                            <p>Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque accumsan molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed accumsan neque. Ut vulputate, lectus vel aliquam congue, risus leo elementum nibh</p>
                            <a href="#" class="btn delicious-btn">Descrubre todos nuestros postres</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### CTA Area End ##### -->
        <!-- ##### Small Receipe Area Start ##### -->
        <section class="small-receipe-area section-padding-80-0">
            <div class="container">
                <div class="row">

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr1.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Homemade italian pasta</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr2.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Baked Bread</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr3.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Scalops on salt</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr4.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Fruits on plate</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr5.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Macaroons</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr6.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Chocolate tart</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr7.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Berry Desert</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr8.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Zucchini Grilled on peper</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>

                    <!-- Small Receipe Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <img src="img/bg-img/sr9.jpg" alt="">
                            </div>
                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>January 04, 2018</span>
                                <a href="receipe-post.html">
                                    <h5>Chicken Salad</h5>
                                </a>
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <p>2 Comments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Small Receipe Area End ##### -->
        <!-- ##### Quote Subscribe Area Start ##### -->
        <section class="quote-subscribe-adds">
            <div class="container">
                <div class="row align-items-end">
                    <!-- Quote -->
                    <div class="col-12 col-lg-4">
                        <div class="quote-area text-center">
                            <span>"</span>
                            <h4>Nothing is better than going home to family and eating good food and relaxing</h4>
                            <p>John Smith</p>
                            <div class="date-comments d-flex justify-content-between">
                                <div class="date">January 04, 2018</div>
                                <div class="comments">2 Comments</div>
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="col-12 col-lg-4">
                        <div class="newsletter-area">
                            <h4>Subscribe to our newsletter</h4>
                            <!-- Form -->
                            <div class="newsletter-form bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
                                <form action="#" method="post">
                                    <input type="email" name="email" placeholder="Subscribe to newsletter">
                                    <button type="submit" class="btn delicious-btn w-100">Subscribe</button>
                                </form>
                                <p>Fusce nec ante vitae lacus aliquet vulputate. Donec sceleri sque accumsan molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Adds -->
                    <div class="col-12 col-lg-4">
                        <div class="delicious-add">
                            <img src="img/bg-img/add.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Quote Subscribe Area End ##### -->
        <!-- ##### Follow Us Instagram Area Start ##### -->
        <div class="follow-us-instagram">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>Follow Us Instragram</h5>
                    </div>
                </div>
            </div>
            <!-- Instagram Feeds -->
            <div class="insta-feeds d-flex flex-wrap">
                <!-- Single Insta Feeds -->
                <div class="single-insta-feeds">
                    <img src="img/bg-img/insta1.jpg" alt="">
                    <!-- Icon -->
                    <div class="insta-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Insta Feeds -->
                <div class="single-insta-feeds">
                    <img src="img/bg-img/insta2.jpg" alt="">
                    <!-- Icon -->
                    <div class="insta-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Insta Feeds -->
                <div class="single-insta-feeds">
                    <img src="img/bg-img/insta3.jpg" alt="">
                    <!-- Icon -->
                    <div class="insta-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Insta Feeds -->
                <div class="single-insta-feeds">
                    <img src="img/bg-img/insta4.jpg" alt="">
                    <!-- Icon -->
                    <div class="insta-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Insta Feeds -->
                <div class="single-insta-feeds">
                    <img src="img/bg-img/insta5.jpg" alt="">
                    <!-- Icon -->
                    <div class="insta-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Insta Feeds -->
                <div class="single-insta-feeds">
                    <img src="img/bg-img/insta6.jpg" alt="">
                    <!-- Icon -->
                    <div class="insta-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Insta Feeds -->
                <div class="single-insta-feeds">
                    <img src="img/bg-img/insta7.jpg" alt="">
                    <!-- Icon -->
                    <div class="insta-icon">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Follow Us Instagram Area End ##### -->
        <?php require_once 'footer.php'; ?>
    </body>

</html>