<?php
/**
 * Elementor Animated Text Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_AnimateText_Widget
 extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Animated Text widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'animtext';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Animated Text widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Animated Text', 'lendiz-core' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Animated Text widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ti-smallcap';
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
		return [ 'typed', 'custom-front' ];
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
		return [ 'lendiz-elements' ];
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

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'lendiz-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'heading_tag',
			[
				'label' => __( 'Choose heading tag', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1' => __( 'H1', 'lendiz-core' ),
					'h2' => __( 'H2', 'lendiz-core' ),
					'h3' => __( 'H3', 'lendiz-core' ),
					'h4' => __( 'H4', 'lendiz-core' ),
					'h5' => __( 'H5', 'lendiz-core' ),
					'h6' => __( 'H6', 'lendiz-core' )
				]
			]
		);		
		
		$this->add_control(
			'ani_title',
			[
				'label' => __( 'Enter title', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Animated Text', 'lendiz-core' ),
				"default" 		=> __( 'Animated Text', 'lendiz-core' )
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
					'{{WRAPPER}} .animate-title' => 'color: {{VALUE}};',
				]
			]
		);
		
		$this->add_control(
			'ani_text',
			[
				'label' => __( 'Enter animated text', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Web,App,Design', 'lendiz-core' ),
				"default" 		=> __( 'Web,App,Design', 'lendiz-core' )
			]
		);
		
		$this->add_control(
			'typespeed',
			[
				'label' => __( 'Enter type speed', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => '100',
				"default" 		=> '100'
			]
		);
		
		$this->add_control(
			'backspeed',
			[
				'label' => __( 'Enter back speed', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => '100',
				"default" 		=> '100'
			]
		);
		
		$this->add_control(
			'backdelay',
			[
				'label' => __( 'Enter back delay', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => '1000',
				"default" 		=> '1000'
			]
		);
		
		$this->add_control(
			'startdelay',
			[
				'label' => __( 'Enter start delay', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => '1000',
				"default" 		=> '1000'
			]
		);
		
		$this->add_control(
			'cursor_char',
			[
				'label' => __( 'Enter cursor character', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => '|',
				"default" 		=> '|'
			]
		);
		
		$this->add_control(
			'ani_loop',
			[
				'label' => __( 'Enter animate loop', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => __( 'True', 'lendiz-core' ),
					'false' => __( 'False', 'lendiz-core' )
				]
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
		?>
		
		<div class="elementor-widget-container animated-text-elementor-widget">
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

		$heading_tag = isset( $settings['heading_tag'] ) ? $settings['heading_tag'] : 'h3';
		$ani_title = isset( $settings['ani_title'] ) ? $settings['ani_title'] : '';
		
		$typespeed = isset( $settings['typespeed'] ) ? $settings['typespeed'] : '100';
		$backspeed = isset( $settings['backspeed'] ) ? $settings['backspeed'] : '100';
		$backdelay = isset( $settings['backdelay'] ) ? $settings['backdelay'] : '1000';
		$startdelay = isset( $settings['startdelay'] ) ? $settings['startdelay'] : '1000';
		$cursor_char = isset( $settings['cursor_char'] ) ? $settings['cursor_char'] : '|';
		$ani_loop = isset( $settings['ani_loop'] ) ? $settings['ani_loop'] : 'true';
		
		$ani_text = isset( $settings['ani_text'] ) ? $settings['ani_text'] : esc_html__( 'Animated Text', 'lendiz-core' );
		$first_text = explode( ",", $ani_text );
		$first_text = isset( $first_text[0] ) ? $first_text[0] : '';

		echo '<'. esc_attr( $heading_tag ) .' class="animate-title">'. esc_html( $ani_title );
			echo ' <span class="typing-text" data-typing="'. esc_attr( $ani_text ) .'" data-typespeed="'. esc_attr( $typespeed ) .'" data-backspeed="'. esc_attr( $backspeed ) .'" data-backdelay="'. esc_attr( $backdelay ) .'" data-startdelay="'. esc_attr( $startdelay ) .'" data-loop="'. esc_attr( $ani_loop ) .'" data-char="'. esc_attr( $cursor_char ) .'">'. esc_html( $first_text ) .'</span>';
		echo '</'. esc_attr( $heading_tag ) .'>';

	}

}