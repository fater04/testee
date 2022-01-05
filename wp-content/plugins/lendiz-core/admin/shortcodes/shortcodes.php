<?php
class LendizShortcodes {

	public $event_title_tab;
	public $event_tab_key;
	public static $lendiz_footer_content = null;
	
	public function __construct(){
		self::$lendiz_footer_content = '';
		add_shortcode( 'soundcloud', array( $this, 'lendiz_soundcloud' ) );
		add_shortcode( 'videoframe', array( $this, 'lendiz_video_iframe' ) );
		add_shortcode( 'video', array( $this, 'lendiz_video' ) );
		add_shortcode( 'videoframenon', array( $this, 'lendiz_video_iframe_non_param' ) );
		add_shortcode( 'popup_anything', array( $this, 'lendiz_popup_anything' ) );
		add_shortcode( 'lendiz_popover', array( $this, 'lendiz_popover' ) );
		add_shortcode( 'lendiz_sticky_element', array( $this, 'lendiz_sticky_element' ) );
		add_shortcode( 'lendiz_popup_element', array( $this, 'lendizPopupElement' ) );
    }

	public function lendiz_soundcloud( $atts ) {
		$atts = shortcode_atts( array(
			'url' => 'https://api.soundcloud.com/tracks/',
			'height' => '',
			'width' => '',
			'params' => ''
		), $atts );
		return '<iframe width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='. esc_url( $atts['url'] ) .'&amp;'. esc_url( $atts['params'] ) .'"></iframe>';
	}
	
	public function lendiz_video_iframe( $atts ) {
		$atts = shortcode_atts( array(
			'url' => '',
			'height' => '',
			'width' => '',
			'params' => ''
		), $atts );
		return '<iframe width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" src="'. esc_url( $atts['url'] ) .'?'. esc_attr( $atts['params'] ) .'" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	}
	
	
	public function lendiz_video_iframe_non_param( $atts ) {
		$atts = shortcode_atts( array(
			'url' => '',
			'height' => '',
			'width' => '',
			'params' => '',
			'allowfullscreen' => ''
		), $atts );
		return '<iframe width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" src="'. esc_url( $atts['url'] ) .'?'. esc_attr( $atts['params'] ) .'" '. esc_attr( $atts['allowfullscreen'] ) .'></iframe>';
	}
	
	public function lendiz_video( $atts ) {
		$atts = shortcode_atts( array(
			'url' => '',
			'height' => '',
			'width' => '',
		), $atts );
		
		return '<video class="lendiz-custom-video" width="'. esc_attr( $atts['width'] ) .'" height="'. esc_attr( $atts['height'] ) .'" preload="true" style="max-width:100%;">
                    <source src="'. esc_url( $atts['url'] ) .'" type="video/mp4">
                </video>';
	}
		
	//[popup_anything icon_class="icon-control-play" video_url="https://www.youtube.com/watch?v=-hTVNidxg2s" img_url=""]
	public static function lendiz_popup_anything( $atts ) {
		$atts = shortcode_atts( array(
			'icon_class' => 'ti-control-play',
			'video_url' => 'https://www.youtube.com/watch?v=-hTVNidxg2s',
			'img_url' => ''
		), $atts );
		
		extract($atts);
		
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_style( 'magnific-popup' );
		
		$output = '';
		if( $video_url ){
			$output = '<a class="popup-video-post" href="'. esc_url( $video_url ) .'">';
				if( $img_url ){
					$output .= '<img src="'. esc_url( $img_url ) .'" alt="'. esc_attr__( 'Video Trigger', 'lendiz' ) .'">';
				}else{
					$output .= '<div class="video-play-icon text-center"><span class="'. esc_attr( $icon_class ) .'"></span></div>';
				}
			$output .= '</a>';
		}
		return $output;
	}
	
	//[lendiz_popover class="btn" txt="Click to Popover" position="bottom" align="center"]This is sample content[/lendiz_popover]
	public static function lendiz_popover( $atts, $content = null ) {
	
		$atts = shortcode_atts( array(
			'txt' => esc_html__( 'Popover Me', 'lendiz-core' ),
			'position' => 'top',
			'align' => 'center'
		), $atts );
		
		extract($atts);
		
		$txt = isset( $txt ) && $txt != '' ? $txt : esc_html__( 'Popover Me', 'lendiz-core' );
		
		$class = isset( $class ) && $class != '' ? ' '. $class : '';
		$class .= isset( $align ) && $align != '' ? ' text-'. $align : ' text-center';
		$class .= isset( $position ) && $position != '' ? ' popover-'. $position : ' popover-top';
		$content = !empty( $content ) ? $content : esc_html__( 'Popover sample content', 'lendiz-core' );
		
		$output = '<div class="popover-wrapper'. esc_attr( $class ) .'">
			<a class="popover-trigger" href="#">'. esc_html( $txt ) .'</a>
			<div class="popover-content">
				<div class="arrow"></div>
				<div class="popover-message">'. do_shortcode( $content ) .'</div>
			</div>
		</div>';
		
		return $output;
	}
	
	//[lendiz_sticky_element align="center" width="300px"]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/lendiz_sticky_element]
	public static function lendiz_sticky_element( $atts, $content = null ){
		$atts = shortcode_atts( array(
			'icon_class'	=> 'ti-settings',
			'icon_text'		=> '',
			'position'	=> 'middle',
			'align'	=> '',
			'width'	=> '300px',
			'extra_class' => ''
		), $atts );
		
		extract($atts);
		
		$icon_class = isset( $icon_class ) && $icon_class != '' ? $icon_class : '';
		$icon_text = isset( $icon_text ) && $icon_text != '' ? $icon_text : '';
		$left = isset( $left ) && $left != '' ? $left : '';
		$top = isset( $top ) && $top != '' ? $top : '';
		$width = isset( $width ) && $width != '' ? $width : '350px';
		$content = !empty( $content ) ? $content : esc_html__( 'Sticky sample content', 'lendiz-core' );
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-' . lendiz_shortcode_rand_id();

		if( $width ){
			$shortcode_css .= '.' . esc_attr( $rand_class ) . '.lendiz-sticky-wrapper { width: '. esc_attr( $width ) .'; right: -'. esc_attr( $width ) .'; }';
		}
		
		$class = isset( $extra_class ) && $extra_class != '' ? ' '. $extra_class : '';
		$class .= isset( $align ) && $align != '' ? ' text-'. $align : ' text-center';
		$class .= isset( $position ) && $position != '' ? ' position-'. $position : ' position-middle';
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' lendiz-inline-css';
		
		$output = '<div class="lendiz-sticky-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
			if( $icon_text ){
				$output .= '<a class="lendiz-sticky-trigger" href="#">'. esc_html( $icon_text ) .'</a>';
			}else{
				$output .= '<a class="lendiz-sticky-trigger" href="#"><span class="'. esc_attr( $icon_class ) .'"></span></a>';
			}
			$output .= '
			<div class="lendiz-sticky-content">
				<div class="lendiz-sticky-message">'. do_shortcode( $content ) .'</div>
			</div>
		</div>';
		
		return $output;
	}
	
	//[lendiz_popup_element]Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/lendiz_popup_element]
	public static function lendizPopupElement( $atts, $content = null ){
		$atts = shortcode_atts( array(
			'icon_class'	=> 'ti-settings',
			'icon_text'		=> ''
		), $atts );
		
		extract($atts);
		
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_style( 'magnific-popup' );
		
		$icon_class = isset( $icon_class ) && $icon_class != '' ? $icon_class : '';
		$icon_text = isset( $icon_text ) && $icon_text != '' ? $icon_text : '';
		$left = isset( $left ) && $left != '' ? $left : '';
		$top = isset( $top ) && $top != '' ? $top : '';
		$width = isset( $width ) && $width != '' ? $width : '350px';
		$content = !empty( $content ) ? $content : esc_html__( 'Popup sample content', 'lendiz-core' );
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = 'shortcode-rand-' . lendiz_shortcode_rand_id();

		$output = '<div class="lendiz-popup-wrapper">';
			if( $icon_text ){
				$output .= '<a class="lendiz-popup-trigger btn secondary-color" href="#lendiz-popup-'. esc_attr( $shortcode_rand_id ) .'">'. esc_html( $icon_text ) .'</a>';
			}else{
				$output .= '<a class="lendiz-popup-trigger" href="#lendiz-popup-'. esc_attr( $shortcode_rand_id ) .'"><span class="'. esc_attr( $icon_class ) .'"></span></a>';
			}
			if( $content ){
				$content_out = '
				<div class="mfp-hide white-popup-block lendiz-popup-content" id="lendiz-popup-'. esc_attr( $shortcode_rand_id ) .'">
					<a href="#" class="lendiz-popup-dismiss"><span class="ti-close"></span></a>
					<div class="lendiz-popup-message">'. do_shortcode( $content ) .'</div>
				</div>';
				//$output .= $content_out;
				self::$lendiz_footer_content .= $content_out;
				add_action( 'wp_footer', array( 'lendizShortcodes', 'lendiz_footer_action' ) );
			}
		$output .= '</div>';
		
		return $output;
	}

	public static function lendiz_footer_action(){
		echo self::$lendiz_footer_content;
	}
} // Shortcode class end
$lendizsc = new LendizShortcodes;