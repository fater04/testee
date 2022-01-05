<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( ! class_exists('Lendiz_Elementor_Addon') ) {
    /*
    * Intialize and Sets up the plugin
    */
    class Lendiz_Elementor_Addon {
        
		private static $_instance = null;
		
        /**
        * Sets up needed actions/filters for the plug-in to initialize.
        * @since 1.0.0
        * @access public
        * @return void
        */
        public function __construct() {
			
			//Classic elementor addon shortcodes
            add_action( 'init', array( $this, 'init_addons' ), 20 );
			
        }
        
        /**
        * Load required file for addons integration
        * @return void
        */
        public function init_addons() {

        	require_once ( LENDIZ_CORE_DIR . 'elementor-supports/inc/lendiz-addon.php' );
        }
        
        /**
         * Creates and returns an instance of the class
         * @since 2.6.8
         * @access public
         * return object
         */
        public static function get_instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
    
    }
}

$elementor_editor = true;
function is_elementor_editor() {
	global $elementor_editor;
	return $elementor_editor;
}



add_action( 'plugins_loaded', 'my_plugin_override', 99999 );

function my_plugin_override() {
    //Create/Call Lendiz Elementor Addon
	Lendiz_Elementor_Addon::get_instance();
}