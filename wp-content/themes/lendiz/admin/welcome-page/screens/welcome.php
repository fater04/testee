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
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz-registration' ), esc_html__( "Registration", "lendiz" ) );
			printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=lendiz-installation' ), esc_html__( "Plugin and Demo", "lendiz" ) );
			printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', esc_html__( "Support", "lendiz" ) );
			?>
		</h2>
	</div>
	
	<div class="zozothemes-support-wrapper clearfix">		
    	<div class="features-section three-col">
        	<div class="feature-item col">
				<h4><span class="dashicons dashicons-admin-generic"></span><?php echo esc_html__( "Submit A Ticket", "lendiz" ); ?></h4>
				<p><?php echo esc_html__( "We would happy to help you solve any issues. If you have any questions, ideas or suggestions, please feel free to contact us.", "lendiz" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', 'https://zozothemes.ticksy.com', esc_html__( "Submit A Ticket", "lendiz" ) ); ?>
            </div>
            <div class="feature-item col">
				<h4><span class="dashicons dashicons-book-alt"></span><?php echo esc_html__( "Documentation", "lendiz" ); ?></h4>
				<p><?php echo esc_html__( "Our online documentation helps you to learn how to setup and customize your needs with Lendiz. We will launch online documentation soon.", "lendiz" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', $zozothemes_url . '/lendiz/', esc_html__( "Documentation", "lendiz" ) ); ?>
            </div>            
            
            <div class="feature-item col last-item">
				<h4><span class="dashicons dashicons-groups"></span><?php echo esc_html__( "Community Forum", "lendiz" ); ?></h4>
				<p><?php echo esc_html__( "We also have a community forum for user to user interactions. Ask another User!", "lendiz" ); ?></p>
                <?php printf( '<a href="%s" class="button button-large button-primary btn-lg-button" target="_blank">%s</a>', $zozothemescommunity_url . '/', esc_html__( "Community Forum", "lendiz" ) ); ?>
            </div>
        </div>
    </div>
	
    <div class="zozothemes-thanks">
        <hr />
    	<p class="description"><?php echo esc_html__( "Thank you for choosing", "lendiz" ) . ' ' . $zozo_theme_name . '.'; ?></p>
    </div>
</div>