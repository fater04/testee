<?php
/**
 * Lendiz Elementor Addon Portfolio Widget
 *
 * @since 1.0.0
 */
class Elementor_Portfolio_Widget extends \Elementor\Widget_Base {
	
	private $popup_stat = 0;
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizportfolio";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Portfolio widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Portfolio", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Portfolio widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-layout-media-overlay";
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
			return [ 'owl-carousel', 'imagesloaded', 'infinite-scroll', 'isotope', 'custom-front'  ];
		}
		
		return [ 'owl-carousel', 'imagesloaded', 'infinite-scroll', 'isotope', 'custom-front'  ];
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
				"description"	=> esc_html__( "Default portfolio options.", "lendiz-core" ),
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
			"include_cats",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Include Categories", "lendiz-core" ),
				"description"	=> esc_html__( "This is filter categories. If you don't want portfolio filter, then leave this empty. Example slug: travel, web", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"exclude_cats",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Exclude Categories", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention unwanted categories. Example slug: travel, web", "lendiz-core" ),
				"default" 		=> ""
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
		
		//Layouts Section
		$this->start_controls_section(
			"layouts_section",
			[
				"label"			=> esc_html__( "Layouts", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Portfolio layout options here available.", "lendiz-core" ),
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
					'{{WRAPPER}} .portfolio-wrapper' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			"link_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Link Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the link color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .portfolio-wrapper a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .portfolio-wrapper .post-title-head > a' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			"hover_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Link Hover Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the link hover color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .portfolio-wrapper a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .portfolio-wrapper .post-title-head > a:hover' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			"post_heading",
			[
				"label"			=> esc_html__( "Post Heading Tag", "lendiz-core" ),
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
			"title_link",
			[
				"label"			=> esc_html__( "Title Link", "lendiz-core" ),
				"description"	=> esc_html__( "Enabel portfolio title as link or text.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "1"
			]
		);
		$this->add_control(
			"portfolio_layout",
			[
				"label"			=> esc_html__( "Portfolio Layout", "lendiz-core" ),
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
			"portfolio_masonry",
			[
				"label" 		=> esc_html__( "Portfolio Masonry", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio masonry or normal.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0",
				"portfolio_layout!" 		=> "list"
			]
		);
		$this->add_control(
			"portfolio_gutter",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Portfolio Masonry Gutter", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention portfolio masonry gutter size. Example 30", "lendiz-core" ),
				"default" 		=> "10",
				"condition" 	=> [
					"portfolio_masonry" 		=> "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"lazy_load",
			[
				"label"			=> esc_html__( "Lazy Load", "lendiz-core" ),
				"description"	=> esc_html__( "Enabel lazy load option for load isotope grids lazy with animation.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0",
				"condition" 	=> [
					"portfolio_masonry" => "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"isotope_filter",
			[
				"label"			=> esc_html__( "Isotope Filter", "lendiz-core" ),
				"description"	=> esc_html__( "Enabel to show portfolio filter by category.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0",
				"condition" 	=> [
					"portfolio_masonry" => "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"filter_all",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Filter All Text", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention portfolio's first filter text.", "lendiz-core" ),
				"default" 		=> esc_html__( "All", "lendiz-core" ),
				"condition" 	=> [
					"isotope_filter" 		=> "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"masonry_layout",
			[
				"label"			=> esc_html__( "Masonry Layout", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "masonry",
				"options"		=> [
					"masonry"		=> esc_html__( "Masonry", "lendiz-core" ),
					"fitRows"		=> esc_html__( "Fit Rows", "lendiz-core" )
				],
				"condition" 	=> [
					"portfolio_masonry" => "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"portfolio_infinite",
			[
				"label"			=> esc_html__( "Portfolio Masonry Infinite", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio masonry infinite scroll.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0",
				"condition" 	=> [
					"portfolio_masonry" => "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"loading_msg",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Infinite Loading Message", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention infinite loading post message.", "lendiz-core" ),
				"default" 		=> esc_html__( "Loading portfolios..", "lendiz-core" ),
				"condition" 	=> [
					"portfolio_infinite" 		=> "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"loading_end",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Infinite Ending Message", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can mention infinite loading ending message.", "lendiz-core" ),
				"default" 		=> esc_html__( "No more portfolios.", "lendiz-core" ),
				"condition" 	=> [
					"portfolio_infinite" 		=> "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			'loading_img',
			[
				'label' => __( 'Infinite Loader Image URL', 'lendiz-core' ),
				"description"	=> esc_html__( "Here you can choose infinite loader image.", "lendiz-core" ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				"condition" 	=> [
					"portfolio_infinite" 		=> "1",
					"portfolio_layout!" 		=> "list"
				]
			]
		);
		$this->add_control(
			"portfolio_pagination",
			[
				"label" 		=> esc_html__( "Portfolio Pagination", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0",
				"condition" 	=> [
					"portfolio_masonry" 		=> "0"
				]
			]
		);
		$this->add_control(
			"variation",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Portfolio Variation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio variatoin either dark or light.", "lendiz-core" ),
				"default"		=> "light",
				"options"		=> [
					"light"			=> esc_html__( "Light", "lendiz-core" ),
					"dark"			=> esc_html__( "Dark", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"portfolio_cols",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Portfolio Columns", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio columns.", "lendiz-core" ),
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
			"post_items",
			[
				"label"				=> "Post Items",
				"description"		=> esc_html__( "This is settings for portfolio custom layout. here you can set your own layout. Drag and drop needed portfolio items to Enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					"Enabled" 		=> [ 
						"thumb"			=> esc_html__( "Feature Image", "lendiz-core" ),
						"title"			=> esc_html__( "Title", "lendiz-core" ),
						"excerpt"		=> esc_html__( "Excerpt", "lendiz-core" )
					],
					"disabled"		=> [
						"top-meta"		=> esc_html__( "Top Meta", "lendiz-core" ),
						"bottom-meta"	=> esc_html__( "Bottom Meta", "lendiz-core" ),
						"category"		=> esc_html__( "Category", "lendiz-core" ),
					]
				]
			]
		);
		$this->add_control(
			"post_overlay_items_opt",
			[
				"label" 		=> esc_html__( "Post Overlay Items Options", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"portfolio_overlay_position",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Overlay Items Position", "lendiz-core" ),
				"description"	=> esc_html__( "This is an option for overlay items position.", "lendiz-core" ),
				"default"		=> "center",
				"options"		=> [
					"center"		=> esc_html__( "Center", "lendiz-core" ),
					"top-left"		=> esc_html__( "Top Left", "lendiz-core" ),
					"top-right"		=> esc_html__( "Top Right", "lendiz-core" ),
					"bottom-left"	=> esc_html__( "Bottom Left", "lendiz-core" ),
					"bottom-right"	=> esc_html__( "Bottom Right", "lendiz-core" )
				],
				"condition" 	=> [
					"post_overlay_items_opt" 		=> "1"
				]
			]			
		);
		$this->add_control(
			"post_overlay_items",
			[
				"label"			=> "Post Overlay Items",
				"description"	=> esc_html__( "This is settings for portfolio shortcode post overlay items.", "lendiz-core" ),
				"type"			=> "dragdrop",
				"ddvalues"		=> [ 
					esc_html__( "Enabled", "lendiz-core" ) => [
						'title'	=> esc_html__( 'Title', 'lendiz-core' )
					],
					esc_html__( "disabled", "lendiz-core" ) => [
						'category'	=> esc_html__( 'Category', 'lendiz-core' ),
						'more'	=> esc_html__( 'Read More', 'lendiz-core' ),
						'date'	=> esc_html__( 'Date', 'lendiz-core' ),
						"top-meta"		=> esc_html__( "Top Meta", "lendiz-core" ),
						"bottom-meta"	=> esc_html__( "Bottom Meta", "lendiz-core" ),
						'popup'	=> esc_html__( 'Popup Icon', 'lendiz-core' ),
						'link'	=> esc_html__( 'Link', 'lendiz-core' ),
						'icons'	=> esc_html__( 'Popup and Link', 'lendiz-core' )
					]
				],
				"condition" 	=> [
					"post_overlay_items_opt" 		=> "1"
				]
			]
		);
		$this->add_control(
			"top_meta",
			[
				"label"			=> "Post Top Meta",
				"description"	=> esc_html__( "This is settings for portfolio shortcode post top meta.", "lendiz-core" ),
				"type"			=> "dragdrop",
				"ddvalues"		=> [ 
					esc_html__( "Left", "lendiz-core" ) => [],
					esc_html__( "Right", "lendiz-core" ) => [],
					esc_html__( "disabled", "lendiz-core" ) => [
						'category'	=> esc_html__( 'Category', 'lendiz-core' ),
						'more'	=> esc_html__( 'Read More', 'lendiz-core' ),
						'date'	=> esc_html__( 'Date', 'lendiz-core' ),
						'link'	=> esc_html__( 'Link', 'lendiz-core' ),
						'popup'	=> esc_html__( 'Popup', 'lendiz-core' ),
						'icons'	=> esc_html__( 'Popup and Link', 'lendiz-core' )
					]
				]
			]
		);
		$this->add_control(
			"bottom_meta",
			[
				"label"			=> "Post Bottom Meta",
				"description"	=> esc_html__( "This is settings for portfolio shortcode post bottom meta.", "lendiz-core" ),
				"type"			=> "dragdrop",
				"ddvalues"		=> [ 
					esc_html__( "Left", "lendiz-core" ) => [],
					esc_html__( "Right", "lendiz-core" ) => [],
					esc_html__( "disabled", "lendiz-core" ) => [
						'category'	=> esc_html__( 'Category', 'lendiz-core' ),
						'more'	=> esc_html__( 'Read More', 'lendiz-core' ),
						'date'	=> esc_html__( 'Date', 'lendiz-core' ),
						'link'	=> esc_html__( 'Link', 'lendiz-core' ),
						'popup'	=> esc_html__( 'Popup', 'lendiz-core' ),
						'icons'	=> esc_html__( 'Popup and Link', 'lendiz-core' )
					]
				]
			]
		);
		$this->add_control(
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio text align.", "lendiz-core" ),
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
		$this->end_controls_section();
		
		//Slide Section
		$this->start_controls_section(
			"slide_section",
			[
				"label"			=> esc_html__( "Slide", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Portfolio slide options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"slide_opt",
			[
				"label" 		=> esc_html__( "Slide Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider option.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Slide Items", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slide items shown on large devices.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_tab",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Tab", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slide items shown on tab.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_mobile",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Mobile", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slide items shown on mobile.", "lendiz-core" ),
				"default" 		=> "1",
			]
		);
		$this->add_control(
			"slide_item_autoplay",
			[
				"label" 		=> esc_html__( "Auto Play", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider auto play.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item_loop",
			[
				"label" 		=> esc_html__( "Loop", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider loop.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_center",
			[
				"label" 		=> esc_html__( "Items Center", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider center, for this option must active loop and minimum items 2.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_nav",
			[
				"label" 		=> esc_html__( "Navigation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider navigation.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_dots",
			[
				"label" 		=> esc_html__( "Pagination", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider pagination.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_margin",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Margin", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider margin space.", "lendiz-core" ),
				"default" 		=> "",
			]
		);
		$this->add_control(
			"slide_duration",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Duration", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider duration.", "lendiz-core" ),
				"default" 		=> "5000",
			]
		);
		$this->add_control(
			"slide_smart_speed",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Smart Speed", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider smart speed.", "lendiz-core" ),
				"default" 		=> "250",
			]
		);
		$this->add_control(
			"slide_slideby",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Slideby", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for portfolio slider scroll by.", "lendiz-core" ),
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
				"description"	=> esc_html__( "Here you can mention each portfolio items bottom space if you want to set default space of any item just use hyphen(-). Example 10px 20px - 10px", "lendiz-core" ),
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
	 
	public function render_content() {
		/**
		 * Before widget render content.
		 *
		 * Fires before Elementor widget is being rendered.
		 *
		 * @since 1.0.0
		 *
		 * @param Widget_Base $this The current widget.
		 */
		do_action( 'elementor/widget/before_render_content', $this );
	
		ob_start();
	
		$skin = $this->get_current_skin();
		if ( $skin ) {
			$skin->set_parent( $this );
			$skin->render();
		} else {
			$this->render();
		}
	
		$widget_content = ob_get_clean();
		
		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		$portfolio_masonry = isset( $portfolio_masonry ) && $portfolio_masonry == '1' ? $portfolio_masonry : '0';
		$slide_opt = isset( $slide_opt ) && $slide_opt == '1' ? true : false;
		
		$class_names = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';
		$class_names .= isset( $portfolio_layout ) ? ' portfolio-style-' . $portfolio_layout : ' portfolio-style-1';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class_names .= isset( $variation ) ? ' portfolio-' . $variation : '';
		
		if( !$portfolio_masonry && !$slide_opt ){
			$class_names .= ' portfolio-normal-model';
		}elseif( $slide_opt ) {
			$class_names .= ' portfolio-slide-model';
		}elseif( $portfolio_masonry ){
			$class_names .= ' portfolio-isotope-model';
		}
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-' . lendiz_shortcode_rand_id();
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
	
			$space_class_name = '.' . esc_attr( $rand_class ) . '.portfolio-wrapper .portfolio-inner >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != '-' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' lendiz-inline-css';
		?>
		
		<div class="elementor-widget-container portfolio-wrapper image-gallery<?php echo esc_attr( $class_names ); ?>" data-css="<?php echo htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ); ?>">
		
			<?php
			/**
			 * Render widget content.
			 *
			 * Filters the widget content before it's rendered.
			 *
			 * @since 1.0.0
			 *
			 * @param string      $widget_content The content of the widget.
			 * @param Widget_Base $this           The widget.
			 */
			$widget_content = apply_filters( 'elementor/widget/render_content', $widget_content, $this );
	
			echo $widget_content; // XSS ok.
			?>
			
		</div>
		<?php
	}
	 
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		extract( $settings );
		$output = '';
		
		//Defined Variable
		$post_per_page = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : '';
		$excerpt_length = isset( $excerpt_length ) && $excerpt_length != '' ? $excerpt_length : 10;
		$this->excerpt_len = $excerpt_length;

		$include_cats = isset( $include_cats ) ? $include_cats : '';
		$exclude_cats = isset( $exclude_cats ) ? $exclude_cats : '';
		
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$portfolio_pagination = isset( $portfolio_pagination ) && $portfolio_pagination == '1' ? true : false;
		$portfolio_masonry = isset( $portfolio_masonry ) && $portfolio_masonry == '1' ? $portfolio_masonry : '0';
		$masonry_layout = isset( $masonry_layout ) && $masonry_layout != '' ? $masonry_layout : 'masonry';
		$portfolio_infinite = isset( $portfolio_infinite ) && $portfolio_infinite == '1' ? true : false;
		$portfolio_gutter = isset( $portfolio_gutter ) && $portfolio_gutter != '' ? $portfolio_gutter : 20;
		$slide_opt = isset( $slide_opt ) && $slide_opt == '1' ? true : false;
		$lazy_load = isset( $lazy_load ) && $lazy_load == '1' ? true : false;
		$isotope_filter = isset( $isotope_filter ) && $isotope_filter == '1' ? true : false;
		$filter_all = isset( $filter_all ) && $filter_all != '' ? $filter_all : esc_html__( "All", "lendiz-core" );
		$post_heading = isset( $post_heading ) && $post_heading != '' ? $post_heading : 'h3';
		$overlay_position = isset( $portfolio_overlay_position ) && $portfolio_overlay_position != '' ? $portfolio_overlay_position : '';
		$title_link_stat = true;
		if( isset( $title_link ) ){
			if( $title_link == '1' ){
				$title_link_stat = true;
			}else{
				$title_link_stat = false;
			}
		}
		
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
				'data-autoheight="0"',
			);
			$data_atts = implode( " ", $gal_atts );
		}
		
		$thumb_size = isset( $image_size ) ? $image_size : '';
		
		$cus_thumb_size = '';
		$hard_crop = false;
		if( $thumb_size == 'custom' ){
			$cus_thumb_size = isset( $custom_image_size ) && $custom_image_size != '' ? $custom_image_size : '';
			$hard_crop = isset( $hard_croping ) && $hard_croping == '1' ? true : false;
		}
		
		$default_items = array( 
			"thumb"			=> esc_html__( "Feature Image", "lendiz-core" ),
			"title"			=> esc_html__( "Title", "lendiz-core" ),
			"excerpt"		=> esc_html__( "Excerpt", "lendiz-core" )
		);
		$elemetns = isset( $post_items ) && !empty( $post_items ) ? json_decode( $post_items, true ) : array( 'Enabled' => $default_items );
		$overlay_opt = isset( $post_overlay_items_opt ) && $post_overlay_items_opt == '1' ? true : false;
		$overlay_items = isset( $post_overlay_items ) && !empty( $post_overlay_items ) ? json_decode( $post_overlay_items, true ) : array( 'Enabled' => '' );
		$top_meta = isset( $top_meta ) && $top_meta != '' ? $top_meta : array( 'Enabled' => '' );
		$bottom_meta = isset( $bottom_meta ) && $bottom_meta != '' ? $bottom_meta : array( 'Enabled' => '' );
		
		$cols = isset( $portfolio_cols ) ? $portfolio_cols : 12;
		$col_class = "col-lg-". absint( $cols );
		$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
		
		$list_layout = isset( $portfolio_layout ) && $portfolio_layout == 'list' ? 1 : 0;
		
		//Cats In
		$filter_catoutput = '';
		$cats_in = array();
		if( $include_cats ){
			$filter = preg_replace( '/\s+/', '', $include_cats );
			$filter = explode( ',', rtrim( $filter, ',' ) );
			foreach( $filter as $cat ){
				if( term_exists( $cat, 'portfolio-categories' ) ){
					$cat_term = get_term_by( 'slug', $cat, 'portfolio-categories' );	
					//post in array push
					if( isset( $cat_term->term_id ) ){
						$filter_catoutput .= $isotope_filter ? '<li><a href="#" class="isotope-filter-item" data-filter=".portfolio-filter-'. esc_attr( absint( $cat_term->term_id ) ) .'">'. esc_html( $cat_term->name ) .'</a></li>' : '';
						array_push( $cats_in, absint( $cat_term->term_id ) );	
					}
				}
			}
		}
		
		//Cats Not In
		$cats_not_in = array();
		if( $exclude_cats ){
			$filter = preg_replace( '/\s+/', '', $exclude_cats );
			$filter = explode( ',', rtrim( $filter, ',' ) );
			foreach( $filter as $cat ){
				if( term_exists( $cat, 'portfolio-categories' ) ){
					$cat_term = get_term_by( 'slug', $cat, 'portfolio-categories' );	
					//post not in array push
					if( isset( $cat_term->term_id ) )
						array_push( $cats_not_in, absint( $cat_term->term_id ) );	
				}
			}
		}
		
		//Query Start
		global $wp_query;
		$paged = 1;
		if( get_query_var('paged') ){
			$paged = get_query_var('paged');
		}elseif( get_query_var('page') ){
			$paged = get_query_var('page');
		}
		
		$ppp = isset( $post_per_page ) && $post_per_page != '' ? $post_per_page : 2;
		$inc_cat_array = $cats_in ? array( 'taxonomy' => 'portfolio-categories', 'field' => 'id', 'terms' => $cats_in ) : '';
		$exc_cat_array = $cats_not_in ? array( 'taxonomy' => 'portfolio-categories', 'field' => 'id', 'terms' => $cats_not_in, 'operator' => 'NOT IN' ) : '';
		$args = array(
			'post_type' => 'lendiz-portfolio',
			'posts_per_page' => absint( $ppp ),
			'paged' => $paged,
			'ignore_sticky_posts' => 1,
			'tax_query' => array(
				$inc_cat_array,
				$exc_cat_array
			)
			
		);
		$query = new WP_Query( $args );
			
		if ( $query->have_posts() ) {
			
			if( $isotope_filter && $filter_catoutput != '' ){
				echo '<div class="isotope-filter">';
					echo '<ul class="nav m-auto d-block">' .
						( $filter_all != '' ? '<li class="active"><a href="#" class="isotope-filter-item" data-filter="">'. esc_html( $filter_all ) .'</a></li>' : '' ) .
						$filter_catoutput;
					echo '</ul>';
				echo '</div>';
			}
		
			$row_stat = 0;
		
			if( $slide_opt ) {
				echo '<div class="owl-carousel" '. ( $data_atts ) .'>';	
				$col_class = 'owl-carousel-item';
			}elseif( $portfolio_masonry ){
			
				$loading_msg = isset( $loading_msg ) && $loading_msg != '' ? $loading_msg : esc_html__( 'Loading..', 'lendiz-core' );
				$loading_end = isset( $loading_end ) && $loading_end != '' ? $loading_end : esc_html__( 'No more portfolios..', 'lendiz-core' );
				$loading_img = isset( $loading_img ) && $loading_img != '' ? $loading_img['url'] : LENDIZ_CORE_URL . 'elementor-supports/assets/images/infinite-loader.gif';
			
				$isotope_class = ' isotope-col-'. esc_attr( 12 / absint( $cols ) );
				echo '<div class="isotope'. esc_attr( $isotope_class ) .'" data-cols="'. esc_attr( 12 / absint( $cols ) ) .'" data-gutter="'. esc_attr( $portfolio_gutter ) .'" data-layout="'. esc_attr( $masonry_layout ) .'" data-infinite="'. esc_attr( $portfolio_infinite ) .'" data-lazyload="'. esc_attr( $lazy_load ) .'" data-loadmsg="'. esc_attr( $loading_msg ) .'" data-loadend="'. esc_attr( $loading_end ) .'" data-loadimg="'. esc_attr( $loading_img ) .'">';
				$col_class = 'isotope-item';
				$col_class .= $lazy_load ? ' lendiz-animate' : '';
			}
			
			// Portfolio items array
			$portfolio_array = array(
				'excerpt_length' => $excerpt_length,
				'cols' => $cols,
				'post_heading' => $post_heading,
				'title_link' => $title_link_stat,
				'thumb_size' => $thumb_size,
				'cus_thumb_size' => $cus_thumb_size,
				'overlay_opt' => $overlay_opt,
				'overlay_items' => $overlay_items,
				'hard_crop' => $hard_crop,
				'more_text' => $more_text,
				'top_meta' => $top_meta,
				'bottom_meta' => $bottom_meta,
				'overlay_position' => $overlay_position,
				'list_layout' => 0,
				'list_stat' => $list_layout, // set list layout default 0
				'masonry' => $portfolio_masonry
			);
		
			// Start the Loop
			while ( $query->have_posts() ) : $query->the_post();
				
				$post_id = get_the_ID();
				$portfolio_array['post_id'] = $post_id;
				
				$cat_class = '';
				if( !$portfolio_masonry && !$slide_opt ){
					if( $row_stat == 0 ) :
						echo '<div class="row">';
					endif;
				}elseif( $isotope_filter && $filter_catoutput != '' ){
					$terms = get_the_terms( $post_id, 'portfolio-categories' );
					if ( $terms && ! is_wp_error( $terms ) ) : 
						foreach ( $terms as $term ) {
							$cat_class .= ' portfolio-filter-' . $term->term_id;
						}
					endif;
				}
				
				echo '<div class="'. esc_attr( $col_class . $cat_class ) .'">';
					echo '<div class="portfolio-inner">';
						
						if( $list_layout ){
							echo '<div class="media">';
								echo $this->lendiz_portfolio_shortcode_elements('thumb', $portfolio_array);
								echo '<div class="media-body">';
						}

						if( isset( $elemetns['Enabled'] ) ) :
							foreach( $elemetns['Enabled'] as $element => $value ){
								if( $list_layout ) $portfolio_array['list_layout'] = 1; // set list layout 1
								echo $this->lendiz_portfolio_shortcode_elements( $element, $portfolio_array );
							}
						endif;
						
						if( $list_layout ){
								echo '</div><!-- .media-body -->';
							echo '</div><!-- .media -->';
						}
					echo '</div><!-- .portfolio-inner -->';
				echo '</div><!-- .col / .owl-carousel-item / .isotope -->';
				
				if( !$portfolio_masonry && !$slide_opt ){
					$row_stat++;
					if( $row_stat == ( 12/ $cols ) ) :
						echo '</div><!-- .row -->';
						$row_stat = 0;
					endif;
				}
				
			endwhile;
			
			if( !$portfolio_masonry && !$slide_opt ){
				if( $row_stat != 0 ){
					echo '</div><!-- .row -->'; // Unexpected row close
				}
			}elseif( $slide_opt ) {
				echo '</div><!-- .owl-carousel -->';
			}elseif( $portfolio_masonry ){
				echo '</div><!-- .isotope -->';
			}
			
			if( !$slide_opt && ( $portfolio_infinite || $portfolio_pagination ) ):
				echo $portfolio_infinite ? '<div class="infinite-load">' : '';
					require_once LENDIZ_CORE_DIR . 'elementor-supports//inc/lendiz-class.php';
					$lendiz_ele = new CEAPostElements;
					echo $lendiz_ele->lendiz_wp_bootstrap_pagination( $args, $query->max_num_pages, false );
				echo $portfolio_infinite ? '</div><!-- infinite-load -->' : '';
			endif;
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();
		
		if( $this->popup_stat ){
			wp_enqueue_style( 'magnific-popup' );
			wp_enqueue_script( 'magnific-popup' );
		}

	}
	
	function lendiz_portfolio_shortcode_elements( $element, $opts = array() ){
		$output = '';
		switch( $element ){
		
			case "title":
				$head = isset( $opts['post_heading'] ) ? $opts['post_heading'] : 'h3';
				$title_link = isset( $opts['title_link'] ) && $opts['title_link'] == 1 ? true : false;
				$output .= '<div class="entry-title">';
					$output .= '<'. esc_attr( $head ) .' class="post-title-head">';
					if( $title_link ){
						$output .= '<a href="'. esc_url( get_the_permalink() ) .'" class="post-title">'. esc_html( get_the_title() ) .'</a></'. esc_attr( $head ) .'>';
					}else{
						$output .= esc_html( get_the_title() );
					}
				$output .= '</div><!-- .entry-title -->';		
			break;
			
			case "thumb":
				if( isset( $opts['list_layout'] ) && $opts['list_layout'] === 0 ){
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
						
						$overlay_opt = isset( $opts['overlay_opt'] ) && $opts['overlay_opt'] == '1' ? true : false;
						$thumb_wrap_class = $overlay_opt ? ' post-overlay-active' : '';
											
						$output .= '<div class="post-thumb'. esc_attr( $thumb_wrap_class ) .'">';

							if( $thumb_cond == 'custom' ){
								$output .= '<img height="'. esc_attr( $img_prop[2] ) .'" width="'. esc_attr( $img_prop[1] ) .'" class="img-fluid" alt="'. esc_attr( get_the_title() ) .'" src="' . esc_url( $img_prop[0] ) . '"/>';
							}else{
								$output .= get_the_post_thumbnail( $opts['post_id'], $thumb_size, array( 'class' => 'img-fluid' ) );
							}
							
							if( $overlay_opt ){
								$overlay_class = isset( $opts['overlay_position'] ) ? ' overlay-'. $opts['overlay_position'] : ' overlay-center';
								$post_overlay_items = isset( $opts['overlay_items'] ) ? $opts['overlay_items'] : array( 'Enabled' => '' );
								$output .= '<div class="post-overlay-items'. esc_attr( $overlay_class ) .'">';
									foreach( $post_overlay_items['Enabled'] as $element => $value ){
										$output .= $this->lendiz_portfolio_shortcode_elements( $element, $opts );
									}
								$output .= '</div>';
	
							}
														
						$output .= '</div><!-- .post-thumb -->';
					}
				}
			break;
			
			case "category":

				$taxonomy = 'portfolio-categories';
				$terms = get_the_terms( get_the_ID(), $taxonomy ); // Get all terms of a taxonomy
				if ( $terms && !is_wp_error( $terms ) ) :
					$coutput = '<div class="post-category">';
						$coutput .= '<span class="before-icon ti-folder"></span>';
						foreach ( $terms as $term ) {
							$coutput .= '<a href="'. esc_url( get_term_link($term->slug, $taxonomy) ) .'">'. esc_html( $term->name ) .'</a>,';
						}
						$output .= rtrim( $coutput, ',' );
					$output .= '</div>';
				endif;
			
			break;
						
			case "date":
				$archive_year  = get_the_time('Y');
				$archive_month = get_the_time('m'); 
				$archive_day   = get_the_time('d');
				$output = '<div class="post-date"><a href="'. esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ) .'" ><i class="icon icon-calendar"></i> '. get_the_time( get_option( 'date_format' ) ) .'</a></div>';
			break;
			
			case "more":
				$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'lendiz-core' );
				$output = '<div class="post-more"><a class="read-more" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">'. esc_html( $read_more_text ) .'</a></div>';
			break;
			
			case "excerpt":
				$output = '';
				$output .= '<div class="post-excerpt">';
					add_filter( 'excerpt_more', 'lendiz_excerpt_more' );
					add_filter( 'excerpt_length', array( &$this, 'lendiz_excerpt_length' ) );
					ob_start();
					the_excerpt();
					$excerpt_cont = ob_get_clean();
					$output .= $excerpt_cont;
				$output .= '</div><!-- .post-excerpt -->';	
			break;		
			
			case "top-meta":
				$output = '';
				$top_meta = $opts['top_meta'];
				$elemetns = isset( $top_meta ) ? json_decode( $top_meta, true ) : array( 'Left' => '' );
				$output .= '<div class="top-meta clearfix">';
				foreach( $elemetns as $ele_key => $ele_part ){
					if( isset( $ele_part ) && !empty( $ele_part ) && $ele_key != 'disabled' ) :
						$part_class = $ele_key == 'Left' || $ele_key == 'Right' ? ' meta-' . strtolower( $ele_key ) : '';
						$output .= '<ul class="nav top-meta-list'. esc_attr( $part_class ) .'">';
							foreach($ele_part as $element => $value ){
								$portfolio_array = array( 'more_text' => $opts['more_text'] );
								$output .= '<li>'. $this->lendiz_portfolio_shortcode_elements( $element, $portfolio_array ) .'</li>';
							}
						$output .= '</ul>';
					endif;
				}
				$output .= '</div>';
			break;
			
			case "bottom-meta":
				$output = '';
				$bottom_meta = $opts['bottom_meta'];
				$elemetns = isset( $bottom_meta ) ? json_decode( $bottom_meta, true ) : array( 'Left' => '' );
				$output .= '<div class="bottom-meta clearfix">';
				foreach( $elemetns as $ele_key => $ele_part ){
					if( isset( $ele_part ) && !empty( $ele_part ) && $ele_key != 'disabled' ) :
						$part_class = $ele_key == 'Left' || $ele_key == 'Right' ? ' meta-' . strtolower( $ele_key ) : '';
						$output .= '<ul class="nav bottom-meta-list'. esc_attr( $part_class ) .'">';
							foreach($ele_part as $element => $value ){
								$portfolio_array = array( 'more_text' => $opts['more_text'] );
								$output .= '<li>'. $this->lendiz_portfolio_shortcode_elements( $element, $portfolio_array ) .'</li>';
							}
						$output .= '</ul>';
					endif;
				}
				$output .= '</div>';
			break;
			
			case "icons":
				$output .= '<div class="portfolio-icons">';
					$output .= $this->lendiz_portfolio_shortcode_elements( 'popup', $opts );
					$output .= $this->lendiz_portfolio_shortcode_elements( 'link', $opts );
				$output .= '</div><!-- .portfolio-icons -->';		
			break;
			
			case "popup":
				$this->popup_stat = 1;
				$output .= '<div class="portfolio-popup-icon">';
					$output .= '<a href="#" data-mfp-src="'. esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ) .'" class="image-gallery-link zoom-icon"><i class="ti-fullscreen"></i></a>';
				$output .= '</div><!-- .portfolio-popup-icon -->';		
			break;
			
			case "link":
				$output .= '<div class="portfolio-link-icon">';
					$custom_url = get_post_meta( get_the_ID(), 'pappory_portfolio_custom_url', true );
					$target = get_post_meta( get_the_ID(), 'pappory_portfolio_custom_url_target', true );
					$target = $target == '' ? '_self' : $target;
					$title_url = $custom_url != '' ? $custom_url : get_the_permalink();
					$output .= '<a href="'. esc_url( $title_url ) .'" class="link-icon" target="'. esc_attr( $target ) .'"><i class="ti-link"></i></a>';
				$output .= '</div><!-- .portfolio-link-icon -->';		
			break;
		}
		return $output; 
	}
	
	function lendiz_excerpt_length( $length ) {
		return $this->excerpt_len;
	}

}