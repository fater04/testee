<?php
/**
 * Lendiz Elementor Addon Icon
 *
 * @since 1.0.0
 */
class Elementor_Icon_Widget extends \Elementor\Widget_Base {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve Icon widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return "lendizicon";
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Icon widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( "Icon", "lendiz-core" );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Icon widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return "ti-crown";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Icon widget belongs to.
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
	 * Register Icon widget controls.
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
				"description"	=> esc_html__( "Default Icon options.", "lendiz-core" ),
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
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for blog text align.", "lendiz-core" ),
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
					'{{WRAPPER}} .icon-wrapper .icon-parent > span' => 'font-size: {{VALUE}}px;'
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
					'{{WRAPPER}} .icon-wrapper .icon-parent > span' => 'width: {{VALUE}}px; height: {{VALUE}}px; line-height: {{VALUE}}px;'
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
				"description"	=> esc_html__( "This is option for icon set vertically middle from the outer area.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "1"
			]
		);
		$this->add_control(
			"icon_self_center",
			[
				"label" 		=> esc_html__( "Icon Self Center", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for list style icon set vertically middle.", "lendiz-core" ),
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
				"label"			=> esc_html__( "Icon Color", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for icon color.", "lendiz-core" ),
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
				"label"			=> esc_html__( "Icon Custom Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the icon custom color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"icon_variation" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .icon-wrapper .icon-parent > span' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .icon-wrapper:hover .icon-parent > span' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .icon-wrapper .icon-parent > span' => 'background-color: {{VALUE}};'
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
					"theme-color-hbg"	=> esc_html__( "Theme Color", "lendiz-core" ),
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
					'{{WRAPPER}} .icon-wrapper:hover .icon-parent > span' => 'background-color: {{VALUE}};'
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
					'{{WRAPPER}} .icon-wrapper .icon-parent > span' => 'border-width: {{VALUE}}px; border-style: solid;'
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
					'{{WRAPPER}} .icon-wrapper .icon-parent > span' => 'border-color: {{VALUE}};'
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
					'{{WRAPPER}} .icon-wrapper:hover .icon-parent > span' => 'border-color: {{VALUE}};'
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
	protected function render() {

		$settings = $this->get_settings_for_display();
		extract( $settings );
		
		//Define Variables
		
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';		
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';	
		
		//Icon Section
		$icon_class = '';
		$icon_opt = isset( $icon_opt ) && $icon_opt != '' ? $icon_opt : '';
		$icon = isset( $$icon_opt ) && $$icon_opt != '' ? $$icon_opt : '';
		
		$icon_class .= isset( $icon_variation ) && $icon_variation != 'c' ? ' icon-'.$icon_variation : ' icon-dark';
		$icon_class .= isset( $icon_style ) && $icon_style != '' ? ' '.$icon_style : ' squared';
		$icon_class .= isset( $icon_midd ) && $icon_midd == '1' ? ' icon-middle' : '';
		$icon_class .= isset( $icon_bg ) && $icon_bg != 'c' ? ' '.$icon_bg : '';
		$icon_class .= isset( $icon_hbg ) && $icon_hbg != 'c' ? ' '.$icon_hbg : '';
		
		echo '<div class="icon-wrapper'. esc_attr( $class ) .'">';
				
				echo '<div class="icon-inner">';
					echo '<div class="icon-parent"><span class="text-center'. esc_attr( $icon_class ) .' '. esc_attr( $icon ) .'"></span></div>';
				echo '</div><!-- .icon-inner -->';
	
		echo '</div><!-- .icon-wrapper -->';

	}
		
}