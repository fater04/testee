<?php

//Single Post Slide Items to Display
$settings = array(
	'id'			=> 'single-slide-items',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items to Display', 'lendiz' ),
	'description'	=> esc_html__( 'Enter number of slider items to display', 'lendiz' ),
	'default'		=> '3',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Items to Display Tab
$settings = array(
	'id'			=> 'single-slide-tab',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items to Display Tab', 'lendiz' ),
	'description'	=> esc_html__( 'Enter number of slider items to display on tab', 'lendiz' ),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Items to Display on Mobile
$settings = array(
	'id'			=> 'single-slide-mobile',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items to Display on Mobile', 'lendiz' ),
	'description'	=> esc_html__( 'Enter items to display on mobile view. Example 1', 'lendiz' ),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Items Scrollby
$settings = array(
	'id'			=> 'single-slide-scrollby',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items Scrollby', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slider items scrollby. Example 1', 'lendiz' ),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Autoplay
$settings = array(
	'id'			=> 'single-slide-autoplay',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Autoplay', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide autoplay.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Center
$settings = array(
	'id'			=> 'single-slide-center',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Center', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide center.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Duration
$settings = array(
	'id'			=> 'single-slide-duration',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Slide Duration', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slide duration for each (in Milli Seconds). Example 5000', 'lendiz' ),
	'default'		=> '5000',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Smart Speed
$settings = array(
	'id'			=> 'single-slide-smartspeed',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Slide Smart Speed', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slide smart speed for each (in Milli Seconds). Example 250', 'lendiz' ),
	'default'		=> '250',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Infinite Loop
$settings = array(
	'id'			=> 'single-slide-center',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Infinite Loop', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable infinite loop.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Items Margin
$settings = array(
	'id'			=> 'single-slide-margin',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Slide Items Margin', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slide item margin( item spacing ). Example 10', 'lendiz' ),
	'default'		=> '10',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Pagination
$settings = array(
	'id'			=> 'single-slide-pagination',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Pagination', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide pagination.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Navigation
$settings = array(
	'id'			=> 'single-slide-navigation',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Navigation', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide navigation.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Slider Slide Auto Height
$settings = array(
	'id'			=> 'single-slide-autoheight',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Auto Height', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide item auto height.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );