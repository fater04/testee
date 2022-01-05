<?php
$zozo_theme = wp_get_theme();
if($zozo_theme->parent_theme) {
    $template_dir =  basename( get_template_directory() );
    $zozo_theme = wp_get_theme($template_dir);
}
$zozo_theme_version = $zozo_theme->get( 'Version' );
$zozo_theme_name = $zozo_theme->get('Name');
$zozothemes_url = 'http://docs.zozothemes.com';
$zozothemescommunity_url = 'https://zozothemes.com';
?>
<div class="wrap about-wrap welcome-wrap zozothemes-wrap">
	<h1 class="hide"></h1>
	<div class="zozothemes-welcome-inner">
		<div class="welcome-wrap">
			<h1><?php echo esc_html__( "Welcome to", "lendiz" ) . ' ' . '<span>'. $zozo_theme_name .'</span>'; ?></h1>
			<div class="theme-logo"><span class="theme-version"><?php esc_html_e( 'Version', 'lendiz' ); ?> <?php echo esc_attr( $zozo_theme_version ); ?></span></div>
			
			<div class="about-text"><?php echo esc_html__( "Nice!", "lendiz" ) . ' ' . $zozo_theme_name . ' ' . esc_html__( "is now installed and ready to use. Get ready to build your site with more powerful WordPress theme. We hope you enjoy using it.", "lendiz" ); ?></div>
		</div>
		<h2 class="zozo-nav-tab-wrapper nav-tab-wrapper">
			<?php
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz' ), esc_html__( "System Status", "lendiz" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Registration", "lendiz" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz-installation' ), esc_html__( "Plugin and Demo", "lendiz" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz-support' ),  esc_html__( "Support", "lendiz" ) );
			?>
		</h2>
	</div>
	
	<?php 
	
		$verfied_stat = 0;
		
		require_once LENDIZ_ADMIN . '/class.envato-app.php';
		$zea = new Zozo_Envato_API;
		$verfied_stat = $zea->verify_purchase();
		
		$valid_stat = 0;
		$token = '';
		
		if( !empty( $verfied_stat ) && $verfied_stat == 'invalid' ){
			$valid_stat = 0;
			$token = '';
		}elseif( !empty( $verfied_stat ) ){
			$token = $verfied_stat;
			$valid_stat = 1;
		}
	?>
	
		<div class="zozo-envato-registration-form-wrap">
			<p><?php esc_html_e( "Please enter your Envato token to complete registration.", "lendiz" ); ?></p>
			<form id="zozo-envato-registration-form" method="post">
				<div class="form-fields">
					<?php if( $valid_stat ): ?>
						<span class="dashicons dashicons-yes"></span>
					<?php else: ?>
						<span class="dashicons dashicons-admin-network"></span>
					<?php endif; ?>
					<input type="text" name="zozo_registration_tocken" value="<?php echo esc_attr( $token ); ?>">
					<input type="submit" name="submit" id="submit" class="button button-primary button-large" value="<?php echo esc_html_e( "Submit", "lendiz" ); ?>">
				</div>
				<?php if( !empty( $verfied_stat ) && $verfied_stat == 'invalid' ): ?>
					<span class="invalid-token-txt"><?php esc_html_e( "Invalid token id. Please enter valid token id. Refer below instructions.", "lendiz" ); ?></span>
				<?php endif; ?>
			</form>
			
			<div class="registration-token-instruction">
				<ol class="list">
					<li><?php printf( '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s <strong>%5$s</strong> %6$s %7$s %8$s',
					esc_html__( 'Click on this', 'lendiz' ),
					esc_url( 'https://build.envato.com/create-token/?user:username=t&amp;purchase:download=t&amp;purchase:verify=t&amp;purchase:list=t' ),
					esc_html__( 'Generate A Personal Token', 'lendiz' ),
					esc_html__( 'link.', 'lendiz' ),
					esc_html__( 'IMPORTANT:', 'lendiz' ),
					esc_html__( 'You must be logged into the same Themeforest account that purchased', 'lendiz' ),
					esc_html( $zozo_theme_name ),
					esc_html__( 'If you are logged in already, look in the top menu bar to ensure it is the right account. If you are not logged in, you will be directed to login then directed back to the Create A Token Page.', 'lendiz' )
					); ?></li>
					<li><?php 
						printf( '%1$s <strong>%2$s</strong> %3$s <strong>%4$s</strong> %5$s <strong>%6$s</strong>',
						esc_html__( 'Enter a name for your token, then check the boxes for', 'lendiz' ),
						esc_html__( 'View Your Envato Account Username, Download Your Purchased Items, List Purchases You\'ve Made', 'lendiz' ),
						esc_html__( 'and', 'lendiz' ),
						esc_html__( 'Verify Purchases You\'ve Made', 'lendiz' ),
						esc_html__( 'from the permissions needed section. Check the box to agree to the terms and conditions, then click the', 'lendiz' ),
						esc_html__( 'Create Token button', 'lendiz' )
						);
					?></li>
					<li><?php esc_html_e( 'A new page will load with a token number in a box. Copy the token number then come back to this registration page and paste it into the field below and click the Submit button.', 'lendiz' ); ?></li>
					<li><?php esc_html_e( 'You will see a green check mark for success, or a failure message if something went wrong. If it failed, please make sure you followed the steps above correctly.', 'lendiz' ); ?></li>
				</ol>
			</div>
		</div>
	
    <div class="zozothemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "lendiz" ) . ' ' . $zozo_theme_name . '.'; ?></p>
    </div>
</div>