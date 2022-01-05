<?php
/**
 * Lendiz Elementor Addon Image grid
 *
 * @since 1.0.0
 */
class Elementor_Image_Grid_Widget extends \Elementor\Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Image grid widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizimagegrid";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Image grid widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Image Grid", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Image grid widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-gallery";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Image grid widget belongs to.
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
	 * Register Image grid widget controls.
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
			"grid_cols",
			[
				"label"			=> esc_html__( "Image Grid Columns", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This grid option using to divide columns as per given numbers. This option active only when slide inactive otherwise slide columns only focus to divide.", "lendiz-core" ),
				"default"		=> "3",
				"options"		=> [
					"12"	=> esc_html__( "1 Column", "lendiz-core" ),
					"6"		=> esc_html__( "2 Columns", "lendiz-core" ),
					"4"		=> esc_html__( "3 Columns", "lendiz-core" ),
					"3"		=> esc_html__( "4 Columns", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"image_grid_style",
			[
				"label"			=> esc_html__( "Image Grid Style", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Choose image grid style.", "lendiz-core" ),
				"default"		=> "1",
				"options"		=> [
					"1"	=> esc_html__( "Style 1", "lendiz-core" ),
					"2"	=> esc_html__( "Style 2", "lendiz-core" ),
					"3"	=> esc_html__( "Style 3", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Image Section
		$this->start_controls_section(
			"image_section",
			[
				"label"	=> esc_html__( "Image", "lendiz-core" ),
				"tab"	=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Image options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"gallery",
			[
				"label"		=> esc_html__( "Add Images", "lendiz-core" ),
				"type"		=> \Elementor\Controls_Manager::GALLERY,
				"default"	=> [],
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
			"caption_opt",
			[
				"label" 		=> esc_html__( "Image Caption Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for show image caption if exists.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->end_controls_section();	
		
		//Slide Section
		$this->start_controls_section(
			"slide_section",
			[
				"label"			=> esc_html__( "Slide", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Blog slide options here available.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"slide_opt",
			[
				"label" 		=> esc_html__( "Slide Option", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider option.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Slide Items", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slide items shown on large devices.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_tab",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Tab", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slide items shown on tab.", "lendiz-core" ),
				"default" 		=> "2",
			]
		);
		$this->add_control(
			"slide_item_mobile",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items on Mobile", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slide items shown on mobile.", "lendiz-core" ),
				"default" 		=> "1",
			]
		);
		$this->add_control(
			"slide_item_autoplay",
			[
				"label" 		=> esc_html__( "Auto Play", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider auto play.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_item_loop",
			[
				"label" 		=> esc_html__( "Loop", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider loop.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_center",
			[
				"label" 		=> esc_html__( "Items Center", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider center, for this option must active loop and minimum items 2.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_nav",
			[
				"label" 		=> esc_html__( "Navigation", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider navigation.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_dots",
			[
				"label" 		=> esc_html__( "Pagination", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider pagination.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"slide_margin",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Margin", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider margin space.", "lendiz-core" ),
				"default" 		=> "",
			]
		);
		$this->add_control(
			"slide_duration",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Duration", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider duration.", "lendiz-core" ),
				"default" 		=> "5000",
			]
		);
		$this->add_control(
			"slide_smart_speed",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Smart Speed", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider smart speed.", "lendiz-core" ),
				"default" 		=> "250",
			]
		);
		$this->add_control(
			"slide_slideby",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Items Slideby", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for image grid slider scroll by.", "lendiz-core" ),
				"default" 		=> "1",
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
		$class = isset( $extra_class ) && $extra_class != '' ? ' '. $extra_class : '';
		$class .= isset( $image_grid_style ) && $image_grid_style != '' ? ' image-grid-'. $image_grid_style : '';
		$cols = isset( $grid_cols ) ? $grid_cols : 12;
		$slide_opt = isset( $slide_opt ) && $slide_opt == '1' ? true : false;
		$grids = '';
		$caption_opt = isset( $caption_opt ) && $caption_opt == '1' ? true : false;

		$gal_atts = $data_atts = '';
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
		
		$thumb_size = isset( $image_size ) ? $image_size : 'large';
		$cus_thumb_size = '';
		$hard_crop = false;
		if( $thumb_size == 'custom' ){
			$cus_thumb_size = isset( $custom_image_size ) && $custom_image_size != '' ? $custom_image_size : '';
			$hard_crop = isset( $hard_croping ) && $hard_croping == '1' ? true : false;
		}
			
		if( isset( $gallery ) ){
			
			echo'<div class="image-grid-wrapper'. esc_attr( $class ) .'">';
			
				$row_stat = 0;
				$col_class = "col-lg-". absint( $cols );
				$col_class .= " " . ( $cols == 3 ? "col-md-6" : "col-md-". absint( $cols ) );
				
				//Image Grid Slide
				if( $slide_opt ) echo'<div class="owl-carousel" '. ( $data_atts ) .'>';

					foreach( $gallery as $image ){
						
						$image_id = $image['id'];
						
						if( $row_stat == 0 && $slide_opt != '1' ) :
							echo'<div class="row">';
						endif;
						
						if( !$slide_opt ){
							echo '<div class="'. esc_attr( $col_class ) .'">';
						}
							echo'<div class="image-grid-inner">';
							
								// Custom Thumb Code
								$thumb_size_final = '';
								if( $thumb_size == 'custom' ){
									if( strpos( $cus_thumb_size, ";" ) ){
										$custom_opt = $cus_thumb_size != '' ? explode( "x", str_replace( ";", "", $cus_thumb_size ) ) : array();
										$img_prop = lendiz_get_custom_size_image( $custom_opt, $hard_crop, $image_id );
										$thumb_size_final = array( $img_prop[1], $img_prop[2] );
									}else{
										$thumb_size_final = 'large';
									}
									
								}// Custom Thumb Code End
								
								$images = wp_get_attachment_image_src( $image_id, $thumb_size_final, true );
								$image_alt = get_post_meta( absint( $image_id ), '_wp_attachment_image_alt', true);
								$image_alt = $image_alt == '' ? esc_html__( 'Image', 'lendiz-core' ) : $image_alt;
								
								echo '<img class="img-fluid client-img" src="'. esc_url( $images[0] ) .'" width="'. ( $images[1] ) .'" height="'. ( $images[1] ) .'" alt="'. esc_attr( $image_alt ) .'" />';

								if( $caption_opt ){
									$image_caption = wp_get_attachment_caption( absint( $image_id ) );
									if( $image_caption ){
										echo '<div class="img-caption-txt">'. esc_html( $image_caption ) .'</div>';						
									}
								}
								
							echo'</div><!-- .image-grid-inner -->';
							
						if( !$slide_opt ) echo'</div><!-- .cols -->';
						
						$row_stat++;
						if( $row_stat == ( 12/ $cols ) && $slide_opt != '1' ) :
							echo'</div><!-- .row -->';
							$row_stat = 0;
						endif;
					}
					
				//Image Grid Slide End
				if( $slide_opt ) echo'</div><!-- .owl-carousel -->';
				
			echo'</div><!-- .image-grid-wrapper -->';
			
		}
		

	}
		
}