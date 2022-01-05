<?php

//Theme Option -> WooCommerce
$theme_woo_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_woo_panel', array(
	'title'			=> esc_html__( 'WooCommerce', 'lendiz' ),
	'description'	=> esc_html__( 'These are the WooCommerce settings of lendiz Theme.', 'lendiz' ),
	'priority'		=> 12,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_woo_panel );

//WooCommerce -> Woo General
$lendiz_woo_general_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_woo_general_section', array(
	'title'			=> esc_html__( 'Woo General', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for woocommerce general options.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_woo_panel'
));
$wp_customize->add_section( $lendiz_woo_general_section );

//Woo General
$wp_customize->add_setting('ajax_trigger_lendiz_woo_general_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_woo_general_section', array(
	'section'		=> 'lendiz_woo_general_section'
)));

//WooCommerce -> Archive Template
$lendiz_woo_archive_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_woo_archive_section', array(
	'title'			=> esc_html__( 'Archive Template', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for woocommerce archive page template.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_woo_panel'
));
$wp_customize->add_section( $lendiz_woo_archive_section );

//Archive Template
$wp_customize->add_setting('ajax_trigger_lendiz_woo_archive_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_woo_archive_section', array(
	'section'		=> 'lendiz_woo_archive_section'
)));

//WooCommerce -> Single Product Template
$lendiz_woo_single_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_woo_single_section', array(
	'title'			=> esc_html__( 'Single Product Template', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for woocommerce single product template.', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'theme_woo_panel'
));
$wp_customize->add_section( $lendiz_woo_single_section );

//Single Product Template
$wp_customize->add_setting('ajax_trigger_lendiz_woo_single_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_woo_single_section', array(
	'section'		=> 'lendiz_woo_single_section'
)));

//WooCommerce -> Woo Related Slider
$lendiz_general_woo_slide_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_general_woo_slide_section', array(
	'title'			=> esc_html__( 'Woo Related Slider', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for woo related products slider', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'theme_woo_panel'
));
$wp_customize->add_section( $lendiz_general_woo_slide_section );

//Woo Related Slider
$wp_customize->add_setting('ajax_trigger_lendiz_general_woo_slide_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_general_woo_slide_section', array(
	'section'		=> 'lendiz_general_woo_slide_section'
)));