<?php

//Page Layout
$settings = array(
	'id'			=> 'page-layout',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Page Layout', 'lendiz' ),
	'description'	=> esc_html__( 'Choose page layout.', 'lendiz' ),
	'choices'		=> array(
		'boxed'		=> esc_html__( 'Boxed', 'lendiz' ),
		'wide'		=> esc_html__( 'Wide', 'lendiz' )
	),
	'default'		=> 'wide',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Site Width
$settings = array(
	'id'			=> 'site-width',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Site Width', 'lendiz' ),
	'description'	=> esc_html__( 'Set the site width here. Here No need to specify units like px, em, etc.. Example 1200', 'lendiz' ),
	'default'		=> '1170',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Content Padding
$settings = array(
	'id'			=> 'page-content-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Page Content Padding', 'lendiz' ),
	'description'	=> esc_html__( 'Set the top/right/bottom/left padding of page content. Here No need to specify units like px, em, etc.. Example 10 10 10 10', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );