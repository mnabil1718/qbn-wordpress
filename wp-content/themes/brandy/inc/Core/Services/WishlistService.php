<?php

namespace Brandy\Core\Services;

use Brandy\Customizer\Panels\WishlistPanel;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;
use Brandy\Utils\StylesDataHelpers;

/**
 * Wishlist Service
 */
class WishlistService {
	use SingletonTrait;

	/**
	 * Returns theme mode option key
	 *
	 * @return string
	 */
	public static function get_option_key() {
		return WishlistPanel::SETTING_ID;
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
			'add_to_wishlist_text'    => 'Add to wishlist',
			'already_in_package_text' => 'This product is already in your wishlist!',
			'added_text'              => 'Product added!',
			'view_wishlist_text'      => 'Browse wishlist',
			'wishlist_page'           => '',
			'icon_color'              => array(
				'normal' => 'var(--wp--preset--color--brandy-secondary-text)',
				'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
				'active' => 'var(--wp--preset--color--brandy-primary-text)',
			),
			'text_color'              => array(
				'normal' => 'var(--wp--preset--color--brandy-secondary-text)',
				'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
			),
		);
	}

	/**
	 * Print out global css
	 */
	public static function print_css() {
		$settings  = self::get_settings();
		$css       = '';
		$variables = array(
			'--brandy-global-wishlist-icon-color-normal:' . ( isset( $settings['icon_color']['normal'] ) ? $settings['icon_color']['normal'] : 'var(--wp--preset--color--brandy-secondary-text)' ),
			'--brandy-global-wishlist-icon-color-hover:' . ( isset( $settings['icon_color']['hover'] ) ? $settings['icon_color']['hover'] : 'var(--wp--preset--color--brandy-primary-text)' ),
			'--brandy-global-wishlist-icon-color-active:' . ( isset( $settings['icon_color']['active'] ) ? $settings['icon_color']['active'] : 'var(--wp--preset--color--brandy-primary-text)' ),
			'--brandy-global-wishlist-text-color-normal:' . ( isset( $settings['text_color']['normal'] ) ? $settings['text_color']['normal'] : 'var(--wp--preset--color--brandy-secondary-text)' ),
			'--brandy-global-wishlist-text-color-hover:' . ( isset( $settings['text_color']['hover'] ) ? $settings['text_color']['hover'] : 'var(--wp--preset--color--brandy-primary-text)' ),
		);

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
