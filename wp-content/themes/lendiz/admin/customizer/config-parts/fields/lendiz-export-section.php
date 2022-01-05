<?php

//Export Theme Option
$settings = array(
	'id'			=> 'export-theme-option',
	'type'			=> 'export',
	'title'			=> esc_html__( 'Export Theme Option', 'lendiz' ),
	'description'	=> esc_html__( 'This is the option to export theme option values.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );