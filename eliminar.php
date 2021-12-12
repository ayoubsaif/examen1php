<?php
    include 'db.php';
    if (!empty($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }
    $query = 'DELETE FROM lista WHERE id = ?';
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $product_id);
    $deleted = $stmt->execute();
?>
<html>
    <head>
    </head>
    <body>
        <h1 center><?php 
            if ($deleted ) {
                echo "Producto con ID:".$product_id." se ha eliminado correctamente.";
            }else{
                echo "Ha habido un error al elimnar el producto con el id:".$product_id;
            } 
        ?></h1>
        <a href="/">Volver a Inicio</a>
    </body>
</html>