<?php
class LendizThemeOpt
{
	public static $lendiz_mod = '';
	public function __construct(){
		$lendiz_mod = class_exists( 'LendizFamework' ) ? LendizFamework::$lendiz_mod : get_option( 'lendiz_theme_options_new');
		if( !empty( $lendiz_mod ) ){
			self::$lendiz_mod = $lendiz_mod;
		}else{
			$input_val = lendiz_default_theme_values();
			self::$lendiz_mod = json_decode( $input_val, true );
		}
	}
		
	public static function lendiz_static_theme_mod($field){
		if( is_customize_preview() ){
			$lendiz_mod_t = get_option( 'lendiz_theme_options_t');
			$lendiz_mod = !empty( $lendiz_mod_t ) ? $lendiz_mod_t : self::$lendiz_mod;
		}else{
			$lendiz_mod = self::$lendiz_mod;
		}
		
		return isset( $lendiz_mod[$field] ) && $lendiz_mod[$field] != '' ? $lendiz_mod[$field] : '';
	}
	
	public static function lendiz_allowed_html_tags(){ //LendizThemeOpt::lendiz_allowed_html_tags
		$class_only = array(
			'class' => array(),
			'title' => array()
		);
		$allowed_tags = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'title' => array()
			),
			'img' => array(
				'src' => array(),
				'alt' => array(),
				'height' => array(),
				'width' => array(),
				'title' => array()
			),
			'br' => array(),
			'i' => $class_only,
			'span' => $class_only,
			'em' => array(),
			'strong' => array(),
			'p' => $class_only,
			'ul' => $class_only,
			'li' => $class_only,
			'div' => $class_only,
			'h2' => $class_only,
			'h3' => $class_only,
			'h4' => $class_only,
			'h5' => $class_only,
			'h6' => $class_only
		);
		return apply_filters( 'lendiz_allowed_html_tags', $allowed_tags, $class_only );
	}
	
	public static function lendiz_hex2_rgba( $color, $opacity = 1 ) {	 
		$default = '';
		//Return default if no color provided
		if(empty($color))
			  return $default; 
		//Sanitize $color if "#" is provided 
			if ($color[0] == '#' ) {
				$color = substr( $color, 1 );
			}
			//Check if color has 6 or 3 characters and get values
			if (strlen($color) == 6) {
					$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
			} elseif ( strlen( $color ) == 3 ) {
					$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
			} else {
					return $default;
			}
			//Convert hexadec to rgb
			$rgb =  array_map('hexdec', $hex);
	 
			//Check if opacity is set(rgba or rgb)
			if($opacity){
				if(abs($opacity) > 1)
					$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
			//Return rgb(a) color string
			return $output;
	}
	
	function lendiz_quote_dynamic_style( $field, $value, $theme_color, $rgba_08 ){
		if( $value == 'none' ):
			echo '.'. $field .'-template .post-quote-wrap > .blockquote{
				background-color: #333;
			}';
		elseif( $value == 'theme' ):
			echo '.'. $field .'-template .post-quote-wrap > .blockquote{
				background-color: '. $theme_color .';
				border-left-color: #333;
			}';
		elseif( $value == 'theme-overlay' ):
			echo '.'. $field .'-template .post-quote-wrap > .blockquote{
				background-color: '. $rgba_08 .';
			}';
		elseif( $value == 'featured' ):
			echo '.'. $field .'-template .post-quote-wrap > .blockquote{
				background-color: rgba(0, 0, 0, 0.7);
			}';
		endif;
	}
	
	function lendiz_link_dynamic_style( $field, $value, $theme_color, $rgba_08 ){
		if( $value == 'none' ):
			echo '.'. $field .'-template .post-link-inner{
				background-color: #333;
			}';
		elseif( $value == 'theme' ):
			echo '.'. $field .'-template .post-link-inner{
				background-color: '. $theme_color .';
			}';
		elseif( $value == 'theme-overlay' ):
			echo '.'. $field .'-template .post-link-inner{
				background-color: '. $rgba_08 .';
			}';
		elseif( $value == 'featured' ):
			echo '.'. $field .'-template .post-link-inner{
				background-color: rgba(0, 0, 0, 0.7);
			}';
		endif;
	}
	
	function lendiz_check_meta_value( $meta_key, $default_key ){
		$meta_opt = get_post_meta( get_the_ID(), $meta_key, true );
		$final_opt = isset( $meta_opt ) && ( $meta_opt == '' || $meta_opt == 'theme-default' ) ? self::lendiz_static_theme_mod( $default_key ) : $meta_opt;
		return $final_opt;
	}
		
	function lendiz_widget($sidebar, $extra_class){
		if( is_active_sidebar($sidebar  ) ): ?>  
			<div class="<?php echo esc_attr( $extra_class ); ?>">
				<?php dynamic_sidebar( $sidebar ); ?>
			</div>
		<?php 
		endif;
	}
	
	function lendiz_social($social_class = '', $footer = false){
		
		$lendiz_options = self::$lendiz_mod; // Get theme option values from class variable
		$output = '';		
		$social_media = array( 
				'social-fb' => 'ti-facebook', 
				'social-twitter' => 'ti-twitter', 
				'social-instagram' => 'ti-instagram', 
				'social-linkedin' => 'ti-linkedin', 
				'social-pinterest' => 'ti-pinterest',
				'social-youtube' => 'ti-youtube', 
				'social-vimeo' => 'ti-vimeo', 
				'social-soundcloud' => 'ti-soundcloud', 
				'social-yahoo' => 'ti-yahoo', 
				'social-tumblr' => 'ti-tumblr-alt', 
				'social-mailto' => 'ti-email', 
				'social-flickr' => 'ti-flickr-alt', 
				'social-dribbble' => 'ti-dribbble', 
				'social-linkedin' => 'ti-linkedin', 
				'social-rss' => 'ti-rss' 
			);
		
		
		// Actived social icons from theme option output generate via loop
		$social_icons = '';
		foreach( $social_media as $key => $class ){
			
			$social_is_active = LendizThemeOpt::lendiz_static_theme_mod($key);
			
			if( $social_is_active ){
				$social_url = $social_is_active;
				$social_icons .= '<li class="nav-item">
								<a href="'. esc_url( $social_url ) .'" class="nav-link '. esc_attr( $key ) .'">
									<i class=" '. esc_attr( $class ) .'"></i>
								</a>
							</li>';
			}
		}
		
		if( !empty( $social_icons ) ):
			if( $footer ){
				$social_footer = LendizThemeOpt::lendiz_static_theme_mod('social-icons-type-footer');
				$social_class .= $social_footer ? ' social-' . $social_footer : '';
			}else{
				$social_icons_type = LendizThemeOpt::lendiz_static_theme_mod('social-icons-type');
				$social_class .= $social_icons_type ? ' social-' . $social_icons_type : '';
			}
			
			$social_icons_fore = LendizThemeOpt::lendiz_static_theme_mod('social-icons-fore');
			$social_icons_hfore = LendizThemeOpt::lendiz_static_theme_mod('social-icons-hfore');
			$social_icons_bg = LendizThemeOpt::lendiz_static_theme_mod('social-icons-bg');
			$social_icons_hbg = LendizThemeOpt::lendiz_static_theme_mod('social-icons-hbg');
			
			$social_class .= $social_icons_fore ? ' social-' . $social_icons_fore : '';
			$social_class .= $social_icons_hfore ? ' social-' . $social_icons_hfore : '';
			$social_class .= $social_icons_bg ? ' social-' . $social_icons_bg : '';
			$social_class .= $social_icons_hbg ? ' social-' . $social_icons_hbg : '';
			
			$output .= '<ul class="nav social-icons '. esc_attr( $social_class ) .'">';
				$output .= $social_icons;
			$output .= '</ul>';
		endif;
		
		return $output;
	}
	
	function lendiz_wp_menu($menu_name, $parent_class = ''){
		ob_start();
		wp_nav_menu( array(
			'theme_location' => esc_attr( $menu_name ),
			'menu_class'	=> esc_attr( $parent_class )
		) );
		$output = ob_get_clean();
		return $output;
	}
} new LendizThemeOpt;
class LendizHeaderElements extends LendizThemeOpt {
	private $header_top_elements;
	private $logo_url;
	private $lendiz_options;
	
	function __construct() {
		$this->lendiz_options = parent::$lendiz_mod;
	 	$this->logo_url = get_template_directory_uri() . '/assets/images/logo.png';
		add_action('lendiz_body_action', array( $this, 'lendiz_mobile_header' ), 10);
		add_action('lendiz_body_action', array( $this, 'lendiz_mobile_bar' ), 20);
		add_action('lendiz_body_action', array( $this, 'lendiz_header_secondary_space' ), 30);
		add_action('lendiz_body_action', array( $this, 'lendiz_header_top_sliding' ), 40);
		
		
    }
	
	function lendiz_dimension_height($field){
		$dim_hgt = LendizThemeOpt::lendiz_static_theme_mod($field);
		return $dim_hgt ? absint( $dim_hgt ) . 'px' : '';
	}
	
	function lendiz_theme_layout(){
		if( lendiz_po_exists() ):
			echo ( ''. $this->lendiz_check_meta_value( 'lendiz_page_layout', 'page-layout' ) == 'boxed' ) ? ' boxed-container' : '';
		elseif( is_singular( 'post' ) ):
			echo ( ''. $this->lendiz_check_meta_value( 'lendiz_post_layout', 'page-layout' ) == 'boxed' ) ? ' boxed-container' : '';
		else:
			$page_layout = LendizThemeOpt::lendiz_static_theme_mod('page-layout');
			if( $page_layout == 'boxed' ) echo ' boxed-container';
		endif;
	}
	
	function lendiz_page_loader(){
		
		$page_loader = self::lendiz_static_theme_mod('page-loader');
		if( $page_loader ){
			$page_load_img = self::lendiz_static_theme_mod('page-loader-img');
			return isset( $page_load_img['url'] ) && !empty( $page_load_img['url'] ) ? true : false;
		}
		return false;
	}	
	
	function lendiz_header_layout(){
		$class_name = '';
		
		if( lendiz_po_exists() ){
			$class_name .= $this->lendiz_check_meta_value( 'lendiz_page_header_absolute_opt', 'header-absolute' ) ? ' header-absolute' : '';
		}elseif( is_singular( 'post' ) ){
			$class_name .= $this->lendiz_check_meta_value( 'lendiz_post_header_absolute_opt', 'header-absolute' ) ? ' header-absolute' : '';
		}else{
			$class_name .= self::lendiz_static_theme_mod('header-absolute') ? ' header-absolute' : '';
		}
		
		if( lendiz_po_exists() ):
			$po_header_layout = $this->lendiz_check_meta_value( 'lendiz_page_header_layout', 'header-layout' );
			if( $po_header_layout == 'boxed' ){
				$class_name .= ' boxed-container';
			}elseif( $po_header_layout == 'full' ){
				$class_name .= ' full-width-container';
			};
		elseif( is_singular( 'post' ) ):
			$po_header_layout = $this->lendiz_check_meta_value( 'lendiz_post_header_layout', 'header-layout' );
			if( $po_header_layout == 'boxed' ){
				$class_name .= ' boxed-container';
			}elseif( $po_header_layout == 'full' ){
				$class_name .= ' full-width-container';
			};
		else:
			$header_type = LendizThemeOpt::lendiz_static_theme_mod('header-type');
			$header_layout = LendizThemeOpt::lendiz_static_theme_mod('header-layout');
			
			if( $header_type == 'default' ):
				if( $header_layout == 'boxed' ){
					$class_name .= ' boxed-container';
				}elseif( $header_layout == 'full' ){
					$class_name .= ' full-width-container';
				}
			endif;
		endif;
		
		echo esc_attr( $class_name );
	}
	function lendiz_header_menu($menu_name, $parent_class = ''){
		ob_start();
		wp_nav_menu( array(
			'theme_location' => esc_attr( $menu_name ),
			'menu_class'	=> esc_attr( $parent_class ),
			'lendiz_primary_stat'		=> 0,
			'fallback_cb'       => 'lendiz_wp_bootstrap_navwalker::fallback',
			'walker'            => new lendiz_wp_bootstrap_navwalker()
		) );
		$output = ob_get_clean();
		return $output;
	}
	
	function lendiz_header_main_menu(){
		
		$menu_class = 'nav lendiz-main-menu';
	
		ob_start();
		
		$page_menu = get_post_meta( get_the_ID(), 'lendiz_page_nav_menu', true );
		
		if( isset( $page_menu ) && $page_menu != 'none' && $page_menu != '' ){
			wp_nav_menu( array(
				'menu'				=> $page_menu,
				'menu_id'			=> 'lendiz-main-menu',
				'depth'             => 5,
				'container'         => '',
				'container_class'   => '',
				'menu_class'        => esc_attr( $menu_class ),
				'fallback_cb'       => 'lendiz_wp_bootstrap_navwalker::fallback',
				'walker'            => new lendiz_wp_bootstrap_navwalker())
			);
		}else{
			wp_nav_menu( array(
				'theme_location'    => 'primary-menu',
				'menu_id'			=> 'lendiz-main-menu',
				'depth'             => 5,
				'container'         => '',
				'container_class'   => '',
				'menu_class'        => esc_attr( $menu_class ),
				'fallback_cb'       => 'lendiz_wp_bootstrap_navwalker::fallback',
				'walker'            => new lendiz_wp_bootstrap_navwalker())
			);
		}
		$output = ob_get_clean();
		return $output;
	}
	
	function lendiz_header_logo(){
		$logo = LendizThemeOpt::lendiz_static_theme_mod('logo');
		$logo_url = '';
		if( is_array( $logo ) ){
			$img_id = isset( $logo['id'] ) ? $logo['id'] : '';
			$logo_url = $img_id ? wp_get_attachment_url( $img_id ) : '';
		}
		
		$custom_logo = get_post_meta( get_the_ID(), 'lendiz_page_custom_logo', true );
		$site_title = get_bloginfo( 'name' );
		
		if( $custom_logo ){
			$img_attributes = wp_get_attachment_image_src( $custom_logo, 'large' );
			$output = '
			<div class="main-logo">
				<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( $site_title ) .'" ><img class="custom-logo img-responsive" src="'. esc_url( $img_attributes[0] ) .'" alt="'. esc_attr( $site_title ) .'" title="'. esc_attr( $site_title ) .'" /></a>
			</div>';
		}elseif( $logo_url ){
			$output = '
			<div class="main-logo">
				<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( $site_title ) .'" ><img class="custom-logo img-responsive" src="'. esc_url( $logo_url ) .'" alt="'. esc_attr( $site_title ) .'" title="'. esc_attr( $site_title ) .'" /></a>
			</div>';
		}else{
			$site_description = get_bloginfo( 'description' );
			$output = '
			<div class="main-logo">
				<a class="site-title" href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( $site_title ) .'" >'. esc_html( $site_title ) .'</a>
				<span class="logo-tagline">'. esc_html( $site_description ) .'</span>
			</div>';
		}
		return $output;
	}
	
	function lendiz_additional_logo($field){
		$logo = LendizThemeOpt::lendiz_static_theme_mod($field);
		$logo_url = '';
		if( is_array( $logo ) ){
			$img_id = isset( $logo['id'] ) ? $logo['id'] : '';
			$logo_url = $img_id ? wp_get_attachment_url( $img_id ) : '';
		}
		
		$custom_sticky_logo = get_post_meta( get_the_ID(), 'lendiz_page_custom_sticky_logo', true );
		$site_title = get_bloginfo( 'name' );
		
		if( $field == 'sticky-logo' && $custom_sticky_logo ){
			$img_attributes = wp_get_attachment_image_src( $custom_sticky_logo, 'large' );
			$output = '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( $site_title ) .'" ><img class="custom-logo img-responsive" src="'. esc_url( $img_attributes[0] ) .'" alt="'. esc_attr( $site_title ) .'" title="'. esc_attr( $site_title ) .'" /></a>';
		}elseif( $logo_url ){
			$output = '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( $site_title ) .'" ><img class="img-responsive" src="'. esc_url( $logo_url ) .'" alt="'. esc_attr( $site_title ) .'" title="'. esc_attr( $site_title ) .'" /></a>';
		}else{
			$site_description = get_bloginfo( 'description' );
			$output = '
			<div class="main-logo">
				<a class="site-title" href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( $site_title ) .'" >'. esc_html( $site_title ) .'</a>
				<span class="logo-tagline">'. esc_html( $site_description ) .'</span>
			</div>';
		}
		return $output;
	}
	
	function lendiz_header_date(){
		$topbar_date = LendizThemeOpt::lendiz_static_theme_mod('header-topbar-date');
		return $topbar_date ? $topbar_date : 'l, F j, Y';
	}
	
	function lendiz_header_custom_text($key){
		$header_cus_txt = LendizThemeOpt::lendiz_static_theme_mod($key);
		return $header_cus_txt;
	}
	
	function lendiz_toggle_search_bar_out(){
		$search_stat = lendiz_search_stat();
		if( !$search_stat ){
			$output = '
					<div class="full-bar-search-wrap">
						<form method="get" class="search-form" action="'. esc_url( home_url( '/' ) ) .'">
							<div class="input-group">
								<input name="s" type="text" class="form-control" value="'. get_search_query() .'" placeholder="'. esc_attr__('Search and hit enter..', 'lendiz') .'">
							</div>
						</form>
						<a href="#" class="close full-bar-search-toggle"></a>
					</div>';
			return $output;
		}
	}
	
	function lendiz_header_search_modal(){
		
		$serach_opt = self::lendiz_static_theme_mod('search-toggle-form');
		$output = '';
		switch( $serach_opt ){
		
			case '1':
				$output .= '<a class="full-search-toggle" href="#"><i class="ti-search"></i></a>';
				add_filter( 'lendiz_footer_filters', array( $this, 'lendiz_full_search_wrap' ), 10 );
			break;
			
			case '2':
				$output .= '
				<div class="textbox-search-wrap">
					<form method="get" class="search-form" action="'. esc_url( home_url( '/' ) ) .'">
						<div class="input-group">
							<input name="s" type="text" class="form-control" value="'. get_search_query() .'" placeholder="'. esc_attr__('Search hit enter..', 'lendiz') .'">
						</div>
					</form>
				</div>
				<a class="textbox-search-toggle" href="#"><i class="ti-search"></i></a>
				';
			break;
			
			case '3':
				add_filter( "lendiz_toggle_search_bar", array( $this , "lendiz_toggle_search_bar_out" ) , 10 );
				$output .= '<a class="full-bar-search-toggle" href="#"><i class="ti-search"></i></a>';
			break;
			
			case '4':
				ob_start();
				get_search_form();
				$form_out = ob_get_clean();
				$output .= '<div class="bottom-search-wrap">';
				$output .= $form_out;
				$output .= '</div>
				<a class="bottom-search-toggle" href="#"><i class="ti-search"></i></a>';
			break;
			
			default:
				 get_search_form();
			break; 
			
		}
		
		return $output;
	}
	
	function lendiz_header_secondary_space(){
		
		$sec_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_secondary_opt', true );
		if( $sec_opt != 'disable' && ( $sec_opt == 'enable' || ( self::lendiz_static_theme_mod('secondary-menu') == true && self::lendiz_static_theme_mod('header-type') == 'default' ) ) ):
			if ( is_active_sidebar( 'secondary-menu-sidebar' ) ) :
				$menu_type = '';
				if( $sec_opt == 'enable' ){
					$menu_type = get_post_meta( get_the_ID(), 'lendiz_page_header_secondary_animate', true );
				}else{
					$menu_type = self::lendiz_static_theme_mod('secondary-menu-type');
				}
				$secondary_pos = '';
				if( $menu_type == 'left-push' || $menu_type == 'left-overlay' ) 
					$secondary_pos = 'left';
				elseif( $menu_type == 'full-overlay' ) 
					$secondary_pos = 'overlay'; 
				else
					$secondary_pos = 'right';
			?>
				<div class="secondary-menu-area <?php echo esc_attr( $menu_type ); ?>" data-pos="<?php echo esc_attr($secondary_pos); ?>">
					<span class="close secondary-space-toggle" title="<?php esc_attr_e( 'Close', 'lendiz' ); ?>"></span>
					<div class="secondary-menu-area-inner">
						<?php dynamic_sidebar( 'secondary-menu-sidebar' ); ?>
					</div>
				</div>
			<?php
			endif;
		endif;
	}
		
	function lendiz_woo_cart(){
		$woo_out = '';
		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return '';
		
		if( !class_exists('Lendiz_Woo_Ajax_Functions') ) return '';
		ob_start();
		
		$count = WC()->cart->cart_contents_count;
		$cart_url = wc_get_cart_url();
		$woo_out .= '<div class="mini-cart-dropdown dropdown">';
			$woo_out .= '<a href="'. esc_url( $cart_url ) .'" class="mini-cart-item"><i class="ti-shopping-cart"></i>';
				$woo_out .= '<span class="woo-icon-count lendiz-cart-items-count">'. esc_html( $count ) .'</span>';
			$woo_out .= '</a>';
			$woo_out .= '<ul class="dropdown-menu cart-dropdown-menu">'. Lendiz_Woo_Ajax_Functions::lendiz_cart_items() .'</ul>';
		$woo_out .= '</div>';

		return $woo_out;
	}
	
	function lendiz_header_multi_info(){
	
		$header_address_label = self::lendiz_static_theme_mod( 'header-address-label' );
		$header_phone_label = self::lendiz_static_theme_mod( 'header-phone-label' );
		$header_email_label = self::lendiz_static_theme_mod( 'header-email-label' );
		
		$header_address = self::lendiz_static_theme_mod( 'header-address-text' );
		$header_phone = self::lendiz_static_theme_mod( 'header-phone-text' );
		$header_email = self::lendiz_static_theme_mod( 'header-email-text' );
		
		$multi_info_arr = array(
			'header_address_label' => $header_address_label,
			'header_phone_label' => $header_phone_label,
			'header_email_label' => $header_email_label,
			'header_address' => $header_address,
			'header_phone' => $header_phone,
			'header_email' => $header_email
		);
	
		$multi_info = '
		<ul class="nav header-info lendiz-header-multi-info">
			<li class="nav-item lendiz-header-address">
				<div class="media">
					<i class="ti-map-alt"></i>
					<div class="media-body">
						<h6 class="mt-0">'. esc_html( $header_address_label ) .'</h6>
						<span>'. esc_attr( $header_address ) .'</span>
					</div>
				</div>
			</li>
			<li class="nav-item lendiz-header-phone">
				<div class="media">
					<i class="ti-mobile"></i>
					<div class="media-body">
						<h6 class="mt-0">'. esc_html( $header_phone_label ) .'</h6>
						<a href="tel:'. esc_attr( preg_replace( '/\s+/', '', $header_phone ) ) .'">'. esc_html( $header_phone ) .'</a>
					</div>
				</div>
			</li>
			<li class="nav-item lendiz-header-email">
				<div class="media">
					<i class="ti-email"></i>
					<div class="media-body">
						<h6 class="mt-0 mb-1">'. esc_html( $header_email_label ) .'</h6>
						<a href="mailto:'. esc_attr( $header_email ) .'">'. esc_html( $header_email ) .'</a>
					</div>
				</div>
			</li>
		</ul>
		';
		
		echo apply_filters( 'lendiz_header_multi_info', $multi_info, $multi_info_arr );
	}
	
	function lendiz_header_top_sliding(){
		
		if( self::lendiz_static_theme_mod('header-top-sliding-switch') ):
		
			$cols = self::lendiz_static_theme_mod('header-top-sliding-cols');
			$cols = $cols != '' ? $cols : '4';
			
			
			$enable_devices = self::lendiz_static_theme_mod('header-top-sliding-device');
			$en_dev_array = array();
			$class = '';
			if( $enable_devices ):
				foreach ( $enable_devices as $key => $value ) {
					array_push( $en_dev_array, $value );
				}
			endif;
			
			if( !in_array( "desktop", $en_dev_array ) ):
				$class = ' hidden-xl-down';
			elseif( !in_array( "tab", $en_dev_array ) ):
				$class = ' hidden-md-down';
			elseif( !in_array( "mobile", $en_dev_array ) ):
				$class = ' hidden-sm-down';
			endif;
		?>
			<div class="top-sliding-bar<?php echo esc_attr( $class ); ?>">
				<div class="top-sliding-bar-inner">
					<div class="container">
						<div class="row" data-col="<?php echo esc_attr( $cols ); ?>">
						
							<?php if( $cols <= 12 && is_active_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-1') ) ): ?>
							<div class="col-sm-<?php echo esc_attr( $cols ); ?>">
								<?php dynamic_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-1') ); ?>
							</div>
							<?php endif; ?>
							
							<?php if( $cols <= 6 && is_active_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-2') ) ): ?> 
							<div class="col-sm-<?php echo esc_attr( $cols ); ?>">
								<?php dynamic_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-2') ); ?>
							</div>
							<?php endif; ?>
							
							<?php if( $cols <= 4 && is_active_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-3') ) ): ?> 
							<div class="col-sm-<?php echo esc_attr( $cols ); ?>">
								<?php dynamic_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-3') ); ?>
							</div>
							<?php endif; ?>
							
							<?php if( $cols <= 3 && is_active_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-4') ) ): ?> 
							<div class="col-sm-<?php echo esc_attr( $cols ); ?>">
								<?php dynamic_sidebar( self::lendiz_static_theme_mod('header-top-sliding-sidebar-4') ); ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<a href="#" class="top-sliding-toggle"></a>
			</div>
		<?php
		endif;
	}
	function lendiz_header_top_bar_elements_out($key) {
		switch($key) {
		
			case 'header-topbar-menu':
				echo ( ''. $this->lendiz_header_menu('top-menu', 'topbar-items nav') );
			break;
		
			case 'header-topbar-social':
				echo ( ''. $this->lendiz_social() );
			break;
		
			case 'header-topbar-date':
				echo date_i18n( stripslashes( $this->lendiz_header_date() ) );
			break;
		
			case 'header-topbar-search':
				 get_search_form();
			break; 
			
			case 'header-topbar-text-1':
				$topbar_text_1 = $this->lendiz_header_custom_text('header-topbar-text-1');
				echo '<div class="header-topbar-text-1">'. do_shortcode( stripslashes( $topbar_text_1 ) ) .'</div>'; 
			break; 
			
			case 'header-topbar-text-2':
				$topbar_text_2 = $this->lendiz_header_custom_text('header-topbar-text-2');
				echo '<div class="header-topbar-text-2">'. do_shortcode( stripslashes( $topbar_text_2 ) ) .'</div>'; 
			break; 
			
			case 'header-topbar-text-3':
				$topbar_text_3 = $this->lendiz_header_custom_text('header-topbar-text-3');
				echo '<div class="header-topbar-text-3">'. do_shortcode( stripslashes( $topbar_text_3 ) ) .'</div>'; 
			break;
			
			case 'header-topbar-search-toggle':
				 echo '<div class="search-toggle-wrap">' . $this->lendiz_header_search_modal() . '</div>';
			break;
			case 'header-cart':
				echo do_shortcode( $this->lendiz_woo_cart() );
			break;
			case 'header-phone':
				$header_phone = self::lendiz_static_theme_mod( 'header-phone-text' );
				if( $header_phone )
				echo '<div class="header-phone"><span class="fa fa-phone"></span><a href="tel:'. esc_attr( preg_replace('/\s+/', '', $header_phone) ) .'">'. esc_attr( $header_phone ) .'</a></div>';
			break;
			
			case 'header-address':
				$header_address = self::lendiz_static_theme_mod( 'header-address-text' );
				if( $header_address )
				echo '<div class="header-address"><span class="fa fa-map-marker"></span> '. wp_kses( $header_address, LendizThemeOpt::lendiz_allowed_html_tags() ) .'</div>';
			break;
			
			case 'header-email':
				$header_email = self::lendiz_static_theme_mod( 'header-email-text' );
				if( $header_email )
				echo '<div class="header-email"><span class="fa fa-envelope"></span> <a href="mailto:'. esc_attr( $header_email ) .'">'. esc_attr( $header_email ) .'</a></div>';
			break; 
		
		}
	}	
	
	function lendiz_header_top_bar_elements($item, $class = '') {
		
		$topbar_elements = '';
		if( lendiz_po_exists() ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_topbar_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$topbar_elements_json = get_post_meta( get_the_ID(), 'lendiz_page_header_topbar_items', true );
				$topbar_elements = json_decode( stripslashes( $topbar_elements_json ), true );
				$topbar_elements = $topbar_elements[$item];
			}
		}elseif( is_singular( 'post' ) ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_topbar_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$topbar_elements_json = get_post_meta( get_the_ID(), 'lendiz_post_header_topbar_items', true );
				$topbar_elements = json_decode( stripslashes( $topbar_elements_json ), true );
				$topbar_elements = $topbar_elements[$item];
			}
		}
		
		if( empty( $topbar_elements ) ){		
			$topbar_elements = LendizThemeOpt::lendiz_static_theme_mod('header-topbar-items');
		}
		if( isset( $topbar_elements[$item] ) && !empty( $topbar_elements[$item] ) ): 
		
			$topbar_elements = $topbar_elements[$item];
			
		?>
			<ul class="topbar-items nav <?php echo esc_attr( $class ); ?>">
		<?php foreach ($topbar_elements as $element => $value ) {?>
				<li class="nav-item">
					<div class="nav-item-inner">
				<?php $this->lendiz_header_top_bar_elements_out($element); ?>
					</div>
				</li>
		<?php }	?>
			</ul>
		<?php
		endif;
		
	}
	
	function lendiz_header_logo_bar_elements_out( $key, $sticky_logo_chk ) {
		switch($key) {
			
			case 'header-logobar-logo':
				echo ( ''. $this->lendiz_header_logo() );
				if( $sticky_logo_chk ){
					echo '<div class="sticky-logo">' . $this->lendiz_additional_logo( 'sticky-logo' ) . '</div>';
				}
			break;
			
			case 'header-logobar-menu':
				echo ( ''. $this->lendiz_header_main_menu() );
			break;
		
			case 'header-logobar-social':
				echo ( ''. $this->lendiz_social() );
			break;
		
			case 'header-logobar-search':
				 get_search_form();
			break; 
			
			case 'header-logobar-text-1':
				$logobar_text_1 = $this->lendiz_header_custom_text('header-logobar-text-1');
				echo '<div class="header-logobar-text-1">'. do_shortcode( stripslashes( $logobar_text_1 ) ) .'</div>'; 
			break; 
			
			case 'header-logobar-text-2':
				$logobar_text_2 = $this->lendiz_header_custom_text('header-logobar-text-2');
				echo '<div class="header-logobar-text-2">'. do_shortcode( stripslashes( $logobar_text_2 ) ) .'</div>'; 
			break; 
			
			case 'header-logobar-text-3':
				$logobar_text_3 = $this->lendiz_header_custom_text('header-logobar-text-3');
				echo '<div class="header-logobar-text-3">'. do_shortcode( stripslashes( $logobar_text_3 ) ) .'</div>'; 
			break;
			
			case 'header-logobar-search-toggle':
				 echo '<div class="search-toggle-wrap">' . $this->lendiz_header_search_modal() . '</div>';
			break;
			
			case 'header-logobar-secondary-toggle':
				echo '<a class="secondary-space-toggle" href="#"><span></span><span></span><span></span></a>';
			break;
			case 'header-cart':
				echo do_shortcode( $this->lendiz_woo_cart() );
			break;
		
			case 'header-phone':
				$header_phone = self::lendiz_static_theme_mod( 'header-phone-text' );
				if( $header_phone )
				echo '<div class="header-phone"><span class="ti-mobile"></span><a href="tel:'. esc_attr( preg_replace('/\s+/', '', $header_phone) ) .'">'. esc_attr( $header_phone ) .'</a></div>';
			break;
			
			case 'header-address':
				$header_address = self::lendiz_static_theme_mod( 'header-address-text' );
				if( $header_address )
				echo '<div class="header-address"><span class="ti-location-pin"></span> '. wp_kses( $header_address, LendizThemeOpt::lendiz_allowed_html_tags() ) .'</div>';
			break;
			
			case 'header-email':
				$header_email = self::lendiz_static_theme_mod( 'header-email-text' );
				if( $header_email )
				echo '<div class="header-email"><span class="ti-email"></span> '. wp_kses( $header_email, LendizThemeOpt::lendiz_allowed_html_tags() ) .'</div>';
			break; 
			
			case 'multi-info':
				$this->lendiz_header_multi_info();
			break; 
			
			case 'header-cart':
				echo do_shortcode( $this->lendiz_woo_cart() );
			break;		
		}
	}	
	
	function lendiz_header_logo_bar_elements($item, $class = '') {
	
		$logobar_elements = '';
		if( lendiz_po_exists() ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_logo_bar_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$logobar_elements_json = get_post_meta( get_the_ID(), 'lendiz_page_header_logo_bar_items', true );
				$logobar_elements = json_decode( stripslashes( $logobar_elements_json ), true );
			}
		}elseif( is_singular( 'post' ) ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_logo_bar_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$logobar_elements_json = get_post_meta( get_the_ID(), 'lendiz_post_header_logo_bar_items', true );
				$logobar_elements = json_decode( stripslashes( $logobar_elements_json ), true );
			}
		}
		
		if( empty( $logobar_elements ) ){	
			$logobar_elements = LendizThemeOpt::lendiz_static_theme_mod('header-logobar-items');
		}
		if( isset( $logobar_elements[$item] ) && !empty( $logobar_elements[$item] ) ): 
		
			$logobar_elements = $logobar_elements[$item];
		
			$sticky_logo_chk = isset( $logobar_elements['header-logobar-sticky-logo'] ) ? true : false;
			if( $sticky_logo_chk ) unset( $logobar_elements['header-logobar-sticky-logo'] );
		?>
			<ul class="logobar-items nav <?php echo esc_attr( $class ); ?>">
		<?php foreach ($logobar_elements as $element => $value ) {?>
				<li class="nav-item">
					<div class="nav-item-inner">
				<?php $this->lendiz_header_logo_bar_elements_out( $element, $sticky_logo_chk ); ?>
					</div>
				</li>
		<?php }	?>
			</ul>
		<?php
		endif;
		
	}
	
	/* Header Navbar Items */
	function lendiz_header_nav_bar_elements_out( $key, $sticky_logo_chk ) {
		switch($key) {
			
			case 'header-navbar-logo':
				echo ( ''. $this->lendiz_header_logo() );
				if( $sticky_logo_chk ){
					echo '<div class="sticky-logo">' . $this->lendiz_additional_logo( 'sticky-logo' ) . '</div>';
				}
			break;
			
			case 'header-navbar-menu':
				echo ( ''. $this->lendiz_header_main_menu() );
			break;
		
			case 'header-navbar-social':
				echo ( ''. $this->lendiz_social() );
			break;
		
			case 'header-navbar-search':
				 get_search_form();
			break;
			
			case 'header-navbar-search-toggle':
				 echo '<div class="search-toggle-wrap">' . $this->lendiz_header_search_modal() . '</div>';
			break;
			
			case 'header-navbar-text-1':
				$navbar_text_1 = $this->lendiz_header_custom_text('header-navbar-text-1');			
				echo '<div class="header-navbar-text-1">'. do_shortcode( stripslashes( $navbar_text_1 ) ) .'</div>'; 
			break; 
			
			case 'header-navbar-text-2':
				$navbar_text_2 = $this->lendiz_header_custom_text('header-navbar-text-2');			
				echo '<div class="header-navbar-text-2">'. do_shortcode( stripslashes( $navbar_text_2 ) ) .'</div>';
			break; 
			
			case 'header-navbar-text-3':
				$navbar_text_3 = $this->lendiz_header_custom_text('header-navbar-text-3');		
				echo '<div class="header-navbar-text-3">'. do_shortcode( stripslashes( $navbar_text_3 ) ) .'</div>';
			break;
			
			case 'header-navbar-secondary-toggle':
				echo '<a class="secondary-space-toggle" href="#"><span></span><span></span><span></span></a>';
			break; 
			
			case 'header-cart':
				echo do_shortcode( $this->lendiz_woo_cart() );
			break;
						
			case 'header-phone':
				$header_phone = self::lendiz_static_theme_mod( 'header-phone-text' );
				if( $header_phone )
				echo '<div class="header-phone"><span class="ti-mobile"></span><a href="tel:'. esc_attr( preg_replace('/\s+/', '', $header_phone) ) .'">'. esc_attr( $header_phone ) .'</a></div>';
			break;
			
			case 'header-address':
				$header_address = self::lendiz_static_theme_mod( 'header-address-text' );
				if( $header_address )
				echo '<div class="header-address"><span class="ti-location-pin"></span> '. wp_kses( $header_address, LendizThemeOpt::lendiz_allowed_html_tags() ) .'</div>';
			break;
			
			case 'header-email':
				$header_email = self::lendiz_static_theme_mod( 'header-email-text' );
				if( $header_email )
				echo '<div class="header-email"><span class="ti-email"></span> '. wp_kses( $header_email, LendizThemeOpt::lendiz_allowed_html_tags() ) .'</div>';
			break; 
		}
	}	
	
	function lendiz_header_nav_bar_elements($item, $class = '') {
		$navbar_elements = '';
		if( lendiz_po_exists() ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_navbar_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$navbar_elements_json = get_post_meta( get_the_ID(), 'lendiz_page_header_navbar_items', true );
				$navbar_elements = json_decode( stripslashes( $navbar_elements_json ), true );
			}
		}elseif( is_singular( 'post' ) ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_navbar_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$navbar_elements_json = get_post_meta( get_the_ID(), 'lendiz_post_header_navbar_items', true );
				$navbar_elements = json_decode( stripslashes( $navbar_elements_json ), true );
			}
		}
		
		if( empty( $navbar_elements ) ){		
			$navbar_elements = LendizThemeOpt::lendiz_static_theme_mod('header-navbar-items');
		}
		if( isset( $navbar_elements[$item] ) && !empty( $navbar_elements[$item] ) ): 
		
			$navbar_elements = $navbar_elements[$item];
		
			$sticky_logo_chk = isset( $navbar_elements['header-navbar-sticky-logo'] ) ? true : false;
			if( $sticky_logo_chk )unset( $navbar_elements['header-navbar-sticky-logo'] );
		?>
			<ul class="navbar-items nav <?php echo esc_attr( $class ); ?>">
		<?php foreach ($navbar_elements as $element => $value ) {?>
				<li class="nav-item">
					<div class="nav-item-inner">
				<?php $this->lendiz_header_nav_bar_elements_out( $element, $sticky_logo_chk ); ?>
					</div>
				</li>
		<?php }	?>
			</ul>
		<?php
		endif;
		
	}
	
	function lendiz_header_bar_elements($state = '', $elements) {
		
		$header_elements = $elements;
		
		if ($header_elements): 
			
			$sticky_opt = '';
			$sticky = $sticky_scroll = '';
			
			if( lendiz_po_exists() ){
				$sticky_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_sticky_opt', true );
			}elseif( is_singular( 'post' ) ){
				$sticky_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_sticky_opt', true );
			}else{
				$sticky_opt = 'theme-default';
			}
			
			
			if( $sticky_opt == '' || $sticky_opt == 'theme-default' ){
				$sticky = self::lendiz_static_theme_mod('sticky-part');
				$sticky_scroll = self::lendiz_static_theme_mod('sticky-part-scrollup');
			}elseif( $sticky_opt == 'sticky' ){
				$sticky = 1;
				$sticky_scroll = 0;
			}elseif( $sticky_opt == 'sticky-scroll' ){
				$sticky = 1;
				$sticky_scroll = 1;
			}else{
				$sticky = 0;
			}
			
			if( $state == 'sticky' && $sticky == 1 ):
			?> <div class="sticky-outer"> <?php
				if( $sticky_scroll == 1 ):
				?> <div class="sticky-scroll"> <?php
				else:
				?> <div class="sticky-head"> <?php
				endif;
			endif;
		
			foreach ($header_elements as $element => $value ) {
				switch($element){
					case 'header-topbar':
					?>
						<div class="topbar clearfix">
							<div class="custom-container topbar-inner">
								<?php
									$this->lendiz_header_top_bar_elements('Left', 'pull-left');
									$this->lendiz_header_top_bar_elements('Center', 'pull-center text-center');
									$this->lendiz_header_top_bar_elements('Right', 'pull-right');
								?>
							</div>
							<?php
								echo apply_filters( 'lendiz_toggle_search_bar', '');
							?>
						</div>
					<?php
					break;
					
					case 'header-logo':
					?>
						<div class="logobar clearfix">
							<div class="custom-container logobar-inner">
								<?php
									$this->lendiz_header_logo_bar_elements('Left', 'pull-left');
									$this->lendiz_header_logo_bar_elements('Center', 'pull-center text-center');
									$this->lendiz_header_logo_bar_elements('Right', 'pull-right');
								?>
							</div>
							<?php
								echo apply_filters( 'lendiz_toggle_search_bar', '');
							?>
						</div>
					<?php
					break;
					
					case 'header-nav':
					?>
						<nav class="navbar clearfix">
							<div class="custom-container navbar-inner">
								<?php
									$this->lendiz_header_nav_bar_elements('Left', 'pull-left');
									$this->lendiz_header_nav_bar_elements('Center', 'pull-center text-center');
									$this->lendiz_header_nav_bar_elements('Right', 'pull-right');
								?>
							</div>
							<?php
								echo apply_filters( 'lendiz_toggle_search_bar', '');
							?>
						</nav>
					<?php
					break;
				}
			}
			
			if( $state == 'sticky' && $sticky == 1 ):
				?> </div><!--stikcy outer--> 
				</div><!-- sticky-head or sticky-scroll --> <?php
			endif;
			
		endif;
	}
	
	/* Header Navbar Items */
	function lendiz_sticky_header_space_elements($key) {
		switch($key) {
			
			case 'header-fixed-logo':
				echo ( ''. $this->lendiz_header_logo() );
			break;
			
			case 'header-fixed-menu':
				echo ( ''. $this->lendiz_wp_menu('primary-menu', 'lendiz-main-menu') );
			break;
		
			case 'header-fixed-social':
				echo ( ''. $this->lendiz_social() );
			break;
		
			case 'header-fixed-search':
				 get_search_form();
			break; 
			
			case 'header-fixed-text-1':
				$fixed_text_1 = $this->lendiz_header_custom_text('header-fixed-text-1');		
				echo do_shortcode( stripslashes( $fixed_text_1 ) );
			break; 
			
			case 'header-fixed-text-2':
				$fixed_text_2 = $this->lendiz_header_custom_text('header-fixed-text-2');
				echo do_shortcode( stripslashes( $fixed_text_2 ) );
			break; 
		}
	}
	
	function lendiz_sticky_header_space(){
		$elements = array( 'Top', 'Middle', 'Bottom' );
		
		$class_name = '';
		if( lendiz_po_exists() ):
			$class_name = $this->lendiz_check_meta_value( 'lendiz_page_header_type', 'header-type' );
		elseif( is_singular( 'post' ) ):
			$class_name = $this->lendiz_check_meta_value( 'lendiz_post_header_type', 'header-type' );
		else:
			$class_name = self::lendiz_static_theme_mod('header-type');
		endif;
		
	?>
		<div class="sticky-header-space <?php echo esc_attr( $class_name ); ?>">
			<div class="sticky-header-space-inner">
	<?php
		foreach( $elements as $part ){
			
			$header_fixed_array = $header_fixed_elements = '';
			
			if( lendiz_po_exists() ){
				$header_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_stikcy_items_opt', true );
				if( $header_items_opt == 'custom' ){
					$header_items = get_post_meta( get_the_ID(), 'lendiz_page_header_stikcy_items', true );
					$header_fixed_array = json_decode( stripslashes( $header_items ), true );
				}
			}elseif( is_singular( 'post' ) ){
				$header_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_stikcy_items_opt', true );
				if( $header_items_opt == 'custom' ){
					$header_items = get_post_meta( get_the_ID(), 'lendiz_post_header_stikcy_items', true );
					$header_fixed_array = json_decode( stripslashes( $header_items ), true );
				}
			}
			
			if( empty( $header_fixed_array ) ){
				$header_fixed_array = self::lendiz_static_theme_mod( 'header-fixed-items' );
			}
			
			if( is_array( $header_fixed_array ) && isset( $header_fixed_array[$part] ) ): 
			
				$header_fixed_elements = $header_fixed_array[$part];
			
			?>
				<ul class="header-fixed-items nav flex-column header-fixed-<?php echo sanitize_title( $part ); ?>">
			<?php foreach ($header_fixed_elements as $element => $value ) {?>
					<li class="nav-item">
						<div class="nav-item-inner">
							<?php $this->lendiz_sticky_header_space_elements($element); ?>
						</div>
					</li>
			<?php } ?>	
				</ul>
			<?php
			endif;
			
		}// end foreach
	?>
			</div>
		</div>
	<?php
	}
	
	function lendiz_full_search_wrap(){
	?>
		<div class="full-search-wrapper">
			<a class="full-search-toggle close" href="#"></a>
			<?php get_search_form(); ?>
		</div>
	<?php
	}
	
	/* Header Navbar Items */
	function lendiz_mobile_header_elements($key) {
		switch($key) {
			
			case 'mobile-header-logo':
				echo '<div class="mobile-logo">' . $this->lendiz_additional_logo( 'mobile-logo' ) . '</div>';
			break;
			
			case 'mobile-header-cart':
				if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){ 
					echo ''; 
				}else{
					$cart_url = wc_get_cart_url();
					$count = WC()->cart->cart_contents_count;
					echo '<a class="cart-bar-toggle" href="'. esc_url( $cart_url ) .'"><i class="ti-shopping-cart"></i><span class="woo-icon-count lendiz-cart-items-count">'. esc_html( $count ) .'</span></a>';
				}
			break;
			
			case 'mobile-header-menu':
				echo '<a class="mobile-bar-toggle" href="#"><i class="ti-menu"></i></a>';
			break;
			case 'mobile-header-search':
				echo '<a class="full-search-toggle" href="#"><i class="ti-search"></i></a>';
				add_filter( 'lendiz_footer_filters', array( $this, 'lendiz_full_search_wrap' ), 10 );
			break; 
		}
	}
	
	/* Header Mobile Bar Items */
	function lendiz_mobile_bar_elements($key) {
		switch($key) {
			
			case 'mobile-menu-logo':
				echo '<div class="mobile-logo">' . $this->lendiz_additional_logo( 'mobile-logo' ) . '</div>';
			break;
			
			case 'mobile-menu-mainmenu':
				$mobile_menu = '';
				if ( has_nav_menu( 'mobile-menu' ) ) $mobile_menu = $this->lendiz_wp_menu('mobile-menu', 'lendiz-main-menu');
				echo '<div class="lendiz-mobile-main-menu">'. $mobile_menu .'</div>';
			break;
		
			case 'mobile-menu-social':
				echo ( ''. $this->lendiz_social() );
			break;
		
			case 'mobile-menu-search':
				 get_search_form();
			break; 
			
			case 'mobile-menu-text-1':
				$mobile_menu_text_1 = $this->lendiz_header_custom_text('mobile-menu-text-1');		
				echo do_shortcode( stripslashes( $mobile_menu_text_1 ) );
			break; 
			
			case 'mobile-menu-text-2':
				$mobile_menu_text_2 = $this->lendiz_header_custom_text('mobile-menu-text-2');	
				echo do_shortcode( stripslashes( $mobile_menu_text_2 ) );
			break; 
		}
	}
	
	function lendiz_mobile_bar(){
		
		$animate_from = ' animate-from-'. self::lendiz_static_theme_mod('mobile-menu-animate-from');
		$elements = array( 'Top', 'Middle', 'Bottom' );
		?>
		<div class="mobile-bar<?php echo esc_attr( $animate_from ); ?>">
			<a class="mobile-bar-toggle close" href="#"></a>
			<div class="mobile-bar-inner">
				<div class="container">
		<?php
			foreach( $elements as $part ){
			
				$mobile_bar_elements = LendizThemeOpt::lendiz_static_theme_mod('mobile-menu-items');
				if( isset( $mobile_bar_elements[$part] ) ): 
				
					$mobile_bar_elements = $mobile_bar_elements[$part];
				
				?>
					<ul class="mobile-bar-items nav flex-column mobile-bar-<?php echo sanitize_title( $part ); ?>">
				<?php foreach( $mobile_bar_elements as $element => $value ) {?>
						<li class="nav-item">
							<div class="nav-item-inner">
						<?php $this->lendiz_mobile_bar_elements($element); ?>
							</div>
						</li>
				<?php }	?>
					</ul>
				<?php
				endif;
				
			} // end foreach
		?>
				</div><!-- container -->
			</div>
		</div>
		<?php
	}
	
	function lendiz_mobile_topbar_elements( $ele ){
		switch( $ele ){
			case 'phone':
				$header_phone = LendizThemeOpt::lendiz_static_theme_mod( 'header-phone-text' );
				if( $header_phone )
				echo '<div class="header-phone"><span class="ti-mobile"></span><a href="tel:'. esc_attr( preg_replace('/\s+/', '', $header_phone) ) .'">'. esc_attr( $header_phone ) .'</a></div>';
			break;
			
			case 'address':
				$header_address = LendizThemeOpt::lendiz_static_theme_mod( 'header-address-text' );
				if( $header_address )
				echo '<div class="header-address"><span class="ti-location-pin"></span> '. wp_kses( $header_address, LendizThemeOpt::lendiz_allowed_html_tags() ) .'</div>';
			break;
			
			case 'mail':
				$header_email = LendizThemeOpt::lendiz_static_theme_mod( 'header-email-text' );
				if( $header_email )
				echo '<div class="header-email"><span class="ti-email"></span> <a href="mailto:'. esc_attr( $header_email ) .'">'. esc_attr( $header_email ) .'</a></div>';
			break;
			
			case 'custom-1':
				$custom_txt = LendizThemeOpt::lendiz_static_theme_mod( 'mobile-topbar-text-1' );
				if( $custom_txt )
				echo '<div class="header-topbar-custom-txt">'. do_shortcode( stripslashes( $custom_txt ) ) .'</div>';
			break;
		}
	}
	
	function lendiz_mobile_header(){
		
		$mh_array = array( 'Left' => 'pull-left', 'Center' => 'pull-center', 'Right' => 'pull-right' );
		$mobile_sticky = '';
		
		if( self::lendiz_static_theme_mod('mobile-header-sticky') ){
			if( self::lendiz_static_theme_mod('mobile-header-sticky-scrollup') )
				$mobile_sticky = 'sticky-scroll';
			else
				$mobile_sticky = 'sticky-head';
		}
		$mobile_topbar_opt = LendizThemeOpt::lendiz_static_theme_mod('mobile-topbar-opt');
		
		//'mobile-topbar-text-1'
		if( $mobile_topbar_opt == '1' ){
			$mobile_topbar_elements = LendizThemeOpt::lendiz_static_theme_mod('mobile-topbar-items');
			if( isset( $mobile_topbar_elements['Enabled'] ) && !empty( $mobile_topbar_elements['Enabled'] ) ): ?>
			<div class="mobile-topbar-wrap">
				<ul class="mobile-topbar-items nav">
				<?php foreach( $mobile_topbar_elements['Enabled'] as $element => $value ) {?>
					<li class="nav-item">
						<div class="nav-item-inner">
						<?php $this->lendiz_mobile_topbar_elements($element); ?>
						</div>
					</li>
				<?php }	?>
				</ul>
			</div>
			<?php
			endif;
		}
		
		?>
		<div class="mobile-header">
			<div class="mobile-header-inner">
				<?php echo ( ''. $mobile_sticky != '' ? '<div class="sticky-outer"><div class="'. esc_attr( $mobile_sticky ) .'">' : '' ); ?>
						<div class="container">
		<?php
		foreach( $mh_array as $item => $class ){
		
			$mobile_header_elements = LendizThemeOpt::lendiz_static_theme_mod('mobile-header-items');
			if( isset( $mobile_header_elements[$item] ) ): 
			
				$mobile_header_elements = $mobile_header_elements[$item];
			
			?>
				<ul class="mobile-header-items nav <?php echo esc_attr( $class ); ?>">
			<?php foreach( $mobile_header_elements as $element => $value ) {?>
					<li class="nav-item">
						<div class="nav-item-inner">
					<?php $this->lendiz_mobile_header_elements($element); ?>
						</div>
					</li>
			<?php }	?>
				</ul>
			<?php
			endif;
		
		}
		?>
						</div><!-- container -->
				<?php echo ( ''. $mobile_sticky != '' ? '</div></div>' : '' ); ?>
			</div>
		</div>
		<?php
	}
	
	function lendiz_header_bar(){
		
		$header_type = $header_items = $header_inner_class = '';
		
		if( lendiz_po_exists() ){
			$header_type = $this->lendiz_check_meta_value( 'lendiz_page_header_type', 'header-type' );
			$header_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_items_opt', true );
			if( $header_items_opt == 'custom' ){
				$header_items = get_post_meta( get_the_ID(), 'lendiz_page_header_items', true );
				$header_items = json_decode( stripslashes( $header_items ), true );
			}
			
			$extra_class = get_post_meta( get_the_ID(), 'lendiz_page_header_extra_class', true );
			$header_inner_class .= $extra_class ? ' ' . $extra_class : '';
			
		}elseif( is_singular( 'post' ) ){
			$header_type = $this->lendiz_check_meta_value( 'lendiz_post_header_type', 'header-type' );
			$header_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_items_opt', true );
			if( $header_items_opt == 'custom' ){
				$header_items = get_post_meta( get_the_ID(), 'lendiz_post_header_items', true );
				$header_items = json_decode( stripslashes( $header_items ), true );
			}
		}
		
		if( empty( $header_items ) ){
			$header_type = self::lendiz_static_theme_mod( 'header-type' );
			$header_items = self::lendiz_static_theme_mod( 'header-items' );
		}
		
		
	?>
		<div class="header-inner<?php echo esc_attr( $header_inner_class ); ?>">
	<?php
		if( $header_type == 'default' ):
		
			/* Header Normal Elements */
			echo isset( $header_items['Normal'] ) ? $this->lendiz_header_bar_elements( 'normal', $header_items['Normal'] ) : '';
			
			/* Header Sticky Elements */
			echo isset( $header_items['Sticky'] ) ? $this->lendiz_header_bar_elements( 'sticky', $header_items['Sticky'] ) : '';
			
		else:
			$this->lendiz_sticky_header_space();
		endif;
	?>
		</div>
	<?php
	}
	
	function lendiz_featured_slider($template){
	?>
		<div class="featured-slider-wrapper">
			<?php echo get_template_part('template-parts/slider/featured'); ?>
		</div>
	<?php
	}
	
	function lendiz_header_slider( $cur_position ){
		$slide_shortcode = $slide_opt = '';
		
		if( lendiz_po_exists() ){
			$slide_opt = $this->lendiz_check_meta_value( 'lendiz_page_header_slider_opt', 'header-slider-position' );
			$slide_shortcode = get_post_meta( get_the_ID(), 'lendiz_page_header_slider', true );
		}elseif( is_singular( 'post' ) ){
			$slide_opt = $this->lendiz_check_meta_value( 'lendiz_post_header_slider_opt', 'header-slider-position' );
			$slide_shortcode = get_post_meta( get_the_ID(), 'lendiz_post_header_slider', true );
		}
		
		if( $slide_opt != 'none' && !empty( $slide_shortcode ) && $cur_position == $slide_opt ) :
	?>
		<div class="header-slider-wrapper">
			<?php echo do_shortcode( $slide_shortcode ); ?>
		</div>
	<?php
		endif;
	}
	
	function lendiz_breadcrumbs() {
	 
	  $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	  $delimiter = ''; // delimiter between crumbs
	  $home = esc_html__('Home', 'lendiz'); // text for the 'Home' link
	  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	  $before = '<span class="current">'; // tag before the current crumb
	  $after = '</span>'; // tag after the current crumb
	 
	  global $post;
	  $homeLink = home_url( '/' );
	  echo '<div id="breadcrumb" class="breadcrumb">';
	
	  if (is_home() || is_front_page()) {
		
		if ($showOnHome == 1) echo wp_kses( $before . $home . $after, LendizThemeOpt::lendiz_allowed_html_tags() );//'<a href="' . $homeLink . '">' . $home . '</a>';
	 
	  } else {
	
		echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	 
		if ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			
			$post_type = get_post_type_object(get_post_type());
			if( $post_type ){
				echo wp_kses( $before . $post_type->labels->singular_name . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
			}else{
				$queried_object = get_queried_object();
				if( $queried_object )
				echo wp_kses( $before . $queried_object->name . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
			}
			
	 
		} elseif ( is_category() ) {
		  $thisCat = get_category(get_query_var('cat'), false);
		  if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
		  echo wp_kses( $before . single_cat_title('', false) . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_search() ) {
		  echo wp_kses( $before . get_search_query() . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_day() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		  echo wp_kses( $before . get_the_time('d') . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_month() ) {
		  echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		  echo wp_kses( $before . get_the_time('F') . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_year() ) {
		  echo wp_kses( $before . get_the_time('Y') . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_single() && !is_attachment() ) {
		  if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
			$title = get_the_title();
			$title = $title ? $title : get_the_ID();
			if( !$title ){
				global $wp_query; 
				$post = $wp_query->queried_object; 
				$title = $post->post_title;
			}
			if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . $title . $after;
		  } else {
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
			echo wp_kses( $cats, LendizThemeOpt::lendiz_allowed_html_tags() );
			$title = get_the_title();
			$title = $title ? $title : get_the_ID();
			if ($showCurrent == 1) echo wp_kses( $before . $title . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
		  }
	 
		} elseif ( is_attachment() ) {
		  if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;	 
		} elseif ( is_page() && !$post->post_parent ) {
		  if ($showCurrent == 1) echo wp_kses( $before . get_the_title() . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_page() && $post->post_parent ) {
		  $parent_id  = $post->post_parent;
		  $breadcrumbs = array();
		  while ($parent_id) {
			$page = get_page($parent_id);
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
			$parent_id  = $page->post_parent;
		  }
		  $breadcrumbs = array_reverse($breadcrumbs);
		  for ($i = 0; $i < count($breadcrumbs); $i++) {
			echo wp_kses( $breadcrumbs[$i], LendizThemeOpt::lendiz_allowed_html_tags() );
			if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
		  }
		  if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
	 
		} elseif ( is_tag() ) {
		  echo wp_kses( $before . single_tag_title('', false) . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_author() ) {
		   global $author;
		  $userdata = get_userdata($author);
		  echo wp_kses( $before . esc_html__('Posts by ', 'lendiz') . $userdata->display_name . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
	 
		} elseif ( is_404() ) {
		  echo wp_kses( $before . esc_html__('Error 404', 'lendiz') . $after, LendizThemeOpt::lendiz_allowed_html_tags() );
		}
	 
		if ( get_query_var('paged') ) {
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		  echo esc_html__('Page', 'lendiz') . ' ' . get_query_var('paged');
		  if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
	  }
	  echo '</div>';
	} 
	
	function lendiz_author_page_title_out(){
	?>
		<div class="author-info-wrapper">
			<?php get_template_part('template-parts/author/biography'); ?>
		</div>
	<?php
	}
	
	function lendiz_page_title_form($template, $custom_title = ''){
		
		$page_title = $page_title_desc = $page_tit_opt = '';
		
		$current_title = $custom_title ? $custom_title : '';
		if( $current_title ){
			$page_title = $current_title;
		}else{
		
			$current_title = get_the_title();
		
			if( $template == 'single-post' || $template == 'page' ):
				
				if( lendiz_po_exists() ){			
					$page_tit_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_page_title_opt', true );
					if( $page_tit_opt == '1' ){
						$page_title = esc_html( get_post_meta( get_the_ID(), 'lendiz_page_header_page_title_text', true ) );
						$page_title_desc = esc_html( get_post_meta( get_the_ID(), 'lendiz_page_header_page_title_desc', true ) );
						if( empty( $page_title ) ){
							$page_title = $current_title;
						}
					}else{
						$page_title = $current_title;
					}
							
				}elseif( is_singular( 'post' ) ){			
					$page_tit_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_post_title_opt', true );
					if( $page_tit_opt == '1' ){
						$page_title = esc_html( get_post_meta( get_the_ID(), 'lendiz_post_header_post_title_text', true ) );
						$page_title_desc = esc_html( get_post_meta( get_the_ID(), 'lendiz_post_header_post_title_desc', true ) );
						if( empty( $page_title ) ){
							$page_title = $current_title;
						}
					}else{
						$page_title = $current_title;
					}
							
				}else{
					$page_title = $current_title;
					if( is_404() ){
						$page_title = esc_html__( 'Error', 'lendiz' );
					}
				}
				
			elseif( $template == 'blog' ):
				
				//If only blog template enabled from theme options
				if( is_home() ){
					$page_title = self::lendiz_static_theme_mod('blog-page-title');
					$page_title_desc = self::lendiz_static_theme_mod('blog-page-desc');
				}elseif( is_category() ){
					$page_title = single_cat_title( '', false );
					$page_title_desc = category_description();
				}elseif( is_tag() ){
					$page_title = single_tag_title( '', false );
					$page_title_desc = tag_description();
				}elseif( is_search() ){
					$page_title = esc_html__( 'Search Result for: ', 'lendiz' ) . sprintf( '%s', esc_attr( get_search_query() ) );
				}else{
					$page_title = get_the_archive_title();
					$page_title_desc = get_the_archive_description();
				}
				
			elseif( $template == 'category' ):
				$page_title = single_cat_title( '', false );
				$page_title_desc = category_description();
			elseif( $template == 'tag' ):
				$page_title = single_tag_title( '', false );
				$page_title_desc = tag_description();
			elseif( $template == 'search' ):
				$page_title = esc_html__( 'Search Result for: ', 'lendiz' ) . sprintf( '%s', esc_attr( get_search_query() ) );
			else:
				$page_title = get_the_archive_title();
				$page_title_desc = get_the_archive_description();
			endif;
		}
		
		return array( 'title' => $page_title, 'description' => $page_title_desc );
	}	
	
	function lendiz_page_title( $template = 'archive', $custom_title = '' ){
		$parallax = '';
		if( lendiz_po_exists() ){
			$parallax = $this->lendiz_check_meta_value( 'lendiz_page_header_page_title_parallax', $template.'-page-title-parallax' );
		}elseif( is_singular( 'post' ) ){
			$parallax = $this->lendiz_check_meta_value( 'lendiz_post_header_post_title_parallax', $template.'-page-title-parallax' );
		}else{
			$parallax = self::lendiz_static_theme_mod($template.'-page-title-parallax');
		}
		$page_tit_opt = '';
		if( lendiz_po_exists() ){
			$page_tit_opt = $this->lendiz_check_meta_value( 'lendiz_page_header_page_title_opt', $template.'-page-title-opt' );
		}elseif( is_singular( 'post' ) ){
			$page_tit_opt = $this->lendiz_check_meta_value( 'lendiz_post_header_post_title_opt', $template.'-page-title-opt' );
		}else{
			$page_tit_opt = self::lendiz_static_theme_mod($template.'-page-title-opt');
		}
		
		if( $page_tit_opt == 1 ) :
			$id = 'page-title';
			$property = 'no-video';
			
			if( lendiz_po_exists() ){
				$video_opt = get_post_meta( get_the_ID(), 'lendiz_page_header_page_title_video_opt', true );
				if( $video_opt == '0' ){
					$video_id = '';
				}elseif( $video_opt == '1' ){
					$video_id = get_post_meta( get_the_ID(), 'lendiz_page_header_page_title_video', true );
				}else{
					$video_opt = self::lendiz_static_theme_mod( $template.'-page-title-bg' );
					$video_id = self::lendiz_static_theme_mod( $template.'-page-title-video' );
				}
			}elseif( is_singular( 'post' ) ){
				$video_opt = get_post_meta( get_the_ID(), 'lendiz_post_header_post_title_video_opt', true );
				if( $video_opt == '0' ){
					$video_id = '';
				}elseif( $video_opt == '1' ){
					$video_id = get_post_meta( get_the_ID(), 'lendiz_post_header_post_title_video', true );
				}else{
					$video_opt = self::lendiz_static_theme_mod( $template.'-page-title-bg' );
					$video_id = self::lendiz_static_theme_mod( $template.'-page-title-video' );
				}
			}else{
				$video_opt = self::lendiz_static_theme_mod( $template.'-page-title-bg' );
				$video_id = self::lendiz_static_theme_mod( $template.'-page-title-video' );
			}
			if(  $video_opt && $video_id ){
				wp_enqueue_style( 'ytplayer' );
				wp_enqueue_script( 'jquery-mb-ytplayer' );
				$id = 'page-title-bg';
				$property = "{videoURL:'http://youtu.be/". esc_attr( $video_id ) ."',containment:'self',autoPlay:true, mute:true, startAt:0, opacity:1, loop:1, showControls:0}";
			}
			
			$page_title_class = $parallax == 1 ? ' parallax-item' : '';
			if( $parallax == 1 ) wp_enqueue_script( 'jquery-stellar' ); 
			
	?>
		<header id="<?php echo esc_attr( $id ); ?>" class="page-title-wrap">
			<div class="page-title-wrap-inner<?php echo esc_attr( $page_title_class ); ?>"<?php echo ( ''. $parallax == 1 ? ' data-stellar-background-ratio="0.5"' : '' ); ?> data-property="<?php echo ( ''. $property ); ?>">
				<?php 
				if( lendiz_po_exists() ){
					$page_tit_opt = get_post_meta( get_the_ID(), 'lendiz_page_page_title_skin_opt', true );
					if( $page_tit_opt == 'custom' ){
						$page_tit_overlay = get_post_meta( get_the_ID(), 'lendiz_page_page_title_overlay', true );
						if( $page_tit_overlay ){
							echo '<span class="page-title-overlay"></span>';
						}
					}else{
						if( self::lendiz_static_theme_mod( $template.'-page-title-overlay' ) ){
							echo '<span class="page-title-overlay"></span>';
						}
					}
				}elseif( is_singular( 'post' ) ){
					$page_tit_opt = get_post_meta( get_the_ID(), 'lendiz_post_post_title_skin_opt', true );
					if( $page_tit_opt == 'custom' ){
						$page_tit_overlay = get_post_meta( get_the_ID(), 'lendiz_post_post_title_overlay', true );
						if( $page_tit_overlay ){
							echo '<span class="page-title-overlay"></span>';
						}
					}else{
						if( self::lendiz_static_theme_mod( $template.'-page-title-overlay' ) ){
							echo '<span class="page-title-overlay"></span>';
						}
					}
				}else{
					if( self::lendiz_static_theme_mod( $template.'-page-title-overlay' ) ){
						echo '<span class="page-title-overlay"></span>';
					}
				}
				?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="page-title-inner">
							<?php
							
								$pt_out = $this->lendiz_page_title_form($template, $custom_title);
								$pt_array = array( 'Left' => 'pull-left', 'Center' => 'pull-center', 'Right' => 'pull-right' );
								
								$pt_elements = '';
								
								if( lendiz_po_exists() ){
									$page_tit_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_page_title_items_opt', true );
									if( $page_tit_items_opt == 'custom' ){
										$page_tit_items = get_post_meta( get_the_ID(), 'lendiz_page_page_title_items', true );
										$pt_elements = json_decode( stripslashes( $page_tit_items ), true );
									}else{
										$pt_elements = LendizThemeOpt::lendiz_static_theme_mod('template-page-pagetitle-items');
									}
								}elseif( is_singular( 'post' ) ){
									$page_tit_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_post_title_items_opt', true );
									if( $page_tit_items_opt == 'custom' ){
										$page_tit_items = get_post_meta( get_the_ID(), 'lendiz_post_post_title_items', true );
										$pt_elements = json_decode( stripslashes( $page_tit_items ), true );
									}else{
										$pt_elements = LendizThemeOpt::lendiz_static_theme_mod('template-single-post-pagetitle-items');
									}
								}else{
									$pt_elements = LendizThemeOpt::lendiz_static_theme_mod('template-'. esc_attr( $template ) .'-pagetitle-items');
								}
								if( empty( $pt_elements ) ){
									$pt_elements = array( 'Center' =>
										array(
											'breadcrumb' => 'breadcrumb',
											'title' => 'title'											
										)
									);
								}								
								
								foreach( $pt_array as $item => $class ){
									
									if( isset( $pt_elements[$item] ) ):
										$pt_inner_elements = $pt_elements[$item];
										
									
								?>
									<div class="<?php echo esc_attr( $class ); ?>">
								<?php
									foreach ( $pt_inner_elements as $element => $value ) {
										switch($element) {
					
											case 'title':
												if( $pt_out[$element] ){
											?>
												<h1 class="page-title"><?php echo do_shortcode( $pt_out[$element] ); ?></h1>
											<?php
												}
											break;
											
											case 'description':
											?>
												<p class="page-title-desc"><?php echo do_shortcode( $pt_out[$element] ); ?></p>
											<?php
											break;
											
											case 'breadcrumb':
												$this->lendiz_breadcrumbs();
											break;
											
											case 'author-info':
												$this->lendiz_author_page_title_out();
											break;
												
										}
										
									} // inner foreach
								?>
									</div>
								<?php
									endif;
								} //main foreach
							?>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .page-title-wrap-inner -->
		</header>
	<?php
		endif;
	}
}
class LendizPostSettings extends LendizThemeOpt {
	
	private $lendiz_options;
	private static $c_template; // current template i.e blog, archive..
	private static $c_sidebars_layout; // get sidebar layout
	private $c_layout;	// current layout i.e standard, grid or list
	private $thumb_guess;
	public static $unique_key = 1; // Unique Key generate random
	public static $top_standard; // Top standard post status
	
	function __construct() {
		$this->lendiz_options = parent::$lendiz_mod;
    }
	
	function lendiz_set_post_template( $template ){
		self::$c_template = $template;
	}
	
	function lendiz_set_page_layout( $template ){
		self::$c_sidebars_layout = $template;
	}
	
	function lendiz_get_page_layout(){
		return self::$c_sidebars_layout;
	}
	
	function lendiz_get_thumb_size(){
	
		$main_layout = self::$c_template;
		$layout = $this->lendiz_get_page_layout();
		$post_layout = $this->c_layout;
		$top_standard = self::$top_standard;
		if( is_singular( 'post' ) ){
			
			$this->thumb_guess = 'large';
			
		}elseif( $post_layout == 'standard' || $top_standard == true ){
			
			if( $layout == 'right-sidebar' || $layout == 'left-sidebar' ){
				$this->thumb_guess = 'large';
			}elseif( $layout == 'both-sidebar' ){
				$this->thumb_guess = 'medium';
			}else{
				$this->thumb_guess = 'large';
			}
			
		}elseif( $post_layout == 'grid' ){
			
			$cols = self::lendiz_static_theme_mod( $main_layout . '-grid-cols' );
			
			if( $layout == 'no-sidebar' ){
				if( $cols == 2 ){
					$this->thumb_guess = 'medium';
				}elseif( $cols == 3 ){
					$this->thumb_guess = 'lendiz-grid-large';
				}else{
					$this->thumb_guess = 'lendiz-grid-medium';
				}
			}else{
				if( $cols == 2 ){
					$this->thumb_guess = 'lendiz-grid-medium';
				}else{
					$this->thumb_guess = 'lendiz-grid-small';
				}
			}
			
		}elseif( $post_layout == 'list' ){
			if( $layout == 'no-sidebar' ){
				$this->thumb_guess = 'medium';
			}else{
				$this->thumb_guess = 'lendiz-grid-medium';
			}
			
		}else{
		
			$this->thumb_guess = 'large';
			
		}		
		
	}
	
	function lendiz_check_template_exists( $field ){
		$theme_templates = self::lendiz_static_theme_mod( 'theme-templates' );
		if( !empty( $theme_templates ) && in_array( $field, $theme_templates ) )
			return 1;
		else
			return 0;
	}
	
	function lendiz_check_category_template_exists( $field ){
		$theme_templates = self::lendiz_static_theme_mod( 'theme-categories' );
		if( !empty( $theme_templates ) && in_array( $field, $theme_templates ) )
			return 1;
		else
			return 0;
	}
	
	public function lendiz_unique_key() {
        return self::$unique_key++;
    }
	
	function lendiz_get_current_layout(){
		if( self::$top_standard ){
			$layout = 'standard';
		}else{
			$layout = self::lendiz_static_theme_mod( self::$c_template.'-post-template' );
		}
		$this->c_layout = $layout;
		$layout .= '-layout';
		$this->lendiz_get_thumb_size();
		return $layout;
	}
	
	function lendiz_get_excerpt_length() {
		 $template = self::$c_template;
	}
	
	function lendiz_set_excerpt_length( $length ) {
		
		$excerpt_length = self::lendiz_static_theme_mod( self::$c_template.'-excerpt' );
		return $excerpt_length;
	}
	function lendiz_template_content_class( $post_id = '' ){
		
		$template = self::$c_template;
		
		$hide_sidebar_opt = '';
		if( lendiz_po_exists() ){
			$hide_sidebar_opt = $this->lendiz_check_meta_value( 'lendiz_page_sidebar_mobile', $template.'-page-hide-sidebar' );
		}elseif( is_singular( 'post' ) ){
			$hide_sidebar_opt = $this->lendiz_check_meta_value( 'lendiz_post_sidebar_mobile', $template.'-page-hide-sidebar' );
		}else{
			$hide_sidebar_opt = self::lendiz_static_theme_mod( $template.'-page-hide-sidebar' );
		}
		
		$sidebar_class = $sticky_class = '';
		$sidebar_sticky_stat = self::lendiz_static_theme_mod( $template.'-sidebar-sticky' );
		if( $sidebar_sticky_stat ){
			$sticky_class = ' lendiz-sticky-obj';
			wp_enqueue_script( 'sticky-kit' );
		}
		
		$sidebar_class .= $hide_sidebar_opt == 0 ? ' hidden-sm-down' : '';
		
		$template_cls = array( 'content_class' => '', 'rsidebar_class' => '', 'lsidebar_class' => '', 'right_sidebar' => '', 'left_sidebar' => '', 'sticky_class' => $sticky_class );
		
		$page_template = '';
		
		$post_id = $post_id ? $post_id : get_the_ID();
				
		
		if( lendiz_po_exists( $post_id ) && !is_search() ){	
			$page_template_opt = get_post_meta( $post_id, 'lendiz_page_template_opt', true );
			if( $page_template_opt == '' || $page_template_opt == 'theme-default' ){
				$page_template = self::lendiz_static_theme_mod( $template.'-page-template' );
			}else{
				$page_template = get_post_meta( $post_id, 'lendiz_page_template', true );
			}
		}elseif( is_singular( 'post' ) ){
			$page_template_opt = get_post_meta( $post_id, 'lendiz_post_template_opt', true );
			if( $page_template_opt == '' || $page_template_opt == 'theme-default' ){
				$page_template = self::lendiz_static_theme_mod( $template.'-page-template' );
			}else{
				$page_template = get_post_meta( $post_id, 'lendiz_post_template', true );
			}
		}else{
			$page_template = self::lendiz_static_theme_mod( $template.'-page-template' );
		}
		
		if( $page_template == 'right-sidebar' ){
			
			$this->lendiz_set_page_layout( 'right-sidebar' );
			$template_cls['content_class'] = 'col-lg-8';
			$template_cls['rsidebar_class'] = 'col-lg-4'.$sidebar_class;
			if( lendiz_po_exists() ){
				$template_cls['right_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_page_right_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-right-sidebar' );
			}elseif( is_singular( 'post' ) ){
				$template_cls['right_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_post_right_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-right-sidebar' );
			}else{
				$template_cls['right_sidebar'] = self::lendiz_static_theme_mod( $template.'-right-sidebar' );
			}
			
			if( is_active_sidebar( $template_cls['right_sidebar'] ) ){
				$template_cls['content_class'] = 'col-lg-8';
				$template_cls['rsidebar_class'] = 'col-lg-4'.$sidebar_class;
			}else{
				$template_cls['content_class'] = 'col-md-12 page-has-no-sidebar';
				$template_cls['rsidebar_class'] = '';
			}
			
		}elseif( $page_template == 'left-sidebar' ){
			$this->lendiz_set_page_layout( 'left-sidebar' );
			$template_cls['content_class'] = 'col-lg-8 order-lg-2';
			$template_cls['lsidebar_class'] = 'col-lg-4 order-lg-1'.$sidebar_class;
			if( lendiz_po_exists() ){
				$template_cls['left_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_page_left_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-left-sidebar' );
			}elseif( is_singular( 'post' ) ){
				$template_cls['left_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_post_left_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-left-sidebar' );
			}else{
				$template_cls['left_sidebar'] = self::lendiz_static_theme_mod( $template.'-left-sidebar' );
			}
			
			if( is_active_sidebar( $template_cls['left_sidebar'] ) ){
				$template_cls['content_class'] = 'col-lg-8 order-lg-2';
				$template_cls['lsidebar_class'] = 'col-lg-4 order-lg-1'.$sidebar_class;
			}else{
				$template_cls['content_class'] = 'col-md-12 page-has-no-sidebar';
				$template_cls['lsidebar_class'] = '';
			}
			
		}elseif( $page_template == 'both-sidebar' ){
			$this->lendiz_set_page_layout( 'both-sidebar' );
			$template_cls['content_class'] = 'col-lg-6 push-lg-3';
			$template_cls['rsidebar_class'] = 'col-lg-3'.$sidebar_class;
			$template_cls['lsidebar_class'] = 'col-lg-3 pull-lg-6'.$sidebar_class;
			
			if( lendiz_po_exists() ){
				$template_cls['right_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_page_right_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-right-sidebar' );
				$template_cls['left_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_page_left_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-left-sidebar' );
			}elseif( is_singular( 'post' ) ){
				$template_cls['right_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_post_right_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-right-sidebar' );
				$template_cls['left_sidebar'] = $page_template_opt != '' && $page_template_opt != 'theme-default' ? 
					get_post_meta( $post_id, 'lendiz_post_left_sidebar', true ) :
					self::lendiz_static_theme_mod( $template.'-left-sidebar' );
			}else{
				$template_cls['right_sidebar'] = self::lendiz_static_theme_mod($template.'-right-sidebar');
				$template_cls['left_sidebar'] =  self::lendiz_static_theme_mod($template.'-left-sidebar');
			}
			
			if( is_active_sidebar( $template_cls['left_sidebar'] ) || is_active_sidebar( $template_cls['right_sidebar'] ) ){
				if( is_active_sidebar( $template_cls['left_sidebar'] ) && is_active_sidebar( $template_cls['right_sidebar'] ) ){
					$template_cls['content_class'] = 'col-md-6 push-md-3';
					$template_cls['rsidebar_class'] = 'col-md-3'. $sidebar_class;
					$template_cls['lsidebar_class'] = 'col-md-3 pull-md-6'. $sidebar_class;
				}elseif( is_active_sidebar( $template_cls['left_sidebar'] ) ){
					$template_cls['content_class'] = 'col-md-9 push-md-3';
					$template_cls['rsidebar_class'] = '';
					$template_cls['lsidebar_class'] = 'col-md-3 pull-md-9'. $sidebar_class;
				}elseif( is_active_sidebar( $template_cls['right_sidebar'] ) ){
					$template_cls['content_class'] = 'col-md-9';
					$template_cls['rsidebar_class'] = 'col-md-3'. $sidebar_class;
					$template_cls['lsidebar_class'] = '';
				}
			}else{
				$template_cls['content_class'] = 'col-md-12 page-has-no-sidebar';
				$template_cls['lsidebar_class'] = '';
				$template_cls['rsidebar_class'] = '';
			}
			
		}else{
			$this->lendiz_set_page_layout( 'no-sidebar' );
			$template_cls['content_class'] = 'col-md-12';
		}
		
		return $template_cls;
	}
	
	function lendiz_post_title($layout){
		if ( is_single() ) {
			return '<h1 class="entry-title">'. get_the_title() .'</h1>';
		}else{
			if( $layout == 'grid' || $layout == 'list' )
				return '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'. get_the_title() .'</a></h3>';
			else
				return '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'. get_the_title() .'</a></h2>';
		}
	}
	
	function lendiz_set_post_view_count( $postID ){
		$count_key = 'lendiz_post_views_count';
		$count = get_post_meta( $postID, $count_key, true );
		if($count==''){
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		}else{
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}
	}
		
	function lendiz_meta_date(){
		$archive_year  = get_the_time('Y');
		$archive_month = get_the_time('m'); 
		$archive_day   = get_the_time('d');
		ob_start();
		the_time( get_option('date_format') );
		$dt = ob_get_clean();
		return '<div class="post-date"><i class="before-icon ti-calendar"></i><a href="'.get_day_link( $archive_year, $archive_month, $archive_day).'" >'. $dt .'</a></div>';
	}
	
	function lendiz_meta_comment(){
		$comments_count = wp_count_comments(get_the_ID());
		$comment_text = '';
		if( $comments_count->total_comments > 1 ){
			$comment_text = esc_html__( 'Comments', 'lendiz' );
		}else{
			$comment_text = esc_html__( 'Comments', 'lendiz' );
		}
		return '<div class="post-comment"><a href="'.get_comments_link( get_the_ID() ).'" rel="bookmark" class="comments-count">'. esc_html( $comment_text ) .' ('.$comments_count->total_comments.')</a></div>';
	}
	
	function lendiz_meta_author(){
		return '<div class="post-author"><a href="'. get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) .'"><span class="author-img">'. get_avatar( get_the_author_meta('email'), '30' ) .'</span><span class="author-name">'. get_the_author() .'</span></a></div>';
	}
	
	function lendiz_meta_more($read_more_text){
		return '<div class="post-more"><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. esc_html( $read_more_text ) .'</a></div>';
	}
	
	function lendiz_meta_views(){
		if( get_post_meta( get_the_ID(), 'lendiz_post_views_count', true ) )
			return '<div class="post-views"><i class="before-icon ti-eye"></i><span>'. esc_attr( get_post_meta( get_the_ID(), 'lendiz_post_views_count', true ) ) .'</span></div>';
		
		return '';
	}
	
	function lendiz_meta_category(){
		$categories = get_the_category(); 
		$output = '';
		if ( ! empty( $categories ) ){
			$output = '<div class="post-category"><i class="before-icon ti-folder"></i>';
			foreach ( $categories as $category ) {
				$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>,';
			}
			$output = rtrim( $output, ',' );
			$output .= '</div>';
		}
		return $output;
	}
	
	function lendiz_meta_tags(){
		$tags = get_the_tags(); 
		$output = '';
		if ( ! empty( $tags ) ){
			$output = '<div class="post-tags">Tags: <i class="before-icon ti-tag"></i>'; 
			foreach ( $tags as $tag ) {
				$output .= '<a href="' . esc_url( get_category_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
			}
			$output .= '</div>';
		}
		return $output;
	}
	
	function lendiz_meta_social(){
		ob_start();
		$posts_shares = self::lendiz_static_theme_mod( 'post-social-shares' );
		
		$post_id = get_the_ID();
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id), 'large' );
		?>
		<div class="post-social">
			<ul class="nav social-icons">
				<?php 
				if( $posts_shares ):
					foreach ( $posts_shares as $social_share ){
			
						switch( $social_share ){
						
							case "fb": 
						?>
								<li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink( $post_id ) ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" target="blank" class="social-fb share-fb"><i class="ti-facebook"></i></a></li>
							
						<?php
							break; // fb
							case "twitter":
						?>
					
								<li><a href="http://twitter.com/intent/tweet?text=Reading:<?php echo urlencode(get_the_title()); ?>-<?php echo  esc_url( home_url( '/' ) )."/?p=". esc_attr( $post_id ); ?>" class="social-twitter share-twitter" title="<?php esc_attr_e( 'Click to send this page to Twitter!', 'lendiz' ); ?>" target="_blank"><i class="ti-twitter"></i></a></li>
					
						<?php
							break; // twitter
							case "linkedin":
						?>
					
								<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( the_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>&summary=&source=<?php echo urlencode( get_bloginfo('name') ); ?>" class="social-linkedin share-linkedin" target="blank"><i class="ti-linkedin"></i></a></li>
					
						<?php
							break; // linkedin
							case "pinterest":
						?>
					
							<li><a href="http://pinterest.com/pin/create/button/?url=<?php urlencode( the_permalink() ); ?>&amp;media=<?php echo ( ! empty( $image[0] ) ? $image[0] : '' ); ?>&description=<?php echo urlencode(get_the_title()); ?>" class="social-pinterest share-pinterest" target="blank"><i class="ti-pinterest"></i></a></li>
					
						<?php
							break; // pinterest
						?>
					
				<?php 
						} //switch
					} // foreach
					
				endif;	
				?>
			</ul>
		</div>
		<?php
			$output = ob_get_clean(); 
			return $output;
	}
	
	function lendiz_post_meta($meta_place){
		
		$template = self::$c_template;
		$postID = get_the_ID();
		
		$post_metas = array( 'Left' => 'pull-left', 'Right' => 'pull-right' );
		foreach( $post_metas as $meta => $class ){
		
			$meta_elements = LendizThemeOpt::lendiz_static_theme_mod($template .'-'. $meta_place .'-items');
			if( isset( $meta_elements[$meta] ) ): 
			
				$meta_elements = $meta_elements[$meta];
			
			?>
				<div class="post-meta <?php echo esc_attr( $class ); ?>">
					<ul class="nav">
					<?php
					foreach ( $meta_elements as $element => $value ) {
						switch($element) {
							case 'date':
								echo '<li class="nav-item">';
								echo ( ''. $this->lendiz_meta_date() );
								echo '</li>';
							break;
							
							case 'category':
								echo '<li class="nav-item">';
								echo ( ''. $this->lendiz_meta_category() );
								echo '</li>';
							break;
							
							case 'social':
								echo '<li class="nav-item">';
								echo ( ''. $this->lendiz_meta_social() );
								echo '</li>';
							break;
							
							case 'comments':
								echo '<li class="nav-item">';
								echo ( ''. $this->lendiz_meta_comment() );
								echo '</li>';
							break;
							
							case 'author':
								echo '<li class="nav-item">';
								echo ( ''. $this->lendiz_meta_author() );
								echo '</li>';
							break;
							
							case 'views':
								echo '<li class="nav-item">';
								echo ( ''. $this->lendiz_meta_views() );
								echo '</li>';
							break;
							
							case 'favourite':
								if( class_exists( 'lendiz_additional_process' ) ){
									echo '<li class="nav-item">'. lendiz_additional_process::lendiz_meta_favourite( $postID ) .'</li>';
								}
							break; 
							
							case 'more':
								echo '<li class="nav-item">';
								$read_more_text = self::lendiz_static_theme_mod($template.'-more-text');
								echo ( ''. $this->lendiz_meta_more($read_more_text) );
								echo '</li>';
							break;
							
							case 'tag':
								$tags = $this->lendiz_meta_tags();
								if( $tags ):
								echo '<li class="nav-item">';
									echo ( ''. $tags );
								echo '</li>';
								endif;
							break;
							
						}//post meta items switch
					}
				?>
					</ul>
				</div>
				<?php
			endif;
		}
	}
	
	function lendiz_video_format( $video_atts ){
		extract( $video_atts );
		switch( $video_modal ){
		
			case 'onclick':
				$video_url = '';
				if( $video_type == 'youtube' ){
					$video_url = 'https://www.youtube.com/embed/';
					$video_url .= esc_attr( $video_id );
				}elseif( $video_type == 'vimeo' ){
					$video_url = 'https://player.vimeo.com/video/';
					$video_url .= esc_attr( $video_id );
				}else{
					$video_url = esc_url( $video_id );
				}
				if( $video_type != 'custom' ){ ?>
					<a class="onclick-video-post" href="<?php echo esc_url( $video_url ); ?>">
						<div class="video-play-icon text-center"><span class="ti-control-play"></span></div>
						<?php 
							if( '' !== get_the_post_thumbnail() ):
								the_post_thumbnail( $this->thumb_guess, array( 'class' => 'img-fluid' ) );
							endif;
						?>
					</a>
				<?php
				}else{
				?>
					<a class="onclick-custom-video" href="#" data-url="<?php echo esc_url( $video_url ); ?>">
						<div class="video-play-icon text-center"><span class="ti-control-play"></span></div>
						<?php 
							if( '' !== get_the_post_thumbnail() ):
								the_post_thumbnail( $this->thumb_guess, array( 'class' => 'img-fluid' ) ); 
							endif;
						?>
					</a>
					<?php
				}
			break;
			
			case 'overlay': 
				$video_url = '';
				if( $video_type == 'youtube' ){
					$video_url = 'http://www.youtube.com/watch?v=';
					$video_url .= esc_attr( $video_id );
				}elseif( $video_type == 'vimeo' ){
					$video_url = 'https://vimeo.com/';
					$video_url .= esc_attr( $video_id );
				}else{
					$video_url = esc_url( $video_id );
				}
			
				if( $video_type != 'custom' ){ wp_enqueue_script( 'jquery-magnific-popup' ); wp_enqueue_style( 'magnific-popup' ); ?>
					<a class="popup-video-post" href="<?php echo esc_url( $video_url ); ?>">
						<div class="video-play-icon text-center"><span class="ti-control-play"></span></div>
						<?php 
							if( '' !== get_the_post_thumbnail() ):
								the_post_thumbnail( $this->thumb_guess, array( 'class' => 'img-fluid' ) ); 
							endif;
						?>
					</a>
				<?php
				}else{
					wp_enqueue_script( 'jquery-magnific-popup' ); wp_enqueue_style( 'magnific-popup' );
					$u_key = $this->lendiz_unique_key();
				?>
					<a class="popup-video-post popup-with-zoom-anim popup-custom-video" href="#popup-custom-video-<?php echo esc_attr( $u_key ); ?>">
						<div class="video-play-icon text-center"><span class="ti-control-play"></span></div>
						<?php 
							if( '' !== get_the_post_thumbnail() ):
								the_post_thumbnail( $this->thumb_guess, array( 'class' => 'img-fluid' ) ); 
							endif;
						?>
					</a>
					<div id="popup-custom-video-<?php echo esc_attr( $u_key ); ?>" class="zoom-anim-dialog mfp-hide">
						<span data-url="<?php echo esc_url( $video_url ); ?>"></span>
					</div>
					<?php
				}
			break;
			
			default: 
				$video_url = '';
				if( $video_type == 'youtube' ){
					$video_url = 'https://www.youtube.com/embed/';
					$video_url .= esc_attr( $video_id );
				}elseif( $video_type == 'vimeo' ){
					$video_url = 'https://player.vimeo.com/video/';
					$video_url .= esc_attr( $video_id );
				}else{
					$video_url = esc_url( $video_id );
				}
				
				if( $video_type != 'custom' ){
					echo do_shortcode( '[videoframe url="'. esc_url( $video_url ).'" width="100%" height="100%" params="byline=0&portrait=0&badge=0" /]' );
				}else{
					echo do_shortcode( '[video url="'. esc_url( $video_url ).'" width="100%" height="100%" /]' );
				}
			break;
		}
	}
	
	function lendiz_gallery_format(){
		
		$template = self::$c_template;
			
		$gallery_ids = get_post_meta( get_the_ID(), 'lendiz_post_gallery', true );
		if( $gallery_ids ):
			$gallery_array = explode( ",", $gallery_ids );
			$slide_id = '';
			
			$slide_template = 'blog';
			if( is_singular( 'post' ) ) $slide_template = 'single';
			$gal_atts = array(
				'data-loop="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-infinite' )) .'"',
				'data-margin="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-margin' )) .'"',
				'data-center="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-center' )) .'"',
				'data-nav="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-navigation' )) .'"',
				'data-dots="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-pagination' )) .'"',
				'data-autoplay="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-autoplay' )) .'"',
				'data-items="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-items' )) .'"',
				'data-items-tab="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-tab' )) .'"',
				'data-items-mob="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-mobile' )) .'"',
				'data-duration="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-duration' )) .'"',
				'data-smartspeed="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-smartspeed' )) .'"',
				'data-scrollby="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-scrollby' )) .'"',
				'data-autoheight="'. esc_attr(self::lendiz_static_theme_mod( $slide_template.'-slide-autoheight' )) .'"',
			);
			$data_atts = implode( " ", $gal_atts );
			$gallery_modal = $this->lendiz_check_meta_value( 'lendiz_post_gallery_modal', $template.'-gallery-format' );
			if( $gallery_modal == 'default' ): // Gallery Model Default
				wp_enqueue_script( 'owl-carousel' );
				wp_enqueue_style( 'owl-carousel' );
				?>
				<div class="owl-carousel" <?php echo ( ''. $data_atts ); ?>>
				<?php
				foreach( $gallery_array as $gal_id ): ?>
					<div class="item">
						<?php echo wp_get_attachment_image( $gal_id, $this->thumb_guess, "", array( "class" => "img-fluid" ) ); ?>
					</div>
				<?php
				endforeach;?>
				</div><!-- .owl-carousel -->
			<?php
			elseif( $gallery_modal == 'popup' ): // Gallery Model Popup
				?>
				<div class="zoom-gallery">
					<?php wp_enqueue_script( 'jquery-magnific-popup' ); wp_enqueue_style( 'magnific-popup' ); wp_enqueue_script( 'owl-carousel' ); wp_enqueue_style( 'owl-carousel' ); ?>
					<div class="owl-carousel" <?php echo ( ''. $data_atts ); ?>>
					<?php
					foreach( $gallery_array as $gal_id ): ?>
						<div class="item">
								<?php $image_url = wp_get_attachment_url( $gal_id ); ?>
								<a href="<?php echo esc_url( $image_url ); ?>" title="<?php echo esc_attr( get_the_title( $gal_id ) ); ?>">
									<?php $t = wp_get_attachment_image( $gal_id, $this->thumb_guess, "", array( "class" => "img-fluid" ) ); 
										if( $t ){
											echo wp_kses( $t, LendizThemeOpt::lendiz_allowed_html_tags() );
										}else{
											echo esc_html__( 'Image Crop not exists.', 'lendiz' );
										}
									?>
								</a>
						</div>
					<?php
					endforeach;?>
					</div><!-- .owl-carousel -->
				</div><!-- .zoom-gallery -->
			<?php
			else: // Gallery Model Grid Popup
			?>
				<div class="zoom-gallery grid-zoom-gallery clearfix">
					<?php
					$chk = 1;
					foreach( $gallery_array as $gal_id ): 
						if( $chk ): echo '<div class="left-gallery-grid">'; endif;
						?>
							<div class="grid-popup">
								<?php $image_url = wp_get_attachment_url( $gal_id ); ?>
								<a href="<?php echo esc_url( $image_url ); ?>" title="<?php echo esc_attr( get_the_title( $gal_id ) ); ?>">
									<?php echo wp_get_attachment_image( $gal_id, $this->thumb_guess, "", array( "class" => "img-fluid" ) ); ?>
								</a>
							</div>
					<?php
						if( $chk ): echo '</div><!-- .left-gallery-grid --><div class="right-gallery-grid">';  $chk = 0; endif;
					endforeach;
					?>
					</div><!-- .right-gallery-grid -->
				</div><!-- .zoom-gallery -->
				<?php
			endif;
		endif;
	}
	
	function lendiz_link_format(){
		$link_text = get_post_meta( get_the_ID(), 'lendiz_post_link_text', true );
		$link = get_post_meta( get_the_ID(), 'lendiz_post_extrenal_link', true );
		$thumbnail = '' !== get_the_post_thumbnail() ? get_the_post_thumbnail_url() : '';
		if( !empty( $link_text ) ):
		?>
			<div class="post-link-wrap" data-url="<?php echo esc_url( $thumbnail ); ?>">
				<div class="post-link-inner">
					<h4><a href="<?php echo esc_url( $link ); ?>" class="post-link" title="<?php echo esc_attr( $link_text ); ?>"><?php echo esc_html( $link_text ); ?></a></h4>
				</div>
			</div>
		<?php
		endif;
	}
	
	function lendiz_quote_format(){
		$quote_text = get_post_meta( get_the_ID(), 'lendiz_post_quote_text', true );
		$quote_author = get_post_meta( get_the_ID(), 'lendiz_post_quote_author', true );
		$thumbnail = '' !== get_the_post_thumbnail() ? get_the_post_thumbnail_url() : '';
		if( !empty( $quote_text ) ):
		?>
			<div class="post-quote-wrap" data-url="<?php echo esc_url( $thumbnail ); ?>">
				<blockquote class="blockquote">
					<p class="mb-0"><h4><?php echo esc_html( $quote_text ); ?></h4></p>
					<footer class="blockquote-footer"><?php echo esc_html( $quote_author ); ?></footer>
				</blockquote>
			</div>
		<?php
		endif;
	}
	
	function lendiz_audio_format(){
		$audio_type = get_post_meta( get_the_ID(), 'lendiz_post_audio_type', true );
		$audio_id = get_post_meta( get_the_ID(), 'lendiz_post_audio_id', true );
		if( !empty( $audio_type ) && !empty( $audio_id ) ): ?>
			<div class="post-audio-wrap">
				<?php if( $audio_type == 'soundcloud' ): ?>
						<?php echo do_shortcode('[soundcloud url="https://api.soundcloud.com/tracks/'. esc_attr( $audio_id ) .'" params="auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&visual=true" width="100%" height="150" /]'); ?>
				<?php else: ?>
					<audio preload="none" controls>
						<source src="<?php echo esc_url( $audio_id ); ?>" type="audio/mp3">
					</audio>
				<?php endif; ?>
			</div>
		<?php
		endif;
	}
	
	function lendiz_post_format(){
		$template = self::$c_template;
		ob_start();
		
		if ( has_post_format( 'image' ) && '' !== get_the_post_thumbnail() ) :
		?>
			<div class="post-thumb-wrap">
				<?php echo the_post_thumbnail( $this->thumb_guess, array( 'class' => 'img-fluid' ) ); ?>
				
				<?php if( is_singular( 'post' ) ): 
					$theme_opt_overlay = self::lendiz_static_theme_mod( 'single-post-overlay-opt' );
					$post_oitems_opt = get_post_meta( get_the_ID(), 'lendiz_post_overlay_opt', true );
					if( $theme_opt_overlay == 1 || $post_oitems_opt == 1 ): ?>
				
					<div class="post-overlay-items"><?php
						$post_elements = array();
						$post_oitems_opt = get_post_meta( get_the_ID(), 'lendiz_post_overlay_opt', true );
						if( $post_oitems_opt == '' || $post_oitems_opt == 'theme-default' ){
							$post_elements = self::lendiz_static_theme_mod( 'single-post-overlay-items' );  
							$post_elements = is_array( $post_elements ) && isset( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array();    
						}else{
							$overlay_post_items = get_post_meta( get_the_ID(), 'lendiz_post_overlay_items', true );
							$post_elements = json_decode( stripslashes( $overlay_post_items ), true );
							$post_elements = is_array( $post_elements ) && isset( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array(); 
						}
						$this->lendiz_post_overlay_items( $post_elements );?>
					</div>
				
					<?php endif;
				endif; ?>
								
			</div>
		<?php
		
		elseif ( has_post_format( 'video' ) ) :
			$video_type = get_post_meta( get_the_ID(), 'lendiz_post_video_type', true );
			$video_id = get_post_meta( get_the_ID(), 'lendiz_post_video_id', true );
			if( !empty( $video_type ) ):
				
				$video_modal = '';
				if( is_singular( 'post' ) ){
					$video_modal = $this->lendiz_check_meta_value( 'lendiz_post_video_modal', $template.'-video-format' );
				}else{
					$video_modal = self::lendiz_static_theme_mod($template.'-video-format');
				}
				$video_atts = array(
					'video_type'	=> $video_type,
					'video_id'		=> $video_id,
					'video_modal'	=> $video_modal
				);
			?>
				<div class="post-video-wrap">
					<?php $this->lendiz_video_format( $video_atts ); ?>
				</div>
			<?php
			endif;
		
		elseif ( has_post_format( 'gallery' ) ) :
			$this->lendiz_gallery_format();
		
		elseif ( has_post_format( 'audio' ) ) :
			$this->lendiz_audio_format();
		
		elseif ( has_post_format( 'quote' ) ) :
			$this->lendiz_quote_format();
		
		elseif ( has_post_format( 'link' ) ) :
			$this->lendiz_link_format();
		elseif( get_the_post_thumbnail() ) :
		?>
			<div class="post-thumb-wrap">
				<?php echo the_post_thumbnail( $this->thumb_guess, array( 'class' => 'img-fluid' ) ); ?>
				
				<?php if( is_singular( 'post' ) ): 
					$theme_opt_overlay = self::lendiz_static_theme_mod( 'single-post-overlay-opt' );
					$post_oitems_opt = get_post_meta( get_the_ID(), 'lendiz_post_overlay_opt', true );
					if( $theme_opt_overlay == 1 || $post_oitems_opt == 1 ): ?>
				
					<div class="post-overlay-items"><?php
						$post_elements = array();
						$post_oitems_opt = get_post_meta( get_the_ID(), 'lendiz_post_overlay_opt', true );
						if( $post_oitems_opt == '' || $post_oitems_opt == 'theme-default' ){
							$post_elements = self::lendiz_static_theme_mod( 'single-post-overlay-items' );  
							$post_elements = is_array( $post_elements ) && isset( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array();  
						}else{
							$overlay_post_items = get_post_meta( get_the_ID(), 'lendiz_post_overlay_items', true );
							$post_elements = json_decode( stripslashes( $overlay_post_items ), true );
							$post_elements = is_array( $post_elements ) && isset( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array(); 
						}
						$this->lendiz_post_overlay_items( $post_elements );?>
					</div>
				
					<?php endif;
				endif; ?>
				
			</div><!-- .post-thumb-wrap -->
		<?php
		endif;
		
		
		if( !has_post_format( 'image' ) && is_single() && $this->lendiz_check_meta_value( 'lendiz_post_overlay_opt', 'single-post-overlay-opt' ) == 1 ): ?>
			<div class="post-overlay-items">
			<?php
			
				$post_elements = array();
				$post_oitems_opt = get_post_meta( get_the_ID(), 'lendiz_post_overlay_opt', true );
				if( $post_oitems_opt == '' || $post_oitems_opt == 'theme-default' ){
					$post_elements = self::lendiz_static_theme_mod( 'single-post-overlay-items' );
					$post_elements = is_array( $post_elements ) && isset( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array();  		
				}else{
					$overlay_post_items = get_post_meta( get_the_ID(), 'lendiz_post_overlay_items', true );
					$post_elements = json_decode( stripslashes( $overlay_post_items ), true );
					$post_elements = is_array( $post_elements ) && isset( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array(); 
				}
				$this->lendiz_post_overlay_items( $post_elements );
			?>
			</div>	
		<?php endif;
		
		//Overlay items for non single
		if( !is_single() && self::lendiz_static_theme_mod( $template.'-overlay-opt' ) == 1 ): ?>	
			<div class="post-overlay-items">
				<?php
					$post_elements = array();
					$post_elements = self::lendiz_static_theme_mod( $template.'-overlay-items' );		
					$post_elements = is_array( $post_elements ) && isset( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array();  
					$this->lendiz_post_overlay_items( $post_elements );
				?>
			</div>
		<?php
		endif;		
		
		return ob_get_clean();
	}
	
	function lendiz_post_overlay_items( $post_elements ){
	
		if( !empty( $post_elements ) ){
			foreach ( $post_elements as $element => $value ) {
				switch($element) {
				
					case 'title':
					?>
						<header class="entry-header">
							<?php echo ( ''. $this->lendiz_post_title( 'standard' ) ); ?>
						</header>
					<?php									
					break;
					
					case 'top-meta':
					?>
						<div class="entry-meta top-meta clearfix">
							<?php $this->lendiz_post_meta( 'topmeta' ); ?>
						</div>
					<?php
					break;
					
					case 'bottom-meta':
					?>
						<footer class="entry-footer">
							<div class="entry-meta bottom-meta clearfix">
								<?php $this->lendiz_post_meta( 'bottommeta' ); ?>
							</div>
						</footer>
					<?php
					break;
					
					
				} // switch					
			} //foreach 
		}//if end
		
	}
	
	function lendiz_post_items(){
		
		$template = self::$c_template;
		
		$layout = $this->lendiz_get_current_layout();
		$extra_class = $layout == 'list-layout' ? ' clearfix' : '';
		$post_elements = LendizThemeOpt::lendiz_static_theme_mod($template .'-items');
		if( isset( $post_elements['Enabled'] ) ): 
		
			$post_elements = $post_elements['Enabled'];
		
		?>
			<div class="article-inner post-items<?php echo esc_attr( $extra_class ); ?>">
				<?php
									
					$format = get_post_format( get_the_ID() );
					if( isset( $post_elements['thumb'] ) && $layout == 'list-layout' ): ?>
						<div class="post-list-left-part">
					<?php
							$post_format = $this->lendiz_post_format();
							if( !empty( $post_format  ) ){
							?>
								<div class="post-format-wrap">
									<?php echo ( ''. $post_format ); ?>
								</div>
							<?php
							}
					?>
						</div><!-- .post-list-left-part -->
						<div class="post-list-right-part">
					<?php
					elseif( $layout == 'list-layout' ):
						$list_class = empty( $format ) ? ' post-list-full' : '';
					?>
						<div class="post-list-right-part<?php echo esc_attr( $list_class ); ?>">
					<?php
					endif; // list-layout endif
					
				foreach ( $post_elements as $element => $value ) {
					switch($element) {
					
						case 'title':
							$layout = self::lendiz_static_theme_mod($template.'-post-template');
						?>
							<header class="entry-header">
								<?php echo ( ''. $this->lendiz_post_title($layout) ); ?>
							</header>
						<?php									
						break;
						
						case 'top-meta':
						?>
							<div class="entry-meta top-meta clearfix">
								<?php $this->lendiz_post_meta('topmeta'); ?>
							</div>
						<?php
						break;
						
						case 'thumb':
							if( $layout != 'list-layout' && $layout != 'list' ):
								$post_format = $this->lendiz_post_format();
								if( !empty( $post_format  ) ){
								?>
									<div class="post-format-wrap">
										<?php echo ( ''. $post_format ); ?>
									</div>
								<?php
								}
							endif;
						break;
						
						case 'content':
						
							if( '' !== get_the_content() ) {
						?>
							<div class="entry-content">
								<?php 
								if( !is_single() ):
									the_excerpt();
								else:
									the_content();
									
									wp_link_pages( array(
										'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'lendiz' ),
										'after'       => '</div>',
										'link_before' => '<span class="page-number">',
										'link_after'  => '</span>',
									) );
									
								endif;
								
								?>
							</div>
						<?php
							}
						break;
						
						case 'bottom-meta':
						?>
							<footer class="entry-footer">
								<div class="entry-meta bottom-meta clearfix">
									<?php $this->lendiz_post_meta('bottommeta'); ?>
								</div>
							</footer>
						<?php
						break;
						
						
					} // switch					
				} //foreach ?>
				<?php if( $layout == 'list-layout' ): ?>
					</div><!-- post-list-right-part -->
				<?php endif; ?>
			</div>
		<?php
		endif;
	}
	
	function lendiz_wp_bootstrap_pagination( $args = array(), $max = '', $print = true ) {

		$defaults = array(
			'range'           => 4,
			'custom_query'    => false,
			'first_string' => '',
			'previous_string' => '<i class="ti-angle-left"></i>',
			'next_string'     => '<i class="ti-angle-right"></i>',
			'last_string'     => '',
			'before_output'   => '<div class="post-pagination-wrap"><ul class="nav pagination post-pagination justify-content-center test-pagination">',
			'after_output'    => '</ul></div>'
		);
		
		$args = wp_parse_args( 
			$args, 
			apply_filters( 'lendiz_wp_bootstrap_pagination_defaults', $defaults )
		);
		
		$args['range'] = (int) $args['range'] - 1;
		if ( !$args['custom_query'] ){
			$args['custom_query'] = $GLOBALS['wp_query'];
		}
		$count = (int) $args['custom_query']->max_num_pages;
		$count = absint( $count ) ? absint( $count ) : (int) $max;
		$page  = intval( get_query_var( 'paged' ) );
		$ceil  = ceil( $args['range'] / 2 );
		
		if ( $count <= 1 )
			return FALSE;
		
		if ( !$page )
			$page = 1;
		
		if ( $count > $args['range'] ) {
			if ( $page <= $args['range'] ) {
				$min = 1;
				$max = $args['range'] + 1;
			} elseif ( $page >= ($count - $ceil) ) {
				$min = $count - $args['range'];
				$max = $count;
			} elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
				$min = $page - $ceil;
				$max = $page + $ceil;
			}
		} else {
			$min = 1;
			$max = $count;
		}
		
		$echo = '';
		$previous = intval($page) - 1;
		$previous = esc_attr( get_pagenum_link($previous) );
		
		// For theme check
		$t_next_post_link = get_next_posts_link();
		$t_prev_post_link = get_previous_posts_link();
		
		$firstpage = esc_attr( get_pagenum_link(1) );
		if ( $firstpage && (1 != $page) && isset( $args['first_string'] ) && $args['first_string'] != '' )
			$echo .= '<li class="nav-item previous"><a href="' . $firstpage . '" title="' . esc_attr__( 'First', 'lendiz') . '">' . $args['first_string'] . '</a></li>';
		if ( $previous && (1 != $page) )
			$echo .= '<li class="nav-item"><a href="' . $previous . '" class="prev-page" title="' . esc_attr__( 'previous', 'lendiz') . '">' . $args['previous_string'] . '</a></li>';
		
		if ( !empty($min) && !empty($max) ) {
			for( $i = $min; $i <= $max; $i++ ) {
				if ($page == $i) {
					$echo .= '<li class="nav-item active"><span class="active">' . $i . '</span></li>';
				} else {
					$echo .= sprintf( '<li class="nav-item"><a href="%s">%2d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
				}
			}
		}
		
		$next = intval($page) + 1;
		$next = esc_attr( get_pagenum_link($next) );
		if ($next && ($count != $page) )
			$echo .= '<li class="nav-item"><a href="' . $next . '" class="next-page" title="' . esc_attr__( 'next', 'lendiz') . '">' . $args['next_string'] . '</a></li>';
		
		$lastpage = esc_attr( get_pagenum_link($count) );
		if ( $lastpage && isset( $args['last_string'] ) && $args['last_string'] != '' ) {
			$echo .= '<li class="nav-item next"><a href="' . $lastpage . '" title="' . esc_attr__( 'Last', 'lendiz') . '">' . $args['last_string'] . '</a></li>';
		}
		if ( isset($echo) && $print ){
			echo ( ''. $args['before_output'] . $echo . $args['after_output'] );
		}else{
			return $args['before_output'] . $echo . $args['after_output'];
		}
	}
	
}
class LendizFooterElements extends LendizThemeOpt {
	
	private $lendiz_options;
	
	function __construct() {
		$this->lendiz_options = parent::$lendiz_mod;
    }
	
	function lendiz_footer_layout(){
		
		$footer_class = '';
		if( lendiz_po_exists() ){
			if( $this->lendiz_check_meta_value( 'lendiz_page_hidden_footer', 'hidden-footer' ) == 1 )
				$footer_class .= ' footer-fixed';
			
			if( $this->lendiz_check_meta_value( 'lendiz_page_footer_layout', 'footer-layout' ) == 'boxed' )
				$footer_class .= ' boxed-container';
		}elseif( is_singular( 'post' ) ){
			if( $this->lendiz_check_meta_value( 'lendiz_post_hidden_footer', 'hidden-footer' ) == 1 )
				$footer_class .= ' footer-fixed';
			
			if( $this->lendiz_check_meta_value( 'lendiz_post_footer_layout', 'footer-layout' ) == 'boxed' )
				$footer_class .= ' boxed-container';
		}else{
			if( self::lendiz_static_theme_mod('hidden-footer') == 1 )
				$footer_class .= ' footer-fixed';
			
			if( self::lendiz_static_theme_mod('footer-layout') == 'boxed' )
				$footer_class .= ' boxed-container';
		}
		return $footer_class;
	}
	
	function lendiz_footer_top_elements(){
	
		$boxed = self::lendiz_static_theme_mod('footer-top-container');
		$container = $boxed == 'boxed' ? ' boxed-container' : '';
	
	?>
		<div class="footer-top-wrap<?php echo esc_attr( $container ); ?>">
			<div class="container">
				<div class="row">	
	<?php
		$layout = ''; $page_opt_stat = 0;
		if( lendiz_po_exists() ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_footer_top_layout_opt', true );
			if( $post_items_opt == 'custom' ){
				$page_opt_stat = 1;
				$layout = $this->lendiz_check_meta_value( 'lendiz_page_footer_top_layout', 'footer-top-layout' );
			}else{
				$layout = self::lendiz_static_theme_mod('footer-top-layout');
			}
		}elseif( is_singular( 'post' ) ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_footer_top_layout_opt', true );
			if( $post_items_opt == 'custom' ){
				$page_opt_stat = 1;
				$layout = $this->lendiz_check_meta_value( 'lendiz_post_footer_top_layout', 'footer-top-layout' );
			}else{
				$layout = self::lendiz_static_theme_mod('footer-top-layout');
			}
		}else{
			$layout = self::lendiz_static_theme_mod('footer-top-layout');
		}
		$cols = preg_split("/[\s-]+/", $layout);
		$i = 1;
		foreach( $cols as $col ){
			
			$sidebar = '';
			if( $page_opt_stat ){
				if( lendiz_po_exists() ){
					$sidebar = $this->lendiz_check_meta_value( 'lendiz_page_footer_top_sidebar_'.$i, 'footer-top-sidebar-'.$i );
				}elseif( is_singular( 'post' ) ){
					$sidebar = $this->lendiz_check_meta_value( 'lendiz_post_footer_top_sidebar_'.$i, 'footer-top-sidebar-'.$i );
				}else{
					$sidebar = self::lendiz_static_theme_mod('footer-top-sidebar-'.$i);
				}
				$i++;
			}else{
				$sidebar = self::lendiz_static_theme_mod('footer-top-sidebar-'.$i++);
			}
			
			if ( is_active_sidebar( $sidebar ) ) : ?>
			<div class="col-lg-<?php echo absint( $col ); ?>">
				<div class="footer-top-sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</div>
			</div>
			<?php endif; ?>
		<?php } ?>
				</div>
			</div>
		</div>
	<?php
	}
	
	function lendiz_footer_middle_elements(){
	
		$boxed = self::lendiz_static_theme_mod('footer-middle-container');
		$container = $boxed == 'boxed' ? ' boxed-container' : '';
		ob_start();
	
		$layout = ''; $page_opt_stat = 0;
		if( lendiz_po_exists() ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_footer_middle_layout_opt', true );
			if( $post_items_opt == 'custom' ){
				$page_opt_stat = 1;
				$layout = $this->lendiz_check_meta_value( 'lendiz_page_footer_middle_layout', 'footer-middle-layout' );
			}else{
				$layout = self::lendiz_static_theme_mod('footer-middle-layout');
			}
		}elseif( is_singular( 'post' ) ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_footer_middle_layout_opt', true );
			if( $post_items_opt == 'custom' ){
				$page_opt_stat = 1;
				$layout = $this->lendiz_check_meta_value( 'lendiz_post_footer_middle_layout', 'footer-middle-layout' );
			}else{
				$layout = self::lendiz_static_theme_mod('footer-middle-layout');
			}
		}else{
			$layout = self::lendiz_static_theme_mod('footer-middle-layout');
		}
		$cols = preg_split("/[\s-]+/", $layout);
		$i = 1;
		foreach( $cols as $col ){
			
			$sidebar = '';
			if( $page_opt_stat ){
				if( lendiz_po_exists() ){
					$sidebar = $this->lendiz_check_meta_value( 'lendiz_page_footer_middle_sidebar_'.$i, 'footer-middle-sidebar-'.$i );
				}elseif( is_singular( 'post' ) ){
					$sidebar = $this->lendiz_check_meta_value( 'lendiz_post_footer_middle_sidebar_'.$i, 'footer-middle-sidebar-'.$i );
				}else{
					$sidebar = self::lendiz_static_theme_mod('footer-middle-sidebar-'.$i);
				}
				$i++;
			}else{
				$sidebar = self::lendiz_static_theme_mod('footer-middle-sidebar-'.$i++);
			}
						
			if ( is_active_sidebar( $sidebar ) ) : ?>
			<div class="col-lg-<?php echo absint( $col ); ?>">
				<div class="footer-middle-sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</div>
			</div>
			<?php endif; ?>
		<?php } 
		$footer_mid_out = ob_get_clean();
		$footer_mid_out = trim( $footer_mid_out );
		if( !empty( $footer_mid_out ) ):
		?>
			<div class="footer-middle-wrap<?php echo esc_attr( $container ); ?>">
				<div class="container">
					<div class="row">	
						<?php echo ( ''. $footer_mid_out ); ?>
					</div>
				</div>
			</div>
	<?php
		endif;
	}
	
	function lendiz_footer_bottom_elements( $key ){
		switch( $key ) {
			
			case 'social':
				echo ( ''. $this->lendiz_social('footer-bottom-social', true) ); 
			break;
			
			case 'copyright':
				$copy_right_text = self::lendiz_static_theme_mod('copyright-text');
				echo '<div class="copyright-text-wrap">'. do_shortcode( stripslashes( $copy_right_text ) ) .'</div>';
			break;
		
			case 'menu':
				echo ( ''. $this->lendiz_wp_menu('footer-menu', 'footer-menu') );
			break;
			
			case 'widget':
				$footer_bottom_widget = '';
				if( lendiz_po_exists() ){
					$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_footer_bottom_widget_opt', true );
					if( $post_items_opt == 'custom' ){
						$footer_bottom_widget = get_post_meta( get_the_ID(), 'lendiz_page_footer_bottom_widget', true );
					}else{
						$footer_bottom_widget = self::lendiz_static_theme_mod('footer-bottom-widget');
					}
				}elseif( is_singular( 'post' ) ){
					$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_footer_bottom_widget_opt', true );
					if( $post_items_opt == 'custom' ){
						$footer_bottom_widget = get_post_meta( get_the_ID(), 'lendiz_post_footer_bottom_widget', true );
					}else{
						$footer_bottom_widget = self::lendiz_static_theme_mod('footer-bottom-widget');
					}
				}else{
					$footer_bottom_widget = self::lendiz_static_theme_mod('footer-bottom-widget');
				}
				echo ( ''. $this->lendiz_widget( $footer_bottom_widget, 'footer-bottom-widget' ) );
			break;
		}
	}
	
	function lendiz_footer_bottom_parts(){
		
		$fb_parts = array( 'Left' => 'pull-left', 'Center' => 'pull-center', 'Right' => 'pull-right' );
		
		$fixed_class = '';
		if( lendiz_po_exists() ){
			if( $this->lendiz_check_meta_value( 'lendiz_page_footer_bottom_fixed', 'footer-bottom-fixed' ) ){
				$fixed_class = ' footer-bottom-fixed';
			}
		}elseif( is_singular( 'post' ) ){
			if( $this->lendiz_check_meta_value( 'lendiz_post_footer_bottom_fixed', 'footer-bottom-fixed' ) ){
				$fixed_class = ' footer-bottom-fixed';
			}
		}else{
			$fixed_class = self::lendiz_static_theme_mod('footer-bottom-fixed') ? ' footer-bottom-fixed' : '';
		}
		
		
		$boxed = self::lendiz_static_theme_mod('footer-bottom-container');
		$fixed_class .= $boxed == 'boxed' ? ' boxed-container' : '';
		
	?>
		<div class="footer-bottom<?php echo esc_attr( $fixed_class ); ?>">
			<div class="footer-bottom-inner container">
				<div class="row">
					<div class="col-md-12">
	<?php
	
		foreach( $fb_parts as $part => $class ){
			
			$fb_elements = '';
			if( lendiz_po_exists() ){
				$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_footer_bottom_items_opt', true );
				if( $post_items_opt == 'custom' ){
					$fb_elements_json = get_post_meta( get_the_ID(), 'lendiz_page_footer_bottom_items', true );
					$fb_elements = json_decode( stripslashes( $fb_elements_json ), true );
				}
			}elseif( is_singular( 'post' ) ){
				$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_footer_bottom_items_opt', true );
				if( $post_items_opt == 'custom' ){
					$fb_elements_json = get_post_meta( get_the_ID(), 'lendiz_post_footer_bottom_items', true );
					$fb_elements = json_decode( stripslashes( $fb_elements_json ), true );
				}
			}
			
			if( empty( $fb_elements ) ){
				$fb_elements = LendizThemeOpt::lendiz_static_theme_mod('footer-bottom-items');
			}
			if( isset( $fb_elements[$part] ) && !empty( $fb_elements[$part] ) ): 
			
				$fb_elements = $fb_elements[$part];
			
			?>
				<ul class="footer-bottom-items nav <?php echo esc_attr( $class ); ?>">
			<?php foreach ($fb_elements as $element => $value ) {?>
					<li class="nav-item">
						<div class="nav-item-inner">
					<?php $this->lendiz_footer_bottom_elements($element); ?>
						</div>
					</li>
			<?php }	?>
				</ul>
			<?php
			endif;
		}
	?>				
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	
	function lendiz_footer_elements_switch($key){
		switch( $key ) {
			
			case 'footer-top':
				$this->lendiz_footer_top_elements();
			break;
			
			case 'footer-middle':
				$this->lendiz_footer_middle_elements();
			break;
		
			case 'footer-bottom':
				$this->lendiz_footer_bottom_parts();
			break;
		}
	}
	
	function lendiz_footer_backto_top(){
		$back_to_top = self::lendiz_static_theme_mod('back-to-top');
		$position = self::lendiz_static_theme_mod('back-to-top-position');
		$cls = $position ? ' position-'. $position : '';
		if( $back_to_top == 1 ){ ?>
			<a href="#" class="back-to-top<?php echo esc_attr( $cls ); ?>" id="back-to-top"><i class="ti-angle-up"></i></a>
		<?php
		}
	}
	
	function lendiz_footer_elements(){ 
	
		$footer_elements = '';
		if( lendiz_po_exists() ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_page_footer_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$footer_elements_json = get_post_meta( get_the_ID(), 'lendiz_page_footer_items', true );
				$footer_elements = json_decode( stripslashes( $footer_elements_json ), true );
			}
		}elseif( is_singular( 'post' ) ){
			$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_footer_items_opt', true );
			if( $post_items_opt == 'custom' ){
				$footer_elements_json = get_post_meta( get_the_ID(), 'lendiz_post_footer_items', true );
				$footer_elements = json_decode( stripslashes( $footer_elements_json ), true );
			}
		}
		
		if( empty( $footer_elements ) ){
			$footer_elements = LendizThemeOpt::lendiz_static_theme_mod('footer-items');
		}	 	
		if( isset( $footer_elements['Enabled'] ) ): 
			$footer_elements = $footer_elements['Enabled'];
			foreach ($footer_elements as $element => $value ) {
				$this->lendiz_footer_elements_switch($element);
			}
		endif;
	}
}