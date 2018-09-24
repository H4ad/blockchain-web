/**
 * Script para popular o chart de usuários inscritos
 */

$(document).ready(function() {
	loadUserSubscriptionsChart();
});

 $(window).resize(function() {
 	setTimeout(function() {
 		loadUserSubscriptionsChart();
	}, 500);
 });

 function loadUserSubscriptionsChart()
 {
 	if ($('#userSubscriptionsViewChart').length != 0) {
		var dataWebsiteViewsChart = {
			labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],
			series: [
			[542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]

			]
		};
		var optionsWebsiteViewsChart = {
			axisX: {
				showGrid: false
			},
			low: 0,
			high: 1000,
			chartPadding: {
				top: 0,
				right: 5,
				bottom: 0,
				left: 0
			}
		};
		var responsiveOptions = [
		['screen and (max-width: 640px)', {
			seriesBarDistance: 5,
			axisX: {
				labelInterpolationFnc: function(value) {
					return value[0];
				}
			}
		}]
		];
		var userSubscriptionsData = Chartist.Bar('#userSubscriptionsViewChart', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions);

     	//start animation for the Emails Subscription Chart
     	md.startAnimationForBarChart(userSubscriptionsData);
 	}
 }