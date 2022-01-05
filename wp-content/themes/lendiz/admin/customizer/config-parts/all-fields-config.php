<?php

//Text
$settings = array(
	'id'			=> 'ajax-trigger-text-test',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Text Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is text field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0,
	'instant'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Textarea
$settings = array(
	'id'			=> 'ajax-trigger-textarea-test',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Textarea Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is textarea field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0,
	'instant'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Select
$settings = array(
	'id'			=> 'ajax-trigger-select-test',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Select Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is select field', 'lendiz' ),
	'choices'		=> array(
		'boxed'		=> esc_html__( 'Boxed', 'lendiz' ),
		'wide'		=> esc_html__( 'Wide', 'lendiz' )
	),
	'default'		=> 'wide',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Color
$settings = array(
	'id'			=> 'ajax-trigger-color-test',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Color Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is color field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Image
$settings = array(
	'id'			=> 'ajax-trigger-image-test',
	'type'			=> 'image',
	'title'			=> esc_html__( 'Image Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is image field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Alpha Color
$settings = array(
	'id'			=> 'ajax-trigger-alpha-test',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Alpha Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is alpha field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background
$settings = array(
	'id'			=> 'ajax-trigger-bg-test',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Background Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is background field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Border
$settings = array(
	'id'			=> 'ajax-trigger-border-test',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Border Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is border field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Dimension
$settings = array(
	'id'			=> 'ajax-trigger-dimension-test',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Dimension Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is dimension field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Links
$settings = array(
	'id'			=> 'ajax-trigger-link-color-test',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Link Color Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is link color field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Multi Check
$settings = array(
	'id'			=> 'ajax-trigger-multi-check-test',
	'type'			=> 'multicheck',
	'title'			=> esc_html__( 'Multi Check Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is multi check field', 'lendiz' ),
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

//Radio Image
$settings = array(
	'id'			=> 'ajax-trigger-radio-image-test',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Radio Image Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is radio image field', 'lendiz' ),
	'default'		=> 'no-sidebar',
	'items' 		=> array(
		'no-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/1.png',
		'right-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/2.png',
		'left-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/3.png',
		'both-sidebar'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/page-layouts/4.png'		
	),
	'cols'			=> '4',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebars
$settings = array(
	'id'			=> 'ajax-trigger-sidebars-test',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Sidebar Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is sidebar field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Toggle Switch
$settings = array(
	'id'			=> 'ajax-trigger-toggle-test',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Toggle Switch Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is toggle switch field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Pages
$settings = array(
	'id'			=> 'ajax-trigger-pages-test',
	'type'			=> 'pages',
	'title'			=> esc_html__( 'Pages Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is pages field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Height Width
$settings = array(
	'id'			=> 'ajax-trigger-hw-test',
	'type'			=> 'hw',
	'title'			=> esc_html__( 'Height Width Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is height width field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Fonts
$settings = array(
	'id'			=> 'ajax-trigger-fonts-test',
	'type'			=> 'fonts',
	'title'			=> esc_html__( 'Google Fonts Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is fonts field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Drag Drop
$settings = array(
	'id'			=> 'ajax-trigger-dd-test',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Drag Drop Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is drag and drop field.', 'lendiz' ),
	'default' 		=> array(
		'Left' 	=> array(
			'date'		=> esc_html__( 'Date', 'lendiz' ),
			'client'	=> esc_html__( 'Client', 'lendiz' ),
			'duration'	=> esc_html__( 'Duration', 'lendiz' )		
		),
		'Right' 	=> array(
			'category'	=> esc_html__( 'Category', 'lendiz' ),
			'tag'		=> esc_html__( 'Tags', 'lendiz' ),
			'share'		=> esc_html__( 'Share', 'lendiz' )			
		),
		'Disabled' 	=> array(
			'estimation'=> esc_html__( 'Estimation', 'lendiz' ),
			'url'		=> esc_html__( 'Url', 'lendiz' ),
			'place'		=> esc_html__( 'Place', 'lendiz' )
		)
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Export
$settings = array(
	'id'			=> 'ajax-trigger-export-test',
	'type'			=> 'export',
	'title'			=> esc_html__( 'Export Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is export field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Import
$settings = array(
	'id'			=> 'ajax-trigger-import-test',
	'type'			=> 'import',
	'title'			=> esc_html__( 'Import Field', 'lendiz' ),
	'description'	=> esc_html__( 'This is import field', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Section Start
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Options Section Title', 'lendiz' ),
	'description'	=> esc_html__( 'This is inside option section description.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Section End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Header Label Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Header Label Settings', 'lendiz' ),
	'description'	=> esc_html__( 'Click to edit address label settings.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Label End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );