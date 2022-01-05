<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Events Template
$settings = array(
	'id'			=> 'events-page-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Events Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current events single outer template.', 'lendiz' ),
	'default'		=> 'no-sidebar',
	'items' 		=> array(
		'no-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/1.png',
		'right-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/2.png',
		'left-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/3.png',
		'both-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/4.png'		
	),
	'cols'			=> '4',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Left Sidebar
$settings = array(
	'id'			=> 'events-left-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Left Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on left side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Right Sidebar
$settings = array(
	'id'			=> 'events-right-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Right Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on right side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Post Type Events Layout
$settings = array(
	'id'			=> 'cpt-event-layout',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Events Layout', 'lendiz' ),
	'description'	=> esc_html__( 'Select single event layout model.', 'lendiz' ),
	'choices'		=> array(
			'1' 		=> esc_html__( 'Model 1', 'lendiz' ),
			'2' 		=> esc_html__( 'Model 2', 'lendiz' )
	),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Post Type Events Settings
$settings = array(
	'id'			=> 'event-title-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Events Title', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title on single event page.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Layout End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Advanced Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Advanced', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Post Type Events Slug
$settings = array(
	'id'			=> 'cpt-events-slug',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Events Slug', 'lendiz' ),
	'description'	=> esc_html__( 'Enter events slug for register custom post type, after entered new slug click Publish button. Then go to WordPress Settings -> Permalinks -> Click save changes button to regenerate the permalinks.', 'lendiz' ),
	'default'		=> 'event',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebar on Mobile
$settings = array(
	'id'			=> 'events-page-hide-sidebar',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Sidebar on Mobile', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to show or hide sidebar on mobile.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Advanced End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );