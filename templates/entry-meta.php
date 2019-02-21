<div class="themethreads-lp-details">
	<time class="themethreads-lp-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'volley' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>
	<?php esc_html_e( 'in', 'volley' ); ?>
	<?php themethreads_post_terms( array( 'taxonomy' => 'category', 'text' => esc_html__( '%s', 'volley' ) ) ); ?>
	<?php themethreads_post_terms( array( 'taxonomy' => 'post_tag', 'text' => esc_html__( 'Tagged: %s', 'volley' ), 'before' => ' | ' ) ); ?>
</div><!-- /.themethreads-lp-details -->