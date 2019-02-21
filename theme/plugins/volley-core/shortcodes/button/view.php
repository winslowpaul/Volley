<?php
extract( $atts );

$icon = themethreads_get_icon( $atts );

// check
if( !$title && !isset( $icon['icon'] ) ) {
	return;
}

$this->generate_css();

$classes = array( 
	'btn',
	$style,
	$transformation,
	$this->get_size(),
	$this->get_custom_size_classname(),
	$this->get_shape(),
	$this->get_border(),
	$this->get_gradient_border(),
	$this->get_gradient(),
	
	$this->if_lightbox(),
	
	//Icon Classes
	$this->get_icon_pos(),
	$i_shape_size,
	$i_shape,
	$i_shape_style,	
	$i_ripple,
	
	$el_class,
	$this->get_id(),
	trim( vc_shortcode_custom_css_class( $css ) )
);

$attributes = themethreads_get_link_attributes( $link, '#' );
$attributes['class'] = ld_helper()->sanitize_html_classes( $classes );

if( 'modal_window' === $link_type ) {
	$attributes['data-lity'] = isset( $anchor_id ) ? esc_url( $anchor_id ) : '#modal-box';
	$attributes['href'] = isset( $anchor_id ) ? esc_url( $anchor_id ) : '#modal-box';
}
elseif( 'local_scroll' === $link_type ) {
	$attributes['data-localscroll'] = true;
	$attributes['href'] = isset( $anchor_id ) ? esc_url( $anchor_id ) : '#';
	
}
elseif( 'scroll_to_section' === $link_type ) {
	$attributes['data-localscroll'] = true;
	$attributes['data-localscroll-options'] = wp_json_encode( array( 'scrollBelowSection' => true ) );
	$attributes['href'] = '#';
}


?>
<a<?php echo ld_helper()->html_attributes( $attributes ) ?>>
	<span>
	<?php $this->get_gradient_bg(); ?>
	
		<?php if( !empty( $title ) ) { ?>
			<span class="btn-txt"><?php echo wp_kses_post( do_shortcode( $title ) ); ?></span>
		<?php } ?>
	
	<?php
		if( $icon['type'] ) {
			printf( '<span class="btn-icon">%s<i class="%s"></i></span>', $this->get_gradient_hover_icon_bg(), $icon['icon'] );
		}
	?>
	<?php $this->get_gradient_hover_bg(); ?>
	<?php $this->get_border_svg(); ?>
	</span>
</a>
