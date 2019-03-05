<?php
/**
 * The Template Tags
 */

/**
 * [themethreads_get_header_layout description]
 * @method themethreads_get_header_layout
 * @return [type]                  [description]
 */
function themethreads_get_header_layout() {

	global $post;

	$ID = 0;

	//Keep old id
	if( !is_404() || is_search() ) {
		$ID = $post->ID;	
	}

	// which one
	$id = themethreads_get_custom_header_id();
	$header = get_post( $id );
	$post = $header;

	$header_overlay = get_post_meta( $id, 'header-overlay', true );
	$header_sticky  = get_post_meta( $id, 'header-sticky', true );
	$header_sticky_pos  = get_post_meta( $id, 'header-sticky-pos', true );
	$header_sticky_bg  = get_post_meta( $id, 'header-sticky-bg', true );
	
	$header_megamenu_react  = get_post_meta( $id, 'header-megamenu-react', true );
	

	// Hash
	$header_styles = array(
		'default'	 => 'main-header ' . $header_overlay,
		'fullscreen' => 'main-header header-fullscreen header-fullscreen-style-1 ' . $header_overlay,
		'side'       => 'main-header header-side header-side-style-1',
		'side-2'     => 'main-header header-side header-side-style-2',
		'side-3'     => 'main-header header-side header-side-style-3'
	);

	// layout
	$layout = themethreads_helper()->get_post_meta( 'header-layout', $id );
	$layout = $layout ? $layout : 'default';

	// Classes
	$class = $header_styles[$layout];

	// Attributes
	$attributes = array(
		'class' => $class
	);
	
	
	if( 'yes' === $header_megamenu_react ) {
		$attributes['data-react-to-megamenu'] = 'true';
	}	
	if( 'yes' === $header_sticky ) {
		$attributes['data-sticky-header'] = 'true';
	}
	if( 'after-section' === $header_sticky_pos ) {
		$attributes['data-sticky-options'] = '{ "stickyTrigger": "first-section" }';
		
	}

	$out = array(
		'id' => $id,
		'attributes' => $attributes,
		'layout' => $layout,

		// Styles
		'color' => themethreads_helper()->get_post_meta( 'nav_color' , $id ),
		'sticky_bg' => themethreads_helper()->get_post_meta( 'nav_color' , $id ),
		'secondary_color' => $header_sticky_bg,
		'active_color' => themethreads_helper()->get_post_meta( 'nav_active_color', $id ),
		'padding' => themethreads_helper()->get_post_meta( 'nav_padding', $id ),
		'logo_padding' => get_post_meta( $id, 'nav_logo_padding', true ),
	);

	// reset
	wp_reset_postdata();
	return $out;
}

function themethreads_logo_url( $retina = false ) {

	$logo        = $mobile_logo = get_template_directory_uri() . '/assets/img/logo/volley-logo-dark.png';
	$retina_logo = $retina_mobile_logo = get_template_directory_uri() . '/assets/img/logo/volley-logo-dark@2x.png';
	
	$logo_arr = themethreads_helper()->get_option( 'header-logo' );
	if( is_array( $logo_arr ) && ! empty( $logo_arr['url'] ) ) {
		$logo = $logo_arr['url'];
	}

	$retina_logo_arr = themethreads_helper()->get_option( 'header-logo-retina' );
	if( is_array( $retina_logo_arr ) && ! empty( $retina_logo_arr['url'] ) ) {
		$retina_logo = $retina_logo_arr['url'];
	}
	
	if( $retina ) {
		echo  esc_url( $retina_logo ) . ' 2x';
	}
	else {
		echo esc_url( $logo );		
	}

}	

/**
 * [themethreads_get_footer_layout description]
 * @method themethreads_get_footer_layout
 * @return [type]                  [description]
 */
function themethreads_get_footer_layout() {
	global $post;

	// which one
	$id = themethreads_get_custom_footer_id();
	$footer = get_post( $id );
	$post = $footer;


	// Styles
	$styles = $out = array();

	if( $bg = themethreads_helper()->get_post_meta( 'footer-bg', $id ) ) {

		if( isset( $bg['background-color'] ) ) {
			$out['background-color'] = $bg['background-color'];
		}
		if( isset( $bg['background-size'] ) ) {
			$out['background-size'] = $bg['background-size'];
		}
		if( isset( $bg['background-image'] ) ) {
			$out['background-image'] = 'url(' . $bg['background-image'] . ')' ;
		}
		if( isset( $bg['background-repeat'] ) ) {
			$out['background-repeat'] = $bg['background-repeat'];
		}
		if( isset( $bg['background-position'] ) ) {
			$out['background-position'] = $bg['background-position'];
		}
		if( isset( $bg['background-attachment'] ) ) {
			$out['background-attachment'] = $bg['background-attachment'];
		}
	}
	
	if( $bg_color =themethreads_helper()->get_post_meta( 'footer-gradient', $id ) ) {
		$out['background'] = $bg_color;
	}

	if( $color = themethreads_helper()->get_post_meta( 'footer-text-color', $id ) ) {
		if( $color['alpha'] < 1  ) {
			$out['color'] = isset( $color['rgba'] ) ? $color['rgba'] : '';
		} else {
			$out['color'] = isset( $color['color'] ) ? $color['color'] : '';
		}
	}
	if( $padding = themethreads_helper()->get_post_meta( 'footer-padding', $id ) ) {
		$out['padding'] = $padding;
	}
	if( $link = themethreads_helper()->get_post_meta( 'footer-link-color', $id ) ) {
		$out['link'] = $link;
	}

	$out = array_filter( $out );

	$out['id'] = $id;

	// reset
	wp_reset_postdata();

	return $out;
}

/**
 * [themethreads_header_mobile_trigger_button description]
 * @method themethreads_header_mobile_trigger_button
 * @return [type]                [description]
 */
function themethreads_header_mobile_trigger_button(  $args = array() ) {

	$defaults = array(
		'class' => 'navbar-toggle collapsed',
		'data-toggle' => 'collapse',
		'data-target' => '#main-header-collapse',
		'aria-expanded' => 'false',
		'data-changeclassnames' => '{ "html": "mobile-nav-activated overflow-hidden" }'
	);
	
	$args = wp_parse_args( $args, $defaults );	
	
	$args = array_map( 'esc_attr', $args );
	
	?>
	<button type="button" <?php foreach ( $args as $name => $value ) { echo " $name=" . '"' . $value . '"'; } ?>>
		<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'volley' ) ?></span>
		<span class="bars">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</span>
	</button>
<?php }

/**
 * [themethreads_header_trigger_button description]
 * @method themethreads_header_trigger_button
 * @return [type]                [description]
 */
function themethreads_header_trigger_button(  $args = array() ) {

	$defaults = array(
		'class' => 'nav-trigger style-1 fill-none collapsed',
		'data-toggle' => 'collapse',
		'data-target' => '#module-1',
		'aria-expanded' => 'false',
		'aria-controls' => 'module-1',
	);
	
	$args = wp_parse_args( $args, $defaults );	
	
	$args = array_map( 'esc_attr', $args );
	
	?>
	<div class="header-module">	
		<button type="button" role="button" <?php foreach ( $args as $name => $value ) { echo " $name=" . '"' . $value . '"'; } ?>>
			<span class="bars">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</span>
		</button>
	</div><!-- /.header-module -->
<?php }

/**
 * [themethreads_portfolio_media description]
 * @method themethreads_portfolio_media
 * @return [type]                [description]
 */
function themethreads_portfolio_media( $args = array() ) {

	if ( post_password_required() || is_attachment() ) {
		return;
	}

	$defaults = array(
		'before' => '',
		'after' => '',
		'image_class' => 'portfolio-image'
	);
	extract( wp_parse_args( $args, $defaults ) );

	$format = get_post_format();
	$style = get_post_meta( get_the_ID(), 'portfolio-style', true );
	$style = $style ? $style : 'gallery-stacked';
	$lightbox = themethreads_helper()->get_option( 'post-gallery-lightbox' );

	// Audio
	if( 'audio' === $format && $audio = themethreads_helper()->get_option( 'post-audio' ) ) {

		printf( '<div class="post-audio">%s</div>', do_shortcode( '[audio src="' . $audio . '"]' ) );
	}

	// Gallery
	elseif( 'gallery' === $format && $gallery = themethreads_helper()->get_option( 'post-gallery' ) ) {
		
		if( 'gallery-slider' === $style ) {

			echo '<div class="carousel-container carousel-nav-floated carousel-nav-center carousel-nav-middle carousel-nav-xl carousel-nav-solid carousel-nav-rectangle">';

				echo '<div class="carousel-items row mx-0" data-threads-flickity=\'{ "prevNextButtons": true, "navArrow": "1", "pageDots": false, "navOffsets":{"prev":"28px","next":"28px"}, "parallax": true }\'>';

					foreach ( $gallery as $item ) {
						if ( isset ( $item['attachment_id'] ) ) {

							$src_image     = wp_get_attachment_image_src( $item['attachment_id'], 'full' );
							$resized_image = themethreads_get_resized_image_src( $src_image, 'themethreads-large-slider' );
							$retina_image  = themethreads_get_retina_image( $resized_image );

							printf( '<div class="carousel-item col-xs-12 px-0"><figure><img src="%s" alt="%s"></figure></div>',$resized_image , esc_attr( $item['title'] ) );

						}
					}

				echo '</div>';

			echo '</div>';
		}
		
	}

	// Video
	elseif( 'video' === $format ) {
		$video = '';
		if( $url = themethreads_helper()->get_option( 'post-video-url', 'url' ) ) {
			global $wp_embed;
			echo wp_kses_post( $wp_embed->run_shortcode( '[embed]' . $url . '[/embed]' ) );
		}
		elseif( $file = themethreads_helper()->get_option( 'post-video-file' ) ) {
			if( themethreads_helper()->str_contains( '[embed', $file ) ) {
				global $wp_embed;
				echo wp_kses_post( $wp_embed->run_shortcode( $file ) );
			} else {
				echo do_shortcode( $file );
			}
		}
		else {
			$video = themethreads_helper()->get_option( 'post-video-html' );
		}

		if( '' != $video ) {
			$my_allowed = wp_kses_allowed_html( 'post' );

			// iframe
			$my_allowed['iframe'] = array(
				'align' => true,
				'width' => true,
				'height' => true,
				'frameborder' => true,
				'name' => true,
				'src' => true,
				'id' => true,
				'class' => true,
				'style' => true,
				'scrolling' => true,
				'marginwidth' => true,
				'marginheight' => true,
			);

			echo wp_kses( $video, $my_allowed );
		}

	}

	else {

		$attachment = get_post( get_post_thumbnail_id() );
		
		
		printf( '%s <figure class="%s" data-element-inview="true">', $before, $image_class );
			echo '<div class="overlay"></div>';
			themethreads_the_post_thumbnail( 'themethreads-large', array(
			));
			if( is_object( $attachment ) && ! empty( $attachment->post_excerpt ) ) {
				printf( '<figcaption><span>%s</span></figcaption>', $attachment->post_excerpt );
			}
		echo '</figure>' . $after;
	}
}

/**
 * [themethreads_portfolio_subtitle description]
 * @method themethreads_portfolio_subtitle
 * @param  [type]               $key   [description]
 * @param  [type]               $label [description]
 * @return [type]                      [description]
 */
function themethreads_portfolio_subtitle( $before, $after ) {

	$value = get_post_meta( get_the_ID(), 'portfolio-subtitle', true );
	if( empty( $value ) ) {
		return;
	}
	
	printf( '%1$s %2$s %3$s', $before, esc_html( $value ), $after  );

}

/**
 * [themethreads_portfolio_meta description]
 * @method themethreads_portfolio_meta
 * @param  [type]               $key   [description]
 * @param  [type]               $label [description]
 * @return [type]                      [description]
 */
function themethreads_portfolio_meta( $key, $label, $col = 6 ) {

	$value = get_post_meta( get_the_ID(), 'portfolio-' . $key, true );
	if( !$value ) {
		return;
	}
	?>
	<div class="col-md-<?php echo esc_attr( $col ) ?>">

		<p>
			<strong class="info-title"><?php echo esc_html( $label ) ?>:</strong> <?php echo esc_html( $value ); ?>
		</p>

	</div>
	<?php
}

/**
 * [themethreads_portfolio_atts description]
 * @method themethreads_portfolio_date
 * @return [type]               [description]
 */
function themethreads_portfolio_atts( $col = 6 ) {

	$atts = get_post_meta( get_the_ID(), 'portfolio-attributes', true );
	if( !is_array( $atts ) ) {
		return;
	}
	foreach ( $atts as $attr ) {

		if( !empty( $attr ) ) {
			$attr = explode( "|", $attr );
			$label = isset( $attr[0] ) ? $attr[0] : '';
			$value = isset( $attr[1] ) ? $attr[1] : $label;
		?>
		<span>
			<?php if( $label ) { ?><small class="text-uppercase ltr-sp-1"><?php echo esc_html( $label ) ?>:</small><?php } ?>
			<h5 class="my-0"><?php echo esc_html( $value ); ?></h5>
		</span>
		<?php
		}
	}
}

/**
 * [themethreads_portfolio_archive_link description]
 * @method themethreads_portfolio_archive_link
 * @return [type]               [description]
 */
function themethreads_portfolio_archive_link() {

	$pf_link         = themethreads_helper()->get_option( 'portfolio-archive-link' );
	$pf_archive_link = get_post_type_archive_link( 'volley-portfolio' );

	$link = ! empty( $pf_link ) ? $pf_link : $pf_archive_link;
	?>
	<a href="<?php echo esc_url( $link ) ?>" class="portfolio-view-all"><span></span></a>
	<?php
}

/**
 * [themethreads_portfolio_date description]
 * @method themethreads_portfolio_date
 * @return [type]               [description]
 */
function themethreads_portfolio_date() {

	if( 'off' === themethreads_helper()->get_option( 'portfolio-enable-date' ) ) {
		return;
	}

	$label = themethreads_helper()->get_option( 'portfolio-date-label' ) ? themethreads_helper()->get_option( 'portfolio-date-label' ) : esc_html__( 'Date', 'volley' );
	$date  = themethreads_helper()->get_option( 'portfolio-date' ) ? themethreads_helper()->get_option( 'portfolio-date' ) : get_the_date( get_option( 'date_time' ) );

	?>
	<span>
		<?php if( $label ) { ?>
			<small class="text-uppercase ltr-sp-1"><?php echo esc_html( $label ) ?>:</small>
		<?php } ?>
		<h5 class="my-0"><?php echo esc_html( $date ) ?></h5>
	</span>
	<?php
}

/**
 * [themethreads_portfolio_likes description]
 * @method themethreads_portfolio_likes
 * @return [type]                [description]
 */
function themethreads_portfolio_likes( $class = 'portfolio-likes style-alt', $post_type = 'portfolio' ) {

	$option_name = str_replace( 'themethreads-', '', $post_type ) . '-likes-';
	if( 'off' === themethreads_helper()->get_option( $option_name . 'enable' ) || ! function_exists( 'themethreads_likes_button' ) ) {
		return;
	}

	themethreads_likes_button(array(
		'container' => 'div',
		'container_class' => $class,
		'format' => wp_kses_post( __( '<span><i class="fa fa-heart"></i> <span class="post-likes-count">%s</span></span>', 'volley' ) )
	));
}

/**
 * [themethreads_get_lightbox_link]
 * @method themethreads_get_lightbox_link
 * @return [type]                [description]
 */
function themethreads_get_lightbox_link( $link_to_image ) {
	if( empty( $link_to_image ) ) {
		return;
	}

	return '<a class="lightbox-link" data-type="image" href="' . esc_url( $link_to_image ) . '"></a>';
}

/**
 * [themethreads_render_related_posts description]
 * @method themethreads_render_related_posts
 * @param  string                     $post_type [description]
 * @return [type]                                [description]
 */
function themethreads_render_related_posts( $post_type = 'post' ) {

	$folder = str_replace( 'themethreads-', '', $post_type );
	$option_name = $folder . '-related-';
	if( 'off' === themethreads_helper()->get_option( $option_name . 'enable' ) ) {
		return;
	}

	$heading = themethreads_helper()->get_option( $option_name . 'title', 'html' );
	$style = themethreads_helper()->get_option( 'portfolio-related-style' );

	$number_of_posts = themethreads_helper()->get_option( $option_name . 'number' );
	$number_of_posts = '0' == $number_of_posts ? '3' : $number_of_posts;
	
	$taxonomy = 'post' === $post_type ? 'category' : $post_type . '-category';

	$related_posts = themethreads_get_post_type_related_posts( get_the_ID(), $number_of_posts, $post_type, $taxonomy );

	if( $related_posts && $related_posts->have_posts() ) {
		$located = locate_template( array(
			'templates/related-'. $folder .'.php',
			'templates/related-posts.php'
		) );

		if( $located ) require $located;
	}
}

/**
 * [themethreads_get_post_type_related_posts description]
 * @method themethreads_get_post_type_related_posts
 * @param  [type]                            $post_id      [description]
 * @param  integer                           $number_posts [description]
 * @param  string                            $post_type    [description]
 * @param  string                            $taxonomy     [description]
 * @return [type]                                          [description]
 */
function themethreads_get_post_type_related_posts( $post_id, $number_posts = 6, $post_type = 'post', $taxonomy = 'category' ) {

	if( 0 == $number_posts ) {
		return false;
	}

	$item_array = array();
	$item_cats = get_the_terms( $post_id, $taxonomy );
	if ( $item_cats ) {
		foreach( $item_cats as $item_cat ) {
			$item_array[] = $item_cat->term_id;
		}
	}

	if( empty( $item_array ) ) {
		return false;
	}

	$args = array(
		'post_type'				=> $post_type,
		'posts_per_page'		=> $number_posts,
		'post__not_in'			=> array( $post_id ),
		'ignore_sticky_posts'	=> 0,
		'tax_query'				=> array(
			array(
				'field'		=> 'id',
				'taxonomy'	=> $taxonomy,
				'terms'		=> $item_array
			)
		)
	);

	return new WP_Query( $args );
}

/**
 * [themethreads_render_post_nav description]
 * @method themethreads_render_post_nav
 * @param  string                $post_type [description]
 * @return [type]                           [description]
 */
function themethreads_render_post_nav( $post_type = 'post' ) {

	$post_type = str_replace( 'themethreads-', '', $post_type );
	if( 'off' === themethreads_helper()->get_option( $post_type . '-navigation-enable' ) ) {
		return;
	}

	$post_type = 'post' === $post_type ? 'blog' : $post_type;
	get_template_part( 'templates/'. $post_type .'/single/navigation' );
}

/**
 * [themethreads_portfolio_the_content description]
 * @method themethreads_portfolio_the_content
 * @return [type]                      [description]
 */
function themethreads_portfolio_the_content() {

	$content = get_post_meta( get_the_ID(), 'portfolio-description', true );
	if( $content ) {
		echo apply_filters( 'the_content', $content );
		return;
	}

	$content = get_the_content();
	if( themethreads_helper()->str_contains( '[vc_row', $content ) ) {
		return;
	}

	the_content( sprintf(
		esc_html__( 'Continue reading %s', 'volley' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	) );
}

/**
 * [themethreads_portfolio_the_excerpt description]
 * @method themethreads_portfolio_the_content
 * @return [type]                      [description]
 */
function themethreads_portfolio_the_excerpt() {

	$excerpt = get_post_meta( get_the_ID(), 'portfolio-description', true );
	if( $excerpt ) {
		$excerpt = apply_filters( 'get_the_excerpt', $excerpt );
		$excerpt = apply_filters( 'the_excerpt', $excerpt );
		echo wp_kses_post( $excerpt );
		return;
	}

	$excerpt = get_the_excerpt();
	if( themethreads_helper()->str_contains( '[vc_row', $excerpt ) ) {
		return;
	}

	the_excerpt( sprintf(
		esc_html__( 'Continue reading %s', 'volley' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	) );
}


/**
 * [themethreads_portfolio_the_vc description]
 * @method themethreads_portfolio_the_vc
 * @return [type]                 [description]
 */
function themethreads_portfolio_the_vc() {

	$content = get_the_content();
	if( !themethreads_helper()->str_contains( '[vc_row', $content ) ) {
		return;
	}

	the_content( sprintf(
		esc_html__( 'Continue reading %s', 'volley' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	) );
}

/**
 * [themethreads_author_link description]
 * @method themethreads_author_link
 * @param  array             $args [description]
 * @return [type]                  [description]
 */
function themethreads_author_link( $args = array() ) {

	global $authordata;
    if ( ! is_object( $authordata ) ) {
        return;
    }

	$defaults = array(
		'before' => '',
		'after' => ''
	);
	extract( wp_parse_args( $args, $defaults ) );

	$link = sprintf(
        '<a class="url fn" href="%1$s" title="%2$s" rel="author">%3$s</a>',
        esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
        esc_attr( sprintf( esc_html__( 'Posts by %s', 'volley' ), get_the_author() ) ),
        $before . get_the_author() . $after
    );
	?>
	<span <?php themethreads_helper()->attr( 'entry-author', array( 'class' => 'vcard author' ) ); ?>>
		<span itemprop="name">
			<?php echo apply_filters( 'themethreads_author_link', $link ); ?>
		</span>
	</span>
	<?php
}

/**
 * [themethreads_get_category description]
 * @method themethreads_get_category
 * @return [type]            [description]
 */
function themethreads_get_category() {
	
	$cats_list = get_the_category();
	$cat = isset( $cats_list[0] ) ? $cats_list[0] : '';
	if( empty( $cat ) ) {
		return;
	}
	
	echo '<a href="' . get_category_link( $cat->term_id ) . '" rel="category tag">' . esc_html( $cat->name  ) . '</a>';
	
}

/**
 * [themethreads_author_role description]
 * @method themethreads_author_role
 * @return [type]            [description]
 */
function themethreads_author_role() {

	global $authordata;
    if ( ! is_object( $authordata ) ) {
        return;
    }

	$user = new WP_User( $authordata->ID );
    return array_shift( $user->roles );
}

if ( ! function_exists( 'themethreads_post_time' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function themethreads_post_time( $icon = false, $echo = true ) {

	$time_string = '<time %5$s >%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() ),
		themethreads_helper()->get_attr( 'entry-published' )
	);

	$time_url = get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) );
	$icon_html = $icon ? '<i class="fa fa-clock-o"></i>' : '';

	$out = sprintf( '<a href="%1$s">%3$s %2$s</a>', get_the_permalink(), $time_string, $icon_html );

	if( $echo ) {
		echo apply_filters( 'themethreads_post_time', $out );
	} else {
		return apply_filters( 'themethreads_post_time', $out );
	}
}
endif;