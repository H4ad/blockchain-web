/**
 * Script para popular o chart de Vendas diárias.
 */

$(document).ready(function() {
	loadDailyCharts();
});

 $(window).resize(function() {
 	setTimeout(function() {
		loadDailyCharts();
	}, 500);
 });

 function loadDailyCharts()
 {
 	if ($('#dailySalesChart').length != 0) {
		dataDailySalesChart = {
			labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
			series: [
			[12, 17, 7, 17, 23, 18, 38]
			]
		};

		optionsDailySalesChart = {
			lineSmooth: Chartist.Interpolation.cardinal({
				tension: 0
			}),
			low: 0,
			high: 100, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
			chartPadding: {
				top: 0,
				right: 0,
				bottom: 0,
				left: 0
			},
		}

		var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

		md.startAnimationForLineChart(dailySalesChart);
	}
 }