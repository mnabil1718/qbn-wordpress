<?php

namespace Brandy\Customizer\Layouts;

use Brandy\Abstracts\AbstractLayout;
use Brandy\Builder\RowBuilder;
use Brandy\Traits\SingletonTrait;

class HeaderRowSettings extends AbstractLayout {

	use SingletonTrait;

	/**
	 * Components display in row settings
	 *
	 * @var array
	 */
	protected $components = array();

	/**
	 * Available rows
	 *
	 * @var array
	 */
	private $rows = array();

	protected function __construct() {

		$this->rows = array(
			'top'    => array(
				'title' => __( 'Top header', 'brandy' ),
			),
			'middle' => array(
				'title' => __( 'Middle header', 'brandy' ),
			),
			'bottom' => array(
				'title' => __( 'Bottom header', 'brandy' ),
			),

		);

		add_filter( 'brandy_default_settings', array( $this, 'add_settings' ) );

		parent::__construct();

	}

	/**
	 * Add settings for header row
	 *
	 * @param array $settings Registered settings
	 *
	 * @return array Settings after adding
	 */
	public function add_settings( $settings = array() ) {
		$default_settings = $this->get_settings();
		foreach ( $this->rows as $row => $info ) {
			$id              = $row . '_header';
			$settings[ $id ] = array(
				'id'       => $id,
				'title'    => $info['title'],
				'settings' => $default_settings,
			);
		}
		return $settings;
	}

	public function add_registered_settings( $settings = array() ) {
		foreach ( array_keys( $this->rows ) as $row ) {
			$id              = $row . '_header';
			$settings[ $id ] = $this->components;
		}
		return $settings;
	}

	/**
	 * Add row settings layout to the general
	 *
	 * @param array $layouts Registered layouts
	 *
	 * @return array Layout after adding
	 */
	public function add_layout( $layouts = array() ) {
		$layout        = array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array( 'height_reset', 'height' ),
					),
					array(
						'components' => array( 'item_spacing' ),
					),
					array(
						'components' => array( 'is_constrained' ),
					),
					array(
						'components' => array( 'stretch_item' ),
					),
					array(
						'components' => array( 'flex_wrap' ),
					),
					array(
						'components' => array( 'expand_on_mobile' ),
					),
					array(
						'components' => array( 'enabled_devices' ),
					),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array( 'background' ),
					),
					array(
						'components' => array( 'bottom_stroke_reset', 'bottom_stroke_color', 'bottom_stroke_width' ),
					),
					array(
						'components' => array( 'padding' ),
					),
				),
			),
		);
		$mapped_layout = $this->map_layout( $layout );
		foreach ( array_keys( $this->rows ) as $row ) {
			$id             = $row . '_header';
			$layouts[ $id ] = $mapped_layout;
		}
		return $layouts;
	}

	/**
	 * Register all components that display in row settings
	 */
	protected function register_components() {
		return array(
			'height_reset'        => array(
				'title'        => array(
					'text'         => __( 'Height (px)', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'         => 'Reset',
				'reset_action' => 'row_settings',
				'reset_paths'  => array(
					array( 'height' ),
				),
			),
			'height'              => array(
				'value_path'     => array( 'height' ),
				'type'           => 'Dimension',
				'default_value'  => array(
					'desktop' => array(
						'min'   => 40,
						'max'   => 500,
						'unit'  => 'px',
						'value' => 70,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'hide_units'     => true,
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-header-height',
							'value_path' => array( 'height' ),
						),
					),
				),
			),
			'item_spacing'        => array(
				'value_path'     => array( 'item_spacing' ),
				'title'          => array(
					'text'         => __( 'Element spacing', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 12,
						'min'   => 0,
						'max'   => 100,
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
							'name'       => '--brandy-header-row-element-spacing',
							'value_path' => array( 'item_spacing' ),
						),
					),
				),
			),
			'is_constrained'      => array(
				'title'          => array(
					'text' => __( 'Is constrained', 'brandy' ),
					'type' => 'bold',
				),
				'description'    => __( 'This will restrict child width if parent is boxed layout', 'brandy' ),
				'type'           => 'Switcher',
				'default_value'  => false,
				'value_path'     => array( 'is_constrained' ),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '',
							'name'       => 'data-is-constrained',
							'value_path' => array( 'is_constrained' ),
						),
					),
				),
			),
			'stretch_item'        => array(
				'title'         => array(
					'text'         => __( 'Stretch item', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'          => 'HeaderStretchItem',
				'default_value' => array(
					'desktop' => false,
					'tablet'  => null,
					'mobile'  => null,
				),
				'description'   => __( 'Enabling this option will make the item to stretch and fit the width of its parent row.', 'brandy' ),
				'value_path'    => array( 'stretch_item' ),
			),
			'flex_wrap'           => array(
				'title'          => array(
					'text'         => __( 'Flex wrap', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'           => 'Switcher',
				'default_value'  => array(
					'desktop' => false,
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'flex_wrap' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'           => 'switcher',
							'name'           => '--brandy-header-row-flex-wrap-desktop',
							'value_path'     => array( 'flex_wrap', 'desktop' ),
							'enabled_value'  => 'wrap',
							'disabled_value' => 'nowrap',
							'default'        => 'nowrap',
						),
						array(
							'type'           => 'switcher',
							'name'           => '--brandy-header-row-flex-wrap-tablet',
							'value_path'     => array( 'flex_wrap', 'tablet' ),
							'enabled_value'  => 'wrap',
							'disabled_value' => 'nowrap',
							'default'        => 'nowrap',
						),
						array(
							'type'           => 'switcher',
							'name'           => '--brandy-header-row-flex-wrap-mobile',
							'value_path'     => array( 'flex_wrap', 'mobile' ),
							'enabled_value'  => 'wrap',
							'disabled_value' => 'nowrap',
							'default'        => 'nowrap',
						),
					),
				),
			),
			'expand_on_mobile'    => array(
				'title'          => array(
					'text' => __( 'Expand on mobile', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'Switcher',
				'default_value'  => true,
				'description'    => __( 'Enabling this option will auto hide column 2, 3 and display only when clicking expand button.', 'brandy' ),
				'value_path'     => array( 'expand_on_mobile' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'enabled_devices'     => array(
				'value_path'     => array( 'enabled_devices' ),
				'title'          => array(
					'text' => __( 'Enable on', 'brandy' ),
					'type' => 'bold',
				),
				'default_value'  => array( 'desktop', 'mobile' ),
				'type'           => 'EnabledDevices',
				'render_options' => array(
					'type'     => 'custom',
					'selector' => '',
				),
			),
			'background'          => array(
				'value_path'     => array( 'background' ),
				'title'          => array(
					'text' => __( 'Background', 'brandy' ),
					'type' => 'bold',
				),
				'default_value'  => array(
					'type'           => 'solid',
					'solid_color'    => '#ffffff',
					'gradient_color' => 'linear-gradient(90deg, RGBA(27, 60, 221, 1) 0%, rgba(251,208,238,1) 100%)',
					'image'          => array(
						'url'           => '',
						'top'           => array(
							'unit'  => 'px',
							'min'   => -200,
							'max'   => 200,
							'value' => 0,
						),
						'left'          => array(
							'unit'  => 'px',
							'min'   => -200,
							'max'   => 200,
							'value' => 0,
						),
						'overlay_color' => '#ffffff00',
						'size'          => 'auto',
						'position'      => 'left',
					),
				),
				'type'           => 'Background',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'background',
							'name'       => '--brandy-background',
							'value_path' => array( 'background' ),
						),
					),
				),
			),
			'bottom_stroke_reset' => array(
				'type'         => 'Reset',
				'title'        => array(
					'text' => __( 'Bottom stroke', 'brandy' ),
					'type' => 'bold',
				),
				'reset_action' => 'row_settings',
				'reset_paths'  => array(
					array( 'bottom_stroke' ),
				),
			),
			'bottom_stroke_color' => array(
				'type'           => 'ColorGroup',
				'title'          => array(
					'text' => __( 'Color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'bottom_stroke', 'color' ),
				'default_value'  => array(
					'normal' => '#e2e9fb',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-stroke-color',
							'value_path' => array( 'bottom_stroke', 'color' ),
						),
					),
				),
			),
			'bottom_stroke_width' => array(
				'type'           => 'Dimension',
				'title'          => array(
					'text' => __( 'Width', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'bottom_stroke', 'width' ),
				'default_value'  => array(
					'unit'  => 'px',
					'min'   => 0,
					'max'   => 20,
					'value' => 0,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-stroke-width',
							'value_path' => array( 'bottom_stroke', 'width' ),
						),
					),
				),
			),
			'padding'             => array(
				'value_path'     => array( 'padding' ),
				'title'          => array(
					'text'         => 'Padding',
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
				'type'           => 'Spacing',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-header-padding',
							'value_path' => array( 'padding' ),
						),
					),
				),
			),
		);
	}

	/**
	 * Add partial refresh for row settings
	 */
	public function add_partial_refresh( $partials = array() ) {
		foreach ( brandy_get_devices() as $device ) {
			foreach ( array_keys( $this->rows ) as $row ) {
				$id         = $row . '_header_' . $device;
				$partials[] = array(
					'configuration_type' => 'control',
					'id'                 => $id,
					'partial'            => array(
						'selector'            => '#brandy-header [device=' . $device . '] #brandy-' . $row . '-header',
						'render_callback'     => array( new RowBuilder( 'header', $row, $device ), 'render' ),
						'container_inclusive' => true,
						'fallback_refresh'    => false,
					),
					'default'            => '',
					'transport'          => 'postMessage',
				);
			}
		}
		return $partials;
	}
}
