<?php
	$format = get_post_format();
	$size = get_post_meta( get_the_ID(), 'themethreads-post-height', true );
	$size = isset( $size ) ? $size : 'short';
	$this->entry_thumbnail( "themethreads-masonry-$size", array(), true );
?>
<div class="themethreads-blog-item-inner">
	<?php $this->overlay_link(); ?>
	<header class="themethreads-lp-header">
		<div class="themethreads-lp-details">
			<?php $this->entry_tags( 'themethreads-lp-category-filled' ) ?>
		</div><!-- /.themethreads-lp-details -->
		<?php $this->entry_title( 'size-sm font-weight-bold h3 themethreads-lp-title-clone' ); ?>
	</header>
	
	<footer class="themethreads-lp-footer">
		<?php $this->entry_title( 'size-sm font-weight-bold h3 themethreads-lp-title-original' ); ?>
		<a href="<?php the_permalink(); ?>" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold themethreads-lp-read-more">
			<span>
				<span class="btn-line btn-line-before"></span>
				<span class="btn-txt"><?php esc_html_e( 'Continue Reading', 'volley' ); ?></span>
				<span class="btn-line btn-line-after"></span>
			</span>
		</a>
	</footer>

</div><!-- /.themethreads-blog-item-inner -->

