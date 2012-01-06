<html>
<body>
<?php
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	echo $nombre;
	echo $apellido;
	mail("doctorjosegalindo@gmail.com", "consulta", $nombre );
	echo "<h3> Su mail ha sido enviado. </h3>";
	
?>
</body>
</html>