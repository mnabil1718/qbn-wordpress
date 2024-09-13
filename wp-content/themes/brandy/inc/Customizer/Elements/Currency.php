<?php

namespace Brandy\Customizer\Elements;

use Brandy\Abstracts\AbstractBaseElement;
use Brandy\Core\Services\TypographyService;
use Brandy\Traits\SingletonTrait;

class Currency extends AbstractBaseElement {

	use SingletonTrait;

	protected $settings = array();

	protected $default_currencies = array();

	protected $builders = array( 'header', 'footer' );

	protected $element_id = 'currency';

	protected function __construct() {

		add_filter( 'brandy_extra_localize', array( $this, 'add_localize_data' ) );

		parent::__construct();
	}
	public function register_element( $elements = array() ) {
		$elements[ $this->element_id ] = array(
			'id'       => $this->element_id,
			'title'    => __( 'Currency', 'brandy' ),
			'settings' => $this->map_settings( $this->components ),
			'builders' => $this->builders,
			'icon'     => '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M14.75 6.5C10.1937 6.5 6.5 10.1937 6.5 14.75C6.5 19.3063 10.1937 23 14.75 23C19.3063 23 23 19.3063 23 14.75C23 10.1937 19.3063 6.5 14.75 6.5ZM5 14.75C5 9.36522 9.36522 5 14.75 5C20.1348 5 24.5 9.36522 24.5 14.75C24.5 20.1348 20.1348 24.5 14.75 24.5C9.36522 24.5 5 20.1348 5 14.75ZM11.9107 10.7752C12.4783 10.2707 13.231 10 14 10V8.75C14 8.33579 14.3358 8 14.75 8C15.1642 8 15.5 8.33579 15.5 8.75V10H17.75C18.1642 10 18.5 10.3358 18.5 10.75C18.5 11.1642 18.1642 11.5 17.75 11.5H14C13.5755 11.5 13.1836 11.6507 12.9073 11.8963C12.6338 12.1394 12.5 12.4489 12.5 12.75C12.5 13.0511 12.6338 13.3606 12.9073 13.6037C13.1836 13.8493 13.5755 14 14 14H15.5C16.269 14 17.0217 14.2707 17.5893 14.7752C18.1597 15.2823 18.5 15.9902 18.5 16.75C18.5 17.5098 18.1597 18.2177 17.5893 18.7248C17.0217 19.2293 16.269 19.5 15.5 19.5V19.75C15.5 20.1642 15.1642 20.5 14.75 20.5C14.3358 20.5 14 20.1642 14 19.75V19.5H11.75C11.3358 19.5 11 19.1642 11 18.75C11 18.3358 11.3358 18 11.75 18H14.1003C14.23 17.7758 14.4724 17.625 14.75 17.625C15.0276 17.625 15.27 17.7758 15.3997 18H15.5C15.9245 18 16.3164 17.8493 16.5927 17.6037C16.8662 17.3606 17 17.0511 17 16.75C17 16.4489 16.8662 16.1394 16.5927 15.8963C16.3164 15.6507 15.9245 15.5 15.5 15.5H14C13.231 15.5 12.4783 15.2293 11.9107 14.7248C11.3403 14.2177 11 13.5098 11 12.75C11 11.9902 11.3403 11.2823 11.9107 10.7752Z" fill="' . BRANDY_ICON_COLOR_NORMAL . '"/>
			</svg>
			',
		);
		return $elements;
	}

	protected function register_components() {
		$typo = TypographyService::get_default_typography_value();

		return array(
			'list_currencies'            => array(
				'value_path'    => array( 'currencies' ),
				'default_value' => $this->default_currencies,
				'type'          => 'ListCurrencies',
			),
			'currency_icon_enabled'      => array(
				'value_path'     => array( 'currency_icon_enabled' ),
				'title'          => array(
					'text'         => __( 'Show currency flag', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'default_value'  => array(
					'desktop' => true,
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Switcher',
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'currency_icon_position'     => array(
				'title'               => array(
					'text' => __( 'Icon position', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'          => array( 'currency_icon_position' ),
				'type'                => 'Position',
				'default_value'       => 'left',
				'available_positions' => array( 'left', 'right' ),
				'render_options'      => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-currency-box',
							'value_path' => array( 'currency_icon_position' ),
							'name'       => 'flag-position',
						),
					),
				),
			),
			'arrow_icon_enabled'         => array(
				'value_path'     => array( 'arrow_icon_enabled' ),
				'title'          => array(
					'text'         => __( 'Show arrow icon', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'default_value'  => array(
					'desktop' => true,
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Switcher',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-currency .brandy-currency-arrow',
							'name'       => 'desktop-enabled',
							'value_path' => array( 'arrow_icon_enabled', 'desktop' ),
						),
						array(
							'selector'   => '.brandy-currency .brandy-currency-arrow',
							'name'       => 'tablet-enabled',
							'value_path' => array( 'arrow_icon_enabled', 'tablet' ),
						),
						array(
							'selector'   => '.brandy-currency .brandy-currency-arrow',
							'name'       => 'mobile-enabled',
							'value_path' => array( 'arrow_icon_enabled', 'mobile' ),
						),
					),
				),
			),
			//design
			'design_symbol_reset'        => array(
				'title'       => array(
					'text'         => __( 'Currency flag', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'design_symbol' ),
				),
			),
			'design_symbol_stroke_color' => array(
				'title'          => array(
					'text' => __( 'Stroke color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'design_symbol', 'stroke', 'color' ),
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
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--element-currency-symbol-stroke-color',
							'value_path' => array( 'design_symbol', 'stroke', 'color' ),
						),
					),
				),
			),
			'design_symbol_stroke_width' => array(
				'title'          => array(
					'text' => __( 'Stroke width', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'design_symbol', 'stroke', 'width' ),
				'units'          => array( 'px' ),
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
							'name'       => '--element-currency-symbol-stroke-width',
							'value_path' => array( 'design_symbol', 'stroke', 'width' ),
						),
					),
				),
			),
			'design_symbol_size'         => array(
				'title'          => array(
					'text' => __( 'Flag size', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'design_symbol', 'size' ),
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
							'name'       => '--element-currency-symbol-size',
							'value_path' => array( 'design_symbol', 'size' ),
						),
					),
				),
			),
			'design_code_reset'          => array(
				'title'       => array(
					'text'         => __( 'Currency code', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'design_code' ),
				),
			),
			'design_code_typography'     => array(
				'value_path'     => array( 'design_code', 'typography' ),
				'title'          => array(
					'text' => 'Typography',
					'type' => 'normal',
				),
				'default_value'  => $typo,
				'type'           => 'Typography',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--element-currency-code-typography',
							'value_path' => array( 'design_code', 'typography' ),
						),
					),
				),
			),
			'design_code_text_color'     => array(
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'design_code', 'text_color' ),
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
							'name'       => '--element-currency-code-text-color',
							'value_path' => array( 'design_code', 'text_color' ),
						),
					),
				),
			),
			'design_arrow_icon_reset'    => array(
				'title'       => array(
					'text'         => __( 'Icon arrow', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'design_arrow_icon' ),
				),
			),
			'design_arrow_icon_color'    => array(
				'title'          => array(
					'text' => __( 'Icon color', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'design_arrow_icon', 'color' ),
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
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--element-currency-arrow-icon-color',
							'value_path' => array( 'design_arrow_icon', 'color' ),
						),
					),
				),
			),
			'design_arrow_icon_size'     => array(
				'title'          => array(
					'text' => __( 'Icon size', 'brandy' ),
					'type' => 'normal',
				),
				'value_path'     => array( 'design_arrow_icon', 'size' ),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'desktop' => ElementsLoader::get_default_icon_size( array( 'min' => 20 ) ),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--element-currency-arrow-icon-size',
							'value_path' => array( 'design_arrow_icon', 'size' ),
						),
					),
				),
			),
			'design_item_spacing'        => array(
				'value_path'     => array( 'design_item_spacing' ),
				'title'          => array(
					'text' => 'Item spacing',
					'type' => 'bold',
				),
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
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--element-currency-item-spacing',
							'value_path' => array( 'design_item_spacing' ),
						),
					),
				),
			),
			'design_margin'              => array(
				'value_path'     => array( 'design_margin' ),
				'title'          => array(
					'text' => 'Margin',
					'type' => 'bold',
				),
				'default_value'  => array(
					'unit'           => 'px',
					'top'            => 0,
					'right'          => 0,
					'bottom'         => 0,
					'left'           => 0,
					'is_constraints' => false,
				),
				'type'           => 'Spacing',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--element-currency-margin',
							'value_path' => array( 'design_margin' ),
						),
					),
				),
			),
		);
	}
	public function add_layout( $layouts = array() ) {
		$layout                       = array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array(
							'list_currencies',
						),
					),
					array(
						'components' => array(
							'currency_icon_enabled',
							'currency_icon_position',
						),
					),
					array(
						'components' => array(
							'arrow_icon_enabled',
						),
					),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array(
							'design_symbol_reset',
							// 'design_symbol_color',
							// 'design_symbol_bgcolor',
							'design_symbol_stroke_color',
							'design_symbol_stroke_width',
							'design_symbol_size',
						),
					),
					array(
						'components' => array(
							'design_code_reset',
							'design_code_typography',
							'design_code_text_color',
						),
					),
					array(
						'components' => array(
							'design_arrow_icon_reset',
							'design_arrow_icon_color',
							'design_arrow_icon_size',
						),
					),
					array(
						'components' => array(
							'design_item_spacing',
						),
					),
					array(
						'components' => array(
							'design_margin',
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
		$localize_data['currency'] = array(
			'list' => $this->get_available_currencies(),
		);
		return $localize_data;
	}
	public function get_available_currencies() {
		if ( function_exists( 'get_woocommerce_currencies' ) && function_exists( 'get_woocommerce_currency_symbol' ) ) {
			$currency_code_options = get_woocommerce_currencies();

			if ( class_exists( 'Yay_Currency\Helpers\Helper' ) ) {
				$yay_currencies = apply_filters( 'yay_currency_get_currencies_posts', \Yay_Currency\Helpers\Helper::get_currencies_post_type() );
			} else {
				$yay_currencies = array();
			}

			$res = array();
			foreach ( $currency_code_options as $code => $name ) {

				foreach ( $yay_currencies as $yay_c ) {
					if ( $code == $yay_c->post_title ) {
						$res[] = array(
							'id'     => $code,
							'name'   => $name,
							'flag'   => self::get_currency_flag( $code ),
							'symbol' => get_woocommerce_currency_symbol( $code ),
							'yay_id' => $yay_c->ID,
						);
						break;
					}
				}
			}
			return $res;
		}
		return array();
	}

	public static function get_currency_flag( $code ) {
		$countries_code = array();
		$flag           = '';
		if ( class_exists( '\Yay_Currency\Helpers\Helper' ) ) {
			if ( is_callable( array( '\Yay_Currency\Helpers\Helper', 'currency_code_by_country_code' ) ) ) {
				$countries_code = \Yay_Currency\Helpers\Helper::currency_code_by_country_code();
			}
			$selected_country_code = $countries_code[ $code ];
			if ( ! empty( $selected_country_code ) && is_callable( array( '\Yay_Currency\Helpers\Helper', 'get_flag_by_country_code' ) ) ) {
				$flag = \Yay_Currency\Helpers\Helper::get_flag_by_country_code( $selected_country_code );
			}
		}
		return $flag;
	}
}
