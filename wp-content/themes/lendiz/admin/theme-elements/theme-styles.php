<?php 
if( !class_exists( "LendizThemeStyles" ) ){
	require_once LENDIZ_INC . '/theme-class/theme-style-class.php';
}
$ats = new LendizThemeStyles;
echo "
/*
 * Lendiz theme custom style
 */\n\n";

echo "\n/* General Styles */\n";
$ats->lendiz_custom_font_check( 'body-typography' );
echo 'body{';
	$ats->lendiz_typo_ouput( 'body-typography' );
	$ats->lendiz_bg_settings( 'body-background' );
echo '
}';
$ats->lendiz_custom_font_check( 'h1-typography' );
echo 'h1{';
	$ats->lendiz_typo_ouput( 'h1-typography' );
echo '
}';
$ats->lendiz_custom_font_check( 'h2-typography' );
echo 'h2{';
	$ats->lendiz_typo_ouput( 'h2-typography' );
echo '
}';
$ats->lendiz_custom_font_check( 'h3-typography' );
echo 'h3{';
	$ats->lendiz_typo_ouput( 'h3-typography' );
echo '
}';
$ats->lendiz_custom_font_check( 'h4-typography' );
echo 'h4{';
	$ats->lendiz_typo_ouput( 'h4-typography' );
echo '
}';
$ats->lendiz_custom_font_check( 'h5-typography' );
echo 'h5{';
	$ats->lendiz_typo_ouput( 'h5-typography' );
echo '
}';
$ats->lendiz_custom_font_check( 'h6-typography' );
echo 'h6{';
	$ats->lendiz_typo_ouput( 'h6-typography' );
echo '
}';
$gen_link = LendizThemeStyles::lendiz_static_theme_mod('theme-link-color');
if( $gen_link ):
echo 'a{';
	$ats->lendiz_link_color( 'theme-link-color', 'regular' );
echo '
}';
echo 'a:hover{';
	$ats->lendiz_link_color( 'theme-link-color', 'hover' );
echo '
}';
echo 'a:active{';
	$ats->lendiz_link_color( 'theme-link-color', 'active' );
echo '
}';
endif;
echo "\n/* Widget Typography Styles */\n";
$ats->lendiz_custom_font_check( 'widgets-content' );
echo '.widget{';
	$ats->lendiz_typo_ouput( 'widgets-content' );
echo '
}';
$ats->lendiz_custom_font_check( 'widgets-title' );
echo '.widget .widget-title{';
	$ats->lendiz_typo_ouput( 'widgets-title' );
echo '
}';

$page_loader = LendizThemeStyles::lendiz_static_theme_mod( 'page-loader' );
if( $page_loader ):
	$page_loader_img = LendizThemeStyles::lendiz_static_theme_mod( 'page-loader-img' );
	$page_loader_img_url = isset( $page_loader_img['url'] ) ? $page_loader_img['url'] : '';
	echo ".page-loader {background: url('". esc_url( $page_loader_img_url ). "') 50% 50% no-repeat rgb(249,249,249);}";
endif;
echo '.container, .boxed-container, .boxed-container .site-footer.footer-fixed, .custom-container {
	width: '. $ats->lendiz_container_width() .';
}';
echo 'body .elementor-section.elementor-section-boxed>.elementor-container {
	max-width: '. $ats->lendiz_container_width() .';
}';
echo '.lendiz-content > .lendiz-content-inner{';
	$ats->lendiz_padding_settings( 'page-content-padding' );
echo '
}';
echo "\n/* Header Styles */\n";
$logo_height = LendizThemeStyles::lendiz_static_theme_mod( 'logo-height' );
if( $logo_height ):
	echo '.header-inner .main-logo img { max-height: '. esc_attr( $logo_height ) .'px; }';
endif;

$sticky_logo_height = LendizThemeStyles::lendiz_static_theme_mod( 'sticky-logo-height' );
if( $sticky_logo_height ):
	echo '.header-inner .sticky-logo img { max-height: '. esc_attr( $sticky_logo_height ) .'px; }';
endif;

$mobile_logo_height = LendizThemeStyles::lendiz_static_theme_mod( 'mobile-logo-height' );
if( $mobile_logo_height ):
	echo '.mobile-header-inner .mobile-logo img { max-height: '. esc_attr( $mobile_logo_height ) .'px; }';
endif;

echo 'header.lendiz-header {';
	$ats->lendiz_bg_settings('header-background');
echo '}';
echo "\n/* Topbar Styles */\n";

$topbar_height = LendizThemeStyles::lendiz_static_theme_mod( 'header-topbar-height' );
$topbar_sticky_height = LendizThemeStyles::lendiz_static_theme_mod( 'header-topbar-sticky-height' );

$ats->lendiz_custom_font_check( 'header-topbar-typography' );
echo '.topbar{';
	$ats->lendiz_typo_ouput( 'header-topbar-typography' );
	$ats->lendiz_bg_rgba( 'header-topbar-background' );
	$ats->lendiz_border_settings( 'header-topbar-border' );
	$ats->lendiz_padding_settings( 'header-topbar-padding' );
echo '
}';
echo '.topbar a, .mobile-topbar-wrap a {';
	$ats->lendiz_link_color( 'header-topbar-link-color', 'regular' );
echo '
}';
echo '.topbar a:hover, .mobile-topbar-wrap a:hover {';
	$ats->lendiz_link_color( 'header-topbar-link-color', 'hover' );
echo '
}';
echo '.topbar a:active,.topbar a:focus, .mobile-topbar-wrap a:focus, .mobile-topbar-wrap a:active {';
	$ats->lendiz_link_color( 'header-topbar-link-color', 'active' );
echo '
}';
echo '.mobile-topbar-wrap {';
	$ats->lendiz_typo_ouput( 'header-topbar-typography' );
	$ats->lendiz_bg_rgba( 'header-topbar-background' );
echo '
}';
if( $topbar_height ) {
	echo '
	.topbar-items > li{
		height: '. esc_attr( $topbar_height ) .'px ;
		line-height: '. esc_attr( $topbar_height ) .'px ;
	}';
}	
if( $topbar_sticky_height ) {
	echo '
	.header-sticky .topbar-items > li,
	.sticky-scroll.show-menu .topbar-items > li{
		height: '. esc_attr( $topbar_sticky_height ) .'px ;
		line-height: '. esc_attr( $topbar_sticky_height ) .'px ;
	}';
}
if( $topbar_height ) {	
	echo '
	.topbar-items > li img{
		max-height: '. esc_attr(  $topbar_height ) .'px ;
	}';
}
echo "\n/* Logobar Styles */\n";

$logobar_height = LendizThemeStyles::lendiz_static_theme_mod( 'header-logobar-height' );
$logobar_sticky_height = LendizThemeStyles::lendiz_static_theme_mod( 'header-logobar-sticky-height' );

$ats->lendiz_custom_font_check( 'header-logobar-typography' );
echo '.logobar{';
	$ats->lendiz_typo_ouput( 'header-logobar-typography' );
	$ats->lendiz_bg_rgba( 'header-logobar-background' );
	$ats->lendiz_border_settings( 'header-logobar-border' );
	$ats->lendiz_padding_settings( 'header-logobar-padding' );
echo '
}';
echo '.logobar a{';
	$ats->lendiz_link_color( 'header-logobar-link-color', 'regular' );
echo '
}';
echo '.logobar a:hover{';
	$ats->lendiz_link_color( 'header-logobar-link-color', 'hover' );
echo '
}';
echo '.logobar a:active,
.logobar a:focus, .logobar .lendiz-main-menu > li.current-menu-item > a, .logobar a.active {';
	$ats->lendiz_link_color( 'header-logobar-link-color', 'active' );
echo '
}';
if( $logobar_height ) {
	echo '
	.logobar-items > li{
		height: '. esc_attr( $logobar_height ) .'px ;
		line-height: '. esc_attr( $logobar_height ) .'px ;
	}';
}
if( $logobar_sticky_height ) {
	echo '.header-sticky .logobar-items > li,
	.sticky-scroll.show-menu .logobar-items > li{
		height: '. esc_attr( $logobar_sticky_height ) .'px ;
		line-height: '. esc_attr( $logobar_sticky_height ) .'px ;
	}';
}
if( $logobar_height ) {
	echo '
	.logobar-items > li img{
		max-height: '. esc_attr( $logobar_height ) .'px ;
	}';
}
echo "\n/* Logobar Sticky Styles */\n";
$color = LendizThemeStyles::lendiz_static_theme_mod('sticky-header-logobar-color');
echo '.header-sticky .logobar, .sticky-scroll.show-menu .logobar{
	'. ( $color != '' ? 'color: '. $color .';' : '' );
	$ats->lendiz_bg_rgba( 'sticky-header-logobar-background' );
	$ats->lendiz_border_settings( 'sticky-header-logobar-border' );
	$ats->lendiz_padding_settings( 'sticky-header-logobar-padding' );
echo '
}';
echo '.header-sticky .logobar a, .sticky-scroll.show-menu .logobar a{';
	$ats->lendiz_link_color( 'sticky-header-logobar-link-color', 'regular' );
echo '
}';
echo '.header-sticky .logobar a:hover, .sticky-scroll.show-menu .logobar a:hover{';
	$ats->lendiz_link_color( 'sticky-header-logobar-link-color', 'hover' );
echo '
}';
echo '.header-sticky .logobar a:active, .sticky-scroll.show-menu .logobar a:active,
.header-sticky .logobar .lendiz-main-menu .current-menu-item > a, .header-sticky .logobar .lendiz-main-menu .current-menu-ancestor > a,
.sticky-scroll.show-menu .logobar .lendiz-main-menu .current-menu-item > a, .sticky-scroll.show-menu .logobar .lendiz-main-menu .current-menu-ancestor > a ,
.header-sticky .logobar a.active, .sticky-scroll.show-menu .logobar a.active{';
	$ats->lendiz_link_color( 'sticky-header-logobar-link-color', 'active' );
echo '
}';
if( $logobar_sticky_height ) {
	echo '
	.header-sticky .logobar img.custom-logo, .sticky-scroll.show-menu .logobar img.custom-logo{
		max-height: '. esc_attr( $logobar_sticky_height ) .'px ;
	}';
}
echo "\n/* Navbar Styles */\n";

$navbar_height = LendizThemeStyles::lendiz_static_theme_mod( 'header-navbar-height' );
$navbar_sticky_height = LendizThemeStyles::lendiz_static_theme_mod( 'header-navbar-sticky-height' );

$ats->lendiz_custom_font_check( 'header-navbar-typography' );
echo '.navbar{';
	$ats->lendiz_typo_ouput( 'header-navbar-typography' );
	$ats->lendiz_bg_rgba( 'header-navbar-background' );
	$ats->lendiz_border_settings( 'header-navbar-border' );
	$ats->lendiz_padding_settings( 'header-navbar-padding' );
echo '
}';
echo '.navbar a{';
	$ats->lendiz_link_color( 'header-navbar-link-color', 'regular' );
echo '
}';
echo '.navbar a:hover{';
	$ats->lendiz_link_color( 'header-navbar-link-color', 'hover' );
echo '
}';
echo '.navbar a:active,.navbar a:focus, .navbar .lendiz-main-menu > .current-menu-item > a, .navbar .lendiz-main-menu > .current-menu-ancestor > a, .navbar a.active {';
	$ats->lendiz_link_color( 'header-navbar-link-color', 'active' );
echo '
}';
$color = LendizThemeStyles::lendiz_static_theme_mod( 'header-navbar-typography' );
$color = isset( $color['color'] ) && $color['color'] != '' ? $color['color'] : '';
$scolor = LendizThemeStyles::lendiz_static_theme_mod( 'sticky-header-navbar-color' );
if( $navbar_height ) {
	echo '
	.navbar-items > li, .navbar-items .diare-main-menu > li > a {
		height: '. esc_attr( $navbar_height ) .'px ;
		line-height: '. esc_attr( $navbar_height ) .'px ;
	}';
}
if( $navbar_sticky_height ) {
	echo '.header-sticky .navbar-items > li, 
	.sticky-scroll.show-menu .navbar-items > li, 
	.header-sticky .navbar-items .diare-main-menu > li > a,
	.sticky-scroll.show-menu .navbar-items .diare-main-menu > li > a {
		height: '. esc_attr( $navbar_sticky_height ) .'px ;
		line-height: '. esc_attr( $navbar_sticky_height ) .'px ;
	}';
}
if( $navbar_height ) {
	echo '
	.navbar-items > li img{
		max-height: '. esc_attr( $navbar_height ) .'px ;
	}';
}
echo "\n/* Navbar Sticky Styles */\n";
$color = LendizThemeStyles::lendiz_static_theme_mod('sticky-header-navbar-color');
echo '.header-sticky .navbar, .sticky-scroll.show-menu .navbar{
	'. ( $color != '' ? 'color: '. $color .';' : '' );
	$ats->lendiz_bg_rgba( 'sticky-header-navbar-background' );
	$ats->lendiz_border_settings( 'sticky-header-navbar-border' );
	$ats->lendiz_padding_settings( 'sticky-header-navbar-padding' );
echo '
}';
echo '.header-sticky .navbar a, .sticky-scroll.show-menu .navbar a {';
	$ats->lendiz_link_color( 'sticky-header-navbar-link-color', 'regular' );
echo '
}';
echo '.header-sticky .navbar a:hover, .sticky-scroll.show-menu .navbar a:hover {';
	$ats->lendiz_link_color( 'sticky-header-navbar-link-color', 'hover' );
echo '
}';
echo '.header-sticky .navbar a:active, .sticky-scroll.show-menu .navbar a:active,
.header-sticky .navbar .lendiz-main-menu .current-menu-item > a, .header-sticky .navbar .lendiz-main-menu .current-menu-ancestor > a,
.sticky-scroll.show-menu .navbar .lendiz-main-menu .current-menu-item > a, .sticky-scroll.show-menu .navbar .lendiz-main-menu .current-menu-ancestor > a,
.header-sticky .navbar a.active, .sticky-scroll.show-menu .navbar a.active {';
	$ats->lendiz_link_color( 'sticky-header-navbar-link-color', 'active' );
echo '
}';
if( $navbar_sticky_height ) {
	echo '
	.sticky-scroll.show-menu .navbar img.custom-logo{
		max-height: '. esc_attr( $navbar_sticky_height ) .'px ;
	}';
}
echo "\n/* Secondary Menu Space Styles */\n";

$sec_space_width = LendizThemeStyles::lendiz_static_theme_mod( 'secondary-menu-space-width' );

$sec_menu_type = LendizThemeStyles::lendiz_static_theme_mod('secondary-menu-type');
$ats->lendiz_custom_font_check( 'secondary-space-typography' );
if( $sec_space_width ){
	echo '.secondary-menu-area {';
		echo 'width: '. esc_attr( $sec_space_width ) .'px ;';
	echo '}';
}
echo '.secondary-menu-area {';
	$ats->lendiz_border_settings( 'secondary-space-border' );
	$ats->lendiz_typo_ouput( 'secondary-space-typography' );
	$ats->lendiz_bg_settings('secondary-space-background');
	if( $sec_space_width ){
		if( $sec_menu_type == 'left-overlay' || $sec_menu_type == 'left-push' ){
			echo 'left: -' . esc_attr( $sec_space_width ) . 'px;';
		}elseif( $sec_menu_type == 'right-overlay' || $sec_menu_type == 'right-push' ){
			echo 'right: -' . esc_attr( $sec_space_width ) . 'px;';
		}
	}
echo '
}';
if( $sec_space_width ){
	echo '.secondary-menu-area.left-overlay, .secondary-menu-area.left-push{';
		if( $sec_menu_type == 'left-overlay' || $sec_menu_type == 'left-push' ){
			echo 'left: -' . esc_attr( $sec_space_width ) . 'px;';
		}
	echo '
	}';
	echo '.secondary-menu-area.right-overlay, .secondary-menu-area.right-push{';
		if( $sec_menu_type == 'right-overlay' || $sec_menu_type == 'right-push' ){
			echo 'right: -' . esc_attr( $sec_space_width ) . 'px;';
		}
	echo '
	}';
}
echo '.secondary-menu-area .secondary-menu-area-inner{';
	$ats->lendiz_padding_settings( 'secondary-space-padding' );
echo '
}';
echo '.secondary-menu-area a{';
	$ats->lendiz_link_color( 'secondary-space-link-color', 'regular' );
echo '
}';
echo '.secondary-menu-area a:hover{';
	$ats->lendiz_link_color( 'secondary-space-link-color', 'hover' );
echo '
}';
echo '.secondary-menu-area a:active{';
	$ats->lendiz_link_color( 'secondary-space-link-color', 'active' );
echo '
}';
echo "\n/* Sticky Header Styles */\n";
$header_type = LendizThemeStyles::lendiz_static_theme_mod('header-type');
if( $header_type != 'default' ):
	$sticky_width = LendizThemeStyles::lendiz_static_theme_mod( 'header-fixed-width' );
	if( $sticky_width ){
		echo '.sticky-header-space{
			width: '. esc_attr( $sticky_width ) .'px;
		}';
		if( LendizThemeStyles::lendiz_static_theme_mod('header-type') == 'left-sticky' ):
			echo 'body, .top-sliding-bar{
				padding-left: '. esc_attr( $sticky_width ) .'px;
			}';
			else:
			echo 'body, .top-sliding-bar{
				padding-right: '. esc_attr( $sticky_width ) .'px;
			}';
		endif;
	}
endif;
$ats->lendiz_custom_font_check( 'header-fixed-typography' );
echo '.sticky-header-space{';
	$ats->lendiz_typo_ouput( 'header-fixed-typography' );
	$ats->lendiz_bg_settings( 'header-fixed-background' );
	$ats->lendiz_border_settings( 'header-fixed-border' );
	$ats->lendiz_padding_settings( 'header-fixed-padding' );
echo '
}';
echo '.sticky-header-space li a{';
	$ats->lendiz_link_color( 'header-fixed-link-color', 'regular' );
echo '
}';
echo '.sticky-header-space li a:hover{';
	$ats->lendiz_link_color( 'header-fixed-link-color', 'hover' );
echo '
}';
echo '.sticky-header-space li a:active{';
	$ats->lendiz_link_color( 'header-fixed-link-color', 'active' );
echo '
}';
echo "\n/* Mobile Header Styles */\n";

$mobile_header_hgt = LendizThemeStyles::lendiz_static_theme_mod( 'mobile-header-height' );
$mobile_header_sticky_hgt = LendizThemeStyles::lendiz_static_theme_mod( 'mobile-header-sticky-height' );

if( $mobile_header_hgt ){
	echo '
	.mobile-header-items > li{
		height: '. esc_attr( $mobile_header_hgt ) .'px ;
		line-height: '. esc_attr( $mobile_header_hgt ) .'px ;
	}';
}
echo '.mobile-header{';
	$ats->lendiz_bg_rgba('mobile-header-background');
echo '
}';
echo '.mobile-header-items li a{';
	$ats->lendiz_link_color( 'mobile-header-link-color', 'regular' );
echo '
}';
echo '.mobile-header-items li a:hover{';
	$ats->lendiz_link_color( 'mobile-header-link-color', 'hover' );
echo '
}';
echo '.mobile-header-items li a:active{';
	$ats->lendiz_link_color( 'mobile-header-link-color', 'active' );
echo '
}';
if( $mobile_header_sticky_hgt ){
	echo '
	.header-sticky .mobile-header-items > li, .show-menu .mobile-header-items > li{
		height: '. esc_attr( $mobile_header_sticky_hgt ) .'px;
		line-height: '. esc_attr( $mobile_header_sticky_hgt ) .'px;
	}';
}
echo '.mobile-header .header-sticky, .mobile-header .show-menu{';
	$ats->lendiz_bg_rgba('mobile-header-sticky-background');
echo '}';
echo '.header-sticky .mobile-header-items li a, .show-menu .mobile-header-items li a{';
	$ats->lendiz_link_color( 'mobile-header-sticky-link-color', 'regular' );
echo '
}';
echo '.header-sticky .mobile-header-items li a:hover, .show-menu .mobile-header-items li a:hover{';
	$ats->lendiz_link_color( 'mobile-header-sticky-link-color', 'hover' );
echo '
}';
echo '.header-sticky .mobile-header-items li a:hover, .show-menu .mobile-header-items li a:hover{';
	$ats->lendiz_link_color( 'mobile-header-sticky-link-color', 'active' );
echo '
}';
$mm_max = LendizThemeStyles::lendiz_static_theme_mod( 'mobile-menu-max-width' );
if( $mm_max ):
echo '.mobile-bar, .mobile-bar .container{
	max-width: '. $mm_max .'px;
}';
endif;
echo "\n/* Mobile Bar Styles */\n";
$ats->lendiz_custom_font_check( 'mobile-menu-typography' );
echo '.mobile-bar{';
	$ats->lendiz_typo_ouput( 'mobile-menu-typography' );
	$ats->lendiz_bg_settings( 'mobile-menu-background' );
	$ats->lendiz_border_settings( 'mobile-menu-border' );
	$ats->lendiz_padding_settings( 'mobile-menu-padding' );
echo '
}';
echo '.mobile-bar li a{';
	$ats->lendiz_link_color( 'mobile-menu-link-color', 'regular' );
echo '
}';
echo '.mobile-bar li a:hover{';
	$ats->lendiz_link_color( 'mobile-menu-link-color', 'hover' );
echo '
}';
echo '.mobile-bar li a:active, ul > li.current-menu-item > a, 
ul > li.current-menu-parent > a, ul > li.current-menu-ancestor > a,
.lendiz-mobile-menu li.menu-item a.active {';
	$ats->lendiz_link_color( 'mobile-menu-link-color', 'active' );
echo '
}';
echo "\n/* Top Sliding Bar Styles */\n";
$ats->lendiz_custom_font_check( 'top-sliding-typography' );
if( LendizThemeStyles::lendiz_static_theme_mod( 'header-top-sliding-switch' ) ):
echo '.top-sliding-bar-inner{';
	$ats->lendiz_typo_ouput( 'top-sliding-typography' );
	$ats->lendiz_bg_rgba( 'top-sliding-background' );
	$ats->lendiz_border_settings( 'top-sliding-border' );
	$ats->lendiz_padding_settings( 'top-sliding-padding' );
echo '
}';
$ts_bg = LendizThemeStyles::lendiz_static_theme_mod( 'top-sliding-background' );
if( !empty( $ts_bg ) ){
	echo '.top-sliding-toggle{
		'. ( $ts_bg != '' ? 'border-top-color: '. esc_attr( $ts_bg ) . ';' : '' ) .'
	}';
}
echo '.top-sliding-bar-inner li a{';
	$ats->lendiz_link_color( 'top-sliding-link-color', 'regular' );
echo '
}';
echo '.top-sliding-bar-inner li a:hover{';
	$ats->lendiz_link_color( 'top-sliding-link-color', 'hover' );
echo '
}';
echo '.top-sliding-bar-inner li a:active{';
	$ats->lendiz_link_color( 'top-sliding-link-color', 'active' );
echo '
}';
endif;
echo "\n/* General Menu Styles */\n";
$menu_tag_hot_bg = LendizThemeStyles::lendiz_static_theme_mod( 'menu-tag-hot-bg' );
if( $menu_tag_hot_bg ) {
	echo '.menu-tag-hot{
		background-color: '. $menu_tag_hot_bg .';
	}';
}	
$menu_tag_new_bg = LendizThemeStyles::lendiz_static_theme_mod( 'menu-tag-new-bg' );
if( $menu_tag_new_bg ) {
	echo '.menu-tag-new{
		background-color: '. $menu_tag_new_bg .';
	}';
}
$menu_tag_trend_bg = LendizThemeStyles::lendiz_static_theme_mod( 'menu-tag-trend-bg' );
if( $menu_tag_trend_bg ) {
	echo '.menu-tag-trend{
		background-color: '. $menu_tag_trend_bg .';
	}';
}
echo "\n/* Main Menu Styles */\n";
$ats->lendiz_custom_font_check( 'main-menu-typography' );
echo 'ul.lendiz-main-menu > li > a,
ul.lendiz-main-menu > li > .main-logo{';
	$ats->lendiz_typo_ouput( 'main-menu-typography' );
echo '
}';
echo "\n/* Dropdown Menu Styles */\n";
echo 'ul.dropdown-menu{';
	$ats->lendiz_bg_rgba( 'dropdown-menu-background' );
	$ats->lendiz_border_settings( 'dropdown-menu-border' );
echo '
}';
$ats->lendiz_custom_font_check( 'dropdown-menu-typography' );
echo 'ul.dropdown-menu > li{';
	$ats->lendiz_typo_ouput( 'dropdown-menu-typography' );
echo '
}';
echo 'ul.dropdown-menu > li a,
ul.mega-child-dropdown-menu > li a,
.header-sticky ul.dropdown-menu > li a, .sticky-scroll.show-menu ul.dropdown-menu > li a,
.header-sticky ul.mega-child-dropdown-menu > li a, .sticky-scroll.show-menu ul.mega-child-dropdown-menu > li a {';
	$ats->lendiz_link_color( 'dropdown-menu-link-color', 'regular' );
echo '
}';
echo 'ul.dropdown-menu > li a:hover,
ul.mega-child-dropdown-menu > li a:hover,
.header-sticky ul.dropdown-menu > li a:hover, .sticky-scroll.show-menu ul.dropdown-menu > li a:hover,
.header-sticky ul.mega-child-dropdown-menu > li a:hover, .sticky-scroll.show-menu ul.mega-child-dropdown-menu > li a:hover {';
	$ats->lendiz_link_color( 'dropdown-menu-link-color', 'hover' );
echo '
}';
echo 'ul.dropdown-menu > li a:active,
ul.mega-child-dropdown-menu > li a:active,
.header-sticky ul.dropdown-menu > li a:active, .sticky-scroll.show-menu ul.dropdown-menu > li a:active,
.header-sticky ul.mega-child-dropdown-menu > li a:active, .sticky-scroll.show-menu ul.mega-child-dropdown-menu > li a:active,
ul.dropdown-menu > li.current-menu-item > a, ul.dropdown-menu > li.current-menu-parent > a, ul.dropdown-menu > li.current-menu-ancestor > a,
ul.mega-child-dropdown-menu > li.current-menu-item > a {';
	$ats->lendiz_link_color( 'dropdown-menu-link-color', 'active' );
echo '
}';
/* Template Page Title Styles */
echo "\n/* Template Page Title Styles */\n";
lendiz_post_titile_style( 'single-post', $ats );
lendiz_post_titile_style( 'blog', $ats );
lendiz_post_titile_style( 'page', $ats );
lendiz_post_titile_style( 'woo', $ats );
lendiz_post_titile_style( 'single-product', $ats );
$actived_tmplt = LendizThemeStyles::lendiz_static_theme_mod('theme-templates');
if( !empty( $actived_tmplt ) && is_array( $actived_tmplt ) ){
	foreach( $actived_tmplt as $template ){
		lendiz_post_titile_style( $template, $ats );
	}
}

function lendiz_post_titile_style( $field, $ats ){
	$font_color = LendizThemeStyles::lendiz_static_theme_mod( 'template-'. $field .'-color' );
	echo '.lendiz-'. $field .' .page-title-wrap-inner{'.
		( $font_color != '' ? ' color: '. esc_attr( $font_color ) .';' : '' );
		$ats->lendiz_bg_settings( 'template-'. $field .'-background-all' );
		$ats->lendiz_border_settings( 'template-'. $field .'-border' );
		$ats->lendiz_padding_settings( 'template-'. $field .'-padding' );
	echo '
	}';
	echo '.lendiz-'. $field .' .page-title-wrap a{';
		$ats->lendiz_link_color( 'template-'. $field .'-link-color', 'regular' );
	echo '
	}';
	echo '.lendiz-'. $field .' .page-title-wrap a:hover{';
		$ats->lendiz_link_color( 'template-'. $field .'-link-color', 'hover' );
	echo '
	}';
	echo '.lendiz-'. $field .' .page-title-wrap a:active{';
		$ats->lendiz_link_color( 'template-'. $field .'-link-color', 'active' );
	echo '
	}';
	echo '.lendiz-'. $field .' .page-title-wrap-inner > .page-title-overlay{';
		$ats->lendiz_bg_rgba( $field .'-page-title-overlay' );
	echo '
	}';
}
/* Template Article Styles */
echo "\n/* Template Article Styles */\n";
lendiz_post_article_style( 'single-post', $ats );
lendiz_post_article_style( 'blog', $ats );
lendiz_post_article_style( 'archive', $ats );

function lendiz_post_article_style( $field, $ats ){
	
	$article_css = '';
	
	$font_color = LendizThemeStyles::lendiz_static_theme_mod( $field .'-article-color' );
	$bg_color = LendizThemeStyles::lendiz_static_theme_mod( $field .'-article-background' );
	
	$article_css .= $font_color != '' ? ' color: '. esc_attr( $font_color ) .';' : '';
	$article_css .= $bg_color != '' ? ' background-color: '. esc_attr( $bg_color ) .';' : '';
	$article_css .= $ats->lendiz_border_settings( $field .'-article-border', false );
	$article_css .= $ats->lendiz_padding_settings( $field .'-article-padding', false );
	echo !empty( $article_css ) ? '.'. $field .'-template article.post{'. $article_css .'}' : '';
	
	$article_css = $ats->lendiz_link_color( $field .'-article-link-color', 'regular', false );
	echo !empty( $article_css ) ? '.'. $field .'-template article.post a{'. $article_css .'}' : '';
	
	$article_css = $ats->lendiz_link_color( $field .'-article-link-color', 'hover', false );
	echo !empty( $article_css ) ? '.'. $field .'-template article.post a:hover{'. $article_css .'}' : '';
	
	$article_css = $ats->lendiz_link_color( $field .'-article-link-color', 'active', false );
	echo !empty( $article_css ) ? '.'. $field .'-template article.post a:active{'. $article_css .'}' : '';
	
	$post_thumb_margin = LendizThemeStyles::lendiz_static_theme_mod( $field .'-article-padding' );
	if( $post_thumb_margin ):
		echo '.'. $field .'-template .post-format-wrap{
			'. ( isset( $post_thumb_margin['padding-left'] ) && $post_thumb_margin['padding-left'] != '' ? 'margin-left: -' . $post_thumb_margin['padding-left'] .';' : '' ) .'
			'. ( isset( $post_thumb_margin['padding-right'] ) && $post_thumb_margin['padding-right'] != '' ? 'margin-right: -' . $post_thumb_margin['padding-right'] .';' : '' ) .'
		}';
		echo '.'. $field .'-template .post-quote-wrap > .blockquote, .'. $field .'-template .post-link-inner, .'. $field .'-template .post-format-wrap .post-audio-wrap{
			'. ( isset( $post_thumb_margin['padding-left'] ) && $post_thumb_margin['padding-left'] != '' ? 'padding-left: ' . $post_thumb_margin['padding-left'] .';' : '' ) .'
			'. ( isset( $post_thumb_margin['padding-right'] ) && $post_thumb_margin['padding-right'] != '' ? 'padding-right: ' . $post_thumb_margin['padding-right'] .';' : '' ) .'
		}';
	endif;
}
$theme_color = $ats->lendiz_theme_color();
$secondary_color = $ats->lendiz_secondary_color();
echo "\n/* Blockquote / Audio / Link Styles */\n";
echo '.post-quote-wrap > .blockquote{
	border-left-color: '. esc_attr( $theme_color ) .';
}';
$rgba_08 = $ats->lendiz_hex2rgba( $theme_color, '0.8' );
// Single Post Blockquote
$blockquote_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'single-post-quote-format' );
lendiz_quote_dynamic_style( 'single-post', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Blog Blockquote
$blockquote_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'blog-quote-format' );
lendiz_quote_dynamic_style( 'blog', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Archive Blockquote
$blockquote_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'archive-quote-format' );
lendiz_quote_dynamic_style( 'archive', $blockquote_bg_opt, $theme_color, $rgba_08 );
// Category Blockquote
$blockquote_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'category-quote-format' );
lendiz_quote_dynamic_style( 'category', $blockquote_bg_opt, $theme_color, $rgba_08 );

function lendiz_quote_dynamic_style( $field, $value, $theme_color, $rgba_08 ){
	if( $value == 'none' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: #333;
		}';
	elseif( $value == 'theme' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: '. $theme_color .';
			border-left-color: #333;
		}';
	elseif( $value == 'theme-overlay' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: '. $rgba_08 .';
		}';
	elseif( $value == 'featured' ):
		echo '.'. $field .'-template .post-quote-wrap > .blockquote{
			background-color: rgba(0, 0, 0, 0.7);
		}';
	endif;
}
/* Single Post Link */
$link_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'single-post-link-format' );
lendiz_link_dynamic_style( 'single-post', $link_bg_opt, $theme_color, $rgba_08 );
/* Blog Link */
$link_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'blog-link-format' );
lendiz_link_dynamic_style( 'blog', $link_bg_opt, $theme_color, $rgba_08 );
/* Archive Link */
$link_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'archive-link-format' );
lendiz_link_dynamic_style( 'archive', $link_bg_opt, $theme_color, $rgba_08 );
/* Catgeory Link */
$link_bg_opt = LendizThemeStyles::lendiz_static_theme_mod( 'category-link-format' );
lendiz_link_dynamic_style( 'category', $link_bg_opt, $theme_color, $rgba_08 );

function lendiz_link_dynamic_style( $field, $value, $theme_color, $rgba_08 ){
	if( $value == 'none' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: #333;
		}';
	elseif( $value == 'theme' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: '. $theme_color .';
		}';
	elseif( $value == 'theme-overlay' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: '. $rgba_08 .';
		}';
	elseif( $value == 'featured' ):
		echo '.'. $field .'-template .post-link-inner{
			background-color: rgba(0, 0, 0, 0.7);
		}';
	endif;
}
echo "\n/* Post Item Overlay Styles */\n";
$article_overlay_color = LendizThemeStyles::lendiz_static_theme_mod( 'single-post-article-overlay-color' );
echo '.post-overlay-items{';
	echo !empty( $article_overlay_color ) ? ' color: '. $article_overlay_color . ';}' : '';
	$ats->lendiz_bg_rgba( 'single-post-article-overlay-background' );
	$ats->lendiz_border_settings( 'single-post-article-overlay-border' );
	$ats->lendiz_padding_settings( 'single-post-article-overlay-padding' );
	$ats->lendiz_margin_settings( 'single-post-article-overlay-margin' );
	
echo '
}';
echo '.post-overlay-items a{';
	$ats->lendiz_link_color( 'single-post-article-overlay-link-color', 'regular' );
echo '
}';
echo '.post-overlay-items a:hover{';
	$ats->lendiz_link_color( 'single-post-article-overlay-link-color', 'hover' );
echo '
}';
echo '.post-overlay-items a:hover{';
	$ats->lendiz_link_color( 'single-post-article-overlay-link-color', 'active' );
echo '
}';
/* Extra Styles */
echo "\n/* Footer Styles */\n";
$ats->lendiz_custom_font_check( 'footer-typography' );
echo '.site-footer{';
	$ats->lendiz_typo_ouput( 'footer-typography' );
	$ats->lendiz_bg_settings( 'footer-background' );
	$ats->lendiz_border_settings( 'footer-border' );
	$ats->lendiz_padding_settings( 'footer-padding' );
echo '
}';
echo '.site-footer .widget{';
	$ats->lendiz_typo_ouput( 'footer-typography' );
echo '
}';
$bg_overlay = LendizThemeStyles::lendiz_static_theme_mod( 'footer-background-overlay' );
if( isset( $bg_overlay ) && !empty( $bg_overlay ) ):
echo '
footer.site-footer:before {
	position: absolute;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	content: "";
	'. ( !empty( $bg_overlay ) ? 'background-color: '. esc_attr( $bg_overlay ) .';' : '' ) .'}';
endif;
echo '.site-footer a{';
	$ats->lendiz_link_color( 'footer-link-color', 'regular' );
echo '
}';
echo '.site-footer a:hover{';
	$ats->lendiz_link_color( 'footer-link-color', 'hover' );
echo '
}';
echo '.site-footer a:hover{';
	$ats->lendiz_link_color( 'footer-link-color', 'active' );
echo '
}';
echo "\n/* Footer Top Styles */\n";
$ats->lendiz_custom_font_check( 'footer-top-typography' );
echo '.footer-top-wrap{';
	$ats->lendiz_typo_ouput( 'footer-top-typography' );
	$ats->lendiz_bg_settings( 'footer-top-background' );
	$ats->lendiz_border_settings( 'footer-top-border' );
	$ats->lendiz_padding_settings( 'footer-top-padding' );
	$ats->lendiz_margin_settings( 'footer-top-margin' );
echo '
}';
$top_bg_overlay = LendizThemeStyles::lendiz_static_theme_mod( 'footer-top-background-overlay' );
if( isset( $top_bg_overlay ) && !empty( $top_bg_overlay ) ):
	echo '
	.footer-top-wrap:before {
		position: absolute;
		height: 100%;
		width: 100%;
		top: 0;
		left: 0;
		content: "";
		'. ( !empty( $top_bg_overlay ) ? 'background-color: '. esc_attr( $top_bg_overlay ) .';' : '' ) .'}';
endif;
echo '.footer-top-wrap .widget{';
	$ats->lendiz_typo_ouput( 'footer-top-typography' );
echo '
}';
echo '.footer-top-wrap a{';
	$ats->lendiz_link_color( 'footer-top-link-color', 'regular' );
echo '
}';
echo '.footer-top-wrap a:hover{';
	$ats->lendiz_link_color( 'footer-top-link-color', 'hover' );
echo '
}';
echo '.footer-top-wrap a:hover{';
	$ats->lendiz_link_color( 'footer-top-link-color', 'active' );
echo '
}';

$tit_clr = LendizThemeStyles::lendiz_static_theme_mod( 'footer-top-title-color' );
echo !empty( $tit_clr ) ? '.footer-top-wrap .widget .widget-title { color: '. esc_attr( $tit_clr ) .'; }' : '';
echo "\n/* Footer Middle Styles */\n";
$ats->lendiz_custom_font_check( 'footer-middle-typography' );
echo '.footer-middle-wrap{';
	$ats->lendiz_typo_ouput( 'footer-middle-typography' );
	$ats->lendiz_bg_settings( 'footer-middle-background' );
	$ats->lendiz_border_settings( 'footer-middle-border' );
	$ats->lendiz_padding_settings( 'footer-middle-padding' );
	$ats->lendiz_margin_settings( 'footer-middle-margin' );
echo '
}';

$middle_bg_overlay = LendizThemeStyles::lendiz_static_theme_mod( 'footer-middle-background-overlay' );
if( isset( $middle_bg_overlay ) && !empty( $middle_bg_overlay ) ):
	echo '
	.footer-middle-wrap:before {
		position: absolute;
		height: 100%;
		width: 100%;
		top: 0;
		left: 0;
		content: "";
		background-color: '. esc_attr( $middle_bg_overlay ) .';
	}';
endif;

echo '.footer-middle-wrap .widget{';
	$ats->lendiz_typo_ouput( 'footer-middle-typography' );
echo '
}';
echo '.footer-middle-wrap a{';
	$ats->lendiz_link_color( 'footer-middle-link-color', 'regular' );
echo '
}';
echo '.footer-middle-wrap a:hover{';
	$ats->lendiz_link_color( 'footer-middle-link-color', 'hover' );
echo '
}';
echo '.footer-middle-wrap a:active{';
	$ats->lendiz_link_color( 'footer-middle-link-color', 'active' );
echo '
}';

$tit_clr = LendizThemeStyles::lendiz_static_theme_mod( 'footer-middle-title-color' );
echo !empty( $tit_clr ) ? '.footer-middle-wrap .widget .widget-title { color: '. esc_attr( $tit_clr ) .'; }' : '';
echo "\n/* Footer Bottom Styles */\n";
$ats->lendiz_custom_font_check( 'footer-bottom-typography' );
echo '.footer-bottom{';
	$ats->lendiz_typo_ouput( 'footer-bottom-typography' );
	$ats->lendiz_bg_settings( 'footer-bottom-background' );
	$ats->lendiz_border_settings( 'footer-bottom-border' );
	$ats->lendiz_padding_settings( 'footer-bottom-padding' );
	$ats->lendiz_margin_settings( 'footer-bottom-margin' );
echo '
}';
echo '.footer-bottom .widget{';
	$ats->lendiz_typo_ouput( 'footer-bottom-typography' );
echo '
}';
echo '.footer-bottom a{';
	$ats->lendiz_link_color( 'footer-bottom-link-color', 'regular' );
echo '
}';
echo '.footer-bottom a:hover{';
	$ats->lendiz_link_color( 'footer-bottom-link-color', 'hover' );
echo '
}';
echo '.footer-bottom a:active{';
	$ats->lendiz_link_color( 'footer-bottom-link-color', 'active' );
echo '
}';

$tit_clr = LendizThemeStyles::lendiz_static_theme_mod( 'footer-bottom-title-color' );
echo !empty( $tit_clr ) ? '.footer-bottom-wrap .widget .widget-title { color: '. esc_attr( $tit_clr ) .'; }' : '';
echo "\n/* Theme Extra Styles */\n";
//Here your code
$theme_link_color = $ats->lendiz_link_color( 'theme-link-color', 'regular', false );
$theme_link_hover = $ats->lendiz_link_color( 'theme-link-color', 'hover', false );
$theme_link_active = $ats->lendiz_link_color( 'theme-link-color', 'active', false );
$rgb = $ats->lendiz_hex2rgba( $theme_color, 'none' );
$secondary_rgb = $ats->lendiz_hex2rgba( $secondary_color, 'none' );
/*
 * Theme Color -> $theme_color
 * Secondary Color -> $secondary_color
 * Theme RGBA -> $rgb example -> echo 'body{ background: rgba('. esc_attr( $rgb ) .', 0.5); }';
 * Theme Secondary RGBA -> $rgb example -> echo 'body{ background: rgba('. esc_attr( $secondary_rgb ) .', 0.5); }';
 * Link Colors -> $theme_link_color, $theme_link_hover, $theme_link_active
 */
echo '.theme-color {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.gradient-bg {
	background: -webkit-linear-gradient(-155deg, '. esc_attr( $theme_color ) .' 0%, '. esc_attr( $secondary_color ) .' 100%);
	background: linear-gradient(-155deg, '. esc_attr( $theme_color ) .' 0%, '. esc_attr( $secondary_color ) .' 100%);
}';
if( $secondary_color ){
	echo '.theme-color-bg {
		background-color: '. esc_attr( $theme_color ) .';
	}';
	echo '.theme-color-hbg:hover {
		background-color: '. esc_attr( $theme_color ) .' !important;
	}';
}else{
	echo '.theme-color-bg {
		background-color: '. esc_attr( $theme_color ) .';
	}';
}
echo '.secondary-color {
	color: '. esc_attr( $secondary_color ) .';
}';
echo '.default-color {
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo "\n/*----------- General Style----------- */\n";
echo '::selection {
	background : '. esc_attr( $theme_color ) .';
}';
echo '.error-404 .page-title {
	text-shadow : -1px -1px 0 '. esc_attr( $theme_color ) .', 1px -1px 0 '. esc_attr( $theme_color ) .', -1px 1px 0 #000, 1px 1px 0 #000;
}';
echo '.top-sliding-toggle.ti-minus {
	border-top-color : '. esc_attr( $theme_color ) .';
}';
echo '.owl-dot.active span {
	background : '. esc_attr( $theme_color ) .';
	border-color : '. esc_attr( $theme_color ) .';
}';
echo '.owl-prev, .owl-next {
	background : '. esc_attr( $theme_color ) .';
}';
echo '.owl-nav .owl-prev:hover, .owl-nav .owl-next:hover  {
	background : '. esc_attr( $secondary_color ) .';
}';
echo '.owl-prev::before, .owl-next::before {
	border-color : '. esc_attr( $secondary_color ) .';
}';
echo '.owl-prev:hover::before, .owl-next:hover::before {
	border-color : '. esc_attr( $secondary_color ) .';
}';
echo '.typo-a-white a:hover {
	color : '. esc_attr( $theme_color ) .';
}';
echo '.mobile-logo .main-logo a.site-title, .sticky-logo .mobile-logo .main-logo a.site-title,
.secondary-menu-area .contact-widget-info span a:hover {
	color : '. esc_attr( $theme_color ) .';
}';
echo '.btn.btn-default.br-th {
	border-color : '. esc_attr( $theme_color ) .' !important;
}';
echo "\n/*----------- Header ----------- */\n";
echo '.header-button a.btn-gd {
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 5%, '. esc_attr( $theme_color ) .' 95%) !important;
	background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 5%, '. esc_attr( $theme_color ) .' 95%) !important;
}';
echo '.header-button a.btn-gd:hover {
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $theme_color ) .' 5%, '. esc_attr( $secondary_color ) .' 95%) !important;
	background: linear-gradient(-150deg, '. esc_attr( $theme_color ) .' 5%, '. esc_attr( $secondary_color ) .' 95%) !important;
}';
echo '.lendiz-main-menu .dropdown-menu {
	border-top-color : '. esc_attr( $theme_color ) .';
}';
echo '.classic-navbar .lendiz-main-menu {
	background : '. esc_attr( $theme_color ) .';
}';
echo '.classic-navbar .lendiz-main-menu:before {
	border-bottom-color : '. esc_attr( $theme_color ) .';
}';
echo '.topbar-items .header-phone span,
.topbar-items .header-email span,
.topbar-items .header-address span,
ul.mobile-topbar-items.nav li span,
.topbar-items .social-icons li a:hover i {
	color : '. esc_attr( $theme_color ) .';
}';
echo '.lendiz-header.header-absolute.boxed-container .mini-cart-dropdown.dropdown,
.page-header a.home-link, .btn-default, .btn.btn-default,
.header-button a.btn.btn-default, .lendiz-popup-wrapper a.btn {
	background : '. esc_attr( $secondary_color ) .';
}';
echo '.header-button a.btn.btn-default:hover, 
.btn-default:hover, .btn.btn-default:hover,
.lendiz-popup-wrapper a.btn:hover {
	background : '. esc_attr( $theme_color ) .';
	border-color : '. esc_attr( $theme_color ) .';
}';
echo '.btn-default::before, .btn.btn-default::before, 
.header-button a.btn.btn-default::before, .lendiz-popup-wrapper a.btn::before, 
.elementor-button-wrapper .elementor-button::before {
	background : '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Header Logobar ----------- */\n";
echo '.header-inner .logobar-inner .media i {
	color : '. esc_attr( $theme_color ) .';
}';
echo '.header-inner .logobar-inner .media i:after {
	background : '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Menu----------- */\n";
echo '.dropdown:hover > .dropdown-menu {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.navbar ul ul ul.dropdown-menu li .nav-link:focus, 
ul.nav ul ul.dropdown-menu li .nav-link:focus {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.navbar ul ul li.menu-btn a {
	color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*----------- Search Style----------- */\n";
echo '.search-form .input-group input.form-control::-webkit-input-placeholder,
.search-form .input-group input.form-control::-moz-placeholder,
.search-form .input-group input.form-control::-ms-input-placeholder,
.search-form .input-group input.form-control:-moz-placeholder {
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo 'input[type="submit"],
.widget_search .search-form .input-group .btn:hover,
.mobile-bar-items .search-form .input-group .btn:hover {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.wp-block-search .wp-block-search__button:hover,
.widget_search .search-form .input-group .btn,
.mobile-bar-items .search-form .input-group .btn {
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Button Style----------- */\n";
echo '.btn, button, .btn.bordered:hover, .elementor-button {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.default-btn a.elementor-button:hover,
.btn.classic:hover, .section-title-wrapper a.btn:hover,
.section-title-wrapper a.btn.inverse {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.btn.link {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.btn.bordered {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.btn.btn-default.theme-color {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.btn.btn-default.secondary-color {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.rev_slider_wrapper .btn.btn-outline:hover {
	background-color: '. esc_attr( $theme_color ) .';
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.rev_slider .btn.btn-default {
	border-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.elementor-button {
	border-right-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Select Style ----------- */\n";
echo 'select:focus {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Header Styles---------------- */\n";
echo '.close:before, .close:after,
.full-search-wrapper .search-form .input-group .btn,
.full-search-wrapper .close::before, .full-search-wrapper .close::after { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.full-search-wrapper .search-form .input-group .btn:hover,
.full-search-wrapper .search-form .input-group .btn:focus,
.full-search-wrapper .search-form .input-group .btn:active {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.nav-link:focus, .nav-link:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.zmm-dropdown-toggle { 
	color: '. esc_attr( $theme_color ) .';
}';
echo 'ul li.theme-color a {
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo "\n/*----------- Post Style----------- */\n";
echo '.top-meta ul li a.read-more, 
.bottom-meta ul li a.read-more { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.single-post .post-meta li i.before-icon::before { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.single-post .entry-meta ul li a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.single-post-template .top-meta .post-meta ul.nav>li.nav-item::before { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.single-post-template .top-meta .post-meta > ul > li a:hover,
.single-post-template blockquote:before  { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.post-navigation-wrapper .nav-links.custom-post-nav>div::before,
.single-post-template article .article-inner> .top-meta .post-date:hover,
.single-post .post-meta>ul>li.nav-item .post-tags a:hover {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.post-comments-wrapper p.form-submit input:hover,
.post-navigation-wrapper .nav-links.custom-post-nav .prev-nav-link a.prev::after, 
.post-navigation-wrapper .nav-links.custom-post-nav .next-nav-link a.next::after {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.single-post .author-info,
.single-post-template article .article-inner> .top-meta .post-date:hover,
.post-navigation-wrapper .nav-links.custom-post-nav .prev-nav-link:hover a.prev::after, 
.post-navigation-wrapper .nav-links.custom-post-nav .next-nav-link:hover a.next::after {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.single-post-template blockquote .quote-author,
.single-post-template blockquote cite {
	color: '. esc_attr( $secondary_color ) .';
}';
echo '.single-post-template blockquote .quote-author::before,
.single-post-template blockquote cite::before,
.post-navigation-wrapper .nav-links.custom-post-nav .prev-nav-link:hover a.prev::after, 
.post-navigation-wrapper .nav-links.custom-post-nav .next-nav-link:hover a.next::after {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.single-post-template blockquote, 
.wp-block-quote.has-text-align-right,
blockquote.wp-block-quote.is-style-large {
    background: rgba('. esc_attr( $secondary_rgb ) .', 0.05);
}';
echo "\n/*----------- Post Navigation ---------*/\n";
echo '.post-navigation .nav-links .nav-next a, .post-navigation .nav-links .nav-previous a,
.custom-post-nav .prev-nav-link > a:hover > i, .custom-post-nav .next-nav-link > a:hover > i {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.post-navigation .nav-links .nav-next a:hover, .post-navigation .nav-links .nav-previous a:hover,
.custom-post-nav .prev-nav-link > a:hover > i, .custom-post-nav .next-nav-link > a:hover > i {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.custom-post-nav .prev-nav-link a::before,
.custom-post-nav .next-nav-link a::before {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.post-navigation-wrapper .nav-links.custom-post-nav>div > a:hover,
.custom-post-nav .prev-nav-link > a > i, .custom-post-nav .next-nav-link > a > i,
.custom-post-nav .prev-nav-link > a:hover h4, .custom-post-nav .next-nav-link > a:hover h4 {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.post-navigation-wrapper .nav-links.custom-post-nav>div h4::before {
	background: rgba('. esc_attr( $rgb ) .', 0.17);
}';	
echo "\n/*----------- Calender---------------- */\n";
echo '.calendar_wrap th, tfoot td, .wp-block-calendar table th { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Archive---------------- */\n";
echo '.widget_archive li:before { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.site-footer .widget_archive li:before { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Tag widget---------------- */\n";
echo '.widget.widget_tag_cloud a.tag-cloud-link:hover,
.single .wp-block-tag-cloud a:hover {
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Rss widget---------------- */\n";
echo '.widget-area .widget.widget_rss .widget-title a:hover {
	color: '. esc_attr( $secondary_color ) .';
}';
echo "\n/*----------- Instagram widget---------------- */\n";
echo '.null-instagram-feed p a { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Service Menu---------------- */\n";
echo '.widget .menu-item-object-lendiz-services a { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.site-footer .widget .menu-item-object-lendiz-services.current-menu-item a:hover {
	color: '. esc_attr( $theme_color ) .';	
}';
echo '.widget-area .widget .menu-item-object-lendiz-services.current-menu-item a, 
.widget-area .widget .menu-services-menu-container ul > li > a:hover {
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Service Menu---------------- */\n";
echo '.widget .menu-item-object-lendiz-service a { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Post ---------------- */\n";
echo '.grid-layout .article-inner .top-meta a.read-more::before,
.grid-layout .article-inner .entry-footer .bottom-meta a.read-more::before,
.lendiz-single-post .post-comments .comment-reply-link:before,
.comment-meta .comment-reply-link:before,
.grid-layout .article-inner> footer.entry-footer .bottom-meta .post-author span.author-name:hover,
.grid-layout .article-inner> footer.entry-footer .bottom-meta .post-date a:hover  { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.grid-layout .top-meta .post-author span.author-name:hover { 
	color: '. esc_attr( $theme_color ) .'  !important;
}';
echo '.grid-layout .article-inner> footer.entry-footer .bottom-meta .post-date i,
.grid-layout .top-meta .post-meta>ul>li.nav-item .post-category a:hover { 
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.grid-layout .top-meta .post-meta>ul>li.nav-item .post-category a,
.grid-layout .article-inner>.post-format-wrap:first-child .post-thumb-wrap::after { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.grid-layout h3.entry-title a:hover,
.grid-layout .top-meta .post-meta>ul>li.nav-item .post-date a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.grid-layout h3.entry-title::before  { 
	border-bottom-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Post Nav---------------- */\n";
echo '.zozo_advance_tab_post_widget .nav-tabs .nav-item.show .nav-link, .widget .nav-tabs .nav-link.active { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Back to top---------------- */\n";
echo '.back-to-top > i { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Shortcodes---------------- */\n";
echo '.entry-title a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.title-separator.separator-border { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-2 .pricing-title::before {     
	background-image: url('. esc_url( LENDIZ_ASSETS . '/images/divider-img.png' ) .'); 
}';
echo '.pricing-style-1 ul.pricing-features-list > li::before { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.section-title-wrapper.sep-light .title-wrap .section-title::before {     background-image: url('. esc_url( LENDIZ_ASSETS . '/images/divider-img-lt.png' ) .'); }';
echo "\n/*----------- Section Title---------------- */\n";
echo '.section-title-wrapper .title-wrap .sub-title::before,
.section-title-wrapper.text-center .title-wrap .sub-title::after {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Twitter---------------- */\n";
echo '.twitter-3 .tweet-info { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.twitter-wrapper.twitter-dark a { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*----------- Pricing table---------------- */\n";
echo '.price-text { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-1.pricing-list-active .pricing-inner-wrapper { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-1 .pricing-table-info .price-text {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-1 .pricing-table-info > .price-before {
	color: '. esc_attr( $secondary_color ) .';
}';
echo '.pricing-style-2 .price-text p,
.pricing-style-2 .pricing-table-body ul li::before { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.pricing-style-3 .pricing-title::before,
.pricing-style-3 .pricing-title::after,
.pricing-style-3 ul.pricing-features-list li:before { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.ct-price-table .pricing-table-wrapper .price-before > *,
.pricing-style-2 .corner-ribbon.top-right  { 
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo "\n/*-----------Call To Action ---------------- */\n";
echo '.theme-gradient-bg {
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%) !important;
	background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%) !important;
}';
echo "\n/*-----------Compare Pricing table---------------- */\n";
echo '.compare-pricing-wrapper .pricing-table-head, .compare-features-wrap { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.compare-pricing-style-3.compare-pricing-wrapper .btn:hover { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Counter Style---------------- */\n";
echo '.counter-wrapper.dashed-secondary-color.counter-style-1 {
    border-color: '. esc_attr( $theme_color ) .';
}';
echo '.counter-wrapper.dashed-theme-color.counter-style-1 {
    border-color: '. esc_attr( $theme_color ) .';
}';
echo '.counter-style-classic::after {
    background: '. esc_attr( $theme_color ) .';
}';
echo '.counter-value span.counter-suffix {
    color: '. esc_attr( $theme_color ) .';
}';
echo '.counter-wrapper.counter-style-2 .counter-value h3 { 
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}';
echo '.counter-wrapper.ct-counter,
.counter-style-modern:hover,
.counter-style-modern:hover::after { 
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 5%, '. esc_attr( $theme_color ) .' 95%);
	background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 5%, '. esc_attr( $theme_color ) .' 95%);
	
}';
echo "\n/*-----------day Style---------------- */\n";
echo '.day-counter-modern .day-counter > *:after {
    background: rgba('. esc_attr( $rgb ) .', 0.1);
}';
echo "\n/*-----------day Style---------------- */\n";
echo 'span.typing-text,
.typed-cursor {
    color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Testimonials---------------- */\n";
echo '.testimonial-light .client-name:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-wrapper.testimonial-default .testimonial-inner > *.testimonial-info a.client-name,
.testimonial-info .client-designation { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-wrapper.testimonial-1 a.client-name:hover,
.testimonial-wrapper.testimonial-1 .client-designation,
.testimonial-wrapper.testimonial-modern .testimonial-inner .testimonial-rating i.ti-star { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-wrapper.testimonial-1 .testimonial-inner::after,
.single-lendiz-testimonial .testimonial-info .testimonial-img:before,
.testimonial-list .testimonial-list-item .testimonial-info > *.client-designation::before,
.testimonial-wrapper.testimonial-default .testimonial-inner > .testimonial-thumb::before,
.testimonial-wrapper.testimonial-default .testimonial-inner:before { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.lendiz-content .testimonial-2 .testimonial-inner:hover, .lendiz-content .testimonial-2 .testimonial-inner:hover .testimonial-thumb img {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-wrapper.testimonial-3 .testimonial-inner .testimonial-info .client-name, 
.testimonial-wrapper.testimonial-3 .testimonial-inner .testimonial-excerpt .testimonial-excerpt-icon i,.testimonial-wrapper.testimonial-default .testimonial-inner:before { 
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.testimonial-classic.testimonial-wrapper a.client-name,
.testimonial-list .testimonial-list-item .testimonial-info a.client-name {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-wrapper.testimonial-dark.testimonial-classic .testimonial-inner .testimonial-info a.client-name {
	color: '. esc_attr( $secondary_color ) .';
}';
echo '.testimonial-list .testimonial-list-item::before {
     background-image: url('. esc_url( LENDIZ_ASSETS . '/images/quote-3.png' ) .'); 
}';
echo '.testimonial-wrapper.testimonial-default .testimonial-inner:before {
     background-image: url('. esc_url( LENDIZ_ASSETS . '/images/quote-2lt.png' ) .'); 
}';
echo '.testimonial-wrapper.testimonial-modern.testimonial-light .testimonial-inner .testimonial-thumb::before {
     background-image: url('. esc_url( LENDIZ_ASSETS . '/images/quote-lt-2.png' ) .'); 
}';
echo '.testimonial-wrapper.testimonial-modern .testimonial-inner .testimonial-thumb::before { 
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.testimonial-wrapper.testimonial-modern.testimonial-light .testimonial-inner .testimonial-thumb::before { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-list .testimonial-list-item .testimonial-thumb::after { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.testimonial-wrapper.testimonial-modern .testimonial-name a.client-name::before {
	border-top-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Events---------------- */\n";
echo '.events-date { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.event-inner .event-schedule-inner .tab-content i {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.event-details-wrap ul li:before {
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
    background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
}';
echo '.event-details-wrap ul li:after {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.single-lendiz-events .event-details-wrap > * > h4,
.event-wrapper.event-classic .event-inner .post-more a.read-more:hover::before {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.event-wrapper.event-classic .event-inner .event-date {
	background: rgba('. esc_attr( $rgb ) .', 0.1);
}';
echo '.event-wrapper.event-classic .event-inner .post-more a.read-more::before {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.single-lendiz-events .event-details-wrap > * > h4::after {     
	background-image: url('. esc_url( LENDIZ_ASSETS . '/images/diet-lt.png' ) .'); 
}';

echo "\n/*-----------Pagination---------------- */\n";
echo '.nav.pagination > li.nav-item.active a,
.nav.pagination>li.nav-item.active span,
.nav.pagination > li.nav-item span,
.nav.pagination > li.nav-item:hover a,
.nav.pagination > li.nav-item:active a,
.nav.pagination > li.nav-item:focus a {
	color: '. esc_attr( $theme_color ) .';
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.lendiz-sticky-wrapper.text_trigger a,a.lendiz-sticky-trigger {
	background: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Team---------------- */\n";
echo '.team-wrapper.team-default .team-inner .team-designation h6,
.team-info .team-title h2,.team-default .client-name { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.team-wrapper.team-default .team-inner > .team-thumb::before {
	background-image: url('. esc_url( LENDIZ_ASSETS . '/images/strip2.png' ) .');
}';
echo '.team-modern .team-name a::after,
span.animate-bubble-box:before{ 
	background: '. esc_attr( $theme_color ) .';
	filter: drop-shadow(0px 1px 2px rgba('. esc_attr( $rgb ) .', 0.5));
}';
echo 'span.animate-bubble-box:after { 
	background: '. esc_attr( $theme_color ) .';
	filter: drop-shadow(0px 1px 2px rgba('. esc_attr( $rgb ) .', 0.5));
}';
echo 'span.animate-bubble-box { 	
	box-shadow: 0px 0px 1px 0px rgba('. esc_attr( $rgb ) .',0.1), 0px 0px 1px 0px rgba('. esc_attr( $rgb ) .',0.1) inset;
}';
echo '.team-wrapper.team-default .team-inner .team-thumb .team-social-wrap ul li a:hover { 
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.team-wrapper.team-classic .team-social-wrap ul.social-icons > li > a:hover i { 
	color: '. esc_attr( $secondary_color ) .';
}';
echo '.team-wrapper.team-modern .team-inner > .team-thumb { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.team-wrapper.team-classic .team-inner .team-info-wrap .team-designation,
.team-wrapper.team-modern .team-inner:hover > .team-designation h6 { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.team-wrapper.team-classic .team-social-wrap ul.social-icons,
.team-wrapper.team-default .team-inner .team-info-wrap::before {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.team-classic .team-inner .team-info-wrap::before {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.single-lendiz-team .team-img img.wp-post-image { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Timeline---------------- */\n";
echo '.timeline-style-2 .timeline > li > .timeline-panel { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.timeline-sep-title { 
	color: '. esc_attr( $theme_color ) .';
}';

echo '.timeline-style-2 .timeline > li > .timeline-panel:before { 
	border-left-color: '. esc_attr( $theme_color ) .';
	border-right-color: '. esc_attr( $theme_color ) .';
}';
echo '.timeline-style-2 .timeline > li > .timeline-panel:after { 
	border-left-color: '. esc_attr( $theme_color ) .';
	border-right-color: '. esc_attr( $theme_color ) .';
}';
echo '.timeline-style-3 .timeline > li > .timeline-sep-title { 
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Timeline Slide---------------- */\n";
echo '.cd-horizontal-timeline .events { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.cd-horizontal-timeline .events a.selected::after { 
	background-color: '. esc_attr( $theme_color ) .';
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.cd-timeline-navigation a { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.cd-horizontal-timeline .events-content em { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.cd-horizontal-timeline .events-content li { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.cd-horizontal-timeline .events-content li .tl-triangle { 
	border-bottom-color: '. esc_attr( $theme_color ) .';
}';
echo '.cd-horizontal-timeline .events-content li > h2 { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Portfolio---------------- */\n";
echo '.portfolio-style-classic .post-overlay-items > .portfolio-popup-icon a,
.portfolio-style-classic .post-overlay-items > .portfolio-link-icon a,
.portfolio-meta-list>li a:hover {
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.portfolio-wrapper.portfolio-style-modern .post-overlay-items a:hover {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-style-classic .post-overlay-items .post-category a {
	color: '. esc_attr( $secondary_color ) .' !important;
}';
echo '.portfolio-style-modern .isotope-filter ul li.active a, 
.portfolio-style-modern .isotope-filter ul li:hover a,
.portfolio-masonry-layout .portfolio-angle .portfolio-title h4:after,
.portfolio-style-classic .portfolio-inner .post-overlay-items .post-more a.read-more {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-style-classic .post-overlay-items > .portfolio-popup-icon a:hover,
.portfolio-style-classic .post-overlay-items > .portfolio-link-icon a:hover,
.portfolio-style-modern .post-overlay-items> .portfolio-link-icon a,
.portfolio-style-modern .post-overlay-items> .portfolio-popup-icon a,
.portfolio-style-classic .post-overlay-items .bottom-meta .post-more a.read-more::before {
	 background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-style-classic .post-overlay-items .bottom-meta .post-more a.read-more::before { 
	border-color: '. esc_attr( $secondary_color ) .';
}';
echo '.portfolio-style-default .portfolio-inner > *,
.portfolio-style-classic .post-overlay-items > .portfolio-popup-icon a,
.portfolio-style-classic .post-overlay-items > .portfolio-link-icon a,
.portfolio-model-4 .portfolio-info .portfolio-meta,
.portfolio-style-default .portfolio-inner > .post-category a { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-style-default .portfolio-link-icon a:hover, 
.portfolio-style-default .portfolio-popup-icon a:hover,
.portfolio-default .portfolio-wrap .portfolio-content-wrap,
.portfolio-wrapper.portfolio-style-default .post-overlay-items .post-category a,
.portfolio-style-modern .portfolio-inner .post-overlay-items .post-category a,
.portfolio-style-default .portfolio-inner > .post-category a:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-default .portfolio-overlay .portfolio-title a:after {
	background-color: rgba('. esc_attr( $rgb ) .', 0.5);
}';
echo '.portfolio-style-default .portfolio-link-icon a,
.portfolio-style-default .portfolio-popup-icon a,
.portfolio-model-4 .portfolio-info .portfolio-meta,
.portfolio-style-classic .portfolio-inner .post-overlay-items .post-more a.read-more:hover {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.portfolio-wrapper.portfolio-style-default .owl-prev:hover, .portfolio-wrapper.portfolio-style-default .owl-next:hover {
	background-color: '. esc_attr( $secondary_color ) .';
	border-color: '. esc_attr( $secondary_color ) .';
}';
echo '.portfolio-style-default .portfolio-inner > .post-category a,
.portfolio-classic .portfolio-wrap .portfolio-content-wrap .portfolio-read-more a,
.portfolio-angle .portfolio-wrap .portfolio-content-wrap .portfolio-read-more a {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-classic .portfolio-wrap .portfolio-content-wrap .portfolio-read-more a:hover,
.portfolio-angle .portfolio-wrap .portfolio-content-wrap .portfolio-read-more a:hover,
.portfolio-single.portfolio-model-2 .portfolio-meta-title-wrap > h6 i,
.portfolio-style-default .portfolio-inner > .post-category a {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-single.portfolio-model-2 .portfolio-details .portfolio-meta-wrap,
.portfolio-single.portfolio-model-2 .portfolio-details .portfolio-meta-wrap::after {
	border-top-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-single.portfolio-model-2 .portfolio-details .portfolio-meta-wrap {
	background-color: rgba('. esc_attr( $secondary_rgb ) .', 0.03);
}';
echo '.portfolio-single.portfolio-model-2 .portfolio-meta-list>li .social-icons a:hover {
	background-color: '. esc_attr( $theme_color ) .';
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-model-4 .portfolio-info .portfolio-meta .portfolio-meta-list > li ul.portfolio-categories a:hover {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.single-lendiz-portfolio .portfolio-title h3::after,
.single-lendiz-portfolio .portfolio-related-slider h4::after,
.portfolio-related-slider .related-title {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-creative .portfolio-wrap:hover .portfolio-content-wrap {
	background-color: '. esc_attr( $theme_color ) .';
}';
/*Meta Icon*/
echo 'span.portfolio-meta-icon {
	color: '. esc_attr( $theme_color ) .';
}';
/*CPT Filter Styles*/
echo '.portfolio-filter.filter-1 ul > li.active > a, .portfolio-filter.filter-1 ul > li > a:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-1 ul > li > a, .portfolio-filter.filter-1 ul > li > a:hover {
	border: solid 1px '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-1 ul > li > a {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-1 a.portfolio-filter-item {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-masonry-layout .portfolio-classic .portfolio-content-wrap {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-2 .active a.portfolio-filter-item {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-2 li a:after {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-slide .portfolio-content-wrap {
	background: '. esc_attr( $theme_color ) .';
}'; 
echo '.portfolio-minimal .portfolio-overlay-wrap:before,
.portfolio-minimal .portfolio-overlay-wrap:after { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-classic .portfolio-overlay-wrap:before {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-archive-title a:hover {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-3 a.portfolio-filter-item {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.portfolio-filter.filter-3 li.active a.portfolio-filter-item {
	background: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Feature Box---------------- */\n";
echo '.feature-box-wrapper .feature-box-btn a.btn-link::before,
.feature-box-classic .feature-box-btn a.btn-link:hover::before,
.feature-box-wrapper.ct-process .feature-box-inner .fbox-number,
.feature-box-wrapper.ct-process .feature-box-inner .fbox-number::before,
.feature-box-classic-pro .fbox-number {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-classic .feature-box-btn a.btn-link:hover::before {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.icon-theme-color, .feature-box-wrapper .fbox-content a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-wrapper .btn.bordered:hover,
.feature-box-wrapper.ct-process::before {
    border-color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-wrapper.feature-ser:hover .feature-box-btn .btn.link,
.feature-box-wrapper.feature-ser:hover .feature-box-btn .btn.link:after {
    color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-ser:hover .feature-box-btn .btn.link::after,
.feature-box-wrapper.img-bf .feature-box-image::before {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-wrapper.border-hover-color:hover {
    border-bottom-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.feature-box-wrapper > .feature-box-title .section-title .title-bottom-line {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-btn .btn.link {
    color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-btn .btn.link::after {
    color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-wrapper.radius-design:hover,
.feature-box-wrapper.radius-design.section-active {
	background-color: '. esc_attr( $theme_color ) .' !important;
	border-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.feature-box-wrapper.radius-design .invisible-number {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-style-1 .feature-box-btn .btn.link:hover, 
.feature-box-style-1 .feature-box-btn .btn.link:hover::after {
    color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-style-2:hover {
    background-color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-style-3 .invisible-number {
    color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-style-3::after,
.bf-sh .elementor-image::before,
.feature-box-modern .media-icon-part::before {
    background-color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-modern {
    border-color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-classic.lt-style .feature-box-image img  {
    border-color: '. esc_attr( $secondary_color ) .';
}';
echo '.feature-box-wrapper.ct-slash-box .feature-box-icon::before {
	background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
}';
if( $secondary_color ){
	echo '.feature-box-wrapper:hover .feature-box-icon.theme-hcolor-bg {
		background: -webkit-linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
		background: linear-gradient(-150deg, '. esc_attr( $secondary_color ) .' 35%, '. esc_attr( $theme_color ) .' 65%);
	}';
}else{
	echo '.feature-box-wrapper:hover .feature-box-icon.theme-hcolor-bg {
		background-color: '. esc_attr( $theme_color ) .';
	}';
}
echo "\n/*-----------Flipbox---------------- */\n";
echo "[class^='imghvr-shutter-out-']:before, [class*=' imghvr-shutter-out-']:before,
[class^='imghvr-shutter-in-']:after, [class^='imghvr-shutter-in-']:before, [class*=' imghvr-shutter-in-']:after, [class*=' imghvr-shutter-in-']:before,
[class^='imghvr-reveal-']:before, [class*=' imghvr-reveal-']:before {
	background-color: ". esc_attr( $theme_color ) .";
}";

echo "\n/*-----------Flipbox---------------- */\n";
echo '.image-grid-inner:after {
	background: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Services---------------- */\n";
echo '.service-wrapper a.read-more.btn {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.service-modern .service-inner .service-title a::before,
.service-wrapper.service-modern .service-icon-img-wrap,
.service-wrapper.service-modern .service-inner .post-more a:hover,
.service-wrapper.service-modern .service-inner .post-more a::after,
.service-wrapper.service-default .service-icon-img-wrap:nth-child(2):before {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.service-wrapper.service-default .service-icon-img-wrap:last-child:before,
.service-wrapper.service-default .service-inner::before {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.service-wrapper.service-default .service-icon-img-wrap:nth-child(2):before {
	box-shadow: 0px 3px 20px 0px rgba('. esc_attr( $rgb ) .',0.47);
}';
echo '.service-wrapper.service-default .service-icon-img-wrap:last-child:before {
	box-shadow: 0px 3px 20px 0px rgba('. esc_attr( $secondary_rgb ) .',0.47);
}';
echo '.service-wrapper a.read-more.btn,
.service-wrapper.service-default .service-inner:hover a.read-more.btn {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.service-wrapper.service-classic .service-inner:hover .service-thumb img,
.service-classic .owl-carousel .owl-item.active.center .service-inner .service-thumb img,
.service-wrapper.service-default .service-inner:hover a.read-more.btn {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.service-wrapper.service-classic .service-inner:hover::before {
	background: rgba('. esc_attr( $rgb ) .', 0.2);
}';
echo "\n/*-----------Hove Box---------------- */\n";
echo '.active .round-tab-head {
	background-image: -webkit-linear-gradient(0deg, '. esc_attr( $theme_color ) .' 0%, rgba('. esc_attr( $rgb ) .',0.4) 100%);	
}';
echo "\n/*-----------Blog---------------- */\n";
echo '.top-meta ul li i, .bottom-meta ul li i { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.blog-style-3 .post-thumb { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.blog-wrapper .blog-inner .top-meta a.read-more,
article.post .bottom-meta a.read-more::before,
.services-read-more .read-more::before,
.blog-style-classic-pro .post-details-outer .top-meta li:first-child,
.blog-style-default .blog-inner .post-overlay-items .post-date a { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.services-read-more .read-more::after { 
	background: -webkit-linear-gradient(left, '. esc_attr( $theme_color ) .' 0%,rgba(237,66,102,0) 100%);
	background: linear-gradient(to right, '. esc_attr( $theme_color ) .' 0%,rgba(237,66,102,0) 100%);
	background: -moz-linear-gradient(left, '. esc_attr( $theme_color ) .' 0%,rgba(237,66,102,0) 100%);
}';
echo '.sticky-date .post-date,
.lendiz-toggle-post-wrap .switch input:checked + .slider {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.lendiz-toggle-post-wrap .switch input:focus + .slider {
	box-shadow: 0 0 1px '. esc_attr( $theme_color ) .';
}';
echo '.blog-style-default .blog-inner .bottom-meta .post-date a i,
.blog-style-default .blog-inner .post-overlay-items .post-category a {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.blog-style-default .blog-inner .top-meta ul li a, 
.blog-style-default .blog-inner .bottom-meta .post-date a,
.blog-style-classic-pro .post-date a,
.grid-layout .article-inner> footer.entry-footer .bottom-meta .post-more .read-more,
.blog-style-default .blog-inner .bottom-meta ul li a.read-more { 
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.blog-style-default .blog-inner .bottom-meta .post-date a:hover,
.grid-layout .article-inner> footer.entry-footer .bottom-meta .post-more .read-more:hover { 
	color: '. esc_attr( $secondary_color ) .' !important;
}';
echo '.blog-style-default .blog-inner .top-meta .post-date a::before,
.blog-style-list .post-date a,
.blog-style-modern .post-date a { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.blog-style-classic .post-overlay-items .post-date a,
.blog-style-classic .blog-inner .top-meta li a:hover,
.blog-style-classic .bottom-meta .post-more a.read-more:hover,
.blog-style-classic .bottom-meta .post-more a.read-more,
.blog-style-modern .blog-inner .top-meta .post-author .author-name { 
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.blog-style-classic .bottom-meta .post-more::before,
.blog-style-classic .blog-inner .entry-title > *::before { 
	border-bottom-color: '. esc_attr( $theme_color ) .';
}';
echo '.blog-style-modern .post-date a i { 
	color: '. esc_attr( $secondary_color ) .' !important;
}';
echo '.blog-style-modern .blog-inner .post-more a.read-more,
.blog-style-modern .blog-inner .post-more a.read-more:hover { 
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.blog-style-classic .post-overlay-items .post-more a {
	box-shadow: 0px 3px 20px 0px rgba('. esc_attr( $rgb ) .',0.47);
}';
echo '.blog-style-classic .post-overlay-items .post-more a,
.blog-style-modern .blog-inner .post-more a.read-more::before { 
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.blog-style-modern .blog-inner .post-overlay-items .post-category a { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.blog-style-modern .blog-inner .post-thumb::before { 
	background: rgba('. esc_attr( $secondary_rgb ) .', 0.5);
}';
echo '.blog-style-modern .blog-inner .top-meta ul li a { 
	color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Contact Info---------------- */\n";
echo '.contact-widget-info > p > span:before,
.contact-info-wrapper .icons::before {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.contact-info-wrapper.contact-info-style-2 .contact-mail a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Contact Form---------------- */\n";
echo '.contact-form-grey .wpcf7 input.wpcf7-submit, 
.contact-form-classic .wpcf7 input[type="submit"],
.contact-form-wrapper .wpcf7 input[type="submit"]:hover,
.widget-area input.wpcf7-form-control.wpcf7-submit:hover {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.widget-area input.wpcf7-form-control.wpcf7-submit, 
.contact-form-wrapper .wpcf7 input[type="submit"] {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.contact-form-wrapper.cf-default select.wpcf7-form-control,
.lendiz-popup-content .wpcf7-form-control-wrap select.wpcf7-form-control {     
	background-image: url('. esc_url( LENDIZ_ASSETS . '/images/icon-select.png' ) .');
}';
echo "\n/*-----------Contact Form---------------- */\n";
echo '.content-carousel-wrapper .owl-nav > *:hover  {
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Shape Arrow---------------- */\n";
echo '.shape-arrow .wpb_column:nth-child(2) .feature-box-wrapper, 
.shape-arrow .wpb_column:last-child .feature-box-wrapper { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.shape-arrow .wpb_column:first-child .feature-box-wrapper::before,
.shape-arrow .wpb_column:nth-child(3) .feature-box-wrapper::before { 
	border-top-color: '. esc_attr( $theme_color ) .';
	border-bottom-color: '. esc_attr( $theme_color ) .';
}';
echo '.shape-arrow .wpb_column .feature-box-wrapper::before,
.shape-arrow .wpb_column .feature-box-wrapper::after,
.shape-arrow .wpb_column:nth-child(2) .feature-box-wrapper::before,
.shape-arrow .wpb_column:nth-child(2) .feature-box-wrapper::after,
.shape-arrow .wpb_column:last-child .feature-box-wrapper::before, 
.shape-arrow .wpb_column:last-child .feature-box-wrapper::after { 
	border-left-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Booking Calendar Form---------------- */\n";
echo '.wpbc_booking_form_structure .wpbc_structure_form .form-group .btn-default {
	background: -webkit-linear-gradient(-144deg, '. esc_attr( $secondary_color ) .' 15%, '. esc_attr( $theme_color ) .' 85%);
	background: linear-gradient(-144deg, '. esc_attr( $secondary_color ) .' 15%, '. esc_attr( $theme_color ) .' 85%);
}';
echo "\n/*-----------Woocommerce---------------- */\n";
echo '.woocommerce p.stars a { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .product .onsale,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce #order_review .shop_table thead tr th.product-name, 
.woocommerce #order_review .shop_table thead tr th.product-total { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce ul.products li.product .price, .woocommerce .product .price,
.woocommerce.single .product .price, .woocommerce .product .price ins, 
.woocommerce.single .product .price ins,
.woocommerce ul.products.owl-carousel .loop-product-wrap ins .woocommerce-Price-amount.amount,
.woocommerce .summary .product_meta>span span:hover, .woocommerce .summary .product_meta>span a:hover { 
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.woocommerce div.product .product_title,
.woocommerce ul.products li.product .woocommerce-loop-product__title:hover,
.loop-product-wrap .price > .woocommerce-Price-amount {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .widget_price_filter .ui-slider .ui-slider-range { 
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.dropdown-menu.cart-dropdown-menu .mini-view-cart a:hover, .lendiz-sticky-cart .mini-view-cart a, .dropdown-menu.wishlist-dropdown-menu .mini-view-wishlist a, .lendiz-sticky-wishlist .mini-view-wishlist a, .woocommerce #review_form #respond .form-submit input:hover {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .button,
.woocommerce #review_form #respond .form-submit input,
.dropdown-menu.cart-dropdown-menu .mini-view-cart a {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.woocommerce-info,
.woocommerce-message {
	border-top-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce-info::before,
.woocommerce-message::before {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.form-control:focus,
.woocommerce form .form-row input.input-text:focus, .woocommerce form .form-row textarea:focus, .woocommerce form .form-row .input-text:focus, .woocommerce-page form .form-row .input-text:focus, .select2-container--default.select2-container--open.select2-container--below .select2-selection--single,
.woocommerce #review_form #respond input:focus, .woocommerce #review_form #respond textarea:focus {
	border-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.woocommerce nav.woocommerce-pagination ul li span.page-numbers.current,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li a:active, 
.woocommerce nav.woocommerce-pagination ul li a:focus {
	color: '. esc_attr( $theme_color ) .' !important;
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.woo-top-meta select, .select2-container--default .select2-selection--single .select2-selection__arrow b {     background-image: url('. esc_url( LENDIZ_ASSETS . '/images/icon-w-select.png' ) .'); }';
echo '.woocommerce ul.products li.product .loop-product-wrap .woo-thumb-wrap .product-icons-pack > a,
.woocommerce button.button, 
.woocommerce .product .button, 
.woocommerce.single .product .button, 
.woocommerce #review_form #respond .form-submit input,
.woocommerce #content input.button, .woocommerce button.button.alt, .woocommerce #respond input#submit, 
.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, 
.woocommerce-page #content input.button, .woocommerce-page #respond input#submit, 
.woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button,
.woocommerce input.button.alt, .woocommerce input.button.disabled, .woocommerce input.button:disabled[disabled],
.cart_totals .wc-proceed-to-checkout a.checkout-button,
.woocommerce #review_form #respond .form-submit input {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.woocommerce ul.products li.product .loop-product-wrap .woo-thumb-wrap .product-icons-pack > a:hover,
.woo-thumb-wrap .product-icons-pack > a::before,
.woocommerce button.button::before, 
.woocommerce .product .button::before, 
.woocommerce.single .product .button::before, 
.woocommerce #review_form #respond .form-submit input::before,
.woocommerce #content input.button::before, .woocommerce button.button.alt::before, .woocommerce #respond input#submit::before, 
.woocommerce a.button::before, .woocommerce button.button::before, .woocommerce input.button::before, 
.woocommerce-page #content input.button::before, .woocommerce-page #respond input#submit::before, 
.woocommerce-page a.button::before, .woocommerce-page button.button::before, .woocommerce-page input.button::before,
.woocommerce input.button.alt::before, .woocommerce input.button.disabled::before, .woocommerce input.button:disabled[disabled]::before,
.cart_totals .wc-proceed-to-checkout a.checkout-button::before {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .widget.widget_product_categories li a:hover,
.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__price span.woocommerce-Price-amount.amount,
.woocommerce div.product .stock {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce .widget.widget_product_categories li a::before {
	color: '. esc_attr( $theme_color ) .';
}';	
echo '.widget.widget_product_tag_cloud a.tag-cloud-link:hover {
	background-color: '. esc_attr( $theme_color ) .';
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.woocommerce #content input.button, .woocommerce button.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce input.button.alt, .woocommerce input.button.disabled, .woocommerce input.button:disabled[disabled], .cart_totals .wc-proceed-to-checkout a.checkout-button, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled] {
	border-right-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.woocommerce #content input.button:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce input.button.alt:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .cart_totals .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce button.button.alt:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce #review_form #respond .form-submit input:hover {
	background-color: '. esc_attr( $theme_color ) .';
	border-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Widget---------------- */\n";
echo '.widget-area .widget.widget_recent_entries ul li a:hover,
.widget-area .widget.widget_archive ul li a:hover,
.widget-area .widget.widget_pages ul li a:hover,
.widget-area .widget.widget_meta ul li a:hover,
.widget-area .widget.widget_nav_menu ul li a:hover,
.widget-area .widget.widget_recent_entries ul li a::before,
.widget-area .widget.widget_archive ul li a::before,
.widget-area .widget.widget_pages ul li a::before,
.widget-area .widget.widget_meta ul li a::before, 
.widget-area .widget.widget_nav_menu ul li a::before,
footer .widget.widget_recent_entries ul li a::before, 
footer .widget.widget_archive ul li a::before, 
footer .widget.widget_pages ul li a::before, 
footer .widget.widget_meta ul li a::before, 
footer .widget.widget_nav_menu ul li a::before, 
footer .widget_categories ul li a::before {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.widget .widget-title::before,
aside.widget-area .lendiz_latest_post_widget li .side-item-text a::before, 
aside.widget-area .lendiz_latest_post_widget li .side-item-text a::after {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.widget_categories ul li a:before, 
.widget_meta ul li a:before,
.widget_calendar td#today a,
.widget_calendar table caption {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.widget-area .widget_categories ul li a:hover,
.widget-area .widget_archive ul li a:hover,
.widget-area .widget_recent_entries ul li a:hover,
.widget-area .widget-area .widget_pages li a:hover,
.widget-area .widget_recent_entries ul li > .post-date {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.lendiz_latest_post_widget li a:hover, 
.lendiz_popular_post_widget li a:hover,
.widget-area section .widget-title a:hover {
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Mailchimp Widget---------------- */\n";
echo '.anim .popup-video-post.popup-trigger-icon:after,
.anim .popup-video-post.popup-trigger-icon:before,
.anim .popup-video-post.popup-trigger-icon,
span.popup-modal-dismiss.ti-close,
.contact-info-wrapper .contact-info-title:after {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.anim.style-2 .popup-video-post.popup-trigger-icon:after, 
.anim.style-2 .popup-video-post.popup-trigger-icon:before, 
.anim.style-2 .popup-video-post.popup-trigger-icon {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.anim.white-bg .popup-video-post.popup-trigger-icon {
	color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Modal Box---------------- */\n";
echo 'a.modal-box-trigger.modal-trigger-icon {
	color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Rounded Tab---------------- */\n";
echo '.round-tab-wrapper,.elementor-widget-container.round-tab-wrapper:after,
 .elementor-widget-container.round-tab-wrapper:before {
	border-color: '. esc_attr( $theme_color ) .';
}';


echo "\n/*-----------Mailchimp Widget---------------- */\n";
echo '.lendiz_mailchimp_widget input.zozo-mc.btn,
.lendiz_mailchimp_widget .mailchimp-wrapper button.zozo-mc.btn {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.mailchimp-wrapper.mailchimp-light .input-group .input-group-btn .mc-submit-btn,
footer .lendiz_mailchimp_widget .mailchimp-wrapper input.zozo-mc.btn:hover {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo "\n/*-----------Footer---------------- */\n";
echo '.widget .footer-info .media::before {
	color : '. esc_attr( $theme_color ) .';
}';
echo '.custom-top-footer .primary-bg,
.ft-cd-th-column {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.custom-top-footer .secondary-bg {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.current_page_item a { 
	color: '. esc_attr( $theme_color ) .';
}';
echo '.mptt-shortcode-wrapper ul.mptt-menu.mptt-navigation-tabs li.active a, .mptt-shortcode-wrapper ul.mptt-menu.mptt-navigation-tabs li:hover a { 
	border-color: '. esc_attr( $theme_color ) .';
}';

echo '.booking_form .datepick-inline .calendar-links,
.booking_form .datepick-inline td.datepick-days-cell.date2approve {
	background: '. esc_attr( $theme_color ) .';
}';
echo 'ul.social-icons.social-hbg-theme > li a:hover {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.woo-icon-count {
	background: '. esc_attr( $secondary_color ) .';
}';
echo 'footer .widget .btn.link.before-icon { 
	color: '. esc_attr( $theme_color ) .';
}';

echo 'footer .contact-widget-info > p > span:before,
footer ul > li.current-menu-item > a,
footer ul > li.current-menu-parent > a {
	color: '. esc_attr( $theme_color ) .';
}';

echo "\n/*-----------Related Slider---------------- */\n";
echo '.related-slider-content-wrap:hover .related-slider-content {
	background: rgba('. esc_attr( $rgb ) .', 0.8);
}';

echo "\n/*-----------404---------------- */\n";
echo '.error-404-area .page-title-default .breadcrumb a:hover { 
	color: '. esc_attr( $theme_color ) .';
}';

echo '@media only screen and (max-width : 991px) {
.bg-after-991 {
	background: '. esc_attr( $theme_color ) .';
}	
}';
echo "\n/*-----------Custom---------------- */\n";
echo 'form.post-password-form input[type="submit"]:hover,
.bf-sh2 .elementor-image::before {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.faq-style .elementor-accordion-item .elementor-tab-title.elementor-active, 
.faq-style .elementor-accordion-item .elementor-tab-content.elementor-active,
.elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active {
	border-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.elementor-accordion .elementor-accordion-item .elementor-tab-title:hover,
.elementor-accordion .elementor-accordion-item .elementor-tab-title:focus,
.elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active {
	background: '. esc_attr( $theme_color ) .' !important;
	border-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.post-comments span.author,
span.hgt-tl, .h-text {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.page-links > span.page-number,
a span.page-number:hover,
a span.page-number:active,
a span.page-number:focus,
span.ct-quote,
.ct-ft1 a.btn::after,
.page-links .post-page-numbers.current, .page-links .post-page-numbers:hover,
.post-comments .page-numbers.current, .post-comments .page-numbers:hover,
.page-links .post-page-numbers.current span.page-number, .page-links .post-page-numbers span.page-number:hover, 
.page-links .post-page-numbers span.page-number:active, .page-links .post-page-numbers span.page-number:focus {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.post-comments .page-numbers.current, .post-comments .page-numbers:hover,
.page-links .post-page-numbers.current, .page-links .post-page-numbers:hover,
.current span.page-number,
span.page-number:hover,
a span.page-number:hover,
.page-links .post-page-numbers.current span.page-number, .page-links .post-page-numbers span.page-number:hover, 
.page-links .post-page-numbers span.page-number:active, .page-links .post-page-numbers span.page-number:focus {
	color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.btn-inverse .btn,
.ct-ft1 a.btn:hover::after {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.ct-ft-icon2 .feature-box-inner .feature-box-image::before {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.ct-before-bg .elementor-image::before {
	background: -webkit-linear-gradient(-230deg, '. esc_attr( $theme_color ) .' 0%, '. esc_attr( $secondary_color ) .' 100%);
	background: linear-gradient(-230deg, '. esc_attr( $theme_color ) .' 0%, '. esc_attr( $secondary_color ) .' 100%);
}';
echo '.flip-box-inner.imghvr-fade .flip-box-btn a:hover,
.flip-box-inner.imghvr-fade .flip-box-btn a::after,
.ct-quote::before, .footer-top-wrap .footer-box-icon i::before {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.flip-box-inner.imghvr-fade .flip-back .flip-box-image::before,
.ct-ft1:hover::before {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.flip-box-inner.imghvr-fade .flip-back {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.comment-text span.reply a,
.ct-ft1::before {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.comment-text span.reply:hover a,
ul.social-icons.social-circled.social-bg-transparent>li a:hover,
.section-title-wrapper.bf-ct-br .section-description::before {
	background: '. esc_attr( $theme_color ) .';
}';
echo 'ul.social-icons.social-circled.social-bg-transparent>li a {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.sh-triangle .elementor-image::after {
	border-bottom-color: '. esc_attr( $secondary_color ) .';
}';
echo '.table-style1 .tablepress thead th {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.ct-app .step.calendar .ui-datepicker .ui-datepicker-current-day,
.ct-app .step.calendar .ui-datepicker-prev::before, 
.ct-app .step.calendar .ui-datepicker-next::before,
.ct-app .ea-bootstrap .step.final .ea-submit.booking-button {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.ct-app .step.calendar .ui-datepicker .selected-time, 
.ct-app .step.calendar .ui-datepicker .selected-time:hover,
.ct-app .ea-bootstrap .step.final .ea-btn.ea-cancel {
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.tribe-common .tribe-common-c-btn, .tribe-common a.tribe-common-c-btn,
.tribe-events .tribe-events-c-top-bar__nav-list-item .tribe-events-c-top-bar__nav-link--prev::before,
.tribe-events .tribe-events-c-top-bar__nav-list-item .tribe-events-c-top-bar__nav-link--next::before,
.tribe-common--breakpoint-medium .tribe-events-calendar-list__event-date-tag-daynum {
	background: '. esc_attr( $theme_color ) .';
}';
echo '.tribe-common .tribe-common-c-btn-border:hover, .tribe-common a.tribe-common-c-btn-border:hover,
.tribe-events .tribe-events-c-ical__link:active, .tribe-events .tribe-events-c-ical__link:focus, .tribe-events .tribe-events-c-ical__link:hover,
.ct-ft1:hover {
	background: '. esc_attr( $secondary_color ) .';
	border-color: '. esc_attr( $secondary_color ) .';
}';
echo '.tribe-events-c-ical a.tribe-events-c-ical__link {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.tribe-common .tribe-common-anchor-thin-alt {
	border-bottom-color: '. esc_attr( $theme_color ) .';
}';
echo '.tribe-common .tribe-common-anchor-thin-alt:active, .tribe-common .tribe-common-anchor-thin-alt:focus, .tribe-common .tribe-common-anchor-thin-alt:hover {
	border-bottom-color: '. esc_attr( $theme_color ) .';
	color: '. esc_attr( $theme_color ) .';
}';
echo '.tribe-events .tribe-events-calendar-list__event-date-tag-datetime .tribe-common-h4--min-medium,
.tribe-common--breakpoint-medium.tribe-events .tribe-events-calendar-list__event-cost,
.single-tribe_events .tribe-events-single .tribe-events-schedule .tribe-events-cost,
.tribe-events-c-ical a.tribe-events-c-ical__link, .tribe-events-calendar-month__calendar-event-tooltip-cost span,
.exp-text .exp-year {
	color: '. esc_attr( $theme_color ) .';
}';
echo '.tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date, .tribe-events .tribe-events-calendar-month__day--current .tribe-events-calendar-month__day-date-link {
	color: '. esc_attr( $secondary_color ) .';
}';
echo '.tribe-events .tribe-events-calendar-list__event-date-tag-weekday,
.single-tribe_events .tribe-events-cal-links a.tribe-events-button {
	background-color: '. esc_attr( $secondary_color ) .' !important;
}';	
echo '.ct-ft-style .feature-box-wrapper:hover .feature-box-icon span,
.sh-bf .elementor-image::before {
	background-color: '. esc_attr( $secondary_color ) .' !important;
}';
echo '.feature-box-wrapper.ct-ft-style-2::before,
.ft-opp .feature-box-classic::before,
.feature-box-classic::before {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.feature-box-wrapper.ct-ft-style-2::after,
.feature-box-wrapper.ct-ft-style-2 .feature-box-btn a.btn::before,
.before-shape .elementor-image::before, .tribe-events-nav-pagination li a,
.ft-opp .feature-box-classic::after {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.feature-box-wrapper.ft-list-style::before {
	background: rgba('. esc_attr( $rgb ) .', 0.1);
}';
echo '.bf-br::before,
.bf-shape-triangle::before {
	border-top-color: '. esc_attr( $theme_color ) .';
}';
echo '.bf-jt::before {
	border-top-color: '. esc_attr( $secondary_color ) .';
}';
echo '.lendiz-popup-dismiss span.ti-close,
.lendiz-popup-content input.wpcf7-submit:hover,
.bf-sh3::before {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.lendiz-popup-content input.wpcf7-submit  {
	border-right-color: '. esc_attr( $theme_color ) .' !important;
}';
echo '.lendiz-popup-content input.wpcf7-submit:hover {
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.lendiz-popup-content .lendiz-popup-message .popup-title,
.bf-bg::before {
	background-color: '. esc_attr( $secondary_color ) .';
}';
echo '.elementor-progress-percentage {
	background-color: '. esc_attr( $theme_color ) .';
}';
echo '.elementor-progress-percentage::after  {
	border-color: '. esc_attr( $theme_color ) .' '. esc_attr( $theme_color ) .' transparent transparent;
}';
echo '.sh-before .elementor-image::before {     
	background-image: url('. esc_url( LENDIZ_ASSETS . '/images/sh-1.png' ) .');
}';
echo "\n/*----------- Gutenberg ---------------- */\n";
echo '.wp-block-button__link,.wp-block-file .wp-block-file__button,
.wp-block-search .wp-block-search__button { 
	background: '. esc_attr( $secondary_color ) .';
}';
echo '.wp-block-button__link:hover,
.is-style-outline .wp-block-button__link:hover,
.wp-block-file a.wp-block-file__button:hover { 
	background: '. esc_attr( $theme_color ) .';
}';
echo '.wp-block-quote[style*="text-align:right"], .wp-block-quote[style*="text-align: right"] { 
	border-color: '. esc_attr( $theme_color ) .';
}';
echo '.is-style-outline { 
	color: '. esc_attr( $theme_color ) .';
}';