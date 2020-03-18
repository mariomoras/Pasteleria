<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title -->
        <title>Administración Delicious</title>
        <!-- Favicon -->
        <link rel="icon" href="../img/core-img/favicon.ico">
        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="../style.css">
    </head>
    <body style="background-image: url('../img/bg-img/breadcumb2.jpg');background-repeat: no-repeat;background-size: auto; ">
        <?php
        session_start();
        if (!empty($_SESSION["admin"])) {
            require_once '../conexion.php';
            ?>
            <div class="top-header-area mt-15">
                <div class="container h-100 bg-white">
                    <div class="row h-100 align-items-center justify-content-between">
                        <!-- Breaking News -->
                        <div class="col-12 col-sm-6">
                            <a class="text-capitalize"><?php echo $_SESSION["admin"]["nombre"]; ?></a>
                        </div>

                        <!-- Top Social Info -->
                        <div class="col-12 col-sm-6">
                            <div class="top-social-info text-right">
    <!--                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>-->
                                <form class="form-group formAcceder">
                                    <input type="hidden" name="mtd" value="logout">
                                    <button type="submit" class="btn btn-sm btn-outline-danger mt-2" title="Cerrar Sesión"><i class="fa fa-sign-out"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Pendientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Verificados</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Otros</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body row" id="clientesPendientes">
                        <?php
                        $sql1 = $pdo->prepare("SELECT `nIdCliente`,`cNombreNegocio`,`cCorreo`,`cNombreResponsable`,`cUbicacion`,`cTelefono` FROM `tblcliente` WHERE cEstatus is null and nActivado = 0");
                        $sql1->execute();
                        $rsql1 = $sql1->fetchAll();
                        if (Count($rsql1) >= 1) {
                            foreach ($rsql1 as $item) {
                                ?>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $item["cNombreNegocio"]; ?></h5>
                                            <a class="card-text">Responsable: <a class="text-info"><?php echo $item["cNombreResponsable"]; ?></a></a><br>
                                            <a class="card-text">Email: <a class="text-info" href="mailto:<?php echo $item["cCorreo"]; ?>"><?php echo $item["cCorreo"]; ?></a></a><br>
                                            <a class="card-text">Telefono: <a class="text-info" href="tel:<?php echo $item["cTelefono"]; ?>"><?php echo $item["cTelefono"]; ?></a></a><br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <form class="formClientes">
                                                        <input type="hidden" name="mtd" value="clientes">
                                                        <input type="hidden" name="solicitud" value="Aceptado">
                                                        <input type="hidden" name="cliente" value="<?php echo $item["nIdCliente"]; ?>">
                                                        <button type="submit" class="btn btn-sm btn-outline-success ml-2"><i class="fa fa-check"></i> Validar</button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <form class="formClientes">
                                                        <input type="hidden" name="mtd" value="clientes">
                                                        <input type="hidden" name="solicitud" value="Rechazado">
                                                        <input type="hidden" name="cliente" value="<?php echo $item["nIdCliente"]; ?>">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger mr-2"><i class="fa fa-remove"></i> Rechazar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo '<div class="col-sm-12 text-center"><div class="card"><div class="card-body"><h5 class="card-title">No hay nuevos registros</h5></div></div></div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="container" >
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 mt-100">
                        <div class="card">
                            <div class="card-header text-center">
                                <a class="nav-brand" ><img src="../img/core-img/logo.png" alt=""></a><br>
                                <kbd>ADMINISTRACIÓN</kbd>
                            </div>
                            <div class="card-body">
                                <form class="form-group formAcceder">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="emailA" placeholder="Correo electrónico" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="passwordA" placeholder="Contraseña" required>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-sm btn-outline-dark" id="btnLog"><i class="fa fa-sign-in"></i> Ingresar</button>
                                        <input type="hidden" name="mtd" value="login" />
                                    </div>
                                </form>
                                <div class="col-sm-12">
                                    <div class="alert alert-info" role="alert" style="display: none;" id="alertsLR">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            <?php
        }
        ?>
        <script src="../js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="../js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="../js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="../js/plugins/plugins.js"></script>
        <!-- Active js -->
        <script src="../js/active.js"></script>

        <script>
            $(".formAcceder").submit(function (event) {
                event.preventDefault();
                $("#btnLog").prop('disabled', true);
                var $form = $(this);
                var posting = $.post('acceder.php', $form.serialize());
                posting.done(function (data) {
                    var content = $(data).find("#content");
                    if (data == "loginOK") {
                        location.reload();
                    } else if (data == "<a>Usuario registrado con exito</a>") {
                        $("#alertsLR").html(data);
                        $("#alertsLR").show("slow").delay(2000).hide("slow");
                        $('.formAcceder').trigger("reset");
                    } else {
                        $("#alertsLR").html(data);
                        $("#alertsLR").show("slow").delay(2000).hide("slow");
                    }
                    $("#btnLog").prop('disabled', false);
                });
            });
            
            $(".formClientes").submit(function (event) {
                event.preventDefault();
                var $form = $(this);
                var posting = $.post('acceder.php', $form.serialize());
                posting.done(function (data) {
                    $("#clientesPendientes").html(data);
                });
            });
        </script>
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

