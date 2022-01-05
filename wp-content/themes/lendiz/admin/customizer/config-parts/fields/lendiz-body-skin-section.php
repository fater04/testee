<?php

//Body Background Settings
$settings = array(
	'id'			=> 'body-background',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Body Background Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for body background with image, color, etc.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );