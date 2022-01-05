<?php
/**
 * Template part for displaying related post as slider
 *
 */
$aps = new LendizPostSettings;
$slide_template = 'related';
$cols = '';
$max_posts = LendizThemeOpt::lendiz_static_theme_mod( 'related-max-posts' );
$filter = LendizThemeOpt::lendiz_static_theme_mod( 'related-posts-filter' );
$gal_atts = array(
	'data-loop="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-infinite' )) .'"',
	'data-margin="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-margin' )) .'"',
	'data-center="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-center' )) .'"',
	'data-nav="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-navigation' )) .'"',
	'data-dots="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-pagination' )) .'"',
	'data-autoplay="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-autoplay' )) .'"',
	'data-items="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-items' )) .'"',
	'data-items-tab="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-tab' )) .'"',
	'data-items-mob="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-mobile' )) .'"',
	'data-duration="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-duration' )) .'"',
	'data-smartspeed="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-smartspeed' )) .'"',
	'data-scrollby="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-scrollby' )) .'"',
	'data-autoheight="'. esc_attr(LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-autoheight' )) .'"',
);
$data_atts = implode( " ", $gal_atts );
$cols = absint( LendizThemeOpt::lendiz_static_theme_mod( $slide_template.'-slide-items' ) );
if( $cols == 1 ){
	$thumb_size = 'large';
}elseif( $cols == 2 ){
	$thumb_size = 'medium';
}elseif( $cols == 3 ){
	$thumb_size = 'lendiz-grid-large';
}else{
	$thumb_size = 'lendiz-grid-medium';
}
if( absint( $max_posts ) ):
	$post_id = get_the_ID();
	$term_in = '';
	
	$terms = wp_get_post_categories( $post_id );
	
	if( $filter == 'category' ){
		$term_in = 'category__in';
		$terms = wp_get_post_categories( $post_id );
	}else{
		$term_in = 'tag__in';
		$terms = wp_get_post_tags( $post_id );
	}
	if( $terms ) {
		$args = array(
			$term_in => $terms,
			'ignore_sticky_posts' => 1,
			'post__not_in' => array( $post_id ),
			'posts_per_page'=> absint( $max_posts )
		);
		$related_query = new WP_Query( $args );
		
		if( $related_query->have_posts() ) { 
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel' );
		?>
			<div class="related-slider-wrapper clearfix">
				<h4><?php echo apply_filters( 'lendiz_portfolio_related_title', esc_html__( 'Other relevent post', 'lendiz' ) ); ?></h4>
				<div class="owl-carousel related-slider" <?php echo ( ''. $data_atts ); ?>><?php
		
				while( $related_query->have_posts() ) : $related_query->the_post(); ?>
				
					<div class="item">
						<div class="related-slider-content-wrap">
							<?php 
								if ( has_post_thumbnail( get_the_ID() ) ) :
									echo get_the_post_thumbnail( get_the_ID(), $thumb_size, array( 'class' => 'img-fluid' ) ); ?>
							<?php endif; ?>
							<div class="related-slider-content">
								<h6 class="related-title">
									<a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" class="related-post-title" title="<?php the_title_attribute(); ?>"><?php echo esc_html( get_the_title() ); ?></a>
								</h6>
							</div>	<!-- .related-slider-content -->
						</div> <!-- .related-slider-content-wrap -->
					</div>
		
				<?php
				endwhile;?>
				
				</div><!-- .related-slider -->
			</div><!-- .related-slider-wrapper --><?php
	
		}
		wp_reset_postdata();
	
	}
endif; // related-slider enable if