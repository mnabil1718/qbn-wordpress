<?php

namespace Brandy\Integrations;

use Brandy\Integrations\Elementor\ElementorIntegration;
use Brandy\Integrations\YayCurrency\YayCurrencyIntegration;
use Brandy\Integrations\YayPricing\YayPricingIntegration;
use Brandy\Traits\SingletonTrait;

class IntegrationSetup {
	use SingletonTrait;

	protected function __construct() {
		YayCurrencyIntegration::get_instance();
		YayPricingIntegration::get_instance();
		ElementorIntegration::get_instance();
	}
}

IntegrationSetup::get_instance();
