<?php 
add_action( 'admin_menu', 'lendiz_admin_menu' );
function lendiz_admin_menu() {
	add_submenu_page(
		'lendiz',
		esc_html__( 'Elementor Settings', 'lendiz' ),
		esc_html__( 'Elementor Settings', 'lendiz' ),
		'administrator',
		'lendiz-addons',
		'classic_elementor_addon_admin_page'
	);
}

function change_admin_menu_name(){
	global $submenu;
	if(isset($submenu['lendiz-addons'])){
		$submenu['lendiz-addons'][0][0] = esc_html__( 'Widgets Settings', 'lendiz-core' );
	}
}
add_action( 'admin_menu', 'change_admin_menu_name');    

function classic_elementor_addon_admin_page(){
	?>
	<div class="lendiz-admin-wrap">
		<h1><?php esc_html_e( 'Lendiz Elementor Addons', 'lendiz-core' ); ?></h1>
		<p class="pa-title-sub"><?php esc_html_e( 'Thank you for using Lendiz Elementor Addons for Elementor. This plugin has been developed by ', 'lendiz-core' ); ?><strong><?php echo esc_html( 'zozothemes' ); ?></strong></p>
		
		<?php
			$shortcode_stat = array(
				'animated-text' 	=> esc_html__( 'Animated Text', 'lendiz-core' ),
				'circle-progress'	=> esc_html__( 'Circle Progress', 'lendiz-core' ),
				'contact-form' 		=> esc_html__( 'Contact Form', 'lendiz-core' ),
				'contact-info' 		=> esc_html__( 'Contact Info', 'lendiz-core' ),
				'content-carousel' 	=> esc_html__( 'Content Carousel', 'lendiz-core' ),
				'counter' 			=> esc_html__( 'Counter', 'lendiz-core' ),
				'day-counter' 		=> esc_html__( 'Day Counter', 'lendiz-core' ),
				'feature-box' 		=> esc_html__( 'Feature Box', 'lendiz-core' ),
				'flip-box' 			=> esc_html__( 'Flip Box', 'lendiz-core' ),
				'google-map' 		=> esc_html__( 'Google Map', 'lendiz-core' ),
				'icon' 				=> esc_html__( 'Icon', 'lendiz-core' ),
				'icon-list' 		=> esc_html__( 'Icon List', 'lendiz-core' ),
				'image-grid' 		=> esc_html__( 'Image Grid', 'lendiz-core' ),
				'modal-popup' 		=> esc_html__( 'Modal Popup', 'lendiz-core' ),
				'pricing-table' 	=> esc_html__( 'Pricing Table', 'lendiz-core' ),
				'section-title' 	=> esc_html__( 'Section Title', 'lendiz-core' ),
				'social-links' 		=> esc_html__( 'Social Links', 'lendiz-core' ),
				'timeline' 			=> esc_html__( 'Timeline', 'lendiz-core' ),
				'timeline-slide' 	=> esc_html__( 'Timeline Slide', 'lendiz-core' ),
				'chart' 			=> esc_html__( 'Chart', 'lendiz-core' ),
				'recent-popular' 	=> esc_html__( 'Recent/Popular Post', 'lendiz-core' ),
				'blog' 				=> esc_html__( 'Blog', 'lendiz-core' ),
				'portfolio' 		=> esc_html__( 'Portfolio', 'lendiz-core' ),
				'team' 				=> esc_html__( 'Team', 'lendiz-core' ),
				'event' 			=> esc_html__( 'Event', 'lendiz-core' ),
				'service' 			=> esc_html__( 'Service', 'lendiz-core' ),
				'testimonial' 		=> esc_html__( 'Testimonial', 'lendiz-core' ),
				'toggle-content' 	=> esc_html__( 'Toggle Content', 'lendiz-core' ),
				'mailchimp' 		=> esc_html__( 'Mailchimp', 'lendiz-core' ),
				'popup-anything' 	=> esc_html__( 'Popup Anything', 'lendiz-core' ),
				'popover' 			=> esc_html__( 'Popover', 'lendiz-core' ),
				'round-tab' 		=> esc_html__( 'Round Tab', 'lendiz-core' )
			);
			
			if ( isset( $_POST['save_lendiz_shortcodes_options'] ) && wp_verify_nonce( $_POST['save_lendiz_shortcodes_options'], 'lendiz_plugin_shortcodes_options' ) ) {
				update_option( 'lendiz_shortcodes', $_POST['lendiz_shortcodes'] );
			}
			$lendiz_shortcodes = get_option('lendiz_shortcodes');
			
		?>
		
		<div class="lendiz-admin-content-wrap">
			<form method="post" action="#" enctype="multipart/form-data" id="lendiz-plugin-form-wrapper">
				<?php wp_nonce_field( 'lendiz_plugin_shortcodes_options', 'save_lendiz_shortcodes_options' ); ?>
				<input class="lendiz-plugin-submit button button-primary" type="submit" value="<?php echo esc_attr__( 'Save', 'lendiz-core' ); ?>" />
				<div class="lendiz-shortcodes-container">
			<?php
				$row = 1;
				foreach( $shortcode_stat as $key => $value ){
				
					$shortcode_name = str_replace( "-", "_", $key );
					if( !empty( $lendiz_shortcodes ) ){
						if( isset( $lendiz_shortcodes[$shortcode_name] ) ){
							$saved_val = 'on';
						}else{
							$saved_val = 'off';
						}
					}else{
						$saved_val = 'on';
					}
					$checked_stat = $saved_val == 'on' ? 'checked="checked"' : '';
				
					if( $row % 4 == 1 ) echo '<div class="lendiz-row">';
					
						echo '
						<div class="lendiz-col-3">
							<div class="element-group">
								<h4>'. esc_html( $value ) .'</h4>
								<label class="switch">
									<input class="switch-checkbox" type="checkbox" name="lendiz_shortcodes['. esc_attr( $shortcode_name ) .']" '. $checked_stat .'>
									<span class="slider round"></span>
								</label>
							</div><!-- .element-group -->
						</div><!-- .lendiz-col-2 -->';
									
					if( $row % 4 == 0 ) echo '</div><!-- .lendiz-row -->';
					$row++;
				}
				
				if( $row % 4 != 1 ) echo '</div><!-- .lendiz-row unexpceted close -->';
			?>
				</div> <!-- .lendiz-shortcodes-container -->
			</form>
		</div><!-- .lendiz-admin-content-wrap -->
		
		<div class="lendiz-customizer-options-wrap">
			<h2><?php esc_html_e( 'Enable/Disable Customizer Auto Refresh Option', 'lendiz-core' ); ?></h2>
			<?php 
				$customizer_auto_load = get_option( 'lendiz_customizer_auto_load' );;
				$checked_stat = $customizer_auto_load == '1' ? 'checked="checked"' : '';
			?>
			<div class="lendiz-customizer-option">
				<label class="switch">
					<input class="switch-checkbox" type="checkbox" <?php echo ''. $checked_stat ?>>
					<span class="slider round"></span>
				</label>
			</div>
			<p><?php esc_html_e( 'If you want to live editor experience, Just turn on this option. No need to auto load customizer editor for every option change means turn off this option.' ); ?></p>
		</div><!-- .lendiz-customizer-options-wrap -->
		
	</div><!-- .lendiz-admin-wrap -->
	<?php
}

add_action('wp_ajax_lendiz-customizer-auto-load', 'lendiz_customizer_auto_load_option');
function lendiz_customizer_auto_load_option(){
	$nonce = $_POST['nonce'];
  
    if ( ! wp_verify_nonce( $nonce, 'lendiz-customizer-#$%&*(' ) )
        die ( esc_html__( 'Busted!', 'lendiz' ) );
	
	$auto_load = isset( $_POST['auto_load'] ) && $_POST['auto_load'] == '1' ? 1 : 0;
	update_option( 'lendiz_customizer_auto_load', $auto_load );
	echo 'success';
	exit;
}