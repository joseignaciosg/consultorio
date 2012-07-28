<?php 
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-type: application/force-download");
header("Content-Disposition: attachment; filename=\"".basename("clicks.csv")."\";" );
header("Content-Transfer-Encoding: binary");
// exit();

	$dbhost = 'localhost';
	$dbuser = 'doctorj4';
	$dbpass = '5330273aA!';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
	$dbname = 'doctorj4_viewer'; // I select the correct database
	mysql_select_db($dbname);
	$company = $_GET["company"];
	$fp = fopen('clicks.csv','w');
	$q = "SELECT user, mail, DATE, name, campaign, companies.nombre
					FROM image_click, newsletters, companies
					WHERE image_click.newsletter = newsletters.newsletter_id
					AND image_click.company = companies.id
					AND companies.id = $company 
					ORDER BY DATE DESC";
	$query = mysql_query($q);
	while ($row = mysql_fetch_array($query)) {
		$nextline = $row[0] . ',' . $row[1] . ',' . date("d/m/y",strtotime($row[2]))
		. ',' . date("H:i:s",strtotime($row[2])) .',' . $row[3] .',' . $row[4] . "\r\n";
		fwrite($fp,$nextline);
	}
	fclose($fp);

	header("Content-Length: ".filesize("clicks.csv"));
	readfile("clicks.csv");



?>