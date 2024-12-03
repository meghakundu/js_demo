<?php
	include 'db_connect.php';
    $sqlQuery = "SELECT COUNT(review) as review_cnt,given_by FROM `reviews` GROUP BY `given_by`";
$resultset = mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pie Chart</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 align="center">Popularity by reviews</h1>
			</div>
		</div>
	</div>
	 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var dataset = google.visualization.arrayToDataTable([
          ['year','male_cnt'],
          <?php
          	while ($row = mysqli_fetch_array($resultset)) {
          		//echo "<pre>";print_r($row); die;
          		echo "['".$row["given_by"]."',".$row["review_cnt"]."],  ";
          	}
          ?>
        ]);
        var options = {
          title: 'Popularity by reviews',
         // pieHole: 0.4,
          is3d:true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(dataset, options);
      }
    </script>
    <div id="piechart" style="width: 100%; height: 500px;"></div>
</body>
</html>