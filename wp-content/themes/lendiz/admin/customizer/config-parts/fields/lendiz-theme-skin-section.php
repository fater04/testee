<?php

//Theme Color
$settings = array(
	'id'			=> 'theme-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Theme Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose theme color.', 'lendiz' ),
	'default'		=> '#e8c020',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Secondary Color
$settings = array(
	'id'			=> 'secondary-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Secondary Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose secondary color. This option for switch theme to gradient mode. If leave this color to empty, Single color will appear as theme color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//General Links Color
$settings = array(
	'id'			=> 'theme-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'General Links Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose theme link color.', 'lendiz' ),
	'default'		=> array(
		'regular'	=> '#e8c020',
		'hover'		=> '#fc7223',
		'active'	=> '#fc7223'
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//General Button Color
$settings = array(
	'id'			=> 'theme-btn-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'General Button Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose theme button color.', 'lendiz' ),
	'default'		=> array(
		'regular'	=> '#e8c020',
		'hover'		=> '#fc7223',
		'active'	=> '#fc7223'
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

