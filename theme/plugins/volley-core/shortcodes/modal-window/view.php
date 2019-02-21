<?php

extract( $atts );

$classes = array( 
	'threads-modal',
	'lity-hide',
	$el_class
);

?>
<!-- Modal Body -->
<div id="<?php echo $this->get_id(); ?>" class="<?php echo ld_helper()->sanitize_html_classes( $classes ); ?>">

	<div class="threads-modal-inner">
		<div class="threads-modal-head"><?php $this->get_title(); ?></div><!-- /.threads-modal-head -->
		<div class="threads-modal-content">

			<?php echo ld_helper()->do_the_content( $content, false ); ?>

		</div><!-- /.threads-modal-content -->
		<div class="threads-modal-foot"></div><!-- /.threads-modal-foot -->

	</div><!-- /.threads-modal-inner -->
</div><!-- /#modal-box.threads-modal -->