<?php
/**
 * Elementor Mialchimp
 *
 *
 * @since 1.0.0
 */
class Elementor_Mailchimp_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Mailchimp widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'mailchimp';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Mailchimp widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Mailchimp', 'lendiz-core' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Mailchimp widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'ti-email';
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
		return [ 'custom-front' ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Mailchimp widget belongs to.
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
	 * Register Mailchimp widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$mailchimp_list_ids = function_exists( 'lendiz_get_mailchimp_list_ids' ) ? lendiz_get_mailchimp_list_ids() : array();
	
		//General Section
		$this->start_controls_section(
			"general_section",
			[
				"label"	=> esc_html__( "General", "lendiz-core" ),
				"tab"	=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "Default mailchimp options.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Title", "lendiz-core" ),
				"description"	=> esc_html__( "This is mailchimp title.", "lendiz-core" ),
				"default" 		=> ""
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
				"description"	=> esc_html__( "mailchimp layout options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"mailchimp_heading",
			[
				"label"			=> esc_html__( "Heading Tag", "lendiz-core" ),
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
			"title_color",
			[
				"type"			=>  \Elementor\Controls_Manager::COLOR,
				"label"			=> esc_html__( "Title Color", "lendiz-core" ),
				"description"	=> esc_html__( "Here you can put the title color.", "lendiz-core" ),
				"default" 		=> esc_html__( "Layouts", "lendiz-core" ),
				'selectors' => [
					'{{WRAPPER}} .mailchimp-shortcode-widget .mailchimp-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			"mailchimp_layout",
			[
				"label"			=> esc_html__( "Mailchimp Layout", "lendiz-core" ),
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"default"		=> "default",
				"options"		=> [
					"default"		=> esc_html__( "Default", "lendiz-core" ),
					"classic"		=> esc_html__( "Classic", "lendiz-core" )
				]
			]
		);
		$this->end_controls_section();
		
		//Mailchimp Section
		$this->start_controls_section(
			"mailchimp_section",
			[
				"label"			=> esc_html__( "Mailchimp", "lendiz-core" ),
				"tab"			=> \Elementor\Controls_Manager::TAB_CONTENT,
				"description"	=> esc_html__( "mailchimp options available here.", "lendiz-core" ),
			]
		);
		$this->add_control(
			"mailchimp_list",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Select a Mailing List", "lendiz-core" ),
				"description"	=> esc_html__( "This mailchimp list's showing by given mailchimp api key from theme options.", "lendiz-core" ),
				"default"		=> "",
				"options"		=> $mailchimp_list_ids
			]
		);
		$this->add_control(
			"button_style",
			[
				"type"			=> \Elementor\Controls_Manager::SELECT,
				"label"			=> esc_html__( "Signup Button Style", "lendiz-core" ),
				"description"	=> esc_html__( "This is an option for mailchimp button style.", "lendiz-core" ),
				"default" 		=> "text",
				"options"		=> [
					"text"	=> esc_html__( "Only Text", "lendiz-core" ),
					"icon"	=> esc_html__( "Only Icon", "lendiz-core" ),
					"text-icon"	=> esc_html__( "Text with Icon", "lendiz-core" ),
				]
			]
		);
		$this->add_control(
			"button_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Signup Button Text", "lendiz-core" ),
				"description"	=> esc_html__( "This is the option for mailchimp singup button text. If no text need, then leave it empty.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"placeholder",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Placeholder Text", "lendiz-core" ),
				"description"	=> esc_html__( "This is for placeholder text.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"first_name",
			[
				"label" 		=> esc_html__( "First Name Field", "lendiz-core" ),
				"description"	=> esc_html__( "This is an option for collect first name.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"last_name",
			[
				"label" 		=> esc_html__( "Last Name Field", "lendiz-core" ),
				"description"	=> esc_html__( "This is an option for collect last name.", "lendiz-core" ),
				"type" 			=> "toggleswitch",
				"default" 		=> "0"
			]
		);
		$this->add_control(
			"sub_title",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Sub Title", "lendiz-core" ),
				"description"	=> esc_html__( "This subtitle text show below of mailchimp title.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"success_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Success Text", "lendiz-core" ),
				"description"	=> esc_html__( "This success message text for mailchimp.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->add_control(
			"fail_text",
			[
				"type"			=> \Elementor\Controls_Manager::TEXT,
				"label"			=> esc_html__( "Failed Text", "lendiz-core" ),
				"description"	=> esc_html__( "This failed message text for mailchimp.", "lendiz-core" ),
				"default" 		=> ""
			]
		);
		$this->end_controls_section();
	
	}

	/**
	 * Render Mailchimp widget output on the frontend.
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
		$class .= isset( $mailchimp_layout ) && $mailchimp_layout != '' ? ' mailchimp-shortcode-' . $mailchimp_layout : '';	
		
		?>
		
		<div class="elementor-widget-container mailchimp-shortcode-widget<?php echo esc_attr( $class ); ?>">
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
		$sub_title = isset( $sub_title ) && $sub_title != '' ? $sub_title : '';
		$first_name = isset( $first_name ) && $first_name != '0' ? true : false;
		$last_name = isset( $last_name ) && $last_name != '0' ? true : false;
		$placeholder = isset( $placeholder ) && $placeholder != '' ? $placeholder : '';
		$button_style = isset( $button_style ) ? $button_style : 'icon';
		$button_text = isset( $button_text ) && $button_text != '' ? $button_text : '';
		$mailchimp_layout = isset( $mailchimp_layout ) && $mailchimp_layout != '' ? $mailchimp_layout : 'default';
		$mailchimp_list = isset( $mailchimp_list ) ? $mailchimp_list : '';
		$heading = isset( $mailchimp_heading ) && $mailchimp_heading != '' ? $mailchimp_heading : 'h3';
		
		$success_text = isset( $success_text ) && $success_text != '' ? $success_text : esc_html__( 'Success', 'lendiz-core' );
		$fail_text = isset( $fail_text ) && $fail_text != '' ? $fail_text : esc_html__( 'Failed', 'lendiz-core' );
		
		$shortcode_rand_id = 'zozo-mc-form-'. lendiz_shortcode_rand_id();
		
		$api_key = LendizFamework::lendiz_static_theme_mod( 'mailchimp-api' );
		?>
		
		<div class="mailchimp-wrapper">
			<form class="zozo-mc-form" id="<?php echo esc_attr( $shortcode_rand_id ); ?>" method="post">

				<?php if( $title ) { echo '<'. esc_attr( $heading ) . ' class="mailchimp-title">'. esc_html( $title ) . '</'. esc_attr( $heading ) .'>'; } ?>
				<?php if( $sub_title ) { ?><p class="zozo-mc-subtitle"><?php echo esc_attr( $sub_title ); ?></p><?php } ?>
				<?php if( $first_name ) { ?>
				<div class="form-group">
					<input type="text" placeholder="<?php esc_html_e( 'First Name', 'lendiz-core' ); ?>" class="form-control first-name" name="zozo_mc_first_name" />
				</div>
				<?php }	?>
				<?php if( $last_name ) {	?>	
				<div class="form-group">
					<input type="text" placeholder="<?php esc_html_e( 'Last Name', 'lendiz-core' ); ?>" class="form-control last-name" name="zozo_mc_last_name" />
				</div>
				<?php } ?>
				<input type="hidden" name="lendiz_mc_listid" value="<?php echo esc_attr( $mailchimp_list ); ?>" />
				
				<?php
					$btn_txt = '';
					if( $button_style == 'text' ){
						$btn_txt = isset( $button_text ) && $button_text != '' ? '<span class="subscribe-text">' . $button_text . '</span>' : '<span class="ti-location-arrow"></span>';
					}elseif( $button_style == 'icon' ){
						$btn_txt = apply_filters( 'zoacres_mailchimp_icon', '<span class="ti-location-arrow"></span>' );
					}else{
						$btn_txt = isset( $button_text ) && $button_text != '' ? '<span class="subscribe-text">' . $button_text . '</span>' . apply_filters( 'zoacres_mailchimp_icon', '<span class="ti-location-arrow"></span>' ) : '<span class="ti-location-arrow"></span>';
					}
				?>
				
				<?php if( $mailchimp_layout == 'default' ){ ?>
					<div class="input-group">
						<input type="text" class="form-control" name="zozo_mc_email" placeholder="<?php echo esc_attr( $placeholder ) ?>">
						<span class="input-group-btn"><button class="btn btn-secondary zozo-mc" type="button"><?php echo wp_kses_post( $btn_txt ) ?></button></span>
					</div><!-- .input-group -->
				<?php }else{ ?>
					<input type="text" class="form-control" name="zozo_mc_email" placeholder="<?php echo esc_attr( $placeholder ) ?>">
					<span class="input-group-btn"><button class="btn btn-secondary mc-submit-btn" type="button"><?php echo wp_kses_post( $btn_txt ) ?></button></span>
				<?php } ?>
					
				</form>
				<!--Mailchimp Custom Script-->
				<div class="mc-notice-group" data-success="<?php echo esc_html( $success_text ); ?>" data-fail="<?php echo esc_html( $fail_text ); ?>">
					<span class="mc-notice-msg"></span>
				</div><!-- .mc-notice-group -->
			</div><!-- .mailchimp-wrapper -->
		<?php

	}

}