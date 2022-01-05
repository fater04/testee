<?php

//Facebook App ID
$settings = array(
	'id'			=> 'social-facebook-app-id',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Facebook App ID', 'lendiz' ),
	'description'	=> esc_html__( 'Set facebook login app id for login via facebook. You can refer here: ', 'lendiz' ) . 'https://developers.facebook.com/apps/',
	'default'		=> ''
);
LendizCustomizerConfig::buildFields( $settings );

//Facebook Client Secret
$settings = array(
	'id'			=> 'social-facebook-app-secret',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Facebook Client Secret', 'lendiz' ),
	'description'	=> esc_html__( 'Set facebook login client secret for login via facebook.', 'lendiz' ),
	'default'		=> ''
);
LendizCustomizerConfig::buildFields( $settings );

//Facebook Redirect
$settings = array(
	'id'			=> 'social-facebook-redirect',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Facebook Login Redirect URL', 'lendiz' ),
	'description'	=> esc_html__( 'Set facebook login redirect url.', 'lendiz' ),
	'default'		=> ''
);
LendizCustomizerConfig::buildFields( $settings );