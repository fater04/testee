<?php

//Login/Signin Text
$settings = array(
	'id'			=> 'login-text',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Login/Signin Text', 'lendiz' ),
	'description'	=> esc_html__( 'Enter sign in text as per you choice.', 'lendiz' ),
	'default'		=> esc_html__( 'Login/Signin', 'lendiz' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Logged Prefix Text
$settings = array(
	'id'			=> 'logged-text',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Logged Prefix Text', 'lendiz' ),
	'description'	=> esc_html__( 'Enter logged prefix text.', 'lendiz' ),
	'default'		=> esc_html__( 'Hello!', 'lendiz' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Signout Prefix Text
$settings = array(
	'id'			=> 'signout-text',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Signout Text', 'lendiz' ),
	'description'	=> esc_html__( 'Enter signout text.', 'lendiz' ),
	'default'		=> esc_html__( 'Signout', 'lendiz' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Google Login Option
$settings = array(
	'id'			=> 'google-logins-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Google Login Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable google login option.', 'lendiz' ),
	'default'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Facebook Login Option
$settings = array(
	'id'			=> 'facebook-logins-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Facebook Login Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable facebook login option.', 'lendiz' ),
	'default'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Admin Email Id
$settings = array(
	'id'			=> 'admin-email-id',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Admin Email Id', 'lendiz' ),
	'description'	=> esc_html__( 'Enter valid admin email for sending update emails of every process. If any user change their password, Then this will send a copy with this email too.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Login Form Description
$settings = array(
	'id'			=> 'login-description',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Login Form Description', 'lendiz' ),
	'description'	=> esc_html__( 'You can paste shortcode here. Just display the description on login form.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );