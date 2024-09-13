<?php

namespace Brandy\Abstracts;

use Brandy\Admin\PostEditor\MetaServices\FooterTemplateMetaService;
use Brandy\Admin\PostEditor\MetaServices\HeaderTemplateMetaService;

abstract class AbstractNicheSetup {

	public const NICHE_ID = '';

	public const ROOT_PATH = '';

	public const ROOT_URL = '';

	protected const JSON_FILE = '';

	protected const REPLACED_HEADERS = array();

	protected const REPLACED_FOOTERS = array();

	protected function __construct() {
		add_action( 'init', array( $this, 'init_action' ) );
	}

	public function init_action() {
		add_action( 'brandy_after_import_menus', array( $this, 'after_import_menus' ), 10, 2 );
		if ( self::is_current_niche() ) {
			add_filter( 'wp_theme_json_data_theme', array( $this, 'make_json_as_default' ) );
			add_filter( 'get_block_templates', array( $this, 'replace_templates' ), 10, 3 );
			add_filter( 'get_block_templates', array( $this, 'replace_editor_template_part' ), 10, 3 );
			add_filter( 'get_block_file_template', array( $this, 'replace_block_template_part' ), 10, 3 );
			$this->register_patterns();
		}

		add_action( 'brandy_after_' . static::NICHE_ID . '_import_header', array( $this, 'after_import_header' ) );
		add_action( 'brandy_after_' . static::NICHE_ID . '_import_footer', array( $this, 'after_import_footer' ) );

	}

	abstract public static function get_niche_data();

	public function after_import_menus( $niche_id, $menus = array() ) {
		if ( static::NICHE_ID !== $niche_id ) {
			return;
		}
		$locations = get_nav_menu_locations();
		foreach ( $menus as $menu_info ) {
			if ( empty( $menu_info['locations'] ) ) {
				continue;
			}
			foreach ( $menu_info['locations'] as $location ) {
				$locations[ $location ] = $menu_info['id'];
			}
		}
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	public function make_json_as_default( $theme_json ) {
		$niche_json_file = static::JSON_FILE;
		$niche_json_data = json_decode( file_get_contents( $niche_json_file ), true );
		return $theme_json->update_with( $niche_json_data );
	}

	public static function is_current_niche() {
		return brandy_is_current_niche( static::NICHE_ID );
	}

	public function after_import_header() {

		if ( isset( static::REPLACED_HEADERS['main'] ) ) {
			$builder_settings = brandy_get_header_settings();
			$main_template_id = static::REPLACED_HEADERS['main'];

			foreach ( $builder_settings['templates'] as $template ) {
				if ( $main_template_id === $template['id'] ) {
					$builder_settings['current_template_id'] = $main_template_id;
				}
			}

			set_theme_mod( 'header_settings', $builder_settings );
		}

		if ( isset( static::REPLACED_HEADERS['checkout'] ) ) {
			HeaderTemplateMetaService::assign_meta_value( brandy_get_checkout_page_id(), static::REPLACED_HEADERS['checkout'] );
		}
	}
	public function after_import_footer() {

		if ( isset( static::REPLACED_FOOTERS['main'] ) ) {
			$builder_settings = brandy_get_footer_settings();
			$main_template_id = static::REPLACED_FOOTERS['main'];

			foreach ( $builder_settings['templates'] as $template ) {
				if ( $main_template_id === $template['id'] ) {
					$builder_settings['current_template_id'] = $main_template_id;
				}
			}

			set_theme_mod( 'footer_settings', $builder_settings );
		}

		if ( isset( static::REPLACED_FOOTERS['checkout'] ) ) {
			FooterTemplateMetaService::assign_meta_value( brandy_get_checkout_page_id(), static::REPLACED_FOOTERS['checkout'] );
		}
	}

	public function register_patterns() {

		$path_to_patterns = static::ROOT_PATH . '/patterns';
		if ( ! file_exists( $path_to_patterns ) ) {
			return;
		}

		$dir  = new \DirectoryIterator( $path_to_patterns );
		$dirs = array();
		foreach ( $dir as $fileinfo ) {
			if ( ! $fileinfo->isDot() ) {
				$dirs[] = $fileinfo->getPath() . '/' . $fileinfo->getFilename();
			}
		}
		foreach ( $dirs as $file_path ) {

			if ( ! file_exists( $file_path ) ) {
				continue;
			}

			$file_info = pathinfo( $file_path );

			if ( 'php' !== $file_info['extension'] ) {
				continue;
			}

			$pattern_info = get_file_data(
				$file_path,
				array(
					'title'         => 'Title',
					'slug'          => 'Slug',
					'categories'    => 'Categories',
					'viewportWidth' => 'Viewport width',
				)
			);

			$pattern_info['categories'] = explode( ', ', $pattern_info['categories'] ?? '' );

			ob_start();
			require $file_path;
			$pattern_info['content'] = ob_get_contents();
			ob_end_clean();

			register_block_pattern(
				$pattern_info['slug'],
				$pattern_info
			);
		}

	}

	public static function get_templates() {

		$path_to_templates = static::ROOT_PATH . '/templates';
		if ( ! file_exists( $path_to_templates ) ) {
			return array();
		}

		$templates = array();
		$dir       = new \DirectoryIterator( $path_to_templates );
		$dirs      = array();
		foreach ( $dir as $fileinfo ) {
			if ( ! $fileinfo->isDot() ) {
				$dirs[] = $fileinfo->getPath() . '/' . $fileinfo->getFilename();
			}
		}
		foreach ( $dirs as $file_path ) {

			if ( ! file_exists( $file_path ) ) {
				continue;
			}

			$file_info = pathinfo( $file_path );

			$slug = basename( $file_info['basename'], '.html' );

			$templates[ $slug ] = $file_path;
		}

		return $templates;
	}

	public static function get_parts() {

		$path_to_parts = static::ROOT_PATH . '/parts';
		if ( ! file_exists( $path_to_parts ) ) {
			return array();
		}

		$parts = array();
		$dir   = new \DirectoryIterator( $path_to_parts );
		$dirs  = array();
		foreach ( $dir as $fileinfo ) {
			if ( ! $fileinfo->isDot() ) {
				$dirs[] = $fileinfo->getPath() . '/' . $fileinfo->getFilename();
			}
		}
		foreach ( $dirs as $file_path ) {

			if ( ! file_exists( $file_path ) ) {
				continue;
			}

			$file_info = pathinfo( $file_path );

			$slug = basename( $file_info['basename'], '.html' );

			$parts[ $slug ] = $file_path;
		}

		return $parts;
	}

	public function replace_templates( $query_result, $query, $template_type ) {

		if ( 'wp_template' !== $template_type ) {
			return $query_result;
		}

		$templates = self::get_templates();

		foreach ( $query_result as $index => $wp_block_template ) {

			if ( $wp_block_template->wp_id != null ) {
				continue;
			}

			if ( ! in_array( $wp_block_template->slug, array_keys( $templates ), true ) ) {
				continue;
			}

			if ( ! file_exists( $templates[ $wp_block_template->slug ] ) ) {
				continue;
			}

			ob_start();
			require $templates[ $wp_block_template->slug ];
			$query_result[ $index ]->content = ob_get_contents();
			ob_end_clean();

		}

		return $query_result;

	}

	public function replace_editor_template_part( $query_result, $query, $template_type ) {

		if ( 'wp_template_part' !== $template_type ) {
			return $query_result;
		}

		$parts = self::get_parts();

		foreach ( $query_result as $index => $wp_block_template ) {

			if ( $wp_block_template->wp_id != null ) {
				continue;
			}

			if ( ! isset( $wp_block_template->slug ) ) {
				continue;
			}

			if ( ! in_array( $wp_block_template->slug, array_keys( $parts ), true ) ) {
				continue;
			}

			if ( ! file_exists( $parts[ $wp_block_template->slug ] ) ) {
				continue;
			}

			ob_start();
			require $parts[ $wp_block_template->slug ];
			$query_result[ $index ]->content = ob_get_contents();
			ob_end_clean();

		}

		return $query_result;
	}

	public function replace_block_template_part( $block_template, $id, $template_type ) {

		if ( 'wp_template_part' !== $template_type ) {
			return $block_template;
		}

		if ( ! isset( $block_template->slug ) ) {
			return $block_template;
		}

		$parts = self::get_parts();

		if ( ! in_array( $block_template->slug, array_keys( $parts ), true ) ) {
			return $block_template;
		}
		if ( ! file_exists( $parts[ $block_template->slug ] ) ) {
			return $block_template;
		}

		ob_start();
		require $parts[ $block_template->slug ];
		$block_template->content = ob_get_contents();
		ob_end_clean();

		return $block_template;
	}

}
