<li <?php themethreads_helper()->attr( 'comment' ); ?>>

	<header class="comment-meta">

		<cite <?php themethreads_helper()->attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite><br />

		<time <?php themethreads_helper()->attr( 'comment-published' ); ?>><?php printf( esc_html__( '%s ago', 'volley' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time>

		<a <?php themethreads_helper()->attr( 'comment-permalink' ); ?>><?php esc_html_e( 'Permalink', 'volley' ); ?></a>

		<?php edit_comment_link(); ?>

	</header><!-- .comment-meta -->

<?php // No closing </li> is needed.  WordPress will know where to add it. ?>
