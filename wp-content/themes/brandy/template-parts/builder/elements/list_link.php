<?php
/**
 * Template for list link section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Core\Services\StringVariablesService;
use Brandy\Utils\Helpers;

	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'       => $args['builder'],
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => 'list_link',
	);
	?>
<div class="brandy-list-link-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<?php
		$wrapper_attributes = array(
			'data-direction' => esc_attr( $settings['element_direction'] ?? 'vertical' ),
		);
		$items_collapsible  = $settings['items_collapsible'] ?? array( 'desktop' => false );
		foreach ( brandy_get_devices() as $device ) {
			$wrapper_attributes[ "data-collapsible-$device" ] = Helpers::get_device_value( $items_collapsible, $device ) ? 'true' : 'false';
		}
		?>
	<div class="brandy-element-wrapper" <?php brandy_print_dom_attributes( $wrapper_attributes ); ?>>
		<?php
		$label           = $settings['label'] ?? '';
		$items           = $settings['items'] ?? array();
		$items_direction = $settings['items_direction'] ?? array(
			'desktop' => 'horizontal',
		);
		$items_alignment = $settings['items_alignment'] ?? array(
			'desktop' => 'left',
		);

		$items_attributes = array();
		foreach ( brandy_get_devices() as $device ) {
			$items_attributes[ "data-direction-$device" ] = Helpers::get_device_value( $items_direction, $device );
			$items_attributes[ "data-alignment-$device" ] = Helpers::get_device_value( $items_alignment, $device );
		}
		?>
		<div class="brandy-list-link__label brandy-footer-toggle-label"><span class="brandy-list-link__text"><?php echo esc_html( $label ); ?></span><span class="brandy-list-link__arrow brandy-footer-toggle-arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.5034 7.91837L9.00006 12.0124L4.49668 7.91837L5.25343 7.08594L9.00006 10.492L12.7467 7.08594L13.5034 7.91837Z" fill="#1E1E1E"></path></svg></span></div>
		<div class="brandy-list-link__items brandy-footer-toggle-content" <?php brandy_print_dom_attributes( $items_attributes ); ?>>
			<?php
			foreach ( $items as $link_item ) :
				$item_url = $link_item['url'] ?? '#';
				$item_url = StringVariablesService::replace_variables( $item_url );
				?>
				<a class="brandy-list-link-item" href="<?php echo esc_url( $item_url ); ?>"><?php echo esc_html( $link_item['label'] ?? '' ); ?></a>
			<?php endforeach; ?>
		</div>
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
