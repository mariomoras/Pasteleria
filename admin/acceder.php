<?php
require_once '../conexion.php';
$mtd = $_POST['mtd'];
switch ($mtd) {
    case "login":
        $usr = htmlentities($_POST['emailA']);
        $pwd = $_POST['passwordA'];
//        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE cCorreo = :n1");
//        $gsent1->bindParam("n1", $usr, PDO::PARAM_STR);
//        $gsent1->execute();
//        $result1= $gsent1->fetch();
//        if($result1[0] != 0){
//        $gsent = $pdo->prepare("SELECT * FROM usuarios WHERE cCorreo = :n1");
//        $gsent->bindParam("n1", $usr, PDO::PARAM_STR);
//        $gsent->execute();
//        $result = $gsent->fetchAll();
//        $d0;$d1;$d2;$d3;$d4;$d5;$d6;
//        foreach ($result as $row){
//         $d0=$row['nIdUsuario'];
//         $d1=$row['cNombre'];
//         $d2=$row['cApellidos'];
//         $d3=$row['cCorreo'];
//         $d4=$row['dCumpleanos'];
//         $d5=$row['cContrasena'];
//         $d6=$row['cPostre'];
//        }
//        if(password_verify($pwd, $d5)){
        session_start();
//            $_SESSION["cliente"]["id"]=$d0;
//            $_SESSION["cliente"]["nombre"]=$d1;
//            $_SESSION["cliente"]["apellidos"]=$d2;
//            $_SESSION["cliente"]["correo"]=$d3;
//            $_SESSION["cliente"]["cumpleanos"]=$d4;
//            $_SESSION["cliente"]["postre"]=$d6;
        $_SESSION["admin"]["nombre"] = 'Mario Jonathan Mora López';
        $_SESSION["admin"]["rol"] = 'Administrador';
        echo 'loginOK';
//        }else{
//            echo '<a>Usuario y/o contraseña incorrectos</a>';
//        }}else{echo '<a>Usuario y/o contraseña incorrectos</a>';}
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

        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE cCorreo = :n1");
        $gsent1->bindParam("n1", $correo, PDO::PARAM_STR);
        $gsent1->execute();
        $result1 = $gsent1->fetch();
        if ($result1[0] == 0) {
            $stmt = $pdo->prepare("INSERT INTO usuarios(cNombre, "
                    . "cApellidos, cGenero, cCorreo, cContrasena, dCumpleanos,"
                    . " cPostre) VALUES (:n1,:n2,:n3,:n4,:n5,:n6,:n7)");
            $stmt->bindParam("n1", $nom1, PDO::PARAM_STR);
            $stmt->bindParam("n2", $nom2, PDO::PARAM_STR);
            $stmt->bindParam("n3", $genero, PDO::PARAM_STR);
            $stmt->bindParam("n4", $correo, PDO::PARAM_STR);
            $stmt->bindParam("n5", $pwd2, PDO::PARAM_STR);
            $stmt->bindParam("n6", $fecha, PDO::PARAM_STR);
            $stmt->bindParam("n7", $gusto, PDO::PARAM_STR);
            $stmt->execute();
            echo '<a>Usuario registrado con exito</a>';
        } else {
            echo '<a>Ya existe una cuenta con esa información</a>';
        }
        break;
    case "logout":
        session_start();
        if (!empty($_SESSION['admin'])) {
            $_SESSION['admin'] = '';
            session_destroy();
        }
        echo 'loginOK';
        break;
    case "clientes":
        $respuesta = $_POST['solicitud'];
        $cliente = $_POST['cliente'];
        if ($respuesta === "Aceptado") {
            $stmt = $pdo->prepare("UPDATE `tblcliente` SET `nActivado`=1  WHERE `nIdCliente`= :n1");
            $stmt->bindParam("n1", $cliente, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            $stmt = $pdo->prepare("UPDATE `tblcliente` SET `cEstatus` = 'R' WHERE `nIdCliente`= :n1");
            $stmt->bindParam("n1", $cliente, PDO::PARAM_INT);
            $stmt->execute();
        }
        $sql1 = $pdo->prepare("SELECT `nIdCliente`,`cNombreNegocio`,`cCorreo`,`cNombreResponsable`,`cUbicacion`,`cTelefono` FROM `tblcliente` WHERE cEstatus is null and nActivado = 0");
        $sql1->execute();
        $rsql1 = $sql1->fetchAll();
        if (Count($rsql1) >= 1) {
            $txt='';
            foreach ($rsql1 as $item) {
                
                $txt.= '<div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">'. $item["cNombreNegocio"].'</h5>
                            <a class="card-text">Responsable: <a class="text-info">'. $item["cNombreResponsable"].'</a></a><br>
                            <a class="card-text">Email: <a class="text-info" href="mailto:'. $item["cCorreo"].'">'. $item["cCorreo"].'</a></a><br>
                            <a class="card-text">Telefono: <a class="text-info" href="tel:'. $item["cTelefono"].'">'. $item["cTelefono"].'</a></a><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <form class="formClientes" method="POST">
                                        <input type="hidden" name="mtd" value="clientes">
                                        <input type="hidden" name="solicitud" value="Aceptado">
                                        <input type="hidden" name="cliente" value="'. $item["nIdCliente"].'">
                                        <button type="submit"  class="btn btn-sm btn-outline-success ml-2"><i class="fa fa-check"></i> Validar</button>
                                    </form>
                                </div>';
                                $txt.='<div class="col-sm-6">
                                    <form class="formClientes" method="POST">
                                        <input type="hidden" name="mtd" value="clientes">
                                        <input type="hidden" name="solicitud" value="Rechazado">
                                        <input type="hidden" name="cliente" value="'. $item["nIdCliente"].'">
                                        <button type="submit" class="btn btn-sm btn-outline-danger mr-2"><i class="fa fa-remove"></i> Rechazar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            $txt = '<div class="col-sm-12 text-center"><div class="card"><div class="card-body"><h5 class="card-title">No hay nuevos registros</h5></div></div></div>';
        }
        echo $txt;
        break;
    default:
        break;
}
?>
