<main>

	<div class="threads-dsd-wrap">

		<?php include_once( get_template_directory() . '/themethreads/admin/views/themethreads-tabs.php' ); ?>
	
		<header class="threads-dsd-header">
			<div class="threads-dsd-header-inner">
				<h2><?php esc_html_e( 'Welcome to Volley!', 'volley' ); ?></h2>
				<p><?php esc_html_e( 'Total design freedom for everyone.', 'volley' ) ?></p>
			</div><!-- /.threads-dsd-header-inner -->
		</header>
		
		<div class="threads-row">

			<div class="threads-col threads-col-6">
				<?php include_once( get_template_directory() . '/themethreads/admin/views/themethreads-registration.php' ); ?>
			</div><!-- /.threads-col -->

			<div class="threads-col threads-col-6">

				<?php include_once( get_template_directory() . '/themethreads/admin/views/themethreads-features.php' ); ?>

			</div><!-- /.threads-col -->

		</div><!-- /.threads-row -->

	</div><!-- /.threads-dsd-wrap -->

</main>
