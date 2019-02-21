<li <?php themethreads_helper()->attr( 'comment' ); ?>>
	<article id="div-comment-3" class="comment-body">
		<footer class="comment-meta">
			<div class="comment-author vcard">
				<h2 class="screen-reader-text"><?php echo esc_html__( 'Post comment', 'volley' ) ?></h2>
				<?php echo get_avatar( $comment, 70 ); ?>
				<b <?php themethreads_helper()->attr( 'comment-author' ); ?>><?php comment_author_link(); ?></b>
				<span class="says"><?php esc_html_e( 'says', 'volley' ) ?>:</span>
			</div> <!-- .comment-author -->
			
			<div class="comment-metadata">
				<a <?php themethreads_helper()->attr( 'comment-permalink' ); ?>><time <?php themethreads_helper()->attr( 'comment-published' ); ?>><?php printf( esc_html__( '%s ago', 'volley' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></time></a>
			</div> <!-- .comment-metadata -->
		</footer> <!-- .comment-meta -->
		
		<div class="comment-content">
			<?php comment_text(); ?>
		</div> <!-- .comment-content -->
		
		<div class="comment-extras">
			<div class="reply">
				<?php themethreads_comment_reply_link(); ?>
			</div><!-- /.reply -->
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'volley' ) ?></p>
			<?php } ?>
		</div>
	</article> <!-- .comment-body -->
