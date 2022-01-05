<?php
$upload_dir = wp_upload_dir();
$filename = $upload_dir['basedir'] . '/custom-fonts/';
if ( !file_exists( $filename ) ) {
	wp_mkdir_p( $filename );
}
add_action('admin_menu', 'register_lendiz_custom_fonts');
 
function register_lendiz_custom_fonts() {
    add_submenu_page(
        'themes.php',
        esc_html__( 'Lendiz Custom Fonts', 'lendiz-core' ),
        esc_html__( 'Lendiz Custom Fonts', 'lendiz-core' ),
        'manage_options',
        'lendiz-custom-fonts',
        'lendiz_custom_fonts_submenu_page_callback' );
}
function lendiz_custom_fonts_submenu_page_callback() {
	require_once( LENDIZ_CORE_DIR . 'custom-font-code/custom-fonts-uploads.php' );
}

add_action( 'wp_ajax_lendiz_custom_font_del', 'lendiz_custom_font_deletion' );
add_action( 'wp_ajax_nopriv_lendiz_custom_font_del', 'lendiz_custom_font_deletion' );
function lendiz_custom_font_deletion(){
	$nonce = esc_attr( $_POST['f_nounce'] );  
    if ( ! wp_verify_nonce( $nonce, 'lendiz-font-nounce' ) )
        die ( esc_html__( 'Busted', 'lendiz-core' ) );
		
		
	$font_id = "'". esc_attr( $_POST['font_id'] ) ."'";
	$t_font_id = esc_attr( $_POST['font_id'] );
	
	$destination = wp_upload_dir();
	$destination_path = $destination['basedir'] . '/custom-fonts/' . $t_font_id;
	
	$custom_fonts_names = get_option( 'lendiz_custom_fonts_names' );
	
	if ( array_key_exists( $font_id, $custom_fonts_names ) ){
		unset($custom_fonts_names[$font_id]);
		update_option( 'lendiz_custom_fonts_names', $custom_fonts_names );
		rmdir_recurse( $destination_path );
		
		$result['type'] = 'success';
		$result['res'] = esc_html__( 'Font Deleted', 'lendiz-core' );
	}else{
		$result['type'] = 'failed';
		$result['res'] = esc_html__( 'Failed to delete.', 'lendiz-core' );
	}
	$result = json_encode($result);
    echo $result;
	die();
}
function rmdir_recurse($path) {
    $path = rtrim($path, '/').'/';
    $handle = opendir($path);
    while(false !== ($file = readdir($handle))) {
        if($file != '.' and $file != '..' ) {
            $fullpath = $path.$file;
            if(is_dir($fullpath)) rmdir_recurse($fullpath); else unlink($fullpath);
        }
    }
    closedir($handle);
    rmdir($path);
}
function lendiz_custom_fonts_table(){
	$custom_fonts_names = get_option( 'lendiz_custom_fonts_names' );
	$i = 1;
	if( $custom_fonts_names != '' ){
		echo '<table class="widefat fixed custom-fonts-table" cellspacing="0">
				<tr>
					<th>'. esc_html__( 'Sno', 'lendiz-core' ) .'</th>
					<th>'. esc_html__( 'Font Name', 'lendiz-core' ) .'</th>
					<th>'. esc_html__( 'Delete', 'lendiz-core' ) .'</th>
				</tr>';
	
		foreach($custom_fonts_names as $key => $val){
			echo '<tr>';
				echo '<td>'. $i .'</td>';
				echo '<td>'. $key .'</td>';
				echo '<td><a href="#" class="lendiz-cus-font-del" data-font="'. esc_attr( $key ) .'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';
			echo '</tr>';
			$i++;
		}
	}
}