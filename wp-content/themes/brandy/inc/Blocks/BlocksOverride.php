<?php

namespace Brandy\Blocks;

use Brandy\Traits\SingletonTrait;

/**
 * Override Gutenberg blocks
 */
class BlocksOverride {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'after_setup_theme', array( $this, 'add_style_for_blocks' ) );

		$this->load_files();
	}

	public function add_style_for_blocks() {
		$styles = array(
			'core/calendar'                  => 'wp-calendar',
			'core/post-comments-form'        => 'wp-post-comments-form',
			'core/separator'                 => 'wp-separator',
			'core/table'                     => 'wp-table',
			'core/search'                    => 'wp-search',
			'core/post-terms'                => 'wp-post-terms',
			'core/post-navigation-link'      => 'wp-post-navigation-link',
			'core/post-template'             => 'wp-post-template',
			'core/categories'                => 'wp-categories',
			'core/button'                    => 'wp-button',
			'core/tag-cloud'                 => 'wp-tag-cloud',
			'core/gallery'                   => 'wp-gallery',
			'woocommerce/product-categories' => 'wc-product-categories',
		);

		foreach ( $styles as $block_name => $handle ) {
			if ( ! file_exists( BRANDY_TEMPLATE_DIR . '/inc/Blocks/Assets/' . $handle . '.css' ) ) {
				continue;
			}
			wp_enqueue_block_style(
				$block_name,
				array(
					'handle' => 'brandy/' . $handle,
					'src'    => BRANDY_TEMPLATE_URL . '/inc/Blocks/Assets/' . $handle . '.css',
					'ver'    => BRANDY_VERSION,
				)
			);
		}

	}

	public function load_files() {
		$platforms = array( 'Gutenberg', 'WooCommerce' );
		foreach ( $platforms as $platform ) {
			$dir  = new \DirectoryIterator( BRANDY_TEMPLATE_DIR . '/inc/Blocks/' . $platform );
			$dirs = array();
			foreach ( $dir as $fileinfo ) {
				if ( ! $fileinfo->isDot() ) {
					$dirs[] = $fileinfo->getFilename();
				}
			}
			foreach ( $dirs as $file_name ) {
				$file_basename = basename( $file_name, '.php' );
				$class         = "Brandy\Blocks\\$platform\\$file_basename";
				if ( ! class_exists( $class ) || ! is_callable( array( $class, 'get_instance' ) ) ) {
					continue;
				}

				call_user_func( array( $class, 'get_instance' ) );

			}
		}
	}
}

BlocksOverride::get_instance();
