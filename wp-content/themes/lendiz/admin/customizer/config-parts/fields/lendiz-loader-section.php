<?php

//Page Loader
$settings = array(
	'id'			=> 'page-loader',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Page Loader', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page loader', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Loader Image
$settings = array(
	'id'			=> 'page-loader-img',
	'type'			=> 'image',
	'title'			=> esc_html__( 'Page Loader Image', 'lendiz' ),
	'description'	=> esc_html__( 'Upload Page Loader Image', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1,
	'required'		=> array( 'page-loader', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );

//Infinite Scroll Image
$settings = array(
	'id'			=> 'infinite-loader-img',
	'type'			=> 'image',
	'title'			=> esc_html__( 'Infinite Scroll Image', 'lendiz' ),
	'description'	=> esc_html__( 'Upload Infinite Scroll Image', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );