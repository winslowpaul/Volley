<?php
/*
 * Blog
 */

$this->sections[] = array(
	'title'  => esc_html__( 'Blog', 'volley' ),
	'icon'   => 'el el-pencil'
);

$this->sections[] = array(
	'title'      => esc_html__( 'General Blog', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'blog-title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Blog Page Title Bar', 'volley' ),
			'subtitle' => esc_html__( 'Display the page title bar for the assigned blog page in settings > reading or the blog archive pages. Note: This option will not control the blog element.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),

		array(
			'id'       => 'blog-title-bar-heading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Page Title', 'volley' ),
			'subtitle' => esc_html__( 'Manages the title text that displays in the page title bar only if your front page displays your latest post in "settings > reading".', 'volley' ),
			'default'  => 'Blog'
		),
		array(
			'id'       => 'blog-title-bar-subheading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Page Subtitle', 'volley' ),
			'subtitle' => esc_html__( 'Manage the subtitle text that displays in the page title bar only if your front page displays your latest post in "settings > reading".', 'volley' )
		),
		array(
			'id'      => 'blog-style',
			'type'    => 'select',
			'title'   => esc_html__( 'Post Style', 'volley' ),
			'options' => array(
				'classic'            => esc_html__( 'Classic', 'volley' ),
				'classic-bold'       => esc_html__( 'Classic Bold', 'volley' ),
				'featured'           => esc_html__( 'Featured', 'volley' ),
				'featured-minimal'   => esc_html__( 'Featured Minimal', 'volley' ),
				'rounded'            => esc_html__( 'Rounded', 'volley' ),
				'classic-meta'       => esc_html__( 'Classic Meta', 'volley' ),
				'classic-2'          => esc_html__( 'Classic 2', 'volley' ),
				'text-date'          => esc_html__( 'Text date', 'volley' ),
				'metro'              => esc_html__( 'Metro', 'volley' ),
				'minimal'            => esc_html__( 'Minimal Grey', 'volley' ),
				'metro-alt'          => esc_html__( 'Metro Alt', 'volley' ),
				'grid'               => esc_html__( 'Grid', 'volley' ),
				'masonry'            => esc_html__( 'Masonry', 'volley' ),
				'split'              => esc_html__( 'Split', 'volley' ),
				'square'             => esc_html__( 'Square', 'volley' ),
				'featured-fullwidth' => esc_html__( 'Featured Fullwidth', 'volley' ),
				'timeline'           => esc_html__( 'Timeline', 'volley' ),
				'classic-full'       => esc_html__( 'Classic Full', 'volley' ),
			),
			'subtitle' => esc_html__( 'Choose a post style for your blog page.', 'volley' ),
			'default'  => 'classic'
		),
		array(
			'id'      => 'blog-columns',
			'type'    => 'select',
			'title'   => esc_html__( 'Columns', 'volley' ),
			'options' => array(
				'1'       => esc_html__( '1 Column', 'volley' ),
				'2'       => esc_html__( '2 Columns', 'volley' ),
				'3'       => esc_html__( '3 Columns', 'volley' ),
				'4'       => esc_html__( '4 Columns', 'volley' ),
			),
			'subtitle' => esc_html__( 'How many columns to show for your blog page.', 'volley' ),
			'default'  => '2'
		),
		array(
			'id'    => 'blog-show-meta',
			'type'	   => 'button_set',
			'title' => esc_html__( 'Meta', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage the meta for posts', 'volley' ),
			'default'  => 'yes'
		),
		array(
			'id'    => 'blog-meta-type',
			'type'  => 'select',
			'title' => esc_html__( 'Meta Type', 'volley' ),
			'options' => array(
				'tags' => esc_html__( 'Tags', 'volley' ),
				'cats' => esc_html__( 'Categories', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage the meta type for posts', 'volley' ),
			'default'  => 'tags',
			'required' => array(
				'blog-show-meta',
				'equals',
				'yes'
			)
		),
		array(
			'id'    => 'blog-one-category',
			'type'  => 'select',
			'title' => esc_html__( 'Single Category', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage the single category for posts', 'volley' ),
			'default'  => 'yes',
			'required' => array(
				'blog-meta-type',
				'equals',
				'cats'
			)	
		),
		array(
			'id'       => 'blog-excerpt-length',
			'type'     => 'text',
			'title'    => esc_html__( 'Default Blog Excerpt Length', 'volley' ),
			'validate' => 'numeric',
			'default'  => '50',
		),
		array(
			'id'    => 'blog-enable-parallax',
			'type'	=> 'button_set',
			'title' => esc_html__( 'Parallax', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage parallax for post thumbnail', 'volley' ),
			'default'  => 'yes'
		),

	)
);

//Category Archive Options
$this->sections[] = array(
	'title'      => esc_html__( 'Blog Category Page', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'category-title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Blog Category Page Title', 'volley' ),
			'subtitle' => esc_html__( 'Display the blog category page title.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),

		array(
			'id'       => 'category-title-bar-heading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Category Page Title', 'volley' ),
			'desc'     => esc_html__( '[ld_category_title] shortcode displays the corresponding the category title, any text can be added before or after the shortcode.', 'volley' ),
			'subtitle' => esc_html__( 'Manage the title of blog category pages.', 'volley' ),
			'default'  => '[ld_category_title]',
		),

		array(
			'id'       => 'category-title-bar-subheading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Category Page Subtitle', 'volley' ),
			'subtitle' => esc_html__( 'Manages the subtitle of blog category pages.', 'volley' )
		),

		array(
			'id'      => 'category-blog-style',
			'type'    => 'select',
			'title'   => esc_html__( 'Style', 'volley' ),
			'options' => array(
				'classic'            => esc_html__( 'Classic', 'volley' ),
				'classic-bold'       => esc_html__( 'Classic Bold', 'volley' ),
				'featured'           => esc_html__( 'Featured', 'volley' ),
				'featured-minimal'   => esc_html__( 'Featured Minimal', 'volley' ),
				'rounded'            => esc_html__( 'Rounded', 'volley' ),
				'classic-meta'       => esc_html__( 'Classic Meta', 'volley' ),
				'classic-2'          => esc_html__( 'Classic 2', 'volley' ),
				'text-date'          => esc_html__( 'Text date', 'volley' ),
				'metro'              => esc_html__( 'Metro', 'volley' ),
				'minimal'            => esc_html__( 'Minimal Grey', 'volley' ),
				'metro-alt'          => esc_html__( 'Metro Alt', 'volley' ),
				'grid'               => esc_html__( 'Grid', 'volley' ),
				'masonry'            => esc_html__( 'Masonry', 'volley' ),
				'split'              => esc_html__( 'Split', 'volley' ),
				'square'             => esc_html__( 'Square', 'volley' ),
				'featured-fullwidth' => esc_html__( 'Featured Fullwidth', 'volley' ),
				'timeline'           => esc_html__( 'Timeline', 'volley' ),
				'classic-full'       => esc_html__( 'Classic Full', 'volley' ),
			),
			'subtitle' => esc_html__( 'Select content type for your grid.', 'volley' ),
			'default'  => 'classic'
		),
		array(
			'id'    => 'category-blog-show-meta',
			'type'  => 'select',
			'title' => esc_html__( 'Meta', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage the meta for posts', 'volley' ),
			'default'  => 'yes'
		),
		array(
			'id'    => 'category-blog-meta-type',
			'type'  => 'select',
			'title' => esc_html__( 'Meta Type', 'volley' ),
			'options' => array(
				'tags' => esc_html__( 'Tags', 'volley' ),
				'cats' => esc_html__( 'Categories', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage the meta type for posts', 'volley' ),
			'default'  => 'tags',
			'required' => array(
				'blog-show-meta',
				'equals',
				'yes'
			)
		),
		array(
			'id'    => 'category-blog-one-category',
			'type'	=> 'button_set',
			'title' => esc_html__( 'Single Category', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( '', 'volley' ),
			'default'  => 'yes',
			'required' => array(
				'blog-meta-type',
				'equals',
				'cats'
			)	
		),
		array(
			'id'       => 'category-blog-excerpt-length',
			'type'     => 'text',
			'title'    => esc_html__( 'Default Blog Excerpt Length', 'volley' ),
			'validate' => 'numeric',
			'default'  => '45',
		),
		array(
			'id'    => 'category-blog-enable-parallax',
			'type'	=> 'button_set',
			'title' => esc_html__( 'Parallax', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage parallax for post thumbnail.', 'volley' ),
			'default'  => 'yes'
		),

	)
);

//Tag Archive Options
$this->sections[] = array(
	'title'      => esc_html__( 'Blog Tag Page', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'tag-title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Blog Tag Page Title Bar', 'volley' ),
			'subtitle' => esc_html__( 'Display the title on blog tag pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'tag-title-bar-heading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Tag Page Title', 'volley' ),
			'desc'     => esc_html__( '[ld_tag_title] shortcode displays the corresponding the category title, any text can be added before or after the shortcode.', 'volley' ),
			'subtitle' => esc_html__( 'Manage the title of blog tag pages.', 'volley' ),
			'default'  => 'Tag: [ld_tag_title]'
		),
		array(
			'id'       => 'tag-title-bar-subheading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Tag Page Subtitle', 'volley' ),
			'subtitle' => esc_html__( 'Manage the subtitle of blog category pages.', 'volley' )
		),
		array(
			'id'      => 'tag-blog-style',
			'type'    => 'select',
			'title'   => esc_html__( 'Style', 'volley' ),
			'options' => array(
				'classic'            => esc_html__( 'Classic', 'volley' ),
				'classic-bold'       => esc_html__( 'Classic Bold', 'volley' ),
				'featured'           => esc_html__( 'Featured', 'volley' ),
				'featured-minimal'   => esc_html__( 'Featured Minimal', 'volley' ),
				'rounded'            => esc_html__( 'Rounded', 'volley' ),
				'classic-meta'       => esc_html__( 'Classic Meta', 'volley' ),
				'classic-2'          => esc_html__( 'Classic 2', 'volley' ),
				'text-date'          => esc_html__( 'Text date', 'volley' ),
				'metro'              => esc_html__( 'Metro', 'volley' ),
				'minimal'            => esc_html__( 'Minimal Grey', 'volley' ),
				'metro-alt'          => esc_html__( 'Metro Alt', 'volley' ),
				'grid'               => esc_html__( 'Grid', 'volley' ),
				'masonry'            => esc_html__( 'Masonry', 'volley' ),
				'split'              => esc_html__( 'Split', 'volley' ),
				'square'             => esc_html__( 'Square', 'volley' ),
				'featured-fullwidth' => esc_html__( 'Featured Fullwidth', 'volley' ),
				'timeline'           => esc_html__( 'Timeline', 'volley' ),
				'classic-full'       => esc_html__( 'Classic Full', 'volley' ),
			),
			'subtitle' => esc_html__( 'Choose a post style for your blog category pages.', 'volley' ),
			'default'  => 'classic'
		),
		array(
			'id'    => 'tag-blog-show-meta',
			'type'	=> 'button_set',
			'title' => esc_html__( 'Meta', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( '', 'volley' ),
			'default'  => 'yes'
		),
		array(
			'id'    => 'tag-blog-meta-type',
			'type'  => 'select',
			'title' => esc_html__( 'Meta Type', 'volley' ),
			'options' => array(
				'tags' => esc_html__( 'Tags', 'volley' ),
				'cats' => esc_html__( 'Categories', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage the meta type for posts', 'volley' ),
			'default'  => 'tags',
			'required' => array(
				'blog-show-meta',
				'equals',
				'yes'
			)
		),
		array(
			'id'    => 'tag-blog-one-category',
			'type'  => 'select',
			'title' => esc_html__( 'Single Category', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( '', 'volley' ),
			'default'  => 'yes',
			'required' => array(
				'blog-meta-type',
				'equals',
				'cats'
			)	
		),
		array(
			'id'       => 'tag-blog-excerpt-length',
			'type'     => 'text',
			'title'    => esc_html__( 'Default Blog Excerpt Length', 'volley' ),
			'validate' => 'numeric',
			'default'  => '50',
		),
		array(
			'id'    => 'tag-blog-enable-parallax',
			'type'	=> 'button_set',
			'title' => esc_html__( 'Parallax', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Parallax for images', 'volley' ),
			'default'  => 'yes'
		),

	)
);

//Author Archive Options
$this->sections[] = array(
	'title'      => esc_html__( 'Blog Author Page', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'author-title-bar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Blog Author Page Title Bar', 'volley' ),
			'subtitle' => esc_html__( 'Display the title bar on blog author pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'author-title-bar-heading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Author Page Title', 'volley' ),
			'desc'     => esc_html__( '[ld_author] shortcode displays the corresponding the author name, any text can be added before or after the shortcode.', 'volley' ),
			'subtitle' => esc_html__( 'Manage the title of blog author page title.', 'volley' ),
			'default'  => 'Author: [ld_author]'
		),
		array(
			'id'       => 'author-title-bar-subheading',
			'type'	   => 'text',
			'title'    => esc_html__( 'Blog Author Page Subtitle', 'volley' ),
			'subtitle' => esc_html__( 'Manages the subtitle of blog author pages.', 'volley' )
		),
		array(
			'id'      => 'author-blog-style',
			'type'    => 'select',
			'title'   => esc_html__( 'Post Style', 'volley' ),
			'options' => array(
				'classic'            => esc_html__( 'Classic', 'volley' ),
				'classic-bold'       => esc_html__( 'Classic Bold', 'volley' ),
				'featured'           => esc_html__( 'Featured', 'volley' ),
				'featured-minimal'   => esc_html__( 'Featured Minimal', 'volley' ),
				'rounded'            => esc_html__( 'Rounded', 'volley' ),
				'classic-meta'       => esc_html__( 'Classic Meta', 'volley' ),
				'classic-2'          => esc_html__( 'Classic 2', 'volley' ),
				'text-date'          => esc_html__( 'Text date', 'volley' ),
				'metro'              => esc_html__( 'Metro', 'volley' ),
				'minimal'            => esc_html__( 'Minimal Grey', 'volley' ),
				'metro-alt'          => esc_html__( 'Metro Alt', 'volley' ),
				'grid'               => esc_html__( 'Grid', 'volley' ),
				'masonry'            => esc_html__( 'Masonry', 'volley' ),
				'split'              => esc_html__( 'Split', 'volley' ),
				'square'             => esc_html__( 'Square', 'volley' ),
				'featured-fullwidth' => esc_html__( 'Featured Fullwidth', 'volley' ),
				'timeline'           => esc_html__( 'Timeline', 'volley' ),
				'classic-full'       => esc_html__( 'Classic Full', 'volley' ),
			),
			'subtitle' => esc_html__( 'Choose the post style for your blog author pages.', 'volley' ),
			'default'  => 'classic'
		),
		array(
			'id'    => 'author-blog-show-meta',
			'type'	=> 'button_set',
			'title' => esc_html__( 'Meta', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage the meta for posts', 'volley' ),
			'default'  => 'yes'
		),
		array(
			'id'    => 'author-blog-meta-type',
			'type'  => 'select',
			'title' => esc_html__( 'Meta Type', 'volley' ),
			'options' => array(
				'tags' => esc_html__( 'Tags', 'volley' ),
				'cats' => esc_html__( 'Categories', 'volley' ),
			),
			'subtitle' => esc_html__( '', 'volley' ),
			'default'  => 'tags',
			'required' => array(
				'blog-show-meta',
				'equals',
				'yes'
			)
		),
		array(
			'id'    => 'author-blog-one-category',
			'type'  => 'select',
			'title' => esc_html__( 'Single Category', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( '', 'volley' ),
			'default'  => 'yes',
			'required' => array(
				'blog-meta-type',
				'equals',
				'cats'
			)	
		),
		array(
			'id'       => 'author-blog-excerpt-length',
			'type'     => 'text',
			'title'    => esc_html__( 'Default Blog Excerpt Length', 'volley' ),
			'validate' => 'numeric',
			'default'  => '45',
		),
		array(
			'id'    => 'author-blog-enable-parallax',
			'type'	=> 'button_set',
			'title' => esc_html__( 'Parallax for Posts', 'volley' ),
			'options' => array(
				'yes' => esc_html__( 'Yes', 'volley' ),
				'no' => esc_html__( 'No', 'volley' ),
			),
			'subtitle' => esc_html__( 'Manage parallax for post thumbnails', 'volley' ),
			'default'  => 'yes'
		),

	)
);

$this->sections[] = array(
	'title'      => esc_html__('Blog Single Post', 'volley'),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'      => 'post-style',
			'type'    => 'select',
			'title'   => esc_html__( 'Single Post Style', 'volley' ),
			'options' => array(
				'default'      => esc_html__( 'Default', 'volley' ),
				'cover'        => esc_html__( 'Cover', 'volley' ),
				'cover-spaced' => esc_html__( 'Cover Spaced', 'volley' ),
				'slider'       => esc_html__( 'Cover Slider', 'volley' ),
			),
			'default' => 'cover-spaced'
		),
		array(
			'id'       => 'post-titlebar-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Page Title Bar', 'volley' ),
			'subtitle' => esc_html__( 'Display title bar on single posts', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default' => 'off'
		),
		array(
			'id'              => 'single_typography',
			'title'           => esc_html__( 'Single Post Title Typography', 'volley' ),
			'subtitle'        => esc_html__( 'Manage the typography for the single post headers', 'volley' ),
			'type'            => 'typography',
			'letter-spacing'  => true,
			'text-align'      => false,
			'compiler'        => true,
			'units'           => '%',
		),
		array(
			'id'       => 'post-social-box-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Social Sharing', 'volley' ),
			'subtitle' => esc_html__( 'Display the social sharing box on single post pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'post-author-box-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Author Meta', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display the author info box on single post pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'post-navigation-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Neighbour Posts', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to display the previous post and next post on single post pages.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'id'       => 'post-related-enable',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Related Posts', 'volley' ),
			'subtitle' => esc_html__( 'Display the related posts on single posts.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' )
			),
			'default'  => 'on'
		),
		array(
			'type'     => 'text',
			'id'       => 'post-related-title',
			'title'    => esc_html__( 'Title of Related Posts', 'volley' ),
			'default'  => 'You may also like',
			'required' => array(
				'post-related-enable',
				'equals',
				'on'
			)
		),
		array(
			'type'     => 'slider',
			'id'       => 'post-related-number',
			'title'    => esc_html__( 'Related Posts Quantity', 'volley' ),
			'subtitle' => esc_html__( 'Quantity of projects those display on related posts section.', 'volley' ),
			'default'  => 2,
			'max'      => 100,
			'required' => array(
				'post-related-enable',
				'equals',
				'on'
			)
		)
	)
);
