<?php

//Theme Option -> Maintenance
$theme_maintenance_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_maintenance_panel', array(
	'title'			=> esc_html__( 'Maintenance', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for maintenance of current site.', 'lendiz' ),
	'priority'		=> 11,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_maintenance_panel );

//Maintenance -> General Maintenance
$lendiz_maintenance_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_maintenance_section', array(
	'title'			=> esc_html__( 'General Maintenance', 'lendiz' ),
	'description'	=> esc_html__( 'This is the general setting for maintenance of current site.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_maintenance_panel'
));
$wp_customize->add_section( $lendiz_maintenance_section );

//General Maintenance
$wp_customize->add_setting('ajax_trigger_lendiz_maintenance_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_maintenance_section', array(
	'section'		=> 'lendiz_maintenance_section'
)));