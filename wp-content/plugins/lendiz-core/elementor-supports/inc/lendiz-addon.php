<?php 

/**
 * Lendiz Addons for Elementor Main Class
 *
 * The main class that initiates and runs the plugin. 
 *
 * @since 1.0.0
 */
final class Lendiz_Elementor_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Lendiz_Elementor_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Lendiz_Elementor_Extension An instance of the class.
	 */
	 
	private static $shortcodes_list = array();
	 
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		
		//Call Lendiz Elementor Addons Shortcode and Scripts
		$this->init();

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {
	
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			//add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}
		
		//Create classic elementor addon category
		$this->create_classic_elementor_category();
		
		//Init elementor supported files
		$this->classic_elementor_addon_init_files();
		
		//Call elementor custom addons
		$this->lendiz_set_shortcodes();
		
		// Register controls
		add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		
		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		
		//Register Widget Styles
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'widget_styles' ) );

	}

	/**
	* Installs translation text domain and checks if Elementor is installed
	* @since 1.0.0
	* @access public
	* @return void
	*/
	public function classic_elementor_addon_init_files() {
		
		//Init admin page files
		$this->init_files(); 
	}
	
	/**
     * Register plugin shortcode category
	 * @since 2.6.8
	 * @access public
	 * @return void
	 */
	public function create_classic_elementor_category() {
	   \Elementor\Plugin::instance()->elements_manager->add_category(
			'lendiz-elements',
			array(
				'title' => esc_html__( 'Lendiz Addons', 'lendiz-core' )
			),
		1);
	}
	
	/**
	 * Require initial necessary files
	 * @since 2.6.8
	 * @access public
	 * @return void
	 */
	public function init_files(){
		if ( is_admin() ) {
			require_once ( LENDIZ_CORE_DIR . 'elementor-supports/admin/lendiz-settings.php');
		}        
		require_once ( LENDIZ_CORE_DIR . 'elementor-supports/inc/function.php' );
	}
	
	public function widget_styles() {
		wp_register_style( 'image-hover', LENDIZ_CORE_URL .'elementor-supports/assets/css/image-hover.min.css', array(), '1.0', 'all');
		wp_enqueue_style( 'image-hover' );
		wp_register_style( 'magnific-popup', LENDIZ_CORE_URL .'elementor-supports/assets/css/magnific-popup.min.css', array(), '1.0', 'all');
		wp_enqueue_style( 'font-awesome' );
		wp_enqueue_style( 'lendiz-core-style', LENDIZ_CORE_URL .'elementor-supports/assets/css/style.css', array(), '1.0', 'all');		
	}
	
	public function widget_scripts() {	
		wp_register_script( 'isotope', LENDIZ_CORE_URL . 'elementor-supports/assets/js/isotope.pkgd.min.js' ,  array( 'jquery' ), '3.0.3', true );
		wp_register_script( 'infinite-scroll', LENDIZ_CORE_URL . 'elementor-supports/assets/js/infinite-scroll.pkgd.min.js',  array( 'jquery' ), '2.0', true );
		wp_register_script( 'typed', LENDIZ_CORE_URL . 'elementor-supports/assets/js/typed.min.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'appear', LENDIZ_CORE_URL . 'elementor-supports/assets/js/jquery.appear.min.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'circle-progress', LENDIZ_CORE_URL . 'elementor-supports/assets/js/jquery.circle.progress.min.js',  array( 'jquery' ), '1.2.2', true );
		wp_register_script( 'countdown', LENDIZ_CORE_URL . 'elementor-supports/assets/js/jquery.countdown.min.js',  array( 'jquery' ), '2.2.0', true );
		wp_register_script( 'chart-bundle', LENDIZ_CORE_URL . 'elementor-supports/assets/js/Chart.bundle.min.js',  array( 'jquery' ), '2.7.2', true );
		wp_register_script( 'magnific-popup', LENDIZ_CORE_URL . 'elementor-supports/assets/js/jquery.magnific.popup.min.js',  array( 'jquery' ), '1.1.0', true );
		
		wp_register_script( 'jquery-ui', LENDIZ_CORE_URL . 'elementor-supports/assets/js/jquery-ui.min.js',  array( 'jquery' ), '1.12.1', true );
		wp_register_script( 'jquery-ease', LENDIZ_CORE_URL . 'elementor-supports/assets/js/jquery.easing-1.3.min.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'raindrops', LENDIZ_CORE_URL . 'elementor-supports/assets/js/raindrops.js',  array( 'jquery' ), '1.0', true );
		
		wp_register_script( 'lendiz-float-parallax', LENDIZ_CORE_URL . 'elementor-supports/assets/js/lendiz-float-parallax.js',  array( 'jquery' ), '1.0', true );
			
		wp_register_script( 'custom-front', LENDIZ_CORE_URL . 'elementor-supports/assets/js/custom-front.js',  array( 'jquery' ), '1.0', true );
		wp_register_script( 'lendiz-timeline', LENDIZ_CORE_URL . 'elementor-supports/assets/js/timeline.min.js',  array( 'jquery' ), '1.0', true );
		
		wp_enqueue_script( 'lendiz-elementor-custom', LENDIZ_CORE_URL . 'elementor-supports/assets/js/custom.js' ,  array( 'jquery' ), '1.0', true );
		
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'lendiz-core' ),
			'<strong>' . esc_html__( 'Lendiz Elementor Addons', 'lendiz-core' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'lendiz-core' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'lendiz-core' ),
			'<strong>' . esc_html__( 'Lendiz Elementor Addons', 'lendiz-core' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'lendiz-core' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'lendiz-core' ),
			'<strong>' . esc_html__( 'Lendiz Elementor Addons', 'lendiz-core' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'lendiz-core' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function lendiz_set_shortcodes(){
	
		$shortcode_stat = array(
			'animated-text' 	=> esc_html__( 'Elementor AnimateText Widget', 'lendiz-core' ),
			'circle-progress'	=> esc_html__( 'Elementor Circle Progress Widget', 'lendiz-core' ),
			'contact-form' 		=> esc_html__( 'Elementor Contact Form Widget', 'lendiz-core' ),
			'contact-info' 		=> esc_html__( 'Elementor Contact Info Widget', 'lendiz-core' ),
			'counter' 			=> esc_html__( 'Elementor Counter Widget', 'lendiz-core' ),
			'day-counter' 		=> esc_html__( 'Elementor Day Counter Widget', 'lendiz-core' ),
			'feature-box' 		=> esc_html__( 'Elementor Feature Box Widget', 'lendiz-core' ),
			'flip-box' 			=> esc_html__( 'Elementor Flip Box Widget', 'lendiz-core' ),
			'google-map' 		=> esc_html__( 'Elementor Google Map Widget', 'lendiz-core' ),
			'icon' 				=> esc_html__( 'Elementor Icon Widget', 'lendiz-core' ),
			'icon-list' 		=> esc_html__( 'Elementor Icon List Widget', 'lendiz-core' ),
			'image-grid' 		=> esc_html__( 'Elementor Image Grid Widget', 'lendiz-core' ),
			'modal-popup' 		=> esc_html__( 'Elementor Modal Popup Widget', 'lendiz-core' ),
			'pricing-table' 	=> esc_html__( 'Elementor Pricing Table Widget', 'lendiz-core' ),
			'section-title' 	=> esc_html__( 'Elementor Section Title Widget', 'lendiz-core' ),
			'social-links' 		=> esc_html__( 'Elementor Social Links Widget', 'lendiz-core' ),
			'timeline' 			=> esc_html__( 'Elementor Timeline Widget', 'lendiz-core' ),
			'timeline-slide' 	=> esc_html__( 'Elementor Timeline Slide Widget', 'lendiz-core' ),
			'chart' 			=> esc_html__( 'Elementor Chart Widget', 'lendiz-core' ),
			'recent-popular' 	=> esc_html__( 'Elementor Recent Popular Widget', 'lendiz-core' ),
			'blog' 				=> esc_html__( 'Elementor Blog Widget', 'lendiz-core' ),
			'portfolio' 		=> esc_html__( 'Elementor Portfolio Widget', 'lendiz-core' ),
			'team' 				=> esc_html__( 'Elementor Team Widget', 'lendiz-core' ),
			'event' 			=> esc_html__( 'Elementor Event Widget', 'lendiz-core' ),
			'service' 			=> esc_html__( 'Elementor Service Widget', 'lendiz-core' ),
			'testimonial' 		=> esc_html__( 'Elementor Testimonial Widget', 'lendiz-core' ),
			'toggle-content' 	=> esc_html__( 'Elementor Toggle Content Widget', 'lendiz-core' ),
			'mailchimp' 		=> esc_html__( 'Elementor Mailchimp Widget', 'lendiz-core' ),
			'popup-anything' 	=> esc_html__( 'Elementor Popup Anything Widget', 'lendiz-core' ),
			'popover' 			=> esc_html__( 'Elementor Popover Widget', 'lendiz-core' ),
			'round-tab' 		=> esc_html__( 'Elementor Round Tab Widget', 'lendiz-core' )
		);
		self::$shortcodes_list = $shortcode_stat;
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		$shortcode_stat = self::$shortcodes_list;
		$lendiz_shortcodes = get_option('lendiz_shortcodes');
		
		$shortcode_emty_stat = false;
		if( empty( $lendiz_shortcodes ) ){
			$lendiz_shortcodes = $shortcode_stat;
			$shortcode_emty_stat = true;
		}
		
		foreach( $shortcode_stat as $key => $value ){
			
			$shortcode_name = !$shortcode_emty_stat ? str_replace( "-", "_", $key ) : $key;
			
			if( !empty( $lendiz_shortcodes ) ){
				if( isset( $lendiz_shortcodes[$shortcode_name] ) ){
					$saved_val = true;
				}else{
					$saved_val = false;
				}
			}else{
				$saved_val = false;
			}
			
			if( $saved_val ){
				
				require_once( LENDIZ_CORE_DIR . 'elementor-supports/widgets/'. esc_attr( $key ) .'.php' );
				
				switch( $key ){
					case 'animated-text': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_AnimateText_Widget() );  break; 
					case 'blog': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Blog_Widget() );  break;
					case 'circle-progress': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Circle_Progress_Widget() );  break;
					case 'contact-form': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Contact_Form_Widget() );  break;
					case 'contact-info': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Contact_Info_Widget() );  break;
					case 'counter': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Counter_Widget() );  break;
					case 'day-counter': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Day_Counter_Widget() );  break;
					case 'feature-box': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Feature_Box_Widget() );  break;
					case 'flip-box': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Flip_Box_Widget() );  break;
					case 'google-map': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Google_Map_Widget() );  break;
					case 'icon': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Icon_Widget() );  break;
					case 'icon-list': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Icon_List_Widget() );  break;
					case 'image-grid': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Image_Grid_Widget() );  break;
					case 'modal-popup': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Modal_Popup_Widget() );  break;
					case 'portfolio': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Portfolio_Widget() );  break;
					case 'team': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Team_Widget() );  break;
					case 'event': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Event_Widget() );  break;
					case 'service': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Service_Widget() );  break;
					case 'testimonial': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Testimonial_Widget() );  break;
					case 'pricing-table': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Pricing_Table_Widget() );  break;
					case 'section-title': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Section_Title_Widget() );  break;
					case 'social-links': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Social_Links_Widget() );  break;
					case 'timeline': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Timeline_Widget() );  break;
					case 'timeline-slide': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Timeline_Slide_Widget() );  break;
					case 'chart': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Chart_Widget() );  break;
					case 'recent-popular': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Recent_Popular_Widget() );  break;
					case 'toggle-content': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Toggle_Content_Widget() );  break;
					case 'mailchimp': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Mailchimp_Widget() );  break;
					case 'popup-anything': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Popup_Anything_Widget() );  break;
					case 'popover': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Popover_Widget() );  break;
					case 'round-tab': \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_Round_Tab_Widget() );  break;
				}
				
			}
			
		}
		
	}

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function register_controls() {
		
		global $elementor_editor;
		$elementor_editor = false;
		
		// Include Control
		require_once( LENDIZ_CORE_DIR . 'elementor-supports/controls/drag-drop.php' );
		require_once( LENDIZ_CORE_DIR . 'elementor-supports/controls/toggle-switch.php' );
		require_once( LENDIZ_CORE_DIR . 'elementor-supports/controls/items-spacing.php' );
		require_once( LENDIZ_CORE_DIR . 'elementor-supports/controls/fontawesome-icon.php' );
		require_once( LENDIZ_CORE_DIR . 'elementor-supports/controls/themify-icon.php' );

		// Register control
		$controls_manager = \Elementor\Plugin::instance()->controls_manager;
		$controls_manager->register_control( 'dragdrop', new DragDrop_Control() );
		$controls_manager->register_control( 'toggleswitch', new ToggleSwitch_Control() );
		$controls_manager->register_control( 'itemspacing', new ItemSpacing_Control() );
		$controls_manager->register_control( 'fontawesomeicon', new Control_FontAwesome_Icon() );
		$controls_manager->register_control( 'themifyicon', new Control_Themify_Icon() );
		
	}

}
Lendiz_Elementor_Extension::instance();