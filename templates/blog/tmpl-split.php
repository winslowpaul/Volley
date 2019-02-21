<?php

$format = get_post_format();	

?>
<?php $this->entry_thumbnail( 'themethreads-split-blog' ); ?>

<div class="themethreads-blog-item-inner">
	<?php $this->overlay_link(); ?>
	<header class="themethreads-lp-header">
		<h2 class="themethreads-lp-title font-weight-bold h3 size-md">
			<a href="<?php the_permalink(); ?>" data-split-text="true" data-split-options='{ "type": "lines" }'><?php the_title(); ?></a>
		</h2>
		<div class="themethreads-lp-details themethreads-lp-details-lined size-sm text-uppercase lp-sp-1">
			<?php $this->entry_tags() ?>
			<?php
				$time_string = '<time class="published updated themethreads-lp-date" datetime="%1$s">%2$s</time>';
				printf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					get_the_date( get_option( 'date_time' ) )
				);
			?>
		</div><!-- /.themethreads-lp-details -->
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
	
</div><!-- /.themethreads-blog-item-inner -->