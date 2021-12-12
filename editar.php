<?php
    include 'db.php';

    if (!empty($_GET['product_id'])){
        $product_id = $_GET['product_id'];
    }else{
        $product_id = $_POST['product_id'];
    }

    if (isset($_POST['update'])){
        $producto = '';
        $unidades = 0;
        $product_id = $_POST['product_id'];
        if (!empty($_POST['producto'])){ $producto = $_POST['producto'];}
        if (!empty($_POST['unidades'])){ $unidades = $_POST['unidades'];}
        $stmt = $mysqli->prepare("UPDATE lista SET producto=? , unidades=? WHERE id=?");

        $stmt->bind_param('sdi', $producto, $unidades, $product_id);

        /* ejecuta sentencias prepradas */
        $stmt->execute();

        printf("%d Fila actualizada.\n", $stmt->affected_rows);
        $stmt->close();
    }

    $query = 'SELECT id, unidades, producto FROM lista WHERE id = ? LIMIT 0,1';
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {
        /* obtener array asociativo */
        while ($row = mysqli_fetch_assoc($result)) {
                $unidades = $row['unidades'];
                $producto = $row['producto'];
        }
        /* liberar el conjunto de resultados */
        mysqli_free_result($result);
    }
    $stmt->close();
?>
<html>
    <head>
    </head>
    <body>
        <h1>Editar producto</h1>
        <hr>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <label for="producto"> Nombre de producto</label>
            <input type="text" name="producto" value="<?php echo $producto ?>">
            <br>
            <label for="unidades"> Unidades</label>
            <input type="number" name="unidades" value="<?php echo $unidades ?>">
            <br>
            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
            <button type="submit" name="update">Guardar</button>
        </form>
        
        <a href="/">Volver a Inicio</a>
    </body>
</html>