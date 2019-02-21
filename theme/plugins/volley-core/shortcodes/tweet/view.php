<?php 

extract( $atts );

?>
<div class="themethreads-twitter-feed">

	<?php $this->get_twitter_icon(); ?>

	<ul class="themethreads-twitter-feed-list">
		<li>
			<?php $this->get_tweet_data(); ?>
		</li>
	</ul>
</div><!-- /.themethreads-twitter-feed -->