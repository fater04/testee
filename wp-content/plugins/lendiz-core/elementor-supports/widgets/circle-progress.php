<?php
/**
 * Lendiz Elementor Addon Circle Progress Widget
 *
 * @since 1.0.0
 */
class Elementor_Circle_Progress_Widget extends \Elementor\Widget_Base {
	
	private $excerpt_len;
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Blog widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizcircleprogress";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Blog widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Circle Progress", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-control-record";
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
		return [ 'appear', 'circle-progress', 'custom-front'  ];
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
				"description"	=> esc_html__( "Default blog options.", "lendiz-core" ),
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
			"title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Title", "lendiz-core" ),
				"description"	=> esc_html__( "Here you put the circle progress title.", "lendiz-core" ),
				"default" 		=> esc_html__( "Progress", "lendiz-core" ),
			]
		);
		$this->add_control(
			"circle_val",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Progress Value", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can place progress value. This value must be in 1 to 100. Example 70", "lendiz-core" ),
				"default" 		=> "70"
			]
		);
		$this->add_control(
			"content",
			[
				"type"			=> \Elementor\Controls_Manager::TEXTAREA,
				"label"			=> esc_html__( "Content", "lendiz-core" ),
				"description"	=> esc_html__( "Here you put the progress content.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->end_controls_section();
		
		//Layouts Section
		$this->start_controls_section(
			"layouts_section",
			[
				"label"			=> esc_html__( "Layouts", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Circle progress layout options here available.", "lendiz-core" ),
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
					'{{WRAPPER}} .circle-progress-wrapper' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			"title_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Title Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the title color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .circle-progress-wrapper .circle-progress-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			"circle_layout",
			[
				"label"			=> esc_html__( "Circle Progress Layout", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "default",
				"options"		=> [
					"default"		=> esc_html__( "Default", "lendiz-core" ),
					"classic"		=> esc_html__( "Classic", "lendiz-core" ),
					"modern"		=> esc_html__( "Modern", "lendiz-core" ),
					"classic-pro"	=> esc_html__( "Classic Pro", "lendiz-core" ),
				]
			]
		);
		$this->add_control(
			"progress_heading",
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
			"circle_items",
			[
				"label"				=> "Circle Progress Items",
				"description"		=> esc_html__( "This is settings for Circle Progress custom layout. here you can set your own layout. Drag and drop needed Circle Progress items to Enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					"Enabled" 			=> [ 
						"circle"		=> esc_html__( "Circle", "lendiz-core" ),
						"title"			=> esc_html__( "Title", "lendiz-core" )
					],
					"disabled"			=> [
						'content'		=> esc_html__( 'Content', 'lendiz-core' )
					]
				]
			]
		);
		$this->add_control(
			"circle_empty_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Circle Empty Fill Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the circle empty fill color.", "lendiz-core" ),
				"default" 		=> "#e1e1e1"
			]
		);
		$this->add_control(
			"circle_start_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Circle Start Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the circle fill start color.", "lendiz-core" ),
				"default" 		=> "#333333"
			]
		);
		$this->add_control(
			"circle_end_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Circle End Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the circle fill end color. If you not giving end color, then circle take start color for end color.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"progress_size",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Circle Progress Size", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can set circle progress size. Example 200.", "lendiz-core" ),
				"default" 		=> "200"
			]
		);
		$this->add_control(
			"progress_thikness",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Circle Progress Thickness", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can set circle progress thickness. Example 10.", "lendiz-core" ),
				"default" 		=> "10"
			]
		);
		$this->add_control(
			"progress_duration",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Circle Progress Duration", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can set circle progress animation duration. Example 1500.", "lendiz-core" ),
				"default" 		=> "1500"
			]
		);
		$this->add_control(
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for circle progress text align.", "lendiz-core" ),
				"default"		=> "center",
				"options"		=> [
					"default"		=> esc_html__( "Default", "lendiz-core" ),
					"left"			=> esc_html__( "Left", "lendiz-core" ),
					"center"		=> esc_html__( "Center", "lendiz-core" ),
					"right"			=> esc_html__( "Right", "lendiz-core" )
				]
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
				"description"	=> esc_html__( "Here you can mention each blog items bottom space if you want to set default space of any item just use hyphen(-). Example 10px 20px - 10px", "lendiz-core" ),
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
		
		$class = isset( $extra_class ) && $extra_class != '' ? $extra_class : '';		
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';	
		$class .= isset( $circle_layout ) && $circle_layout != '' ? ' circle-progress-style-' . $circle_layout : '';
		
		// This is custom css options for main shortcode warpper
		$shortcode_css = '';
		$shortcode_rand_id = $rand_class = 'shortcode-rand-' . lendiz_shortcode_rand_id();
		
		//Spacing
		if( isset( $sc_spacing ) && !empty( $sc_spacing ) ){
			$sc_spacing = preg_replace( '!\s+!', ' ', $sc_spacing );
			$space_arr = explode( " ", $sc_spacing );
			$i = 1;
	
			$space_class_name = '.' . esc_attr( $rand_class ) . '.circle-progress-wrapper >';
			foreach( $space_arr as $space ){
				$shortcode_css .= $space != '-' ? $space_class_name .' *:nth-child('. esc_attr( $i ) .') { margin-bottom: '. esc_attr( $space ) .'; }' : '';
				$i++;
			}
		}
		
		if( $shortcode_css ) $class .= ' ' . $shortcode_rand_id . ' lendiz-inline-css';
		?>
		
		<div class="elementor-widget-container circle-progress-wrapper<?php echo esc_attr( $class ); ?>" data-css="<?php echo htmlspecialchars( json_encode( $shortcode_css ), ENT_QUOTES, 'UTF-8' ); ?>">
		
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
		
		//Define Variables
		$title = isset( $title ) && $title != '' ? $title : '';
		$circle_val = isset( $circle_val ) && $circle_val != '' ? $circle_val : '';
		$heading = isset( $progress_heading ) && $progress_heading != '' ? $progress_heading : '';
		$content = isset( $content ) && $content != '' ? $content : '';
		$progress_size = isset( $progress_size ) && $progress_size != '' ? $progress_size : '200';
		$progress_thikness = isset( $progress_thikness ) && $progress_thikness != '' ? $progress_thikness : '10';
		$progress_duration = isset( $progress_duration ) && $progress_duration != '' ? $progress_duration : '1500';
		$empty_color = isset( $circle_empty_color ) && $circle_empty_color != '' ? $circle_empty_color : '#e1e1e1';
		$circle_start_color = isset( $circle_start_color ) && $circle_start_color != '' ? $circle_start_color : '#333333';
		$circle_end_color = isset( $circle_end_color ) && $circle_end_color != '' ? $circle_end_color : '';

		$default_items = array(
			"circle" => esc_html__( "Circle", "lendiz-core" ),
			"title" => esc_html__( "Title", "lendiz-core" )
		);
		
		$elemetns = isset( $circle_items ) && !empty( $circle_items ) ? json_decode( $circle_items, true ) : array( 'Enabled' => $default_items );

		if( isset( $elemetns['Enabled'] ) ) :
		
			foreach( $elemetns['Enabled'] as $element => $value ){
				switch( $element ){
		
					case "circle":
						echo '<div class="circle-progress-circle" data-value="'. esc_attr( $circle_val ) .'" data-size="'. esc_attr( $progress_size ) .'" data-thickness="'. esc_attr( $progress_thikness ) .'" data-duration="'. esc_attr( $progress_duration ) .'" data-empty="'. esc_attr( $empty_color ) .'" data-scolor="'. esc_attr( $circle_start_color ) .'" data-ecolor="'. esc_attr( $circle_end_color ) .'">';
							echo '<span class="progress-value"></span>';
						echo '</div><!-- .circle-progress-circle -->';
					break;
					
					case "title":
						echo '<div class="circle-progress-title">';
							echo '<'. esc_attr( $heading ) .'>'. esc_html( $title ) .'</'. esc_attr( $heading ) .'>';
						echo '</div><!-- .circle-progress-title -->';
					break;
					
					case "content":
						echo '<div class="circle-progress-content">';
							echo '<p>'. esc_textarea( $content ) .'</p>';
						echo '</div><!-- .circle-progress-read-more -->';
					break;
					
				}
			} // foreach end
				
		endif;

	}
	
}