<?php
/**
 * Template for edit button
 *
 * @package Brandy\Templates\Common
 */

// translators: part name.
$button_aria_label = sprintf( __( 'Click to edit %s', 'brandy' ), $args['part_name'] );

// translators: part name.
$button_label = sprintf( __( 'Edit %s', 'brandy' ), $args['part_name'] );

$attributes = array(
	'data-part-id' => $args['part_id'],
);

if ( is_customize_preview() ) : ?>
	<div class="edit-row-button-wrapper edit-button" <?php brandy_print_dom_attributes( $attributes ); ?> >
		<span class="edit-row-label"><?php esc_html_e( 'Edit', 'brandy' ); ?></span>
	</div>
<?php endif; ?>
