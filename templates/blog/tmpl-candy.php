<?php

$format = get_post_format();	

?>

<div class="themethreads-blog-item-inner" data-hover3d="true">

	<a href="<?php the_permalink(); ?>" class="themethreads-overlay-link"><?php the_title(); ?></a>

	<figure class="themethreads-lp-media">
		<div class="themethreads-lp-media-frame">
			<span class="themethreads-lp-frame-bar top"></span>
			<span class="themethreads-lp-frame-bar right"></span>
			<span class="themethreads-lp-frame-bar bottom"></span>
			<span class="themethreads-lp-frame-bar left"></span>
		</div><!-- /.themethreads-lp-media-frame -->

		<a href="<?php the_permalink(); ?>" data-stacking-factor="1">
			<?php themethreads_the_post_thumbnail( 'themethreads-candy-blog' ); ?>
		</a>

	</figure>

	<header class="themethreads-lp-header">
		<h2 class="themethreads-lp-title size-sm font-weight-normal mb-1">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
	</header>

	<!-- <div class="themethreads-lp-excerpt">
		<p>The goal of every tourist booking is to turn potential leads into guests.</p>
	</div> -->

	<footer class="themethreads-lp-footer">

		<div class="themethreads-lp-details themethreads-lp-details-lined themethreads-lp-details-lined-alt size-sm font-style-italic text-uppercase lp-sp-1" data-split-text="true" data-split-options='{ "type": "chars, words" }' data-custom-animations="true" data-ca-options='{ "triggerHandler": "mouseenter", "triggerTarget": ".themethreads-lp", "triggerRelation": "closest", "offTriggerHandler": "mouseleave", "animationTarget": ".threads-chars .split-inner", "duration": 170, "delay": 15, "offDuration": 100, "easing": "easeOutCirc", "initValues": { "translateY": 0, "opacity": 1 }, "animations": { "translateY": -10, "opacity": 0 } }'>
			<?php $this->entry_tags() ?>
			<?php
				$time_string = '<time class="published updated themethreads-lp-date" datetime="%1$s">%2$s</time>';
				printf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					get_the_date( get_option( 'date_time' ) )
				);
			?>

		</div>

		<a href="#" class="btn btn-naked text-uppercase ltr-sp-1 size-xs font-style-italic themethreads-lp-read-more themethreads-lp-read-more-overlay"data-split-text="true" data-split-options='{ "type": "chars, words" }' data-custom-animations="true" data-ca-options='{ "triggerHandler": "mouseenter", "triggerTarget": ".themethreads-lp", "triggerRelation": "closest", "offTriggerHandler": "mouseleave", "animationTarget": ".split-inner", "duration": 150, "delay": 15, "startDelay": 100, "offDuration": 100, "easing": "easeOutCirc", "initValues": { "translateY": 10, "opacity": 0 }, "animations": { "translateY": 0, "opacity": 1 } }'>
			<span>
				<span class="btn-txt"><?php esc_html_e( 'Continue Reading', 'volley' ); ?></span>
			</span>
		</a>
	</footer><!-- /.ld-pf-details -->

</div><!-- /.themethreads-blog-item-inner -->