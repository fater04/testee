<?php

//Related Slide Items to Display
$settings = array(
	'id'			=> 'related-slide-items',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items to Display', 'lendiz' ),
	'description'	=> esc_html__( 'Enter number of slider items to display', 'lendiz' ),
	'default'		=> '3',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Items to Display Tab
$settings = array(
	'id'			=> 'related-slide-tab',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items to Display Tab', 'lendiz' ),
	'description'	=> esc_html__( 'Enter number of slider items to display on tab', 'lendiz' ),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Items to Display on Mobile
$settings = array(
	'id'			=> 'related-slide-mobile',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items to Display on Mobile', 'lendiz' ),
	'description'	=> esc_html__( 'Enter items to display on mobile view. Example 1', 'lendiz' ),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Items Scrollby
$settings = array(
	'id'			=> 'related-slide-scrollby',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Items Scrollby', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slider items scrollby. Example 1', 'lendiz' ),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Autoplay
$settings = array(
	'id'			=> 'related-slide-autoplay',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Autoplay', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide autoplay.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Center
$settings = array(
	'id'			=> 'related-slide-center',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Center', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide center.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Duration
$settings = array(
	'id'			=> 'related-slide-duration',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Slide Duration', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slide duration for each (in Milli Seconds). Example 5000', 'lendiz' ),
	'default'		=> '5000',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Smart Speed
$settings = array(
	'id'			=> 'related-slide-smartspeed',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Slide Smart Speed', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slide smart speed for each (in Milli Seconds). Example 250', 'lendiz' ),
	'default'		=> '250',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Infinite Loop
$settings = array(
	'id'			=> 'related-slide-center',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Infinite Loop', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable infinite loop.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Items Margin
$settings = array(
	'id'			=> 'related-slide-margin',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Slide Items Margin', 'lendiz' ),
	'description'	=> esc_html__( 'Enter slide item margin( item spacing ). Example 10', 'lendiz' ),
	'default'		=> '10',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Pagination
$settings = array(
	'id'			=> 'related-slide-pagination',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Pagination', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide pagination.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Navigation
$settings = array(
	'id'			=> 'related-slide-navigation',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Navigation', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide navigation.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Slider Slide Auto Height
$settings = array(
	'id'			=> 'related-slide-autoheight',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Slide Auto Height', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable slide item auto height.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );