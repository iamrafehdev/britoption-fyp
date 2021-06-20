//[custom Javascript]

//Project:	Crypto Admin - Responsive Admin Template
//Primary use:	Crypto Admin - Responsive Admin Template

//should be included in all pages. It controls some layout



// Fullscreen
$(function () {
	'use strict';
	// Composite line charts, the second using values supplied via javascript
    		
		$("#linechart").sparkline([2,6,4,7,5,8,9,4,10,8,9,12], {
			type: 'line',
			width: '100',
			height: '38',
			lineColor: '#ffffff',
			fillColor: '#03a9f300',
			lineWidth: 2,
			minSpotColor: '#0fc491',
			maxSpotColor: '#0fc491',
		});
		
		$("#barchart").sparkline([2,6,4,7,5,8,9,4,10,8,9,12], {
			type: 'bar',
			height: '38',
			barWidth: 6,
			barSpacing: 4,
			barColor: '#ffffff',
		});
		$("#discretechart").sparkline([2,6,4,7,5,8,9,4,10,8,9,12], {
			type: 'discrete',
			width: '50',
			height: '38',
			lineColor: '#ffffff',
		});
		
		$("#linearea").sparkline([2,6,4,7,5,8,9,4,10,8,9,12], {
			type: 'line',
			width: '100%',
			height: '80',
			lineColor: '#f96197',
			fillColor: '#f96197',
			lineWidth: 2,
		});
		
		$("#baralc").sparkline([2,6,4,7,5,8,9,4,10,8,9,12,10,8,5,4,5,1,2,3,9,5,9], {
			type: 'bar',
			height: '80',
			barWidth: 6,
			barSpacing: 4,
			barColor: '#57c7d4',
		});
		
		$("#lineIncrease").sparkline([2,6,4,7,5,8,9,4,10,8,9,12], {
			type: 'line',
			width: '100%',
			height: '140',
			lineWidth: 2,
			lineColor: '#ffffff',
			fillColor: "#46516100",
			spotColor: '#ffffff',
			minSpotColor: '#ffffff',
			maxSpotColor: '#ffffff',
			spotRadius: 3,
		});
		
		$("#lineToday").sparkline([2,6,4,7,5,8,9,4,10,8,9,12], {
			type: 'line',
			width: '100%',
			height: '70',
			lineColor: '#ffffff',
			fillColor: '#00c292',
			lineWidth: 2,
			spotRadius: 3,
		});
		
		$("#baranl").sparkline([2,6,4,7,5,8,9,4,10,8,9,12,10,8,5,4,5,1,2,3,9,5,9], {
			type: 'bar',
			height: '70',
			barColor: '#ffffff',
			barWidth: 7,
    		barSpacing: 5,
		});
		
		$("#lineTo").sparkline([2,6,4,7,5,8,9,4,10,8,9,12], {
			type: 'line',
			width: '100%',
			height: '70',
			lineColor: '#ffffff',
			fillColor: '#fbae1c',
			lineWidth: 3,
			spotColor: '#ffffff',
			highlightSpotColor: '#ffffff',
			highlightLineColor: '#ffffff',
			spotRadius: 3,
		});
		
		// donut chart
		$('.donut').peity('donut');
		
		// bar chart
		$(".bar").peity("bar");	
}); // End of use strict
		
// easypie chart
	$(function() {
		'use strict';
		$('.easypie').easyPieChart({
			easing: 'easeOutBounce',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
		var chart = window.chart = $('.easypie').data('easyPieChart');
		$('.js_update').on('click', function() {
			chart.update(Math.random()*200-100);
		});
	});// End of use strict