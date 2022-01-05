<?php

/**
 * Lendiz Theme Customizer Functionalities  
 *
 */
final class Lendiz_Theme_Customize {
	
	private static $_instance = null;
	
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	public function __construct() {
		$this->init();
	}
	
	public function init() {
		//Register doctors directory post type
		$this->initiate_customize_fields();
		
		//Call doctors directory shortcodes
		$this->customize_config();
	}
	
	public function initiate_customize_fields(){
		//Panel and Section
		require_once LENDIZ_ADMIN .'/customizer/lendiz-customizer-setting.php';

		//Trigger
		require_once LENDIZ_ADMIN .'/customizer/customizer-trigger/class-customize-trigger.php';
	}
	
	public function customize_config(){
		require_once LENDIZ_ADMIN .'/customizer/customize-config.php';
	}

}

Lendiz_Theme_Customize::instance();