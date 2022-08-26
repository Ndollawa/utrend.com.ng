$(function(e){
  'use strict';
	if ($('.canvasDoughnut').length){

	var chart_doughnut_settings = {
			type: 'doughnut',
			tooltipFillColor: "rgba(51, 51, 51, 0.55)",
			data: {
				labels: [
					"Symbian",
					"Blackberry",
					"Other",
					"Android",
					"IOS"
				],
				datasets: [{
					data: [10, 15, 12, 15, 38],
					backgroundColor: [
						"#ff704d",
						"#4dffc9",
						"#ff4d83",
						"#ffc94d",
						"#4d83ff"

					],
					hoverBackgroundColor: [
						"#ff704d",
						"#4dffc9",
						"#ff4d83",
						"#ffc94d",
						"#4d83ff"

					]
				}]
			},
			options: {
				legend: false,
				responsive: false
			}
		}

		$('.canvasDoughnut').each(function(){

			var chart_element = $(this);
			var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

		});

	}
});