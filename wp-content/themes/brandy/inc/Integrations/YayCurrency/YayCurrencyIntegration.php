<?php

namespace Brandy\Integrations\YayCurrency;

use Brandy\Traits\SingletonTrait;

class YayCurrencyIntegration {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'brandy-integration-yaycurrency-styles', BRANDY_TEMPLATE_URL . '/inc/Integrations/YayCurrency/assets/style.css', array(), BRANDY_VERSION );
	}
}
