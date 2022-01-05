<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Layout
$settings = array(
	'id'			=> 'footer-layout',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Footer Layout', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer layout boxed or wide.', 'lendiz' ),
	'choices'		=> array(
		'boxed'		=> esc_html__( 'Boxed', 'lendiz' ),
		'wide'		=> esc_html__( 'Wide', 'lendiz' )
	),
	'default'		=> 'wide',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Template
$settings = array(
	'id'			=> 'footer-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Footer Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer template. Current footer layout needed option values you can see after refresh this customizer page.', 'lendiz' ),
	'default'		=> '1',
	'items' 		=> array(
		'1'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/1.jpg',
		'2'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/2.jpg',
		'3'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/3.jpg',
		'4'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/4.jpg',
		'5'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/5.jpg',
		'6'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/6.jpg',
		'7'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/7.jpg',
		'8'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/8.jpg',
		'custom'=> LENDIZ_ADMIN_URL . '/customizer/assets/images/footer-layouts/custom.jpg'
	),
	'cols'			=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Items
$settings = array(
	'id'			=> 'footer-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Footer Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed footer items drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'Enabled'  => array(
			'footer-middle'	=> esc_html__( 'Footer Middle', 'lendiz' ),
			'footer-bottom'	=> esc_html__( 'Footer Bottom', 'lendiz' )
		),
		'disabled' => array(
			'footer-top' 	=> esc_html__( 'Footer Top', 'lendiz' )
		)
	),
	'required'		=> array( 'footer-template', '=', 'custom' ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Layout End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Style Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Style', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Back to Top
$settings = array(
	'id'			=> 'back-to-top',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Back to Top', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable back to top icon.', 'lendiz' ),
	'default'		=> 1,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Back to Top Button Position
$settings = array(
	'id'			=> 'back-to-top-position',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Back to Top Button Position', 'lendiz' ),
	'description'	=> esc_html__( 'Choose position right/left for back to top button.', 'lendiz' ),
	'choices'		=> array(
		'right'		=> esc_html__( 'Right', 'lendiz' ),
		'left'		=> esc_html__( 'Left', 'lendiz' )
	),
	'default'		=> 'right',
	'required'		=> array( 'back-to-top', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Hidden Footer
$settings = array(
	'id'			=> 'hidden-footer',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Hidden Footer', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable hidden footer.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Link Color
$settings = array(
	'id'			=> 'footer-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Footer Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer general link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Border
$settings = array(
	'id'			=> 'footer-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Footer Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Padding Option
$settings = array(
	'id'			=> 'footer-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Footer Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Background
$settings = array(
	'id'			=> 'footer-background',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Footer Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Background Overlay
$settings = array(
	'id'			=> 'footer-background-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Footer Background Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer background overlay color and opacity.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Style End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );