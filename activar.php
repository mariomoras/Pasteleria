<!DOCTYPE html>
<html lang="es-mx">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Title -->
        <title>Activación de cuenta</title>

        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="style.css">

    </head>

    <body class="text-center">
        <?php
        if (!empty($_GET["clv"])) {
            require_once 'conexion.php';

            $codigo = htmlspecialchars($_GET["clv"]);

            $stmt = $pdo->prepare("UPDATE `tblusuario` SET `nActivo`=1  WHERE `cCodigo`= :n1");
            $stmt->bindParam("n1", $codigo, PDO::PARAM_STR);
            $stmt->execute();
            $cuenta = $stmt->rowCount();
            if ($cuenta <= 0) {
                echo '<h3>Por favor verifica nuevamente tu correo</h3>'
                . '<h4 style="color:red;">Codigo incorrecto o ha sido invalidado</h4>'
                . '<p>Sí tienes problemas contacta al administrador</p>'
                . '<a class="btn btn-sm btn-outline-success" href="./"><i class="fa fa-arrow-left fa-2x"></i> Volver</a>';
            } else {
                echo '<h3>Cuenta activada con exito</h3>'
                . '<a class="btn btn-sm btn-outline-success" href="./"><i class="fa fa-arrow-left fa-2x"></i> Volver</a>';
            }
        } else {
                echo '<h3 class="text-danger">Pagina erronea</h3>'
                . '<a class="btn btn-sm btn-outline-success" href="./"><i class="fa fa-arrow-left fa-2x"></i> Volver</a>';
        }
        ?>
    </body>
</html>