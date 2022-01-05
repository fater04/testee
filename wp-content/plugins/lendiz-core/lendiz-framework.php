<?php
	
class LendizFamework {
	
	public static $lendiz_mod = '';
	
	function __construct(){
		$lendiz_mod = get_option( 'lendiz_theme_options_new');
		if( !empty( $lendiz_mod ) ){
			self::$lendiz_mod = $lendiz_mod;
		}elseif( function_exists( 'lendiz_default_theme_values' ) ){
			$input_val = lendiz_default_theme_values();
			self::$lendiz_mod = json_decode( $input_val, true );
		}
	}
	
	public static function lendiz_static_theme_mod($field){
		$lendiz_mod = self::$lendiz_mod;
		return isset( $lendiz_mod[$field] ) && $lendiz_mod[$field] != '' ? $lendiz_mod[$field] : '';
	}

}
$lendiz_framework = new LendizFamework();