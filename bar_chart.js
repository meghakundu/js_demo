$(document).ready(function() {
	
	$.ajax({				
		type : 'POST',
		url  : 'chart_data.php',	
		dataType:'json',
		success : function(response){
	    var industries = [];
        var influencers_count = [];
        var advertisers_count = [];

      for(var i in response) {
        industries.push(response[i].role);
        influencers_count.push(response[i].influencers);
        advertisers_count.push(response[i].companies);
      }
	  console.log(advertisers_count);
			// var chartData = JSON.parse(response);
			// var chartOptions = {
			//   'height': 350,
			//   'title': 'Male count of influencers in matchya app',
			//   'width': 1000,
			//   'fixPadding': 18,
			//   'barFont': [0, 12, "bold"],
			//   'labelFont': [0, 13, 0]
			// };
			// graphite(chartData, chartOptions, barChart);		
			var chartdata = {
				labels: industries,
				datasets: [
				  {
					label: "influencers",
					fill: false,
					backgroundColor: "rgba(128,0,0, 0.75)",
					pointHoverBackgroundColor: "rgba(128,0,0,1)",
					data: influencers_count
				  },
				  {
					label: "companies",
					fill: false,
					backgroundColor: "rgba(29, 202, 255, 0.75)",
					pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
					data: advertisers_count
				  }
				]
			  };
		
			  var ctx = $("#mycanvas");
		      var ctx = document.getElementById('mycanvas'); // node
              var ctx = document.getElementById('mycanvas').getContext('2d');
			  var BarGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				title:'Industries Count of influencers in matchya app',
				options: {
					scales: {
						x: { title: { display: true, text: 'Industries',font: {
							size: 15
						} }},
						y: { title: { display: true, text: 'No_of_users',font: {
							size: 15
						} }},
					}
				  }
				}
			  );
			},
			error : function(data) {
		
			}
		  });
		});
