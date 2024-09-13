<?php
/**
 * Template for Widget section
 *
 * @package Brandy\Templates\Builder\Elements
 */
	$builder       = $args['builder'];
	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'       => $builder,
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => 'widget',
	)
	?>
<div class="brandy-widget-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<?php
		$wrapper_attributes = array(
			'links-decoration' => $settings['links_decoration'],
		)
		?>
	<div class="brandy-widget-content" <?php echo esc_attr( brandy_print_dom_attributes( $wrapper_attributes ) ); ?>>
	<?php dynamic_sidebar( $builder . '_' . $section_id ); ?>
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
