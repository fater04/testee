<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Option
$settings = array(
	'id'			=> 'page-page-title-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Page Title Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title.', 'lendiz' ),
	'default'		=> 1,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Items
$settings = array(
	'id'			=> 'template-page-pagetitle-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Page Title Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed items for page title wrap, drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(),
		'Left'  => array(
			'title' => esc_html__( 'Page Title Text', 'lendiz' ),
		),
		'Center' => array(),
		'Right'  => array(
			'breadcrumb'	=> esc_html__( 'Breadcrumb', 'lendiz' )
		)
	),
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template
$settings = array(
	'id'			=> 'page-page-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Page Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current page template.', 'lendiz' ),
	'default'		=> 'right-sidebar',
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
	'id'			=> 'page-left-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Left Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on left side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Right Sidebar
$settings = array(
	'id'			=> 'page-right-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Right Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on right side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
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

//Page Title Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Page Title Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is page title style settings shows only when page title option active.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Font Color
$settings = array(
	'id'			=> 'template-page-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for current field.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Link Color
$settings = array(
	'id'			=> 'template-page-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Page Template Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose Page title bar link color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Border
$settings = array(
	'id'			=> 'template-page-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Page Template Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Padding Option
$settings = array(
	'id'			=> 'template-page-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Page Template Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Template Background
$settings = array(
	'id'			=> 'template-page-background-all',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Page Template Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Parallax
$settings = array(
	'id'			=> 'page-page-title-parallax',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Parallax', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background parallax.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Video
$settings = array(
	'id'			=> 'page-page-title-bg',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background video.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Background Video
$settings = array(
	'id'			=> 'page-page-title-video',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Page Title Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Set page title background video for page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'page-page-title-bg', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Overlay
$settings = array(
	'id'			=> 'page-page-title-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Page Title Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose page title overlay rgba color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'page-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false,
	'required'		=> array( 'page-page-title-opt', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );

//Style End
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

//Sidebar Sticky
$settings = array(
	'id'			=> 'page-sidebar-sticky',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Sidebar Sticky', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable sidebar sticky.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebar on Mobile
$settings = array(
	'id'			=> 'page-page-hide-sidebar',
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