<?php
    $host = 'localhost';
    $usuario = 'root';
    $password = '';
    $db = 'listacompra';
    $mysqli = new mysqli($host, $usuario, $password, $db);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>