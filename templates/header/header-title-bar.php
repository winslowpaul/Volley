<?php 

$classes = array(
	'titlebar',
);
if( !class_exists( 'ReduxFramework' ) || !class_exists( 'ThemeThreads_Addons' ) ) { 
	$classes[] = 'titlebar-default';
}
if( $scheme = themethreads_helper()->get_option( 'title-bar-scheme' ) ) {
	$classes[] = $scheme;
}
if( $align = themethreads_helper()->get_option( 'title-bar-align' ) ) {
	$classes[] = $align;
}
if( $extra = themethreads_helper()->get_option( 'title-bar-classes' ) ) {
	$classes[] = $extra;
}

// Heading and subheading
$heading = $subheading = '';
if( !class_exists( 'ReduxFramework' ) && is_home() ) { 
	$heading = esc_html__( 'Blog', 'volley' );
	$subheading = '';
}
elseif( is_home() ) {
	$heading = themethreads_helper()->get_option( 'blog-title-bar-heading', 'html' );
}
elseif( is_search() ) {
	$heading = sprintf( esc_html__( 'Search Results for: %s', 'volley' ), '<span>' . get_search_query() . '</span>' );
	$subheading = themethreads_helper()->get_option( 'search-title-bar-subheading', 'html' );
}
elseif( is_post_type_archive( 'volley-portfolio' ) || is_tax( 'volley-portfolio-category' ) ) {
	$heading = themethreads_helper()->get_option( 'portfolio-title-bar-heading', 'html' ) ? do_shortcode( themethreads_helper()->get_option( 'portfolio-title-bar-heading', 'html' ) ) : single_cat_title( '', false );
	$subheading = themethreads_helper()->get_option( 'portfolio-title-bar-subheading', 'html' );
}
elseif( class_exists( 'WooCommerce' ) && is_shop() ) {
	$shop    = get_option( 'woocommerce_shop_page_id' );
	$heading = themethreads_helper()->get_option( 'title-bar-heading', 'html' ) ? themethreads_helper()->get_option( 'title-bar-heading', 'html' ) : get_the_title( $shop );
}
elseif( class_exists( 'WooCommerce' ) && ( is_product_taxonomy() || is_product_category() ) ) {
	$heading = themethreads_helper()->get_option( 'wc-archive-title-bar-heading', 'html' ) ? themethreads_helper()->get_option( 'wc-archive-title-bar-heading', 'html' ) : single_cat_title( '', false );
	$category_description = category_description();
	$subheading = ! empty( $category_description ) ? $category_description : themethreads_helper()->get_option( 'wc-archive-title-bar-subheading', 'html' );
}
elseif( is_category() ) {
	$heading = themethreads_helper()->get_option( 'category-title-bar-heading', 'html' ) ? do_shortcode( themethreads_helper()->get_option( 'category-title-bar-heading', 'html' ) ) : single_cat_title( '', false );
	$category_description = category_description();
	$subheading = ! empty( $category_description ) ? $category_description : themethreads_helper()->get_option( 'category-title-bar-subheading', 'html' );		
}
elseif( is_tag() ) {
	$heading = themethreads_helper()->get_option( 'tag-title-bar-heading', 'html' ) ? do_shortcode( themethreads_helper()->get_option( 'tag-title-bar-heading', 'html' ) ) : single_tag_title( '', false ) ;
	$subheading = themethreads_helper()->get_option( 'tag-title-bar-subheading', 'html' );	
}
elseif( is_author() ) {
	$heading = themethreads_helper()->get_option( 'author-title-bar-heading', 'html' ) ? do_shortcode( themethreads_helper()->get_option( 'author-title-bar-heading', 'html' ) ) : get_the_author();
	$subheading = themethreads_helper()->get_option( 'author-title-bar-subheading', 'html' );
}
elseif( is_archive() ) {
	$heading = esc_html__( 'Archive', 'volley' );
	$subheading = '';	
}
else {
	$heading = themethreads_helper()->get_option( 'title-bar-heading', 'html' );
}
$heading = $heading ? $heading : get_the_title();
$subheading = wpautop( themethreads_helper()->get_option( 'title-bar-subheading', 'post' ) );


//Parallax
$parallax = array();
if( 'on' === themethreads_helper()->get_option( 'title-bar-parallax' ) ) {
	$parallax[] = 'data-parallax="true"';
	$parallax[] = 'data-parallax-options=\'{ "parallaxBG": true }\'';
}

// Breadcrumb
$breadcrumb = ( 'on' === themethreads_helper()->get_option( 'title-bar-breadcrumb' ) );
$breadcrumb_args = array(
	'classes' => 'reset-ul inline-nav comma-sep-li',
);
// Local Scroll
$scroll = ( 'on' === themethreads_helper()->get_option( 'title-bar-scroll' ) );
$scroll_id = themethreads_helper()->get_option( 'title-bar-scroll-id' );
if( empty( $scroll_id ) ) {
	$scroll_id = 'content';
}

?>
<div class="<?php echo join( ' ', $classes ) ?>" <?php echo join( ' ', $parallax ) ?>>
	
	<?php //Overlay
		if( 'on' === themethreads_helper()->get_option( 'title-bar-overlay' ) ) { ?>
			<div class="titlebar-overlay ld-overlay"></div><!-- /.titlebar-overlay -->
	<?php
		} 
	?>
	<?php themethreads_action( 'header_titlebar' ); ?>
	<?php if( !is_singular( 'post' ) ) { ?>
	<div class="titlebar-inner">
		<div class="container titlebar-container">
			<div class="row titlebar-container">
				<div class="titlebar-col col-md-12">

					<h1 data-fittext="true" data-fittext-options='{ "maxFontSize": "currentFontSize", "minFontSize": 32 }'><?php echo wp_kses_post( $heading ); ?></h1>
					<?php echo wp_kses_post( $subheading ); ?>
					<?php if( $breadcrumb ) themethreads_breadcrumb( $breadcrumb_args ); ?>
					<?php if( $scroll ) : ?>
						<a class="titlebar-scroll-link" href="#<?php echo esc_attr( $scroll_id ); ?>" data-localscroll="true"><i class="fa fa-angle-down"></i></a>
					<?php endif; ?>

				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.titlebar-inner -->
	<?php } ?>
</div><!-- /.titlebar -->