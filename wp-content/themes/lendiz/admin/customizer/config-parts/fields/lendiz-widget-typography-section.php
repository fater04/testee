<?php

//Widgets Title Typography
$settings = array(
	'id'			=> 'widgets-title',
	'type'			=> 'fonts',
	'title'			=> esc_html__( 'Widgets Title Typography', 'lendiz' ),
	'description'	=> esc_html__( 'Specify the widget title typography properties.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Widgets Content Typography
$settings = array(
	'id'			=> 'widgets-content',
	'type'			=> 'fonts',
	'title'			=> esc_html__( 'Widgets Content Typography', 'lendiz' ),
	'description'	=> esc_html__( 'Specify the widget content typography properties.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );