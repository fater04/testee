<?php
/**
 * Lendiz Elementor Addon Popup Widget
 *
 * @since 1.0.0
 */
class Elementor_Popup_Anything_Widget extends \Elementor\Widget_Base {
	
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
		return "lendizpopup-anything";
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
		return __( "Popup Frame", "lendiz-core" );
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
		return "ti-layers-alt";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Popup widget belongs to.
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
			wp_enqueue_style( 'magnific-popup' );
		}
		return [ 'magnific-popup', 'custom-front'  ];
	}
	
	public function get_style_depends() {
		return [ 'magnific-popup'  ];
	}
	/**
	 * Register Popup widget controls.
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
				"description"	=> esc_html__( "Default counter options.", "lendiz-core" ),
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
			"popup_type",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Popup Anything", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for popup anything.", "lendiz-core" ),
				"default"		=> "icon",
				"options"		=> [
					"icon"	=> esc_html__( "Icon", "lendiz-core" ),
					"btn"	=> esc_html__( "Button", "lendiz-core" ),
					"img"	=> esc_html__( "Image", "lendiz-core" ),
					"txt"	=> esc_html__( "Text", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"popup_url",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Popup URL", "lendiz-core" ),
				"description"	=> esc_html__( "Enter popup url. Example https://www.youtube.com/watch?v=tvDH4JM_gME", "lendiz-core" ),
				"default"		=> ""
			]
		);
		$this->add_control(
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for popup trigger text align.", "lendiz-core" ),
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
				"default"		=> "icon_ti",
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
				"label"			=> esc_html__( "Icon Size", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the icon custom size.", "lendiz-core" ),
				"default" 		=> "30",
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .popup-trigger-icon' => 'font-size: {{VALUE}}px;',
				],
			]
		);
		$this->add_control(
			"icon_variation",
			[
				"label"			=> esc_html__( "Icon Style", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for counter icon style.", "lendiz-core" ),
				"default"		=> "theme-color",
				"options"		=> [
					"icon-dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"icon-light"	=> esc_html__( "Light", "lendiz-core" ),
					"theme-color"	=> esc_html__( "Theme Color", "lendiz-core" ),
					"custom"		=> esc_html__( "Custom Color", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"icon_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Icon Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the counter icon color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .popup-trigger-icon' => 'color: {{VALUE}};',
				],
				"condition" 	=> [
					"icon_variation"	=> "custom"
				]
			]
		);
		$this->end_controls_section();
		
		// Image Section
		$this->start_controls_section(
			"image_section",
			[
				"label"			=> esc_html__( "Image", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Image options available here.", "lendiz-core" ),
			]
		);	
		$this->add_control(
			"popup_img",
			[
				"type" => \Elementor\Controls_Manager::MEDIA,
				"label" => __( "Popup Trigger Image", "lendiz-core" ),
				"description"	=> esc_html__( "Choose popup trigger image.", "lendiz-core" ),
				"dynamic" => [
					"active" => true,
				]
			]
		);
		$this->add_control(
			"img_style",
			[
				"label"			=> esc_html__( "Image Style", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Choose image style.", "lendiz-core" ),
				"default"		=> "rounded-circle",
				"options"		=> [
					"squared"			=> esc_html__( "Squared", "lendiz-core" ),
					"rounded"			=> esc_html__( "Rounded", "lendiz-core" ),
					"rounded-circle"	=> esc_html__( "Circled", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();	
		
		// Button
		$this->start_controls_section(
			"button_section",
			[
				"label"			=> esc_html__( "Button", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Button options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"btn_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Button Text", "lendiz-core" ),
				"description"	=> esc_html__( "Enter section button text here. If no need button, then leave this box blank.", "lendiz-core" ),
				"default"		=> ""
			]
		);
		$this->add_control(
			"btn_type",
			[
				"label"			=> esc_html__( "Button Type", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "Choose button type.", "lendiz-core" ),
				"default"		=> "default",
				"options"		=> [
					"default"		=> esc_html__( "Default", "lendiz-core" ),
					"link"			=> esc_html__( "Link", "lendiz-core" ),
					"classic"		=> esc_html__( "Classic", "lendiz-core" ),
					"bordered"		=> esc_html__( "Bordered", "lendiz-core" ),
					"inverse"		=> esc_html__( "Inverse", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"btn_variation",
			[
				"label"			=> esc_html__( "Button Color", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for change button color predefined or custom.", "lendiz-core" ),
				"default"		=> "btn-light",
				"options"		=> [
					"btn-dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"btn-light"		=> esc_html__( "Light", "lendiz-core" ),
					"theme-color"	=> esc_html__( "Theme", "lendiz-core" ),
					"c"				=> esc_html__( "Custom", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"btn_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Button Custom Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the button custom color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"btn_variation" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .btn' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"btn_hvariation",
			[
				"label"			=> esc_html__( "Button Hover Color", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for change button hover color predefined or custom.", "lendiz-core" ),
				"default"		=> "btn-light",
				"options"		=> [
					"btn-dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"btn-light"		=> esc_html__( "Light", "lendiz-core" ),
					"theme-color"	=> esc_html__( "Theme", "lendiz-core" ),
					"c"				=> esc_html__( "Custom", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"btn_hcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Button Custom Hover Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the button custom hover color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"btn_hvariation" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .btn:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"btn_bg_variation",
			[
				"label"			=> esc_html__( "Button Bg Color", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for change button background color predefined or custom.", "lendiz-core" ),
				"default"		=> "btn-bg-dark",
				"options"		=> [
					"btn-bg-dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"btn-bg-light"		=> esc_html__( "Light", "lendiz-core" ),
					"theme-bg-color"	=> esc_html__( "Theme", "lendiz-core" ),
					"c"				=> esc_html__( "Custom", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"btn_bgcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Button Custom Background Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the button custom background color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"btn_bg_variation" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .btn' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"btn_hbg_variation",
			[
				"label"			=> esc_html__( "Button Bg Hover Color", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for change button background hover color predefined or custom.", "lendiz-core" ),
				"default"		=> "theme-hbg-color",
				"options"		=> [
					"btn-hbg-dark"		=> esc_html__( "Dark", "lendiz-core" ),
					"btn-hbg-light"		=> esc_html__( "Light", "lendiz-core" ),
					"theme-hbg-color"	=> esc_html__( "Theme", "lendiz-core" ),
					"c"				=> esc_html__( "Custom", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"btn_hbgcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Button Custom Background Hover Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the button custom background hover color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"btn_hbg_variation" 	=> "c"
				],
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .btn:hover' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"btn_border_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Button Border Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the button custom border color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"btn_type" 	=> "bordered"
				],
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .btn' => 'border-color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			"btn_hborder_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Button Hover Border Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the button hover border color.", "lendiz-core" ),
				"default" 		=> "",
				"condition" 	=> [
					"btn_type" 	=> "bordered"
				],
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .btn:hover' => 'border-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_section();
		
		//Text Section
		$this->start_controls_section(
			"text_section",
			[
				"label"			=> esc_html__( "Text", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Text options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"popup_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Popup Text", "lendiz-core" ),
				"description"	=> esc_html__( "Choose popup custom text here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"text_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Popup Text Color", "lendiz-core" ),
				"description"	=> esc_html__( "Choose popup custom text color here.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .popup-anything-wrapper .popup-trigger-txt' => 'color: {{VALUE}};',
				]
			]
		);
		$this->end_controls_section();

	}
	
	/**
	 * Render Popup widget output on the frontend.
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

		$class = isset( $extra_class ) && $extra_class != '' ? ' '. $extra_class : '';
		$class .= isset( $text_align ) && $text_align != 'default' ? ' text-'. $text_align : '';
		?>
		
		<div class="elementor-widget-container popup-anything-wrapper<?php echo esc_attr( $class ); ?>">
		
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

	/**
	 * Render Popup widget output on the frontend.
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
		
		$popup_type = isset( $popup_type ) && !empty( $popup_type ) ? $popup_type : 'btn';
		$popup_url = isset( $popup_url ) && !empty( $popup_url ) ? $popup_url : '';
		
		switch( $popup_type ){
		
			case "img":
				$popup_img = isset( $popup_img ) && !empty( $popup_img ) ? $popup_img : '';
				$img_url = is_array( $popup_img ) && isset( $popup_img['url'] ) ? $popup_img['url'] : '';
				$img_class = isset( $img_style ) && !empty( $img_style ) ? ' '.$img_style : '';
				echo '<a class="popup-lendiz-post popup-trigger-img'. esc_attr( $img_class ) .'" href="'. esc_html( $popup_url ) .'"><img class="img-fulid" src="'. esc_url( $img_url ) .'" alt="'. esc_html__( 'Popup', 'lendiz-core' ) .'" /></a>';
			break;
		
			case "btn":
				$btn_class =  '';
				$btn_class .= isset( $btn_variation ) && $btn_variation != 'c' ? ' '. $btn_variation : '';
				$btn_class .= isset( $btn_hvariation ) && $btn_hvariation != 'c' ? ' '. $btn_hvariation : '';
				$btn_class .= isset( $btn_bg_variation ) && $btn_bg_variation != 'c' ? ' '. $btn_bg_variation : '';
				$btn_class .= isset( $btn_hbg_variation ) && $btn_hbg_variation != 'c' ? ' '. $btn_hbg_variation : '';
				$btn_class .= isset( $btn_type ) && !empty( $btn_type ) ? ' btn-'.$btn_type : '  btn-default';
				$btn_text = isset( $btn_text ) && !empty( $btn_text ) ? $btn_text : esc_html__( 'Popup', 'lendiz-core' );
				echo '<a class="popup-lendiz-post btn'. esc_attr( $btn_class  ) .'" href="'. esc_html( $popup_url ) .'">'. esc_html( $btn_text ) .'</a>';
			break;
			
			case "txt":
				$popup_text = isset( $popup_text ) && $popup_text != '' ? $popup_text : esc_html__( 'Popup', 'lendiz-core' );
				echo '<a class="popup-lendiz-post popup-trigger-txt" href="'. esc_html( $popup_url ) .'">'. esc_html( $popup_text ) .'</a>';
			break;
			
			case "icon":
				$icon_opt = isset( $icon_opt ) && $icon_opt != '' ? $icon_opt : '';
				$icon = isset( $$icon_opt ) && $$icon_opt != '' ? $$icon_opt : '';
				$icon_class = isset( $icon_variation ) && $icon_variation != 'c' ? ' icon-'.$icon_variation : ' icon-dark';
				echo '<a class="popup-lendiz-post popup-trigger-icon'. esc_attr( $icon_class ) .'" href="'. esc_html( $popup_url ) .'"><span class="'. esc_attr( $icon ) .'"></span></a>';
			break;
		}
		
		

	}
	
}