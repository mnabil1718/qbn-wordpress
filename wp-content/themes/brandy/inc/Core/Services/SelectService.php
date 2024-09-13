<?php

namespace Brandy\Core\Services;

use Brandy\Customizer\Panels\General\SelectSettingsSection;
use Brandy\DynamicCss;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;
use Brandy\Utils\StylesDataHelpers;

/**
 * Select Service
 */
class SelectService {
	use SingletonTrait;

	/**
	 * Returns theme mode option key
	 *
	 * @return string
	 */
	public static function get_option_key() {
		return SelectSettingsSection::SECTION_ID;
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
				'right'          => 26,
				'bottom'         => 14,
				'left'           => 14,
				'is_constraints' => false,
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
			'--select-background-color-normal:' . $settings['background_color']['normal'],
			'--select-background-color-hover:' . $settings['background_color']['hover'],
			'--select-background-color-focus:' . $settings['background_color']['normal'],
			'--select-text-color-normal:' . $settings['text_color']['normal'],
			'--select-text-color-hover:' . $settings['text_color']['hover'],
			'--select-text-color-focus:' . $settings['text_color']['normal'],
			'--select-border-width:' . StylesDataHelpers::get_dimension_css( $settings['border']['width'] ),
			'--select-border-color-normal:' . $settings['border']['color']['normal'],
			'--select-border-color-hover:' . $settings['border']['color']['hover'],
			'--select-border-color-focus:' . $settings['border']['color']['focus'],
			'--select-border-radius:' . StylesDataHelpers::get_dimension_css( $settings['border']['radius'] ),
			'--select-padding:' . StylesDataHelpers::get_spacing_css( $settings['padding'] ),
		);

		$css .= 'body{' . implode( ';', $variables ) . '}';

		foreach ( array( 'primary', 'secondary' ) as $key ) {
			$variables = StylesDataHelpers::get_typography_css_variables( $settings['typography'], '--select-typography' );
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
		$select_settings  = get_theme_mod( self::get_option_key(), $default_settings );
		$select_settings  = Helpers::recursive_wp_parse_args( $select_settings, $default_settings );
		foreach ( array_keys( $select_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $select_settings[ $key ] );
			}
		}
		return $select_settings;
	}

	public static function save_settings( $data ) {

		$default_settings = self::get_default_settings();
		$select_settings  = Helpers::recursive_wp_parse_args( $data, $default_settings );

		foreach ( array_keys( $select_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $select_settings[ $key ] );
			}
		}

		set_theme_mod( self::get_option_key(), $select_settings );
	}
}
