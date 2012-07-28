<?php

	function countryCityFromIP($ipAddr)
	{
		//function to find country and city from IP address
		//Developed by Roshan Bhattarai http://roshanbh.com.np
	
		//verify the IP address for the
		ip2long($ipAddr)== -1 || ip2long($ipAddr) === false ? trigger_error("Invalid IP", E_USER_ERROR) : "";
		$ipDetail=array(); //initialize a blank array
	
		//get the XML result from hostip.info
		$xml = file_get_contents("http://api.hostip.info/?ip=".$ipAddr);
	
		//get the city name inside the node <gml:name> and </gml:name>
		preg_match("@<Hostip>(\s)*<gml:name>(.*?)</gml:name>@si",$xml,$match);
	
		//assing the city name to the array
		$ipDetail['city']=$match[2];
	
		//get the country name inside the node <countryName> and </countryName>
		preg_match("@<countryName>(.*?)</countryName>@si",$xml,$matches);
	
		//assign the country name to the $ipDetail array
		$ipDetail['country']=$matches[1];
	
		//get the country name inside the node <countryName> and </countryName>
		preg_match("@<countryAbbrev>(.*?)</countryAbbrev>@si",$xml,$cc_match);
		$ipDetail['country_code']=$cc_match[1]; //assing the country code to array
	
		//return the array containing city, country and country code
		return $ipDetail;
	
	}
	
	$dbhost = 'localhost';
	$dbuser = 'category';
	$dbpass = '4975_pirata_MORGAN';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
	$dbname = 'category_new'; 
	mysql_select_db($dbname);
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	$user_name = $_GET["name"];
	$user_mail = $_GET["mail"];
	$news = $_GET["news"];
	$campaign = $_GET["campaign"];
	$mysqldate = date( 'Y-m-d H:i:s');
	$IPDetail=countryCityFromIP($_SERVER['REMOTE_ADDR']);
	$country = $IPDetail['country']; //country of that IP address
	
// 	$phpdate = strtotime( $mysqldate );
	if ( $user_name != "*name*" && $user_mail != "*mail*" && $user_name != "" && $user_mail != ""  ){
		
		mysql_query("INSERT INTO image_click values ('$user_name', '$user_mail','$mysqldate', '$news','$campaign','$country')");
		
	}

	$news = intval($news,10);
	switch($news){
		case 1:
			header( 'Location: header.jpg' ) ;
			break;
		case 2:
			header( 'Location: header_global.jpg' ) ;
			break;
	}
?>