<?php
/**
 * Template for logo section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Utils\Helpers;

	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'       => $args['builder'],
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => 'divider',
	);

	$devices = array( 'desktop', 'mobile', 'tablet' );
	?>
<div class="brandy-divider-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper">
		<?php
		foreach ( $devices as $device ) {
			$divider_attributes = array(
				'device' => esc_attr( $device ),
				'layout' => Helpers::get_device_value( $settings['layout'], $device ),
			)
			?>
			<div class="brandy-divider" <?php brandy_print_dom_attributes( $divider_attributes ); ?>></div>
		<?php } ?>
	</div>
	<?php
		get_template_part(
			'template-parts/common/edit-section-button',
			'',
			array(
				'part_id'   => $section_id,
				'part_name' => $section_title,
			)
		);
		?>
</div>
