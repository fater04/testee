<?php
// Team Content
$title_opt = LendizFamework::lendiz_static_theme_mod('team-title-opt');
$team_layout = LendizFamework::lendiz_static_theme_mod('cpt-team-layout');
$wrap_class = $team_layout ? ' team-'.$team_layout : ' team-default';
while ( have_posts() ) : the_post();
?>
	
	<div class="row team<?php echo esc_attr( $wrap_class ); ?>">
		<div class="col-md-12">
			<?php if( has_post_thumbnail( get_the_ID() ) ): ?>
			<div class="team-image-wrap alignleft">
				<div class="team-img">
					<?php the_post_thumbnail( 'medium', array( 'class' => 'img-fluid' ) ); ?>
				</div>
			</div> <!-- .team-content-wrap -->
			<?php endif; // if thumb exists ?>
			
			<div class="team-info">
				<div class="team-info-inner">
					<?php if( $title_opt ) : ?>
					<div class="team-title">
						<h2><?php the_title(); ?></h2>
					</div><!-- .team-title -->
					<?php endif; // desg exists ?>
					<?php
						$desg = get_post_meta( get_the_ID(), 'lendiz_team_designation', true ); 
						if( $desg ):
					?>
					<div class="team-designation-wrap">
						<span class="team-designation"><?php echo esc_html( $desg ); ?></span>
					</div><!-- .team-designation -->
					<?php endif; // desg exists ?>
					
					<?php
						$team_terms = get_the_terms( get_the_ID(), 'team-categories' );
						if ( ! empty( $team_terms ) && ! is_wp_error( $team_terms ) ){ ?>
							<div class="team-categories-wrap">
								<ul class="nav team-categories">
								<?php
									$max_term = count( $team_terms );
									$i = 1;
									foreach ( $team_terms as $term ) {
										echo '<li><a href="'. esc_url( get_term_link( $term ) ) .'">'. esc_html( $term->name ) .'</a>';
										echo $max_term == $i ? '</li><!-- irregular li -->' : ',</li><!-- regular li -->';
										$i++;
									}
								?>
								</ul>
							</div><!-- .team-categories-wrap -->
							<?php
						}
					?>

					<?php
						$email = get_post_meta( get_the_ID(), 'lendiz_team_email', true ); 
						if( $email ):
					?>
					<div class="team-email-wrap">
						<span class="team-email"><?php echo esc_html( $email ); ?></span>				
					</div><!-- .team-email-wrap -->
					<?php endif; // desg exists ?>
					
				</div><!-- .team-info-inner -->
				
				<?php
				
					$taget = get_post_meta( get_the_ID(), 'lendiz_team_link_target', true );
				
					$social_media = array( 
						'social-fb' => 'ti-facebook', 
						'social-twitter' => 'ti-twitter', 
						'social-instagram' => 'ti-instagram',
						'social-linkedin' => 'ti-linkedin', 
						'social-pinterest' => 'ti-pinterest',
						'social-youtube' => 'ti-youtube', 
						'social-vimeo' => 'ti-vimeo',
						'social-flickr' => 'ti-flickr-alt', 
						'social-dribbble' => 'ti-dribbble'
					);
					
					$social_opt = array(
						'social-fb' => 'lendiz_team_facebook', 
						'social-twitter' => 'lendiz_team_twitter',
						'social-instagram' => 'lendiz_team_instagram',
						'social-linkedin' => 'lendiz_team_linkedin',
						'social-pinterest' => 'lendiz_team_pinterest',
						'social-youtube' => 'lendiz_team_youtube',
						'social-vimeo' => 'lendiz_team_vimeo',
						'social-flickr' => 'lendiz_team_flickr',
						'social-dribbble' => 'lendiz_team_dribbble'
					);
				
					$social_out = '';
					// Actived social icons from theme option output generate via loop
					foreach( $social_media as $key => $class ){

						$social_url = get_post_meta( get_the_ID(), $social_opt[$key], true );
						if( $social_url ): 
							$social_out .= '<li><a class="'. esc_attr( $key ) .'" href="'. esc_url( $social_url ) .'" target="'. esc_attr( $taget ) .'"><i class="'. esc_attr( $class ) .'"></i></a></li>';
						endif;

					}
					if( $social_out ):
				?>
				<div class="team-social-wrap">
					<ul class="nav social-icons team-social">
						<?php echo $social_out; ?>
					</ul>
				</div> <!-- .team-social-wrap -->
				<?php endif; ?>
				
				<div class="team-content-wrap">
					<?php the_content(); ?>
				</div><!-- .team-content-wrap -->		
	
			</div> <!-- .team-info --> 
		</div>
	</div> <!-- .team -->
	
<?php
endwhile; // End of the loop.