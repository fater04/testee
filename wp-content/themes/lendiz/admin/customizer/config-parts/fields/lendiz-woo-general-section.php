<?php

//Woocommerce Shop Template
$settings = array(
	'id'			=> 'woo-page-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Woocommerce Shop Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current archive page template.', 'lendiz' ),
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
	'id'			=> 'woo-left-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Left Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on left side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Right Sidebar
$settings = array(
	'id'			=> 'woo-right-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Right Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on right side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Shop Columns
$settings = array(
	'id'			=> 'woo-shop-columns',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Shop Columns', 'lendiz' ),
	'description'	=> esc_html__( 'This is column settings woocommerce shop page products.', 'lendiz' ),
	'choices'		=> array(
		'2'		=> esc_html__( '2 Columns', 'lendiz' ),
		'3'		=> esc_html__( '3 Columns', 'lendiz' ),
		'4'		=> esc_html__( '4 Columns', 'lendiz' ),
		'5'		=> esc_html__( '5 Columns', 'lendiz' ),
		'6'		=> esc_html__( '6 Columns', 'lendiz' ),
	),
	'default'		=> '3',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Shop Product Per Page
$settings = array(
	'id'			=> 'woo-shop-ppp',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Shop Product Per Page', 'lendiz' ),
	'description'	=> esc_html__( 'This is column settings woocommerce related products per page', 'lendiz' ),
	'default'		=> '12',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Product Per Page
$settings = array(
	'id'			=> 'woo-related-ppp',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Related Product Per Page', 'lendiz' ),
	'description'	=> esc_html__( 'This is column settings woocommerce related products per page', 'lendiz' ),
	'default'		=> '3',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );