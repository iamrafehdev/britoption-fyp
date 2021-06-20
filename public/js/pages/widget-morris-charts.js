//[widget morris charts Javascript]

//Project:	Crypto Admin - Responsive Admin Template
//Primary use:   Used only for the morris charts


$(function () {
    "use strict";

    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
        { y: '2006', a: 100, b: 90 },
		{ y: '2007', a: 75,  b: 65 },
		{ y: '2008', a: 50,  b: 40 },
		{ y: '2009', a: 75,  b: 65 },
		{ y: '2010', a: 50,  b: 40 },
		{ y: '2011', a: 75,  b: 65 },
		{ y: '2012', a: 100, b: 90 }
      ],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Individual Score', 'Team Score'],
		fillOpacity: 1,
		lineWidth:3,
		lineColors: ['#03a9f3', '#f96197'],
		hideHover: 'auto'
    });

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2007', item1: 15489},
        {y: '2008', item1: 56589},
        {y: '2009', item1: 35458},
        {y: '2010', item1: 85698},
        {y: '2011', item1: 56896},
        {y: '2012', item1: 15489},
        {y: '2013', item1: 75896},
        {y: '2014', item1: 55263},
        {y: '2015', item1: 36325},
        {y: '2016', item1: 12586}
      ],
		xkey: 'y',
		ykeys: ['item1'],
		labels: ['Analatics'],
		lineWidth:3,
		pointFillColors: ['rgba(30,136,229,1)'],
		lineColors: ['rgba(30,136,229,1)'],
		hideHover: 'auto',
    });

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#fbae1c", "#00c292", "#926dde"],
      data: [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20}
      ],
      hideHover: 'auto'
    });
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'Mon', a: 55, b: 35, c: 33},
        {y: 'Tue', a: 43, b: 23, c: 73},
        {y: 'Wed', a: 34, b: 94, c: 44},
        {y: 'Thu', a: 75, b: 55, c: 35},
        {y: 'Fri', a: 57, b: 47, c: 97},
        {y: 'Sat', a: 10, b: 60, c: 30},
		{y: 'Sun', a: 86, b: 96, c: 46}
      ],
		barColors: ['#fbae1c', '#00c292', '#926dde'],
		barSizeRatio: 0.5,
		barGap:5,
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Morning', 'Evening', 'Night'],
		hideHover: 'auto'
    });
  });