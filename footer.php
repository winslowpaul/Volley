<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the main containers
 *
 * @package Volley theme
 */
?>

			<?php themethreads_action( 'after_content' ); ?>
			
		</main><!-- #content -->
		<?php
		themethreads_action( 'before_footer' );
		themethreads_action( 'footer' );
		themethreads_action( 'after_footer' );
		?>

	</div><!-- .site-container -->

	<?php themethreads_action( 'after' ) ?>

	<?php wp_footer(); ?>
</body>
</html>