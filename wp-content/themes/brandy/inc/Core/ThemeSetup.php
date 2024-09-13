<?php

namespace Brandy\Core;

use Brandy\Traits\SingletonTrait;

class ThemeSetup {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'init', array( $this, 'register_menus' ) );
		add_action( 'after_setup_theme', array( $this, 'add_theme_supports' ) );
		add_action( 'after_setup_theme', array( $this, 'reset_preview_template' ) );
	}

	public function add_theme_supports() {
		add_theme_support( 'customize-selective-refresh-widgets' );
		// add_theme_support( 'menus' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support(
			'woocommerce',
			apply_filters(
				'brandy_theme_support_woocommerce_args',
				array(
					'thumbnail_image_width' => 800,
					'single_image_width'    => 800,
				)
			)
		);
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'custom-background', array() );
		add_theme_support( 'custom-header', array() );
		add_theme_support( 'custom-logo', array() );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'post-thumbnails' );

	}

	public static function get_locations() {
		return array_merge(
			self::get_main_locations(),
			self::get_header_locations(),
			self::get_footer_locations()
		);
	}

	public static function get_main_locations() {
		return array(
			'primary-menu'   => __( 'Primary Menu', 'brandy' ),
			'secondary-menu' => __( 'Secondary Menu', 'brandy' ),
		);
	}

	public static function get_header_locations() {
		return array(
			'header-menu-1' => __( 'Header Menu 1', 'brandy' ),
			'header-menu-2' => __( 'Header Menu 2', 'brandy' ),
		);
	}

	public static function get_footer_locations() {
		return array(
			'footer-menu-1' => __( 'Footer Menu 1', 'brandy' ),
			'footer-menu-2' => __( 'Footer Menu 2', 'brandy' ),
		);
	}

	public function register_menus() {
		register_nav_menus(
			self::get_locations()
		);
	}

	public function reset_preview_template() {
		if ( is_customize_preview() ) {
			return;
		}
		$header_settings                        = brandy_get_header_settings();
		$footer_settings                        = brandy_get_footer_settings();
		$header_settings['preview_template_id'] = $header_settings['current_template_id'];
		$footer_settings['preview_template_id'] = $footer_settings['current_template_id'];

		brandy_save_header_settings( $header_settings );
		brandy_save_footer_settings( $footer_settings );
	}
}

ThemeSetup::get_instance();
