<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
$aps = new LendizPostSettings;
$layout = $aps->lendiz_get_current_layout();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() ) : ?>
		<span class="sticky-post-icon"><i class="ti-pin-alt"></i></span>
	<?php endif; ?>
	<?php $aps->lendiz_post_items(); ?>
</article><!-- #post-## -->