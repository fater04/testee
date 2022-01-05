<?php

/**
 * Lendiz Theme Customize Config
 */
 
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

 
class Lendiz_Theme_Customize_Config {

	public static $lendiz_options = '';
	
	public static $lendiz_theme_opt_def = array();

	public static function lendiz_register ( $wp_customize ) {
	
		// Be safe.
		if ( ! isset( $wp_customize ) ) {
				return;
		}
		
		//update_option( 'lendiz_theme_options_t', '' );
		
		//Custom Panel and Section
		$wp_customize->register_panel_type( 'Lendiz_WP_Customize_Panel' );
		$wp_customize->register_section_type( 'Lendiz_WP_Customize_Section' );
			 
		// Add three levels on panels
		$lendiz_theme_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'lendiz_theme_panel', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__( 'Lendiz Theme Options', 'lendiz' ),
			'description'    => esc_html__( 'Several settings pertaining my theme', 'lendiz' ),
		));
		$wp_customize->add_panel( $lendiz_theme_panel );
		
		//General Config
		require_once LENDIZ_ADMIN .'/customizer/config-parts/general-config.php';
		
		//Skin Config
		require_once LENDIZ_ADMIN .'/customizer/config-parts/skin-config.php';
		
		//Typography Config
		if ( class_exists( 'LendizFamework' ) ) {
			require_once LENDIZ_ADMIN .'/customizer/config-parts/typo-config.php';
		}

		//Header Config
		require_once LENDIZ_ADMIN .'/customizer/config-parts/header-config.php';
		
		//Footer Config
		require_once LENDIZ_ADMIN .'/customizer/config-parts/footer-config.php';
		
		//Theme Template
		require_once LENDIZ_ADMIN .'/customizer/config-parts/theme-template-config.php';
		
		//Theme Sliders
		require_once LENDIZ_ADMIN .'/customizer/config-parts/slider-config.php';
		
		//Social Links
		require_once LENDIZ_ADMIN .'/customizer/config-parts/social-config.php';
		
		//CPT Settings
		require_once LENDIZ_ADMIN .'/customizer/config-parts/cpt-config.php';
		
		//Maintenance
		require_once LENDIZ_ADMIN .'/customizer/config-parts/maintenance-config.php';
		
		//Woo
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			require_once LENDIZ_ADMIN .'/customizer/config-parts/woo-config.php';
		}
		
		//Member
		if ( in_array( 'lendiz-member-addon/zozo-member-addon.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			require_once LENDIZ_ADMIN .'/customizer/config-parts/member-config.php';
		}
		
		//Import and Export
		require_once LENDIZ_ADMIN .'/customizer/config-parts/import-export-config.php';
		
		if ( isset( $wp_customize->selective_refresh ) ) {
			//Site title
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'	=> '.site-title',
					'render_callback'     => function(){ bloginfo( 'name' ); }
				)
			);
			//Tagline
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'	=> '.logo-tagline'
				)
			);
		}
		
	}
	
	
}

add_action( 'customize_register' , array( 'Lendiz_Theme_Customize_Config' , 'lendiz_register' ) );