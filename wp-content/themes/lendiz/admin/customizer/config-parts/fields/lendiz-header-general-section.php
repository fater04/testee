<?php

//Header Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Layout
$settings = array(
	'id'			=> 'header-layout',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Header Width', 'lendiz' ),
	'description'	=> esc_html__( 'Choose header width boxed or wide.', 'lendiz' ),
	'choices'		=> array(
		'boxed'		=> esc_html__( 'Boxed', 'lendiz' ),
		'wide'		=> esc_html__( 'Wide', 'lendiz' ),
		'full'		=> esc_html__( 'Full Width', 'lendiz' )
	),
	'default'		=> 'wide',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Template
$settings = array(
	'id'			=> 'header-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Header Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose header template. Current header layout needed option values you can see after refresh this customizer page.', 'lendiz' ),
	'default'		=> '1',
	'items' 		=> array(
		'1'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/1.jpg',
		'2'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/2.jpg',
		'3'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/3.jpg',
		'4'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/4.jpg',
		'5'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/5.jpg',
		'6'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/6.jpg',
		'7'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/7.jpg',
		'8'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/8.jpg',
		'9'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/9.jpg',
		'10'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/10.jpg',
		'11'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/11.jpg',
		'12'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/12.jpg',
		'13'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/13.jpg',
		'vertical'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/14.jpg',
		'custom'=> LENDIZ_ADMIN_URL . '/customizer/assets/images/header-layouts/custom.jpg'
	),
	'cols'			=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Type
$settings = array(
	'id'			=> 'header-type',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Header Type', 'lendiz' ),
	'description'	=> esc_html__( 'Select header type for matching your site. If you choose left/right header type, manage under "Header -> Left/Right Navbar"', 'lendiz' ),
	'choices'		=> array(
		'default'		=> esc_html__( 'Default', 'lendiz' ),
		'left-sticky'	=> esc_html__( 'Left Nav', 'lendiz' ),
		'right-sticky'	=> esc_html__( 'Right Nav', 'lendiz' ),
	),
	'default'		=> 'default',
	'required'		=> array( 'header-template', '=', 'custom' ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Items
$settings = array(
	'id'			=> 'header-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Header Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed items for header, drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'Normal' 	=> array(
			'header-nav'	=> esc_html__( 'Nav Bar', 'lendiz' )
		),
		'Sticky' 	=> array(),
		'disabled' 	=> array(
			'header-topbar'	=> esc_html__( 'Top Bar', 'lendiz' ),
			'header-logo'	=> esc_html__( 'Logo Section', 'lendiz' )
		)
	),
	'required'		=> array( 'header-type', '=', 'default' ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Clik and Edit Header Layouts End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Clik and Edit Header Style
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Style', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Background Settings
$settings = array(
	'id'			=> 'header-background',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Header Background Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for header background with image, color, etc.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Dropdown Menu Background
$settings = array(
	'id'			=> 'dropdown-menu-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Dropdown Menu Background', 'lendiz' ),
	'description'	=> esc_html__( 'Choose dropdown menu background color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Dropdown Menu Color
$settings = array(
	'id'			=> 'dropdown-menu-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Dropdown Menu Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose dropdown menu link color.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Dropdown Menu Border
$settings = array(
	'id'			=> 'dropdown-menu-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Dropdown Menu Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Clik and Edit Header Style End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Header Label Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Custom Text', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Address Label
$settings = array(
	'id'			=> 'header-address-label',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Address Label', 'lendiz' ),
	'description'	=> esc_html__( 'This is the address label field, you can assign here any label custom text.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Address Custom Text
$settings = array(
	'id'			=> 'header-address-text',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Address Custom Text', 'lendiz' ),
	'description'	=> esc_html__( 'This is the address field, you can assign here any custom text. Few HTML allowed here.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Phone Number Label
$settings = array(
	'id'			=> 'header-phone-label',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Phone Number Label', 'lendiz' ),
	'description'	=> esc_html__( 'This is the phone number label field, you can assign here any phone label custom text.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Phone Number Custom Text
$settings = array(
	'id'			=> 'header-phone-text',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Phone Number Custom Text', 'lendiz' ),
	'description'	=> esc_html__( 'This is the phone number field, you can assign here any custom text. Few HTML allowed here.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Email Label
$settings = array(
	'id'			=> 'header-email-label',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Email Label', 'lendiz' ),
	'description'	=> esc_html__( 'This is the email label field, you can assign here any email custom label text.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Email Custom Text
$settings = array(
	'id'			=> 'header-email-text',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Email Custom Text', 'lendiz' ),
	'description'	=> esc_html__( 'This is the email field, you can assign here any email id. Example companyname@yourdomain.com', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Label End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Header Advanced Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Advanced', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Header Absolute
$settings = array(
	'id'			=> 'header-absolute',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Header Absolute', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable header absolute option to show transparent header for page.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Sticky Part
$settings = array(
	'id'			=> 'sticky-part',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Header Sticky Part', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable stciky part to sticky which items are placed in sticky part at header items.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sticky Scroll Up
$settings = array(
	'id'			=> 'sticky-part-scrollup',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Sticky Scroll Up', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable stciky part to sticky only scroll up. This also only sticky which items are placed in Sticky Part at Header Items.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'sticky-part', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Main Menu Type
$settings = array(
	'id'			=> 'mainmenu-menutype',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Main Menu Type', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for mainmenu.', 'lendiz' ),
	'choices'		=> array(
		'advanced' => esc_html__( 'Advanced Menu', 'lendiz' ),
		'normal' => esc_html__( 'Normal Menu', 'lendiz' ),
	),
	'default'		=> 'normal',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Menu Tag
$settings = array(
	'id'			=> 'menu-tag',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Menu Tag', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable menu tag for menu items like Hot, Trend, New.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'mainmenu-menutype', '=', 'advanced' ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Hot Menu Tag Text
$settings = array(
	'id'			=> 'menu-tag-hot-text',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Hot Menu Tag Text', 'lendiz' ),
	'description'	=> esc_html__( 'Set this text to show hot menu tag.', 'lendiz' ),
	'default'		=> esc_html__( 'Hot', 'lendiz' ),
	'required'		=> array( 'menu-tag', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Hot Menu Tag Background
$settings = array(
	'id'			=> 'menu-tag-hot-bg',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Hot Menu Tag Background', 'lendiz' ),
	'description'	=> esc_html__( 'Set this text to show hot menu tag.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'menu-tag', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//New Menu Tag Text
$settings = array(
	'id'			=> 'menu-tag-new-text',
	'type'			=> 'text',
	'title'			=> esc_html__( 'New Menu Tag Text', 'lendiz' ),
	'description'	=> esc_html__( 'Set this text to show new menu tag.', 'lendiz' ),
	'default'		=> esc_html__( 'New', 'lendiz' ),
	'required'		=> array( 'menu-tag', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//New Menu Tag Background
$settings = array(
	'id'			=> 'menu-tag-new-bg',
	'type'			=> 'color',
	'title'			=> esc_html__( 'New Menu Tag Background', 'lendiz' ),
	'description'	=> esc_html__( 'Set new menu tag background color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'menu-tag', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Trend Menu Tag Text
$settings = array(
	'id'			=> 'menu-tag-trend-text',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Trend Menu Tag Text', 'lendiz' ),
	'description'	=> esc_html__( 'Set this text to show trend menu tag.', 'lendiz' ),
	'default'		=> esc_html__( 'Trend', 'lendiz' ),
	'required'		=> array( 'menu-tag', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Trend Menu Tag Background
$settings = array(
	'id'			=> 'menu-tag-trend-bg',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Trend Menu Tag Background', 'lendiz' ),
	'description'	=> esc_html__( 'Set trend menu tag background color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'menu-tag', '=', 1 ),
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Secondary Menu
$settings = array(
	'id'			=> 'secondary-menu',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Secondary Menu', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable secondary menu.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Secondary Menu Type
$settings = array(
	'id'			=> 'secondary-menu-type',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Secondary Menu Type', 'lendiz' ),
	'description'	=> esc_html__( 'Choose secondary menu type.', 'lendiz' ),
	'choices'		=> array(
		'left-push'		=> esc_html__( 'Left Push', 'lendiz' ),
		'left-overlay'	=> esc_html__( 'Left Overlay', 'lendiz' ),
		'right-push'	=> esc_html__( 'Right Push', 'lendiz' ),
		'right-overlay'	=> esc_html__( 'Right Overlay', 'lendiz' ),
		'full-overlay'	=> esc_html__( 'Full Page Overlay', 'lendiz' )
	),
	'default'		=> 'right-overlay',
	'required'		=> array( 'secondary-menu', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Secondary Menu Space Width
$settings = array(
	'id'			=> 'secondary-menu-space-width',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Secondary Menu Space Width', 'lendiz' ),
	'description'	=> esc_html__( 'Increase or decrease secondary menu space width. this options only use if you enable secondary menu. Here no need to specify dimensions like px, em, etc.. Example 350', 'lendiz' ),
	'default'		=> '350',
	'required'		=> array( 'secondary-menu', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Slider Position
$settings = array(
	'id'			=> 'header-slider-position',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Header Slider Position', 'lendiz' ),
	'description'	=> esc_html__( 'Select header slider position matching your page.', 'lendiz' ),
	'choices'		=> array(
		'bottom'	=> esc_html__( 'Below Header', 'lendiz' ),
		'top'		=> esc_html__( 'Above Header', 'lendiz' ),
		'none'		=> esc_html__( 'None', 'lendiz' )
	),
	'default'		=> 'none',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Search Toggle Modal
$settings = array(
	'id'			=> 'search-toggle-form',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Search Toggle Modal', 'lendiz' ),
	'description'	=> esc_html__( 'Select serach box toggle modal.', 'lendiz' ),
	'choices'		=> array(
		'1'	=> esc_html__( 'Full Screen Search', 'lendiz' ),
		'2' => esc_html__( 'Text Box Toggle Search', 'lendiz' ),
		'3' => esc_html__( 'Full Bar Toggle Search', 'lendiz' ),
		'4' => esc_html__( 'Bottom Seach Box Toggle', 'lendiz' ),
	),
	'default'		=> '1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Header Advanced End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );