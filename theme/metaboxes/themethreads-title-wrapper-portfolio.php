<?php
/*
 * Portfolio Title Wrapper Section
 *
 * Available options on $section array:
 * separate_box (boolean) - separate metabox is created if true
 * box_title - title for separate metabox
 * title - section title
 * desc - section description
 * icon - section icon
 * fields - fields, @see https://docs.reduxframework.com/ for details
*/

$sections[] = array(
	'post_types' => array(),
	'title'      => esc_html__( 'Title Wrapper', 'volley' ),
	'icon'       => 'el-icon-cog',
	'fields'     => array(

		array(
			'id'       => 'title-bar-enable',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Title Wrapper', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default'  => '',
		),

		array(
			'id'    => 'title-bar-heading',
			'type'  => 'text',
			'title' => esc_html__( 'Custom Title', 'volley' ),
			'desc'  => esc_html__( 'If empty, will display default page/post title', 'volley' ),
		),
		
		array(
			'id'    => 'title-bar-heading-empty',
			'type'  => 'button_set',
			'title' => esc_html__( 'No heading', 'volley' ),
			'desc'  => esc_html__( 'Hide the default/custom page/post title in titlebar', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),				
			),
			'default'  => 'off',
		),

		'title-bar-typography' => array(
			'id'          => 'title-bar-typography',
			'title'       => esc_html__( 'Title Bar Heading Typography', 'volley' ),
			'subtitle' => esc_html__( 'These settings control the typography for the titlebar heading', 'volley' ),
			'type'        => 'typography',
			'text-transform' => true,
			'letter-spacing' => true,
			'text-align'     => true,
			'compiler'       => true,
			'units'          => '%',
		),

		array(
			'id'       => 'title-bar-weight',
			'type'     => 'select',
			'title'    => esc_html__( 'Heading font Weight', 'volley' ),
			'options'  => array(
				''                => esc_html__( 'Default', 'volley' ),
				'weight-light'    => esc_html__( 'Light', 'volley' ),
				'weight-normal'   => esc_html__( 'Normal', 'volley' ),
				'weight-medium'   => esc_html__( 'Medium', 'volley' ),
				'weight-semibold' => esc_html__( 'Semibold', 'volley' ),
				'weight-bold'     => esc_html__( 'Bold', 'volley' ),
			),
		),

		array(
			'id'    => 'title-bar-subheading',
			'type'  => 'text',
			'title' => esc_html__( 'Sub-Heading', 'volley' )
		),

		'title-bar-subheading-typography' => array(
			'id'          => 'title-bar-subheading-typography',
			'title'       => esc_html__( 'Title Bar Subheading Typography', 'volley' ),
			'subtitle' => esc_html__( 'These settings control the typography for the titlebar subheading', 'volley' ),
			'type'        => 'typography',
			'text-transform' => true,
			'letter-spacing' => true,
			'text-align'     => true,
			'compiler'       => true,
			'units'          => '%',
		),

		array(
			'id'      => 'title-bar-content',
			'type'    => 'editor',
			'title'   => esc_html__( 'Content', 'volley' ),
			'default' => ''
		),
		
		array(
			'id'      => 'title-bar-content-style',
			'type'	  => 'select',
			'title'   => esc_html__( 'Content style', 'volley' ),
			'options' => array(
				''           => 'Default',
				'split'      => 'Split',
				'overlay'    => 'Overlay',
				'bottom'     => 'Bottom',
				'bottom-bar' => 'Bottom Bar'
			),
		),
		array(
			'id'       => 'title-bar-position',
			'type'     => 'select',
			'title'    => esc_html__( 'Title Bar content Vertical align', 'volley' ),
			'options'  => array(
				''                => esc_html__( 'Default', 'volley' ),
				'titlebar--content-top'     => esc_html__( 'Top', 'volley' ),
				'titlebar--content-bottom'     => esc_html__( 'Bottom', 'volley' ),
			),
			'required' => array(
				array( 'title-bar-content-style', '!=', 'overlay' ),
				array( 'title-bar-content-style', '!=', 'bottom-bar' ),
			),
		),

		array(
			'id'      => 'title-bar-nav',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Enable Portfolio Navigation', 'volley' ),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				''    => esc_html__( 'Default', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			),
			'default' => ''			
		),

		array(
			'id'      => 'title-bar-breadcrumb',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Enable Breadcrumbs', 'volley' ),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				''    => esc_html__( 'Default', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			),
			'default' => ''	
		),

		array(
			'id'     => 'title-bar-breadcrumb-style',
			'type'	 => 'select',
			'title'  => esc_html__( 'Breadcrumb style', 'volley' ),
			'options' => array(
				''              => 'Default',
				'parallelogram' => 'Parallelogram',
			),
			'required' => array(
				'title-bar-breadcrumb',
				'!=',
				'off'
			),
			'default' => 'off'
		),

		array(
			'id'       => 'title-bar-size',
			'type'     => 'select',
			'title'    => esc_html__( 'Title size', 'volley' ),
			'options'  => array(
				''      => 'Default',
				'xxxsm' => 'xxxSmall',
				'xxsm'  => 'xxSmall',
				'xsm'   => 'xSmall',
				'sm'    => 'Small',
				'md'    => 'Medium',
				'lg'    => 'Large',
				'xlg'   => 'xLarge'
			),
			'default'   => 'xlg'
		),

		array(
			'id'       => 'title-bar-height',
			'type'     => 'select',
			'title'    => esc_html__( 'Title bar height', 'volley' ),
			'options'  => array(
				''      => 'Default',
				'np'    => 'No Paddings',
				'full'  => 'Full Height',
				'xxxsm' => 'xxxSmall',
				'xxsm'  => 'xxSmall',
				'xsm'   => 'xSmall',
				'sm'    => 'Small',
				'md'    => 'Medium',
				'md2'   => 'Medium2',
				'lg'    => 'Large',
				'lg2'   => 'Large2',
				'xlg'   => 'xLarge',
				'xxlg'  => 'xxLarge',
				'xxxlg' => 'xxxLarge'
			)
		),

		array(
			'id'       => 'title-bar-scheme',
			'type'     => 'select',
			'title'    => esc_html__( 'Color scheme', 'volley' ),
			'options'  => array(
				'text-dark'  => 'Dark',
				'text-white' => 'Light'
			),
			'default'  => 'xlg'
		),

		array(
			'id'       => 'title-bar-align',
			'type'     => 'select',
			'title'    => esc_html__( 'Alignment', 'volley' ),
			'options'  => array(
				'text-left'   => 'Left',
				'text-center' => 'Center',
				'text-right'  => 'Right'
			),
			'default'  => 'xlg'
		),

		array(
			'id'       => 'title-background-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Background Type', 'volley' ),
			'options'  => array(
				'solid'    => 'Solid',
				'gradient' => 'Gradient',
				'image'    => 'Image'
			)
		),

		array(
			'id'       => 'title-bar-bg',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background', 'volley' ),
			'required' => array(
				'title-background-type',
				'equals',
				'image'
			),
		),
		
		array(
			'id'       => 'title-bar-bg-attachment',
			'type'     => 'select',
			'title'    => esc_html__( 'Background Attachment', 'volley' ),
			'options'  => array(
				'scroll'  => esc_html__( 'Default', 'volley' ),
				'fixed'   => esc_html__( 'Fixed', 'volley' ),
				'inherit' => esc_html__( 'Inherit', 'volley' ),
			),
			'required' => array(
				'title-background-type',
				'equals',
				'image'
			),
		),
		
		array(
			'id'       => 'title-bar-parallax',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Parallax?', 'volley' ),
			'required' => array(
				'title-background-type',
				'equals',
				'image'
			),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'off',
		),

		array(
			'id'       => 'title-bar-solid',
			'type'     => 'color',
			'url'      => true,
			'title'    => esc_html__( 'Background', 'volley' ),
			'required' => array(
				'title-background-type',
				'equals',
				'solid'
			),
		),

		array(
			'id'       => 'title-bar-gradient',
			'type'     => 'gradient',
			'url'      => true,
			'title'    => esc_html__( 'Background', 'volley' ),
			'required' => array(
				'title-background-type',
				'equals',
				'gradient'
			),
		),
		
		array(
			'id'      => 'title-bar-overlay',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Enable Overlay', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley'  ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => '',
		),
		
		array(
			'id'       => 'title-bar-overlay-background-type',
			'type'     => 'select',
			'title'    => esc_html__( 'Overlay Type', 'volley' ),
			'options' => array(
				'color'    => 'Color',
				'gradient' => 'Gradient',
			),
			'required' => array(
				'title-bar-overlay',
				'!=',
				'off'
			),
		),

		array(
			'id'    => 'title-bar-overlay-solid',
			'type'  => 'color_rgba',
			'title' => esc_html__( 'Overlay Color', 'volley' ),
			'required' => array(
				'title-bar-overlay-background-type',
				'equals',
				'color'
			)
		),

		array(
			'id'       => 'title-bar-overlay-gradient',
			'type'     => 'gradient',
			'title'    => esc_html__( 'Overlay Gradient', 'volley' ),
			'required' => array(
				'title-bar-overlay-background-type',
				'equals',
				'gradient'
			)
		),

		array(
			'id'    =>'title-bar-classes',
			'type'  => 'text',
			'title' => esc_html__( 'Extra classes', 'volley' )
		),

		array(
			'id'      => 'title-bar-scroll',
			'type'	  => 'button_set',
			'title'   => esc_html__( 'Enable Scroll Button', 'volley' ),
			'options' => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => '',
		),

		array(
			'id'       => 'title-bar-scroll-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Scroll Button Color', 'volley' ),
			'subtitle' => esc_html__( 'Pick a color for scroll button', 'volley' ),
			'required' => array(
				'title-bar-scroll',
				'!=',
				'off'
			),
		),

		array(
			'id'       => 'title-bar-scroll-id',
			'type'     => 'text',
			'title'    => esc_html__( 'Anchor ID', 'volley' ),
			'subtitle' => esc_html__( 'Input anchor ID of the section for scroll button', 'volley' ),
			'required' => array(
				'title-bar-scroll',
				'!=',
				'off'
			),
		),

	), // #fields
);