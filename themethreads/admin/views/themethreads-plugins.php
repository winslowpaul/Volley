<?php

$current_theme = wp_get_theme();

if( $current_theme->parent_theme ) {
	$template_dir  = basename( get_template_directory() );
	$current_theme = wp_get_theme($template_dir);
}

$installed_plugins = get_plugins();
$plugins = TGM_Plugin_Activation::$instance->plugins;

?>
<main>

	<div class="threads-dsd-wrap">

		<?php include_once( get_template_directory() . '/themethreads/admin/views/themethreads-tabs.php' ); ?>
	
		<header class="threads-dsd-header">
			<div class="threads-dsd-header-inner">
				<h2><?php esc_html_e( 'Install Plugins', 'volley' ); ?></h2>
				<p><?php esc_html_e( 'Choose a pre-built website for starting a quick design process.', 'volley' ); ?></p>
			</div><!-- /.threads-dsd-header-inner -->
			<div class="threads-msg threads-dsd-notice">
				<p><span><?php esc_html_e( 'Important:', 'volley' ); ?></span> <?php esc_html_e( 'Make sure to activate required plugins prior to import a demo.', 'volley' ); ?></p>
			</div><!-- /.threads-dsd-notice -->
		</header>

		<div class="threads-solid-wrap">
			<div class="threads-row">
	        
	        <?php
		        
		    if ( 'valid' != get_option( 'volley_purchase_code_status', false ) ) {
		
		        echo '<div class="error"><p>' .
		             sprintf( wp_kses_post( __( 'The %s theme needs to be registered. %sRegister Now%s', 'volley' ) ), 'volley', '<a href="' . admin_url( 'admin.php?page=themethreads') . '">' , '</a>' ) . '</p></div>';
		    }
		    else {

				foreach( $plugins as $plugin ) :
					$class = $status = $display_status = '';
					$file_path = $plugin['file_path'];
	
					// Install
					if( !isset( $installed_plugins[ $file_path ] ) ) {
						$status = 'not-installed';
					}
					// No Active
					elseif ( is_plugin_inactive( $file_path ) ) {
						$status = 'installed';
					}
					// Deactive
					elseif( !is_plugin_inactive( $file_path ) ) {
						$status = 'active';
						$class = ' threads-dsd-plugin-active';
						$display_status = esc_html__( 'Active:', 'volley' );
					}
			?>

				<div class="threads-col threads-col-3">
					<div class="threads-dsd-plugin<?php echo esc_attr( $class ); ?>">
					<span class="threads-dsd-plugin-icon">
						<img src="<?php echo esc_url( $plugin['themethreads_logo'] ); ?>" alt="<?php echo esc_attr( $plugin['name'] ) ?>">
					</span>
					<h3><?php printf( '<span>%s</span>', $display_status ); ?> <?php echo esc_html( $plugin['name'] ) ?></h3>
					<p><?php echo esc_html( $plugin['themethreads_description'] ) ?></p>
					
					<?php themethreads_helper()->tgmpa_plugin_action( $plugin, $status ); ?>
				</div><!-- /.threads-dsd-plugin -->
				</div><!-- /.threads-col -->

			<?php endforeach; } ?>

			</div><!-- /.threads-row -->
		</div><!-- /.threads-solid-wrap -->
	</div><!-- /.threads-dsd-wrap -->

</main>