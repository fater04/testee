<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky/Fixed Items
$settings = array(
	'id'			=> 'header-fixed-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Header Sticky/Fixed Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed header fixed items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'header-fixed-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz' ),
			'header-fixed-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz' ),
			'header-fixed-search'	=> esc_html__( 'Search Form', 'lendiz' ),
			'header-fixed-social'	=> esc_html__( 'Social', 'lendiz' )
		),
		'Top'  => array(						
			'header-fixed-logo' => esc_html__( 'Logo', 'lendiz' )
		),
		'Middle'  => array(
			'header-fixed-menu'	=> esc_html__( 'Menu', 'lendiz' )						
		),
		'Bottom'  => array()
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

//Header Sticky/Fixed Width
$settings = array(
	'id'			=> 'header-fixed-width',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Sticky/Fixed Width', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease header fixed width. Here no need to put dimension units like px, em etc. Example 350', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky/Fixed Link Color
$settings = array(
	'id'			=> 'header-fixed-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Header Sticky/Fixed Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose fixed link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky/Fixed Border
$settings = array(
	'id'			=> 'header-fixed-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Header Sticky/Fixed Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky/Fixed Padding Option
$settings = array(
	'id'			=> 'header-fixed-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Header Sticky/Fixed Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background
$settings = array(
	'id'			=> 'header-fixed-background',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for sticky/fixed header background.', 'lendiz' ),
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

//Sticky/Fixed Custom Text 1
$settings = array(
	'id'			=> 'header-fixed-text-1',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Sticky/Fixed Custom Text 1', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header fixed. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sticky/Fixed Custom Text 2
$settings = array(
	'id'			=> 'header-fixed-text-2',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Sticky/Fixed Custom Text 2', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header fixed. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Text End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );