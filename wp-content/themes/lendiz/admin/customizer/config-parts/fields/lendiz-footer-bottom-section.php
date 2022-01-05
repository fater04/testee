<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Inner Layout
$settings = array(
	'id'			=> 'footer-bottom-container',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Footer Bottom Inner Layout', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer bottom layout boxed or wide.', 'lendiz' ),
	'choices'		=> array(
		'boxed'		=> esc_html__( 'Boxed', 'lendiz' ),
		'wide'		=> esc_html__( 'Wide', 'lendiz' )
	),
	'default'		=> 'wide',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Fixed
$settings = array(
	'id'			=> 'footer-bottom-fixed',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Footer Bottom Fixed', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable footer bottom to fixed at bottom of page.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebars
$settings = array(
	'id'			=> 'footer-bottom-widget',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Footer Bottom Widget', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on footer copyright section.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Items
$settings = array(
	'id'			=> 'footer-bottom-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Footer Bottom Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed footer bottom items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'social'	=> esc_html__( 'Footer Social Links', 'lendiz' ),
			'widget'	=> esc_html__( 'Custom Widget', 'lendiz' ),
			'menu'		=> esc_html__( 'Footer Menu', 'lendiz' )
		),
		'Left'  => array(),
		'Center'  => array(
			'copyright' => esc_html__( 'Copyright Text', 'lendiz' )
		),
		'Right'  => array()
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Layout End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Style Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Style', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Link Color
$settings = array(
	'id'			=> 'footer-bottom-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Footer Bottom Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer bottomlink color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Border
$settings = array(
	'id'			=> 'footer-bottom-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Footer Bottom Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Padding Option
$settings = array(
	'id'			=> 'footer-bottom-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Footer Bottom Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Margin Option
$settings = array(
	'id'			=> 'footer-bottom-margin',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Footer Bottom Margin Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Background
$settings = array(
	'id'			=> 'footer-bottom-background',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Footer Bottom Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Background Overlay
$settings = array(
	'id'			=> 'footer-bottom-background-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Footer Bottom Background Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer bottom background overlay color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Widget Title Color
$settings = array(
	'id'			=> 'footer-bottom-title-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Widget Title Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer bottom widgets title color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Style End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Text Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Custom Text', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Copyright Text
$settings = array(
	'id'			=> 'copyright-text',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Copyright Text', 'lendiz' ),
	'description'	=> esc_html__( 'This is the copyright text. Shown on footer bottom if enable footer bottom in footer items', 'lendiz' ),
	'default'		=> esc_html( 'Copyright 2021 Theme by zozothemes' ),
	'refresh'		=> 0,
	'instant'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Text End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );