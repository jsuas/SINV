                    	<?php include_once('conexion.php'); ?>
            <?php include_once('funciones.php'); ?>
			<?php require_once('encabezado.php'); //es obligatorio ?>
            <?php include_once('menu.php'); ?>
            <?php require_once('lateral.php'); ?>
            <?php
		$conexion1 = mysqli_connect('localhost', 'root', '', 'pacientes') or die('No se pudo conectar a la bdd.');
                $consulta1 = "SELECT id_per, nombre_per, apellidos_per, cargo
FROM personal, cargo
WHERE id_cargo = id_cargo_fk
ORDER BY apellidos_per";
		
		$resultados1 = mysqli_query($conexion1, $consulta1);
?>
            
			<div id="contenido">
		<table>
			<tr>
				<th>LISTA DE DOCTORES REGISTRADOS</th>
			</tr>
                                                <tr>
				<td><a href='newd.php'><img src='icons/createdoctor.png' width='50px'/>Nuevo Doctor</a></td>
			</tr>

			<tr class="yellow">
				<th>CEDULA</th>
				<th>NOMBRES</th>
                                <th>APELLIDOS</th>
                                <th>CARGO</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>
		<?php
		if ($resultados1 != false) {
			while($fila1 = mysqli_fetch_array($resultados1)) {
				echo "<tr><td>" . $fila1['id_per'] . "</td>";
				echo "<td>" . $fila1['nombre_per'] . "</td>";
				echo "<td>" . $fila1['apellidos_per'] . "</td>";
				echo "<td>" . $fila1['cargo'] . "</td>";
				echo "<td><a href='editd.php?id=" . $fila1['id_per'] . "'><img src='icons/edituser.jpg' width='20px'/></a></td> ";
				echo "<td><a href='deld.php?id=" . $fila1['id_per'] . "'><img src='icons/removeuser.jpg' width='20px'/></a></td>";
			
		?>
			
		<?php	
			}
		}		
		?>
		</table>

			</div>
            <?php include_once('pie.php'); ?>