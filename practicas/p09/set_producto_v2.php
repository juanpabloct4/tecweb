<?php
    $nombre = trim($_POST['nombre'] ?? '');
    $marca = trim($_POST['marca'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $precio = floatval($_POST['precio'] ?? 0);
    $detalles = trim($_POST['detalles'] ?? '');
    $unidades = intval($_POST['unidades'] ?? 0);
    $imagen = trim($_POST['imagen'] ?? '');
    $id = intval($_POST['id'] ?? 0);

    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', '', 'marketzone2');	

    /** comprobar la conexión */
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
    }

    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
    }

    // Si llega un ID => actualizar
    if ($id > 0) {
        $sql = "UPDATE productos SET 
                    nombre='{$nombre}', 
                    marca='{$marca}', 
                    modelo='{$modelo}', 
                    precio={$precio}, 
                    detalles='{$detalles}', 
                    unidades={$unidades}, 
                    imagen='{$imagen}'
                WHERE id={$id}";
        if ($link->query($sql)) {
            echo "<h3 style='color:green;'>Producto actualizado correctamente</h3>";
        } else {
            echo "<h3 style='color:red;'>Error al actualizar el producto: " . $link->error . "</h3>";
        }
    } else {
        // Insertar si no existe
        $check_sql = "SELECT * FROM productos 
                    WHERE nombre='{$nombre}' AND marca='{$marca}' AND modelo='{$modelo}'";
        $result = $link->query($check_sql);

        if ($result->num_rows > 0) { // Ya existe
            echo "<h3 style='color:red;'>El producto ya existe en la base de datos.</h3>";
        } else {
            $insert_sql = "INSERT INTO productos 
                            (nombre, marca, modelo, precio, detalles, unidades, imagen)
                            VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";
            if ($link->query($insert_sql)) {
                $id_insert = $link->insert_id;
                echo "<h3 style='color:green;'>Producto insertado correctamente (ID: $id_insert)</h3>";
            } else {
                echo "<h3 style='color:red;'>Error al insertar el producto: " . $link->error . "</h3>";
            }
        }
    }

    $link->close();
?>
