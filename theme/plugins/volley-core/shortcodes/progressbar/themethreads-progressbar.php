<?php
/**
* Shortcode Progress Bar
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Progressbar extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug        = 'ld_progressbar';
		$this->title       = esc_html__( 'Progressbar', 'volley-core' );
		$this->description = esc_html__( 'Add progressbars', 'volley-core' );
		$this->icon        = 'fa fa-tasks';

		parent::__construct();
	}

	public function get_params() {

		$this->params = array(


			array(
				'type'        => 'textfield',
				'param_name'  => 'label',
				'heading'     => esc_html__( 'Label', 'volley-core' ),
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'prefix',
				'heading'     => esc_html__( 'Prefix', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding'
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'count',
				'heading'     => esc_html__( 'Bar Counter', 'volley-core' ),
				'admin_label' => true,
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'suffix',
				'heading'     => esc_html__( 'Suffix', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'label_position',
				'heading'    => esc_html__( 'Label position', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Bottom', 'volley-core' )  => 'themethreads-progressbar-values-bottom',
					esc_html__( 'Inside', 'volley-core' )  => 'themethreads-progressbar-values-inside',
				),
				'dependency' => array(
					'element' => 'enable_vertical',
					'value_not_equal_to' => array( 'ld-prgbr-v', 'ld-prgbr-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'number_hide',
				'heading'    => esc_html__( 'Hide Counter number', 'volley-core' ),
				'value'      => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'themethreads-progressbar-count-hide',
				),
				'dependency' => array(
					'element' => 'label_position',
					'value'   => array( 'themethreads-progressbar-values-inside' ),
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'size',
				'heading'    => esc_html__( 'Size', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default ( 15px )', 'volley-core' )     => '',
					esc_html__( 'Thin ( 1px )', 'volley-core' )        => 'themethreads-progressbar-thin',
					esc_html__( 'Thick ( 2px )', 'volley-core' )       => 'themethreads-progressbar-thick',
					esc_html__( 'Small ( 10px )', 'volley-core' )       => 'themethreads-progressbar-sm',
					esc_html__( 'Large ( 20px )', 'volley-core' )       => 'themethreads-progressbar-lg',
					esc_html__( 'Extra Large ( 30px )', 'volley-core' ) => 'themethreads-progressbar-xl',
					esc_html__( 'Custom', 'volley-core' )      => 'themethreads-progressbar-custom',
				),
				'dependency' => array(
					'element' => 'enable_vertical',
					'value_not_equal_to' => array( 'ld-prgbr-v', 'ld-prgbr-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'vertical_height',	
				'heading'     => esc_html__( 'Height', 'volley-core' ),
				'description' => esc_html__( 'Add height with px, for ex. 30px', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-4',
				'dependency' => array(
					'element' => 'size',
					'value' => 'themethreads-progressbar-custom',
				),
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'roundness',
				'heading'    => esc_html__( 'Roundness', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )  => '',
					esc_html__( 'Round', 'volley-core' )    => 'themethreads-progressbar-round',
					esc_html__( 'Circle', 'volley-core' )   => 'themethreads-progressbar-circle',
				),
				'dependency' => array(
					'element' => 'enable_vertical',
					'value_not_equal_to' => array( 'ld-prgbr-v', 'ld-prgbr-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'enable_vertical',
				'heading'     => esc_html__( 'Orientation', 'volley-core' ),
				'description' => esc_html__( 'Select Orientation of the progressbar', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' )  => '',
					esc_html__( 'Circular', 'volley-core' ) => 'ld-prgbr-circle',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'circular_thickness',
				'heading'     => esc_html__( 'Thickness', 'volley-core' ),
				'description' => esc_html__( 'Set thickness to circular progressbar', 'volley-core' ),
				'min'         => 0,
				'max'         => 30,
				'step'        => 1,
				'std'         => 10,
				'dependency'  => array(
					'element' => 'enable_vertical',
					'value'   => 'ld-prgbr-circle',
				),
				'edit_field_class' => 'vc_col-sm-6'	
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'line_cap',
				'heading'     => esc_html__( 'Line cap', 'volley-core' ),
				'description' => esc_html__( 'Select type of the line cap', 'volley-core' ),
				'value' => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Butt', 'volley-core' )    => 'butt',
					esc_html__( 'Round', 'volley-core' )   => 'round',
					esc_html__( 'Square', 'volley-core' )  => 'square',
				),
				'dependency'  => array(
					'element' => 'enable_vertical',
					'value'   => 'ld-prgbr-circle',
				),
				'edit_field_class' => 'vc_col-sm-6'	
			),

			array(
				'type'       => 'dropdown',
				'param_name' => 'percentage_shape',
				'heading'    => esc_html__( 'Percentage Shape', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Round', 'volley-core' )   => 'round',
					esc_html__( 'Circle', 'volley-core' )  => 'circle',
				),
				'dependency' => array(
					'element' => 'enable_vertical',
					'value_not_equal_to' => array( 'ld-prgbr-v', 'ld-prgbr-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'       => 'themethreads_responsive',
				'heading'    => esc_html__( 'Margin', 'volley-core' ),
				'description' => esc_html__( 'Add margins for the element, use px or %', 'volley-core' ),
				'css'        => 'margin',
				'param_name' => 'margin',
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'label_color',
				'heading'    => esc_html__( 'Label Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding'
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'count_color',
				'heading'    => esc_html__( 'Count Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6'
			),

			array(
				'type'       => 'colorpicker',
				'param_name' => 'circular_color',
				'heading'    => esc_html__( 'Color', 'volley-core' ),
				'description' => esc_html__( 'Pick color for gradient of the circular progressbar', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_vertical',
					'value'   => 'ld-prgbr-circle',
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'       => 'colorpicker',
				'param_name' => 'circular_color2',
				'heading'    => esc_html__( 'Color', 'volley-core' ),
				'description' => esc_html__( 'Pick second color for gradient of the circular progressbar', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_vertical',
					'value'   => 'ld-prgbr-circle',
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'       => 'colorpicker',
				'param_name' => 'empty_color',
				'heading'    => esc_html__( 'Empty bar Color', 'volley-core' ),
				'description' => esc_html__( 'Pick fill color for empty space of the circular progressbar', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_vertical',
					'value'   => 'ld-prgbr-circle',
				),
				'edit_field_class' => 'vc_col-sm-4'
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'bar',
				'heading'    => esc_html__( 'Bar Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_vertical',
					'value_not_equal_to' => array( 'ld-prgbr-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'background',
				'heading'    => esc_html__( 'Bar Background Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_vertical',
					'value_not_equal_to' => array( 'ld-prgbr-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'themethreads_colorpicker',
				'param_name' => 'top_border',
				'heading'    => esc_html__( 'Top Border Color', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
				'dependency'  => array(
					'element' => 'enable_vertical',
					'value'   => 'ld-prgbr-v',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
		);

		$this->add_extras();
	}
	
	protected function get_shape() {
		
		$shape = $this->atts['percentage_shape'];
		
		if( empty( $shape ) ) {
			return;
		}
		
		return "style-tooltip $shape";

	}
	
	protected function get_shape_classname() {
		
		$shape = $this->atts['percentage_shape'];
		
		if( empty( $shape ) ) {
			return;
		}
		
		return 'ld-prgbr-details-sm';

	}
	
	protected function get_data_options() {
		
		$opts   = array();
		$count  = $this->atts['count'];
		$suffix = $this->atts['suffix'];
		$prefix = $this->atts['prefix'];
		$orientation = $this->atts['enable_vertical'];

		if( !empty( $count ) ) {
			$opts['value'] = intval( $count );
		}
		if( !empty( $suffix ) ) {
			$opts['suffix'] = $suffix;
		}
		if( !empty( $prefix ) ) {
			$opts['prefix'] = $prefix;
		}
		if( 'ld-prgbr-v' === $orientation ) {
			$opts['orientation'] = 'vertical';
		}
		elseif( 'ld-prgbr-circle' === $orientation ) {
			$opts['orientation'] = 'circle';
		}

		return 'data-progressbar-options=\'' . wp_json_encode( $opts ) . '\'';
		
	}
	
	protected function get_circle_container() {
		
		$orientation = $this->atts['enable_vertical'];
		if( 'ld-prgbr-circle' !== $orientation ) {
			return;
		}
		
		$line_cap_data = $data_empty_fill = $data_fill = '';
		$empty_color = '#e6e6e6';
		
		$thicknes = $this->atts['circular_thickness'];
		$line_cap = $this->atts['line_cap'];
		if( !empty( $line_cap ) ) {
			$line_cap_data = 'data-line-cap="' . $line_cap . '"';	
		}
		
		$color       = $this->atts['circular_color'];
		$color2      = $this->atts['circular_color2'];
		if( !empty( $this->atts['empty_color'] ) ) {
			$empty_color = $this->atts['empty_color'];	
		}

		if( !empty( $color )  && !empty( $color2 ) ) {
			$data_fill = 'data-fill=\'' . wp_json_encode( array( 'gradient' => array( $color, $color2 ) ) ) . '\'';
		}

		$data_empty_fill = 'data-empty-fill="' . $empty_color . '"';
		
		echo '<div class="ld-prgbr-circle-container" data-thickness="' . $thicknes . '"  ' . $line_cap_data . ' ' . $data_fill . ' ' . $data_empty_fill . ' ></div>';
		
	}

	protected function generate_css() {

		$elements = array();
		extract( $this->atts );
		$id = '.' .$this->get_id();

		$elements[ themethreads_implode( '%1$s .themethreads-progressbar-title' ) ]['color'] = $label_color;
		$elements[ themethreads_implode( '%1$s .themethreads-progressbar-value, %1$s .themethreads-progressbar-suffix, %1$s .themethreads-progressbar-prefix' ) ]['color'] = $count_color;
		$elements[ themethreads_implode( '%1$s .themethreads-progressbar-bar' ) ]['background'] = $bar;
		$elements[ themethreads_implode( '%1$s .themethreads-progressbar-inner' ) ]['background'] = $background;
		
		if( !empty( $top_border ) ) {
			$elements[ themethreads_implode( '%1$s .themethreads-progressbar-inner:before' ) ]['background'] = $top_border;
		}
		else {
			$elements[ themethreads_implode( '%1$s .themethreads-progressbar-inner:before' ) ]['background'] = $bar;
		}
		
		if( !empty( $vertical_height ) ) {
			$elements[ themethreads_implode( '%1$s .themethreads-progressbar-inner' ) ]['height'] = $vertical_height;
		}
		
		$responsive_margin = ThemeThreads_Responsive_Param::generate_css( 'margin', $margin, $this->get_id() );
		$elements['media']['margin'] = $responsive_margin;

		$this->dynamic_css_parser( $id, $elements );
	}
}
new LD_Progressbar;