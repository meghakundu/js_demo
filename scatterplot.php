
<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<body>

<div id="myPlot" style="width:100%;max-width:700px"></div>

<script>
    alert('123');
    $.ajax({				
		type : 'POST',
		url  : 'plotData.php',	
		dataType:'json',
		success : function(response){
			
			var matches_list = [];
      var influencers = [];

      for(var i in response) {
        matches_list.push(response[i].no_of_matches);
        influencers.push(response[i].influencers);
      }
    
   console.log(matches_list);
    var xArray = matches_list;
    var yArray = influencers;

// Define Data
var data = [{
  x:xArray,
  y:yArray,
  mode:"markers"
}];

// Define Layout
const layout = {
  xaxis: {range: [0,2], title: "No_of_matches"},
  yaxis: {range: [3,180], title: "Influencers"},  
  title: "Influencers vs. no_of_matches"
};

// Display using Plotly
Plotly.newPlot("myPlot", data, layout);
        }

});

</script>

</body>
</html>
