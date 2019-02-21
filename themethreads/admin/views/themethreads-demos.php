<main>

	<div class="threads-dsd-wrap">

		<?php include_once( get_template_directory() . '/themethreads/admin/views/themethreads-tabs.php' ); ?>
	
		<header class="threads-dsd-header">
			<div class="threads-dsd-header-inner">
				<h2><?php esc_html_e( 'Import a Demo', 'volley' ); ?></h2>
				<p><?php esc_html_e( 'Choose a pre-built website for starting a quick design process.', 'volley' ) ?></p>
			</div><!-- /.threads-dsd-header-inner -->
			<div class="threads-msg threads-dsd-notice">
				<p><span><?php esc_html_e( 'Important:', 'volley' ); ?></span> <?php esc_html_e( 'Make sure to activate required plugins prior to import a demo.', 'volley' ) ?></p>
			</div><!-- /.threads-dsd-notice -->
		</header>

		<?php

			include( locate_template( 'theme/themethreads-demo-config.php' ) );
			$i = 0;
			wp_localize_script( 'themethreads-admin', 'themethreads_demos', $demos );

		?>
		<div class="threads-solid-wrap">
			<div class="threads-row">

			<?php 
				
		    if ( 'valid' != get_option( 'volley_purchase_code_status', false ) ) {
		
		        echo '<div class="error"><p>' .
		             sprintf( wp_kses_post( __( 'The %s theme needs to be registered. %sRegister Now%s', 'volley' ) ), 'volley', '<a href="' . admin_url( 'admin.php?page=themethreads') . '">' , '</a>' ) . '</p></div>';
		    }
		    else {
				
				foreach( $demos as $id => $demo ): ?>

				<div class="threads-col threads-col-4">
		
					<div class="threads-dsd-demo-item">

						<figure>
							<img src="<?php echo esc_url( $demo['screenshot'] ); ?>" alt="<?php echo esc_attr( $demo['title'] ); ?>">
							<div class="threads-dsd-overlay">
								<a href="#" id="import-id" data-import-id="<?php echo esc_attr( $i ); ?>" data-demo-id="<?php echo esc_attr( $id ); ?>" class="threads-btn threads-btn-gradient threads-import-popup">
									<span><?php esc_html_e( 'Import Demo', 'volley' ); ?></span>
								</a>
								<a target="_blank" href="<?php echo esc_url( $demo['preview'] ); ?>" class="threads-btn">
									<span><?php esc_html_e( 'Preview', 'volley' ); ?></span>
								</a>
							</div><!-- /.threads-dsd-overlay -->
						</figure>
						<h3><?php echo esc_html( $demo['title'] ); ?></h3>
					</div><!-- /.threads-dsd-demo-item -->		
				</div><!-- /.threads-col -->		

	            <?php $i++; ?>
			<?php endforeach; } ?>

			</div><!-- /.threads-row -->

		<script type="text/template" id="tmpl-demo-import-modules">
			<div id="threads-progress-popup" class="threads-imp-popup-wrap is-active">
				<div class="threads-imp-progress">
					<h6><?php esc_html_e( 'Importing...', 'volley' ); ?></h6>
					<div id="themethreads-progress" class="importing"><?php esc_html_e( 'Working', 'volley' )?> <span>.</span><span>.</span><span>.</span></div>
					<div class="threads-progressbar">
						<div class="threads-progressbar-inner" style="width: 0%">
							<span id="threads-loader" class="threads-progressbar-percentage"><?php esc_html_e( '0%', 'volley' ); ?></span><!-- /.threads-progressbar-percentage -->
						</div><!-- /.threads-progressbar-inner -->
					</div><!-- /.threads-progressbar -->
				</div><!-- /.threads-imp-progress -->
			</div>
		</script>

		<script type="text/template" id="tmpl-demo-popup">
			<div id="threads-popup" class="threads-imp-popup-wrap is-active">
				<div class="threads-imp-popup-inner">
				
					<span class="threads-imp-popup-close">
						<svg width="12px" height="12px" viewBox="0 0 12 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g id="Dashboard---Import-Panel---Final" transform="translate(-751.000000, -539.000000)" fill="#2B2B2B">
											<g id="Group-5-Copy" transform="translate(727.000000, 514.000000)">
													<polygon id="close---material" points="35.82 26.36 31.18 31 35.82 35.64 34.64 36.82 30 32.18 25.36 36.82 24.18 35.64 28.82 31 24.18 26.36 25.36 25.18 30 29.82 34.64 25.18"></polygon>
											</g>
									</g>
							</g>
						</svg>
					</span>
					
					<div class="threads-imp-popup-head">
					
						<figure>
							<img src="<%= screenshot %>" alt="<%= title %>">
						</figure>
						
						<div class="threads-imp-notes">
							<h6><%= title %></h6>
							<div class="threads-msg threads-dsd-notice">
								<p><span><?php esc_html_e( 'Important:', 'volley' ); ?></span> <?php esc_html_e( 'Make sure to activate required plugins prior to import a demo.', 'volley' ); ?></p>
							</div><!-- /.threads-msg threads-dsd-notice -->
						</div><!-- /.threads-imp-notes -->
				
					</div><!-- /.threads-imp-popup-head -->
					<div class="threads-imp-popup-content threads-row">
					
						<div class="threads-col threads-col-7">
							<p><?php esc_html_e( 'Make sure to activate required plugins prior to import a demo.', 'volley' ); ?></p>
						</div><!-- /.threads-col threads-col-7 -->
					
					
					<div id="threads-import-opts" class="threads-row">
					
					<div class="threads-col threads-col-6">
						<span class="threads-imp-opt">
							<input id="threads-imp-all" type="checkbox" value="set_demo_content" checked="">
							<label for="threads-imp-all"></label>
							<span><?php esc_html_e( 'All Content', 'volley' ); ?></span>
						</span>
					</div><!-- /.threads-col threads-col-6 -->
					
					<div class="threads-col threads-col-6" style="display:none;">
						<span class="threads-imp-opt">
							<input id="threads-imp-revslider" type="checkbox" value="import_slider" checked="">
							<label for="threads-imp-content"></label>
							<span><?php esc_html_e( 'Revslider', 'volley' ); ?></span>
						</span>
					</div><!-- /.threads-col threads-col-6 -->
					
					<div class="threads-col threads-col-6">
						<span class="threads-imp-opt">
							<input id="threads-imp-media" type="checkbox" value="import_media" checked="">
							<label for="threads-imp-media"></label>
							<span><?php esc_html_e( 'Media Attachments', 'volley' ); ?></span>
						</span>
					</div><!-- /.threads-col threads-col-6 -->
					
					<div class="threads-col threads-col-6">
						<span class="threads-imp-opt">
							<input id="threads-imp-sidebar" type="checkbox" value="import_theme_widgets" checked="">
							<label for="threads-imp-sidebar"></label>
							<span><?php esc_html_e( 'Sidebars', 'volley' ); ?></span>
						</span>
					</div><!-- /.threads-col threads-col-6 -->
					
					<div class="threads-col threads-col-6">
						<span class="threads-imp-opt">
							<input id="threads-imp-example" type="checkbox" value="import_theme_options" checked="">
							<label for="threads-imp-example"></label>
							<span><?php esc_html_e( 'Theme Options', 'volley' ) ?></span>
						</span>
					</div><!-- /.threads-col threads-col-6 -->
					
					<div class="threads-col threads-col-6">
						<span class="threads-imp-opt">
							<input id="threads-imp-content" type="checkbox" value="set_home_page" checked="">
							<label for="threads-imp-content"></label>
							<span><?php esc_html_e( 'Home Page', 'volley' ); ?></span>
						</span>
					</div><!-- /.threads-col threads-col-6 -->
					
					</div>
					
					<div class="threads-col threads-col-12">
		
						<div class="threads-imp-terms">
							<span class="threads-imp-opt">
								<input id="terms-agree" name="terms-agree" type="checkbox" value="no">
								<label for="terms-agree"></label>
								<span><?php esc_html_e( 'This process will overwrite your current settings, are you sure you want to proceed?', 'volley' ); ?></span>
							</span>
						</div><!-- /.threads-imp-terms -->
		
					</div><!-- /.threads-col threads-col-12 -->
					
					<div class="threads-col threads-col-12">
						<button class="threads-import-btn" data-revslider="true" data-id="0">
							<span><?php esc_html_e( 'Import Demo', 'volley' ); ?></span>
							<i></i>
						</button>
					</div><!-- /.threads-col threads-col-12 -->
					
					</div><!-- /.threads-imp-popup-content -->
				
				</div><!-- /.threads-imp-popup-inner -->
			</div>
		
		</script>
			
		</div><!-- /.threads-solid-wrap -->
	</div><!-- /.threads-dsd-wrap -->

</main>
