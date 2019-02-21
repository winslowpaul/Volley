<?php

extract( $atts );

$classes = array(
	'themethreads-img-group-container',
	$el_class, 
	$this->get_id() 
);

$this->generate_css();
	
?>
<div id="<?php echo $this->get_id() ?>" class="<?php echo ld_helper()->sanitize_html_classes( $classes ); ?>" <?php echo $this->get_options() ?> <?php echo $this->get_parallax_options() ?>>
	<div class="themethreads-img-group-inner">
		<?php echo ld_helper()->do_the_content( $content ); ?>	
	</div><!-- /.themethreads-img-group-inner -->
</div><!-- /.themethreads-img-group-container -->