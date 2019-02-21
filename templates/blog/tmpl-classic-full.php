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
	$this->entry_thumbnail( 'themethreads-classic-full-blog' );
}
?>

<div class="themethreads-blog-item-inner">
	
	<a href="<?php the_permalink() ?>" class="themethreads-overlay-link"><?php the_title() ?></a>

	<header class="themethreads-lp-header">

		<h2 class="themethreads-lp-title font-weight-bold h3 size-sm">
			<a href="<?php the_permalink() ?>" data-split-text="true" data-split-options='{ "type": "lines" }'><?php the_title(); ?></a>
		</h2>

		<div class="themethreads-lp-details">
			<time class="themethreads-lp-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'volley' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
			<?php esc_html_e( 'in', 'volley' ); ?>
			<?php $this->entry_tags(); ?>
		</div><!-- /.themethreads-lp-details -->

	</header>
	
	<?php $this->entry_content(); ?>
	
	<footer class="themethreads-lp-footer">
		<a href="<?php the_permalink() ?>" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold themethreads-lp-read-more">
			<span>
				<span class="btn-line btn-line-before"></span>
				<span class="btn-txt"><?php esc_html_e( 'Continue Reading', 'volley' ) ?></span>
				<span class="btn-line btn-line-after"></span>
			</span>
		</a>
	</footer>
	
</div><!-- /.themethreads-blog-item-inner -->
