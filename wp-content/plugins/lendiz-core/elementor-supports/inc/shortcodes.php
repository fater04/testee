<?php
class CEAShortcodes {
	
	public function __construct(){
		add_shortcode( 'videoframe', array( $this, 'lendiz_video_iframe' ) );
		add_shortcode( 'video', array( $this, 'lendiz_video' ) );
		add_shortcode( 'videoframenon', array( $this, 'lendiz_video_iframe_non_param' ) );
		
		//Event Schortcode
		add_shortcode( 'lendiz_tab_events', array( $this, 'lendizTabEvents' ) );
		add_shortcode( 'lendiz_tab_day_events', array( $this, 'lendizTabDailyEvents' ) );
		add_shortcode( 'lendiz_tab_event', array( $this, 'lendizTabEvent' ) );
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
	
} // Shortcode class end
$lendizsc = new CEAShortcodes;