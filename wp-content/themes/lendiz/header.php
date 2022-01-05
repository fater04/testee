<?php
/*
 * The header for lendiz theme
 */
$ahe = new LendizHeaderElements;
$protocal = is_ssl() ? 'https' : 'http';

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="<?php echo esc_attr( $protocal ); ?>://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<?php		
	/*
	 * Sttaic Template Options - lendiz_demo_header - 10
	 */
	do_action('lendiz_before_body_action');	
?>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if( $ahe->lendiz_page_loader() ) : ?>
	<div class="page-loader"></div>
<?php endif; ?>
<?php
	/*
	 * Mobile Header - lendiz_mobile_header - 10
	 * Mobile Bar - lendiz_mobile_bar - 20
	 * Secondary Menu Space - lendiz_header_secondary_space - 30
	 * Top Sliding Bar - lendiz_header_top_sliding - 40
	 */
	do_action('lendiz_body_action');
	
?>

<div id="page" class="lendiz-wrapper<?php $ahe->lendiz_theme_layout(); ?>">
	<?php $ahe->lendiz_header_slider('top'); ?>
	<header class="lendiz-header<?php $ahe->lendiz_header_layout(); ?>">
		
			<?php $ahe->lendiz_header_bar(); ?>
		
	</header>
	<div class="lendiz-content-wrapper">