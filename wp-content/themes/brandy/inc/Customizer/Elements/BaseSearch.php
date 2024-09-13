<?php

namespace Brandy\Customizer\Elements;

use Brandy\Abstracts\AbstractBaseElement;
use Brandy\Core\Services\TypographyService;

class BaseSearch extends AbstractBaseElement {

	protected $element_id = 'search';

	protected $builders = array( 'header', 'footer' );

	public static $path_to_icons = BRANDY_TEMPLATE_DIR . '/template-parts/icons/search/';

	protected function __construct() {
		add_filter( 'brandy_extra_localize', array( $this, 'add_localize_data' ) );

		parent::__construct();
	}

	public function template_path() {
		return 'template-parts/builder/elements/search';
	}

	protected function register_components() {
		return array(
			'search_type'                    => array(
				'title'          => array(
					'text' => __( 'Search type', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'ButtonGroup',
				'value_path'     => array( 'type' ),
				'default_value'  => 'box',
				'options'        => array(
					array(
						'label' => __( 'Box', 'brandy' ),
						'value' => 'box',
					),
					array(
						'label' => __( 'Line', 'brandy' ),
						'value' => 'line',
					),
					array(
						'label' => __( 'Icon', 'brandy' ),
						'value' => 'icon',
					),
				),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'placeholder'                    => array(
				'title'          => array(
					'text' => __( 'Placeholder text', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'TextInput',
				'value_path'     => array( 'placeholder' ),
				'default_value'  => 'Search',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-search-box__input',
							'name'       => 'placeholder',
							'value_path' => array( 'placeholder' ),
						),
					),
				),
			),
			'select_icon'                    => array(
				'title'          => array(
					'text' => __( 'Select icon', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'SearchIconSelection',
				'value_path'     => array( 'icon' ),
				'default_value'  => 'icon_1',
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'icon_position'                  => array(
				'title'               => array(
					'text' => __( 'Icon position', 'brandy' ),
					'type' => 'bold',
				),
				'type'                => 'Position',
				'value_path'          => array( 'icon_position' ),
				'default_value'       => 'left',
				'available_positions' => array( 'left', 'right' ),
				'render_options'      => array(
					'type' => 'force_refresh',
				),
			),
			'search_criteria'                => array(
				'title'          => array(
					'text' => __( 'Search through criteria', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'ButtonGroup',
				'value_path'     => array( 'search_criteria' ),
				'default_value'  => 'product',
				'options'        => array(
					array(
						'label' => __( 'Products', 'brandy' ),
						'value' => 'product',
					),
					array(
						'label' => __( 'Pages', 'brandy' ),
						'value' => 'page',
					),
					array(
						'label' => __( 'Posts', 'brandy' ),
						'value' => 'post',
					),
				),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-search-box',
							'name'       => 'search-criteria',
							'value_path' => array( 'search_criteria' ),
						),
					),
				),
			),
			'live_results_enabled'           => array(
				'title'          => array(
					'text' => __( 'Live results', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'Switcher',
				'default_value'  => true,
				'value_path'     => array( 'live_results', 'enabled' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'live_results_type'              => array(
				'type'               => 'LiveResultsType',
				'default_value'      => 'type_1',
				'value_path'         => array( 'live_results', 'type' ),
				'render_options'     => array(
					'type' => 'force_refresh',
				),
				'options'            => array(
					array(
						'label' => __( 'Panel sidebar - list product view', 'brandy' ),
						'value' => 'type_1',
					),
					array(
						'label' => __( 'Panel sidebar - grid product view', 'brandy' ),
						'value' => 'type_2',
					),
					array(
						'label' => __( 'Panel Full-screen - grid product view', 'brandy' ),
						'value' => 'type_3',
					),
					array(
						'label' => __( 'Panel dropdown - list product view', 'brandy' ),
						'value' => 'type_4',
					),
					array(
						'label' => __( 'Panel dropdown - grid product view', 'brandy' ),
						'value' => 'type_5',
					),
					array(
						'label' => __( 'Panel dropdown - grid product view', 'brandy' ),
						'value' => 'type_6',
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'live_results', 'enabled' ),
						'value'      => true,
					),
				),
			),
			'live_results_image'             => array(
				'title'          => array(
					'text' => __( 'Live results image', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'Switcher',
				'default_value'  => true,
				'value_path'     => array( 'live_results', 'show_image' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'live_results_product_price'     => array(
				'title'          => array(
					'text' => __( 'Show product price in result', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'Switcher',
				'default_value'  => true,
				'value_path'     => array( 'live_results', 'show_product_price' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'live_results_view_more'         => array(
				'title'          => array(
					'text' => __( 'Show view more button', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'Switcher',
				'default_value'  => true,
				'value_path'     => array( 'live_results', 'can_view_more' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'show_keyword_suggestions'       => array(
				'title'          => array(
					'text' => __( 'Show keyword suggestions', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'Switcher',
				'default_value'  => true,
				'value_path'     => array( 'live_results', 'show_suggestions' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'suggestions'                    => array(
				'type'               => 'SearchSuggestions',
				'default_value'      => array( 'Polo', 'T-shirt', 'Cap' ),
				'value_path'         => array( 'live_results', 'suggestions' ),
				'render_options'     => array(
					'type' => 'force_refresh',
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'live_results', 'show_suggestions' ),
						'value'      => true,
					),
				),
			),
			'search_icon_reset'              => array(
				'title'       => array(
					'text'         => __( 'Search icon', 'brandy' ),
					'show_devices' => true,
					'type'         => 'bold',
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'search_icon' ),
				),
			),
			'search_icon_color'              => array(
				'title'          => array(
					'text' => __( 'Icon color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-secondary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-secondary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'active' => array(
						'desktop' => 'var(--wp--preset--color--brandy-secondary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'value_path'     => array( 'search_icon', 'icon_color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-icon-color',
							'value_path' => array( 'search_icon', 'icon_color' ),
						),
					),
				),
			),
			'search_icon_background_color'   => array(
				'title'          => array(
					'text' => __( 'Background color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => array(
						'desktop' => '#ffffff00',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => '#ffffff00',
						'tablet'  => null,
						'mobile'  => null,
					),
					'active' => array(
						'desktop' => '#ffffff00',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'value_path'     => array( 'search_icon', 'background_color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-icon-background-color',
							'value_path' => array( 'search_icon', 'background_color' ),
						),
					),
				),
			),
			'search_icon_stroke_color'       => array(
				'title'          => array(
					'text' => __( 'Stroke color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
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
				'value_path'     => array( 'search_icon', 'stroke', 'color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-icon-stroke-color',
							'value_path' => array( 'search_icon', 'stroke', 'color' ),
						),
					),
				),
			),
			'search_icon_stroke_width'       => array(
				'title'          => array(
					'text' => __( 'Stroke width', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 0,
						'min'   => 0,
						'max'   => 20,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_icon', 'stroke', 'width' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-icon-stroke-width',
							'value_path' => array( 'search_icon', 'stroke', 'width' ),
						),
					),
				),
			),
			'search_icon_border_radius'      => array(
				'title'          => array(
					'text' => __( 'Border radius', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'units'          => array( 'px', '%' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 0,
						'min'   => 0,
						'max'   => 50,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_icon', 'border_radius' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-icon-border-radius',
							'value_path' => array( 'search_icon', 'border_radius' ),
						),
					),
				),
			),
			'search_icon_size'               => array(
				'title'          => array(
					'text' => __( 'Icon size', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => ElementsLoader::get_default_icon_size(),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_icon', 'size' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-icon-size',
							'value_path' => array( 'search_icon', 'size' ),
						),
					),
				),
			),
			'search_text_reset'              => array(
				'title'       => array(
					'text'         => __( 'Search text', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'search_text' ),
				),
			),
			'search_text_color'              => array(
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'value_path'     => array( 'search_text', 'color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-search-text-color',
							'value_path' => array( 'search_text', 'color' ),
						),
					),
				),
			),
			'search_text_typography'         => array(
				'title'          => array(
					'text' => __( 'Typography', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Typography',
				'default_value'  => TypographyService::get_default_typography_value(),
				'value_path'     => array( 'search_text', 'typography' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--brandy-search-text-typography',
							'value_path' => array( 'search_text', 'typography' ),
						),
					),
				),
			),
			'search_box_reset'               => array(
				'title'       => array(
					'text'         => __( 'Search box', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'search_box' ),
				),
			),
			'search_box_background_color'    => array(
				'title'          => array(
					'text' => __( 'Background color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
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
				),
				'value_path'     => array( 'search_box', 'background_color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-search-box-background-color',
							'value_path' => array( 'search_box', 'background_color' ),
						),
					),
				),
			),
			'search_box_stroke_color'        => array(
				'title'          => array(
					'text' => __( 'Stroke color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => array(
						'desktop' => '#E3E8EE',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => '#135e96',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'value_path'     => array( 'search_box', 'stroke_color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-search-box-stroke-color',
							'value_path' => array( 'search_box', 'stroke_color' ),
						),
					),
				),
			),
			'search_box_stroke_width'        => array(
				'title'          => array(
					'text' => __( 'Stroke width', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 1,
						'min'   => 0,
						'max'   => 30,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_box', 'stroke', 'width' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-search-box-stroke-width',
							'value_path' => array( 'search_box', 'stroke', 'width' ),
						),
					),
				),
			),
			'search_box_border_radius'       => array(
				'title'          => array(
					'text' => __( 'Border radius', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'units'          => array( 'px', '%' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 7,
						'min'   => 0,
						'max'   => 50,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_box', 'border_radius' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-search-box-border-radius',
							'value_path' => array( 'search_box', 'border_radius' ),
						),
					),
				),
			),
			'search_box_input_height'        => array(
				'title'          => array(
					'text' => __( 'Input height', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 10,
						'min'   => 10,
						'max'   => 200,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_box', 'input_height' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-search-box-input-height',
							'value_path' => array( 'search_box', 'input_height' ),
						),
					),
				),
			),
			'search_box_input_width'         => array(
				'title'          => array(
					'text' => __( 'Input width', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 300,
						'min'   => 20,
						'max'   => 500,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_box', 'input_width' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-search-box-input-width',
							'value_path' => array( 'search_box', 'input_width' ),
						),
					),
				),
			),
			'searchbox_padding'              => array(
				'value_path'     => array( 'search_box', 'padding' ),
				'type'           => 'Spacing',
				'title'          => array(
					'text'         => __( 'Input padding', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'rem',
						'top'            => 0.75,
						'right'          => 1.25,
						'bottom'         => 0.75,
						'left'           => 1.25,
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
							'name'       => '--brandy-searchbox-padding',
							'value_path' => array( 'search_box', 'padding' ),
						),
					),
				),
			),
			'search_box_clear_icon_color'    => array(
				'title'          => array(
					'text' => __( 'Clear icon color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
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
				'value_path'     => array( 'search_box', 'clear_icon', 'color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-search-box-clear-icon-color',
							'value_path' => array( 'search_box', 'clear_icon', 'color' ),
						),
					),
				),
			),
			'search_box_clear_icon_size'     => array(
				'title'          => array(
					'text' => __( 'Clear icon size', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'default_value'  => array(
					'desktop' => ElementsLoader::get_default_icon_size(),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'search_box', 'clear-icon', 'size' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-icon-clear-icon-size',
							'value_path' => array( 'search_box', 'clear-icon', 'size' ),
						),
					),
				),
			),
			'panel_reset'                    => array(
				'title'       => array(
					'text' => __( 'Panel', 'brandy' ),
					'type' => 'bold',
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array(
						'panel',
					),
				),
			),
			'panel_background'               => array(
				'title'          => array(
					'text' => __( 'Background', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => '#ffffff',
				),
				'value_path'     => array( 'panel', 'background' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-panel-background',
							'value_path' => array( 'panel', 'background' ),
						),
					),
				),
			),
			'panel_backdrop'                 => array(
				'title'          => array(
					'text' => __( 'Backdrop', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => '#c3c2c2c9',
				),
				'value_path'     => array( 'panel', 'backdrop' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-backdrop-color',
							'value_path' => array( 'panel', 'backdrop' ),
						),
					),
				),
			),
			'icon_close_panel_reset'         => array(
				'title'       => array(
					'text'         => __( 'Icon close panel', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'icon_close_panel' ),
				),
			),
			'icon_close_panel_color'         => array(
				'title'          => array(
					'text' => __( 'Icon color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
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
				'value_path'     => array( 'icon_close_panel', 'color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-icon-close-panel-color',
							'value_path' => array( 'icon_close_panel', 'color' ),
						),
					),
				),
			),
			'icon_close_panel_background'    => array(
				'title'          => array(
					'text' => __( 'Background', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => array(
						'desktop' => '#ffffff00',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => '#ffffff00',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'value_path'     => array( 'icon_close_panel', 'background' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-icon-close-panel-background',
							'value_path' => array( 'icon_close_panel', 'background' ),
						),
					),
				),
			),
			'icon_close_panel_stroke_color'  => array(
				'title'          => array(
					'text' => __( 'Stroke color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
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
				),
				'value_path'     => array( 'icon_close_panel', 'stroke', 'color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-icon-close-panel-stroke-color',
							'value_path' => array( 'icon_close_panel', 'stroke', 'color' ),
						),
					),
				),
			),
			'icon_close_panel_stroke_width'  => array(
				'title'          => array(
					'text' => __( 'Stroke width', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 0,
						'min'   => 0,
						'max'   => 20,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'icon_close_panel', 'stroke', 'width' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-icon-close-panel-stroke-width',
							'value_path' => array( 'icon_close_panel', 'stroke', 'width' ),
						),
					),
				),
			),
			'icon_close_panel_border_radius' => array(
				'title'          => array(
					'text' => __( 'Border radius', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'units'          => array( 'px', '%' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 0,
						'min'   => 0,
						'max'   => 50,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'icon_close_panel', 'border_radius' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-icon-close-panel-border-radius',
							'value_path' => array( 'icon_close_panel', 'border_radius' ),
						),
					),
				),
			),
			'icon_close_panel_size'          => array(
				'title'          => array(
					'text' => __( 'Icon size', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'Dimension',
				'default_value'  => array(
					'desktop' => ElementsLoader::get_default_icon_size(
						array(
							'value' => 23,
							'min'   => 20,
						)
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'icon_close_panel', 'size' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-icon-close-panel-size',
							'value_path' => array( 'icon_close_panel', 'size' ),
						),
					),
				),
			),
			'margin'                         => array(
				'value_path'     => array( 'margin' ),
				'type'           => 'Spacing',
				'title'          => array(
					'text'         => __( 'Margin', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
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
							'name'       => '--brandy-margin',
							'value_path' => array( 'margin' ),
						),
					),
				),
			),
		);
	}

	public function register_element( $elements = array() ) {
		$elements[ $this->element_id ] = array(
			'id'       => $this->element_id,
			'title'    => __( 'Search', 'brandy' ),
			'settings' => $this->get_settings(),
			'builders' => $this->builders,
			'icon'     => ' <svg
			width="30"
			height="30"
			viewBox="0 0 30 30"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		  >
			<path
			  fillRule="evenodd"
			  clipRule="evenodd"
			  d="M7.70239 14.4921C7.70239 10.7422 10.7422 7.70239 14.4921 7.70239C18.2419 7.70239 21.2818 10.7422 21.2818 14.4921C21.2818 18.2419 18.2419 21.2818 14.4921 21.2818C10.7422 21.2818 7.70239 18.2419 7.70239 14.4921ZM14.4921 6.20239C9.91381 6.20239 6.20239 9.91381 6.20239 14.4921C6.20239 19.0703 9.91381 22.7818 14.4921 22.7818C16.5112 22.7818 18.3616 22.0599 19.7995 20.8602L23.4697 24.5303C23.7626 24.8232 24.2374 24.8232 24.5303 24.5303C24.8232 24.2374 24.8232 23.7626 24.5303 23.4697L20.8602 19.7995C22.0599 18.3616 22.7818 16.5112 22.7818 14.4921C22.7818 9.91381 19.0703 6.20239 14.4921 6.20239Z"
			  fill="' . BRANDY_ICON_COLOR_NORMAL . '"
			/>
		  </svg>',
		);
		return $elements;
	}

	public function add_layout( $layouts = array() ) {
		$layout = array(
			'general' => array(
				'sections' => array(
					array( 'components' => array( 'search_type' ) ),
					array(
						'visible_conditions' => array(
							array(
								'value_path' => array( 'type' ),
								'operator'   => 'NOT',
								'value'      => 'icon',
							),
						),
						'components'         => array( 'placeholder' ),
					),
					array( 'components' => array( 'select_icon' ) ),
					array(
						'components'         => array( 'icon_position' ),
						'visible_conditions' => array(
							array(
								'value_path' => array( 'type' ),
								'value'      => 'icon',
								'operator'   => 'NOT',
							),
						),
					),
					array( 'components' => array( 'search_criteria' ) ),
					array( 'components' => array( 'live_results_enabled', 'live_results_type' ) ),
					array(
						'components'         => array( 'live_results_image' ),
						'visible_conditions' => array(
							array(
								'value_path' => array( 'live_results', 'enabled' ),
								'value'      => true,
							),
						),
					),
					array(
						'components'         => array( 'live_results_product_price' ),
						'visible_conditions' => array(
							array(
								'value_path' => array( 'live_results', 'enabled' ),
								'value'      => true,
							),
						),
					),
					array(
						'components'         => array( 'live_results_view_more' ),
						'visible_conditions' => array(
							array(
								'value_path' => array( 'live_results', 'enabled' ),
								'value'      => true,
							),
						),
					),
					array( 'components' => array( 'show_keyword_suggestions', 'suggestions' ) ),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array(
							'search_icon_reset',
							'search_icon_color',
							'search_icon_background_color',
							'search_icon_stroke_color',
							'search_icon_stroke_width',
							'search_icon_border_radius',
							'search_icon_size',
						),
					),
					array(
						'components' => array(
							'search_text_reset',
							'search_text_color',
							'search_text_typography',
						),
					),
					array(
						'components' => array(
							'search_box_reset',
							'search_box_background_color',
							'search_box_stroke_color',
							'search_box_stroke_width',
							'search_box_border_radius',
							'search_box_input_height',
							'search_box_input_width',
							'searchbox_padding',
							// 'search_box_clear_icon_color',
							// 'search_box_clear_icon_size',
						),
					),
					array(
						'components' => array(
							'panel_reset',
							'panel_background',
							'panel_backdrop',
						),
					),
					array(
						'components' => array(
							'icon_close_panel_reset',
							'icon_close_panel_color',
							'icon_close_panel_background',
							'icon_close_panel_stroke_color',
							'icon_close_panel_stroke_width',
							'icon_close_panel_border_radius',
							'icon_close_panel_size',
						),
					),
					array(
						'components' => array(
							'margin',
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
		$icons = array();
		$dir   = new \DirectoryIterator( self::$path_to_icons );
		$dirs  = array();
		foreach ( $dir as $fileinfo ) {
			if ( ! $fileinfo->isDot() ) {
				$dirs[] = $fileinfo->getFilename();
			}
		}
		usort(
			$dirs,
			function( $a, $b ) {
				return strcmp( $a, $b );
			}
		);
		foreach ( $dirs as $file_name ) {
			$file_path = self::$path_to_icons . $file_name;
			$icon_name = basename( $file_name, '.php' );
			ob_start();
			require $file_path;
			$icon_data = ob_get_contents();
			ob_end_clean();
			$icons[ $icon_name ] = $icon_data;
		}
		$localize_data['icons']['search'] = $icons;
		return $localize_data;
	}

	public static function get_icon( $icon_type ) {
		$file_path = self::$path_to_icons . "$icon_type.php";
		if ( file_exists( $file_path ) ) {
			ob_start();
			require $file_path;
			$icon_data = ob_get_contents();
			ob_end_clean();
			return $icon_data;
		}
		return '';
	}

}
