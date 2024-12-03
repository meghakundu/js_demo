<!DOCTYPE html>
<html>
<head>
<title>Chart JS Multiple Lines Example</title>
</head>
<body>
    <div class="phppot-container">
        <h1>Chart JS Multiple Lines Example</h1>
        <div>
            <canvas id="line-chart"></canvas>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>  
 
  <script>
		$(document).ready(function() {
	
	$.ajax({				
		type : 'POST',
		url  : 'lineData.php',	
		dataType:'json',
		success : function(response){
	    var industries = [];
        var advertisers_count = [];
      for(var i in response) {
        industries.push(response[i].industry);
        advertisers_count.push(response[i].advertisers);
      }		
			var chartdata = {
				labels: industries,
				datasets: [
				//   {
				// 	label: "influencers",
				// 	fill: false,
				// 	lineTension: 0.1,
				// 	backgroundColor: "rgba(128,0,0, 0.75)",
				// 	borderColor: "rgba(128,0,0,1)",
				// 	pointHoverBackgroundColor: "rgba(128,0,0,1)",
				// 	pointHoverBorderColor: "rgba(128,0,0,1)",
				// 	data: influencers_count
				//   }
				  {
					label: "advertisers",
					fill: false,
					lineTension: 0.1,
					backgroundColor: "rgba(29, 202, 255, 0.75)",
					borderColor: "rgba(29, 202, 255, 1)",
					pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
					pointHoverBorderColor: "rgba(29, 202, 255, 1)",
					data: advertisers_count
				  }
				]
			  };
		
			  var ctx = $("#line-chart");
		      var ctx = document.getElementById('line-chart'); // node
              var ctx = document.getElementById('line-chart').getContext('2d');
			  var BarGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				title:'Industries Count of advertisers in matchya app',
				options: {
					scales: {
						x: { title: { display: true, text: 'Industries',font: {
							size: 15
						} }},
						y: { title: { display: true, text: 'No_of_advertisers',font: {
							size: 15
						} }},
					}
				  }
			  });
			},
			error : function(data) {
		
			}
		  });
		});

	</script>
</body>
</html>