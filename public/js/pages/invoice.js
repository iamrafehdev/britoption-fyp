//[avascript]

//Project:	Crypto Admin - Responsive Admin Template

$(function () {
  'use strict';
	
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("section.printableArea").printArea(options);
        });
    });
	
}); // End of use strict
