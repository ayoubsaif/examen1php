
<?php
    include 'db.php';

    if (isset($_POST['add'])){
        $producto = '';
        $unidades = 0;
        if (!empty($_POST['producto'])){
            $producto = $_POST['producto'];
        }
        if (!empty($_POST['unidades'])){
            $unidades = $_POST['unidades'];
        }
        $stmt = $mysqli->prepare("INSERT INTO lista(`producto`,`unidades`) VALUES (?, ?)");
        $stmt->bind_param('sd', $producto, $unidades);

        /* ejecuta sentencias prepradas */
        $stmt->execute();

        printf("%d Fila insertada.\n", $stmt->affected_rows);
        $stmt->close();
        $mysqli->close();
    }

?>

<html>
    <head>
        <title>Insertar Producto en la lista</title>
    </head>
    <body>
        
        <h1>Añadir producto</h1>
        <hr>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <label for="producto">Producto</label>
            <input type="text" name="producto"><br>
            <label for="unidades">Unidades</label>
            <input type="number" name="unidades"><br>
            <button type="submit" name="add">Añadir producto</button>
        </form>
        <a href="/">Volver a Inicio</a>
    </body>
</html>
