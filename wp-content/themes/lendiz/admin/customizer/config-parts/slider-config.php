<?php

//Theme Option -> Sliders
$theme_slide_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_slide_panel', array(
	'title'			=> esc_html__( 'Sliders', 'lendiz' ),
	'description'	=> esc_html__( 'These are the theme sliders settings', 'lendiz' ),
	'priority'		=> 8,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_slide_panel );

//Sliders -> Featured Slider
$lendiz_general_featured_slide_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_general_featured_slide_section', array(
	'title'			=> esc_html__( 'Featured Slider', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for featured slider', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_slide_panel'
));
$wp_customize->add_section( $lendiz_general_featured_slide_section );

//Featured Slider
$wp_customize->add_setting('ajax_trigger_lendiz_general_featured_slide_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_general_featured_slide_section', array(
	'section'		=> 'lendiz_general_featured_slide_section'
)));

//Sliders -> Related Slider
$lendiz_general_related_slide_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_general_related_slide_section', array(
	'title'			=> esc_html__( 'Related Slider', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for related slider', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_slide_panel'
));
$wp_customize->add_section( $lendiz_general_related_slide_section );

//Related Slider
$wp_customize->add_setting('ajax_trigger_lendiz_general_related_slide_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_general_related_slide_section', array(
	'section'		=> 'lendiz_general_related_slide_section'
)));

//Sliders -> Blog Post Slider
$lendiz_general_blog_slide_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_general_blog_slide_section', array(
	'title'			=> esc_html__( 'Blog Post Slider', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for blog post slider', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'theme_slide_panel'
));
$wp_customize->add_section( $lendiz_general_blog_slide_section );

//Blog Post Slider
$wp_customize->add_setting('ajax_trigger_lendiz_general_blog_slide_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_general_blog_slide_section', array(
	'section'		=> 'lendiz_general_blog_slide_section'
)));

//Sliders -> Single Post Slider
$lendiz_general_single_slide_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_general_single_slide_section', array(
	'title'			=> esc_html__( 'Single Post Slider', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for single post slider', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'theme_slide_panel'
));
$wp_customize->add_section( $lendiz_general_single_slide_section );

//Single Post Slider
$wp_customize->add_setting('ajax_trigger_lendiz_general_single_slide_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_general_single_slide_section', array(
	'section'		=> 'lendiz_general_single_slide_section'
)));