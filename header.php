<?php
/**
 * The template for displaying the header
 *
 * @package Volley theme
 */

?><!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
<head <?php themethreads_helper()->attr( 'head' ); ?>>

	<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> <?php themethreads_helper()->attr( 'body' ); ?>>

	<?php themethreads_action( 'before' ) ?>

	<div id="wrap">

		<?php
			themethreads_action( 'before_header' );
			themethreads_action( 'header' );
			themethreads_action( 'after_header' );
		?>

		<main <?php themethreads_helper()->attr( 'content' ); ?>>
			<?php themethreads_action( 'before_content' ); ?>
