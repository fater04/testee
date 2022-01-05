<?php

//Theme Option -> Theme Template
$theme_template_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_template_panel', array(
	'title'			=> esc_html__( 'Theme Template', 'lendiz' ),
	'description'	=> esc_html__( 'These is the template settings for page.', 'lendiz' ),
	'priority'		=> 7,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_template_panel );

//Theme Template -> Template General
$lendiz_general_template_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_general_template_section', array(
	'title'			=> esc_html__( 'Template General', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for template general.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_template_panel'
));
$wp_customize->add_section( $lendiz_general_template_section );

//Template General
$wp_customize->add_setting('ajax_trigger_lendiz_general_template_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_general_template_section', array(
	'section'		=> 'lendiz_general_template_section'
)));

//Theme Template -> Page Template
$lendiz_page_template_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_page_template_section', array(
	'title'			=> esc_html__( 'Page Template', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for page template.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_template_panel'
));
$wp_customize->add_section( $lendiz_page_template_section );

//Page Template
$wp_customize->add_setting('ajax_trigger_lendiz_page_template_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_page_template_section', array(
	'section'		=> 'lendiz_page_template_section'
)));

//Theme Template -> Blog Template
$lendiz_blog_template_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_blog_template_section', array(
	'title'			=> esc_html__( 'Blog Template', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for blog template.', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'theme_template_panel'
));
$wp_customize->add_section( $lendiz_blog_template_section );

//Blog Template
$wp_customize->add_setting('ajax_trigger_lendiz_blog_template_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_blog_template_section', array(
	'section'		=> 'lendiz_blog_template_section'
)));

//Theme Template -> Archive Template
$lendiz_archive_template_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_archive_template_section', array(
	'title'			=> esc_html__( 'Archive Template', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for archive template.', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'theme_template_panel'
));
$wp_customize->add_section( $lendiz_archive_template_section );

//Archive Template
$wp_customize->add_setting('ajax_trigger_lendiz_archive_template_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_archive_template_section', array(
	'section'		=> 'lendiz_archive_template_section'
)));

//Theme Template -> Single Post Template
$lendiz_single_post_template_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_single_post_template_section', array(
	'title'			=> esc_html__( 'Single Post Template', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for single post template.', 'lendiz' ),
	'priority'		=> 9,
	'panel'			=> 'theme_template_panel'
));
$wp_customize->add_section( $lendiz_single_post_template_section );

//Single Post Template
$wp_customize->add_setting('ajax_trigger_lendiz_single_post_template_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_single_post_template_section', array(
	'section'		=> 'lendiz_single_post_template_section'
)));