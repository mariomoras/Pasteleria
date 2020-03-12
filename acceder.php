<?php

require_once 'conexion.php';
$mtd = $_POST['mtd'];
switch ($mtd) {
    case "login":
        $usr = htmlentities($_POST['emailL']);
        $pwd = $_POST['passwordL'];
        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM tblusuario WHERE cCorreo = :n1");
        $gsent1->bindParam("n1", $usr, PDO::PARAM_STR);
        $gsent1->execute();
        $result1 = $gsent1->fetch();
        if ($result1[0] != 0) {
            $gsent = $pdo->prepare("SELECT * FROM tblusuario WHERE cCorreo = :n1");
            $gsent->bindParam("n1", $usr, PDO::PARAM_STR);
            $gsent->execute();
            $result = $gsent->fetchAll();
            $d0;
            $d1;
            $d2;
            $d3;
            $d4;
            $d5;
            $d6;
            $d7;
            $d8;
            $d9;
            $d10;
            $d11;
            foreach ($result as $row) {
                $d0 = $row['nIdUsuario'];
                $d1 = $row['cNombre'];
                $d2 = $row['cApellidos'];
                $d3 = $row['cCorreo'];
                $d4 = $row['dCumpleanos'];
                $d5 = $row['cContrasena'];
                $d6 = $row['cTipoPostre'];
                $d7 = $row['cIntolerancias'];
                $d8 = $row['cAlergias'];
                $d9 = $row['cTelefono'];
                $d10 = $row['cFotoPerfil'];
                $d11 = $row['nActivo'];
            }
            if (password_verify($pwd, $d5)) {
                if ($d11 == 1) {
                    session_start();
                    $_SESSION["usuario"]["id"] = $d0;
                    $_SESSION["usuario"]["nombre"] = $d1;
                    $_SESSION["usuario"]["apellidos"] = $d2;
                    $_SESSION["usuario"]["correo"] = $d3;
                    $_SESSION["usuario"]["cumpleanos"] = $d4;
                    $_SESSION["usuario"]["postre"] = $d6;
                    $_SESSION["usuario"]["intolerancias"] = $d7;
                    $_SESSION["usuario"]["alergias"] = $d8;
                    $_SESSION["usuario"]["telefono"] = $d9;
                    $_SESSION["usuario"]["foto"] = $d10;
                    echo 'loginOK';
                } else {
                    echo '<a>Usuario aun no activado, verifica tu bandeja de mail</a>';
                }
            } else {
                //echo '<script>window.onload=function(){document.forms["miformulario"].submit();}</script><form name="miformulario" action="index.php" method="POST"><input type="hidden" name="mensaje" value="Contrase�a y/o correo incorrectos"></form>';
                echo '<a>Usuario y/o contraseña incorrectos</a>';
            }
        } else {
            echo '<a>Usuario y/o contraseña incorrectos</a>';
        }
        break;
    case "register":
        $nom1 = htmlentities($_POST['nombreR']);
        $nom2 = htmlentities($_POST['apellidoR']);
        $genero = $_POST['generoR'];
        $correo = $_POST['correoR'];
        $gusto = $_POST['gustoR'];
        $fecha = $_POST['fechaR'];
        $pwd = $_POST['passwordR'];
        $pwd2 = password_hash($pwd, PASSWORD_DEFAULT, [15]);

        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM tblusuario WHERE cCorreo = :n1");
        $gsent1->bindParam("n1", $correo, PDO::PARAM_STR);
        $gsent1->execute();
        $result1 = $gsent1->fetch();
        if ($result1[0] == 0) {
            $key = '';
            $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $max = strlen($pattern) - 1;
            for ($i = 0; $i < 25; $i++) {
                $key .= $pattern{mt_rand(0, $max)};
            }
            $stmt = $pdo->prepare("INSERT INTO tblusuario(cNombre, "
                    . "cApellidos, cGenero, cCorreo, cContrasena, dCumpleanos,"
                    . " cTipoPostre, cCodigo) VALUES (:n1,:n2,:n3,:n4,:n5,:n6,:n7,:n8)");
            $stmt->bindParam("n1", $nom1, PDO::PARAM_STR);
            $stmt->bindParam("n2", $nom2, PDO::PARAM_STR);
            $stmt->bindParam("n3", $genero, PDO::PARAM_STR);
            $stmt->bindParam("n4", $correo, PDO::PARAM_STR);
            $stmt->bindParam("n5", $pwd2, PDO::PARAM_STR);
            $stmt->bindParam("n6", $fecha, PDO::PARAM_STR);
            $stmt->bindParam("n7", $gusto, PDO::PARAM_STR);
            $stmt->bindParam("n8", $key, PDO::PARAM_STR);
            $stmt->execute();
            require("class.phpmailer.php");
            require("class.smtp.php");
            try {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->Port = 587;
                $mail->IsHTML(true);
                $mail->CharSet = "utf-8";
                $mail->Host = "mail.gein360.com";
                $mail->Username = "delicious@gein360.com";
                $mail->Password = "Mario_1234";
                $mail->From = "delicious@gein360.com"; // Email desde donde env? el correo.
                $mail->FromName = "Delicious Team";
                $mail->AddAddress($correo); // Esta es la direcci? a donde enviamos los datos del formulario
                $mail->Subject = "-Bienvenido a Delicious-"; // Este es el titulo del email.
                //$mensajeHtml = nl2br($mensaje);
                $mail->Body = '
<html> 
<body>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
<h1>Agradecemos te unas a nuestra plataforma</h1>
<p>Aqui encontraras los mejores pasteles:</p>
<p>Estimado ' . $nom1 . ' ' . $nom2 . ', Bienvenido a Delicious</p>
<p>Presiona el siguiente enlace para activar tu cuenta</p>
    <br><a class="button" href="http://localhost/pasteleria/delicious/activar.php?clv=' . $key . '">Activar cuenta Local</a><br>
        <br><a class="button" href="http://pasteleria.byethost15.com/activar.php?clv=' . $key . '">Activar cuenta Servidor</a><br>
</body> 
</html>
<br />';
                //$mail->AltBody = "{$mensaje} \n\n ";
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->Send();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }


            echo '<a>Usuario registrado con exito</a>';
        } else {
            echo '<a>Ya existe una cuenta con esa información</a>';
        }
        break;
    case "completar":
        $tel = $_POST['nTelefonoC'];
        $ale = $_POST['alergias'];
        $into = $_POST['intolerancias'];
        $nUsr = $_POST['nUsuario'];
        $intolerancias;
        $alergias;
        for ($i = 0; $i < count($into); $i++) {
            if ($i == 0) {
                $intolerancias = $into[$i];
            } else {
                $intolerancias .= "," . $into[$i];
            }
        }
        for ($i = 0; $i < count($ale); $i++) {
            if ($i == 0) {
                $alergias = $ale[$i];
            } else {
                $alergias .= "," . $ale[$i];
            }
        }
        $stmt = $pdo->prepare("UPDATE `tblusuario` SET `cAlergias`=:n2 , `cIntolerancias`=:n3 , `cTelefono`=:n4   WHERE `nIdUsuario`= :n1");
        $stmt->bindParam("n1", $nUsr, PDO::PARAM_STR);
        $stmt->bindParam("n2", $alergias, PDO::PARAM_STR);
        $stmt->bindParam("n3", $intolerancias, PDO::PARAM_STR);
        $stmt->bindParam("n4", $tel, PDO::PARAM_STR);
        $stmt->execute();
        session_start();
        $_SESSION["usuario"]["intolerancias"] = $intolerancias;
        $_SESSION["usuario"]["alergias"] = $alergias;
        $_SESSION["usuario"]["telefono"] = $tel;
        echo "Datos Actualizados";
        break;
    case "carrito":
        $nIdPostre = $_POST['nIdPostre'];
        $nCantidad = $_POST['nCantidad'];
        session_start();
        $nIdUsuario = $_SESSION["usuario"]["id"];
        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM tblcarritocompras WHERE nId_Postre = :n1 and nId_Usuario = :n2 and cEstatus is null");
        $gsent1->bindParam("n1", $nIdPostre, PDO::PARAM_INT);
        $gsent1->bindParam("n2", $nIdUsuario, PDO::PARAM_INT);
        $gsent1->execute();
        $result1 = $gsent1->fetch();
        if ($result1[0] == 0) {
            $stmt = $pdo->prepare("INSERT INTO tblcarritocompras(nId_Usuario, nId_Postre, nCantidad)"
                    . " VALUES (:n1,:n2,:n3)");
            $stmt->bindParam("n1", $nIdUsuario, PDO::PARAM_INT);
            $stmt->bindParam("n2", $nIdPostre, PDO::PARAM_INT);
            $stmt->bindParam("n3", $nCantidad, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo '<i class="fa fa-shopping-cart"></i> Agregado correctamente al carrito';
            } else {
                echo 'no se pudo';
            }
        } else {
            $stmt = $pdo->prepare("UPDATE tblcarritocompras SET nCantidad = :n3 WHERE nId_Usuario = :n1 and nId_Postre = :n2 and cEstatus is null ");
            $stmt->bindParam("n1", $nIdUsuario, PDO::PARAM_INT);
            $stmt->bindParam("n2", $nIdPostre, PDO::PARAM_INT);
            $stmt->bindParam("n3", $nCantidad, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo 'El elemento ya existia en tu carrito.<br><i class="fa fa-shopping-cart"></i> Carrito de compras actualizado';
            } else {
                echo 'no se pudo';
            }
        }
        break;
    case "verCarrito":
        session_start();
        $nIdUsuario = $_SESSION["usuario"]["id"];
        $sqlPo = $pdo->prepare("SELECT t1.nIdCarrito, t1.nId_Postre, t2.cNombre,t3.cNombreNegocio, t2.nPrecio, t1.nCantidad, SUM(t1.nCantidad * t2.nPrecio) AS nTotal FROM tblcarritocompras t1 INNER JOIN catpostre t2 ON t1.nId_Postre = t2.nIdPostre INNER JOIN tblcliente t3 ON t2.nIdClienteRegistro = t3.nIdCliente WHERE t1.cEstatus is null and t1.nId_Usuario = :n1 GROUP By t1.nIdCarrito ORDER By t3.cNombreNegocio");
        $sqlPo->bindParam("n1", $nIdUsuario, PDO::PARAM_INT);
        $sqlPo->execute();
        $rsqlPo = $sqlPo->fetchAll();
        listarCarrito($rsqlPo);
        break;
    case "eliminarItem":
        $item = $_POST["item"];
        $sqlPo = $pdo->prepare("UPDATE `tblcarritocompras` SET `cEstatus`='B' WHERE nIdCarrito = :n1");
        $sqlPo->bindParam("n1", $item, PDO::PARAM_INT);
        if ($sqlPo->execute()) {
            session_start();
            $nIdUsuario = $_SESSION["usuario"]["id"];
            $sqlPo = $pdo->prepare("SELECT t1.nIdCarrito, t1.nId_Postre, t2.cNombre,t3.cNombreNegocio, t2.nPrecio, t1.nCantidad, "
                    . "SUM(t1.nCantidad * t2.nPrecio) AS nTotal FROM tblcarritocompras t1 "
                    . "INNER JOIN catpostre t2 ON t1.nId_Postre = t2.nIdPostre INNER JOIN tblcliente t3 ON t2.nIdClienteRegistro = t3.nIdCliente "
                    . "WHERE t1.cEstatus is null and t1.nId_Usuario = :n1 GROUP By t1.nIdCarrito ORDER By t3.cNombreNegocio");
            $sqlPo->bindParam("n1", $nIdUsuario, PDO::PARAM_INT);
            $sqlPo->execute();
            $rsqlPo = $sqlPo->fetchAll();
            listarCarrito($rsqlPo);
        } else {
            echo '<tr><th>Error al Eliminar item, cierra y vuelve a abrir el carrito</th></tr>';
        }
        break;
    default:
        break;
}

function listarCarrito($rsqlPo) {
    if(Count($rsqlPo) >= 1){
    $total=0;
    $txt = '<thead class="bg-info text-white"><tr><th scope="col">Vendedor</th><th scope="col">Producto</th><th scope="col">$-pz</th>'
            . '<th scope="col">Cantidad</th><th scope="col">Total</th><th scope="col"><a>Acciones</a></th></tr></thead><tbody>';
    foreach ($rsqlPo as $item) {
        $total= $total+$item["nTotal"];
        $txt .= '<tr><th>' . $item["cNombreNegocio"] . '</th>'
                . '<th><form id="frmPostre' . $item["nIdCarrito"] . '" action="receipe-post.php" method="POST"><input type="hidden" name="nId_Postre" value="' . $item["nId_Postre"] . '"/><a style="cursor:pointer;" onclick="document.getElementById(' . "'frmPostre" . $item["nIdCarrito"] . "'" . ').submit();" title="Clic para ir al postre/Editar">' . $item["cNombre"] . '</a></form></th>'
                . '<th>' . $item["nPrecio"] . '</th>'
                . '<th>' . $item["nCantidad"] . '</th>'
                . '<th>' . $item["nTotal"] . '</th>'
                . '<th><button class="btn btn-sm btn-outline-warning mr-1" title="Ve al postre y edita la cantidad"><i class="fa fa-edit"></i></button><button onclick="eliminarItem(' . $item["nIdCarrito"] . ');" class="btn btn-sm btn-outline-danger ml-1" title="Eliminar"><i class="fa fa-trash"></i></button></th></tr>';
    }
    $txt .= '<tr><th colspan="4"></th><th colspan="1">Total: '.$total.'</th><th colspan="1"><button class="btn-sm btn btn-outline-info"><i class="fa fa-money"></i> Pagar</button></th></tr>';
    $txt .= '<tbody>';
    echo $txt;}else{
        echo '<a>No tienes nada en el carrito</a>';
    }
}

?>
