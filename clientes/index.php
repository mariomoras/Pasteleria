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
    <body style="background-image: url('../img/bg-img/breadcumb2.jpg');  background-repeat: no-repeat;background-size: auto; ">
        <?php
        session_start();
        if (!empty($_SESSION["cliente"])) {
            //require_once '';
            ?>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255,255,255,.8);">
                <a class="nav-brand" href="index.php"><img src="../img/core-img/logo.png" alt="Inicio" width="70%"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Homy<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pedidos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-sm btn-outline-info" href="#" data-toggle="modal" data-target="#agregarPostre"><i class="fa fa-plus"></i> Agregar postre</button>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container bg-white mt-5">
                <a>Hola</a>
            </div>
            <div class="modal fade show" id="agregarPostre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog <!--modal-dialog-centered-->" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Subir nuevo elemento</h5>
                            <button type="button" class="close" title="Mas tarde" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="nuevoPostre">
                                <div class="row m-3">
<!--                                    <input type="hidden" name="nIdClt" value="<?php echo $_SESSION["cliente"]["id"]; ?>">-->
                                    <div class="col-sm-12 text-center"><a>Tipo de postre:</a></div>
                                    <div class="col-sm">
                                        <select class="form-control-sm" name="cTipo" required>
                                            <option value="" disabled selected>Selecciona</option>
                                            <option value="Pastel">Pastel</option>
                                            <option value="Flan">Flan</option>
                                            <option value="Chocoflan">Chocoflan</option>
                                            <option value="Tarta">Tarta</option>
                                            <option value="Pay">Pay</option>
                                            <option value="Muss">Muss</option>
                                            <option value="Choco muss">Choco muss</option>
                                            <option value="Gelatina">Gelatina</option>
                                            <option value="Cup cakes ">Cup cakes </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-sm-12 text-center">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-birthday-cake"></i></span>
                                            </div>
                                            <input id="nombrePostre" type="text" class="form-control" autocomplete="off" placeholder="Nombre del postre" title="Nombre del postre" name="cNombrePostre" aria-label="postre" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar"></i></span>
                                            </div>
                                            <input type="number" min="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="Precio" name="nPrecio" title="Precio unitario" aria-label="Precio" aria-describedby="basic-addon1" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-users"></i></span>
                                            </div>
                                            <input type="number" min="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" placeholder="# personas" name="nPersonas" title="Tamaño para cuantas personas" aria-label="Personas" aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control-sm" name="cTiempoEspera" required>
                                            <option value="" selected disabled>Tiempo de espera</option>
                                            <option value="15 Minutos">15 Minutos</option>
                                            <option value="30 Minutos">30 Minutos</option>
                                            <option value="1 Hora">1 Hora</option>
                                            <option value="2 Horas">2 Horas</option>
                                            <option value="4 Horas">4 Horas</option>
                                            <option value="6 Horas">6 Horas</option>
                                            <option value="12 Horas">12 Horas</option>
                                            <option value="1 Día">1 Día</option>
                                            <option value="2 Días">2 Días</option>
                                            <option value="4 Días">4 Días</option>
                                            <option value="7 Días">7 Días</option>
                                            <option value="15 Días">15 Días</option>
                                            <option value="1 Mes">1 Mes</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-sm-12 my-3 text-center"><small class="text-muted">Edita las opciones solo sí aplica, de no ser asi dejalo en <kbd>No aplica</kbd></small></div>
                                    <div class="col-sm-6 text-center">Relleno:</div><div class="col-sm-6 text-center">Cubierta:</div>
                                    <div class="col-sm-6">
                                        <textarea name="cRelleno" placeholder="Frutal, Chocolate, etc" class="form-control" required>No aplica</textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea name="cCubierta" placeholder="Frutal, Chocolate, etc" class="form-control" required>No Aplica</textarea>
                                    </div>
                                    <div class="col-sm-12 my-3">
                                        <textarea name="cDescripcion" class="form-control" rows="4" placeholder="Descripción del postre" required></textarea>
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="input-group mb-3">
                                        <small class="text-center">En la ventana al seleccionar las imagenes, ordenelas por NOMBRE, la primer imagen de la selección sera la portada del postre.</small>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-picture-o"></i></span>
                                        </div>
                                        <input class="form-control" type="file" name="archivo[]" multiple="" accept="image/jpeg" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 m3 text-center">
                                        <input type="hidden" name="mtd" value="nuevoPostre" />
                                        <button id="btnNuevoPostre" type="submit" class="btn btn-sm btn-outline-info"><i class="fa fa-plus-circle"></i> Agregar</button>
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
        } else {
            ?>
            <div class="container" >
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 mt-100">
                        <div class="card">
                            <div class="card-header text-center">
                                <a class="nav-brand" ><img src="../img/core-img/logo.png" alt=""></a>
                            </div>
                            <div class="card-body">
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
                                                <input type="email" name="emailC" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                                </div>
                                                <input type="password" name="passwordC" class="form-control" placeholder="Contraseña"  required>
                                                <input type="hidden" name="mtd" value="login" />
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 justify-content-between">
                                                    <button type="submit" class="btn btn-sm"><i class="fa fa-sign-in"></i> Acceder</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="profile-tab">
                                        <form class="formAcceder" autocomplete="off">
                                            <div class="input-group mt-3 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-building"></i></span>
                                                </div>
                                                <input type="text" name="cNombreNegocioR" class="form-control text-capitalize" placeholder="Nombre del negocio" required>
                                            </div>
                                            <a class="text-center">Nombre del responsable</a>
                                            <div class="input-group mt-3 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input type="text" name="nombreR" class="form-control text-capitalize" placeholder="Nombre" required><span class="input-group-text"> </span>
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
                                            <div class="input-group mt-3 mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="number" name="cTelefonoR" class="form-control text-capitalize" placeholder="Telefono del negocio" required>
                                            </div>
                                            <input type="hidden" name="mtd" value="register" />

                                            <div class="row">
                                                <div class="col-sm-12 justify-content-between">
                                                    <button type="submit" class="btn btn-sm"><i class="fa fa-edit"></i> Registrarse</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

            $("#nuevoPostre").submit(function (event) {
                event.preventDefault();
                $("#btnNuevoPostre").prop('disabled', true);
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: 'acceder.php',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data == "OK")
                            $("#nombrePostre").val('');
                        //document.getElementById("nuevoPostre").reset();
                        //alert("Se registro con exito");
                        $("#alertsCP").text(data);
                        $("#alertsCP").show("slow").delay(2000).hide("slow");
                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                        alert("Error al registrar");
                    }
                });
                $("#btnNuevoPostre").prop('disabled', false);
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

