<?php

//Mailchimp API Key
$settings = array(
	'id'			=> 'mailchimp-api',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Mailchimp API Key', 'lendiz' ),
	'description'	=> esc_html__( 'Place here your registered mailchimp API key.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Google Map API Key
$settings = array(
	'id'			=> 'google-api',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Google Map API Key', 'lendiz' ),
	'description'	=> esc_html__( 'Place here your registered google map API key.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );