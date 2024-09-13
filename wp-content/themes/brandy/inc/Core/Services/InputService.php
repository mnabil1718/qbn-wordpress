<?php

namespace Brandy\Core\Services;

use Brandy\Customizer\Panels\General\InputSettingsSection;
use Brandy\DynamicCss;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;
use Brandy\Utils\StylesDataHelpers;

/**
 * Input Service
 */
class InputService {
	use SingletonTrait;

	/**
	 * Returns theme mode option key
	 *
	 * @return string
	 */
	public static function get_option_key() {
		return InputSettingsSection::SECTION_ID;
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
			'background_color' => array(
				'normal' => '#ffffff',
				'hover'  => '#ffffff',
			),
			'text_color'       => array(
				'normal' => 'var(--wp--preset--color--brandy-primary-text)',
				'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
			),
			'typography'       => TypographyService::get_default_typography_value(),
			'border'           => array(
				'width'  => array(
					'unit'  => 'px',
					'value' => 1,
					'min'   => 0,
					'max'   => 5,
				),
				'color'  => array(
					'normal' => '#ACB6BF',
					'hover'  => '#7B8A99',
					'focus'  => '#272829',
				),
				'radius' => array(
					'unit'  => 'px',
					'value' => 9,
					'min'   => 0,
					'max'   => 100,
				),
			),
			'padding'          => array(
				'unit'           => 'px',
				'top'            => 14,
				'right'          => 14,
				'bottom'         => 14,
				'left'           => 14,
				'is_constraints' => true,
			),
		);
	}

	/**
	 * Print out global css
	 */
	public static function print_css() {
		$settings = self::get_settings();
		$css      = '';

		$variables = array(
			'--input-background-color-normal:' . $settings['background_color']['normal'],
			'--input-background-color-hover:' . $settings['background_color']['hover'],
			'--input-text-color-normal:' . $settings['text_color']['normal'],
			'--input-text-color-hover:' . $settings['text_color']['hover'],
			'--input-border-width:' . StylesDataHelpers::get_dimension_css( $settings['border']['width'] ),
			'--input-border-color-normal:' . $settings['border']['color']['normal'],
			'--input-border-color-hover:' . $settings['border']['color']['hover'],
			'--input-border-color-focus:' . $settings['border']['color']['focus'],
			'--input-border-radius:' . StylesDataHelpers::get_dimension_css( $settings['border']['radius'] ),
			'--input-padding:' . StylesDataHelpers::get_spacing_css( $settings['padding'] ),
		);

		$css .= 'body{' . implode( ';', $variables ) . '}';

		foreach ( array( 'primary', 'secondary' ) as $key ) {
			$variables = StylesDataHelpers::get_typography_css_variables( $settings['typography'], '--input-typography' );
			foreach ( $variables as $device => $device_variables ) {
				$child_css = 'body{' . implode( ';', $device_variables ) . '}';
				if ( 'tablet' === $device ) {
					$child_css = DynamicCss::wrap_tablet_responsive( $child_css );
				}
				if ( 'mobile' === $device ) {
					$child_css = DynamicCss::wrap_mobile_responsive( $child_css );
				}
				$css .= $child_css;
			}
		}
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
