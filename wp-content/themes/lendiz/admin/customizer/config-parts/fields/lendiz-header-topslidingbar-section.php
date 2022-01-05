<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Top Sliding Bar Enable
$settings = array(
	'id'			=> 'header-top-sliding-switch',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Top Sliding Bar Enable', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable top sliding bar. Here you can show you sidebars width column based.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Top Sliding Bar Show on Devices
$settings = array(
	'id'			=> 'header-top-sliding-device',
	'type'			=> 'multicheck',
	'title'			=> esc_html__( 'Top Sliding Bar Show on Devices', 'lendiz' ),
	'description'	=> esc_html__( 'Enable or disable top sliding bar for mobile, tab or desktop. This option from big devices. If desktop not enable and tab enable means it\'s hide sliding bar all the devices.', 'lendiz' ),
	'default'		=> array( 'desktop', 'tab' ),
	'items' 		=> array(
		'desktop' 	=> esc_html__( 'Desktop', 'lendiz' ),
		'tab' 		=> esc_html__( 'Tablet', 'lendiz' ),
		'mobile' 	=> esc_html__( 'Mobile', 'lendiz' )
	),
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Header Top Slide Columns
$settings = array(
	'id'			=> 'header-top-sliding-cols',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Header Top Slide Columns', 'lendiz' ),
	'description'	=> esc_html__( 'Choose top sliding bar columns.', 'lendiz' ),
	'choices'		=> array(
		'3'		=> esc_html__( '4 Columns', 'lendiz' ),
		'4'		=> esc_html__( '3 Columns', 'lendiz' ),
		'6'		=> esc_html__( '2 Columns', 'lendiz' ),
		'12'	=> esc_html__( '1 Column', 'lendiz' )
	),
	'default'		=> '3',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose First Column
$settings = array(
	'id'			=> 'header-top-sliding-sidebar-1',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose First Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing first column of top sliding bar.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose Second Column
$settings = array(
	'id'			=> 'header-top-sliding-sidebar-2',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose Second Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing second column of top sliding bar.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose Third Column
$settings = array(
	'id'			=> 'header-top-sliding-sidebar-3',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose Third Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing third column of top sliding bar.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose Fourth Column
$settings = array(
	'id'			=> 'header-top-sliding-sidebar-4',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose Fourth Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing fourth column of top sliding bar.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
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

//Top Sliding Bar Background
$settings = array(
	'id'			=> 'top-sliding-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Top Sliding Bar Background', 'lendiz' ),
	'description'	=> esc_html__( 'Choose top sliding bar background color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Top Sliding Bar Link Color
$settings = array(
	'id'			=> 'top-sliding-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Top Sliding Bar Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose top sliding bar link color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Top Sliding Bar Border
$settings = array(
	'id'			=> 'top-sliding-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Top Sliding Bar Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Top Sliding Bar Padding Option
$settings = array(
	'id'			=> 'top-sliding-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Top Sliding Bar Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'header-top-sliding-switch', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Style End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );