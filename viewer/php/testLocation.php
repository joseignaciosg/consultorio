<?php 
$ipAddr=  $_SERVER['REMOTE_ADDR'];
// echo geoip_country_code_by_name("192.168.56.1");

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

$IPDetail=countryCityFromIP($ipAddr);
echo $IPDetail['country']; //country of that IP address
echo $IPDetail['city']; //outputs the IP detail of the city
?>