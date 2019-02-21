<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = $enable_overlay = $gradient_bg = $overlay_bg = $hover_overlay_bg = $enable_loading_bg = $enable_slideshow_bg = $slideshow_delay = $slideshow_effect = $slideshow_images = $bg_position = $bg_pos_h = $bg_pos_v = $bg_attachment = $bg_styles = $row_svg_divider = $sticky_bg = $sticky_row = $fade_scroll = $shrink_borders = $data_tooltip = $block_content_alignment = '';
$disable_element = '';

$row_box_shadow = '';

//Custom Animation
$enable_content_animation = $ca_duration = $ca_start_delay = $ca_delay = $ca_easing = $ca_direction  = $ca_init_translate_x = $ca_init_translate_y = $ca_init_translate_z = $ca_init_scale_x = $ca_init_scale_y = $ca_init_scale_z = $ca_init_rotate_x = $ca_init_rotate_y = $ca_init_rotate_z = $ca_init_opacity = $ca_an_translate_x = $ca_an_translate_y = $ca_an_translate_z = $ca_an_scale_x = $ca_an_scale_y = $ca_an_scale_z = $ca_an_rotate_x = $ca_an_rotate_y = $ca_an_rotate_z = $ca_an_opacity = '';

$output = $before_content = $after_output = $responsive_style = $video_bg_source = $video_local_mp4_url = $video_local_webm_url = $y_start_time = $y_end_time = $mobile_video_bg = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$block_content_alignment,
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if( themethreads_helper()->str_contains( 'padding-top', $css ) ){
	$css_classes[] = 'row-contains-padding-top';	
}
if( themethreads_helper()->str_contains( 'padding-bottom', $css ) ) {
	$css_classes[] = 'row-contains-padding-bottom';	
}

if( !empty( $responsive_css ) ) {
	$responsive_id = uniqid( 'themethreads-row-responsive-' );
	$responsive_style = ThemeThreads_Responsive_Css_Editor::generate_css( $responsive_css, $responsive_id );
	$css_classes[] = $responsive_id;
}

$row_box_shadow = vc_param_group_parse_atts( $row_box_shadow );
if( !empty( $row_box_shadow ) ) {
	$shadow_box_id = uniqid('themethreads-row-shadowbox-');
	$shadow_css    = themethreads_get_shadow_css( $row_box_shadow, $shadow_box_id );
	$css_classes[] = $shadow_box_id;
}

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

$row_top_divider = $row_bottom_divider = '';
if( !empty( $row_svg_divider ) ) {
	$row_top_divider    = ThemeThreads_Shape_Divider_Options::getShape( $row_svg_divider );
	$row_bottom_divider = ThemeThreads_Shape_Divider_Options::getShape( $row_svg_divider, 'bottom' );
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( vc_shortcode_custom_css_has_property( $css, 'background' ) ) {	
	$css_classes[] = 'vc_row-has-bg';
}

if ( '15' !== $atts['gap'] ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

$wrapper_attributes = $ca_data_opts = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

$container_class = 'ld-container container';
if ( ! empty( $full_width ) ) {

	$container_class = 'ld-container container-fluid';
	if ( 'stretch_row_content' === $full_width ) {

	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {

		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

//Add background image to data attibute
if( vc_shortcode_custom_css_has_property( $css, array( 'background' ) ) && $enable_loading_bg ) {
	
	$image_id = $bg_image = '';

	$matches = array();
	preg_match_all( '~\bbackground(-image)?\s*:(.*?)\(\s*(\'|")?(?<image>.*?)\3?\s*\)~i', $css , $matches );
	$images = $matches['image'];
	$bg_image = isset( $images[0] ) ? esc_url( $images[0] ) : '';

	$wrapper_attributes[] = 'data-row-bg="' . $bg_image . '"';
	$before_content = '<span class="row-bg-loader"></span>';	
};

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$video_bg_output = $disable_mobile = '';
if ( !empty( $video_bg ) ) {

	if( 'local' === $video_bg_source ) {
		if( !empty( $video_local_mp4_url ) || !empty( $video_local_webm_url ) ) {
			
			if( 'yes' === $mobile_video_bg ) {
				$disable_mobile = 'data-inlinevideo-options=\'' . wp_json_encode( array( 'disableOnMobile' => true ) ) . '\'';
			}
			
			wp_enqueue_script( 'wp-mediaelement' );
			wp_enqueue_style( 'wp-mediaelement' );
			
			$video_bg_output = '<div class="threads-vbg-wrap">
							<div class="threads-vbg-inner">
								<span class="threads-vbg-loader"></span>
								<video class="threads-vbg-video" data-video-bg="true" ' . $disable_mobile . ' autoplay loop>';
								if( !empty( $video_local_mp4_url ) ) {
									$video_bg_output .= '<source src="'. esc_url( $video_local_mp4_url ) .'" type="video/mp4">';
								}
								if( !empty( $video_local_mp4_url ) ) {
									$video_bg_output .= '<source src="'. esc_url( $video_local_webm_url ) .'" type="video/webm">';
								}
			$video_bg_output .=	'</video><!-- /.threads-vbg-video -->
						</div><!-- /.threads-vbg-inner -->
					</div><!-- /.threads-vbg-wrap -->';
		}

	}
	else {
		
		$data_youtube = array();
		if( !empty( $video_bg_url ) ) {
			$data_youtube['videoURL'] = esc_url( $video_bg_url );
		}
		if( !empty( $y_start_time ) ) {
			$data_youtube['startAt'] = (int)$y_start_time;
		}
		if( !empty( $y_end_time ) ) {
			$data_youtube['stopAt'] = (int)$y_end_time;
		}
		if( 'yes' === $mobile_video_bg ) {
			$data_youtube['disableOnMobile'] = true;
		}
		
		$video_bg_output = '<div class="threads-vbg-wrap">
						<div class="threads-vbg-inner">
							<span class="threads-vbg-loader"></span>
							<div
								class="threads-vbg-video"
								data-video-bg="true"
								data-youtube-options=\'' . wp_json_encode( $data_youtube ) . '\'>
							</div><!-- /.threads-vbg-video -->
					</div><!-- /.threads-vbg-inner -->
				</div><!-- /.threads-vbg-wrap -->';

	}
}

if( 'yes' === $enable_content_animation ) {

	$opts = $init_values = $animations_values = $arr = array();
	
	$opts['triggerHandler'] = 'inview';
	$opts['animationTarget'] = '.wpb_column';
	
	$opts['duration'] = !empty( $ca_duration ) ? $ca_duration : 700;
	if( !empty( $ca_start_delay ) ) {
		$opts['startDelay'] = $ca_start_delay;
	}
	$opts['delay'] = !empty( $ca_delay ) ? $ca_delay : 100;
	$opts['easing'] = $ca_easing;
	$opts['direction'] = $ca_direction;
	
	//Init values
	if ( !empty( $ca_init_translate_x ) ) { $init_values['translateX'] = ( int ) $ca_init_translate_x; }
	if ( !empty( $ca_init_translate_y ) ) { $init_values['translateY'] = ( int ) $ca_init_translate_y; }
	if ( !empty( $ca_init_translate_z ) ) { $init_values['translateZ'] = ( int ) $ca_init_translate_z; }

	if ( '1' !== $ca_init_scale_x ) { $init_values['scaleX'] = ( float ) $ca_init_scale_x; }
	if ( '1' !== $ca_init_scale_y ) { $init_values['scaleY'] = ( float ) $ca_init_scale_y; }
	if ( '1' !== $ca_init_scale_z ) { $init_values['scaleZ'] = ( float ) $ca_init_scale_z; }

	if ( !empty( $ca_init_rotate_x ) ) { $init_values['rotateX'] = ( int ) $ca_init_rotate_x; }
	if ( !empty( $ca_init_rotate_y ) ) { $init_values['rotateY'] = ( int ) $ca_init_rotate_y; }
	if ( !empty( $ca_init_rotate_z ) ) { $init_values['rotateZ'] = ( int ) $ca_init_rotate_z; }
	
	if ( isset( $ca_init_opacity ) && '1' !== $ca_init_opacity ) { $init_values['opacity']    = ( float ) $ca_init_opacity; }
	

	//Animation values
	if ( !empty( $ca_init_translate_x ) ) { $animations_values['translateX'] = ( int ) $ca_an_translate_x; }
	if ( !empty( $ca_init_translate_y ) ) { $animations_values['translateY'] = ( int ) $ca_an_translate_y; }
	if ( !empty( $ca_init_translate_z ) ) { $animations_values['translateZ'] = ( int ) $ca_an_translate_z; }

	if ( isset( $ca_an_scale_x ) && '1' !== $ca_init_scale_x ) { $animations_values['scaleX'] = ( float ) $ca_an_scale_x; }
	if ( isset( $ca_an_scale_y ) && '1' !== $ca_init_scale_y ) { $animations_values['scaleY'] = ( float ) $ca_an_scale_y; }
	if ( isset( $ca_an_scale_z ) && '1' !== $ca_init_scale_z ) { $animations_values['scaleZ'] = ( float ) $ca_an_scale_z; }

	if ( !empty( $ca_init_rotate_x ) ) { $animations_values['rotateX'] = ( int ) $ca_an_rotate_x; }
	if ( !empty( $ca_init_rotate_y ) ) { $animations_values['rotateY'] = ( int ) $ca_an_rotate_y; }
	if ( !empty( $ca_init_rotate_z ) ) { $animations_values['rotateZ'] = ( int ) $ca_an_rotate_z; }

	if ( isset( $ca_an_opacity ) && '1' !== $ca_init_opacity ) { $animations_values['opacity']    = ( float ) $ca_an_opacity; }	

	$opts['initValues'] = !empty( $init_values ) ? $init_values : array();
	$opts['animations'] = !empty( $animations_values ) ? $animations_values : array();

	$wrapper_attributes[] = 'data-custom-animations="true"';
	$wrapper_attributes[] = 'data-ca-options=\'' . stripslashes( wp_json_encode( $opts ) ) . '\'';
	
}

if( 'enable_parallax' == $parallax ) {
	$wrapper_attributes[] = 'data-parallax="true"';
	$wrapper_attributes[] = 'data-parallax-options=\'' . wp_json_encode( array( 'parallaxBG' => true ) ) . '\'';
}
if( 'yes' == $sticky_row ) {
	$wrapper_attributes[] = 'data-pin="true"';
	$wrapper_attributes[] = 'data-pin-options=\'' . wp_json_encode( array( 'duration' => '100%', 'pushFollowers' => false ) ) . '\'';
}
if( 'yes' == $fade_scroll ) {
	$wrapper_attributes[] = 'data-animate-onscroll="true"';
	$wrapper_attributes[] = 'data-animate-from=\'' . wp_json_encode( array( 'opacity' => 1 ) ) . '\'';
	$wrapper_attributes[] = 'data-animate-to=\'' . wp_json_encode( array( 'opacity' => 0 ) ) . '\'';
}

$shrink_borders_out = '';
if( 'enable_shrink_borders' == $shrink_borders ) {
	
	$shrink_borders_out = '<div class="threads-section-borders-wrap" data-shrink-borders="true">
								<div class="threads-section-border threads-section-border-top" data-axis="y"></div>
								<div class="threads-section-border threads-section-border-right" data-axis="x"></div>
								<div class="threads-section-border threads-section-border-bottom" data-axis="y"></div>
								<div class="threads-section-border threads-section-border-left" data-axis="x"></div>
							</div>';
	
}

$sticky_bg_out = $sticky_bg_end_out = '';
if( 'enable_sticky_bg' === $sticky_bg ) {
	
	$image_id = $bg_image = '';

	$matches = array();
	$regexr = preg_match('~id=(\d+)~', $css, $matches );
	if( isset( $matches[1] ) ) {
		$image_id = $matches[1];
		$bg_image = wp_get_attachment_image_url( $image_id, 'full', false );
	}
	
	$sticky_bg_out = '<div class="threads-sticky-bg-wrap" data-pin="true" data-pin-options=\'{ "duration": "contentsHeight", "spacerClass": "threads-sticky-bg-spacer", "pushFollowers": false }\'>
						<figure class="threads-sticky-bg" style="background-image: url('. esc_url( $bg_image ) .');"></figure>';

	$sticky_bg_end_out = '</div>';
	$css_classes[] = 'bg-none';
}

//Slideshow Bg
if( $enable_slideshow_bg ) {
	$images_arr = $url_arr = $slideshow_opts = array();
	$wrapper_attributes[] = 'data-slideshow-bg="true"';
	if( !empty( $slideshow_delay ) ) {
		$slideshow_opts['delay'] = (int)$slideshow_delay;
	}
	if( !empty( $slideshow_effect ) ) {
		$slideshow_opts['effect'] = $slideshow_effect;
	}
	$images_arr = explode( ',', $slideshow_images );
	foreach( $images_arr as $image_id ) {
		$url_arr[] = wp_get_attachment_image_url( $image_id, 'full', false );
	}
	$slideshow_opts['imageArray'] = $url_arr;
	$wrapper_attributes[] = 'data-slideshow-options=' . wp_json_encode( $slideshow_opts );
}

if( 'custom' != $bg_position && ! empty( $bg_position ) ) {
	$bg_styles = ' background-position:' . esc_attr( $bg_position ) . ' !important;';
} 
elseif( 'custom' === $bg_position ) {
	$bg_styles = ' background-position:' . esc_attr( $bg_pos_h ) . ' ' . esc_attr( $bg_pos_v ) . ' !important; ';
}

if( 'scroll' !== $bg_attachment ){
	$bg_attachment = ' background-attachment:' .  esc_attr( $bg_attachment ) . '; ';
} else {
	$bg_attachment = '';
}

if( !empty( $gradient_bg ) ) {
	$bg_styles = 'background:' . esc_attr( $gradient_bg ) . ';';
}

if( !empty( $bg_styles ) ) {
	$wrapper_attributes[] = 'style="' . esc_attr( trim( $bg_styles . $bg_attachment ) ) . '"';	
}

if ( vc_shortcode_custom_css_has_property( $css, 'background' ) ) {	
	$wrapper_attributes[] = 'data-bg-image="' . 'url' . '"';
}

if( !empty( $data_tooltip ) ) {
	$wrapper_attributes[] = 'data-tooltip="' . esc_html( $data_tooltip ) . '"';	
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$overlay_html = $row_style = '';
if( $enable_overlay ) {
	if ( ! empty( $hover_overlay_bg ) ) {
		$overlay_html = '<div class="themethreads-row-overlay themethreads-row-overlay-hover" style="background:' . esc_attr( $hover_overlay_bg ) . '"></div>';
	}	
	if ( ! empty( $overlay_bg ) ) {
		$overlay_html .= '<div class="themethreads-row-overlay" style="background:' . esc_attr( $overlay_bg ) . '"></div>';
	}
	
}

$check = apply_filters( 'themethreads_dinamic_css_output', '__return_true' );

if( !empty( $responsive_style ) && $check || !empty( $shadow_css ) && $check ) {
	$row_style = '<style>' . $responsive_style . ' ' . $shadow_css . '</style>';
}
$output .= $row_style;
$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= $row_top_divider;
$output .= $sticky_bg_out;
$output .= $video_bg_output;
$output .= $shrink_borders_out;
$output .= $before_content;
$output .= $overlay_html;
$output .= $sticky_bg_end_out;
$output .= '<div class="' . $container_class . '">';
$output .= '<div class="row ld-row">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';
$output .= $row_bottom_divider;
$output .= '</section>';
$output .= $after_output;
echo apply_filters( 'themethreads_vc_row', $output );