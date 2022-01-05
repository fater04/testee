<?php
/**
 * The arcihve template for displaying all custom post types
 */
 
get_header(); 
$ahe = new LendizHeaderElements;
$aps = new LendizPostSettings;
$template = 'blog'; // template id
if( $aps->lendiz_check_template_exists( 'archive' ) ){
	$template = 'archive';
}
$aps->lendiz_set_post_template( $template );
$template_class = $aps->lendiz_template_content_class();
$full_width_class = '';
$acpt = new LendizCPT;

?>
<div class="lendiz-content <?php echo esc_attr( 'lendiz-' . $template ); ?>">
		
		<?php $ahe->lendiz_header_slider('bottom'); ?>
		
		<?php $ahe->lendiz_page_title( $template ); ?>
		<div class="lendiz-content-inner">
			<div class="container">
	
				<div class="row">
					
					<div class="<?php echo esc_attr( $template_class['content_class'] ); ?>">
						<div id="primary" class="content-area">
							<?php
								$q_object = get_queried_object();
								$cpt = '';
								if( isset($q_object->name) )
									$cpt = $q_object->name;

								if( $cpt == 'lendiz-portfolio' ){
									$acpt->lendiz_cpt_call_tax_template( 'portfolio-archive' );
								}elseif( $cpt == 'lendiz-team' ){
									$acpt->lendiz_cpt_call_tax_template( 'team-archive' );
								}elseif( $cpt == 'lendiz-services' ){
									$acpt->lendiz_cpt_call_tax_template( 'services-archive' );
								}elseif( $cpt == 'lendiz-events' ){
									$acpt->lendiz_cpt_call_tax_template( 'events-archive' );
								}elseif( $cpt == 'lendiz-testimonial' ){
									$acpt->lendiz_cpt_call_tax_template( 'testimonial-archive' );
								}else{
									require_once get_template_directory() . '/template-parts/post/content-none.php';
								}
							?>				
						</div><!-- #primary -->
					</div><!-- main col -->
					
					<?php if( $template_class['lsidebar_class'] != '' ) : ?>
					<div class="<?php echo esc_attr( $template_class['lsidebar_class'] ); ?>">
						<aside class="widget-area left-widget-area<?php echo esc_attr( $template_class['sticky_class'] ); ?>">
							<?php dynamic_sidebar( $template_class['left_sidebar'] ); ?>
						</aside>
					</div><!-- sidebar col -->
					<?php endif; ?>
					
					<?php if( $template_class['rsidebar_class'] != '' ) : ?>
					<div class="<?php echo esc_attr( $template_class['rsidebar_class'] ); ?>">
						<aside class="widget-area right-widget-area<?php echo esc_attr( $template_class['sticky_class'] ); ?>">
							<?php dynamic_sidebar( $template_class['right_sidebar'] ); ?>
						</aside>
					</div><!-- sidebar col -->
					<?php endif; ?>
					
				</div><!-- row -->
			
		</div><!-- .container -->
	</div><!-- .lendiz-content-inner -->
</div><!-- .lendiz-content -->
<?php get_footer();