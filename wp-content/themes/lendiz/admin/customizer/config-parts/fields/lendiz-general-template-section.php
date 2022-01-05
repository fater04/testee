<?php

//Search Content
$settings = array(
	'id'			=> 'search-content',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Search Content', 'lendiz' ),
	'description'	=> esc_html__( 'Choose this option for search content from site.', 'lendiz' ),
	'choices'		=> array(
		'all'		=> esc_html__( 'All', 'lendiz' ),
		'post'		=> esc_html__( 'Post Content Only', 'lendiz' ),
		'page'		=> esc_html__( 'Page Content Only', 'lendiz' ),
		'post_page'	=> esc_html__( 'Post and Page Content Only', 'lendiz' )
	),
	'default'		=> 'all',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );