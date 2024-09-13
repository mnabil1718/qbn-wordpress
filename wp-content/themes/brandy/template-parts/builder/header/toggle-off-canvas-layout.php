<?php
/**
 * Template for toggle off canvas section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Builder\Header\ToggleOffCanvasBuilder;
use Brandy\Utils\Helpers;

	$current_template = brandy_get_header_template();
	$settings         = $current_template['row_configurations']['toggle'];
	$section_id       = 'toggle_off_canvas';
	$section_title    = 'Toggle off canvas';
	$attributes       = array(
		'data-builder'       => 'header',
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => $section_id,
	);

	foreach ( brandy_get_devices() as $device ) {
		$attributes[ "horizontal-alignment-$device" ] = Helpers::get_device_value( $settings['horizontal_alignment'], $device );
		$attributes[ "align-bottom-from-$device" ]    = Helpers::get_device_value( $settings['align_bottom_from'], $device );
	}
	$canvas_type = $settings['canvas_type'];
	?>
<div id="toggle-off-canvas" type=<?php echo esc_attr( $canvas_type ); ?> class="brandy-toc-section <?php echo esc_attr( brandy_get_editable_class( 'row' ) ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<?php
	if ( 'dropdown_panel' === $canvas_type ) {
		ToggleOffCanvasBuilder::render_close_icon();
	}
	?>
	<div class="brandy-toc-panel">
		<?php
		if ( 'dropdown_panel' !== $canvas_type ) {
			ToggleOffCanvasBuilder::render_close_icon();
		}
		?>
		<?php foreach ( brandy_get_devices() as $device ) : ?>
			<div class="brandy-toc-elements-wrapper" device=<?php echo esc_attr( $device ); ?>>
				<?php ToggleOffCanvasBuilder::render_elements( $device ); ?>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="brandy-toc-backdrop"></div>
</div>
