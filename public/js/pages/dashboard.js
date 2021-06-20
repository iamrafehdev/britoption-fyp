//[Dashboard Javascript]

//Project:	Crypto Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
//ticker
 	if ($('#webticker-1').length) {   
		$("#webticker-1").webTicker({
			height:'auto', 
			duplicate:true, 
			startEmpty:false, 
			rssfrequency:5
		});
	}
	
// scrolling  
	  $('#scroll-1').slimScroll({
		height: '300px'
	  });
	  $('#scroll-2').slimScroll({
		height: '300px'
	  });
	
//data table
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    });

//sparkline chart
	$("#sparkline0").sparkline([1,4,8,4,6,8,5,7,2,7,4,1 ], {
        type: 'line',
        width: '100%',
        height: '80',
        lineColor: '#e0bc00',
        fillColor: '#e0bc0073',
        minSpotColor:'#e0bc00',
        maxSpotColor: '#e0bc00',
        highlightLineColor: 'rgba(0, 0, 0, 0.2)',
        highlightSpotColor: '#4f4f4f'
    });
	$("#sparkline1").sparkline([1,2,3,4,3,6,3,5,3,8,4,2 ], {
        type: 'line',
        width: '100%',
        height: '80',
        lineColor: '#03a9f3',
        fillColor: '#03a9f37d',
        minSpotColor:'#03a9f3',
        maxSpotColor: '#03a9f3',
        highlightLineColor: 'rgba(0, 0, 0, 0.2)',
        highlightSpotColor: '#03a9f3'
    });
    $("#sparkline2").sparkline([0,3,6,3,4,2,6,1,8,4,4,2 ], {
        type: 'line',
        width: '100%',
        height: '80',
        lineColor: '#ab8ce4',
        fillColor: '#ab8ce494',
        minSpotColor:'#ab8ce4',
        maxSpotColor: '#ab8ce4',
        highlightLineColor: 'rgba(0, 0, 0, 0.2)',
        highlightSpotColor: '#ab8ce4'
    });
    $("#sparkline3").sparkline([2,4,7,3,5,3,6,3,4,3,2,1,2 ], {
        type: 'line',
        width: '100%',
        height: '80',
        lineColor: '#e4e7ea',
        fillColor: '#e4e7ea5c',
        minSpotColor:'#e4e7ea',
        maxSpotColor: '#e4e7ea',
        highlightLineColor: 'rgba(0, 0, 0, 0.2)',
        highlightSpotColor: '#e4e7ea'
    });

	

//-----amchart3
var chart = AmCharts.makeChart( "chartdiv3", {
  "type": "gauge",
  "theme": "light",
  "startDuration": 0.3,
  "marginTop": 25,
  "marginBottom": 5,
  "axes": [ {
    "axisAlpha": 0.3,
    "endAngle": 360,
    "endValue": 12,
    "minorTickInterval": 0.2,
    "showFirstLabel": false,
    "startAngle": 0,
    "axisThickness": 1,
    "valueInterval": 1
  } ],
  "arrows": [ {
    "radius": "50%",
    "innerRadius": 0,
    "clockWiseOnly": true,
    "nailRadius": 10,
    "nailAlpha": 1
  }, {
    "nailRadius": 0,
    "radius": "80%",
    "startWidth": 6,
    "innerRadius": 0,
    "clockWiseOnly": true
  }, {
    "color": "#CC0000",
    "nailRadius": 4,
    "startWidth": 3,
    "innerRadius": 0,
    "clockWiseOnly": true,
    "nailAlpha": 1
  } ],
  "export": {
    "enabled": true
  }
} );

// update each second
setInterval( updateClock, 1000 );

// update clock
function updateClock() {
  if(chart.arrows.length > 0){
    // get current date
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    if(chart.arrows[ 0 ].setValue){
      // set hours
      chart.arrows[ 0 ].setValue( hours + minutes / 60 );
      // set minutes
      chart.arrows[ 1 ].setValue( 12 * ( minutes + seconds / 60 ) / 60 );
      // set seconds
      chart.arrows[ 2 ].setValue( 12 * date.getSeconds() / 60 );
      }
  }
}
	
}); // End of use strict
