<?php
/**
 * Lendiz Elementor Addon Testimonial Widget
 *
 * @since 1.0.0
 */
class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Testimonial widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendiztestimonial";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Testimonial widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Testimonial", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Testimonial widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-star";
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
				"description"	=> esc_html__( "Default testimonial options.", "lendiz-core" ),
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
				"description"	=> esc_html__( "Testimonial filter options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"testimonial_ids",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Enter Testimonial Id's", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can enter testimonial post id's for get specific testimonial. Example 4, 5, 7", "lendiz-core" ),
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
				"description"	=> esc_html__( "Testimonial layout options here available.", "lendiz-core" ),
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
					'{{WRAPPER}} .testimonial-wrapper' => 'color: {{VALUE}};',
					'{{WRAPPER}} .testimonial-wrapper.testimonial-dark .testimonial-inner' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			"testimonial_layout",
			[
				"label"			=> esc_html__( "Testimonial Layout", "lendiz-core" ),
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
				"label"			=> esc_html__( "Testimonial Variation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial variatoin either dark or light.", "lendiz-core" ),
				"default"		=> "light",
				"options"		=> [
					"light"			=> esc_html__( "Light", "lendiz-core" ),
					"dark"			=> esc_html__( "Dark", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"testimonial_cols",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Testimonial Columns", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial columns.", "lendiz-core" ),
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
			"testimonial_items",
			[
				"label"				=> "Post Items",
				"description"		=> esc_html__( "This is settings for testimonial custom layout. here you can set your own layout. Drag and drop needed testimonial items to Enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					"Enabled" 		=> [ 
						"thumb"			=> esc_html__( "Feature Image", "lendiz-core" ),
						"name"			=> esc_html__( "Name", "lendiz-core" ),
						"designation"	=> esc_html__( "Designation", "lendiz-core" ),
						"excerpt"		=> esc_html__( "Excerpt", "lendiz-core" ),
						"rate"			=> esc_html__( "Star Rating", "lendiz-core" ),
						"info"			=> esc_html__( "Client Info", "lendiz-core" )
					],
					"disabled"		=> [
						"more"			=> esc_html__( "Read More", "lendiz-core" )
					]
				]
			]
		);
		$this->add_control(
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial text align.", "lendiz-core" ),
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
				"default"		=> "thumbnail",
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
				"description"	=> esc_html__( "Testimonial slide options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"slide_opt",
			[
				"label" 		=> esc_html__( "Slide Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider option.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Slide Items", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slide items shown on large devices.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_tab",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Tab", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slide items shown on tab.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_mobile",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Mobile", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slide items shown on mobile.", "lendiz-core" ),
				"default" 		=> "1",
			]
		);
		$this->add_control(
			"slide_item_autoplay",
			[
				"label" 		=> esc_html__( "Auto Play", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider auto play.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item_loop",
			[
				"label" 		=> esc_html__( "Loop", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider loop.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_center",
			[
				"label" 		=> esc_html__( "Items Center", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider center, for this option must active loop and minimum items 2.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_nav",
			[
				"label" 		=> esc_html__( "Navigation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider navigation.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_dots",
			[
				"label" 		=> esc_html__( "Pagination", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider pagination.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_margin",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Margin", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider margin space.", "lendiz-core" ),
				"default" 		=> "",
			]
		);
		$this->add_control(
			"slide_duration",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Duration", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider duration.", "lendiz-core" ),
				"default" 		=> "5000",
			]
		);
		$this->add_control(
			"slide_smart_speed",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Smart Speed", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider smart speed.", "lendiz-core" ),
				"default" 		=> "250",
			]
		);
		$this->add_control(
			"slide_slideby",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Slideby", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for testimonial slider scroll by.", "lendiz-core" ),
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
				"description"	=> esc_html__( "Here you can mention each testimonial items bottom space if you want to set default space of any item just use hyphen(-). Example 10px 20px - 10px", "lendiz-core" ),
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
		$class_names .= isset( $testimonial_layout ) ? ' testimonial-' . $testimonial_layout : ' testimonial-1';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class_names .= isset( $variation ) ? ' testimonial-' . $variation : '';
		$cols = isset( $testimonial_cols ) ? $testimonial_cols : 6;
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$slide_opt = isset( $slide_opt ) && $slide_opt == '1' ? true : false;
		$heading_tag = isset( $heading_tag ) ? $heading_tag : 'h3';
		$list_layout = isset( $testimonial_layout ) && $testimonial_layout == 'list' ? 1 : 0;
		$testimonial_ids = isset( $testimonial_ids ) && $testimonial_ids != '' ? $testimonial_ids : '';
		$order_by = '';
		
		$thumb_size = isset( $image_size ) ? $image_size : '';
		$cus_thumb_size = '';
		$hard_crop = false;
		if( $thumb_size == 'custom' ){
			$cus_thumb_size = isset( $custom_image_size ) && $custom_image_size != '' ? $custom_image_size : '';
			$hard_crop = isset( $hard_croping ) && $hard_croping == '1' ? true : false;
		}
		
		if( $testimonial_ids ){
			$testimonial_ids = preg_replace( '/\s+/', '', $testimonial_ids );
			$testimonial_ids = explode( ',', rtrim( $testimonial_ids, ',' ) );
			$order_by = 'post__in';
		}
		
		$default_items = array( 
			'thumb'			=> esc_html__( 'Image', 'lendiz-core' ),
			'name'			=> esc_html__( 'Name', 'lendiz-core' ),
			'designation'	=> esc_html__( 'Designation', 'lendiz-core' ),
			'excerpt'		=> esc_html__( 'Excerpt', 'lendiz-core' ),
			'rate'			=> esc_html__( 'Star Rating', 'lendiz-core' )
		);
		$elemetns = isset( $testimonial_items ) && !empty( $testimonial_items ) ? json_decode( $testimonial_items, true ) : array( 'Enabled' => $default_items );
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. lendiz_shortcode_rand_id();
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
			
			if( !$list_layout ){
				$space_class_name = '.' . esc_attr( $rand_class ) . '.testimonial-wrapper .testimonial-inner >';
			}else{
				$space_class_name = '.' . esc_attr( $rand_class ) . '.testimonial-wrapper .testimonial-list-item .media-body >';
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
			'post_type' => 'lendiz-testimonial',
			'posts_per_page' => absint( $post_per_page ),
			'ignore_sticky_posts' => 1,
			'post__in' => $testimonial_ids,
			'orderby' => $order_by,
		);
		
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		
			$testimoanil_array = array(
				'thumb_size' => $thumb_size,
				'cus_thumb_size' => $cus_thumb_size,
				'hard_crop' => $hard_crop,
				'excerpt_length' => $excerpt_length,
				'more_text' => $more_text,
				'post_heading' => $heading_tag
			);
		
			if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' lendiz-inline-css';
			
			echo '<div class="testimonial-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';
				$row_stat = 0;

				if( !$list_layout ){
					
					//Testimonial Slide
					if( $slide_opt ) echo '<div class="owl-carousel" '. ( $data_atts ) .'>';	
					
					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
					
						$post_id = get_the_ID();
						$testimoanil_array['post_id'] = $post_id;
						
						if( $row_stat == 0 && !$slide_opt ) echo '<div class="row">';
							
						if( $slide_opt ){
							echo '<div class="item">';	//Service Slide Item
						}else{
							$col_class = "col-lg-". absint( $cols );
							$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
							echo '<div class="'. esc_attr( $col_class ) .'">';
						}
						
							echo '<div class="testimonial-inner rounded">';
	
							if( isset( $elemetns['Enabled'] ) ) :
								foreach( $elemetns['Enabled'] as $element => $value ){
									echo $this->lendiz_testimonial_shortcode_elements( $element, $testimoanil_array );
								}
							endif;
							
							echo '</div><!-- .testimonial-inner -->';
						
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
				
					//Testimonial Slide End
					if( $slide_opt ) echo '</div><!-- .owl-carousel -->';
			
				}else{
				
					if( isset( $elemetns['Enabled']['thumb'] ) ) unset( $elemetns['Enabled']['thumb'] );					
					
					//Testimonial Slide
					if( $slide_opt ) echo '<div class="owl-carousel" '. ( $data_atts ) .'>';	
					
					// Start the Loop
					while ( $query->have_posts() ) : $query->the_post();
					
						$post_id = get_the_ID();
						$testimoanil_array['post_id'] = $post_id;
						
						if( $row_stat == 0 && !$slide_opt ) echo '<div class="row">';
							
						if( $slide_opt ){
							echo '<div class="item">';	//Service Slide Item
						}else{
							$col_class = "col-lg-". absint( $cols );
							$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
							echo '<div class="'. esc_attr( $col_class ) .'">';
						}
						
							echo '<div class="media testimonial-list-item">';
							
								echo $this->lendiz_testimonial_shortcode_elements( 'thumb', $testimoanil_array );
							
								echo '<div class="media-body">';
									if( isset( $elemetns['Enabled'] ) ) :
										foreach( $elemetns['Enabled'] as $element => $value ){
											echo $this->lendiz_testimonial_shortcode_elements( $element, $testimoanil_array );
										}
									endif;
								echo '</div><!-- .media-body -->';
							
							echo '</div><!-- .testimonial-list-item -->';
						
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
				
					//Testimonial Slide End
					if( $slide_opt ) echo '</div><!-- .owl-carousel -->';
					
				}

			echo '</div><!-- .testimonial-wrapper -->';
			
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();

	}
	
	function lendiz_testimonial_shortcode_elements( $element, $opts = array() ){
		$output = '';
		switch( $element ){
		
			case "name":
				$head = isset( $opts['post_heading'] ) ? $opts['post_heading'] : 'h3';
				$output .= '<div class="testimonial-name">';
					$output .= '<' . esc_attr( $head ) . '><a href="'. esc_url( get_the_permalink() ) .'" class="client-name">'. esc_html( get_the_title() ) .'</a></' . esc_attr( $head ) . '>';
				$output .= '</div><!-- .testimonial-name -->';		
			break;
			
			case "designation":
				$designation = get_post_meta( $opts['post_id'], 'lendiz_testimonial_designation', true );
				if( $designation ) :
					
					$output .= '<div class="testimonial-designation">';
						$output .= '<p>'. esc_html( $designation ) .'</p>';
					$output .= '</div><!-- .testimonial-designation -->';
				endif;
			break;
			
			case "info":
				$output .= '<div class="testimonial-info">';
					$output .= '<p>';
						$output .= '<a href="'. esc_url( get_the_permalink() ) .'" class="client-name">'. esc_html( get_the_title() ) .'</a>';
						
						$designation = get_post_meta( $opts['post_id'], 'lendiz_testimonial_designation', true );
						if( $designation ) :
							$output .= '<span class="client-designation">'. esc_html( $designation ) .'</span>';
						endif;
						
						$company_url = get_post_meta( $opts['post_id'], 'lendiz_testimonial_company_url', true );
						if( $company_url ) :
							$output .= '<a href="'. esc_url( $company_url ) .'" class="company-url">'. esc_url( $company_url ) .'</a>';
						endif;
					$output .= '</p>';
				$output .= '</div><!-- .testimonial-info -->';		
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
				
					$output .= '<div class="testimonial-thumb">';
						$output .= get_the_post_thumbnail( $opts['post_id'], $thumb_size, array( 'class' => 'img-fluid rounded-circle' ) );
					$output .= '</div><!-- .testimonial-thumb -->';
				}
			break;
			
			case "excerpt":
				$excerpt = isset( $opts['excerpt_length'] ) && $opts['excerpt_length'] != '' ? $opts['excerpt_length'] : 20;
				$output .= '<div class="testimonial-excerpt">';
					add_filter( 'excerpt_more', 'lendiz_excerpt_more' );
					add_filter( 'excerpt_length', array( &$this, 'lendiz_excerpt_length' ) );
					ob_start();
					the_excerpt();
					$excerpt_cont = ob_get_clean();
					$output .= $excerpt_cont;
				$output .= '</div><!-- .testimonial-excerpt -->';	
			break;
			
			case "rate":
				$rate = get_post_meta( $opts['post_id'], 'lendiz_testimonial_rating', true );
				if( $rate ) :
					$output .= '<div class="testimonial-rating">';
						$output .= '<p>'. lendiz_star_rating( $rate ) .'</p>';
					$output .= '</div><!-- .testimonial-rating -->';	
				endif;	
			break;
			
			case "more":
				$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'lendiz-core' );
				$output = '<div class="post-more"><a class="read-more" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">'. esc_html( $read_more_text ) .'</a></div>';
			break;
			
		}
		return $output; 
	}
	
	function lendiz_excerpt_length( $length ) {
		return $this->excerpt_len;
	}

}