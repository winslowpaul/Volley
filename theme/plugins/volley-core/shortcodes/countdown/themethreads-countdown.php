<?php
/**
* Shortcode Countdown
*/

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Countdown extends LD_Shortcode {

	/**
	 * [$days description]
	 * @var array
	 */
	private $days = array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_countdown';
		$this->title       = esc_html__( 'Countdown', 'volley-core' );
		$this->icon        = 'fa fa-hourglass-half';
		$this->description = esc_html__( 'Add countdown timer', 'volley-core' );

		parent::__construct();
	}

	public function get_params() {

		$this->params = array(

			array(
				'type'       => 'dropdown',
				'param_name' => 'month',
				'heading'    => esc_html__( 'Month', 'volley-core' ),
				'value'      => array(
					esc_html__( 'January', 'volley-core' )   => '1',
					esc_html__( 'February', 'volley-core' )  => '2',
					esc_html__( 'March', 'volley-core' )     => '3',
					esc_html__( 'April', 'volley-core' )     => '4',
					esc_html__( 'May', 'volley-core' )       => '5',
					esc_html__( 'June', 'volley-core' )      => '6',
					esc_html__( 'July', 'volley-core' )      => '7',
					esc_html__( 'August', 'volley-core' )    => '8',
					esc_html__( 'September', 'volley-core' ) => '9',
					esc_html__( 'Octomber', 'volley-core' )  => '10',
					esc_html__( 'November', 'volley-core' )  => '11',
					esc_html__( 'December', 'volley-core' )  => '12',
				),
				'admin_label' => true,
				'edit_field_class' => 'vc_column-with-padding vc_col-sm-4'
			),

			array(
				'type'        => 'dropdown',
				'param_name'  => 'day',
				'heading'     => esc_html__( 'Day', 'volley-core' ),
				'value'       => $this->days,
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-4'
			),

			array(
				'type'        => 'textfield',
				'param_name'  => 'year',
				'heading'     => esc_html__( 'Year', 'volley-core' ),
				'std' 		  => '2018',
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-4'
			),
			
			//Labels
			array(
				'type'       => 'subheading',
				'param_name' => 'sh_label',
				'heading'    => esc_html__( 'Labels', 'volley-core' ),
			),
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'day_label',
				'heading'     => esc_html__( 'Days', 'volley-core' ),
				'description' => esc_html__( '"Days" - label to display on countdown', 'volley-core' ),
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-3'
			),
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'hours_label',
				'heading'     => esc_html__( 'Hours', 'volley-core' ),
				'description' => esc_html__( '"Hours" - label to display on countdown', 'volley-core' ),
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-3'
			),
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'min_label',
				'heading'     => esc_html__( 'Minutes', 'volley-core' ),
				'description' => esc_html__( '"Minutes" - label to display on countdown', 'volley-core' ),
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-3'
			),
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'sec_label',
				'heading'     => esc_html__( 'Seconds', 'volley-core' ),
				'description' => esc_html__( '"Seconds" - label to display on countdown', 'volley-core' ),
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-3'
			),
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'timezone',
				'heading'     => esc_html__( 'Timezone', 'volley-core' ),
				'description' => esc_html__( 'Set timezone accordion to your country', 'volley-core' ),
				'admin_label' => true,
			),

			array(
				'type'        => 'checkbox',
				'param_name'  => 'use_custom_typography',
				'heading'     => esc_html__( 'Customize Typography?', 'volley-core' ),
				'description' => esc_html__( 'Turn on to customize typography, typography tab will appear', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			//Typo Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'fs',
				'heading'     => esc_html__( 'Font Size', 'volley-core' ),
				'description' => esc_html__( 'Example: 20px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
				'dependency' => array(
					'element' => 'use_custom_typography',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'lh',
				'heading'     => esc_html__( 'Line-Height', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_typography',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'fw',
				'heading'     => esc_html__( 'Font Weight', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_typography',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'ls',
				'heading'     => esc_html__( 'Letter Spacing', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-3',
				'dependency' => array(
					'element' => 'use_custom_typography',
					'value'   => 'true',
				),
				'group' => esc_html__( 'Typography', 'volley-core' ),
			),

			array(
				'type' => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'primary_color',
				'heading'    => esc_html__( 'Primary Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type' => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'digits_color',
				'heading'    => esc_html__( 'Digits Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			)

		);

		$this->add_extras();
	}

	protected function get_plugin_opts() {

		$y = ! empty( $this->atts['year'] ) ? $this->atts['year'] : '2017';
		$m = $this->atts['month'];
		$d = $this->atts['day'];

		$opts = array(
			'until' => "$y-$m-$d"
		);
		
		if( ! empty( $this->atts['day_label'] ) ) {
			$opts['daysLabel'] = esc_attr( $this->atts['day_label'] );
		}
		
		if( ! empty( $this->atts['hours_label'] ) ) {
			$opts['hoursLabel'] = esc_attr( $this->atts['hours_label'] );
		}
		
		if( ! empty( $this->atts['min_label'] ) ) {
			$opts['minutesLabel'] = esc_attr( $this->atts['min_label'] );
		}
		
		if( ! empty( $this->atts['sec_label'] ) ) {
			$opts['secondsLabel'] = esc_attr( $this->atts['sec_label'] );
		}
		
		if( ! empty( $this->atts['timezone'] ) ) {
			$opts['timezone'] = esc_attr( $this->atts['timezone'] );
		}

		echo " data-countdown-options='" . wp_json_encode( $opts ) ."'";
	}

	protected function generate_css() {

		// check
		if( empty( $this->atts['primary_color'] ) ) {
			return '';
		}

		extract( $this->atts );
		$elements = array();
		$id = '.' .$this->get_id();

		$elements[ themethreads_implode( '%1$s' ) ]['color'] = $primary_color;

		$elements[ themethreads_implode( '%1$s'  ) ]['font-size'] = !empty( $fs ) ? $fs : '';
		$elements[ themethreads_implode( '%1$s'  ) ]['line-height'] = !empty( $lh ) ? $lh : '';
		$elements[ themethreads_implode( '%1$s'  ) ]['font-weight'] = !empty( $fw ) ? $fw : '';
		$elements[ themethreads_implode( '%1$s'  ) ]['letter-spacing'] = !empty( $ls ) ? $ls : '';

		$elements[ themethreads_implode( '%1$s .countdown-amount'  ) ]['color'] = !empty( $digits_color ) ? $digits_color : '';

		$this->dynamic_css_parser( $id, $elements );
	}

}
new LD_Countdown;