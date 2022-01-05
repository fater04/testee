<?php
/**
 * The template for displaying all custom post types
 */
 
get_header(); 
$ahe = new LendizHeaderElements;
$aps = new LendizPostSettings;
$post_type = get_post_type();
$template = str_replace( "lendiz-", "", $post_type ); // template id
$aps->lendiz_set_post_template( $template );
$template_class = $aps->lendiz_template_content_class();
$full_width_class = '';
$acpt = new LendizCPT;
?>
<div class="lendiz-content <?php echo esc_attr( 'lendiz-' . $template ); ?> lendiz-page">
		
		<?php $ahe->lendiz_header_slider('bottom'); ?>
		
		<?php $ahe->lendiz_page_title( 'page' ); ?>
		<div class="lendiz-content-inner">
			<div class="container">
	
				<div class="row">
					
					<div class="<?php echo esc_attr( $template_class['content_class'] ); ?>">
						<div id="primary" class="content-area">
							<?php
								$acpt->lendiz_cpt_call_template( $post_type );
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