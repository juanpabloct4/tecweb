<?php
    // Recibimos los datos enviados por POST
    $id       = intval($_POST['id'] ?? 0);
    $nombre   = trim($_POST['nombre'] ?? '');
    $marca    = trim($_POST['marca'] ?? '');
    $modelo   = trim($_POST['modelo'] ?? '');
    $precio   = floatval($_POST['precio'] ?? 0);
    $detalles = trim($_POST['detalles'] ?? '');
    $unidades = intval($_POST['unidades'] ?? 0);
    $imagen   = trim($_POST['imagen'] ?? 'img/default.png');

    // Crear conexión
    $link = new mysqli('localhost', 'root', '', 'marketzone2');

    // Verificar conexión
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error);
    }

    // Verificar si existe otro producto con el mismo nombre, marca y modelo (excluyendo el actual)
    $check_sql = "SELECT * FROM productos 
                WHERE nombre = '{$nombre}' 
                AND marca = '{$marca}' 
                AND modelo = '{$modelo}' 
                AND id <> $id";

    $result = $link->query($check_sql);

    if ($result->num_rows > 0) {
        echo "<h3 style='color:red;'>Ya existe otro producto con el mismo nombre, marca y modelo.</h3>";
    } else {
        // Actualizar el producto
        $update_sql = "UPDATE productos SET 
                        nombre = '{$nombre}',
                        marca = '{$marca}',
                        modelo = '{$modelo}',
                        precio = {$precio},
                        detalles = '{$detalles}',
                        unidades = {$unidades},
                        imagen = '{$imagen}'
                    WHERE id = $id";

        if ($link->query($update_sql)) {
            echo "<h3 style='color:green;'>Producto actualizado correctamente.</h3>";
            echo "<p><b>ID:</b> $id</p>";
            echo "<p><b>Nombre:</b> $nombre</p>";
            echo "<p><b>Marca:</b> $marca</p>";
            echo "<p><b>Modelo:</b> $modelo</p>";
            echo "<p><b>Precio:</b> $precio</p>";
            echo "<p><b>Unidades:</b> $unidades</p>";
            echo "<p><b>Detalles:</b> $detalles</p>";
            echo "<p><b>Imagen:</b> $imagen</p>";
        } else {
            echo "<h3 style='color:red;'>Error al actualizar el producto: " . $link->error . "</h3>";
        }
    }

$link->close();
?>