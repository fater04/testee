/*
 * CEA Admin Script
 */
 
(function( $ ) {
	
	"use strict";
	
	$( document ).ready(function() {
		
		if( $(".lendiz-tab").length ){
			var cur_ele = $( ".lendiz-tab" );			
			cur_ele.find(".tablinks").click(function() {				
				cur_ele.find(".tabcontent:not(.tab-hide)").each(function( index ) {
					$(this).addClass("tab-hide");
				});			
				
				$( '#' + $(this).attr("data-id") ).removeClass("tab-hide");
			});
		}
		
		if( $(".lendiz-submit.button").length ){
			var lendiz_submit = $(".lendiz-submit.button");
			lendiz_submit.click(function() {
			var confirm_stat = confirm(lendiz_ajax_var.confirm_str);
				if( confirm_stat == true ){
					$("#lendiz-form-wrapper").submit();
				}else{
					return false;
				}
			});
		}
		
		if( $(".lendiz-plugin-submit").length ){
			var lendiz_plugin = $(".lendiz-plugin-submit");
			lendiz_plugin.click(function() {
			var confirm_stat = confirm(lendiz_ajax_var.confirm_str);
				if( confirm_stat == true ){
					$("#lendiz-plugin-form-wrapper").submit();
				}else{
					return false;
				}
			});
		}
		
		/*Meta Drag and Drop Multi Field*/
		
		$("#lendiz-portfolio-tab").find( ".meta-drag-drop-multi-field .meta-items" ).each(function( index ) {
			var cur_items = this;
			var auth = $( cur_items ).parent( ".meta-drag-drop-multi-field" ).children( ".meta-items" );
			var part = $( cur_items ).data( "part" );
			var final_val = '';
			var t_json = '';
			final_val = $( cur_items ).parent('.meta-drag-drop-multi-field').children( ".meta-drag-drop-multi-value" );
			final_val.val( JSON.stringify( final_val.data( "params" ) ) );
			$( cur_items ).sortable({
			  connectWith: auth,
			  update: function () {

				t_json = jQuery.parseJSON( final_val.val() );
				t_json[part] = '';
				var t = {};
				$( this ).children( "li" ).each(function( index ) {
					var data_id = $(this).attr('data-id');
					var data_val = $(this).attr('data-val');
					t[data_id] = data_val;
				});
				t_json[part] = t;
				final_val.val( JSON.stringify( t_json ) );

			  }
			});
		});
		
		// Star Rating
		if( $("ul.star-rating").length ){

			$("ul.star-rating > li").hover(function() {
				var index = $( this ).index();
				var parent = $( this ).parent( "ul.star-rating" );
				var i;
				
				//Reset
				$( parent ).find( "li:not(:first-child) > span" ).removeClass( "dashicons-star-filled" ).addClass( "dashicons-star-empty" );
				
				if( index != 0 ){
					for( i = 1; i <= index; i++ ){
						$( parent ).find( "li:eq("+ i +") > span" ).removeClass( "dashicons-star-empty" ).addClass( "dashicons-star-filled" );
					}
				}
				
				$( parent ).next( ".lendiz-meta-rating-value" ).val( index );
				
			});
			
		} // Star rating exists
		
		// Meta Star Rating
		if( $("ul.lendiz-meta-rating").length ){
		
			$( "ul.lendiz-meta-rating" ).each(function( index ) {
				var meta_val = $( this ).next( ".lendiz-meta-rating-value" ).val();
				if( meta_val ){
					//Reset
					$( this ).find( "li:not(:first-child) > span" ).removeClass( "dashicons-star-filled" ).addClass( "dashicons-star-empty" );
					var index = meta_val;
					
					if( index != 0 ){
						var i;
						for( i = 1; i <= index; i++ ){
							$( this ).find( "li:eq("+ i +") > span" ).removeClass( "dashicons-star-empty" ).addClass( "dashicons-star-filled" );
						}
					}
				}
			});
		
		} // Meta star rating exists
		
	}); // document ready end
	
	//Window Load
	$(window).on('load', function() { 
		
		
		
	}); // window load end
			
})( jQuery );

