( function( $ ) {

  var api = wp.customize;

  api.bind( 'pane-contents-reflowed', function() {

    // Reflow sections
    var sections = [];

    api.section.each( function( section ) {

      if (
        'pe_section' !== section.params.type ||
        'undefined' === typeof section.params.section
      ) {

        return;

      }

      sections.push( section );

    });

    sections.sort( api.utils.prioritySort ).reverse();

    $.each( sections, function( i, section ) {

      var parentContainer = $( '#sub-accordion-section-' + section.params.section );

      parentContainer.children( '.section-meta' ).after( section.headContainer );

    });

    // Reflow panels
    var panels = [];

    api.panel.each( function( panel ) {

      if (
        'pe_panel' !== panel.params.type ||
        'undefined' === typeof panel.params.panel
      ) {

        return;

      }

      panels.push( panel );

    });

    panels.sort( api.utils.prioritySort ).reverse();

    $.each( panels, function( i, panel ) {

      var parentContainer = $( '#sub-accordion-panel-' + panel.params.panel );

      parentContainer.children( '.panel-meta' ).after( panel.headContainer );

    });

  });


  // Extend Panel
  var _panelEmbed = wp.customize.Panel.prototype.embed;
  var _panelIsContextuallyActive = wp.customize.Panel.prototype.isContextuallyActive;
  var _panelAttachEvents = wp.customize.Panel.prototype.attachEvents;

  wp.customize.Panel = wp.customize.Panel.extend({
    attachEvents: function() {

      if (
        'pe_panel' !== this.params.type ||
        'undefined' === typeof this.params.panel
      ) {

        _panelAttachEvents.call( this );

        return;

      }

      _panelAttachEvents.call( this );

      var panel = this;

      panel.expanded.bind( function( expanded ) {

        var parent = api.panel( panel.params.panel );

        if ( expanded ) {

          parent.contentContainer.addClass( 'current-panel-parent' );

        } else {

          parent.contentContainer.removeClass( 'current-panel-parent' );

        }

      });

      panel.container.find( '.customize-panel-back' )
        .off( 'click keydown' )
        .on( 'click keydown', function( event ) {

          if ( api.utils.isKeydownButNotEnterEvent( event ) ) {

            return;

          }

          event.preventDefault(); // Keep this AFTER the key filter above

          if ( panel.expanded() ) {

            api.panel( panel.params.panel ).expand();

          }

        });

    },
    embed: function() {

      if (
        'pe_panel' !== this.params.type ||
        'undefined' === typeof this.params.panel
      ) {

        _panelEmbed.call( this );

        return;

      }

      _panelEmbed.call( this );

      var panel = this;
      var parentContainer = $( '#sub-accordion-panel-' + this.params.panel );

      parentContainer.append( panel.headContainer );

    },
    isContextuallyActive: function() {

      if (
        'pe_panel' !== this.params.type
      ) {

        return _panelIsContextuallyActive.call( this );

      }

      var panel = this;
      var children = this._children( 'panel', 'section' );

      api.panel.each( function( child ) {

        if ( ! child.params.panel ) {

          return;

        }

        if ( child.params.panel !== panel.id ) {

          return;

        }

        children.push( child );

      });

      children.sort( api.utils.prioritySort );

      var activeCount = 0;

      _( children ).each( function ( child ) {

        if ( child.active() && child.isContextuallyActive() ) {

          activeCount += 1;

        }

      });

      return ( activeCount !== 0 );

    }

  });


  // Extend Section
  var _sectionEmbed = wp.customize.Section.prototype.embed;
  var _sectionIsContextuallyActive = wp.customize.Section.prototype.isContextuallyActive;
  var _sectionAttachEvents = wp.customize.Section.prototype.attachEvents;

  wp.customize.Section = wp.customize.Section.extend({
    attachEvents: function() {

      if (
        'pe_section' !== this.params.type ||
        'undefined' === typeof this.params.section
      ) {

        _sectionAttachEvents.call( this );

        return;

      }

      _sectionAttachEvents.call( this );

      var section = this;

      section.expanded.bind( function( expanded ) {

        var parent = api.section( section.params.section );

        if ( expanded ) {

          parent.contentContainer.addClass( 'current-section-parent' );

        } else {

          parent.contentContainer.removeClass( 'current-section-parent' );

        }

      });

      section.container.find( '.customize-section-back' )
        .off( 'click keydown' )
        .on( 'click keydown', function( event ) {

          if ( api.utils.isKeydownButNotEnterEvent( event ) ) {

            return;

          }

          event.preventDefault(); // Keep this AFTER the key filter above

          if ( section.expanded() ) {

            api.section( section.params.section ).expand();

          }

        });

    },
    embed: function() {

      if (
        'pe_section' !== this.params.type ||
        'undefined' === typeof this.params.section
      ) {

        _sectionEmbed.call( this );

        return;

      }

      _sectionEmbed.call( this );

      var section = this;
      var parentContainer = $( '#sub-accordion-section-' + this.params.section );

      parentContainer.append( section.headContainer );

    },
    isContextuallyActive: function() {

      if (
        'pe_section' !== this.params.type
      ) {

        return _sectionIsContextuallyActive.call( this );

      }

      var section = this;
      var children = this._children( 'section', 'control' );

      api.section.each( function( child ) {

        if ( ! child.params.section ) {

          return;

        }

        if ( child.params.section !== section.id ) {

          return;

        }

        children.push( child );

      });

      children.sort( api.utils.prioritySort );

      var activeCount = 0;

      _( children ).each( function ( child ) {

        if ( 'undefined' !== typeof child.isContextuallyActive ) {

          if ( child.active() && child.isContextuallyActive() ) {

            activeCount += 1;

          }

        } else {

          if ( child.active() ) {

            activeCount += 1;

          }

        }

      });

      return ( activeCount !== 0 );

    }

  });
 
  //Export theme options
	$( document ).on( "click", "#customize-export-custom-btn", function( e ) {
		// Ajax call
		$( '#customize-export-custom-btn' ).attr( "disabled", "disabled" );
		
		$.ajax({
			type: "post",
			url: ajaxurl,
			data: "action=lendiz-theme-options-export&nonce="+lendiz_admin_ajax_var.export_nounce,
			success: function( data ){
				
				$("<a />", {
					"download": "theme-options.json",
					"href" : "data:application/json," + encodeURIComponent( data )
				}).appendTo("body").on( "click", function() {
					$(this).remove();
				})[0]. click();
				
				$( '#customize-export-custom-btn' ).removeAttr( "disabled" );
				
			}
		});
		return false;
	});	

	$( document ).on( "click", "#customize-import-custom-btn", function( e ) {
		$( '#customize-import-custom-btn' ).attr( "disabled", "disabled" );
		if ( $( '#customize-import-value-box' ).val() === "" ) {
			e.preventDefault();
			return false;
		}else{
			var json_data = '';
			var stat = '';
			if( $( '#customize-import-value-box' ).val() != "" ){
				json_data = $( '#customize-import-value-box' ).val();
				stat = 'data';
			}
			var post_data = { action: "lendiz-theme-option-import", nonce: lendiz_admin_ajax_var.import_nounce, json_data : json_data };
			jQuery.post(ajaxurl, post_data, function( response ) {
				location.reload(true);
				$( '#customize-import-custom-btn' ).removeAttr( "disabled" );
			});
			
			return false;
		}
	});
	
	//Customizer description toggle
	$( document ).on( "click", ".lendiz-customizer-help", function( e ) {
		if( $(this).next(".customize-control-description").length ) $(this).next(".customize-control-description").slideToggle('medium', function() {
			if( $(this).is(':visible') ) $(this).css( 'display','block' );
		});
		return false;
	});

	//Clear temp theme options
	$( document ).on( "click", "#lendiz-customizer-clear-btn", function( e ) {
		$.ajax({
			type: "post",
			url: ajaxurl,
			data: "action=lendiz-temp-options-clear&nonce="+lendiz_admin_ajax_var.clear_nounce,
			success: function( data ){
				location.reload(true);
			}
		});
		return false;
	});
	
	/* Custom wordpress customizer functionalities script */
	var start_up_id = '';
	var typingTimer;
	var doneTypingInterval = 700; 
	
	//Extend the wp.media object
	var custom_uploader = wp.media.frames.file_frame = wp.media({
		title: 'Choose Image',
		button: {
			text: 'Choose Image'
		},
		multiple: false
	});
	
	//Fonts
	var google_fonts = customizer_fonts_vars.google_fonts;
	var g_font_family = jQuery.parseJSON(google_fonts);
	var font_key = '';
	$.each(g_font_family, function (key, data) {
		font_key += '<option data-google="1" value="'+ key +'">'+ key +'</option>';
	});
	
	$( document ).on( "click", 'li[id^="accordion-section-lendiz_"]', function( e ) {
		var sec_id = $(this).attr("id");
		sec_id = sec_id.replace( "accordion-section-", "" );
		customizer_dynamic_fields_fetch( sec_id, '' );
	});

	var btn_stat = 0;
	
	$("input#save").on( "click", function(){
		customizer_save_values_custom_fun();
	});
	
	$(window).load( function(){

		var iFrameDOM = $(document).find('iframe[name^="customize-preview"]').contents();
		place_customizer_field_edit_buttons(iFrameDOM);
		
		//Temp clear
		customizer_set_clear_btn('');
		
	});
	
	function customizer_set_clear_btn(stat){
		if( !$(document).find("#lendiz-customizer-clear-btn").length ){
			if( stat || customizer_fonts_vars.temp_opt_stat == '1' ){
				wp.customize.state( 'saved' ).set( false );
				var t_out = '<button title="'+ customizer_fonts_vars.temp_clear_txt +'" id="lendiz-customizer-clear-btn" class="button-primary button dashicons dashicons-admin-appearance"></button>';
				$("#customize-save-button-wrapper").prepend(t_out);
			}
		}
	}
	
	function customizer_custom_refresh(stat){
		
		if( lendiz_admin_ajax_var.customizer_load == '1' ){
			wp.customize.previewer.refresh();
			//Call customizer button once
			customizer_custom_refresh_stat(btn_stat);
		}	
		
		if( stat == '1' ) wp_customize_custom_js_function_trigger();		
		
	}
	
	function customizer_custom_refresh_stat( stat ){
		if( !stat ){
			wp.customize.previewer.bind('ready', function(){
				setTimeout(function(){
					var iFrameDOM = $(document).find('iframe[name^="customize-preview"]').contents();
					$(iFrameDOM).find("span.customize-partial-edit-shortcut").remove();
					place_customizer_field_edit_buttons(iFrameDOM); },
				1000); 
			});
			btn_stat = 1;
		}
	}
	
	function customizer_dynamic_fields_fetch( trigger_sec, field_name ){
		
		if( $(document).find("#sub-accordion-section-"+ trigger_sec +" li.lendiz-customize-control").length ){
			$(document).find("#customize-control-ajax_trigger_"+ trigger_sec).remove();
		}
		
		if( 
			$(document).find("#sub-accordion-section-"+ trigger_sec +" #ajax_trigger_"+ trigger_sec).length
			&&
			!$(document).find("#sub-accordion-section-"+ trigger_sec +" li.lendiz-customize-control").length
		){
			
			$(document).find("#customize-control-ajax_trigger_"+ trigger_sec).addClass("processing");
			$.ajax({
				type: "post",
				url: ajaxurl,
				data: "action=customizer_fields_trigger&nonce="+lendiz_admin_ajax_var.field_nounce+"&trigger_section="+trigger_sec,
				success: function( data ){
					$(document).find("#customize-control-ajax_trigger_"+ trigger_sec).remove();
					$(document).find("#sub-accordion-section-"+ trigger_sec).append(data);
					
					$(document).find("#sub-accordion-section-"+ trigger_sec ).addClass("ajax-trigger-visible");
					
					//Hide description
					$(document).find("#sub-accordion-section-"+ trigger_sec).find("li.lendiz-customize-control .customize-control-description").slideUp(0);
					
					//Customizer required check process start
					customizer_required_settings();
					
					$(document).find(".lendiz-customize-control .onoffswitch-checkbox").on( "change", function() {	
						setTimeout(function(){ customizer_required_settings(); }, 500);			
					});

					$(document).find('.lendiz-customize-control select.lendiz-customizer-ajax-field').on( "change", function() {
						setTimeout(function(){ customizer_required_settings(); }, 500);
					});

					$(document).find(".lendiz-customize-control .wp-radio-image-list .wp-radio-image-field").on( "click", function() {	
						setTimeout(function(){ customizer_required_settings(); }, 500);
					});
					//Customizer required check process end
					
					//Customizer toggle tab code activate
					lendiz_customizer_toggle_section();

					if( field_name ){
						customizer_trigger_section_focus( trigger_sec, field_name );
					}
					
					setTimeout(function(){ 
						$(document).find("#sub-accordion-section-"+ trigger_sec).find("li.lendiz-customize-control").addClass("control-visible");
					 }, 500);

					customizer_custom_refresh('1');					
				}
			});
		}
	}
	
	// New required code start
	function customizer_required_settings(){	
		var find_ele = '.lendiz-customize-control.lendiz-customize-required';
		var req_parent = $(document).find('.customize-pane-child.ajax-trigger-visible.open');
		
		if( $(req_parent).find(find_ele).length ){
			$(req_parent).find(find_ele).each(function( index ) {
				lendiz_check_required( $(this) );
			});
		}
	}
	
	function lendiz_check_required( ele ){		

		var req_parent_id = $(ele).attr("data-required");
		var data_id = $(ele).attr("data-id");

		if( $('.lendiz-customize-control[data-id="'+ req_parent_id +'"]').attr("data-stat") == "0" ){
			$(ele).attr("data-stat", "0");
			$(ele).slideUp();
		}else{
			var req_parent = $('.lendiz-customize-control[data-id="'+ req_parent_id +'"]');
			var sel_val = lendiz_get_parent_sel_val( req_parent );
			lendiz_show_hide_customizer_fields( sel_val, ele );
		}
		
	}

	function lendiz_get_parent_sel_val( req_parent ){
		var field_type = $(req_parent).attr('data-field-type');
		var sel_val = '';
		if( field_type == 'checkbox' ){
			sel_val = $(req_parent).find(".onoffswitch-checkbox").is(":checked") ? 1 : 0;
		}else if( field_type == 'select' ){
			sel_val = $(req_parent).find('select.lendiz-customizer-ajax-field').val();
		}else if( field_type == 'radio-image' ){
			sel_val = $(req_parent).find(".radio-image-hid-text").val();
		}
		return sel_val;
	}

	function lendiz_show_hide_customizer_fields( sel_val, field ){
		var req_val = $(field).attr("data-required-val");
		var req_cond = $(field).attr("data-required-cond");
		
		if( req_cond == '=' ){
			if( sel_val == req_val ){
				$(field).slideDown(); $(field).attr("data-stat", "1");
			}else{
				$(field).slideUp(); $(field).attr("data-stat", "0");
			}
		}else if( req_cond == '!=' ){
			if( sel_val != req_val ){
				$(field).slideDown(); $(field).attr("data-stat", "1");
			}else{
				$(field).slideUp(); $(field).attr("data-stat", "0");
			}
		}
	}
	// New required code end
	
	//Customizer toggle section code start
	function lendiz_customizer_toggle_section(){
		var find_ele = '.lendiz-customize-control.lendiz-toggle-tab-start';
		var req_parent = $(document).find('.customize-pane-child.ajax-trigger-visible.open');
		
		if( $(req_parent).find(find_ele).length ){
			$(req_parent).find(find_ele).each(function( index ) {
				$(this).nextUntil( ".lendiz-customize-control.lendiz-toggle-tab-end" ).addClass("lendiz-customize-control-close");//slideUp();
				$(this).on( "click", function(){ 
					$(this).toggleClass("opened");
					$(this).nextUntil( ".lendiz-customize-control.lendiz-toggle-tab-end" ).toggleClass("lendiz-customize-control-close");
				});
			});
		}
	}
	
	function customizer_onspot_txt_change( ele, selector ){
		var iFrameDOM = $(document).find('iframe[name^="customize-preview"]').contents();
		var edit_ele;
		if( $(iFrameDOM).find( selector ).children(".customize-partial-edit-shortcut").length ){
			edit_ele = $(iFrameDOM).find( selector ).children(".customize-partial-edit-shortcut").clone();
		}
		
		$(document).find('*[name="'+ ele +'"]').on( "input propertychange paste", function( e ) {
			
			$(iFrameDOM).find(selector).html( $(this).val() );
			$(iFrameDOM).find(selector).prepend(edit_ele);
		});
	}
	
	function lendiz_open_toggle_exists(focus_ele){
		var stat = 1;
		var t_focus_ele = $(focus_ele).parent("li.lendiz-customize-control").length ? $(focus_ele).parent("li.lendiz-customize-control") : $(focus_ele).parents("li.lendiz-customize-control");
		var hard_stat = 1;
		do{
			hard_stat++;
			if( $(t_focus_ele).prev("li").length ){
				if( $(t_focus_ele).prev("li.lendiz-toggle-tab-end").length ){
					stat = 0;
				}else if( $(t_focus_ele).prev("li.lendiz-toggle-tab-start").length ){
					stat = 0;
					if( $(t_focus_ele).prev("li.lendiz-toggle-tab-start:not(.opened)").length ){
						$(t_focus_ele).prev("li.lendiz-toggle-tab-start").trigger("click");
						//toggle_stat = 1;
					}
				}
				t_focus_ele = $(t_focus_ele).prev("li");
			}else{
				stat = 0;
			}
			if( hard_stat > 1000 ) stat = 0;
		}while( stat );
		
	}
	
	function customizer_trigger_section_focus(trigger_sec, field_name){
		
		if( $(document).find("#sub-accordion-section-"+ trigger_sec +" li.lendiz-customize-control").length ){
			
			$(document).find("#customize-control-ajax_trigger_"+ trigger_sec).remove();
			
			wp.customize.section( trigger_sec ).focus();
			var focus_ele = $(document).find("#sub-accordion-section-"+ trigger_sec +" *[name='lendiz_theme_options["+ field_name +"]'");
			lendiz_open_toggle_exists(focus_ele);
			setTimeout(function(){ 
				var t_focus_ele = $(focus_ele).parent("li.lendiz-customize-control").length ? $(focus_ele).parent("li.lendiz-customize-control") : $(focus_ele).parents("li.lendiz-customize-control");
				var li_top = $(t_focus_ele).offset();
				$( '.wp-full-overlay-sidebar-content' ).animate({ scrollTop: li_top.top }, 300);
				$(document).find('li.lendiz-customize-control.stay-focused').removeClass("stay-focused");
				$(t_focus_ele).addClass("stay-focused");
				
				$(document).find('li.lendiz-customize-control.stay-focused').on( "click", function( e ) {
					$(this).removeClass("stay-focused");
				});
				
				$(focus_ele).focus();
			}, 1500);
		}
		
		if( $(document).find("#customize-control-ajax_trigger_"+ trigger_sec).length ){
			wp.customize.section( trigger_sec ).focus();
			customizer_dynamic_fields_fetch(trigger_sec, field_name);
		}

	}
	
	function place_customizer_field_edit_buttons(iFrameDOM){

		var custom_edit_btn = '<span class="customize-partial-edit-shortcut"><button aria-label="Click to edit this element." title="Click to edit this element." class="customize-partial-edit-shortcut-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg></button></span>';
		
		$.each( customizer_on_spot, function( index, fields ) {
			
			var section_id = fields.section_id;
			var field_id = fields.field_id;
			var ele_selctor = fields.selector;

			$(iFrameDOM).find(ele_selctor).prepend(custom_edit_btn);
			var handler = function( e ) {
				customizer_trigger_section_focus(section_id, field_id);
			};
			$(iFrameDOM).on( "click", ele_selctor + "  span.customize-partial-edit-shortcut button", handler );
			
			//Trigger change text
			if( $(document).find('li[data-id="'+ field_id +'"]').attr("data-instant") == '1' )
			customizer_onspot_txt_change( 'lendiz_theme_options['+ field_id +']', ele_selctor );
			
		});

	}
	
	function customizer_on_text_multi_ajax(cur, intrvl){
		
		var typing_interval = intrvl != '' ? intrvl : doneTypingInterval;
		
		clearTimeout(typingTimer);
		typingTimer = setTimeout( function(){  
			customizer_filed_done_array_typing(cur);
		}, typing_interval );		
		
	}
	
	function customizer_filed_done_array_typing(cur){
		
		var formData = new FormData();
		formData.append( "action", "customizer_fields_custom_save" );
		formData.append( "nonce", lendiz_admin_ajax_var.field_nounce );
		
		$( cur ).children("input").each(function( index ) {
			if( $(this).attr("name") ) formData.append( $(this).attr("name"), $(this).val() );
		});

		$.ajax({
			type: "post",
			url: ajaxurl,
			data: formData,
			contentType: false,
			processData: false,
			success: function( data ){
				if( $(cur).parents("li.lendiz-customize-control").attr("data-refresh") == '1' ){
					customizer_custom_refresh('');
				}
			}
		});
	}
	
	function customizer_on_text_typing_ajax(cur, intrvl){
		
		var typing_interval = intrvl != '' ? intrvl : doneTypingInterval;
		
		clearTimeout(typingTimer);
		typingTimer = setTimeout( function(){  
			customizer_filed_done_typing(cur);
		}, typing_interval );		
		wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		
	}
	
	function customizer_filed_done_typing(cur){
		var field_name = $(cur).attr("data-key");
		var field_val = $(cur).val();
		var send_data = "action=customizer_fields_custom_save&nonce="+lendiz_admin_ajax_var.field_nounce+"&field_name="+ field_name +"&field_val="+ field_val;
		$.ajax({
			type: "post",
			url: ajaxurl,
			data: send_data,
			success: function( data ){
				if( $(cur).parents("li.lendiz-customize-control").attr("data-refresh") == '1' ){
					customizer_custom_refresh('');
				}
			}
		});
	}
	
	function customizer_save_values_custom_fun(){
		var form_vals = $("form#customize-controls").serialize();
		var send_data = "action=customizer_fields_custom_save&nonce="+lendiz_admin_ajax_var.field_nounce+"&save_stat=1&form_vals="+ form_vals;
		$.ajax({
			type: "post",
			url: ajaxurl,
			data: send_data,
			success: function( data ){
				$(document).find("#lendiz-customizer-clear-btn").remove();
			}
		});
	}
	
	//Customizer custom fields functions
	function wp_customize_custom_js_function_trigger(){
		
		//Textboz Settings
		customizer_textbox_settings();
		
		//Textarea Settings
		customizer_textarea_settings();
		
		//Select Settings
		customizer_select_settings();
		
		//Image Settings
		customizer_image_settings();
		
		//Wp color picker
		customizer_color_settings();
		
		//Alpha color picker
		customizer_alpha_color_settings();
		
		//Drag and Drop
		customizer_drag_drop_settings();		
		
		//Background Settings
		customizer_background_settings();
		
		//Border Settings
		customizer_border_settings();
		
		//Dimension Settings
		customizer_dimensions_settings();
		
		//Fonts Settings
		customizer_fonts_settings();
		
		//Link Color Settings
		customizer_link_color_settings();
		
		//Multi Check Settings
		customizer_multi_check_settings();
		
		//Radio Image Settings
		customizer_radio_image_settings(); //done
		
		//Toggle Switch Settings
		customizer_toggle_switch_settings();
		
		//Width Height Settings
		customizer_width_height_settings();
		
	}
	
	function customizer_image_settings(){
		//Upload media
		$(document).find('.lendiz-customizer-image-button').on( 'click', function(e) {
			e.preventDefault();
			var cur_ele = $(this);
			var cur = $(cur_ele).parent(".lendiz-customizer-image-btn-wrap").prev(".lendiz-customizer-ajax-hid-wrap");

			//When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on('select', function() {
				
				$(this).attr("data-val", "");
				$(cur_ele).parent(".lendiz-customizer-image-btn-wrap").find("img").remove();
				
				var attachment = custom_uploader.state().get('selection').first().toJSON();
				
				var data_id = attachment.id;
				var data_url = attachment.url;
				
				var data_key = $(cur).attr("data-key");
				$(document).find('input[name="lendiz_theme_options['+ data_key +'][id]"]').val(data_id);
				$(document).find('input[name="lendiz_theme_options['+ data_key +'][url]"]').val(data_url);

				var img_out = '<img src="'+ attachment.url +'" />';				
				$(cur_ele).parent(".lendiz-customizer-image-btn-wrap").prepend(img_out);
				
				customizer_on_text_multi_ajax( cur, 10 );
				wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
			});
			
			//Open the uploader dialog
			custom_uploader.open();

		});
		
		//Remove Image
		$(document).find('.lendiz-customizer-image-remove-button').on( 'click', function(e) {
			e.preventDefault();
			var cur_ele = $(this);
			var cur = $(cur_ele).parent(".lendiz-customizer-image-btn-wrap").prev(".lendiz-customizer-ajax-hid-wrap");
			
			var data_key = $(cur).attr("data-key");
			$(document).find('input[name="lendiz_theme_options['+ data_key +'][id]"]').val('');
			$(document).find('input[name="lendiz_theme_options['+ data_key +'][url]"]').val('');
			
			$(cur_ele).parent(".lendiz-customizer-image-btn-wrap").find("img").remove();
			
			customizer_on_text_multi_ajax( cur, 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_textbox_settings(){
		$(document).find( ".lendiz-customizer-ajax-field.lendiz-customizer-text-field" ).on( "input propertychange paste", function() {
			var cur = this;
			customizer_on_text_typing_ajax( cur, '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_textarea_settings(){
		$(document).find( ".lendiz-customizer-ajax-field.lendiz-customizer-textarea-field" ).on( "input propertychange paste", function() {
			var cur = this;
			customizer_on_text_typing_ajax( cur, '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_select_settings(){
		$(document).find( ".lendiz-customizer-ajax-field.lendiz-customizer-select-field" ).on( "change", function() {
			var cur = this;
			customizer_on_text_typing_ajax( cur, 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_toggle_switch_settings(){
		$(document).find( ".checkbox_switch .onoffswitch-checkbox" ).on( "change", function() {
			var toggle_cur = this;
			var sel_val = $(toggle_cur).is(":checked") ? 1 : 0;
			$(toggle_cur).parents(".checkbox_switch").find(".toggle-switch-hid-text").val(sel_val);
			customizer_on_text_typing_ajax( $(toggle_cur).parents(".checkbox_switch").find(".toggle-switch-hid-text"), 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_width_height_settings(){
		$(document).find( ".wp-width-height-field" ).on( "input paste", function() {
			
			var cur_val = $(this).val();
			var cur_parent = $(this).parents(".wp-width-height-list");

			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);

		});
	}
	
	function customizer_radio_image_settings(){
		$(document).find( ".wp-radio-image-list .wp-radio-image-field" ).on( "click", function() {
			var data_val = $(this).attr("data-val") ? $(this).attr("data-val") : '';
			var ri_parent = $(this).parents(".wp-radio-image-list");
			$(ri_parent).find(".wp-radio-image-field").removeClass("radio-image-active");
			$(this).addClass("radio-image-active");
			$(ri_parent).prev(".radio-image-hid-text").val(data_val);
			customizer_on_text_typing_ajax( $(ri_parent).prev(".radio-image-hid-text"), 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_multi_check_settings(){
		$(document).find( ".wp-multi-check-list .wp-multi-check-field" ).on( "click", function() {

			$(this).toggleClass("multi-check-active");
			
			var cur_parent = $(this).parents(".wp-multi-check-list");
			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			
			$( cur_parent ).find(".wp-multi-check-field").each(function( index ) {
				var chk_stat = $(this).hasClass("multi-check-active") ? true : false;
				
				var data_val = $(this).attr("data-val") ? $(this).attr("data-val") : '';
				var form_name = "lendiz_theme_options["+ data_key +"]["+ data_val +"]";
				
				$(document).find('input[id="' + form_name + '"]' ).val( data_val );
				if( chk_stat ){
					$(document).find('input[id="' + form_name + '"]' ).attr( "name", form_name );
				}else{
					$(document).find('input[id="' + form_name + '"]' ).removeAttr( "name" );
				}

			});
			
			customizer_on_text_multi_ajax( cur, '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);

		});
	}
	
	function customizer_link_color_settings(){
		$(document).find('.wp-color-field').wpColorPicker({
			change: function(event, ui){ 
			
				var cur_val = ui.color.toString();
				var cur_parent = $(this).parents(".link-colors-list");

				var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
				var data_key = $(cur).attr("data-key");
				var data_selector = $(this).attr("data-selector");
				$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
				
				customizer_on_text_multi_ajax( cur, '' );
				wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);

			}
		});
		$(document).find(".lendiz-customize-control .link-colors-inner").on("input", function(){
			customizer_on_text_typing_ajax( $(this), '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
		$(document).find(".wp-picker-clear").on("click", function(){
			customizer_on_text_typing_ajax( $(this), '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_color_settings(){
		$(document).find(".lendiz-customize-color-field").wpColorPicker({
			change: function (event, ui) {
				var cur = event.target;
				customizer_on_text_typing_ajax( cur, '' );
				wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
			}		
		});
		$(document).find(".lendiz-customizer-ajax-field.lendiz-customize-color-field").on("input", function(){
			customizer_on_text_typing_ajax( $(this), '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
		$(document).find(".wp-picker-clear").on("click", function(){
			customizer_on_text_typing_ajax( $(this), '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_alpha_color_settings(){
		$(document).find(".lendiz-customizer-alpha-color").wpColorPicker({
			change: function (event, ui) {
				var cur = event.target;
				customizer_on_text_typing_ajax( cur, '' );
				wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
			}		
		});
		$(document).find(".lendiz-customizer-ajax-field.lendiz-customizer-alpha-color").on("input", function(){
			customizer_on_text_typing_ajax( $(this), '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
		$(document).find(".wp-picker-clear").on("click", function(){
			customizer_on_text_typing_ajax( $(this), '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_drag_drop_settings(){
		
		$(document).find( ".meta-drag-drop-multi-field" ).each(function() {
			
			var cur_items = $(this).children( ".meta-items" );
			var dd_parent = $( this );
			var auth = $(this).children( ".meta-items" );
			var final_val = $( this ).parent('.wp-drag-drop-fields').prev( ".lendiz-customizer-ajax-hid-wrap" );
			
			$( cur_items ).each(function() {
				$( this ).sortable({
				  connectWith: auth,
				  update: function () {

					var dd_out = '';
					var cur_parent = $( cur_items ).parents('.wp-drag-drop-fields').prev(".lendiz-customizer-ajax-hid-wrap");
					var data_key = $(cur_parent).attr("data-key");
					$( dd_parent ).children( "ul.meta-items" ).each(function() {
						var part = $( this ).data( "part" );

						$( this ).children( "li" ).each(function( index ) {
							var data_id = $(this).attr('data-id');
							var data_val = $(this).attr('data-val');
							dd_out += '<input type="text" class="lendiz-customizer-ajax-field drag-drop-hid-text" name="lendiz_theme_options['+ data_key +']['+ part +']['+ data_id +']" value="'+ data_val +'">';

						});

						$(cur_parent).html(dd_out);
					});
					
					customizer_on_text_multi_ajax( final_val, 10 );
					wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);

				  }
				});
			});
			
		}); //ul.meta-items each end
	}
	
	function customizer_dimensions_settings(){
		$(document).find( ".wp-dimensions-field" ).on( "input paste", function() {
			var cur_val = $(this).val();
			var cur_parent = $(this).parents(".wp-dimensions-list");

			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
		});
	}
	
	function customizer_background_settings(){
		
		//Color
		$(document).find('.bg-color-field').each(function(){
			
			$(this).wpColorPicker({
				change: function(event, ui){ 
					var color = ui.color.toString();
					var cur_parent = $(this).parents(".wp-backgrounds-fields");
					
					var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
					var data_key = $(cur).attr("data-key");
					$(document).find('input[name="lendiz_theme_options['+ data_key +'][bg_color]"]').val(color);
					
					customizer_on_text_multi_ajax( cur, '' );
					wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
					
				},
				clear: function (event) {
					var cur_parent = $(this).parents(".wp-backgrounds-fields");
					
					var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
					var data_key = $(cur).attr("data-key");
					$(document).find('input[name="lendiz_theme_options['+ data_key +'][bg_color]"]').val('');
					
					customizer_on_text_multi_ajax( cur, '' );
					wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
					
				}
			});
		});
		
		//Upload media
		$(document).find('.bg-upload-image-button').on( 'click', function(e) {
			e.preventDefault();
			var cur_ele = $(this);
			var cur = $(cur_ele).parent(".wp-backgrounds-fields").prev(".lendiz-customizer-ajax-hid-wrap");
						
			//When a file is selected, grab the URL and set it as the text field's value
			custom_uploader.on('select', function() {
				
				var attachment = custom_uploader.state().get('selection').first().toJSON();
				var data_id = attachment.id;
				var data_url = attachment.url;
				
				if( !$(cur_ele).parent(".wp-backgrounds-fields").find(".bg-img-show-case").length ){
					var _htm_out = '<div class="bg-img-show-case"><img src="'+ data_url +'" alt="'+ data_id +'" /></div>';
					$(_htm_out).insertBefore(cur_ele);	
				}else{
					$(cur_ele).parent(".wp-backgrounds-fields").find(".bg-img-show-case").html('<img src="'+ data_url +'" alt="'+ data_id +'" />');
				}
				
				var data_key = $(cur).attr("data-key");
				$(document).find('input[name="lendiz_theme_options['+ data_key +'][bg_media][id]"]').val(data_id);
				$(document).find('input[name="lendiz_theme_options['+ data_key +'][bg_media][url]"]').val(data_url);
					
				customizer_on_text_multi_ajax( cur, 10 );
				
			});
			
			//Open the uploader dialog
			custom_uploader.open();

		});
		
		//Remove Image
		$(document).find('.bg-remove-image-button').on( 'click', function(e) {
			
			e.preventDefault();
			var cur_ele = $(this);
			var cur = $(cur_ele).parent(".wp-backgrounds-fields").prev(".lendiz-customizer-ajax-hid-wrap");
			
			var data_key = $(cur).attr("data-key");
			$(document).find('input[name="lendiz_theme_options['+ data_key +'][bg_media][id]"]').val('');
			$(document).find('input[name="lendiz_theme_options['+ data_key +'][bg_media][url]"]').val('');
			if( $(cur_ele).parent(".wp-backgrounds-fields").find(".bg-img-show-case").length ){
				$(cur_ele).parent(".wp-backgrounds-fields").find(".bg-img-show-case").remove();
			}
			customizer_on_text_multi_ajax( cur, 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);

		});
		
		//Select background settings
		$(document).find( "select.wp-background-field" ).change( function() {
			var cur_parent = $(this).parents(".wp-backgrounds-fields");
			var cur_val = $(this).val();
			
			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
			
		});
		
		//Checkbox background settings
		$(document).find('input.bg-checkbox-field').change(function() {
			var cur_parent = $(this).parents(".wp-backgrounds-fields");
			var cur_val;
			if($(this).is(":checked")) {
				cur_val = '1';
			}else{
				cur_val = '0';
			}      
			
			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
			
		});
	}
	
	function customizer_border_settings(){
		//Textbox
		$(document).find( ".wp-border-field" ).on( "input paste", function() {
			var cur_val = $(this).val();
			var cur_parent = $(this).parents(".wp-border-list");

			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
			
		});
		
		//Select
		$(document).find( "select.wp-border-field" ).change( function() {
			var cur_val = $(this).val();
			var cur_parent = $(this).parents(".wp-border-list");
			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);			
		});
		
		//Color
		$(document).find('.wp-border-color-field').each(function(){
			$(this).wpColorPicker({
				change: function(event, ui){ 
					var color = ui.color.toString();
					var cur_parent = $(this).parents(".wp-border-list");
					
					var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
					var data_key = $(cur).attr("data-key");
					var data_selector = $(this).attr("data-selector");
					$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(color);
					
					customizer_on_text_multi_ajax( cur, '' );
					wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
					
				},
				clear: function (event) {
					var cur_parent = $(this).parents(".wp-border-list");
					
					var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
					var data_key = $(cur).attr("data-key");
					var data_selector = $(this).attr("data-selector");
					$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val('');
					
					customizer_on_text_multi_ajax( cur, '' );
					wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
					
				}
			});
		});
	}
	
	function customizer_fonts_settings(){
		//Select fonts settings
		$(document).find( "select.wp-font-field" ).change( function() {
			var cur_parent = $(this).parents(".wp-fonts-fields");
			var cur_val = $(this).val();
			
			if( $(this).hasClass("wp-font-family-field") ){
				if( $('option:selected', this).attr("data-google") ){
					var gl_font_variants = jQuery.parseJSON( customizer_fonts_vars.google_fonts );
					var gl_font_var_out = '<option value="">'+ customizer_fonts_vars.font_variants_default +'</option>';
					$.each(gl_font_variants[cur_val].variants, function (key, data) {
						gl_font_var_out += '<option value="'+ data.id +'">'+ data.name +'</option>';
					});
					var cur_child_ele = $(this).parents(".wp-fonts-fields-list").find(".wp-font-weight-field");
					$(cur_child_ele).html(gl_font_var_out);
					var g_font_weight = $(cur_child_ele).attr("data-val");
					$(cur_child_ele).children('option[value="'+ g_font_weight +'"]').attr("selected","selected");
					
					var gl_font_sub_out = '<option value="">'+ customizer_fonts_vars.font_sub_default +'</option>';
					$.each(gl_font_variants[cur_val].subsets, function (key, data) {
						gl_font_sub_out += '<option value="'+ data.id +'">'+ data.name +'</option>';
					});
					var cur_child_ele = $(this).parents(".wp-fonts-fields-list").find(".wp-font-sub-field");
					cur_child_ele.html(gl_font_sub_out);
					var g_font_sub = cur_child_ele.attr("data-val");
					cur_child_ele.children('option[value="'+ g_font_sub +'"]').attr("selected","selected");
				}else{
					var std_font_variants = jQuery.parseJSON( customizer_fonts_vars.standard_font_variants );
					var std_font_var_out = '<option value="">'+ customizer_fonts_vars.font_variants_default +'</option>';
					$.each(std_font_variants.variants, function (key, data) {
						std_font_var_out += '<option value="'+ data.id +'">'+ data.name +'</option>';
					});
					var cur_child_ele = $(this).parents(".wp-fonts-fields-list").find(".wp-font-weight-field");
					cur_child_ele.html(std_font_var_out);
					var std_font_weight = cur_child_ele.attr("data-val");
					cur_child_ele.children('option[value="'+ std_font_weight +'"]').attr("selected","selected");

					var std_font_sub_out = '<option value="">'+ customizer_fonts_vars.font_sub_default +'</option>';
					$.each(std_font_variants.subsets, function (key, data) {
						std_font_sub_out += '<option value="'+ data.id +'">'+ data.name +'</option>';
					});
					cur_child_ele = $(this).parents(".wp-fonts-fields-list").find(".wp-font-sub-field");
					cur_child_ele.html(std_font_sub_out);
					var std_font_sub = cur_child_ele.attr("data-val");
					cur_child_ele.children('option[value="'+ std_font_sub +'"]').attr("selected","selected");
				}
			}

			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, 10 );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);		
			
		});
		
		//Set Google fonts and subsets
		$(document).find('.wp-font-family-field').each(function(){
			$(this).append(font_key);
			var data_val = $(this).attr("data-val");
			$(this).children('option[value="'+ data_val +'"]').attr("selected","selected");
			$(this).trigger("change");
		});
		
		//Textbox change settings
		$(document).find('.wp-font-size-field, .wp-font-line-height-field, .wp-font-letter-spacing-field').on( "input paste", function() {
			var cur_parent = $(this).parents(".wp-fonts-fields");
			var cur_val = $(this).val();
			
			var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
			var data_key = $(cur).attr("data-key");
			var data_selector = $(this).attr("data-selector");
			$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(cur_val);
			
			customizer_on_text_multi_ajax( cur, '' );
			wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
	
		});
		
		//Color
		$(document).find('.wp-font-color-field').each(function(){
			$(this).wpColorPicker({
				change: function(event, ui){ 
					var color = ui.color.toString();
					var cur_parent = $(this).parents(".wp-fonts-fields");
					
					var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
					var data_key = $(cur).attr("data-key");
					var data_selector = $(this).attr("data-selector");
					$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val(color);
					
					customizer_on_text_multi_ajax( cur, '' );
					wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
					
				},
				clear: function (event) {
					var cur_parent = $(this).parents(".wp-fonts-fields");
					
					var cur = $(cur_parent).prev(".lendiz-customizer-ajax-hid-wrap");
					var data_key = $(cur).attr("data-key");
					var data_selector = $(this).attr("data-selector");
					$(document).find('input[name="lendiz_theme_options['+ data_key +']['+ data_selector +']"]').val('');
					
					customizer_on_text_multi_ajax( cur, '' );
					wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
				}
			});
		});
	}
	
	function customizer_border_set_values(cur_parent, cur_ele){
		var item = {};
		$( cur_parent ).find(".wp-border-field").each(function( index ) {
			var data_selct = $(this).attr("data-selector");
			var data_val = $(this).attr("data-val") ? $(this).attr("data-val") : '';
			item[data_selct] = data_val;
		});
		jsonString = JSON.stringify(item);
		$(cur_parent).prev(".border-hid-text").val(jsonString);
		customizer_on_text_typing_ajax( $(cur_parent).prev(".border-hid-text"), '' );
		wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
	}	
	
	function customizer_fonts_set_values(cur_parent, cur_ele){
		var item = {};
		$( cur_parent ).find(".wp-font-field").each(function( index ) {
			var data_selct = $(this).attr("data-selector");
			var data_val = $(this).attr("data-val") ? $(this).attr("data-val") : '';
			item[data_selct] = data_val;
		});
		jsonString = JSON.stringify(item);
		$(cur_parent).prev(".fonts-hid-text").val(jsonString);
		customizer_on_text_typing_ajax( $(cur_parent).prev(".fonts-hid-text"), 400 );
		wp.customize.state( 'saved' ).set( false ); customizer_set_clear_btn(1);
	}
	
})( jQuery );

