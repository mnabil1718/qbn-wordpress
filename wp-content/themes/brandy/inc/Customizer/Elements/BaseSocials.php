<?php

namespace Brandy\Customizer\Elements;

use Brandy\Abstracts\AbstractBaseElement;
use Brandy\Core\Services\TypographyService;

class BaseSocials extends AbstractBaseElement {

	/**
	 * Default social list
	 *
	 * @var array
	 */
	protected $default_socials = array();

	/**
	 * Path to icon folders
	 *
	 * @var string
	 */
	public static $path_to_icons = '/template-parts/icons/socials/';

	/**
	 * Element icon
	 */
	protected $icon = '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path fill-rule="evenodd" clip-rule="evenodd" d="M21 6.75C19.7574 6.75 18.75 7.75736 18.75 9C18.75 9.32746 18.82 9.63857 18.9457 9.91923C18.953 9.93164 18.9601 9.94434 18.9667 9.95731C18.9796 9.98226 18.9909 10.0076 19.0007 10.0332C19.375 10.756 20.1298 11.25 21 11.25C22.2426 11.25 23.25 10.2426 23.25 9C23.25 7.75736 22.2426 6.75 21 6.75ZM17.25 9C17.25 9.32361 17.291 9.63765 17.3681 9.93721L11.9743 12.7158C11.2887 11.8245 10.2114 11.25 9 11.25C6.92893 11.25 5.25 12.9289 5.25 15C5.25 17.0711 6.92893 18.75 9 18.75C10.2109 18.75 11.2878 18.176 11.9734 17.2853L17.3677 20.0642C17.2909 20.3633 17.25 20.6769 17.25 21C17.25 23.0711 18.9289 24.75 21 24.75C23.0711 24.75 24.75 23.0711 24.75 21C24.75 18.9289 23.0711 17.25 21 17.25C19.7886 17.25 18.7113 17.8244 18.0257 18.7158L12.6319 15.9372C12.709 15.6376 12.75 15.3236 12.75 15C12.75 14.6769 12.7091 14.3633 12.6323 14.0642L18.0266 11.2853C18.7122 12.176 19.7891 12.75 21 12.75C23.0711 12.75 24.75 11.0711 24.75 9C24.75 6.92893 23.0711 5.25 21 5.25C18.9289 5.25 17.25 6.92893 17.25 9ZM11.0542 15.9194C11.18 15.6387 11.25 15.3275 11.25 15C11.25 14.6749 11.1811 14.3659 11.057 14.0869C11.0487 14.073 11.0408 14.0588 11.0333 14.0442C11.0195 14.0175 11.0075 13.9903 10.9972 13.9628C10.6221 13.2421 9.86855 12.75 9 12.75C7.75736 12.75 6.75 13.7574 6.75 15C6.75 16.2426 7.75736 17.25 9 17.25C9.87025 17.25 10.6251 16.7559 10.9994 16.033C11.0092 16.0075 11.0205 15.9822 11.0333 15.9573C11.0399 15.9444 11.0469 15.9318 11.0542 15.9194ZM18.9429 20.087C18.9513 20.0731 18.9592 20.0589 18.9667 20.0442C18.9806 20.0174 18.9926 19.9902 19.0029 19.9626C19.378 19.2421 20.1315 18.75 21 18.75C22.2426 18.75 23.25 19.7574 23.25 21C23.25 22.2426 22.2426 23.25 21 23.25C19.7574 23.25 18.75 22.2426 18.75 21C18.75 20.675 18.8189 20.3661 18.9429 20.087Z" fill="' . BRANDY_ICON_COLOR_NORMAL . '"/>
	</svg>
	';

	protected function __construct() {
		$this->default_socials = array_values(
			array_filter(
				$this->get_all_socials(),
				function( $item ) {
					return in_array( $item['id'], array( 'facebook', 'instagram', 'linkedin' ), true );
				}
			)
		);

		add_filter( 'brandy_extra_localize', array( $this, 'add_localize_data' ) );

		parent::__construct();
	}

	public function template_path() {
		return 'template-parts/builder/elements/socials';
	}


	protected function register_components() {
		return array(
			'list_socials'          => array(
				'title'         => array(
					'text' => __( 'List socials', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'    => array( 'items' ),
				'default_value' => $this->default_socials,
				'type'          => 'ListSocials',
			),
			'icon_color_type'       => array(
				'title'          => array(
					'text' => __( 'Icons color', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'     => array( 'icon_color_type' ),
				'default_value'  => 'custom',
				'type'           => 'ButtonGroup',
				'options'        => array(
					array(
						'label' => 'Default',
						'value' => 'default',
					),
					array(
						'label' => 'Custom',
						'value' => 'custom',
					),
				),
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'open_in_new_tab'       => array(
				'title'          => array(
					'text' => __( 'Open links in new tab', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'     => array( 'target' ),
				'default_value'  => true,
				'type'           => 'Switcher',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'type'           => 'switcher',
							'name'           => 'target',
							'selector'       => '.brandy-social-item',
							'value_path'     => array( 'target' ),
							'enabled_value'  => '_blank',
							'disabled_value' => '_self',
						),
					),
				),
			),
			'show_label'            => array(
				'title'          => array(
					'text'         => __( 'Show label', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'value_path'     => array( 'show_label' ),
				'default_value'  => array(
					'desktop' => false,
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Switcher',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'           => 'switcher',
							'name'           => '--brandy-label-display',
							'value_path'     => array( 'show_label' ),
							'enabled_value'  => 'block',
							'disabled_value' => 'none',
						),
					),
				),
			),
			'items_direction'       => array(
				'title'          => array(
					'text'         => __( 'Items direction', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'           => 'ButtonGroup',
				'default_value'  => array(
					'desktop' => 'horizontal',
					'tablet'  => null,
					'mobile'  => null,
				),
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
				'value_path'     => array( 'items_direction' ),
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-social-list',
							'name'       => 'items-direction-desktop',
							'value_path' => array( 'items_direction', 'desktop' ),
						),
						array(
							'selector'   => '.brandy-social-list',
							'name'       => 'items-direction-tablet',
							'value_path' => array( 'items_direction', 'tablet' ),
						),
						array(
							'selector'   => '.brandy-social-list',
							'name'       => 'items-direction-mobile',
							'value_path' => array( 'items_direction', 'mobile' ),
						),
					),
				),
			),
			'hide_icon'             => array(
				'title'          => array(
					'text'         => __( 'Hide icon', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'value_path'     => array( 'hide_icon' ),
				'default_value'  => array(
					'desktop' => false,
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Switcher',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'           => 'switcher',
							'name'           => '--brandy-social-icon-display',
							'value_path'     => array( 'hide_icon' ),
							'enabled_value'  => 'none',
							'disabled_value' => 'block',
						),
					),
				),
			),
			'logo_reset'            => array(
				'title'       => array(
					'text'         => __( 'Logo social', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'logo' ),
				),
			),
			'logo_color'            => array(
				'title'              => array(
					'text' => __( 'Logo color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'         => array( 'logo', 'color' ),
				'default_value'      => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-border)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-border)',
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
							'name'       => '--brandy-logo-color',
							'value_path' => array( 'logo', 'color' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'icon_color_type' ),
						'value'      => 'custom',
					),
				),
			),
			'logo_background_color' => array(
				'title'              => array(
					'text' => __( 'Background color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'         => array( 'logo', 'background' ),
				'default_value'      => array(
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
				'type'               => 'ColorGroup',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-logo-background',
							'value_path' => array( 'logo', 'background' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'icon_color_type' ),
						'value'      => 'custom',
					),
				),
			),
			'logo_stroke_color'     => array(
				'title'              => array(
					'text' => __( 'Stroke color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'         => array( 'logo', 'stroke', 'color' ),
				'default_value'      => array(
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
				'type'               => 'ColorGroup',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-logo-stroke-color',
							'value_path' => array( 'logo', 'stroke', 'color' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'icon_color_type' ),
						'value'      => 'custom',
					),
				),
			),
			'logo_stroke_width'     => array(
				'title'              => array(
					'text' => __( 'Stroke width', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'         => array( 'logo', 'stroke', 'width' ),
				'units'              => array( 'px' ),
				'default_value'      => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 20,
						'value' => 0,
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
							'name'       => '--brandy-logo-stroke-width',
							'value_path' => array( 'logo', 'stroke', 'width' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'icon_color_type' ),
						'value'      => 'custom',
					),
				),
			),
			'logo_border_radius'    => array(
				'title'              => array(
					'text' => __( 'Border radius', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'         => array( 'logo', 'border_radius' ),
				'units'              => array( 'px', '%' ),
				'default_value'      => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 50,
						'value' => 1,
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
							'name'       => '--brandy-logo-border-radius',
							'value_path' => array( 'logo', 'border_radius' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'icon_color_type' ),
						'value'      => 'custom',
					),
				),
			),
			'logo_size'             => array(
				'title'          => array(
					'text' => __( 'Logo size', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'logo', 'size' ),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => ElementsLoader::get_default_icon_size(),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-logo-size',
							'value_path' => array( 'logo', 'size' ),
						),
					),
				),
			),
			'label_color'           => array(
				'title'          => array(
					'text' => __( 'Label color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'label', 'color' ),
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
							'name'       => '--brandy-label-color',
							'value_path' => array( 'label', 'color' ),
						),
					),
				),
			),
			'label_reset'           => array(
				'title'       => array(
					'text'         => __( 'Label social', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'label' ),
				),
			),
			'label_typography'      => array(
				'title'          => array(
					'text' => __( 'Typography', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'label', 'typography' ),
				'default_value'  => TypographyService::get_default_typography_value(),
				'type'           => 'Typography',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--brandy-label-typography',
							'value_path' => array( 'label', 'typography' ),
						),
					),
				),
			),
			'label_distance'        => array(
				'title'          => array(
					'text' => __( 'Label distance', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'label', 'distance' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 1,
						'max'   => 30,
						'value' => 3,
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
							'name'       => '--brandy-label-distance',
							'value_path' => array( 'label', 'distance' ),
						),
					),
				),
			),
			'item_reset'            => array(
				'title'       => array(
					'text'         => __( 'Item social', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'item' ),
				),
			),
			'item_background_color' => array(
				'title'          => array(
					'text' => __( 'Background color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'item', 'background' ),
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
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-item-background',
							'value_path' => array( 'item', 'background' ),
						),
					),
				),
			),
			'item_stroke_color'     => array(
				'title'          => array(
					'text' => __( 'Stroke color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'item', 'stroke', 'color' ),
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
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-item-stroke-color',
							'value_path' => array( 'item', 'stroke', 'color' ),
						),
					),
				),
			),
			'item_stroke_width'     => array(
				'title'          => array(
					'text' => __( 'Stroke width', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'item', 'stroke', 'width' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 20,
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
							'name'       => '--brandy-item-border-width',
							'value_path' => array( 'item', 'stroke', 'width' ),
						),
					),
				),
			),
			'item_border_radius'    => array(
				'title'          => array(
					'text' => __( 'Border radius', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'item', 'border_radius' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 50,
						'value' => 1,
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
							'name'       => '--brandy-item-border-radius',
							'value_path' => array( 'item', 'border_radius' ),
						),
					),
				),
			),
			'item_spacing'          => array(
				'title'          => array(
					'text' => __( 'Item spacing', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'item', 'spacing' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'  => 'px',
						'min'   => 1,
						'max'   => 100,
						'value' => 10,
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
							'name'       => '--brandy-item-spacing',
							'value_path' => array( 'item', 'spacing' ),
						),
					),
				),
			),
			'item_padding'          => array(
				'value_path'     => array( 'item', 'padding' ),
				'title'          => array(
					'text' => __( 'Item padding', 'brandy' ),
					'type' => 'normal',
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
							'name'       => '--brandy-item-padding',
							'value_path' => array( 'item', 'padding' ),
						),
					),
				),
			),
			'margin'                => array(
				'value_path'     => array( 'margin' ),
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
				'type'           => 'Spacing',
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

	protected function register_layout() {
		return array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array( 'list_socials' ),
					),
					array(
						'components' => array( 'icon_color_type' ),
					),
					array(
						'components' => array( 'open_in_new_tab' ),
					),
					array(
						'components' => array( 'show_label' ),
					),
					array(
						'components' => array( 'hide_icon' ),
					),
					array(
						'components' => array( 'items_direction' ),
					),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array(
							'logo_reset',
							'logo_color',
							'logo_background_color',
							'logo_stroke_color',
							'logo_stroke_width',
							'logo_border_radius',
							'logo_size',
						),
					),
					array(
						'components' => array(
							'label_reset',
							'label_color',
							'label_typography',
							'label_distance',
						),
					),
					array(
						'components' => array(
							'item_reset',
							'item_background_color',
							'item_stroke_color',
							'item_stroke_width',
							'item_border_radius',
							'item_spacing',
							'item_padding',
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
	}

	/**
	 * Add socials icons to localize data
	 *
	 * @param array $localize_data General data
	 *
	 * @return array
	 */
	public function add_localize_data( $localize_data ) {

		if ( ! isset( $localize_data['all_socials'] ) ) {
			$localize_data['all_socials'] = $this->get_all_socials();
		}

		if ( isset( $localize_data['icons']['socials'] ) ) {
			return $localize_data;
		}

		$icons = array();
		$dir   = new \DirectoryIterator( BRANDY_TEMPLATE_DIR . self::$path_to_icons );
		foreach ( $dir as $fileinfo ) {
			if ( ! $fileinfo->isDot() ) {
				$types = array( 'default', 'custom' );
				foreach ( $types as $type ) {
					$file_name = $fileinfo->getFilename();
					$file_path = BRANDY_TEMPLATE_DIR . self::$path_to_icons . "$file_name/$type.php";
					$icon_name = basename( $file_name, '.php' );
					if ( $file_name && file_exists( $file_path ) ) {
						if ( empty( $icons ) ) {
							$icons = array();
						}
						ob_start();
						require $file_path;
						$icon_data = ob_get_contents();
						ob_end_clean();
						$icons[ $icon_name ][ $type ] = $icon_data;
					}
				}
			}
		}
		$localize_data['icons']['socials'] = $icons;

		return $localize_data;
	}

	/**
	 * All socials
	 */
	public static function get_all_socials() {
		return array(
			array(
				'id'      => 'facebook',
				'label'   => 'Facebook',
				'url'     => 'https://www.facebook.com/',
				'icon'    => 'facebook',
				'visible' => true,
			),
			array(
				'id'      => 'instagram',
				'label'   => 'Instagram',
				'url'     => 'https://www.instagram.com/',
				'icon'    => 'instagram',
				'visible' => true,
			),
			array(
				'id'      => 'linkedin',
				'label'   => 'LinkedIn',
				'url'     => 'https://www.linkedin.com/',
				'icon'    => 'linkedin',
				'visible' => true,
			),
			array(
				'id'      => 'youtube',
				'label'   => 'Youtube',
				'url'     => 'https://www.youtube.com/',
				'icon'    => 'youtube',
				'visible' => true,
			),
			array(
				'id'      => 'snapchat',
				'label'   => 'Snapchat',
				'url'     => 'https://www.snapchat.com/',
				'icon'    => 'snapchat',
				'visible' => true,
			),
			// Not yet
			array(
				'id'      => 'pinterest',
				'label'   => 'Pinterest',
				'url'     => 'https://www.pinterest.com/',
				'icon'    => 'pinterest',
				'visible' => true,
			),
			array(
				'id'      => 'github',
				'label'   => 'Github',
				'url'     => 'https://www.github.com/',
				'icon'    => 'github',
				'visible' => true,
			),
			array(
				'id'      => 'tiktok',
				'label'   => 'Tiktok',
				'url'     => 'https://www.tiktok.com/',
				'icon'    => 'tiktok',
				'visible' => true,
			),
			array(
				'id'      => 'telegram',
				'label'   => 'telegram',
				'url'     => 'https://www.telegram.com/',
				'icon'    => 'telegram',
				'visible' => true,
			),
			array(
				'id'      => 'whatsapp',
				'label'   => 'Whatsapp',
				'url'     => 'https://www.whatsapp.com/',
				'icon'    => 'whatsapp',
				'visible' => true,
			),
			array(
				'id'      => 'twitter',
				'label'   => 'Twitter',
				'url'     => 'https://www.twitter.com/',
				'icon'    => 'twitter',
				'visible' => true,
			),
		);
	}
}
