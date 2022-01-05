<?php
/**
 * The trigger customize control extends the WP_Customize_Control class.  This class allows
 */
 
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Trigger customize control.
 */
class Trigger_Custom_control extends WP_Customize_Control{

	public $type = 'trigger';

	public function render_content(){
		?>
		<div class="lendiz-customizer-controls-fetching-fields" id="fetching-fields-<?php echo esc_attr($this->id); ?>">
			<img class="lendiz-customizer-controls-loader" id="<?php echo esc_attr($this->id); ?>" src="<?php echo LENDIZ_ASSETS . '/images/infinite-loder.gif'; ?>" alt="<?php echo esc_attr($this->id); ?>" />
			<p><?php esc_html_e( 'Loading options..', 'lendiz' ); ?><span>.</span></p>
		<?php
	}
}