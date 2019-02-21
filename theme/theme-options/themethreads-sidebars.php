<?php

/*
 * Sidebars Section
*/

$this->sections[] = array(
	'title'  => esc_html__( 'Sidebars', 'volley' ),
	'icon'   => 'el el-braille'
);


$this->sections[] = array(
	'title'      => esc_html__( 'Add sidebars', 'volley' ),
	'subsection' => true,
	'fields' => array(
		array(
			'id'       => 'custom-sidebars',
			'type'     => 'multi_text',
			'title'    => esc_html__( 'Add a Sidebar', 'volley' ),
			'subtitle' => esc_html__( '', 'volley' ),
			'desc'     => esc_html__( 'You can add as many custom sidebars as you need.', 'volley' )
		),
	)	
);

// Page Sidebar
$this->sections[] = array(
	'title'  => esc_html__( 'Page', 'volley' ),
	'subsection' => true,
	'fields' => array(

		array(
			'id'       => 'page-enable-global',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Default Sidebar of Pages', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to use the same sidebars across all pages by overwriting the page options.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'off'
		),
		array(
			'id'       => 'page-sidebar-one',
			'type'     => 'select',
			'title'    => esc_html__( 'Default Sidebar of Pages', 'volley' ),
			'subtitle' => esc_html__( 'Choose the sidebar that will display across all pages.', 'volley' ),
			'data'     => 'sidebars'
		),
		array(
			'id'       => 'page-sidebar-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Default Sidebar Position of Pages', 'volley' ),
			'subtitle' => esc_html__( 'Manages the position of the sidebar across all pages.', 'volley' ),
			'options'  => array(
				'left'  => esc_html__( 'Left', 'volley' ),
				'right' => esc_html__( 'Right', 'volley' )
			),
			'default'   => 'right'
		)
	)
);

// Portfolio Sidebar
$this->sections[] = array(
	'title'      => esc_html__( 'Portfolio Posts', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'portfolio-enable-global',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Default Sidebar of Portfolio Posts', 'volley' ),
			'subtitle' => esc_html__( 'Switch on to use the same sidebars across all portfolio posts by overwriting the page options.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'off'
		),
		array(
			'id'       => 'portfolio-sidebar-one',
			'type'     => 'select',
			'title'    => esc_html__( 'Default Sidebar of Portfolio Posts', 'volley' ),
			'subtitle' => esc_html__( 'Select sidebar that will display on all portfolio posts.', 'volley' ),
			'data'     => 'sidebars'
		),
		array(
			'id'       => 'portfolio-sidebar-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Default Sidebar Position of Portfolio Posts', 'volley' ),
			'subtitle' => esc_html__( 'Manages the position of the sidebar for all portfolio posts.', 'volley' ),
			'options'  => array(
				'left'  => esc_html__( 'Left', 'volley' ),
				'right' => esc_html__( 'Right', 'volley' )
			),
			'default' => 'right'
		)
	)
);

// Portfolio Archive Sidebar
$this->sections[] = array(
	'title'      => esc_html__( 'Portfolio Archive', 'volley' ),
	'subsection' => true,
	'fields' => array(

		array(
			'id'       => 'portfolio-archive-sidebar-one',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar of Portfolio Archive', 'volley' ),
			'subtitle' => esc_html__( 'Select a sidebar that will display on the portfolio archive pages.', 'volley' ),
			'data'     => 'sidebars'
		),
		array(
			'id'       => 'portfolio-archive-sidebar-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Default Sidebar Position of Portfolio Archive', 'volley' ),
			'subtitle' => esc_html__( 'Manages the position of the sidebar for portfolio archive pages.', 'volley' ),
			'options'  => array(
				'left'  => esc_html__( 'Left', 'volley' ),
				'right' => esc_html__( 'Right', 'volley' )
			),
			'default' => 'right'
		)
	)
);

// Blog Posts Sidebar
$this->sections[] = array(
	'title'      => esc_html__( 'Blog Posts', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'blog-enable-global',
			'type'	   => 'button_set',
			'title'    => esc_html__( 'Default Sidebar For Blog Posts', 'volley' ),
			'subtitle' => esc_html__( 'Turn on if you want to use the same sidebars on all blog posts. This option overrides the blog options.', 'volley' ),
			'options'  => array(
				'on'   => esc_html__( 'On', 'volley' ),
				'off'  => esc_html__( 'Off', 'volley' ),
			),
			'default' => 'off'
		),		
		array(
			'id'       => 'blog-sidebar-one',
			'type'     => 'select',
			'title'    => esc_html__( 'Default Blog Posts Sidebar', 'volley' ),
			'subtitle' => esc_html__( 'Select sidebar 1 that will display on all blog posts.', 'volley' ),
			'data'     => 'sidebars'
		),
		array(
			'id'       => 'blog-sidebar-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Default Blog Sidebar Position', 'volley' ),
			'subtitle' => esc_html__( 'Controls the position of sidebar for all blog posts. ', 'volley' ),
			'options'  => array(
				'left'  => esc_html__( 'Left', 'volley' ),
				'right' => esc_html__( 'Right', 'volley' )
			),
			'default' => 'right'
		)
	)
);

// Blog Archive Sidebar
$this->sections[] = array(
	'title'      => esc_html__( 'Blog Archive', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'blog-archive-sidebar-one',
			'type'     => 'select',
			'title'    => esc_html__( 'Blog Archive Sidebar', 'volley' ),
			'subtitle' => esc_html__( 'Select a sidebar that will display on the blog archive pages.', 'volley' ),
			'data' => 'sidebars'
		),
		array(
			'id'       => 'blog-archive-sidebar-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Default Blog Archive Sidebar Position', 'volley' ),
			'subtitle' => esc_html__( 'Controls the position of the sidebar for blog archive pages.', 'volley' ),
			'options'  => array(
				'left'  => esc_html__( 'Left', 'volley' ),
				'right' => esc_html__( 'Right', 'volley' )
			),
			'default' => 'right'
		)
	)
);

// Search page Sidebar
$this->sections[] = array(
	'title'      => esc_html__( 'Search Page', 'volley' ),
	'subsection' => true,
	'fields'     => array(

		array(
			'id'       => 'search-sidebar-one',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar of Search Page', 'volley' ),
			'subtitle' => esc_html__( 'Choose a sidebar that will display on the search results page.', 'volley' ),
			'data' => 'sidebars'
		),
		array(
			'id'       => 'search-sidebar-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Sidebar Position of Search Page', 'volley' ),
			'subtitle' => esc_html__( 'Manages the position of the sidebar for the search results page.', 'volley' ),
			'options'  => array(
				'left'  => esc_html__( 'Left', 'volley' ),
				'right' => esc_html__( 'Right', 'volley' )
			),
			'default' => 'right'
		)
	)
);

themethreads_action( 'option_sidebars', $this );
