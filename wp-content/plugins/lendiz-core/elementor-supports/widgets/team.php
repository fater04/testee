<?php
/**
 * Lendiz Elementor Addon Team Widget
 *
 * @since 1.0.0
 */
class Elementor_Team_Widget extends \Elementor\Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizteam";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Team widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Team", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Team widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-user";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Animated Text widget belongs to.
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
		if ( is_elementor_editor() ){
			wp_enqueue_style( 'owl-carousel' );
			return [ 'owl-carousel', 'custom-front'  ];
		}
		
		return [ 'owl-carousel', 'custom-front'  ];
	}
	
	public function get_style_depends() {
		return [ 'owl-carousel' ];
	}

	/**
	 * Register Animated Text widget controls.
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
				"description"	=> esc_html__( "Default team options.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"extra_class",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Extra Class", "lendiz-core" ),
				"description"	=> esc_html__( "Put extra class for some additional styles.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"post_per_page",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Post Per Page", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can define post limits per page. Example 10", "lendiz-core" ),
				"default" 		=> "10",
				"placeholder"	=> "10"
			]
		);
		$this->add_control(
			"excerpt_length",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Excerpt Length", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can define post excerpt length. Example 10", "lendiz-core" ),
				"default" 		=> "15"
			]
		);
		$this->add_control(
			"more_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Read More Text", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can enter read more text instead of default text.", "lendiz-core" ),
				"default" 		=> esc_html__( "Read More", "lendiz-core" )
			]
		);
		$this->end_controls_section();

		//Filter Section
		$this->start_controls_section(
			"filter_section",
			[
				"label"			=> esc_html__( "Filter", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Team filter options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"team_cats",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Enter Categories Id", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can enter team categoeis id. Example 4, 5, 7", "lendiz-core" ),
				"default" 		=> ''
			]
		);
		$this->add_control(
			"team_ids",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Enter Team Id's", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can enter team post id's for get specific team member. Example 4, 5, 7", "lendiz-core" ),
				"default" 		=> ''
			]
		);
		$this->end_controls_section();
		
		//Layouts Section
		$this->start_controls_section(
			"layouts_section",
			[
				"label"			=> esc_html__( "Layouts", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Team layout options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"heading_tag",
			[
				"label"			=> esc_html__( "Heading Tag", "lendiz-core" ),
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
				"label"			=> esc_html__( "Font Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the font color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .team-wrapper' => 'color: {{VALUE}};',
					'{{WRAPPER}} .team-wrapper.team-dark .team-inner' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			"team_layout",
			[
				"label"			=> esc_html__( "Team Layout", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "default",
				"options"		=> [
					"default"		=> esc_html__( "Default", "lendiz-core" ),
					"classic"		=> esc_html__( "Classic", "lendiz-core" ),
					"modern"		=> esc_html__( "Modern", "lendiz-core" ),
					"list"	=> esc_html__( "List", "lendiz-core" ),
				]
			]
		);
		$this->add_control(
			"variation",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Team Variation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team variatoin either dark or light.", "lendiz-core" ),
				"default"		=> "light",
				"options"		=> [
					"light"			=> esc_html__( "Light", "lendiz-core" ),
					"dark"			=> esc_html__( "Dark", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"team_cols",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Team Columns", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team columns.", "lendiz-core" ),
				"default"		=> "6",
				"options"		=> [
					"3"			=> esc_html__( "4 Columns", "lendiz-core" ),
					"4"			=> esc_html__( "3 Columns", "lendiz-core" ),
					"6"			=> esc_html__( "2 Columns", "lendiz-core" ),
					"12"		=> esc_html__( "1 Column", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"team_items",
			[
				"label"				=> "Post Items",
				"description"		=> esc_html__( "This is settings for team custom layout. here you can set your own layout. Drag and drop needed team items to Enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					"Enabled" 		=> [ 
						"thumb"			=> esc_html__( "Feature Image", "lendiz-core" ),
						"name"			=> esc_html__( "Name", "lendiz-core" ),
						"designation"	=> esc_html__( "Designation", "lendiz-core" ),
						"excerpt"		=> esc_html__( "Excerpt", "lendiz-core" ),
						"social"		=> esc_html__( "Social Links", "lendiz-core" )
					],
					"disabled"		=> [
						"more"			=> esc_html__( "Read More", "lendiz-core" ),
						"info"			=> esc_html__( "Info", "lendiz-core" )
					]
				]
			]
		);
		$this->add_control(
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team text align.", "lendiz-core" ),
				"default"		=> "default",
				"options"		=> [
					"default"	=> esc_html__( "Default", "lendiz-core" ),
					"left"		=> esc_html__( "Left", "lendiz-core" ),
					"center"	=> esc_html__( "Center", "lendiz-core" ),
					"right"		=> esc_html__( "Right", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Overlay Section
		$this->start_controls_section(
			"overlay_section",
			[
				"label"			=> esc_html__( "Overlay", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Team image overlay options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"team_overlay_opt",
			[
				"label" 		=> esc_html__( "Overlay Team Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for enable overlay team option.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"team_overlay_font_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Overlay Font Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put team overlay font color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .team-wrapper .team-overlay' => 'color: {{VALUE}};',
				],
				"condition" 	=> [
					"team_overlay_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"team_overlay_link_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Overlay Link Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put team overlay link normal color. Example #ffffff", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .team-wrapper .team-overlay a.client-name' => 'color: {{VALUE}};',
				],
				"condition" 	=> [
					"team_overlay_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"team_overlay_link_hcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Overlay Link Hover Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put team overlay link hover color. Example #ffffff", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .team-wrapper .team-overlay a.client-name:hover' => 'color: {{VALUE}};',
				],
				"condition" 	=> [
					"team_overlay_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"overlay_team_items",
			[
				"label"				=> "Overlay Team Items",
				"description"		=> esc_html__( "This is settings for team items(name, excerpt etc..) overlay on thumbnail. Drag and drop needed team items to Enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					"Enabled" 		=> [ 
						"name"			=> esc_html__( "Name", "lendiz-core" ),
					],
					"disabled"		=> [
						"designation"	=> esc_html__( "Designation", "lendiz-core" ),
						"excerpt"		=> esc_html__( "Excerpt", "lendiz-core" ),
						"social"		=> esc_html__( "Social Links", "lendiz-core" )
					]
				],
				"condition" 	=> [
					"team_overlay_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"team_overlay_position",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Overlay Items Position", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for overlay items position.", "lendiz-core" ),
				"default"		=> "bottom-left",
				"options"		=> [
					"center"	=> esc_html__( "Center", "lendiz-core" ),
					"top-left"		=> esc_html__( "Top Left", "lendiz-core" ),
					"top-right"	=> esc_html__( "Top Right", "lendiz-core" ),
					"bottom-left"		=> esc_html__( "Bottom Left", "lendiz-core" ),
					"bottom-right"		=> esc_html__( "Bottom Right", "lendiz-core" )
				],
				"condition" 	=> [
					"team_overlay_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"overlay_text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Overlay Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for overlay team text align.", "lendiz-core" ),
				"default"		=> "default",
				"options"		=> [
					"default"	=> esc_html__( "Default", "lendiz-core" ),
					"left"		=> esc_html__( "Left", "lendiz-core" ),
					"center"	=> esc_html__( "Center", "lendiz-core" ),
					"right"		=> esc_html__( "Right", "lendiz-core" )
				],
				"condition" 	=> [
					"team_overlay_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"team_overlay_type",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Overlay Type", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team overlay type.", "lendiz-core" ),
				"default"		=> "none",
				"options"		=> [
					"none"		=> esc_html__( "None", "lendiz-core" ),
					"dark"		=> esc_html__( "Overlay Dark", "lendiz-core" ),
					"light"		=> esc_html__( "Overlay White", "lendiz-core" ),
					"custom"	=> esc_html__( "Custom Color", "lendiz-core" )
				],
				"condition" 	=> [
					"team_overlay_opt" 	=> "1"
				]
			]
		);
		$this->add_control(
			"team_overlay_custom_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Overlay Custom Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put team overlay custom color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .team-wrapper .team-thumb .overlay-custom' => 'background: {{VALUE}};',
				],
				"condition" 	=> [
					"team_overlay_type" 	=> "custom"
				]
			]
		);
		$this->end_controls_section();
		
		//Image Section
		$this->start_controls_section(
			"image_section",
			[
				"label"			=> esc_html__( "Image", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Image options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"image_size",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Image Size", "lendiz-core" ),
				'description'	=> esc_html__( 'Choose thumbnail size for display different size image.', 'lendiz-core' ),
				"default"		=> "large",
				"options"		=> [
					"large"			=> esc_html__( "Large", "lendiz-core" ),
					"medium"		=> esc_html__( "Medium", "lendiz-core" ),
					"thumbnail"		=> esc_html__( "Thumbnail", "lendiz-core" ),
					"custom"		=> esc_html__( "Custom", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"custom_image_size",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Custom Image Size", "lendiz-core" ),
				"description"	=> esc_html__( "Enter custom image size. You must specify the semi colon(;) at last then only it'll crop. eg: 200x200;", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"image_size" 		=> "custom"
				]
			]
		);
		$this->add_control(
			"hard_croping",
			[
				"label" 		=> esc_html__( "Image Hard Crop", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0",
				"condition" 	=> [
					"image_size" 		=> "custom"
				]
			]
		);
		$this->add_control(
			"image_shape",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Image Shape", "lendiz-core" ),
				'description'	=> esc_html__( 'Choose team image shape. Like rounded, circle, etc..', 'lendiz-core' ),
				"default"		=> "",
				"options"		=> [
					""			=> esc_html__( "Default", "lendiz-core" ),
					"rounded"			=> esc_html__( "Rounded", "lendiz-core" ),
					"rounded-circle"	=> esc_html__( "Circle", "lendiz-core" ),
					"img-thumbnail"		=> esc_html__( "Thumbnail", "lendiz-core" ),
					"rounded img-thumbnail"	=> esc_html__( "Rounded Thumbnail", "lendiz-core" ),
					"rounded-circle img-thumbnail"	=> esc_html__( "Circle Thumbnail", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Social Icons Section
		$this->start_controls_section(
			"social_section",
			[
				"label"			=> esc_html__( "Social Icons", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Team social icons options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"social_icons_type",
			[
				"label"			=> esc_html__( "Social Iocns Type", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can choose the social icons view type.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "transparent",
				"options"		=> [
					"squared"		=> esc_html__( "Squared", "lendiz-core" ),
					"rounded"		=> esc_html__( "Rounded", "lendiz-core" ),
					"circled"		=> esc_html__( "Circled", "lendiz-core" ),
					"transparent"	=> esc_html__( "Transparent", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_fore",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Fore", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons fore color.", "lendiz-core" ),
				"default"		=> "black",
				"options"		=> [
					"black"	=> esc_html__( "Black", "lendiz-core" ),
					"white"		=> esc_html__( "White", "lendiz-core" ),
					"own"	=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_hfore",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Fore Hover", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons fore hover color.", "lendiz-core" ),
				"default"		=> "h-own",
				"options"		=> [
					"h-black"	=> esc_html__( "Black", "lendiz-core" ),
					"h-white"	=> esc_html__( "White", "lendiz-core" ),
					"h-own"		=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_bg",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Background", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons background color.", "lendiz-core" ),
				"default"		=> "bg-transparent",
				"options"		=> [
					"bg-transparent"		=> esc_html__( "Transparent", "lendiz-core" ),
					"bg-white"		=> esc_html__( "White", "lendiz-core" ),
					"bg-black"		=> esc_html__( "Black", "lendiz-core" ),
					"bg-light"		=> esc_html__( "Light", "lendiz-core" ),
					"bg-dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"bg-own"		=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_hbg",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Background Hover", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons background hover color.", "lendiz-core" ),
				"default"		=> "hbg-transparent",
				"options"		=> [
					"hbg-transparent"	=> esc_html__( "Transparent", "lendiz-core" ),
					"hbg-white"			=> esc_html__( "White", "lendiz-core" ),
					"hbg-black"			=> esc_html__( "Black", "lendiz-core" ),
					"hbg-light"			=> esc_html__( "Light", "lendiz-core" ),
					"hbg-dark"			=> esc_html__( "Dark", "lendiz-core" ),
					"hbg-own"			=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Slide Section
		$this->start_controls_section(
			"slide_section",
			[
				"label"			=> esc_html__( "Slide", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Team slide options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"slide_opt",
			[
				"label" 		=> esc_html__( "Slide Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider option.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Slide Items", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slide items shown on large devices.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_tab",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Tab", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slide items shown on tab.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_mobile",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Mobile", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slide items shown on mobile.", "lendiz-core" ),
				"default" 		=> "1",
			]
		);
		$this->add_control(
			"slide_item_autoplay",
			[
				"label" 		=> esc_html__( "Auto Play", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider auto play.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item_loop",
			[
				"label" 		=> esc_html__( "Loop", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider loop.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_center",
			[
				"label" 		=> esc_html__( "Items Center", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider center, for this option must active loop and minimum items 2.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_nav",
			[
				"label" 		=> esc_html__( "Navigation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider navigation.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_dots",
			[
				"label" 		=> esc_html__( "Pagination", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider pagination.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_margin",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Margin", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider margin space.", "lendiz-core" ),
				"default" 		=> "",
			]
		);
		$this->add_control(
			"slide_duration",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Duration", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider duration.", "lendiz-core" ),
				"default" 		=> "5000",
			]
		);
		$this->add_control(
			"slide_smart_speed",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Smart Speed", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider smart speed.", "lendiz-core" ),
				"default" 		=> "250",
			]
		);
		$this->add_control(
			"slide_slideby",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Slideby", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for team slider scroll by.", "lendiz-core" ),
				"default" 		=> "1",
			]
		);
		$this->end_controls_section();
		
		//Spacing Section
		$this->start_controls_section(
			"spacing_section",
			[
				"label"			=> esc_html__( "Spacing", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Each item bottom space options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"sc_spacing",
			[
				"type"			=> 'itemspacing',
				"label"			=> esc_html__( "Items Spacing", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention each team items bottom space if you want to set default space of any item just use hyphen(-). Example 10px 20px - 10px", "lendiz-core" ),
				"default" 		=> ""
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
		$output = '';
		
		//Defined Variable
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 0;
		$this->excerpt_len = $excerpt_length;
		$class_names .= isset( $team_layout ) ? ' team-' . $team_layout : ' team-1';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$team_layout = isset( $team_layout ) ? $team_layout : '';
		$class_names .= isset( $variation ) ? ' team-' . $variation : '';
		$cols = isset( $team_cols ) ? $team_cols : 12;
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$slide_opt = isset( $slide_opt ) && $slide_opt == '1' ? true : false;
		$team_overlay_opt = isset( $team_overlay_opt ) && $team_overlay_opt == '1' ? true : false;
		$team_overlay_type = isset( $team_overlay_type ) ? $team_overlay_type : 'none';
		$heading_tag = isset( $heading_tag ) ? $heading_tag : 'h3';
		$list_layout = isset( $team_layout ) && $team_layout == 'list' ? 1 : 0;
		$image_shape = isset( $image_shape ) && $image_shape != '' ? $image_shape : '';
		$team_cats = isset( $team_cats ) && $team_cats != '' ? $team_cats : '';
		$team_ids = isset( $team_ids ) && $team_ids != '' ? $team_ids : '';
		$order_by = '';
		
		$inc_cat_array = '';
		if( $team_cats ){
			//Cats In
			$cats_in = array();
			$filter = preg_replace( '/\s+/', '', $team_cats );
			$filter = explode( ',', rtrim( $filter, ',' ) );
			foreach( $filter as $cat ){
				$cat_term = get_term_by( 'id', $cat, 'team-categories' );	
				//post in array push
				if( isset( $cat_term->term_id ) ) array_push( $cats_in, absint( $cat_term->term_id ) );
			}

			$inc_cat_array = $cats_in ? array( 'taxonomy' => 'team-categories', 'field' => 'id', 'terms' => $cats_in ) : '';
		}
		
		if( $team_ids ){
			$team_ids = preg_replace( '/\s+/', '', $team_ids );
			$team_ids = explode( ',', rtrim( $team_ids, ',' ) );
			$order_by = 'post__in';
		}
		
		$sclass_name = isset( $social_style ) && !empty( $social_style ) ? ' social-' . $social_style : '';
		$sclass_name .= isset( $social_color ) && !empty( $social_color ) ? ' social-' . $social_color : '';
		$sclass_name .= isset( $social_hcolor ) && !empty( $social_hcolor ) ? ' social-' . $social_hcolor : '';
		$sclass_name .= isset( $social_bg ) && !empty( $social_bg ) ? ' social-' . $social_bg : '';
		$sclass_name .= isset( $social_hbg ) && !empty( $social_hbg ) ? ' social-' . $social_hbg : '';
		
		$overlay_class = '';
		$overlay_class .= isset( $team_overlay_position ) ? ' overlay-'.$team_overlay_position : ' overlay-center';
		
		$thumb_size = isset( $image_size ) ? $image_size : '';
		$cus_thumb_size = '';
		$hard_crop = false;
		if( $thumb_size == 'custom' ){
			$cus_thumb_size = isset( $custom_image_size ) && $custom_image_size != '' ? $custom_image_size : '';
			$hard_crop = isset( $hard_croping ) && $hard_croping == '1' ? true : false;
		}
		
		$default_items = array( 
			'thumb'	=> esc_html__( 'Image', 'lendiz-core' ),
			'name'	=> esc_html__( 'Name', 'lendiz-core' ),
			'designation'	=> esc_html__( 'Designation', 'lendiz-core' ),
			'excerpt'	=> esc_html__( 'Excerpt', 'lendiz-core' ),
			'social'	=> esc_html__( 'Social Links', 'lendiz-core' )
		);
		$default_overlay_items = array( 
			'name'	=> esc_html__( 'Name', 'lendiz-core' )
		);
		$elemetns = isset( $team_items ) && !empty( $team_items ) ? json_decode( $team_items, true ) : array( 'Enabled' => $default_items );
		$overlay_elemetns = isset( $overlay_team_items ) && !empty( $overlay_team_items ) ? json_decode( $overlay_team_items, true ) : array( 'Enabled' => $default_overlay_items );
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. lendiz_shortcode_rand_id();
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			
			if( !$list_layout ){
				$space_class_name = '.' . esc_attr( $rand_class ) . '.team-wrapper .team-inner >';
			}else{
				$space_class_name = '.' . esc_attr( $rand_class ) . '.team-wrapper .team-list-item .media-body >';
			}
			
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != '-' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}

		
		$gal_atts = '';
		if( $slide_opt ){
			$gal_atts = array(
				'data-loop="'. ( isset( $slide_item_loop ) && $slide_item_loop == '1' ? 1 : 0 ) .'"',
				'data-margin="'. ( isset( $slide_margin ) && $slide_margin != '' ? absint( $slide_margin ) : 0 ) .'"',
				'data-center="'. ( isset( $slide_center ) && $slide_center == '1' ? 1 : 0 ) .'"',
				'data-nav="'. ( isset( $slide_nav ) && $slide_nav == '1' ? 1 : 0 ) .'"',
				'data-dots="'. ( isset( $slide_dots ) && $slide_dots == '1' ? 1 : 0 ) .'"',
				'data-autoplay="'. ( isset( $slide_item_autoplay ) && $slide_item_autoplay == '1' ? 1 : 0 ) .'"',
				'data-items="'. ( isset( $slide_item ) && $slide_item != '' ? absint( $slide_item ) : 1 ) .'"',
				'data-items-tab="'. ( isset( $slide_item_tab ) && $slide_item_tab != '' ? absint( $slide_item_tab ) : 1 ) .'"',
				'data-items-mob="'. ( isset( $slide_item_mobile ) && $slide_item_mobile != '' ? absint( $slide_item_mobile ) : 1 ) .'"',
				'data-duration="'. ( isset( $slide_duration ) && $slide_duration != '' ? absint( $slide_duration ) : 5000 ) .'"',
				'data-smartspeed="'. ( isset( $slide_smart_speed ) && $slide_smart_speed != '' ? absint( $slide_smart_speed ) : 250 ) .'"',
				'data-scrollby="'. ( isset( $slide_slideby ) && $slide_slideby != '' ? absint( $slide_slideby ) : 1 ) .'"',
				'data-autoheight="false"',
			);
			$data_atts = implode( " ", $gal_atts );
		}
		
		$args = array(
			'post_type' => 'lendiz-team',
			'posts_per_page' => absint( $post_per_page ),
			'ignore_sticky_posts' => 1,
			'post__in' => $team_ids,
			'orderby' => $order_by,
			'tax_query' => array(
				$inc_cat_array
			)
		);
		
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		
			$team_array = array(
				'thumb_size' => $thumb_size,
				'cus_thumb_size' => $cus_thumb_size,
				'hard_crop' => $hard_crop,
				'excerpt_length' => $excerpt_length,
				'cols' => $cols,
				'more_text' => $more_text,
				'social_class' => $sclass_name,
				'post_heading' => $heading_tag,
				'team_layout' => $team_layout,
				'image_shape' => $image_shape
			);	
		
			if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' lendiz-inline-css';
			
			echo '<div class="team-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
				$row_stat = 0;
				
				if( !$list_layout ){
				
					//Team Slide
					if( $slide_opt ) echo '<div class="owl-carousel" '. ( $data_atts ) .'>';	

					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
						
						// Parameters Defined
						$post_id = get_the_ID();
						$team_array['post_id'] = $post_id;
					
						//Overlay Output Formation
						$overlay_out = '';
						if( $team_overlay_opt ) {
							if( $team_overlay_type != 'none' ){
								$overlay_out .= '<span class="overlay-bg overlay-'. esc_attr( $team_overlay_type ) .'"></span>';
							}
							$overlay_out .= '<div class="team-overlay'. esc_attr( $overlay_class ) .'">';
							
								if( isset( $overlay_elemetns['Enabled'] ) ) :
									foreach( $overlay_elemetns['Enabled'] as $element => $value ){
										$overlay_out .= $this->lendiz_team_shortcode_elements( $element, $team_array );
									}
								endif;
								
							$overlay_out .= '</div><!-- .team-overlay -->';
						}
					
						if( $row_stat == 0 && !$slide_opt ) echo '<div class="row">';
						
						if( $slide_opt ){
							echo '<div class="item">';	//Service Slide Item
						}else{
							$col_class = "col-lg-". absint( $cols );
							$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
							echo '<div class="'. esc_attr( $col_class ) .'">';
						}
						
							$inner_class = $overlay_out ? ' team-overlay-actived' : '';
							echo '<div class="team-inner'. esc_attr( $inner_class ) .'">';

							if( isset( $elemetns['Enabled'] ) ) :
								foreach( $elemetns['Enabled'] as $element => $value ){
									if( $element == 'thumb' ){
										$team_array['overlay'] = $overlay_out;
									}
									echo $this->lendiz_team_shortcode_elements( $element, $team_array );
								}
							endif;
							
							echo '</div><!-- .team-inner -->';
							
						if( $slide_opt ){
							echo '</div><!-- .item -->';
						}else{
							echo '</div><!-- .cols -->';
							$row_stat++;
							if( $row_stat == ( 12/ $cols ) && !$slide_opt ) :
								echo '</div><!-- .row -->';
								$row_stat = 0;
							endif;
						}
						
					endwhile;
					
					if( $row_stat != 0 && !$slide_opt ){
						echo '</div><!-- .row Unexpected row close -->'; // Unexpected row close
					}
					
					//Team Slide End
					if( $slide_opt ) echo '</div><!-- .owl-carousel -->';
				
				}else{
					
					if( isset( $elemetns['Enabled']['thumb'] ) ) unset( $elemetns['Enabled']['thumb'] );
					
					//Team Slide
					if( $slide_opt ) echo '<div class="owl-carousel" '. ( $data_atts ) .'>';	

					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
						
						// Parameters Defined
						$post_id = get_the_ID();
						$team_array['post_id'] = $post_id;
					
						//Overlay Output Formation
						$overlay_out = '';
						if( $team_overlay_opt ) {
							if( $team_overlay_type != 'none' ){
								$overlay_out .= '<span class="overlay-bg overlay-'. esc_attr( $team_overlay_type ) .'"></span>';
							}
							$overlay_out .= '<div class="team-overlay'. esc_attr( $overlay_class ) .'">';
							
								if( isset( $overlay_elemetns['Enabled'] ) ) :
									foreach( $overlay_elemetns['Enabled'] as $element => $value ){
										$overlay_out .= $this->lendiz_team_shortcode_elements( $element, $team_array );
									}
								endif;
								
							$overlay_out .= '</div><!-- .team-overlay -->';
						}
					
						if( $row_stat == 0 && !$slide_opt ) echo '<div class="row">';
						
						if( $slide_opt ){
							echo '<div class="item">';	//Service Slide Item
						}else{
							$col_class = "col-lg-". absint( $cols );
							$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
							echo '<div class="'. esc_attr( $col_class ) .'">';
						}
						
							$inner_class = $overlay_out ? ' team-overlay-actived' : '';
							echo '<div class="media team-list-item'. esc_attr( $inner_class ) .'">';
							
								echo $this->lendiz_team_shortcode_elements( 'thumb', $team_array );
								
								echo '<div class="media-body">';
									if( isset( $elemetns['Enabled'] ) ) :
										foreach( $elemetns['Enabled'] as $element => $value ){
											if( $element == 'thumb' ){
												$team_array['overlay'] = $overlay_out;
											}
											echo $this->lendiz_team_shortcode_elements( $element, $team_array );
										}
									endif;
								echo '</div><!-- .media-body -->';
							
							echo '</div><!-- .team-list-item -->';
							
						if( $slide_opt ){
							echo '</div><!-- .item -->';
						}else{
							echo '</div><!-- .cols -->';
							$row_stat++;
							if( $row_stat == ( 12/ $cols ) && !$slide_opt ) :
								echo '</div><!-- .row -->';
								$row_stat = 0;
							endif;
						}
						
					endwhile;
					
					if( $row_stat != 0 && !$slide_opt ){
						echo '</div><!-- .row Unexpected row close -->'; // Unexpected row close
					}
					
					//Team Slide End
					if( $slide_opt ) echo '</div><!-- .owl-carousel -->';
					
				}
				
			echo '</div><!-- .team-wrapper -->';
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();

	}
	
	function lendiz_team_shortcode_elements( $element, $opts = array() ){
		$output = '';
		switch( $element ){
		
			case "name":
				$head = isset( $opts['post_heading'] ) ? $opts['post_heading'] : 'h3';
				$output .= '<div class="team-name">';
					$output .= '<' . esc_attr( $head ) . '><span class="client-name">'. esc_html( get_the_title() ) .'</span></' . esc_attr( $head ) . '>';
				$output .= '</div><!-- .team-name -->';		
			break;
			
			case "designation":
				$designation = get_post_meta( $opts['post_id'], 'lendiz_team_designation', true );
				if( $designation ) :
					
					$output .= '<div class="team-designation">';
						$output .= esc_html( $designation );
					$output .= '</div><!-- .team-designation -->';		
				endif;
			break;
			
			case "info":
				$output .= '<div class="team-info-wrap">';
					$output .= $this->lendiz_team_shortcode_elements( 'name', $opts );
					$output .= $this->lendiz_team_shortcode_elements( 'designation', $opts );
				$output .= '</div><!-- .team-info-wrap -->';	
			break;
			
			case "thumb":
				if ( has_post_thumbnail() ) {
				
					// Custom Thumb Code
					$thumb_size = $thumb_cond = $opts['thumb_size'];
					$cus_thumb_size = $opts['cus_thumb_size'];
					$hard_crop = $opts['hard_crop'];
					$custom_opt = $img_prop = '';
					if( $thumb_cond == 'custom' ){
						if( strpos( $cus_thumb_size, ";" ) ){
							$custom_opt = $cus_thumb_size != '' ? explode( "x", str_replace( ";", "", $cus_thumb_size ) ) : array();
							$img_prop = lendiz_get_custom_size_image( $custom_opt, $hard_crop );
							$thumb_size = array( $img_prop[1], $img_prop[2] );
						}else{
							$thumb_size = 'large';
							$thumb_cond = '';
						}
						
					}// Custom Thumb Code End
					
					$output .= '<div class="team-thumb">';
						$output .= isset( $opts['overlay'] ) ? $opts['overlay'] : '';
						$img_class = 'img-fluid';
						$img_class .= isset( $opts['image_shape'] ) ? ' '. $opts['image_shape'] : '';
						
						if( $thumb_cond == 'custom' ){
							$output .= '<img height="'. esc_attr( $img_prop[2] ) .'" width="'. esc_attr( $img_prop[1] ) .'" class="img-fluid" alt="'. esc_attr( get_the_title() ) .'" src="' . esc_url( $img_prop[0] ) . '"/>';
						}else{
							$output .= get_the_post_thumbnail( $opts['post_id'], $thumb_size, array( 'class' => 'img-fluid' ) );
						}
						
						if( isset( $opts['team_layout'] ) && $opts['team_layout'] == 'modern' ){
							$output .= '<span class="animate-bubble-box"></span>';
						}
					$output .= '</div><!-- .team-thumb -->';
				}
			break;
			
			case "excerpt":
				$excerpt = isset( $opts['excerpt_length'] ) && $opts['excerpt_length'] != '' ? $opts['excerpt_length'] : 20;
				$output .= '<div class="team-excerpt">';
					add_filter( 'excerpt_more', 'lendiz_excerpt_more' );
					add_filter( 'excerpt_length', array( &$this, 'lendiz_excerpt_length' ) );
					ob_start();
					the_excerpt();
					$excerpt_cont = ob_get_clean();
					$output .= $excerpt_cont;
				$output .= '</div><!-- .team-excerpt -->';	
			break;
			
			case "more":
				$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'lendiz-core' );
				$output = '<div class="post-more"><a class="read-more" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">'. esc_html( $read_more_text ) .'</a></div>';
			break;
			
			case "social":
				$taget = get_post_meta( get_the_ID(), 'lendiz_team_link_target', true );
				$social_media = array( 
					'social-fb' => 'ti-facebook', 
					'social-twitter' => 'ti-twitter', 
					'social-instagram' => 'ti-instagram',
					'social-linkedin' => 'ti-linkedin', 
					'social-pinterest' => 'ti-pinterest',  
					'social-youtube' => 'ti-youtube', 
					'social-vimeo' => 'ti-vimeo',
					'social-flickr' => 'ti-flickr-alt', 
					'social-dribbble' => 'ti-dribbble'
				);
				$social_opt = array(
					'social-fb' => 'lendiz_team_facebook', 
					'social-twitter' => 'lendiz_team_twitter',
					'social-instagram' => 'lendiz_team_instagram',
					'social-linkedin' => 'lendiz_team_linkedin',
					'social-pinterest' => 'lendiz_team_pinterest',
					'social-youtube' => 'lendiz_team_youtube',
					'social-vimeo' => 'lendiz_team_vimeo',
					'social-flickr' => 'lendiz_team_flickr',
					'social-dribbble' => 'lendiz_team_dribbble',
				);
				// Actived social icons from theme option output generate via loop
				$li_output = '';
				foreach( $social_media as $key => $class ){
					$social_url = get_post_meta( get_the_ID(), $social_opt[$key], true );
					if( $social_url ):
						$li_output .= '<li>';
							$li_output .= '<a class="'. esc_attr( $key ) .'" href="'. esc_url( $social_url ) .'" target="'. esc_attr( $taget ) .'">';
								$li_output .= '<i class="'. esc_attr( $class ) .'"></i>';
							$li_output .= '</a>';
						$li_output .= '</li>';
					endif;
				}
				if( $li_output != '' ){
					$output .= '<div class="team-social-wrap clearfix">';
						$output .= '<ul class="nav social-icons team-social'. esc_attr( $opts['social_class'] ) .'">';
							$output .= $li_output;
						$output .= '</ul>';
					$output .= '</div> <!-- .team-social-wrap -->';
				}
			break;
			
		}
		return $output;
	}
	
	function lendiz_excerpt_length( $length ) {
		return $this->excerpt_len;
	}

}