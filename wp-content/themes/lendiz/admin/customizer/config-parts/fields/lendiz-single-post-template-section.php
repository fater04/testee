<?php

//Layout Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Layout', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Option
$settings = array(
	'id'			=> 'single-post-page-title-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Page Title Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title.', 'lendiz' ),
	'default'		=> 1,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Items
$settings = array(
	'id'			=> 'template-single-post-pagetitle-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Page Title Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed items for page title wrap, drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(),
		'Left'  => array(
			'title' => esc_html__( 'Page Title Text', 'lendiz' ),
		),
		'Center' => array(),
		'Right'  => array(
			'breadcrumb'	=> esc_html__( 'Breadcrumb', 'lendiz' )
		)
	),
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Archive Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Archive Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for single post page layout, sidebar sticky and etc.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Archive Template
$settings = array(
	'id'			=> 'single-post-page-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Archive Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current single post page template.', 'lendiz' ),
	'default'		=> 'right-sidebar',
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

//Left Sidebar
$settings = array(
	'id'			=> 'single-post-left-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Left Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on left side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Right Sidebar
$settings = array(
	'id'			=> 'single-post-right-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Right Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on right side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Full Width Wrap
$settings = array(
	'id'			=> 'single-post-full-wrap',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Full Width Wrap', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to show or hide full width post wrapper.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Top Meta Items
$settings = array(
	'id'			=> 'single-post-topmeta-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Single Post Article Top Meta Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed single post article top meta items drag from disabled and put enabled part. ie: Left or Right.', 'lendiz' ),
	'default' 		=> array(
		'Left'  => array(
			'author'	=> esc_html__( 'Author', 'lendiz' )						
		),
		'Right'  => array(
			'date'		=> esc_html__( 'Date', 'lendiz' )
		),
		'disabled' => array(
			'social'	=> esc_html__( 'Social Share', 'lendiz' ),						
			'likes'		=> esc_html__( 'Likes', 'lendiz' ),
			'author'	=> esc_html__( 'Author', 'lendiz' ),
			'views'		=> esc_html__( 'Views', 'lendiz' ),
			'tag'		=> esc_html__( 'Tags', 'lendiz' ),
			'favourite'	=> esc_html__( 'Favourite', 'lendiz' ),						
			'comments'	=> esc_html__( 'Comments', 'lendiz' ),
			'category'	=> esc_html__( 'Category', 'lendiz' )
		)
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Bottom Meta Items
$settings = array(
	'id'			=> 'single-post-bottommeta-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Single Post Article Bottom Meta Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed single post article bottom meta items drag from disabled and put enabled part. ie: Left or Right.', 'lendiz' ),
	'default' 		=> array(
		'Left'  => array(
			'category'	=> esc_html__( 'Category', 'lendiz' ),
		),
		'Right'  => array(),
		'disabled' => array(
			'social'	=> esc_html__( 'Social Share', 'lendiz' ),
			'date'		=> esc_html__( 'Date', 'lendiz' ),						
			'social'	=> esc_html__( 'Social Share', 'lendiz' ),						
			'likes'		=> esc_html__( 'Likes', 'lendiz' ),
			'author'	=> esc_html__( 'Author', 'lendiz' ),
			'views'		=> esc_html__( 'Views', 'lendiz' ),
			'favourite'	=> esc_html__( 'Favourite', 'lendiz' ),
			'comments'	=> esc_html__( 'Comments', 'lendiz' ),
			'tag'		=> esc_html__( 'Tags', 'lendiz' )
		)
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Items
$settings = array(
	'id'			=> 'single-post-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Single Post Article Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed single post article items drag from disabled and put enabled part. Thumbnail part covers the post format either image/audio/video/gallery/quote/link.', 'lendiz' ),
	'default' 		=> array(
		'Enabled'  => array(
			'title'	=> esc_html__( 'Title', 'lendiz' ),
			'top-meta'	=> esc_html__( 'Top Meta', 'lendiz' ),
			'thumb'	=> esc_html__( 'Thumbnail', 'lendiz' ),
			'content'	=> esc_html__( 'Content', 'lendiz' ),
			'bottom-meta'	=> esc_html__( 'Bottom Meta', 'lendiz' ),
		),
		'disabled' => array()
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Overlay
$settings = array(
	'id'			=> 'single-post-overlay-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Single Post Article Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable single post article overlay.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Overlay Items
$settings = array(
	'id'			=> 'single-post-overlay-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Single Post Article Overlay Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed single post article overlay items drag from disabled and put enabled part.', 'lendiz' ),
	'default' 		=> array(
		'Enabled'  => array(
			'title'			=> esc_html__( 'Title', 'lendiz' ),
		),
		'disabled' => array(
			'top-meta'		=> esc_html__( 'Top Meta', 'lendiz' ),
			'bottom-meta'	=> esc_html__( 'Bottom Meta', 'lendiz' )
		)
	),
	'required'		=> array( 'single-post-overlay-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Page Items
$settings = array(
	'id'			=> 'single-post-page-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Single Post Page Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed single post items drag from disabled and put enabled part.', 'lendiz' ),
	'default' 		=> array(
		'Enabled'  => array(
			'post-items'	=> esc_html__( 'Post Items', 'lendiz' ),
			'author-info'	=> esc_html__( 'Author Info', 'lendiz' ),
			'post-nav'		=> esc_html__( 'Post Navigation', 'lendiz' ),
			'related-slider'=> esc_html__( 'Related Slider', 'lendiz' ),
			'comment'		=> esc_html__( 'Comment', 'lendiz' )
		),
		'disabled' => array()
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false
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

//Page Title Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Page Title Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is page title style settings shows only when page title option active.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Font Color
$settings = array(
	'id'			=> 'template-single-post-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for current field.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Template  Link Color
$settings = array(
	'id'			=> 'template-single-post-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Single Post Template  Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose Single post title bar link color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Template  Border
$settings = array(
	'id'			=> 'template-single-post-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Single Post Template  Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Template  Padding Option
$settings = array(
	'id'			=> 'template-single-post-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Single Post Template  Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Template  Background
$settings = array(
	'id'			=> 'template-single-post-background-all',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Single Post Template  Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Parallax
$settings = array(
	'id'			=> 'single-post-page-title-parallax',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Parallax', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background parallax.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Video
$settings = array(
	'id'			=> 'single-post-page-title-bg',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background video.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Background Video
$settings = array(
	'id'			=> 'single-post-page-title-video',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Page Title Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Set page title background video for page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-post-page-title-bg', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Overlay
$settings = array(
	'id'			=> 'single-post-page-title-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Page Title Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose page title overlay rgba color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Items Option
$settings = array(
	'id'			=> 'template-single-post-page-title-items-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Page Title Items Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable to make page title items custom layout.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'single-post-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false,
	'required'		=> array( 'single-post-page-title-opt', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Skin Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Single Post Article Skin Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is skin settings for each single post article.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Article Font Color
$settings = array(
	'id'			=> 'single-post-article-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Article Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for single post article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Link Color
$settings = array(
	'id'			=> 'single-post-article-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Article Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose single post article link color for single post article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Border
$settings = array(
	'id'			=> 'single-post-article-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Article Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Padding Option
$settings = array(
	'id'			=> 'single-post-article-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Article Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Background
$settings = array(
	'id'			=> 'single-post-article-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Article Background Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is background color for single post article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Skin Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Overlay Skin Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Single Post Article Overlay Skin Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is overlay skin settings for each single post article.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Article Font Color
$settings = array(
	'id'			=> 'single-post-article-overlay-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Article Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for single post article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Link Color
$settings = array(
	'id'			=> 'single-post-article-overlay-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Article Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose single post article overlay link color for single post article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Article Border
$settings = array(
	'id'			=> 'single-post-article-overlay-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Article Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Padding Option
$settings = array(
	'id'			=> 'single-post-article-overlay-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Article Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Background
$settings = array(
	'id'			=> 'single-post-article-overlay-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Article Background Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is background color for single post article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Article Overlay Skin Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Style End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Advanced Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Advanced', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Post Format Settings Start
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Post Format Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is post format settings for single post.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Video Format
$settings = array(
	'id'			=> 'single-post-video-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Video Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose single post page video post format settings.', 'lendiz' ),
	'choices'		=> array(
		'onclick' 	=> esc_html__( 'On Click Run Video', 'lendiz' ),
		'overlay' 	=> esc_html__( 'Modal Box Video', 'lendiz' ),
		'direct' 	=> esc_html__( 'Direct Video', 'lendiz' )
	),
	'default'		=> 'onclick',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Quote Format
$settings = array(
	'id'			=> 'single-post-quote-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Quote Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose single post page quote post format settings.', 'lendiz' ),
	'choices'		=> array(
		'featured' 		=> esc_html__( 'Dark Overlay', 'lendiz' ),
		'theme-overlay' => esc_html__( 'Theme Overlay', 'lendiz' ),
		'theme' 		=> esc_html__( 'Theme Color Background', 'lendiz' ),
		'none' 			=> esc_html__( 'None', 'lendiz' )
	),
	'default'		=> 'featured',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Link Format
$settings = array(
	'id'			=> 'single-post-link-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Link Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose single post page link post format settings.', 'lendiz' ),
	'choices'		=> array(
		'featured' 		=> esc_html__( 'Dark Overlay', 'lendiz' ),
		'theme-overlay' => esc_html__( 'Theme Overlay', 'lendiz' ),
		'theme' 		=> esc_html__( 'Theme Color Background', 'lendiz' ),
		'none' 			=> esc_html__( 'None', 'lendiz' )
	),
	'default'		=> 'featured',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Gallery Format
$settings = array(
	'id'			=> 'single-post-gallery-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Gallery Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose single post page gallery post format settings.', 'lendiz' ),
	'choices'		=> array(
		'default'	=> esc_html__( 'Default Gallery', 'lendiz' ),
		'popup' 	=> esc_html__( 'Popup Gallery', 'lendiz' ),
		'grid' 		=> esc_html__( 'Grid Popup Gallery', 'lendiz' )
	),
	'default'		=> 'default',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Post Format Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );

//Single Post Featured Slider
$settings = array(
	'id'			=> 'single-post-featured-slider',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Single Post Featured Slider', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable single post featured slider.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebar Sticky
$settings = array(
	'id'			=> 'single-post-sidebar-sticky',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Sidebar Sticky', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable sidebar sticky.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebar on Mobile
$settings = array(
	'id'			=> 'single-post-page-hide-sidebar',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Sidebar on Mobile', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to show or hide sidebar on mobile.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Post Max Limit
$settings = array(
	'id'			=> 'related-max-posts',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Related Post Max Limit', 'lendiz' ),
	'description'	=> esc_html__( 'Enter related post maximum limit for get from posts query. Example 5', 'lendiz' ),
	'default'		=> '5',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Related Posts From
$settings = array(
	'id'			=> 'related-posts-filter',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Related Posts From', 'lendiz' ),
	'description'	=> esc_html__( 'Select related posts gets from category or tag.', 'lendiz' ),
	'choices'		=> array(
		'category'	=> esc_html__( 'Category', 'lendiz' ),
		'tag'		=> esc_html__( 'Tag', 'lendiz' )
	),
	'default'		=> 'category',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Advanced End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );