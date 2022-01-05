<?php

//Theme Option -> Footer
$theme_footer_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_footer_panel', array(
	'title'			=> esc_html__( 'Footer', 'lendiz' ),
	'description'	=> esc_html__( 'These are header general settings of lendiz theme', 'lendiz' ),
	'priority'		=> 6,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_footer_panel );

//Footer -> Footer General
$lendiz_footer_general_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_footer_general_section', array(
	'title'			=> esc_html__( 'Footer General', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for general footer.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_footer_panel'
));
$wp_customize->add_section( $lendiz_footer_general_section );

//Footer General
$wp_customize->add_setting('ajax_trigger_lendiz_footer_general_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_footer_general_section', array(
	'section'		=> 'lendiz_footer_general_section'
)));

//Footer -> Footer Top
$lendiz_footer_top_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_footer_top_section', array(
	'title'			=> esc_html__( 'Footer Top', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for footer top section.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_footer_panel'
));
$wp_customize->add_section( $lendiz_footer_top_section );

//Footer Top
$wp_customize->add_setting('ajax_trigger_lendiz_footer_top_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_footer_top_section', array(
	'section'		=> 'lendiz_footer_top_section'
)));

//Footer -> Footer Middle
$lendiz_footer_middle_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_footer_middle_section', array(
	'title'			=> esc_html__( 'Footer Middle', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for footer middle section.', 'lendiz' ),
	'priority'		=> 3,
	'panel'			=> 'theme_footer_panel'
));
$wp_customize->add_section( $lendiz_footer_middle_section );

//Footer Middle
$wp_customize->add_setting('ajax_trigger_lendiz_footer_middle_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_footer_middle_section', array(
	'section'		=> 'lendiz_footer_middle_section'
)));

//Footer -> Footer Bottom
$lendiz_footer_bottom_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_footer_bottom_section', array(
	'title'			=> esc_html__( 'Footer Bottom', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for footer bottom section.', 'lendiz' ),
	'priority'		=> 4,
	'panel'			=> 'theme_footer_panel'
));
$wp_customize->add_section( $lendiz_footer_bottom_section );

//Footer Bottom
$wp_customize->add_setting('ajax_trigger_lendiz_footer_bottom_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_footer_bottom_section', array(
	'section'		=> 'lendiz_footer_bottom_section'
)));