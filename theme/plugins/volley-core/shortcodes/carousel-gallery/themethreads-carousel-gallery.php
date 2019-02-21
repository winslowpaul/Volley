<?php
/**
* Shortcode ThemeThreads Carousel
*/

if( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Carousel_Gallery extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug         = 'ld_carousel_gallery';
		$this->title        = esc_html__( 'Carousel Gallery', 'volley-core' );
		$this->icon         = 'fa fa-arrows';
		$this->description  = esc_html__( 'Create a carousel gallery.', 'volley-core' );

		parent::__construct();
	}

	public function get_params() {
		
		$options = array(
			array(
				'type'        => 'subheading',
				'heading'     => esc_html__( 'Layout', 'volley-core' ),
				'param_name'  => 'sh_layout',
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Initial Index', 'volley-core' ),
				'description' => esc_html__( 'Zero-based index of the initial selected cell.', 'volley-core' ),
				'param_name'  => 'initialindex',
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Cell Align', 'volley-core' ),
				'description' => esc_html__( 'Align cells within the carousel element.', 'volley-core' ),
				'param_name'  => 'cellalign',
				'value'       => array(
					esc_html__( 'Center', 'volley-core' ) => 'center',
					esc_Html__( 'Left', 'volley-core' )   => 'left',
					esc_html__( 'Right', 'volley-core' )  => 'right',
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Fullwidth Side', 'volley-core' ),
				'description' => esc_html__( 'if enabled, will stretch the right side of the carousel to the right egde', 'volley-core' ),
				'param_name'  => 'fullwidthside',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Contain', 'volley-core' ),
				'description' => esc_html__( 'Contains cells to carousel element, to prevent excess scroll at beginning or end. Has no effect if wrapAround: true', 'volley-core' ),
				'param_name'  => 'contain',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Group Cells', 'volley-core' ),
				'description' => esc_html__( 'Groups cells together in slides. Flicking, page dots, and previous/next buttons are mapped to group slides, not individual cells.', 'volley-core' ),
				'param_name'  => 'groupcells',
				'value'       => array(
					esc_html__( 'Yes', 'volley-core' ) => 'yes',
					esc_html__( 'No', 'volley-core' )  => 'no'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'groupcellscustom',
				'heading'     => esc_html__( 'Number or Percent', 'volley-core' ),
				'description' => esc_html__( 'If set to a number, group cells by that number, if set to a percent string, group cells that fit in the percent of the width of the carousel viewport ex. 3 or 80%', 'volley-core' ),
				'dependency' => array(
					'element' => 'groupcells',
					'value' => 'yes',
				),
			),

			//Navigation
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Navigation', 'volley-core' ),
				'description' => esc_html__( 'Creates and enables previous & next buttons.', 'volley-core' ),
				'param_name'  => 'prevnextbuttons',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => 'no',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Append Nav To', 'volley-core' ),
				'description' => esc_html__( 'Append the navigation to other elements in the page.', 'volley-core' ),
				'param_name'  => 'navappend',
				'value'       => array(
					esc_html__( 'Carousel itself', 'volley-core' )  => 'self',
					esc_html__( 'Parent Row', 'volley-core' ) => 'parent_row',
					esc_html__( 'Other Elements', 'volley-core' ) => 'custom_id',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'navappend_id',
				'heading' => esc_html__( 'ID to Append nav', 'volley-core' ),
				'description' => esc_html__( 'Input the id of element to append the navigaion, for ex. #heading-id', 'volley-core' ),
				'dependency'  => array(
					'element' => 'navappend',
					'value'   => 'custom_id'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Pagination dots', 'volley-core' ),
				'description' => esc_html__( 'Creates and enables pagination dots', 'volley-core' ),
				'param_name'  => 'pagenationdots',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => 'no',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'subheading',
				'heading'     => esc_html__( 'Behavior', 'volley-core' ),
				'param_name'  => 'sh_behavior',
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Autoplay', 'volley-core' ),
				'description' => esc_html__( 'Automatically advances to the next cell.', 'volley-core' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Autoplay time', 'volley-core' ),
				'description' => esc_html__( 'i.e. 1500 will advance cells every 1.5 seconds.', 'volley-core' ),
				'param_name'  => 'autoplaytime',
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'yes' )
				)
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Pause AutoPlay On Hover', 'volley-core' ),
				'description' => esc_html__( 'Auto play pause when user hovers over carousel', 'volley-core' ),
				'param_name'  => 'pauseautoplayonhover',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => 'no',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'yes' )
				)
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Draggable', 'volley-core' ),
				'description' => esc_html__( 'Enables dragging and flicking.', 'volley-core' ),
				'param_name'  => 'draggable',
				'value'       => array(
					esc_html__( 'Yes', 'volley-core' ) => '',
					esc_html__( 'No', 'volley-core' )  => 'no'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Free Scroll', 'volley-core' ),
				'description' => esc_html__( 'Enables content to be freely scrolled.', 'volley-core' ),
				'param_name'  => 'freescroll',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel loop', 'volley-core' ),
				'description' => esc_html__( 'Loop for infinite scrolling.', 'volley-core' ),
				'param_name'  => 'wraparound',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Adaptive Height', 'volley-core' ),
				'description' => esc_html__( 'Changes height of carousel to fit height of selected slide.', 'volley-core' ),
				'param_name'  => 'adaptiveheight',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Random Vertical Offset', 'volley-core' ),
				'description' => esc_html__( 'Changes randomly vertical offset for carousel items', 'volley-core' ),
				'param_name'  => 'randomveroffset',
				'value'       => array(
					esc_html__( 'No', 'volley-core' )  => '',
					esc_html__( 'Yes', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),

		);
		foreach( $options as &$param ) {
			$param['group'] = esc_html__( 'Carousel Options', 'volley-core' );
		}
		
		$nav = array(
			array(
				'type'        => 'subheading',
				'heading'     => esc_html__( 'Navigation', 'volley-core' ),
				'param_name'  => 'sh_nav',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'navarrow',
				'heading' => esc_html__( 'Style', 'volley-core' ),
				'description' => esc_html__( 'Select any navigation style', 'volley-core' ),
				'value' => array(
					esc_html__( 'None', 'volley-core' )    => '',
					esc_html__( 'Default', 'volley-core' ) => '1',
					esc_html__( 'Style 2', 'volley-core' ) => '2',
					esc_html__( 'Style 3', 'volley-core' ) => '3',
					esc_html__( 'Style 4', 'volley-core' ) => '4',
					esc_html__( 'Style 5', 'volley-core' ) => '5',
					esc_html__( 'Style 6', 'volley-core' ) => '6',
					esc_html__( 'Custom', 'volley-core' )  => 'custom'
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type' => 'textarea_safe',
				'param_name' => 'prev',
				'heading' => esc_html__( 'Prev Button', 'volley-core' ),
				'description' => esc_html__( 'Add here markup for previous button for ex <i class=\"fa fa-angle-left\"></i>', 'volley-core' ),
				'dependency' => array(
					'element' => 'navarrow',
					'value'   => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type' => 'textarea_safe',
				'param_name' => 'next',
				'heading' => esc_html__( 'Next Button', 'volley-core' ),
				'description' => esc_html__( 'Add here markup for next button for ex <i class=\"fa fa-angle-right\"></i>', 'volley-core' ),
				'dependency' => array(
					'element' => 'navarrow',
					'value'   => 'custom',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			
			
			array(
				'type'        => 'dropdown',
				'param_name'  => 'navsize',
				'heading'     => esc_html__( 'Size', 'volley-core' ),
				'description' => esc_html__( 'Select any navigation size', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Default', 'volley-core' )     => 'carousel-nav-md',
					esc_html__( 'Small', 'volley-core' )       => 'carousel-nav-sm',
					esc_html__( 'Large', 'volley-core' )       => 'carousel-nav-lg',
					esc_html__( 'Extra Large', 'volley-core' ) => 'carousel-nav-xl',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'navfill',
				'heading'     => esc_html__( 'Fill', 'volley-core' ),
				'description' => esc_html__( 'Select any navigation fill', 'volley-core' ),
				'value'       => array(
					esc_html__( 'None', 'volley-core' )  => '',
					esc_html__( 'Bordered', 'volley-core' ) => 'carousel-nav-bordered',
					esc_html__( 'Solid', 'volley-core' )    => 'carousel-nav-solid',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'navshape',
				'heading'     => esc_html__( 'Shape', 'volley-core' ),
				'description' => esc_html__( 'Select any navigation shape', 'volley-core' ),
				'value'       => array(
					esc_html__( 'None', 'volley-core' )      => '',
					esc_html__( 'Rectangle', 'volley-core' ) => 'carousel-nav-rectangle',
					esc_html__( 'Square', 'volley-core' )    => 'carousel-nav-square',
					esc_html__( 'Circle', 'volley-core' )    => 'carousel-nav-circle',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'navshadow',
				'heading'     => esc_html__( 'Shadow', 'volley-core' ),
				'description' => esc_html__( 'Select any navigation shadow', 'volley-core' ),
				'value'       => array(
					esc_html__( 'None', 'volley-core' )            => '',
					esc_html__( 'Shadow', 'volley-core' )          => 'carousel-nav-shadowed',
					esc_html__( 'Shadow on hover', 'volley-core' ) => 'carousel-nav-shadowed-onhover',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'navhalign',
				'heading' => esc_html__( 'Alignment', 'volley-core' ),
				'description' => esc_html__( 'Select alignment for the navigation', 'volley-core' ),
				'value' => array(
					esc_html__( 'Left', 'volley-core' ) => 'carousel-nav-left',
					esc_html__( 'Center', 'volley-core' ) => 'carousel-nav-center',
					esc_html__( 'Right', 'volley-core' ) => 'carousel-nav-right',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'navfloated',
				'heading' => esc_html__( 'Floated', 'volley-core' ),
				'description' => esc_html__( 'Select yes if you want nav to be floated', 'volley-core' ),
				'value' => array(
					esc_html__( 'No', 'volley-core' ) => '',
					esc_html__( 'Yes', 'volley-core' ) => 'carousel-nav-floated',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'navvalign',
				'heading'     => esc_html__( 'Vertical Position', 'volley-core' ),
				'description' => esc_html__( 'Select vertical position for the navigation', 'volley-core' ),
				'value' => array(
					esc_html__( 'Default', 'volley-core' )    => '',
					esc_html__( 'Top', 'volley-core' )    => 'carousel-nav-top',
					esc_html__( 'Middle', 'volley-core' ) => 'carousel-nav-middle',
					esc_html__( 'Bottom', 'volley-core' ) => 'carousel-nav-bottom',
				),
				'dependency'  => array(
					'element' => 'navfloated',
					'value'   => 'carousel-nav-floated'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'navdirection',
				'heading'     => esc_html__( 'Direction', 'volley-core' ),
				'description' => esc_html__( 'Select direction for the navigation', 'volley-core' ),
				'value' => array(
					esc_html__( 'Default', 'volley-core' )    => '',
					esc_html__( 'Vertical', 'volley-core' ) => 'carousel-nav-vertical',
				),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'navline',
				'heading'     => esc_html__( 'Add line?', 'volley-core' ),
				'description' => esc_html__( 'Select yes to display a line between buttons', 'volley-core' ),
				'value' => array(
					esc_html__( 'No', 'volley-core' )    => '',
					esc_html__( 'Yes', 'volley-core' ) => 'carousel-nav-line-between',
				),
				'dependency'  => array(
					'element' => 'navdirection',
					'value'   => 'carousel-nav-vertical'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'textarea',
				'param_name'  => 'navoffset',
				'heading'     => esc_html__( 'Offset', 'volley-core' ),
				'description' => esc_html__( 'Add here nav offset values, separated by comma, for ex. right:22%', 'volley-core' ),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'prevoffset',
				'heading'     => esc_html__( 'Previous Button Offset', 'volley-core' ),
				'description' => esc_html__( 'Add here previous button offset values for ex. 10px', 'volley-core' ),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'nextoffset',
				'heading'     => esc_html__( 'Next Button Offset', 'volley-core' ),
				'description' => esc_html__( 'Add here next button offset values, for ex. 22px', 'volley-core' ),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			
			array(
				'type'        => 'textfield',
				'param_name'  => 'shapesize',
				'heading'     => esc_html__( 'Shape Size', 'volley-core' ),
				'description' => esc_html__( 'Custom Shape Size, for ex. 22px', 'volley-core' ),
				'dependency'  => array(
					'element' => 'navshape',
					'value'   => array( 'carousel-nav-square', 'carousel-nav-circle' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'shapeheight',
				'heading'     => esc_html__( 'Shape height', 'volley-core' ),
				'description' => esc_html__( 'Custom shape height, for ex. 22px', 'volley-core' ),
				'dependency'  => array(
					'element' => 'navshape',
					'value'   => array( 'carousel-nav-rectangle' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'shapewidth',
				'heading'     => esc_html__( 'Shape width', 'volley-core' ),
				'description' => esc_html__( 'Custom shape width, for ex. 22px', 'volley-core' ),
				'dependency'  => array(
					'element' => 'navshape',
					'value'   => array( 'carousel-nav-rectangle' ),
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			
			array(
				'type'        => 'subheading',
				'heading'     => esc_html__( 'Styling', 'volley-core' ),
				'param_name'  => 'sh_styling_nav',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency'  => array(
					'element' => 'prevnextbuttons',
					'value'   => 'yes'
				),
			),
			array(
				'type' => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'nav_arrow_color',
				'heading' => esc_html__( 'Arrow Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for the nav arrows', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'prevnextbuttons',
					'value' => 'yes',	
				),
			),
			array(
				'type' => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'nav_arrow_color_hover',
				'heading' => esc_html__( 'Arrow Hover Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for the nav arrows on hover', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'prevnextbuttons',
					'value' => 'yes',	
				),
			),
			array(
				'type' => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'nav_border_color',
				'heading' => esc_html__( 'Border Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for the nav button borders', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'prevnextbuttons',
					'value' => 'yes',	
				),
			),
			array(
				'type' => 'themethreads_colorpicker',
				'only_solid' => true,
				'param_name' => 'nav_border_hcolor',
				'heading' => esc_html__( 'Border Hover Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a hover color for the nav button borders', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'prevnextbuttons',
					'value' => 'yes',	
				),
			),
			array(
				'type' => 'themethreads_colorpicker',
				'param_name' => 'nav_bg_color',
				'heading' => esc_html__( 'Background', 'volley-core' ),
				'description' => esc_html__( 'Pick background for the nav buttons', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'prevnextbuttons',
					'value' => 'yes',	
				),
			),
			array(
				'type' => 'themethreads_colorpicker',
				'param_name' => 'nav_bg_hcolor',
				'heading' => esc_html__( 'Background Hover', 'volley-core' ),
				'description' => esc_html__( 'Pick hover background for the nav buttons', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'prevnextbuttons',
					'value' => 'yes',	
				),
			),
			array(
				'type'        => 'subheading',
				'heading'     => esc_html__( 'Pagination Dots', 'volley-core' ),
				'param_name'  => 'sh_pagination_nav',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency'  => array(
					'element' => 'pagenationdots',
					'value'   => 'yes'
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Align page dots', 'volley-core' ),
				'description' => esc_html__( 'Select alignment for page dots', 'volley-core' ),
				'param_name'  => 'align_dots',
				'value'       => array(
					esc_html__( 'Default', 'volley-core' ) => '',
					esc_html__( 'Left', 'volley-core' )    => 'carousel-dots-left',
					esc_html__( 'Right', 'volley-core' )   => 'carousel-dots-right'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency'  => array(
					'element' => 'pagenationdots',
					'value'   => 'yes'
				)

			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Size page dots', 'volley-core' ),
				'description' => esc_html__( 'Select size for page dots', 'volley-core' ),
				'param_name'  => 'size_dots',
				'value'       => array(
					esc_html__( 'Default', 'volley-core' )  => '',
					esc_html__( 'Small' )          => 'carousel-dots-sm',
					esc_html__( 'Medium' )         => 'carousel-dots-md',
					esc_html__( 'Large' )          => 'carousel-dots-lg',
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'pagenationdots',
					'value'   => 'yes'
				)
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'dots_style',
				'heading'     => esc_html__( 'Style', 'volley-core' ),
				'description' => esc_html__( 'Select dots style', 'volley-core' ),
				'value'       => array(
					esc_html__( 'Style 1', 'volley-core' ) => 'carousel-dots-style1',
					esc_html__( 'Style 2', 'volley-core' ) => 'carousel-dots-style2',
					esc_html__( 'Style 3', 'volley-core' ) => 'carousel-dots-style3',
					esc_html__( 'Style 4', 'volley-core' ) => 'carousel-dots-style4',
				),
				'dependency'  => array(
					'element' => 'pagenationdots',
					'value'   => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'dots_bg_color',
				'heading'     => esc_html__( 'Dots Background', 'volley-core' ),
				'description' => esc_html__( 'Pick background for the page dots', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group'       => esc_html__( 'Nav', 'volley-core' ),
				'dependency'  => array(
					'element' => 'pagenationdots',
					'value'   => 'yes',	
				),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'param_name'  => 'dots_bg_hcolor',
				'heading'     => esc_html__( 'Dots Hover Background', 'volley-core' ),
				'description' => esc_html__( 'Pick hover background for the page dots', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group'       => esc_html__( 'Nav', 'volley-core' ),
				'dependency'  => array(
					'element' => 'pagenationdots',
					'value'   => 'yes',	
				),
			),
		);
		
		$this->params = array_merge( array(
			// Params goes here
				array(
					'type'        => 'attach_images',
					'param_name'  => 'images',
					'heading'     => esc_html__( 'Gallery Images', 'volley-core' ),
					'description' => esc_html__( 'Add images to show in the gallery', 'volley-core' ),
					'admin_label' => true,
				),
			), $options, $nav ); 

		$this->add_extras();
	}
	
	public function before_output( $atts, &$content ) {

		$atts['template'] = 'iphone';		

		return $atts;
	}
	
	protected function get_attachments() {

		$images = explode( ',', $this->atts['images'] );

		if( empty( $images ) ) {
			return;
		}

		$args = array(
			'posts_per_page' => -1,
			'include'        => $images,
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'orderby'        => 'post__in',

			// improve query performance
			'ignore_sticky_posts'    => true,
			'no_found_rows'          => true,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false
		);

		return get_posts( $args );
	}

	protected function columnize_content( &$content ) {

		global $shortcode_tags;

		// Find all registered tag names in $content.
		preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );
		$tagnames = array_intersect( array_keys( $shortcode_tags ), $matches[1] );
		$pattern = get_shortcode_regex();
		
		$item_classname = 'carousel-item col-xs-12';

		foreach( $tagnames as $tag ) {
			$start = "[$tag";
			$end = "[/$tag]";

			if( ld_helper()->str_contains( $end, $content ) ) {
				$content = str_replace( $start, '<div class="' . $item_classname . '">' . $start, $content );
				$content = str_replace( $end, $end . '</div>', $content );
			}
			else {
				preg_match_all( '/' . $pattern . '/s', $content, $matches );

				foreach( array_unique( $matches[0] ) as $replace ) {
					$content = str_replace( $replace, '<div class="' . $item_classname . '">' . $replace . '</div>', $content );
				}
			}

		}
	}

	protected function get_options() {

		$opts = array();
		$raw = $this->atts;
		$ids = array(
			'initialindex'         => 'initialIndex',
			'cellalign'            => 'cellAlign',
			'contain'              => 'contain',
			'groupcells'           => 'groupCells',
			'groupcellscustom'     => 'groupCells',
			'pagenationdots'       => 'pageDots',
			'autoplay'             => 'autoPlay',
			'autoplaytime'         => 'autoPlay',
			'pauseautoplayonhover' => 'pauseAutoPlayOnHover',
			'draggable'            => 'draggable',
			'freescroll'           => 'freeScroll',
			'wraparound'           => 'wrapAround',
			'adaptiveheight'       => 'adaptiveHeight',
			'navappend'            => 'buttonsAppendTo',
			'navappend_id'         => 'buttonsAppendTo',
			'prevnextbuttons'      => 'prevNextButtons',
			'navarrow'             => 'navArrow',
			'fullwidthside'        => 'fullwidthSide',
			'navoffset'            => 'navOffsets',
			'randomveroffset'      => 'randomVerOffset',
			
		);

		unset(
			$raw['style'],
			$raw['title'],
			$raw['content'],

			$raw['navfloated'],
			$raw['navhalign'],
			$raw['navvalign'],
			$raw['navdirection'],
			$raw['navline'],
			$raw['navsize'],
			$raw['navfill'],
			$raw['navshape'],
			$raw['navshadow'],

			$raw['nav_arrow_color'],
			$raw['nav_arrow_color_hover'],
			$raw['nav_border_color'],
			$raw['nav_border_hcolor'],
			$raw['nav_bg_color'],
			$raw['nav_bg_hcolor'],
			
			$raw['shapesize'],
			$raw['shapeheight'],
			$raw['shapewidth'],			
			
			$raw['size_dots'],
			$raw['align_dots'],
			$raw['dots_style'],
			$raw['dots_bg_color'],
			$raw['dots_bg_hcolor'],
			$raw['_id'],
			$raw['el_id'],
			$raw['el_class']
		);

		$raw = array_filter( $raw );
		$custom_opts = $arr = $offset_value = array();

		foreach( $raw as $id => $val ) {

			// Casting
			if( 'yes' === $val ) {
				$val = true;
			}
			if( 'no' === $val || '' === $val ) {
				$val = false;
			}
			if( in_array( $id, array( 'initialindex', 'autoplaytime' ) ) ) {
				$val = intval( $val );
			}

			if( in_array( $id, array( 'prev', 'next', 'navarrow' ) ) ) {
				
				if( 'navarrow' === $id && 'custom' !== $val ){
					$opts[ $ids[ 'navarrow' ] ] = $val;
				}
				else {

					if( 'next' === $id ) {
						$val = !empty( $val ) ? vc_value_from_safe( $val, true ) : '<i class=\"fa fas fa-angle-left\"></i>';
						$custom_opts['next'] = $val;
					}
					if( 'prev' === $id ) {
						$val = !empty( $val ) ? vc_value_from_safe( $val, true ) : '<i class=\"fa fas fa-angle-right\"></i>';
						$custom_opts['prev'] = $val;
					}
					$opts[ $ids[ 'navarrow' ] ] = $custom_opts;
				}
			}
			elseif( 'navoffset' === $id ) {

				$offset_values = explode( ',', $val );

				foreach( $offset_values as $value ) {

					$arr = explode( ':', $value );
					$offset_value[ $arr[0] ] = $arr[1] ;

				}

				$opts[ $ids[ 'navoffset' ] ] = array( 'nav' => $offset_value);

			} 
			elseif( 'prevoffset' === $id )	 {
				if( !empty( $val ) ) {
					$opts[ $ids[ 'navoffset' ] ]['prev'] = $val;	
				}
			}
			elseif( 'nextoffset' === $id )	 {
				if( !empty( $val ) ) {
					$opts[ $ids[ 'navoffset' ] ]['next'] = $val;
				}
			}
			elseif ( 'navappend' === $id ) {

				if ( 'custom_id' === $val && !empty( $opts[ $ids[ 'navappend_id' ] ] ) ) {

					$opts[ $ids[ 'navappend' ] ] = $opts[ $ids[ 'navappend_id' ] ];

				} else {

					$opts[ $ids[ $id ] ] = $val;
					
				}

			}
			else{
				$opts[ $ids[ $id ] ] = $val;
			}

		}

		if( !empty( $opts ) ) {
			echo " data-threads-flickity='" . stripslashes( wp_json_encode( $opts ) ) ."'";
		}
		else {
			echo " data-threads-flickity=true";
		}
	}

	protected function generate_css() {

		extract( $this->atts );
		$elements = array();

		$id = '.' . $this->get_id();
		
		if( !empty( $nav_arrow_color ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button svg' )]['stroke'] = $nav_arrow_color;
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button' )]['color'] = $nav_arrow_color;
		}
		if( !empty( $nav_arrow_color_hover ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button:hover svg' )]['stroke'] = $nav_arrow_color_hover;
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button:hover' )]['color'] = $nav_arrow_color_hover;
		}
		if( !empty( $nav_border_color ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button' )]['border-color'] = $nav_border_color;
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button.previous:after' )]['background-color'] = $nav_border_color;
		}
		if( !empty( $nav_border_hcolor ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button:hover' )]['border-color'] = $nav_border_hcolor;
		}
		if( !empty( $nav_bg_color ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button' )]['background'] = $nav_bg_color;
		}
		if( !empty( $nav_bg_hcolor ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button:before' )]['background'] = $nav_bg_hcolor;
		}
		if( !empty( $shapesize ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button' ) ]['width'] = $shapesize .' !important';
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button' ) ]['height'] = $shapesize .' !important';
		}
		if( !empty( $shapeheight ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button' ) ]['height'] = $shapeheight .' !important';
		}
		if( !empty( $shapewidth ) ) {
			$elements[themethreads_implode( '%1$s .flickity-prev-next-button' ) ]['width'] = $shapewidth .' !important';
		}
		
		
		if( 'carousel-dots-style3' ===  $dots_style ) {
			if( !empty( $dots_bg_color ) ) {
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot:after' )]['background'] = $dots_bg_color;
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot' )]['border-color'] = $dots_bg_color;
			}
			if( !empty( $dots_bg_hcolor ) ) {
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot.is-selected:before, %1$s .flickity-page-dots .dot:before:hover' )]['background'] = $dots_bg_hcolor;
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot.is-selected, %1$s .flickity-page-dots .dot:hover' )]['border-color'] = $dots_bg_hcolor;
			}
		}
		else {
			if( !empty( $dots_bg_color ) ) {
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot' )]['background'] = $dots_bg_color;
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot' )]['border-color'] = $dots_bg_color;
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot' )]['color'] = $dots_bg_color;
			}
			if( !empty( $dots_bg_hcolor ) ) {
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot.is-selected, %1$s .flickity-page-dots .dot:hover' )]['background'] = $dots_bg_hcolor;
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot.is-selected, %1$s .flickity-page-dots .dot:hover' )]['border-color'] = $dots_bg_hcolor;
				$elements[themethreads_implode( '%1$s .flickity-page-dots .dot.is-selected, %1$s .flickity-page-dots .dot:hover' )]['color'] = $dots_bg_hcolor;
			}
		}
		

		$this->dynamic_css_parser( $id, $elements );
	}

}
new LD_Carousel_Gallery;