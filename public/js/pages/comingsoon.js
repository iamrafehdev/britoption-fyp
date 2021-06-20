//[Javascript]

//Project:	Crypto Admin - Responsive Admin Template

$(function () {

  'use strict';
	var clock; 
	$(document).ready(function() {
		// Grab the current date 
		var currentDate = new Date(); 
		// Set some date in the future. ***change to desired date***
		//var futureDate = new Date(2014, 11, 23, 6, 0, 0);  just remember that the month is 0 based (so 11 is actually December).
		var futureDate = new Date(2018, 4, 25, 6, 0, 0); //fixed as per comments
		// Calculate the difference in seconds between the future and current date 
		var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000; 
		// Instantiate a coutdown FlipClock 
		clock = $('.clock').FlipClock(diff, { clockFace: 'DailyCounter', countdown: true }); 
	});

}); // End of use strict


