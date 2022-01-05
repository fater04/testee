<?php

/*
 * Customizer Header/Footer Pre-Defined Layouts
 */
 
if( is_customize_preview() ){
	add_action( 'init', 'lendiz_demo_header', 10 );
	add_action( 'customize_save_after', 'lendiz_demo_header_save' );
	function lendiz_demo_header_save(){ lendiz_demo_header( 'save' ); }
}
function lendiz_demo_header( $stat = '' ){

	$lendiz_options = '';
	if( is_customize_preview() ){
		$lendiz_mod_t = get_option( 'lendiz_theme_options_t');
		$lendiz_options = !empty( $lendiz_mod_t ) ? $lendiz_mod_t : get_option( 'lendiz_theme_options_new');
	}

	$header_items = $topbar_items = '';
	$header_template = isset( $lendiz_options['header-template'] ) && $lendiz_options['header-template'] ? $lendiz_options['header-template'] : '';
	
	//Header 1
	if( $header_template == '1' ) {
		
		$header_items = '{"Normal":{"header-topbar":"Top Bar","header-logo":"Logo Section","header-nav":"Nav Bar"},"Sticky":{},"disabled":{}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_topbar_items = '{"disabled":{"header-topbar-text-2":"Custom Text 2","header-topbar-text-3":"Custom Text 3","header-topbar-search":"Search","header-cart":"Cart","header-topbar-date":"Date","header-topbar-search-toggle":"Search Toggle","header-topbar-menu":"Top Bar Menu","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email"},"Left":{"header-topbar-text-1":"Custom Text 1"},"Center":{},"Right":{"header-topbar-social":"Social"}}';
		$lendiz_options['header-topbar-items'] = json_decode( $header_topbar_items, true );

		$header_logobar_items = '{"disabled":{"header-logobar-social":"Social","header-logobar-search":"Search","header-logobar-secondary-toggle":"Secondary Toggle","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email","header-logobar-menu":"Main Menu","header-logobar-search-toggle":"Search Toggle","header-logobar-text-1":"Custom Text 1","header-logobar-text-2":"Custom Text 2","header-logobar-text-3":"Custom Text 3","header-cart":"Cart"},"Left":{"header-logobar-logo":"Logo","header-logobar-sticky-logo":"Sticky Logo"},"Center":{},"Right":{}}';
		$lendiz_options['header-logobar-items'] = json_decode( $header_logobar_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo","header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email","header-cart":"Cart"},"Left":{"header-navbar-menu":"Main Menu"},"Center":{},"Right":{"header-navbar-secondary-toggle":"Secondary Toggle","header-navbar-search-toggle":"Search Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
		$lendiz_options['header-topbar-text-1'] = isset( $lendiz_options['header-topbar-text-1'] ) && !empty( $lendiz_options['header-topbar-text-1'] ) ? $lendiz_options['header-topbar-text-1'] : 'Welcome to our website';
		$lendiz_options['social-icons-type'] = isset( $lendiz_options['social-icons-type'] ) ? 'squared' : '';
		
	//Header 2
	}elseif( $header_template == '2' ) {
		$header_items = '{"Normal":{"header-topbar":"Top Bar","header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-logo":"Logo Section"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );

		$header_topbar_items = '{"disabled":{"header-topbar-text-2":"Custom Text 2","header-topbar-text-3":"Custom Text 3","header-topbar-search":"Search","header-cart":"Cart","header-topbar-date":"Date","header-topbar-search-toggle":"Search Toggle","header-topbar-menu":"Top Bar Menu","header-topbar-social":"Social"},"Left":{"header-topbar-text-1":"Custom Text 1"},"Center":{},"Right":{"header-address":"Address Text","header-phone":"Phone Number","header-email":"Email"}}';
		$lendiz_options['header-topbar-items'] = json_decode( $header_topbar_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email","header-cart":"Cart"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{},"Right":{"header-navbar-menu":"Main Menu","header-navbar-search-toggle":"Search Toggle","header-navbar-secondary-toggle":"Secondary Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
		$lendiz_options['header-topbar-text-1'] = isset( $lendiz_options['header-topbar-text-1'] ) && !empty( $lendiz_options['header-topbar-text-1'] ) ? $lendiz_options['header-topbar-text-1'] : 'Welcome to our website';
		$lendiz_options['header-phone-text'] = isset( $lendiz_options['header-phone-text'] ) && !empty( $lendiz_options['header-phone-text'] ) ? $lendiz_options['header-phone-text'] : '1234567890';
		$lendiz_options['header-address-text'] = isset( $lendiz_options['header-address-text'] ) && !empty( $lendiz_options['header-address-text'] ) ? $lendiz_options['header-address-text'] : 'Street name, City name';
		$lendiz_options['header-email-text'] = isset( $lendiz_options['header-email-text'] ) && !empty( $lendiz_options['header-email-text'] ) ? $lendiz_options['header-email-text'] : 'info@website.com';
		
	//Header 3
	}elseif( $header_template == '3' ) {
		$header_items = '{"Normal":{"header-logo":"Logo Section","header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_logobar_items = '{"disabled":{"header-logobar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-logobar-search-toggle":"Search Toggle","header-email":"Email","header-logobar-text-1":"Custom Text 1","header-logobar-text-2":"Custom Text 2","header-logobar-text-3":"Custom Text 3","header-logobar-menu":"Main Menu","header-cart":"Cart"},"Left":{"header-logobar-social":"Social"},"Center":{"header-logobar-logo":"Logo","header-logobar-sticky-logo":"Sticky Logo"},"Right":{"header-logobar-secondary-toggle":"Secondary Toggle"}}';
		$lendiz_options['header-logobar-items'] = json_decode( $header_logobar_items, true );

		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-navbar-logo":"Logo","header-email":"Email","header-cart":"Cart","header-navbar-secondary-toggle":"Secondary Toggle","header-navbar-sticky-logo":"Stikcy Logo"},"Left":{},"Center":{"header-navbar-menu":"Main Menu","header-navbar-search-toggle":"Search Toggle"},"Right":{}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
	//Header 5
	}elseif( $header_template == '4' ) {
		$header_items = '{"Normal":{"header-logo":"Logo Section","header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_logobar_items = '{"disabled":{"header-logobar-search":"Search","header-phone":"Phone Number","header-logobar-text-1":"Custom Text 1","header-address":"Address Text","header-logobar-search-toggle":"Search Toggle","header-email":"Email","header-logobar-text-2":"Custom Text 2","header-logobar-social":"Social","header-logobar-text-3":"Custom Text 3","header-logobar-menu":"Main Menu","header-logobar-secondary-toggle":"Secondary Toggle","header-cart":"Cart"},"Left":{"header-logobar-sticky-logo":"Sticky Logo","header-logobar-logo":"Logo"},"Center":{},"Right":{"multi-info":"Address, Phone, Email"}}';
		$lendiz_options['header-logobar-items'] = json_decode( $header_logobar_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-navbar-logo":"Logo","header-email":"Email","header-cart":"Cart","header-navbar-secondary-toggle":"Secondary Toggle","header-navbar-sticky-logo":"Stikcy Logo"},"Left":{"header-navbar-menu":"Main Menu"},"Center":{},"Right":{"header-navbar-search-toggle":"Search Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
		$lendiz_options['header-address-label'] = isset( $lendiz_options['header-address-label'] ) && !empty( $lendiz_options['header-address-label'] ) ? $lendiz_options['header-address-label'] : 'Street';
		$lendiz_options['header-phone-label'] = isset( $lendiz_options['header-phone-label'] ) && !empty( $lendiz_options['header-phone-label'] ) ? $lendiz_options['header-phone-label'] : 'Contact';
		$lendiz_options['header-email-label'] = isset( $lendiz_options['header-email-label'] ) && !empty( $lendiz_options['header-email-label'] ) ? $lendiz_options['header-email-label'] : 'Email';
		$lendiz_options['header-address-text'] = isset( $lendiz_options['header-address-text'] ) && !empty( $lendiz_options['header-address-text'] ) ? $lendiz_options['header-address-text'] : '123, Snow Street, CA';
		$lendiz_options['header-phone-text'] = isset( $lendiz_options['header-phone-text'] ) && !empty( $lendiz_options['header-phone-text'] ) ? $lendiz_options['header-phone-text'] : '+123 456 789';
		$lendiz_options['header-email-text'] = isset( $lendiz_options['header-email-text'] ) && !empty( $lendiz_options['header-email-text'] ) ? $lendiz_options['header-email-text'] : 'info@email.com';
	
	//Header 6
	}elseif( $header_template == '5' ) {
		$header_items = '{"Normal":{"header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-logo":"Logo Section","header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-menu":"Main Menu","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-navbar-search-toggle":"Search Toggle","header-email":"Email","header-cart":"Cart"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{},"Right":{"header-navbar-secondary-toggle":"Secondary Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
	//Header 7
	}elseif( $header_template == '6' ) {
		$header_items = '{"Normal":{"header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-logo":"Logo Section","header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-navbar-secondary-toggle":"Secondary Toggle","header-address":"Address Text","header-email":"Email"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{},"Right":{"header-navbar-menu":"Main Menu","header-cart":"Cart","header-navbar-search-toggle":"Search Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
	//Header 8
	}elseif( $header_template == '7' ) {
		$header_items = '{"Normal":{"header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-logo":"Logo Section","header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-navbar-secondary-toggle":"Secondary Toggle","header-address":"Address Text","header-email":"Email"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{},"Right":{"header-navbar-menu":"Main Menu","header-cart":"Cart","header-navbar-search-toggle":"Search Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );

	//Header 9
	}elseif( $header_template == '8' ) {
		$header_items = '{"Normal":{"header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-logo":"Logo Section","header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-navbar-secondary-toggle":"Secondary Toggle","header-address":"Address Text","header-email":"Email"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{},"Right":{"header-navbar-menu":"Main Menu","header-cart":"Cart","header-navbar-search-toggle":"Search Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
	
	//Header 10
	}elseif( $header_template == '9' ) {
		$header_items = '{"Normal":{"header-logo":"Logo Section","header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_logobar_items = '{"disabled":{"header-logobar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-logobar-search-toggle":"Search Toggle","header-email":"Email","header-logobar-text-2":"Custom Text 2","header-logobar-social":"Social","header-logobar-text-3":"Custom Text 3","header-logobar-menu":"Main Menu","header-logobar-secondary-toggle":"Secondary Toggle","header-cart":"Cart","header-logobar-text-1":"Custom Text 1"},"Left":{},"Center":{"header-logobar-logo":"Logo","header-logobar-sticky-logo":"Sticky Logo"},"Right":{}}';
		$lendiz_options['header-logobar-items'] = json_decode( $header_logobar_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-navbar-secondary-toggle":"Secondary Toggle","header-address":"Address Text","header-email":"Email","header-cart":"Cart","header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Left":{},"Center":{"header-navbar-menu":"Main Menu","header-navbar-search-toggle":"Search Toggle"},"Right":{}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
	
	//Header 11
	}elseif( $header_template == '10' ) {
		$header_items = '{"Normal":{"header-topbar":"Top Bar","header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-logo":"Logo Section"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_topbar_items = '{"disabled":{"header-topbar-text-2":"Custom Text 2","header-topbar-text-3":"Custom Text 3","header-topbar-search":"Search","header-cart":"Cart","header-topbar-date":"Date","header-topbar-search-toggle":"Search Toggle","header-topbar-menu":"Top Bar Menu","header-topbar-social":"Social"},"Left":{"header-topbar-text-1":"Custom Text 1"},"Center":{},"Right":{"header-address":"Address Text","header-phone":"Phone Number","header-email":"Email"}}';
		$lendiz_options['header-topbar-items'] = json_decode( $header_topbar_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-secondary-toggle":"Secondary Toggle","header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{},"Right":{"header-navbar-menu":"Main Menu","header-cart":"Cart","header-navbar-search-toggle":"Search Toggle"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
		$lendiz_options['header-topbar-text-1'] = isset( $lendiz_options['header-topbar-text-1'] ) && !empty( $lendiz_options['header-topbar-text-1'] ) ? $lendiz_options['header-topbar-text-1'] : 'Welcome to our website';
		$lendiz_options['header-phone-text'] = isset( $lendiz_options['header-phone-text'] ) && !empty( $lendiz_options['header-phone-text'] ) ? $lendiz_options['header-phone-text'] : '1234567890';
		$lendiz_options['header-address-text'] = isset( $lendiz_options['header-address-text'] ) && !empty( $lendiz_options['header-address-text'] ) ? $lendiz_options['header-address-text'] : 'Street name, City name';
		$lendiz_options['header-email-text'] = isset( $lendiz_options['header-email-text'] ) && !empty( $lendiz_options['header-email-text'] ) ? $lendiz_options['header-email-text'] : 'info@website.com';
	
	//Header 12
	}elseif( $header_template == '11' ) {
		$header_items = '{"Normal":{"header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-topbar":"Top Bar","header-logo":"Logo Section"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-secondary-toggle":"Secondary Toggle","header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{},"Right":{"header-navbar-menu":"Main Menu","header-navbar-search-toggle":"Search Toggle","header-cart":"Cart"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );

	//Header 15
	}elseif( $header_template == '12' ) {
		$header_items = '{"Normal":{"header-logo":"Logo Section","header-nav":"Nav Bar"},"Sticky":{},"disabled":{"header-topbar":"Top Bar"}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_logobar_items = '{"disabled":{"header-logobar-search":"Search","header-logobar-search-toggle":"Search Toggle","header-email":"Email","header-logobar-text-2":"Custom Text 2","header-logobar-social":"Social","header-logobar-text-3":"Custom Text 3","header-logobar-menu":"Main Menu","header-logobar-secondary-toggle":"Secondary Toggle","header-cart":"Cart","header-logobar-text-1":"Custom Text 1"},"Left":{"header-phone":"Phone Number"},"Center":{"header-logobar-logo":"Logo","header-logobar-sticky-logo":"Sticky Logo"},"Right":{"header-address":"Address Text"}}';
		$lendiz_options['header-logobar-items'] = json_decode( $header_logobar_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-navbar-search":"Search","header-phone":"Phone Number","header-navbar-secondary-toggle":"Secondary Toggle","header-address":"Address Text","header-email":"Email","header-cart":"Cart","header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Left":{},"Center":{"header-navbar-menu":"Main Menu","header-navbar-search-toggle":"Search Toggle"},"Right":{}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );

	//Header 16
	}elseif( $header_template == '13' ) {
		$header_items = '{"Normal":{"header-topbar":"Top Bar","header-logo":"Logo Section","header-nav":"Nav Bar"},"Sticky":{},"disabled":{}}';
		$lendiz_options['header-items'] = json_decode( $header_items, true );
		
		$header_topbar_items = '{"disabled":{"header-topbar-text-2":"Custom Text 2","header-topbar-text-3":"Custom Text 3","header-topbar-search":"Search","header-cart":"Cart","header-topbar-date":"Date","header-topbar-search-toggle":"Search Toggle","header-topbar-menu":"Top Bar Menu","header-topbar-social":"Social"},"Left":{"header-topbar-text-1":"Custom Text 1"},"Center":{},"Right":{"header-address":"Address Text","header-phone":"Phone Number","header-email":"Email"}}';
		$lendiz_options['header-topbar-items'] = json_decode( $header_topbar_items, true );
		
		$header_logobar_items = '{"disabled":{"header-logobar-search":"Search","header-phone":"Phone Number","header-logobar-text-1":"Custom Text 1","header-address":"Address Text","header-logobar-search-toggle":"Search Toggle","header-email":"Email","header-logobar-text-2":"Custom Text 2","header-logobar-social":"Social","header-logobar-text-3":"Custom Text 3","header-logobar-menu":"Main Menu","header-logobar-secondary-toggle":"Secondary Toggle","header-cart":"Cart"},"Left":{"header-logobar-sticky-logo":"Sticky Logo","header-logobar-logo":"Logo"},"Center":{},"Right":{"multi-info":"Address, Phone, Email"}}';
		$lendiz_options['header-logobar-items'] = json_decode( $header_logobar_items, true );
		
		$header_navbar_items = '{"disabled":{"header-navbar-text-1":"Custom Text 1","header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-social":"Social","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email","header-cart":"Cart","header-navbar-search-toggle":"Search Toggle","header-navbar-secondary-toggle":"Secondary Toggle","header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Left":{"header-navbar-menu":"Main Menu"},"Center":{},"Right":{"header-navbar-search":"Search"}}';
		$lendiz_options['header-navbar-items'] = json_decode( $header_navbar_items, true );
		
		$lendiz_options['header-address-label'] = isset( $lendiz_options['header-address-label'] ) && !empty( $lendiz_options['header-address-label'] ) ? $lendiz_options['header-address-label'] : 'Street';
		$lendiz_options['header-phone-label'] = isset( $lendiz_options['header-phone-label'] ) && !empty( $lendiz_options['header-phone-label'] ) ? $lendiz_options['header-phone-label'] : 'Contact';
		$lendiz_options['header-email-label'] = isset( $lendiz_options['header-email-label'] ) && !empty( $lendiz_options['header-email-label'] ) ? $lendiz_options['header-email-label'] : 'Email';
		$lendiz_options['header-address-text'] = isset( $lendiz_options['header-address-text'] ) && !empty( $lendiz_options['header-address-text'] ) ? $lendiz_options['header-address-text'] : '123, Snow Street, CA';
		$lendiz_options['header-phone-text'] = isset( $lendiz_options['header-phone-text'] ) && !empty( $lendiz_options['header-phone-text'] ) ? $lendiz_options['header-phone-text'] : '+123 456 789';
		$lendiz_options['header-email-text'] = isset( $lendiz_options['header-email-text'] ) && !empty( $lendiz_options['header-email-text'] ) ? $lendiz_options['header-email-text'] : 'info@email.com';

	//Header 17
	}elseif( $header_template == 'vertical' ) {
		$lendiz_options['header-type'] = 'left-sticky';
		$header_fixed_items = '{"disabled":{"header-fixed-text-1":"Custom Text 1","header-fixed-text-2":"Custom Text 2","header-fixed-social":"Social"},"Top":{"header-fixed-logo":"Logo"},"Middle":{"header-fixed-menu":"Menu"},"Bottom":{"header-fixed-search":"Search Form"}}';
		$lendiz_options['header-fixed-items'] = json_decode( $header_fixed_items, true );
	}
	
	if( $header_template != 'vertical' && $header_template != 'custom' ) $lendiz_options['header-type'] = 'default';
	
	//Footer Template
	$footer_template = isset( $lendiz_options['footer-template'] ) && $lendiz_options['footer-template'] ? $lendiz_options['footer-template'] : '';
	if( $footer_template == '1' ) {
		$lendiz_options['footer-top-layout'] = '12';
		$lendiz_options['footer-top-sidebar-1'] = 'sidebar-6';
		$lendiz_options['footer-top-container'] = 'wide';
		$lendiz_options['footer-middle-sidebar-1'] = 'sidebar-2';
		
		$footer_items = '{"Enabled":{"footer-top":"Footer Top","footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":{}}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"social":"Footer Social Links","widget":"Custom Widget"},"Left":[],"Center":{"menu":"Footer Menu","copyright":"Copyright Text"},"Right":[]}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}elseif( $footer_template == '2' ) {
		$lendiz_options['footer-bottom-container'] = 'boxed';
		$footer_items = '{"Enabled":{"footer-bottom":"Footer Bottom"},"disabled":{"footer-top":"Footer Top","footer-middle":"Footer Middle"}}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"widget":"Custom Widget","menu":"Footer Menu"},"Left":{"copyright":"Copyright Text"},"Center":[],"Right":{"social":"Footer Social Links"}}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}elseif( $footer_template == '3' ) {
		$lendiz_options['footer-middle-container'] = 'boxed';
		$lendiz_options['footer-middle-sidebar-1'] = 'sidebar-2';
		$lendiz_options['footer-middle-sidebar-2'] = 'sidebar-3';
		$lendiz_options['footer-middle-sidebar-3'] = 'sidebar-4';
		
		$footer_items = '{"Enabled":{"footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":{"footer-top":"Footer Top"}}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"widget":"Custom Widget","menu":"Footer Menu","social":"Footer Social Links"},"Left":[],"Center":{"copyright":"Copyright Text"},"Right":[]}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}elseif( $footer_template == '4' ) {
		$lendiz_options['footer-middle-layout'] = '3-3-3-3';
		$lendiz_options['footer-middle-container'] = 'boxed';
		$lendiz_options['footer-middle-sidebar-1'] = 'sidebar-2';
		$lendiz_options['footer-middle-sidebar-2'] = 'sidebar-3';
		$lendiz_options['footer-middle-sidebar-3'] = 'sidebar-4';
		$lendiz_options['footer-middle-sidebar-4'] = 'sidebar-5';
		
		$footer_items = '{"Enabled":{"footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":{"footer-top":"Footer Top"}}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"widget":"Custom Widget","menu":"Footer Menu","social":"Footer Social Links"},"Left":[],"Center":{"copyright":"Copyright Text"},"Right":[]}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}elseif( $footer_template == '5' ) {
		$lendiz_options['footer-middle-layout'] = '3-3-3-3';
		$lendiz_options['footer-middle-container'] = 'boxed';
		$lendiz_options['footer-middle-sidebar-1'] = 'sidebar-2';
		$lendiz_options['footer-middle-sidebar-2'] = 'sidebar-3';
		$lendiz_options['footer-middle-sidebar-3'] = 'sidebar-4';
		$lendiz_options['footer-middle-sidebar-4'] = 'sidebar-5';
		
		$footer_items = '{"Enabled":{"footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":{"footer-top":"Footer Top"}}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"widget":"Custom Widget","menu":"Footer Menu"},"Left":{"social":"Footer Social Links"},"Center":[],"Right":{"copyright":"Copyright Text"}}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}elseif( $footer_template == '6' ) {
		$lendiz_options['footer-top-layout'] = '12';
		$lendiz_options['footer-top-sidebar-1'] = 'sidebar-6'; 
		$lendiz_options['footer-middle-layout'] = '3-6-3';
		$lendiz_options['footer-middle-container'] = 'boxed';
		$lendiz_options['footer-middle-sidebar-1'] = 'sidebar-2';
		$lendiz_options['footer-middle-sidebar-2'] = 'sidebar-3';
		$lendiz_options['footer-middle-sidebar-3'] = 'sidebar-4';
		$lendiz_options['footer-middle-sidebar-4'] = 'sidebar-5';
		
		$footer_items = '{"Enabled":{"footer-top":"Footer Top","footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":[]}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"widget":"Custom Widget","menu":"Footer Menu"},"Left":{"social":"Footer Social Links"},"Center":[],"Right":{"copyright":"Copyright Text"}}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}elseif( $footer_template == '7' ) {
		$lendiz_options['footer-middle-layout'] = '6-6';
		$lendiz_options['footer-middle-container'] = 'boxed';
		$lendiz_options['footer-middle-sidebar-1'] = 'sidebar-2';
		$lendiz_options['footer-middle-sidebar-2'] = 'sidebar-3';
		
		$footer_items = '{"Enabled":{"footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":{"footer-top":"Footer Top"}}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"widget":"Custom Widget","menu":"Footer Menu","social":"Footer Social Links"},"Left":{},"Center":{"copyright":"Copyright Text"},"Right":[]}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}elseif( $footer_template == '8' ) {
		$lendiz_options['footer-middle-layout'] = '12';
		$lendiz_options['footer-middle-container'] = 'boxed';
		$lendiz_options['footer-middle-sidebar-1'] = 'sidebar-2';
		
		$footer_items = '{"Enabled":{"footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":{"footer-top":"Footer Top"}}';
		$lendiz_options['footer-items'] = json_decode( $footer_items, true );
		
		$footer_bottom_items = '{"disabled":{"widget":"Custom Widget","menu":"Footer Menu","social":"Footer Social Links"},"Left":{},"Center":{"copyright":"Copyright Text"},"Right":[]}';
		$lendiz_options['footer-bottom-items'] = json_decode( $footer_bottom_items, true );
		
	}
	
	if( $stat == 'save' ){
		update_option( 'lendiz_theme_options_new', $lendiz_options );
		LendizThemeOpt::$lendiz_mod = $lendiz_options;
	}else{
		update_option( 'lendiz_theme_options_t', $lendiz_options );
		LendizThemeOpt::$lendiz_mod = $lendiz_options;
	}

}