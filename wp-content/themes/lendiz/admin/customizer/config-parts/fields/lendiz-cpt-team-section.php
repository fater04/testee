<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Team Template
$settings = array(
	'id'			=> 'team-page-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Team Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current team single outer template.', 'lendiz' ),
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
	'id'			=> 'team-left-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Left Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on left side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Right Sidebar
$settings = array(
	'id'			=> 'team-right-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Right Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on right side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Post Type Team Layout
$settings = array(
	'id'			=> 'cpt-team-layout',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Team Layout', 'lendiz' ),
	'description'	=> esc_html__( 'Select single team layout model.', 'lendiz' ),
	'choices' 		=> array(
			'default' 		=> esc_html__( 'Default', 'lendiz' ),
			'classic' 		=> esc_html__( 'Classic', 'lendiz' ),
			'modern' 		=> esc_html__( 'Modern', 'lendiz' )
	),
	'default'		=> 'default',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Post Type Team Settings
$settings = array(
	'id'			=> 'team-title-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Team Title', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title on single team page.', 'lendiz' ),
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

//Custom Post Type Team Slug
$settings = array(
	'id'			=> 'cpt-team-slug',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Team Slug', 'lendiz' ),
	'description'	=> esc_html__( 'Enter team slug for register custom post type, after entered new slug click Publish button. Then go to WordPress Settings -> Permalinks -> Click save changes button to regenerate the permalinks.', 'lendiz' ),
	'default'		=> 'team',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebar on Mobile
$settings = array(
	'id'			=> 'team-page-hide-sidebar',
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