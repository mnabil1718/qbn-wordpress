<?php

namespace Brandy\Customizer\Elements;

use Brandy\Abstracts\AbstractBaseElement;
use Brandy\Core\Services\TypographyService;

class BaseMenu extends AbstractBaseElement {

	protected function __construct() {
		add_filter( 'brandy_extra_localize', array( $this, 'add_localize_data' ) );

		parent::__construct();
	}

	public function template_path() {
		return 'template-parts/builder/elements/menu';
	}

	protected function register_components() {
		return array(
			'menu_name'                 => array(
				'value_path'     => array( 'menu_name' ),
				'default_value'  => 'default',
				'type'           => 'MenuSelection',
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'active_type'               => array(
				'value_path'     => array( 'active_type' ),
				'default_value'  => 'underline',
				'type'           => 'MenuActiveType',
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'css_classes'               => array(
				'title'          => array(
					'text' => __( 'Add CSS class', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'     => array( 'css_classes' ),
				'default_value'  => '',
				'type'           => 'TextInput',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'      => '.brandy-element-wrapper',
							'name'          => 'class',
							'value_path'    => array( 'css_classes' ),
							'default_class' => 'brandy-element-wrapper',
						),
					),
				),
			),
			'menu_item_reset'           => array(
				'title'       => array(
					'text'         => __( 'Menu item', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'menu_text' ),
					array( 'menu_item_padding' ),
				),
			),
			'menu_text_typography'      => array(
				'title'          => array(
					'text' => __( 'Typography', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'menu_text', 'typography' ),
				'default_value'  => TypographyService::get_default_typography_value(
					array(
						'font_size'   => array(
							'desktop' => array(
								'value' => 16,
							),
						),
						'line_height' => array(
							'desktop' => array(
								'value' => 26,
							),
						),
					)
				),
				'type'           => 'Typography',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--brandy-menu-text-typography',
							'value_path' => array( 'menu_text', 'typography' ),
						),
					),
				),
			),
			'menu_text_color'           => array(
				'value_path'     => array( 'menu_text', 'color' ),
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-menu-text-color',
							'value_path' => array( 'menu_text', 'color' ),
						),
					),
				),
			),
			'menu_item_padding'         => array(
				'title'          => array(
					'text' => __( 'Padding', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'menu_item_padding' ),
				'type'           => 'Spacing',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'px',
						'top'            => 4,
						'right'          => 0,
						'bottom'         => 4,
						'left'           => 0,
						'is_constraints' => false,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-menu-item-padding',
							'value_path' => array( 'menu_item_padding' ),
						),
					),
				),
			),
			'item_active_reset'         => array(
				'title'       => array(
					'text'         => __( 'Active menu item', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'active_item' ),
				),
			),
			'active_item_typography'    => array(
				'title'          => array(
					'text' => __( 'Typography', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'active_item', 'typography' ),
				'default_value'  => TypographyService::get_default_typography_value(
					array(
						'font_size'   => array(
							'desktop' => array(
								'value' => 16,
							),
						),
						'line_height' => array(
							'desktop' => array(
								'value' => 26,
							),
						),
					)
				),
				'type'           => 'Typography',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--brandy-active-item-typography',
							'value_path' => array( 'active_item', 'typography' ),
						),
					),
				),
			),
			'active_item_text_color'    => array(
				'value_path'     => array( 'active_item', 'color' ),
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-active-item-text-color',
							'value_path' => array( 'active_item', 'color' ),
						),
					),
				),
			),
			'active_item_background'    => array(
				'value_path'         => array( 'active_item', 'background' ),
				'title'              => array(
					'text' => __( 'Background color', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'      => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'               => 'ColorGroup',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-active-item-background',
							'value_path' => array( 'active_item', 'background' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array(
							'active_type',
						),
						'value'      => 'button',
					),
				),
			),
			'active_item_border_color'  => array(
				'value_path'         => array( 'active_item', 'border', 'color' ),
				'title'              => array(
					'text' => __( 'Border color', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'      => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'               => 'ColorGroup',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-active-item-border-color',
							'value_path' => array( 'active_item', 'border', 'color' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array(
							'active_type',
						),
						'operator'   => 'NOT',
						'value'      => 'text',
					),
				),
			),
			'active_item_border_width'  => array(
				'value_path'         => array( 'active_item', 'border', 'width' ),
				'title'              => array(
					'text' => __( 'Border width', 'brandy' ),
					'type' => 'normal',
				),
				'units'              => array( 'px' ),
				'default_value'      => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 1,
						'min'   => 0,
						'max'   => 20,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'               => 'Dimension',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-active-item-border-width',
							'value_path' => array( 'active_item', 'border', 'width' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array(
							'active_type',
						),
						'operator'   => 'NOT',
						'value'      => 'text',
					),
				),
			),
			'active_item_border_radius' => array(
				'value_path'         => array( 'active_item', 'border_radius' ),
				'title'              => array(
					'text' => __( 'Border radius', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'      => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 0,
						'min'   => 0,
						'max'   => 50,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'               => 'Dimension',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-active-item-border-radius',
							'value_path' => array( 'active_item', 'border_radius' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array(
							'active_type',
						),
						'value'      => 'button',
					),
				),
			),
			'item_spacing'              => array(
				'value_path'     => array( 'item_spacing' ),
				'title'          => array(
					'text'         => __( 'Menu item spacing', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 40,
						'min'   => 0,
						'max'   => 100,
					),
					'tablet'  => array(
						'unit'  => 'px',
						'value' => 10,
						'min'   => 0,
						'max'   => 100,
					),
					'mobile'  => array(
						'unit'  => 'px',
						'value' => 10,
						'min'   => 0,
						'max'   => 100,
					),
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-item-spacing',
							'value_path' => array( 'item_spacing' ),
						),
					),
				),
			),
			'canvas_title'              => array(
				'title'         => array(
					'text'         => __( 'Canvas submenu', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'reset_paths'   => array(
					array( 'canvas' ),
				),
				'type'          => 'CanvasTitle',
				'default_value' => array(),
			),
			'canvas_typography'         => array(
				'title'          => array(
					'text' => __( 'Typography', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'canvas', 'typography' ),
				'default_value'  => TypographyService::get_default_typography_value(
					array(
						'font_size' => array(
							'desktop' => array(
								'value' => 16,
							),
						),
					)
				),
				'type'           => 'Typography',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--brandy-canvas-typography',
							'value_path' => array( 'canvas', 'typography' ),
						),
					),
				),
			),
			'canvas_text_color'         => array(
				'value_path'     => array( 'canvas', 'text_color' ),
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'active' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-canvas-text-color',
							'value_path' => array( 'canvas', 'text_color' ),
						),
					),
				),
			),
			'canvas_item_background'    => array(
				'value_path'     => array( 'canvas', 'item_background' ),
				'title'          => array(
					'text' => __( 'Item background', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'  => array(
					'normal' => array(
						'desktop' => '#ffffff',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => '#ffffff',
						'tablet'  => null,
						'mobile'  => null,
					),
					'active' => array(
						'desktop' => '#ffffff',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-canvas-item-background',
							'value_path' => array( 'canvas', 'item_background' ),
						),
					),
				),
			),
			'canvas_background'         => array(
				'value_path'     => array( 'canvas', 'background' ),
				'title'          => array(
					'text' => __( 'Canvas background', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'  => array(
					'normal' => array(
						'desktop' => '#ffffff',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-canvas-background',
							'value_path' => array( 'canvas', 'background' ),
						),
					),
				),
			),
			'canvas_width'              => array(
				'value_path'     => array( 'canvas', 'width' ),
				'title'          => array(
					'text' => __( 'Canvas min width', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 50,
						'max'   => 300,
						'value' => 200,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-canvas-width',
							'value_path' => array( 'canvas', 'width' ),
						),
					),
				),
			),
			'canvas_box_shadow'         => array(
				'title'          => array(
					'text' => __( 'Shadow', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'BoxShadow',
				'default_value'  => array(
					'desktop' => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(215, 216, 222, 0.50)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'canvas', 'box_shadow' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'box_shadow',
							'name'       => '--brandy-canvas-box-shadow',
							'value_path' => array( 'canvas', 'box_shadow' ),
						),
					),
				),
			),
			'canvas_divider_width'      => array(
				'value_path'     => array( 'canvas', 'divider', 'width' ),
				'title'          => array(
					'text' => __( 'Divider width', 'brandy' ),
					'type' => 'normal',
				),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 10,
						'value' => 0,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-canvas-divider-width',
							'value_path' => array( 'canvas', 'divider', 'width' ),
						),
					),
				),
			),
			'canvas_divider_color'      => array(
				'value_path'     => array( 'canvas', 'divider', 'color' ),
				'title'          => array(
					'text' => __( 'Divider color', 'brandy' ),
					'type' => 'normal',
				),
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-canvas-divider-color',
							'value_path' => array( 'canvas', 'divider', 'color' ),
						),
					),
				),
			),
			// 'canvas_content_alignment'  => array(
			// 	'title'          => array(
			// 		'text' => __( 'Content alignment', 'brandy' ),
			// 		'type' => 'normal',
			// 	),
			// 	'value_path'     => array( 'canvas', 'content_alignment' ),
			// 	'default_value'  => 'left',
			// 	'type'           => 'Alignment',
			// 	'render_options' => array(
			// 		'type' => 'data_attribute',
			// 		'data' => array(
			// 			array(
			// 				'selector'   => '.brandy-element-wrapper',
			// 				'name'       => 'canvas-content-alignment',
			// 				'value_path' => array( 'canvas', 'content_alignment' ),
			// 			),
			// 		),
			// 	),
			// ),
			'canvas_item_spacing'       => array(
				'value_path'     => array( 'canvas', 'item_spacing' ),
				'title'          => array(
					'text' => __( 'Item spacing', 'brandy' ),
					'type' => 'normal',
				),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'unit'  => 'px',
					'min'   => 0,
					'max'   => 100,
					'value' => 16,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-canvas-item-spacing',
							'value_path' => array( 'canvas', 'item_spacing' ),
						),
					),
				),
			),
			'canvas_item_padding'       => array(
				'title'          => array(
					'text' => __( 'Item padding', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'canvas', 'item_padding' ),
				'type'           => 'Spacing',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'px',
						'top'            => 0,
						'right'          => 0,
						'bottom'         => 4,
						'left'           => 0,
						'is_constraints' => false,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-canvas-item-padding',
							'value_path' => array( 'canvas', 'item_padding' ),
						),
					),
				),
			),
			'canvas_padding'            => array(
				'title'          => array(
					'text' => __( 'Canvas padding', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'padding' ),
				'type'           => 'Spacing',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'px',
						'top'            => 16,
						'right'          => 16,
						'bottom'         => 16,
						'left'           => 16,
						'is_constraints' => false,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-canvas-padding',
							'value_path' => array( 'padding' ),
						),
					),
				),
			),
			'canvas_offset_top'         => array(
				'value_path'     => array( 'canvas', 'offset_top' ),
				'title'          => array(
					'text' => __( 'Offset top', 'brandy' ),
					'type' => 'normal',
				),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'unit'  => 'px',
					'min'   => -200,
					'max'   => 200,
					'value' => 8,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-canvas-offset-top',
							'value_path' => array( 'canvas', 'offset_top' ),
						),
					),
				),
			),
		);
	}

	public function register_element( $elements = array() ) {
		$elements[ $this->element_id ] = array(
			'id'       => $this->element_id,
			'title'    => $this->title,
			'settings' => $this->get_settings(),
			'builders' => $this->builders,
			'icon'     => '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 15.0003C6.5 10.3057 10.3057 6.5 15.0003 6.5C19.6949 6.5 23.5006 10.3057 23.5006 15.0003C23.5006 19.6949 19.6949 23.5006 15.0003 23.5006C10.3057 23.5006 6.5 19.6949 6.5 15.0003ZM15.0003 5C9.47728 5 5 9.47728 5 15.0003C5 20.5233 9.47728 25.0006 15.0003 25.0006C20.5233 25.0006 25.0006 20.5233 25.0006 15.0003C25.0006 9.47728 20.5233 5 15.0003 5ZM20.1558 9.84496C20.39 10.0792 20.4428 10.4393 20.2858 10.7309L17.0482 16.7436C16.9786 16.8728 16.8727 16.9788 16.7434 17.0483L10.7307 20.2859C10.4391 20.443 10.079 20.3901 9.84484 20.1559C9.61064 19.9217 9.55779 19.5616 9.71482 19.27L12.9402 13.28C12.9756 13.2085 13.023 13.1415 13.0825 13.082C13.1435 13.0209 13.2125 12.9726 13.2861 12.937L19.2699 9.71494C19.5615 9.55792 19.9216 9.61077 20.1558 9.84496ZM12.2208 17.78L13.7954 14.8556L15.1451 16.2053L12.2208 17.78ZM17.7799 12.2209L16.2056 15.1445L14.8563 13.7951L17.7799 12.2209Z" fill="' . BRANDY_ICON_COLOR_NORMAL . '"/>
			</svg>
			',
		);
		return $elements;
	}

	public function add_layout( $layouts = array() ) {
		$layout = array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array(
							'menu_name',
						),
					),
					array(
						'components'         => array(
							'active_type',
						),
						'visible_conditions' => array(
							'relation' => 'AND',
							array(
								'devices' => array( 'desktop' ),
							),
							array(
								'in_toggle' => false,
							),
						),
					),
					array(
						'components' => array(
							'css_classes',
						),
					),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array(
							'menu_item_reset',
							'menu_text_typography',
							'menu_text_color',
							'menu_item_padding',
						),
					),
					array(
						'components' => array(
							'item_active_reset',
							'active_item_typography',
							'active_item_text_color',
							'active_item_background',
							'active_item_border_color',
							'active_item_border_width',
							'active_item_border_radius',
						),
					),
					array(
						'components' => array( 'item_spacing' ),
					),
					array(
						'components'         => array(
							'canvas_title',
							'canvas_typography',
							'canvas_text_color',
							'canvas_item_background',
							'canvas_background',
							'canvas_divider_color',
							'canvas_divider_width',
							// 'canvas_content_alignment',
							'canvas_item_spacing',
							'canvas_item_padding',
							'canvas_width',
							'canvas_padding',
							'canvas_offset_top',
							'canvas_box_shadow',
							// 'canvas_margin',
						),
						'visible_conditions' => array(
							'relation' => 'AND',
							array(
								'devices' => array( 'desktop' ),
							),
							array(
								'in_toggle' => false,
							),
						),
					),
				),
			),
		);
		$mapped_layout                = $this->map_layout( $layout );
		$layouts[ $this->element_id ] = $mapped_layout;
		return $layouts;
	}

	public function add_localize_data( $localize_data ) {
		if ( ! isset( $localize_data['wp_nav_menus'] ) ) {
			$localize_data['wp_nav_menus'] = array_merge(
				array(
					array(
						'name' => __( 'Default', 'brandy' ),
						'slug' => 'default',
					),
				),
				get_terms( 'nav_menu', array( 'hide_empty' => true ) )
			);
		}
		return $localize_data;
	}
}
