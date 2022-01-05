<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Lendiz for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once LENDIZ_ADMIN . '/tgm/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'lendiz_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function lendiz_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	 
	$path = new LendizZozoPath;
	$plugin_url = $path->lendiz_get_path();
	$core_url = $path->lendiz_get_core_path();
	 
	$plugins = array(
		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'      => esc_html__( 'Lendiz Core', 'lendiz' ),
			'slug'      => 'lendiz-core',
			'required'  => true,
			'version'				=> '1.0',
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'source'				=> esc_url( $core_url. 'lendiz/lendiz-core.zip' ),
			'image_url' 		 	=> esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/lendiz-core.png' )
		),
		array(
			'name'      => esc_html__( 'Elementor Page Builder', 'lendiz' ),
			'slug'      => 'elementor',
			'required'  => true,
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'image_url' 		 	=> esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/elementor.png' ),
		),
		array(
			'name'					=> esc_html__( 'Slider Revolution', 'lendiz' ), // The plugin name.
			'slug'					=> 'revslider', // The plugin slug (typically the folder name).
			'source'				=> esc_url( $plugin_url.'revslider.zip' ), // The plugin source.
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
			'version'				=> '6.4.11',
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
			'image_url' 		 	=> esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/revslider.png' ),
		),
		array(
			'name'					=> esc_html__( 'Cost Calculator', 'lendiz' ), // The plugin name.
			'slug'					=> 'cost-calculator', // The plugin slug (typically the folder name).
			'source'				=> esc_url( $plugin_url.'cost-calculator.zip' ), // The plugin source.
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
			'version'				=> '2.3.2',
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
			'image_url' 		 	=> esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/cost-calculator.png' ),
		),
		array(
			'name'					=> esc_html__( 'Envato Market', 'lendiz' ), // The plugin name.
			'slug'					=> 'envato-market', // The plugin slug (typically the folder name).
			'source'				=> esc_url( $plugin_url.'envato-market.zip' ), // The plugin source.
			'required'				=> false, // If false, the plugin is only 'recommended' instead of required.
			'version'				=> '2.0.6',
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
			'image_url' 		 	=> esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/envato-market.png' ),
		),
		array(
			'name'      => esc_html__( 'Contact Form 7', 'lendiz' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'image_url' 		 	=> esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/contact-form.png' ),
		),
		array(
			'name'      => esc_html__( 'WooCommerce', 'lendiz' ),
			'slug'      => 'woocommerce',
			'required'  => false,
			'force_activation'		=> false,
			'force_deactivation'	=> false,
			'image_url' 		 	=> esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/plugin/woocommerce.png' ),
		),
	);
	
	$token = get_option( 'verified_token' );
	if( !$token ) $plugins = array();
	
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
        'id'           => 'lendiz_tgmpa',           // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );
	tgmpa( $plugins, $config );
}
	 
if ( ! class_exists( 'LendizZozoPath' ) ) {
	class LendizZozoPath{
		private $path;
		
		function lendiz_get_path(){
			return 'http://demo.zozothemes.com/import/plugins/';
		}
		
		function lendiz_get_core_path(){
			return 'http://demo.zozothemes.com/import/sites/';
		}
	}
}

function lendiz_tgm_install(){
	$tgm = new TGM_Plugin_Activation;
	$plugins = $_GET['plugin'];
	$tgm->plugins = $_GET['plugins'];
	$tgm->custom_do_plugin_install( $plugins );
	wp_die();
}
add_action('wp_ajax_lendiz_tgm_install', 'lendiz_tgm_install');
add_action( 'wp_ajax_nopriv_lendiz_tgm_install', 'lendiz_tgm_install' );