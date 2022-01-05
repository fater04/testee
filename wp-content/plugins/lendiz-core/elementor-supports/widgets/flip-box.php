<?php
/**
 * Lendiz Elementor Addon Flip Box
 *
 * @since 1.0.0
 */
class Elementor_Flip_Box_Widget extends \Elementor\Widget_Base {

	private $title_array;
	private $flip_content;
	private $flip_icon_array;
	private $flip_img_array;
	private $flip_video_array;
	private $flip_btn_array;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Flip box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizflipbox";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Flip box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Flip Box", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Flip box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-agenda";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Flip box widget belongs to.
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
	 * Register Flip box widget controls.
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
				"description"	=> esc_html__( "Default flip box options.", "lendiz-core" ),
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
			"flip_style",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Flip Box Hover Styles", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for hover animation style flip box.", "lendiz-core" ),
				"default"		=> "imghvr-fade",
				"options"		=> [
					"imghvr-fade" => esc_html__( "Fade", "lendiz-core" ),
					"imghvr-push-up" => esc_html__( "Push Up", "lendiz-core" ), 
					"imghvr-push-down" => esc_html__( "Push Down", "lendiz-core" ), 
					"imghvr-push-left" => esc_html__( "Push Left", "lendiz-core" ), 
					"imghvr-push-right" => esc_html__( "Push Right", "lendiz-core" ), 
					"imghvr-slide-up" => esc_html__( "Slide Up", "lendiz-core" ), 
					"imghvr-slide-down" => esc_html__( "Slide Down", "lendiz-core" ), 
					"imghvr-slide-left" => esc_html__( "Slide Left", "lendiz-core" ), 
					"imghvr-slide-right" => esc_html__( "Slide Right", "lendiz-core" ), 
					"imghvr-reveal-up" => esc_html__( "Reveal Up", "lendiz-core" ), 
					"imghvr-reveal-down" => esc_html__( "Reveal Down", "lendiz-core" ), 
					"imghvr-reveal-left" => esc_html__( "Reveal Left", "lendiz-core" ), 
					"imghvr-reveal-right" => esc_html__( "Reveal Right", "lendiz-core" ), 
					"imghvr-hinge-up" => esc_html__( "Hinge Up", "lendiz-core" ), 
					"imghvr-hinge-down" => esc_html__( "Hinge Down", "lendiz-core" ), 
					"imghvr-hinge-left" => esc_html__( "Hinge Left", "lendiz-core" ), 
					"imghvr-hinge-right" => esc_html__( "Hinge Right", "lendiz-core" ), 
					"imghvr-flip-horiz" => esc_html__( "Flip Horizontal", "lendiz-core" ), 
					"imghvr-flip-vert" => esc_html__( "Flip Vertical", "lendiz-core" ), 
					"imghvr-flip-diag-1" => esc_html__( "Diagonal 1", "lendiz-core" ), 
					"imghvr-flip-diag-2" => esc_html__( "Diagonal 2", "lendiz-core" ), 
					"imghvr-flip-3d-horz" => esc_html__( "Flip 3D Horizontal", "lendiz-core" ),
					"imghvr-flip-3d-vert" => esc_html__( "Flip 3D Vertical", "lendiz-core" ), 
					"imghvr-shutter-out-horiz" => esc_html__( "Shutter Out Horizontal", "lendiz-core" ), 
					"imghvr-shutter-out-vert" => esc_html__( "Shutter Out Vertical", "lendiz-core" ), 
					"imghvr-shutter-out-diag-1" => esc_html__( "Shutter Out Diagonal 1", "lendiz-core" ), 
					"imghvr-shutter-out-diag-2" => esc_html__( "Shutter Out Diagonal 2", "lendiz-core" ), 
					"imghvr-shutter-in-horiz" => esc_html__( "Shutter In Horizontal", "lendiz-core" ), 
					"imghvr-shutter-in-vert" => esc_html__( "Shutter In Vertical", "lendiz-core" ), 
					"imghvr-shutter-in-out-horiz" => esc_html__( "Shutter In Out Horizontal", "lendiz-core" ), 
					"imghvr-shutter-in-out-vert" => esc_html__( "Shutter In Out Vertical", "lendiz-core" ), 
					"imghvr-shutter-in-out-diag-1" => esc_html__( "Shutter In Out Diagonal 1", "lendiz-core" ), 
					"imghvr-shutter-in-out-diag-2" => esc_html__( "Shutter In Out Diagonal 2", "lendiz-core" ), 
					"imghvr-fold-up" => esc_html__( "Fold Up", "lendiz-core" ), 
					"imghvr-fold-down" => esc_html__( "Fold Down", "lendiz-core" ), 
					"imghvr-fold-left" => esc_html__( "Fold Left", "lendiz-core" ), 
					"imghvr-fold-right" => esc_html__( "Fold Right", "lendiz-core" ), 
					"imghvr-zoom-in" => esc_html__( "Zoom In", "lendiz-core" ), 
					"imghvr-zoom-out" => esc_html__( "Zoom Out", "lendiz-core" ), 
					"imghvr-zoom-out-up" => esc_html__( "Zoom Out Up", "lendiz-core" ), 
					"imghvr-zoom-out-down" => esc_html__( "Zoom Out Down", "lendiz-core" ), 
					"imghvr-zoom-out-left" => esc_html__( "Zoom Out Left", "lendiz-core" ), 
					"imghvr-zoom-out-right" => esc_html__( "Zoom Out Right", "lendiz-core" ), 
					"imghvr-zoom-out-flip-horiz" => esc_html__( "Zoom Out Flip Horizontal", "lendiz-core" ), 
					"imghvr-zoom-out-flip-vert" => esc_html__( "Zoom Out Flip Vertical", "lendiz-core" ), 
					"imghvr-blur" => esc_html__( "Blur", "lendiz-core" )
				]
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
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for Flipbox text align.", "lendiz-core" ),
				"default"		=> "center",
				"options"		=> [
					"default"	=> esc_html__( "Default", "lendiz-core" ),
					"left"		=> esc_html__( "Left", "lendiz-core" ),
					"center"	=> esc_html__( "Center", "lendiz-core" ),
					"right"		=> esc_html__( "Right", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Primary Box Section
		$this->start_controls_section(
			"primary_box_section",
			[
				"label"			=> esc_html__( "Primary Box", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Primary box options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"primary_title_head",
			[
				"label"			=> esc_html__( "Primary Title Heading Tag", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "h3",
				"options"		=> [
					"h1"		=> esc_html__( "Heading 1", "lendiz-core" ),
					"h2"		=> esc_html__( "Heading 2", "lendiz-core" ),
					"h3"		=> esc_html__( "Heading 3", "lendiz-core" ),
					"h4"		=> esc_html__( "Heading 4", "lendiz-core" ),
					"h5"		=> esc_html__( "Heading 5", "lendiz-core" ),
					"h6"		=> esc_html__( "Heading 6", "lendiz-core" ),
				]
			]
		);
		$this->add_control(
			"font_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Primary Box Font Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the flip primary box font color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-front' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"front_bg",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Primary Box Background Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the flip primary box background color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-front' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"flip_primary_items",
			[
				"label"				=> "Primary Box Items",
				"description"		=> esc_html__( "This is settings for primary box custom layout. here you can set your own layout. Drag and drop needed flip items to enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					'Enabled' => array( 
						'icon'	=> esc_html__( 'Icon', 'lendiz-core' ),
						'title'	=> esc_html__( 'Title', 'lendiz-core' ),
						'content'	=> esc_html__( 'Content', 'lendiz-core' )					
					),
					'disabled' => array(
						'btn'	=> esc_html__( 'Button', 'lendiz-core' ),
						'image'	=> esc_html__( 'Image', 'lendiz-core' )
					)
				]
			]
		);
		$this->add_control(
			"front_padding",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Flip Box Primary Padding", "lendiz-core" ),
				"description"	=> esc_html__( "This is padding option of primary box. Example 10px", "lendiz-core" ),
				"default"		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-front' => 'padding-top: {{VALUE}}; padding-bottom: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"primary_spacing",
			[
				"type"			=> 'itemspacing',
				"label"			=> esc_html__( "Primary Items Spacing", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention each flip primary box items bottom space if you want to set default space of any item just use hyphen(-). Example 10px 20px - 10px", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->end_controls_section();
		
		//Secondary Box Section
		$this->start_controls_section(
			"secondary_box_section",
			[
				"label"			=> esc_html__( "Secondary Box", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Secondary box options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"secondary_title_head",
			[
				"label"			=> esc_html__( "Secondary Title Heading Tag", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "h3",
				"options"		=> [
					"h1"		=> esc_html__( "Heading 1", "lendiz-core" ),
					"h2"		=> esc_html__( "Heading 2", "lendiz-core" ),
					"h3"		=> esc_html__( "Heading 3", "lendiz-core" ),
					"h4"		=> esc_html__( "Heading 4", "lendiz-core" ),
					"h5"		=> esc_html__( "Heading 5", "lendiz-core" ),
					"h6"		=> esc_html__( "Heading 6", "lendiz-core" ),
				]
			]
		);
		$this->add_control(
			"font_hcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Secondary Box Font Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the flip secondary box color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-back' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"back_bg",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Secondary Box Background Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the flip primary box secondary color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-back' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"flip_secondary_items",
			[
				"label"				=> "Secondary Box Items",
				"description"		=> esc_html__( "This is settings for secondary box custom layout. here you can set your own layout. Drag and drop needed flip items to enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					'Enabled' => array( 
						'icon'	=> esc_html__( 'Icon', 'lendiz-core' ),
						'title'	=> esc_html__( 'Title', 'lendiz-core' ),
						'content'	=> esc_html__( 'Content', 'lendiz-core' )					
					),
					'disabled' => array(
						'btn'	=> esc_html__( 'Button', 'lendiz-core' ),
						'image'	=> esc_html__( 'Image', 'lendiz-core' )
					)
				]
			]
		);
		$this->add_control(
			"back_padding",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Flip Box Secondary Padding", "lendiz-core" ),
				"description"	=> esc_html__( "This is padding option of secondary box. Example 10px", "lendiz-core" ),
				"default"		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-back' => 'padding-top: {{VALUE}}; padding-bottom: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"secondary_spacing",
			[
				"type"			=> 'itemspacing',
				"label"			=> esc_html__( "Secondary Items Spacing", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention each flip secondary box items bottom space if you want to set default space of any item just use hyphen(-). Example 10px 20px - 10px", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->end_controls_section();
		
		//Title Section
		$this->start_controls_section(
			"title_section",
			[
				"label"			=> esc_html__( "Title", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Title options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Flip Box Title", "lendiz-core" ),
				"description"	=> esc_html__( "Input flip box title here.", "lendiz-core" ),
				"default" 		=> esc_html__( "Flip Title", "lendiz-core" )
			]
		);
		$this->add_control(
			"title_url_opt",
			[
				"label" 		=> esc_html__( "Set Title as Link", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for flip box title as link. Enable yes to set title url.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"title_url",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Title External Link", "lendiz-core" ),
				"description"	=> esc_html__( "Set title external url.", "lendiz-core" ),
				"condition" 	=> [
					"title_url_opt" 		=> "1"
				]
			]
		);
		$this->add_control(
			"title_external_tab",
			[
				"label"			=> esc_html__( "Title External Target", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "_blank",
				"options"		=> [
					"_blank"		=> esc_html__( "New Tab", "lendiz-core" ),
					"_self"			=> esc_html__( "Self Tab", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"title_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Title Primary Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the flip primary box title color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-front .flip-box-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-front .flip-box-title:after' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			"stitle_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Title Secondary Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the flip primary box title color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-back .flip-box-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .flip-box-wrapper .flip-box-inner .flip-back .flip-box-title:after' => 'background-color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			"title_text_trans",
			[
				"label"			=> esc_html__( "Title Transform", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Set title text-transform property.", "lendiz-core" ),
				"default"		=> "none",
				"options"		=> [
					"none"			=> esc_html__( "Default", "lendiz-core" ),
					"capitalize"	=> esc_html__( "Capitalized", "lendiz-core" ),
					"uppercase"		=> esc_html__( "Upper Case", "lendiz-core" ),
					"lowercase"		=> esc_html__( "Lower Case", "lendiz-core" )
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-title' => 'text-transform: {{VALUE}};'
				],
			]
		);
		$this->end_controls_section();
		
		//Icon Section
		$this->start_controls_section(
			"icon_section",
			[
				"label"			=> esc_html__( "Icon", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Icon options available here.", "lendiz-core" ),
			]
		);	
		$this->add_control(
			"icon_opt",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Choose Icon Font", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for select icon font.", "lendiz-core" ),
				"default"		=> "icon_fa",
				"options"		=> [
					"icon_fa"	=> esc_html__( "Font Awesome", "lendiz-core" ),
					"icon_ti"	=> esc_html__( "Themify", "lendiz-core" ),
				]
			]
		);
		$this->add_control(
			"icon_fa",
			[
				"label" => esc_html__( "Fa Icon", "lendiz-core" ),
				"type" 	=> "fontawesomeicon",
				"description"	=> esc_html__( "This is option for select font awesome icons.", "lendiz-core" ),
				"default" => "ti-star",
				"condition" 	=> [
					"icon_opt" 	=> "icon_fa"
				],
			]
		);
		$this->add_control(
			"icon_ti",
			[
				"label" => esc_html__( "Ti Icon", "lendiz-core" ),
				"type" 	=> "themifyicon",
				"description"	=> esc_html__( "This is option for select themify icons.", "lendiz-core" ),
				"default" => "ti-heart",
				"condition" 	=> [
					"icon_opt" 	=> "icon_ti"
				],
			]
		);
		$this->add_control(
			"icon_size",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Icon Size", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for set icon size. Example 30", "lendiz-core" ),
				"default"		=> "24",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-icon > span' => 'font-size: {{VALUE}}px;'
				]
			]
		);
		$this->add_control(
			"icon_outer_size",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Icon Outer Width and Height", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for set icon outer width and Height. Example 60", "lendiz-core" ),
				"default"		=> "48",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-icon > span' => 'width: {{VALUE}}px; height: {{VALUE}}px;'
				]
			]
		);
		$this->add_control(
			"icon_style",
			[
				"label"			=> esc_html__( "Icon Style", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Choose icon style.", "lendiz-core" ),
				"default"		=> "rounded-circle",
				"options"		=> [
					"squared"			=> esc_html__( "Squared", "lendiz-core" ),
					"rounded"			=> esc_html__( "Rounded", "lendiz-core" ),
					"rounded-circle"	=> esc_html__( "Circled", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"icon_midd",
			[
				"label" 		=> esc_html__( "Icon Vertical Middle", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for flip box icon set vertically middle from the outer area.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "1"
			]
		);
		$this->add_control(
			"icon_self_center",
			[
				"label" 		=> esc_html__( "Icon Self Center", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for flip box list style icon set vertically middle.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0",
				"condition" 	=> [
					"list_style" 	=> "1"
				],
			]
		);
		$this->add_control(
			"icon_variation",
			[
				"label"			=> esc_html__( "Icon Style", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for flip box icon style.", "lendiz-core" ),
				"default"		=> "icon-dark",
				"options"		=> [
					"icon-dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"icon-light"	=> esc_html__( "Light", "lendiz-core" ),
					"theme-color"	=> esc_html__( "Theme", "lendiz-core" ),
					"c"				=> esc_html__( "Custom", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"icon_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Icon Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the icon color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"icon_variation" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-icon > span' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"icon_hcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Icon Hover Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the icon hover color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper:hover .flip-box-icon > span' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"icon_bg",
			[
				"label"			=> esc_html__( "Icon Background", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Here you can put the icon background.", "lendiz-core" ),
				"default"		=> "none",
				"options"		=> [
					"none"				=> esc_html__( "None", "lendiz-core" ),
					"theme-color-bg"	=> esc_html__( "Theme Color", "lendiz-core" ),
					"c"					=> esc_html__( "Custom Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"icon_bg_custom",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Icon Background Custom Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the icon background color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"icon_bg" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-icon > span' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"icon_hbg",
			[
				"label"			=> esc_html__( "Icon Hover Background", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Here you can put the icon hover background.", "lendiz-core" ),
				"default"		=> "none",
				"options"		=> [
					"none"				=> esc_html__( "None", "lendiz-core" ),
					"theme-color-bg"	=> esc_html__( "Theme Color", "lendiz-core" ),
					"c"					=> esc_html__( "Custom Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"icon_bg_hcustom",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Icon Hover Background Custom Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the icon background hover custom color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"icon_hbg" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper:hover .flip-box-icon > span' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"icon_border_size",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Icon Border Size", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the border size. Example 1", "lendiz-core" ),
				"default"		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-icon > span' => 'border-width: {{VALUE}}px; border-style: solid;'
				]
			]
		);
		$this->add_control(
			"border_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Border Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the border color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper .flip-box-icon > span' => 'border-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"border_hcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Hover Border Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the hover border color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .flip-box-wrapper:hover .flip-box-icon > span' => 'border-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_section();	
		
		// Image Section
		$this->start_controls_section(
			"image_section",
			[
				"label"			=> esc_html__( "Image", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Image options available here.", "lendiz-core" ),
			]
		);	
		$this->add_control(
			"flip_image",
			[
				"type" => \Elementor\Controls_Manager::MEDIA,
				"label" => __( "Flip Box Image", "lendiz-core" ),
				"description"	=> esc_html__( "Choose flip box image.", "lendiz-core" ),
				"dynamic" => [
					"active" => true,
				]
			]
		);
		$this->add_control(
			"img_style",
			[
				"label"			=> esc_html__( "Image Style", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Choose image style.", "lendiz-core" ),
				"default"		=> "rounded-circle",
				"options"		=> [
					"squared"			=> esc_html__( "Squared", "lendiz-core" ),
					"rounded"			=> esc_html__( "Rounded", "lendiz-core" ),
					"rounded-circle"	=> esc_html__( "Circled", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"img_effects",
			[
				"label"			=> esc_html__( "Image Hover Effects", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is effects option for image hover.", "lendiz-core" ),
				"default"		=> "none",
				"options"		=> [
					"none"		=> esc_html__( "None", "lendiz-core" ),
					"overlay"	=> esc_html__( "Overlay", "lendiz-core" ),
					"zoomin"		=> esc_html__( "Zoom In", "lendiz-core" ),
					"grayscale"		=> esc_html__( "Grayscale", "lendiz-core" ),
					"blur"		=> esc_html__( "Blur", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();		
		
		// Button
		$this->start_controls_section(
			"button_section",
			[
				"label"			=> esc_html__( "Button", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Button options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"btn_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Button Text", "lendiz-core" ),
				"description"	=> esc_html__( "Enter section button text here. If no need button, then leave this box blank.", "lendiz-core" ),
				"default"		=> ""
			]
		);
		$this->add_control(
			"btn_url",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Button URL", "lendiz-core" ),
				"description"	=> esc_html__( "Enter section button url here. If no need button url, then leave this box blank.", "lendiz-core" ),
				"default"		=> ""
			]
		);
		$this->add_control(
			"btn_type",
			[
				"label"			=> esc_html__( "Button Type", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Choose button type.", "lendiz-core" ),
				"default"		=> "default",
				"options"		=> [
					"default"		=> esc_html__( "Default", "lendiz-core" ),
					"link"			=> esc_html__( "Link", "lendiz-core" ),
					"classic"		=> esc_html__( "Classic", "lendiz-core" ),
					"bordered"		=> esc_html__( "Bordered", "lendiz-core" ),
					"inverse"		=> esc_html__( "Inverse", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();	
		
		// Content
		$this->start_controls_section(
			"content_section",
			[
				"label"			=> esc_html__( "Content", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT
			]
		);
		$this->add_control(
			"content",
			[
				"type"			=> \Elementor\Controls_Manager::TEXTAREA,
				"label"			=> esc_html__( "Content", "lendiz-core" ),
				"description"	=> esc_html__( "You can give the flip box content here. HTML allowed here.", "lendiz-core" ),
				"default" 		=> esc_html__( "Flip box content.", "lendiz-core" )
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
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';	
		
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. lendiz_shortcode_rand_id();
		
		//Title section
		$title = isset( $title ) && $title != '' ? $title : '';
		$title_url_opt = isset( $title_url_opt ) && $title_url_opt != '' ? $title_url_opt : '0';
		$title_url = isset( $title_url ) && $title_url != '' ? $title_url : '';
		$primary_title_head = isset( $primary_title_head ) && $primary_title_head != '' ? $primary_title_head : 'h3';
		$secondary_title_head = isset( $secondary_title_head ) && $secondary_title_head != '' ? $secondary_title_head : 'h3';
		$title_redirect = isset( $title_external_tab ) && $title_external_tab != '' ? $title_external_tab : '_blank';
		
		$this->title_array = array(
			'title' => $title,
			'title_url_opt' => $title_url_opt,
			'title_url' => $title_url,
			'title_head' => $primary_title_head,
			'title_redirect' => $title_redirect
		);
		
		//Icon Section
		$icon_class = '';
		$icon_opt = isset( $icon_opt ) && $icon_opt != '' ? $icon_opt : '';
		$icon = isset( $$icon_opt ) && $$icon_opt != '' ? $$icon_opt : '';
		$icon_class .= isset( $icon_variation ) && $icon_variation != 'c' ? ' icon-'.$icon_variation : ' icon-dark';
		$icon_class .= isset( $icon_style ) && $icon_style != '' ? ' '.$icon_style : ' squared';
		$icon_class .= isset( $icon_midd ) && $icon_midd == '1' ? ' flip-icon-middle' : '';
		$this->flip_icon_array = array(
			'icon' => $icon,
			'icon_class' => $icon_class
		);
		
		//Image Section
		$img_class = '';
		$flip_image = isset( $flip_image ) && !empty( $flip_image ) ? $flip_image : '';
		$img_url = is_array( $flip_image ) && isset( $flip_image['url'] ) ? $flip_image['url'] : '';
		$img_class .= isset( $img_style ) && !empty( $img_style ) ? ' '.$img_style : '';
		$img_class .= isset( $img_effects ) && !empty( $img_effects ) ? ' flip-img-overlay-'.$img_effects : '';
		$this->flip_img_array = array(
			'img_url' => $img_url,
			'img_class' => $img_class
		);
		
		//Button Setion
		$btn_type = isset( $btn_type ) && !empty( $btn_type ) ? ' btn-'.$btn_type : '  btn-default';
		$btn_url = isset( $btn_url ) && !empty( $btn_url ) ? $btn_url : '';
		$btn_text = isset( $btn_text ) && !empty( $btn_text ) ? $btn_text : esc_html__( 'More', 'lendiz-core' );
		$this->flip_btn_array = array(
			'btn_type' => $btn_type,
			'btn_url' => $btn_url,
			'btn_text' => $btn_text
		);
		
		//Video Section
		$flip_video = isset( $flip_video ) && !empty( $flip_video ) ? $flip_video : '';
		$this->flip_video_array = array(
			'video' => $flip_video,
		);
		
		//Layout Section
		$default_items = array( 
			'icon'	=> esc_html__( 'Icon', 'lendiz-core' ),
			'title'	=> esc_html__( 'Title', 'lendiz-core' ),
			'content'	=> esc_html__( 'Content', 'lendiz-core' )
		);
		$p_elemetns = isset( $flip_primary_items ) && !empty( $flip_primary_items ) ? json_decode( $flip_primary_items, true ) : array( 'Enabled' => $default_items );
		$s_elemetns = isset( $flip_secondary_items ) && !empty( $flip_secondary_items ) ? json_decode( $flip_secondary_items, true ) : array( 'Enabled' => $default_items );
		
		//Content Section
		$this->flip_content = isset( $content ) && $content != '' ? $content : ''; 
		
		//Primary Spacing
		if( isset( $primary_spacing ) && !empty( $primary_spacing ) ){

			$primary_spacing = preg_replace( '!\s+!', ' ', $primary_spacing );
			$space_arr = explode( " ", $primary_spacing );
			$i = 1;

			$space_class_name = '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-box-inner .flip-front >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != '-' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .'), '. $space_list_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		//Secondary Spacing
		if( isset( $secondary_spacing ) && !empty( $secondary_spacing ) ){

			$secondary_spacing = preg_replace( '!\s+!', ' ', $secondary_spacing );
			$space_arr = explode( " ", $secondary_spacing );
			$i = 1;

			$space_class_name = '.' . esc_attr( $rand_class ) . '.flip-box-wrapper .flip-box-inner .flip-back >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != '-' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .'), '. $space_list_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
			
		$inner_class = isset( $flip_style ) ? ' ' . $flip_style : ' imghvr-push-up';
			
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' lendiz-inline-css';
		echo '<div class="flip-box-wrapper'. esc_attr( $class ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
				
				echo '<div class="flip-box-inner'. esc_attr( $inner_class ) .'">';
					echo '<div class="flip-front">';
						if( isset( $p_elemetns['Enabled'] ) && !empty( $p_elemetns['Enabled'] ) ) :
							foreach( $p_elemetns['Enabled'] as $element => $value ){
								$this->lendiz_flipbox_shortcode_elements( $element );
							}
						endif;
					echo '</div><!-- .flip-front -->';
					
					echo '<div class="flip-back">';
						$this->title_array['title_head'] = $secondary_title_head;
						if( isset( $s_elemetns['Enabled'] ) && !empty( $s_elemetns['Enabled'] ) ) :
							foreach( $s_elemetns['Enabled'] as $element => $value ){
								$this->lendiz_flipbox_shortcode_elements( $element );
							}
						endif;
					echo '</div><!-- .flip-back -->';
				echo '</div><!-- .flip-inner -->';
	
		echo '</div><!-- .flip-box-wrapper -->';

	}
	
	function lendiz_flipbox_shortcode_elements( $element ){
		switch( $element ){
		
			case "title":
				$title_array = $this->title_array;
				if( $title_array['title'] ){
					if( $title_array['title_url_opt'] == '1' && $title_array['title_url'] != '' )
						echo '<'. esc_attr( $title_array['title_head'] ) .' class="flip-box-title"><a href="'. esc_url( $title_array['title_url'] ) .'" title="'. esc_attr( $title_array['title'] ) .'" target="'. esc_attr( $title_array['title_redirect'] ) .'">'. esc_html( $title_array['title'] ) .'</a></'. esc_attr( $title_array['title_head'] ) .'>';
					else
						echo '<'. esc_attr( $title_array['title_head'] ) .' class="flip-box-title">'. esc_html( $title_array['title'] ) .'</'. esc_attr( $title_array['title_head'] ) .'>';
				}
			break;
			
			case "icon":
				if( $this->flip_icon_array ) echo '<div class="flip-box-icon"><span class="text-center'. esc_attr( $this->flip_icon_array['icon_class'] ) .' '. esc_attr( $this->flip_icon_array['icon'] ) .'"></span></div>';
			break;
			
			case "image":
				if( $this->flip_img_array ) echo '<div class="flip-box-image"><img class="img-fluid'. esc_attr( $this->flip_img_array['img_class'] ) .'" src="'. esc_url( $this->flip_img_array['img_url'] ) .'" alt="'. esc_html__( 'Flip Box Image', 'lendiz-core' ) .'"></div>';
			break;
			
			case "content":
				if( $this->flip_content ) echo '<div class="flip-content">'. $this->flip_content .'</div>';
			break;
			
			case "btn":
				if( $this->flip_btn_array ){
					echo '<div class="flip-box-btn">';
						echo '<a class="btn'. esc_attr( $this->flip_btn_array['btn_type'] ) .'" href="'. esc_html( $this->flip_btn_array['btn_url'] ) .'" title="'. esc_attr( $this->flip_btn_array['btn_text'] ) .'">'. esc_html( $this->flip_btn_array['btn_text'] ) .'</a>';
					echo '</div><!-- .flip-box-btn -->';
				}
			break;			
		
		}
	}
	
	
}