<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Navbar Items
$settings = array(
	'id'			=> 'header-navbar-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Header Navbar Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed header navbar items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(					
			'header-navbar-text-1'		=> esc_html__( 'Custom Text 1', 'lendiz' ),
			'header-navbar-text-2'		=> esc_html__( 'Custom Text 2', 'lendiz' ),
			'header-navbar-text-3'		=> esc_html__( 'Custom Text 3', 'lendiz' ),					
			'header-navbar-social'		=> esc_html__( 'Social', 'lendiz' ),
			'header-navbar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'lendiz' ),					
			'header-navbar-search'		=> esc_html__( 'Search', 'lendiz' ),
			'header-phone'   			=> esc_html__( 'Phone Number', 'lendiz' ),
			'header-address'  			=> esc_html__( 'Address Text', 'lendiz' ),
			'header-email'   			=> esc_html__( 'Email', 'lendiz' ),
			'header-navbar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz' ),
			'header-cart'   			=> esc_html__( 'Cart', 'lendiz' )
		),
		'Left'  => array(
			'header-navbar-logo'		=> esc_html__( 'Logo', 'lendiz' ),
			'header-navbar-sticky-logo'	=> esc_html__( 'Stikcy Logo', 'lendiz' ),
			'header-navbar-menu'    	=> esc_html__( 'Main Menu', 'lendiz' )										
		),
		'Center' => array(),
		'Right' => array()
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

//Header Navbar Height
$settings = array(
	'id'			=> 'header-navbar-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Navbar Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease header navbar height. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '80',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Navbar Sticky Height
$settings = array(
	'id'			=> 'header-navbar-sticky-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Navbar Sticky Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease header navbar sticky height. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '80',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Navbar Background
$settings = array(
	'id'			=> 'header-navbar-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Header Navbar Background', 'lendiz' ),
	'description'	=> esc_html__( 'Choose navbar background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Navbar Link Color
$settings = array(
	'id'			=> 'header-navbar-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Header Navbar Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose navbar link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Navbar Border
$settings = array(
	'id'			=> 'header-navbar-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Header Navbar Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Navbar Padding Option
$settings = array(
	'id'			=> 'header-navbar-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Header Navbar Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Navbar Font Color
$settings = array(
	'id'			=> 'sticky-header-navbar-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Header Sticky Navbar Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'Set header sticky navbar font color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Navbar Background
$settings = array(
	'id'			=> 'sticky-header-navbar-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Header Sticky Navbar Background', 'lendiz' ),
	'description'	=> esc_html__( 'Choose sticky navbar background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Navbar Link Color
$settings = array(
	'id'			=> 'sticky-header-navbar-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Header Sticky Navbar Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose sticky navbar link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Navbar Border
$settings = array(
	'id'			=> 'sticky-header-navbar-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Header Sticky Navbar Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Navbar Padding Option
$settings = array(
	'id'			=> 'sticky-header-navbar-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Header Sticky Navbar Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
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

//Navbar Custom Text 1
$settings = array(
	'id'			=> 'header-navbar-text-1',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Navbar Custom Text 1', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header navbar. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Navbar Custom Text 2
$settings = array(
	'id'			=> 'header-navbar-text-2',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Navbar Custom Text 2', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header navbar. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Navbar Custom Text 3
$settings = array(
	'id'			=> 'header-navbar-text-3',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Navbar Custom Text 3', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header navbar. Here, you can place shortcode.', 'lendiz' ),
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