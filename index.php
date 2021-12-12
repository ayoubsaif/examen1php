<?php
    include 'db.php';
    $query = 'SELECT id, unidades, producto FROM lista';
?>
<html>
    <head>
    </head>
    <body>
        <h1>Lista de la compra</h1>
        <hr>
        <a href="/insertar.php">Añadir nuevo producto</a>
        <table border="1">
            <thead>
                <tr>
                    <td>Cantidad</td>
                    <td>Producto</td>
                    <td>Modificar</td>
                    <td>Borrar</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                if ($resultado = mysqli_query($mysqli, $query)) {

                    /* obtener array asociativo */
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo '<tr>';
                            echo '<td>'.$row['unidades'].'</td>';
                            echo '<td>'.$row['producto'].'</td>';
                            echo '<td><a href="/editar.php?product_id='.$row['id'].'">EDITAR</a></td>';
                            echo '<td><a href="/eliminar.php?product_id='.$row['id'].'">BORRAR</a></td>';
                        echo '</tr>';
                    }
                
                    /* liberar el conjunto de resultados */
                    mysqli_free_result($resultado);
                }
                ?>
                </tr>
            </tbody>
        </table>
    </body>
</html>