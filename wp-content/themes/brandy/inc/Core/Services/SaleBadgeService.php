<?php

namespace Brandy\Core\Services;

use Brandy\Customizer\Panels\WooCommerce\SaleBadgeSection;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;
use Brandy\Utils\StylesDataHelpers;

/**
 * SaleBadge Service
 */
class SaleBadgeService {
	use SingletonTrait;

	/**
	 * Returns theme mode option key
	 *
	 * @return string
	 */
	public static function get_option_key() {
		return SaleBadgeSection::SECTION_ID;
	}

	/**
	 * Returns default settings
	 *
	 * @return array
	 * @example Returns object with these value
	 * array(
	 * 'color' => array( 'normal', 'hover' ),
	 * 'background' => array( 'normal', 'hover' ),
	 * 'border_radius',
	 * 'padding'
	 *)
	 */
	public static function get_default_settings() {
		return array(
			'text_color'       => '#ffffff',
			'font_size'        => array(
				'unit'  => 'px',
				'value' => 14,
				'min'   => 10,
				'max'   => 30,
			),
			'text'             => __( 'Sale!', 'brandy' ), //phpcs:ignore
			'background_color' => 'rgb(255 172 112)',
			'border'           => array(
				'width'  => array(
					'unit'  => 'px',
					'value' => 0,
					'min'   => 0,
					'max'   => 50,
				),
				'radius' => array(
					'unit'  => 'px',
					'value' => 7,
					'min'   => 0,
					'max'   => 50,
				),
				'color'  => '#000000',
			),
			'padding'          => array(
				'unit'   => 'px',
				'top'    => 1,
				'bottom' => 1,
				'left'   => 8,
				'right'  => 8,
			),
		);
	}

	/**
	 * Print out global css
	 */
	public static function print_css() {
		$settings    = self::get_settings();
		$css         = '';
		$variables   = array();
		$variables[] = '--wc-sale-badge-font-size:' . StylesDataHelpers::get_dimension_css( $settings['font_size'] );
		$variables[] = '--wc-sale-badge-text-color:' . $settings['text_color'];
		$variables[] = '--wc-sale-badge-background-color:' . $settings['background_color'];
		$variables[] = '--wc-sale-badge-border-width:' . StylesDataHelpers::get_dimension_css( $settings['border']['width'] );
		$variables[] = '--wc-sale-badge-border-radius:' . StylesDataHelpers::get_dimension_css( $settings['border']['radius'] );
		$variables[] = '--wc-sale-badge-border-color:' . $settings['border']['color'];
		$variables[] = '--wc-sale-badge-padding:' . StylesDataHelpers::get_spacing_css( $settings['padding'] );

		$css .= 'body{' . implode( ';', $variables ) . '}';
		echo wp_kses_post( $css );
	}

	/**
	 * Returns settings
	 *
	 * @return array
	 * @example Returns object with these value
	 * array(
	 * 'color' => array( 'normal', 'hover' ),
	 * 'background_color' => array( 'normal', 'hover' ),
	 * 'border_radius',
	 * 'padding'
	 *)
	 */
	public static function get_settings() {
		$default_settings = self::get_default_settings();
		$input_settings   = get_theme_mod( self::get_option_key(), $default_settings );
		$input_settings   = Helpers::recursive_wp_parse_args( $input_settings, $default_settings );
		foreach ( array_keys( $input_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $input_settings[ $key ] );
			}
		}
		return $input_settings;
	}

	public static function save_settings( $data ) {

		$default_settings = self::get_default_settings();
		$input_settings   = Helpers::recursive_wp_parse_args( $data, $default_settings );

		foreach ( array_keys( $input_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $input_settings[ $key ] );
			}
		}

		set_theme_mod( self::get_option_key(), $input_settings );
	}
}
