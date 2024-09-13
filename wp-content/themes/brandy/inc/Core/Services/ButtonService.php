<?php

namespace Brandy\Core\Services;

use Brandy\Customizer\Panels\General\ButtonSettingsSection;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;
use Brandy\Utils\StylesDataHelpers;

/**
 * Button Service
 */
class ButtonService {
	use SingletonTrait;

	/**
	 * Returns theme mode option key
	 *
	 * @return string
	 */
	public static function get_option_key() {
		return ButtonSettingsSection::SECTION_ID;
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
			'primary_hover_color'              => '#ffffff',
			'primary_hover_background_color'   => 'var(--wp--preset--color--brandy-primary-text)',
			'primary_box_shadow'               => array(
				'enabled'      => true,
				'type'         => 'custom',
				'custom_value' => array(
					'color'  => 'rgba(47, 112, 179, .2)',
					'x'      => 0,
					'y'      => 7,
					'blur'   => 25,
					'spread' => 0,
				),
			),
			'primary_hover_box_shadow'         => array(
				'enabled'      => true,
				'type'         => 'custom',
				'custom_value' => array(
					'color'  => 'rgba(0,0,0,.1)',
					'x'      => 0,
					'y'      => 7,
					'blur'   => 35,
					'spread' => 0,
				),
			),
			'outline_hover_color'              => '#ffffff',
			'outline_hover_background_color'   => 'var(--wp--preset--color--brandy-primary-text)',
			'outline_box_shadow'               => array(
				'enabled'      => false,
				'type'         => 'custom',
				'custom_value' => array(
					'color'  => 'rgba(47, 112, 179, .2)',
					'x'      => 0,
					'y'      => 7,
					'blur'   => 25,
					'spread' => 0,
				),
			),
			'outline_hover_box_shadow'         => array(
				'enabled'      => false,
				'type'         => 'custom',
				'custom_value' => array(
					'color'  => 'rgba(0,0,0,.1)',
					'x'      => 0,
					'y'      => 7,
					'blur'   => 35,
					'spread' => 0,
				),
			),
			'secondary_color'                  => '#ffffff',
			'secondary_background_color'       => 'rgb(18 41 64)',
			'secondary_border_color'           => 'rgb(18 41 64)',
			'secondary_box_shadow'             => array(
				'enabled'      => true,
				'type'         => 'custom',
				'custom_value' => array(
					'color'  => 'rgba(47, 112, 179, .2)',
					'x'      => 0,
					'y'      => 7,
					'blur'   => 25,
					'spread' => 0,
				),
			),
			'secondary_border_width'           => array(
				'unit'  => 'px',
				'min'   => 0,
				'max'   => 10,
				'value' => 2,
			),
			'secondary_border_style'           => 'solid',
			'secondary_hover_color'            => 'rgb(18, 41, 64)',
			'secondary_hover_background_color' => '#ffffff',
			'secondary_hover_border_color'     => 'rgb(18 41 64)',
			'secondary_hover_box_shadow'       => array(
				'enabled'      => true,
				'type'         => 'custom',
				'custom_value' => array(
					'color'  => 'rgba(0, 0, 0, .1)',
					'x'      => 0,
					'y'      => 7,
					'blur'   => 35,
					'spread' => 0,
				),
			),
		);
	}

	/**
	 * Print out global css
	 */
	public static function print_css() {
		$settings         = self::get_settings();
		$default_settings = self::get_default_settings();

		$variables = array(
			/** Primary hover */
			'--primary-button-hover-color:' . ( $settings['primary_hover_color'] ?? $default_settings['primary_hover_color'] ),
			'--primary-button-hover-background-color:' . ( $settings['primary_hover_background_color'] ?? $default_settings['primary_hover_background_color'] ),
			'--primary-button-hover-box-shadow:' . StylesDataHelpers::get_box_shadow_css( $settings['primary_hover_box_shadow'] ?? $default_settings['primary_hover_box_shadow'] ),
			'--primary-button-box-shadow:' . StylesDataHelpers::get_box_shadow_css( $settings['primary_box_shadow'] ?? $default_settings['primary_box_shadow'] ),

			/** Outline hover */
			'--outline-button-hover-color:' . ( $settings['outline_hover_color'] ?? $default_settings['outline_hover_color'] ),
			'--outline-button-hover-background-color:' . ( $settings['outline_hover_background_color'] ?? $default_settings['outline_hover_background_color'] ),
			'--outline-button-hover-box-shadow:' . StylesDataHelpers::get_box_shadow_css( $settings['outline_hover_box_shadow'] ?? $default_settings['outline_hover_box_shadow'] ),
			'--outline-button-box-shadow:' . StylesDataHelpers::get_box_shadow_css( $settings['outline_box_shadow'] ?? $default_settings['outline_box_shadow'] ),

			/** Secondary normal */
			'--secondary-button-color:' . ( $settings['secondary_color'] ?? $default_settings['secondary_color'] ),
			'--secondary-button-background-color:' . ( $settings['secondary_background_color'] ?? $default_settings['secondary_background_color'] ),
			'--secondary-button-border-color:' . ( $settings['secondary_border_color'] ?? $default_settings['secondary_border_color'] ),
			'--secondary-button-border-width:' . StylesDataHelpers::get_dimension_css( $settings['secondary_border_width'] ?? $default_settings['secondary_border_width'] ),
			'--secondary-button-border-style:' . ( $settings['secondary_border_style'] ?? $default_settings['secondary_border_style'] ),
			'--secondary-button-box-shadow:' . StylesDataHelpers::get_box_shadow_css( $settings['secondary_box_shadow'] ?? $default_settings['secondary_box_shadow'] ),

			/** Secondary hover */
			'--secondary-button-hover-color:' . ( $settings['secondary_hover_color'] ?? $default_settings['secondary_hover_color'] ),
			'--secondary-button-hover-background-color:' . ( $settings['secondary_hover_background_color'] ?? $default_settings['secondary_hover_background_color'] ),
			'--secondary-button-hover-border-color:' . ( $settings['secondary_hover_border_color'] ?? $default_settings['secondary_hover_border_color'] ),
			'--secondary-button-hover-box-shadow:' . StylesDataHelpers::get_box_shadow_css( $settings['secondary_hover_box_shadow'] ?? $default_settings['secondary_hover_box_shadow'] ),
		);

		$css = 'body{' . implode( ';', $variables ) . '}';

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
		$button_settings  = get_theme_mod( self::get_option_key(), $default_settings );
		$button_settings  = Helpers::recursive_wp_parse_args( $button_settings, $default_settings );
		foreach ( array_keys( $button_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $button_settings[ $key ] );
			}
		}
		return $button_settings;
	}

	public static function save_settings( $data ) {

		$default_settings = self::get_default_settings();
		$button_settings  = Helpers::recursive_wp_parse_args( $data, $default_settings );

		foreach ( array_keys( $button_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $button_settings[ $key ] );
			}
		}

		set_theme_mod( self::get_option_key(), $button_settings );
	}

}
