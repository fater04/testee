<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Middle Inner Layout
$settings = array(
	'id'			=> 'footer-middle-container',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Footer Middle Inner Layout', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer middle layout boxed or wide.', 'lendiz' ),
	'choices'		=> array(
		'boxed'		=> esc_html__( 'Boxed', 'lendiz' ),
		'wide'		=> esc_html__( 'Wide', 'lendiz' )
	),
	'default'		=> 'wide',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Middle Layout
$settings = array(
	'id'			=> 'footer-middle-layout',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Footer Middle Layout', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can choose footer middle columns layout.', 'lendiz' ),
	'default'		=> '4-4-4',
	'items' 		=> array(
		'3-3-3-3'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-1.png',
		'4-4-4'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-2.png',
		'3-6-3'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-3.png',
		'6-6'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-4.png',
		'9-3'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-5.png',
		'3-9'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-6.png',
		'4-2-2-2-2'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-8.png',
		'6-2-2-2'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-9.png',
		'12'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer/footer-7.png'		
	),
	'cols'			=> '3',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose First Column
$settings = array(
	'id'			=> 'footer-middle-sidebar-1',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose First Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing first column of footer middle.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose Second Column
$settings = array(
	'id'			=> 'footer-middle-sidebar-2',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose Second Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing second column of footer middle.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose Third Column
$settings = array(
	'id'			=> 'footer-middle-sidebar-3',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose Third Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing third column of footer middle.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose Fourth Column
$settings = array(
	'id'			=> 'footer-middle-sidebar-4',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose Fourth Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing fourth column of footer middle.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Choose Fifth Column
$settings = array(
	'id'			=> 'footer-middle-sidebar-5',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Choose Fifth Column', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing fifth column of footer middle.', 'lendiz' ),
	'default'		=> '',
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

//Footer Middle Link Color
$settings = array(
	'id'			=> 'footer-middle-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Footer Middle Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer middle link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Middle Border
$settings = array(
	'id'			=> 'footer-middle-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Footer Middle Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Middle Padding Option
$settings = array(
	'id'			=> 'footer-middle-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Footer Middle Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Middle Margin Option
$settings = array(
	'id'			=> 'footer-middle-margin',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Footer Middle Margin Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Middle Background
$settings = array(
	'id'			=> 'footer-middle-background',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Footer Middle Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Middle Background Overlay
$settings = array(
	'id'			=> 'footer-middle-background-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Footer Middle Background Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer middle background overlay color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Widget Title Color
$settings = array(
	'id'			=> 'footer-middle-title-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Widget Title Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer middle widgets title color.', 'lendiz' ),
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