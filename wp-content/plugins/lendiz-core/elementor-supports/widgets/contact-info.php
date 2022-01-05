<?php
/**
 * Lendiz Elementor Addon Contact Form 
 *
 * @since 1.0.0
 */
class Elementor_Contact_Info_Widget extends \Elementor\Widget_Base {
	
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
		return "contactinfo";
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
		return __( "Contact Info", "lendiz-core" );
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
		return "ti-id-badge";
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
			"title_tag",
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
					'{{WRAPPER}} .contact-info-wrapper' => 'color: {{VALUE}};',
					'{{WRAPPER}} .contact-info-wrapper .contact-info-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .contact-info-wrapper label' => 'color: {{VALUE}};'
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
		$this->add_control(
			"contact_layout",
			[
				"label"			=> esc_html__( "Contact Info Layout", "lendiz-core" ),
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
			"contact_items",
			[
				"label"				=> "Contact Info Items",
				"description"		=> esc_html__( "This is settings for contact info custom layout. here you can set your own layout. Drag and drop needed contact items to Enabled part.", "lendiz-core" ),
				"type"				=> "dragdrop",
				"ddvalues" 			=> [ 
					esc_html__( "Enabled", "lendiz-core" ) => [ 
						"info"		=> esc_html__( "Info", "lendiz-core" ),
						"mail"		=> esc_html__( "Mail ID", "lendiz-core" ),
						"phone"		=> esc_html__( "Phone", "lendiz-core" ),
						"social"	=> esc_html__( "Social", "lendiz-core" )			
					],
					esc_html__( "disabled", "lendiz-core" ) => [
						"address"	=> esc_html__( "Address", "lendiz-core" ),
						"form"		=> esc_html__( "Form", "lendiz-core" ),
						"timing"	=> esc_html__( "Timing", "lendiz-core" )
					]
				]
			]
		);
		$this->end_controls_section();
		
		//Info Section
		$this->start_controls_section(
			"info_section",
			[
				"label"			=> esc_html__( "Info", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Contact info tab.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"contact_info",
			[
				"type"			=> \Elementor\Controls_Manager::TEXTAREA,
				"label"			=> esc_html__( "Contact Information or Description", "lendiz-core" ),
				"description"	=> esc_html__( "Enter contact informaion or description here.", "lendiz-core" ),
				"default" 		=> esc_html__( "About your company.", "lendiz-core" )
			]
		);
		$this->add_control(
			"contact_address",
			[
				"type"			=> \Elementor\Controls_Manager::TEXTAREA,
				"label"			=> esc_html__( "Contact Address", "lendiz-core" ),
				"description"	=> esc_html__( "Enter contact address here.", "lendiz-core" ),
				"default" 		=> esc_html__( "#123 Your address", "lendiz-core" )
			]
		);
		$this->add_control(
			"contact_email",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Email Id", "lendiz-core" ),
				"description"	=> esc_html__( "Enter email id. If you enter multiple email id means, seperate with comma(,).", "lendiz-core" ),
				"default" 		=> esc_html__( "username@email.com", "lendiz-core" )
			]
		);
		$this->add_control(
			"contact_number",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Contact Number", "lendiz-core" ),
				"description"	=> esc_html__( "Enter contact number. If you enter multiple contact number means, seperate with comma(,).", "lendiz-core" ),
				"default" 		=> "+12 1234567890"
			]
		);
		$this->add_control(
			"contact_timing",
			[
				"type"			=> \Elementor\Controls_Manager::TEXTAREA,
				"label"			=> esc_html__( "Contact Timing", "lendiz-core" ),
				"description"	=> esc_html__( "Enter contact timing here.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_icons_type",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Iocns Type", "lendiz-core" ),
				"default"		=> "rounded",
				"options"		=> [
					"squared"		=> esc_html__( "Squared", "lendiz-core" ),
					"rounded"			=> esc_html__( "Rounded", "lendiz-core" ),
					"circled"		=> esc_html__( "Circled", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_fore",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Fore", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons fore color.", "lendiz-core" ),
				"default"		=> "own",
				"options"		=> [
					"black"		=> esc_html__( "Black", "lendiz-core" ),
					"white"			=> esc_html__( "White", "lendiz-core" ),
					"own"		=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_hfore",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Fore Hover", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons fore hover color.", "lendiz-core" ),
				"default"		=> "h-own",
				"options"		=> [
					"h-black"		=> esc_html__( "Black", "lendiz-core" ),
					"h-white"			=> esc_html__( "White", "lendiz-core" ),
					"h-own"		=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_bg",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Background", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons background color.", "lendiz-core" ),
				"default"		=> "bg-light",
				"options"		=> [
					"bg-transparent"	=> esc_html__( "Transparent", "lendiz-core" ),
					"bg-white"			=> esc_html__( "White", "lendiz-core" ),
					"bg-black"			=> esc_html__( "Black", "lendiz-core" ),
					"bg-light"			=> esc_html__( "Light", "lendiz-core" ),
					"bg-dark"			=> esc_html__( "Dark", "lendiz-core" ),
					"bg-own"			=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"social_icons_hbg",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Social Icons Background Hover", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for day social icons background hover color.", "lendiz-core" ),
				"default"		=> "hbg-transparent",
				"options"		=> [
					"hbg-transparent"	=> esc_html__( "Transparent", "lendiz-core" ),
					"hbg-white"			=> esc_html__( "White", "lendiz-core" ),
					"hbg-black"			=> esc_html__( "Black", "lendiz-core" ),
					"hbg-light"			=> esc_html__( "Light", "lendiz-core" ),
					"hbg-dark"			=> esc_html__( "Dark", "lendiz-core" ),
					"hbg-own"			=> esc_html__( "Own Color", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Form Section
		$this->start_controls_section(
			"form_section",
			[
				"label"			=> esc_html__( "Form", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Contact form tab.", "lendiz-core" ),
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
		
		//Info Section
		$this->start_controls_section(
			"links_section",
			[
				"label"			=> esc_html__( "Social Links", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Contact info social links tab.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"social_fb",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Facebook", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for facebook social icon.", "lendiz-core" ),
				"default" 		=> "#"
			]
		);
		$this->add_control(
			"social_twitter",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Twitter", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for twitter social icon.", "lendiz-core" ),
				"default" 		=> "#"
			]
		);
		$this->add_control(
			"social_instagram",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Instagram", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for instagram social icon.", "lendiz-core" ),
				"default" 		=> "#"
			]
		);
		$this->add_control(
			"social_pinterest",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Pinterest", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for pinterest social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_youtube",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Youtube", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for youtube social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_vimeo",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Vimeo", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for vimeo social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_soundcloud",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Soundcloud", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for soundcloud social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_yahoo",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Yahoo", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for yahoo social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_tumblr",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Tumblr", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for tumblr social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_paypal",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Paypal", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for paypal social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_mailto",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Mailto", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for mailto social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_flickr",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Flickr", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for flickr social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_dribbble",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Dribbble", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for dribbble social icon.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"social_rss",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "RSS", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for rss social icon.", "lendiz-core" ),
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
		
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';		
		$class .= isset( $contact_style ) ? ' contact-info-' . $contact_style : '';	
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-' . $text_align : '';
		$class .= isset( $contact_layout ) && $contact_layout != '' ? ' contact-info-style-' . $contact_layout : 'contact-info-style-default';
		$title = isset( $title ) && $title != '' ? $title : '';
		$title_tag = isset( $title_tag ) && $title_tag != '' ? $title_tag : 'h3';
		
		$default_items = array( 
			"info"		=> esc_html__( "Info", "lendiz-core" ),
			"mail"		=> esc_html__( "Mail ID", "lendiz-core" ),
			"phone"		=> esc_html__( "Phone", "lendiz-core" ),
			"social"	=> esc_html__( "Social", "lendiz-core" )			
		);
		$elemetns = isset( $contact_items ) && !empty( $contact_items ) ? json_decode( $contact_items, true ) : array( 'Enabled' => $default_items );
		
		echo '<div class="contact-info-wrapper'. esc_attr( $class ) .'">';
		
			echo $title ? '<'. esc_attr( $title_tag ) .' class="contact-info-title">'. esc_html( $title ) .'</'. esc_attr( $title_tag ) .'>' : '';
			
			if( isset( $elemetns['Enabled'] ) ) :
				foreach( $elemetns['Enabled'] as $element => $value ){
					switch( $element ){
						case "info":
							if( isset( $contact_info ) && $contact_info != '' ){
								echo '<div class="contact-info">';
									echo do_shortcode( $contact_info );
								echo '</div><!-- .contact-info -->';
							}
						break;
						
						case "address":
							if( isset( $contact_address ) && $contact_address != '' ){
								echo '<div class="contact-address">';
									echo '<span class="ti-direction-alt theme-color mr-2"></span><div class="contact-info-inner">'. do_shortcode( $contact_address ) .'</div>';
								echo '</div><!-- .contact-info -->';
							}
						break;
						
						case "mail":
							if( isset( $contact_email ) && $contact_email != '' ){
								echo '<div class="contact-mail">';
								$mail_out = '';
								foreach( explode( ",", $contact_email ) as $email ){
									$mail_out .= '<a href="mailto:'. esc_attr( trim( $email ) ) .'"><span class="ti-email theme-color mr-2"></span> '. esc_html( trim( $email ) ) .'</a>, ';
								}
								echo rtrim( $mail_out, ', ' );
								echo '</div><!-- .contact-mail -->';
							}
						break;
						
						case "phone":
							if( isset( $contact_number ) && $contact_number != '' ){
								echo '<div class="contact-phone">';
								$phone_out = '';
								foreach( explode( ",", $contact_number ) as $phone ){
									$phone_out .= '<span class="ti-mobile theme-color mr-2"></span> <span>'. esc_html( trim( $phone ) ) .'</span>, ';
								}
								echo rtrim( $phone_out, ', ' );
								echo '</div><!-- .contact-phone -->';
							}
						break;
						
						case "timing":
							if( isset( $contact_timing ) && $contact_timing != '' ){
								echo '<div class="contact-timing">';
									echo '<span class="ti-alarm-clock theme-color mr-2"></span><span class="contact-info-inner">'. do_shortcode( $contact_timing ) .'</span>';
								echo '</div><!-- .contact-timing -->';
							}
						break;						
						
						case "social":
							echo '<div class="social-icons">';
								$social_media = array( 
									'social-fb' => 'ti-facebook', 
									'social-twitter' => 'ti-twitter', 
									'social-instagram' => 'ti-instagram', 
									'social-linkedin' => 'ti-linkedin', 
									'social-pinterest' => 'ti-pinterest',  
									'social-youtube' => 'ti-youtube', 
									'social-vimeo' => 'ti-vimeo', 
									'social-soundcloud' => 'ti-soundcloud', 
									'social-yahoo' => 'ti-yahoo', 
									'social-tumblr' => 'ti-tumblr-alt',  
									'social-paypal' => 'fa fa-paypal', 
									'social-mailto' => 'ti-email', 
									'social-flickr' => 'ti-flickr-alt', 
									'social-dribbble' => 'ti-dribbble', 
									'social-rss' => 'ti-rss' 
								);
					
								// Actived social icons from theme option output generate via loop
								$social_icons = '';
								foreach( $social_media as $key => $icon_class ){
									
									$social_field = str_replace( "-", "_", $key );
									
									if( isset( $$social_field ) && $$social_field != '' ){
										$social_url = $$social_field;
										$social_icons .= '<li>
														<a href="'. esc_url( $social_url ) .'" class="nav-link '. esc_attr( $key ) .'">
															<i class="'. esc_attr( $icon_class ) .'"></i>
														</a>
													</li>';
									}
								}
						
								$social_class = isset( $social_icons_type ) ? ' social-' . $social_icons_type : '';
								$social_class .= isset( $social_icons_fore ) ? ' social-' . $social_icons_fore : '';
								$social_class .= isset( $social_icons_hfore ) ? ' social-' . $social_icons_hfore : '';
								$social_class .= isset( $social_icons_bg ) ? ' social-' . $social_icons_bg : '';
								$social_class .= isset( $social_icons_hbg ) ? ' social-' . $social_icons_hbg : '';
								
								echo '<ul class="nav social-icons '. esc_attr( $social_class ) .'">';
									echo $social_icons;
								echo '</ul>';
					
							echo '</div><!-- .social-icons-wrapper -->';
						break;
						
						case "form":
							if( isset( $contact_form ) && $contact_form != '' ){
								echo '<div class="contact-form">';
									echo do_shortcode( '[contact-form-7 id="'. esc_attr( $contact_form ) .'"]' );
								echo '</div><!-- .contact-form -->';
							}
						break;
					}
				}
			endif;
		echo '</div><!-- .contact-info-wrapper -->';

	}
	
}