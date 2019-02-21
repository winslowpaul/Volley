<?php

$format = get_post_format();
$label  = get_post_meta( get_the_ID(), 'themethreads-featured-label', true );
$this->entry_thumbnail( 'full', array(), true ); 

?>
<div class="themethreads-blog-item-inner">
	<?php $this->overlay_link(); ?>
	<header class="themethreads-lp-header">
		<?php if( ! empty( $label ) ) { ?>
			<span class="themethreads-lp-featured-label"><?php echo esc_html( $label ); ?></span>
		<?php } ?>
		<h2 class="themethreads-lp-title font-weight-bold h3 size-xl" data-fittext="true" data-fittext-options='{ "compressor": 1, "maxFontSize": "currentFontSize" }'>
			<a href="<?php the_permalink(); ?>" data-split-text="true" data-split-options='{ "type": "lines" }'><?php the_title(); ?></a>
		</h2>

		<div class="themethreads-lp-details size-lg">
			<time class="themethreads-lp-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'volley' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
			<?php esc_html_e( 'in', 'volley' ); ?>
			<?php $this->entry_tags( 'underlined-onhover' ); ?>
		</div><!-- /.themethreads-lp-details -->

	</header>
	<footer class="themethreads-lp-footer">
		<a href="<?php the_permalink(); ?>" class="btn btn-bordered border-thick text-uppercase ltr-sp-1 size-md font-weight-bold themethreads-lp-read-more">
			<span>
				<span class="btn-txt"><?php esc_html_e( 'Continue Reading', 'volley' ); ?></span>
			</span>
		</a>
	</footer>	
</div><!-- /.themethreads-blog-item-inner -->