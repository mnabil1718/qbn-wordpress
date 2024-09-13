<?php

namespace Brandy\Admin\PostEditor;

use Brandy\Traits\SingletonTrait;

class PostEditorSetup {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_scripts' ) );

		PostMetaServices::get_instance()->register_metae();
	}

	public function enqueue_scripts() {
		$screen = get_current_screen();
		if ( ! empty( $screen->is_block_editor ) ) {
			PostEditorVite::enqueue_vite( 'main.jsx', '3006' );
			wp_localize_script(
				'module/brandy-post-editor/main.jsx',
				'brandyBlockEditorData',
				array(
					'header_settings' => brandy_get_header_settings(),
					'footer_settings' => brandy_get_footer_settings(),
					'links'           => array(
						'customizer' => admin_url( 'customize.php' ),
					),
				)
			);
		}
	}
}
