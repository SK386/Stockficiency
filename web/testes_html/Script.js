function lineGraf(Option,xValues,yValues){

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

function pieGraf(Option,){

var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart(Option, {
  type: "pie",
  data: {
    labels: xValues,	
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: false,
	},
	legend: {
		display: false,
	},
  }
});

}





lineGraf("graf1");
 
pieGraf("graf2");



var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

