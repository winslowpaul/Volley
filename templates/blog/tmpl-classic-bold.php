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
	$this->entry_thumbnail( 'themethreads-standard-blog' );
}
?>
<header class="themethreads-lp-header">
	<?php $this->entry_tags() ?>
	<?php $this->entry_title( 'h5 text-uppercase font-weight-bold' ); ?>
	<?php
		$time_string = '<time class="published updated themethreads-lp-date font-style-italic" datetime="%1$s">%2$s</time>';
		printf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date( get_option( 'date_time' ) )
		);
	?>
</header>