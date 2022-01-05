<?php

//Theme Option -> Social
$theme_social_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_social_panel', array(
	'title'			=> esc_html__( 'Social', 'lendiz' ),
	'description'	=> esc_html__( 'These are the social settings of lendiz Theme', 'lendiz' ),
	'priority'		=> 9,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_social_panel );

//Header -> Social Links
$lendiz_social_links_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_social_links_section', array(
	'title'			=> esc_html__( 'Social Links', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for social links.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_social_panel'
));
$wp_customize->add_section( $lendiz_social_links_section );

//Social Links
$wp_customize->add_setting('ajax_trigger_lendiz_social_links_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_social_links_section', array(
	'section'		=> 'lendiz_social_links_section'
)));

//Header -> Social Share
$lendiz_social_share_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_social_share_section', array(
	'title'			=> esc_html__( 'Social Share', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for social share.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_social_panel'
));
$wp_customize->add_section( $lendiz_social_share_section );

//Social Share
$wp_customize->add_setting('ajax_trigger_lendiz_social_share_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_social_share_section', array(
	'section'		=> 'lendiz_social_share_section'
)));