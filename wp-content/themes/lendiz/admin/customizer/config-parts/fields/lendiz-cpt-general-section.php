<?php

//Custom Post Types
$settings = array(
	'id'			=> 'cpt-opts',
	'type'			=> 'multicheck',
	'title'			=> esc_html__( 'Custom Post Types', 'lendiz' ),
	'description'	=> esc_html__( 'Enable the custom post types which are need, once done save theme options button. Then refresh page, you can see the enabled CPT options are showing sub level.', 'lendiz' ),
	'default'		=> '',
	'items' 		=> array(
		'portfolio'	    => esc_html__( 'Portfolio', 'lendiz' ),
		'team'	        => esc_html__( 'Team', 'lendiz' ),
		'testimonial'	=> esc_html__( 'Testimonial', 'lendiz' ),
		'events'	    => esc_html__( 'Events', 'lendiz' ),
		'services'	    => esc_html__( 'Services', 'lendiz' ),
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );