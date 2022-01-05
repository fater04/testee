(function( $ ) {
	"use strict";
	$( document ).ready(function() {
		
		$(document).find( '.widget-color-field' ).wpColorPicker({
			change: function(event, ui){ 
				$(this).parents("form").find('input[name="savewidget"]').removeAttr("disabled");					
			}
		});
	
	});
	
})(jQuery);