<?php

namespace Brandy\Customizer\Layouts;

use Brandy\Abstracts\AbstractLayout;
use Brandy\Builder\Header\ToggleOffCanvasBuilder;
use Brandy\Customizer\Elements\ElementsLoader;
use Brandy\Traits\SingletonTrait;

class ToggleOffCanvasSettings extends AbstractLayout {

	use SingletonTrait;

	protected $components = array();

	protected $section_id = 'toggle_off_canvas';

	protected function __construct() {
		add_filter( 'brandy_default_settings', array( $this, 'add_settings' ) );
		parent::__construct();
	}

	public function add_settings( $settings = array() ) {
		$settings[ $this->section_id ] = array(
			'id'       => $this->section_id,
			'title'    => __( 'Toggle off canvas', 'brandy' ),
			'settings' => $this->get_settings(),
		);
		return $settings;
	}

	public function add_layout( $layouts = array() ) {
		$layout = array(
			'general' => array(
				'sections' => array(
					array(
						'components'         => array(
							'canvas_type',
						),
						'visible_conditions' => array(
							array(
								'devices' => array( 'desktop' ),
							),
						),
					),
					array(
						'visible_conditions' => array(
							'relation' => 'AND',
							array(
								'value_path' => array( 'canvas_type' ),
								'value'      => 'default',
								'operator'   => 'NOT',
							),
							array(
								'devices' => array( 'desktop' ),
							),
						),
						'components'         => array(
							'popup_width',
						),
					),
					array(
						'components' => array(
							'horizontal_alignment',
						),
					),
					array(
						'components' => array(
							'align_bottom_from',
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
							'panel_reset',
							'panel_text_color',
							'panel_background',
							'panel_backdrop_color',

						),
					),
					array(
						'components' => array(
							'close_button_reset',
							'close_button_icon_color',
							'close_button_background_color',
							'close_button_stroke_color',
							'close_button_stroke_width',
							'close_button_border_radius',
							'close_button_size',
						),
					),
					array(
						'components' => array( 'padding' ),
					),
				),
			),
		);
		$mapped_layout                = $this->map_layout( $layout );
		$layouts[ $this->section_id ] = $mapped_layout;
		return $layouts;
	}

	protected function register_components() {
		return array(
			'canvas_type'                   => array(
				'title'          => array(
					'text' => __( 'Canvas type', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'ToggleOffCanvasType',
				'default_value'  => 'left_panel',
				'value_path'     => array( 'canvas_type' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'popup_width'                   => array(
				'title'          => array(
					'text' => __( 'Popup width', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'Dimension',
				'default_value'  => array(
					'unit'  => 'px',
					'value' => 300,
					'min'   => 100,
					'max'   => 1000,
				),
				'value_path'     => array( 'popup_width' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-toc-popup-width',
							'value_path' => array( 'popup_width' ),
						),
					),
				),
			),
			'horizontal_alignment'          => array(
				'title'          => array(
					'text'         => __( 'Content horizontal alignment', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'           => 'Alignment',
				'default_value'  => array(
					'desktop' => 'left',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'horizontal_alignment' ),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '',
							'name'       => 'horizontal-alignment-desktop',
							'value_path' => array( 'horizontal_alignment', 'desktop' ),
						),
						array(
							'selector'   => '',
							'name'       => 'horizontal-alignment-tablet',
							'value_path' => array( 'horizontal_alignment', 'tablet' ),
						),
						array(
							'selector'   => '',
							'name'       => 'horizontal-alignment-mobile',
							'value_path' => array( 'horizontal_alignment', 'mobile' ),
						),
					),
				),
			),
			'align_bottom_from'             => array(
				'title'          => array(
					'text'         => __( 'Align selected element & the below in bottom', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'           => 'ToggleOffCanvasAlignBottomFrom',
				'default_value'  => array(
					'desktop' => 'none',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'align_bottom_from' ),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '',
							'name'       => 'align-bottom-from-desktop',
							'value_path' => array( 'align_bottom_from', 'desktop' ),
						),
						array(
							'selector'   => '',
							'name'       => 'align-bottom-from-tablet',
							'value_path' => array( 'align_bottom_from', 'tablet' ),
						),
						array(
							'selector'   => '',
							'name'       => 'align-bottom-from-mobile',
							'value_path' => array( 'align_bottom_from', 'mobile' ),
						),
					),
				),
			),
			'css_classes'                   => array(
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
			'panel_reset'                   => array(
				'title'        => array(
					'text' => __( 'Panel', 'brandy' ),
					'type' => 'bold',
				),
				'type'         => 'Reset',
				'reset_action' => 'row_settings',
				'reset_paths'  => array(
					array(
						'panel',
					),
				),
			),
			'panel_text_color'              => array(
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'panel', 'text_color' ),
				'default_value'  => array(
					'normal' => '#000',
					'hover'  => '#000',
					'active' => '#000',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-toc-text-color',
							'value_path' => array( 'panel', 'text_color' ),
						),
					),
				),
			),
			'panel_background'              => array(
				'title'          => array(
					'text' => __( 'Background', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'panel', 'background' ),
				'default_value'  => array(
					'normal' => '#fff',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-toc-background',
							'value_path' => array( 'panel', 'background' ),
						),
					),
				),
			),
			'panel_backdrop_color'          => array(
				'title'          => array(
					'text' => __( 'Backdrop color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'panel', 'backdrop_color' ),
				'default_value'  => array(
					'normal' => '#d1ccccc2',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-toc-backdrop-color',
							'value_path' => array( 'panel', 'backdrop_color' ),
						),
					),
				),
			),
			'close_button_reset'            => array(
				'title'        => array(
					'text' => __( 'Close button', 'brandy' ),
					'type' => 'bold',
				),
				'type'         => 'Reset',
				'reset_action' => 'row_settings',
				'reset_paths'  => array(
					array(
						'close_button',
					),
				),
			),
			'close_button_icon_color'       => array(
				'title'          => array(
					'text' => __( 'Icon color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'close_button', 'icon_color' ),
				'default_value'  => array(
					'normal' => '#000',
					'hover'  => '#000',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-toc-close-icon-color',
							'value_path' => array( 'close_button', 'icon_color' ),
						),
					),
				),
			),
			'close_button_background_color' => array(
				'title'          => array(
					'text' => __( 'Background color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'close_button', 'background_color' ),
				'default_value'  => array(
					'normal' => '#fff',
					'hover'  => '#fff',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-toc-close-background',
							'value_path' => array( 'close_button', 'background_color' ),
						),
					),
				),
			),
			'close_button_stroke_color'     => array(
				'title'          => array(
					'text' => __( 'Stroke color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'value_path'     => array( 'close_button', 'stroke', 'color' ),
				'default_value'  => array(
					'normal' => '#000',
					'hover'  => '#000',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-toc-close-stroke-color',
							'value_path' => array( 'close_button', 'stroke', 'color' ),
						),
					),
				),
			),
			'close_button_stroke_width'     => array(
				'title'          => array(
					'text' => __( 'Stroke width', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'value_path'     => array( 'close_button', 'stroke', 'width' ),
				'default_value'  => array(
					'unit'  => 'px',
					'value' => 0,
					'min'   => 0,
					'max'   => 10,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-toc-close-stroke-width',
							'value_path' => array( 'close_button', 'stroke', 'width' ),
						),
					),
				),
			),
			'close_button_border_radius'    => array(
				'title'          => array(
					'text' => __( 'Border radius', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'value_path'     => array( 'close_button', 'border_radius' ),
				'default_value'  => array(
					'unit'  => 'px',
					'value' => 3,
					'min'   => 0,
					'max'   => 50,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-toc-close-border-radius',
							'value_path' => array( 'close_button', 'border_radius' ),
						),
					),
				),
			),
			'close_button_size'             => array(
				'title'          => array(
					'text' => __( 'Icon size', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'value_path'     => array( 'close_button', 'size' ),
				'default_value'  => ElementsLoader::get_default_icon_size(
					array(
						'min'   => 20,
						'value' => 22,
					)
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-toc-close-size',
							'value_path' => array( 'close_button', 'size' ),
						),
					),
				),
			),
			'padding'                       => array(
				'value_path'     => array( 'padding' ),
				'title'          => array(
					'text' => 'Padding',
					'type' => 'bold',
				),
				'default_value'  => array(
					'unit'           => 'px',
					'top'            => 20,
					'right'          => 20,
					'bottom'         => 20,
					'left'           => 20,
					'is_constraints' => false,
				),
				'type'           => 'Spacing',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-toc-padding',
							'value_path' => array( 'padding' ),
						),
					),
				),
			),
		);
	}

	public function add_partial_refresh( $partials = array() ) {
		$partials[] = array(
			'configuration_type' => 'control',
			'id'                 => $this->section_id,
			'partial'            => array(
				'selector'            => '#toggle-off-canvas',
				'render_callback'     => array( ToggleOffCanvasBuilder::get_instance(), 'render_toggle_off_canvas' ),
				'container_inclusive' => true,
				'fallback_refresh'    => false,
			),
			'default'            => '',
			'transport'          => 'postMessage',
		);
		return $partials;
	}
}
