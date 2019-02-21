<?php

$style = $atts['style'];
$filter_id = $atts['filter_id'];
$section_id = uniqid( 'heading-id' );
$ajax_trigger = $atts['ajax_trigger'];

$carousel_heading = $unique_id = '';
if( !empty( $atts['carousel_heading'] ) ) {
	$carousel_heading = '<header class="fancy-title" id="' . $section_id . '"><h2 class="font-weight-bold">'. esc_html( $atts['carousel_heading'] ) . '</h2></header>';
}

$ajax_wrapper = '';

if( !empty( $atts['unique_id'] ) ) {
	$unique_id = $atts['unique_id'];
	$ajax_wrapper = '.' . $unique_id;
}

// check
$located = locate_template( "templates/blog/tmpl-$style.php" );
if ( ! file_exists( $located ) ) {
	return;
}
$masonry_sizes = array(
	'shortest' => 'h-300',
	'short'    => 'h-300',
	'stall'    => 'h-300',
	'taller'   => 'h-300',
);

$i = 0;

// The CSS
$this->generate_css();

echo '<div class="themethreads-blog-posts ' . $this->get_id() . ' ' . $unique_id . ' ">';

// Include filter
if( 'yes' === $atts['enable_filter'] ) {
	$filter_located = locate_template( 'templates/blog/partial-filters.php' );
	include $filter_located;
}

// Build Query
$GLOBALS['wp_query'] = new WP_Query( $this->build_query() );
$before = $after = '';
	
	
	if( 'timeline' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-timeline row" data-themethreads-masonry="true">';	
		$before = '<div class="' . $this->get_grid_class() . ' masonry-item">';
		$after  = '</div>';
	}
	elseif( 'classic-full' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-classic row">';
		$before = '<div class="col-md-12">';
		$after  = '</div>';		
	}
	elseif( 'candy' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-candy row" data-themethreads-masonry="true">';
		$before = '<div class="col-md-5 masonry-item">';
		$after  = '</div>';		
	}
	elseif( 'split' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-split row" data-themethreads-masonry="true" data-masonry-options=\'{ "stagger": 50, "hiddenStyle": { "transform": "translateY(100px)", "opacity": 0 }, "visibleStyle": { "transform": "translateY(0)", "opacity": 1 }, "filtersID": "#' . $filter_id . '" }\'>';
		$before = '<div class="col-sm-12 masonry-item ">';
		$after = '</div>';
	}
	elseif( 'masonry' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-grid themethreads-blog-style-masonry themethreads-blog-grid-columns-4" data-themethreads-masonry="true">';
		$before = '<div class="' . $this->get_grid_class() . ' masonry-item">';
		$after  = '</div>';		
	}
	elseif( 'minimal' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-square row mx-0" data-themethreads-masonry="true">';
		$before = '<div class="col-md-4 masonry-item px-0">';
		$after  = '</div>';
	}
	elseif( 'square' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-square row" data-themethreads-masonry="true">';
		$before = '<div class="col-md-4 masonry-item">';
		$after  = '</div>';
	}
	elseif( 'featured-fullwidth' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-fullwidth row">';
		$before = '<div class="col-xs-12">';
		$after  = '</div>';
	}
	elseif( 'carousel' === $style ) {
		echo '<div class="themethreads-blog-grid themethreads-blog-style-carousel"><div class="carousel-container carousel-nav-circle carousel-nav-bordered carousel-nav-sm">
		' . $carousel_heading . '
		<div class="carousel-items row" data-threads-flickity=\'{ "equalHeightCells": true, "fullwidthSide": true, "prevNextButtons": true, "navArrow": 6, "buttonsAppendTo": "#' . $section_id . '" }\'>';
		$before = '<div class="carousel-item col-lg-8 col-md-6 col-sm-12">';
		$after  = '</div>';
	}
	elseif( 'carousel-filter' === $style ) {
		echo '<div class="carousel-container carousel-nav-floated carousel-nav-vertical carousel-nav-left carousel-nav-circle carousel-nav-solid carousel-nav-lg carousel-nav-shadowed" data-filterable-carousel="true">
				<div class="carousel-items row" data-threads-flickity=\'{ "filters": "#' . $filter_id . '", "prevNextButtons": true, "navArrow": 1, "fullwidthSide": true, "navOffsets": { "nav": {"left": -10, "top": 200} } }\'>';
		$before = '<div class="carousel-item col-lg-8 col-md-6 col-sm-12">';
		$after  = '</div>';		
	}
	elseif( 'metro' === $style || 'metro-alt' === $style ) {
		echo '<div class="themethreads-blog-grid row">';
		echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" class="themethreads-lp-gradient" width="0" height="0">
				<defs>
					<linearGradient id="themethreads-lp-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
						<stop offset="0%" />
						<stop offset="100%" />
					</linearGradient>
				</defs>
			</svg>';		
		$before = '<div class="col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-0 col-xs-12">';
		$after  = '</div>';		
	}
	else {
		echo '<div class="themethreads-blog-grid row">';
		$before = '<div class="' . $this->get_grid_class() . '">';
		$after  = '</div>';
	}
	


	while( have_posts() ): the_post();
	
		$post_classes = array( 'themethreads-lp' );
		if( 'text-date' === $style ) {
			$post_classes[] = 'themethreads-lp-time-aside';
		}
		elseif( 'grid' === $style ) {
			$post_classes[] = 'themethreads-blog-item themethreads-blog-item-grid themethreads-blog-scheme-dark';
		}
		elseif( 'metro' === $style || 'metro-alt' === $style ) {
			$post_classes[] = 'themethreads-lp-sp-block';
			if( 'metro-alt' === $style ) {
				$post_classes[] = 'themethreads-lp-sp-block-alt';	
			}
			$featured = get_post_meta( get_the_ID(), 'post-metro-featured', true );
			if( 'featured' ===  $featured ) {
				$post_classes[] = 'themethreads-lp-featured';
			}
			elseif( 'instagram' === $featured ) {
				$post_classes[] = 'themethreads-lp-sp-instagram';				
			}
			else{
				$i++;
				if( $i % 3 == 0 || $i % 4 == 0 ) {
					$post_classes[] = 'themethreads-lp-reverse';
				}
				if( $i % 4 == 0 ) {
					$i = 0;
				}
			}
		}
		elseif( 'candy' === $style ) {
			$post_classes[] = 'themethreads-lp themethreads-lp themethreads-blog-item themethreads-blog-item-candy themethreads-blog-scheme-dark';
			$i++;
			if( $i % 2 == 0 ) {
				$before = '<div class="col-md-5 col-md-offset-2 masonry-item">';
			}
			else {
				$before = '<div class="col-md-5 masonry-item">';
			}
		}
		elseif( 'square' === $style ) {
			$post_classes[] = 'themethreads-lp themethreads-blog-item themethreads-blog-contents-inside themethreads-blog-item-square themethreads-blog-scheme-light round h-450';
			$i++;
			if( 1 === $i ) {
				$before = '<div class="col-md-6 masonry-item">';
			}
			else {
				$before = '<div class="col-md-3 col-sm-6 masonry-item">';
			}			
		}
		elseif( 'timeline' === $style ) {
			$post_classes[] = 'themethreads-blog-item themethreads-blog-item-timeline themethreads-blog-scheme-dark themethreads-blog-scheme-dark-alt';
		}
		elseif( 'masonry' === $style ) {
			$post_size_meta = get_post_meta( get_the_ID(), 'themethreads-post-height', true );
			$post_size = isset( $masonry_sizes[ $post_size_meta ] ) ? $masonry_sizes[ $post_size_meta ] : 'h-300';
			$post_classes[] = 'themethreads-blog-item themethreads-blog-contents-inside themethreads-blog-item-masonry themethreads-blog-scheme-light themethreads-blog-cloned-title ' . $post_size;
		}
		elseif( 'minimal' === $style ) {
			$post_classes[] = 'themethreads-lp themethreads-blog-item themethreads-blog-item-gray themethreads-blog-scheme-dark';
		}
		elseif( 'featured-fullwidth' === $style ) {
			$post_classes[] = 'themethreads-blog-item themethreads-blog-contents-inside contents-middle themethreads-blog-item-fullwidth themethreads-blog-scheme-light themethreads-blog-scheme-light-alt h-100';
		}
		elseif( 'carousel' === $style ) {
			$post_width_meta = get_post_meta( get_the_ID(), 'post-carousel-width', true );
			$post_width = !empty( $post_width_meta ) ? $post_width_meta : '8';
			$before = '<div class="carousel-item col-lg-' . $post_width . ' col-md-6 col-sm-12">';
			$post_classes[] = 'themethreads-blog-item themethreads-blog-item-carousel themethreads-blog-contents-inside contents-bottom themethreads-blog-scheme-light themethreads-blog-scheme-light-alt h-300';
		}
		elseif( 'split' === $style ) {
			$before = '<div class="col-sm-12 masonry-item ' . $this->entry_term_classes() . '">';
			$post_classes[] = 'themethreads-blog-item themethreads-blog-item-split themethreads-blog-scheme-dark themethreads-blog-scheme-dark-alt';
		}
		elseif( 'classic-full' === $style ) {
			$post_classes[] = 'themethreads-blog-item themethreads-blog-item-grid themethreads-blog-scheme-dark';
		}

		$post_classes = join( ' ', get_post_class( $post_classes, get_the_ID() ) );

		$attributes = array(
			'id'    => 'post-' . get_the_ID(),
			'class' => $post_classes
		);
		
		echo $before;
		
		printf( '<article%s>', ld_helper()->html_attributes( $attributes ) );

			if( 'quote' === get_post_format() ) {
				$quote_located = locate_template( 'templates/blog/format-quote.php' );
				include $quote_located;
			}
			else {
				include $located;
			}

		echo '</article>';

		echo $after;
		
	endwhile;
	
	if( 'carousel' === $style ) {
		echo '</div></div>';
	}
	echo '</div><!--/ .row -->';
	
	// Pagination
	if( 'pagination' === $atts['pagination'] ) {
		
		$max = $GLOBALS['wp_query']->max_num_pages;

		// Set up paginated links.
        $links = paginate_links( array(
			'type' => 'array',
			'prev_next' => true,
			'prev_text' => '<span aria-hidden="true">' . wp_kses_post( __( '<i class="fa fa-angle-left"></i>', 'volley-core' ) ) . '</span>',
			'next_text' => '<span aria-hidden="true">' . wp_kses_post( __( '<i class="fa fa-angle-right"></i>', 'volley-core' ) ) . '</span>',
		) );

		if( !empty( $links ) ) {
			printf( '<div class="page-nav"><nav aria-label="Page navigation"><ul class="pagination"><li>%s</li></ul></nav></div>', join( "</li>\n\t<li>", $links ) );
		}
	}
	
	if( in_array( $atts['pagination'], array( 'ajax' ) ) && $url = get_next_posts_page_link( $GLOBALS['wp_query']->max_num_pages ) ) {
		$hash = array(
			'ajax' => 'btn btn-md ajax-load-more',
		);

		$attributes = array(
			'href' => add_query_arg( 'ajaxify', '1', $url ),
			'rel' => 'nofollow',
			'data-ajaxify' => true,
			'data-ajaxify-options' => json_encode( array(
				'wrapper' => '.themethreads-blog-posts' . $ajax_wrapper . ' > .themethreads-blog-grid',
				'items'   => '> div',
				'trigger' => $ajax_trigger,
			) )
		);

		echo '<div class="themethreads-pf-nav ld-pf-nav-ajax"><div class="page-nav text-center"><nav aria-label="' . esc_attr__( 'Page navigation', 'volley-core' ) . '">';
		switch( $atts['pagination'] ) {

			case 'ajax':
				$ajax_text = ! empty( $atts['ajax_text'] ) ? esc_html( $atts['ajax_text'] ) : esc_html__( 'Load more', 'volley-core' );
				$attributes['class'] = 'ld-ajax-loadmore';
				printf( '<a%2$s><span><span class="static">%1$s</span><span class="loading"><span class="dots"><span></span><span></span><span></span></span><span class="text-uppercase lts-sp-1">' . esc_html__( 'Loading', 'volley-core' ) . '</span></span><span class="all-loaded">' . esc_html__( 'All items loaded', 'volley-core' ) . ' <i class="fa fa-check"></i></span></span></a>', $ajax_text, ld_helper()->html_attributes( $attributes ), $url );
				break;
		}

		echo '</nav></div></div>';
	}

	wp_reset_query();

echo '</div><!--/ .themethreads-blog-posts -->';