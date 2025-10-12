<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    $row = [];		

    /** Conexión a la base de datos */
    @$link = new mysqli('localhost', 'root', '', 'marketzone2');	

    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br />');
    }

    // Si existe tope, filtramos. Si no, mostramos todo
    if (isset($_GET['tope']) && $_GET['tope'] !== '') {
        $tope = (int)$_GET['tope'];
        $query = "SELECT * FROM productos WHERE unidades <= $tope";
    } else {
        $query = "SELECT * FROM productos";
    }

    if ($result = $link->query($query)) {
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
    }

    $link->close();
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script type="text/javascript">
			function modificarProducto(event) {
				var rowId = event.target.parentNode.parentNode.id;
				var data = document.getElementById(rowId).querySelectorAll(".row-data");

				var id       = data[0].innerHTML;
				var nombre   = data[1].innerHTML;
				var marca    = data[2].innerHTML;
				var modelo   = data[3].innerHTML;
				var precio   = data[4].innerHTML;
				var unidades = data[5].innerHTML;
				var detalles = data[6].innerHTML;
				var imagen   = data[7].querySelector("img").src;

				var form = document.createElement("form");
				form.method = "POST";
				form.action = "http://localhost/tecweb/practicas/p10/formulario_productos_v2.php";

				function addField(name, value) {
					var input = document.createElement("input");
					input.type = "hidden";
					input.name = name;
					input.value = value;
					form.appendChild(input);
				}

				addField("id", id);
				addField("nombre", nombre);
				addField("marca", marca);
				addField("modelo", modelo);
				addField("precio", precio);
				addField("unidades", unidades);
				addField("detalles", detalles);
				addField("imagen", imagen);

				document.body.appendChild(form);
				form.submit();
			}
		</script>
	</head>
	<body>
		<h3>PRODUCTOS</h3>
		<br/>
		
		<?php if (!empty($row)) : ?>
    	<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Precio</th>
					<th>Unidades</th>
					<th>Detalles</th>
					<th>Imagen</th>
					<th>Acción</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($row as $registro) : ?>
					<tr id="<?= $registro['id'] ?>">
						<td class="row-data"><?= $registro['id'] ?></td>
						<td class="row-data"><?= $registro['nombre'] ?></td>
						<td class="row-data"><?= $registro['marca'] ?></td>
						<td class="row-data"><?= $registro['modelo'] ?></td>
						<td class="row-data"><?= $registro['precio'] ?></td>
						<td class="row-data"><?= $registro['unidades'] ?></td>
						<td class="row-data"><?= utf8_encode($registro['detalles']) ?></td>
						<td class="row-data">
							<img src="<?= $registro['imagen'] ?>" alt="Imagen del producto" width="80" height="80" />
						</td>
						<td><input type="button" value="Modificar" onclick="modificarProducto(event)" /></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<p>No hay productos para mostrar.</p>
	<?php endif; ?>
</body>
</html>