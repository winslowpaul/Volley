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
	$this->entry_thumbnail( 'themethreads-square-blog', array(), true );
}

?>

<div class="themethreads-blog-item-inner round">

	<a href="<?php the_permalink()?>" class="themethreads-overlay-link"><?php the_title() ?></a>

	<header class="themethreads-lp-header mt-auto">
		<div class="themethreads-lp-details">
			<?php $this->entry_tags( 'themethreads-lp-category text-uppercase ltr-sp-175 font-weight-bold' ) ?>
		</div><!-- /.themethreads-lp-details -->
		<h2 class="themethreads-lp-title font-weight-bold h3 mb-0">
			<a href="<?php the_permalink()?>"><?php the_title() ?></a>
		</h2>
	</header>

</div><!-- /.themethreads-blog-item-inner -->