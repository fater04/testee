<?php
$zozo_theme = wp_get_theme();
if($zozo_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $zozo_theme = wp_get_theme($template_dir);
}
$zozo_theme_version = $zozo_theme->get( 'Version' );
$zozo_theme_name = $zozo_theme->get('Name');
$zozothemes_url = 'https://zozothemes.com/';
$ins_demo_stat = get_theme_mod( 'lendiz_demo_installed' );
$ins_demo_id = get_theme_mod( 'lendiz_installed_demo_id' );
$plugins = TGM_Plugin_Activation::$instance->plugins;
$installed_plugins = get_plugins();
$active_action = '';
if( isset( $_GET['plugin_status'] ) ) {
	$active_action = $_GET['plugin_status'];
}
$tgm_obj = new Lendiz_Zozo_Admin_Page();
?>
<div class="wrap about-wrap welcome-wrap zozothemes-wrap">
	<h1 class="hide"></h1>
	<div class="zozothemes-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "Welcome to", "lendiz" ) . ' ' . '<span>'. $zozo_theme_name .'</span>'; ?></h1>
			<div class="theme-logo"><span class="theme-version"><?php esc_html_e( 'Version', 'lendiz' ); ?> <?php echo esc_attr( $zozo_theme_version ); ?></span></div>
			
			<div class="about-text"><?php echo esc_html__( "We're super excited to have you on board! We hope", "lendiz" ) . ' ' . $zozo_theme_name . ' ' . esc_html__( "can make your website full-fledged and powerful with a little more enjoyable.", "lendiz" ); ?></div>
		</div>
		<h2 class="zozo-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz' ), esc_html__( "System Status", "lendiz" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz-registration' ), esc_html__( "Registration", "lendiz" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Plugin and Demo", "lendiz" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz-support' ),  esc_html__( "Support", "lendiz" ) );		
			?>
		</h2>
	</div>
		
	<div class="zozothemes-required-notices">
		<p class="notice-description">
			<span><?php echo esc_html__( "Step 1: Activate required and recommended theme plugins.", "lendiz" ); ?></span>
			<span><?php echo esc_html__( "Step 2: Import theme full demo or using custom choice.", "lendiz" ); ?></span>
		</p>
	</div>
	
	<?php 
	
		$verfied_stat = 0;
		
		require_once LENDIZ_ADMIN . '/class.envato-app.php';
		$zea = new Zozo_Envato_API;
		$verfied_stat = $zea->verify_purchase();
		if( !empty( $verfied_stat ) && !is_array( $verfied_stat ) ): 
	?>
	<div class="zozothemes-demo-wrapper zozothemes-install-plugins">
		
		<div class="zozo-col-3">
			<div class="feature-section install-plugins-parent rendered">
			
				<h4><?php esc_html_e( 'Theme plugins', 'lendiz' ); ?></h4>
			
				<?php
				
				$plugin_custom_order = array(
					'lendiz-core' 		=> $plugins['lendiz-core'],
					'elementor' 		=> $plugins['elementor'],
					'revslider' 		=> $plugins['revslider'],
					'cost-calculator' 	=> $plugins['cost-calculator'],
					'envato-market' 	=> $plugins['envato-market'],					
					'contact-form-7' 	=> $plugins['contact-form-7'],
					'woocommerce' 	    => $plugins['woocommerce']
				);
				$plugins = $plugin_custom_order;
				
				$req_plugs = array();
				
				foreach( $plugins as $plugin ):
					$class = '';
					$plugin_status = '';
					$active_action_class = '';
					$file_path = $plugin['file_path'];
					$plugin_action = $tgm_obj->lendiz_plugin_link( $plugin );
					foreach( $plugin_action as $action => $value ) {
						if( $active_action == $action ) {
							$active_action_class = ' plugin-' .$active_action. '';
						}
					}
					
					$is_plug_act = 'is_plugin_active';
					if( $is_plug_act( $file_path ) ) {
						$plugin_status = 'active';
						$class = 'active';
						$req_plugs[] = esc_html( $plugin['slug'] );
					}
				?>			
				<div class="install-plugin-wrap theme <?php echo esc_attr( $class . $active_action_class ); ?>" data-id="<?php echo esc_attr( $plugin['slug'] ); ?>">
					<div class="install-plugin-inner">
						<div class="theme-screenshot">
							<img src="<?php echo esc_url( $plugin['image_url'] ); ?>" alt="<?php echo esc_attr( $plugin['name'] ); ?>" />
						</div>
						<div class="install-plugin-right">
							<div class="install-plugin-right-inner">
								<?php if( $plugin['required'] ): ?>
								<div class="plugin-required">
									<?php esc_html_e( 'Required', 'lendiz' ); ?>
								</div>
								<?php endif; ?>
								<h3 class="theme-name">
									<?php
									echo esc_html( $plugin['name'] );
									?>
								</h3>
								<?php if( isset( $installed_plugins[$plugin['file_path']] ) ): ?> 
								<div class="plugin-info">
									<?php echo sprintf('Current v%s | %s', $installed_plugins[$plugin['file_path']]['Version'], $installed_plugins[$plugin['file_path']]['Author'] ); ?>
								</div>
								<?php endif; ?>
								<div class="theme-actions--">
									<?php foreach( $plugin_action as $action ) { echo ( ''. $action ); } ?>
								</div>
								<?php if( isset( $plugin_action['update'] ) && $plugin_action['update'] ): ?>
								<div class="theme-update"><?php echo esc_html__('Update Available: Version', 'lendiz'); ?> <?php echo esc_attr( $plugin['version'] ); ?></div>
								<?php endif; ?>
								<div class="plugin-bulk-action-trigger">
									<div class="bulk-action-svg">
										<span class="bulk-action-empty-svg"></span>
										<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
									</div>
								</div>
							</div><!-- .install-plugin-right-inner -->
						</div><!-- .install-plugin-right -->
					</div>
				</div>
				<?php endforeach; ?>
				<div class="plugin-install-loader"><span class="plugin-install-loader-img"><img src="<?php echo esc_url( LENDIZ_ADMIN_URL .'/welcome-page/assets/images/gear.gif' ); ?>" alt="<?php esc_attr_e( 'Loader', 'lendiz' ); ?>"/></span></div>
			</div>
			
			<div class="plugin-bulk-action-all-trigger">
				<span class="bulk-action-txt"><?php esc_html_e( 'Select All', 'lendiz' ); ?></span>
				<div class="bulk-action-svg">
					<span class="bulk-action-empty-svg"></span>
					<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"></circle><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path></svg>
				</div>
			</div>
			
			<?php
				$t_req_plugins = array( 'lendiz-core', 'elementor' );
				$req_plug_stat = 1;
				foreach( $t_req_plugins as $plug_slug ){
					if( !in_array( $plug_slug, $req_plugs ) ) $req_plug_stat = 0;
				}
				echo '<input type="hidden" id="lendiz-required-plugins-stat" value="'. esc_attr( $req_plug_stat ) .'" />';
			?>
			
			<a href="#" class="button button-primary tgm-custom-plugin-install" data-nounce="<?php echo wp_create_nonce( 'tgmpa-install' ); ?>"><?php esc_html_e( 'Plugin Install and Activate', 'lendiz' ); ?></a>
		</div><!-- .zozo-col-3 -->
		<div class="zozo-col-3 zozo-col-9">
			<div class="feature-section theme-demos rendered theme-demo-installation-wrap">
			
				<h4><?php esc_html_e( 'Theme Demo\'s', 'lendiz' ); ?></h4>
			
			<?php 
				
				//Demo Classic
				$demo_array = array(
					'demo_id' 	=> 'demo',
					'demo_name' => esc_html__( 'Lendiz Main Demo', 'lendiz' ),
					'demo_img'	=> 'demo-1.png',
					'demo_url'	=> 'http://elementor.zozothemes.com/lendiz/',
					'revslider'	=> '3',
					'media_parts'	=> '12',
					'general'	=> array(
						'media' 		=> esc_html__( "Media", "lendiz" ),
						'theme-options' => esc_html__( "Theme Options", "lendiz" ),
						'widgets' 		=> esc_html__( "Widgets", "lendiz" ),
						'revslider' 	=> esc_html__( "Revolution Sliders", "lendiz" ),
						'post' 			=> esc_html__( "All Posts", "lendiz" )
					),
					'pages'=> array(
						'1'		=> esc_html__( "Home 2", "lendiz" ),
						'2'	=> esc_html__( "About Us", "lendiz" ),						
						'3'	=> esc_html__( "Faq", "lendiz" ),
						'4'	=> esc_html__( "Our Services", "lendiz" ),
						'5'	=> esc_html__( "Projects", "lendiz" ),
						'6'	=> esc_html__( "Blog", "lendiz" ),
						'7'	=> esc_html__( "Contact", "lendiz" ),
						'8'	=> esc_html__( "Apply Now", "lendiz" ),
						'9'	=> esc_html__( "Funding", "lendiz" ),
						'10'	=> esc_html__( "Loan Calculator", "lendiz" ),
						'11' 	=> esc_html__( "Home 3", "lendiz" ),
						'12'		=> esc_html__( "Home", "lendiz" ),
						'13' 	=> esc_html__( "Our Team", "lendiz" ),
						'14' 	=> esc_html__( "Blog  Grid", "lendiz" ),
						'15'		=> esc_html__( "Blog  List", "lendiz" ),
						'16' 	=> esc_html__( "Home One Page", "lendiz" ),
						'17'		=> esc_html__( "Projects  Grid", "lendiz" ),
						'18' 	=> esc_html__( "Projects  Slider", "lendiz" ),
						'19' 	=> esc_html__( "Blog  Grid 2", "lendiz" )															
					)
					
				);
				lendiz_demo_div_generater($demo_array, $ins_demo_stat, $ins_demo_id);				
				
			?>
			
		</div>
		</div><!-- .zozo-col-3 -->
		
	</div><!-- .zozothemes-demo-wrapper -->
	<?php
		else:
	?>
	
		<div class="zozo-envato-registration-notes">
			<p><?php printf( '%1$s <a href="%2$s">%3$s</a>',
			esc_html__( 'Please enter your Envato token to complete registration here.', 'lendiz' ),
			esc_url( admin_url( 'admin.php?page=lendiz-registration' ) ),
			esc_html__( 'Register Here', 'lendiz' )
			); ?></p>
		</div>
	
	<?php endif; //verfied_stat ?>
	
	<div class="zozothemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "lendiz" ) . ' ' . $zozo_theme_name . '.'; ?></p>
    </div>
</div>
<?php

function lendiz_req_plugins_list( $val = array(), $return = false ){
	static $req_plugins;
	if( $return ) return $req_plugins;
	$req_plugins = $val;
}

function lendiz_demo_div_generater($demo_array, $ins_demo_stat, $ins_demo_id){
	$demo_class = '';
	if( $ins_demo_stat == 1 ){
		if( $ins_demo_id == $demo_array['demo_id'] ){
			$demo_class .= ' demo-actived';
		}else{
			$demo_class .= ' demo-inactive';
		}
	}else{
		$demo_class .= ' demo-active';
	}
	
	$revslider = isset( $demo_array['revslider'] ) && $demo_array['revslider'] != '' ? $demo_array['revslider'] : '';
	$media_parts = isset( $demo_array['media_parts'] ) && $demo_array['media_parts'] != '' ? $demo_array['media_parts'] : '';
	
?>
	<div class="install-plugin-wrap theme zozothemes-demo-item<?php echo esc_attr( $demo_class ); ?>">
		<div class="install-plugin-inner">
		
			<div class="zozo-demo-import-loader zozo-preview-<?php echo esc_attr( $demo_array['demo_id'] ); ?>"><img src="<?php echo esc_url( LENDIZ_ADMIN_URL .'/welcome-page/assets/images/gear.gif' ); ?>" alt="<?php esc_attr_e( 'Loader', 'lendiz' ); ?>"/><!--<i class="dashicons dashicons-admin-generic"></i>--></div>
		
			<div class="theme-screenshot zozotheme-screenshot">
				<a href="<?php echo esc_url( $demo_array['demo_url'] ); ?>" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/admin/welcome-page/assets/images/demo/' . $demo_array['demo_img'] ); ?>" /></a>
			</div>
			<div class="install-plugin-right">
				<div class="install-plugin-right-inner">
					<h3 class="theme-name" id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>"><?php echo esc_attr( $demo_array['demo_name'] ); ?></h3>
					
					<a href="#" class="theme-demo-install-custom"><?php esc_html_e( "Custom Choice", "lendiz" ); ?></a>
					
					<div class="theme-demo-install-parts" id="<?php echo esc_attr( 'demo-install-parts-'. $demo_array['demo_id'] ); ?>">
					
						<div class="demo-install-instructions">
							<ul class="install-instructions">
								<li><strong><?php esc_html_e( "General", "lendiz" ); ?></strong></li>
								<li><?php esc_html_e( 'Choose "Media" -> All the media\'s are ready to be import.', "lendiz" ); ?></li>
								<li><?php esc_html_e( 'Choose "Theme Options" -> Theme options are ready to be import.', "lendiz" ); ?></li>
								<li><?php esc_html_e( 'Choose "Widgets" -> Custom sidebars and widgets are ready to be import.', "lendiz" ); ?></li>
								<?php if( $revslider ) : ?>
								<li><?php esc_html_e( 'Choose "Revolution Sliders" -> Revolution slides are ready to be import.', "lendiz" ); ?></li>
								<?php endif; ?>
								<li><?php esc_html_e( 'Choose "All Posts" -> Posts, menus, custom post types are ready to be import.', "lendiz" ); ?></li>
								<li><p class="lead"><strong>*</strong><?php esc_html_e( 'If you check "All Posts" and Uncheck any of page, then menu will not imported.', "lendiz" ); ?></p></li>
								
								<li><strong><?php esc_html_e( "Pages", "lendiz" ); ?></strong></li>
								<li><?php esc_html_e( 'Choose pages which you want to show on your site. If you choose all the pages and check "All Post" menu will be import. If any one will not check even page or All posts, then menu will not import.', "lendiz" ); ?></li>
							</ul>
						</div>
					
						<div class="zozo-col-3">
							<h5><?php esc_html_e( "General", "lendiz" ); ?></h5>
							<?php
							if( isset( $demo_array['general'] )	 ){
								echo '<ul class="general-install-parts-list">';
								foreach( $demo_array['general'] as $key => $value ){
									echo '<li><input type="checkbox" value="'. esc_attr( $key ) .'" data-text="'. esc_attr( $value ) .'" /> '. esc_html( $value ) .'</li>';
								}
								echo '</ul>';
							}						
							?>
						</div><!-- .zozo-col-3 -->
						<div class="zozo-col-3">
							<h5><?php esc_html_e( "Pages", "lendiz" ); ?></h5>
							<?php
							if( isset( $demo_array['pages'] )	 ){
								echo '<ul class="page-install-parts-list">';
								foreach( $demo_array['pages'] as $key => $value ){
									echo '<li><input type="checkbox" value="'. esc_attr( $key ) .'" data-text="'. esc_attr( $value ) .'" /> '. esc_html( $value ) .'</li>';
								}
								echo '</ul>';
							}						
							?>
						</div><!-- .zozo-col-3 -->
						<a href="#" class="theme-demo-install-checkall"><?php esc_html_e( "Check/Uncheck All", "lendiz" ); ?></a>
						<p><?php esc_html_e( "Leave empty/uncheck all to full install.", "lendiz" ); ?></p>
					</div><!-- .theme-demo-install-parts -->
					<div class="theme-actions theme-buttons">
						<a class="button button-primary button-install-demo" data-demo-id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>" data-revslider="<?php echo esc_attr( $revslider ); ?>" data-media="<?php echo esc_attr( $media_parts ); ?>" href="#">
						<?php esc_html_e( "Import", "lendiz" ); ?>
						</a>
						<a class="button button-primary button-uninstall-demo" data-demo-id="<?php echo esc_attr( $demo_array['demo_id'] ); ?>" href="#">
						<?php esc_html_e( "Uninstall", "lendiz" ); ?>
						</a>
						<a class="button button-primary" target="_blank" href="<?php echo esc_url( $demo_array['demo_url'] ); ?>">
						<?php esc_html_e( "Preview", "lendiz" ); ?>
						</a>
					</div>
					
					<div class="theme-requirements" data-requirements="<?php 
						printf( '<h2>%1$s</h2> <p>%2$s</p> <h3>%3$s</h3> <ol><li>%4$s</li></ol>', 
							esc_html__( 'WARNING:', 'lendiz' ), 
							esc_html__( 'Importing demo content will give you pages, posts, theme options, sidebars and other settings. This will replicate the live demo. Clicking this option will replace your current theme options and widgets. It can also take a minutes to complete.', 'lendiz' ),
							esc_html__( 'DEMO REQUIREMENTS:', 'lendiz' ),
							esc_html__( 'Memory Limit of 128 MB and max execution time (php time limit) of 300 seconds.', 'lendiz' )
						);
					?>">
					</div>
					
					<div class="installation-progress">
						<p></p>
						<div class="progress">
							<div class="progress-bar progress-bar-success progress-bar-striped active" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					
					<div class="demo-installed-notice-wrap">
					<?php
						printf( '<p class="demo-installed-notice">%4$s <strong><a href="%1$s" class="regenerate-thumbnails-plugin-url" target="_blank" title="%2$s">%2$s</a></strong> %3$s</p>',
							esc_url( admin_url() . 'plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472' ),
							esc_html__( "Regenerate Thumbnails", "lendiz" ),
							esc_html__( "plugin once.", "lendiz" ),
							esc_html__( "This demo was imported well. So for exact image cropping use", "lendiz" )
						); //thickbox
					?>
					</div><!-- .demo-installed-notice-wrap -->
					
				</div><!-- .install-plugin-right-inner -->
			</div><!-- .install-plugin-right -->
		</div>
	</div>
<?php
}