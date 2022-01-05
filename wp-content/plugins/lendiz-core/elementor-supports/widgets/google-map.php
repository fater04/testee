<?php
/**
 * Lendiz Elementor Addon Google Map
 *
 * @since 1.0.0
 */
class Elementor_Google_Map_Widget extends \Elementor\Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Google Map widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizgooglemap";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Google Map widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Google Map", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Google Map widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-map-alt";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Google Map widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ "lendiz-elements" ];
	}
	
	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'custom-front', 'lendiz-gmaps'  ];
	}


	/**
	 * Register Google Map widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		//General Section
		$this->start_controls_section(
			"general_section",
			[
				"label"	=> esc_html__( "General", "lendiz-core" ),
				"tab"	=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Default icon list options.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"extra_class",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Extra Class", "lendiz-core" ),
				"description"	=> esc_html__( "Put extra class for some additional styles.", "lendiz-core" )
			]
		);
		$this->add_control(
			"title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Title", "lendiz-core" ),
				"description"	=> esc_html__( "Enter google map here.", "lendiz-core" )
			]
		);	
		$this->end_controls_section();
		
		//Layouts Section
		$this->start_controls_section(
			"layouts_section",
			[
				"label"			=> esc_html__( "Layouts", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Layouts options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"font_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Font Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the font color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .google-map-wrapper' => 'color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_section();
		
		//Map Section
		$this->start_controls_section(
			"map_section",
			[
				"label"			=> esc_html__( "Map", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Map options available here.", "lendiz-core" ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			"map_latitude",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Map Latitude", "lendiz-core" ),
				"description"	=> esc_html__( "This is set option for google map latitude. Example -25.363", "lendiz-core" ),
				"default" 		=> "-25.363",
			]
		);	
		$repeater->add_control(
			"map_longitude",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Map Longitude", "lendiz-core" ),
				"description"	=> esc_html__( "This is set option for google map longitude. Example 131.044", "lendiz-core" ),
				"default" 		=> "131.044",
			]
		);	
		$repeater->add_control(
			"map_marker",
			[
				"label" 		=> esc_html__( "Map Marker", "lendiz-core" ),
				"description"	=> esc_html__( "Choose map marker image.", "lendiz-core" ),
				"type" 			=> \Elementor\Controls_Manager::MEDIA,
				"dynamic" 		=> [
					"active" => true,
				]
			]
		);
		$repeater->add_control(
			"map_info_opt",
			[
				"label" 		=> esc_html__( "Map Info Window Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for map info window enable or disable.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$repeater->add_control(
			"map_info_title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Map Info Window Title", "lendiz-core" ),
				"description"	=> esc_html__( "This is field for map info window title.", "lendiz-core" ),
				"default"		=> "",
				"condition" 	=> [
					"map_info_opt" 	=> "1"
				]
			]
		);
		$repeater->add_control(
			"map_info_address",
			[
				"type"			=> \Elementor\Controls_Manager::TEXTAREA,
				"label"			=> esc_html__( "Map Info Window Address", "lendiz-core" ),
				"description"	=> esc_html__( "This is field for map info window address. No HTML allowed here.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"map_info_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"multi_map",
			[
				"label"			=> esc_html__( "Map Details", "lendiz-core" ),
				"description"	=> esc_html__( "This is options for google map latitude, longtitude etc..", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::REPEATER,
				"fields"		=> $repeater->get_controls(),
				"default"		=> [
					[
						"map_latitude" => '-25.363',
						"map_longitude" => '131.044'
					]
				],
				"title_field"	=> "{{{ map_latitude }}}, {{{ map_longitude }}}",
			]
		);		
		
		$this->add_control(
			"map_height",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Map Height", "lendiz-core" ),
				"description"	=> esc_html__( "This is set option for google map height.", "lendiz-core" ),
				"default"		=> "400"
			]
		);
		$this->add_control(
			"map_style",
			[
				"label"			=> esc_html__( "Map Style", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for map style. If you want custom map style, then choose custom and set map colors to 'Custom Color' tab.", "lendiz-core" ),
				"default"		=> "standard",
				"options"		=> [
					"standard"		=> esc_html__( "Standard", "lendiz-core" ),
					"aubergine"	=> esc_html__( "Aubergine", "lendiz-core" ),
					"silver"		=> esc_html__( "Silver", "lendiz-core" ),
					"retro"		=> esc_html__( "Retro", "lendiz-core" ),
					"dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"night"		=> esc_html__( "Night", "lendiz-core" ),
					"custom"		=> esc_html__( "Custom", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"map_zoom",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Map Zoom", "lendiz-core" ),
				"description"	=> esc_html__( "This is set option for google map zoom level. Default value is 14", "lendiz-core" ),
				"default"		=> "14"
			]
		);
		$this->add_control(
			"scroll_wheel",
			[
				"label" 		=> esc_html__( "Map Scroll Wheel", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for google map zoom on scroll at position of mouse on map.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->end_controls_section();
		
		//Custom Map Colors
		$this->start_controls_section(
			"custom_color_section",
			[
				"label"			=> esc_html__( "Custom Color", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Map custom color options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"map_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Map Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for general map.", "lendiz-core" ),
				"default" 		=> "#242f3e"
			]
		);
		$this->add_control(
			"map_text_stroke",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Map Text Stroke Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for general map text stroke.", "lendiz-core" ),
				"default" 		=> "#242f3e"
			]
		);
		$this->add_control(
			"map_text_fill",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Map Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for general map text fill.", "lendiz-core" ),
				"default" 		=> "#746855"
			]
		);
		$this->add_control(
			"administrative",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Administrative Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for administrative text fill.", "lendiz-core" ),
				"default" 		=> "#d59563"
			]
		);
		$this->add_control(
			"poi_text_fill",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "POI Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for POI text fill.", "lendiz-core" ),
				"default" 		=> "#d59563"
			]
		);
		$this->add_control(
			"poi_park",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "POI Park Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for POI park.", "lendiz-core" ),
				"default" 		=> "#263c3f"
			]
		);
		$this->add_control(
			"poi_park_text_fill",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "POI Park Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for POI park text fill.", "lendiz-core" ),
				"default" 		=> "#6b9a76"
			]
		);
		$this->add_control(
			"road",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Road Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for road.", "lendiz-core" ),
				"default" 		=> "#38414e"
			]
		);
		$this->add_control(
			"road_stroke",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Road Stroke Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for road stroke.", "lendiz-core" ),
				"default" 		=> "#212a37"
			]
		);
		$this->add_control(
			"road_text_fill",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Road Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for road text fill.", "lendiz-core" ),
				"default" 		=> "#9ca5b3"
			]
		);
		$this->add_control(
			"road_highway",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Road Highway Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for road highway.", "lendiz-core" ),
				"default" 		=> "#746855"
			]
		);
		$this->add_control(
			"road_highway_stroke",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Road Highway Stroke Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for road highway stroke.", "lendiz-core" ),
				"default" 		=> "#1f2835"
			]
		);
		$this->add_control(
			"road_highway_text_fill",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Road Highway Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for road highway text fill.", "lendiz-core" ),
				"default" 		=> "#f3d19c"
			]
		);
		$this->add_control(
			"transit",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Transit Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for transit.", "lendiz-core" ),
				"default" 		=> "#2f3948"
			]
		);
		$this->add_control(
			"transit_station",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Transit Station Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for transit station text fill.", "lendiz-core" ),
				"default" 		=> "#d59563"
			]
		);
		$this->add_control(
			"water",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Water Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for water.", "lendiz-core" ),
				"default" 		=> "#17263c"
			]
		);
		$this->add_control(
			"water_text_fill",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Water Text Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for water text fill.", "lendiz-core" ),
				"default" 		=> "#515c6d"
			]
		);
		$this->add_control(
			"water_text_stroke",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Water Text Stroke Color", "lendiz-core" ),
				"description"	=> esc_html__( "This is color option for water text stroke.", "lendiz-core" ),
				"default" 		=> "#17263c"
			]
		);
		$this->end_controls_section();
			
	}
	
	/**
	 * Render Animated Text widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		//Define Variables
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';	
		$map_height = isset( $map_height ) && $map_height != '' ? $map_height : '';
		$map_style = isset( $map_style ) && $map_style != '' ? $map_style : '';
		$scroll_wheel = isset( $scroll_wheel ) && $scroll_wheel == '1' ? 'true' : 'false';
		$map_zoom = isset( $map_zoom ) && $map_zoom != '' ? $map_zoom : '14';
		$default_mstyle = '[]';
		
		$multi_map_values = isset( $multi_map ) ? $multi_map : '';
		foreach( $multi_map_values as $key => $map ){
			if( isset( $map['map_marker'] ) && $map['map_marker'] != '' ){
				$multi_map_values[$key]['map_marker'] = $map['map_marker']['url'];
			}
		}
		$multi_map = json_encode( $multi_map_values );
		if( $map_style == 'custom' ){
			$default_mattr = array( "map_color", "map_text_stroke", "map_text_fill", "administrative", "poi_text_fill", "poi_park", "poi_park_text_fill", "road", "road_stroke", "road_text_fill", "road_highway", "road_highway_stroke", "road_highway_text_fill", "transit", "transit_station", "water", "water_text_fill", "water_text_stroke" );
			$map_styl = array();
			foreach( $default_mattr as $attr ){
				$map_styl[$attr] = isset( $$attr ) ? $$attr : '';
			}
			if( $map_styl ):
				$default_mstyle = '[ {"elementType": "geometry", "stylers": [{"color": "'. esc_attr( $map_styl["map_color"] ) .'"}]}, {"elementType": "labels.text.stroke", "stylers": [{"color": "'. esc_attr( $map_styl["map_text_stroke"] ) .'"}]}, {"elementType": "labels.text.fill", "stylers": [{"color": "'. esc_attr( $map_styl["map_text_fill"] ) .'"}]}, {  "featureType": "administrative.locality",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["administrative"] ) .'"}] }, {  "featureType": "poi",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["poi_text_fill"] ) .'"}] }, {  "featureType": "poi.park",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["poi_park"] ) .'"}] }, {  "featureType": "poi.park",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["poi_park_text_fill"] ) .'"}] }, {  "featureType": "road",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["road"] ) .'"}] }, {  "featureType": "road",  "elementType": "geometry.stroke",  "stylers": [{"color": "'. esc_attr( $map_styl["road_stroke"] ) .'"}] }, {  "featureType": "road",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["road_text_fill"] ) .'"}] }, {  "featureType": "road.highway",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["road_highway"] ) .'"}] }, {  "featureType": "road.highway",  "elementType": "geometry.stroke",  "stylers": [{"color": "'. esc_attr( $map_styl["road_highway_stroke"] ) .'"}] }, {  "featureType": "road.highway",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["road_highway_text_fill"] ) .'"}] }, {  "featureType": "transit",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["transit"] ) .'"}] }, {  "featureType": "transit.station",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["transit_station"] ) .'"}] }, {  "featureType": "water",  "elementType": "geometry",  "stylers": [{"color": "'. esc_attr( $map_styl["water"] ) .'"}] }, {  "featureType": "water",  "elementType": "labels.text.fill",  "stylers": [{"color": "'. esc_attr( $map_styl["water_text_fill"] ) .'"}] }, {  "featureType": "water",  "elementType": "labels.text.stroke",  "stylers": [{"color": "'. esc_attr( $map_styl["water_text_stroke"] ) .'"}] } ]';
			endif;
		}// if map style is custom
		
		echo '<div class="google-map-wrapper'. esc_attr( $class ) .'">';
			echo isset( $title ) && $title != '' ? '<h3>' . $title . '</h3>' : '';
			
			echo '<div class="lendizgmap" styl'.'e="width:100%;height:'. absint( $map_height ) .'px;" data-map-style="'. esc_attr( $map_style ) .'" data-multi-map="true" data-maps="'. htmlspecialchars( $multi_map, ENT_QUOTES, 'UTF-8' ) .'" data-wheel="'. esc_attr( $scroll_wheel ) .'" data-zoom="'. esc_attr( $map_zoom ) .'" data-custom-style="'. htmlspecialchars( $default_mstyle, ENT_QUOTES, 'UTF-8' ) .'"></div>';
			
		echo '</div><!-- .google-map-wrapper -->';		

	}
		
}