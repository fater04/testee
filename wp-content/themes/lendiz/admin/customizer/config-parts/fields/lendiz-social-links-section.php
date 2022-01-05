<?php

//Social Iocns Type
$settings = array(
	'id'			=> 'social-icons-type',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Social Iocns Type', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your social icons type.', 'lendiz' ),
	'default'		=> 'circled',
	'items' 		=> array(
		'squared'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/social-icons/1.png',
		'rounded'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/social-icons/2.png',
		'circled'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/social-icons/3.png'		
	),
	'cols'			=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Footer Bottom Social Iocns Type
$settings = array(
	'id'			=> 'social-icons-type-footer',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Footer Bottom Social Iocns Type', 'lendiz' ),
	'description'	=> esc_html__( 'Choose footer bottom social icons type.', 'lendiz' ),
	'default'		=> 'circled',
	'items' 		=> array(
		'squared'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/social-icons/1.png',
		'rounded'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/social-icons/2.png',
		'circled'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/social-icons/3.png'		
	),
	'cols'			=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Social Icons Fore
$settings = array(
	'id'			=> 'social-icons-fore',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Social Icons Fore', 'lendiz' ),
	'description'	=> esc_html__( 'Social icons fore color settings.', 'lendiz' ),
	'choices'		=> array(
		'black'		=> esc_html__( 'Black', 'lendiz' ),
		'white'		=> esc_html__( 'White', 'lendiz' ),
		'own'		=> esc_html__( 'Own Color', 'lendiz' )
	),
	'default'		=> 'white',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Social Icons Fore
$settings = array(
	'id'			=> 'social-icons-hfore',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Social Icons Fore Hover', 'lendiz' ),
	'description'	=> esc_html__( 'Social icons fore hover color settings.', 'lendiz' ),
	'choices'		=> array(
		'h-black'	=> esc_html__( 'Black', 'lendiz' ),
		'h-white'	=> esc_html__( 'White', 'lendiz' ),
		'h-own'		=> esc_html__( 'Own Color', 'lendiz' )
	),
	'default'		=> 'h-own',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Social Icons Background
$settings = array(
	'id'			=> 'social-icons-bg',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Social Icons Background', 'lendiz' ),
	'description'	=> esc_html__( 'Social icons background color settings.', 'lendiz' ),
	'choices'		=> array(
		'bg-black'		=> esc_html__( 'Black', 'lendiz' ),
		'bg-white'		=> esc_html__( 'White', 'lendiz' ),
		'bg-light'		=> esc_html__( 'RGBA Light', 'lendiz' ),
		'bg-dark'		=> esc_html__( 'RGBA Dark', 'lendiz' ),
		'bg-own'		=> esc_html__( 'Own Color', 'lendiz' ),
		'bg-transparent'=> esc_html__( 'Transparent', 'lendiz' )
	),
	'default'		=> 'bg-own',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Social Icons Background Hover
$settings = array(
	'id'			=> 'social-icons-hbg',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Social Icons Background Hover', 'lendiz' ),
	'description'	=> esc_html__( 'Social icons background hover color settings.', 'lendiz' ),
	'choices'		=> array(
		'hbg-black'		=> esc_html__( 'Black', 'lendiz' ),
		'hbg-white'		=> esc_html__( 'White', 'lendiz' ),
		'hbg-light'		=> esc_html__( 'RGBA Light', 'lendiz' ),
		'hbg-dark'		=> esc_html__( 'RGBA Dark', 'lendiz' ),
		'hbg-own'		=> esc_html__( 'Own Color', 'lendiz' ),
		'hbg-theme'		=> esc_html__( 'Theme Color', 'lendiz' ),
		'hbg-transparent'		=> esc_html__( 'Transparent', 'lendiz' )
	),
	'default'		=> 'hbg-white',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Facebook
$settings = array(
	'id'			=> 'social-fb',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Facebook', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the facebook link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Twitter
$settings = array(
	'id'			=> 'social-twitter',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Twitter', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the twitter link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Instagram
$settings = array(
	'id'			=> 'social-instagram',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Instagram', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the instagram link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Pinterest
$settings = array(
	'id'			=> 'social-pinterest',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Pinterest', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the pinterest link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Youtube
$settings = array(
	'id'			=> 'social-youtube',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Youtube', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the youtube link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Vimeo
$settings = array(
	'id'			=> 'social-vimeo',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Vimeo', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the vimeo link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Soundcloud
$settings = array(
	'id'			=> 'social-soundcloud',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Soundcloud', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the soundcloud link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Yahoo
$settings = array(
	'id'			=> 'social-yahoo',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Yahoo', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the yahoo link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Tumblr
$settings = array(
	'id'			=> 'social-tumblr',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Tumblr', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the tumblr link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Mailto
$settings = array(
	'id'			=> 'social-mailto',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Mailto', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the mailto link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Flickr
$settings = array(
	'id'			=> 'social-flickr',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Flickr', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the flickr link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Dribbble
$settings = array(
	'id'			=> 'social-dribbble',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Dribbble', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the dribbble link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//LinkedIn
$settings = array(
	'id'			=> 'social-linkedin',
	'type'			=> 'text',
	'title'			=> esc_html__( 'LinkedIn', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the linkedin link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//RSS
$settings = array(
	'id'			=> 'social-rss',
	'type'			=> 'text',
	'title'			=> esc_html__( 'RSS', 'lendiz' ),
	'description'	=> esc_html__( 'Enter the rss link. If no link means just leave it blank', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );