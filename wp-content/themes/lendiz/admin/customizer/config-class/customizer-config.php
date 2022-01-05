<?php

class LendizCustomizerConfig{
	
	private static $_instance = null;
	private static $lendiz_options;
	
	public function __construct() {
		
		$lendiz_options = '';
		$lendiz_mod_t = get_option( 'lendiz_theme_options_t');
		$lendiz_options = !empty( $lendiz_mod_t ) ? $lendiz_mod_t : get_option( 'lendiz_theme_options_new' );

		self::$lendiz_options = $lendiz_options;
	}
		
	public static function buildFields( $config ){
		$field_type = $config['type'];
		switch( $field_type ){
			case "text":
				self::buildTextField( $config );
			break;
			case "textarea":
				self::buildTextareaField( $config );
			break;
			case "select":
				self::buildSelectField( $config );
			break;
			case "color":
				self::buildColorField( $config );
			break;	
			case "image":
				self::buildImageField( $config );
			break;			
			case "alpha":
				self::buildAlphaColorField( $config );
			break;
			case "background":
				self::buildBackgroundField( $config );
			break;
			case "border":
				self::buildBorderField( $config );
			break;
			case "dimension":
				self::buildDimensionField( $config );
			break;
			case "link":
				self::buildLinkColorField( $config );
			break;
			case "multicheck":
				self::buildMultiCheckField( $config );
			break;
			case "radioimage":
				self::buildRadioImageField( $config );
			break;
			case "sidebars":
				self::buildSidebarsField( $config );
			break;
			case "pages":
				self::buildPagesField( $config );
			break;
			case "toggle":
				self::buildToggleSwitchField( $config );
			break;
			case "hw":
				self::buildHeightWidthField( $config );
			break;
			case "fonts":
				self::buildGoogleFontsField( $config );
			break;
			case "dragdrop":
				self::buildDragDropField( $config );
			break;
			case "export":
				self::buildExportField( $config );
			break;
			case "import":
				self::buildImportField( $config );
			break;
			case "section":
				self::buildSectionField( $config );
			break;
			case "toggle_section":
				self::buildToggleSectionField( $config );
			break;
		}
	}
	
	public static function buildTextField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = stripslashes( $lendiz_options[$field_id] );
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
			<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
			<input type="text" class="lendiz-customizer-ajax-field lendiz-customizer-text-field" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" value="<?php echo esc_attr( $saved_val ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]">
		</li>
	<?php
	}
	
	public static function buildTextareaField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = stripslashes( $lendiz_options[$field_id] );
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
			<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
			<textarea class="lendiz-customizer-ajax-field lendiz-customizer-textarea-field" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]"><?php echo esc_textarea( $saved_val ); ?></textarea>
		</li>
	<?php
	}
	
	public static function buildSelectField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$choices = isset( $config['choices'] ) ? $config['choices'] : '';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-field-type="select" data-id="<?php echo esc_attr( $field_id ); ?>" data-id="<?php echo esc_attr( $field_id ); ?>">
			<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
			<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
			<select class="lendiz-customizer-ajax-field lendiz-customizer-select-field" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]">
			<?php 
				if( !empty( $choices ) ){
					foreach( $choices as $key => $value ){
						echo '<option value="'. esc_attr( $key ) .'" '. selected( $saved_val, $key ) .'>'. esc_html( $value ) .'</option>';
					}
				}
			?>
			</select>
		</li>
	<?php
	}
	
	public static function buildColorField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$saved_val = '';
		$default_color =  isset( $config['default'] ) ? $config['default'] : '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = stripslashes( $lendiz_options[$field_id] );
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
			<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
			<div class="alpha-wrap">
				<input type="text" class="lendiz-customizer-ajax-field lendiz-customize-color-field color-picker" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" value="<?php echo esc_attr( $saved_val ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" data-alpha="false" data-default-color="<?php echo esc_attr( $default_color ); ?>" >
			</div><!-- .alpha-wrap -->
		</li>
	<?php
	}
	
	public static function buildImageField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$img_id = $img_url = '';
		if( $saved_val ){
			$img_decod = $saved_val;
			if( is_array( $img_decod ) ){
				$img_id = isset( $img_decod['id'] ) ? $img_decod['id'] : '';
				$img_url = $img_id ? wp_get_attachment_url( $img_id ) : '';
			}
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
			<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
			
			<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
				<input type="hidden" class="lendiz-customizer-ajax-field lendiz-customizer-image-field" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][id]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][id]" value="<?php echo esc_attr( $img_id ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][id]">
				<input type="hidden" class="lendiz-customizer-ajax-field lendiz-customizer-image-field" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][url]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][url]" value="<?php echo esc_attr( $img_url ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][url]">
			</div>
			
			<div class="lendiz-customizer-image-btn-wrap">
				<?php
					if( $img_url ){?>
						<img src="<?php echo esc_url( $img_url ); ?>" />
					<?php
					}
				?>
				<input type="button" class="lendiz-customizer-image-button" value="<?php esc_html_e( 'Upload Image', 'lendiz' ); ?>" />
				<input type="button" class="lendiz-customizer-image-remove-button" value="<?php esc_html_e( 'Remove Image', 'lendiz' ); ?>" />
			</div>
		</li>
	<?php
	}
	
	public static function buildAlphaColorField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$saved_val = '';
		$default_color =  isset( $config['default'] ) ? $config['default'] : '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = stripslashes( $lendiz_options[$field_id] );
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
			<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
			<div class="alpha-wrap">
				<input type="text" class="lendiz-customizer-ajax-field lendiz-customizer-alpha-color color-picker" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" value="<?php echo esc_attr( $saved_val ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" data-alpha="true" data-default-color="<?php echo esc_attr( $default_color ); ?>" >
			</div><!-- .alpha-wrap -->
		</li>
	<?php
	}
	
	public static function buildBackgroundField( $config ){
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$bg_ele = $saved_val; 
		$bg_decond = $bg_repeat = $bg_size = $bg_attachment = $bg_position = $bg_media = $bg_color = $bg_transparent = '';
		$bg_media_id = $bg_media_url = '';
		if( $bg_ele ){
			$bg_decond = $bg_ele;
			if( is_array( $bg_decond ) && !empty( $bg_decond ) ){
				$bg_repeat = isset( $bg_decond['bg_repeat'] ) ? $bg_decond['bg_repeat'] : '';
				$bg_size = isset( $bg_decond['bg_size'] ) ? $bg_decond['bg_size'] : '';
				$bg_attachment = isset( $bg_decond['bg_attachment'] ) ? $bg_decond['bg_attachment'] : '';
				$bg_position = isset( $bg_decond['bg_position'] ) ? $bg_decond['bg_position'] : '';
				$bg_media = isset( $bg_decond['bg_media'] ) ? $bg_decond['bg_media'] : '';
				
				if( $bg_media ){
					$img_decod = $bg_media;
					if( is_array( $img_decod ) ){
						$bg_media_id = isset( $img_decod['id'] ) ? $img_decod['id'] : '';
						$bg_media_url = $bg_media_id ? wp_get_attachment_url( $bg_media_id ) : '';
					}
				}
				
				$bg_color = isset( $bg_decond['bg_color'] ) ? $bg_decond['bg_color'] : '';
				$bg_transparent = isset( $bg_decond['bg_transparent'] ) ? $bg_decond['bg_transparent'] : '';
			}
		}
		
		$bg_repeat_arr = array(
			'no-repeat' => esc_html__( 'No Repeat', 'lendiz' ),
			'repeat' => esc_html__( 'Repeat All', 'lendiz' ),
			'repeat-x' => esc_html__( 'Repeat Horizontally', 'lendiz' ),
			'repeat-y' => esc_html__( 'Repeat Vertically', 'lendiz' ),
			'inherit' => esc_html__( 'Inherit', 'lendiz' )
		);
		
		$bg_size_arr = array(
			'inherit' => esc_html__( 'Inherit', 'lendiz' ),
			'cover' => esc_html__( 'Cover', 'lendiz' ),
			'contain' => esc_html__( 'Contain', 'lendiz' )
		);
		
		$bg_attachment_arr = array(
			'fixed' => esc_html__( 'Fixed', 'lendiz' ),
			'scroll' => esc_html__( 'Scroll', 'lendiz' ),
			'inherit' => esc_html__( 'Inherit', 'lendiz' )
		);
		
		$bg_position_arr = array(
			'left top' => esc_html__( 'Left Top', 'lendiz' ),
			'left center' => esc_html__( 'Left center', 'lendiz' ),
			'left bottom' => esc_html__( 'Left Bottom', 'lendiz' ),
			'center top' => esc_html__( 'Center Top', 'lendiz' ),
			'center center' => esc_html__( 'Center Center', 'lendiz' ),
			'center bottom' => esc_html__( 'Center Bottom', 'lendiz' ),
			'right top' => esc_html__( 'Right Top', 'lendiz' ),
			'right center' => esc_html__( 'Right center', 'lendiz' ),
			'right bottom' => esc_html__( 'Right Bottom', 'lendiz' )
		);
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
		?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="wp-backgrounds-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="wp-backgrounds-inner" data-img="<?php echo esc_url( $bg_media_url ); ?>" data-transparent="<?php if( $bg_transparent ) echo esc_attr( 'transparent' ); ?>" data-repeat="<?php echo esc_url( $bg_repeat ); ?>" data-color="<?php echo esc_attr( $bg_color ); ?>" data-attachment="<?php echo esc_attr( $bg_attachment ); ?>" data-size="<?php echo esc_attr( $bg_size ); ?>" data-position="<?php echo esc_attr( $bg_position ); ?>">
				
					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">

						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_repeat]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_repeat]" value="<?php echo esc_attr( $bg_repeat ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_repeat]">
						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_size]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_size]" value="<?php echo esc_attr( $bg_size ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_size]">
						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_attachment]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_attachment]" value="<?php echo esc_attr( $bg_attachment ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_attachment]">
						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_position]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_position]" value="<?php echo esc_attr( $bg_position ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_position]">
						
						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_media][id]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_media][id]" value="<?php echo esc_attr( $bg_media_id ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_media][id]">
						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_media][url]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_media][url]" value="<?php echo esc_attr( $bg_media_url ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_media][url]">
					
						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_color]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_color]" value="<?php echo esc_attr( $bg_color ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_color]">
						<input type="text" class="lendiz-customizer-ajax-field backgrounds-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_transparent]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_transparent]" value="<?php echo esc_attr( $bg_transparent ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bg_transparent]">
						
					</div>

					<div class="wp-backgrounds-fields">
					
						<input type="text" class="wp-background-field bg-color-field" data-selector="bg_color" value="<?php echo esc_attr( $bg_color ); ?>" data-val="<?php echo esc_attr( $bg_color ); ?>" />
						
						<input type="checkbox" class="wp-background-field bg-checkbox-field" data-selector="bg_transparent" <?php if( $bg_transparent ) echo 'checked="checked"'; ?> value="<?php echo esc_attr( $bg_transparent ); ?>" data-val="<?php echo esc_attr( $bg_transparent ); ?>"><?php esc_html_e( 'Transparent', 'lendiz' ); ?>
					
						<select class="wp-background-field" data-selector="bg_repeat" data-val="<?php echo esc_attr( $bg_repeat ); ?>">
							<option value=""><?php esc_html_e( 'Background Repeat', 'lendiz' ); ?></option>
						<?php
							foreach( $bg_repeat_arr as $key => $bg_repeat_attr ){
								echo '<option value="'. esc_attr( $key ) .'" '. ( $bg_repeat == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $bg_repeat_attr ) .'</option>';
							}
						?>
						</select>
						
						<select class="wp-background-field" data-selector="bg_size" data-val="<?php echo esc_attr( $bg_size ); ?>">
							<option value=""><?php esc_html_e( 'Background Size', 'lendiz' ); ?></option>
						<?php
							foreach( $bg_size_arr as $key => $bg_size_attr ){
								echo '<option value="'. esc_attr( $key ) .'" '. ( $bg_size == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $bg_size_attr ) .'</option>';
							}
						?>
						</select>
						
						<select class="wp-background-field" data-selector="bg_attachment" data-val="<?php echo esc_attr( $bg_attachment ); ?>">
							<option value=""><?php esc_html_e( 'Background Attachment', 'lendiz' ); ?></option>
						<?php
							foreach( $bg_attachment_arr as $key => $bg_attachment_attr ){
								echo '<option value="'. esc_attr( $key ) .'" '. ( $bg_attachment == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $bg_attachment_attr ) .'</option>';
							}
						?>
						</select>
						
						<select class="wp-background-field" data-selector="bg_position" data-val="<?php echo esc_attr( $bg_position ); ?>">
							<option value=""><?php esc_html_e( 'Background Position', 'lendiz' ); ?></option>
						<?php
							foreach( $bg_position_arr as $key => $bg_position_attr ){
								echo '<option value="'. esc_attr( $key ) .'" '. ( $bg_position == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $bg_position_attr ) .'</option>';
							}
						?>
						</select>
						
						<input type="button" class="wp-background-field bg-upload-image-button" data-selector="bg_media" data-val="<?php echo esc_url( $bg_media ); ?>" value="<?php esc_html_e( 'Upload Image', 'lendiz' ); ?>" />
						<input type="button" class="bg-remove-image-button" value="<?php esc_html_e( 'Remove Image', 'lendiz' ); ?>" />
					</div>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildBorderField( $config ){
		
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$brdr_ele = $saved_val; 
		$brdr_decond = $left = $right = $top = $bottom = $style = $color = '';
		if( $brdr_ele ){
			$brdr_decond = $brdr_ele;
		}
		
		if( is_array( $brdr_decond ) && !empty( $brdr_decond ) ){
			$left = $brdr_decond['left'];
			$right = $brdr_decond['right'];
			$top = $brdr_decond['top'];
			$bottom = $brdr_decond['bottom'];
			$style = $brdr_decond['style'];
			$color = $brdr_decond['color'];
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
	
		?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="border-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="border-inner">	
					
					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
						<input type="text" class="lendiz-customizer-ajax-field border-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][left]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][left]" value="<?php echo esc_attr( $left ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][left]">
						<input type="text" class="lendiz-customizer-ajax-field border-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][right]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][right]" value="<?php echo esc_attr( $right ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][right]">
						<input type="text" class="lendiz-customizer-ajax-field border-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][top]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][top]" value="<?php echo esc_attr( $top ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][top]">
						<input type="text" class="lendiz-customizer-ajax-field border-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bottom]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bottom]" value="<?php echo esc_attr( $bottom ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bottom]">
						<input type="text" class="lendiz-customizer-ajax-field border-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][style]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][style]" value="<?php echo esc_attr( $style ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][style]">
						<input type="text" class="lendiz-customizer-ajax-field border-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][color]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][color]" value="<?php echo esc_attr( $color ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][color]">
					</div>

					<ul class="wp-border-list">
						<li>
							<input type="text" class="wp-border-field" data-selector="left" data-val="<?php echo esc_attr( $left ); ?>" value="<?php echo esc_attr( $left ); ?>">
							<span class="wp-border-icon"><i class="dashicons dashicons-arrow-left-alt"></i></span>
						</li>
						<li>
							<input type="text" class="wp-border-field" data-selector="right" data-val="<?php echo esc_attr( $right ); ?>" value="<?php echo esc_attr( $right ); ?>">
							<span class="wp-border-icon"><i class="dashicons dashicons-arrow-right-alt"></i></span>
						</li>
						<li>
							<input type="text" class="wp-border-field" data-selector="top" data-val="<?php echo esc_attr( $top ); ?>" value="<?php echo esc_attr( $top ); ?>">
							<span class="wp-border-icon"><i class="dashicons dashicons-arrow-up-alt"></i></span>
						</li>
						<li>
							<input type="text" class="wp-border-field" data-selector="bottom" data-val="<?php echo esc_attr( $bottom ); ?>" value="<?php echo esc_attr( $bottom ); ?>">
							<span class="wp-border-icon"><i class="dashicons dashicons-arrow-down-alt"></i></span>
						</li>
						<li>
							<select class="wp-border-field" data-selector="style" data-val="<?php echo esc_attr( $style ); ?>">
								<option value="none"<?php if( $style == 'none' ) echo ' selected="selected"'; ?>><?php esc_html_e( 'None', 'lendiz' ); ?></option>
								<option value="solid"<?php if( $style == 'solid' ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Solid', 'lendiz' ); ?></option>
								<option value="dashed"<?php if( $style == 'dashed' ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Dashed', 'lendiz' ); ?></option>
								<option value="dotted"<?php if( $style == 'dotted' ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Dotted', 'lendiz' ); ?></option>
								<option value="double"<?php if( $style == 'double' ) echo ' selected="selected"'; ?>><?php esc_html_e( 'Double', 'lendiz' ); ?></option>							
							</select>
						</li>
						<li>
							<input type="text" class="wp-border-field wp-border-color-field" data-selector="color" data-val="<?php echo esc_attr( $color ); ?>" value="<?php echo esc_attr( $color ); ?>">
						</li>
					</ul>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildDimensionField( $config ){
		
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$dim_ele = $saved_val; 
		$dim_decond = $left = $right = $top = $bottom = '';
		if( $dim_ele ){
			$dim_decond = $dim_ele;
		}
		
		if( is_array( $dim_decond ) && !empty( $dim_decond ) ){
			$top = $dim_decond['top'];
			$right = $dim_decond['right'];
			$bottom = $dim_decond['bottom'];
			$left = $dim_decond['left'];
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
	
		?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="dimensions-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="dimensions-inner">

					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
						<input type="text" class="lendiz-customizer-ajax-field dimensions-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][left]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][left]" value="<?php echo esc_attr( $left ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][left]">
						<input type="text" class="lendiz-customizer-ajax-field dimensions-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][right]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][right]" value="<?php echo esc_attr( $right ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][right]">
						<input type="text" class="lendiz-customizer-ajax-field dimensions-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][top]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][top]" value="<?php echo esc_attr( $top ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][top]">
						<input type="text" class="lendiz-customizer-ajax-field dimensions-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bottom]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bottom]" value="<?php echo esc_attr( $bottom ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][bottom]">
					</div>

					<ul class="wp-dimensions-list">
						<li>
							<input type="text" class="wp-dimensions-field" data-selector="top" data-val="<?php echo esc_attr( $top ); ?>" value="<?php echo esc_attr( $top ); ?>">
							<span class="wp-dimensions-icon"><i class="dashicons dashicons-arrow-up-alt"></i></span>
						</li>
						<li>
							<input type="text" class="wp-dimensions-field" data-selector="right" data-val="<?php echo esc_attr( $right ); ?>" value="<?php echo esc_attr( $right ); ?>">
							<span class="wp-dimensions-icon"><i class="dashicons dashicons-arrow-right-alt"></i></span>
						</li>
						<li>
							<input type="text" class="wp-dimensions-field" data-selector="bottom" data-val="<?php echo esc_attr( $bottom ); ?>" value="<?php echo esc_attr( $bottom ); ?>">
							<span class="wp-dimensions-icon"><i class="dashicons dashicons-arrow-down-alt"></i></span>
						</li>
						<li>
							<input type="text" class="wp-dimensions-field" data-selector="left" data-val="<?php echo esc_attr( $left ); ?>" value="<?php echo esc_attr( $left ); ?>">
							<span class="wp-dimensions-icon"><i class="dashicons dashicons-arrow-left-alt"></i></span>
						</li>
					</ul>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildGoogleFontsField( $config ){
		
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$fonts_ele = $saved_val; 
		$fonts_decond = $font_family = $font_weight = $font_sub = $text_align = $text_transform = $font_size = $line_height = $letter_spacing = $font_color = '';
		if( $fonts_ele ){
			$fonts_decond = $fonts_ele;
			if( is_array( $fonts_decond ) && !empty( $fonts_decond ) ){
				$font_family = isset( $fonts_decond['font_family'] ) ? $fonts_decond['font_family'] : '';
				$font_weight = isset( $fonts_decond['font_weight'] ) ? $fonts_decond['font_weight'] : '';
				$font_sub = isset( $fonts_decond['font_sub'] ) ? $fonts_decond['font_sub'] : '';
				$text_align = isset( $fonts_decond['text_align'] ) ? $fonts_decond['text_align'] : '';
				$text_transform = isset( $fonts_decond['text_transform'] ) ? $fonts_decond['text_transform'] : '';
				$font_size = isset( $fonts_decond['font_size'] ) ? $fonts_decond['font_size'] : '';
				$line_height = isset( $fonts_decond['line_height'] ) ? $fonts_decond['line_height'] : '';
				$letter_spacing = isset( $fonts_decond['letter_spacing'] ) ? $fonts_decond['letter_spacing'] : '';
				$font_color = isset( $fonts_decond['font_color'] ) ? $fonts_decond['font_color'] : '';
			}
		}
		
		
		$font_family_arr = Lendiz_Google_Fonts_Function::$_standard_fonts;
		
		$text_align_arr = array(
			'inherit' => esc_html__( 'Inherit', 'lendiz' ),
			'left' => esc_html__( 'Left', 'lendiz' ),
			'right' => esc_html__( 'Right', 'lendiz' ),
			'center' => esc_html__( 'Center', 'lendiz' ),
			'justify' => esc_html__( 'Justify', 'lendiz' ),
			'initial' => esc_html__( 'Initial', 'lendiz' )
		);
		
		$text_trans_arr = array(
			'capitalize' => esc_html__( 'Capitalize', 'lendiz' ),
			'inherit' => esc_html__( 'Inherit', 'lendiz' ),
			'initial' => esc_html__( 'Initial', 'lendiz' ),
			'lowercase' => esc_html__( 'Lower Case', 'lendiz' ),
			'uppercase' => esc_html__( 'Upper Case', 'lendiz' ),
			'none' => esc_html__( 'None', 'lendiz' ),
			'unset' => esc_html__( 'Unset', 'lendiz' )
		);
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
		?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="wp-fonts-wrap">
			
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				
				<div class="wp-fonts-inner">
					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_family]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_family]" value="<?php echo esc_attr( $font_family ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_family]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_weight]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_weight]" value="<?php echo esc_attr( $font_weight ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_weight]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_sub]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_sub]" value="<?php echo esc_attr( $font_sub ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_sub]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][text_align]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][text_align]" value="<?php echo esc_attr( $text_align ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][text_align]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][text_transform]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][text_transform]" value="<?php echo esc_attr( $text_transform ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][text_transform]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_size]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_size]" value="<?php echo esc_attr( $font_size ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_size]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][line_height]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][line_height]" value="<?php echo esc_attr( $line_height ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][line_height]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][letter_spacing]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][letter_spacing]" value="<?php echo esc_attr( $letter_spacing ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][letter_spacing]">
						<input type="text" class="lendiz-customizer-ajax-field fonts-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_color]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_color]" value="<?php echo esc_attr( $font_color ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][font_color]">
					</div>
					 
					<div class="wp-fonts-fields">
						<ul class="wp-fonts-fields-list">
							<li>
								<span><?php esc_html_e( 'Font Family', 'lendiz' ); ?></span>
								<select class="wp-font-field wp-font-family-field" data-selector="font_family" data-val="<?php echo esc_attr( $font_family ); ?>">
								
								<?php
								$cf_names = get_option( 'lendiz_custom_fonts_names' );
								if( !empty( $cf_names ) && is_array( $cf_names ) ){
								?>
									<option value="" class="bold-font"><?php esc_html_e( 'Custom Fonts', 'lendiz' ); ?></option>
								<?php
									foreach( $cf_names as $key => $font_name ){
										echo '<option value="'. esc_attr( $key ) .'" '. ( $font_family == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $font_name ) .'</option>';
									}
								}
								?>
								
									<option value="" class="bold-font"><?php esc_html_e( 'Standard Fonts', 'lendiz' ); ?></option>
								<?php
									foreach( $font_family_arr as $key => $font_family_attr ){
										echo '<option value="'. esc_attr( $key ) .'" '. ( $font_family == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $font_family_attr ) .'</option>';
									}
								?>
									<option value="google-fonts" class="bold-font"><?php esc_html_e( 'Google Fonts', 'lendiz' ); ?></option>
								</select>
							</li>
							<li>
								<span><?php esc_html_e( 'Font Weight &amp; Style', 'lendiz' ); ?></span>
								<select class="wp-font-field wp-font-weight-field" data-selector="font_weight" data-val="<?php echo esc_attr( $font_weight ); ?>">
									<option value=""><?php esc_html_e( 'Font Weight &amp; Style', 'lendiz' ); ?></option>
								</select>
							</li>
							<li>
								<span><?php esc_html_e( 'Font Subsets', 'lendiz' ); ?></span>
								<select class="wp-font-field wp-font-sub-field" data-selector="font_sub" data-val="<?php echo esc_attr( $font_sub ); ?>">
									<option value=""><?php esc_html_e( 'Font Subsets', 'lendiz' ); ?></option>
								</select>
							</li>
							<li>
								<span><?php esc_html_e( 'Text Align', 'lendiz' ); ?></span>
								<select class="wp-font-field" data-selector="text_align" data-val="<?php echo esc_attr( $text_align ); ?>">
									<option value=""><?php esc_html_e( 'Text Align', 'lendiz' ); ?></option>
								<?php
									foreach( $text_align_arr as $key => $text_align_attr ){
										echo '<option value="'. esc_attr( $key ) .'" '. ( $text_align == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $text_align_attr ) .'</option>';
									}
								?>
								</select>
							</li>
							<li>
								<span><?php esc_html_e( 'Text Transform', 'lendiz' ); ?></span>
								<select class="wp-font-field" data-selector="text_transform" data-val="<?php echo esc_attr( $text_transform ); ?>">
									<option value=""><?php esc_html_e( 'Text Transform', 'lendiz' ); ?></option>
								<?php
									foreach( $text_trans_arr as $key => $text_trans_attr ){
										echo '<option value="'. esc_attr( $key ) .'" '. ( $text_transform == $key ? 'selected="selected"' : '' ) .'>'. esc_html( $text_trans_attr ) .'</option>';
									}
								?>
								</select>
							</li>
							<li>	
								<span><?php esc_html_e( 'Font Size', 'lendiz' ); ?></span>						
								<input type="text" class="wp-font-field wp-font-size-field" data-selector="font_size" value="<?php echo esc_attr( $font_size ); ?>" data-val="<?php echo esc_attr( $font_size ); ?>" />
								<span class="wp-font-abs-units"><?php esc_html_e( 'px', 'lendiz' ); ?></span>		
							</li>
							<li>
								<span><?php esc_html_e( 'Line Height', 'lendiz' ); ?></span>
								<input type="text" class="wp-font-field wp-font-line-height-field" data-selector="line_height" value="<?php echo esc_attr( $line_height ); ?>" data-val="<?php echo esc_attr( $line_height ); ?>" />
								<span class="wp-font-abs-units"><?php esc_html_e( 'px', 'lendiz' ); ?></span>
							</li>
							<li>
								<span><?php esc_html_e( 'Letter Spacing', 'lendiz' ); ?></span>
								<input type="text" class="wp-font-field wp-font-letter-spacing-field" data-selector="letter_spacing" value="<?php echo esc_attr( $letter_spacing ); ?>" data-val="<?php echo esc_attr( $letter_spacing ); ?>" />
								<span class="wp-font-abs-units"><?php esc_html_e( 'px', 'lendiz' ); ?></span>
							</li>
							<li>
								<span><?php esc_html_e( 'Font Color', 'lendiz' ); ?></span>
								<input type="text" class="wp-font-field wp-font-color-field" data-selector="font_color" value="<?php echo esc_attr( $font_color ); ?>" data-val="<?php echo esc_attr( $font_color ); ?>" />
							</li>
						</ul>
					</div>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildLinkColorField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
				
		$lc_ele = $saved_val; 
		$lc_decond = $regular = $hover = $active = '';
		if( $lc_ele ){
			$lc_decond = $lc_ele;
			if( is_array( $lc_decond ) && !empty( $lc_decond ) ){
				$regular = $lc_decond['regular'];
				$hover = $lc_decond['hover'];
				$active = $lc_decond['active'];
			}
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
	
		?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="link-colors-wrap">
			
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				
				<div class="link-colors-inner">

					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
						<input type="text" class="lendiz-customizer-ajax-field link-color-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][regular]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][regular]" value="<?php echo esc_attr( $regular ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][regular]">
						<input type="text" class="lendiz-customizer-ajax-field link-color-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][hover]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][hover]" value="<?php echo esc_attr( $hover ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][hover]">
						<input type="text" class="lendiz-customizer-ajax-field link-color-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][active]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][active]" value="<?php echo esc_attr( $active ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][active]">
					</div>

					<ul class="link-colors-list">
						<li><input type="text" class="wp-color-field" data-selector="regular" data-val="<?php echo esc_attr( $regular ); ?>" value="<?php echo esc_attr( $regular ); ?>"><?php esc_html_e( 'Regular', 'lendiz' ); ?></li>
						<li><input type="text" class="wp-color-field" data-selector="hover" data-val="<?php echo esc_attr( $hover ); ?>" value="<?php echo esc_attr( $hover ); ?>"><?php esc_html_e( 'Hover', 'lendiz' ); ?></li>
						<li><input type="text" class="wp-color-field" data-selector="active" data-val="<?php echo esc_attr( $active ); ?>" value="<?php echo esc_attr( $active ); ?>"><?php esc_html_e( 'Active', 'lendiz' ); ?></li>
					</ul>					
				</div>			
			</div>
		</li>
	<?php
	}
	
	public static function buildMultiCheckField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$mc_ele = $saved_val; 
		$mc_items = isset( $config['items'] ) ? $config['items'] : '';;
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
	
		?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="multi-check-wrap">
				
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				
				<div class="multi-check-inner">
					
					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
					<?php
						if( !empty( $mc_items ) && is_array( $mc_items ) ){
							foreach( $mc_items as $key => $value ){ 
								if( !empty( $mc_ele ) && in_array( $key, $mc_ele ) ){
								?>
									<input type="text" class="lendiz-customizer-ajax-field multi-check-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][<?php echo esc_attr( $key ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][]" value="<?php echo esc_attr( $key ); ?>">
								<?php
								}else{?>
									<input type="text" class="lendiz-customizer-ajax-field multi-check-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][<?php echo esc_attr( $key ); ?>]">
								<?php
								}
							}
						}
					?>
					</div>

					<ul class="wp-multi-check-list">
					<?php
						if( $mc_items ){
							foreach( $mc_items as $key => $value ){
								$stat_class = !empty( $mc_ele ) && in_array( $key, $mc_ele ) ? " multi-check-active" : "";
								echo '<li><span class="wp-multi-check-field'. esc_attr( $stat_class ) .'" data-val="'. esc_attr( $key ) .'">'. esc_html( $value ) .'</span></li>';
							}
						}
					?>
					</ul>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildRadioImageField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = stripslashes( $lendiz_options[$field_id] );
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$ri_ele = $saved_val; 
		$ri_items = isset( $config['items'] ) ? $config['items'] : '';;
		$classes = isset( $config['cols'] ) && !empty( $config['cols'] ) ? ' image-col-'. $config['cols'] : ' image-col-3';
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
	
		?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" data-field-type="radio-image" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>" data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="radio-image-wrap<?php echo esc_attr( $classes ); ?>">
				
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				
				<div class="radio-image-inner">
				
					<input type="text" class="lendiz-customizer-ajax-field radio-image-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" value="<?php echo esc_attr( $ri_ele ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]">
					 
					<ul class="wp-radio-image-list">
					<?php
						if( $ri_items ){
							foreach( $ri_items as $key => $value ){
								$stat_class = $key == $ri_ele ? " radio-image-active" : "";
								echo '<li><span class="wp-radio-image-field'. esc_attr( $stat_class ) .'" data-val="'. esc_attr( $key ) .'"><img alt="'. esc_attr( $key ) .'" src="'. esc_url( $value ) .'" /></span></li>';
							}
						}
					?>
					</ul>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildSidebarsField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = stripslashes( $lendiz_options[$field_id] );
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="dropdown-sidebars-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="dropdown-sidebars-inner">
					<select class="wp-dropdown-sidebars-list lendiz-customizer-ajax-field lendiz-customizer-select-field" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]">
						<option value=""><?php esc_html_e( 'None', 'lendiz' ); ?></option>
					<?php
						$sidebars = $GLOBALS['wp_registered_sidebars'];
						if( $sidebars ){
							foreach( $sidebars as $sidebar ){
								echo '<option value="'. esc_attr( $sidebar['id'] ) .'" '. selected( $saved_val, $sidebar['id'] ) .'>'. esc_html( $sidebar['name'] ) .'</option>';
							}
						}
					?>
					</select>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildPagesField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = stripslashes( $lendiz_options[$field_id] );
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="dropdown-pages-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="dropdown-pages-inner">
					<select class="wp-dropdown-pages-list lendiz-customizer-ajax-field lendiz-customizer-page-field" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]">
						<option value=""><?php esc_html_e( 'None', 'lendiz' ); ?></option>
					<?php
						$pages = get_pages();
						if( $pages ){
							foreach( $pages as $page ){
								echo '<option value="'. esc_attr( $page->ID ) .'" '. selected( $saved_val, $page->ID ) .'>'. esc_html( $page->post_title ) .'</option>';
							}
						}
					?>
					</select>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildToggleSwitchField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-field-type="checkbox" data-id="<?php echo esc_attr( $field_id ); ?>" data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="checkbox_switch">
				<div class="onoffswitch">
					<input type="checkbox" class="lendiz-customizer-ajax-field onoffswitch-checkbox" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" value="<?php echo esc_attr( $saved_val ); ?>" <?php checked( $saved_val ); ?>>
					 <label class="onoffswitch-label" for="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]"></label>
				</div>
				<input type="hidden" class="lendiz-customizer-ajax-field toggle-switch-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" value="<?php echo esc_attr( $saved_val ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>]" >
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
			</div>
		</li>
	<?php
	}
	
	public static function buildHeightWidthField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$instant = isset( $config['instant'] ) && $config['instant'] == 1 ? '1' : '0';
		$saved_val = '';
		if( isset( $lendiz_options[$field_id] ) ){
			$saved_val = $lendiz_options[$field_id];
		}else{
			$saved_val = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$hw_ele = $saved_val; 
		$dim_decond = $width = $height = '';
		if( $hw_ele ){
			$dim_decond = $hw_ele;
		}
		
		if( is_array( $dim_decond ) && !empty( $dim_decond ) ){
			$width = $dim_decond['width'];
			$height = $dim_decond['height'];
		}
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" data-instant="<?php echo esc_attr( $instant ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">

			<div class="width-height-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="width-height-inner">
				
					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
						<input type="text" class="lendiz-customizer-ajax-field width-height-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][width]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][width]" value="<?php echo esc_attr( $width ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][width]">
						<input type="text" class="lendiz-customizer-ajax-field width-height-hid-text" data-key="<?php echo esc_attr( $field_id ); ?>" id="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][height]" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][height]" value="<?php echo esc_attr( $height ); ?>" data-customize-setting-link="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][height]">
					</div>

					<ul class="wp-width-height-list">
						<li>
							<input type="text" class="wp-width-height-field" data-selector="width" placeholder="<?php esc_attr_e( 'Width', 'lendiz' ) ?>" data-val="<?php echo esc_attr( $width ); ?>" value="<?php echo esc_attr( $width ); ?>"> x 
						</li>
						<li>
							<input type="text" class="wp-width-height-field" data-selector="height" placeholder="<?php esc_attr_e( 'Height', 'lendiz' ) ?>" data-val="<?php echo esc_attr( $height ); ?>" value="<?php echo esc_attr( $height ); ?>">
						</li>
					</ul>					
				</div>
			</div>
			
		</li>
	<?php
	}
	
	public static function checkDragDropFieldValuesUpdated( $dd_fields, $dd_default ){
		
		if( empty( $dd_fields ) ) return $dd_default;
		
		$dd_fields_new = array();
		foreach( $dd_fields as $key => $value ){
			foreach( $value as $field_key => $field_value ) $dd_fields_new[$field_key] = $field_value;
		}

		$dd_default_new = array();
		foreach( $dd_default as $key => $value ){
			foreach( $value as $field_key => $field_value ) $dd_default_new[$field_key] = $field_value;
		}
		
		$result = array_diff_assoc( $dd_default_new, $dd_fields_new );

		if( !empty( $result ) ){
			if( isset( $dd_fields['disabled'] ) ){
				foreach( $result as $key => $value ) $dd_fields['disabled'][$key] = $value;
			}
		}
		
		return $dd_fields;
	}
	
	public static function buildDragDropField( $config ){ 
		$lendiz_options = self::$lendiz_options;
		$field_id = $config['id'];
		$refresh = isset( $config['refresh'] ) && $config['refresh'] == 1 ? '1' : '0';
		$dd_parts = isset( $config['default'] ) ? $config['default'] : '';
		
		$dd_fields = '';
		if( isset( $lendiz_options[$field_id] ) && !empty( $lendiz_options[$field_id] ) ){
			$dd_fields = $lendiz_options[$field_id];
		}else{
			$dd_fields = isset( $config['default'] ) ? $config['default'] : '';
		}
		
		$dd_fields = self::checkDragDropFieldValuesUpdated( $dd_fields, $config['default'] );
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
		
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>" data-refresh="<?php echo esc_attr( $refresh ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="wp-drag-drop-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="wp-drag-drop-inner">
					
					<div class="lendiz-customizer-ajax-hid-wrap" data-key="<?php echo esc_attr( $field_id ); ?>">
					
						<?php
							foreach( $dd_parts as $part => $post_items ){
								if( isset( $dd_fields[$part] ) ){
									foreach( $dd_fields[$part] as $key => $value ){ ?>
										<input type="text" class="lendiz-customizer-ajax-field drag-drop-hid-text" name="lendiz_theme_options[<?php echo esc_attr( $field_id ); ?>][<?php echo esc_attr( $part ); ?>][<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $value ); ?>">
									<?php									
									}
								}
							}
						?>					
						
					</div>

					<div class="wp-drag-drop-fields">
					<?php
						$part_array = $dd_fields;
						$t_part_array = array();
						
						foreach( $dd_parts as $key => $value ){
								$t_part_array[$key] = $value != '' ? lendiz_post_option_drag_drop_multi_t( $key, $dd_fields[$key] ) : '';
						}
			
						echo '<div class="meta-drag-drop-multi-field">';
						foreach( $t_part_array as $key => $value ){
								echo '<h4>'. esc_html( $key ) .'</h4>';
								echo ''. $value;
						}
						
						echo '</div>';
					?>
					</div>					
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildExportField( $config ){ 
	?>
		<li class="customize-control lendiz-customize-control">
			<div class="customize-exports-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="customize-exports-inner">
					<a href="#" class="button button-large button-primary btn-lg-button" id="customize-export-custom-btn" target="_blank"><?php esc_html_e( 'Export', 'lendiz' ); ?></a>
				</div>
			</div>
		</li>
	<?php
	}
	
	public static function buildImportField( $config ){ 
	?>
		<li class="customize-control lendiz-customize-control">
			<div class="customize-imports-wrap">
				<?php if( isset( $config['title'] ) && !empty( $config['title'] ) ): ?><label class="customize-control-title"><?php echo esc_html( $config['title'] ); ?></label><?php endif; ?>
				<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<div class="customize-imports-inner">
					<textarea class="customize-import-value-box" id="customize-import-value-box" rows="10"></textarea>
				</div>
				<a href="#" class="button button-large button-primary btn-lg-button" id="customize-import-custom-btn" target="_blank"><?php esc_html_e( 'Import', 'lendiz' ); ?></a>
			</div>
		</li>
	<?php
	}
	
	public static function buildSectionField( $config ){ 
		$section_stat = isset( $config['section_stat'] ) && !empty( $config['section_stat'] ) ? $config['section_stat'] : false;
		
		$required = isset( $config['required'] ) ? $config['required'] : '';
		$required_out = $required_class = '';
		if( $required ){
			$required_class = ' lendiz-customize-required';
			$required_out .= 'data-required="'. $required[0] .'" data-required-cond="'. $required[1] .'"  data-required-val="'. $required[2] .'" ';
		}
	?>
		<li class="customize-control lendiz-customize-control lendiz-customize-hold-section<?php echo esc_attr( $required_class ); ?>" <?php echo !empty( $required_out ) ? $required_out : ''; ?> data-id="<?php echo esc_attr( $field_id ); ?>">
			<div class="wp-customizer-section-wrap">
				<?php if( $section_stat ) : ?>
					<?php if( isset( $config['label'] ) && !empty( $config['label'] ) ): ?><h5 class="customize-control-title"><span class="customize-control-title wp-customizer-section-label"><?php echo esc_html( $config['label'] ); ?></span></h5><?php endif; ?>					
					<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<?php else: ?>
				<span class="wp-customizer-section-end"><hr></span>
				<?php endif; ?>
			</div>
		</li>
	<?php
	}
	
	public static function buildToggleSectionField( $config ){ 
		$section_stat = isset( $config['section_stat'] ) && !empty( $config['section_stat'] ) ? $config['section_stat'] : false;

		$required_class = '';
		if( $section_stat ) $required_class = ' lendiz-toggle-tab-start';
		else $required_class = ' lendiz-toggle-tab-end';
	?>
		<li class="customize-control lendiz-customize-control<?php echo esc_attr( $required_class ); ?>">
			<div class="wp-customizer-section-wrap">
				<?php if( $section_stat ) : ?>
					<?php if( isset( $config['label'] ) && !empty( $config['label'] ) ): ?><h5 class="customize-control-title"><span class="customize-control-title wp-customizer-section-label"><?php echo esc_html( $config['label'] ); ?></span></h5><?php endif; ?>					
					<?php if( isset( $config['description'] ) && !empty( $config['description'] ) ): ?><a class="lendiz-customizer-help" href="#"><span class="dashicons dashicons-editor-help"></span></a><span class="description customize-control-description"><?php echo esc_html( $config['description'] ); ?></span><?php endif; ?>
				<?php else: ?>
				<span class="wp-customizer-section-end"></span>
				<?php endif; ?>
			</div>
		</li>
	<?php
	}
	
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
}