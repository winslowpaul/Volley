<?php

$format = get_post_format();

if( 'audio' === $format ) {
	$this->entry_thumbnail();
}
elseif( 'video' === $format ) {
?>
<div class="post-video">
	<?php $this->entry_thumbnail() ?>
	<?php $this->entry_tags() ?>
</div>
<?php
}
elseif( 'link' !== $format ) {
	$this->entry_thumbnail( 'themethreads-featured-blog' );
}
?>

<header class="themethreads-lp-header">
	<?php $this->entry_title( 'h4' ); ?>
	<?php
		$time_string = '<time class="published updated themethreads-lp-date text-uppercase size-sm" datetime="%1$s">%2$s</time>';
		printf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date( get_option( 'date_time' ) )
		);
	?>
</header>

<?php $this->entry_content(); ?>

<footer class="themethreads-lp-footer">
	<a href="<?php the_permalink() ?>" class="btn btn-naked themethreads-lp-read-more text-uppercase">
		<span>
			<span class="btn-txt"><?php esc_html_e( 'Read more', 'volley' ) ?></span>
			<span class="btn-icon">
				<i class="fa fa-long-arrow-right"></i>
			</span>
		</span>
	</a>
</footer>