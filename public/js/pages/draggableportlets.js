//[Javascript]

//Project:	Crypto Admin - Responsive Admin Template

$(function () {
  'use strict';
	$('.grid-stack').gridstack({
		width: 12,
		alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
		resizable: {
			handles: 'e, se, s, sw, w'
		}
	});
	
}); // End of use strict
