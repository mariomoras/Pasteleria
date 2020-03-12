<?php
session_start();
require_once 'conexion.php';
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
        ?>
        <!-- ##### Header Area End ##### -->
        <?php
        $nIdP = $_POST['nId_Postre'];
        $arrayFotos;
        //$sqlP = $pdo->prepare("SELECT * FROM tblPropiedades WHERE cEstatus is null LIMIT 9");
        try {
            $sqlPo = $pdo->prepare("SELECT nIdPostre, cNombre, cFotos, nPrecio, cTipo, cTiempoEspera,cRelleno,cCubierta, cNombreNegocio, nPersonas FROM catpostre t1 INNER JOIN tblcliente t2 ON t1.nIdClienteRegistro = t2.nIdCliente WHERE t1.cEstatus IS NULL and t1.nIdPostre = :n1");
            $sqlPo->bindParam("n1", $nIdP, PDO::PARAM_INT);
            $sqlPo->execute();
            $rsqlPo = $sqlPo->fetchAll();
            foreach ($rsqlPo as $item) {
                $arrayFotos = explode(",", $item["cFotos"]);
                ?>
                <!-- ##### Breadcumb Area Start ##### -->
                <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="breadcumb-text text-center">
                                    <h2><?php echo $item["cNombre"]; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ##### Breadcumb Area End ##### -->
                <div class="receipe-post-area section-padding-80">

                    <!-- Receipe Post Search -->
                    <div class="receipe-post-search ">
                        <!--            <div class="container">
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-12 col-lg-3">
                                                    <select name="select1" id="select1">
                                                        <option value="1">All Receipies Categories</option>
                                                        <option value="1">All Receipies Categories 2</option>
                                                        <option value="1">All Receipies Categories 3</option>
                                                        <option value="1">All Receipies Categories 4</option>
                                                        <option value="1">All Receipies Categories 5</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <select name="select1" id="select2">
                                                        <option value="1">All Receipies Categories</option>
                                                        <option value="1">All Receipies Categories 2</option>
                                                        <option value="1">All Receipies Categories 3</option>
                                                        <option value="1">All Receipies Categories 4</option>
                                                        <option value="1">All Receipies Categories 5</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-lg-3">
                                                    <input type="search" name="search" placeholder="Search Receipies">
                                                </div>
                                                <div class="col-12 col-lg-3 text-right">
                                                    <button type="submit" class="btn delicious-btn">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>-->
                    </div>
                    <!-- Receipe Slider -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="receipe-slider owl-carousel peopleCarouselImg">
                                    <?php
                                    for ($i = 0; $i < count($arrayFotos); $i++) {
                                        echo '<img class="img-responsive" src="' . 'img/postres/' . str_replace(" ", "-", $item["cNombreNegocio"]) . '/' . str_replace(" ", "-", $item["cNombre"]) . "/" . $arrayFotos[$i] . '" alt="">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6 text-center">
                                <h3><?php echo $item["cTipo"]; ?></h3>
                                <a class="my-5">"<?php echo $item["cNombreNegocio"]; ?>"</a>
                                <input type="hidden" id="nIdPostre" value="<?php echo $item["nIdPostre"]; ?>"/>
                                <p class="text-muted">Pedir con anticipacion de: <?php echo $item["cTiempoEspera"]; ?></p>
                                <p class="text-muted">Para <?php echo $item["nPersonas"]; ?> persona(s)</p>
                                <div class="row mt-5 border border-info border-top-0">
                                    <div class="col-sm-6">
                                        <a>Relleno:</a>
                                        <?php
                                        if (mb_convert_case($item["cRelleno"], MB_CASE_UPPER, "UTF-8") == "NO APLICA") {
                                            echo '<p>' . $item["cRelleno"] . '</p>';
                                        } else {
                                            echo '<p class="text-justify">' . $item["cRelleno"] . '</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <a>Cubierta:</a>
                                        <?php
                                        if (mb_convert_case($item["cCubierta"], MB_CASE_UPPER, "UTF-8") == "NO APLICA") {
                                            echo '<p>' . $item["cCubierta"] . '</p>';
                                        } else {
                                            echo '<p class="text-justify">' . $item["cCubierta"] . '</p>';
                                        }
                                        ?> 
                                    </div>
                                </div>
                                <h2 class="mt-30"><i class="fa fa-dollar"></i> <?php echo $item["nPrecio"]; ?></h2>
                                <?php
                                if (!empty($_SESSION["usuario"])) {
                                    ?>
                                    <div class="row mt-5">
                                        <div class="col-sm-3">
                                            <a class="text-right">Cantidad (pz) </a>
                                        </div>
                                        <div class="col-sm-3">
                                            <input id="nCantidadCar" onchange="obtTotal(this.value);" placeholder="Pz" type="number" min="1" value="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" step="1"/>
                                        </div>
                                        <div class="col-sm-3">
                                            <a class="text-right">Total: </a>
                                        </div>
                                        <div class="col-sm-3 text-left">
                                            <a id="totalCarrito">$ <?php echo $item["nPrecio"]; ?></a>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <button id="btnAddCar" class="btn btn-sm btn-outline-dark"><i class="fa fa-plus-circle"></i> Agregar al carrito</button>
                                        </div>
                                        <div class="col-sm-12 mt-5">
                                            <div class="alert alert-info" role="alert" style="display: none;" id="alertCarrito">
                                            </div>
                                        </div>
                                    </div>
                                <script>
                                    function obtTotal(op){
                                        var val=(op*<?php echo $item["nPrecio"]; ?>);
                                        document.getElementById("totalCarrito").innerText= "$ "+val;
                                    }
                                </script>
                                    <?php
                                } else {
                                    ?>
                                <div class="row mt-5 text-center">
                                    <div class="col-sm-12"><a>Necesitas estar logueado para porder añadir al carrito.</a></div>
                                    <div class="col-sm-12 mt-3"><button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#modalAcceder" title="Acceder"><i class="fa fa-sign-in"></i> Acceder</button></div>
                                </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- Receipe Content Area -->
<!--                    <div class="receipe-content-area">
                        <div class="container">

                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="receipe-headline my-5">
                                        <span>April 05, 2018</span>
                                        <h2>Vegetarian cheese salad</h2>
                                        <div class="receipe-duration">
                                            <h6>Prep: 15 mins</h6>
                                            <h6>Cook: 30 mins</h6>
                                            <h6>Yields: 8 Servings</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="receipe-ratings text-right my-5">
                                        <div class="ratings">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        </div>
                                        <a href="#" class="btn delicious-btn">For Begginers</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-8">
                                     Single Preparation Step 
                                    <div class="single-preparation-step d-flex">
                                        <h4>01.</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                    </div>
                                     Single Preparation Step 
                                    <div class="single-preparation-step d-flex">
                                        <h4>02.</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                    </div>
                                     Single Preparation Step 
                                    <div class="single-preparation-step d-flex">
                                        <h4>03.</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                    </div>
                                     Single Preparation Step 
                                    <div class="single-preparation-step d-flex">
                                        <h4>04.</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                                    </div>
                                </div>

                                 Ingredients 
                                <div class="col-12 col-lg-4">
                                    <div class="ingredients">
                                        <h4>Ingredients</h4>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">4 Tbsp (57 gr) butter</label>
                                        </div>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">2 large eggs</label>
                                        </div>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">2 yogurt containers granulated sugar</label>
                                        </div>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">1 vanilla or plain yogurt, 170g container</label>
                                        </div>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label" for="customCheck5">2 yogurt containers unbleached white flour</label>
                                        </div>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                            <label class="custom-control-label" for="customCheck6">1.5 yogurt containers milk</label>
                                        </div>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                            <label class="custom-control-label" for="customCheck7">1/4 tsp cinnamon</label>
                                        </div>

                                         Custom Checkbox 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8">
                                            <label class="custom-control-label" for="customCheck8">1 cup fresh blueberries </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="section-heading text-left">
                                        <h3>Leave a comment</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="contact-form-area">
                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                                </div>
                                                <div class="col-12">
                                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn delicious-btn mt-30" type="submit">Post Comments</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
                <?php
            }
        } catch (Exception $ex) {
            echo $ex;
        }
        ?>
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