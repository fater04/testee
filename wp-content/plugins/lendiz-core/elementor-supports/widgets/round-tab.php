<?php
/**
 * Lendiz Elementor Addon Round Tab
 *
 * @since 1.0.0
 */
class Elementor_Round_Tab_Widget extends \Elementor\Widget_Base {
	
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
		return "roundtab";
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
		return __( "Round Tab", "lendiz-core" );
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
		return "ti-layout-slider-alt";
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
		return [ 'custom-front'  ];
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
					'{{WRAPPER}} .round-tab-wrapper' => 'color: {{VALUE}};'
				],
			]
		);
		$t = $this->add_control(
			"tab_type",
			[
				"label"			=> esc_html__( "Tab Head Type", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"description"	=> esc_html__( "This is option for tab head type.", "lendiz-core" ),
				"default"		=> "icon",
				"options"		=> [
					"icon"		=> esc_html__( "Icon", "lendiz-core" ),
					"img"		=> esc_html__( "Image", "lendiz-core" ),
					"txt"		=> esc_html__( "Text", "lendiz-core" )
				]
			]
		);
		$this->add_control(
			"icon_size",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Icon Size", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the icon custom size.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .round-tab-wrapper .round-tab-head .round-tab-head-icon' => 'font-size: {{VALUE}}px;',
				],
				"condition" 	=> [
					"tab_type"	=> "icon"
				]
			]
		);
		$this->add_control(
			"tab_head_color",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Tab Head Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the tab head color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .round-tab-wrapper .round-tab-head .round-tab-head-icon' => 'color: {{VALUE}};',
				],
				"condition" 	=> [
					"tab_type!"	=> "img"
				]
			]
		);
		$this->add_control(
			"tab_head_bgcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Tab Head Background Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the tab head background color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .round-tab-wrapper .round-tab-head' => 'background-color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			"tab_head_hcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Tab Head Hover Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the tab head hover color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .round-tab-wrapper .round-tab-head:hover .round-tab-head-icon' => 'color: {{VALUE}};',
				],
				"condition" 	=> [
					"tab_type!"	=> "img"
				]
			]
		);
		$this->add_control(
			"tab_head_hbgcolor",
			[
				"type"			=> \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Tab Head Hover Background Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the tab head hover background color.", "lendiz-core" ),
				"default" 		=> "",
				'selectors' => [
					'{{WRAPPER}} .round-tab-wrapper .round-tab-head:hover' => 'background-color: {{VALUE}};',
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
				"description"	=> esc_html__( "Content carousel inner shortcodes.", "lendiz-core" ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
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
		$repeater->add_control(
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
		$repeater->add_control(
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
		$repeater->add_control(
			"tab_image",
			[
				"label" 		=> __( "Tab Image", "lendiz-core" ),
				"description"	=> esc_html__( "Choose tab image.", "lendiz-core" ),
				"type" 			=> \Elementor\Controls_Manager::MEDIA,
				"dynamic" 		=> [
					"active" 		=> true,
				]
			]
		);
		$repeater->add_control(
			"tab_txt",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Tab Head Text", "lendiz-core" ),
				"description"	=> esc_html__( "This is option set tab head text.", "lendiz-core" ),
				"default" 		=> "A"
			]
		);	
		$repeater->add_control(
			"sub_title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Sub Title", "lendiz-core" ),
				"description"	=> esc_html__( "This is option set tab subtitle.", "lendiz-core" ),
			]
		);		
		$repeater->add_control(
			"main_title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Main Title", "lendiz-core" ),
				"description"	=> esc_html__( "This is option set tab main title.", "lendiz-core" ),
			]
		);	
		$repeater->add_control(
			"content",
			[
				"type"			=> \Elementor\Controls_Manager::WYSIWYG,
				"label"			=> esc_html__( "Content", "lendiz-core" ),
				"description"	=> esc_html__( "This is option to set tab content.", "lendiz-core" ),
			]
		);		
		$this->add_control(
			'inner_contents',
			[
				'label' 		=> esc_html__( 'Inner Contents', 'lendiz-core' ),
				'type' 			=>  \Elementor\Controls_Manager::REPEATER,
				'fields'		=> $repeater->get_controls(),
				'default'		=> [
					[
						'sub_title' 	=> esc_html__( 'Subtitle', 'lendiz-core' ),
						'main_title' 	=> esc_html__( 'Tab Title', 'lendiz-core' ),
						'content'		=> esc_html__( 'Click edit button to change this text. You can place here shortcodes.', 'lendiz-core' ),
						"icon_fa" 		=> "ti-star",
						"icon_ti" 		=> "ti-heart"
					]
				],
				"title_field"	=> "{{{ main_title }}}"
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
		
		$class = isset( $extra_class ) && $extra_class != '' ? ' ' . $extra_class : '';	
			
		?>
		
		<div class="elementor-widget-container round-tab-wrapper<?php echo esc_attr( $class ); ?>">
		
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
		
		$tab_type = isset( $tab_type ) && $tab_type != '' ? $tab_type : 'txt';
		$inner_contents = isset( $inner_contents ) && $inner_contents != '' ? $inner_contents : '';

		if( isset( $inner_contents ) && !empty( $inner_contents ) ){
			$stat = 1;
			$cls = ' round-tab-'. count( $inner_contents );
			foreach (  $inner_contents as $inner_content ) { 
				$stat_cls = $stat ? ' active' : '';
			?>
				<div class="round-tab-item text-center<?php echo esc_attr( $cls . $stat_cls ); ?>">
					<div class="round-tab-head">
						<div class="round-tab-head-inner">
						<?php
							if( $tab_type == 'icon' ){
								$icon_opt = isset( $inner_content['icon_opt'] ) && $inner_content['icon_opt'] != '' ? $inner_content['icon_opt'] : '';
								$icon = isset( $inner_content[$icon_opt] ) && $inner_content[$icon_opt] != '' ? $inner_content[$icon_opt] : '';
								echo '<span class="round-tab-head-icon"><i class="'. esc_attr( $icon ) .'"></i></span>';
							}elseif( $tab_type == 'img' ){
								$tab_image = isset( $inner_content['tab_image'] ) ? $inner_content['tab_image'] : '';
								if( is_array( $tab_image ) && isset( $tab_image['id'] ) ){ 
									$img_attr = wp_get_attachment_image_src( absint( $tab_image['id'] ), 'full', true );
									$image_alt = get_post_meta( absint( $tab_image['id'] ), '_wp_attachment_image_alt', true);
									if( isset( $img_attr[0] ) ){
										echo '<span class="round-tab-head-icon">';
											echo '<img class="img-fluid" src="'. esc_url( $img_attr[0] ) .'" width="'. esc_attr( $img_attr[1] ) .'" height="'. esc_attr( $img_attr[2] ) .'" alt="'. esc_attr( $image_alt ) .'" />';
										echo '</span><!-- .round-tab-head-icon -->';
									}
								}		
							}else{
								$tab_txt = isset( $inner_content['tab_txt'] ) ? $inner_content['tab_txt'] : '';
								echo '<span class="round-tab-head-icon">'. esc_html( $tab_txt ) .'</span>';
							}
						?>
						</div><!-- .round-tab-head-inner -->
					</div><!-- .round-tab-head -->
					<div class="round-tab-content">
						<div class="round-tab-subtitle">
						<?php
							$sub_title = isset( $inner_content['sub_title'] ) && $inner_content['sub_title'] != '' ? $inner_content['sub_title'] : '';
							echo '<span class="round-tab-subtitle-inner">'. esc_attr( $sub_title ) .'</span>';
						?>
						</div><!-- .round-tab-subtitle -->
						<div class="round-tab-title">
						<?php
							$main_title = isset( $inner_content['main_title'] ) && $inner_content['main_title'] != '' ? $inner_content['main_title'] : '';
							echo '<span class="round-tab-title-inner">'. esc_attr( $main_title ) .'</span>';
						?>
						</div><!-- .round-tab-title -->
						<div class="round-tab-desc">
						<?php
							$content = isset( $inner_content['content'] ) && $inner_content['content'] != '' ? $inner_content['content'] : '';
							echo '<span class="round-tab-title-inner">'. wp_kses_post( $content ) .'</span>';
						?>
						</div><!-- .round-tab-desc -->
					</div><!-- .round-tab-content -->
				</div><!-- .round-tab-item -->
			<?php
				$stat = 0;
			}
		}// inner_contents check

	}
	
}