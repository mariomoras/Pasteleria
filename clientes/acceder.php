<?php

require_once '../conexion.php';
$mtd = $_POST['mtd'];
switch ($mtd) {
    case "login":
        $usr = htmlentities($_POST['emailC']);
        $pwd = $_POST['passwordC'];
        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM tblcliente WHERE cCorreo = :n1");
        $gsent1->bindParam("n1", $usr, PDO::PARAM_STR);
        $gsent1->execute();
        $result1 = $gsent1->fetch();
        if ($result1[0] != 0) {
            $gsent = $pdo->prepare("SELECT * FROM tblcliente WHERE cCorreo = :n1");
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
            foreach ($result as $row) {
                $d0 = $row['nIdCliente'];
                $d1 = $row['cNombreNegocio'];
                $d2 = $row['cNombreResponsable'];
                $d3 = $row['cCorreo'];
                $d4 = $row['cTelefono'];
                $d5 = $row['cContrasena'];
                $d6 = $row['cUbicacion'];
                $d7 = $row['nActivado'];
            }
            if (password_verify($pwd, $d5)) {
                if ($d7 == 1) {
                    session_start();
                    $_SESSION["cliente"]["id"] = $d0;
                    $_SESSION["cliente"]["nombreNegocio"] = $d1;
                    $_SESSION["cliente"]["nombreResponsable"] = $d2;
                    $_SESSION["cliente"]["correo"] = $d3;
                    $_SESSION["cliente"]["cTelefono"] = $d4;
                    $_SESSION["cliente"]["cUbicacion"] = $d6;
                    echo 'loginOK';
                } else {
                    echo 'Cuenta no verificada';
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
        $nombre = $nom1 . " " . $nom2;
        $correo = $_POST['correoR'];
        $telefono = $_POST['cTelefonoR'];
        $negocio = $_POST['cNombreNegocioR'];
        $pwd = $_POST['passwordR'];
        $pwd2 = password_hash($pwd, PASSWORD_DEFAULT, [15]);

        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM tblcliente WHERE cCorreo = :n1 OR cNombreNegocio = :n2");
        $gsent1->bindParam("n1", $correo, PDO::PARAM_STR);
        $gsent1->bindParam("n2", $negocio, PDO::PARAM_STR);
        $gsent1->execute();
        $result1 = $gsent1->fetch();
        if ($result1[0] == 0) {
            $stmt = $pdo->prepare("INSERT INTO tblcliente(`cNombreNegocio`, `cCorreo`, `cContrasena`,"
                    . " `cNombreResponsable`, `cTelefono`) VALUES (:n1,:n2,:n3,:n4,:n5)");
            $stmt->bindParam("n1", $negocio, PDO::PARAM_STR);
            $stmt->bindParam("n2", $correo, PDO::PARAM_STR);
            $stmt->bindParam("n3", $pwd2, PDO::PARAM_STR);
            $stmt->bindParam("n4", $nombre, PDO::PARAM_STR);
            $stmt->bindParam("n5", $telefono, PDO::PARAM_STR);
            $stmt->execute();
            echo '<a>Usuario registrado con exito</a>';
        } else {
            echo '<a>Ya existe una cuenta con esa información</a>';
        }
        break;
    case "nuevoPostre":
        session_start();
        if ($_SESSION["cliente"]["id"] != null) {
            try {
                $n1 = $_SESSION["cliente"]["id"];
                $n2 = $_POST['cTipo'];
                $n3 = $_POST['cNombrePostre'];
                $n4 = $_POST['nPrecio'];
                $n5 = $_POST['cTiempoEspera'];
                $n6 = $_POST['cRelleno'];
                $n7 = $_POST['cCubierta'];
                $n8 = $_POST['nPersonas'];
                $carpeta = '../img/postres/' . str_replace(" ", "-", $_SESSION["cliente"]["nombreNegocio"]) . '/' . str_replace(" ", "-", $n3);
                $imgPortada = "";
                $imgPropiedad = "";
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true) or die("No se puede crear el directorio de extracci&oacute;n");
                }
                $currentTimeinSeconds = time();
                $currentDate = date('d-m-Y', $currentTimeinSeconds);
                $contador = 0;
                foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES["archivo"]["name"][$key]) {
                        //$filename = $_FILES["archivo"]["name"][$key];
                        $filename = $currentDate . "-" . $contador . ".jpg";
                        $source = $_FILES["archivo"]["tmp_name"][$key];
                        if ($contador != 0) {
                            $imgPropiedad = $imgPropiedad . "," . $filename;
                        } else {
                            $imgPropiedad = $imgPropiedad . $filename;
                        }
                        $dir = opendir($carpeta);
                        $target_path = $carpeta . '/' . $filename;
                        if (move_uploaded_file($source, $target_path)) {
                            
                        } else {
                            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                        }
                        closedir($dir);
                    }
                    $contador++;
                }
                $stmt = $pdo->prepare("INSERT INTO catpostre(`nIdClienteRegistro`, `cTipo`, `cNombre`, `nPrecio`,"
                        . " `cRelleno`,`cCubierta`, `cTiempoEspera`, `cFotos`, `nPersonas`) VALUES (:n1,:n2,:n3,:n4,:n5,:n6,:n7,:n8,:n9)");
                $stmt->bindParam("n1", $n1, PDO::PARAM_INT);
                $stmt->bindParam("n2", $n2, PDO::PARAM_STR);
                $stmt->bindParam("n3", $n3, PDO::PARAM_STR);
                $stmt->bindParam("n4", $n4, PDO::PARAM_INT);
                $stmt->bindParam("n5", $n6, PDO::PARAM_STR);
                $stmt->bindParam("n6", $n7, PDO::PARAM_STR);
                $stmt->bindParam("n7", $n5, PDO::PARAM_STR);
                $stmt->bindParam("n8", $imgPropiedad, PDO::PARAM_STR);
                $stmt->bindParam("n9", $n8, PDO::PARAM_INT);
                $stmt->execute();
                echo 'Registrado con exito';
            } catch (Exception $ex) {
                echo 'Ocurrio un error al registrar';
            }
        } else {
            echo 'Ocurrio un error al registrar';
        }
        break;
    default:
        break;
}
?>
