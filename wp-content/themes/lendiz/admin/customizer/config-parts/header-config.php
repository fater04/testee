<?php

//Theme Option -> Header
$theme_header_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_header_panel', array(
	'title'			=> esc_html__( 'Header', 'lendiz' ),
	'description'	=> esc_html__( 'These are header general settings of lendiz theme', 'lendiz' ),
	'priority'		=> 5,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_header_panel );

//Header -> Header General
$lendiz_header_general_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_header_general_section', array(
	'title'			=> esc_html__( 'Header General', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for general header.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_header_panel'
));
$wp_customize->add_section( $lendiz_header_general_section );

//Header General
$wp_customize->add_setting('ajax_trigger_lendiz_header_general_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_header_general_section', array(
	'section'		=> 'lendiz_header_general_section'
)));

//Header -> Header Top Section
$lendiz_header_topbar_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_header_topbar_section', array(
	'title'			=> esc_html__( 'Header Top', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for header top.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_header_panel'
));
$wp_customize->add_section( $lendiz_header_topbar_section );

//Header Top
$wp_customize->add_setting('ajax_trigger_lendiz_header_topbar_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_header_topbar_section', array(
	'section'		=> 'lendiz_header_topbar_section'
)));

//Header -> Header Middle Section
$lendiz_header_logobar_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_header_logobar_section', array(
	'title'			=> esc_html__( 'Header Middle', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for header middle(logo section).', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'theme_header_panel'
));
$wp_customize->add_section( $lendiz_header_logobar_section );

//Header Middle
$wp_customize->add_setting('ajax_trigger_lendiz_header_logobar_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_header_logobar_section', array(
	'section'		=> 'lendiz_header_logobar_section'
)));

//Header -> Header Navbar Section
$lendiz_header_navbar_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_header_navbar_section', array(
	'title'			=> esc_html__( 'Header Bottom', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for header bottom(navbar).', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'theme_header_panel'
));
$wp_customize->add_section( $lendiz_header_navbar_section );

//Header Navbar
$wp_customize->add_setting('ajax_trigger_lendiz_header_navbar_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_header_navbar_section', array(
	'section'		=> 'lendiz_header_navbar_section'
)));

//Header -> Header Left/Right Navbar
$lendiz_header_fixed_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_header_fixed_section', array(
	'title'			=> esc_html__( 'Left/Right Navbar', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for header left/right navbar.', 'lendiz' ),
	'priority'		=> 5,
	'panel'			=> 'theme_header_panel'
));
$wp_customize->add_section( $lendiz_header_fixed_section );

//Header Left/Right
$wp_customize->add_setting('ajax_trigger_lendiz_header_fixed_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_header_fixed_section', array(
	'section'		=> 'lendiz_header_fixed_section'
)));

//Header -> Mobile Menu
$lendiz_mobile_menu_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_mobile_menu_section', array(
	'title'			=> esc_html__( 'Mobile Menu', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for mobile header and mobile menu.', 'lendiz' ),
	'priority'		=> 6,
	'panel'			=> 'theme_header_panel'
));
$wp_customize->add_section( $lendiz_mobile_menu_section );

//Mobile Menu
$wp_customize->add_setting('ajax_trigger_lendiz_mobile_menu_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_mobile_menu_section', array(
	'section'		=> 'lendiz_mobile_menu_section'
)));

//Header -> Top Sliding Bar
$lendiz_header_topslidingbar_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_header_topslidingbar_section', array(
	'title'			=> esc_html__( 'Top Sliding Bar', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for top sliding bar.', 'lendiz' ),
	'priority'		=> 7,
	'panel'			=> 'theme_header_panel'
));
$wp_customize->add_section( $lendiz_header_topslidingbar_section );

//Top Sliding Bar
$wp_customize->add_setting('ajax_trigger_lendiz_header_topslidingbar_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_header_topslidingbar_section', array(
	'section'		=> 'lendiz_header_topslidingbar_section'
)));