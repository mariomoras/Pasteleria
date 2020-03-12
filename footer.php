<?php if (!empty($_SESSION["usuario"])) { ?>
    <div class="modal fade" id="carritoDeCompras" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-shopping-cart"></i> Carrito de compras <i class="fa fa-shopping-cart"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="contendioCarrito" class="table table-hover text-center table-responsive-lg">

                    </table>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="modal fade" id="modalAcceder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
<!-- ##### Footer Area Start ##### -->
<script>var LHC_API = LHC_API||{};
LHC_API.args = {mode:'widget',lhc_base_url:'http://pasteleria.byethost15.com/soporte/index.php/',wheight:450,wwidth:350,pheight:520,pwidth:500,leaveamessage:true};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var date = new Date();po.src = 'http://pasteleria.byethost15.com/soporte/design/defaulttheme/js/widgetv2/index.js?'+(""+date.getFullYear() + date.getMonth() + date.getDate());
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<footer class="footer-area">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                <!-- Footer Social Info -->
                <div class="footer-social-info text-right">
                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </div>
                <!-- Footer Logo -->
                <div class="footer-logo">
                    <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                </div>
                <!-- Copywrite -->

            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->
<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
<?php
if (!empty($_SESSION["usuario"])) {
    if (empty($_SESSION["usuario"]["intolerancias"])) {
        echo '<script>$("#modalMasDatos").modal("toggle");</script>';
    }
}
?>
<script>
                    $(".formAcceder").submit(function (event) {
                        event.preventDefault();
                        var $form = $(this);
                        var posting = $.post('acceder.php', $form.serialize());
                        posting.done(function (data) {
                            var content = $(data).find("#content");
                            if (data === "loginOK") {
                                location.reload();
                            } else if (data === "<a>Usuario registrado con exito</a>") {
                                $("#alertsLR").html(data);
                                $("#alertsLR").show("slow").delay(4000).hide("slow");
                                $('.formAcceder').trigger("reset");
                                $('#registroUsr').prop('disabled', true);
                            } else {
                                $("#alertsLR").html(data);
                                $("#alertsLR").show("slow").delay(4000).hide("slow");
                            }
                        });
                    });

                    $("#frmUlDts").submit(function (event) {
                        event.preventDefault();
                        var $form = $(this);
                        console.log($form);
                        var posting = $.post('acceder.php', $form.serialize());
                        posting.done(function (data) {
                            if (data == "Datos Actualizados") {
                                $("#alertsCP").html(data);
                                $("#alertsCP").show("slow").delay(4000).hide("slow");
                                $("#modalMasDatos").delay(3000).modal('hide');
                            } else {
                                $("#alertsCP").html('<a>Ocurrio un error, intenta mas tarde</a>');
                                $("#alertsCP").show("slow").delay(4000).hide("slow");
                            }
                        });
                    });

                    $('#captcha1').keyup(function () {
                        if ($(this).val() === contrase) {
                            $('#registroUsr').prop('disabled', false);
                        } else {
                            $('#registroUsr').prop('disabled', true);
                        }
                    });
//                                $("input[name='alergias[]']").each(function (index, obj) {
//                                    alert($(this).val());
//                                 });
                    $("input[name='alergias[]']").click(function () {
                        if ($(this).val() === 'Ninguna') {
                            $("input[name='alergias[]']").each(function (index, obj) {
                                $(this).prop('checked', false);
                            });
                            $(this).prop('checked', true);
                        } else {
                            $("#alnada").prop('checked', false);
                        }
                        if ($("input[name='alergias[]']:checked").length <= 0) {
                            $("#alnada").prop('checked', true);
                        }
                    });
                    $("input[name='intolerancias[]']").click(function () {
                        if ($(this).val() === 'Ninguna') {
                            $("input[name='intolerancias[]']").each(function (index, obj) {
                                $(this).prop('checked', false);
                            });
                            $(this).prop('checked', true);
                        } else {
                            $("#intnada").prop('checked', false);
                        }
                        if ($("input[name='intolerancias[]']:checked").length <= 0) {
                            $("#intnada").prop('checked', true);
                        }
                    });

                    $(document).ready(function () {
                        $("#busquedaPostres").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            $("#totalPostres div").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });

                    $("#btnAddCar").click(function () {
                        $("#btnAddCar").prop('disabled', true);
                        if ($("#nCantidadCar").val() < 1) {
                            $("#alertCarrito").html('<a>Selecciona al menos una pz</a>');
                            $("#alertCarrito").show("slow").delay(4000).hide("slow");
                        } else {
                            $.post("acceder.php", {mtd: "carrito", nIdPostre: $("#nIdPostre").val(), nCantidad: $("#nCantidadCar").val()})
                                    .done(function (data) {
                                        $("#alertCarrito").html('<a>' + data + '</a>');
                                        $("#alertCarrito").show("slow").delay(4000).hide("slow");
                                    });
                        }
                        $("#btnAddCar").prop('disabled', false);
                    });

                    $("#btnChecarCarrito").click(function () {
                            $.post("acceder.php", {mtd: "verCarrito"})
                                    .done(function (data) {
                                        $("#contendioCarrito").html(data);
                                    });
                    });
                    
                    function eliminarItem(op){
                        $.post("acceder.php", {mtd: "eliminarItem", item: op})
                                    .done(function (data) {
                                        $("#contendioCarrito").html(data);
                                    });
                    }

</script>
