
<html>
<?php
	$con = mysql_connect("localhost", "root", "whiteflag");
	if (!$con){
		echo "Fallo la conexion";
	}else{
		echo "Conexion establecida";
		mysql_select_db("consultorioDB", $con);		
	}
	
	mysql_query("INSERT INTO Pacientes VALUES ('$_POST[nombre]', '$_POST[apellido]', '$_POST[direccion]', 
					'$_POST[estudio]', '$_POST[dni]' )");
	echo "  Su informacion esta en nuestra base de datos";
	
	mysql_close($con);
?>


</html>

