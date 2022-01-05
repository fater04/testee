<?php

//Grid Large Size
$settings = array(
	'id'			=> 'lendiz-grid-large',
	'type'			=> 'hw',
	'title'			=> esc_html__( 'Grid Large Size', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimensions px, em, etc.. This image used in gallery large grid. If you don\'t want this size means just leave this empty. Default 440 x 260', 'lendiz' ),
	'default'		=> array(
		'width'   => '440', 
		'height'  => '260'
	),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Grid Medium Size
$settings = array(
	'id'			=> 'lendiz-grid-large',
	'type'			=> 'hw',
	'title'			=> esc_html__( 'Grid Medium Size', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimensions px, em, etc.. This image used in gallery medium grid. If you don\'t want this size means just leave this empty. Default 390 x 231', 'lendiz' ),
	'default'		=> array(
		'width'   => '390', 
		'height'  => '231'
	),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Grid Small Size
$settings = array(
	'id'			=> 'lendiz-grid-small',
	'type'			=> 'hw',
	'title'			=> esc_html__( 'Grid Small Size', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimensions px, em, etc.. This image used in gallery small grid. If you don\'t want this size means just leave this empty. Default 220 x 130', 'lendiz' ),
	'default'		=> array(
		'width'   => '220', 
		'height'  => '130'
	),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Team Medium Size
$settings = array(
	'id'			=> 'lendiz-team-medium',
	'type'			=> 'hw',
	'title'			=> esc_html__( 'Team Medium Size', 'lendiz' ),
	'description'	=> esc_html__( 'This image used in team shorcode. If you don\'t want this size means just leave this empty. Default 300 x 300', 'lendiz' ),
	'default'		=> array(
		'width'   => '300', 
		'height'  => '300'
	),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );