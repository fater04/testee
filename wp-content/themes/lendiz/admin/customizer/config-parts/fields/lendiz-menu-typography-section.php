<?php

//Main Menu Typography
$settings = array(
	'id'			=> 'main-menu-typography',
	'type'			=> 'fonts',
	'title'			=> esc_html__( 'Main Menu Typography', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for main menu typography', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Dropdown Menu Typography
$settings = array(
	'id'			=> 'dropdown-menu-typography',
	'type'			=> 'fonts',
	'title'			=> esc_html__( 'Dropdown Menu Typography', 'lendiz' ),
	'description'	=> esc_html__( 'This is the setting for dropdown menu typography', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );