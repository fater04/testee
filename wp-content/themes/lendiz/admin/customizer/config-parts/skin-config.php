<?php

//Theme Option -> Skin
$theme_skin_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_skin_panel', array(
	'title'			=> esc_html__( 'Skin', 'lendiz' ),
	'description'	=> esc_html__( 'These are theme skin/color options', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_skin_panel );

//General -> Theme Skin
$lendiz_theme_skin_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_theme_skin_section', array(
	'title'			=> esc_html__( 'Theme Skin', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for theme skin', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_skin_panel'
));
$wp_customize->add_section( $lendiz_theme_skin_section );

//Theme Skin
$wp_customize->add_setting('ajax_trigger_lendiz_theme_skin_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_theme_skin_section', array(
	'section'		=> 'lendiz_theme_skin_section'
)));

//General -> Body Background
$lendiz_body_skin_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_body_skin_section', array(
	'title'			=> esc_html__( 'Body Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for theme body background.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_skin_panel'
));
$wp_customize->add_section( $lendiz_body_skin_section );

//Body Background
$wp_customize->add_setting('ajax_trigger_lendiz_body_skin_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_body_skin_section', array(
	'section'		=> 'lendiz_body_skin_section'
)));