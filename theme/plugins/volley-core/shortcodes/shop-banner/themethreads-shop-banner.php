<?php
/**
* Shortcode Banner
*/

if( !defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

/**
* LD_Shortcode
*/
class LD_Shop_Banner extends LD_Shortcode {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		// Properties
		$this->slug         = 'ld_shop_banner';
		$this->title        = esc_html__( 'Banner', 'volley-core' );
		$this->description  = esc_html__( 'Create banners', 'volley-core' );
		$this->icon         = 'fa fa-mouse-pointer';

		parent::__construct();
	}

	public function get_params() {

		$this->params = array(

			array(
				'type'       => 'dropdown',
				'param_name' => 'style',
				'heading'    => esc_html__( 'Style', 'volley-core' ),
				'value'      => array(
					esc_html__( 'Style 1', 'volley-core' ) => 's1',
				)
			),
			array(
				'id'               => 'title',
				'heading'          => esc_html__( 'Title', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
			),
			array(
				'type'        => 'vc_link',
				'param_name'  => 'link',
				'heading'     => esc_html__( 'URL (Link)', 'volley-core' ),
				'description' => esc_html__( 'Add link to shop banner.', 'volley-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'attach_images',
				'param_name'  => 'image',
				'heading'     => esc_html__( 'Images', 'volley-core' ),
				'description' => esc_html__( 'Upload new images or use from media library', 'volley-core' ),
			),
			array(
				'type'       => 'css_editor',
				'param_name' => 'css',
				'heading'    => esc_html__( 'CSS box', 'volley-core' ),
				'group'      => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'themethreads_colorpicker',
				'only_solid'  => true,
				'param_name'  => 'color',
				'heading'     => esc_html__( 'Color', 'volley-core' ),
				'description' => esc_html__( 'Pick a color for the title', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'height',
				'heading'     => esc_html__( 'Height', 'volley-core' ),
				'description' => esc_html__( 'Add height to shop banner in px (150px)', 'volley-core' ),
				'group'       => esc_html__( 'Design Options', 'volley-core' ),
			),	
		);

		$this->add_extras();
	}
	
	protected function get_title() {
		
		$title = $this->atts['title'];
		
		if( empty( $title ) ) {
			return;
		}

		printf( '<div class="ld-shop-banner-content"><span>%s</span></div>', esc_html( $title ) );
		
	}

	protected function get_image( $unique_id = null ) {
		
		$images_ids = explode( ',', $this->atts['image'] );
		$alt = $this->atts['title'];
		$carousel = '';
		
		// check
		if( empty( $images_ids ) ) {
			return;
		}
		
		echo '<div class="ld-shop-banner-image">';
		
		if( 1 == count( $images_ids ) ) {
			$image = themethreads_get_image( $images_ids[0] );
			printf( '<figure style="background-image: url(%1$s);"><img src="%1$s" alt="%2$s"></figure>', $image, esc_attr( $alt ) );
		}
		else {
			
			$carousel .= '<div class="carousel-container ld-shop-banner-carousel-main">';	
			$carousel .= '<div class="carousel-items row" id="' . $unique_id . '" data-threads-flickity=\'{ "prevNextButtons": false }\'>';
			
			foreach( $images_ids as $image_id ) {
				
				$img_url  = wp_get_attachment_image_url( $image_id, 'full', false );
				$img_html = wp_get_attachment_image( $image_id, 'full', false, array( 'alt' => esc_attr( $alt ) ) );
				$carousel .= sprintf( '<div class="carousel-item"><figure style="background-image: url(%1$s);">%2$s</figure></div>', $img_url, $img_html );

			}
			
			$carousel .= '</div><!-- /.carousel-items row -->';
			$carousel .= '</div><!-- /.carousel-container -->';
			
			echo $carousel;			

		}

		echo '</div>';

	}
	
	protected function get_nav( $unique_id = null ) {

		$images_ids = explode( ',', $this->atts['image'] );
		$alt = $this->atts['title'];
		$carousel = '';
		
		// check
		if( empty( $images_ids ) ) {
			return;
		}
		
		if( 1 == count( $images_ids ) ) {
			return;
		}
		else {
			
			$carousel .= '<div class="carousel-container ld-shop-banner-carousel-nav">';
			$carousel .= '<div class="carousel-items row" data-threads-flickity=\'{ "prevNextButtons": false, "asNavFor": "#' . $unique_id . '" }\'>';
			
			foreach( $images_ids as $image_id ) {
				
				$img_url  = wp_get_attachment_image_url( $image_id, 'full', false );
				$img_html = wp_get_attachment_image( $image_id, 'full', false, array( 'alt' => esc_attr( $alt ) ) );
				$carousel .= sprintf( '<div class="carousel-item col-md-3 col-xs-6"><figure style="background-image: url(%1$s);">%2$s</figure></div>', $img_url, $img_html );

			}
			
			$carousel .= '</div><!-- /.carousel-items row -->';
			$carousel .= '</div><!-- /.carousel-container -->';

		}
		
		echo $carousel;

	}
	
	protected function get_link() {

		$link = themethreads_get_link_attributes( $this->atts['link'], false );
		if( empty( $link['href'] ) ) {
			return;
		}
		
		printf( '<a %s class="themethreads-overlay-link"></a>', ld_helper()->html_attributes( $link )  );

	}
	
	protected function has_custom_height() {
		
		$height = $this->atts['height'];
		if( empty( $height ) ) {
			return;
		}
		
		return 'custom-height-applied';
	}

	protected function get_class( $style ) {

		$hash = array(
			's1' => 'ld-shop-banner-style1',
		);

		return $hash[$style];
	}

	protected function generate_css() {

		extract( $this->atts );

		$elements = array();
		$id = '.' . $this->get_id();
		
		if( !empty( $color ) ) {
			$elements[themethreads_implode( '%1$s .ld-shop-banner-content' )]['color'] = $color;
		}
		if( !empty( $height ) ) {
			$elements[themethreads_implode( '%1$s.custom-height-applied' )]['height'] = $height;
		}

		$this->dynamic_css_parser( $id, $elements );

	}

}
new LD_Shop_Banner;