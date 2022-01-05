<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Topbar Items
$settings = array(
	'id'			=> 'mobile-topbar-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Mobile Topbar Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed mobile topbar items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'phone'		=> esc_html__( 'Phone', 'lendiz' ),
			'address'	=> esc_html__( 'Address', 'lendiz' ),
			'mail'		=> esc_html__( 'Mail', 'lendiz' ),
			'custom-1'		=> esc_html__( 'Custom Text', 'lendiz' ),
		),
		'Enabled'  => array()
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header Items
$settings = array(
	'id'			=> 'mobile-header-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Mobile Header Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed mobile header items drag from disabled and put enabled parts like left, center or right.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'mobile-header-cart'	=> esc_html__( 'Cart Icon', 'lendiz' )
		),
		'Left'  => array(
			'mobile-header-menu'	=> esc_html__( 'Menu Icon', 'lendiz' )		
		),
		'Center'  => array(
			'mobile-header-logo' 	=> esc_html__( 'Logo', 'lendiz' )
		),
		'Right'  => array(
			'mobile-header-search'	=> esc_html__( 'Search Icon', 'lendiz' )
		)
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Menu Items
$settings = array(
	'id'			=> 'mobile-menu-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Mobile Menu Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed mobile menu items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'mobile-menu-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz' ),
			'mobile-menu-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz' ),
			'mobile-menu-social'	=> esc_html__( 'Social', 'lendiz' )
		),
		'Top'  => array(
			'mobile-menu-logo' 		=> esc_html__( 'Logo', 'lendiz' )
		),
		'Middle'  => array(
			'mobile-menu-mainmenu'	=> esc_html__( 'Menu', 'lendiz' )
		),
		'Bottom'  => array(
			'mobile-menu-search'	=> esc_html__( 'Search Form', 'lendiz' )					
		)
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

//Mobile Header Height
$settings = array(
	'id'			=> 'mobile-header-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Mobile Header Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease mobile header width.', 'lendiz' ),
	'default'		=> '60',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header Background
$settings = array(
	'id'			=> 'mobile-header-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Mobile Header Background', 'lendiz' ),
	'description'	=> esc_html__( 'Set mobile header background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header Link Color
$settings = array(
	'id'			=> 'mobile-header-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Mobile Header Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose mobile header link color options.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header Sticky Height
$settings = array(
	'id'			=> 'mobile-header-sticky-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Mobile Header Sticky Height', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease mobile header sticky height.', 'lendiz' ),
	'default'		=> '60',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Sticky Header Background
$settings = array(
	'id'			=> 'mobile-header-sticky-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Mobile Sticky Header Background', 'lendiz' ),
	'description'	=> esc_html__( 'Set mobile sticky header background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Sticky Header Link Color
$settings = array(
	'id'			=> 'mobile-header-sticky-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Mobile Sticky Header Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose mobile sticky header link color options.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Menu Animate From
$settings = array(
	'id'			=> 'mobile-menu-animate-from',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Mobile Menu Animate From', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your mobile menu animate from left, right, top or bottom.', 'lendiz' ),
	'choices'		=> array(
		'left' 		=> esc_html__( 'Left', 'lendiz' ),
		'right' 	=> esc_html__( 'Right', 'lendiz' ),
		'top' 		=> esc_html__( 'Top', 'lendiz' ),
		'bottom' 	=> esc_html__( 'Bottom', 'lendiz' )
	),
	'default'		=> 'left',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Menu Max Width
$settings = array(
	'id'			=> 'mobile-menu-max-width',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Mobile Menu Max Width', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease mobile menu maximum width. If you need full width means just leave this empty.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Mobile Menu Link Color
$settings = array(
	'id'			=> 'mobile-menu-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Header Mobile Menu Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose mobile menu link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Mobile Menu Border
$settings = array(
	'id'			=> 'mobile-menu-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Header Mobile Menu Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Mobile Menu Padding Option
$settings = array(
	'id'			=> 'mobile-menu-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Header Mobile Menu Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Mobile Menu Background
$settings = array(
	'id'			=> 'mobile-menu-background',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Header Mobile Menu Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for mobile menu background.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
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

//Mobile Topbar Custom Text
$settings = array(
	'id'			=> 'mobile-topbar-text-1',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Mobile Topbar Custom Text', 'lendiz' ),
	'description'	=> esc_html__( 'One more custom text shows on mobile topbar. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Menu Custom Text 1
$settings = array(
	'id'			=> 'mobile-menu-text-1',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Mobile Menu Custom Text 1', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows on mobile menu space. Here, you can place shortcode.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Menu Custom Text 2
$settings = array(
	'id'			=> 'mobile-menu-text-2',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Mobile Menu Custom Text 2', 'lendiz' ),
	'description'	=> esc_html__( 'Custom text shows on mobile menu space. Here, you can place shortcode.', 'lendiz' ),
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

//Advanced Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Advanced', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Topbar Option
$settings = array(
	'id'			=> 'mobile-topbar-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Mobile Topbar Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable mobile topbar.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header From
$settings = array(
	'id'			=> 'mobile-header-from',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Mobile Header From', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your mobile header shows from tablet, tablet landscape or mobile', 'lendiz' ),
	'choices'		=> array(
		'767' 	=> esc_html__( 'Mobile', 'lendiz' ),
		'992' 	=> esc_html__( 'Tablet (portrait)', 'lendiz' ),
		'1025'	=> esc_html__( 'Tablet (landscape)', 'lendiz' ),
		'c'			=> esc_html__( 'Custom', 'lendiz' )
	),
	'default'		=> 'tab-land',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header Visual From
$settings = array(
	'id'			=> 'mobile-header-from-custom',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Custom Width Visbile Mobile Header From', 'lendiz' ),
	'description'	=> esc_html__( 'Set width in value for showing mobile header in responsive. Example 767', 'lendiz' ),
	'default'		=> '767',
	'required'		=> array( 'mobile-header-from', '=', 'c' ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header Sticky
$settings = array(
	'id'			=> 'mobile-header-sticky',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Mobile Header Sticky', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable this option to sticky mobile header.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Header Sticky Scroll Up
$settings = array(
	'id'			=> 'mobile-header-sticky-scrollup',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Mobile Header Sticky Scroll Up', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable this option to sticky mobile header only scroll up.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'mobile-header-sticky', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Advanced End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );