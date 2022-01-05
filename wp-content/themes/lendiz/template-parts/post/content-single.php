<?php
/**
 * Template part for displaying posts
 *
 */
$template = 'single-post';
$layout = 'standard';
$aps = new LendizPostSettings;
$post_elements = LendizThemeOpt::lendiz_static_theme_mod( $template.'-items' );
$post_items = array();
$post_items_opt = get_post_meta( get_the_ID(), 'lendiz_post_items_opt', true );
if( $post_items_opt == '' || $post_items_opt == 'theme-default' ){
	$post_items = isset( $post_elements['Enabled'] ) && !empty( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array();
	
}else{
	$meta_post_items = get_post_meta( get_the_ID(), 'lendiz_post_items', true );
	$post_items = json_decode( stripslashes( $meta_post_items ), true );
	$post_items = isset( $post_elements['Enabled'] ) && !empty( $post_elements['Enabled'] ) ? $post_elements['Enabled'] : array();
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="article-inner post-items">
	<?php
		if( $post_items ):

			foreach ( $post_items as $element => $value ) {
				
				switch($element) {
				
					case 'title':
						$layout = LendizThemeOpt::lendiz_static_theme_mod($template.'-post-template');
					?>
						<header class="entry-header">
							<?php echo ( ''. $aps->lendiz_post_title( $layout ) ); ?>
						</header>
					<?php									
					break;
					
					case 'top-meta':
					?>
						<div class="entry-meta top-meta clearfix">
							<?php $aps->lendiz_post_meta( 'topmeta' ); ?>
						</div>
					<?php
					break;
					
					case 'thumb':
						if( $layout != 'list-layout' ):
							$post_format = $aps->lendiz_post_format();
							if( !empty( $post_format  ) ){
							?>
								<div class="post-format-wrap">
									<?php echo ( ''. $post_format ); ?>
								</div>
							<?php
							}
						endif;
						if ( is_attachment() ) {
							echo '<div class="entry-content">';
								the_content();
							echo '</div>';
						}
					break;
					
					case 'content':
					?>
						<div class="entry-content">
							<?php 
							
								the_content();
								
								wp_link_pages( array(
									'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'lendiz' ),
									'after'       => '</div>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
								) );
								
							?>
						</div>
					<?php
					break;
					
					case 'bottom-meta':
					?>
						<footer class="entry-footer">
							<div class="entry-meta bottom-meta clearfix">
								<?php $aps->lendiz_post_meta( 'bottommeta' ); ?>
							</div>
						</footer>
					<?php
					break;
					
					
				} // switch					
			} //foreach		
		endif;
	?>
	</div><!-- .article-inner -->
</article><!-- #post-## -->