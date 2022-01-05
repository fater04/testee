<?php
/**
 * The template for displaying the footer
 *
 */
$afe = new LendizFooterElements;
$footer_template = LendizThemeOpt::lendiz_static_theme_mod( 'footer-template' );

$footer_class = $afe->lendiz_footer_layout();
$footer_class .= $footer_template ? ' footer-template-'. $footer_template : '';
?>
	</div><!-- .lendiz-content-wrapper -->
	<footer class="site-footer<?php echo esc_attr( $footer_class ); ?>">

		<?php $afe->lendiz_footer_elements(); ?>
		
		<?php $afe->lendiz_footer_backto_top(); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php
	/*
	 * Full Search - lendiz_full_search_wrap - 10
	 */
	echo apply_filters( 'lendiz_footer_filters', '' );
	
	/*
	 * Google Fonts - lendizGoogleFontsCon - 10
	 */
	echo do_action( 'lendiz_footer_actions' );
?>

<?php 
	do_action( 'lendiz_body_end_action' );
?>

<?php wp_footer(); ?>
</body>
</html>