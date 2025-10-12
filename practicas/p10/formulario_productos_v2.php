<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Productos</title>
    <style type="text/css">
        ol, ul { 
            list-style-type: none;
        }
        li {
            margin-bottom: 15px; /* espacio entre cada elemento */
        }
        label {
            display: inline-block;
            width: 150px;
        }
        input, select, textarea {
            padding: 5px;
            width: 250px;
        }
    </style>
    <script>
        function validarFormulario(event) {
            const nombre = document.getElementById("nombre");
            const marca = document.getElementById("marca");
            const modelo = document.getElementById("modelo");
            const precio = document.getElementById("precio");
            const detalles = document.getElementById("detalles");
            const unidades = document.getElementById("unidades");
            const imagen = document.getElementById("imagen");

            if (nombre.value.trim() === "" || nombre.value.length > 100) {
                alert("El nombre es requerido y debe tener máximo 100 caracteres.");
                event.preventDefault();
                return false;
            }

            if (marca.value === "") {
                alert("Debe seleccionar una marca.");
                event.preventDefault();
                return false;
            }

            const modeloRegex = /^[a-zA-Z0-9\s-]+$/;
            if (modelo.value.trim() === "" || modelo.value.length > 25 || !modeloRegex.test(modelo.value)) {
                alert("El modelo es requerido, alfanumérico y de máximo 25 caracteres.");
                event.preventDefault();
                return false;
            }

            if (precio.value === "" || parseFloat(precio.value) <= 99.99) {
                alert("El precio debe ser mayor a 99.99");
                event.preventDefault();
                return false;
            }

            if (detalles.value.length > 250) {
                alert("Los detalles no pueden exceder 250 caracteres.");
                event.preventDefault();
                return false;
            }

            if (unidades.value === "" || parseInt(unidades.value) < 0) {
                alert("Las unidades deben ser un número mayor o igual a 0.");
                event.preventDefault();
                return false;
            }

            if (imagen.value.trim() === "") {
                imagen.value = "img/default.png";
            }

            return true;
        }
    </script>
</head>
<body>
    <?php
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $marca = isset($_POST['marca']) ? $_POST['marca'] : '';
        $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : '';
        $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
        $detalles = isset($_POST['detalles']) ? $_POST['detalles'] : '';
        $unidades = isset($_POST['unidades']) ? $_POST['unidades'] : '';
        $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : 'img/default.png';
    ?>
    <h2>Registro de Productos</h2>

    <form id="formularioProductos" action="http://localhost/tecweb/practicas/p09/set_producto_v2.php" method="post" onsubmit="return validarFormulario(event)">
        <ul>
            <input type="hidden" name="id" value="<?= $id ?>" />
            <li>
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>
            </li>
            <li>
                <label for="marca">Marca:</label>
                <select id="marca" name="marca" required>
                    <option value="">Seleccione una marca</option>
                    <option value="Apple" <?= ($marca == "Apple") ? 'selected' : '' ?>>Apple</option>
                    <option value="Samsung" <?= ($marca == "Samsung") ? 'selected' : '' ?>>Samsung</option>
                    <option value="Xiaomi" <?= ($marca == "Xiaomi") ? 'selected' : '' ?>>Xiaomi</option>
                    <option value="Huawei" <?= ($marca == "Huawei") ? 'selected' : '' ?>>Huawei</option>
                </select>
            </li>
            <li>
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($modelo) ?>" required>
            </li>
            <li>
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" value="<?= htmlspecialchars($precio) ?>" required>
            </li>
            <li>
                <label for="detalles">Detalles:</label>
                <textarea id="detalles" name="detalles" rows="3"><?= htmlspecialchars($detalles) ?></textarea>
            </li>
            <li>
                <label for="unidades">Unidades:</label>
                <input type="number" id="unidades" name="unidades" min="0" value="<?= htmlspecialchars($unidades) ?>" required>
            </li>
            <li>
                <label for="imagen">Ruta de la imagen:</label>
                <input type="text" id="imagen" name="imagen" value="<?= htmlspecialchars($imagen) ?>">
            </li>
        </ui>
        <p>
            <input type="submit" value="Enviar">
            <input type="Limpiar">
        </p>
    </form>
</body>
</html>
