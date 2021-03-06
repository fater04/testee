<?php

add_action( 'widgets_init', 'lendiz_mailchimp_load_widget' );
function lendiz_mailchimp_load_widget() {
	
	register_widget( 'lendiz_mailchimp_widget' );
}
class lendiz_mailchimp_widget extends WP_Widget {
	private $default_failure_message;
	private $default_signup_text;
	private $default_success_message;
	private $default_title;
	private $successful_signup = false;
	private $subscribe_errors;
	private $api_key;
	
	/**
	 * Widget setup.
	 */
	function __construct() {
		/* Widget settings. */
		
		$widget_ops = array( 'classname' => 'lendiz_mailchimp_widget', 'description' => esc_html__('Mailchimp Widget', 'lendiz-core') );
		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'lendiz_mailchimp_widget' );
		
		$this->default_failure_message = esc_html__('There was a problem processing your submission.', 'lendiz-core');
		$this->default_signup_text = esc_html__('Join now!', 'lendiz-core');
		$this->default_success_message = esc_html__('Thank you for joining our mailing list. Please check your email for a confirmation link.', 'lendiz-core');
		$this->default_title = esc_html__('Sign up for our mailing list.', 'lendiz-core');
		$this->api_key = LendizFamework::lendiz_static_theme_mod( 'mailchimp-api' );
		
		/* Create the widget. */
		parent::__construct( 'lendiz_mailchimp_widget', esc_html__( 'Lendiz Mailchimp', 'lendiz-core' ), $widget_ops, $control_ops );
	}
	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract($args);

		echo wp_kses_post( $before_widget );
		echo ( $instance['title'] != '' ? wp_kses_post( $before_title . $instance['title'] . $after_title ) : '' );
			?>	
		<div class="mailchimp-wrapper">
			<form class="zozo-mc-form" id="<?php echo 'zozo-mc-form'; ?>" method="post">
				<?php	
					if( $instance['subtitle'] ) {
				?>	
				<p class="zozo-mc-subtitle"><?php echo stripslashes($instance['subtitle']); ?></p>
				<?php
					}
					if( $instance['collect_first'] ) {
				?>
				<div class="form-group">
					<input type="text" placeholder="<?php esc_html_e('First Name', 'lendiz-core'); ?>" class="form-control first-name" name="zozo_mc_first_name" />
				</div>
				<?php
					}
					if( $instance['collect_last'] ) {
				?>	
				<div class="form-group">
					<input type="text" placeholder="<?php esc_html_e('Last Name', 'lendiz-core'); ?>" class="form-control last-name" name="zozo_mc_last_name" />
				</div>
				<?php	
					}
				?>
				<input type="hidden" name="lendiz_mc_listid" value="<?php echo stripslashes( $instance['current_mailing_list'] ); ?>" />
				
				<div class="input-group">
					<input type="text" class="form-control zozo-mc-email" required="required" id="zozo-mc-email" placeholder="<?php esc_html_e('Email Address', 'lendiz-core'); ?>" name="zozo_mc_email">
					<?php if( $instance['signup_text'] ) : ?>
						<input class="input-group-addon zozo-mc btn btn-default" type="button" name="<?php echo stripslashes($instance['signup_text']); ?>" value="<?php echo stripslashes($instance['signup_text']); ?>" />
					<?php else: ?>
						<button class="input-group-addon zozo-mc btn btn-default"><span class="ti-email"></span></button>
					<?php endif; ?>
				</div>
					
				</form>
				<!--Mailchimp Custom Script-->
			
			<?php
				$success = $instance['success_message'] && $instance['success_message'] != '' ? $instance['success_message'] : esc_html__( 'Success', 'lendiz' );
				$fail = $instance['failure_message'] && $instance['failure_message'] != '' ? $instance['failure_message'] : esc_html__( 'Failed', 'lendiz' );
			?>
				<div class="mc-notice-group" data-success="<?php echo esc_html( $success ); ?>" data-fail="<?php echo esc_html( $fail ); ?>">
					<span class="mc-notice-msg"></span>
				</div><!-- .mc-notice-group -->
			</div><!-- .mailchimp-wrapper -->
			
			<?php
			echo wp_kses_post( $after_widget );
		}
	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['collect_first'] = ! empty($new_instance['collect_first']);
		
		$instance['collect_last'] = ! empty($new_instance['collect_last']);
		
		$instance['current_mailing_list'] = esc_attr($new_instance['current_mailing_list']);
		
		$instance['failure_message'] = esc_attr(stripslashes_deep($new_instance['failure_message']));
		
		$instance['signup_text'] = esc_attr(stripslashes_deep($new_instance['signup_text']));
		
		$instance['success_message'] = esc_attr(stripslashes_deep($new_instance['success_message']));
		
		$instance['subtitle'] = esc_attr(stripslashes_deep($new_instance['subtitle']));
		
		$instance['title'] = esc_attr(stripslashes_deep($new_instance['title']));
		return $instance;
	}
	function form( $instance ) {
	
		$defaults = array( 'title' => '', 'current_mailing_list' => '', 'signup_text' => '', 'collect_first' => '', 'collect_last' => '', 'subtitle' => '', 'success_message' => esc_html__('Success.', 'lendiz-core'), 'failure_message' => esc_html__('Failure.', 'lendiz-core'));
		$instance = wp_parse_args( (array) $instance, $defaults );

		$api_key = $this->api_key;
		if( $api_key ){
			$dc = substr( $api_key, strpos( $api_key, '-' ) + 1 );
			$args = array(
				'headers' => array(
					'Authorization' => 'Basic ' . base64_encode( 'user:'. $api_key )
				)
			);
			$response = wp_remote_get( 'https://'.$dc.'.api.mailchimp.com/3.0/lists/?fields=lists', $args );
			$result = json_decode( wp_remote_retrieve_body( $response ) );
		}
		?>
		<h3><?php echo  esc_html__('General Settings', 'lendiz-core');?></h3>
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'zozo-mc-title' ) ); ?>"><?php esc_html_e('Title:', 'lendiz-core'); ?></label>
			<input  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" type="text" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('current_mailing_list') ); ?>"><?php echo esc_html__('Select a Mailing List :', 'lendiz-core'); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id('current_mailing_list') );?>" name="<?php echo esc_attr( $this->get_field_name('current_mailing_list') ); ?>">
		<?php	
		
			$selected = $instance['current_mailing_list'];
			if( $api_key ){
				if( !empty( $result ) && !empty( $result->lists) ) {
					foreach( $result->lists as $list ){			
			?>	
					<option <?php echo ( $selected == $list->id ? ' selected="selected" ' : '' ); ?>value="<?php echo esc_attr( $list->id ); ?>"><?php echo esc_attr( $list->name ); ?></option>
			<?php
					}
				}
			}
		?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('signup_text') ); ?>"><?php echo esc_html__('Sign Up Button Text :', 'lendiz-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('signup_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('signup_text') ); ?>" value="<?php echo esc_attr( $instance['signup_text'] ); ?>" type="text"  />
		</p>
		<h3><?php echo esc_html__('Personal Information', 'lendiz-core'); ?></h3>
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('collect_first') ); ?>" name="<?php echo esc_attr( $this->get_field_name('collect_first') ); ?>" <?php echo checked($instance['collect_first'], true, false); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id('collect_first') ); ?>"><?php echo esc_html__('Collect first name.', 'lendiz-core'); ?></label>
			<br />
			<input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('collect_last') ); ?>" name="<?php echo esc_attr( $this->get_field_name('collect_last') ); ?>" <?php echo checked($instance['collect_last'], true, false); ?> />
			<label><?php echo esc_html__('Collect last name.', 'lendiz-core'); ?></label>
		</p>
		<h3><?php echo esc_html__('Notifications', 'lendiz-core'); ?></h3>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>"><?php echo esc_html__('Sub Title:', 'lendiz-core'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ); ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle') ); ?>"><?php echo esc_attr( $instance['subtitle'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('success_message') ); ?>"><?php echo esc_html__('Success Message:', 'lendiz-core'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('success_message') ); ?>" name="<?php echo esc_attr( $this->get_field_name('success_message') ); ?>"><?php echo esc_attr( $instance['success_message'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('failure_message') ); ?>"><?php echo esc_html__('Failure Message:', 'lendiz-core'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('failure_message') ); ?>" name="<?php echo esc_attr( $this->get_field_name('failure_message') ); ?>"><?php echo esc_attr( $instance['failure_message'] ); ?></textarea>
		</p>
	<?php

	}
		
}

if( ! function_exists('lendiz_mailchimp') ) {
	function lendiz_mailchimp(){

		$nonce = $_POST['nonce'];
	  
		if ( ! wp_verify_nonce( $nonce, 'lendiz-mailchimp' ) )
			die ( esc_html__( 'Busted', 'lendiz' ) );
		
		$list_id = isset( $_POST['lendiz_mc_listid'] ) ? $_POST['lendiz_mc_listid'] : '';
		$first_name = isset( $_POST['zozo_mc_first_name'] ) ? $_POST['zozo_mc_first_name'] : '';
		$last_name = isset( $_POST['zozo_mc_last_name'] ) ? $_POST['zozo_mc_last_name'] : '';
		$email = isset( $_POST['zozo_mc_email'] ) ? $_POST['zozo_mc_email'] : '';
		$success = isset( $_POST['lendiz_mc_success'] ) ? $_POST['lendiz_mc_success'] : '';
		
		if( $email == '' || $list_id == '' ){
			die ( 'failed' );
		}
		
		$memberID = md5( strtolower( $email ) );

		$api_key = LendizFamework::lendiz_static_theme_mod( 'mailchimp-api' );
		
		$dc = substr( $api_key, strpos( $api_key, '-' ) + 1 );
		
		$extra_args = array(
			'email_address' => esc_attr( $email ),
			'status' => 'subscribed',
			'merge_fields'  => [
				'FNAME'     => esc_attr( $first_name ),
				'LNAME'     => esc_attr( $last_name )
			]		
		);
		
		$args = array(
			'method' => 'PUT',
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( 'user:'. $api_key )
			),
			'body' => json_encode( $extra_args )
		);
		 
		$response = wp_remote_get( 'https://'.$dc.'.api.mailchimp.com/3.0/lists/'. esc_attr( $list_id ) .'/members/'. esc_attr( $memberID ), $args );
		 
		$body = json_decode( $response['body'] );
		 
		if ( $response['response']['code'] == 200 ) {
			echo "success";
		}elseif( $response['response']['code'] == 214 ){
			echo "already";
		}else {
			echo "failure";
		}

		die();
	}
	add_action('wp_ajax_nopriv_zozo-mc', 'lendiz_mailchimp');
	add_action('wp_ajax_zozo-mc', 'lendiz_mailchimp');
}

//Mailchimp Get list id's
if( ! function_exists('lendiz_get_mailchimp_list_ids') ) {
	function lendiz_get_mailchimp_list_ids(){
	
		$api_key = LendizFamework::lendiz_static_theme_mod( 'mailchimp-api' );
		$r_mc_lists = array();
	
		$dc = substr( $api_key, strpos( $api_key, '-' ) + 1 );
		if( $api_key ){
			$args = array(
				'headers' => array(
					'Authorization' => 'Basic ' . base64_encode( 'user:'. $api_key )
				)
			);
			$response = wp_remote_get( 'https://'.$dc.'.api.mailchimp.com/3.0/lists/?fields=lists', $args );
			$result = json_decode( wp_remote_retrieve_body( $response ) );
			
			if( !empty( $result ) && !empty( $result->lists) ) {
				foreach( $result->lists as $list ){		
					$r_mc_lists[ $list->id ] = $list->name;
				}
			}
		}
		return $r_mc_lists; 
	}
}