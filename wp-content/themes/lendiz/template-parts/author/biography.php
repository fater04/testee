<?php
/**
 * The template part for displaying an Author biography
 */
?>
<?php
	$author_tot_posts = count_user_posts( get_the_author_meta('ID') );
	$author_link = get_author_posts_url( get_the_author_meta( 'ID' ) );
	$author_url = get_the_author_meta('url', get_the_author_meta('ID'));
	$twitter = get_the_author_meta('twitter', get_the_author_meta('ID'));
	$facebook = get_the_author_meta('facebook', get_the_author_meta('ID'));
	$vimeo = get_the_author_meta('vimeo', get_the_author_meta('ID'));
	$youtube = get_the_author_meta('youtube', get_the_author_meta('ID'));
	$author_info = nl2br(get_the_author_meta('description'));
	$author_name = get_the_author();
?>
<div class="media author-info clearfix">
	<div class="author-avatar me-3">
		<?php echo get_avatar( get_the_author_meta('email'), '100', null, null, array('class' => array('rounded') ) ); ?>
	</div>
	<div class="media-body author-meta">
		<div class="posts-count">
			<?php if( !is_author() ) : ?>
				<h5><a class="author-link" href="<?php echo esc_url( $author_link ); ?>"><?php echo esc_attr( $author_name ); ?></a></h5>
			<?php else : ?>
				<h5><?php echo esc_html( $author_name );//esc_attr( $author_tot_posts ) . esc_html__(' Posts', 'lendiz'); ?></h5>
				<h6><?php echo esc_attr( $author_tot_posts ) . esc_html__(' Posts', 'lendiz'); ?></h6>
			<?php endif ; ?>
		</div>
		<?php if( !empty( $author_url ) ) : ?>
		<div class="author-url">
			<a href="<?php echo esc_url( $author_url ); ?>"><?php echo esc_url( $author_url ); ?></a>
		</div>
		<?php endif ; ?>
		<?php if( !empty( $author_info ) ) : ?>
		<div class="author-bio">
			<p><?php echo wp_kses( $author_info, LendizThemeOpt::lendiz_allowed_html_tags() ); ?></p>
			<ul class="nav text-center author-social social-icons list-inline">
				<?php echo isset( $twitter ) && $twitter != '' ? '<li><a href="'.esc_url($twitter).'" class="social-twitter"><i class="ti-twitter"></i></a></li>' : ''; ?>
				<?php echo isset( $facebook ) && $facebook != '' ? '<li><a href="'.esc_url($facebook).'" class="social-fb"><i class="ti-facebook"></i></a></li>' : ''; ?>
				<?php echo isset( $vimeo ) && $vimeo != '' ? '<li><a href="'.esc_url($vimeo).'" class="social-vimeo"><i class="ti-vimeo"></i></a></li>' : ''; ?>
				<?php echo isset( $youtube ) && $youtube != '' ? '<li><a href="'.esc_url($youtube).'" class="social-youtube"><i class="ti-youtube"></i></a></li>' : ''; ?>
			</ul>
		</div>
		<?php endif ; ?>
	</div>
</div>