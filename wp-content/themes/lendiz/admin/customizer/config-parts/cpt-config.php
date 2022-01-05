<?php

//Theme Option -> Custom Post Type
$cpt_config_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'cpt_config_panel', array(
	'title'			=> esc_html__( 'Custom Post Types', 'lendiz' ),
	'description'	=> esc_html__( 'Custom Post Type Settings Area.', 'lendiz' ),
	'priority'		=> 10,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $cpt_config_panel );

//Custom Post Type -> General Settings
$lendiz_cpt_general_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_cpt_general_section', array(
	'title'			=> esc_html__( 'General Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is custom post type settings area.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'cpt_config_panel'
));
$wp_customize->add_section( $lendiz_cpt_general_section );

//General Settings
$wp_customize->add_setting('ajax_trigger_lendiz_cpt_general_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_cpt_general_section', array(
	'section'		=> 'lendiz_cpt_general_section'
)));

//Custom Post Types
$lendiz_options = get_option( 'lendiz_theme_options_new' );
$selected_cpt = isset( $lendiz_options['cpt-opts'] ) && !empty( $lendiz_options['cpt-opts'] ) ? $lendiz_options['cpt-opts'] : '';

//Custom Post Type -> Team
if( !empty( $selected_cpt ) && is_array( $selected_cpt ) && in_array( 'team', $selected_cpt ) ){
	
	$lendiz_cpt_team_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_cpt_team_section', array(
		'title'			=> esc_html__( 'Team', 'lendiz' ),
		'description'	=> esc_html__( 'This is custom post type team setting.', 'lendiz' ),
		'priority'		=> 2,
		'panel'			=> 'cpt_config_panel'
	));
	$wp_customize->add_section( $lendiz_cpt_team_section );

	//Team
	$wp_customize->add_setting('ajax_trigger_lendiz_cpt_team_section', array(
		'default'           => '',
		'sanitize_callback' 	=> 'esc_attr'
	));
	$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_cpt_team_section', array(
		'section'		=> 'lendiz_cpt_team_section'
	)));

}// team CPT check end

//Custom Post Type -> Testimonial
if( !empty( $selected_cpt ) && is_array( $selected_cpt ) && in_array( 'testimonial', $selected_cpt ) ){
	$lendiz_cpt_testimonial_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_cpt_testimonial_section', array(
		'title'			=> esc_html__( 'Testimonial', 'lendiz' ),
		'description'	=> esc_html__( 'This is custom post type testimonial setting.', 'lendiz' ),
		'priority'		=> 3,
		'panel'			=> 'cpt_config_panel'
	));
	$wp_customize->add_section( $lendiz_cpt_testimonial_section );
	
	//Testimonial
	$wp_customize->add_setting('ajax_trigger_lendiz_cpt_testimonial_section', array(
		'default'           => '',
		'sanitize_callback' 	=> 'esc_attr'
	));
	$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_cpt_testimonial_section', array(
		'section'		=> 'lendiz_cpt_testimonial_section'
	)));
	
}// testimonial CPT check end

//Custom Post Type -> Events
if( !empty( $selected_cpt ) && is_array( $selected_cpt ) && in_array( 'events', $selected_cpt ) ){
	$lendiz_cpt_events_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_cpt_events_section', array(
		'title'			=> esc_html__( 'Events', 'lendiz' ),
		'description'	=> esc_html__( 'This is custom post type events setting.', 'lendiz' ),
		'priority'		=> 4,
		'panel'			=> 'cpt_config_panel'
	));
	$wp_customize->add_section( $lendiz_cpt_events_section );

	//Events
	$wp_customize->add_setting('ajax_trigger_lendiz_cpt_events_section', array(
		'default'           => '',
		'sanitize_callback' 	=> 'esc_attr'
	));
	$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_cpt_events_section', array(
		'section'		=> 'lendiz_cpt_events_section'
	)));
	
}// events CPT check end

//Custom Post Type -> Services
if( !empty( $selected_cpt ) && is_array( $selected_cpt ) && in_array( 'services', $selected_cpt ) ){
	$lendiz_cpt_services_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_cpt_services_section', array(
		'title'			=> esc_html__( 'Services', 'lendiz' ),
		'description'	=> esc_html__( 'This is custom post type Services setting.', 'lendiz' ),
		'priority'		=> 5,
		'panel'			=> 'cpt_config_panel'
	));
	$wp_customize->add_section( $lendiz_cpt_services_section );
	
	//Services
	$wp_customize->add_setting('ajax_trigger_lendiz_cpt_services_section', array(
		'default'           => '',
		'sanitize_callback' 	=> 'esc_attr'
	));
	$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_cpt_services_section', array(
		'section'		=> 'lendiz_cpt_services_section'
	)));
	
}// services CPT check end

//Custom Post Type -> Portfolio
if( !empty( $selected_cpt ) && is_array( $selected_cpt ) && in_array( 'portfolio', $selected_cpt ) ){
	$lendiz_cpt_portfolio_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_cpt_portfolio_section', array(
		'title'			=> esc_html__( 'Portfolio', 'lendiz' ),
		'description'	=> esc_html__( 'This is custom post type portfolio setting.', 'lendiz' ),
		'priority'		=> 6,
		'panel'			=> 'cpt_config_panel'
	));
	$wp_customize->add_section( $lendiz_cpt_portfolio_section );
	
	//Portfolio
	$wp_customize->add_setting('ajax_trigger_lendiz_cpt_portfolio_section', array(
		'default'           => '',
		'sanitize_callback' 	=> 'esc_attr'
	));
	$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_cpt_portfolio_section', array(
		'section'		=> 'lendiz_cpt_portfolio_section'
	)));
	
}// portfolio CPT check end