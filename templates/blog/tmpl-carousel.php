
<?php $this->entry_thumbnail( 'full', array(), true ); ?>

<div class="themethreads-blog-item-inner">
	<?php $this->overlay_link(); ?>

	<header class="themethreads-lp-header">
		<h2 class="themethreads-lp-title size-lg font-weight-bold h3" data-fittext="true" data-fittext-options='{ "maxFontSize": "currentFontSize", "compressor": 0.6 }'>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="themethreads-lp-details themethreads-lp-details-lined size-sm text-uppercase lp-sp-1">
			<?php $this->entry_tags(); ?>
			<?php
				$time_string = '<time class="published updated themethreads-lp-date" datetime="%1$s">%2$s</time>';
				printf( $time_string,
					esc_attr( get_the_date( 'c' ) ),
					get_the_date( get_option( 'date_time' ) )
				);
			?>
		</div><!-- /.themethreads-lp-details -->
	</header>

</div><!-- /.themethreads-blog-item-inner -->
