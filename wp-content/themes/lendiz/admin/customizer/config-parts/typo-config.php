<?php

//Theme Option -> Typography
$theme_typography_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_typography_panel', array(
	'title'			=> esc_html__( 'Typography', 'lendiz' ),
	'description'	=> esc_html__( 'These are the theme typography options', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_typography_panel );

//Typography -> General Typography
$lendiz_general_typography_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_general_typography_section', array(
	'title'			=> esc_html__( 'General Typography', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for theme general typography', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_typography_panel'
));
$wp_customize->add_section( $lendiz_general_typography_section );

//General Typography
$wp_customize->add_setting('ajax_trigger_lendiz_general_typography_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_general_typography_section', array(
	'section'		=> 'lendiz_general_typography_section'
)));

//Typography -> Widgets Typography
$lendiz_widget_typography_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_widget_typography_section', array(
	'title'			=> esc_html__( 'Widgets Typography', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for theme widgets typography', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_typography_panel'
));
$wp_customize->add_section( $lendiz_widget_typography_section );

//Widgets Typography
$wp_customize->add_setting('ajax_trigger_lendiz_widget_typography_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_widget_typography_section', array(
	'section'		=> 'lendiz_widget_typography_section'
)));

//Typography -> Menu Typography
$lendiz_menu_typography_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_menu_typography_section', array(
	'title'			=> esc_html__( 'Menu Typography', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for theme menu typography', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'theme_typography_panel'
));
$wp_customize->add_section( $lendiz_menu_typography_section );

//Menu Typography
$wp_customize->add_setting('ajax_trigger_lendiz_menu_typography_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_menu_typography_section', array(
	'section'		=> 'lendiz_menu_typography_section'
)));


//Typography -> Other Typography
$lendiz_menu_other_typography_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_menu_other_typography_section', array(
	'title'			=> esc_html__( 'Other Typography', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for other typography', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'theme_typography_panel'
));
$wp_customize->add_section( $lendiz_menu_other_typography_section );

//Other Typography
$wp_customize->add_setting('ajax_trigger_lendiz_menu_other_typography_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_menu_other_typography_section', array(
	'section'		=> 'lendiz_menu_other_typography_section'
)));