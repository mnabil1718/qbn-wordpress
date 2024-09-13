<?php

namespace Brandy\Customizer\Layouts;

use Brandy\Abstracts\AbstractLayout;
use Brandy\Builder\RowBuilder;
use Brandy\Traits\SingletonTrait;

class FooterRowSettings extends AbstractLayout {

	use SingletonTrait;

	protected $components = array();

	private $rows = array();

	protected function __construct() {

		$this->rows = array(
			'top'    => array(
				'title' => __( 'Top footer', 'brandy' ),
			),
			'middle' => array(
				'title' => __( 'Middle footer', 'brandy' ),
			),
			'bottom' => array(
				'title' => __( 'Bottom footer', 'brandy' ),
			),

		);

		add_filter( 'brandy_default_settings', array( $this, 'add_settings' ) );

		parent::__construct();

	}

	public function add_settings( $settings = array() ) {
		$default_settings = $this->get_settings();
		foreach ( $this->rows as $row => $info ) {
			$id              = $row . '_footer';
			$settings[ $id ] = array(
				'id'       => $id,
				'title'    => $info['title'],
				'settings' => $default_settings,
			);
		}
		return $settings;
	}

	public function add_layout( $layouts = array() ) {
		$layout        = array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array( 'is_constrained' ),
					),
					array(
						'components' => array(
							'number_column',
							'row_direction',
							'column_layout_1',
							'column_layout_2',
							'column_layout_3',
							'column_layout_4',
							'column_layout_5',
							'column_layout_6',
						),
					),
					array(
						'components' => array( 'column_spacing' ),
					),
					array(
						'components' => array( 'column_items_direction' ),
					),
					array(
						'components' => array( 'height' ),
					),
					array(
						'components' => array( 'split_container' ),
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
						'components' => array( 'top_stroke_reset', 'top_stroke_color', 'top_stroke_width' ),
					),
					array(
						'components' => array( 'border_radius' ),
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
		$mapped_layout = $this->map_layout( $layout );
		foreach ( array_keys( $this->rows ) as $row ) {
			$id             = $row . '_footer';
			$layouts[ $id ] = $mapped_layout;
		}
		return $layouts;
	}

	public function add_registered_settings( $settings = array() ) {
		foreach ( array_keys( $this->rows ) as $row ) {
			$id              = $row . '_footer';
			$settings[ $id ] = $this->components;
		}
		return $settings;
	}

	protected function register_components() {
		return array(
			'is_constrained'                 => array(
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
			'number_column'                  => array(
				'title'          => array(
					'text'         => __( 'Columns number', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'           => 'FooterNumberColumn',
				'default_value'  => array(
					'desktop' => 3,
					'tablet'  => 3,
					'mobile'  => 3,
				),
				'options'        => array(
					array(
						'label' => 1,
						'value' => 1,
					),
					array(
						'label' => 2,
						'value' => 2,
					),
					array(
						'label' => 3,
						'value' => 3,
					),
					array(
						'label' => 4,
						'value' => 4,
					),
					array(
						'label' => 5,
						'value' => 5,
					),
					array(
						'label' => 6,
						'value' => 6,
					),
				),
				'value_path'     => array( 'number_column' ),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'column_layout_1'                => array(
				'title'              => array(
					'text' => __( 'Row layout', 'brandy' ),
					'type' => 'normal',
				),
				'type'               => 'FooterColumnLayout',
				'default_value'      => array(
					'desktop' => 'layout_1',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'         => array( 'column_layout_1' ),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'number_column' ),
						'value'      => 1,
					),
					array(
						'value_path' => array( 'row_direction' ),
						'value'      => 'horizontal',
					),
				),
			),
			'column_layout_2'                => array(
				'title'              => array(
					'text' => __( 'Row layout', 'brandy' ),
					'type' => 'normal',
				),
				'type'               => 'FooterColumnLayout',
				'default_value'      => array(
					'desktop' => 'layout_1',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'         => array( 'column_layout_2' ),
				'render_options'     => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-desktop',
							'value_path' => array( 'column_layout_2', 'desktop' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-tablet',
							'value_path' => array( 'column_layout_2', 'tablet' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-mobile',
							'value_path' => array( 'column_layout_2', 'mobile' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'number_column' ),
						'value'      => 2,
					),
					array(
						'value_path' => array( 'row_direction' ),
						'value'      => 'horizontal',
					),
				),
			),
			'column_layout_3'                => array(
				'title'              => array(
					'text' => __( 'Row layout', 'brandy' ),
					'type' => 'normal',
				),
				'type'               => 'FooterColumnLayout',
				'default_value'      => array(
					'desktop' => 'layout_1',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'         => array( 'column_layout_3' ),
				'render_options'     => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-desktop',
							'value_path' => array( 'column_layout_3', 'desktop' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-tablet',
							'value_path' => array( 'column_layout_3', 'tablet' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-mobile',
							'value_path' => array( 'column_layout_3', 'mobile' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'number_column' ),
						'value'      => 3,
					),
					array(
						'value_path' => array( 'row_direction' ),
						'value'      => 'horizontal',
					),
				),
			),
			'column_layout_4'                => array(
				'title'              => array(
					'text' => __( 'Row layout', 'brandy' ),
					'type' => 'normal',
				),
				'type'               => 'FooterColumnLayout',
				'default_value'      => array(
					'desktop' => 'layout_1',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'         => array( 'column_layout_4' ),
				'render_options'     => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-desktop',
							'value_path' => array( 'column_layout_4', 'desktop' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-tablet',
							'value_path' => array( 'column_layout_4', 'tablet' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-mobile',
							'value_path' => array( 'column_layout_4', 'mobile' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'number_column' ),
						'value'      => 4,
					),
					array(
						'value_path' => array( 'row_direction' ),
						'value'      => 'horizontal',
					),
				),
			),
			'column_layout_5'                => array(
				'title'              => array(
					'text' => __( 'Row layout', 'brandy' ),
					'type' => 'normal',
				),
				'type'               => 'FooterColumnLayout',
				'default_value'      => array(
					'desktop' => 'layout_1',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'         => array( 'column_layout_5' ),
				'render_options'     => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-desktop',
							'value_path' => array( 'column_layout_5', 'desktop' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-tablet',
							'value_path' => array( 'column_layout_5', 'tablet' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'layout-mobile',
							'value_path' => array( 'column_layout_5', 'mobile' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'number_column' ),
						'value'      => 5,
					),
					array(
						'value_path' => array( 'row_direction' ),
						'value'      => 'horizontal',
					),
				),
			),
			'column_layout_6'                => array(
				'title'              => array(
					'text' => __( 'Row layout', 'brandy' ),
					'type' => 'normal',
				),
				'type'               => 'FooterColumnLayout',
				'default_value'      => array(
					'desktop' => 'layout_1',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'         => array( 'column_layout_6' ),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'number_column' ),
						'value'      => 6,
					),
					array(
						'value_path' => array( 'row_direction' ),
						'value'      => 'horizontal',
					),
				),
			),
			'column_spacing'                 => array(
				'title'          => array(
					'text'         => __( 'Columns spacing', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'           => 'Dimension',
				'value_path'     => array( 'column_spacing' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'value' => 20,
						'min'   => 10,
						'max'   => 200,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-spacing',
							'value_path' => array( 'column_spacing' ),
						),
					),
				),
			),
			'row_direction'                  => array(
				'title'          => array(
					'text' => __( 'Row direction', 'brandy' ),
				),
				'description'    => __( 'This will restrict child width if parent is boxed layout', 'brandy' ),
				'type'           => 'ButtonGroup',
				'options'        => array(
					array(
						'value' => 'horizontal',
						'label' => __( 'Horizontal', 'brandy' ),
					),
					array(
						'value' => 'vertical',
						'label' => __( 'Vertical', 'brandy' ),
					),
				),
				'default_value'  => array(
					'desktop' => 'horizontal',
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'row_direction' ),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.footer-container',
							'name'       => 'data-desktop-direction',
							'value_path' => array( 'row_direction', 'desktop' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'data-tablet-direction',
							'value_path' => array( 'row_direction', 'tablet' ),
						),
						array(
							'selector'   => '.footer-container',
							'name'       => 'data-mobile-direction',
							'value_path' => array( 'row_direction', 'mobile' ),
						),
					),
				),
			),
			'column_items_direction'         => array(
				'title'          => array(
					'text' => __( 'Items direction', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => 'ColumnContentLayout',
				'options'        => array(
					array(
						'label' => __( 'Horizontal', 'brandy' ),
						'value' => 'row',
					),
					array(
						'label' => __( 'Vertical', 'brandy' ),
						'value' => 'column',
					),
				),
				'default_value'  => array(
					'desktop' => array(
						'column_1' => 'horizontal',
						'column_2' => 'horizontal',
						'column_3' => 'horizontal',
						'column_4' => 'horizontal',
						'column_5' => 'horizontal',
						'column_6' => 'horizontal',
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'value_path'     => array( 'column_items_direction' ),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array_reduce(
						array( 1, 2, 3, 4, 5, 6 ),
						function( $carry, $col ) {
							return array_merge(
								$carry,
								array_map(
									function( $device ) use ( $col ) {
										return array(
											'name'       => "data-items-direction-$device",
											'value_path' => array( 'column_items_direction', $device, "column_$col" ),
										);
									},
									brandy_get_devices()
								)
							);
						},
						array()
					),
				),
			),
			'column_vertical_alignment'      => array(
				'title'          => array(
					'text' => __( 'Vertical alignment', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => '',
				'value_path'     => array( 'column_vertical_alignment' ),
				'default_value'  => array(
					'desktop' => array(
						'column_1' => 'center',
						'column_1' => 'center',
						'column_1' => 'center',
						'column_1' => 'center',
						'column_1' => 'center',
						'column_1' => 'center',
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array_reduce(
						array( 1, 2, 3, 4, 5, 6 ),
						function( $carry, $col ) {
							return array_merge(
								$carry,
								array_map(
									function( $device ) use ( $col ) {
										return array(
											'type'       => 'custom',
											'name'       => "--brandy-footer-column-$col-vertical-alignment-$device",
											'value_path' => array( 'column_vertical_alignment', $device, "column_$col" ),
										);
									},
									brandy_get_devices()
								)
							);
						},
						array()
					),
				),
			),
			'column_horizontal_alignment'    => array(
				'title'          => array(
					'text' => __( 'Horizontal alignment', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => '',
				'value_path'     => array( 'column_horizontal_alignment' ),
				'default_value'  => array(
					'desktop' => array(
						'column_1' => 'flex-start',
						'column_2' => 'flex-start',
						'column_3' => 'flex-start',
						'column_4' => 'flex-start',
						'column_5' => 'flex-start',
						'column_6' => 'flex-start',
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array_reduce(
						array( 1, 2, 3, 4, 5, 6 ),
						function( $carry, $col ) {
							return array_merge(
								$carry,
								array_map(
									function( $device ) use ( $col ) {
										return array(
											'type'       => 'custom',
											'name'       => "--brandy-footer-column-$col-horizontal-alignment-$device",
											'value_path' => array( 'column_horizontal_alignment', $device, "column_$col" ),
										);
									},
									brandy_get_devices()
								)
							);
						},
						array()
					),
				),
			),
			'column_item_horizontal_spacing' => array(
				'title'          => array(
					'text' => __( 'Column item spacing', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => '',
				'value_path'     => array( 'column_item_horizontal_spacing' ),
				'default_value'  => array(
					'desktop' => array(
						'column_1' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_2' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_3' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_4' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_5' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_6' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array_reduce(
						array( 1, 2, 3, 4, 5, 6 ),
						function( $carry, $col ) {
							return array_merge(
								$carry,
								array_map(
									function( $device ) use ( $col ) {
										return array(
											'type'       => 'dimension',
											'name'       => "--brandy-footer-column-$col-item-horizontal-spacing-$device",
											'value_path' => array( 'column_item_horizontal_spacing', $device, "column_$col" ),
										);
									},
									brandy_get_devices()
								)
							);
						},
						array()
					),
				),
			),
			'column_item_vertical_spacing'   => array(
				'title'          => array(
					'text' => __( 'Column item spacing', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => '',
				'value_path'     => array( 'column_item_vertical_spacing' ),
				'default_value'  => array(
					'desktop' => array(
						'column_1' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_2' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_3' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_4' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_5' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
						'column_6' => array(
							'value' => 12,
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 200,
						),
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array_reduce(
						array( 1, 2, 3, 4, 5, 6 ),
						function( $carry, $col ) {
							return array_merge(
								$carry,
								array_map(
									function( $device ) use ( $col ) {
										return array(
											'type'       => 'dimension',
											'name'       => "--brandy-footer-column-$col-item-vertical-spacing-$device",
											'value_path' => array( 'column_item_vertical_spacing', $device, "column_$col" ),
										);
									},
									brandy_get_devices()
								)
							);
						},
						array()
					),
				),
			),
			'column_item_grow'               => array(
				'title'          => array(
					'text' => __( 'Item grow', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => '',
				'value_path'     => array( 'column_item_grow' ),
				'default_value'  => array(
					'desktop' => array(
						'column_1' => 'initial',
						'column_2' => 'initial',
						'column_3' => 'initial',
						'column_4' => 'initial',
						'column_5' => 'initial',
						'column_6' => 'initial',
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array_reduce(
						array( 1, 2, 3, 4, 5, 6 ),
						function( $carry, $col ) {
							return array_merge(
								$carry,
								array_map(
									function( $device ) use ( $col ) {
										return array(
											'name'       => "--brandy-footer-column-$col-item-grow-$device",
											'value_path' => array( 'column_item_grow', $device, "column_$col" ),
										);
									},
									brandy_get_devices()
								)
							);
						},
						array()
					),
				),
			),
			'column_flex_wrap'               => array(
				'title'          => array(
					'text' => __( 'Flex wrap', 'brandy' ),
					'type' => 'bold',
				),
				'type'           => '',
				'value_path'     => array( 'column_flex_wrap' ),
				'default_value'  => array(
					'desktop' => array(
						'column_1' => true,
						'column_2' => true,
						'column_3' => true,
						'column_4' => true,
						'column_5' => true,
						'column_6' => true,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array_reduce(
						array( 1, 2, 3, 4, 5, 6 ),
						function( $carry, $col ) {
							return array_merge(
								$carry,
								array_map(
									function( $device ) use ( $col ) {
										return array(
											'type'       => 'switcher',
											'name'       => "--brandy-footer-column-$col-flex-wrap-$device",
											'value_path' => array( 'column_flex_wrap', $device, "column_$col" ),
											'default'    => 'wrap',
											'enabled_value' => 'wrap',
											'disabled_value' => 'nowrap',
										);
									},
									brandy_get_devices()
								)
							);
						},
						array()
					),
				),
			),
			'enabled_devices'                => array(
				'value_path'     => array( 'enabled_devices' ),
				'title'          => array(
					'text' => 'Enable on',
					'type' => 'bold',
				),
				'default_value'  => array( 'desktop', 'mobile' ),
				'type'           => 'EnabledDevices',
				'render_options' => array(
					'type'     => 'custom',
					'selector' => '',
				),
			),
			'background'                     => array(
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
							'min'   => 0,
							'max'   => 100,
							'value' => 0,
						),
						'left'          => array(
							'unit'  => 'px',
							'min'   => 0,
							'max'   => 100,
							'value' => 0,
						),
						'overlay_color' => '#fff',
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
			'split_container'                => array(
				'value_path'     => array( 'split_container' ),
				'title'          => array(
					'text' => __( 'Split children container', 'brandy' ),
					'type' => 'bold',
				),
				'description'    => '',
				'default_value'  => false,
				'type'           => 'Switcher',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'type'           => 'switcher',
							'name'           => 'data-split-container',
							'selector'       => '',
							'value_path'     => array( 'split_container' ),
							'enabled_value'  => 'true',
							'disabled_value' => 'false',
						),
					),
				),
			),
			'top_stroke_reset'               => array(
				'type'         => 'Reset',
				'title'        => array(
					'text' => __( 'Top stroke', 'brandy' ),
					'type' => 'bold',
				),
				'reset_action' => 'row_settings',
				'reset_paths'  => array(
					array( 'top_stroke' ),
				),
			),
			'top_stroke_color'               => array(
				'type'           => 'ColorGroup',
				'title'          => array(
					'text' => __( 'Color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'top_stroke', 'color' ),
				'default_value'  => array(
					'normal' => '#e2e9fb',
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-stroke-color',
							'value_path' => array( 'top_stroke', 'color' ),
						),
					),
				),
			),
			'top_stroke_width'               => array(
				'type'           => 'Dimension',
				'title'          => array(
					'text' => __( 'Width', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'top_stroke', 'width' ),
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
							'value_path' => array( 'top_stroke', 'width' ),
						),
					),
				),
			),
			'padding'                        => array(
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
							'name'       => '--brandy-footer-row-padding',
							'value_path' => array( 'padding' ),
						),
					),
				),
			),
			'margin'                         => array(
				'value_path'     => array( 'margin' ),
				'title'          => array(
					'text'         => 'Margin',
					'type'         => 'bold',
					'show_devices' => true,
				),
				'default_value'  => array(
					'desktop' => array(
						'show_devices'   => true,
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
							'name'       => '--brandy-footer-row-margin',
							'value_path' => array( 'margin' ),
						),
					),
				),
			),
			'height'                         => array(
				'title'          => array(
					'text'         => __( 'Height', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
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
							'name'       => '--brandy-footer-height',
							'value_path' => array( 'height' ),
						),
					),
				),
			),
			'border_radius'                  => array(
				'value_path'     => array( 'border_radius' ),
				'title'          => array(
					'text'         => 'Border radius',
					'type'         => 'bold',
					'show_devices' => true,
				),
				'default_value'  => array(
					'desktop' => array(
						'show_devices'   => true,
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
				'aspect_titles'  => array(
					'TLeft',
					'TRight',
					'BRight',
					'BLeft',
				),
				'type'           => 'Spacing',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-footer-border-radius',
							'value_path' => array( 'border_radius' ),
						),
					),
				),
			),
		);
	}

	public function add_partial_refresh( $partials = array() ) {
		foreach ( brandy_get_devices() as $device ) {
			foreach ( array_keys( $this->rows ) as $row ) {
				$id         = $row . '_footer_' . $device;
				$partials[] = array(
					'configuration_type' => 'control',
					'id'                 => $id,
					'partial'            => array(
						'selector'            => '#brandy-footer [device=' . $device . '] #brandy-' . $row . '-footer',
						'render_callback'     => array( new RowBuilder( 'footer', $row, $device ), 'render' ),
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
