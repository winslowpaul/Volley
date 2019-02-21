<?php
/**
* Gradient Params
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
 * [themethreads_param_gradient description]
 * @method themethreads_param_gradient
 * @param  [type]               $settings [description]
 * @param  [type]               $value    [description]
 * @return [type]                         [description]
 */
vc_add_shortcode_param( 'gradient', 'themethreads_param_gradient' );
function themethreads_param_gradient( $settings, $value ) {
	$output = '';

	$output .= sprintf( '<input type="text" class="hidden wpb_vc_param_value" id="%1$s" name="%1$s" value="%2$s">', $settings['param_name'], $value );
	$output .= sprintf( '<input type="text" class="hidden themethreads-gradient-css">', $settings['param_name'] );
	// $output .= sprintf( '<input type="text" class="themethreads-gradient-bg">', $settings['param_name'] );
	$output .= sprintf( '<select class="themethreads-gradient-direction">' . 
		'<option selected value="to right">To Right</option>' .
		'<option value="to top">To Top</option>' .
		'<option value="to bottom">To Bottom</option>' .
		'<option value="to left">To Left</option>' .
		'<option value="to top left">To Top Left</option>' .
		'<option value="to top right">To Top Right</option>' .
		'<option value="to bottom right">To Bottom Right</option>' .
		'<option value="to bottom left">To Bottom Left</option>' .
	'</select>', $settings['param_name'] );
	$output .= sprintf( '<div id="%1$s-gradient" class="themethreads-gradient"></div>', $settings['param_name'] );
	$output .= sprintf( '<div class="themethreads-gradient-preview"><div class="themethreads-gradient-preview-inner"></div></div>', $settings['param_name'] );

	return $output;
}

/**
 * [themethreads_parse_gradient description]
 * @method themethreads_parse_gradient
 * @param  [type]               $value [description]
 * @return [type]                      [description]
 */
function themethreads_parse_gradient( $value, $return = 'array' ) {

		$css = sprintf( 'background-image:%s;%s', $value[0], $value[1] );

		return $css;

}
