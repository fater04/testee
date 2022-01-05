<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */
$product_class = $data_atts = '';
if( is_shop() ){
	$product_col = LendizThemeOpt::lendiz_static_theme_mod('woo-shop-columns');
	$product_col = $product_col ? $product_col : 4;
	$product_class = ' shop-col-'. esc_attr( $product_col );
}elseif( is_product_category() || is_product_tag() ){
	$product_col = LendizThemeOpt::lendiz_static_theme_mod('woo-shop-archive-columns');
	$product_col = $product_col ? $product_col : 4;
	$product_class = ' shop-col-'. esc_attr( $product_col );
}elseif( is_product () ){
	$slide_template = 'woo-related';
	
	$infinite = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-infinite' ));
	$margin = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-margin' ));
	$center = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-center' ));
	$navigation = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-navigation' ));
	$pagination = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-pagination' ));
	$autoplay = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-autoplay' ));
	$items = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-items' ));
	$tab = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-tab' ));
	$mobile = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-mobile' ));
	$duration = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-duration' ));
	$smartspeed = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-smartspeed' ));
	$scrollby = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-scrollby' ));
	$autoheight = esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-autoheight' ));
	
	$gal_atts = array(
		'data-loop="'. ( $infinite ? $infinite : '0' ) .'"',
		'data-margin="'. ( $margin ? $margin : '10' ) .'"',
		'data-center="'. ( $center ? $center : '0' ) .'"',
		'data-nav="'. ( $navigation ? $navigation : '0' ) .'"',
		'data-dots="'. ( $pagination ? $pagination : '0' ) .'"',
		'data-autoplay="'. ( $autoplay ? $autoplay : '0' ) .'"',
		'data-items="'. ( $items ? $items : '3' ) .'"',
		'data-items-tab="'. ( $tab ? $tab : '2' ) .'"',
		'data-items-mob="'. ( $mobile ? $mobile : '1' ) .'"',
		'data-duration="'. ( $duration ? $duration : '5000' ) .'"',
		'data-smartspeed="'. ( $smartspeed ? $smartspeed : '250' ) .'"',
		'data-scrollby="'. ( $scrollby ? $scrollby : '0' ) .'"',
		'data-autoheight="'. ( $autoheight ? $autoheight : '0' ) .'"',
	);
	$data_atts = implode( " ", $gal_atts );
	wp_enqueue_script( 'owl-carousel' );
	wp_enqueue_style( 'owl-carousel' );
	$product_class .= ' owl-carousel related-slider';
	
	$cols = LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-items' );
	
}
?>
<ul class="products<?php echo esc_attr( $product_class ); ?>" <?php echo ( ''. $data_atts ); ?>>