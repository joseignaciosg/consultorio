<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="es" />
<meta name="LANGUAGE" content="es" />
<meta name="DISTRIBUTION" content="Global" />
<title> Envienos un mail </title>
<script language="JavaScript">
function ValidarEmail(elemento)
{
	if (elemento.value.indexof("@") == -1 )
	{
		alert("Introduzca una dirección de correo electronica correcta")
		elemento.focus()		
		elemento.select()
	}
}
</script>
</head>
<body>

<form action="sendmail2.php" method="post">
Nombre: <input type="text" name="nombre" /> <br/>
Apellido: <input type="text" name="apellido" /> <br/>
E-mail: <input type="text" name="mail" onblur="ValidarEmail(this)" /> <br/>
<textarea rows="10" cols="30" name="mensaje">
Escriba aquí su consulta.
</textarea><br/>
<input type="submit" />
</form>

</body>

</html>