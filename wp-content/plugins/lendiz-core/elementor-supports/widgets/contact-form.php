<?php
/**
 * Lendiz Elementor Addon Contact Form 
 *
 * @since 1.0.0
 */
class Elementor_Contact_Form_Widget extends \Elementor\Widget_Base {
	
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
		return "contactform";
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
		return __( "Contact Form", "lendiz-core" );
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
		return "ti-email";
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
	 * Register Animated Text widget controls. 
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
	
		$contact_forms = array();
		if( class_exists( "WPCF7" ) ){
			$args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
			if( $data = get_posts( $args ) ){
				foreach( $data as $key ){
					$contact_forms[$key->ID] = $key->post_title;
				}
			}
		}

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
				"default" 		=> ""
			]
		);
		$this->add_control(
			"title_heading",
			[
				"label"			=> esc_html__( "Title Tag", "lendiz-core" ),
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
			"contact_form",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Contact Form", "lendiz-core" ),
				"description"	=> esc_html__( "Choose one contact form from given contact forms.", "lendiz-core" ),
				"default"		=> "",
				"options"		=> $contact_forms
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
			"cf_layout",
			[
				"label"			=> esc_html__( "Contact Form Layout", "lendiz-core" ),
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
			"title_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Font Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the font color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .contact-form-wrapper .contact-form-title' => 'color: {{VALUE}};'
				],
			]
		);
		$this->add_control(
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for circle progress text align.", "lendiz-core" ),
				"default"		=> "default",
				"options"		=> [
					"default"		=> esc_html__( "Default", "lendiz-core" ),
					"left"			=> esc_html__( "Left", "lendiz-core" ),
					"center"		=> esc_html__( "Center", "lendiz-core" ),
					"right"			=> esc_html__( "Right", "lendiz-core" )
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
		$title = isset( $title ) && $title != '' ? $title : '';
		$heading = isset( $title_heading ) && $title_heading != '' ? $title_heading : 'h3';
		$class = isset( $extra_class ) && $extra_class != '' ? $extra_class : '';		
		$class .= isset( $cf_layout ) && $cf_layout != '' ? ' cf-'. $cf_layout : '';	
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';	
		
		if( class_exists( "WPCF7" ) ){
			echo '<div class="contact-form-wrapper'. esc_attr( $class ) .'">';
				echo $title ? '<'. esc_attr( $heading ) .' class="contact-form-title">'. esc_html( $title ) .'</'. esc_attr( $heading ) .'>' : '';
				if( isset( $contact_form ) && $contact_form != '' ){
					echo '<div class="contact-form">';
						echo do_shortcode( '[contact-form-7 id="'. esc_attr( $contact_form ) .'"]' );
					echo '</div><!-- .contact-form -->';
				}
			echo '</div><!-- .contact-form-wrapper -->';
		}

	}
	
}