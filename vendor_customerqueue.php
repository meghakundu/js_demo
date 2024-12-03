<!DOCTYPE html>
<html>
<head>
<title>Vendors vs Customer Queued</title>
</head>
<body>
    <div class="phppot-container">
        <h1>Vendors vs Customer Queued</h1>
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
		url  : 'queued_data.php',	
		dataType:'json',
		success : function(response){
	    var vendors = [];
        var queuedMembers = [];
      for(var i in response) {
        vendors.push(response[i].company_name);
        queuedMembers.push(response[i].queued_members);
      }		
			var chartdata = {
				labels: vendors,
				datasets: [
				  {
					label: "customers",
					fill: false,
					lineTension: 0.1,
					backgroundColor: "rgba(29, 202, 255, 0.75)",
					borderColor: "rgb(0,0,0)",
					pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
					pointHoverBorderColor: "rgba(29, 202, 255, 1)",
					data: queuedMembers
				  }
				]
			  };
		
			  var ctx = $("#line-chart");
		      var ctx = document.getElementById('line-chart'); // node
              var ctx = document.getElementById('line-chart').getContext('2d');
			  var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				title:'Count of customers queued in shopping app',
				options: {
					scales: {
						x: { title: { display: true, text: 'Actual wait time(minutes)',font: {
							size: 15
						} }},
						y: { title: { display: true, text: 'No_of_customers_queued',font: {
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