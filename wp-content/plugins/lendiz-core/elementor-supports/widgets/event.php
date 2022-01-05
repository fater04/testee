<?php
/**
 * Lendiz Elementor Addon Event Widget
 *
 * @since 1.0.0
 */
class Elementor_Event_Widget extends \Elementor\Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Event widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizevent";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Event widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Event", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Event widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-calendar";
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
				"description"	=> esc_html__( "Default event options.", "lendiz-core" ),
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
		
		//Layouts Section
		$this->start_controls_section(
			"layouts_section",
			[
				"label"			=> esc_html__( "Layouts", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Event layout options here available.", "lendiz-core" ),
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
					'{{WRAPPER}} .event-wrapper' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			"event_layout",
			[
				"label"			=> esc_html__( "Event Layout", "lendiz-core" ),
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
				"label"			=> esc_html__( "Event Variation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event variatoin either dark or light.", "lendiz-core" ),
				"default"		=> "light",
				"options"		=> [
					"light"			=> esc_html__( "Light", "lendiz-core" ),
					"dark"			=> esc_html__( "Dark", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"event_cols",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Event Columns", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event columns.", "lendiz-core" ),
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
			"event_items",
			[
				"label"				=> "Post Items",
				"description"		=> esc_html__( "This is settings for event custom layout. here you can set your own layout. Drag and drop needed event items to Enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					"Enabled" 		=> [ 
						"thumb"			=> esc_html__( "Feature Image", "lendiz-core" ),
						"title"			=> esc_html__( "Title", "lendiz-core" ),
						"excerpt"		=> esc_html__( "Excerpt", "lendiz-core" ),
						"date"			=> esc_html__( "Date and Time", "lendiz-core" )
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
				"description"	=> esc_html__( "This is option for event text align.", "lendiz-core" ),
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
				"description"	=> esc_html__( "Event slide options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"slide_opt",
			[
				"label" 		=> esc_html__( "Slide Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider option.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Slide Items", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slide items shown on large devices.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_tab",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Tab", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slide items shown on tab.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_mobile",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Mobile", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slide items shown on mobile.", "lendiz-core" ),
				"default" 		=> "1",
			]
		);
		$this->add_control(
			"slide_item_autoplay",
			[
				"label" 		=> esc_html__( "Auto Play", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider auto play.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item_loop",
			[
				"label" 		=> esc_html__( "Loop", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider loop.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_center",
			[
				"label" 		=> esc_html__( "Items Center", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider center, for this option must active loop and minimum items 2.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_nav",
			[
				"label" 		=> esc_html__( "Navigation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider navigation.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_dots",
			[
				"label" 		=> esc_html__( "Pagination", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider pagination.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_margin",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Margin", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider margin space.", "lendiz-core" ),
				"default" 		=> "",
			]
		);
		$this->add_control(
			"slide_duration",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Duration", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider duration.", "lendiz-core" ),
				"default" 		=> "5000",
			]
		);
		$this->add_control(
			"slide_smart_speed",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Smart Speed", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider smart speed.", "lendiz-core" ),
				"default" 		=> "250",
			]
		);
		$this->add_control(
			"slide_slideby",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Slideby", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for event slider scroll by.", "lendiz-core" ),
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
				"description"	=> esc_html__( "Here you can mention each event items bottom space if you want to set default space of any item just use hyphen(-). Example 10px 20px - 10px", "lendiz-core" ),
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
		$class_names .= isset( $event_layout ) && $event_layout != '' ? ' event-' . $event_layout : '';
		$class_names .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class_names .= isset( $variation ) ? ' event-' . $variation : '';
		$more_text = isset( $more_text ) && $more_text != '' ? $more_text : '';
		$cols = isset( $event_cols ) ? $event_cols : 1;
		$heading_tag = isset( $heading_tag ) ? $heading_tag : 'h3';
		$slide_opt = isset( $slide_opt ) && $slide_opt == '1' ? true : false;
		$list_layout = isset( $event_layout ) && $event_layout == 'list' ? 1 : 0;
		
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
		$elemetns = isset( $event_items ) && !empty( $event_items ) ? json_decode( $event_items, true ) : array( 'Enabled' => $default_items );
		
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-'. lendiz_shortcode_rand_id();
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;

			if( !$list_layout ){
				$space_class_name = '.' . esc_attr( $rand_class ) . '.event-wrapper .event-inner >';
			}else{
				$space_class_name = '.' . esc_attr( $rand_class ) . '.event-wrapper .event-list-item .media-body >';
			}
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != '-' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		//Shortcode css ccde here
		$shortcode_css .= isset( $font_color ) && $font_color != '' ? '.' . esc_attr( $rand_class ) . '.event-wrapper.event-dark .event-inner, .' . esc_attr( $rand_class ) . '.event-wrapper .event-inner, .' . esc_attr( $rand_class ) . '.event-dark .media-body, .' . esc_attr( $rand_class ) . ' .media-body { color: '. esc_attr( $font_color ) .'; }' : '';		
		if( $shortcode_css ) $class_names .= ' ' . $shortcode_rand_id . ' lendiz-inline-css';

		$args = array(
			'post_type' => 'lendiz-events',
			'posts_per_page' => absint( $post_per_page ),
			'ignore_sticky_posts' => 1
		);
		
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

		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		
			$event_array = array(
				'thumb_size' => $thumb_size,
				'cus_thumb_size' => $cus_thumb_size,
				'hard_crop' => $hard_crop,
				'more_text' => $more_text,
				'post_heading' => $heading_tag
			);
			
			echo '<div class="event-wrapper'. esc_attr( $class_names ) .'" data-css="'. htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ) .'">';

			// Events Grid Layout
			if( !$list_layout ){

				$row_stat = 0;
					
				//Events Slide
				if( $slide_opt ) echo '<div class="owl-carousel" '. ( $data_atts ) .'>';	
				
				// Start the Loop
				while ( $query->have_posts() ) : $query->the_post();
				
					$post_id = get_the_ID();
					$event_array['post_id']	= $post_id;	
				
					if( $row_stat == 0 && !$slide_opt ) echo '<div class="row">';
				
					if( $slide_opt ){
						echo '<div class="item">';	//Service Slide Item
					}else{
						$col_class = "col-lg-". absint( $cols );
						$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
						echo '<div class="'. esc_attr( $col_class ) .'">';
					}
					
						echo '<div class="event-inner">';
						
						$post_id = get_the_ID();
						
						//Check Event Exists or Not
						$event_date = get_post_meta( $post_id, 'lendiz_event_start_date', true );
						$end_date = get_post_meta( $post_id, 'lendiz_event_end_date', true );
						$date_exist = !empty( $end_date ) ? $end_date : $event_date;
						if( $date_exist ):
							if( ( time() -( 60*60*24 ) ) > strtotime( $date_exist ) ): 
								echo '<span class="event-status">'. apply_filters( 'lendiz_archive_event_close', esc_html__( 'Event closed.', 'lendiz-core' ) ) .'</span>';
							endif;
						endif;

						if( isset( $elemetns['Enabled'] ) ) :
							foreach( $elemetns['Enabled'] as $element => $value ){
								echo $this->lendiz_event_shortcode_elements( $element, $event_array );
							}
						endif;
						
						echo '</div><!-- .event-inner -->';
					
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
				
				//Events Slide End
				if( $slide_opt ) echo '</div><!-- .owl-carousel -->';
	
				
		
			}else{ 

				if( isset( $elemetns['Enabled']['thumb'] ) ) unset( $elemetns['Enabled']['thumb'] );
				
				$row_stat = 0;
				
				//Events Slide
				if( $slide_opt ) echo '<div class="owl-carousel" '. ( $data_atts ) .'>';	
			
				// Start the Loop
				while ( $query->have_posts() ) : $query->the_post();
						
					$post_id = get_the_ID();
					$event_array['post_id']	= $post_id;	
					
					if( $row_stat == 0 && !$slide_opt ) echo '<div class="row">';
					
					if( $slide_opt ){
						echo '<div class="item">';	//Service Slide Item
					}else{
						$col_class = "col-lg-". absint( $cols );
						$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
						echo '<div class="'. esc_attr( $col_class ) .'">';
					}
						
						echo '<div class="media event-list-item">';
							echo $this->lendiz_event_shortcode_elements( 'thumb', $event_array );
							echo '<div class="media-body">';
							
								//Check Event Exists or Not
								$event_date = get_post_meta( $post_id, 'lendiz_event_start_date', true );
								$end_date = get_post_meta( $post_id, 'lendiz_event_end_date', true );
								$date_exist = !empty( $end_date ) ? $end_date : $event_date;
								if( $date_exist ):
									if( ( time() -( 60*60*24 ) ) > strtotime( $date_exist ) ): 
										echo '<span class="event-status">'. apply_filters( 'lendiz_archive_event_close', esc_html__( 'Event closed.', 'lendiz-core' ) ) .'</span>';
									endif;
								endif;

								if( isset( $elemetns['Enabled'] ) ) :
									foreach( $elemetns['Enabled'] as $element => $value ){
										echo $this->lendiz_event_shortcode_elements( $element, $event_array );
									}
								endif;
								
							echo '</div><!-- .media-body -->';
						echo '</div><!-- .event-list-item -->';
					
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
				
				//Events Slide End
				if( $slide_opt ) echo '</div><!-- .owl-carousel -->';

			}
		
			echo '</div><!-- .event-wrapper -->';
				
		}// query exists
		
		// use reset postdata to restore orginal query
		wp_reset_postdata();

	}
	
	function lendiz_event_shortcode_elements( $element, $opts = array() ){
		$output = '';
		switch( $element ){
		
			case "title":
				$head = isset( $opts['post_heading'] ) ? $opts['post_heading'] : 'h3';
				$output .= '<div class="entry-title">';
					$output .= '<'. esc_attr( $head ) .' class="post-title-head"><a href="'. esc_url( get_the_permalink() ) .'" class="post-title">'. esc_html( get_the_title() ) .'</a></'. esc_attr( $head ) .'>';
				$output .= '</div><!-- .entry-title -->';		
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
					
					$overlay_opt = isset( $opts['overlay_opt'] ) && $opts['overlay_opt'] == '1' ? true : false;
					$thumb_wrap_class = $overlay_opt ? ' post-overlay-active' : '';
										
					$output .= '<div class="post-thumb'. esc_attr( $thumb_wrap_class ) .'">';
						if( $thumb_cond == 'custom' ){
							$output .= '<img height="'. esc_attr( $img_prop[2] ) .'" width="'. esc_attr( $img_prop[1] ) .'" class="img-fluid" alt="'. esc_attr( get_the_title() ) .'" src="' . esc_url( $img_prop[0] ) . '"/>';
						}else{
							$output .= get_the_post_thumbnail( $opts['post_id'], $thumb_size, array( 'class' => 'img-fluid' ) );
						}
						
						if( $overlay_opt ){
							$post_overlay_items = isset( $opts['overlay_items'] ) ? $opts['overlay_items'] : array( 'Enabled' => '' );
							$output .= '<div class="post-overlay-items">';
								foreach( $post_overlay_items['Enabled'] as $element => $value ){
									$output .= $this->lendiz_event_shortcode_elements( $element, $opts );
								}
							$output .= '</div>';

						}
													
					$output .= '</div><!-- .post-thumb -->';
				}

			break;
			
			case "more":
				$read_more_text = isset( $opts['more_text'] ) ? $opts['more_text'] : esc_html__( 'Read more', 'lendiz-core' );
				$output = '<div class="post-more"><a class="read-more" href="'. esc_url( get_permalink( get_the_ID() ) ) . '">'. esc_html( $read_more_text ) .'</a></div>';
			break;
			
			case "excerpt":
				$output = '';
				$excerpt = isset( $opts['excerpt_length'] ) && $opts['excerpt_length'] != '' ? $opts['excerpt_length'] : 20;
				$output .= '<div class="post-excerpt">';
					add_filter( 'excerpt_more', 'lendiz_excerpt_more' );
					add_filter( 'excerpt_length', array( &$this, 'lendiz_excerpt_length' ) );
					ob_start();
					the_excerpt();
					$excerpt_cont = ob_get_clean();
					$output .= $excerpt_cont;
				$output .= '</div><!-- .post-excerpt -->';	
			break;		
			
			case "date":
		
				$event_date = get_post_meta( get_the_ID(), 'lendiz_event_start_date', true );
				if( $event_date ):
					$output .= '<div class="event-date">';
						$date_format = get_post_meta( $opts['post_id'], 'lendiz_event_date_format', true );
						$output .= !empty( $date_format ) ? date( $date_format, strtotime( $event_date ) ) : esc_html( $event_date );
						$event_time = get_post_meta( get_the_ID(), 'lendiz_event_time', true );
						if( $event_time ) : 
							$output .= '<span class="event-time">'. esc_html( $event_time ) .'</span>';
						endif;
					$output .= '</div><!-- .event-date -->';
				endif;
				
			break;
		}
		return $output; 
	}
	
	function lendiz_excerpt_length( $length ) {
		return $this->excerpt_len;
	}

}