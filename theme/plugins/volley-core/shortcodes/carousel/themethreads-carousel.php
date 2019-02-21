<?php
/**
* Shortcode ThemeThreads Carousel
*/

if( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Carousel extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug         = 'ld_carousel';
		$this->title        = esc_html__( 'Carousel', 'volley-core' );
		$this->icon         = 'fa fa-arrows';
		$this->description  = esc_html__( 'Create a carousel.', 'volley-core' );
		$this->is_container = true;

		parent::__construct();
	}

	public function get_params() {
		
		$options = array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Active Slide', 'volley-core' ),
				'description' => esc_html__( 'Select a custom initial active slide.', 'volley-core' ),
				'param_name'  => 'initialindex',
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Cell Align', 'volley-core' ),
				'description' => esc_html__( 'Cells alignment.', 'volley-core' ),
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
				'heading'     => esc_html__( 'Navigation Arrows', 'volley-core' ),
				'description' => esc_html__( 'Enable/Disable navigation arrows..', 'volley-core' ),
				'param_name'  => 'prevnextbuttons',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => 'no',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Append Navigation Arrows To', 'volley-core' ),
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
				'heading' => esc_html__( 'ID to Append navigation arrows', 'volley-core' ),
				'description' => esc_html__( 'Input the id of element to append the navigaion, for ex. #heading-id', 'volley-core' ),
				'dependency'  => array(
					'element' => 'navappend',
					'value'   => 'custom_id'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Pagination Dots', 'volley-core' ),
				'description' => esc_html__( 'Enable/Disable pagination dots.', 'volley-core' ),
				'param_name'  => 'pagenationdots',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => 'no',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Stretch Carousel', 'volley-core' ),
				'description' => esc_html__( 'Stretch the carousel to the right side of the viewport.', 'volley-core' ),
				'param_name'  => 'fullwidthside',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => '',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Group Cells', 'volley-core' ),
				'description' => esc_html__( 'Enable this option if you want the navigation being mapped to grouped cells, not individual cells.', 'volley-core' ),
				'param_name'  => 'groupcells',
				'value'       => array(
					esc_html__( 'Enable', 'volley-core' ) => 'yes',
					esc_html__( 'Disable', 'volley-core' )  => 'no'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Carousel Loop', 'volley-core' ),
				'description' => esc_html__( 'Loop for infinite scrolling.', 'volley-core' ),
				'param_name'  => 'wraparound',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => '',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Adaptive Height', 'volley-core' ),
				'description' => esc_html__( 'Height of the carousel will change based on active slide.', 'volley-core' ),
				'param_name'  => 'adaptiveheight',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => '',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Draggable', 'volley-core' ),
				'description' => esc_html__( 'Enable/Disable draggableity of the carousel.', 'volley-core' ),
				'param_name'  => 'draggable',
				'value'       => array(
					esc_html__( 'Enable', 'volley-core' ) => '',
					esc_html__( 'Disable', 'volley-core' )  => 'no'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Free Scroll', 'volley-core' ),
				'description' => esc_html__( 'Enables carousel to be freely scrolled without aligning cells to an end position.', 'volley-core' ),
				'param_name'  => 'freescroll',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => '',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Autoplay', 'volley-core' ),
				'description' => esc_html__( 'Enable/Disable carousel autoplay.', 'volley-core' ),
				'param_name'  => 'autoplay',
				'value'       => array(
					esc_html__( 'Dsiable', 'volley-core' )  => '',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Autoplay Delay', 'volley-core' ),
				'description' => esc_html__( 'Autolay delay in milliseconds.', 'volley-core' ),
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
				'description' => esc_html__( 'Pause the autoplay each time user hovers over the carousel.', 'volley-core' ),
				'param_name'  => 'pauseautoplayonhover',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => 'no',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency'  => array(
					'element' => 'autoplay',
					'value'   => array( 'yes' )
				)
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Random Vertical Position', 'volley-core' ),
				'description' => esc_html__( 'Randomly position carousel cells.', 'volley-core' ),
				'param_name'  => 'randomveroffset',
				'value'       => array(
					esc_html__( 'Disable', 'volley-core' )  => '',
					esc_html__( 'Enable', 'volley-core' ) => 'yes'
				),
				'edit_field_class' => 'vc_col-sm-6'
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__( 'Controlling Carousels', 'volley-core' ),
				'description' => esc_html__( 'Add IDs or classnames of the other carousels on this page for ex. #carousel-1, carousel-2 or .carousel-1, .carousel-2 (Note: divide by comma)', 'volley-core' ),
				'param_name'  => 'controllingcarousels',
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
				'description' => esc_html__( 'Select a navigation arrow style', 'volley-core' ),
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
				'heading' => esc_html__( 'Previous Button', 'volley-core' ),
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
				'heading'     => esc_html__( 'Navigation Arrow Size', 'volley-core' ),
				'description' => esc_html__( 'Select navigation size.', 'volley-core' ),
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
				'heading'     => esc_html__( 'Fill Color', 'volley-core' ),
				'description' => esc_html__( 'Select navigation fill color.', 'volley-core' ),
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
				'heading'     => esc_html__( 'Shape Style', 'volley-core' ),
				'description' => esc_html__( 'Select navigation shape style.', 'volley-core' ),
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
				'heading'     => esc_html__( 'Shadow Styles', 'volley-core' ),
				'description' => esc_html__( 'Select shadow style of carousel cells.', 'volley-core' ),
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
				'heading' => esc_html__( 'Navigation Arrows Alignment', 'volley-core' ),
				'description' => esc_html__( 'Select alignment for the navigation/', 'volley-core' ),
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
				'heading' => esc_html__( 'Floated Navigation Arrows', 'volley-core' ),
				'description' => esc_html__( 'Select navigation arrows to be floted on top of carousel cells or not.', 'volley-core' ),
				'value' => array(
					esc_html__( 'Disable', 'volley-core' ) => '',
					esc_html__( 'Enable', 'volley-core' ) => 'carousel-nav-floated',
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
				'heading'     => esc_html__( 'Navigation Arrows Vertical Position', 'volley-core' ),
				'description' => esc_html__( 'Select vertical position for the navigation.', 'volley-core' ),
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
				'heading'     => esc_html__( 'Navigation Arrows Direction', 'volley-core' ),
				'description' => esc_html__( 'Select direction for the navigation.', 'volley-core' ),
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
				'heading'     => esc_html__( 'Arrows Separator', 'volley-core' ),
				'description' => esc_html__( 'Enable/Disable the separator between previous and next navigation arrows.', 'volley-core' ),
				'value' => array(
					esc_html__( 'Disable', 'volley-core' )    => '',
					esc_html__( 'Enable', 'volley-core' ) => 'carousel-nav-line-between',
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
				'heading'     => esc_html__( 'Navigation Arrows Offset', 'volley-core' ),
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
				'heading'     => esc_html__( 'Navigation Arrow Shape Size', 'volley-core' ),
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
				'heading'     => esc_html__( 'Navigation Arrow Shape Height', 'volley-core' ),
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
				'heading'     => esc_html__( 'Navigation Arrow Shape Width', 'volley-core' ),
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
				'heading'     => esc_html__( 'Pagination Dots Alignment', 'volley-core' ),
				'description' => esc_html__( 'Select alignment for pagination dots', 'volley-core' ),
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
				'heading'     => esc_html__( 'Pagination Dots Size', 'volley-core' ),
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
				'type'        => 'textfield',
				'param_name'  => 'dots_top_offset',
				'std'         => 'auto',
				'heading'     => esc_html__( 'Dots Top Offset', 'volley-core' ),
				'description' => esc_html__( 'Dots offset from top edge', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'pagenationdots',
					'value'   => 'yes'
				)
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'dots_right_offset',
				'std'         => 'auto',
				'heading'     => esc_html__( 'Dots Right Offset', 'volley-core' ),
				'description' => esc_html__( 'Dots offset from right edge', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'pagenationdots',
					'value'   => 'yes'
				)
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'dots_bottom_offset',
				'std'         => '-25px',
				'heading'     => esc_html__( 'Dots Bottom Offset', 'volley-core' ),
				'description' => esc_html__( 'Dots offset from bottom edge', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Nav', 'volley-core' ),
				'dependency' => array(
					'element' => 'pagenationdots',
					'value'   => 'yes'
				)
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'dots_left_offset',
				'std'         => 'auto',
				'heading'     => esc_html__( 'Dots Left Offset', 'volley-core' ),
				'description' => esc_html__( 'Dots offset from left edge', 'volley-core' ),
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
				'heading'     => esc_html__( 'Pagination Dots Style', 'volley-core' ),
				'description' => esc_html__( 'Select pagination dots style', 'volley-core' ),
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
				'edit_field_class' => 'vc_col-sm-12',
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
		
		$animation = array(
			
			//Custom Animation Options
			array(
				'type'        => 'textfield',
				'param_name'  => 'pf_duration',
				'heading'     => esc_html__( 'Duration', 'volley-core' ),
				'description' => esc_html__( 'Add duration of the animation in milliseconds', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type' => 'textfield',
				'param_name' => 'pf_start_delay',
				'heading' => esc_html__( 'Start Delay', 'volley-core' ),
				'description' => esc_html__( 'Add start delay of the animation in milliseconds', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type' => 'textfield',
				'param_name' => 'pf_delay',
				'heading' => esc_html__( 'Delay', 'volley-core' ),
				'description' => esc_html__( 'Add delay of the animation between of the animated elements in milliseconds', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'pf_easing',
				'heading' => esc_html__( 'Easing', 'volley-core' ),
				'description' => esc_html__( 'Select an easing type', 'volley-core' ),
				'value' => array(
					'linear',
					'easeInQuad',
					'easeInCubic',
					'easeInQuart',
					'easeInQuint',
					'easeInSine',
					'easeInExpo',
					'easeInCirc',
					'easeInBack',
					'easeOutQuad',
					'easeOutCubic',
					'easeOutQuart',
					'easeOutQuint',
					'easeOutSine',
					'easeOutExpo',
					'easeOutCirc',
					'easeOutBack',
					'easeInOutQuad',
					'easeInOutCubic',
					'easeInOutQuart',
					'easeInOutQuint',
					'easeInOutSine',
					'easeInOutExpo',
					'easeInOutCirc',
					'easeInOutBack',
				),
				'std' => 'easeOutQuint',
				'edit_field_class' => 'vc_col-sm-6',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'subheading',
				'param_name'  => 'pf_init_values',
				'heading'     => esc_html__( 'Animate From', 'volley-core' ),
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_translate_x',
				'heading'     => esc_html__( 'Translate X', 'volley-core' ),
				'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_translate_y',
				'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)		
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_translate_z',
				'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_scale_x',
				'heading'     => esc_html__( 'Scale X', 'volley-core' ),
				'description' => esc_html__( 'Select Scale X', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_scale_y',
				'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_scale_z',
				'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_rotate_x',
				'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,	
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_rotate_y',
				'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_rotate_z',
				'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_init_opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			//Animation Values
			array(
				'type'        => 'subheading',
				'param_name'  => 'pf_animations_values',
				'heading'     => esc_html__( 'Animate To', 'volley-core' ),
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),			
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_translate_x',
				'heading'     => esc_html__( 'Translate X', 'volley-core' ),
				'description' => esc_html__( 'Select translate on X axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_translate_y',
				'heading'     => esc_html__( 'Translate Y', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Y axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_translate_z',
				'heading'     => esc_html__( 'Translate Z', 'volley-core' ),
				'description' => esc_html__( 'Select translate on Z axe', 'volley-core' ),
				'min'         => -500,
				'max'         => 500,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_scale_x',
				'heading'     => esc_html__( 'Scale X', 'volley-core' ),
				'description' => esc_html__( 'Select Scale X', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
	
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_scale_y',
				'heading'     => esc_html__( 'Scale Y', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Y', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_scale_z',
				'heading'     => esc_html__( 'Scale Z', 'volley-core' ),
				'description' => esc_html__( 'Select Scale Z', 'volley-core' ),
				'min'         => 0,
				'max'         => 10,
				'step'        => 0.25,
				'std'         => 1,
				'edit_field_class' => 'vc_col-sm-4',
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_rotate_x',
				'heading'     => esc_html__( 'Rotate X', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on X axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_rotate_y',
				'heading'     => esc_html__( 'Rotate Y', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Y axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_rotate_z',
				'heading'     => esc_html__( 'Rotate Z', 'volley-core' ),
				'description' => esc_html__( 'Select rotate degree on Z axe', 'volley-core' ),
				'min'         => -360,
				'max'         => 360,
				'step'        => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'pf_an_opacity',
				'heading'     => esc_html__( 'Opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
				'group' => esc_html__( 'Item Animation', 'volley-core' ),
				'dependency' => array(
					'element' => 'enable_item_animation',
					'value'   => 'yes',
				)
			),
				
		);
		
		$this->params = array_merge( array(
			// Params goes here
			array(
				'type'        => 'responsive_textfield',
				'param_name'  => 'columns',
				'heading'     => esc_html__( 'Number of Columns', 'volley-core' ),
				'std'         => 'md:3|sm:2|xs:1|spacing_xs:15px',
			),
			array(
				'type'        => 'themethreads_slider',
				'param_name'  => 'inactiv_opacity',
				'heading'     => esc_html__( 'Inactive slides opacity', 'volley-core' ),
				'description' => esc_html__( 'Set opacity for inactive slides', 'volley-core' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.1,
				'std'         => 1,
			),
			array(
				'type' => 'dropdown',
				'param_name' => 'shadow',
				'heading'     => esc_html__( 'Shadow', 'volley-core' ),
				'description' => esc_html__( 'Set shadow to items', 'volley-core' ),
				'value' => array(
					esc_html__( 'None', 'volley-core' ) => '',
					esc_html__( 'Active Item', 'volley-core' ) => 'carousel-shadow-active',
					esc_html__( 'All Items', 'volley-core' ) => 'carousel-shadow-all',
				),
			),
			array(
				'type'             => 'checkbox',
				'param_name'       => 'enable_parallax',
				'value'            => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'heading'          => esc_html__( 'Enable Parallax?', 'volley-core' ),
				'description'      => esc_html__( 'Will enable parallax for images in slider.', 'volley-core' ),
			),
			array(
				'type'             => 'checkbox',
				'param_name'       => 'enable_item_animation',
				'value'            => array( esc_html__( 'Yes', 'volley-core' ) => 'yes' ),
				'heading'          => esc_html__( 'Animate Carousel Items?', 'volley-core' ),
				'description'      => esc_html__( 'Will enable animation for items, it will be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'volley-core' ),
			),
			
			), $options, $nav, $animation ); 

		$this->add_extras();
	}

	protected function columnize_content( &$content ) {

		global $shortcode_tags;

		// Find all registered tag names in $content.
		preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );
		$tagnames = array_intersect( array_keys( $shortcode_tags ), $matches[1] );
		$pattern = get_shortcode_regex();
		
		$item_classname = 'carousel-item';

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

	protected function get_ca_options() {

		extract( $this->atts );
		
		if( !$enable_item_animation ) {
			return;
		}
		
		$animation_opts = $this->get_animation_opts();

		$opts = $split_opts = array();
		$opts[] = 'data-custom-animations="true"';
		$opts[] = 'data-ca-options=\'' . stripslashes( wp_json_encode( $animation_opts ) ) . '\'';
	
		return join( ' ', $opts );

	}

	protected function get_animation_opts() {

		extract( $this->atts );
		
		$opts = $init_values = $animations_values = $arr = array();
		$opts['triggerHandler'] = 'inview';
		$opts['animationTarget'] = '.carousel-item';
		$opts['duration'] = !empty( $pf_duration ) ? $pf_duration : 700;
		if( !empty( $pf_start_delay ) ) {
			$opts['startDelay'] = $pf_start_delay;
		}
		$opts['delay'] = !empty( $pf_delay ) ? $pf_delay : 100;
		$opts['easing'] = $pf_easing;
		
		//Init values
		if ( !empty( $pf_init_translate_x ) ) { $init_values['translateX'] = ( int ) $pf_init_translate_x; }
		if ( !empty( $pf_init_translate_y ) ) { $init_values['translateY'] = ( int ) $pf_init_translate_y; }
		if ( !empty( $pf_init_translate_z ) ) { $init_values['translateZ'] = ( int ) $pf_init_translate_z; }
	
		if ( '1' !== $pf_init_scale_x ) { $init_values['scaleX'] = ( float ) $pf_init_scale_x; }
		if ( '1' !== $pf_init_scale_y ) { $init_values['scaleY'] = ( float ) $pf_init_scale_y; }
		if ( '1' !== $pf_init_scale_z ) { $init_values['scaleZ'] = ( float ) $pf_init_scale_z; }
	
		if ( !empty( $pf_init_rotate_x ) ) { $init_values['rotateX'] = ( int ) $pf_init_rotate_x; }
		if ( !empty( $pf_init_rotate_y ) ) { $init_values['rotateY'] = ( int ) $pf_init_rotate_y; }
		if ( !empty( $pf_init_rotate_z ) ) { $init_values['rotateZ'] = ( int ) $pf_init_rotate_z; }
		
		if ( isset( $pf_init_opacity ) && '1' !== $pf_init_opacity ) { $init_values['opacity'] = ( float ) $pf_init_opacity; }
	
		//Animation values
		if ( !empty( $pf_init_translate_x ) ) { $animations_values['translateX'] = ( int ) $pf_an_translate_x; }
		if ( !empty( $pf_init_translate_y ) ) { $animations_values['translateY'] = ( int ) $pf_an_translate_y; }
		if ( !empty( $pf_init_translate_z ) ) { $animations_values['translateZ'] = ( int ) $pf_an_translate_z; }
	
		if ( isset( $pf_an_scale_x ) && '1' !== $pf_init_scale_x ) { $animations_values['scaleX'] = ( float ) $pf_an_scale_x; }
		if ( isset( $pf_an_scale_y ) && '1' !== $pf_init_scale_y ) { $animations_values['scaleY'] = ( float ) $pf_an_scale_y; }
		if ( isset( $pf_an_scale_z ) && '1' !== $pf_init_scale_z ) { $animations_values['scaleZ'] = ( float ) $pf_an_scale_z; }
	
		if ( !empty( $pf_init_rotate_x ) ) { $animations_values['rotateX'] = ( int ) $pf_an_rotate_x; }
		if ( !empty( $pf_init_rotate_y ) ) { $animations_values['rotateY'] = ( int ) $pf_an_rotate_y; }
		if ( !empty( $pf_init_rotate_z ) ) { $animations_values['rotateZ'] = ( int ) $pf_an_rotate_z; }
	
		if ( isset( $pf_an_opacity ) && '1' !== $pf_init_opacity ) { $animations_values['opacity'] = ( float ) $pf_an_opacity; }	

		$opts['initValues'] = !empty( $init_values ) ? $init_values : array( 'scale' => 1 );
		$opts['animations'] = !empty( $animations_values ) ? $animations_values : array( 'scale' => 1 );
		
		return $opts;
		
	}

	protected function get_options() {

		$opts = array();
		$raw = $this->atts;
		$ids = array(
			'initialindex'         => 'initialIndex',
			'cellalign'            => 'cellAlign',
			'groupcells'           => 'groupCells',
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
			'controllingcarousels' => 'controllingCarousels',
			'enable_parallax'      => 'parallax'
			
		);

		unset(
			$raw['style'],
			$raw['columns'],
			$raw['paddings'],
			$raw['title'],
			$raw['content'],
			$raw['inactiv_opacity'],
			$raw['shadow'],

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
			$raw['dots_top_offset'],
			$raw['dots_right_offset'],
			$raw['dots_bottom_offset'],
			$raw['dots_left_offset'],
			$raw['_id'],
			$raw['el_id'],
			$raw['el_class'],
			
			$raw['enable_item_animation'],
			$raw['pf_duration'],
			$raw['pf_start_delay'],
			$raw['pf_delay'],
			$raw['pf_easing'],
			$raw['pf_init_values'],
			$raw['pf_init_translate_x'],
			$raw['pf_init_translate_y'],
			$raw['pf_init_translate_z'],
			$raw['pf_init_scale_x'],
			$raw['pf_init_scale_y'],
			$raw['pf_init_scale_z'],
			$raw['pf_init_rotate_x'],
			$raw['pf_init_rotate_y'],
			$raw['pf_init_rotate_z'],
			$raw['pf_init_opacity'],
			$raw['pf_animations_values'],
			$raw['pf_an_translate_x'],
			$raw['pf_an_translate_y'],
			$raw['pf_an_translate_z'],
			$raw['pf_an_scale_x'],
			$raw['pf_an_scale_y'],
			$raw['pf_an_scale_z'],
			$raw['pf_an_rotate_x'],
			$raw['pf_an_rotate_y'],
			$raw['pf_an_rotate_z'],
			$raw['pf_an_opacity']
			
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
			elseif( 'controllingcarousels' === $id ) {
				
				$cc_values = explode( ',', $val );

				foreach( $cc_values as $value ) {
					$cc_value[] = $value ;
				}

				$opts[ $ids[ 'controllingcarousels' ] ] = $cc_value;
								
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
		$queries_css = '';

		$id = '.' . $this->get_id();
		
		if( !empty( $columns ) ) {
			
			$columns = vc_parse_multi_attribute( $columns );

			if( isset( $columns['xs'] ) ) {
				$width = 100/$columns['xs'];	
				$elements[themethreads_implode( '%1$s .carousel-item' )]['width'] = $width . '%';
			}
			if( !empty( $columns['spacing_xs'] ) ) {
				$elements[themethreads_implode( '%1$s .carousel-item' )]['padding-left']      = $columns['spacing_xs'];
				$elements[themethreads_implode( '%1$s .carousel-item' )]['padding-right']     = $columns['spacing_xs'];
				$elements[themethreads_implode( '%1$s .carousel-items.row' )]['margin-left']  = '-' . $columns['spacing_xs'];
				$elements[themethreads_implode( '%1$s .carousel-items.row' )]['margin-right'] = '-' . $columns['spacing_xs'];
			}
			
			if( isset( $columns['sm'] ) || !empty( $columns['spacing_sm'] ) ) {
				
				$queries_css .= '@media (min-width: 768px) {';
					if( isset( $columns['sm'] ) ) {
						$width = 100/$columns['sm'];
						$queries_css .= $id . ' .carousel-item { width:' . $width . '% }';
					}
					if( !empty( $columns['spacing_sm'] ) ) {
						$queries_css .= $id . ' .carousel-item { padding-left:' . $columns['spacing_sm'] . ';padding-right:' . $columns['spacing_sm'] . ';}';
						$queries_css .= $id . ' .carousel-items.row { margin-left:-' . $columns['spacing_sm'] . ';margin-right:-' . $columns['spacing_sm'] . ';}';
					}
					
				$queries_css .= '}';
			}
			if( isset( $columns['md'] ) || !empty( $columns['spacing_md'] ) ) {
				
				$queries_css .= '@media (min-width: 992px) {';
					if( isset( $columns['md'] ) ) {
						$width = 100/$columns['md'];
						$queries_css .= $id . ' .carousel-item { width:' . $width . '% }';
					}
					if( !empty( $columns['spacing_md'] ) ) {
						$queries_css .= $id . ' .carousel-item { padding-left:' . $columns['spacing_md'] . ';padding-right:' . $columns['spacing_md'] . ';}';
						$queries_css .= $id . ' .carousel-items.row { margin-left:-' . $columns['spacing_md'] . ';margin-right:-' . $columns['spacing_md'] . ';}';
					}
				$queries_css .= '}';
			}
			if( isset( $columns['lg'] ) || !empty( $columns['spacing_lg'] ) ) {
				
				$queries_css .= '@media (min-width: 1200px) {';
					if( isset( $columns['lg'] ) ) {
						$width = 100/$columns['lg'];
						$queries_css .= $id . ' .carousel-item { width:' . $width . '% }';
					}
					if( !empty( $columns['spacing_lg'] ) ) {
						$queries_css .= $id . ' .carousel-item { padding-left:' . $columns['spacing_lg'] . ';padding-right:' . $columns['spacing_lg'] . ';}';
						$queries_css .= $id . ' .carousel-items.row { margin-left:-' . $columns['spacing_lg'] . ';margin-right:-' . $columns['spacing_lg'] . ';}';
					}
				$queries_css .= '}';
			}
		}

		if( '1' !== $inactiv_opacity ) {
			$elements[themethreads_implode( '%1$s .flickity-slider > .carousel-item:not(.is-selected)' )]['opacity'] = $inactiv_opacity;
		}
		
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
		
		if ( !empty($dots_top_offset) ) {
			$elements[themethreads_implode( '%1$s .flickity-page-dots' )]['top'] = $dots_top_offset;
		}
		if ( !empty($dots_right_offset) ) {
			$elements[themethreads_implode( '%1$s .flickity-page-dots' )]['right'] = $dots_right_offset;
		}
		if ( !empty($dots_bottom_offset) ) {
			$elements[themethreads_implode( '%1$s .flickity-page-dots' )]['bottom'] = $dots_bottom_offset;
		}
		if ( !empty($dots_left_offset) ) {
			$elements[themethreads_implode( '%1$s .flickity-page-dots' )]['left'] = $dots_left_offset;
		}

		$elements['media']['responsive'] = $queries_css;

		$this->dynamic_css_parser( $id, $elements );
	}

}
new LD_Carousel;
class WPBakeryShortCode_LD_Carousel extends WPBakeryShortCodesContainer {}