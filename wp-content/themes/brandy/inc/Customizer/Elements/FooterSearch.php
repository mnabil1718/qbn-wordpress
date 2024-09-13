<?php

namespace Brandy\Customizer\Elements;

use Brandy\Traits\SingletonTrait;

class FooterSearch extends BaseSearch {

	use SingletonTrait;

	protected $builders = array( 'footer' );

	protected $element_id = 'footer_search';

	protected function register_components() {
		$parent_components               = parent::register_components();
		$components                      = $parent_components;
		$components['live_results_type'] = array(
			'type'               => 'LiveResultsType',
			'default_value'      => 'type_1',
			'value_path'         => array( 'live_results', 'type' ),
			'render_options'     => array(
				'type' => 'force_refresh',
			),
			'options'            => array(
				array(
					'label' => __( 'Panel sidebar - list product view', 'brandy' ),
					'value' => 'type_1',
				),
				array(
					'label' => __( 'Panel sidebar - grid product view', 'brandy' ),
					'value' => 'type_2',
				),
				array(
					'label' => __( 'Panel Full-screen - grid product view', 'brandy' ),
					'value' => 'type_3',
				),
			),
			'visible_conditions' => array(
				array(
					'value_path' => array( 'live_results', 'enabled' ),
					'value'      => true,
				),
			),
		);
		return $components;
	}

}
