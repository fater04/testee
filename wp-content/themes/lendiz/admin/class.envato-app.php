<?php
/**
 * Envato API class.
 *
 * @package Zozo_Envato_API
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Creates the Envato API connection.
 *
 * @class Zozo_Envato_API
 * @version 1.0.0
 * @since 1.0.0
 */
 
class Zozo_Envato_API {
	
	/**
	 * The Theme Id
	 *
	 * @access private
	 * @since 1.0.0
	 * @var string
	 */
	private $product_id;
	
	/**
	 * The Envato API personal token.
	 *
	 * @access private
	 * @since 1.0.0
	 * @var string
	 */
	private $token;
	
	/**
	 * Sets the token.
	 *
	 * @access public
	 * @param string $token The token.
	 */
	public function set_token( $token ) {
		$this->token = $token;
	}
	
	/**
	 * Sets product id
	 *
	 * @access public
	 * @param string $product_id
	 */
	public function set_product_id( $product_id ) {
		$this->product_id = $product_id;
	}
	
	/**
	 * Query the Envato API.
	 *
	 * @access public
	 * @uses wp_remote_get() To perform an HTTP request.
	 * @since 1.0.0
	 * @param  string $url API request URL, including the request method, parameters, & file type.
	 * @param  array  $args The arguments passed to `wp_remote_get`.
	 * @return array  The HTTP response.
	 */
	public function request( $url ) {

		$args = array(
			'headers' => array(
				'Authorization' => 'Bearer ' . esc_attr( $this->token ),
				'User-Agent' => 'WordPress - Zozo Library',
			),
			'timeout' => 20,
			'headers_data' => false,
		);

		if ( empty( $this->token ) ) {
			return new WP_Error( 'api_token_error', esc_html__( 'An API token is required.', 'lendiz' ) );
		}

		// Make an API request.
		$response = wp_remote_get( esc_url_raw( $url ), $args );

		// Check the response code.
		$response_code    = wp_remote_retrieve_response_code( $response );
		$response_message = wp_remote_retrieve_response_message( $response );

		if ( empty( $response_code ) && is_wp_error( $response ) ) {
			return $response;
		}

		if ( 200 !== $response_code && ! empty( $response_message ) ) {
			return new WP_Error( $response_code, $response_message );
		}
		if ( 200 !== $response_code ) {
			return new WP_Error( $response_code, esc_html__( 'An unknown API error occurred.', 'lendiz' ) );
		}
		$body_data = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( null === $body_data ) {
			return new WP_Error( 'api_error', esc_html__( 'An unknown API error occurred.', 'lendiz' ) );
		}

		return array(
			'response_code' => $response_code,
			'response_message' => $response_message,
			'data' => $body_data
		);
		
	}
	
	public function check_is_envato_author(){
		
		$author_check_url = 'https://api.envato.com/whoami';
		$stat = $this->request( $author_check_url );
		return $stat;

	}
	
	public function check_is_theme_purchase(){
		
		if ( empty( $this->product_id ) ) {
			return new WP_Error( 'product_id_error', esc_html__( 'Product ID is required.', 'lendiz' ) );
		}
		$purchase_check_url = 'https://api.envato.com/v2/market/buyer/download?item_id='. esc_attr( $this->product_id ) .'&shorten_url=true';
		$stat = $this->request( $purchase_check_url );
		return $stat;

	}
	
	public function verify_purchase(){
		
		if( isset( $_POST['zozo_registration_tocken'] ) && !empty( $_POST['zozo_registration_tocken'] ) ){
			$product_id = '26338928';
			$token = sanitize_text_field( $_POST['zozo_registration_tocken'] );

			$this->set_product_id( $product_id );
			$this->set_token( $token );

			$author_verfiy = $this->check_is_envato_author();
			$temp_stat = '';
			if( !is_wp_error( $author_verfiy ) ) {
				$purchase_verfiy = $this->check_is_theme_purchase();
				if( !is_wp_error( $purchase_verfiy ) ) {
					if( isset( $purchase_verfiy['data'] ) && !empty( $author_verfiy['data'] ) ){
						update_option( 'verified_purchase_status', 1 );
						update_option( 'verified_purchase_data', $author_verfiy['data'] );
						update_option( 'verified_token', $token );
						return $token;
					}else{
						$temp_stat = 'invalid';
					}
				}else{
					$temp_stat = 'invalid';
				}
			}else{
				$temp_stat = 'invalid';
			}

			if( $temp_stat == 'invalid' ){
				update_option( 'verified_purchase_status', '' );
				update_option( 'verified_purchase_data', '' );
				update_option( 'verified_token', '' );
				return 'invalid';
			}

		}else{
			$verified_stat = get_option( 'verified_purchase_status' );
			$verified_data = get_option( 'verified_purchase_data' );
			if( $verified_stat == 1 && !empty( $verified_data ) ){
				$token = get_option( 'verified_token' );
				return $token;
			}
		}
		
		return false;
	}
	
}
