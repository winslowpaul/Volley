<?php
/** The Media
 * Contains all the Media functions
 *
 * Table of Content
 *
 */

/**
 * [themethreads_get_the_small_image]
 * @function themethreads_get_the_small_image
 * @param  string $src [description]
 * @param  string $width [description]
 * @param  string $height [description]
 * @return string $small_image [description]
 */
function themethreads_get_the_small_image( $src ) {
	
	if( empty( $src )  ){
		return;
	}
	
	@list( $width, $height ) = getimagesize( $src );
	
	if( ! $width ) {
		return $src;
	}
	elseif( $width > $height ) {
		$image_ratio = $height / $width;
		$width = 30;
		$height = 30 * $image_ratio;
	}
	elseif( $width < $height ) {
		$image_ratio = $width / $height;
		$height = 30;
		$width = 30 * $image_ratio;
	}
	elseif( $width == $height ) {
		$width  = 30;
		$height = 30;
	}

	$small_image = aq_resize( $src, $width, $height, false );

	return $small_image;	

}

function themethreads_get_retina_image( $image, $size = null ) {

	if( empty( $image ) ) {
		return;
	}

	if( $size ) {
		//Get image sizes
		$aq_size = themethreads_image_sizes( $size );
		$width  = $aq_size['width'];
		$height = $aq_size['height'];	
	}
	else {
		@list( $width, $height ) = getimagesize( $image );

	}
	
	//Double the size for the retina display
	$retina_width   = $width * 2;
	$retina_height  = $height * 2;

	$retina_src = aq_resize( $image, (int) $retina_width, (int) $retina_height, true, true, true );
	
	return $retina_src;
	
}

function themethreads_the_post_thumbnail( $size = 'full', $attr = '', $retina = true ) {

	$attachment_id = get_post_thumbnail_id();
	$image         = wp_get_attachment_image_src( $attachment_id, $size, false );
	
	if ( $image ) {
		
		list( $src, $width, $height ) = $image;
		
		//Get image sizes
		$aq_size = themethreads_image_sizes( $size );

        if( is_array( $aq_size ) && ! empty( $aq_size['height'] ) ) {

			$resize_width  = $aq_size['width'];
			$resize_height = $aq_size['height'];
			$resize_crop   = $aq_size['crop'];
			
			if( $resize_width >= $width ) {
				$resize_width = $width;
			}
			if( $resize_height >= $height && ! empty( $resize_height ) ) {
				$resize_height = $height;
			}
			
			//Double the size for the retina display
			$retina_width   = $resize_width * 2;
			$retina_height  = $resize_height * 2;
			if( $retina_width >= $width ) {
				$retina_width = $width;
			}
			if( $retina_height >= $height ) {
				$retina_height = $height;
			}
			
			//Get resized images
			$retina_src  = aq_resize( $src, $retina_width, $retina_height, true );
			$resized_src = aq_resize( $src, $resize_width, $resize_height, $resize_crop );
			if( ! empty( $resized_src ) ) {
				$src = 	$resized_src;		
			}
			
			$hwstring = image_hwstring( $resize_width, $resize_height );
			$srcset = wp_get_attachment_image_srcset( $attachment_id, array( $resize_width, $resize_height ) );
			
			if( ! $retina ) {
				$retina_src = $src;
			}

        } else {
	        $retina_src = $src;
			$hwstring = image_hwstring( $width, $height );
			$srcset = wp_get_attachment_image_srcset( $attachment_id, array( $width, $height ) );
        }

        $size_class = $size;
        if ( is_array( $size_class ) ) {
            $size_class = join( 'x', $size_class );
        }
        
        $attachment = get_post( $attachment_id );
        
		$img_url = wp_get_attachment_url( $attachment_id );
		$img_url_basename = wp_basename( $src );
        
		$image_meta = wp_get_attachment_metadata( $attachment_id );

        if ( is_array( $image_meta ) ) {
			$size_array = array( absint( $width ), absint( $height ) );
			$sizes = wp_calculate_image_sizes( $size_array, $src, $image_meta, $attachment_id );
        }

        $default_attr = array(
            'src'   => $src,
            'class' => "attachment-$size_class size-$size_class",
            'alt'   => get_the_title(),
			'srcset' => $srcset,
            'sizes' => $sizes,
        );
 
        $attr = wp_parse_args( $attr, $default_attr );
		$attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, $attachment  );
		$attr = array_map( 'esc_attr', $attr );
		
		$image = rtrim("<img $hwstring");
        foreach ( $attr as $name => $value ) {
            $image .= " $name=" . '"' . $value . '"';
        }
		$image .= ' />';        
        
    }

	echo apply_filters( 'themethreads_the_post_thumbnail', $image );
}

function themethreads_get_resized_image_src( $original_src, $size = 'themethreads-thumbnail' ) {
	
	if( empty( $original_src) ) {
		return;
	}

	@list( $src, $width, $height ) = $original_src;
	//Get image sizes
	$aq_size = themethreads_image_sizes( $size );

	if( ! empty( $aq_size ) ) {

		$resize_width  = $aq_size['width'];
		$resize_height = $aq_size['height'];
		$resize_crop   = $aq_size['crop'];
		
		if( $resize_width >= $width ) {
			$resize_width = $width;
		}
		if( $resize_height >= $height && ! empty( $resize_height ) ) {
			$resize_height = $height;
		}

		//Get resized images
		$resized_src = aq_resize( $src, $resize_width, $resize_height, $resize_crop );
	}
	else {
		return $src;
	}
	return $resized_src;
	
}

/**
 * [themethreads_image_sizes description]
 * @method themethreads_image_sizes
 * @param  array $image_sizes [description]
 * @return array $image_sizes [description]
 */
function themethreads_image_sizes( $size ) {
	
	$sizes = array(
		'themethreads-default-blog'  => array( 'width'  => '370',  'height' => '230', 'crop' => true ),
		'themethreads-standard-blog' => array( 'width'  => '370',  'height' => '400', 'crop' => true ),
		'themethreads-classic-meta-blog' => array( 'width'  => '370',  'height' => '300', 'crop' => true ),
		'themethreads-classic-2-blog' => array( 'width'  => '550',  'height' => '350', 'crop' => true ),
		'themethreads-grid' => array( 'width'  => '330',  'height' => '250', 'crop' => true ),
		'themethreads-split-blog'    => array( 'width'  => '570',  'height' => '350', 'crop' => true ),
		'themethreads-classic-full-blog'    => array( 'width'  => '770',  'height' => '400', 'crop' => true ),
		'themethreads-metro-blog'    => array( 'width'  => '285',  'height' => '350', 'crop' => true ),
		'themethreads-timeline-blog' => array( 'width'  => '490',  'height' => '300', 'crop' => true ),
		'themethreads-carousel-blog' => array( 'width'  => '670',  'height' => '400', 'crop' => true ),
		'themethreads-square-blog' => array( 'width'  => '560',  'height' => '555', 'crop' => true ),
		
		//Masonry blog images sizes		
		'themethreads-masonry-shortest' => array( 'width' => '450', 'height' => '300', 'crop'  => true ),
		'themethreads-masonry-short'    => array( 'width' => '450', 'height' => '400', 'crop'  => true ),
		'themethreads-masonry-tall'     => array( 'width' => '450', 'height' => '500', 'crop'  => true ),
		'themethreads-masonry-taller'   => array( 'width' => '450', 'height' => '600', 'crop'  => true ),
		
		'themethreads-medium'               => array( 'width'  => '300', 'height' => '300',  'crop' => true ),
		'themethreads-large'                => array( 'width'  => '1024', 'height' => '',    'crop' => false ),
		'themethreads-thumbnail'            => array( 'width'  => '150',  'height' => '150', 'crop' => true ),
		'themethreads-masonry-header-small' => array( 'width'  => '295',  'height' => '220', 'crop' => true ),
		'themethreads-masonry-header-big'   => array( 'width'  => '295',  'height' => '440', 'crop' => true ),
		'themethreads-thumbnail-post'       => array( 'width'  => '765', 'height' => '400', 'crop' => true ),
		'themethreads-small-blog'  	     => array( 'width'  => '388', 'height' => '240', 'crop' => true ),
		'themethreads-related-post'         => array( 'width'  => '270',  'height' => '170', 'crop' => true ),

		//Portfolio sizes
		'volley-portfolio'          => array( 'width'  => '370', 'height' => '300', 'crop' => true ),
		'volley-portfolio-sq'       => array( 'width'  => '295', 'height' => '295', 'crop' => true ),
		'volley-portfolio-big-sq'   => array( 'width'  => '600', 'height' => '600', 'crop' => true ),
		'volley-portfolio-portrait' => array( 'width'  => '350', 'height' => '500', 'crop' => true ),
		'volley-portfolio-wide'     => array( 'width'  => '600', 'height' => '295', 'crop' => true ),
		
		'themethreads-packery-wide'     => array( 'width' => '570', 'height' => '370', 'crop' => true ),
		'themethreads-packery-portrait' => array( 'width' => '270', 'height' => '370', 'crop' => true ),
		
		'themethreads-grid-hover-3d'      => array( 'width' => '370', 'height' => '450', 'crop' => true ),
		'themethreads-grid-caption'       => array( 'width' => '270', 'height' => '400', 'crop' => true ),
		
		'themethreads-large-slider'       => array( 'width' => '1170', 'height' => '650', 'crop' => true ),
		
		'themethreads-widget' => array( 'width' => '160', 'height' => '160', 'crop' => true  ),
		
	);
	
	$sizes = apply_filters( 'themethreads_media_image_sizes', $sizes );
	
	$image_sizes = ! empty( $sizes[ $size ] ) ? $sizes[ $size ] : '';

	return $image_sizes;
}