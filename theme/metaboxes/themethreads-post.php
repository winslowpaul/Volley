<?php
/**
 * Post
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
	'post_types' => array('post'),
	'title'      => esc_html__( 'Post Options', 'volley' ),
	'icon'       => 'el-icon-screen',
	'fields'     => array(

		array(
			'id'      => 'post-style',
			'type'    => 'select',
			'title'   => esc_html__( 'Style', 'volley' ),
			'options' => array(
				'default'      => esc_html__( 'Default', 'volley' ),
				'cover'        => esc_html__( 'Cover', 'volley' ),
				'cover-spaced' => esc_html__( 'Cover Spaced', 'volley' ),
				'slider'       => esc_html__( 'Cover Slider', 'volley' ),
			),
			'default' => 'cover-spaced'
		),
		array(
			'id' => 'post-extra-text',
			'type' => 'textarea',
			'title' => esc_html__( 'Extra Text', 'volley' ),
			'subtitle' => esc_html__( 'Text will display near meta section', 'volley' ),
			'required' => array(
				'post-style',
				'equals',
				array( 'default', 'cover-spaced' ),
			),
		),
		array(
			'id'      => 'themethreads-post-slider',
			'type'    => 'gallery',
			'title'   => esc_html__( 'Add images for Cover slider', 'volley' ),
			'required' => array(
				'post-style',
				'equals',
				'slider'
			),
		),
		array(
			'id'      => 'themethreads-post-cover-image',
			'type'    => 'background',
			'background-color' => false,
			'background-repeat' => false,
			'background-attachment' => false,
			'background-size' => false,
			'background-position' => false,
			'title'   => esc_html__( 'Cover Image', 'volley' ),
			'subtitle' => esc_html__( 'Will override the featured image in single post', 'volley' ),
			'required' => array(
				'post-style',
				'equals',
				array( 'cover', 'cover-spaced' ),
			),
		),
		array(
			'id'       => 'post-parallax-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Enable Parallax', 'volley' ),
			'subtitle' => esc_html__( 'Turn on parallax effect on post cover image', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'required' => array(
				'post-style',
				'equals',
				'cover'
			),
			'default'  => ''
		),
		array(
			'id'       => 'post-video-btn-enable',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Show Play Button', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to show Play Button on the post cover image', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'required' => array(
				'post-style',
				'equals',
				'cover'
			),
			'default'  => 'off'
		),
		array(
			'type'     => 'text',
			'id'       => 'post-video-btn-url',
			'title'    => esc_html__( 'Play Button Url', 'volley' ),
			'required' => array(
				'post-video-btn-enable',
				'!=',
				'off'
			)
		),
		array(
			'type'     => 'text',
			'id'       => 'post-video-btn-label',
			'title'    => esc_html__( 'Play Button Label', 'volley' ),
			'required' => array(
				'post-video-btn-enable',
				'!=',
				'off'
			)
		),
		array(
			'id'       => 'post-social-box-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Social Sharing Box', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to display the social sharing box on single posts.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => ''
		),
		array(
			'id'       => 'post-author-box-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Author Info Box', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to display the author info box below posts.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => ''
		),
		array(
			'id'       => 'post-navigation-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Previous/Next Pagination', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to display the previous/next post pagination for single posts.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => ''
		),
		array(
			'id'       => 'post-related-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Related Projects', 'volley' ),
			'subtitle' => esc_html__( 'Turn on to display related posts/projects on single posts.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				''     => esc_html__( 'Default', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => ''
		),
		array(
			'id'       => 'post-related-style',
			'type'     => 'select',
			'title'    => esc_html__( 'Related posts section style', 'volley' ),
			'subtitle' => esc_html__( 'Select desired style for the related posts section to display on single post', 'volley' ),
			'options'  => array(
				'classic' => esc_html__( 'Classic', 'volley' ),
				'cover'   => esc_html__( 'Cover', 'volley' ),
			),
			'required' => array(
				'post-related-enable',
				'!=',
				'off'
			)
		),
		array(
			'type'     => 'text',
			'id'       => 'post-related-title',
			'title'    => esc_html__( 'Related posts section title', 'volley' ),
			'required' => array(
				'post-related-enable',
				'!=',
				'off'
			)
		),
		array(
			'type'     => 'slider',
			'id'       => 'post-related-number',
			'title'    => esc_html__( 'Number of Related Projects', 'volley' ),
			'subtitle' => esc_html__( 'Controls the number of posts that display under related posts section.', 'volley' ),
			'default'  => 2,
			'min'      => 2,
			'max'      => 4,
			'required' => array(
				'post-related-enable',
				'!=',
				'off'
			)
		),
		array(
			'id'       => 'post-carousel-width',
			'type'     => 'select',
			'title'    => esc_html( 'Width', 'volley' ),
			'subtitle' => esc_html__( 'Select desired width for the blog item on portfolio listing page, only for carousel and carousel filterable styles', 'volley' ),
			'options'  => array(
				''     => esc_html__( 'Default', 'volley' ),
				'2'    => esc_html__( '2 columns - 1/6', 'volley' ),
				'3'    => esc_html__( '3 columns - 1/4', 'volley' ),
				'4'    => esc_html__( '4 columns - 1/3', 'volley' ),
				'5'    => esc_html__( '5 columns - 5/12', 'volley' ),
				'6'    => esc_html__( '6 columns - 1/2', 'volley' ),
				'7'    => esc_html__( '7 columns - 7/12', 'volley' ),
				'8'    => esc_html__( '8 columns - 2/3', 'volley' ),
				'9'    => esc_html__( '9 columns - 3/4', 'volley' ),
				'10'   => esc_html__( '10 columns - 5/6', 'volley' ),
				'11'   => esc_html__( '11 columns - 11/12', 'volley' ),
				'12'   => esc_html__( '12 columns - 12/12', 'volley' ),
			)
		),
		array(
			'type'     => 'text',
			'id'       => 'themethreads-featured-label',
			'title'    => esc_html__( 'Label Before Title.', 'volley' ),
			'subtitle' => esc_html__( 'Will apply only for Featured Fullwidth style in Blog Listing Shortcode', 'volley' ),
		),
		array(
			'type'     => 'select',
			'id'       => 'post-metro-featured',
			'title'    => esc_html__( 'Make this post featured or instagram?', 'volley' ),
			'subtitle' => esc_html__( 'Will apply only for Metro style in Blog Listing Shortcode', 'volley' ),
			'options' => array(
				'default'   => esc_html__( 'Default', 'volley' ),
				'featured'  => esc_html__( 'Featured', 'volley' ),
				'instagram' => esc_html__( 'Instagram', 'volley' ),
			),
		),
		array(
			'type' => 'themethreads_colorpicker',
			'id' => 'instagram-post-overlay',
			'title'    => esc_html__( 'Overlay Color', 'volley' ),
			'subtitle' => esc_html__( 'Will apply only to instagram posts of the Metro style of the Blog listing', 'volley' ),
			'required' => array(
				'post-metro-featured',
				'=',
				'instagram'
			)
		)
		
	)
);
