function AtualizeGrafs(Option,xValues,yValues){

	var xValues = [50,60,70,80,90,100,110,120,130,140,150];
	var yValues = [7,8,8,9,9,9,10,11,14,14,15];
	
	new Chart(Option, {
	  	type: "line",
  		data: {
  		  labels: xValues,
   		datasets: [{
     	 fill: false,
     	 lineTension: 0.7,
      	 backgroundColor: "black",
      	 borderColor: "red",
      	 data: yValues
    	}]
  	},
  	options: {
    	legend: {display: false},
    	scales: {
      	yAxes: [{ticks: {min: 0, max:18}}],
    	}
  	}
	});

}

 AtualizeGrafs("graf1");
 
 AtualizeGrafs("graf2");

AtualizeGrafs("graf3");

AtualizeGrafs("graf4");

