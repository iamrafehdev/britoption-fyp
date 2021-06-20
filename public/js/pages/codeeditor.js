//[Javascript]

//Project:	Crypto Admin - Responsive Admin Template

$(function() {	
  'use strict'
        var editor = ace.edit("editorJS");
		editor.setTheme("ace/theme/monokai");
		editor.getSession().setMode("ace/mode/javascript");

		var editor = ace.edit("editorHTML");
		editor.setTheme("ace/theme/monokai");
		editor.getSession().setMode("ace/mode/html");

		var editor = ace.edit("editorCSS");
		editor.setTheme("ace/theme/monokai");
		editor.getSession().setMode("ace/mode/css");

});
