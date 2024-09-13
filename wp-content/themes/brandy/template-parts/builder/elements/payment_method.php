<?php
/**
 * Template for payments section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Core\Services\StringVariablesService;
use Brandy\Customizer\Elements\PaymentMethod;

$element         = $args['element'];
$section_id      = $element['id'];
$section_title   = $element['title'];
$settings        = $element['settings'];
$attributes      = array(
	'data-builder'       => $args['builder'],
	'data-section-id'    => $section_id,
	'data-section-title' => $section_title,
	'data-element-type'  => 'socials',
);
$items           = $settings['items'];
$items_direction = empty( $settings['items_direction'] ) ? 'horizontal' : $settings['items_direction'];

?>
<div class="brandy-payments-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper">
		<div class="brandy-payment-list" items-direction=<?php echo esc_attr( $items_direction ); ?>>
			<?php

			foreach ( $items as $item ) :
				ob_start();
				get_template_part( PaymentMethod::$path_to_icons . $item['icon'] . '/default' );
				$icon = ob_get_contents();
				ob_end_clean();
				$item_attributes = array(
					'href'            => esc_url( StringVariablesService::replace_variables( $item['url'] ?? '#' ) ),
					'data-payment-id' => esc_attr( $item['id'] ),
					'data-icon'       => esc_attr( $item['icon'] ),
					'aria-label'      => esc_html( $item['label'] ),
				);
				?>
				<a class="brandy-payment-item <?php echo esc_attr( ! $item['visible'] ? 'hidden' : '' ); ?>" <?php brandy_print_dom_attributes( $item_attributes ); ?>>
					<?php brandy_render_icon( $icon ); ?>
					</span>
				</a>
				<?php
			endforeach;
			?>
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
