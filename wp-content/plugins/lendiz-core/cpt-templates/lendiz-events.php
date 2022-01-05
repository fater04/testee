<?php
// Team Content
$title_opt = LendizFamework::lendiz_static_theme_mod('event-title-opt');
$eve_layout = LendizFamework::lendiz_static_theme_mod('cpt-event-layout');
while ( have_posts() ) : the_post();

	if( $eve_layout == '2' ){
?>
	
	<div class="row event">
		<div class="col-sm-12 event-inner">
			<?php 
				// Check if event exists or not
				$event_date = get_post_meta( get_the_ID(), 'lendiz_event_start_date', true );
				$end_date = get_post_meta( get_the_ID(), 'lendiz_event_end_date', true );
				
				$date_exist = !empty( $end_date ) ? $end_date : $event_date;
				
				if( $date_exist ):
					if( ( time() -( 60*60*24 ) ) > strtotime( $date_exist ) ): 
			?>
				
				<div class="alert alert-warning event-closed" role="alert">
					<span class="fa fa-exclamation-triangle"></span><?php echo apply_filters( 'lendiz_event_close', esc_html__( 'Event closed.', 'lendiz-core' ) ); ?>
				</div>
			<?php 
					endif; // date compare with today
				endif; // $date_exist
			?>
				
			<div class="event-title">
				<?php if( $title_opt ) : ?>
					<h3><?php the_title(); ?></h3>
				<?php endif; // desg exists ?>
								
				<?php
					$date_format = get_post_meta( get_the_ID(), 'lendiz_event_date_format', true );
					if( $event_date ):
				?>
				<div class="event-title-date-time">
					<span class="event-title-date">
						<?php echo !empty( $date_format ) ? date( $date_format, strtotime( $event_date ) ) : $event_date; ?>
					</span>
					<?php
						$event_time = get_post_meta( get_the_ID(), 'lendiz_event_time', true );
					?>
					<span class="event-title-time">
						<?php echo esc_html( $event_time ); ?>
					</span>
				</div>
				<?php endif; ?>
			</div>
		
			<?php if( has_post_thumbnail( get_the_ID() ) ): ?>
			<div class="event-image-wrap">
				<div class="event-img">
					<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
				</div>
			</div> <!-- .team-content-wrap -->
			<?php endif; // if thumb exists ?>
			
			<div class="team-content">
				<?php the_content(); ?>
			</div> <!-- .team-content -->
		
			<?php
				$event_elements_json = get_post_meta( get_the_ID(), 'lendiz_event_event_info_items', true );
				$event_elements = json_decode( stripslashes( $event_elements_json ), true );
				$event_elements = $event_elements['Enable'];
				$event_col = get_post_meta( get_the_ID(), 'lendiz_event_col_layout', true );
				$event_col = $event_col != '' ? explode( "-", $event_col ) : array( '3', '3', '3' );
				$i = 0;
			?>
		
			<div class="event-info-wrap">
				<div class="row">
				
				<?php //foreach start 
					foreach( $event_elements as $elem => $val ) :
					
						switch( $elem ) :
						
							case "event-details" :
				?>
				
								<div class="col-sm-<?php echo esc_attr( $event_col[$i++] ); ?>">
									<div class="event-info">
										<h4><?php echo apply_filters( 'lendiz_event_info_details', esc_html__( 'Event Details', 'lendiz-core' ) ); ?></h4>
										<?php
										
											//Organizer Details
											$organizer = get_post_meta( get_the_ID(), 'lendiz_event_organiser_name', true );
											$organizer_desg = get_post_meta( get_the_ID(), 'lendiz_event_organiser_designation', true );
											if( $organizer ): ?>
											<p class="event-organizer">
												<span class="event-subtitle">
													<strong><?php
														echo apply_filters( 'lendiz_event_organizer_label', esc_html__( 'Organizer', 'lendiz-core' ) ); ?> : 
													</strong>
												</span>
												<?php echo esc_html( $organizer ); ?>
												<?php if( $organizer_desg ): ?>
												<span class="event-organizer-designation"> <?php echo esc_html( $organizer_desg ); ?></span>
												<?php endif; ?>
											</p><?php
											endif;
											
											//Evenet Start Date
											$event_date = get_post_meta( get_the_ID(), 'lendiz_event_start_date', true );
											if( $event_date ): ?>
											<p class="event-start-date">
												<span class="event-subtitle">
													<strong><?php
														echo apply_filters( 'lendiz_event_start_label', esc_html__( 'Start Date', 'lendiz-core' ) ); ?> : 
													</strong>
												</span>
												<?php echo !empty( $date_format ) ? date( $date_format, strtotime( $event_date ) ) : $event_date; ?>
											</p><?php
											endif;
											
											//Evenet End Date
											$end_date = get_post_meta( get_the_ID(), 'lendiz_event_end_date', true );
											if( $end_date ): ?>
											<p class="event-end-date">
												<span class="event-subtitle">
													<strong><?php
														echo apply_filters( 'lendiz_event_end_label', esc_html__( 'End Date', 'lendiz-core' ) ); ?> : 
													</strong>
												</span>
												<?php echo !empty( $date_format ) ? date( $date_format, strtotime( $end_date ) ) : $end_date; ?>
											</p><?php
											endif;
											
											//Event Time
											$event_time = get_post_meta( get_the_ID(), 'lendiz_event_time', true );
											if( $event_time ): ?>
											<p class="event-time">
												<span class="event-subtitle">
													<strong><?php
														echo apply_filters( 'lendiz_event_time_label', esc_html__( 'Time', 'lendiz-core' ) ); ?> : 
													</strong>
												</span>
												<?php echo esc_html( $event_time ); ?>
											</p><?php
											endif;
											
											//Event Cost
											$event_cost = get_post_meta( get_the_ID(), 'lendiz_event_cost', true );
											if( $event_cost ): ?>
											<p class="event-cost">
												<span class="event-subtitle">
													<strong><?php
														echo apply_filters( 'lendiz_event_cost_label', esc_html__( 'Cost', 'lendiz-core' ) ); ?> : 
													</strong>
												</span>
												<?php echo esc_html( $event_cost ); ?>
											</p><?php
											endif;
											
											//Event Custom Link
											$event_link = get_post_meta( get_the_ID(), 'lendiz_event_link', true );
											$event_text = get_post_meta( get_the_ID(), 'lendiz_event_link_text', true );
											$event_target = get_post_meta( get_the_ID(), 'lendiz_event_link_target', true );
											if( $event_link ): 
												$event_text = $event_text ? $event_text : esc_html__( 'Go', 'lendiz-core' );
											?>
											<p class="event-cost">
												<span class="event-subtitle">
													<strong><?php
														echo apply_filters( 'lendiz_event_cost_label', esc_html__( 'More About Event', 'lendiz-core' ) ); ?> : 
													</strong>
												</span>
												<a class="btn btn-default" href="<?php echo esc_url( $event_link ); ?>" target="<?php echo esc_attr( $event_target ); ?>"><?php echo esc_html( $event_text ); ?></a>
											</p><?php
											endif;
											
										?>
									</div><!-- .event-info -->
								</div><!-- .col -->
								
						<?php 
							break; 
							case "event-venue" : 
						?>
								
								<div class="col-sm-<?php echo esc_attr( $event_col[$i++] ); ?>">
									<div class="event-venue">
										<h4><?php echo apply_filters( 'lendiz_event_venue_name', esc_html__( 'Event Venue', 'lendiz-core' ) ); ?></h4>
										
										<?php
										//Event Venue
										$venue_name = get_post_meta( get_the_ID(), 'lendiz_event_venue_name', true );
										if( $venue_name ): ?>
										<p class="event-venue-name">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_venue_label', esc_html__( 'Venue', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $venue_name ); ?>
										</p><?php
										endif;
										
										//Event Address
										$venue_address = get_post_meta( get_the_ID(), 'lendiz_event_venue_address', true );
										if( $venue_address ): ?>
										<p class="event-address">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_venue_address_label', esc_html__( 'Address', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_textarea( $venue_address ); ?>
											<?php echo '<a class="lendiz-popup-gmaps theme-color" href="https://maps.google.com/maps?q='. urlencode( $venue_address ) .'&t=&z=13&ie=UTF8&iwloc=&output=embed"><span class="ti-location-pin"></span></a>'; ?>
										</p><?php
										endif;
										
										//Event Email
										$email = get_post_meta( get_the_ID(), 'lendiz_event_email', true );
										if( $email ): ?>
										<p class="event-email">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_email_label', esc_html__( 'E-mail', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $email ); ?>
										</p><?php
										endif;
										
										//Event Phone
										$phone = get_post_meta( get_the_ID(), 'lendiz_event_phone', true );
										if( $phone ): ?>
										<p class="event-phone">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_phone_label', esc_html__( 'Phone', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $phone ); ?>
										</p><?php
										endif;
										
										//Event Website
										$website = get_post_meta( get_the_ID(), 'lendiz_event_website', true );
										if( $website ): ?>
										<p class="event-website">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_website_label', esc_html__( 'Website', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<a href="<?php echo esc_url( $website ); ?>" target="_blank"><?php echo esc_url( $website ); ?></a>
										</p><?php
										endif;
										
										?>
									</div>
								</div><!-- .col -->
						
						<?php 
							break; 
							case "event-map" : 
						?>

								<div class="col-sm-<?php echo esc_attr( $event_col[$i++] ); ?>">
									<div class="event-map">
										<?php
										$map_type = get_post_meta( get_the_ID(), 'lendiz_event_gmap_type', true );
										$map_height = get_post_meta( get_the_ID(), 'lendiz_event_gmap_height', true );
										$map_height = !empty( $map_height ) ? $map_height : '400';
										if( $map_type == 'normal' ){
											$venue_address = get_post_meta( get_the_ID(), 'lendiz_event_venue_address', true );
											echo '<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="'. esc_attr( $map_height ) .'" id="gmap_canvas" src="https://maps.google.com/maps?q='. urlencode( $venue_address ) .'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:'. esc_attr( $map_height ) .'px;}.gmap_canvas {overflow:hidden;background:none!important;height:'. esc_attr( $map_height ) .'px;}</style></div>';
										}else{
											$lat = get_post_meta( get_the_ID(), 'lendiz_event_gmap_latitude', true );
											if( $lat ){
											wp_enqueue_script( 'lendiz-core-gmaps' );
											$lang = get_post_meta( get_the_ID(), 'lendiz_event_gmap_longitude', true );
											$marker = get_post_meta( get_the_ID(), 'lendiz_event_gmap_marker', true );
											$map_style = get_post_meta( get_the_ID(), 'lendiz_event_gmap_style', true );
											?>
				
											<div id="lendizgmap" class="lendizgmap" style="width:100%;height:<?php echo absint( $map_height ); ?>px;" data-map-lat="<?php echo esc_attr( $lat ); ?>" data-map-lang="<?php echo esc_attr( $lang ); ?>" data-map-style="<?php echo esc_attr( $map_style ); ?>" data-map-marker="<?php echo esc_url( $marker ); ?>"></div>

										<?php 
											} // latitude exists
										} //maptype = api 
										?>
									</div><!-- .event-map -->
								</div><!-- .col -->
								
								
						<?php 
							break; 
							case "event-form" : 
						?>
					
								<?php 
									$contact = get_post_meta( get_the_ID(), 'lendiz_event_contact_form', true );
									if( $contact ):
								?>
								<div class="col-sm-<?php echo esc_attr( $event_col[$i++] ); ?>">
									<div class="event-contact">
										<?php echo do_shortcode( $contact ); ?>
									</div><!-- .event-map -->
								</div><!-- .col -->
								<?php endif; // if map meta exists ?>
					
				<?php 
							break;
						endswitch;
					endforeach;//foreach end 
				?>
					
				</div><!-- .row -->
			</div><!-- .event-info-wrap -->

		
		</div><!-- .col -->
	</div><!-- .event -->
<?php
	}else{
	?>
	<div class="row event">
		<div class="col-sm-12 event-inner">

			
			<?php 
				// Check if event exists or not
				$event_date = get_post_meta( get_the_ID(), 'lendiz_event_start_date', true );
				$end_date = get_post_meta( get_the_ID(), 'lendiz_event_end_date', true );
				
				$date_exist = !empty( $end_date ) ? $end_date : $event_date;
				
				if( $date_exist ):
					if( ( time() -( 60*60*24 ) ) > strtotime( $date_exist ) ): 
			?>
				
				<div class="alert alert-warning event-closed" role="alert">
					<span class="fa fa-exclamation-triangle"></span><?php echo apply_filters( 'lendiz_event_close', esc_html__( 'Event closed.', 'lendiz-core' ) ); ?>
				</div>
			<?php 
					endif; // date compare with today
				endif; // $date_exist
			?>

			<?php if( has_post_thumbnail( get_the_ID() ) ): ?>
			<div class="event-image-wrap">
				<div class="event-img">
					<?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) ); ?>
				</div>
			</div> <!-- .team-content-wrap -->
			<?php endif; // if thumb exists ?>
			
			<div class="row">
				<div class="col-sm-8">
					<div class="event-title">
						<?php if( $title_opt ) : ?>
							<h2><?php the_title(); ?></h2>
						<?php endif; // desg exists ?>
					</div><!-- .event-title -->
					<div class="team-content">
						<?php the_content(); ?>
					</div> <!-- .team-content -->
				</div>
				<div class="col-sm-4 pl-lg-4">
					<div class="event-details-wrap">
					<?php

						$event_elements_json = get_post_meta( get_the_ID(), 'lendiz_event_event_info_items', true );
						$event_elements = json_decode( stripslashes( $event_elements_json ), true );
						$event_elements = $event_elements['Enable'];
					
						foreach( $event_elements as $elem => $val ) :
							switch( $elem ) :
								case "event-details" :
								?>
								<div class="event-info">
									<h4><?php echo apply_filters( 'lendiz_event_info_details', esc_html__( 'Event Details', 'lendiz-core' ) ); ?></h4>
									<?php
									
										//Organizer Details
										$organizer = get_post_meta( get_the_ID(), 'lendiz_event_organiser_name', true );
										$organizer_desg = get_post_meta( get_the_ID(), 'lendiz_event_organiser_designation', true );
										if( $organizer ): ?>
										<p class="event-organizer">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_organizer_label', esc_html__( 'Organizer', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $organizer ); ?>
											<?php if( $organizer_desg ): ?>
											<span class="event-organizer-designation"> <?php echo esc_html( $organizer_desg ); ?></span>
											<?php endif; ?>
										</p><?php
										endif;
										
										//Evenet Start Date
										if( $event_date ): ?>
										<p class="event-start-date">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_start_label', esc_html__( 'Start Date', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo !empty( $date_format ) ? date( $date_format, strtotime( $event_date ) ) : $event_date; ?>
										</p><?php
										endif;
										
										//Evenet End Date
										if( $end_date ): ?>
										<p class="event-end-date">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_end_label', esc_html__( 'End Date', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo !empty( $date_format ) ? date( $date_format, strtotime( $end_date ) ) : $end_date; ?>
										</p><?php
										endif;
										
										//Event Time
										$event_time = get_post_meta( get_the_ID(), 'lendiz_event_time', true );
										if( $event_time ): ?>
										<p class="event-time">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_time_label', esc_html__( 'Time', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $event_time ); ?>
										</p><?php
										endif;
										
										//Event Cost
										$event_cost = get_post_meta( get_the_ID(), 'lendiz_event_cost', true );
										if( $event_cost ): ?>
										<p class="event-cost">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_cost_label', esc_html__( 'Cost', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $event_cost ); ?>
										</p><?php
										endif;
										
										//Event Custom Link
										$event_link = get_post_meta( get_the_ID(), 'lendiz_event_link', true );
										$event_text = get_post_meta( get_the_ID(), 'lendiz_event_link_text', true );
										$event_target = get_post_meta( get_the_ID(), 'lendiz_event_link_target', true );
										if( $event_link ): 
											$event_text = $event_text ? $event_text : esc_html__( 'Go', 'lendiz-core' );
										?>
										<p class="event-cost">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_cost_label', esc_html__( 'More About Event', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<a class="btn btn-default" href="<?php echo esc_url( $event_link ); ?>" target="<?php echo esc_attr( $event_target ); ?>"><?php echo esc_html( $event_text ); ?></a>
										</p><?php
										endif;
										
									?>
								</div><!-- .event-info -->
								<?php
								break;
								case "event-venue" :
								?>
									<div class="event-venue">
										<h4><?php echo apply_filters( 'lendiz_event_venue_name', esc_html__( 'Event Venue', 'lendiz-core' ) ); ?></h4>
										
										<?php
										//Event Venue
										$venue_name = get_post_meta( get_the_ID(), 'lendiz_event_venue_name', true );
										if( $venue_name ): ?>
										<p class="event-venue-name">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_venue_label', esc_html__( 'Venue', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $venue_name ); ?>
										</p><?php
										endif;
										
										//Event Address
										$venue_address = get_post_meta( get_the_ID(), 'lendiz_event_venue_address', true );
										if( $venue_address ): ?>
										<p class="event-address">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_venue_address_label', esc_html__( 'Address', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_textarea( $venue_address ); ?>
											<?php echo '<a class="lendiz-popup-gmaps theme-color" href="https://maps.google.com/maps?q='. urlencode( $venue_address ) .'&t=&z=13&ie=UTF8&iwloc=&output=embed"><span class="ti-location-pin"></span></a>'; ?>
										</p><?php
										endif;
										
										//Event Email
										$email = get_post_meta( get_the_ID(), 'lendiz_event_email', true );
										if( $email ): ?>
										<p class="event-email">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_email_label', esc_html__( 'E-mail', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $email ); ?>
										</p><?php
										endif;
										
										//Event Phone
										$phone = get_post_meta( get_the_ID(), 'lendiz_event_phone', true );
										if( $phone ): ?>
										<p class="event-phone">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_phone_label', esc_html__( 'Phone', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<?php echo esc_html( $phone ); ?>
										</p><?php
										endif;
										
										//Event Website
										$website = get_post_meta( get_the_ID(), 'lendiz_event_website', true );
										if( $website ): ?>
										<p class="event-website">
											<span class="event-subtitle">
												<strong><?php
													echo apply_filters( 'lendiz_event_website_label', esc_html__( 'Website', 'lendiz-core' ) ); ?> : 
												</strong>
											</span>
											<a href="<?php echo esc_url( $website ); ?>" target="_blank"><?php echo esc_url( $website ); ?></a>
										</p><?php
										endif;
										
										?>
									</div>

									<?php
										$contact_form = get_post_meta( get_the_ID(), 'lendiz_event_contact_form', true );
										if( $contact_form ):
									?>
									<div class="event-contact-wrap">
										<div class="event-contact-title">
											<h4 class="event-form-title"><?php echo esc_html__( 'Event Registration', 'lendiz-core' ); ?></h4>
										</div>
										<div class="event-contact-form">
											<?php echo do_shortcode( $contact_form ); ?>
										</div>
									</div>
									<?php
										endif;

									?>
								<?php
								break;
							endswitch;
						endforeach;//foreach end 
					?>
					</div><!-- .event-details-wrap -->
				</div><!-- .col-sm -->
			</div><!-- .row -->
			<div class="row">
				<div class="col-sm-12">
					<div class="event-map">
						<?php
							$map_type = get_post_meta( get_the_ID(), 'lendiz_event_gmap_type', true );
							$map_height = get_post_meta( get_the_ID(), 'lendiz_event_gmap_height', true );
							$map_height = !empty( $map_height ) ? $map_height : '400';
							if( $map_type == 'normal' ){
								$venue_address = get_post_meta( get_the_ID(), 'lendiz_event_venue_address', true );
								echo '<div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="'. esc_attr( $map_height ) .'" id="gmap_canvas" src="https://maps.google.com/maps?q='. urlencode( $venue_address ) .'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{position:relative;text-align:right;height:500px;}.gmap_canvas {overflow:hidden;background:none!important;height:'. esc_attr( $map_height ) .'px;}</style></div>';
							}else{
								$lat = get_post_meta( get_the_ID(), 'lendiz_event_gmap_latitude', true );
								if( $lat ){
									wp_enqueue_script( 'lendiz-core-gmaps' );
									$lang = get_post_meta( get_the_ID(), 'lendiz_event_gmap_longitude', true );
									$marker = get_post_meta( get_the_ID(), 'lendiz_event_gmap_marker', true );
									$map_style = get_post_meta( get_the_ID(), 'lendiz_event_gmap_style', true );
									?>
		
									<div id="lendizgmap" class="lendizgmap" style="width:100%;height:<?php echo absint( $map_height ); ?>px;" data-map-lat="<?php echo esc_attr( $lat ); ?>" data-map-lang="<?php echo esc_attr( $lang ); ?>" data-map-style="<?php echo esc_attr( $map_style ); ?>" data-map-marker="<?php echo esc_url( $marker ); ?>"></div>
							<?php } // latitude exists
							} // map type = api
						?>
					</div><!-- .event-map -->
					
					<?php
						$schedule_content = get_post_meta( get_the_ID(), 'lendiz_event_schedule_content', true );
						if( $schedule_content ):
							echo do_shortcode( $schedule_content );
						endif;					

						$posts_shares = LendizFamework::lendiz_static_theme_mod('post-social-shares');
						if( $posts_shares ):
					 ?>

					<div class="event-share-wrap">
					<?php
						$post_id = get_the_ID();
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id), 'large' );
					?>
						<ul class="nav social-icons">
							<li><span class="event-share-title"><?php echo esc_html__( 'Share: ', 'lendiz-core' ); ?></span></li>
							<?php 
								foreach ( $posts_shares as $social_share ){
						
									switch( $social_share ){
									
										case "fb": 
									?>
											<li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink( $post_id ) ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" target="blank" class="social-fb share-fb"><i class="ti-facebook"></i></a></li>
										
									<?php
										break; // fb
										case "twitter":
									?>
								
											<li><a href="http://twitter.com/intent/tweet?text=Reading:<?php echo urlencode(get_the_title()); ?>-<?php echo  esc_url( home_url( '/' ) )."/?p=". esc_attr( $post_id ); ?>" class="social-twitter share-twitter" title="<?php esc_html_e( 'Click to send this page to Twitter!', 'lendiz-core' ); ?>" target="_blank"><i class="ti-twitter"></i></a></li>
								
									<?php
										break; // twitter
										case "linkedin":
									?>
								
											<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( the_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>&summary=&source=<?php echo urlencode( get_bloginfo('name') ); ?>" class="social-linkedin share-linkedin" target="blank"><i class="ti-linkedin"></i></a></li>
								
									<?php
										break; // linkedin
										case "pinterest":
									?>
								
										<li><a href="http://pinterest.com/pin/create/button/?url=<?php urlencode( the_permalink() ); ?>&amp;media=<?php echo ( ! empty( $image[0] ) ? $image[0] : '' ); ?>&description=<?php echo urlencode(get_the_title()); ?>" class="social-pinterest share-pinterest" target="blank"><i class="ti-pinterest"></i></a></li>
								
									<?php
										break; // pinterest
									?>
								
							<?php 
									} //switch
								} // foreach
							?>
						</ul>
					</div>
					<?php endif; ?>
				</div><!-- .col-sm -->
			</div><!-- .row -->
		</div><!-- .event-inner -->
	</div><!-- .event-info-wrap -->
	<?php
	}
endwhile; // End of the loop.