<?php

	/*
	 * descrip: deletes a tuple from the image_click table
	 * indentified with the sequence attribute id.
	 * 
	 * */

	$dbhost = 'localhost';
	$dbuser = 'doctorj4';
	$dbpass = '5330273aA!';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
	$dbname = 'doctorj4_viewer'; // I select the correct database
	mysql_select_db($dbname);
	$tupleid = $_POST['tupleid'];
	
	$query = "DELETE FROM image_click WHERE id = $tupleid";
	$result = mysql_query($query);
// 	echo $tupleid;

?>