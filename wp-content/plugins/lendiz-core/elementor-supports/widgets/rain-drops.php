<?php
/**
 * Elementor Rain Drops Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_RainDrops_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Rain Drops widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'raindrops';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Rain Drops widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Rain Drops', 'lendiz-core' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Rain Drops widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ti-pulse';
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
		return [ 'jquery-ui', 'jquery-ease', 'raindrops', 'custom-front' ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Rain Drops widget belongs to.
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
	 * Register Rain Drops widget controls.
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
				'label' => __( 'General', 'lendiz-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
				
		$this->add_control(
			'rd_color',
			[
				'label' => __( 'Canvas Color', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description"	=> esc_html__( "Here you can define rain drop canvas color. Example #333333", "lendiz-core" ),
				'placeholder' => "#333333",
				"default" 		=> "#333333"
			]
		);		
		$this->add_control(
			'rd_height',
			[
				'label' => __( 'Canvas Height', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description"	=> esc_html__( "Here you can define rain drop canvas height. Example 100", "lendiz-core" ),
				'placeholder' => __( '100', 'lendiz-core' ),
				"default" 		=> "100"
			]
		);		
		$this->add_control(
			'rd_speed',
			[
				'label' => __( 'Rain Drop Speed', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description"	=> esc_html__( "Here you can define rain drop speed. Example 0.01", "lendiz-core" ),
				'placeholder' => "0.01",
				"default" 		=> "0.01"
			]
		);
		$this->add_control(
			'rd_frequency',
			[
				'label' => __( 'Rain Drop Frequency', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description"	=> esc_html__( "Here you can define rain drop frequency. Example 1", "lendiz-core" ),
				'placeholder' => "1",
				"default" 		=> "1"
			]
		);
		$this->add_control(
			'rd_density',
			[
				'label' => __( 'Rain Drop Density', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description"	=> esc_html__( "Here you can define rain drop density. Example 0", "lendiz-core" ),
				'placeholder' => "0",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			'rd_pos',
			[
				'label' => __( 'Rain Drop Canvas Position', 'lendiz-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' 		=> __( 'Top', 'lendiz-core' ),
					'bottom' 	=> __( 'Bottom', 'lendiz-core' )
				]
			]
		);		
				
		$this->end_controls_section();

	}

	/**
	 * Render Rain Drops widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract($settings);
				
		$rd_color = isset( $rd_color ) && !empty( $rd_speed ) ? $rd_color : '#333333';
		$rd_height = isset( $rd_height ) && !empty( $rd_height ) ? $rd_height : '100';
		$rd_speed = isset( $rd_speed ) && !empty( $rd_speed ) ? $rd_speed : '0.1';
		$rd_freq = isset( $rd_freq ) && !empty( $rd_freq ) ? $rd_freq : '3';
		$rd_density = isset( $rd_density ) && !empty( $rd_density ) ? $rd_density : '0.02';
		$rd_pos = isset( $rd_pos ) && !empty( $rd_pos ) ? $rd_pos : 'top';

		echo '<div class="rain-drops-elementor-widget">';

			echo '<div class="lendiz-rain-drops" id="example-'. esc_attr( $this->uniqid_gen() ) .'" data-color="'. esc_attr( $rd_color ) .'" data-height="'. esc_attr( $rd_height ) .'" data-speed="'. esc_attr( $rd_speed ) .'" data-freq="'. esc_attr( $rd_freq ) .'" data-density="'. esc_attr( $rd_density ) .'" data-position="'. esc_attr( $rd_pos ) .'"></div>';

		echo '</div>';

	}
	
	public static function uniqid_gen(){
		static $sc_uniq_id = 1;
		return $sc_uniq_id++;
	}

}