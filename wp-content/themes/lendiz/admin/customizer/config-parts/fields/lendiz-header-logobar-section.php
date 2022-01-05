<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Logo Section Items
$settings = array(
	'id'			=> 'header-logobar-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Header Logo Section Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed header logo section items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'header-logobar-social'		=> esc_html__( 'Social', 'lendiz' ),
			'header-logobar-search'		=> esc_html__( 'Search', 'lendiz' ),
			'header-logobar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'lendiz' ),	
			'header-phone'   			=> esc_html__( 'Phone Number', 'lendiz' ),
			'header-address'  			=> esc_html__( 'Address Text', 'lendiz' ),
			'header-email'   			=> esc_html__( 'Email', 'lendiz' ),
			'header-logobar-menu'   	=> esc_html__( 'Main Menu', 'lendiz' ),
			'header-logobar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz' ),
			'header-logobar-text-1'		=> esc_html__( 'Custom Text 1', 'lendiz' ),
			'header-logobar-text-2'		=> esc_html__( 'Custom Text 2', 'lendiz' ),
			'header-logobar-text-3'		=> esc_html__( 'Custom Text 3', 'lendiz' ),	
			'header-cart'   			=> esc_html__( 'Cart', 'lendiz' ),
			'multi-info'   				=> esc_html__( 'Address, Phone, Email', 'lendiz' )
		),
		'Left'  => array(
			'header-logobar-logo'		=> esc_html__( 'Logo', 'lendiz' ),
			'header-logobar-sticky-logo' => esc_html__( 'Sticky Logo', 'lendiz' )											
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

//Header Logo Section Height
$settings = array(
	'id'			=> 'header-logobar-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Logo Section Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease header logo section height. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '80',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Logo Section Sticky Height
$settings = array(
	'id'			=> 'header-logobar-sticky-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Logo Section Sticky Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease header logo section sticky height. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '80',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Logo Section Background
$settings = array(
	'id'			=> 'header-logobar-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Header Logo Section Background', 'lendiz' ),
	'description'	=> esc_html__( 'Choose logo section background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Logo Section Link Color
$settings = array(
	'id'			=> 'header-logobar-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Header Logo Section Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose logo section link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Logo Section Border
$settings = array(
	'id'			=> 'header-logobar-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Header Logo Section Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Logo Section Padding Option
$settings = array(
	'id'			=> 'header-logobar-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Header Logo Section Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Logo Section Font Color
$settings = array(
	'id'			=> 'sticky-header-logobar-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Header Sticky Logo Section Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'Set header sticky logo section font color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Logo Section Background
$settings = array(
	'id'			=> 'sticky-header-logobar-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Header Sticky Logo Section Background', 'lendiz' ),
	'description'	=> esc_html__( 'Choose sticky logo section background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Logo Section Link Color
$settings = array(
	'id'			=> 'sticky-header-logobar-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Header Sticky Logo Section Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose sticky logo section link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Logo Section Border
$settings = array(
	'id'			=> 'sticky-header-logobar-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Header Sticky Logo Section Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Logo Section Padding Option
$settings = array(
	'id'			=> 'sticky-header-logobar-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Header Sticky Logo Section Padding Option', 'lendiz' ),
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

//Logo Section Custom Text 1
$settings = array(
	'id'			=> 'header-logobar-text-1',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Logo Section Custom Text 1', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header logo section. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Logo Section Custom Text 2
$settings = array(
	'id'			=> 'header-logobar-text-2',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Logo Section Custom Text 2', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header logo section. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Logo Section Custom Text 3
$settings = array(
	'id'			=> 'header-logobar-text-3',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Logo Section Custom Text 3', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows header logo section. Here, you can place shortcode.', 'lendiz' ),
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