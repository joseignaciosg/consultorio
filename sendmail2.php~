<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="es" />
<meta name="LANGUAGE" content="es" />
<meta name="DISTRIBUTION" content="Global" />
</head>
<body>
<?php
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$mensaje = $_POST["mensaje"];
	$headers = "From:" . $_POST["mail"];
	echo $nombre;
	echo $apellido;
	mail("doctorjosegalindo@gmail.com", "consulta de: " . $nombre , $mensaje , $headers );
	echo "<h3> Su mail ha sido enviado. </h3>";
	
?>
</body>
</html>