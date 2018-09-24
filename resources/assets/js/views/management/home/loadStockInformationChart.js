/**
* Script para popular o chart de informação de estoque
*/

$(document).ready(function() {
	loadStockInformationCharts();
});

$(window).resize(function() {
	setTimeout(function() {
		loadStockInformationCharts();
	}, 500);
});

function loadStockInformationCharts()
{
	if ($('#stockInformationChart').length != 0) {
		dataStockInformationChart = {
			labels: ['12p', '3p', '6p', '9p', '12p', '3a', '6a', '9a'],
			series: [
			[230, 750, 450, 300, 280, 240, 200, 190]
			]
		};

		optionsStockInformationChart = {
			lineSmooth: Chartist.Interpolation.cardinal({
				tension: 0
			}),
			low: 0,
			high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
			chartPadding: {
				top: 0,
				right: 0,
				bottom: 0,
				left: 0
			}
		}

		var stockInformationChart = new Chartist.Line('#stockInformationChart', dataStockInformationChart, optionsStockInformationChart);

		md.startAnimationForLineChart(stockInformationChart);
	}
}