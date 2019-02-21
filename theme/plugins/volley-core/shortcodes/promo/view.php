<?php

extract( $atts );

$classes = array( 
	'threads-promo-wrap',
	$content_alignment,

	$el_class, 
	$this->get_id() 
);

$this->generate_css();

$bg_color = !empty( $overlay_color ) ? $overlay_color : '#FE055E';

?>

<div id="<?php echo $this->get_id() ?>" class="<?php echo ld_helper()->sanitize_html_classes( $classes ) ?>">
	<div class="threads-promo-inner">

		<?php $this->get_dynamic_shape(); ?>			
		<?php $this->get_label(); ?>

		<div class="threads-promo-img">
			<div class="threads-promo-img-inner" data-reveal="true" data-reveal-options='{ "direction": "rl", "bgcolor": "<?php echo esc_attr( $overlay_color ); ?>", "revealSettings": { "onCoverAnimations": { "scale": [2, 1] } } }'>
				<?php $this->get_image(); ?>
			</div><!-- /.threads-promo-img-inner -->
		</div><!-- /.threads-promo-img -->

		<div class="threads-promo-content"
			data-custom-animations="true"
			data-ca-options='{ "triggerHandler": "inview", "animationTarget": ".btn", "duration": 800, "startDelay": 1300, "initValues": { "translateY": 70, "opacity": 0 }, "animations": { "translateY": 0, "opacity": 1 } }'
		>
			<?php $this->get_title(); ?>
			<?php $this->get_content(); ?>
			<?php $this->get_button() ?>

		</div><!-- /.threads-promo-content -->

	</div><!-- /.threads-promo-inner -->
</div><!-- /.threads-promo-wrap -->