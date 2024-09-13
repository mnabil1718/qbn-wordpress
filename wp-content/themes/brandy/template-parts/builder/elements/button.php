<?php
/**
 * Template for button section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Customizer\Elements\Button;

	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'       => $args['builder'],
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => 'menu',
	);

	$button_icon = Button::get_icon( $settings['icon'] );

	$extra_class = $settings['css_class'];

	?>
<div class="brandy-button-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper<?php echo esc_attr( ! empty( $extra_class ) ? " $extra_class" : '' ); ?>">
	<?php
		$button_attributes = array(
			'type'   => $settings['type'],
			'size'   => $settings['size'],
			'target' => $settings['link_new_tab'] ? '_blank' : '_self',
			'href'   => esc_url( $settings['link'] ),
		);
		?>
		<a class="brandy-button" <?php brandy_print_dom_attributes( $button_attributes ); ?>>
			<?php
			if ( $settings['icon_enabled'] ) {
				brandy_render_icon( $button_icon );
			}
			?>
			<span class="brandy-button-text-wrap">
			<?php echo esc_html( $settings['text'] ); ?>
			</span>
		</a>
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
