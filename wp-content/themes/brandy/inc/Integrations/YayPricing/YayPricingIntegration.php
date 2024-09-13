<?php

namespace Brandy\Integrations\YayPricing;

use Brandy\Traits\SingletonTrait;

class YayPricingIntegration {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'brandy-integration-yaypricing-styles', BRANDY_TEMPLATE_URL . '/inc/Integrations/YayPricing/assets/style.css', array(), BRANDY_VERSION );
	}
}
