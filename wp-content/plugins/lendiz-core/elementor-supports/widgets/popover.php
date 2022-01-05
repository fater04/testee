<?php
/**
 * Lendiz Elementor Addon Popover Widget
 *
 * @since 1.0.0
 */
class Elementor_Popover_Widget extends \Elementor\Widget_Base {
	
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
		return "lendizpopover";
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
		return __( "Popover", "lendiz-core" );
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
		return "ti-receipt";
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Popover widget belongs to.
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
	 * Register Popover widget controls.
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
			"popover_type",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Popover Trigger Type", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for popover trigger type.", "lendiz-core" ),
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
			"popover_pos",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Popover Position", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for popover position.", "lendiz-core" ),
				"default"		=> "top",
				"options"		=> [
					"top"		=> esc_html__( "Top", "lendiz-core" ),
					"bottom"	=> esc_html__( "Bottom", "lendiz-core" ),
					"left"		=> esc_html__( "Left", "lendiz-core" ),
					"right"		=> esc_html__( "Right", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"popover_width",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Popover Width", "lendiz-core" ),
				"description"	=> esc_html__( "Put popover content width here. Example 252", "lendiz-core" ),
				"default"		=> "252",
				'selectors' => [
					'{{WRAPPER}} .popover-wrapper .popover-content' => 'width: {{VALUE}}px;',
				],
			]
		);
		$this->add_control(
			"event_name",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Select Event", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for popover shown by click or hover.", "lendiz-core" ),
				"default"		=> "hover",
				"options"		=> [
					"hover"		=> esc_html__( "Hover", "lendiz-core" ),
					"click"		=> esc_html__( "Click", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"text_align",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Text Align", "lendiz-core" ),
				"description"	=> esc_html__( "This is option for popover trigger text align.", "lendiz-core" ),
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
					'{{WRAPPER}} .popover-wrapper .popover-trigger-icon' => 'font-size: {{VALUE}}px;',
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
					'{{WRAPPER}} .popover-wrapper .popover-trigger-icon' => 'color: {{VALUE}};',
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
			"popover_img",
			[
				"type" => \Elementor\Controls_Manager::MEDIA,
				"label" => __( "Popover Trigger Image", "lendiz-core" ),
				"description"	=> esc_html__( "Choose popover trigger image.", "lendiz-core" ),
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
					'{{WRAPPER}} .popover-wrapper .btn' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .popover-wrapper .btn:hover' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .popover-wrapper .btn' => 'background-color: {{VALUE}};'
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
					'{{WRAPPER}} .popover-wrapper .btn:hover' => 'background-color: {{VALUE}};'
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
					'{{WRAPPER}} .popover-wrapper .btn' => 'border-color: {{VALUE}};'
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
					'{{WRAPPER}} .popover-wrapper .btn:hover' => 'border-color: {{VALUE}};'
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
			"popover_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label" 		=> esc_html__( "Popover Text", "lendiz-core" ),
				"description"	=> esc_html__( "Choose popover custom text here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"text_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Popover Text Color", "lendiz-core" ),
				"description"	=> esc_html__( "Choose popover custom text color here.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .popover-wrapper .popover-trigger-txt' => 'color: {{VALUE}};',
				]
			]
		);
		$this->end_controls_section();
		
		//Content Section
		$this->start_controls_section(
			"content_section",
			[
				"label"			=> esc_html__( "Content", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Content options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"popover_content",
			[
				"type"			=> \Elementor\Controls_Manager::WYSIWYG,
				"label" 		=> esc_html__( "Popover Content", "lendiz-core" ),
				"description"	=> esc_html__( "Choose popover custom content here.", "lendiz-core" ),
				"default" 		=> "Sample Popover Content",
			]
		);
		$this->end_controls_section();

	}
	
	/**
	 * Render Popover widget output on the frontend.
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
		
		<div class="elementor-widget-container popover-outer-wrapper<?php echo esc_attr( $class ); ?>">
		
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
	 * Render Popover widget output on the frontend.
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
		$popover_type = isset( $popover_type ) && !empty( $popover_type ) ? $popover_type : 'btn';
		$popover_content = isset( $popover_content ) && !empty( $popover_content ) ? $popover_content : '';
		$popover_pos = isset( $popover_pos ) && !empty( $popover_pos ) ? $popover_pos : 'top';
		$event_name = isset( $event_name ) && !empty( $event_name ) ? $event_name : 'hover';
		$popover_trigger = '';
		
		switch( $popover_type ){
		
			case "img":
				$popover_img = isset( $popover_img ) && !empty( $popover_img ) ? $popover_img : '';
				$img_url = is_array( $popover_img ) && isset( $popover_img['url'] ) ? $popover_img['url'] : '';
				$img_class = isset( $img_style ) && !empty( $img_style ) ? ' '.$img_style : '';
				$popover_trigger = '<a class="popover-trigger popover-trigger-img'. esc_attr( $img_class ) .'" href="#" data-event="'. esc_attr( $event_name ) .'"><img class="img-fulid" src="'. esc_url( $img_url ) .'" alt="'. esc_html__( 'Popover', 'lendiz-core' ) .'" /></a>';
			break;
		
			case "btn":
				$btn_class =  '';
				$btn_class .= isset( $btn_variation ) && $btn_variation != 'c' ? ' '. $btn_variation : '';
				$btn_class .= isset( $btn_hvariation ) && $btn_hvariation != 'c' ? ' '. $btn_hvariation : '';
				$btn_class .= isset( $btn_bg_variation ) && $btn_bg_variation != 'c' ? ' '. $btn_bg_variation : '';
				$btn_class .= isset( $btn_hbg_variation ) && $btn_hbg_variation != 'c' ? ' '. $btn_hbg_variation : '';
				$btn_class .= isset( $btn_type ) && !empty( $btn_type ) ? ' btn-'.$btn_type : '  btn-default';
				$btn_text = isset( $btn_text ) && !empty( $btn_text ) ? $btn_text : esc_html__( 'Popover', 'lendiz-core' );
				$popover_trigger = '<a class="popover-trigger popover-trigger-btn btn'. esc_attr( $btn_class  ) .'" href="#" data-event="'. esc_attr( $event_name ) .'">'. esc_html( $btn_text ) .'</a>';
			break;
			
			case "txt":
				$popover_text = isset( $popover_text ) && $popover_text != '' ? $popover_text : esc_html__( 'Popover', 'lendiz-core' );
				$popover_trigger = '<a class="popover-trigger popover-trigger-txt" href="#" data-event="'. esc_attr( $event_name ) .'">'. esc_html( $popover_text ) .'</a>';
			break;
			
			case "icon":
				$icon_opt = isset( $icon_opt ) && $icon_opt != '' ? $icon_opt : '';
				$icon = isset( $$icon_opt ) && $$icon_opt != '' ? $$icon_opt : '';
				$icon_class = isset( $icon_variation ) && $icon_variation != 'c' ? ' icon-'.$icon_variation : ' icon-dark';
				$popover_trigger = '<a class="popover-trigger popover-trigger-icon'. esc_attr( $icon_class ) .'" href="#" data-event="'. esc_attr( $event_name ) .'"><span class="'. esc_attr( $icon ) .'"></span></a>';
			break;
		}
		?>
		<div class="popover-wrapper popover-<?php echo esc_attr( $popover_pos ); ?>">
			<?php echo wp_kses_post( $popover_trigger ); ?>
			<div class="popover-content">
				<div class="arrow"></div>
				<div class="popover-message"><?php echo wp_kses_post( $popover_content ); ?></div>
			</div>
		</div>
		<?php
	}
	
}