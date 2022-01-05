<?php

//Comments Type
$settings = array(
	'id'			=> 'comments-type',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Comments Type', 'lendiz' ),
	'description'	=> esc_html__( 'This option will be showing comment like facebook or default wordpress.', 'lendiz' ),
	'choices'		=> array(
		'wp' 	=> esc_html__( 'WordPress Comment', 'lendiz' ),
		'fb'  	=> esc_html__( 'Facebook Comment', 'lendiz' )
	),
	'default'		=> 'wp',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Comments Like
$settings = array(
	'id'			=> 'comments-like',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Comments Like', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to show or hide comments likes to single post comments.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'comments-type', '=', 'wp' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Comments Share
$settings = array(
	'id'			=> 'comments-share',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Comments Share', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to show or hide comments share to single post comments.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'comments-type', '=', 'wp' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Facebook Developer API
$settings = array(
	'id'			=> 'fb-developer-key',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Facebook Developer API', 'lendiz' ),
	'description'	=> esc_html__( 'Enter facebook developer API key.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'comments-type', '=', 'fb' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Number of Comments
$settings = array(
	'id'			=> 'fb-comments-number',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Number of Comments', 'lendiz' ),
	'description'	=> esc_html__( 'Enter number of comments to display.', 'lendiz' ),
	'default'		=> '5',
	'required'		=> array( 'comments-type', '=', 'fb' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );