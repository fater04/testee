<?php
/**
 * Lendiz Elementor Addon Timeline
 *
 * @since 1.0.0
 */
class Elementor_Timeline_Widget extends \Elementor\Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Timeline widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendiztimeline";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Timeline widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Timeline", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Timeline widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-notepad";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Timeline widget belongs to.
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
	 * Register Timeline widget controls.
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
					'{{WRAPPER}} .timeline-wrapper' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"timeline_style",
			[
				"label"			=> esc_html__( "Timeline Style", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can choose the Time Line view type.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "1",
				"options"		=> [
					"1"		=> esc_html__( "Style 1", "lendiz-core" ),
					"2"		=> esc_html__( "Style 2", "lendiz-core" ),
					"3"		=> esc_html__( "Style 3", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"timeline_layout",
			[
				"label"			=> esc_html__( "Timeline Layout", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for timeline layout. If you choose left/right layout, then this option set the timeline position same side.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "default",
				"options"		=> [
					"default"	=> esc_html__( "Default", "lendiz-core" ),
					"left"		=> esc_html__( "Left Layout", "lendiz-core" ),
					"right"		=> esc_html__( "Right Layout", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"timeline_line",
			[
				"label"			=> esc_html__( "History Line Style", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for timeline history line style.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "default",
				"options"		=> [
					"default"	=> esc_html__( "Dotted", "lendiz-core" ),
					"solid"		=> esc_html__( "Solid", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Timeline Section
		$this->start_controls_section(
			"timeline_section",
			[
				"label"			=> esc_html__( "Timeline", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Timeline options available here.", "lendiz-core" ),
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			"timeline_pos",
			[
				"label"			=> esc_html__( "Timeline Position", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for timeline position. Either same side or opposite side.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "same",
				"options"		=> [
					"same"	=> esc_html__( "Same Side", "lendiz-core" ),
					"opp"	=> esc_html__( "Opposite Side", "lendiz-core" )
				]
			]
		);
		$repeater->add_control(
			"timeline_title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Timeline Title", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the timeline title.", "lendiz-core" )
			]
		);
		$repeater->add_control(
			"timeline_subtitle",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Timeline Sub Title", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the timeline sub title.", "lendiz-core" ),
				"default"		=> ""
			]
		);
		$repeater->add_control(
			"title_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Timeline Title Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the timeline title and subtitle color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .timeline-title' => 'color: {{VALUE}};'
				]
			]
		);
		$repeater->add_control(
			"separator_shape",
			[
				"label"			=> esc_html__( "Separator Shape", "lendiz-core" ),
				"description"	=> esc_html__( "This is options for separator shape.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "sq",
				"options"		=> [
					"sq"	=> esc_html__( "Square", "lendiz-core" ),
					"rounded"	=> esc_html__( "Rounded", "lendiz-core" ),
					"rounded-circle"	=> esc_html__( "Circle", "lendiz-core" ),
					"3"		=> esc_html__( "Triangle", "lendiz-core" ),
					"5"		=> esc_html__( "Pentagon", "lendiz-core" ),
					"6"		=> esc_html__( "Hexagon", "lendiz-core" ),
					"7"		=> esc_html__( "Heptagon", "lendiz-core" ),
					"8"		=> esc_html__( "Octagon", "lendiz-core" ),
					"9"		=> esc_html__( "Nonagon", "lendiz-core" ),
					"10"	=> esc_html__( "Decagon", "lendiz-core" )
				]
			]
		);
		$repeater->add_control(
			"separator_type",
			[
				"label"			=> esc_html__( "Separator Type", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for timeline separator type either icon/image/text. If no need separator, then choose none.", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "none",
				"options"		=> [
					"none"	=> esc_html__( "None", "lendiz-core" ),
					"icon"	=> esc_html__( "Icon", "lendiz-core" ),
					"img"	=> esc_html__( "Image", "lendiz-core" ),
					"txt"	=> esc_html__( "Text", "lendiz-core" )
				]
			]
		);
		$repeater->add_control(
			"icon",
			[
				"label" 		=> esc_html__( "Icon", "lendiz-core" ),
				"type" 			=> \Elementor\Controls_Manager::ICON,
				"default" 		=> "ti-star",
				"condition" 	=> [
					"separator_type" 	=> "icon"
				]
			]
		);
		$repeater->add_control(
			"separator_image",
			[
				"type"	=> \Elementor\Controls_Manager::MEDIA,
				"label" => __( "Separator Image", "lendiz-core" ),
				"description"	=> esc_html__( "Choose separator image.", "lendiz-core" ),
				"condition" 	=> [
					"separator_type" 	=> "img"
				]
			]
		);
		$repeater->add_control(
			"separator_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Separator Text", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for showing text on separator.", "lendiz-core" ),
				"condition" 	=> [
					"separator_type" 	=> "txt"
				]
			]
		);
		$repeater->add_control(
			"separator_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Separator Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the timeline separator color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .timeline-badge' => 'color: {{VALUE}};'
				]
			]
		);
		$repeater->add_control(
			"separator_bgcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Separator Background Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the timeline separator color.", "lendiz-core" ),
				"default" 		=> "#333333",
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .timeline-badge' => 'background-color: {{VALUE}};'
				]
			]
		);
		$repeater->add_control(
			"separator_title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Separator Title", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the timeline separator title.", "lendiz-core" )
			]
		);
		$repeater->add_control(
			"separator_subtitle",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Separator Sub Title", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the timeline separator sub title.", "lendiz-core" )
			]
		);
		$repeater->add_control(
			"tl_content",
			[
				"type"			=> \Elementor\Controls_Manager::TEXTAREA,
				"label"			=> esc_html__( "Content", "lendiz-core" ),
				"description"	=> esc_html__( "You can give the feature box content here. HTML allowed here.", "lendiz-core" ),
				"default" 		=> ""
			]
		);

		$this->add_control(
			"timeline_settings",
			[
				"label"		=> esc_html__( "Timeline Settings", "lendiz-core" ),
				"type"		=> \Elementor\Controls_Manager::REPEATER,
				"fields"	=> $repeater->get_controls(),
				"default" => [
					[
						"timeline_title" 	=> esc_html__( "History 1", "lendiz-core" ),
						"separator_shape" 	=> "rounded-circle",
						"separator_type"	=> "icon",
						"separator_color"	=> "#ffffff",
						"separator_bgcolor"	=> "#000000",
						"separator_title"	=> "2012",
						"separator_subtitle"=> esc_html__( "started", "lendiz-core" ),
						"tl_content"		=> esc_html__( "Lorem ipsum dolor sit amet, consectetur adipiscing elit.", "lendiz-core" )
					]
				],
				"title_field"	=> "{{{ timeline_title }}}",
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
		$class = isset( $extra_class ) && $extra_class != '' ? $extra_class : ''; 
		$class .= isset( $timeline_style ) && $timeline_style != '' ? ' timeline-style-'.$timeline_style : ''; 
		
		$output = '';
		echo '<div class="timeline-wrapper'. esc_attr( $class ) .'">';
		
		// All Timeline Items
		$tl_items = isset( $timeline_settings ) ? $timeline_settings : '';
		
		if( $tl_items ):
			$tl_layout = isset( $timeline_layout ) ? $timeline_layout : '';
			$layout_class = $timeline_layout != 'default' ? ' tl-' . $timeline_layout . '-layout' : '';
			$layout_class .= isset( $timeline_line ) && $timeline_line != 'default' ? ' tl-border-' . $timeline_line : '';
			echo '<ul class="timeline'. esc_attr( $layout_class ) .'">';
			if( isset( $tl_items ) && !empty( $tl_items ) ){
				foreach( $tl_items as $tlitem ) {
					
					$tl_rand_class = 'timeline-rand-'. lendiz_shortcode_rand_id();
					$tl_pos = isset( $tlitem['timeline_pos'] ) ? $tlitem['timeline_pos'] : '';
					$li_class = '';
					if( $tl_layout == 'default' ){
						$li_class .= $tl_pos == 'opp' ? ' timeline-inverted' : '';
					}elseif( $tl_layout == 'left' ){
						$li_class .= ' timeline-inverted';
					}
					$tl_title = isset( $tlitem['timeline_title'] ) ? $tlitem['timeline_title'] : '';
					$tl_stitle = isset( $tlitem['timeline_subtitle'] ) ? $tlitem['timeline_subtitle'] : '';
					$tl_content = isset( $tlitem['tl_content'] ) ? $tlitem['tl_content'] : '';
					
					$separator_type = isset( $tlitem['separator_type'] ) ? $tlitem['separator_type'] : 'none';
					$sep_out = '';
					switch( $separator_type ){
						case "icon":
							$icon = isset( $tlitem['icon'] ) ? $tlitem['icon'] : '';
							$sep_out = '<i class="'. esc_attr( $icon ) .'"></i>';
						break;
						case "img":
							$sep_image = isset( $tlitem['separator_image'] ) ? $tlitem['separator_image'] : '';
							if( isset( $sep_image['id'] ) ){
								$sep_image = $sep_image['id'];
								$img_attr = wp_get_attachment_image_src( absint( $sep_image ), 'full', true );
								$image_alt = get_post_meta( absint( $sep_image ), '_wp_attachment_image_alt', true);
								$sep_out = isset( $img_attr[0] ) ? '<img class="img-fluid" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" />' : '';
								$li_class .= ' sep-img-activated';
							}
						break;
						case "txt":
							$sep_text = isset( $tlitem['separator_text'] ) ? $tlitem['separator_text'] : '';
							$sep_out = '<span class="separator-text">'. esc_html( $sep_text ) .'</span>';
						break;
						default:
							$sep_out = '<span class="separator-empty"></span>';
						break;
					}
					
					$sep_title = isset( $tlitem['separator_title'] ) && $tlitem['separator_title'] != '' ? $tlitem['separator_title'] : '';
					$sep_stitle = isset( $tlitem['separator_subtitle'] ) && $tlitem['separator_subtitle'] != '' ? $tlitem['separator_subtitle'] : '';
					$sep_tit_out = '';
					if( $sep_title != '' || $sep_stitle != '' ){
						$sep_tit_out .= $sep_title != '' ? esc_html( $sep_title ) : '';
						$sep_tit_out .= $sep_stitle != '' ? '<span>'. esc_html( $sep_stitle ) .'</span>' : '';
					}
					
					$sep_class = '';
					$sep_bg_stat = 1;
					if( $sep_out ){
						if( isset( $tlitem['separator_shape'] ) ){
							if( is_numeric( $tlitem['separator_shape'] ) ){
								$sep_class = ' separator-shape-custom';
								$sep_bg = isset( $tlitem['separator_bgcolor'] ) ? $tlitem['separator_bgcolor'] : '#333';
								$sep_out .= '<canvas id="canvas_agon" class="canvas_agon" width=50 height=50 data-size="25" data-side="'. esc_attr( $tlitem['separator_shape'] ) .'" data-color="'. esc_attr( $sep_bg ) .'"></canvas>';
								$sep_bg_stat = 0;
							}else{
								$sep_class = ' '.$tlitem['separator_shape'];
							}
						}else{
							$sep_class = ' '. $tlitem['separator_shape'];
						}
					}
					
					$li_class .= ' elementor-repeater-item-'. esc_attr( $tlitem['_id'] );
					
					echo '<li class="'. esc_attr( $li_class ) .'">';
						
						echo $sep_out != '' ? '<div class="timeline-badge'. esc_attr( $sep_class ) .'">'. ( $sep_out ) .'</div>' : '';
						echo $sep_tit_out != '' ? '<div class="timeline-sep-title">'. wp_kses_post( $sep_tit_out ) .'</div>' : '';
					
						echo '<div class="timeline-panel">';
							if( $tl_title || $tl_stitle ):
								echo '<div class="timeline-heading">';
									echo $tl_title != '' ? '<h4 class="timeline-title">'. esc_html( $tl_title ) .'</h4>' : '';
									echo $tl_stitle != '' ? '<p><small class="text-muted">'. wp_kses_post( $tl_stitle ) .'</small></p>' : '';
								echo '</div>';
							endif;
							
							if( $tl_content ):
								echo '<div class="timeline-body">';
									echo do_shortcode( $tl_content );
								echo '</div>';
							endif;
							
						echo '</div>';
					echo '</li><!-- .timeline item li -->';
					
				}// foreach
			}//end if
			echo '</ul>';
		endif;
							
		echo '</div><!-- .timeline-wrapper -->';		

	}
		
}