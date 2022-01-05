<?php
/**
 * Custom Woo Function
 */

// define the woocommerce_show_page_title callback 
function lendiz_filter_woocommerce_show_page_title() { 
    // make filter magic happen here... 
	if( is_shop() ){
		return false;
	}
};
// add the filter 
add_filter( 'woocommerce_show_page_title', 'lendiz_filter_woocommerce_show_page_title', 10, 2 ); 

add_action('init', 'woocommerce_sort_by_columns_fun');
function woocommerce_sort_by_columns_fun() {
	if (isset($_POST['woocommerce-sort-by-columns'])) {
		setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600 );
	}
}	
 
add_action( 'after_setup_theme', 'lendiz_woocommerce_support' );
function lendiz_woocommerce_support() {
    add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
remove_action( 'woocommerce_before_main_content','woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content',  'lendiz_woocommerce_before_main_content', 10 );
function lendiz_woocommerce_before_main_content(){
	
	$woo_class = '';
	if( is_product() ){
		$woo_class = ' lendiz-single-product';
	}else{
		$woo_class = ' lendiz-woo';
	}
	
	echo '<div class="lendiz-content'. esc_attr( $woo_class ) .'">';	
	
	$custom_title = '';
	$page_id = '';
	$template_class = array();
	if( is_shop() ){
		ob_start();
		woocommerce_page_title();
		$custom_title = ob_get_clean();
		$custom_title = "Products";
		$page_id = get_option( 'woocommerce_shop_page_id' ); 
		
		$page_id = $page_id ? $page_id : get_the_ID();
	
		$template = 'woo';
		$aps = new LendizPostSettings;
		$aps->lendiz_set_post_template( $template );
		$template_class = $aps->lendiz_template_content_class( $page_id );
		$ahe = new LendizHeaderElements;
		$ahe->lendiz_page_title( $template, $custom_title );
		
	}elseif( is_product_category() || is_product_tag() ){
		$template = 'wooarchive';
		$aps = new LendizPostSettings;
		$aps->lendiz_set_post_template( $template );
		$template_class = $aps->lendiz_template_content_class();
		$ahe = new LendizHeaderElements;
		$ahe->lendiz_page_title( "woo", $custom_title );
	}elseif( is_product() ){
		$custom_title = get_the_title();
		$ahe = new LendizHeaderElements;
		$ahe->lendiz_page_title( "single-product", $custom_title );
	}
	
	if( isset( $template_class['content_class'] ) && $template_class['content_class'] != '' ){
		$content_class = str_replace("md", "lg", $template_class['content_class'] );
	}else{
		$content_class = 'col-lg-12';
	}
	
	echo '<div class="lendiz-content-inner">
			<div class="container">	
				<div class="row">
					<div class="'. esc_attr( $content_class ) .'">';
					
	if( is_shop() || is_product_category() || is_product_tag() ){
		echo '<div class="woo-top-meta">';
	}
}
add_action('woocommerce_after_main_content',  'lendiz_woocommerce_after_main_content', 10 );
function lendiz_woocommerce_after_main_content(){
	if( is_shop() || is_product_category() || is_product_tag() ){
		echo '</div><!-- .woo-top-meta -->';
	}
	$page_id = '';
	$template_class = array();
	if( is_shop() ){
		$page_id = get_option( 'woocommerce_shop_page_id' ); 
		
		$page_id = $page_id ? $page_id : get_the_ID();
	
		$template = 'woo';
		$aps = new LendizPostSettings;
		$aps->lendiz_set_post_template( $template );
		$template_class = $aps->lendiz_template_content_class( $page_id );
		
		$page_layout_opt = get_post_meta( $page_id, 'lendiz_page_template_opt', true );
		if( $page_layout_opt == 'custom' ){
			$template_class['left_sidebar'] = get_post_meta( $page_id, 'lendiz_page_left_sidebar', true );
			$template_class['right_sidebar'] = get_post_meta( $page_id, 'lendiz_page_right_sidebar', true );
		}
		
	}elseif( is_product_category() || is_product_tag() ){
		$template = 'wooarchive';
		$aps = new LendizPostSettings;
		$aps->lendiz_set_post_template( $template );
		$template_class = $aps->lendiz_template_content_class();
	}
	
				echo '</div><!-- main col -->';
				
				if( isset( $template_class['lsidebar_class'] ) && $template_class['lsidebar_class'] != '' ) : 
					$lsidebar_class = str_replace("md", "lg", $template_class['lsidebar_class'] );
				?>
				<div class="<?php echo esc_attr( $lsidebar_class ); ?>">
					<aside class="widget-area left-widget-area<?php echo esc_attr( $template_class['sticky_class'] ); ?>">
						<?php dynamic_sidebar( $template_class['left_sidebar'] ); ?>
					</aside>
				</div><!-- sidebar col -->
				<?php endif; ?>
				
				<?php if( isset( $template_class['rsidebar_class'] ) && $template_class['rsidebar_class'] != '' ) : 
					$rsidebar_class = str_replace("md", "lg", $template_class['rsidebar_class'] );
				?>
				<div class="<?php echo esc_attr( $rsidebar_class ); ?>">
					<aside class="widget-area right-widget-area<?php echo esc_attr( $template_class['sticky_class'] ); ?>">
						<?php dynamic_sidebar( $template_class['right_sidebar'] ); ?>
					</aside>
				</div><!-- sidebar col -->
				<?php endif;
			
			echo '</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .lendiz-content-inner -->
	</div><!-- .lendiz-content -->';
}
add_action('woocommerce_before_shop_loop_item_title',  'lendiz_woocommerce_before_shop_loop_item_title_start', 5 );
function lendiz_woocommerce_before_shop_loop_item_title_start(){
 echo '<div class="woo-thumb-wrap">';
}

add_action('woocommerce_before_shop_loop_item_title',  'lendiz_woocommerce_before_shop_loop_item_title_end', 20 );
function lendiz_woocommerce_before_shop_loop_item_title_end(){
 echo '</div><!-- .woo-thumb-wrap -->';
}
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
add_action( 'woocommerce_before_shop_loop_item', 'lendiz_woocommerce_template_loop_product_link_open', 10 );
function lendiz_woocommerce_template_loop_product_link_open(){
	echo '<div class="loop-product-wrap">';
}
add_action( 'woocommerce_after_shop_loop_item', 'lendiz_woocommerce_template_loop_product_link_close', 5 );
function lendiz_woocommerce_template_loop_product_link_close(){
 echo '</div><!-- .loop-product-wrap -->';
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'lendiz_woocommerce_before_shop_loop_icons', 10 );
function lendiz_woocommerce_before_shop_loop_icons(){
	global $product;
	$id = $product->get_id();	
	echo '<div class="product-icons-pack">';
}

add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 15 );
add_action( 'woocommerce_loop_add_to_cart_link', 'lendiz_woocommerce_loop_add_to_cart_link', 10, 3 );
function lendiz_woocommerce_loop_add_to_cart_link( $string, $product, $args ){
	return apply_filters( 'lendiz_woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
		sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s %s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? 'lendiz_ajax_add_to_cart' : '' ), //str_replace( "button", "", $args['class'] ) //add_to_cart_button ajax_add_to_cart
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html__( 'Add to Cart', 'lendiz' ),
			'<span class="ti-shopping-cart"></span>'
		),
	$product, $args );
}

add_filter( 'woocommerce_before_shop_loop_item_title', 'lendiz_woocommerce_after_shop_loop_icons', 20 );
function lendiz_woocommerce_after_shop_loop_icons(){
	echo '</div><!-- .product-icons-pack -->';
}

function lendiz_woo_set_columns($columns){
	$woo_col = 4;
	if ( is_product_category() || is_product_tag() ) {
		$woo_col = LendizThemeOpt::lendiz_static_theme_mod('woo-shop-archive-columns');
	}else {
		$woo_col = LendizThemeOpt::lendiz_static_theme_mod('woo-shop-columns');
	}
	return $woo_col;
}
add_filter('loop_shop_columns','lendiz_woo_set_columns');
add_filter( 'woocommerce_output_related_products_args', 'lendiz_related_products_args' );
  function lendiz_related_products_args( $args ) {
	$related_ppp = LendizThemeOpt::lendiz_static_theme_mod('woo-related-ppp');
	$related_ppp = $related_ppp ? $related_ppp : 4;
	$args['posts_per_page'] = $related_ppp;
	$args['columns'] = 1;//$related_count; // arranged in 4 columns
	return $args;
}
function lendiz_woocommerce_catalog_page_ordering() {
	$def_count = '';
	if (isset($_POST['woocommerce-sort-by-columns'])) {
		$count = $_POST['woocommerce-sort-by-columns'];	
	}elseif (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
		$count = $_COOKIE['shop_pageResults'];
	}else{
		$shop_ppp = LendizThemeOpt::lendiz_static_theme_mod('woo-shop-ppp');
		$count = $def_count = $shop_ppp ? $shop_ppp : 9;
	}?>
	
	<form action="" method="POST" name="results">
		<select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit ()">
			<?php
				$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
					$def_count       => esc_html__('Default', 'lendiz'),
					'6'    => esc_html__('6 per page', 'lendiz'),
					'12'    => esc_html__('12 per page', 'lendiz'),
					'24'        => esc_html__('24 per page', 'lendiz'),
					'36'        => esc_html__('36 per page', 'lendiz'),
					'48'        => esc_html__('48 per page', 'lendiz'),
					'64'        => esc_html__('64 per page', 'lendiz'),
				));
				
				foreach ( $shopCatalog_orderby as $sort_id => $sort_name ){
					echo '<option value="' . $sort_id . '" ' . ( $count == $sort_id ? 'selected="selected"' : '' ) . ' >' . $sort_name . '</option>';
				}
			?>
		</select>
	</form>
<?php
} 
// now we set our cookie if we need to
function lendiz_loop_shop_per_page( $count ) {
	if (isset($_POST['woocommerce-sort-by-columns'])) {
			$count = $_POST['woocommerce-sort-by-columns'];	
	}elseif (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
		$count = $_COOKIE['shop_pageResults'];
	}else{
		$shop_ppp = LendizThemeOpt::lendiz_static_theme_mod('woo-shop-ppp');
		$count = $shop_ppp ? $shop_ppp : 9;
	}
  // else normal page load and no cookie
  return $count;
}
add_filter('loop_shop_per_page','lendiz_loop_shop_per_page');
add_action( 'woocommerce_before_shop_loop', 'lendiz_woocommerce_catalog_page_ordering', 20 );
function lendiz_woocommerce_product_meta_end(){
	$aps = new LendizPostSettings;
}
add_action( 'woocommerce_product_meta_end', 'lendiz_woocommerce_product_meta_end', 10 );
/**
 * Add Cart icon and count to header if WC is active
 */
function lendiz_cart_items(){
	$empty_cart = '<li class="cart-item"><p class="text-center no-cart-items">'. apply_filters( 'lendiz_woo_mini_cart_empty', esc_html__('No items in cart', 'lendiz') ) .'</p></li>';
	if ( WC()->cart->get_cart_contents_count() == 0 ) return $empty_cart;
	ob_start();
	
	$shop_page_url = get_permalink( wc_get_page_id( 'cart' ) );
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	?>
		<li class="cart-item">
		<?php
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
		?>
			<div class="product-thumbnail">
				<?php
					$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					if ( ! $product_permalink ) {
						echo ( ''. $thumbnail );
					} else {
						printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
					}
				?>
			</div>
			<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'lendiz' ); ?>">
				<?php echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key ); ?>
				<p>
					<span><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?> &#9747; <?php echo esc_attr( $cart_item['quantity'] ); ?></span>
				</p>
			</div>
			<div class="product-remove">
				<?php
					echo 
					sprintf(
						'<a href="%s" class="remove-cart-item" title="%s" data-product_id="%s" data-product_sku="%s"><i class="ti-trash"></i></a>',
						esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
						__( 'Remove this item', 'lendiz' ),
						esc_attr( $product_id ),
						esc_attr( $_product->get_sku() )
					);
				?>
			</div>
		<?php
			}//if
		?>
		</li>
		<?php
		}//foreach
	?>
	<li class="text-center mini-view-cart"><a href="<?php echo esc_url( $shop_page_url ); ?>" title="<?php esc_attr_e('Cart', 'lendiz'); ?>"><?php esc_html_e('View Cart', 'lendiz'); ?></a></li>
	<?php 
	$out = ob_get_clean();
	return $out;
}
function lendiz_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
        $count = WC()->cart->cart_contents_count;
		$cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
        ?>
		<a class="cart-contents" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'lendiz' ); ?>"><i class="ti-shopping-cart"></i> <?php if ( $count > 0 ) echo '<span class="cart-count">' . esc_html( $count ) . '</span>'; ?></a>
		<ul class="dropdown-menu cart-dropdown-menu">
		<?php
			echo ( lendiz_cart_items() );
		?>
		</ul>
		<?php
    }
 
}
add_action( 'lendiz_woo_cart_icon', 'lendiz_wc_cart_count' ); 

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function lendiz_header_add_to_cart_fragment( $fragments ) {
    $mini_cart = $sticky_cart = $cart_count = '';
	$count = WC()->cart->cart_contents_count;
	$cart_url = wc_get_cart_url();
	$cart_items = Lendiz_Woo_Ajax_Functions::lendiz_cart_items();
	
	$current_user = wp_get_current_user();
	$current_user_id = $current_user->ID;
	$fav_ids = get_user_meta( $current_user_id, 'lendiz_user_favourite_products', true );
	$w_count = !empty( $fav_ids ) && is_array( $fav_ids ) ? count( $fav_ids ) : 0;
	
	$cart_count .= '<span class="woo-icon-count lendiz-cart-items-count">'. esc_html( $count ) .'</span>';	
	$wishlist_count = '<span class="woo-icon-count lendiz-wishlist-items-count">'. esc_html( $w_count ) .'</span>';
	
	//Mini Cart 
	$mini_cart .= '<ul class="dropdown-menu cart-dropdown-menu">';
		$mini_cart .= $cart_items;
	$mini_cart .= '</ul>';
	
	//Sticky Cart 
	$sticky_cart .= '<ul class="lendiz-sticky-cart">';
		$sticky_cart .= $cart_items;
	$sticky_cart .= '</ul>';
	
	$fragments['ul.cart-dropdown-menu'] = $mini_cart;
	$fragments['ul.lendiz-sticky-cart'] = $sticky_cart;
	$fragments['span.lendiz-cart-items-count'] = $cart_count;
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'lendiz_header_add_to_cart_fragment' );

function lendiz_wc_cart_ajax() {
 	$output = '';
 
	$count = WC()->cart->cart_contents_count;
	$cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
	ob_start();
	?>
	<a class="cart-contents" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'lendiz' ); ?>"><i class="ti-shopping-cart"></i> <?php if ( $count > 0 ) echo '<span class="cart-count">' . esc_html( $count ) . '</span>'; ?></a>
	<ul class="dropdown-menu cart-dropdown-menu">
	<?php
		echo ( lendiz_cart_items() );
	?>
	</ul>
	<?php
	$output = ob_get_clean();

	return  $output;
}

class Lendiz_Woo_Ajax_Functions {
	
	public static function lendiz_cart_items(){
		
		global $wpdb, $woocommerce;
		$empty_cart = '<li class="cart-item"><p class="text-center no-cart-items">'. apply_filters( 'lendiz_woo_mini_cart_empty', esc_html__('No items in cart', 'lendiz') ) .'</p></li>';
		if ( WC()->cart->get_cart_contents_count() == 0 ) return $empty_cart;
		
		ob_start();
		
		$shop_page_url = get_permalink( wc_get_page_id( 'cart' ) );
		
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		?>
			<li class="cart-item" data-product-id="<?php echo esc_attr( $cart_item['product_id'] ); ?>">
			<?php
				$_product   = apply_filters( 'lendiz_woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'lendiz_woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'lendiz_woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'lendiz_woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
				<div class="product-thumbnail">
					<?php
						$thumbnail = apply_filters( 'lendiz_woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
						if ( ! $product_permalink ) {
							echo ( ''. $thumbnail );
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
						}
					?>
				</div>
				<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'lendiz' ); ?>">
					<?php echo apply_filters( 'lendiz_woocommerce_cart_item_name', sprintf( '<a href="%s" title="%s">%s</a>', esc_url( $product_permalink ), esc_attr( $_product->get_title() ), $_product->get_title() ), $cart_item, $cart_item_key ); ?>
					<p>
						<span><?php echo apply_filters( 'lendiz_woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?> &#9747; <?php echo esc_attr( $cart_item['quantity'] ); ?></span>
					</p>
				</div>
				<div class="product-remove">
					<?php
						echo 
						sprintf(
							'<a href="%s" class="remove-cart-item" title="%s" data-product_id="%s" data-product_sku="%s"><i class="ti-trash"></i></a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							__( 'Remove this item', 'lendiz' ),
							esc_attr( $product_id ),
							esc_attr( $_product->get_sku() )
						);
					?>
				</div>
			<?php
				}//if
			?>
			</li>
			<?php
			}//foreach
		?>
		<li class="text-center mini-view-cart"><a href="<?php echo esc_url( $shop_page_url ); ?>" title="<?php esc_attr_e('Cart', 'lendiz'); ?>"><?php esc_html_e('View Cart', 'lendiz'); ?></a></li>
		<?php 
		$output = ob_get_clean();
		return $output;
		
	}
	
	/**
	 * AJAX add to cart.
	 */
	public static function lendiz_add_to_mini_cart() {
		
		$nonce = $_POST['nonce'];  
		if ( ! wp_verify_nonce( $nonce, 'lendiz-add-to-cart(*$#' ) ) wp_die( esc_html__( 'Busted', 'lendiz' ) );
		
		if ( ! isset( $_POST['product_id'] ) ) wp_die();

		$product_id        = apply_filters( 'lendiz_woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
		$product           = wc_get_product( $product_id );
		$quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( wp_unslash( $_POST['quantity'] ) );
		$passed_validation = apply_filters( 'lendiz_woocommerce_add_to_cart_validation', true, $product_id, $quantity );
		$product_status    = get_post_status( $product_id );
		$variation_id      = 0;
		$variation         = array();

		if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation ) && 'publish' === $product_status ) {
			
			$data = array();
			$data["status"] = 1;
			$data["mini_cart"] = self::lendiz_cart_items();
			$data["cart_count"] = WC()->cart->cart_contents_count;
			
			wp_send_json( $data );

		} else {

			// If there was an error adding to the cart, redirect to the product page to show any errors.
			$data = array(
				'error'       => true,
				'product_url' => apply_filters( 'lendiz_woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
			);

			wp_send_json( $data );
		}
		
		wp_die();
	}
	
	public static function lendiz_mini_cart_product_remove() {
		
		global $wpdb, $woocommerce;
		session_start();
		
		$nonce = $_POST['nonce'];  
			if ( ! wp_verify_nonce( $nonce, 'lendiz-remove-from-cart(*$#' ) ) wp_die( esc_html__( 'Busted', 'lendiz' ) );
			
		$product_id = '';
		if( isset( $_POST['product_id'] ) && !empty( $_POST['product_id'] ) ) $product_id = $_POST['product_id'];
		
		if( $product_id ){
			foreach( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ){
				if( $cart_item['product_id'] == $_POST['product_id'] ){
					$woocommerce->cart->remove_cart_item($cart_item_key);
				}
			}
		}
		
		$result = array();
		$result["status"] = 1;
		$result["mini_cart"] = self::lendiz_cart_items();
		$result["cart_count"] = WC()->cart->cart_contents_count;
		
		echo json_encode( $result );
		
		wp_die();
	}

}

//Add to Cart
add_action( 'wp_ajax_lendiz_add_to_cart', array( 'Lendiz_Woo_Ajax_Functions', 'lendiz_add_to_mini_cart' ) );
add_action( 'wp_ajax_nopriv_lendiz_add_to_cart', array( 'Lendiz_Woo_Ajax_Functions', 'lendiz_add_to_mini_cart' ) );

//Remove Product from Mini Cart
add_action( 'wp_ajax_lendiz_product_remove', array( 'Lendiz_Woo_Ajax_Functions', 'lendiz_mini_cart_product_remove' ) );
add_action( 'wp_ajax_nopriv_lendiz_product_remove', array( 'Lendiz_Woo_Ajax_Functions', 'lendiz_mini_cart_product_remove' ) );