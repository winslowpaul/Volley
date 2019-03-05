<?php
/*
 * Post
*/

// Audio
$sections[] = array(
	'separate_box' => true,
	'box_title'    => esc_html__( 'Audio', 'volley' ),
	'post_types'   => array( 'post', 'volley-portfolio' ),
	'post_format'  => array( 'audio' ),
	'icon'         => 'el-icon-screen',
	'fields' => array(

		array(
			'id' => 'post-audio',
			'type' => 'text',
			'title' => esc_html__( 'Audio URL', 'volley' ),
			'desc' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'volley' )
		)
	)
);

// Gallery
$sections[] = array(
	'separate_box' => true,
	'box_title'    => esc_html__( 'Gallery', 'volley' ),
	'post_types'   => array( 'post', 'volley-portfolio' ),
	'post_format'  => array( 'gallery' ),
	'icon'         => 'el-icon-screen',
	'fields' => array(

		array(
			'id'        => 'post-gallery-lightbox',
			'type'      => 'button_set',
			'title'     => esc_html__( 'Lightbox?', 'volley' ),
			'subtitle'  => esc_html__( 'Enable lightbox for gallery images', 'volley' ),
			'options' => array(
				'on'  => esc_html__( 'On', 'volley' ),
				'off' => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'off'
		),

		array(
			'id'        => 'post-gallery',
			'type'      => 'slides',
			'title'     => esc_html__( 'Gallery Slider', 'volley' ),
			'subtitle'  => esc_html__( 'Upload images or add from media library.', 'volley' ),
			'placeholder'   => array(
				'title'     => esc_html__( 'Title', 'volley' ),
			),
			'show' => array(
				'title' => true,
				'description' => false,
				'url' => false,
			)
		)
	)
);

// Link
$sections[] = array(
	'separate_box' => true,
	'box_title'    => esc_html__( 'Link', 'volley' ),
	'post_types' => array( 'post' ),
	'post_format' => array( 'link' ),
	'icon' => 'el-icon-screen',
	'fields' => array(

		array(
			'id'        => 'post-link-url',
			'type'      => 'text',
			'title'     => esc_html__( 'URL', 'volley' )
		)
	)
);

// Quote
$sections[] = array(
	'separate_box' => true,
	'box_title'    => esc_html__( 'Quote', 'volley' ),
	'post_types' => array( 'post' ),
	'post_format' => array( 'quote' ),
	'icon' => 'el-icon-screen',
	'fields' => array(
		array(
			'id'        => 'post-quote-url',
			'type'      => 'text',
			'title'     => esc_html__( 'Cite', 'volley' )
		)
	)
);

// Video
$sections[] = array(
	'separate_box' => true,
	'box_title'    => esc_html__( 'Video', 'volley' ),
	'post_types' => array( 'post', 'volley-portfolio' ),
	'post_format' => array( 'video' ),
	'icon' => 'el-icon-screen',
	'fields' => array(

		array(
			'id'        => 'post-video-url',
			'type'      => 'text',
			'title'     => esc_html__( 'Video URL', 'volley' ),
			'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'volley' )
		),

		array(
			'id'        => 'post-video-file',
			'type'      => 'editor',
			'title'     => esc_html__( 'Video Upload', 'volley' ),
			'desc'  => esc_html__( 'Upload video file', 'volley' )
		),

		array(
			'id'        => 'post-video-html',
			'type'      => 'textarea',
			'title'     => esc_html__( 'Embadded video', 'volley' ),
			'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'volley' )
		)
	)
);
