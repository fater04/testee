<?php
/*
 * Custom Post Types Class
 */
class LendizCPT{ 

	public $cpts;
	public $cpt_slug;
	public $cpt_category_slug;
	public $cpt_tag_slug;
	
	public $cpt_array;
	
	function __construct(){
		$lendiz_cpts = LendizFamework::lendiz_static_theme_mod( 'cpt-opts' );
		
		$this->cpts = $lendiz_cpts;
		$this->cpt_array =  array( 'portfolio' => esc_html( 'Portfolio', 'lendiz-core' ), 'team' => esc_html( 'Team', 'lendiz-core' ), 'testimonial' => esc_html( 'Testimonial', 'lendiz-core' ), 'events' => esc_html( 'Events', 'lendiz-core' ), 'services' => esc_html( 'Services', 'lendiz-core' ) );
	}
	
	public function lendizCPTUniqueKey(){
		static $cpt_video_key = 1;
		return $cpt_video_key++;
	}
	
	public function lendiz_cpt_register( $cpt, $cpt_slug ){
		
		$cpt_labels = $this->lendiz_cpt_labels( $cpt );
		$cpt_theme_slug = LendizFamework::lendiz_static_theme_mod( 'cpt-'. $cpt_slug .'-slug' );
		//$has_arch = $cpt_slug == 'portfolio' ? true : false;
		$cpt_args = array(
			'labels' 				=> $cpt_labels,
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'show_ui' 				=> true,
			'show_in_menu'       	=> true,
			'query_var' 			=> true,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => $cpt_theme_slug ),
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'has_archive' 			=> true,
			'exclude_from_search' 	=> true,
			'supports' 				=> array( 'title', 'thumbnail', 'excerpt', 'editor' )
		);
		
		return $cpt_args;
	}
	
	public function lendiz_cpt_category_register( $cpt, $cpt_slug ){
		$cpt_labels = $this->lendiz_cpt_category_labels( $cpt );
		$cpt_theme_cat_slug = LendizFamework::lendiz_static_theme_mod( 'cpt-'. $cpt_slug .'-category-slug' );
		
		$cpt_category_args = array(
			'hierarchical'      	=> true,
			'labels'            	=> $cpt_labels,
			'show_ui'           	=> true,
			'show_admin_column' 	=> true,
			'show_in_nav_menus' 	=> true,
			'query_var'         	=> true,
			'rewrite'           	=> array( 'with_front' => false, 'slug' => $cpt_theme_cat_slug ),
		);	
		
		return $cpt_category_args;	
	}
	
	public function lendiz_cpt_tag_register( $cpt, $cpt_slug ){
		
		$cpt_labels = $this->lendiz_cpt_tag_labels( $cpt );
		$cpt_theme_tag_slug = LendizFamework::lendiz_static_theme_mod( 'cpt-'. $cpt_slug .'-tag-slug' );
		
		$cpt_tag_args = array(
			'hierarchical'      	=> true,
			'labels'            	=> $cpt_labels,
			'show_ui'           	=> true,
			'show_admin_column' 	=> true,
			'show_in_nav_menus' 	=> true,
			'query_var'         	=> true,
			'rewrite'           	=> array( 'with_front' => false, 'slug' => $cpt_theme_tag_slug ),
		);	
		
		return $cpt_tag_args;
	}
	
	public function lendiz_cpt_labels( $cpt_name ){
		$cpt_labels = array(
			'name' 					=> sprintf( esc_html__( '%1$s', 'lendiz-core' ), $cpt_name ),
			'singular_name' 		=> sprintf( esc_html__( '%1$s', 'lendiz-core' ), $cpt_name ),
			'add_new' 				=> esc_html__( 'Add New', 'lendiz-core' ),
			'add_new_item' 			=> sprintf( esc_html__( 'Add New %1$s', 'lendiz-core' ), $cpt_name ),
			'edit_item' 			=> sprintf( esc_html__( 'Edit %1$s', 'lendiz-core' ), $cpt_name ),
			'new_item' 				=> sprintf( esc_html__( 'New %1$s', 'lendiz-core' ), $cpt_name ),
			'all_items' 			=> sprintf( esc_html__( '%1$s', 'lendiz-core' ), $cpt_name ),
			'view_item' 			=> sprintf( esc_html__( 'View %1$s', 'lendiz-core' ), $cpt_name ),
			'search_items' 			=> sprintf( esc_html__( 'Search %1$s', 'lendiz-core' ), $cpt_name ),
			'not_found' 			=> sprintf( esc_html__( 'No %1$s found', 'lendiz-core' ), $cpt_name ),
			'not_found_in_trash' 	=> sprintf( esc_html__( 'No %1$s found in Trash', 'lendiz-core' ), $cpt_name ),
			'parent_item_colon' 	=> ''
		);
		
		return $cpt_labels;
	}
	
	public function lendiz_cpt_category_labels( $cpt_name ){
		$cpt_category_labels = array(
			'name'              	=> sprintf( esc_html__( '%1$s Categories', 'lendiz-core' ), $cpt_name ),
			'singular_name'     	=> esc_html__( 'Category', 'lendiz-core' ),
			'search_items'      	=> esc_html__( 'Search Categories', 'lendiz-core' ),
			'all_items'         	=> esc_html__( 'All Categories', 'lendiz-core' ),
			'parent_item'       	=> esc_html__( 'Parent Category', 'lendiz-core' ),
			'parent_item_colon' 	=> esc_html__( 'Parent Category:', 'lendiz-core' ),
			'edit_item'         	=> esc_html__( 'Edit Category', 'lendiz-core' ),
			'update_item'       	=> esc_html__( 'Update Category', 'lendiz-core' ),
			'add_new_item'      	=> esc_html__( 'Add New Category', 'lendiz-core' ),
			'new_item_name'     	=> esc_html__( 'New Category Name', 'lendiz-core' ),
			'menu_name'         	=> esc_html__( 'Categories', 'lendiz-core' ),
		);
		return $cpt_category_labels;
	}
	
	public function lendiz_cpt_tag_labels( $cpt_name ){
		$cpt_tags_labels = array(
			'name'              	=> sprintf( esc_html__( '%1$s Tags', 'lendiz-core' ), $cpt_name ),
			'singular_name'     	=> esc_html__( 'Tag', 'lendiz-core' ),
			'search_items'      	=> esc_html__( 'Search Tags', 'lendiz-core' ),
			'all_items'         	=> esc_html__( 'All Tags', 'lendiz-core' ),
			'parent_item'       	=> esc_html__( 'Parent Tag', 'lendiz-core' ),
			'parent_item_colon' 	=> esc_html__( 'Parent Tag:', 'lendiz-core' ),
			'edit_item'         	=> esc_html__( 'Edit Tag', 'lendiz-core' ),
			'update_item'       	=> esc_html__( 'Update Tag', 'lendiz-core' ),
			'add_new_item'      	=> esc_html__( 'Add New Tag', 'lendiz-core' ),
			'new_item_name'     	=> esc_html__( 'New Tag Name', 'lendiz-core' ),
			'menu_name'         	=> esc_html__( 'Tags', 'lendiz-core' ),
		);
		
		return $cpt_tags_labels;
	}
	
	function lendiz_cpt_call_template( $template ){
		include LENDIZ_CORE_DIR . 'cpt-templates/' . $template . '.php';
	}
	
	function lendiz_cpt_call_tax_template( $template ){
		include LENDIZ_CORE_DIR . 'cpt-templates/' . $template . '.php';
	}	
}
function lendiz_cpt_ready_register(){
	$lendiz_cpt = new LendizCPT();
	$cpt_opts = $lendiz_cpt->cpts;
	$cpt_all = $lendiz_cpt->cpt_array;
	$cat_needs = array( 'portfolio', 'team' );
	$tag_needs = array( 'portfolio' );
	if( !empty( $cpt_opts ) ){
		foreach( $cpt_opts as $cpt ){
			
			if( !isset( $cpt_all[$cpt] ) ) continue;
			
			// CPT Register
			$cpt_args = $lendiz_cpt->lendiz_cpt_register( $cpt_all[$cpt], $cpt );
			if( ! post_type_exists('lendiz-'.$cpt) ) {
				register_post_type( 'lendiz-'.$cpt, $cpt_args );
			}
			
			if( in_array( $cpt, $cat_needs ) ){
				// CPT Category Register
				$cpt_category_args = $lendiz_cpt->lendiz_cpt_category_register( $cpt_all[$cpt], $cpt );
				if( ! taxonomy_exists( $cpt.'-categories' ) ) {
					register_taxonomy( $cpt.'-categories', 'lendiz-'.$cpt, $cpt_category_args );
				}
			}
			if( in_array( $cpt, $tag_needs ) ){
				// CPT Tag Register
				$cpt_tag_args = $lendiz_cpt->lendiz_cpt_tag_register( $cpt_all[$cpt], $cpt );
				if( ! taxonomy_exists( $cpt.'-tags' ) ) {
					register_taxonomy( $cpt.'-tags', 'lendiz-'.$cpt, $cpt_tag_args );
				}
			} //  if tax needs
		}
	}// if !empty $cpt_opts 
}
add_action( 'init', 'lendiz_cpt_ready_register', 10 );

class LendizCPTElements extends LendizCPT{ 
	
	function lendiz_cpt_portfolio_layout(){
		$p_layout_opt = get_post_meta( get_the_ID(), 'lendiz_portfolio_layout_opt', true );
		$p_layout = '1';
		if( $p_layout_opt == 'custom' ){
			$p_layout = get_post_meta( get_the_ID(), 'lendiz_portfolio_layout', true );
		}else{
			$p_layout = LendizFamework::lendiz_static_theme_mod('portfolio-layout');
		}
		return $p_layout;
	}
	
	function lendiz_cpt_portfolio_format(){
		$format = get_post_meta( get_the_ID(), 'lendiz_portfolio_format', true );
		switch( $format ){
			case "video":
				$video_type = get_post_meta( get_the_ID(), 'lendiz_portfolio_video_type', true );
				$video_id = get_post_meta( get_the_ID(), 'lendiz_portfolio_video_id', true );
				$video_modal = get_post_meta( get_the_ID(), 'lendiz_portfolio_video_modal', true );
				$video_atts = array(
					'video_type'	=> $video_type,
					'video_id'		=> $video_id,
					'video_modal'	=> $video_modal
				);
				$this->lendiz_cpt_portfolio_video( $video_atts );
			break;
			
			case "audio":
				$this->lendiz_cpt_portfolio_audio();
			break;
			
			case "gallery":
				wp_enqueue_script( 'isotope' );
				wp_enqueue_script( 'infinite-scroll' );
				wp_enqueue_script( 'imagesloaded' );
				$this->lendiz_cpt_portfolio_gallery();
			break;
			
			case "gmap":
				wp_enqueue_script( 'lendiz-core-gmaps' );
				$this->lendiz_cpt_portfolio_gmap();
			break;
			
			case "standard":
			default:
				$this->lendiz_cpt_portfolio_standard();
			break;
			
		}
	}
	
	function lendiz_cpt_portfolio_standard(){
		if ( has_post_thumbnail() ) { ?>
			<div class="portfolio-image"><!-- for sticky column lendiz-sticky-obj -->
				<div class="zoom-gallery">
					<?php  $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
					<a href="<?php echo esc_url( $featured_img_url ); ?>" title="<?php esc_html( the_title() ); ?>">
						<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
					</a>
				</div>
			</div>
		<?php
		}
	}
	
	function lendiz_cpt_portfolio_gmap(){ 
		$lat = get_post_meta( get_the_ID(), 'lendiz_portfolio_gmap_latitude', true );
		$lang = get_post_meta( get_the_ID(), 'lendiz_portfolio_gmap_longitude', true );
		$marker = get_post_meta( get_the_ID(), 'lendiz_portfolio_gmap_marker', true );
		$map_style = get_post_meta( get_the_ID(), 'lendiz_portfolio_gmap_style', true );
		$info_title = get_the_title();
		$info_address = get_post_meta( get_the_ID(), 'lendiz_portfolio_place', true );
		$info_stat = $info_title || $info_address ? 1 : 0;
		$map_type = get_post_meta( get_the_ID(), 'lendiz_portfolio_gmap_type', true );
		$map_height = get_post_meta( get_the_ID(), 'lendiz_portfolio_gmap_height', true );
		$map_height = !empty( $map_height ) ? $map_height : '400';
		if( $map_type == 'normal' ){
			$lat_long = $lat && $lang ? $lat .','. $lang : '';
			echo $lat_long ? '<div class="mapouter"><div class="gmap_canvas"><iframe height="'. esc_attr( $map_height ) .'" id="gmap_canvas" src="https://maps.google.com/maps?q='. urlencode( $lat_long ) .'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:'. esc_attr( $map_height ) .'px;}.gmap_canvas {overflow:hidden;background:none!important;height:'. esc_attr( $map_height ) .'px;}</style></div>' : '';
		}else{
	?>
			<div class="portfolio-gmap">
				<div id="lendizgmap" class="lendizgmap" style="width:100%;height:<?php echo esc_attr( $map_height ); ?>px;" data-map-lat="<?php echo esc_attr( $lat ); ?>" data-map-lang="<?php echo esc_attr( $lang ); ?>" data-map-style="<?php echo esc_attr( $map_style ); ?>" data-map-marker="<?php echo esc_url( $marker ); ?>" data-info-title="<?php echo esc_html( $info_title ); ?>" data-info-addr="<?php echo esc_html( $info_address ); ?>" data-info="<?php echo esc_attr( $info_stat ); ?>"></div>
			</div>
	<?php
		}
	}
	
	function lendiz_cpt_portfolio_gallery(){
			
		$gallery_ids = get_post_meta( get_the_ID(), 'lendiz_portfolio_gallery', true );
		if( $gallery_ids ):
			$gallery_array = explode( ",", $gallery_ids );
			$slide_id = '';
			$gal_atts = array(
				'data-loop="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-infinite' ) .'"',
				'data-margin="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-margin' ) .'"',
				'data-center="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-center' ) .'"',
				'data-nav="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-navigation' ) .'"',
				'data-dots="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-pagination' ) .'"',
				'data-autoplay="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-autoplay' ) .'"',
				'data-items="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-items' ) .'"',
				'data-items-tab="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-tab' ) .'"',
				'data-items-mob="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-mobile' ) .'"',
				'data-duration="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-duration' ) .'"',
				'data-smartspeed="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-smartspeed' ) .'"',
				'data-scrollby="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-scrollby' ) .'"',
				'data-autoheight="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-single-slide-autoheight' ) .'"',
			);
			$data_atts = implode( " ", $gal_atts );
			$gallery_modal = get_post_meta( get_the_ID(), 'lendiz_portfolio_gallery_modal', true );
			if( $gallery_modal == 'default' ): // Gallery Model Default
			?>
				<div class="zoom-gallery portfolio-default-gallery">
			<?php
				foreach( $gallery_array as $gal_id ): ?>
					<article class="cpt-item clearfix">
						<figure>
							<?php $image_url = wp_get_attachment_url( $gal_id ); ?>
							<a href="#" data-mfp-src="<?php echo esc_url( $image_url ); ?>" title="<?php echo esc_html( get_the_title( $gal_id ) ); ?>">
								<?php echo wp_get_attachment_image( $gal_id, 'large', "", array( "class" => "img-fluid cpt-img" ) ); ?>
							</a>
						</figure>
					</article>
				<?php
				endforeach;
			?>
				</div>
			<?php
			elseif( $gallery_modal == 'normal' ): // Gallery Model Popup
				?>
				<div class="zoom-gallery portfolio-owl-gallery">
					<div class="owl-carousel" <?php echo ( $data_atts ); ?>>
					<?php
					foreach( $gallery_array as $gal_id ): ?>
						<article class="cpt-item">
							<figure>
								<?php $image_url = wp_get_attachment_url( $gal_id ); ?>
								<a href="#" data-mfp-src="<?php echo esc_url( $image_url ); ?>" title="<?php echo esc_html( get_the_title( $gal_id ) ); ?>">
									<?php echo wp_get_attachment_image( $gal_id, 'large', "", array( "class" => "img-fluid" ) ); ?>
								</a>
							</figure>
						</article>
					<?php
					endforeach;?>
					</div><!-- .owl-carousel -->
				</div><!-- .zoom-gallery -->
			<?php
			else: // Gallery Model Grid Popup
			
				$gutter = get_post_meta( get_the_ID(), 'lendiz_portfolio_grid_gutter', true );
				$cols = get_post_meta( get_the_ID(), 'lendiz_portfolio_grid_cols', true );
				$cols = !empty( $cols ) ? $cols : '2';
			?>
				<div class="zoom-gallery portfolio-grid-gallery grid-layout clearfix">
					<div class="isotope" data-cols="<?php echo esc_attr( $cols ); ?>" data-gutter="<?php echo esc_attr( $gutter ); ?>">
						<?php
						$chk = 1;
						foreach( $gallery_array as $gal_id ): 
							?>
								<article class="cpt-item">
									<figure>
										<?php $image_url = wp_get_attachment_url( $gal_id ); ?>
										<a href="#" data-mfp-src="<?php echo esc_url( $image_url ); ?>" title="<?php echo esc_html( get_the_title( $gal_id ) ); ?>">
											<?php 
											$crop_width = '';
											if( $cols <= 2 ){
												$crop_width = 560;
											}else{
												$crop_width = 400;
											}
											$cropped_img = aq_resize( $image_url, $crop_width, 9999, false, false );
											if( $cropped_img ):
												$image_alt = get_post_meta( $gal_id, '_wp_attachment_image_alt', true);
												$img_src = isset( $cropped_img[0] ) ? $cropped_img[0] : '';
												$img_width = isset( $cropped_img[1] ) ? $cropped_img[1] : '';
												$img_height = isset( $cropped_img[2] ) ? $cropped_img[2] : '';
											?>
											<img class="img-fluid cpt-img" src="<?php echo esc_url( $img_src ); ?>" width="<?php echo esc_attr( $img_width ); ?>" height="<?php echo esc_attr( $img_height ); ?>" alt="<?php echo esc_html( $image_alt ); ?>" />
											<?php else:
											echo wp_get_attachment_image( $gal_id, array( $crop_width, '9999' ), "", array( "class" => "img-fluid cpt-img" ) );
											endif; ?>
										</a>
									</figure>
								</article>
						<?php
						endforeach;
						?>
					</div><!-- .isotope -->
				</div><!-- .zoom-gallery -->
				<?php
			endif;
		endif;
	}
	
	function lendiz_cpt_portfolio_related(){
		
		$rel_opt = LendizFamework::lendiz_static_theme_mod( 'portfolio-related-opt' );
		
		if( $rel_opt ):
		
			$gal_atts = array(
				'data-loop="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-infinite' ) .'"',
				'data-margin="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-margin' ) .'"',
				'data-center="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-center' ) .'"',
				'data-nav="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-navigation' ) .'"',
				'data-dots="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-pagination' ) .'"',
				'data-autoplay="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-autoplay' ) .'"',
				'data-items="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-items' ) .'"',
				'data-items-tab="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-tab' ) .'"',
				'data-items-mob="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-mobile' ) .'"',
				'data-duration="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-duration' ) .'"',
				'data-smartspeed="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-smartspeed' ) .'"',
				'data-scrollby="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-scrollby' ) .'"',
				'data-autoheight="'. LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-autoheight' ) .'"',
			);
			$data_atts = implode( " ", $gal_atts );
			
			$post_id = get_the_ID();
			$custom_taxterms = wp_get_object_terms( $post_id, 'portfolio-categories', array('fields' => 'ids') );
			$tot_items = LendizFamework::lendiz_static_theme_mod( 'portfolio-related-slide-items' );
			$thumb_size = '';
			if( $tot_items >= 2 ){
				$thumb_size = 'lendiz-grid-medium';
			}elseif( $tot_items >= 1 ){
				$thumb_size = 'medium';
			}else{
				$thumb_size = 'large';
			}
			
			if( $custom_taxterms ):
			
				$args = array(
				'post_type' => 'lendiz-portfolio',
					'post_status' => 'publish',
					'posts_per_page' => 10, // you may edit this number
					'orderby' => 'DESC',
					'post__not_in' => array ( $post_id ),
					'tax_query' => array(
						array(
							'taxonomy' => 'portfolio-categories',
							'field' => 'id',
							'terms' => $custom_taxterms
						)
					)
				);
	
				$related_query = new WP_Query( $args );
				if( $related_query->have_posts() ) : 
					wp_enqueue_script( 'owl-carousel' );
					wp_enqueue_style( 'owl-carousel' );
				?>
				
					<div class="portfolio-related-slider">
						<h4><?php echo apply_filters( 'lendiz_portfolio_related_title', esc_html__( 'Related Projects', 'lendiz-core' ) ); ?></h4>
						<div class="owl-carousel" <?php echo ( $data_atts ); ?>>
						<?php while( $related_query->have_posts() ) : $related_query->the_post(); ?>
							<article class="cpt-item">
								<figure>
									<?php 
										if ( has_post_thumbnail( get_the_ID() ) ) :
									?>
										<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_html( get_the_title() ); ?>">
											<?php echo get_the_post_thumbnail( get_the_ID(), $thumb_size, array( 'class' => 'img-fluid' ) ); ?>
										</a>
									<?php else: ?>
										<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
											<div class="empty-post-image text-center"><i class="ti-image"></i></div>
										</a>
									<?php endif; ?>
									<h6 class="related-title">
										<a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" title="<?php echo esc_html( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
									</h6>
								</figure>
							</article>
						<?php endwhile; ?>
						</div><!-- .owl-carousel -->
					</div><!-- .portfolio-related-slider -->
				<?php
				endif;
				wp_reset_postdata();
			endif;
		endif; // Releted Slider option
	}
	
	function lendiz_cpt_portfolio_video( $video_atts ){
		?> <div class="portfolio-video post-video-wrap"> <?php
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
								the_post_thumbnail( 'large', array( 'class' => 'img-fluid mx-auto d-block' ) );
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
								the_post_thumbnail( 'large', array( 'class' => 'img-fluid mx-auto d-block' ) ); 
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
			
				if( $video_type != 'custom' ){ ?>
					<a class="popup-video-post" href="<?php echo esc_url( $video_url ); ?>">
						<div class="video-play-icon text-center"><span class="ti-control-play"></span></div>
						<?php 
							if( '' !== get_the_post_thumbnail() ):
								the_post_thumbnail( 'large', array( 'class' => 'img-fluid mx-auto d-block' ) ); 
							endif;
						?>
					</a>
				<?php
				}else{
					$u_key = $this->lendizCPTUniqueKey();
				?>
					<a class="popup-video-post popup-with-zoom-anim popup-custom-video" href="#popup-custom-video-<?php echo esc_attr( $u_key ); ?>">
						<div class="video-play-icon text-center"><span class="ti-control-play"></span></div>
						<?php 
							if( '' !== get_the_post_thumbnail() ):
								the_post_thumbnail( 'large', array( 'class' => 'img-fluid mx-auto d-block' ) ); 
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
		}?>
		</div><!-- .portfolio-video -->
		<?php
	}
	
	function lendiz_cpt_portfolio_audio(){
		$audio_type = get_post_meta( get_the_ID(), 'lendiz_portfolio_audio_type', true );
		$audio_id = get_post_meta( get_the_ID(), 'lendiz_portfolio_audio_id', true );
		if( !empty( $audio_type ) && !empty( $audio_id ) ): ?>
			<div class="post-audio-wrap">
				<?php if( $audio_type == 'soundcloud' ): ?>
						<?php echo do_shortcode('[soundcloud url="https://api.soundcloud.com/tracks/'. esc_attr( $audio_id ) .'" params="auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&visual=true" width="100%" height="150" /]'); ?>
				<?php else: ?>
					<audio preload="none" controls style="max-width:100%;">
						<source src="<?php echo esc_url( $audio_id ); ?>" type="audio/mp3">
					</audio>
				<?php endif; ?>
			</div>
		<?php
		endif;
	}
	function lendiz_cpt_portfolio_title(){ ?>
		<div class="portfolio-title">
			<?php
				$port_tit = LendizFamework::lendiz_static_theme_mod('portfolio-title-opt');
				if( is_singular( 'lendiz-portfolio' ) ) : ?>
					<?php if( $port_tit ) : ?>
				<h3><?php the_title(); ?></h3>
					<?php endif; ?>
			<?php else: ?>
				<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; ?>
		</div>
	<?php
	}
	
	function lendiz_cpt_portfolio_content(){ ?>
		<div class="portfolio-content">
			<?php the_content(); ?>
		</div>
	<?php
	}
	
	function lendiz_cpt_meta(){ ?>
		<div class="portfolio-meta">
			<?php
			$portfolio_meta_items = '';
			$portfolio_items_opt = get_post_meta( get_the_ID(), 'lendiz_portfolio_items_opt', true );
			if( $portfolio_items_opt == 'custom' ){
				$portfolio_meta_items = get_post_meta( get_the_ID(), 'lendiz_portfolio_items', true );
			}else{
				$portfolio_meta_items = LendizFamework::lendiz_static_theme_mod('portfolio-meta-items');
			}
			
			$portfolio_meta_items = isset( $portfolio_meta_items['Enabled'] ) ? $portfolio_meta_items['Enabled'] : '';

			if( $portfolio_meta_items ): ?>
				<ul class="portfolio-meta-list"><?php						
					foreach ( $portfolio_meta_items as $key => $value ) {
						switch($key) {
							case 'date': ?>
								<li><?php $this->lendiz_cpt_meta_date() ?></li><?php 
							break;
							
							case 'client': ?> 
								<li><?php $this->lendiz_cpt_meta_client() ?></li><?php
							break;
							
							case 'category': ?>
								<li><?php $this->lendiz_cpt_meta_category() ?></li><?php
							break;
							
							case 'share': ?> 
								<li><?php $this->lendiz_cpt_meta_share() ?></li><?php
							break;
							
							case 'tag': ?>
								<li><?php $this->lendiz_cpt_meta_tag() ?></li><?php
							break;
							
							case 'duration': ?>
								<li><?php $this->lendiz_cpt_meta_duration() ?></li><?php
							break;
							
							case 'place': ?>
								<li><?php $this->lendiz_cpt_meta_place() ?></li><?php
							break;
							
							case 'url': ?>
								<li><?php $this->lendiz_cpt_meta_url() ?></li><?php
							break;
							
							case 'estimation': ?>
								<li><?php $this->lendiz_cpt_meta_estimation() ?></li><?php
							break;
						}
					}?>
				</ul><?php
			endif;
			?>
		</div><!-- .portfolio-meta -->
	<?php
	}
	
	function lendiz_cpt_meta_date(){ 
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-date-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-calendar"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
		<?php endif; ?>
		<?php
			$date = get_post_meta( get_the_ID(), 'lendiz_portfolio_date', true );
			$date_format = get_post_meta( get_the_ID(), 'lendiz_portfolio_date_format', true );
			$date_text = $date;
			if( $date && $date_format ){
				$date_text = date( $date_format, strtotime( $date ) );
			}
		?>
		<span class="entry-date"><?php echo esc_attr( $date_text ); ?></span>
	<?php
	}
	
	function lendiz_cpt_meta_client(){
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-client-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-user"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
		<?php endif; ?>
		<?php
			$client_name = get_post_meta( get_the_ID(), 'lendiz_portfolio_client_name', true ); 
		?>
		<span class="entry-client"><?php echo esc_attr( $client_name ); ?></span>
	<?php
	}
	
	function lendiz_cpt_meta_category(){
	
		$taxonomy = 'portfolio-categories';
		$terms = get_the_terms( get_the_ID(), $taxonomy ); // Get all terms of a taxonomy
		if ( $terms && !is_wp_error( $terms ) ) :
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-category-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-folder"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
			<?php endif; ?>
			<ul class="portfolio-categories nav">
				<?php 
					$c = count( $terms ); 
					foreach ( $terms as $term ) { ?>
					<li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?><?php if( --$c != 0 ) echo ','; ?></a></li>
				<?php } ?>
			</ul>
		<?php endif;?>
	<?php
	}
	
	function lendiz_cpt_meta_share(){ 
	
		$posts_shares = LendizFamework::lendiz_static_theme_mod( 'post-social-shares' );
		$post_id = get_the_ID();
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' );
		
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-share-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-share"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
		<?php endif; ?>
		
		<ul class="nav portfolio-share social-icons">
			<?php
			
			if( !empty( $posts_shares ) && is_array( $posts_shares ) ):
				foreach ( $posts_shares as $social_share ){
		
					switch( $social_share ){
					
						case "fb": 
					?>
							<li class="nav-item"><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink( $post_id ) ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" target="blank" class="social-facebook share-fb"><i class="ti-facebook"></i></a></li>
						
					<?php
						break; // fb
						case "twitter":
					?>
				
							<li class="nav-item"><a href="http://twitter.com/home?status=Reading:<?php echo urlencode(get_the_title()); ?>-<?php echo  esc_url( home_url( '/' ) )."/?p=". esc_attr( $post_id ); ?>" class="social-twitter share-twitter" title="<?php esc_html_e( 'Click to send this page to Twitter!', 'lendiz' ); ?>" target="_blank"><i class="ti-twitter"></i></a></li>
				
					<?php
						break; // twitter
						case "linkedin":
					?>
				
							<li class="nav-item"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url( the_permalink() ); ?>&title=<?php echo urlencode(get_the_title()); ?>&summary=&source=<?php echo bloginfo('name'); ?>" class="social-linkedin share-linkedin" target="_new"><i class="ti-linkedin"></i></a></li>
				
					<?php
						break; // linkedin
						case "pinterest":
					?>
				
						<li class="nav-item"><a href="http://pinterest.com/pin/create/button/?url=<?php esc_url( the_permalink() ); ?>&amp;media=<?php echo ( ! empty( $image[0] ) ? $image[0] : '' ); ?>&description=<?php echo urlencode(get_the_title()); ?>" class="social-pinterest share-pinterest" target="blank"><i class="ti-pinterest"></i></a></li>
				
					<?php
						break; // pinterest
					?>
				
			<?php 
					} //switch
				} // foreach
			endif;	
		?>
		</ul><?php
	}
	
	function lendiz_cpt_meta_tag(){
		$taxonomy = 'portfolio-tags';
		$terms = get_the_terms( get_the_ID(), $taxonomy ); // Get all terms of a taxonomy
		if ( $terms && !is_wp_error( $terms ) ) :
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-tags-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-tag"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
			<?php endif; ?>
			<ul class="portfolio-tags nav">
				<?php 
					$c = count( $terms ); 
					foreach ( $terms as $term ) { ?>
					<li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?><?php if( --$c != 0 ) echo ',';	?></a></li>
				<?php } ?>
			</ul>
		<?php endif;?>
	<?php
	}
	
	function lendiz_cpt_meta_duration(){ 
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-duration-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-alarm-clock"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
		<?php endif; ?>
		<?php
			$duration = get_post_meta( get_the_ID(), 'lendiz_portfolio_duration', true ); 
		?>
		<span class="entry-duration"><?php echo esc_html( $duration ); ?></span>
	<?php
	}
	
	function lendiz_cpt_meta_place(){ 
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-place-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-location-pin"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
		<?php endif; ?>
		<?php
			$place = get_post_meta( get_the_ID(), 'lendiz_portfolio_place', true ); 
		?>
		<span class="entry-place"><?php echo esc_html( $place ); ?></span>
	<?php
	}
	
	function lendiz_cpt_meta_url(){ 
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-url-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-link"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
		<?php endif; ?>
		<?php
			$url = get_post_meta( get_the_ID(), 'lendiz_portfolio_url', true ); 
		?>
		<span class="entry-url"><?php echo esc_url( $url ); ?></span>
	<?php
	}
	
	function lendiz_cpt_meta_estimation(){ 
		$title = LendizFamework::lendiz_static_theme_mod( 'portfolio-estimation-label' );
		if( $title ):
		?>
		<div class="portfolio-meta-title-wrap">
			<h6><span class="portfolio-meta-icon"><i class="ti-money"></i></span><?php echo esc_html( $title ); ?></h6>
		</div>
		<?php endif; ?>
		<?php
			$estimation = get_post_meta( get_the_ID(), 'lendiz_portfolio_estimation', true ); 
		?>
		<span class="entry-estimation"><?php echo esc_html( $estimation ); ?></span>
	<?php
	}
	
	public static function lendiz_cpt_nav(){ ?>
		<div class="custom-post-nav">
			<?php $prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			<div class="prev-nav-link">
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="prev"><i class="ti-angle-double-left"></i><h4><?php esc_html_e( "Prev" , "lendiz" ); ?></h4></a>
			</div>
			<?php else: ?>
				<a href="#" class="disabled"><i class="ti-angle-double-right"></i></a>
			<?php endif; ?>
		
			<?php $next_post = get_next_post();
			if (!empty( $next_post )): ?>
			<div class="next-nav-link">
				<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next"><h4><?php esc_html_e( "Next" , "lendiz" ); ?></h4><i class="ti-angle-double-right"></i></a>
			</div>
			<?php else: ?>
				<a href="#" class="disabled"><i class="ti-angle-double-right"></i></a>
			<?php endif; ?>
		</div>
	<?php
	}
	
}