<?php

namespace Brandy\Integrations\Elementor;

use Brandy\Integrations\Elementor\Customizer\ElementorPanel;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;

/**
 * Button Service
 */
class ElementorService {
	use SingletonTrait;

	/**
	 * Returns theme mode option key
	 *
	 * @return string
	 */
	public static function get_option_key() {
		return ElementorPanel::SECTION_ID;
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
			'sync_enabled' => true,
		);
	}

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

	public static function get_sync_enabled() {
		$settings = self::get_settings();
		return $settings['sync_enabled'] ?? true;
	}
}
