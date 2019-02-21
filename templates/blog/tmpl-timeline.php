<?php

$format = get_post_format();

?>
<div class="themethreads-lp-details">	
	<?php $this->entry_tags( 'bordered text-uppercase size-sm ltr-sp-1' ) ?>
	<?php
		$time_string = '<time class="published updated themethreads-lp-date" datetime="%1$s">%2$s</time>';
		printf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date( get_option( 'date_time' ) )
		);
	?>
</div><!-- /.themethreads-lp-details -->

<?php $this->entry_thumbnail( 'themethreads-timeline-blog' ) ?>

<a href="<?php the_permalink() ?>" class="themethreads-overlay-link"><?php the_title(); ?></a>

<header class="themethreads-lp-header">
	<?php $this->entry_title( 'font-weight-bold h3 size-sm' ); ?>
</header>

<?php $this->entry_content(); ?>

<footer class="themethreads-lp-footer">
	<a href="<?php the_permalink(); ?>" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold themethreads-lp-read-more">
		<span>
			<span class="btn-line btn-line-before"></span>
			<span class="btn-txt"><?php esc_html_e( 'Continue Reading', 'volley' ); ?></span>
			<span class="btn-line btn-line-after"></span>
		</span>
	</a>
</footer>