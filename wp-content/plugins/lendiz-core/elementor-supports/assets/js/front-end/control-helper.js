( function( $ ) {
	"use strict";

	jQuery( window ).on( 'elementor:init', function() {
		
		//Drag drop event
		var ControlDragDropItemView = elementor.modules.controls.BaseData.extend( {
			onReady: function() {
				var self = this;
				
				var inp = this.ui.textarea;
				var parnt = $(inp).next('.meta-drag-drop-multi-field');
				var inp_val = $(inp).val();				
				
				var li_count = 0;
				var li_items = {};
				var json_count = 0;
				var json_items = {};
				$(parnt).children( 'ul.meta-items' ).each(function( index ) {
					li_count += $(this).children("li").length;
					$(this).children("li").each(function( index ) {
						li_items[$(this).data("id")] = $(this).text();
					});
				});
				
				if( inp_val ){
					var obj = jQuery.parseJSON( $(inp).val() );
					$.each( obj, function( parent_key, inner_json ) {
						$.each( inner_json, function( key, value ) {
							json_count += 1;
							json_items[key] = value;
						});
					});
				}
				
				var diff_json = {};
				var diff_json_stat = 0;
				if( li_count != json_count && json_count != 0 ){
					var cmp_json_by = '';
					var alt_json_by = '';
					if( li_count > json_count ){
						cmp_json_by = li_items;
						alt_json_by = json_items;
					}else{
						cmp_json_by = json_items;	
						alt_json_by = li_items;
					}
					$.each( cmp_json_by, function( key, value ) {
						if( !alt_json_by[key] ){
							diff_json[key] = value;
							diff_json_stat = 1;
						}
					});
				}
				
				if( inp_val ){
					$.each( obj, function( parent_key, inner_json ) {
						var li_ele = '';
						$.each( inner_json, function( key, value ) {
							li_ele += '<li data-val="'+ value +'" data-id="'+ key +'" class="ui-sortable-handle">'+ value +'</li>';
						});
						$(parnt).children( 'ul.meta-items[data-part='+ parent_key +']' ).html("");
						$(parnt).children( 'ul.meta-items[data-part='+ parent_key +']' ).append( li_ele );
						
						if( diff_json_stat == 1 && parent_key == 'disabled' ){
							$.each( diff_json, function( key, value ) {
								$(parnt).children( 'ul.meta-items[data-part='+ parent_key +']' ).append( '<li data-val="'+ value +'" data-id="'+ key +'" class="ui-sortable-handle">'+ value +'</li>' );
							});
						}
					});
				}

				var dd_json = {};

				$(parnt).find( ".meta-items" ).each(function( index ) {
					
					var cur_items = this;

					var auth = $( cur_items ).parent( ".meta-drag-drop-multi-field" ).children( ".meta-items" );
					var part = $(cur_items).data("part");
					dd_json[part] = {};
					$(cur_items).find( "li" ).each(function( index ) {
						dd_json[part][ $(this).data("id") ] = $(this).data("val");
					});
					$(inp).val( JSON.stringify( dd_json ) ).trigger("input");

					$( cur_items ).sortable({
					  connectWith: auth,
					  update: function () {
						
						var t_dd_json = {};
						$(parnt).find( ".meta-items" ).each(function( index ) {
							var t_cur_items = this;
							var t_part = $(t_cur_items).data("part");
							t_dd_json[t_part] = {};
							$(t_cur_items).find( "li" ).each(function( index ) {
								t_dd_json[t_part][ $(this).data("id") ] = $(this).data("val");
							});
							$(inp).val( JSON.stringify( t_dd_json ) ).trigger("input");
						});

					  }
					});
					
				});

				if( inp.val() == '' ){
					$(inp).val( JSON.stringify( dd_json ) );
				}

			},
			
			saveValue: function() {
				//self.setValue( this.ui.textarea.getText() );
			},

			onBeforeDestroy: function() {
				//self.saveValue();
			}
		} );
		elementor.addControlView( 'dragdrop', ControlDragDropItemView );
		
		//Toggle Switch
		var ControlToggleSwitchItemView = elementor.modules.controls.BaseData.extend( {
			onReady: function() {
				var self = this;
				
				var inp = this.ui.input;
				
				var chk_box = $(inp).prev(".switch");
				if( $(inp).val() == '' ){
					if( $(chk_box).find(".switch-checkbox").prop("checked") == true ){
						$(inp).val("1").trigger("input");
					}else{
						$(inp).val("0").trigger("input");
					}
				}else{
					if( $(inp).val() == "1" ){
						$(chk_box).find(".switch-checkbox").attr("checked", "checked");
					}else{
						$(chk_box).find(".switch-checkbox").removeAttr("checked", "checked");
					}
				}
				
				$(chk_box).find(".switch-checkbox").click(function(){
					if( $(this).prop("checked") == true ){
						$(inp).val("1").trigger("input");
					}else{
						$(inp).val("0").trigger("input");
					}
				});

			},
			
			saveValue: function() {
				//self.setValue( this.ui.textarea.getText() );
			},

			onBeforeDestroy: function() {
				//self.saveValue();
			}
		} );
		elementor.addControlView( 'toggleswitch', ControlToggleSwitchItemView );
		
		//Items Spacing
		var ControlItemSpacingItemView = elementor.modules.controls.BaseData.extend( {
			onReady: function() {
				var self = this;
				
				var inp = this.ui.textarea;
				if( $("#elementor-preview-iframe").contents().find( ".lendiz-inline-css" ).length ){
					/* Shortcode CSS Append */
					var css_out = '';
					$("#elementor-preview-iframe").contents().find( ".lendiz-inline-css" ).each(function() {
						var shortcode = $( this );
						var shortcode_css = shortcode.attr("data-css");		
						css_out += ($).parseJSON( shortcode_css );
					});
					if( css_out != '' ){
						$("#elementor-preview-iframe").contents().find( "head #lendiz-customizer-css" ).remove();
						$("#elementor-preview-iframe").contents().find( "head" ).append( '<style id="lendiz-customizer-css">'+ css_out +'</style>' );
					}
				}
				
				$(inp).change(function() {
					var css_out = '';
					$("#elementor-preview-iframe").contents().find( ".lendiz-inline-css" ).each(function() {
						var shortcode = $( this );
						var shortcode_css = shortcode.attr("data-css");		
						css_out += ($).parseJSON( shortcode_css );
					});
					if( css_out != '' ){
						$("#elementor-preview-iframe").contents().find( "head #lendiz-customizer-css" ).remove();
						$("#elementor-preview-iframe").contents().find( "head" ).append( '<style id="lendiz-customizer-css">'+ css_out +'</style>' );
					}
					
				});

			},
			
			saveValue: function() {
				//self.setValue( this.ui.textarea.getText() );
			},

			onBeforeDestroy: function() {
				//self.saveValue();
			}
		} );
		elementor.addControlView( 'itemspacing', ControlItemSpacingItemView );
				
	} );
	
	var WidgetBlogHandler = function( $scope, $ ) {
		//console.log( $scope );
	};
	
	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		//elementorFrontend.hooks.addAction( 'frontend/element_ready/blog.default', WidgetBlogHandler );
		//console.log( 'ele init' );
	} );
	
	function json_diff(obj1, obj2) {
		const result = {};
		if (Object.is(obj1, obj2)) {
			return undefined;
		}
		if (!obj2 || typeof obj2 !== 'object') {
			return obj2;
		}
		Object.keys(obj1 || {}).concat(Object.keys(obj2 || {})).forEach(key => {
			if(obj2[key] !== obj1[key] && !Object.is(obj1[key], obj2[key])) {
				result[key] = obj2[key];
			}
			if(typeof obj2[key] === 'object' && typeof obj1[key] === 'object') {
				const value = diff(obj1[key], obj2[key]);
				if (value !== undefined) {
					result[key] = value;
				}
			}
		});
		return result;
	}
	
}( jQuery ) );