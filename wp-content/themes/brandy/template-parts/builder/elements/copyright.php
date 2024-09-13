<?php
/**
 * Template for logo section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Core\Services\StringVariablesService;

	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'       => $args['builder'],
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => $section_id,
	);

	$content = isset( $settings['content'] ) ? $settings['content'] : '';
	$content = StringVariablesService::replace_variables( $content );
	?>
<div class="brandy-copyright-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper"><?php echo $content; //PHPCS: XSS ok. ?></div>
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
