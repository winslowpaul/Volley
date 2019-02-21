<?php

extract( $atts );

// classes
$classes = array( 

	'themethreads-progressbar',
	$size,
	$label_position,
	$roundness,
	$enable_vertical,
	$this->get_shape_classname(),
	$number_hide,
	
	$el_class,
	$this->get_id()

);

$this->generate_css();

?>
<div id="<?php echo $this->get_id(); ?>" class="<?php echo ld_helper()->sanitize_html_classes( $classes ) ?>" data-progressbar="true" <?php echo $this->get_data_options(); ?>>

	<div class="themethreads-progressbar-inner">
		<span class="themethreads-progressbar-bar">
			<span class="themethreads-progressbar-percentage <?php echo $this->get_shape() ?>"></span>
		</span>
		
		<?php $this->get_circle_container(); ?>
		
	</div><!-- /.themethreads-progressbar-inner -->

	<?php if( $label ) { ?>
		<div class="themethreads-progressbar-details">
			<h3 class="themethreads-progressbar-title"><?php echo esc_html( $label ); ?></h3>
		</div><!-- /.themethreads-progressbar-details -->
	<?php } ?>

</div><!-- /.themethreads-progressbar -->