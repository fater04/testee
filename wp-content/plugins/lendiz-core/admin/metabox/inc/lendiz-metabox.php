<?php
/* Lendiz Page Options */
$prefix = 'lendiz_post_';
$fields = array(
	array( 
		'label'	=> esc_html__( 'Post General Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are single post general settings.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Post Layout', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post layout for current post single view.', 'lendiz-core' ), 
		'id'	=> $prefix.'layout',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'wide' => esc_html__( 'Wide', 'lendiz-core' ),
			'boxed' => esc_html__( 'Boxed', 'lendiz-core' )			
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Content Padding Option', 'lendiz-core' ),
		'id'	=> $prefix.'content_padding_opt',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Content Padding', 'lendiz-core' ), 
		'desc'	=> esc_html__( 'Set the top/right/bottom/left padding of post content.', 'lendiz-core' ),
		'id'	=> $prefix.'content_padding',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'space',
		'required'	=> array( $prefix.'content_padding_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Template Option', 'lendiz-core' ),
		'id'	=> $prefix.'template_opt',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Template', 'lendiz-core' ),
		'id'	=> $prefix.'template',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'image_select',
		'options' => array(
			'no-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/1.png' ), 
			'right-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/2.png' ), 
			'left-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/3.png' ), 
			'both-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/4.png' ), 
		),
		'default'	=> 'right-sidebar',
		'required'	=> array( $prefix.'template_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Left Sidebar', 'lendiz-core' ),
		'id'	=> $prefix.'left_sidebar',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'template_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Right Sidebar', 'lendiz-core' ),
		'id'	=> $prefix.'right_sidebar',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'template_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Sidebar On Mobile', 'lendiz-core' ),
		'id'	=> $prefix.'sidebar_mobile',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Show', 'lendiz-core' ),
			'0' => esc_html__( 'Hide', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Featured Slider', 'lendiz-core' ),
		'id'	=> $prefix.'featured_slider',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Full Width Wrap', 'lendiz-core' ),
		'id'	=> $prefix.'full_wrap',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Items Option', 'lendiz-core' ),
		'id'	=> $prefix.'items_opt',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Needed single post items drag from disabled and put enabled part.', 'lendiz-core' ),
		'id'	=> $prefix.'items',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'dd_fields' => array ( 
			'Enabled'  => array(
				'title' 	=> esc_html__( 'Title', 'lendiz-core' ),
				'top-meta'	=> esc_html__( 'Top Meta', 'lendiz-core' ),
				'thumb' 	=> esc_html__( 'Thumbnail', 'lendiz-core' ),
				'content' 	=> esc_html__( 'Content', 'lendiz-core' ),
				'bottom-meta'		=> esc_html__( 'Bottom Meta', 'lendiz-core' )
			),
			'disabled' => array()
		),
		'required'	=> array( $prefix.'items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Overlay', 'lendiz-core' ),
		'id'	=> $prefix.'overlay_opt',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Overlay Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Needed overlay post items drag from disabled and put enabled part.', 'lendiz-core' ),
		'id'	=> $prefix.'overlay_items',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'dd_fields' => array ( 
			'Enabled'  => array(
				'title' 	=> esc_html__( 'Title', 'lendiz-core' )
			),
			'disabled' => array(
				'top-meta'	=> esc_html__( 'Top Meta', 'lendiz-core' ),
				'bottom-meta'		=> esc_html__( 'Bottom Meta', 'lendiz-core' )
			)
		),
		'required'	=> array( $prefix.'overlay_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Page Items Option', 'lendiz-core' ),
		'id'	=> $prefix.'page_items_opt',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'		
	),
	array( 
		'label'	=> esc_html__( 'Post Page Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Needed post page items drag from disabled and put enabled part.', 'lendiz-core' ),
		'id'	=> $prefix.'page_items',
		'tab'	=> esc_html__( 'General', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'dd_fields' => array ( 
			'Enabled'  => array(
				'post-items' 	=> esc_html__( 'Post Items', 'lendiz-core' ),
				'author-info'	=> esc_html__( 'Author Info', 'lendiz-core' ),
				'related-slider'=> esc_html__( 'Related Slider', 'lendiz-core' ),
				'post-nav' 	=> esc_html__( 'Post Nav', 'lendiz-core' ),
				'comment' 	=> esc_html__( 'Comment', 'lendiz-core' )
			),
			'disabled' => array()
		),
		'default'	=> 'post-items,author-info,related-slider,post-nav,comment',
		'required'	=> array( $prefix.'page_items_opt', 'custom' )
	),
	//Header
	array( 
		'label'	=> esc_html__( 'Header General Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header general settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Layout', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post layout for current post header layout.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_layout',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'wide' => esc_html__( 'Wide', 'lendiz-core' ),
			'boxed' => esc_html__( 'Boxed', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Type', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post layout for current post header type.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_type',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'default' => esc_html__( 'Default', 'lendiz-core' ),
			'left-sticky' => esc_html__( 'Left Sticky', 'lendiz-core' ),
			'right-sticky' => esc_html__( 'Right Sticky', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Background Image', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header background image for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'image',
		'id'	=> $prefix.'header_bg_img',
		'required'	=> array( $prefix.'header_type', 'default' )
	),
	array( 
		'label'	=> esc_html__( 'Header Items Options', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_items_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header general items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_items',
		'dd_fields' => array ( 
			'Normal' => array( 
				'header-topbar' 	=> esc_html__( 'Topbar', 'lendiz-core' ),
				'header-logo'	=> esc_html__( 'Logo Bar', 'lendiz-core' )
			),
			'Sticky' => array( 
				'header-nav' 	=> esc_html__( 'Navbar', 'lendiz-core' )
			),
			'disabled' => array()
		),
		'required'	=> array( $prefix.'header_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Absolute Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header absolute to change header look transparent.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_absolute_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header sticky options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_sticky_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'sticky' => esc_html__( 'Header Sticky Part', 'lendiz-core' ),
			'sticky-scroll' => esc_html__( 'Sticky Scroll Up', 'lendiz-core' ),
			'none' => esc_html__( 'None', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Options', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_topbar_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Height', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar height for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_topbar_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Height', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar sticky height for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_topbar_sticky_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header topbar skin settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header topbar skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_topbar_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_topbar_font',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_topbar_bg',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_topbar_link',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_topbar_border',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_topbar_padding',
		'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header top bar sticky skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_topbar_sticky_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header top bar sticky font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_topbar_sticky_font',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header top bar sticky background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_topbar_sticky_bg',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header top bar sticky link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_topbar_sticky_link',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header top bar sticky border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_topbar_sticky_border',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Sticky Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header top bar sticky padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_topbar_sticky_padding',
		'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Items Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header topbar items enable options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_topbar_items_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Top Bar Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header topbar items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_topbar_items',
		'dd_fields' => array ( 
			'Left'  => array(
				'header-topbar-date' => esc_html__( 'Date', 'lendiz-core' ),						
			),
			'Center' => array(),
			'Right' => array(),
			'disabled' => array(
				'header-topbar-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz-core' ),
				'header-topbar-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz-core' ),
				'header-topbar-text-3'	=> esc_html__( 'Custom Text 3', 'lendiz-core' ),
				'header-topbar-menu'    => esc_html__( 'Top Bar Menu', 'lendiz-core' ),
				'header-topbar-social'	=> esc_html__( 'Social', 'lendiz-core' ),
				'header-topbar-search'	=> esc_html__( 'Search', 'lendiz-core' )
			)
		),
		'required'	=> array( $prefix.'header_topbar_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Options', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_logo_bar_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Height', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar height for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_logo_bar_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Height', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky height for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_logo_bar_sticky_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header logo bar skin settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header logo bar skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_logo_bar_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_logo_bar_font',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_logo_bar_bg',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_logo_bar_link',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_logo_bar_border',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_logo_bar_padding',
		'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header logo bar sticky skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_logobar_sticky_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_logobar_sticky_font',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_logobar_sticky_bg',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_logobar_sticky_link',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_logobar_sticky_border',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Sticky Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar sticky padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_logobar_sticky_padding',
		'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Items Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header logo bar items enable options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_logo_bar_items_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Logo Bar Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header logo bar items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_logo_bar_items',
		'dd_fields' => array ( 
			'Left'  => array(
				'header-logobar-logo'		=> esc_html__( 'Logo', 'lendiz-core' ),
				'header-logobar-sticky-logo' => esc_html__( 'Sticky Logo', 'lendiz-core' )											
			),
			'Center' => array(),
			'Right' => array(),
			'disabled' => array(
				'header-logobar-social'		=> esc_html__( 'Social', 'lendiz-core' ),
				'header-logobar-search'		=> esc_html__( 'Search', 'lendiz-core' ),
				'header-logobar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'lendiz-core' ),	
				'header-phone'   			=> esc_html__( 'Phone Number', 'lendiz-core' ),
				'header-address'  			=> esc_html__( 'Address Text', 'lendiz-core' ),
				'header-email'   			=> esc_html__( 'Email', 'lendiz-core' ),
				'header-logobar-menu'   	=> esc_html__( 'Main Menu', 'lendiz-core' ),
				'header-logobar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz-core' ),
				'header-logobar-text-1'		=> esc_html__( 'Custom Text 1', 'lendiz-core' ),
				'header-logobar-text-2'		=> esc_html__( 'Custom Text 2', 'lendiz-core' ),
				'header-logobar-text-3'		=> esc_html__( 'Custom Text 3', 'lendiz-core' ),	
				'header-cart'   			=> esc_html__( 'Cart', 'lendiz-core' ),
				'header-wishlist'   		=> esc_html__( 'Wishlist', 'lendiz-core' ),
				'multi-info'   				=> esc_html__( 'Address, Phone, Email', 'lendiz-core' )
			)
		),
		'required'	=> array( $prefix.'header_logo_bar_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Options', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_navbar_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Height', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar height for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_navbar_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Height', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky height for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_navbar_sticky_height',
		'property' => 'height',
		'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header navbar skin settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header navbar skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_navbar_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_navbar_font',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_navbar_bg',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_navbar_link',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_navbar_border',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_navbar_padding',
		'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header navbar sticky skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_navbar_sticky_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_navbar_sticky_font',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_navbar_sticky_bg',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_navbar_sticky_link',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_navbar_sticky_border',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Sticky Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar sticky padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_navbar_sticky_padding',
		'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Items Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header navbar items enable options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_navbar_items_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Navbar Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header navbar items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_navbar_items',
		'dd_fields' => array ( 
			'Left'  => array(											
				'header-navbar-menu'    => esc_html__( 'Main Menu', 'lendiz-core' ),
			),
			'Center' => array(
			),
			'Right' => array(
				'header-navbar-search'	=> esc_html__( 'Search', 'lendiz-core' ),
			),
			'disabled' => array(
				'header-navbar-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz-core' ),
				'header-navbar-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz-core' ),
				'header-navbar-text-3'	=> esc_html__( 'Custom Text 3', 'lendiz-core' ),
				'header-navbar-logo'	=> esc_html__( 'Logo', 'lendiz-core' ),
				'header-navbar-social'	=> esc_html__( 'Social', 'lendiz-core' ),
				'header-navbar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'lendiz-core' ),
				'header-navbar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz-core' ),
				'header-navbar-sticky-logo'	=> esc_html__( 'Stikcy Logo', 'lendiz-core' ),
				'header-cart'   		=> esc_html__( 'Cart', 'lendiz-core' )
			)
		),
		'required'	=> array( $prefix.'header_navbar_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header sticky settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Options', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header sticky part option.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_stikcy_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Width', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header Sticky part width for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dimension',
		'id'	=> $prefix.'header_stikcy_width',
		'property' => 'width',
		'required'	=> array( $prefix.'header_stikcy_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are header Sticky skin settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header Sticky skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_stikcy_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header Sticky font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'header_stikcy_font',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header Sticky background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'header_stikcy_bg',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header Sticky link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'header_stikcy_link',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header Sticky border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',

		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'header_stikcy_border',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header Sticky padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'header_stikcy_padding',
		'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Items Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose header Sticky items enable options.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_stikcy_items_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Header Sticky/Fixed Part Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are header Sticky items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'header_stikcy_items',
		'dd_fields' => array ( 
			'Top'  => array(
				'header-fixed-logo' => esc_html__( 'Logo', 'lendiz-core' )
			),
			'Middle'  => array(
				'header-fixed-menu'	=> esc_html__( 'Menu', 'lendiz-core' )					
			),
			'Bottom'  => array(
				'header-fixed-social'	=> esc_html__( 'Social', 'lendiz-core' )					
			),
			'disabled' => array(
				'header-fixed-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz-core' ),
				'header-fixed-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz-core' ),				
				'header-fixed-search'	=> esc_html__( 'Search Form', 'lendiz-core' )
			)
		),
		'required'	=> array( $prefix.'header_stikcy_items_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Bar', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title bar settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Post Title Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post title enable or disable.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_post_title_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Post Title Text', 'lendiz-core' ),
		'desc'	=> esc_html__( 'If this post title is empty, then showing current post default title.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_post_title_text',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'text',
		'default'	=> '',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Description', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter post title description.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_post_title_desc',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'textarea',
		'default'	=> '',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Parallax', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post title background parallax.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_post_title_parallax',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Video Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post title background video option.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_post_title_video_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Video', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter youtube video ID. Example: ZSt9tm3RoUU.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_post_title_video',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'text',
		'default'	=> '',
		'required'	=> array( $prefix.'header_post_title_video_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Bar Items Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post title bar items option.', 'lendiz-core' ), 
		'id'	=> $prefix.'post_title_items_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Bar Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title bar items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'post_title_items',
		'dd_fields' => array ( 
			'Left'  => array(
				'title' => esc_html__( 'Post Title Text', 'lendiz-core' ),
			),
			'Center'  => array(
				
			),
			'Right'  => array(
				'breadcrumb'	=> esc_html__( 'Breadcrumb', 'lendiz-core' )
			),
			'disabled' => array()
		),
		'required'	=> array( $prefix.'post_title_items_opt', 'custom' )
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are post title skin settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'label',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose post title skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'post_title_skin_opt',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default',
		'required'	=> array( $prefix.'header_post_title_opt', '1' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'post_title_font',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'post_title_bg',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Background Image', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter post title background image url.', 'lendiz-core' ), 
		'id'	=> $prefix.'post_title_bg_img',
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'url',
		'default'	=> '',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'post_title_link',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'post_title_border',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'post_title_padding',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Post Title Overlay', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are post title overlay color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'post_title_overlay',
		'required'	=> array( $prefix.'post_title_skin_opt', 'custom' )
	),
	//Footer
	array( 
		'label'	=> 'Footer General',
		'desc'	=> esc_html__( 'These all are header footer settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer layout for current post.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_layout',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'wide' => esc_html__( 'Wide', 'lendiz-core' ),
			'boxed' => esc_html__( 'Boxed', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Hidden Footer', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose hidden footer option.', 'lendiz-core' ), 
		'id'	=> $prefix.'hidden_footer',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are footer skin settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Skin Settings', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer skin settings options.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_font',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Background Image', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer background image for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'image',
		'id'	=> $prefix.'footer_bg_img',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Background Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_bg',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Background Overlay', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer background overlay color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_bg_overlay',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_link',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_border',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_padding',
		'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Items Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer items enable options.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_items_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'footer_items',
		'dd_fields' => array ( 
			'Enabled'  => array(
				'footer-bottom'	=> esc_html__( 'Footer Bottom', 'lendiz-core' )
			),
			'disabled' => array(
				'footer-top' => esc_html__( 'Footer Top', 'lendiz-core' ),
				'footer-middle'	=> esc_html__( 'Footer Middle', 'lendiz-core' )
			)
		),
		'required'	=> array( $prefix.'footer_items_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Top',
		'desc'	=> esc_html__( 'These all are footer top settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Skin', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer top skin options.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_top_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer top font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_top_font',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Widget Title color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer top widget title color.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_top_widget_title_color',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_top_bg',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer top link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_top_link',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer top border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_top_border',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Top Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer top padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_top_padding',
		'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Top Columns and Sidebars Settings',
		'desc'	=> esc_html__( 'These all are footer top columns and sidebar settings.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer layout option.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_top_layout_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout', 'lendiz-core' ),
		'id'	=> $prefix.'footer_top_layout',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'image_select',
		'options' => array(
			'3-3-3-3'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-1.png',
			'4-4-4'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-2.png',
			'3-6-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-3.png',
			'6-6'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-4.png',
			'9-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-5.png',
			'3-9'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-6.png',
			'4-2-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-8.png',
			'6-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-9.png',
			'12'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-7.png'
		),
		'default'	=> '4-4-4',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer First Column',
		'desc'	=> esc_html__( 'Select footer first column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_top_sidebar_1',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Second Column',
		'desc'	=> esc_html__( 'Select footer second column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_top_sidebar_2',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Third Column',
		'desc'	=> esc_html__( 'Select footer third column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_top_sidebar_3',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Fourth Column',
		'desc'	=> esc_html__( 'Select footer fourth column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_top_sidebar_4',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Middle',
		'desc'	=> esc_html__( 'These all are footer middle settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Skin', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer middle skin options.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_middle_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer middle font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_middle_font',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Widget Title Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer middle widget title color.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_middle_widget_title_color',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_middle_bg',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer middle link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_middle_link',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer middle border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_middle_border',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Middle Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer middle padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_middle_padding',
		'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Middle Columns and Sidebars Settings',
		'desc'	=> esc_html__( 'These all are footer middle columns and sidebar settings.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer layout option.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_middle_layout_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Layout', 'lendiz-core' ),
		'id'	=> $prefix.'footer_middle_layout',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'image_select',
		'options' => array(
			'3-3-3-3'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-1.png',
			'4-4-4'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-2.png',
			'3-6-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-3.png',
			'6-6'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-4.png',
			'9-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-5.png',
			'3-9'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-6.png',
			'4-2-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-8.png',
			'6-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-9.png',
			'12'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-7.png'
		),
		'default'	=> '4-4-4',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer First Column',
		'desc'	=> esc_html__( 'Select footer first column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_1',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Second Column',
		'desc'	=> esc_html__( 'Select footer second column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_2',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Third Column',
		'desc'	=> esc_html__( 'Select footer third column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_3',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Fourth Column',
		'desc'	=> esc_html__( 'Select footer fourth column widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_middle_sidebar_4',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
	),
	array( 
		'label'	=> 'Footer Bottom',
		'desc'	=> esc_html__( 'These all are footer bottom settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Fixed', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom fixed option.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_bottom_fixed',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'1' => esc_html__( 'Enable', 'lendiz-core' ),
			'0' => esc_html__( 'Disable', 'lendiz-core' )			
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> '',
		'desc'	=> esc_html__( 'These all are footer bottom skin settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Skin', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom skin options.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_bottom_skin_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Font Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom font color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'color',
		'id'	=> $prefix.'footer_bottom_font',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Background', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom background color for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'alpha_color',
		'id'	=> $prefix.'footer_bottom_bg',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Link Color', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom link color settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'link_color',
		'id'	=> $prefix.'footer_bottom_link',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Border', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom border settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'color' => 1,
		'border_style' => 1,
		'id'	=> $prefix.'footer_bottom_border',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Padding', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom padding settings for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'space',
		'id'	=> $prefix.'footer_bottom_padding',
		'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Widget Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom widget options.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_bottom_widget_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> 'Footer Bottom Widget',
		'desc'	=> esc_html__( 'Select footer bottom widget.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'id'	=> $prefix.'footer_bottom_widget',
		'type'	=> 'sidebar',
		'required'	=> array( $prefix.'footer_bottom_widget_opt', 'custom' )
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Items Option', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose footer bottom items options.', 'lendiz-core' ), 
		'id'	=> $prefix.'footer_bottom_items_opt',
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Footer Bottom Items', 'lendiz-core' ),
		'desc'	=> esc_html__( 'These all are footer bottom items for current post.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
		'type'	=> 'dragdrop_multi',
		'id'	=> $prefix.'footer_bottom_items',
		'dd_fields' => array ( 
			'Left'  => array(
				'copyright' => esc_html__( 'Copyright Text', 'lendiz-core' )
			),
			'Center'  => array(
				'menu'	=> esc_html__( 'Footer Menu', 'lendiz-core' )
			),
			'Right'  => array(),
			'disabled' => array(
				'social'	=> esc_html__( 'Footer Social Links', 'lendiz-core' ),
				'widget'	=> esc_html__( 'Custom Widget', 'lendiz-core' )
			)
		),
		'required'	=> array( $prefix.'footer_bottom_items_opt', 'custom' )
	),
	//Header Slider
	array( 
		'label'	=> esc_html__( 'Slider', 'lendiz-core' ),
		'desc'	=> esc_html__( 'This header slider settings.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Slider', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Slider Option', 'lendiz-core' ),
		'id'	=> $prefix.'header_slider_opt',
		'tab'	=> esc_html__( 'Slider', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'bottom' => esc_html__( 'Below Header', 'lendiz-core' ),
			'top' => esc_html__( 'Above Header', 'lendiz-core' ),
			'none' => esc_html__( 'None', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Slider Shortcode', 'lendiz-core' ),
		'desc'	=> esc_html__( 'This is the place for enter slider shortcode. Example revolution slider shortcodes.', 'lendiz-core' ), 
		'id'	=> $prefix.'header_slider',
		'tab'	=> esc_html__( 'Slider', 'lendiz-core' ),
		'type'	=> 'textarea',
		'default'	=> ''
	),
	//Post Format
	array( 
		'label'	=> esc_html__( 'Video', 'lendiz-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed video format, then you must choose video type and give video id.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Video Modal', 'lendiz-core' ),
		'id'	=> $prefix.'video_modal',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'onclick' => esc_html__( 'On Click Run Video', 'lendiz-core' ),
			'overlay' => esc_html__( 'Modal Box Video', 'lendiz-core' ),
			'direct' => esc_html__( 'Direct Video', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Video Type', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose video type.', 'lendiz-core' ), 
		'id'	=> $prefix.'video_type',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'' => esc_html__( 'None', 'lendiz-core' ),
			'youtube' => esc_html__( 'Youtube', 'lendiz-core' ),
			'vimeo' => esc_html__( 'Vimeo', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom Video', 'lendiz-core' )
		),
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'Video ID', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter Video ID Example: ZSt9tm3RoUU. If you choose custom video type then you enter custom video url and video must be mp4 format.', 'lendiz-core' ), 
		'id'	=> $prefix.'video_id',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' )
	),
	array( 
		'label'	=> esc_html__( 'Audio', 'lendiz-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed audio format, then you must give audio id.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Audio Type', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Choose audio type.', 'lendiz-core' ), 
		'id'	=> $prefix.'audio_type',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'' => esc_html__( 'None', 'lendiz-core' ),
			'soundcloud' => esc_html__( 'Soundcloud', 'lendiz-core' ),
			'custom' => esc_html__( 'Custom Audio', 'lendiz-core' )
		),
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'Audio ID', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter soundcloud audio ID. Example: 315307209.', 'lendiz-core' ), 
		'id'	=> $prefix.'audio_id',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' )
	),
	array( 
		'label'	=> esc_html__( 'Gallery', 'lendiz-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed gallery format, then you must choose gallery images here.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Gallery Modal', 'lendiz-core' ),
		'id'	=> $prefix.'gallery_modal',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'default' => esc_html__( 'Default Gallery', 'lendiz-core' ),
			'popup' => esc_html__( 'Popup Gallery', 'lendiz-core' ),
			'grid' => esc_html__( 'Grid Popup Gallery', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Choose Gallery Images', 'lendiz-core' ),
		'id'	=> $prefix.'gallery',
		'type'	=> 'gallery',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' )
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' )
	),
	array( 
		'label'	=> esc_html__( 'Quote', 'lendiz-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed quote format, then you must fill the quote text and author name box.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Quote Modal', 'lendiz-core' ),
		'id'	=> $prefix.'quote_modal',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'featured' => esc_html__( 'Dark Overlay', 'lendiz-core' ),
			'theme-overlay' => esc_html__( 'Theme Overlay', 'lendiz-core' ),
			'theme' => esc_html__( 'Theme Color Background', 'lendiz-core' ),
			'none' => esc_html__( 'None', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Quote Text', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter quote text.', 'lendiz-core' ), 
		'id'	=> $prefix.'quote_text',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'textarea',
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'Quote Author', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter quote author name.', 'lendiz-core' ), 
		'id'	=> $prefix.'quote_author',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' )
	),
	array( 
		'label'	=> esc_html__( 'Link', 'lendiz-core' ),
		'desc'	=> esc_html__( 'This part for if you choosed link format, then you must fill the external link box.', 'lendiz-core' ), 
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'label'
	),
	array( 
		'label'	=> esc_html__( 'Link Modal', 'lendiz-core' ),
		'id'	=> $prefix.'link_modal',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'select',
		'options' => array ( 
			'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
			'featured' => esc_html__( 'Dark Overlay', 'lendiz-core' ),
			'theme-overlay' => esc_html__( 'Theme Overlay', 'lendiz-core' ),
			'theme' => esc_html__( 'Theme Color Background', 'lendiz-core' ),
			'none' => esc_html__( 'None', 'lendiz-core' )
		),
		'default'	=> 'theme-default'
	),
	array( 
		'label'	=> esc_html__( 'Link Text', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter link text to show.', 'lendiz-core' ), 
		'id'	=> $prefix.'link_text',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'text',
		'default'	=> ''
	),
	array( 
		'label'	=> esc_html__( 'External Link', 'lendiz-core' ),
		'desc'	=> esc_html__( 'Enter external link.', 'lendiz-core' ), 
		'id'	=> $prefix.'extrenal_link',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
		'type'	=> 'url',
		'default'	=> ''
	),
	array( 
		'type'	=> 'line',
		'tab'	=> esc_html__( 'Format', 'lendiz-core' )
	),
	
);
/**
 * Instantiate the class with all variables to create a meta box
 * var $id string meta box id
 * var $title string title
 * var $fields array fields
 * var $page string|array post type to add meta box to
 * var $js bool including javascript or not
 */
 
$post_box = new Custom_Add_Meta_Box( 'lendiz_post_metabox', esc_html__( 'Lendiz Post Options', 'lendiz-core' ), $fields, 'post', true );

/* Lendiz Page Options */
function lendiz_metabox_fields( $prefix ){
	
	$lendiz_menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
	$lendiz_nav_menus = array( "none" => esc_html__( "None", "lendiz" ) );
	foreach( $lendiz_menus as $menu ){
		$lendiz_nav_menus[$menu->slug] = $menu->name;
	}
			
	$fields = array(
		array( 
			'label'	=> esc_html__( 'Page General Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page general settings.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Page Layout', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page layout for current post single view.', 'lendiz-core' ), 
			'id'	=> $prefix.'layout',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'wide' => esc_html__( 'Wide', 'lendiz-core' ),
				'boxed' => esc_html__( 'Boxed', 'lendiz-core' )			
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Page Content Padding Option', 'lendiz-core' ),
			'id'	=> $prefix.'content_padding_opt',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'		
		),
		array( 
			'label'	=> esc_html__( 'Page Content Padding', 'lendiz-core' ), 
			'desc'	=> esc_html__( 'Set the top/right/bottom/left padding of page content.', 'lendiz-core' ),
			'id'	=> $prefix.'content_padding',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'space',
			'required'	=> array( $prefix.'content_padding_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Background Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose color setting for current page background.', 'lendiz-core' ),
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'main_bg_color'
		),
		array( 
				'label'	=> esc_html__( 'Page Background Image', 'lendiz-core' ),
				'desc'	=> esc_html__( 'Choose custom logo image for current page.', 'lendiz-core' ), 
				'tab'	=> esc_html__( 'General', 'lendiz-core' ),
				'type'	=> 'image',
				'id'	=> $prefix.'main_bg_image'
			),
		array( 
			'label'	=> esc_html__( 'Page Margin', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are margin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'main_margin'
		),
		array( 
			'label'	=> esc_html__( 'Page Template Option', 'lendiz-core' ),
			'id'	=> $prefix.'template_opt',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'		
		),
		array( 
			'label'	=> esc_html__( 'Page Template', 'lendiz-core' ),
			'id'	=> $prefix.'template',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'no-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/1.png' ), 
				'right-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/2.png' ), 
				'left-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/3.png' ), 
				'both-sidebar'	=> get_theme_file_uri( '/assets/images/page-layouts/4.png' ), 
			),
			'default'	=> 'right-sidebar',
			'required'	=> array( $prefix.'template_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Left Sidebar', 'lendiz-core' ),
			'id'	=> $prefix.'left_sidebar',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'template_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Right Sidebar', 'lendiz-core' ),
			'id'	=> $prefix.'right_sidebar',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'template_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Sidebar On Mobile', 'lendiz-core' ),
			'id'	=> $prefix.'sidebar_mobile',
			'tab'	=> esc_html__( 'General', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'1' => esc_html__( 'Show', 'lendiz-core' ),
				'0' => esc_html__( 'Hide', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header General Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header general settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Extra Class', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter extra class name for additional class name for header.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_extra_class',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'One Page Menu Offset', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter one page menu offset for desktop menu.', 'lendiz-core' ), 
			'id'	=> $prefix.'one_page_menu_offset',
			'tab'	=> esc_html__( 'One Page', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '60'
		),
		array( 
			'label'	=> esc_html__( 'One Page Mobile Menu Offset', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter one page mobile menu offset for desktop menu.', 'lendiz-core' ), 
			'id'	=> $prefix.'one_page_mobmenu_offset',
			'tab'	=> esc_html__( 'One Page', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '60'
		),
		array( 
			'label'	=> esc_html__( 'Header Layout', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page layout for current page header layout.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_layout',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'wide' => esc_html__( 'Wide', 'lendiz-core' ),
				'boxed' => esc_html__( 'Boxed', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Type', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page layout for current page header type.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_type',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'default' => esc_html__( 'Default', 'lendiz-core' ),
				'left-sticky' => esc_html__( 'Left Sticky', 'lendiz-core' ),
				'right-sticky' => esc_html__( 'Right Sticky', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Background Image', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header background image for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'header_bg_img',
			'required'	=> array( $prefix.'header_type', 'default' )
		),
		array( 
			'label'	=> esc_html__( 'Header Items Options', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_items_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header general items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_items',
			'dd_fields' => array ( 
				'Normal' => array( 
					'header-topbar' 	=> esc_html__( 'Topbar', 'lendiz-core' ),
					'header-logo'	=> esc_html__( 'Logo Bar', 'lendiz-core' )
				),
				'Sticky' => array( 
					'header-nav' 	=> esc_html__( 'Navbar', 'lendiz-core' )
				),
				'disabled' => array()
			),
			'required'	=> array( $prefix.'header_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Absolute Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header absolute to change header look transparent.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_absolute_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'1' => esc_html__( 'Enable', 'lendiz-core' ),
				'0' => esc_html__( 'Disable', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header sticky options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_sticky_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'sticky' => esc_html__( 'Header Sticky Part', 'lendiz-core' ),
				'sticky-scroll' => esc_html__( 'Sticky Scroll Up', 'lendiz-core' ),
				'none' => esc_html__( 'None', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Secondary Space Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose secondary space option for enable secondary menu space for current page.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_secondary_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'enable' => esc_html__( 'Enable', 'lendiz-core' ),
				'disable' => esc_html__( 'Disable', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Secondary Space Animate Type', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose secondary space option animate type for current page.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_secondary_animate',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array(
				'left-push'		=> esc_html__( 'Left Push', 'lendiz-core' ),
				'left-overlay'	=> esc_html__( 'Left Overlay', 'lendiz-core' ),
				'right-push'	=> esc_html__( 'Right Push', 'lendiz-core' ),
				'right-overlay'	=> esc_html__( 'Right Overlay', 'lendiz-core' ),
				'full-overlay'	=> esc_html__( 'Full Page Overlay', 'lendiz-core' ),
			),
			'default'	=> 'left-push',
			'required'	=> array( $prefix.'header_secondary_opt', 'enable' )
		),
		array( 
			'label'	=> esc_html__( 'Secondary Space Width', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Set secondary space width for current page. Example 300', 'lendiz-core' ), 
			'id'	=> $prefix.'header_secondary_width',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'header_secondary_opt', 'enable' )
		),
		array( 
			'label'	=> esc_html__( 'Custom Logo', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose custom logo image for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'custom_logo',
		),
		array( 
			'label'	=> esc_html__( 'Custom Sticky Logo', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose custom sticky logo image for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'custom_sticky_logo',
		),
		array( 
			'label'	=> esc_html__( 'Select Navigation Menu', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose navigation menu for current page.', 'lendiz-core' ), 
			'id'	=> $prefix.'nav_menu',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => $lendiz_nav_menus
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Options', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_topbar_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Height', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar height for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_topbar_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Height', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar sticky height for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_topbar_sticky_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_topbar_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header topbar skin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header topbar skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_topbar_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_topbar_font',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_topbar_bg',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_topbar_link',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_topbar_border',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_topbar_padding',
			'required'	=> array( $prefix.'header_topbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header top bar sticky skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_topbar_sticky_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header top bar sticky font color for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_topbar_sticky_font',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header top bar sticky background color for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_topbar_sticky_bg',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header top bar sticky link color settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_topbar_sticky_link',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header top bar sticky border settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_topbar_sticky_border',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Sticky Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header top bar sticky padding settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_topbar_sticky_padding',
			'required'	=> array( $prefix.'header_topbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Items Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header topbar items enable options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_topbar_items_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Top Bar Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header topbar items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_topbar_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'header-topbar-date' => esc_html__( 'Date', 'lendiz-core' ),						
				),
				'Center' => array(),
				'Right' => array(),
				'disabled' => array(
					'header-topbar-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz-core' ),
					'header-topbar-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz-core' ),
					'header-topbar-text-3'	=> esc_html__( 'Custom Text 3', 'lendiz-core' ),
					'header-topbar-menu'    => esc_html__( 'Top Bar Menu', 'lendiz-core' ),
					'header-topbar-social'	=> esc_html__( 'Social', 'lendiz-core' ),
					'header-topbar-search'	=> esc_html__( 'Search', 'lendiz-core' ),
					'header-topbar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz-core' ),
					'header-cart'   		=> esc_html__( 'Cart', 'lendiz-core' )
				)
			),
			'required'	=> array( $prefix.'header_topbar_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Options', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_logo_bar_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Height', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar height for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_logo_bar_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Height', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky height for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_logo_bar_sticky_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_logo_bar_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header logo bar skin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header logo bar skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_logo_bar_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_logo_bar_font',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_logo_bar_bg',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_logo_bar_link',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_logo_bar_border',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_logo_bar_padding',
			'required'	=> array( $prefix.'header_logo_bar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header logo bar sticky skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_logobar_sticky_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky font color for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_logobar_sticky_font',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky background color for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_logobar_sticky_bg',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky link color settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_logobar_sticky_link',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky border settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_logobar_sticky_border',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Sticky Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar sticky padding settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_logobar_sticky_padding',
			'required'	=> array( $prefix.'header_logobar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Items Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header logo bar items enable options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_logo_bar_items_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Logo Bar Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header logo bar items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_logo_bar_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'header-logobar-logo'		=> esc_html__( 'Logo', 'lendiz-core' ),
					'header-logobar-sticky-logo' => esc_html__( 'Sticky Logo', 'lendiz-core' )											
				),
				'Center' => array(),
				'Right' => array(),
				'disabled' => array(
					'header-logobar-social'		=> esc_html__( 'Social', 'lendiz-core' ),
					'header-logobar-search'		=> esc_html__( 'Search', 'lendiz-core' ),
					'header-logobar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'lendiz-core' ),	
					'header-phone'   			=> esc_html__( 'Phone Number', 'lendiz-core' ),
					'header-address'  			=> esc_html__( 'Address Text', 'lendiz-core' ),
					'header-email'   			=> esc_html__( 'Email', 'lendiz-core' ),
					'header-logobar-menu'   	=> esc_html__( 'Main Menu', 'lendiz-core' ),
					'header-logobar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz-core' ),
					'header-logobar-text-1'		=> esc_html__( 'Custom Text 1', 'lendiz-core' ),
					'header-logobar-text-2'		=> esc_html__( 'Custom Text 2', 'lendiz-core' ),
					'header-logobar-text-3'		=> esc_html__( 'Custom Text 3', 'lendiz-core' ),	
					'header-cart'   			=> esc_html__( 'Cart', 'lendiz-core' ),
					'header-wishlist'   		=> esc_html__( 'Wishlist', 'lendiz-core' ),
					'multi-info'   				=> esc_html__( 'Address, Phone, Email', 'lendiz-core' )
				)
			),
			'required'	=> array( $prefix.'header_logo_bar_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Options', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header items options for enable header drag and drop items.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_navbar_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Height', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar height for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_navbar_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Height', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky height for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_navbar_sticky_height',
			'property' => 'height',
			'required'	=> array( $prefix.'header_navbar_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header navbar skin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header navbar skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_navbar_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_navbar_font',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_navbar_bg',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_navbar_link',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_navbar_border',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_navbar_padding',
			'required'	=> array( $prefix.'header_navbar_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header navbar sticky skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_navbar_sticky_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky font color for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_navbar_sticky_font',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky background color for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_navbar_sticky_bg',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky link color settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_navbar_sticky_link',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky border settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_navbar_sticky_border',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Sticky Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar sticky padding settings for current post.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_navbar_sticky_padding',
			'required'	=> array( $prefix.'header_navbar_sticky_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Items Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header navbar items enable options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_navbar_items_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Navbar Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header navbar items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_navbar_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'header-navbar-logo'		=> esc_html__( 'Logo', 'lendiz' ),
					'header-navbar-sticky-logo'	=> esc_html__( 'Stikcy Logo', 'lendiz' ),
					'header-navbar-menu'    	=> esc_html__( 'Main Menu', 'lendiz' )										
				),
				'Center' => array(),
				'Right' => array(),
				'disabled' => array(					
					'header-navbar-text-1'		=> esc_html__( 'Custom Text 1', 'lendiz' ),
					'header-navbar-text-2'		=> esc_html__( 'Custom Text 2', 'lendiz' ),
					'header-navbar-text-3'		=> esc_html__( 'Custom Text 3', 'lendiz' ),					
					'header-navbar-social'		=> esc_html__( 'Social', 'lendiz' ),
					'header-navbar-secondary-toggle'	=> esc_html__( 'Secondary Toggle', 'lendiz' ),					
					'header-navbar-search'		=> esc_html__( 'Search', 'lendiz' ),
					'header-phone'   			=> esc_html__( 'Phone Number', 'lendiz' ),
					'header-address'  			=> esc_html__( 'Address Text', 'lendiz' ),
					'header-email'   			=> esc_html__( 'Email', 'lendiz' ),
					'header-navbar-search-toggle'	=> esc_html__( 'Search Toggle', 'lendiz' ),
					'header-cart'   			=> esc_html__( 'Cart', 'lendiz' ),
					'header-wishlist'   		=> esc_html__( 'Wishlist', 'lendiz' )
				)
			),
			'required'	=> array( $prefix.'header_navbar_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header sticky settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Options', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header sticky part option.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_stikcy_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Width', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header sticky part width for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dimension',
			'id'	=> $prefix.'header_stikcy_width',
			'property' => 'width',
			'required'	=> array( $prefix.'header_stikcy_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are header sticky skin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header sticky skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_stikcy_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header sticky font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'header_stikcy_font',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header sticky background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'header_stikcy_bg',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header Sticky link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'header_stikcy_link',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header sticky border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'header_stikcy_border',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header sticky padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'header_stikcy_padding',
			'required'	=> array( $prefix.'header_stikcy_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Items Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose header sticky items enable options.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_stikcy_items_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Header Sticky/Fixed Part Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are header sticky items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'header_stikcy_items',
			'dd_fields' => array ( 
				'Top'  => array(
					'header-fixed-logo' => esc_html__( 'Logo', 'lendiz-core' )
				),
				'Middle'  => array(
					'header-fixed-menu'	=> esc_html__( 'Menu', 'lendiz-core' )					
				),
				'Bottom'  => array(
					'header-fixed-social'	=> esc_html__( 'Social', 'lendiz-core' )					
				),
				'disabled' => array(
					'header-fixed-text-1'	=> esc_html__( 'Custom Text 1', 'lendiz-core' ),
					'header-fixed-text-2'	=> esc_html__( 'Custom Text 2', 'lendiz-core' ),					
					'header-fixed-search'	=> esc_html__( 'Search Form', 'lendiz-core' )
				)
			),
			'required'	=> array( $prefix.'header_stikcy_items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Bar', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title bar settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Page Title Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page title enable or disable.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_page_title_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'1' => esc_html__( 'Enable', 'lendiz-core' ),
				'0' => esc_html__( 'Disable', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Page Title Text', 'lendiz-core' ),
			'desc'	=> esc_html__( 'If this page title is empty, then showing current page default title.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_page_title_text',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Description', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter page title description.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_page_title_desc',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'textarea',
			'default'	=> '',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Parallax', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page title background parallax.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_page_title_parallax',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'1' => esc_html__( 'Enable', 'lendiz-core' ),
				'0' => esc_html__( 'Disable', 'lendiz-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Video Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page title background video option.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_page_title_video_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'1' => esc_html__( 'Enable', 'lendiz-core' ),
				'0' => esc_html__( 'Disable', 'lendiz-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Video', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter youtube video ID. Example: ZSt9tm3RoUU.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_page_title_video',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'header_page_title_video_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Bar Items Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page title bar items option.', 'lendiz-core' ), 
			'id'	=> $prefix.'page_title_items_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Bar Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title bar items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'page_title_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'title' => esc_html__( 'Page Title Text', 'lendiz-core' ),
				),
				'Center'  => array(
					
				),
				'Right'  => array(
					'breadcrumb'	=> esc_html__( 'Breadcrumb', 'lendiz-core' )
				),
				'disabled' => array(
					'description' => esc_html__( 'Page Title Description', 'lendiz-core' )
				)
			),
			'required'	=> array( $prefix.'page_title_items_opt', 'custom' )
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are page title skin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'label',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose page title skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'page_title_skin_opt',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default',
			'required'	=> array( $prefix.'header_page_title_opt', '1' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'page_title_font',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Description Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This is page title description color.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'page_title_desc_color',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'page_title_bg',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Background Image', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter page title background image url.', 'lendiz-core' ), 
			'id'	=> $prefix.'page_title_bg_img',
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> '',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'page_title_link',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'page_title_border',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'page_title_padding',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Page Title Overlay', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are page title overlay color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Header', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'page_title_overlay',
			'required'	=> array( $prefix.'page_title_skin_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer General',
			'desc'	=> esc_html__( 'These all are header footer settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer layout for current page.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_layout',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'wide' => esc_html__( 'Wide', 'lendiz-core' ),
				'boxed' => esc_html__( 'Boxed', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Hidden Footer', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose hidden footer option.', 'lendiz-core' ), 
			'id'	=> $prefix.'hidden_footer',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'1' => esc_html__( 'Enable', 'lendiz-core' ),
				'0' => esc_html__( 'Disable', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are footer skin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Skin Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer skin settings options.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_font',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Background Image', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer background image for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'image',
			'id'	=> $prefix.'footer_bg_img',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Background Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_bg',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Background Overlay', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer background overlay color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_bg_overlay',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_link',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_border',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_padding',
			'required'	=> array( $prefix.'footer_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Items Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer items enable options.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_items_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'footer_items',
			'dd_fields' => array ( 
				'Enabled'  => array(
					'footer-bottom'	=> esc_html__( 'Footer Bottom', 'lendiz-core' )
				),
				'disabled' => array(
					'footer-top' => esc_html__( 'Footer Top', 'lendiz-core' ),
					'footer-middle'	=> esc_html__( 'Footer Middle', 'lendiz-core' )
				)
			),
			'required'	=> array( $prefix.'footer_items_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Top',
			'desc'	=> esc_html__( 'These all are footer top settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Skin', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer top skin options.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_top_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer top font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_top_font',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Widget Title color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer top widget title color.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_top_widget_title_color',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_top_bg',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer top link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_top_link',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer top border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_top_border',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Top Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer top padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_top_padding',
			'required'	=> array( $prefix.'footer_top_skin_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Top Columns and Sidebars Settings',
			'desc'	=> esc_html__( 'These all are footer top columns and sidebar settings.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer layout option.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_top_layout_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout', 'lendiz-core' ),
			'id'	=> $prefix.'footer_top_layout',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'3-3-3-3'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-1.png',
				'4-4-4'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-2.png',
				'3-6-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-3.png',
				'6-6'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-4.png',
				'9-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-5.png',
				'3-9'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-6.png',
				'4-2-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-8.png',
				'6-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-9.png',
				'12'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-7.png'
			),
			'default'	=> '4-4-4',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer First Column',
			'desc'	=> esc_html__( 'Select footer first column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_top_sidebar_1',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Second Column',
			'desc'	=> esc_html__( 'Select footer second column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_top_sidebar_2',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Third Column',
			'desc'	=> esc_html__( 'Select footer third column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_top_sidebar_3',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Fourth Column',
			'desc'	=> esc_html__( 'Select footer fourth column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_top_sidebar_4',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_top_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Middle',
			'desc'	=> esc_html__( 'These all are footer middle settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Skin', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer middle skin options.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_middle_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer middle font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_middle_font',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Widget Title Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer middle widget title color.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_middle_widget_title_color',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_middle_bg',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer middle link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_middle_link',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer middle border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_middle_border',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Middle Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer middle padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_middle_padding',
			'required'	=> array( $prefix.'footer_middle_skin_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Middle Columns and Sidebars Settings',
			'desc'	=> esc_html__( 'These all are footer middle columns and sidebar settings.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer layout option.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_middle_layout_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Layout', 'lendiz-core' ),
			'id'	=> $prefix.'footer_middle_layout',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'3-3-3-3'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-1.png',
				'4-4-4'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-2.png',
				'3-6-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-3.png',
				'6-6'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-4.png',
				'9-3'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-5.png',
				'3-9'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-6.png',
				'4-2-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-8.png',
				'6-2-2-2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-9.png',
				'12'		=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/footer/footer-7.png'
			),
			'default'	=> '4-4-4',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer First Column',
			'desc'	=> esc_html__( 'Select footer first column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_1',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Second Column',
			'desc'	=> esc_html__( 'Select footer second column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_2',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Third Column',
			'desc'	=> esc_html__( 'Select footer third column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_3',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Fourth Column',
			'desc'	=> esc_html__( 'Select footer fourth column widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_middle_sidebar_4',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_middle_layout_opt', 'custom' )
		),
		array( 
			'label'	=> 'Footer Bottom',
			'desc'	=> esc_html__( 'These all are footer bottom settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Fixed', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom fixed option.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_bottom_fixed',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'1' => esc_html__( 'Enable', 'lendiz-core' ),
				'0' => esc_html__( 'Disable', 'lendiz-core' )			
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> '',
			'desc'	=> esc_html__( 'These all are footer bottom skin settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Skin', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom skin options.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_bottom_skin_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Font Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom font color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'color',
			'id'	=> $prefix.'footer_bottom_font',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Background', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom background color for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'alpha_color',
			'id'	=> $prefix.'footer_bottom_bg',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Link Color', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom link color settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'link_color',
			'id'	=> $prefix.'footer_bottom_link',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Border', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom border settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'color' => 1,
			'border_style' => 1,
			'id'	=> $prefix.'footer_bottom_border',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Padding', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom padding settings for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'space',
			'id'	=> $prefix.'footer_bottom_padding',
			'required'	=> array( $prefix.'footer_bottom_skin_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Widget Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom widget options.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_bottom_widget_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> 'Footer Bottom Widget',
			'desc'	=> esc_html__( 'Select footer bottom widget.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'id'	=> $prefix.'footer_bottom_widget',
			'type'	=> 'sidebar',
			'required'	=> array( $prefix.'footer_bottom_widget_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Items Option', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose footer bottom items options.', 'lendiz-core' ), 
			'id'	=> $prefix.'footer_bottom_items_opt',
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Footer Bottom Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are footer bottom items for current page.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Footer', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'footer_bottom_items',
			'dd_fields' => array ( 
				'Left'  => array(
					'copyright' => esc_html__( 'Copyright Text', 'lendiz-core' )
				),
				'Center'  => array(
					'menu'	=> esc_html__( 'Footer Menu', 'lendiz-core' )
				),
				'Right'  => array(),
				'disabled' => array(
					'social'	=> esc_html__( 'Footer Social Links', 'lendiz-core' ),
					'widget'	=> esc_html__( 'Custom Widget', 'lendiz-core' )
				)
			),
			'required'	=> array( $prefix.'footer_bottom_items_opt', 'custom' )
		),
		//Header Slider
		array( 
			'label'	=> esc_html__( 'Slider', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This header slider settings.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Slider', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Slider Option', 'lendiz-core' ),
			'id'	=> $prefix.'header_slider_opt',
			'tab'	=> esc_html__( 'Slider', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'bottom' => esc_html__( 'Below Header', 'lendiz-core' ),
				'top' => esc_html__( 'Above Header', 'lendiz-core' ),
				'none' => esc_html__( 'None', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Slider Shortcode', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This is the place for enter slider shortcode. Example revolution slider shortcodes.', 'lendiz-core' ), 
			'id'	=> $prefix.'header_slider',
			'tab'	=> esc_html__( 'Slider', 'lendiz-core' ),
			'type'	=> 'textarea',
			'default'	=> ''
		),
	);
	return $fields;
}
$page_fields = lendiz_metabox_fields( 'lendiz_page_' );
$page_box = new Custom_Add_Meta_Box( 'lendiz_page_metabox', esc_html__( 'Lendiz Page Options', 'lendiz-core' ), $page_fields, 'page', true );

/* Custom Post Type Options */
$lendiz_cpt = LendizFamework::lendiz_static_theme_mod( 'cpt-opts' );

// Portfolio Options
if( is_array( $lendiz_cpt ) && in_array( "portfolio", $lendiz_cpt ) ){
	
	// CPT Portfolio Metabox
	$prefix = 'lendiz_portfolio_';
	$portfolio_fields = array(
		array( 
			'label'	=> esc_html__( 'Portfolio General Settings', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are single portfolio general settings.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Layout Option', 'lendiz-core' ),
			'id'	=> $prefix.'layout_opt',
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'		
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Layout', 'lendiz-core' ),
			'id'	=> $prefix.'layout',
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'image_select',
			'options' => array(
				'1'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/portfolio-layouts/1.png', 
				'2'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/portfolio-layouts/2.png',
				'3'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/portfolio-layouts/3.png',
				'4'	=> LENDIZ_THEME_ADMIN_URL . '/customizer/assets/images/portfolio-layouts/4.png'
	
			),
			'default'	=> '1',
			'required'	=> array( $prefix.'layout_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Sticky Column', 'lendiz-core' ),
			'id'	=> $prefix.'sticky',
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'none' => esc_html__( 'None', 'lendiz-core' ),
				'right' => esc_html__( 'Right Column', 'lendiz-core' ),
				'left' => esc_html__( 'Left Column', 'lendiz-core' )
			),
			'default'	=> 'none'		
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Format', 'lendiz-core' ),
			'id'	=> $prefix.'format',
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'standard' => esc_html__( 'Standard', 'lendiz-core' ),
				'video' => esc_html__( 'Video', 'lendiz-core' ),
				'audio' => esc_html__( 'Audio', 'lendiz-core' ),
				'gallery' => esc_html__( 'Gallery', 'lendiz-core' ),
				'gmap' => esc_html__( 'Google Map', 'lendiz-core' )
			),
			'default'	=> 'standard'		
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Meta Items Options', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose portfolio meta items option.', 'lendiz-core' ), 
			'id'	=> $prefix.'items_opt',
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'theme-default' => esc_html__( 'Theme Default', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom', 'lendiz-core' )
			),
			'default'	=> 'theme-default'
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Meta Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'These all are meta items for portfolio. drag and drop needed items from disabled part to enabled.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'items',
			'dd_fields' => array ( 
				'Enabled'  => array(
					'date'		=> esc_html__( 'Date', 'lendiz-core' ),
					'client'	=> esc_html__( 'Client', 'lendiz-core' ),
					'category'	=> esc_html__( 'Category', 'lendiz-core' ),
					'share'		=> esc_html__( 'Share', 'lendiz-core' ),
				),
				'disabled' => array(
					'tag'		=> esc_html__( 'Tags', 'lendiz-core' ),
					'duration'	=> esc_html__( 'Duration', 'lendiz-core' ),
					'url'		=> esc_html__( 'URL', 'lendiz-core' ),
					'place'		=> esc_html__( 'Place', 'lendiz-core' ),
					'estimation'=> esc_html__( 'Estimation', 'lendiz-core' ),
				)
			),
			'required'	=> array( $prefix.'items_opt', 'custom' )
		),
		array( 
			'label'	=> esc_html__( 'Custom Redirect URL', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter url for custom webpage redirection. This link only for portfolio archive layout not for single portfolio.', 'lendiz-core' ), 
			'id'	=> $prefix.'custom_url',
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Custom Redirect URL Target', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose custom url page navigate to blank or same page.', 'lendiz-core' ), 
			'id'	=> $prefix.'custom_url_target',
			'tab'	=> esc_html__( 'Portfolio', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'_blank' => esc_html__( 'Blank', 'lendiz-core' ),
				'_self' => esc_html__( 'Self', 'lendiz-core' )
			),
			'default'	=> '_blank'
		),
		array( 
			'label'	=> esc_html__( 'Portfolio Date', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose/Enter portfolio date.', 'lendiz-core' ), 
			'id'	=> $prefix.'date',
			'tab'	=> esc_html__( 'Info', 'lendiz-core' ),
			'type'	=> 'date',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Date Format', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter date format to show selcted portfolio date. Example: F j, Y', 'lendiz-core' ), 
			'id'	=> $prefix.'date_format',
			'tab'	=> esc_html__( 'Info', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> 'F j, Y'
		),
		array( 
			'label'	=> esc_html__( 'Client Name', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter client name.', 'lendiz-core' ), 
			'id'	=> $prefix.'client_name',
			'tab'	=> esc_html__( 'Info', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Duration', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter duration years or months.', 'lendiz-core' ), 
			'id'	=> $prefix.'duration',
			'tab'	=> esc_html__( 'Info', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Estimation', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter project estimation.', 'lendiz-core' ), 
			'id'	=> $prefix.'estimation',
			'tab'	=> esc_html__( 'Info', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Place', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter project place.', 'lendiz-core' ), 
			'id'	=> $prefix.'place',
			'tab'	=> esc_html__( 'Info', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'URL', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter project URL.', 'lendiz-core' ), 
			'id'	=> $prefix.'url',
			'tab'	=> esc_html__( 'Info', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		//Portfolio Format
		array( 
			'label'	=> esc_html__( 'Video', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed video format, then you must choose video type and give video id.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Video Modal', 'lendiz-core' ),
			'id'	=> $prefix.'video_modal',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'onclick' => esc_html__( 'On Click Run Video', 'lendiz-core' ),
				'overlay' => esc_html__( 'Modal Box Video', 'lendiz-core' ),
				'direct' => esc_html__( 'Direct Video', 'lendiz-core' )
			),
			'default'	=> 'direct'
		),
		array( 
			'label'	=> esc_html__( 'Video Type', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose video type.', 'lendiz-core' ), 
			'id'	=> $prefix.'video_type',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'' => esc_html__( 'None', 'lendiz-core' ),
				'youtube' => esc_html__( 'Youtube', 'lendiz-core' ),
				'vimeo' => esc_html__( 'Vimeo', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom Video', 'lendiz-core' )
			),
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Video ID', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter Video ID Example: ZSt9tm3RoUU. If you choose custom video type then you enter custom video url and video must be mp4 format.', 'lendiz-core' ), 
			'id'	=> $prefix.'video_id',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' )
		),
		array( 
			'label'	=> esc_html__( 'Audio', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed audio format, then you must give audio id.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Audio Type', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose audio type.', 'lendiz-core' ), 
			'id'	=> $prefix.'audio_type',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'' => esc_html__( 'None', 'lendiz-core' ),
				'soundcloud' => esc_html__( 'Soundcloud', 'lendiz-core' ),
				'custom' => esc_html__( 'Custom Audio', 'lendiz-core' )
			),
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Audio ID', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter soundcloud audio ID. Example: 315307209.', 'lendiz-core' ), 
			'id'	=> $prefix.'audio_id',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' )
		),
		array( 
			'label'	=> esc_html__( 'Gallery', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed gallery format, then you must choose gallery images here.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Gallery Modal', 'lendiz-core' ),
			'id'	=> $prefix.'gallery_modal',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'default' => esc_html__( 'Default Gallery', 'lendiz-core' ),
				'normal' => esc_html__( 'Normal Gallery', 'lendiz-core' ),
				'grid' => esc_html__( 'Grid/Masonry Gallery', 'lendiz-core' )
			),
			'default'	=> 'default'
		),
		array( 
			'label'	=> esc_html__( 'Grid Gutter Size', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter gallery grid gutter size. Example 20', 'lendiz-core' ), 
			'id'	=> $prefix.'grid_gutter',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'gallery_modal', 'grid' )
		),
		array( 
			'label'	=> esc_html__( 'Grid Columns', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter gallery grid columns count. Example 2', 'lendiz-core' ), 
			'id'	=> $prefix.'grid_cols',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '',
			'required'	=> array( $prefix.'gallery_modal', 'grid' )
		),
		array( 
			'label'	=> esc_html__( 'Choose Gallery Images', 'lendiz-core' ),
			'id'	=> $prefix.'gallery',
			'type'	=> 'gallery',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' )
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' )
		),
		array( 
			'label'	=> esc_html__( 'Google Map', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This part for if you choosed google map format, then you must give google map lat, lang and map style.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'label'
		),
		array( 
			'label'	=> esc_html__( 'Google Map Latitude', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter google latitude.', 'lendiz-core' ), 
			'id'	=> $prefix.'gmap_latitude',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Longitude', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter google longitude.', 'lendiz-core' ), 
			'id'	=> $prefix.'gmap_longitude',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Marker URL', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter google map custom marker url.', 'lendiz-core' ), 
			'id'	=> $prefix.'gmap_marker',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Style', 'lendiz-core' ),
			'id'	=> $prefix.'gmap_style',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'standard' => esc_html__( 'Standard', 'lendiz-core' ),
				'silver' => esc_html__( 'Silver', 'lendiz-core' ),
				'retro' => esc_html__( 'Retro', 'lendiz-core' ),
				'dark' => esc_html__( 'Dark', 'lendiz-core' ),
				'night' => esc_html__( 'Night', 'lendiz-core' ),
				'aubergine' => esc_html__( 'Aubergine', 'lendiz-core' )
			),
			'default'	=> 'standard'
		),
		array( 
			'type'	=> 'line',
			'tab'	=> esc_html__( 'Format', 'lendiz-core' )
		),
	);
	// CPT Portfolio Options
	$portfolio_box = new Custom_Add_Meta_Box( 'lendiz_portfolio_metabox', esc_html__( 'Lendiz Portfolio Options', 'lendiz-core' ), $portfolio_fields, 'lendiz-portfolio', true );
	
	// CPT Portfolio Page Options
	$portfolio_page_box = new Custom_Add_Meta_Box( 'lendiz_portfolio_page_metabox', esc_html__( 'Lendiz Page Options', 'lendiz-core' ), $page_fields, 'lendiz-portfolio', true );
} // In theme option CPT option if portfolio exists
// Testimonial Options
if( is_array( $lendiz_cpt ) && in_array( "testimonial", $lendiz_cpt ) ){
	
	$prefix = 'lendiz_testimonial_';
	$testimonial_fields = array(	
		array( 
			'label'	=> esc_html__( 'Author Designation', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter author designation.', 'lendiz-core' ), 
			'id'	=> $prefix.'designation',
			'tab'	=> esc_html__( 'Testimonial', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Company Name', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter company name.', 'lendiz-core' ), 
			'id'	=> $prefix.'company_name',
			'tab'	=> esc_html__( 'Testimonial', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Company URL', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter company URL.', 'lendiz-core' ), 
			'id'	=> $prefix.'company_url',
			'tab'	=> esc_html__( 'Testimonial', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Rating', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Set user rating.', 'lendiz-core' ), 
			'id'	=> $prefix.'rating',
			'tab'	=> esc_html__( 'Testimonial', 'lendiz-core' ),
			'type'	=> 'rating',
			'default'	=> ''
		)
	);
	
	// CPT Testimonial Options
	$testimonial_box = new Custom_Add_Meta_Box( 'lendiz_testimonial_metabox', esc_html__( 'Lendiz Testimonial Options', 'lendiz-core' ), $testimonial_fields, 'lendiz-testimonial', true );
	
	// CPT Testimonial Page Options
	$testimonial_page_box = new Custom_Add_Meta_Box( 'lendiz_testimonial_page_metabox', esc_html__( 'Lendiz Page Options', 'lendiz-core' ), $page_fields, 'lendiz-testimonial', true );
	
} // In theme option CPT option if testimonial exists
// Team Options
if( is_array( $lendiz_cpt ) && in_array( "team", $lendiz_cpt ) ){
	
	$prefix = 'lendiz_team_';
	$team_fields = array(	
		array( 
			'label'	=> esc_html__( 'Member Designation', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter member designation.', 'lendiz-core' ), 
			'id'	=> $prefix.'designation',
			'tab'	=> esc_html__( 'Team', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Member Email', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter member email.', 'lendiz-core' ), 
			'id'	=> $prefix.'email',
			'tab'	=> esc_html__( 'Team', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Link Target', 'lendiz-core' ),
			'id'	=> $prefix.'link_target',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'_blank' => esc_html__( 'New Window', 'lendiz-core' ),
				'_self' => esc_html__( 'Self Window', 'lendiz-core' )
			),
			'default'	=> '_blank'
		),
		array( 
			'label'	=> esc_html__( 'Facebook', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Facebook profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'facebook',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Twitter', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Twitter profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'twitter',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Instagram', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Instagram profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'instagram',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Linkedin', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Linkedin profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'linkedin',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Pinterest', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Pinterest profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'pinterest',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Dribbble', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Dribbble profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'dribbble',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Flickr', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Flickr profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'flickr',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Youtube', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Youtube profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'youtube',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Vimeo', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Vimeo profile link.', 'lendiz-core' ), 
			'id'	=> $prefix.'vimeo',
			'tab'	=> esc_html__( 'Social', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		)
	);
	
	// CPT Team Options
	$team_box = new Custom_Add_Meta_Box( 'lendiz_team_metabox', esc_html__( 'Lendiz Team Options', 'lendiz-core' ), $team_fields, 'lendiz-team', true );
	
	// CPT Team Page Options
	$team_page_box = new Custom_Add_Meta_Box( 'lendiz_team_page_metabox', esc_html__( 'Lendiz Page Options', 'lendiz-core' ), $page_fields, 'lendiz-team', true );
	
} // In theme option CPT option if team exists
// Event Options
if( is_array( $lendiz_cpt ) && in_array( "events", $lendiz_cpt ) ){
	
	$prefix = 'lendiz_event_';
	$event_fields = array(	
		array( 
			'label'	=> esc_html__( 'Event Organiser Name', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event organiser name.', 'lendiz-core' ), 
			'id'	=> $prefix.'organiser_name',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Organiser Designation', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event organiser designation.', 'lendiz-core' ), 
			'id'	=> $prefix.'organiser_designation',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Start Date', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event start date.', 'lendiz-core' ), 
			'id'	=> $prefix.'start_date',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'date',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event End Date', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event end date.', 'lendiz-core' ), 
			'id'	=> $prefix.'end_date',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'date',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Date Format', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter date format to show selcted event date. Example: F j, Y', 'lendiz-core' ), 
			'id'	=> $prefix.'date_format',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> 'F j, Y'
		),
		array( 
			'label'	=> esc_html__( 'Event Start Time', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event start time.', 'lendiz-core' ), 
			'id'	=> $prefix.'time',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Cost', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event cost.', 'lendiz-core' ), 
			'id'	=> $prefix.'cost',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Custom Link for Event Item', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter custom link to redirect custom event page.', 'lendiz-core' ), 
			'id'	=> $prefix.'link',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Custom Link Target', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose custom link target to new window or self window.', 'lendiz-core' ), 
			'id'	=> $prefix.'link_target',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'_blank' => esc_html__( 'New Window', 'lendiz-core' ),
				'_self' => esc_html__( 'Self Window', 'lendiz-core' )
			),
			'default'	=> '_blank'
		),
		array( 
			'label'	=> esc_html__( 'Custom Link Button Text', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter custom link buttom text: Example More About Event.', 'lendiz-core' ), 
			'id'	=> $prefix.'link_text',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Schedule Content', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event schedule content. You can place here Shortcodes.', 'lendiz-core' ), 
			'id'	=> $prefix.'schedule_content',
			'tab'	=> esc_html__( 'Events', 'lendiz-core' ),
			'type'	=> 'textarea',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Venue Name', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event venue name.', 'lendiz-core' ), 
			'id'	=> $prefix.'venue_name',
			'tab'	=> esc_html__( 'Address', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Venue Address', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event venue address.', 'lendiz-core' ), 
			'id'	=> $prefix.'venue_address',
			'tab'	=> esc_html__( 'Address', 'lendiz-core' ),
			'type'	=> 'textarea',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'E-mail', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter email id for clarification about event.', 'lendiz-core' ), 
			'id'	=> $prefix.'email',
			'tab'	=> esc_html__( 'Address', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Phone', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter phone number for contact about event.', 'lendiz-core' ), 
			'id'	=> $prefix.'phone',
			'tab'	=> esc_html__( 'Address', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Website', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter event website.', 'lendiz-core' ), 
			'id'	=> $prefix.'website',
			'tab'	=> esc_html__( 'Address', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Latitude', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter map latitude.', 'lendiz-core' ), 
			'id'	=> $prefix.'gmap_latitude',
			'tab'	=> esc_html__( 'GMap', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Longitude', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter map longitude.', 'lendiz-core' ), 
			'id'	=> $prefix.'gmap_longitude',
			'tab'	=> esc_html__( 'GMap', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Marker URL', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter google map custom marker url.', 'lendiz-core' ), 
			'id'	=> $prefix.'gmap_marker',
			'tab'	=> esc_html__( 'GMap', 'lendiz-core' ),
			'type'	=> 'url',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Google Map Style', 'lendiz-core' ),
			'id'	=> $prefix.'gmap_style',
			'tab'	=> esc_html__( 'GMap', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'standard' => esc_html__( 'Standard', 'lendiz-core' ),
				'silver' => esc_html__( 'Silver', 'lendiz-core' ),
				'retro' => esc_html__( 'Retro', 'lendiz-core' ),
				'dark' => esc_html__( 'Dark', 'lendiz-core' ),
				'night' => esc_html__( 'Night', 'lendiz-core' ),
				'aubergine' => esc_html__( 'Aubergine', 'lendiz-core' )
			),
			'default'	=> 'standard'
		),
		array( 
			'label'	=> esc_html__( 'Google Map Height', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter map height in values. Example 400', 'lendiz-core' ), 
			'id'	=> $prefix.'gmap_height',
			'tab'	=> esc_html__( 'GMap', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '400'
		),
		array( 
			'label'	=> esc_html__( 'Contact Form', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Contact form shortcode here.', 'lendiz-core' ), 
			'id'	=> $prefix.'contact_form',
			'tab'	=> esc_html__( 'Contact', 'lendiz-core' ),
			'type'	=> 'textarea',
			'default'	=> ''
		),
		array( 
			'label'	=> esc_html__( 'Event Info Columns', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Enter column division values like given format. Example 3-3-6', 'lendiz-core' ), 
			'id'	=> $prefix.'col_layout',
			'tab'	=> esc_html__( 'Layout', 'lendiz-core' ),
			'type'	=> 'text',
			'default'	=> '3-3-6'
		),
		array( 
			'label'	=> esc_html__( 'Event Detail Items', 'lendiz-core' ),
			'desc'	=> esc_html__( 'This is layout settings for event.', 'lendiz-core' ), 
			'tab'	=> esc_html__( 'Layout', 'lendiz-core' ),
			'type'	=> 'dragdrop_multi',
			'id'	=> $prefix.'event_info_items',
			'dd_fields' => array ( 
				'Enable'  => array(
					'event-details' => esc_html__( 'Event Details', 'lendiz-core' ),
					'event-venue' => esc_html__( 'Event Venue', 'lendiz-core' ),
					'event-map' => esc_html__( 'Event Map', 'lendiz-core' )
				),
				'disabled' => array(
					'event-form'	=> esc_html__( 'Event Form', 'lendiz-core' ),
				)
			),
		),
		array( 
			'label'	=> esc_html__( 'Navigation', 'lendiz-core' ),
			'id'	=> $prefix.'nav_position',
			'tab'	=> esc_html__( 'Layout', 'lendiz-core' ),
			'type'	=> 'select',
			'options' => array ( 
				'top' => esc_html__( 'Top', 'lendiz-core' ),
				'bottom' => esc_html__( 'Bottom', 'lendiz-core' )
			),
			'default'	=> 'top'
		),
	);
	
	// CPT Events Options
	$event_box = new Custom_Add_Meta_Box( 'lendiz_event_metabox', esc_html__( 'Lendiz Event Options', 'lendiz-core' ), $event_fields, 'lendiz-events', true );
	
	// CPT Events Page Options
	$event_page_box = new Custom_Add_Meta_Box( 'lendiz_event_page_metabox', esc_html__( 'Lendiz Page Options', 'lendiz-core' ), $page_fields, 'lendiz-events', true );
	
} // In theme option CPT option if event exists
// Service Options
if( is_array( $lendiz_cpt ) && in_array( "services", $lendiz_cpt ) ){
	
	$prefix = 'lendiz_service_';
	
	$service_fields = array(	
		array( 
			'label'	=> esc_html__( 'Service Image', 'lendiz-core' ),
			'desc'	=> esc_html__( 'Choose service image for show front.', 'lendiz-core' ), 
			'id'	=> $prefix.'title_img',
			'tab'	=> esc_html__( 'Service', 'lendiz-core' ),
			'type'	=> 'image',
			'default'	=> ''
		)
	);
	
	// CPT Service Options
	$service_box = new Custom_Add_Meta_Box( 'lendiz_service_metabox', esc_html__( 'Lendiz Service Options', 'lendiz-core' ), $service_fields, 'lendiz-services', true );
	
	// CPT Events Page Options
	$service_page_box = new Custom_Add_Meta_Box( 'lendiz_service_page_metabox', esc_html__( 'Lendiz Page Options', 'lendiz-core' ), $page_fields, 'lendiz-services', true );
	
}