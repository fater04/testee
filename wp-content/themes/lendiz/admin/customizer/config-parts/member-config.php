<?php

//Theme Option -> Member
$theme_member_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_member_panel', array(
	'title'			=> esc_html__( 'Lendiz Member Settings', 'lendiz' ),
	'description'	=> esc_html__( 'These are the lendiz member addon settings of lendiz Theme.', 'lendiz' ),
	'priority'		=> 12,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_member_panel );

//Member -> Member General
$lendiz_member_general_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_member_general_section', array(
	'title'			=> esc_html__( 'Member General', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for member general details.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_member_panel'
));
$wp_customize->add_section( $lendiz_member_general_section );

//General
$wp_customize->add_setting('ajax_trigger_lendiz_member_general_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_member_general_section', array(
	'section'		=> 'lendiz_member_general_section'
)));


//Member -> Member Google
$lendiz_member_google_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_member_google_section', array(
	'title'			=> esc_html__( 'Login via Google', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for google member.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_member_panel'
));
$wp_customize->add_section( $lendiz_member_google_section );

//Google
$wp_customize->add_setting('ajax_trigger_lendiz_member_google_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_member_google_section', array(
	'section'		=> 'lendiz_member_google_section'
)));

//Member -> Member Facebook
$lendiz_member_facebook_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_member_facebook_section', array(
	'title'			=> esc_html__( 'Login via Facebook', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for facebook member.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_member_panel'
));
$wp_customize->add_section( $lendiz_member_facebook_section );

//Facebook
$wp_customize->add_setting('ajax_trigger_lendiz_member_facebook_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_member_facebook_section', array(
	'section'		=> 'lendiz_member_facebook_section'
)));

