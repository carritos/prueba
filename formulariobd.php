<form action="" method=get>
	cedula <input type=number name=cedula><br>
	nombre <input type=text name=nombre><br>
	correo electronico <input type=email name=correo><br>
	direccion <input type=text name=dirreccion><br>
	numero de pasaporte<input type=text name=pasaporte><bR>
	<input type=submit value=enviar>
</form>

<?php
	
	@$ced=$_REQUEST['cedula'];
	@$nombre=$_REQUEST['nombre'];
	@$correo=$_REQUEST['correo'];
	@$pasaporte=$_REQUEST['pasaporte'];
	@$direccion=$_REQUEST['dirreccion'];
	
	$conn = new Mysqli("localhost", "root", "", "notas") or die (Mysqli_error());
	$sentencia="insert into estudiante  
	values ($ced, '$nombre', '$correo', '$direccion', '$pasaporte')";
	echo $sentencia;
	if ($ced and $nombre){
		Mysqli_query($conn, $sentencia) or die (Mysqli_error());
		echo "<h2>Se ha insertado el dato correctamente</h2>";
	}
?>
<table border=1>
<tr><th>cedula</th><th>n0ombre</th><th>correo</th><th>direccion</th><th>pass</th></tr>

<?php	
	$sentencia="select * from estudiante";
	
	$resul = Mysqli_query($conn, $sentencia) or die (Mysqli_error());
	
	while($fila=Mysqli_fetch_array($resul)){
		echo "<tr>";
		echo "<td>".$fila['cc']."</td>";
		echo "<td>".$fila['nombre']."</td>";
		echo "<td>".$fila['correo']."</td>";
		echo "<td>".$fila['dirrecion']."</td>";
		echo "<td>".$fila['pasaporte']."</td>";
		echo "</tr>";
		
	}
	

?>
</table>



<form action="" method=get>
	<select name=cedulasel>
		<?php
			$sentencia="select * from estudiante";
			$resul = Mysqli_query($conn, $sentencia) or die (Mysqli_error());
			while($fila=Mysqli_fetch_array($resul)){
				echo "<option value=".$fila['cc'].">".$fila['nombre']."</option>";
			}
		?>
	</select>
	<input type=submit value=consultar>
</form>
<?php
	$cedulasel=$_REQUEST['cedulasel']; 
	$sentencia="select * from estudiante where cc=$cedulasel";
	$resul = Mysqli_query($conn, $sentencia) or die (Mysqli_error());
	while($fila=Mysqli_fetch_array($resul)){
		echo "<br>cedula ".$fila['cc'];
		echo "<br>nombre ".$fila['nombre'];
		echo "<br>correo ".$fila['correo'];
		echo "<br>direccion ".$fila['dirrecion'];
		echo "<br>pasaporte ".$fila['pasaporte'];
	}
?>
