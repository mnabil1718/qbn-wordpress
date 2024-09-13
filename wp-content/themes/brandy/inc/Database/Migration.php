<?php

namespace Brandy\Database;

use Brandy\Customizer\Layouts\FooterRowSettings;
use Brandy\Customizer\Layouts\FooterSettings;
use Brandy\Customizer\Layouts\HeaderRowSettings;
use Brandy\Customizer\Layouts\HeaderSettings;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;

class Migration {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'after_setup_theme', array( $this, 'do_migration' ) );
		add_filter( 'migrated_header_template', array( $this, 'migrate_header_template' ) );
		add_filter( 'migrated_footer_template', array( $this, 'migrate_footer_template' ) );
	}

	public function do_migration() {
		$current_version = wp_get_theme()->get( 'Version' );
		$old_version     = get_option( 'brandy_theme_version' );

		if ( $old_version !== $current_version ) {
			update_option( 'brandy_theme_version', $current_version );
			$this->migrate_data();
		}
	}

	public function migrate_data() {

		$header_settings = get_theme_mod( 'header_settings' );
		if ( ! empty( $header_settings['templates'] ) ) {
			foreach ( array_keys( $header_settings['templates'] ) as $template_index ) {
				$header_settings['templates'][ $template_index ] = apply_filters( 'migrated_header_template', $header_settings['templates'][ $template_index ] );
			}
			set_theme_mod( 'header_settings', $header_settings );
		}

		/**
		 * Footer settings
		 */

		 $footer_settings = get_theme_mod( 'footer_settings' );
		if ( ! empty( $footer_settings['templates'] ) ) {
			foreach ( array_keys( $footer_settings['templates'] ) as $template_index ) {
				$footer_settings['templates'][ $template_index ] = apply_filters( 'migrated_footer_template', $footer_settings['templates'][ $template_index ] );
			}
			set_theme_mod( 'footer_settings', $footer_settings );
		}
	}

	public function migrate_header_template( $settings ) {

		if ( empty( $settings ) ) {
			return $settings;
		}

		$elements = apply_filters( 'brandy_elements', array() );

		/**
		 * Header settings
		 */
		$header_elements = array_filter(
			$elements,
			function( $element ) {
				return in_array( 'header', $element['builders'], true );
			}
		);

		$settings['elements'] = ! isset( $settings['elements'] ) ? array() : $settings['elements'];

		$settings['elements'] = Helpers::recursive_wp_parse_args( $settings['elements'], $header_elements );
		$settings['settings'] = Helpers::recursive_wp_parse_args( $settings['settings'], HeaderSettings::get_instance()->get_settings() );
		// $row_configurations   = HeaderRowSettings::get_instance()->get_settings();
		// foreach ( array( 'top', 'bottom', 'middle', 'toggle' ) as $row ) {
		// 	$settings['row_configurations'][ $row ] = Helpers::recursive_wp_parse_args( $settings['row_configurations'][ $row ], $row_configurations );
		// }

		return $settings;
	}

	public function migrate_footer_template( $settings ) {
		if ( empty( $settings ) ) {
			return $settings;
		}

		$elements = apply_filters( 'brandy_elements', array() );

		/**
		 * Footer settings
		 */
		$footer_elements = array_filter(
			$elements,
			function( $element ) {
				return in_array( 'footer', $element['builders'], true );
			}
		);

		$settings['elements'] = ! isset( $settings['elements'] ) ? array() : $settings['elements'];

		$settings['elements'] = Helpers::recursive_wp_parse_args( $settings['elements'], $footer_elements );
		$settings['settings'] = Helpers::recursive_wp_parse_args( $settings['settings'], FooterSettings::get_instance()->get_settings() );
		$row_configurations   = FooterRowSettings::get_instance()->get_settings();
		foreach ( array( 'top', 'bottom', 'middle' ) as $row ) {
			$settings['row_configurations'][ $row ] = Helpers::recursive_wp_parse_args( $settings['row_configurations'][ $row ], $row_configurations );
		}

		return $settings;
	}

}

Migration::get_instance();
