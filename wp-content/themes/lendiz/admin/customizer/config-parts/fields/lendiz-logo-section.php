<?php

//Logo
$settings = array(
	'id'			=> 'logo',
	'type'			=> 'image',
	'title'			=> esc_html__( 'Logo', 'lendiz' ),
	'description'	=> esc_html__( 'Upload site logo', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Logo Height
$settings = array(
	'id'			=> 'logo-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Logo Height', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set your maximum height of your logo. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '70',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sticky Logo
$settings = array(
	'id'			=> 'sticky-logo',
	'type'			=> 'image',
	'title'			=> esc_html__( 'Sticky Logo', 'lendiz' ),
	'description'	=> esc_html__( 'Upload site sticky logo', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Logo Height
$settings = array(
	'id'			=> 'sticky-logo-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Sticky Logo Height', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set your maximum height of your Sticky logo. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '60',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mobile Logo
$settings = array(
	'id'			=> 'mobile-logo',
	'type'			=> 'image',
	'title'			=> esc_html__( 'Mobile Logo', 'lendiz' ),
	'description'	=> esc_html__( 'Upload site mobile logo', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Mobile Logo Height
$settings = array(
	'id'			=> 'mobile-logo-height',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Header Mobile Logo Height', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set your maximum height of your mobile logo. Here no need to put dimension units like px, em etc. Example 50', 'lendiz' ),
	'default'		=> '50',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );