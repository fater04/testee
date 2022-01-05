<?php
class LendizThemeStyles {

	private $exists_fonts = array();
	public static $embrad_gf_array = array();
	public static $lendiz_style_mod = '';
	
	private $_standard_fonts = array(
		"Arial, Helvetica, sans-serif"                         => "Arial, Helvetica, sans-serif",
		"'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif",
		"'Bookman Old Style', serif"                           => "'Bookman Old Style', serif",
		"'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive",
		"Courier, monospace"                                   => "Courier, monospace",
		"Garamond, serif"                                      => "Garamond, serif",
		"Georgia, serif"                                       => "Georgia, serif",
		"Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif",
		"'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace",
		"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
		"'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif",
		"'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif",
		"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
		"Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif",
		"'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif",
		"'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif",
		"Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif",
	);
	
	public function __construct(){
		self::$lendiz_style_mod = get_option( 'lendiz_theme_options_new');
	}
		
	public static function lendiz_static_theme_mod($field){
		if( is_customize_preview() ){
			$lendiz_mod_t = get_option( 'lendiz_theme_options_t');
			$lendiz_style_mod = !empty( $lendiz_mod_t ) ? $lendiz_mod_t : self::$lendiz_style_mod;
		}else{
			$lendiz_style_mod = self::$lendiz_style_mod;
		}

		return isset( $lendiz_style_mod[$field] ) && $lendiz_style_mod[$field] != '' ? $lendiz_style_mod[$field] : '';
	}
	
	function lendiz_theme_color(){
		$theme_color = self::lendiz_static_theme_mod( 'theme-color' );
		return $theme_color ? $theme_color : '#54a5f8';
	}
	function lendiz_secondary_color(){
		$sec_color = self::lendiz_static_theme_mod( 'secondary-color' );
		return $sec_color ? $sec_color : '#95ce69';
	}

	function lendiz_container_width(){
		$site_width = self::lendiz_static_theme_mod( 'site-width' );
		return !empty( $site_width ) ? absint( $site_width ) . 'px' : '1140px';
	}
	
	function lendiz_border_settings($field, $echo = true){
		$border = self::lendiz_static_theme_mod( $field );
		$output = '';
		if( !empty( $border ) ):
		
			$boder_style = isset( $border['style'] ) && $border['style'] != '' ? $border['style'] : '';
			$border_color = isset( $border['color'] ) && $border['color'] != '' ? $border['color'] : '';
			
			if( isset( $border['top'] ) && $border['top'] != '' ):
				$output .= 'border-top-width: '. esc_attr( $border['top'] ) .'px;';
				$output .= !empty( $boder_style ) ? 'border-top-style: '. esc_attr( $boder_style ) .';' : '';
				$output .= !empty( $border_color ) ? 'border-top-color: '. esc_attr( $border_color ) .';' : '';
			endif;
			
			if( isset( $border['right'] ) && $border['right'] != '' ):
				$output .= 'border-right-width: '. esc_attr( $border['right'] ) .'px;';
				$output .= !empty( $boder_style ) ? 'border-right-style: '. esc_attr( $boder_style ) .';' : '';
				$output .= !empty( $border_color ) ? 'border-right-color: '. esc_attr( $border_color ) .';' : '';
			endif;
			
			if( isset( $border['bottom'] ) && $border['bottom'] != '' ):
				$output .= 'border-bottom-width: '. esc_attr( $border['bottom'] ) .'px;';
				$output .= !empty( $boder_style ) ? 'border-bottom-style: '. esc_attr( $boder_style ) .';' : '';
				$output .= !empty( $border_color ) ? 'border-bottom-color: '. esc_attr( $border_color ) .';' : '';
			endif;
			
			if( isset( $border['left'] ) && $border['left'] != '' ):
				$output .= 'border-left-width: '. esc_attr( $border['left'] ) .'px;';
				$output .= !empty( $boder_style ) ? 'border-left-style: '. esc_attr( $boder_style ) .';' : '';				
				$output .= !empty( $border_color ) ? 'border-left-color: '. esc_attr( $border_color ) .';' : '';
			endif;
			
		endif;
		
		if( $echo ){
			echo ''. $output;
		}else{
			return $output;
		}
	}
	
	function lendiz_padding_settings($field, $echo = true){
		$padding = self::lendiz_static_theme_mod( $field );
		$output = '';
		if( !empty( $padding ) ):
			$output .= isset( $padding['top'] ) && $padding['top'] != '' ? 'padding-top: '. esc_attr( $padding['top'] ) .'px;' : '';
			$output .= isset( $padding['right'] ) && $padding['right'] != '' ? 'padding-right: '. esc_attr( $padding['right'] ) .'px;' : '';
			$output .= isset( $padding['bottom'] ) && $padding['bottom'] != '' ? 'padding-bottom: '. esc_attr( $padding['bottom'] ) .'px;' : '';
			$output .= isset( $padding['left'] ) && $padding['left'] != '' ? 'padding-left: '. esc_attr( $padding['left'] ) .'px;' : '';
		endif;
		
		if( $echo ){
			echo ''. $output;
		}else{
			return $output;
		}
	}
	
	function lendiz_margin_settings( $field ){
		$margin = self::lendiz_static_theme_mod( $field );
		if( $margin ):
			echo isset( $margin['top'] ) && $margin['top'] != '' ? 'margin-top: '. esc_attr( $margin['top'] ) .'px;' : '';
			echo isset( $margin['right'] ) && $margin['right'] != '' ? 'margin-right: '. esc_attr( $margin['right'] ) .'px;' : '';
			echo isset( $margin['bottom'] ) && $margin['bottom'] != '' ? 'margin-bottom: '. esc_attr( $margin['bottom'] ) .'px;' : '';
			echo isset( $margin['left'] ) && $margin['left'] != '' ? 'margin-left: '. esc_attr( $margin['left'] ) .'px;' : '';
	endif;
	}
	
	function lendiz_link_color($field, $fun, $echo = true){
		$link = self::lendiz_static_theme_mod( $field );
		if( $echo ){
			echo isset( $link[$fun] ) && $link[$fun] != '' ? ' color: '. esc_attr( $link[$fun] ) .'; ' : '';
		}else{
			return isset( $link[$fun] ) && $link[$fun] != '' ? esc_attr( $link[$fun] ) : '';
		}
		return '';
	}
	
	function lendiz_bg_rgba($field){
		$bg_rgba = self::lendiz_static_theme_mod( $field );
		if( $bg_rgba != '' ) echo 'background: '. esc_attr( $bg_rgba ) .';';
	}
	
	function lendiz_bg_settings($field){
		$bg = self::lendiz_static_theme_mod( $field );
		if( !empty( $bg ) ):
			$bg_trans = isset( $bg['bg_transparent'] ) && $bg['bg_transparent'] ? true : false;
			$bg_media = isset( $bg['bg_media'] ) && $bg['bg_media'] != '' ? $bg['bg_media'] : '';
			$bg_media_url = '';
			if( !empty( $bg_media ) && is_array( $bg_media ) ) 
				$bg_media_url = isset( $bg_media['id'] ) ? wp_get_attachment_url( absint( $bg_media['id'] ) ) : '';
			if( $bg_trans ){
				echo 'background-color: transparent;';
			}
			echo '
			'. ( isset( $bg['bg_color'] ) && $bg['bg_color'] != '' ?  'background-color: '. esc_attr( $bg['bg_color'] ) .';' : '' ) .'
			'. ( $bg_media_url ?  'background-image: url('. esc_url( $bg_media_url ) .');' : '' ) .'
			'. ( isset( $bg['bg_repeat'] ) && $bg['bg_repeat'] != '' ?  'background-repeat: '. esc_attr( $bg['bg_repeat'] ) .';' : '' ) .'
			'. ( isset( $bg['bg_position'] ) && $bg['bg_position'] != '' ?  'background-position: '. esc_attr( $bg['bg_position'] ) .';' : '' ) .'
			'. ( isset( $bg['bg_size'] ) && $bg['bg_size'] != '' ?  'background-size: '. esc_attr( $bg['bg_size'] ) .';' : '' ) .'
			'. ( isset( $bg['bg_attachment'] ) && $bg['bg_attachment'] != '' ?  'background-attachment: '. esc_attr( $bg['bg_attachment'] ) .';' : '' ) .'
			';
		endif;
	}
	
	function lendiz_custom_font_face_create( $font_family, $cf_names ){
	
		$upload_dir = wp_upload_dir();
		$f_type = array('eot', 'otf', 'svg', 'ttf', 'woff');
		if ( in_array( $font_family, $cf_names ) ){
			$t_font_folder = $font_family;
			$t_font_name = sanitize_title( $font_family );
			$font_path = $upload_dir['baseurl'] . '/custom-fonts/' . str_replace( "'", "", $t_font_folder .'/'. $t_font_name );
			echo '@font-face { font-family: '. $t_font_folder .';';
			echo "src: url('". esc_url( $font_path ) .".eot'); /* IE9 Compat Modes */ src: url('". esc_url( $font_path ) .".eot') format('embedded-opentype'), /* IE6-IE8 */ url('". esc_url( $font_path ) .".woff') format('woff'), /* Super Modern Browsers */ url('". esc_url( $font_path ) .".woff') format('woff'), /* Pretty Modern Browsers */ url('". esc_url( $font_path ) .".ttf')  format('truetype'), /* Safari, Android, iOS */ url('". esc_url( $font_path ) .".svg') format('svg'); /* Legacy iOS */ }";
		}
		
	}
	
	function lendiz_custom_font_check($field){
		$cf = self::lendiz_static_theme_mod( $field );
		$f_family = isset( $cf['font_family'] ) ? $cf['font_family'] : '';
		$cf_names = get_option( 'lendiz_custom_fonts_names' );
		if ( !empty( $cf_names ) && !in_array( $f_family, $this->exists_fonts ) ){
			$this->lendiz_custom_font_face_create( $f_family, $cf_names );
			array_push( $this->exists_fonts, $f_family );
		}
	}
	
	function lendiz_get_custom_google_font_frame( $font_family ){
	
		$family = isset( $font_family['family'] ) ? $font_family['family'] : '';
		$weight = isset( $font_family['weight'] ) ? $font_family['weight'] : '';
		$subset = isset( $font_family['subset'] ) ? $font_family['subset'] : '';
		
		if( !empty( $family ) ){
			if( isset( self::$embrad_gf_array[$family] ) ){
				array_push( self::$embrad_gf_array[$family]['weight'], $weight );
				array_push( self::$embrad_gf_array[$family]['subset'], $subset );
			}else{
				self::$embrad_gf_array[$family] = array( 'weight' => array( $weight ), 'subset' => array( $subset ) );
			}
		}
	}
	
	function lendiz_typo_generate($field){
		$typo = self::lendiz_static_theme_mod( $field );
		if( $typo ):
			
			$cf_names = get_option( 'lendiz_custom_fonts_names' );
			$cf_names = !empty( $cf_names ) ? $cf_names : array();
			$font_family = isset( $typo['font_family'] ) && $typo['font_family'] != '' ? $typo['font_family'] : '';

			if ( !in_array( $font_family, $cf_names ) && !in_array( $font_family, $this->_standard_fonts ) && !empty( $font_family ) ){
				$font_weight = isset( $typo['font_weight'] ) && $typo['font_weight'] != '' ? $typo['font_weight'] : '';
				$font_sub = isset( $typo['font_sub'] ) && $typo['font_sub'] != '' ? $typo['font_sub'] : '';
				$gf_arr = array( 'family' => $font_family, 'weight' => $font_weight, 'subset' => $font_sub );
				$this->lendiz_get_custom_google_font_frame( $gf_arr );
			}
			
		endif;
	}
	
	function lendiz_typo_ouput($field){
		$typo = self::lendiz_static_theme_mod( $field );
		if( $typo ):
			
			echo '
			'. ( isset( $typo['font_color'] ) && $typo['font_color'] != '' ?  'color: '. $typo['font_color'] .';' : '' ) .'
			'. ( isset( $typo['font_family'] ) && $typo['font_family'] != '' ?  'font-family: '. $typo['font_family'] .';' : '' ) .'
			'. ( isset( $typo['font_weight'] ) && $typo['font_weight'] != '' ?  'font-weight: '. $typo['font_weight'] .';' : '' ) .'
			'. ( isset( $typo['font_size'] ) && $typo['font_size'] != '' ?  'font-size: '. $typo['font_size'] .'px;' : '' ) .'
			'. ( isset( $typo['line_height'] ) && $typo['line_height'] != '' ?  'line-height: '. $typo['line_height'] .'px;' : '' ) .'
			'. ( isset( $typo['letter_spacing'] ) && $typo['letter_spacing'] != '' ?  'letter-spacing: '. $typo['letter_spacing'] .'px;' : '' ) .'
			'. ( isset( $typo['text_align'] ) && $typo['text_align'] != '' ?  'text-align: '. $typo['text_align'] .';' : '' ) .'
			'. ( isset( $typo['text_transform'] ) && $typo['text_transform'] != '' ?  'text-transform: '. $typo['text_transform'] .';' : '' ) .'
			';
			
		endif;
	}
	
	function lendiz_hex2rgba($color, $opacity = 1) {
	 
		$default = '';
		//Return default if no color provided
		if(empty($color))
			  return $default; 
		//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	 
			//Check if opacity is set(rgba or rgb)
			if( $opacity == 'none' ){
				$output = implode(",",$rgb);
			}elseif( $opacity ){
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			}else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
			//Return rgb(a) color string
			return $output;
	}
}