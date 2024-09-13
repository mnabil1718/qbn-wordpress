<?php
/**
 * Register theme header functions
 *
 * @package Brandy\Functions
 */

use Brandy\Admin\PostEditor\MetaServices\HeaderTemplateMetaService;
use Brandy\Customizer\Panels\HeaderPanel;

if ( ! function_exists( 'brandy_header' ) ) {
	/**
	 * Render header
	 */
	function brandy_header() {
		do_action( 'brandy_header' );
	}
}

if ( ! function_exists( 'brandy_get_header_template' ) ) {
	/**
	 * Get current header template
	 */
	function brandy_get_header_template() {
		$header_settings          = get_theme_mod( 'header_settings' );
		$header_layout_meta_value = HeaderTemplateMetaService::get_value( brandy_get_current_page_id() );
		/**
		 * TODO: Need to apply migrated data when having new properties.
		 */
		if ( empty( $header_settings ) ) {
			$header_settings = HeaderPanel::get_default_settings();
		}
		$templates        = $header_settings['templates'];
		$default_template = null;
		$current_template = null;

		$meta_template_id = 'inherit';
		if ( 'inherit' !== $header_layout_meta_value ) {
			foreach ( $templates as $template ) {
				if ( $template['id'] === $header_layout_meta_value ) {
					$meta_template_id = $template['id'];
				}
			}
		}

		if ( is_customize_preview() ) {
			$template_id = $header_settings['preview_template_id'] ?? ( 'inherit' !== $meta_template_id ? $meta_template_id : $header_settings['current_template_id'] );
		} else {
			$template_id = 'inherit' !== $meta_template_id ? $meta_template_id : $header_settings['current_template_id'];
		}
		foreach ( $templates as $template ) {
			if ( 'preset_default' === $template['id'] ) {
				$default_template = $template;
			}
			if ( $template['id'] === $template_id ) {
				$current_template = $template;
			}
		}
		return empty( $current_template ) ? $default_template : $current_template;
	}
}

if ( ! function_exists( 'brandy_get_header_settings' ) ) {
	/**
	 * Get header settings
	 */
	function brandy_get_header_settings() {
		$header_settings = get_theme_mod( 'header_settings' );
		/**
		 * TODO: Need to apply migrated data when having new properties.
		 */
		if ( empty( $header_settings ) ) {
			$header_settings = HeaderPanel::get_default_settings();
		}
		return $header_settings;
	}
}

if ( ! function_exists( 'brandy_save_header_settings' ) ) {
	/**
	 * Save header settings
	 */
	function brandy_save_header_settings( $value ) {
		set_theme_mod( 'header_settings', $value );
	}
}
