<?php

namespace Brandy\Niches;

use Brandy\Admin\Pages\Dashboard\ImportService;
use Brandy\Niches\WooCommerce\NicheSetup as WooCommerceNicheSetup;
use Brandy\Traits\SingletonTrait;

class NicheLoader {
	use SingletonTrait;

	private $niches = array();

	protected function __construct() {

		$this->register_niche( WooCommerceNicheSetup::get_instance() );

		do_action( 'brandy_sites_onload', $this );
	}

	public function register_niche( $niche_instance ) {
		$this->niches[] = $niche_instance;
	}

	public function get_niches( $with_count = false ) {

		$result = array();
		foreach ( $this->niches as $niche_instance ) {
			$result[ $niche_instance::NICHE_ID ] = $with_count ? ImportService::data_with_counting( $niche_instance::get_niche_data() ) : $niche_instance::get_niche_data();
		}
		return $result;
	}
}

NicheLoader::get_instance();
