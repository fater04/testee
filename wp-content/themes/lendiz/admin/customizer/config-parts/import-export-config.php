<?php

//Theme Option -> Import and Export
$theme_import_export_panel = new Lendiz_WP_Customize_Panel( $wp_customize, 'theme_import_export_panel', array(
	'title'			=> esc_html__( 'Import and Export', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for import or export of current site theme options.', 'lendiz' ),
	'priority'		=> 14,
	'panel'			=> 'lendiz_theme_panel'
));
$wp_customize->add_panel( $theme_import_export_panel );

//Import and Export -> Import
$lendiz_import_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_import_section', array(
	'title'			=> esc_html__( 'Import', 'lendiz' ),
	'description'	=> esc_html__( 'This is the import setting for current theme option values.', 'lendiz' ),
	'priority'		=> 1,
	'panel'			=> 'theme_import_export_panel'
));
$wp_customize->add_section( $lendiz_import_section );

//Import
$wp_customize->add_setting('ajax_trigger_lendiz_import_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_import_section', array(
	'section'		=> 'lendiz_import_section'
)));

//Import and Export -> Export
$lendiz_export_section = new Lendiz_WP_Customize_Section( $wp_customize, 'lendiz_export_section', array(
	'title'			=> esc_html__( 'Export', 'lendiz' ),
	'description'	=> esc_html__( 'This is the export setting for current theme option values.', 'lendiz' ),
	'priority'		=> 2,
	'panel'			=> 'theme_import_export_panel'
));
$wp_customize->add_section( $lendiz_export_section );

//Export
$wp_customize->add_setting('ajax_trigger_lendiz_export_section', array(
	'default'           => '',
	'sanitize_callback' 	=> 'esc_attr'
));
$wp_customize->add_control( new Trigger_Custom_control( $wp_customize, 'ajax_trigger_lendiz_export_section', array(
	'section'		=> 'lendiz_export_section'
)));