<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
get_header();

$ahe = new LendizHeaderElements;
$aps = new LendizPostSettings;
$template = 'page'; // template id
$aps->lendiz_set_post_template( $template );
$template_class = $aps->lendiz_template_content_class();
?>
<div class="wrap">
	<div id="primary" class="content-area error-404-area lendiz-page">
		<main id="main" class="site-main">
		
			<?php $ahe->lendiz_page_title( $template ); ?>
		
			<section class="error-404 not-found text-center">
				<div class="container">
					<header class="page-header">
						
						<div class="image-wrap-404">
							<img src="<?php echo esc_url( LENDIZ_ASSETS . '/images/404.png' ); ?>" alt="<?php esc_attr_e( 'Page Not Found', 'lendiz' ); ?>">
							
						</div>	
						
						<div class="relative mb-2">
							<h3 class="page-title"><?php esc_html_e( 'Page Not Found', 'lendiz' ); ?></h3>
						</div>
						<?php 
							$home_url = home_url( '/' ); 
						?>
							<p class="error-description">
								<?php esc_html_e( 'Sorry we cannot find that page!', 'lendiz' ); ?>
								<?php esc_html_e( 'Go back to home', 'lendiz' ); ?>
							</p>							
							<a class="home-link" href="<?php echo esc_url( $home_url ); ?>">
								<?php esc_html_e( 'Home Page', 'lendiz' ); ?>
							</a>
					</header><!-- .page-header -->
				</div><!-- .container -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php get_footer();