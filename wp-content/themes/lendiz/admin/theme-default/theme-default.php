<?php
/**
 * Enqueue Google Web Fonts.
 */
function lendiz_theme_default_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'lendiz' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Roboto:400|Fira Sans:700&subset=latin' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
function lendiz_enqueue_google_web_fonts() {
	wp_enqueue_style( 'lendiz-google-fonts', lendiz_theme_default_fonts_url(), array(), null, 'all' );
}
function lendiz_default_theme_options(){
	$cur_theme = wp_get_theme();	
	if ( $cur_theme->get( 'Name' ) == 'Lendiz' || $cur_theme->get( 'Name' ) == 'Lendiz Child' ){
		$input_val = lendiz_default_theme_values();
		$lendiz_default_options = json_decode( $input_val, true );
		update_option( 'lendiz_theme_options_new', $lendiz_default_options );
	}
}

function lendiz_set_google_fonts(){
	if( !class_exists( "LendizThemeStyles" ) ){
		require_once LENDIZ_INC . '/theme-class/theme-style-class.php';
	}
	//Save Google Fonts
	$ats = new LendizThemeStyles;
	$ats->lendiz_typo_generate( 'body-typography' );
	$ats->lendiz_typo_generate( 'h1-typography' );
	$ats->lendiz_typo_generate( 'h2-typography' );
	$ats->lendiz_typo_generate( 'h3-typography' );
	$ats->lendiz_typo_generate( 'h4-typography' );
	$ats->lendiz_typo_generate( 'h5-typography' );
	$ats->lendiz_typo_generate( 'h6-typography' );
	$ats->lendiz_typo_generate( 'widgets-content' );
	$ats->lendiz_typo_generate( 'widgets-title' );
	$ats->lendiz_typo_generate( 'header-topbar-typography' );
	$ats->lendiz_typo_generate( 'header-logobar-typography' );
	$ats->lendiz_typo_generate( 'header-navbar-typography' );
	$ats->lendiz_typo_generate( 'secondary-space-typography' );
	$ats->lendiz_typo_generate( 'header-fixed-typography' );
	$ats->lendiz_typo_generate( 'mobile-menu-typography' );
	$ats->lendiz_typo_generate( 'top-sliding-typography' );
	$ats->lendiz_typo_generate( 'main-menu-typography' );
	$ats->lendiz_typo_generate( 'dropdown-menu-typography' );
	$ats->lendiz_typo_generate( 'footer-typography' );
	$ats->lendiz_typo_generate( 'footer-top-typography' );
	$ats->lendiz_typo_generate( 'footer-middle-typography' );
	$ats->lendiz_typo_generate( 'footer-bottom-typography' );
	
	update_option( 'lendiz_custom_google_fonts', LendizThemeStyles::$embrad_gf_array );
	$google_fonts = get_option( 'lendiz_custom_google_fonts' );
	return $google_fonts;
}

function lendiz_default_font_and_styles( $return = false ){
	
	//Set google fonts
	lendiz_set_google_fonts();
	
	$custom_css = lendiz_get_dynamic_styles();
	update_option( 'lendiz_theme_custom_styles', $custom_css );

}

if ( ! class_exists( 'LendizFamework' ) ) {
	add_action("after_switch_theme", "lendiz_default_theme_options", 10);
	add_action("after_switch_theme", "lendiz_default_font_and_styles", 900);
	add_action( 'wp_enqueue_scripts', 'lendiz_enqueue_google_web_fonts' );
}
function lendiz_default_theme_values(){
	$theme_opt_def =  '{"page-layout":"wide","site-width":"1170","page-content-padding":{"left":"","right":"","top":"","bottom":""},"cpt-opts":{"portfolio":"portfolio","team":"team","testimonial":"testimonial","events":"events","services":"services"},"page-loader":"0","page-loader-img":{"id":"7097","url":""},"infinite-loader-img":{"id":"","url":""},"logo":{"id":"","url":""},"sticky-logo":{"id":"","url":""},"mobile-logo":{"id":"","url":""},"mailchimp-api":"","google-api":"","comments-type":"wp","comments-like":"0","comments-share":"0","fb-developer-key":"","fb-comments-number":"5","smooth-opt":"0","scroll-time":"600","scroll-distance":"40","klenster-grid-large":{"width":"440","height":"260"},"klenster-grid-small":{"width":"220","height":"130"},"klenster-team-medium":{"width":"300","height":"300"},"rtl":"0","theme-color":"#f59019","secondary-color":"#2759ab","theme-link-color":{"regular":"#2759ab","hover":"#f59019","active":"#f59019"},"body-background":{"bg_repeat":"","bg_size":"","bg_attachment":"","bg_position":"","bg_media":{"id":"","url":""},"bg_color":"","bg_transparent":"0"},"body-typography":{"font_family":"Roboto","font_weight":"400","font_sub":"latin","text_align":"","text_transform":"","font_size":"16","line_height":"32.4","letter_spacing":"","font_color":"#868686"},"h1-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"48","line_height":"57.6","letter_spacing":"","font_color":"#161616"},"h2-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"37","line_height":"46.25","letter_spacing":"","font_color":"#161616"},"h3-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"28","line_height":"37.25","letter_spacing":"","font_color":"#161616"},"h4-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"22","line_height":"31.4","letter_spacing":"","font_color":"#161616"},"h5-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"18","line_height":"27.6","letter_spacing":"","font_color":"#161616"},"h6-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"16","line_height":"25.2","letter_spacing":"","font_color":"#161616"},"widgets-title":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"20","line_height":"","letter_spacing":"","font_color":""},"widgets-content":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":"#363636"},"main-menu-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"17","line_height":"","letter_spacing":"","font_color":"#161616"},"dropdown-menu-typography":{"font_family":"Fira Sans","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"15","line_height":"","letter_spacing":"","font_color":"#161616"},"top-sliding-typography":{"font_family":"","font_weight":"400","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":"#ffffff"},"header-topbar-typography":{"font_family":"","font_weight":"700","font_sub":"","text_align":"","text_transform":"","font_size":"16","line_height":"","letter_spacing":"","font_color":"#ffffff"},"header-logobar-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":""},"header-navbar-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":"#161616"},"header-fixed-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":""},"mobile-menu-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":""},"footer-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":""},"footer-top-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":"#ffffff"},"footer-middle-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":"#cccccc"},"footer-bottom-typography":{"font_family":"","font_weight":"","font_sub":"","text_align":"","text_transform":"","font_size":"","line_height":"","letter_spacing":"","font_color":"#a3a3a3"},"header-layout":"full","header-template":"custom","header-type":"default","header-background":{"bg_repeat":"","bg_size":"","bg_attachment":"","bg_position":"","bg_media":{"id":"","url":""},"bg_color":"","bg_transparent":"0"},"header-items":{"Normal":{"header-topbar":"Top Bar"},"Sticky":{"header-nav":"Nav Bar"},"disabled":{"header-logo":"Logo Section"}},"header-address-label":"Address","header-address-text":"4b, Walse Street , USA","header-phone-label":"Phone","header-phone-text":"(232) 456-7890","header-email-label":"Email","header-email-text":"info@example.com","header-slider-position":"bottom","header-absolute":"0","sticky-part":"1","sticky-part-scrollup":"0","mainmenu-menutype":"advanced","dropdown-menu-background":"","dropdown-menu-link-color":{"regular":"#14212b","hover":"#f59019","active":"#f59019"},"dropdown-menu-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"menu-tag":"1","menu-tag-hot-text":"Hot","menu-tag-hot-bg":"","menu-tag-new-text":"New","menu-tag-new-bg":"","menu-tag-trend-text":"Trend","menu-tag-trend-bg":"","secondary-menu":"1","secondary-menu-type":"left-push","secondary-menu-space-width":"350","header-top-sliding-switch":"0","header-top-sliding-device":["desktop","tab"],"header-top-sliding-cols":"3","header-top-sliding-sidebar-1":"","header-top-sliding-sidebar-2":"","header-top-sliding-sidebar-3":"","header-top-sliding-sidebar-4":"","top-sliding-background":"","top-sliding-link-color":{"regular":"","hover":"","active":""},"top-sliding-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"top-sliding-padding":{"left":"","right":"","top":"","bottom":""},"search-toggle-form":"3","header-topbar-height":"40","header-topbar-background":"#000000","header-topbar-link-color":{"regular":"#ffffff","hover":"#f59019","active":"#f59019"},"header-topbar-border":{"left":"","right":"","top":"","bottom":"1","style":"solid","color":"#e5e5e5"},"header-topbar-padding":{"left":"","right":"","top":"","bottom":""},"header-topbar-text-1":"Quality Plumbing is what we do!","header-topbar-text-2":"Call Us: <a href=\"tel:2324567890\">(232) 456-7890<\/a>\r\n","header-topbar-text-3":"Mail Us: <a href=\"mailto:info@example.com\">info@example.com<\/a>","header-topbar-date":"l, F j, Y","header-topbar-items":{"disabled":{"header-cart":"Cart","header-topbar-text-2":"Custom Text 2","header-topbar-date":"Date","header-topbar-text-3":"Custom Text 3","header-address":"Address Text","header-topbar-search":"Search","header-phone":"Phone Number","header-email":"Email","header-topbar-social":"Social","header-topbar-text-1":"Custom Text 1","header-topbar-menu":"Top Bar Menu","header-topbar-search-toggle":"Search Toggle"}},"header-logobar-height":"50","header-logobar-sticky-height":"50","header-logobar-background":"#ffffff","header-logobar-link-color":{"regular":"#14212b","hover":"#f59019","active":"#f59019"},"header-logobar-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"header-logobar-padding":{"left":"","right":"","top":"","bottom":""},"sticky-header-logobar-color":"","sticky-header-logobar-background":"","sticky-header-logobar-link-color":{"regular":"","hover":"","active":""},"sticky-header-logobar-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"sticky-header-logobar-padding":{"left":"","right":"","top":"","bottom":""},"header-logobar-text-1":"<ul class=\"plumbe-header-custom-info\">\r\n<li class=\"plumbe-header-phone\">\r\n\t<div class=\"media\">\r\n\t\t<i class=\"ti-mobile\"><\/i>\r\n\t\t<div class=\"media-body\">\r\n\t\t\t<h6 class=\"mt-0 mb-2\"><a href=\"tel:2324567890\">(232) 456-7890<\/a><\/h6>\r\n\t\t\t<p class=\"info-text mb-0\">Mon to Fri: 08:00 - 19:00<\/p>\r\n\t\t<\/div>\r\n\t<\/div>\r\n<\/li>\r\n<li class=\"plumbe-header-email\">\r\n\t<div class=\"media\">\r\n\t\t<i class=\"ti-email\"><\/i>\r\n\t\t<div class=\"media-body\">\r\n\t\t\t<h6 class=\"mt-0 mb-2\"><a href=\"mailto:info@example.com\">info@example.com<\/a><\/h6>\t\t\t\r\n\t\t\t<p class=\"info-text mb-0\">Get a free Estimate<\/p>\r\n\t\t<\/div>\r\n\t<\/div>\r\n<\/li>\r\n<\/ul>","header-logobar-text-2":"[plumbe_popup_element icon_text=\"Get A Quote\"]<h5 class=\"popup-title text-center\">Get A Quote<\/h5>[contact-form-7 id=\"12791\" title=\"Request A Quote\"][\/plumbe_popup_element]","header-logobar-text-3":"Quality Plumbing is what we do!","header-logobar-items":{"disabled":{"header-logobar-secondary-toggle":"Secondary Toggle","header-cart":"Cart","header-logobar-sticky-logo":"Sticky Logo","header-logobar-text-2":"Custom Text 2","header-address":"Address Text","header-logobar-menu":"Main Menu","header-email":"Email","header-logobar-search":"Search","header-logobar-logo":"Logo","header-logobar-social":"Social","multi-info":"Address, Phone, Email","header-logobar-text-1":"Custom Text 1","header-phone":"Phone Number"},"Center":{"header-logobar-text-3":"Custom Text 3","header-logobar-search-toggle":"Search Toggle"}},"header-navbar-height":"95","header-navbar-sticky-height":"95","header-navbar-background":"#ffffff","header-navbar-link-color":{"regular":"#14212b","hover":"#f59019","active":"#f59019"},"header-navbar-border":{"left":"","right":"","top":"","bottom":"","style":"none","color":"#ededed"},"header-navbar-padding":{"left":"","right":"","top":"","bottom":""},"sticky-header-navbar-color":"#ffffff","sticky-header-navbar-link-color":{"regular":"#14212b","hover":"#f59019","active":"#f59019"},"sticky-header-navbar-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"sticky-header-navbar-padding":{"left":"","right":"","top":"","bottom":""},"header-navbar-text-1":"[lendiz_popup_element icon_text=\"Apply Now\"]<h5 class=\"popup-title text-center\">Apply Now<\/h5>[contact-form-7 id=\"14925\" title=\"Loan Application\"][\/lendiz_popup_element]","header-navbar-text-2":"<div class=\"header-button\">\r\n<a href=\"http:\/\/elementor.zozothemes.com\/klenster\/contact\/\" class=\"btn btn-default\">Get A Quote<\/a>\r\n<\/div>","header-navbar-text-3":"","header-navbar-items":{"disabled":{"header-navbar-text-2":"Custom Text 2","header-navbar-text-3":"Custom Text 3","header-navbar-search":"Search","header-phone":"Phone Number","header-address":"Address Text","header-email":"Email","header-navbar-secondary-toggle":"Secondary Toggle","header-navbar-social":"Social","header-cart":"Cart","header-navbar-text-1":"Custom Text 1","header-wishlist":"Wishlist"},"Left":{"header-navbar-logo":"Logo","header-navbar-sticky-logo":"Stikcy Logo"},"Center":{"header-navbar-menu":"Main Menu"},"Right":{"header-navbar-search-toggle":"Search Toggle"}},"header-fixed-width":"350","header-fixed-link-color":{"regular":"","hover":"","active":""},"header-fixed-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"header-fixed-padding":{"left":"","right":"","top":"","bottom":""},"header-fixed-background":{"bg_repeat":"","bg_size":"","bg_attachment":"","bg_position":"","bg_media":{"id":"","url":""},"bg_color":"","bg_transparent":""},"header-fixed-text-1":"","header-fixed-text-2":"","header-fixed-items":{"disabled":{"header-fixed-text-1":"Custom Text 1","header-fixed-text-2":"Custom Text 2","header-fixed-search":"Search Form","header-fixed-social":"Social"},"Top":{"header-fixed-logo":"Logo"},"Middle":{"header-fixed-menu":"Menu"}},"mobile-topbar-opt":"0","mobile-topbar-text-1":"","mobile-header-from":"c","mobile-header-from-custom":"1199","mobile-header-height":"70","mobile-header-background":"#ffffff","mobile-header-link-color":{"regular":"#14212b","hover":"#f59019","active":"#f59019"},"mobile-header-sticky":"1","mobile-header-sticky-scrollup":"0","mobile-header-sticky-height":"70","mobile-header-sticky-background":"#ffffff","mobile-header-sticky-link-color":{"regular":"#14212b","hover":"#f59019","active":"#f59019"},"mobile-header-items":{"disabled":{"mobile-header-cart":"Cart Icon"},"Left":{"mobile-header-menu":"Menu Icon"},"Center":{"mobile-header-logo":"Logo"},"Right":{"mobile-header-search":"Search Icon"}},"mobile-menu-max-width":"","mobile-menu-link-color":{"regular":"#14212b","hover":"#f59019","active":"#f59019"},"mobile-menu-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"mobile-menu-padding":{"left":"","right":"","top":"","bottom":""},"mobile-menu-background":{"bg_repeat":"","bg_size":"","bg_attachment":"","bg_position":"","bg_media":{"id":"","url":""},"bg_color":"","bg_transparent":""},"mobile-menu-animate-from":"left","mobile-menu-text-1":"","mobile-menu-text-2":"","mobile-menu-items":{"disabled":{"mobile-menu-text-1":"Custom Text 1","mobile-menu-text-2":"Custom Text 2","mobile-menu-social":"Social"},"Top":{"mobile-menu-logo":"Logo"},"Middle":{"mobile-menu-mainmenu":"Menu"},"Bottom":{"mobile-menu-search":"Search Form"}},"footer-layout":"wide","footer-template":"custom","back-to-top":"1","back-to-top-position":"right","hidden-footer":"0","footer-link-color":{"regular":"","hover":"#f59019","active":"#f59019"},"footer-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"footer-padding":{"left":"","right":"","top":"","bottom":""},"footer-background":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"7515","url":""},"bg_color":"","bg_transparent":"0"},"footer-background-overlay":"","footer-items":{"Enabled":{"footer-middle":"Footer Middle","footer-bottom":"Footer Bottom"},"disabled":{"footer-top":"Footer Top"}},"footer-top-container":"wide","footer-top-layout":"3-9","footer-top-sidebar-1":"zozo-custom-footer-top-1","footer-top-sidebar-2":"zozo-custom-footer-top-2","footer-top-sidebar-3":"","footer-top-sidebar-4":"","footer-top-sidebar-5":"","footer-top-link-color":{"regular":"#ffffff","hover":"#f59019","active":"#f59019"},"footer-top-border":{"left":"","right":"","top":"","bottom":"1","style":"solid","color":"#131313"},"footer-top-padding":{"left":"","right":"","top":"50","bottom":"50"},"footer-top-margin":{"left":"","right":"","top":"","bottom":""},"footer-top-background":{"bg_repeat":"","bg_size":"","bg_attachment":"","bg_position":"","bg_media":{"id":"5472","url":""},"bg_color":"#000000","bg_transparent":"0"},"footer-top-background-overlay":"","footer-top-title-color":"#ffffff","footer-middle-container":"wide","footer-middle-layout":"4-4-4","footer-middle-sidebar-1":"sidebar-2","footer-middle-sidebar-2":"sidebar-3","footer-middle-sidebar-3":"sidebar-4","footer-middle-sidebar-4":"","footer-middle-sidebar-5":"","footer-middle-link-color":{"regular":"#ffffff","hover":"#f59019","active":"#f59019"},"footer-middle-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"footer-middle-padding":{"left":"","right":"","top":"70","bottom":"70"},"footer-middle-margin":{"left":"","right":"","top":"0px","bottom":""},"footer-middle-background":{"bg_repeat":"","bg_size":"","bg_attachment":"","bg_position":"","bg_media":{"id":"","url":""},"bg_color":"#000000","bg_transparent":"0"},"footer-middle-background-overlay":"","footer-middle-title-color":"#ffffff","footer-bottom-container":"wide","copyright-text":"@ Copyright 2021. WordPress Theme by <a href=\"https:\/\/zozothemes.com\/\" target=\"_blank\">zozothemes<\/a>","footer-bottom-fixed":"0","footer-bottom-widget":"","footer-bottom-items":{"disabled":{"social":"Footer Social Links","widget":"Custom Widget","menu":"Footer Menu"},"Center":{"copyright":"Copyright Text"}},"footer-bottom-link-color":{"regular":"#f59019","hover":"#ffffff","active":"#f59019"},"footer-bottom-border":{"left":"","right":"","top":"1","bottom":"","style":"solid","color":"#191919"},"footer-bottom-padding":{"left":"","right":"","top":"15","bottom":"15"},"footer-bottom-margin":{"left":"","right":"","top":"","bottom":""},"footer-bottom-background":{"bg_repeat":"","bg_size":"","bg_attachment":"","bg_position":"","bg_media":{"id":"","url":""},"bg_color":"#000000","bg_transparent":"0"},"footer-bottom-background-overlay":"","footer-bottom-title-color":"","search-content":"post_page","page-page-title-opt":"1","template-page-color":"#ffffff","template-page-link-color":{"regular":"#f59019","hover":"#f59019","active":"#f59019"},"template-page-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"template-page-padding":{"left":"","right":"","top":"75","bottom":"75"},"template-page-background-all":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"16642","url":""},"bg_color":"","bg_transparent":""},"page-page-title-parallax":"0","page-page-title-bg":"0","page-page-title-video":"","page-page-title-overlay":"rgba(0,0,0,0.7)","template-page-page-title-items-opt":"1","template-page-pagetitle-items":{"Center":{"title":"Page Title Text","breadcrumb":"Breadcrumb"}},"page-page-template":"no-sidebar","page-left-sidebar":"","page-right-sidebar":"sidebar-1","page-sidebar-sticky":"1","page-page-hide-sidebar":"1","blog-page-title-opt":"1","template-blog-color":"#ffffff","template-blog-link-color":{"regular":"#f59019","hover":"#f59019","active":"#f59019"},"template-blog-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"template-blog-padding":{"left":"","right":"","top":"75","bottom":"75"},"template-blog-background-all":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"16642","url":""},"bg_color":"","bg_transparent":""},"blog-page-title-parallax":"0","blog-page-title-bg":"0","blog-page-title-video":"","blog-page-title-overlay":"rgba(0,0,0,0.7)","blog-page-title":"Blog","blog-page-desc":"","template-blog-page-title-items-opt":"0","template-blog-pagetitle-items":{"disabled":{"description":"Page Title Description"},"Center":{"title":"Page Title Text","breadcrumb":"Breadcrumb"}},"blog-featured-slider":"0","blog-article-color":"","blog-article-link-color":{"regular":"","hover":"","active":""},"blog-article-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"blog-article-padding":{"left":"","right":"","top":"","bottom":""},"blog-article-background":"","blog-video-format":"onclick","blog-quote-format":"featured","blog-link-format":"featured","blog-gallery-format":"default","blog-page-template":"right-sidebar","blog-left-sidebar":"sidebar-1","blog-right-sidebar":"sidebar-1","blog-sidebar-sticky":"0","blog-page-hide-sidebar":"1","blog-post-template":"grid","blog-top-standard-post":"0","blog-grid-cols":"2","blog-grid-gutter":"40","blog-grid-type":"isotope","blog-infinite-scroll":"0","blog-more-text":"Read More","blog-excerpt":"12","blog-topmeta-items":{"Left":{"date":"Date","author":"Author"},"disabled":{"category":"Category","social":"Social Share","comments":"Comments","likes":"Likes","views":"Views","more":"Read More","favourite":"Favourite"}},"blog-bottommeta-items":{"Left":{"more":"Read More"},"disabled":{"comments":"Comments","author":"Author","category":"Category","social":"Social Share","date":"Date","likes":"Likes","views":"Views","favourite":"Favourite"}},"blog-items":{"Enabled":{"thumb":"Thumbnail","top-meta":"Top Meta","title":"Title","bottom-meta":"Bottom Meta"},"disabled":{"content":"Content"}},"blog-overlay-opt":"0","blog-overlay-items":{"Enabled":{"bottom-meta":"Bottom Meta"},"disabled":{"title":"Title","top-meta":"Top Meta"}},"archive-page-title-opt":"1","template-archive-color":"#ffffff","template-archive-link-color":{"regular":"#f59019","hover":"#f59019","active":"#f59019"},"template-archive-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"template-archive-padding":{"left":"","right":"","top":"75","bottom":"75"},"template-archive-background-all":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"16642","url":""},"bg_color":"","bg_transparent":""},"archive-page-title-parallax":"0","archive-page-title-bg":"0","archive-page-title-video":"","archive-page-title-overlay":"rgba(0,0,0,0.7)","template-archive-page-title-items-opt":"1","template-archive-pagetitle-items":{"Center":{"title":"Page Title Text","breadcrumb":"Breadcrumb"}},"archive-featured-slider":"0","archive-article-color":"","archive-article-link-color":{"regular":"","hover":"","active":""},"archive-article-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"archive-article-padding":{"left":"","right":"","top":"","bottom":""},"archive-article-background":"","archive-video-format":"onclick","archive-quote-format":"featured","archive-link-format":"featured","archive-gallery-format":"default","archive-page-template":"right-sidebar","archive-left-sidebar":"sidebar-1","archive-right-sidebar":"sidebar-1","archive-sidebar-sticky":"0","archive-page-hide-sidebar":"1","archive-post-template":"grid","archive-top-standard-post":"0","archive-grid-cols":"2","archive-grid-gutter":"40","archive-grid-type":"isotope","archive-infinite-scroll":"0","archive-more-text":"Read More","archive-excerpt":"12","archive-topmeta-items":{"Left":{"date":"Date","author":"Author"},"disabled":{"social":"Social Share","comments":"Comments","likes":"Likes","views":"Views","more":"Read More","category":"Category","favourite":"Favourite"}},"archive-bottommeta-items":{"Left":{"more":"Read More"},"disabled":{"comments":"Comments","category":"Category","social":"Social Share","likes":"Likes","author":"Author","views":"Views","date":"Date","favourite":"Favourite"}},"archive-items":{"Enabled":{"thumb":"Thumbnail","top-meta":"Top Meta","title":"Title","bottom-meta":"Bottom Meta"},"disabled":{"content":"Content"}},"archive-overlay-opt":"0","archive-overlay-items":{"Enabled":{"title":"Title"},"disabled":{"top-meta":"Top Meta","bottom-meta":"Bottom Meta"}},"single-post-page-title-opt":"1","template-single-post-color":"#ffffff","template-single-post-link-color":{"regular":"#f59019","hover":"#f59019","active":"#f59019"},"template-single-post-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"template-single-post-padding":{"left":"","right":"","top":"75","bottom":"75"},"template-single-post-background-all":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"16642","url":""},"bg_color":"","bg_transparent":""},"single-post-page-title-parallax":"0","single-post-page-title-bg":"0","single-post-page-title-video":"","single-post-page-title-overlay":"rgba(0,0,0,0.7)","template-single-post-page-title-items-opt":"1","template-single-post-pagetitle-items":{"Center":{"title":"Page Title Text","breadcrumb":"Breadcrumb"}},"single-post-featured-slider":"0","single-post-article-color":"","single-post-article-link-color":{"regular":"","hover":"","active":""},"single-post-article-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"single-post-article-padding":{"left":"","right":"","top":"","bottom":""},"single-post-article-background":"","single-post-article-overlay-color":"","single-post-article-overlay-link-color":{"regular":"","hover":"","active":""},"single-post-article-overlay-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"single-post-article-overlay-padding":{"left":"","right":"","top":"","bottom":""},"single-post-article-overlay-background":"","single-post-video-format":"onclick","single-post-quote-format":"featured","single-post-link-format":"featured","single-post-gallery-format":"default","single-post-page-template":"right-sidebar","single-post-left-sidebar":"sidebar-1","single-post-right-sidebar":"sidebar-1","single-post-sidebar-sticky":"0","single-post-page-hide-sidebar":"1","single-post-full-wrap":"0","single-post-topmeta-items":{"Left":{"category":"Category","author":"Author"},"Right":{"date":"Date"},"disabled":{"social":"Social Share","author":"Author","likes":"Likes","views":"Views","tag":"Tags","favourite":"Favourite","comments":"Comments"}},"single-post-bottommeta-items":{"Left":{"tag":"Tags"},"Right":{"comments":"Comments"},"disabled":{"date":"Date","likes":"Likes","social":"Social Share","author":"Author","category":"Category","views":"Views","favourite":"Favourite"}},"single-post-items":{"Enabled":{"thumb":"Thumbnail","top-meta":"Top Meta","content":"Content","bottom-meta":"Bottom Meta"},"disabled":{"title":"Title"}},"single-post-overlay-opt":"0","single-post-overlay-items":{"Enabled":{"title":"Title"},"disabled":{"top-meta":"Top Meta","bottom-meta":"Bottom Meta"}},"single-post-page-items":{"Enabled":{"post-items":"Post Items","author-info":"Author Info","post-nav":"Post Navigation","comment":"Comment"},"disabled":{"related-slider":"Related Slider"}},"related-max-posts":"5","related-posts-filter":"category","featured-slide-items":"3","featured-slide-tab":"1","featured-slide-mobile":"1","featured-slide-scrollby":"1","featured-slide-autoplay":"0","featured-slide-center":"0","featured-slide-duration":"5000","featured-slide-smartspeed":"250","featured-slide-margin":"10","featured-slide-pagination":"0","featured-slide-navigation":"0","featured-slide-autoheight":"0","related-slide-items":"3","related-slide-tab":"1","related-slide-mobile":"1","related-slide-scrollby":"1","related-slide-autoplay":"0","related-slide-center":"0","related-slide-duration":"5000","related-slide-smartspeed":"250","related-slide-margin":"10","related-slide-pagination":"0","related-slide-navigation":"0","related-slide-autoheight":"0","blog-slide-items":"3","blog-slide-tab":"1","blog-slide-mobile":"1","blog-slide-scrollby":"1","blog-slide-autoplay":"0","blog-slide-center":"0","blog-slide-duration":"5000","blog-slide-smartspeed":"250","blog-slide-margin":"10","blog-slide-pagination":"0","blog-slide-navigation":"0","blog-slide-autoheight":"0","single-slide-items":"3","single-slide-tab":"1","single-slide-mobile":"1","single-slide-scrollby":"1","single-slide-autoplay":"0","single-slide-center":"0","single-slide-duration":"5000","single-slide-smartspeed":"250","single-slide-margin":"10","single-slide-pagination":"0","single-slide-navigation":"0","single-slide-autoheight":"0","social-icons-type":"circled","social-icons-type-footer":"circled","social-icons-fore":"white","social-icons-hfore":"h-own","social-icons-bg":"bg-transparent","social-icons-hbg":"hbg-white","social-fb":"","social-twitter":"","social-instagram":"","social-pinterest":"","social-gplus":"","social-youtube":"","social-vimeo":"","social-soundcloud":"","social-yahoo":"","social-tumblr":"","social-mailto":"","social-flickr":"","social-dribbble":"","social-linkedin":"","social-rss":"","team-page-template":"no-sidebar","team-left-sidebar":"","team-right-sidebar":"sidebar-1","team-title-opt":"1","cpt-team-slug":"team","cpt-team-layout":"default","maintenance-mode":"0","maintenance-type":"cs","maintenance-custom":"","maintenance-phone":"","maintenance-email":"","maintenance-address":"","mobile-topbar-items":{"disabled":{"custom-1":"Custom Text","address":"Address"},"Enabled":{"phone":"Phone","mail":"Mail"}},"comments-social-shares":{"pinterest":"pinterest"},"testimonial-page-template":"no-sidebar","testimonial-left-sidebar":"sidebar-1","testimonial-right-sidebar":"sidebar-1","testimonial-title-opt":"1","cpt-testimonial-slug":"testimonial","events-page-template":"no-sidebar","events-left-sidebar":"","events-right-sidebar":"","event-title-opt":"0","cpt-events-slug":"event","cpt-event-layout":"1","services-page-template":"left-sidebar","services-left-sidebar":"","services-right-sidebar":"","service-title-opt":"0","cpt-services-slug":"services","portfolio-page-template":"no-sidebar","portfolio-left-sidebar":"","portfolio-right-sidebar":"sidebar-1","portfolio-title-opt":"0","cpt-portfolio-slug":"portfolio","cpt-portfolio-category-slug":"portfolio-category","cpt-portfolio-tag-slug":"portfolio-tag","portfolio-meta-items":{"Enabled":{"date":"Date","client":"Client","category":"Category","tag":"Tags","share":"Share"},"Disabled":{"estimation":"Estimation","duration":"Duration","url":"Url","place":"Place"}},"portfolio-client-label":"Client","portfolio-date-label":"Date","portfolio-duration-label":"Duration","portfolio-estimation-label":"Estimation","portfolio-place-label":"Place","portfolio-url-label":"URL","portfolio-category-label":"Category","portfolio-tags-label":"Tags","portfolio-share-label":"Share","portfolio-layout":"2","portfolio-grid-cols":"2","portfolio-grid-gutter":"20","portfolio-grid-type":"isotope","portfolio-related-opt":"0","portfolio-related-slide-items":"3","portfolio-related-slide-tab":"1","portfolio-related-slide-mobile":"1","portfolio-related-slide-scrollby":"1","portfolio-related-slide-autoplay":"0","portfolio-related-slide-center":"0","portfolio-related-slide-duration":"5000","portfolio-related-slide-smartspeed":"250","portfolio-related-slide-margin":"10","portfolio-related-slide-pagination":"0","portfolio-related-slide-navigation":"0","portfolio-related-slide-autoheight":"0","portfolio-single-slider-opt":"0","portfolio-single-slide-items":"3","portfolio-single-slide-tab":"1","portfolio-single-slide-mobile":"1","portfolio-single-slide-scrollby":"1","portfolio-single-slide-autoplay":"0","portfolio-single-slide-center":"0","portfolio-single-slide-duration":"5000","portfolio-single-slide-smartspeed":"250","portfolio-single-slide-margin":"10","portfolio-single-slide-pagination":"0","portfolio-single-slide-navigation":"0","portfolio-single-slide-autoheight":"0","logo-height":"60","sticky-logo-height":"55","mobile-logo-height":"45","header-topbar-sticky-height":"40","woo-page-title-opt":"1","template-woo-color":"#ffffff","template-woo-link-color":{"regular":"#f59019","hover":"#f59019","active":"#f59019"},"template-woo-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"template-woo-padding":{"left":"","right":"","top":"75","bottom":"75"},"template-woo-background-all":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"16642","url":""},"bg_color":"","bg_transparent":""},"woo-page-title-parallax":"0","woo-page-title-bg":"","woo-page-title-video":"","woo-page-title-overlay":"rgba(0,0,0,0.7)","template-woo-page-title-items-opt":"1","template-woo-pagetitle-items":{"Center":{"title":"Page Title Text","breadcrumb":"Breadcrumb"}},"wooarchive-page-template":"left-sidebar","wooarchive-left-sidebar":"","wooarchive-right-sidebar":"","woo-shop-archive-columns":"4","woo-page-template":"left-sidebar","woo-left-sidebar":"","woo-right-sidebar":"","woo-shop-columns":"4","woo-shop-ppp":"8","woo-related-ppp":"4","woo-related-slide-items":"4","woo-related-slide-tab":"1","woo-related-slide-mobile":"1","woo-related-slide-scrollby":"1","woo-related-slide-autoplay":"1","woo-related-slide-center":"0","woo-related-slide-duration":"5000","woo-related-slide-smartspeed":"250","woo-related-slide-margin":"30","woo-related-slide-pagination":"1","woo-related-slide-navigation":"0","woo-related-slide-autoheight":"0","woo-related-slide-infinite":"0","single-product-page-title-opt":"1","template-single-color":"","template-single-link-color":{"regular":"#073a7b","hover":"#073a7b","active":"#073a7b"},"template-single-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"template-single-padding":{"left":"","right":"","top":"350","bottom":"0"},"template-single-background-all":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"6120","url":""},"bg_color":"","bg_transparent":""},"single-product-page-title-parallax":"0","single-product-page-title-bg":"0","single-product-page-title-video":"","single-product-page-title-overlay":"rgba(0,0,0,0.7)","template-single-product-page-title-items-opt":"1","template-single-product-pagetitle-items":{"disabled":{"title":"Page Title Text"},"Center":{"breadcrumb":"Breadcrumb"}},"template-single-product-padding":{"left":"","right":"","top":"75","bottom":"75"},"template-single-product-background-all":{"bg_repeat":"no-repeat","bg_size":"cover","bg_attachment":"","bg_position":"center center","bg_media":{"id":"16642","url":""},"bg_color":"","bg_transparent":""},"template-single-product-link-color":{"regular":"#f59019","hover":"#f59019","active":"#f59019"},"template-single-product-color":"#ffffff","template-single-product-border":{"left":"","right":"","top":"","bottom":"","style":"","color":""},"services-page-hide-sidebar":"1","post-social-shares":["fb","twitter","linkedin","pinterest"],"portfolio-page-hide-sidebar":"0","events-page-hide-sidebar":"0","team-page-hide-sidebar":"0","testimonial-page-hide-sidebar":"0","theme-btn-color":{"regular":"#2759ab","hover":"#f59019","active":"#f59019"},"lendiz-grid-large":{"width":"390","height":"231"},"lendiz-grid-small":{"width":"220","height":"130"},"lendiz-team-medium":{"width":"300","height":"300"}}'; //Here Theme Default Values
	return $theme_opt_def;
}