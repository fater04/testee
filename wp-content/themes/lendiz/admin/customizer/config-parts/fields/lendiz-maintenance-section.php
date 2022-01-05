<?php

//Maintenance Mode Option
$settings = array(
	'id'			=> 'maintenance-mode',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Maintenance Mode Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable maintenance mode.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Maintenance Type
$settings = array(
	'id'			=> 'maintenance-type',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Maintenance Type', 'lendiz' ),
	'description'	=> esc_html__( 'Select maintenance mode page coming soon or maintenance.', 'lendiz' ),
	'choices'		=> array(
		'cs'		=> esc_html__( 'Coming Soon', 'lendiz' ),
		'mn'		=> esc_html__( 'Maintenance', 'lendiz' ),
		'cus'		=> esc_html__( 'Custom', 'lendiz' )
	),
	'default'		=> 'cs',
	'required'		=> array( 'maintenance-mode', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Maintenance Custom Page
$settings = array(
	'id'			=> 'maintenance-custom',
	'type'			=> 'pages',
	'title'			=> esc_html__( 'Maintenance Custom Page', 'lendiz' ),
	'description'	=> esc_html__( 'Enter service slug for register custom post type.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'maintenance-mode', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Phone Number
$settings = array(
	'id'			=> 'maintenance-phone',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Phone Number', 'lendiz' ),
	'description'	=> esc_html__( 'Enter phone number shown on when maintenance mode actived', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'maintenance-mode', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Email Id
$settings = array(
	'id'			=> 'maintenance-email',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Email Id', 'lendiz' ),
	'description'	=> esc_html__( 'Enter email id shown on when maintenance mode actived', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'maintenance-mode', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Address
$settings = array(
	'id'			=> 'maintenance-address',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Address', 'lendiz' ),
	'description'	=> esc_html__( 'Place here your address and info', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'maintenance-mode', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );