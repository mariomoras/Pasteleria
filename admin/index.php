<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title -->
        <title>Clientes Login</title>
        <!-- Favicon -->
        <link rel="icon" href="../img/core-img/favicon.ico">
        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="../style.css">
    </head>
    <body style="background-image: url('../img/bg-img/breadcumb2.jpg');background-repeat: no-repeat;background-size: auto; ">
        <?php
        if (!empty($_SESSION["cliente"])) {
            require_once '';
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
                                        <input type="email" class="form-control" name="emailC" placeholder="Correo electrónico" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="passwordC" placeholder="Contraseña" required>
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
                        $("body").load("index.php").hide().fadeIn(2500).delay(4000);
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
        </script>
    </body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

