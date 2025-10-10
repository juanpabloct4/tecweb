<?php
    $nombre = trim($_POST['nombre'] ?? '');
    $marca = trim($_POST['marca'] ?? '');
    $modelo = trim($_POST['modelo'] ?? '');
    $precio = floatval($_POST['precio'] ?? 0);
    $detalles = trim($_POST['detalles'] ?? '');
    $unidades = intval($_POST['unidades'] ?? 0);
    $imagen = trim($_POST['imagen'] ?? '');

    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', '', 'marketzone2');	

    /** comprobar la conexión */
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
    }

    //Verificar si ya existe un producto con ese nombre, marca y modelo
    $check_sql = "SELECT * FROM productos 
            WHERE nombre = '{$nombre}' 
            AND marca = '{$marca}' 
            AND modelo = '{$modelo}'";

    $result = $link->query($check_sql);

    if ($result->num_rows > 0) {// Ya existe
        echo "<h3 style='color:red;'>El producto ya existe en la base de datos.</h3>";
    } else {//Insertar si no existe
        /*$insert_sql = "INSERT INTO productos 
               VALUES (NULL, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";
        */
        $insert_sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
                                    VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

        if ($link->query($insert_sql)) {
            $id = $link->insert_id;
            echo "<h3 style='color:green;'>Producto insertado correctamente</h3>";
            echo "<p><b>ID:</b> $id</p>";
            echo "<p><b>Nombre:</b> $nombre</p>";
            echo "<p><b>Marca:</b> $marca</p>";
            echo "<p><b>Modelo:</b> $modelo</p>";
            echo "<p><b>Precio:</b> $precio</p>";
            echo "<p><b>Detalles:</b> $detalles</p>";
            echo "<p><b>Unidades:</b> $unidades</p>";
            echo "<p><b>Imagen:</b> $imagen</p>";
        } else {
            echo "<h3 style='color:red;'>Error al insertar el producto: " . $link->error . "</h3>";
        }
    }

    $link->close();
?>