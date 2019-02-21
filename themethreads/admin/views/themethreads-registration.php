<?php
	
	$register = new ThemeThreads_Register;
	
?>
<div class="threads-dsd-box threads-dsd-box-solid threads-dsd-register-box">

	<div class="threads-dsd-box-head">

		<?php $register->messages(); ?>

	</div><!-- /.threads-dsd-box-head -->

	<?php $register->form(); ?>
	
	<div class="threads-dsd-box-foot">
		<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php esc_html_e( 'Can’t find your purchase code?', 'volley' ); ?></a>
	</div><!-- /.threads-dsd-box-foot -->	

</div><!-- /.threads-dsd-register-box -->