<?php require('config.php'); ?>

<?php 
	$asjhdg="SELECT * FROM budget_data LIMIT 3";
	$pie_chart_data[]=array();
	$dg =0;
	foreach($dbo->query($asjhdg)AS $jhg){
		$Instituteshortname = $jhg["Instituteshortname"];
		$Salary_yer1 = $jhg["Overheaded_Total"];
	 	$pie_chart_data[]=array($Instituteshortname, (int)$Salary_yer1);
		  echo "['$Instituteshortname','$Salary_yer1'],"; 
		  $dg  = $dg +1;
	}
	echo"<br>[ $dg  ]";echo"<br>";
	
	$pie_chart_data = json_encode($pie_chart_data);
	echo print_r ($pie_chart_data);
	echo"<br>";
	echo"<br>";
	echo json_encode($pie_chart_data);
	echo"<br>";echo"<br>";
	
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

 /*       var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',  22],
          ['Eat',    9],
          ['Study',  5],
           
        ]);
*/
var data= google.visualization.arrayToDataTable(
	[
		['Name','Data'],
		<?php
		$asjhd5g="SELECT name,type FROM auther_data LIMIT 7";
		 foreach($dbo->query($asjhd5g)AS $jhg5){
			$data1 = $jhg5["name"];
			$data2 = $jhg5["type"];
			 echo "['$data1',$data2],";
		}
		?>
	]);
	 
        var options = {
          title: 'My  Activities Data ',
		  colors:['red','blue','green','pink'],
		  'backgroundColor':'white',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<?php 


?>

<br><br><br><br><br><br>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
/*		
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);
*/
		var data = google.visualization.arrayToDataTable([
		["Element","Density",{role: "style"} ],
		<?php
		
		$asjhd5g="SELECT Instituteshortname,Salary_yer1 FROM budget_data LIMIT 4";
		 foreach($dbo->query($asjhd5g)AS $jhg5){
			$data1 = $jhg5["Instituteshortname"];
			$data2 = $jhg5["Salary_yer1"];
			 echo "['$data1',$data2,'green'],";
		}
		
		?>		
		
		]);
		
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
		  vAxis: {title: 'data ff x '},
          hAxis: {title: 'Month'},
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div> 

<br><br><br><br><br><br>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
 /*
 var data = google.visualization.arrayToDataTable([
          ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
          ['2004/05',  165,      938,         522,             998,           450,      614.6],
          ['2005/06',  135,      1120,        599,             1268,          288,      682],
          ['2006/07',  157,      1167,        587,             807,           397,      623],
          ['2007/08',  139,      1110,        615,             968,           215,      609.4],
          ['2008/09',  136,      691,         629,             1026,          366,      569.6]
        ]);
*/
	var data = google.visualization.arrayToDataTable([
		['data1', 'data2', 'data3', 'data4', 'data5', 'data6', 'data7'],
		<?php 
			$asjhd5g="SELECT * FROM budget_head LIMIT 3 ";
			 foreach($dbo->query($asjhd5g)AS $jhg5){
				$data1 = $jhg5["datetime"];
				$data2 = $jhg5["Captial"];
				$data3 = $jhg5["Manpower"];
				$data4 = $jhg5["Training"];
				$data5 = $jhg5["Workshope"];
				$data6 = $jhg5["Travel"];
				$data7 = $jhg5["Grand_Total"];
				 echo "['$data1',$data2,$data3,$data4,$data5,$data6,$data7],";
				 
		}
		?>
	]); 
        var options = {
          title : 'Monthly Coffee Production by Country',
          vAxis: {title: 'Cups'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>