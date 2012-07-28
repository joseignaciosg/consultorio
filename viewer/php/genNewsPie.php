<?php 



$dbhost = 'localhost';
$dbuser = 'doctorj4';
$dbpass = '5330273aA!';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
$dbname = 'doctorj4_viewer'; // I select the correct database
mysql_select_db($dbname);




echo "<html>
		  <head>
		    <!--Load the AJAX API-->
		    <script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>
		    <script type=\"text/javascript\">
		    
		      // Load the Visualization API and the piechart package.
		      google.load('visualization', '1.0', {'packages':['corechart']});
		      
		      // Set a callback to run when the Google Visualization API is loaded.
		      google.setOnLoadCallback(drawChart);
		      
		      // Callback that creates and populates a data table, 
		      // instantiates the pie chart, passes in the data and
		      // draws it.
		      function drawChart() {
		
		      // Create the data table.
		      var data = new google.visualization.DataTable();
		      data.addColumn('string', 'Topping');
		      data.addColumn('number', 'Slices');
		      data.addRows([";
		    
			$company = $_GET["company"];
			$query ="SELECT newsletters.name, COUNT(image_click.user) 
					FROM image_click, newsletters 
					WHERE newsletter = newsletter_id 
					AND image_click.company = $company 
					GROUP BY newsletters.name";
			$ans = mysql_query($query, $conn);
			$i=0;
			while ( $fila = mysql_fetch_array($ans) ){
				echo "['$fila[0]', $fila[1] ],";
				$i++;
			}
				
			
			echo "]); 
			     // Set chart options
			      var options = {'title':'Aperturas por newsletter',
			                     'width':800,
			                     'height':600};
			
			      // Instantiate and draw our chart, passing in some options.
			      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			      chart.draw(data, options);
			    }
			    </script>
			  </head>
			
			  <body>
			    <!--Div that will hold the pie chart-->
			    <div id=\"chart_div\"></div>
			  </body>
			</html>";








?>