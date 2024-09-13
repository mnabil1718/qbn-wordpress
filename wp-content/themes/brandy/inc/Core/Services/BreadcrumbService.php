<?php

namespace Brandy\Core\Services;

use Brandy\Customizer\Panels\General\BreadcrumbSettingsSection;
use Brandy\DynamicCss;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;
use Brandy\Utils\StylesDataHelpers;

/**
 * Breadcrumb Service
 */
class BreadcrumbService {
	use SingletonTrait;

	/**
	 * Returns theme mode option key
	 *
	 * @return string
	 */
	public static function get_option_key() {
		return BreadcrumbSettingsSection::SECTION_ID;
	}

	/**
	 * Returns default settings
	 *
	 * @return array
	 * @example Returns object with these value
	 * array(
	 * 'separator_type' => string,
	 * 'typography' => any,
	 * 'text_color' => any,
	 * 'container_background_color' => any,
	 * 'container_border_radius' => any,
	 * 'item_background_color' => any,
	 * 'item_border_radius' => any,
	 * 'item_spacing' => any,
	 *)
	 */
	public static function get_default_settings() {
		return array(
			'separator_type'             => 'type_1',
			'separator_color'            => '#5A6D80',
			'typography'                 => TypographyService::get_default_typography_value(
				array(
					'font_size' => array(
						'desktop' => array(
							'value' => 14,
						),
					),
				)
			),
			'text_color'                 => array(
				'normal' => 'var(--wp--preset--color--brandy-secondary-text)',
				'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
				'active' => 'var(--wp--preset--color--brandy-primary-text)',
			),
			'container_background_color' => '#ffffff00',
			'container_border_radius'    => array(
				'unit'  => 'px',
				'value' => 8,
				'min'   => 0,
				'max'   => 50,
			),
			'item_background_color'      => '#ffffff00',
			'item_border_radius'         => array(
				'unit'  => 'px',
				'value' => 8,
				'min'   => 0,
				'max'   => 50,
			),
			'item_padding'               => array(
				'unit'           => 'px',
				'top'            => 0,
				'right'          => 0,
				'bottom'         => 0,
				'left'           => 0,
				'is_constraints' => false,
			),
			'item_spacing'               => array(
				'desktop' => array(
					'unit'  => 'px',
					'value' => 10,
					'min'   => 5,
					'max'   => 30,
				),
				'tablet'  => null,
				'mobile'  => null,
			),
		);
	}

	/**
	 * Print out global css
	 */
	public static function print_css() {
		$settings = self::get_settings();

		echo wp_kses_post( StylesDataHelpers::get_typography_css( $settings['typography'], '--breadcrumb', 'html' ) );

		$css       = '';
		$variables = array(
			'--breadcrumb-separator-color:' . $settings['separator_color'],
			'--breadcrumb-text-color-normal:' . $settings['text_color']['normal'],
			'--breadcrumb-text-color-hover:' . $settings['text_color']['hover'],
			'--breadcrumb-text-color-active:' . $settings['text_color']['active'],
			'--breadcrumb-container-background-color:' . $settings['container_background_color'],
			'--breadcrumb-container-border-radius:' . StylesDataHelpers::get_dimension_css( $settings['container_border_radius'] ),
			'--breadcrumb-item-background-color:' . $settings['item_background_color'],
			'--breadcrumb-item-border-radius:' . StylesDataHelpers::get_dimension_css( $settings['item_border_radius'] ),
			'--breadcrumb-item-spacing:' . StylesDataHelpers::get_dimension_css( $settings['item_spacing']['desktop'] ),
			'--breadcrumb-item-padding:' . StylesDataHelpers::get_spacing_css( $settings['item_padding'] ),
		);

		$css .= 'body{' . implode( ';', $variables ) . '}';

		if ( ! empty( $settings['item_spacing']['tablet'] ) ) {
			$css .= DynamicCss::wrap_tablet_responsive( 'body{ --breadcrumb-item-spacing:' . StylesDataHelpers::get_dimension_css( $settings['item_spacing']['desktop'] ) . '}' );
		}

		if ( ! empty( $settings['item_spacing']['mobile'] ) ) {
			$css .= DynamicCss::wrap_mobile_responsive( 'body{ --breadcrumb-item-spacing:' . StylesDataHelpers::get_dimension_css( $settings['item_spacing']['mobile'] ) . '}' );
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
		$default_settings    = self::get_default_settings();
		$breadcrumb_settings = get_theme_mod( self::get_option_key(), $default_settings );
		$breadcrumb_settings = Helpers::recursive_wp_parse_args( $breadcrumb_settings, $default_settings );
		foreach ( array_keys( $breadcrumb_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $breadcrumb_settings[ $key ] );
			}
		}
		return $breadcrumb_settings;
	}

	public static function save_settings( $data ) {

		$default_settings    = self::get_default_settings();
		$breadcrumb_settings = Helpers::recursive_wp_parse_args( $data, $default_settings );

		foreach ( array_keys( $breadcrumb_settings ) as $key ) {
			if ( ! key_exists( $key, $default_settings ) ) {
				unset( $breadcrumb_settings[ $key ] );
			}
		}

		set_theme_mod( self::get_option_key(), $breadcrumb_settings );

		do_action( 'brandy_after_saving_breadcrumb_settings', $breadcrumb_settings );
	}

	public static function get_property( $name ) {
		$settings = self::get_settings();
		return isset( $settings[ $name ] ) ? $settings[ $name ] : null;
	}

	public static function get_delimiter_icon_list() {
		return array(
			'type_1' => '<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 5L1 9" stroke="#A1ABB7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'type_2' => '<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 5L1 9" stroke="#A1ABB7" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 1L9 5L5 9" stroke="#A1ABB7" stroke-linecap="round" stroke-linejoin="round"/></svg>',
			'type_3' => '<svg width="5" height="12" viewBox="0 0 5 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.00016 11.3695L4.00016 0.632872" stroke="#A1ABB7" stroke-linecap="round"/></svg>',
			'type_4' => '<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.00011 9.00004L3.00011 1.00004" stroke="#A1ABB7" stroke-linecap="round"/><path d="M3.00011 9.00004L5.00011 1.00004" stroke="#A1ABB7" stroke-linecap="round"/></svg>',
			'type_5' => '<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.5 10L5.5 5L0.5 2.18557e-07L0.5 10Z" fill="#A1ABB7"/></svg>',
		);
	}

	public static function get_delimiter_icon( $type = 'type_1' ) {
		$icons = self::get_delimiter_icon_list();
		if ( isset( $icons[ $type ] ) ) {
			return $icons[ $type ];
		}
		return $icons['type_1'];
	}

	public static function get_current_delimiter_icon() {
		$settings = self::get_settings();
		$type     = isset( $settings['separator_type'] ) ? $settings['separator_type'] : 'type_1';
		$icons    = self::get_delimiter_icon_list();
		if ( isset( $icons[ $type ] ) ) {
			return $icons[ $type ];
		}
		return $icons['type_1'];
	}


}
