<?php

require_once '../conexion.php';
$mtd = $_POST['mtd'];
switch ($mtd) {
    case "login":
        $usr = htmlentities($_POST['emailC']);
        $pwd = $_POST['passwordC'];
        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE cCorreo = :n1");
        $gsent1->bindParam("n1", $usr, PDO::PARAM_STR);
        $gsent1->execute();
        $result1= $gsent1->fetch();
        if($result1[0] != 0){
        $gsent = $pdo->prepare("SELECT * FROM usuarios WHERE cCorreo = :n1");
        $gsent->bindParam("n1", $usr, PDO::PARAM_STR);
        $gsent->execute();
        $result = $gsent->fetchAll();
        $d0;$d1;$d2;$d3;$d4;$d5;$d6;
        foreach ($result as $row){
         $d0=$row['nIdUsuario'];
         $d1=$row['cNombre'];
         $d2=$row['cApellidos'];
         $d3=$row['cCorreo'];
         $d4=$row['dCumpleanos'];
         $d5=$row['cContrasena'];
         $d6=$row['cPostre'];
        }
        if(password_verify($pwd, $d5)){
            session_start();
            $_SESSION["cliente"]["id"]=$d0;
            $_SESSION["cliente"]["nombre"]=$d1;
            $_SESSION["cliente"]["apellidos"]=$d2;
            $_SESSION["cliente"]["correo"]=$d3;
            $_SESSION["cliente"]["cumpleanos"]=$d4;
            $_SESSION["cliente"]["postre"]=$d6;
            echo 'loginOK';
        }else{
            //echo '<script>window.onload=function(){document.forms["miformulario"].submit();}</script><form name="miformulario" action="index.php" method="POST"><input type="hidden" name="mensaje" value="Contrase�a y/o correo incorrectos"></form>';
            echo '<a>Usuario y/o contraseña incorrectos</a>';
        }}else{echo '<a>Usuario y/o contraseña incorrectos</a>';}
        break;
    case "register":
        $nom1=htmlentities($_POST['nombreR']);
        $nom2=htmlentities($_POST['apellidoR']);
        $genero = $_POST['generoR'];
        $correo = $_POST['correoR'];
        $gusto = $_POST['gustoR'];
        $fecha = $_POST['fechaR'];
        $pwd = $_POST['passwordR'];
        $pwd2 = password_hash($pwd, PASSWORD_DEFAULT, [15]);
        
        $gsent1 = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE cCorreo = :n1");
        $gsent1->bindParam("n1", $correo, PDO::PARAM_STR);
        $gsent1->execute();
        $result1= $gsent1->fetch();
        if($result1[0] == 0){
            $stmt= $pdo->prepare("INSERT INTO usuarios(cNombre, "
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
        }else{echo '<a>Ya existe una cuenta con esa información</a>';}
        break;

    default:
        break;
}
?>
