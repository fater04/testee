<?php

//Google Client ID
$settings = array(
	'id'			=> 'social-google-client-id',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Google Client ID', 'lendiz' ),
	'description'	=> esc_html__( 'Set google login client id for login via google. You can refer here: ', 'lendiz' ) . 'https://console.developers.google.com/',
	'default'		=> ''
);
LendizCustomizerConfig::buildFields( $settings );

//Google Client Secret
$settings = array(
	'id'			=> 'social-google-client-secret',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Google Client Secret', 'lendiz' ),
	'description'	=> esc_html__( 'Set google login client secret for login via google.', 'lendiz' ),
	'default'		=> ''
);
LendizCustomizerConfig::buildFields( $settings );

//Google Redirect
$settings = array(
	'id'			=> 'social-google-redirect',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Google Login Redirect URL', 'lendiz' ),
	'description'	=> esc_html__( 'Set google login redirect url.', 'lendiz' ),
	'default'		=> ''
);
LendizCustomizerConfig::buildFields( $settings );