<?php

extract( $atts );

$classes = array(
	'threads-frickin-img',
	$direction,

	$el_class, 
	$this->get_id() 
);

$this->generate_css();
	
?>
<div id="<?php echo $this->get_id() ?>" class="<?php echo ld_helper()->sanitize_html_classes( $classes ); ?>" data-inview="true" data-inview-options='{ "delayTime": 250, "threshold": 0.75 }'>
	<div class="threads-frickin-img-inner">

		<span class="threads-frickin-img-bg"></span><!-- /.threads-frickin-img-bg -->
		<?php $this->get_image() ?>

	</div><!-- /.threads-frickin-img-inner -->
</div><!-- /.threads-frickin-img -->