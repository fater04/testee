<?php
/**
 * Lendiz functions and definitions
 *
 */
/**
 * Lendiz predifined vars
 */
define('LENDIZ_ADMIN', get_template_directory().'/admin');
define('LENDIZ_INC', get_template_directory().'/inc');
define('LENDIZ_THEME_ELEMENTS', get_template_directory().'/admin/theme-elements');
define('LENDIZ_ADMIN_URL', get_template_directory_uri().'/admin');
define('LENDIZ_INC_URL', get_template_directory_uri().'/inc');
define('LENDIZ_ASSETS', get_template_directory_uri().'/assets');
/* Custom Inline Css */
$lendiz_custom_styles = "";

//Theme Default
require_once LENDIZ_ADMIN . '/theme-default/theme-default.php';
require_once LENDIZ_ADMIN . '/theme-elements/predefined-layouts.php';

//Customizer class
if ( class_exists( 'LendizFamework' ) ) {
	require_once LENDIZ_ADMIN . '/customizer/lendiz-customizer.php';
}

require_once LENDIZ_INC . '/theme-class/theme-class.php';
require_once LENDIZ_INC . '/walker/wp_bootstrap_navwalker.php';
require_once LENDIZ_ADMIN . '/mega-menu/custom_menu.php';

//TGM
require_once LENDIZ_ADMIN . '/tgm/tgm-init.php'; 
require_once LENDIZ_ADMIN . '/welcome-page/welcome.php';

//ZOZO IMPORTER
if( class_exists( 'Lendiz_Zozo_Admin_Page' ) ){
	require_once LENDIZ_ADMIN . '/welcome-page/importer/zozo-importer.php'; 	
}

//Woo
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require_once LENDIZ_INC . "/woo-functions.php";
}
// Setup the Theme Customizer settings and controls...

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lendiz_setup() {
	/* Lendiz Text Domain */
	load_theme_textdomain( 'lendiz', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	
	/* Custom background */
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
	
	/* Custom header */
	$defaults = array(
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 0,
		'height'                 => 0,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $defaults );
	
	/* Content width */
	if ( ! isset( $content_width ) ) $content_width = 640;

	$grid_large = LendizThemeOpt::lendiz_static_theme_mod('lendiz_grid_large');
	$grid_medium = LendizThemeOpt::lendiz_static_theme_mod('lendiz_grid_medium');
	$grid_small = LendizThemeOpt::lendiz_static_theme_mod('lendiz_grid_small');
	$port_masonry = LendizThemeOpt::lendiz_static_theme_mod('lendiz_portfolio_masonry');
	
	if( !empty( $grid_large ) && is_array( $grid_large ) ) add_image_size( 'lendiz-grid-large', $grid_large['width'], $grid_large['height'], true );
	if( !empty( $grid_medium ) && is_array( $grid_medium ) ) add_image_size( 'lendiz-grid-medium', $grid_medium['width'], $grid_medium['height'], true );
	if( !empty( $grid_small ) && is_array( $grid_small ) ) add_image_size( 'lendiz-grid-small', $grid_small['width'], $grid_small['height'], true );
	
	//Team
	$team_medium = LendizThemeOpt::lendiz_static_theme_mod('lendiz_team_medium');
	if( !empty( $team_medium ) && is_array( $team_medium ) ) add_image_size( 'lendiz-team-medium', $team_medium['width'], $team_medium['height'], true );
	update_option( 'large_size_w', 1170 );
	update_option( 'large_size_h', 694 );
	update_option( 'large_crop', 1 );
	update_option( 'medium_size_w', 768 );
	update_option( 'medium_size_h', 456 );
	update_option( 'medium_crop', 1 );
	update_option( 'thumbnail_size_w', 80 );
	update_option( 'thumbnail_size_h', 80 );
	update_option( 'thumbnail_crop', 1 );
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top-menu'		=> esc_html__( 'Top Bar Menu', 'lendiz' ),
		'primary-menu'	=> esc_html__( 'Primary Menu', 'lendiz' ),
		'mobile-menu'	=> esc_html__( 'Mobile Menu', 'lendiz' ),
		'footer-menu'	=> esc_html__( 'Footer Menu', 'lendiz' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );

	// Editor color palette.
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Dark Gray', 'lendiz' ),
				'slug'  => 'dark-gray',
				'color' => '#111',
			),
			array(
				'name'  => esc_html__( 'Light Gray', 'lendiz' ),
				'slug'  => 'light-gray',
				'color' => '#767676',
			),
			array(
				'name'  => esc_html__( 'White', 'lendiz' ),
				'slug'  => 'white',
				'color' => '#FFF',
			),
		)
	);

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'lendiz_setup' );
/**
 * Register widget area.
 *
 */
function lendiz_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lendiz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'lendiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Menu Sidebar', 'lendiz' ),
		'id'            => 'secondary-menu-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your secondary menu area.', 'lendiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'lendiz' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your footer 1st column.', 'lendiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'lendiz' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here to appear in your footer 2nd column.', 'lendiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'lendiz' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add widgets here to appear in your footer 3rd column.', 'lendiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'lendiz' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add widgets here to appear in your footer 4th column.', 'lendiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Instagram', 'lendiz' ),
		'id'            => 'sidebar-6',
		'description'   => esc_html__( 'Add widgets here to appear in your footer top.', 'lendiz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'lendiz_widgets_init' );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Lendiz 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function lendiz_excerpt_more( $link ) {
	return '';
}
add_filter( 'excerpt_more', 'lendiz_excerpt_more' );

/**
 * Admin Enqueue scripts and styles.
 */
function lendiz_enqueue_admin_script() { 
	
	//Themify Icons
	wp_register_style( 'themify-icons', get_theme_file_uri( '/assets/css/themify-icons.css' ), array(), '1.0' );
	wp_enqueue_style( 'themify-icons' );
	
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );

	wp_enqueue_style( 'lendiz-admin-style', get_theme_file_uri( '/admin/assets/css/admin-style.css' ), array(), '1.0' );
	
	// Meta Drag and Drop Script
	wp_enqueue_script( 'lendiz-admin-scripts', get_theme_file_uri( '/admin/assets/js/admin-scripts.js' ), array( 'jquery' ), '1.0', true ); 
	
	$customizer_load = get_option( 'lendiz_customizer_auto_load' );
	$customizer_load = !empty( $customizer_load ) && $customizer_load == '1' ? 1 : 0;
	
	//Admin Localize Script
	$admin_local_args = array(
		'admin_ajax_url' => esc_url( admin_url('admin-ajax.php') ),
		'featured_nonce' => wp_create_nonce('lendiz-post-featured'), 
		'sidebar_nounce' => wp_create_nonce('lendiz-sidebar-featured'), 
		'export_nounce' => wp_create_nonce('lendiz-options-export'),
		'import_nounce' => wp_create_nonce('lendiz-options-import'),
		'lendiz_tgmpa_nounce' => wp_create_nonce('lendiz-tgmpa-plugins-install'),
		'lendiz_demo_nounce' => wp_create_nonce('lendiz-demo-install$%^&*()'),		
		'proceed' => esc_html__('Proceed', 'lendiz'),
		'cancel' => esc_html__('Cancel', 'lendiz'),
		'process' => esc_html__( 'Processing', 'lendiz' ),
		'uninstalling' => esc_html__('Uninstalling...', 'lendiz'),
		'uninstalled' => esc_html__('Uninstalled.', 'lendiz'),
		'unins_pbm' => esc_html__('Uninstall Problem!.', 'lendiz'),
		'downloading' => esc_html__('Demo import process running...', 'lendiz'), 
		'lendiz_installation_url' => admin_url( 'admin.php?page=lendiz-installation' ),
		'field_nounce' => wp_create_nonce('lendiz-customizer-fields'),
		'clear_nounce' => wp_create_nonce('lendiz-temp-options-vanish'),
		'customizer_nounce' => wp_create_nonce('lendiz-customizer-#$%&*('),
		'demo_import' => wp_create_nonce('lendiz-demo-import-(*&'),
		'customizer_load' => $customizer_load
	);
	$admin_local_args = apply_filters( 'lendiz_admin_local_js_args', $admin_local_args );
	wp_localize_script('lendiz-admin-scripts', 'lendiz_admin_ajax_var', $admin_local_args );
	
}
add_action( 'admin_enqueue_scripts', 'lendiz_enqueue_admin_script' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function lendiz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'lendiz_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function lendiz_scripts() { 	

	// Lendiz CSS Libraries
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array(), '5.0' );
	wp_enqueue_style( 'themify-icons', get_theme_file_uri( '/assets/css/themify-icons.css' ), array(), '1.0' );
	wp_enqueue_style( 'animate', get_theme_file_uri( '/assets/css/animate.min.css' ), array(), '3.5.1' );
	
	wp_register_style( 'owl-carousel', get_theme_file_uri( '/assets/css/owl-carousel.min.css' ), array(), '2.2.1' );
	wp_register_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.min.css' ), array(), '1.0' );
	wp_register_style( 'image-hover', get_theme_file_uri( '/assets/css/image-hover.min.css' ), array(), '1.0' );
	wp_register_style( 'ytplayer', get_theme_file_uri( '/assets/css/ytplayer.min.css' ), array(), '1.0' );
		
	// Theme stylesheet.
	if ( ! defined( 'ELEMENTOR_TESTS' ) ) wp_enqueue_style( 'elementor-frontend' );
	wp_enqueue_style( 'lendiz-style', get_template_directory_uri() . '/style.css', array(), '1.0' );
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		wp_enqueue_style( 'lendiz-woo-style', get_theme_file_uri( '/assets/css/woo-styles.css' ), array(), '1.0' );
	}
	
	/* Lendiz theme script files */
	
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'easing', get_theme_file_uri( '/assets/js/jquery.easing.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'appear', get_theme_file_uri( '/assets/js/jquery.appear.min.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'smartresize', get_theme_file_uri( '/assets/js/smartresize.min.js' ), array( 'jquery' ), '1.0', true );	
	
	// Lendiz JS Libraries
	wp_register_script( 'isotope', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '3.0.3', true );
	wp_register_script( 'infinite-scroll', get_theme_file_uri( '/assets/js/infinite-scroll.pkgd.min.js' ), array( 'jquery' ), '2.0', true );
	wp_register_script( 'owl-carousel', get_theme_file_uri( '/assets/js/owl.carousel.min.js' ), array( 'jquery' ), '2.2.1', true );
	wp_register_script( 'jquery-stellar', get_theme_file_uri( '/assets/js/jquery.stellar.min.js' ), array( 'jquery' ), '0.6.2', true );
	wp_register_script( 'sticky-kit', get_theme_file_uri( '/assets/js/sticky-kit.min.js' ), array( 'jquery' ), '1.1.3', true );
	wp_register_script( 'jquery-mb-ytplayer', get_theme_file_uri( '/assets/js/jquery.mb.YTPlayer.min.js' ), array( 'jquery' ), '1.0', true );	
	wp_register_script( 'jquery-magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific.popup.min.js' ), array( 'jquery' ), '1.1.0', true );
	wp_register_script( 'jquery-easy-ticker', get_theme_file_uri( '/assets/js/jquery.easy.ticker.min.js' ), array( 'jquery' ), '2.0', true );
	wp_register_script( 'smoothscroll', get_theme_file_uri( '/assets/js/smoothscroll.min.js' ), array( 'jquery' ), '1.20.2', true );	
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		wp_enqueue_script( 'lendiz-woo-custom', get_theme_file_uri( '/assets/js/lendiz-woo-custom.js' ), array( 'jquery' ), '1.0', true );
	}
	
	$smooth_opt = LendizThemeOpt::lendiz_static_theme_mod( 'smooth-opt' );
	if( $smooth_opt ){
		$scroll_time = LendizThemeOpt::lendiz_static_theme_mod( 'scroll-time' );
		$scroll_distance = LendizThemeOpt::lendiz_static_theme_mod( 'scroll-distance' );
		if( !empty( $scroll_time ) && !empty( $scroll_distance ) ){
			wp_enqueue_script( 'smoothscroll' );
		}
	}
	
	// Theme Js
	wp_enqueue_script( 'lendiz-theme', get_theme_file_uri( '/assets/js/theme.js' ), array( 'jquery' ), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Theme option stylesheet.
	$custom_css = '';
	$custom_css .= is_customize_preview() ? lendiz_get_dynamic_styles() : get_option( 'lendiz_theme_custom_styles' );
	$custom_css .= lendiz_page_option_styles();
	wp_add_inline_style( 'lendiz-style', $custom_css );
	
	//Google Map Script
	$g_api = LendizThemeOpt::lendiz_static_theme_mod( 'google-api' );
	$gmap_stat = 0;
	if( $g_api ){
		wp_register_script( 'lendiz-gmaps', '//maps.googleapis.com/maps/api/js?key='. esc_attr( $g_api ) , array('jquery'), null, true );
		$gmap_stat = 1;
	}
		
	$infinite_img = LendizThemeOpt::lendiz_static_theme_mod( 'infinite-loader-img' );
	$infinite_img_url = $infinite_img != '' ? $infinite_img : get_theme_file_uri( '/assets/images/infinite-loder.gif' );
	
	$user_logged = is_user_logged_in() ? 1 : 0;
	
	//Localize Script
	$local_args = array(
		'admin_ajax_url' => esc_url( admin_url('admin-ajax.php') ),
		'like_nonce' => wp_create_nonce('lendiz-post-like'), 
		'fav_nonce' => wp_create_nonce('lendiz-post-fav'),
		'wishlist_remove' => wp_create_nonce('lendiz-wishlist-{}@@%^@'),
		'product_view' => wp_create_nonce('lendiz-product-view-@%^&#'),
		'infinite_loader' => $infinite_img_url,
		'load_posts' => apply_filters( 'infinite_load_msg', esc_html__( 'Loading next set of posts.', 'lendiz' ) ),
		'no_posts' => apply_filters( 'infinite_finished_msg', esc_html__( 'No more posts to load.', 'lendiz' ) ),
		'cmt_nonce' => wp_create_nonce('lendiz-comment-like'),
		'mc_nounce' => wp_create_nonce('lendiz-mailchimp'), 
		'wait' => esc_html__('Wait..', 'lendiz'),
		'must_fill' => esc_html__('Must Fill Required Details.', 'lendiz'),
		'valid_email' => esc_html__('Enter Valid Email ID.', 'lendiz'),
		'cart_update_pbm' => esc_html__('Cart Update Problem.', 'lendiz'),
		'gmap_stat' => esc_attr( $gmap_stat ),
		'user_logged' => $user_logged,		
		'add_to_cart' => wp_create_nonce('lendiz-add-to-cart(*$#'),
		'remove_from_cart' => wp_create_nonce('lendiz-remove-from-cart(*$#')
	);	
	$local_args = apply_filters( 'lendiz_theme_local_js_args', $local_args );
	wp_localize_script('lendiz-theme', 'lendiz_ajax_var', $local_args );
	
}
add_action( 'wp_enqueue_scripts', 'lendiz_scripts' );

/**
 * Enqueue supplemental block editor styles.
 */
function lendiz_editor_customizer_styles() {
	wp_enqueue_style( 'lendiz-customizer-google-fonts', lendiz_theme_default_fonts_url(), array(), null, 'all' );
	wp_enqueue_style( 'lendiz-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.0', 'all' );
	
	ob_start();
	require_once LENDIZ_THEME_ELEMENTS . '/theme-customizer-styles.php';
	$custom_styles = ob_get_clean();
	
	wp_add_inline_style( 'lendiz-editor-customizer-styles', $custom_styles );
}
add_action( 'enqueue_block_editor_assets', 'lendiz_editor_customizer_styles' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );
/*Theme Code*/
/*Search Form Filter*/
if( ! function_exists('lendiz_zozo_search_form') ) {
	function lendiz_zozo_search_form( $form ) {
		
		$search_out = '
		<form method="get" class="search-form" action="'. esc_url( home_url( '/' ) ) .'">
			<div class="input-group">
				<input type="text" class="form-control" name="s" value="'. get_search_query() .'" placeholder="'. esc_attr__('Search for...', 'lendiz') .'">
				<span class="input-group-btn">
					<button class="btn btn-secondary" type="submit"><i class="ti-arrow-right"></i></button>
				</span>
			</div>
		</form>';
		return $search_out;
	}
	add_filter( 'get_search_form', 'lendiz_zozo_search_form' );
}

if( ! function_exists('lendiz_post_comments') ) {
	function lendiz_post_comments( $comment, $args, $depth ) {
	
		$GLOBALS['comment'] = $comment;
		
		$aps = new LendizPostSettings;		
		
		$allowed_html = array(
			'a' => array(
				'href' => array(),
				'title' => array()
			)
		);
		
		?>
		<li <?php comment_class('clearfix'); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="media thecomment">
						
				<div class="media-left author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="media-body comment-text">
					<p class="comment-meta">
					<?php if( $depth < $args['max_depth'] ) : ?>
					<span class="reply pull-right">
						<?php 	
						comment_reply_link( array_merge( $args, array('reply_text' => esc_html__('Reply ', 'lendiz'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID ); 
						?>
					</span>
					<?php endif; ?>
					<span class="author"><?php echo get_comment_author_link(); ?></span>
					<span class="date"><?php printf( wp_kses( __( '- %1$s', 'lendiz' ), $allowed_html ), get_comment_date()) ?></span>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><i class="icon-info-sign"></i> <?php esc_html_e( 'Comment awaiting approval', 'lendiz' ); ?></em>
						<br />
					<?php endif; ?>
					</p>
					<?php comment_text(); ?>
					<!-- Custom Comments Meta -->
					<?php if( LendizThemeOpt::lendiz_static_theme_mod( 'comments-like' ) || LendizThemeOpt::lendiz_static_theme_mod( 'comments-share' ) ) : ?>
						<div class="comment-meta-wrapper clearfix">
							<ul class="list-inline">
								<?php 
								if( LendizThemeOpt::lendiz_static_theme_mod( 'comments-like' ) ) : 
									if( class_exists( 'lendiz_additional_process' ) ){ ?>
										<li class="comment-like-wrapper"><?php echo do_shortcode( lendiz_additional_process::lendiz_comment_like_out( $comment->comment_ID ) ); ?></li>
									<?php
									}
								endif; ?>
								<?php 
								$comments_shares = LendizThemeOpt::lendiz_static_theme_mod( 'comments-social-shares' );
								if( !empty( $comments_shares ) ) :
									if( class_exists( 'lendiz_additional_process' ) ){ ?>
										<li class="comment-share-wrapper pull-right"><?php echo do_shortcode( lendiz_additional_process::lendiz_comment_share( $comment->comment_ID ) ); ?></li>
									<?php
									}
								endif; ?>
							</ul>
						</div>
					<?php endif; // if comment meta need ?>
				</div>
						
			</div>
			
			
		</li>
		<?php
		
	} 
}

add_filter( 'lendiz_theme_local_js_args', 'lendiz_theme_local_js_args_body', 10  );
function lendiz_theme_local_js_args_body( $local_args ){
	$smooth_scroll = LendizThemeOpt::lendiz_static_theme_mod('smooth-opt');
	$scroll_time = $scroll_dist = '';
	if( $smooth_scroll ){
		$scroll_time = LendizThemeOpt::lendiz_static_theme_mod('scroll-time');
		$scroll_dist = LendizThemeOpt::lendiz_static_theme_mod('scroll-distance');
	}	
	$res_from = LendizThemeOpt::lendiz_static_theme_mod('mobile-header-from');
	$res_width = $res_from == 'c' ? LendizThemeOpt::lendiz_static_theme_mod('mobile-header-from-custom') : $res_from;
	$res_width = $res_width ? absint( $res_width ) : 360;
	$core_stat = !class_exists( 'LendizFamework' ) ? true : false;
	$lendiz_body_atts = array(
		'scroll_time' => $scroll_time,
		'scroll_dist' => $scroll_dist,
		'res_width' => $res_width,
		'core_stat' => $core_stat
	);	
	if( is_page() ){
		$menu_offset = get_post_meta( get_the_ID(), 'lendiz_page_one_page_menu_offset', true );
		$lendiz_body_atts['menu_offset'] = $menu_offset ? $menu_offset : 60;
		$mobile_menu_offset = get_post_meta( get_the_ID(), 'lendiz_page_one_page_mobmenu_offset', true );
		$lendiz_body_atts['mobile_menu_offset'] = $mobile_menu_offset ? $mobile_menu_offset : 60;
	}
	$local_args['body_atts'] = $lendiz_body_atts;
	return $local_args;
}

/*  Désactiver les mises à jours de thème WordPress
**/
remove_action( 'load-update-core.php', 'wp_update_themes' );
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
/**
*  Désactiver les mises à jours des plugins
**/
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

/**
*  Désactiver les mises à jours pour les utilisateurs non admin de WordPress
**/
if (!current_user_can('update_plugins')) {
	add_action('admin_init', create_function(false,"remove_action('admin_notices', 'update_nag', 3);"));
}
/**
*  Désactiver les mises à jours du Core WordPress 
**/

add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
/* Désactiver les notifications KendoDev */
function pr_disable_admin_notices() {
 global $wp_filter;
 if ( is_user_admin() ) {
 if ( isset( $wp_filter['user_admin_notices'] ) ) {
 unset( $wp_filter['user_admin_notices'] );
 }
 } elseif ( isset( $wp_filter['admin_notices'] ) ) {
 unset( $wp_filter['admin_notices'] );
 }
 if ( isset( $wp_filter['all_admin_notices'] ) ) {
 unset( $wp_filter['all_admin_notices'] );
 }
 }
add_action( 'admin_print_scripts', 'pr_disable_admin_notices' );

