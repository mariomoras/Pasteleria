<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pasteleria;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>