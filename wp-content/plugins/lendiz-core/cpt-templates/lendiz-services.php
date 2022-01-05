<?php
// Service Content
$title_opt = LendizFamework::lendiz_static_theme_mod('service-title-opt');
while ( have_posts() ) : the_post();
?>
	
	<div class="service">
		<div class="service-info-wrap">
		
			<?php if( $title_opt ) : ?>
			<div class="service-title">
				<h2><?php the_title(); ?></h2>
			</div>
			<?php endif; // desg exists ?>
		
			<?php if( has_post_thumbnail( get_the_ID() ) ): ?>
			<div class="service-img">
				<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
			</div>
			<?php endif; // if thumb exists ?>
		
			<div class="service-content">
				<?php the_content(); ?>
			</div>
			
			<?php LendizCPTElements::lendiz_cpt_nav(); ?>
		</div> <!-- .service-info-wrap -->
	</div><!-- .service -->
<?php
endwhile; // End of the loop.