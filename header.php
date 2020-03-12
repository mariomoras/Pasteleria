<!-- Preloader -->
<div id="preloader">
    <i class="circle-preloader"></i>
    <img src="img/core-img/salad.png" alt="">
</div>

<!-- Search Wrapper -->
<div class="search-wrapper">
    <!-- Close Btn -->
    <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" method="post">
                    <input type="search" name="search" placeholder="Escribe lo que buscas...">
                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<!--    <header class="header-area position-sticky sticky-top">-->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-between">
                <!-- Breaking News -->
                <div class="col-12 col-sm-6">
                    <div class="breaking-news">
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <?php
                                if (!empty($_SESSION["usuario"])) {
                                    ?>
                                    <li><a> Bienvenido</a></li>
                                    <li><a class="text-capitalize"><?php echo $_SESSION["usuario"]["nombre"] . ' ' . $_SESSION["usuario"]["apellidos"]; ?></a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="#">Hello World!</a></li>
                                    <li><a href="#">Welcome to Colorlib Family.</a></li>
                                    <li><a href="#">Hello Delicious!</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Top Social Info -->
                <div class="col-12 col-sm-6">
                    <div class="top-social-info text-right">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="delicious-main-menu" style="background-color: white;">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="deliciousNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt="Inicio"></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                                <li>
                                    <a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog-post.html">Blog Post</a></li>
                                        <li><a href="receipe-post.html">Receipe Post</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                        <li>
                                            <a href="#">Dropdown</a>
                                            <ul class="dropdown">
                                                <li><a href="index.php">Inicio</a></li>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="blog-post.html">Blog Post</a></li>
                                                <li><a href="receipe-post.html">Receipe Post</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                                <li>
                                                    <a href="#">Dropdown</a>
                                                    <ul class="dropdown">
                                                        <li><a href="index.php">Home</a></li>
                                                        <li><a href="about.html">About Us</a></li>
                                                        <li><a href="blog-post.html">Blog Post</a></li>
                                                        <li><a href="receipe-post.html">Receipe Post</a></li>
                                                        <li><a href="contact.html">Contact</a></li>
                                                        <li><a href="elements.html">Elements</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Mega Menu</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Catagory</li>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="blog-post.html">Blog Post</a></li>
                                            <li><a href="receipe-post.html">Receipe Post</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Catagory</li>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="blog-post.html">Blog Post</a></li>
                                            <li><a href="receipe-post.html">Receipe Post</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li class="title">Catagory</li>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.html">About Us</a></li>
                                            <li><a href="blog-post.html">Blog Post</a></li>
                                            <li><a href="receipe-post.html">Receipe Post</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                        </ul>
                                        <div class="single-mega cn-col-4">
                                            <div class="receipe-slider owl-carousel">
                                                <a href="#"><img src="img/bg-img/bg1.jpg" alt=""></a>
                                                <a href="#"><img src="img/bg-img/bg6.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
<!--                                <li><a href="receipe-post.html">Receipies</a></li>-->
<!--                                <li><a href="receipe-post.html">4 Vegans</a></li>-->
                                <li><a href="contact.html">Contacto</a></li>
                            </ul>

                            <!-- Newsletter Form -->
                            <div class="search-btn">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <!--<button class="btn btn-sm" style="background-color:transparent;"><i class="fa fa-shopping-cart fa-2x"></i></button>-->
                            <?php
                            if (!empty($_SESSION["usuario"])) {
                                echo '&nbsp;<ul><li><a style="cursor:pointer;" id="btnChecarCarrito" data-toggle="modal" data-target="#carritoDeCompras" title="Carrito de compras"><i class="fa fa-shopping-cart"></i></a></li></ul>';
                                echo '&nbsp;<a class="dropdown-toggle" style="cursor:pointer;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
                                . '<i class="fa fa-user"></i> Mi perfil'
                                . '</a>'
                                . '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'
                                . '<a class="ml-3" href="logout.php"><i class="fa fa-sign-out"></i> Cerrar sesión</a>'
                                . '</div>';
                            } else {
                                echo '&nbsp;<ul><li><a style="cursor:pointer;" data-toggle="modal" data-target="#modalAcceder" title="Acceder"><i class="fa fa-sign-in"></i> Acceder</a></li></ul>';
                            }
                            ?>    
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>