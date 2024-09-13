<?php

use Brandy\Traits\SingletonTrait;

class FSEHandler {
	use SingletonTrait;

	protected $templates = array(
		'home'      => 'home-canvas.php',
		'404'       => '404-canvas.php',
		'single'    => 'single-canvas.php',
		'page'      => null,
		'index'     => null,
		'frontpage' => null,
		'archive'   => null,
		'taxonomy'  => null,
		'search'    => null,
	);

	protected function __construct() {
		foreach ( $this->templates as $template_name => $template_file ) {
			add_filter(
				"{$template_name}_template",
				function() use ( $template_file ) {

					$default_canvas = BRANDY_TEMPLATE_DIR . '/fse/templates/default-canvas.php';

					if ( null == $template_file ) {
						return $default_canvas;
					}

					$template_path = BRANDY_TEMPLATE_DIR . "/fse/templates/$template_file";
					if ( file_exists( $template_path ) ) {
						return $template_path;
					}
					return $default_canvas;
				}
			);
		}

		add_action( 'init', array( $this, 'register_block_patterns_and_categories' ) );
	}

	public function register_block_patterns_and_categories() {

		register_block_pattern_category( 'brandy', array( 'label' => __( 'Brandy', 'brandy' ) ) );
	}
}

FSEHandler::get_instance();
