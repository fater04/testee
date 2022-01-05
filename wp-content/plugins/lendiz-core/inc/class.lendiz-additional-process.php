<?php

class lendiz_additional_process {
	
	public static function lendiz_favourite_ip_verify( $postID ){
		// Retrieve post votes IPs
		$meta_IP = get_post_meta( $postID, 'lendiz_favourite_IP', true );
		if( isset( $meta_IP ) && is_array( $meta_IP ) ){
			// Retrieve current user IP
			$ip = class_exists( "LendizFamework" ) ? lendiz_get_remote_ip() : '1';
			// If user has already voted
			if( in_array($ip, $meta_IP) ){
				return true;
			}else{
				return false;
			}
		}
		 
		return false;
	}
	
	public static function lendiz_meta_favourite($postID){
		$output = '';
		$meta_IP = get_post_meta( $postID, 'lendiz_favourite_IP', true );
		$ip = class_exists( "LendizFamework" ) ? lendiz_get_remote_ip() : '1';
		
		$meta_count = get_post_meta( $postID, 'lendiz_post_fav_count', true );
		$meta_count = $meta_count != '' ? $meta_count : '0';
		
		$like_text = esc_html__( 'Likes', 'lendiz' );
		if( $meta_count <= 1 ){
			$like_text = esc_html__( 'Like', 'lendiz' );
		}
		
		$output .= '<ul class="nav post-fav-wrap">';
		if( self::lendiz_favourite_ip_verify( $postID ) ){
			$output .= '<li class="nav-item">
							<a href="#" class="post-fav-done theme-color"><i class="ti-heart"></i> '. esc_attr( $meta_count ) .' '. esc_html( $like_text ) .'</a>
						</li>';
		}else{
			$output .= '<li class="nav-item">
								<a href="#" class="post-favourite" data-id="'. esc_attr( $postID ) .'"><i class="ti-heart"></i> '. esc_attr( $meta_count ) .' '. esc_html( $like_text ) .'</a>
							</li>';
		}
		$output .= '</ul>';
		return $output;
	}
	
	public static function lendiz_meta_favourite_check(){
		// Check for nonce security
		$nonce = $_POST['nonce'];  
		if ( ! wp_verify_nonce( $nonce, 'lendiz-post-fav' ) )
			die ( esc_html__( 'Busted', 'lendiz' ) );
			
		$postID = isset( $_POST['post_id'] ) ? esc_attr( $_POST['post_id'] ) : '';
		
		if( $postID != '' )
		{
			// Retrieve user IP address
			$ip = class_exists( "LendizFamework" ) ? lendiz_get_remote_ip() : '1';
		
			// Get voters'IPs for the current post
			$meta_IP = get_post_meta( $postID, 'lendiz_favourite_IP', true );
			
			// Get votes count for the current post
			$meta_key = '';
			$meta_count = 0;
			$meta_key = 'lendiz_post_fav_count';
			$meta_count = get_post_meta( $postID, $meta_key, true );
	 		
			// Use has already voted ?
			if( ! self::lendiz_favourite_ip_verify( $postID ) )	{
				$meta_IP = array($ip);
				$meta_count = $meta_count != '' ? $meta_count : 0;
				// Save IP and increase votes count
				update_post_meta( $postID, "lendiz_favourite_IP", $meta_IP );
				update_post_meta( $postID, $meta_key, ++$meta_count );
				
			}else{
				array_push($meta_IP, $ip);
				update_post_meta( $postID, "lendiz_favourite_IP", $meta_IP );
				update_post_meta( $postID, $meta_key, ++$meta_count );
			}
			echo self::lendiz_meta_favourite( $postID );
		}
		exit;
	}
	
	public static function lendiz_comment_id_verify( $comment_id ){
		// Retrieve post votes IPs
		$meta_IP = get_comment_meta( $comment_id, 'comment_voted_IP', true );
		if( isset( $meta_IP ) && is_array( $meta_IP ) ){
			// Retrieve current user IP
			$ip = class_exists( "LendizFamework" ) ? lendiz_get_remote_ip() : '1';
			// If user has already voted
			if( array_key_exists($ip, $meta_IP) ){
				return true;
			}else{
				return false;
			}
		}
		 
		return false;
	}
	
	public static function lendiz_comments_like(){
		// Check for nonce security
		$nonce = $_POST['nonce'];  
		if ( ! wp_verify_nonce( $nonce, 'lendiz-comment-like' ) )
			die ( esc_html__( 'Busted', 'lendiz' ) );
		 
		if(isset($_POST['cmt_id']))
		{
			// Retrieve user IP address
			$ip = class_exists( "LendizFamework" ) ? lendiz_get_remote_ip() : '1';
			$comment_id = isset( $_POST['cmt_id'] ) ? esc_attr( $_POST['cmt_id'] ) : '';
			$comment_meta = isset( $_POST['cmt_meta'] ) ? esc_attr( $_POST['cmt_meta'] ) : '1';
			
			
			// Get voters'IPs for the current post
			$meta_IP = get_comment_meta( $comment_id, 'comment_voted_IP', true );
			 
			// Get votes count for the current post
			$meta_key = '';
			$meta_count = 0;
			if( $comment_meta == '1' ){
				$meta_key = 'comment_like_count';
				$meta_count = get_comment_meta( $comment_id, 'comment_like_count', true );
			}else{
				$meta_key = 'comment_dislike_count';
				$meta_count = get_comment_meta( $comment_id, 'comment_dislike_count', true );
			}
	 
			// Use has already voted ?
			if( ! self::lendiz_comment_id_verify( $comment_id ) )
			{
				if( isset( $meta_IP ) && is_array( $meta_IP ) ){
					if( $comment_meta == '1' ){
						$meta_IP[$ip] = 'like';
					}else{
						$meta_IP[$ip] = 'dislike';
					}
				}else{
					if( $comment_meta == '1' ){
						$meta_IP = array( $ip => 'like' );
					}else{
						$meta_IP = array( $ip => 'dislike' );
					}
				}
				$meta_count = $meta_count != '' ? $meta_count : 0;
				// Save IP and increase votes count
				update_comment_meta( $comment_id, "comment_voted_IP", $meta_IP );
				update_comment_meta( $comment_id, $meta_key, ++$meta_count );
	
				// Display count (ie jQuery return value)
				echo self::lendiz_comment_like_out( $comment_id );
			}else{
				
				$like_count = get_comment_meta( $comment_id, 'comment_like_count', true );
				$dislike_count = get_comment_meta( $comment_id, 'comment_dislike_count', true );
				
				if( $comment_meta == '1' ){
					if( $meta_IP[$ip] == 'dislike' ){
						//echo 'going to like'; 
						$meta_IP[$ip] = 'like';
						update_comment_meta( $comment_id, "comment_voted_IP", $meta_IP );
						update_comment_meta( $comment_id, 'comment_dislike_count', --$dislike_count );
						update_comment_meta( $comment_id, 'comment_like_count', ++$like_count );
						echo self::lendiz_comment_like_out( $comment_id );
					}else{
						echo "already liked";
					}
				}else{
					if( $meta_IP[$ip] == 'like' ){
						//echo 'going to dislike';
						$meta_IP[$ip] = 'dislike';
						update_comment_meta( $comment_id, "comment_voted_IP", $meta_IP );
						update_comment_meta( $comment_id, 'comment_like_count', --$like_count );
						update_comment_meta( $comment_id, 'comment_dislike_count', ++$dislike_count );
						echo self::lendiz_comment_like_out( $comment_id );
					}else{
						echo "already disliked";
					}
				}
				
			}
		}
		exit;
	}
	
	public static function lendiz_comment_like_out( $comment_id ){
		$output = '';
		$meta_IP = get_comment_meta( $comment_id, 'comment_voted_IP', true );
		//print_r($meta_IP);
		$ip = class_exists( "LendizFamework" ) ? lendiz_get_remote_ip() : '1';
		
		$meta_count = get_comment_meta( $comment_id, 'comment_like_count', true );
		$meta_dcount = get_comment_meta( $comment_id, 'comment_dislike_count', true );
		$output .= '<ul class="nav comments-like-nav">';
		if( self::lendiz_comment_id_verify( $comment_id ) ){
			if( $meta_IP[$ip] == 'like' ){
				$output .= '<li><span class="ti-heart comment-liked theme-color" data-id="1" data-cmt-id="'. esc_attr( $comment_id ) .'"></span> <span class="comment-likes-count">'. $meta_count .'</span></li><li><span class="ti-heart-broken comment-like" data-id="2" data-cmt-id="'. esc_attr( $comment_id ) .'"></span> <span class="comment-dislikes-count">'. $meta_dcount .'</span></li>';
			}else{
				$output .= '<li><span class="ti-heart comment-like" data-id="1" data-cmt-id="'. esc_attr( $comment_id ) .'"></span> <span class="comment-likes-count">'. $meta_count .'</span></li><li><span class="ti-heart-broken comment-liked theme-color" data-id="2" data-cmt-id="'. esc_attr( $comment_id ) .'"></span> <span class="comment-dislikes-count">'. $meta_dcount .'</span></li>';
			}
		}else{
			$output .= '<li><span class="ti-heart comment-like" data-id="1" data-cmt-id="'. esc_attr( $comment_id ) .'"></span> <span class="comment-likes-count">'. $meta_count .'</span></li><li><span class="ti-heart-broken comment-like" data-id="2" data-cmt-id="'. esc_attr( $comment_id ) .'"></span> <span class="comment-dislikes-count">'. $meta_dcount .'</span></li>';
		}
		$output .= '</ul>';
		return $output;
	}
	
	public static function lendiz_comment_share( $comment_id ){
		$output = '';
		$comments_shares = LendizFamework::lendiz_static_theme_mod( 'comments-social-shares' );
		ob_start();
	?>
		<ul class="nav comments-share social-icons social-circle">
			<?php foreach ( $comments_shares as $social_share ){
			
					switch( $social_share ){
					
						case "fb": 
					?>
							<li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_comment_link( $comment_id ) ); ?>&t=<?php echo urlencode( get_the_title() ); ?>" target="blank" class="social-fb share-fb"><i class="ti-facebook"></i></a></li>
						
					<?php
						break; // fb
						case "twitter":
					?>
				
							<li><a href="http://twitter.com/intent/tweet?text=Reading:<?php echo urlencode( get_the_title() ); ?>-<?php echo urlencode(  get_comment_link( $comment_id ) ); ?>" class="social-twitter share-twitter" target="_blank"><i class="ti-twitter"></i></a></li>
				
					<?php
						break; // twitter
						case "linkedin":
					?>
				
							<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_comment_link( $comment_id ) ); ?>&title=<?php echo urlencode( get_the_title() ); ?>&summary=&source=<?php echo urlencode( get_bloginfo('name') ); ?>" class="social-linkedin share-linkedin" target="_new"><i class="ti-linkedin"></i></a></li>
				
					<?php
						break; // linkedin
						case "pinterest":
					?>
				
						<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_comment_link( $comment_id ) ); ?>&description=<?php echo urlencode( get_the_title() ); ?>" class="social-pinterest share-pinterest" target="blank"><i class="ti-pinterest"></i></a></li>
				
					<?php
						break; // pinterest
					?>
				
			<?php 
					} //switch
				} // foreach?>
		</ul>
	<?php 
		$output .= ob_get_clean();
		return $output;
	}

}

add_action( 'wp_ajax_post_fav_act', array( 'lendiz_additional_process', 'lendiz_meta_favourite_check' ) );
add_action( 'wp_ajax_nopriv_post_fav_act', array( 'lendiz_additional_process', 'lendiz_meta_favourite_check' ) );

if( LendizFamework::lendiz_static_theme_mod( 'comments-like' ) ){
	add_action('wp_ajax_nopriv_comment_like', array( 'lendiz_additional_process', 'lendiz_comments_like' ) );
	add_action('wp_ajax_comment_like', array( 'lendiz_additional_process', 'lendiz_comments_like' ) );
}