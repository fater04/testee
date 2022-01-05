<?php
// Team Archive Template
$q_object = get_queried_object();
$term_name = $taxonomy = '';
$aps = new LendizPostSettings;
if( isset($q_object->name) ) $term_name = $q_object->name;
if( isset($q_object->taxonomy) ) $taxonomy = $q_object->taxonomy;

$gutter = $cols = $infinite = $isotope = '';
$template = 'blog'; // template id
$aps = new LendizPostSettings;
if( $aps->lendiz_check_template_exists( 'archive' ) ){
	$template = 'archive';
}
$extra_class = $layout = $aps->lendiz_get_current_layout();
?>

		<main id="main" class="site-main <?php echo esc_attr( $template ); ?>-template <?php echo esc_attr( $extra_class ); ?>" >
						
			<?php
			$args = array(
				'post_type' => 'lendiz-team'
			);
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) : 

				$row_stat = 0;

				while ( $query->have_posts() ) : $query->the_post(); 

					if( $row_stat == 0 ) :
						echo '<div class="row">';
					endif;
					
					?>
						<div class="col-md-6">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'post lendiz-team' ); ?>>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid' ) ); ?></a>
								<div class="team-archive-title">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</div>
							</article><!-- #post-## -->
						</div><!-- .col-md-6 -->
					<?php
						
					$row_stat++;
					if( $row_stat == 2 ) :
						echo '</div><!-- .row -->';
						$row_stat = 0;
					endif;

				endwhile; 

					if( $row_stat != 0 ){
						echo '</div><!-- .unexpected-row -->'; // Unexpected row close
					};

			else :
				get_template_part( 'template-parts/post/content', 'none' );
			endif;

			wp_reset_postdata();
			?>
		</main>
		<?php $aps->lendiz_wp_bootstrap_pagination(); ?>
