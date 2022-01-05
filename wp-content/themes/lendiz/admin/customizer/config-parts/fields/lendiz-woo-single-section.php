<?php

//Woo Single Page Title Option
$settings = array(
	'id'			=> 'single-product-page-title-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Woo Single Page Title Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable woo single page title.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Woo Single Page Title Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Woo Single Page Title Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is woo single page title style settings for page template.', 'lendiz' ),
	'section_stat'	=> true,
	'required'		=> array( 'single-product-page-title-opt', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );

//Font Color
$settings = array(
	'id'			=> 'template-single-product-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for current field.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Link Color
$settings = array(
	'id'			=> 'template-single-product-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Page Template Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose Single page title bar link color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Border
$settings = array(
	'id'			=> 'template-single-product-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Page Template Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put units like px, em etc. Example 1 1 1 1.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Padding Option
$settings = array(
	'id'			=> 'template-single-product-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Page Template Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Background
$settings = array(
	'id'			=> 'template-single-product-background-all',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Page Template Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Background Parallax
$settings = array(
	'id'			=> 'single-product-page-title-parallax',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Parallax', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background parallax.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Video
$settings = array(
	'id'			=> 'single-product-page-title-bg',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background video.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Background Video
$settings = array(
	'id'			=> 'single-product-page-title-video',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Page Title Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Set page title background video for page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-bg', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );


//Page Title Overlay
$settings = array(
	'id'			=> 'single-product-page-title-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Page Title Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose page title overlay rgba color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Woo Single Page Title Items Option
$settings = array(
	'id'			=> 'template-single-product-page-title-items-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Woo Single Page Title Items Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable to make woo single page title items custom layout.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'single-product-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Items
$settings = array(
	'id'			=> 'template-single-product-pagetitle-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Woo Single Page Title Items', 'lendiz' ),
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
	'required'		=> array( 'template-single-product-page-title-items-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Woo Single Page Title Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false,
	'required'		=> array( 'single-product-page-title-opt', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );