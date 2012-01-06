<html>

<body>

<?php
echo "<br/>";
echo "<br/>";
$d=date("F");
if ($d=="Januaty"){
	echo "<a href=\"ecosDelMes/ecosdeenero.html\" target=\"showframe\" > Ver Ecografias de Enero</a>" ;
}else if ($d=="February"){
	echo "<a href=\"ecosDelMes/ecosdefebrero.html\" target=\"showframe\" align=\"center\"> Ver Ecografias de Febrero</a>" ;
}else if ($d=="March"){
	echo "<a href=\"ecosDelMes/ecosdemarzo.html\" target=\"showframe\" align=\"center\"> Ver Ecografias de Enero</a>" ;
}else if ($d=="April"){
	echo "<a href=\"ecosDelMes/ecosdeabril.html\" target=\"showframe\" align=\"center\"> Ver Ecografías de Enero</a>" ; 
}	

header("Location: http://www.doctorjosegalindo.com/consultorio/ecosdeDelMes/todoslosanos.html");
// echo "<br/>";
// echo "<br/>";
// echo "<a href=\"ecosDelMes/todoslosanos.html\" target=\"showframe\" align=\"center\"> Ver Ecografias de todos los a&ntilde;os</a>";
	
/*	
	case "May": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>" ; break;
	case "June": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>" ; break;
	case "July": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>" ; break;
	case "August": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>"; break;
	case "September": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>"; break;
	case "October": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>" ; break;
	case "Nobember": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>" ; break;
	case "December": echo "<a href=\"ecosdeenero.html\" target=\"showframe\" > Ver Ecografías de Enero</a>" ; break;
*/
?>

</body>


</html>