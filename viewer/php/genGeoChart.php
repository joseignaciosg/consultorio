<?php 


$dbhost = 'localhost';
$dbuser = 'doctorj4';
$dbpass = '5330273aA!';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
$dbname = 'doctorj4_viewer'; // I select the correct database
mysql_select_db($dbname);
$company = $_GET['company'];
$query = "SELECT country, COUNT( user ) 
			FROM  `image_click` 
			WHERE company = $company
			GROUP BY country";

echo "<html>
<head>
  <script type='text/javascript' src='https://www.google.com/jsapi'></script>
  <script type='text/javascript'>
   google.load('visualization', '1', {'packages': ['geochart']});
   google.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
      var data = new google.visualization.DataTable();";

$ans = mysql_query($query);
$count_rows = mysql_num_rows($ans);
echo       "data.addRows($count_rows);
 			data.addColumn('string', 'Country');
      		data.addColumn('number', 'Popularity');";
		$i=0;
		while ( $fila = mysql_fetch_array($ans) ){
			echo "data.setValue($i, 0, '$fila[0]');
     			  data.setValue($i, 1, $fila[1]);";
			$i++;
		}


echo   " var options = {'title':'Aperturas por country',
			                     'width':1000,
			                     'height':600};

		      var container = document.getElementById('map_canvas');
		      var geochart = new google.visualization.GeoChart(container);
		      geochart.draw(data, options);
		  };
		  </script>
		</head>
		
		<body>
		  <div id='map_canvas'></div>
		</body>
		
		</html>";

?>