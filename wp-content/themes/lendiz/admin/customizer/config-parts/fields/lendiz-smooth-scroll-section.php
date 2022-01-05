<?php

//Smooth Scroll Option
$settings = array(
	'id'			=> 'smooth-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Smooth Scroll Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to append smooth scroll js to website.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Scroll Time
$settings = array(
	'id'			=> 'scroll-time',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Scroll Time', 'lendiz' ),
	'description'	=> esc_html__( 'Enter smooth scroll time in milliseconds. Example 600', 'lendiz' ),
	'default'		=> '600',
	'required'		=> array( 'smooth-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Scroll Distance
$settings = array(
	'id'			=> 'scroll-distance',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Scroll Distance', 'lendiz' ),
	'description'	=> esc_html__( 'Enter smooth scroll distance in value. Example 40', 'lendiz' ),
	'default'		=> '40',
	'required'		=> array( 'smooth-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );