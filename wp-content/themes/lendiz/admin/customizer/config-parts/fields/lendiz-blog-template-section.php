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
	'id'			=> 'blog-page-title-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Page Title Option', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title.', 'lendiz' ),
	'default'		=> 1,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Items
$settings = array(
	'id'			=> 'template-blog-pagetitle-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Page Title Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed items for page title wrap, drag from disabled and put enabled.', 'lendiz' ),
	'default' 		=> array(
		'disabled' => array(
			'description' => esc_html__( 'Page Title Description', 'lendiz' )
		),
		'Left'  => array(
			'title' => esc_html__( 'Page Title Text', 'lendiz' ),
		),
		'Center' => array(),
		'Right'  => array(
			'breadcrumb'	=> esc_html__( 'Breadcrumb', 'lendiz' )
		)
	),
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Blog Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for blog page layout, sidebar sticky and etc.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Template
$settings = array(
	'id'			=> 'blog-page-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Blog Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current blog page template.', 'lendiz' ),
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
	'id'			=> 'blog-left-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Left Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on left side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Right Sidebar
$settings = array(
	'id'			=> 'blog-right-sidebar',
	'type'			=> 'sidebars',
	'title'			=> esc_html__( 'Right Sidebar', 'lendiz' ),
	'description'	=> esc_html__( 'Select widget area for showing on right side.', 'lendiz' ),
	'default'		=> 'sidebar-1',
	'refresh'		=> 0
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Post Template
$settings = array(
	'id'			=> 'blog-post-template',
	'type'			=> 'radioimage',
	'title'			=> esc_html__( 'Blog Post Template', 'lendiz' ),
	'description'	=> esc_html__( 'Choose your current blog post template.', 'lendiz' ),
	'default'		=> 'standard',
	'items' 		=> array(
		'standard'	=> LENDIZ_ADMIN_URL . '/customizer/assets/images/post-layouts/1.png',
		'grid'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/post-layouts/2.png',
		'list'		=> LENDIZ_ADMIN_URL . '/customizer/assets/images/post-layouts/3.png'		
	),
	'cols'			=> '3',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Top Standard Post
$settings = array(
	'id'			=> 'blog-top-standard-post',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Top Standard Post', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to show top post layout standard others selected layout.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Grid Columns
$settings = array(
	'id'			=> 'blog-grid-cols',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Grid Columns', 'lendiz' ),
	'description'	=> esc_html__( 'Select grid columns.', 'lendiz' ),
	'choices'		=> array(
		'4'		=> esc_html__( '4 Columns', 'lendiz' ),
		'3'		=> esc_html__( '3 Columns', 'lendiz' ),
		'2'		=> esc_html__( '2 Columns', 'lendiz' ),
	),
	'default'		=> '2',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Post Grid Gutter
$settings = array(
	'id'			=> 'blog-grid-gutter',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Blog Post Grid Gutter', 'lendiz' ),
	'description'	=> esc_html__( 'Enter grid gutter size. Example 20', 'lendiz' ),
	'default'		=> '30',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Grid Type
$settings = array(
	'id'			=> 'blog-grid-type',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Grid Type', 'lendiz' ),
	'description'	=> esc_html__( 'Select grid type normal or isotope.', 'lendiz' ),
	'choices'		=> array(
		'normal'		=> esc_html__( 'Normal Grid', 'lendiz' ),
		'isotope'		=> esc_html__( 'Isotope Grid', 'lendiz' ),
	),
	'default'		=> 'normal',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Infinite Scroll
$settings = array(
	'id'			=> 'blog-infinite-scroll',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Infinite Scroll', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable infinite scroll for blog post.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Post Excerpt Length
$settings = array(
	'id'			=> 'blog-excerpt',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Post Excerpt Length', 'lendiz' ),
	'description'	=> esc_html__( 'Set blog post excerpt length. Example 15', 'lendiz' ),
	'default'		=> '15',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Post Top Meta Items
$settings = array(
	'id'			=> 'blog-topmeta-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Blog Post Top Meta Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed blog post top meta items drag from disabled and put enabled part. ie: Left or Right.', 'lendiz' ),
	'default' 		=> array(
		'Left'  => array(
			'date'		=> esc_html__( 'Date', 'lendiz' )
		),
		'Right'  => array(
			'category'	=> esc_html__( 'Category', 'lendiz' )
		),
		'disabled' => array(
			'social'	=> esc_html__( 'Social Share', 'lendiz' ),
			'comments'	=> esc_html__( 'Comments', 'lendiz' ),
			'likes'		=> esc_html__( 'Likes', 'lendiz' ),
			'author'	=> esc_html__( 'Author', 'lendiz' ),
			'views'		=> esc_html__( 'Views', 'lendiz' ),
			'more'		=> esc_html__( 'Read More', 'lendiz' ),
			'favourite'	=> esc_html__( 'Favourite', 'lendiz' )
		)
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Post Bottom Meta Items
$settings = array(
	'id'			=> 'blog-bottommeta-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Blog Post Bottom Meta Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed blog post bottom meta items drag from disabled and put enabled part. ie: Left or Right.', 'lendiz' ),
	'default' 		=> array(
		'Left'  => array(
			'more'		=> esc_html__( 'Read More', 'lendiz' ),
		),
		'Right'  => array(),
		'disabled' => array(
			'comments'	=> esc_html__( 'Comments', 'lendiz' ),
			'category'	=> esc_html__( 'Category', 'lendiz' ),
			'social'	=> esc_html__( 'Social Share', 'lendiz' ),
			'comments'	=> esc_html__( 'Comments', 'lendiz' ),
			'likes'		=> esc_html__( 'Likes', 'lendiz' ),
			'author'	=> esc_html__( 'Author', 'lendiz' ),
			'views'		=> esc_html__( 'Views', 'lendiz' ),
			'date'		=> esc_html__( 'Date', 'lendiz' ),
			'favourite'	=> esc_html__( 'Favourite', 'lendiz' )
		)
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Post Items
$settings = array(
	'id'			=> 'blog-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Blog Post Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed blog post items drag from disabled and put enabled part. Thumbnail part covers the post format either image/audio/video/gallery/quote/link.', 'lendiz' ),
	'default' 		=> array(
		'Enabled'  		=> array(
			'title'			=> esc_html__( 'Title', 'lendiz' ),
			'top-meta'		=> esc_html__( 'Top Meta', 'lendiz' ),
			'thumb'			=> esc_html__( 'Thumbnail', 'lendiz' ),
			'content'		=> esc_html__( 'Content', 'lendiz' ),
			'bottom-meta'	=> esc_html__( 'Bottom Meta', 'lendiz' )
		),
		'disabled' => array()
	),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Post Overlay
$settings = array(
	'id'			=> 'blog-overlay-opt',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Blog Post Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable blog post overlay.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Post Overlay Items
$settings = array(
	'id'			=> 'blog-overlay-items',
	'type'			=> 'dragdrop',
	'title'			=> esc_html__( 'Blog Post Overlay Items', 'lendiz' ),
	'description'	=> esc_html__( 'Needed blog post overlay items drag from disabled and put enabled part.', 'lendiz' ),
	'default' 		=> array(
		'Enabled'  	=> array(
			'title'			=> esc_html__( 'Title', 'lendiz' ),
		),
		'disabled' => array(
			'top-meta'		=> esc_html__( 'Top Meta', 'lendiz' ),
			'bottom-meta'	=> esc_html__( 'Bottom Meta', 'lendiz' )
		)
	),
	'required'		=> array( 'blog-overlay-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Settings End
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
	'section_stat'	=> true,
);
LendizCustomizerConfig::buildFields( $settings );

//Font Color
$settings = array(
	'id'			=> 'template-blog-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for current field.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Template Link Color
$settings = array(
	'id'			=> 'template-blog-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Blog Template Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose Blog template color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Template Border
$settings = array(
	'id'			=> 'template-blog-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Blog Template Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Template Padding Option
$settings = array(
	'id'			=> 'template-blog-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Blog Template Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Template Background
$settings = array(
	'id'			=> 'template-blog-background-all',
	'type'			=> 'background',
	'title'			=> esc_html__( 'Blog Template Background', 'lendiz' ),
	'description'	=> esc_html__( 'This is settings for footer background.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Parallax
$settings = array(
	'id'			=> 'blog-page-title-parallax',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Parallax', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background parallax.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Background Video
$settings = array(
	'id'			=> 'blog-page-title-bg',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable page title background video.', 'lendiz' ),
	'default'		=> 0,
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Background Video
$settings = array(
	'id'			=> 'blog-page-title-video',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Page Title Background Video', 'lendiz' ),
	'description'	=> esc_html__( 'Set page title background video for page. Only allowed youtube video id. Example: UWF7dZTLW4c', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'blog-page-title-bg', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Overlay
$settings = array(
	'id'			=> 'blog-page-title-overlay',
	'type'			=> 'alpha',
	'title'			=> esc_html__( 'Page Title Overlay', 'lendiz' ),
	'description'	=> esc_html__( 'Choose page title overlay rgba color.', 'lendiz' ),
	'default'		=> '',
	'required'		=> array( 'blog-page-title-opt', '=', 1 ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Page Title Settings End
$settings = array(
	'type'			=> 'section',
	'section_stat'	=> false,
	'required'		=> array( 'blog-page-title-opt', '=', 1 )
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Article Skin Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Blog Article Skin Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is skin settings for each blog article.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Article Font Color
$settings = array(
	'id'			=> 'blog-article-color',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Article Font Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is font color for blog article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Link Color
$settings = array(
	'id'			=> 'blog-article-link-color',
	'type'			=> 'link',
	'title'			=> esc_html__( 'Article Link Color', 'lendiz' ),
	'description'	=> esc_html__( 'Choose Article Link color for blog article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Border
$settings = array(
	'id'			=> 'blog-article-border',
	'type'			=> 'border',
	'title'			=> esc_html__( 'Article Border', 'lendiz' ),
	'description'	=> esc_html__( 'Here you can set border. No need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Padding Option
$settings = array(
	'id'			=> 'blog-article-padding',
	'type'			=> 'dimension',
	'title'			=> esc_html__( 'Article Padding Option', 'lendiz' ),
	'description'	=> esc_html__( 'Here no need to put dimension units like px, em etc. Example 10 10 20 10.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Article Background Color
$settings = array(
	'id'			=> 'blog-article-background',
	'type'			=> 'color',
	'title'			=> esc_html__( 'Article Background Color', 'lendiz' ),
	'description'	=> esc_html__( 'This is background color for blog article.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Article Skin Settings End
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

//Custom Text Start
$settings = array(
	'type'			=> 'toggle_section',
	'label'			=> esc_html__( 'Custom Text', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Post Read More Text
$settings = array(
	'id'			=> 'blog-more-text',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Post Read More Text', 'lendiz' ),
	'description'	=> esc_html__( 'Set blog post read more text. Example Read More', 'lendiz' ),
	'default'		=> esc_html__( 'Read More', 'lendiz' ),
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Page Title
$settings = array(
	'id'			=> 'blog-page-title',
	'type'			=> 'text',
	'title'			=> esc_html__( 'Blog Page Title', 'lendiz' ),
	'description'	=> esc_html__( 'This is a title for blog page. HTML code allowed here.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 1,
	//'instant'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Blog Page Description
$settings = array(
	'id'			=> 'blog-page-desc',
	'type'			=> 'textarea',
	'title'			=> esc_html__( 'Blog Page Description', 'lendiz' ),
	'description'	=> esc_html__( 'This is description for blog page. HTML code allowed here.', 'lendiz' ),
	'default'		=> '',
	'refresh'		=> 0,
	'instant'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Custom Text End
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

//Post Format Settings
$settings = array(
	'type'			=> 'section',
	'label'			=> esc_html__( 'Post Format Settings', 'lendiz' ),
	'description'	=> esc_html__( 'This is post format settings for blog.', 'lendiz' ),
	'section_stat'	=> true
);
LendizCustomizerConfig::buildFields( $settings );

//Video Format
$settings = array(
	'id'			=> 'blog-video-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Video Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose blog page video post format settings.', 'lendiz' ),
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
	'id'			=> 'blog-quote-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Quote Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose blog page quote post format settings.', 'lendiz' ),
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
	'id'			=> 'blog-link-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Link Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose blog page link post format settings.', 'lendiz' ),
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
	'id'			=> 'blog-gallery-format',
	'type'			=> 'select',
	'title'			=> esc_html__( 'Gallery Format', 'lendiz' ),
	'description'	=> esc_html__( 'Choose blog page gallery post format settings.', 'lendiz' ),
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

//Blog Featured Slider
$settings = array(
	'id'			=> 'blog-featured-slider',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Blog Featured Slider', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable blog featured slider.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebar Sticky
$settings = array(
	'id'			=> 'blog-sidebar-sticky',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Sidebar Sticky', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable sidebar sticky.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Sidebar on Mobile
$settings = array(
	'id'			=> 'blog-page-hide-sidebar',
	'type'			=> 'toggle',
	'title'			=> esc_html__( 'Sidebar on Mobile', 'lendiz' ),
	'description'	=> esc_html__( 'Enable/Disable to show or hide sidebar on mobile.', 'lendiz' ),
	'default'		=> 0,
	'refresh'		=> 1
);
LendizCustomizerConfig::buildFields( $settings );

//Advanced End
$settings = array(
	'type'			=> 'toggle_section',
	'section_stat'	=> false
);
LendizCustomizerConfig::buildFields( $settings );