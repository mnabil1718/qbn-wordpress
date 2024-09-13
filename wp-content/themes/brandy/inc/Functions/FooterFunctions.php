<?php
/**
 * Register theme footer functions
 *
 * @package Brandy\Functions
 */

use Brandy\Admin\PostEditor\MetaServices\FooterTemplateMetaService;
use Brandy\Customizer\Panels\FooterPanel;

if ( ! function_exists( 'brandy_footer' ) ) {
	/**
	 * Render footer
	 */
	function brandy_footer() {
		do_action( 'brandy_footer' );
	}
}

if ( ! function_exists( 'brandy_get_footer_template' ) ) {
	/**
	 * Get current footer template
	 */
	function brandy_get_footer_template() {
		$footer_settings          = get_theme_mod( 'footer_settings' );
		$footer_layout_meta_value = FooterTemplateMetaService::get_value( brandy_get_current_page_id() );
		if ( empty( $footer_settings ) ) {
			$footer_settings = FooterPanel::get_default_settings();
		}
		$templates        = $footer_settings['templates'];
		$default_template = null;
		$current_template = null;

		$meta_template_id = 'inherit';
		if ( 'inherit' !== $footer_layout_meta_value ) {
			foreach ( $templates as $template ) {
				if ( $template['id'] === $footer_layout_meta_value ) {
					$meta_template_id = $template['id'];
				}
			}
		}

		if ( is_customize_preview() ) {
			$template_id = $footer_settings['preview_template_id'] ?? ( 'inherit' !== $meta_template_id ? $meta_template_id : $footer_settings['current_template_id'] );
		} else {
			$template_id = 'inherit' !== $meta_template_id ? $meta_template_id : $footer_settings['current_template_id'];
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

if ( ! function_exists( 'brandy_get_footer_settings' ) ) {
	/**
	 * Get footer settings
	 */
	function brandy_get_footer_settings() {
		$footer_settings = get_theme_mod( 'footer_settings' );
		/**
		 * TODO: Need to apply migrated data when having new properties.
		 */
		if ( empty( $footer_settings ) ) {
			$footer_settings = FooterPanel::get_default_settings();
		}
		return $footer_settings;
	}
}

if ( ! function_exists( 'brandy_save_footer_settings' ) ) {
	/**
	 * Save footer settings
	 */
	function brandy_save_footer_settings( $value ) {
		set_theme_mod( 'footer_settings', $value );
	}
}

