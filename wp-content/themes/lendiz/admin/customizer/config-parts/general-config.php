<?php

//Theme Option -> General
$theme_general_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_general_panel', array(
	'title'			=> esc_html__( 'General', 'lendiz' ),
	'description'	=> esc_html__( 'These are the general settings of Lendiz theme', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_general_panel );

//General -> Layout
$lendiz_layout_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_layout_section', array(
	'title'			=> esc_html__( 'Layout', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for theme layouts', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_layout_section );

//Layout
$wp_customize->add_setting('ajax_trigger_lendiz_layout_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_layout_section', array(
	'section'		=> 'lendiz_layout_section'
)));

//General -> Loaders
$lendiz_loader_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_loader_section', array(
	'title'			=> esc_html__('Loaders', 'lendiz'),
	'description'	=> esc_html__( 'This is the setting for theme loader images.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_loader_section );

//Loaders
$wp_customize->add_setting('ajax_trigger_lendiz_loader_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_loader_section', array(
	'section'		=> 'lendiz_loader_section'
)));

//General -> Theme Logo
$lendiz_logo_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_logo_section', array(
	'title'			=> esc_html__('Site Logo\'s', 'lendiz'),
	'description'	=> esc_html__( 'This is the setting for all the site logo\'s.', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_logo_section );

//Theme Logo
$wp_customize->add_setting('ajax_trigger_lendiz_logo_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_logo_section', array(
	'section'		=> 'lendiz_logo_section'
)));

//General -> API's
$lendiz_api_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_api_section', array(
	'title'			=> esc_html__('API', 'lendiz'),
	'description'	=> esc_html__( 'This is the setting for all the api\'s where used in this site.', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_api_section );

//API's
$wp_customize->add_setting('ajax_trigger_lendiz_api_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_api_section', array(
	'section'		=> 'lendiz_api_section'
)));

//General -> Comments
$lendiz_comments_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_comments_section', array(
	'title'			=> esc_html__('Comments', 'lendiz'),
	'description'	=> esc_html__( 'This is the setting for comments.', 'lendiz' ),
	'priority'		=> 5,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_comments_section );

//Comments
$wp_customize->add_setting('ajax_trigger_lendiz_comments_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_comments_section', array(
	'section'		=> 'lendiz_comments_section'
)));

//General -> Smooth Scroll
$lendiz_smooth_scroll_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_smooth_scroll_section', array(
	'title'			=> esc_html__('Smooth Scroll', 'lendiz'),
	'description'	=> esc_html__( 'This is the setting for page smooth scroll.', 'lendiz' ),
	'priority'		=> 6,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_smooth_scroll_section );

//Smooth Scroll
$wp_customize->add_setting('ajax_trigger_lendiz_smooth_scroll_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_smooth_scroll_section', array(
	'section'		=> 'lendiz_smooth_scroll_section'
)));

//General -> Media Settings
$lendiz_media_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_media_section', array(
	'title'			=> esc_html__('Media Settings', 'lendiz'),
	'description'	=> esc_html__( 'This is the setting for media sizes', 'lendiz' ),
	'priority'		=> 7,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_media_section );

//Media Settings
$wp_customize->add_setting('ajax_trigger_lendiz_media_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_media_section', array(
	'section'		=> 'lendiz_media_section'
)));

//General -> RTL
$lendiz_rtl_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_rtl_section', array(
	'title'			=> esc_html__('RTL', 'lendiz'),
	'description'	=> esc_html__( 'This is the setting for theme view RTL', 'lendiz' ),
	'priority'		=> 8,
	'panel'			=> 'theme_general_panel'
));
$wp_customize->add_section( $lendiz_rtl_section );

//RTL
$wp_customize->add_setting('ajax_trigger_lendiz_rtl_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_rtl_section', array(
	'section'		=> 'lendiz_rtl_section'
)));