<?php

namespace Brandy\Customizer\Elements;

use Brandy\Abstracts\AbstractBaseElement;
use Brandy\Core\Services\TypographyService;

class BaseListLink extends AbstractBaseElement {

	/**
	 * Builders that element belong to
	 *
	 * @var string
	 */
	protected $builders = array( 'header', 'footer' );

	public function template_path() {
		return 'template-parts/builder/elements/list_link';
	}

	/**
	 * Element icon
	 *
	 * @var string
	 */
	protected $icon = '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M21 19L25 15L21 11M9 11L5 15L9 19M17.5 7L12.5 23" stroke="' . BRANDY_ICON_COLOR_NORMAL . '" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
	';

	/**
	 * Register Element settings components
	 *
	 * @return array
	 */
	protected function register_components() {
		return array(
			'items'             => array(
				'type'          => 'ListLink',
				'value_path'    => array( 'items' ),
				'default_value' => array(
					array(
						'label' => 'About us',
						'url'   => '#',
					),
					array(
						'label' => 'Contact',
						'url'   => '#',
					),
					array(
						'label' => 'Tracking',
						'url'   => '#',
					),
				),
			),
			'label'             => array(
				'title'          => array(
					'text' => __( 'Label', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'TextInput',
				'value_path'     => array( 'label' ),
				'default_value'  => '',
				'render_options' => array(
					'type' => 'content',
					'data' => array(
						array(
							'selector'   => '.brandy-list-link__label .brandy-list-link__text',
							'value_path' => array( 'label' ),
						),
					),
				),
			),
			'items_direction'   => array(
				'title'          => array(
					'text'         => __( 'Items direction', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'value_path'     => array( 'items_direction' ),
				'type'           => 'ButtonGroup',
				'options'        => array(
					array(
						'label' => 'Horizontal',
						'value' => 'horizontal',
					),
					array(
						'label' => 'Vertical',
						'value' => 'vertical',
					),
				),
				'default_value'  => array(
					'desktop' => 'horizontal',
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-list-link__items',
							'name'       => 'data-direction-desktop',
							'value_path' => array( 'items_direction', 'desktop' ),
						),
						array(
							'selector'   => '.brandy-list-link__items',
							'name'       => 'data-direction-tablet',
							'value_path' => array( 'items_direction', 'tablet' ),
						),
						array(
							'selector'   => '.brandy-list-link__items',
							'name'       => 'data-direction-mobile',
							'value_path' => array( 'items_direction', 'mobile' ),
						),
					),
				),
			),
			'items_alignment'   => array(
				'title'          => array(
					'text' => __( 'Items alignment', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'items_alignment' ),
				'type'           => 'Alignment',
				'default_value'  => array(
					'desktop' => 'left',
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-list-link__items',
							'name'       => 'data-alignment-desktop',
							'value_path' => array( 'items_alignment', 'desktop' ),
						),
						array(
							'selector'   => '.brandy-list-link__items',
							'name'       => 'data-alignment-tablet',
							'value_path' => array( 'items_alignment', 'tablet' ),
						),
						array(
							'selector'   => '.brandy-list-link__items',
							'name'       => 'data-alignment-mobile',
							'value_path' => array( 'items_alignment', 'mobile' ),
						),
					),
				),
			),
			'items_collapsible' => array(
				'title'              => array(
					'text'         => __( 'Items collapsible', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'description'        => __( 'Toggle to collapse link items when clicking on label', 'brandy' ),
				'value_path'         => array( 'items_collapsible' ),
				'type'               => 'Switcher',
				'default_value'      => array(
					'desktop' => false,
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options'     => array(
					'type' => 'force_refresh',
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'element_direction' ),
						'value'      => 'vertical',
					),
				),
			),
			'element_direction' => array(
				'title'          => array(
					'text' => __( 'Element direction', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'     => array( 'element_direction' ),
				'type'           => 'ButtonGroup',
				'options'        => array(
					array(
						'label' => 'Horizontal',
						'value' => 'horizontal',
					),
					array(
						'label' => 'Vertical',
						'value' => 'vertical',
					),
				),
				'default_value'  => 'vertical',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-element-wrapper',
							'name'       => 'data-direction',
							'value_path' => array( 'element_direction' ),
						),
					),
				),
			),
			'label_reset'       => array(
				'title'       => array(
					'text'         => __( 'Label', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'label_style' ),
				),
			),
			'label_typography'  => array(
				'title'          => array(
					'text' => __( 'Typography', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'label_style', 'typography' ),
				'type'           => 'Typography',
				'default_value'  => TypographyService::get_default_typography_value(
					array(
						'font_size' => array(
							'desktop' => array( 'value' => 22 ),
						),
					)
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--element-list-link-label-typography',
							'value_path' => array( 'label_style', 'typography' ),
						),
					),
				),
			),
			'label_color'       => array(
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'label_style', 'text_color' ),
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--element-list-link-label-color',
							'value_path' => array( 'label_style', 'text_color' ),
						),
					),
				),
			),
			'item_reset'        => array(
				'title'       => array(
					'text'         => __( 'Link Item', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'item_style' ),
				),
			),
			'item_typography'   => array(
				'title'          => array(
					'text' => __( 'Typography', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'item_style', 'typography' ),
				'type'           => 'Typography',
				'default_value'  => TypographyService::get_default_typography_value(
					array(
						'line_height' => array(
							'desktop' => array( 'value' => 19 ),
						),
					)
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--element-list-link-item-typography',
							'value_path' => array( 'item_style', 'typography' ),
						),
					),
				),
			),
			'item_link_color'   => array(
				'title'          => array(
					'text' => __( 'Link color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'item_style', 'text_color' ),
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
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--element-list-link-link-color',
							'value_path' => array( 'item_style', 'text_color' ),
						),
					),
				),
			),
			'item_spacing'      => array(
				'title'          => array(
					'text'         => __( 'Item spacing', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'value_path'     => array( 'item_spacing' ),
				'type'           => 'Dimension',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 100,
						'value' => 15,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--element-list-link-item-spacing',
							'value_path' => array( 'item_spacing' ),
						),
					),
				),
			),
			'element_spacing'   => array(
				'title'          => array(
					'text'         => __( 'Label spacing', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'value_path'     => array( 'element_spacing' ),
				'type'           => 'Dimension',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 100,
						'value' => 10,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--element-list-link-element-spacing',
							'value_path' => array( 'element_spacing' ),
						),
					),
				),
			),
			'padding'           => array(
				'title'          => array(
					'text'         => __( 'Padding', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'value_path'     => array( 'padding' ),
				'type'           => 'Spacing',
				'units'          => array( 'px', '%' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'px',
						'top'            => 0,
						'right'          => 0,
						'bottom'         => 0,
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
							'name'       => '--element-list-link-padding',
							'value_path' => array( 'padding' ),
						),
					),
				),
			),
			'margin'            => array(
				'title'          => array(
					'text'         => __( 'Margin', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'value_path'     => array( 'margin' ),
				'type'           => 'Spacing',
				'units'          => array( 'px', '%' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'px',
						'top'            => 0,
						'right'          => 0,
						'bottom'         => 0,
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
							'name'       => '--element-list-link-margin',
							'value_path' => array( 'margin' ),
						),
					),
				),
			),
		);
	}

	/**
	 * Register element settings layout
	 *
	 * @param array General layouts
	 *
	 * @return array
	 */
	public function add_layout( $layouts = array() ) {
		$layout                       = array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array( 'items' ),
					),
					array(
						'components' => array( 'label' ),
					),
					array(
						'components' => array( 'items_direction', 'items_alignment' ),
					),
					array(
						'components' => array( 'element_direction' ),
					),
					array(
						'components' => array( 'items_collapsible' ),
					),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array( 'label_reset', 'label_typography', 'label_color' ),
					),
					array(
						'components' => array( 'item_reset', 'item_typography', 'item_link_color' ),
					),
					array(
						'components' => array( 'item_spacing' ),
					),
					array(
						'components' => array( 'element_spacing' ),
					),
					array(
						'components' => array( 'padding' ),
					),
					array(
						'components' => array( 'margin' ),
					),
				),
			),
		);
		$mapped_layout                = $this->map_layout( $layout );
		$layouts[ $this->element_id ] = $mapped_layout;
		return $layouts;
	}

}
