<?php

//Woo Page Title Option
$settings = array(
	'id'			=> 'woo-page-title-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Woo Page Title Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable woo page title.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Woo Page Title Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Woo Page Title Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is woo page title style settings for page template.', 'lendiz' ),
	'section_stat'	=> true,
	'required'		=> array( 'woo-page-title-opt', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );

//Font Color
$settings = array(
	'id'			=> 'template-woo-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for current field.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Link Color
$settings = array(
	'id'			=> 'template-woo-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Page Template Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose Woocommerce page title bar link color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Border
$settings = array(
	'id'			=> 'template-woo-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Page Template Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put units like px, em etc. Example 1 1 1 1.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Padding Option
$settings = array(
	'id'			=> 'template-woo-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Page Template Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Background
$settings = array(
	'id'			=> 'template-woo-background-all',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Page Template Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Background Parallax
$settings = array(
	'id'			=> 'woo-page-title-parallax',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Parallax', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background parallax.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Video
$settings = array(
	'id'			=> 'woo-page-title-bg',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background video.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Background Video
$settings = array(
	'id'			=> 'woo-page-title-video',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Page Title Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Set page title background video for page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-bg', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );


//Page Title Overlay
$settings = array(
	'id'			=> 'woo-page-title-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Page Title Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose page title overlay rgba color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Woo Page Title Items Option
$settings = array(
	'id'			=> 'template-woo-page-title-items-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Woo Page Title Items Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable to make woo page title items custom layout.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'woo-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Items
$settings = array(
	'id'			=> 'template-woo-pagetitle-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Woo Page Title Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed items for page title wrap, drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' 	=> array(),
		'Left'  	=> array(
			'title' => esc_html__( 'Page Title Text', 'lendiz' ),
		),
		'Center'  	=> array(),
		'Right'  	=> array(
			'breadcrumb'	=> esc_html__( 'Breadcrumb', 'lendiz' )
		)
	),
	'required'		=> array( 'template-woo-page-title-items-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Woo Page Title Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false,
	'required'		=> array( 'woo-page-title-opt', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );

//Woocommerce Archive Template
$settings = array(
	'id'			=> 'wooarchive-page-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Woocommerce Archive Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current Woocommerce Archive page template.', 'lendiz' ),
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
	'id'			=> 'wooarchive-left-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Left Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing woocommerce archive template on left sidebar.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Right Sidebar
$settings = array(
	'id'			=> 'wooarchive-right-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Right Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing woocommerce archive template on right sidebar.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Product Archive Columns
$settings = array(
	'id'			=> 'woo-shop-archive-columns',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Product Archive Columns', 'lendiz' ),
	'description'	=> esc_html__( 'This is column settings woocommerce product archive columns.', 'lendiz' ),
	'choices'		=> array(
		'2'		=> esc_html__( '2 Columns', 'lendiz' ),
		'3'		=> esc_html__( '3 Columns', 'lendiz' ),
		'4'		=> esc_html__( '4 Columns', 'lendiz' ),
		'5'		=> esc_html__( '5 Columns', 'lendiz' ),
		'6'		=> esc_html__( '6 Columns', 'lendiz' ),
	),
	'default'		=> '4',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );