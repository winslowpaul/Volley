<?php 
	
	$theme = themethreads_helper()->get_current_theme();
	
?>
<nav class="threads-dsd-menubard">

	<span class="threads-dsd-logo">
		<img src="<?php echo get_template_directory_uri() . '/themethreads/assets/img/dashboard/logo.png'; ?>" alt="<?php echo esc_attr( $theme->name ); ?>">
		<?php printf( '<span class="threads-v">%s</span>', $theme->version ); ?>
	</span>

	<ul class="threads-dsd-menu">
		<li class="<?php echo themethreads_helper()->active_tab( 'themethreads' ); ?>">
			<a href="<?php echo themethreads_helper()->dashboard_page_url(); ?>">
				<span><?php esc_html_e( 'Dashboard', 'volley' ); ?></span>
			</a>
		</li>
		<li class="<?php echo themethreads_helper()->active_tab( 'themethreads-plugins' ); ?>">
			<a href="<?php echo themethreads_helper()->plugin_page_url(); ?>">
				<span><?php esc_html_e( 'Install Plugins', 'volley' ); ?></span>
			</a>
		</li>
		<li class="<?php echo themethreads_helper()->active_tab( 'themethreads-import-demos' ); ?>">
			<a href="<?php echo themethreads_helper()->import_demos_page_url(); ?>">
				<span><?php esc_html_e( 'Import Demo', 'volley' ); ?></span>
			</a>
		</li>
		<li>
			<a href="https://docs.themethreadswp.com/" target="_blank">
				<i class="icon-md-help-circle"></i>
				<span><?php esc_html_e( 'Documentations', 'volley' ); ?></span>
			</a>
		</li>
	</ul>

</nav><!-- /.threads-dsd-menubard -->
