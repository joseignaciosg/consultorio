<?php 

$dbhost = 'localhost';
$dbuser = 'doctorj4';
$dbpass = '5330273aA!';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
$dbname = 'doctorj4_viewer'; // I select the correct database
mysql_select_db($dbname);
$company = $_GET['company'];
// echo $last_register;
echo $company;

$query = 	"SELECT newsletter_id, name 
			FROM newsletters
			WHERE company = $company" ;

$ans = mysql_query($query);
while ($row = mysql_fetch_array($ans)){
	echo "<option value=\"$row[0]\">$row[1]</option>";
}


?>