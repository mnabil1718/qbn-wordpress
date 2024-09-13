<?php
/**
 * Template for top header section
 *
 * @package Brandy\Templates\Header
 */

use Brandy\Utils\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$row    = isset( $args['row'] ) ? $args['row'] : 'top';
$device = isset( $args['device'] ) ? $args['device'] : 'desktop';

$section_id   = "{$row}_header";
$section_name = "$row header";

$attributes       = array(
	'data-builder'    => 'header',
	'data-section-id' => $section_id,
);
$current_template = brandy_get_header_template();

$settings = $current_template['row_configurations'][ $row ];

$is_expanded_on_mobile = isset( $settings['expand_on_mobile'] ) ? $settings['expand_on_mobile'] : true;

$hidden_classes = brandy_enabled_devices_classes( $settings['enabled_devices'] );

if ( ! is_customize_preview() && ! in_array( $device, $settings['enabled_devices'], true ) ) {
	return;
}

$columns             = $current_template['placements'][ 'tablet' === $device ? 'mobile' : $device ][ $row ];
$row_layout          = isset( $current_template['settings']['layout'] ) ? $current_template['settings']['layout'] : 'full-width';
$columns_has_element = array_filter(
	$columns,
	function( $col ) {
		return count( $col ) > 0;
	}
);
if ( count( $columns_has_element ) <= 0 ) {
	return;
}

$attributes['id']          = "brandy-$row-header";
$attributes['class']       = "brandy-child-header brandy-$row-header $hidden_classes " . brandy_get_editable_class( 'row' );
$attributes['class']      .= 'full-width' !== $row_layout ? ' is-boxed' : '';
$attributes['data-layout'] = $row_layout;
if ( ! empty( $settings['is_constrained'] ) ) {
	$attributes['data-is-constrained'] = 'true';
}

?>
<div <?php brandy_print_dom_attributes( $attributes ); ?>>
	<?php
	get_template_part(
		'template-parts/common/edit-row-button',
		'',
		array(
			'part_id'   => $section_id,
			'part_name' => $section_name,
		)
	);
	$container_attributes = array(
		'class'                      => esc_attr( 'header-container ' . $row_layout ),
		'item-layout'                => esc_attr( Helpers::get_device_value( $settings['stretch_item'], $device ) ? 'stretch' : 'normal' ),
		'data-is-expanded-on-mobile' => esc_attr( $is_expanded_on_mobile ? 'true' : 'false' ),
	)
	?>
	<div <?php brandy_print_dom_attributes( $container_attributes ); ?>>
		<?php do_action( 'brandy_render_header_placement', $row, $device ); ?>
		<?php if ( 'top' === $row && false !== $is_expanded_on_mobile && ( ! empty( $columns[1] ) || ! empty( $columns[2] ) ) ) : ?>
			<div class="header-expand">
				<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="0.000488281" width="21.9993" height="21.9993" rx="5" fill="#F0F1F5"/>
					<path opacity="0.7" fill-rule="evenodd" clip-rule="evenodd" d="M10.0629 11.9351V15.9993H11.9378V11.9351H15.9998V10.0603H11.9378V6H10.0629V10.0603H6.00049V11.9351H10.0629Z" fill="#5A6D80"/>
				</svg>
				<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="22" height="22" rx="5" fill="#F0F1F5"/>
					<path opacity="0.7" fill-rule="evenodd" clip-rule="evenodd" d="M16 11.75H6V10.25H16V11.75Z" fill="#1E1E1E"/>
				</svg>
			</div>
		<?php endif; ?>
	</div>
</div>
