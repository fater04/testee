<?php

//Header Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Top Bar Items
$settings = array(
	'id'			=> 'header-topbar-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Header Top Bar Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed header topbar items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'header-topbar-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz' ),
			'header-topbar-text-3'	=> esc_html__( 'Custom Text 3', 'lendiz' ),
			'header-topbar-social'	=> esc_html__( 'Social', 'lendiz' ),
			'header-topbar-search'	=> esc_html__( 'Search', 'lendiz' ),
			'header-topbar-date' 	=> esc_html__( 'Date', 'lendiz' ),
			'header-phone'   		=> esc_html__( 'Phone Number', 'lendiz' ),
			'header-address'  		=> esc_html__( 'Address Text', 'lendiz' ),
			'header-email'   		=> esc_html__( 'Email', 'lendiz' )					
		),
		'Left'  => array(
			'header-topbar-menu'    => esc_html__( 'Top Bar Menu', 'lendiz' )												
		),
		'Center' => array(),
		'Right' => array(
			'header-topbar-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz' ),
			'header-cart'   		=> esc_html__( 'Cart', 'lendiz' ),
			'header-topbar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz' )
		)
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Clik and Edit Header Layouts End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Header Style Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Style', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Top Bar Height
$settings = array(
	'id'			=> 'header-topbar-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Top Bar Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease header topbar height. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '50',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Top Bar Sticky Height
$settings = array(
	'id'			=> 'header-topbar-sticky-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Top Bar Sticky Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease header topbar sticky height. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '50',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Topbar Background
$settings = array(
	'id'			=> 'header-topbar-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Header Topbar Background', 'lendiz' ),
	'description'	=> esc_html__( 'Choose topbar background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Topbar Color
$settings = array(
	'id'			=> 'header-topbar-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Header Topbar Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose topbar link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Topbar Border
$settings = array(
	'id'			=> 'header-topbar-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Header Topbar Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Topbar Padding Option
$settings = array(
	'id'			=> 'header-topbar-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Header Topbar Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Style End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Header Custom Text
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Custom Text', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Topbar Custom Text 1
$settings = array(
	'id'			=> 'header-topbar-text-1',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Topbar Custom Text 1', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header topbar. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Topbar Custom Text 2
$settings = array(
	'id'			=> 'header-topbar-text-2',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Topbar Custom Text 2', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header topbar. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Topbar Custom Text 3
$settings = array(
	'id'			=> 'header-topbar-text-3',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Topbar Custom Text 3', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header topbar. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Date Format
$settings = array(
	'id'			=> 'header-topbar-date',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Date Format', 'lendiz' ),
	'description'	=> esc_html__( 'Enter date format like: l, F j, Y', 'lendiz' ),
	'default'		=> 'l, F j, Y',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Custom Text End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );