<?php
/**
* ThemeThreads Slider Param
*/
if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
 * [themethreads_param_subheading description]
 * @method themethreads_param_subheading
 * @param  [type]               $settings [description]
 * @param  [type]               $value    [description]
 * @return [type]                         [description]
 */
vc_add_shortcode_param( 'themethreads_slider', 'themethreads_param_slider' );
function themethreads_param_slider( $settings, $value ) {

	$value = htmlspecialchars( $value );

	$min  = isset( $settings['min'] ) ? $settings['min'] : '';
	$max  = isset( $settings['max'] ) ? $settings['max'] : '';
	$step = isset( $settings['step'] ) ? $settings['step'] : '';

	return '<div class="themethreads-slider" data-min="' . $min . '" data-max="' . $max . '" data-step="' . $step . '"><div class="themethreads-handle ui-slider-handle"></div></div>
			<input name="' . $settings['param_name']
	       . '" class="wpb_vc_param_value themethreads-sliderinput '
	       . $settings['param_name'] . ' ' . $settings['type']
	       . '" type="hidden" value="' . $value . '"/>';
}