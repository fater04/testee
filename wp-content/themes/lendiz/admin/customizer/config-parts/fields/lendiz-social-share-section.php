<?php

//Post Social Shares
$settings = array(
	'id'			=> 'post-social-shares',
	'type'			=> 'multicheck',
	'title'			=> esc_html__( 'Post Social Shares', 'lendiz' ),
	'description'	=> esc_html__( 'Actived social items only showing post share list.', 'lendiz' ),
	'default'		=> '',
	'items' 		=> array(
		'fb'		=> esc_html__( 'Facebook', 'lendiz' ),
		'twitter'	=> esc_html__( 'Twitter', 'lendiz' ),
		'linkedin'	=> esc_html__( 'Linkedin', 'lendiz' ),
		'pinterest'	=> esc_html__( 'Pinterest', 'lendiz' )
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Comments Social Shares
$settings = array(
	'id'			=> 'comments-social-shares',
	'type'			=> 'multicheck',
	'title'			=> esc_html__( 'Comments Social Shares', 'lendiz' ),
	'description'	=> esc_html__( 'Actived social items only showing comments share list.', 'lendiz' ),
	'default'		=> '',
	'items' 		=> array(
		'fb'		=> esc_html__( 'Facebook', 'lendiz' ),
		'twitter'	=> esc_html__( 'Twitter', 'lendiz' ),
		'linkedin'	=> esc_html__( 'Linkedin', 'lendiz' ),
		'pinterest'	=> esc_html__( 'Pinterest', 'lendiz' )
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );