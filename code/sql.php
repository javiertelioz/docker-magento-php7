<?php

$usuario="magento";
$contraseña="myrootpassword";

try {
    $mbd = new PDO('mysql:host=db;dbname=magento', $usuario, $contraseña);
    foreach($mbd->query('show tables') as $fila) {
        print_r($fila);
    }
    $mbd = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
