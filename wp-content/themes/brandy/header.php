<?php
/**
 * The Template for displaying site header
 *
 * @package Brandy
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! headers_sent() && ! session_id() ) {
	session_start();
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<?php

	/**
	 * Body attributes
	 */
	$body_attributes = brandy_get_body_attributes();
?>
<body <?php body_class( is_customize_preview() ? 'customize-preview' : 'front-end' ); ?> <?php brandy_print_dom_attributes( $body_attributes ); ?>>
	<?php
		wp_body_open();

		brandy_header();
	?>
	<?php

		/**
		 * Site classes & attributes
		 */
		global $post;
		$site_content_classes    = apply_filters( 'brandy_site_content_classes', array( 'site-content' ) );
		$site_content_attributes = array_merge(
			array(
				'id'    => 'content',
				'class' => esc_attr( implode( ' ', $site_content_classes ) ),
			)
		);
		?>

	<?php
		/**
		 * Hook: brandy_before_site_content
		 */
		do_action( 'brandy_before_site_content' );
	?>
	<div <?php brandy_print_dom_attributes( $site_content_attributes ); ?>>
