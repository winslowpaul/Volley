<?php

add_filter( 'vc_load_default_templates', 'themethreads_reset_default_templates' ); // Hook in
function themethreads_reset_default_templates( $data ) {
    return array(); // This will remove all default templates. Basically you should use native PHP functions to modify existing array and then return it.
}

function themethreads_add_default_templates() {

	$templates = themethreads_vc_templates();
	return array_map( 'vc_add_default_templates', $templates );

}

themethreads_add_default_templates();

function themethreads_vc_templates(){
	
	$uri = get_template_directory_uri() . '/themethreads/assets/img/themethreads_templates/';
	$templates = array();

	//Category Paul MF Templates
	//Paul Templates 01
	$data = array();
	$data['name'] = esc_html__( 'Paul Template 01', 'volley' );
	$data['disabled'] = true; //disable it to not show in the default tab
	$data['image_path'] = preg_replace( '/\s/', '%20',  get_template_directory_uri() . '/themethreads/assets/img/themethreads_templates/paultemplates/paultemplate1.jpg' );
	$data['sort_name'] = 'paul';
	$data['custom_class'] = 'general paul';
	$data['content'] = <<<CONTENT
[vc_row css=".vc_custom_1550782444543{padding-top: 15vw !important;padding-bottom: 15vw !important;background-color: #3a3a3a !important;}"][vc_column width="1/2"][/vc_column][vc_column width="1/2"][ld_icon_box i_type="fontawesome" heading_size="sm" heading_weight="font-weight-semibold" i_shape="circle" position="iconbox-side" i_border="1" i_linked="iconbox-icon-linked" i_icon_fontawesome="fa fa-cog" title="Hundreds Of Settings" icon_size="20px" i_color="rgb(255, 255, 255)" h_color="rgb(255, 255, 255)" shape_color="rgb(58, 58, 58)" css=".vc_custom_1550782581209{padding-bottom: 30px !important;}"]All transactions that occur on Envato Market be in U.S. dollars. If your Paypal account or funding.[/ld_icon_box][ld_icon_box i_type="fontawesome" heading_size="sm" heading_weight="font-weight-semibold" i_shape="circle" position="iconbox-side" i_border="1" i_linked="iconbox-icon-linked" i_icon_fontawesome="fa fa-cog" title="Hundreds Of Settings" icon_size="20px" i_color="rgb(255, 255, 255)" h_color="rgb(255, 255, 255)" shape_color="rgb(58, 58, 58)" css=".vc_custom_1550782581209{padding-bottom: 30px !important;}"]All transactions that occur on Envato Market be in U.S. dollars. If your Paypal account or funding.[/ld_icon_box][ld_icon_box i_type="fontawesome" heading_size="sm" heading_weight="font-weight-semibold" i_shape="circle" position="iconbox-side" i_border="1" i_linked="iconbox-icon-linked" i_icon_fontawesome="fa fa-cog" title="Hundreds Of Settings" icon_size="20px" i_color="rgb(255, 255, 255)" h_color="rgb(255, 255, 255)" shape_color="rgb(58, 58, 58)" css=".vc_custom_1550782581209{padding-bottom: 30px !important;}"]All transactions that occur on Envato Market be in U.S. dollars. If your Paypal account or funding.[/ld_icon_box][/vc_column][/vc_row]
CONTENT;
	$templates[] = $data;

	return $templates;

}