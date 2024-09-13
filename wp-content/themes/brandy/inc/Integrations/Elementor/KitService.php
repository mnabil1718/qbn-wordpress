<?php

namespace Brandy\Integrations\Elementor;

use Brandy\Traits\SingletonTrait;

class KitService {
	use SingletonTrait;

	protected function __construct() {
	}

	public function register_global_colors() {
		if ( ! is_elementor_installed() ) {
			return;
		}

		$kit_settings = $this->get_settings();
		if ( empty( $kit_settings ) ) {
			return;
		}

		$system_colors = $kit_settings['system_colors'];
		if ( empty( $system_colors ) ) {
			return;
		}

		$kit_settings['system_colors'] = $system_colors;

		$this->save_settings( $kit_settings );
	}

	public function get_current_kit() {
		return \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend();
	}

	public function get_settings() {
		$kit = $this->get_current_kit();
		if ( empty( $kit ) ) {
			return null;
		}
		return $kit->get_settings();
	}

	public function save_settings( $settings ) {
		$kit = $this->get_current_kit();
		if ( empty( $kit ) ) {
			return;
		}
		$kit->save(
			array(
				'settings' => $settings,
			)
		);
	}

	private function get_external_colors_definition() {
		return array();
	}

	public function override_button_settings( &$kit_settings ) {
		// $border_radius                              = array(
		// 	'unit'   => $brandy_border_radius['unit'],
		// 	'top'    => $brandy_border_radius['value'],
		// 	'left'   => $brandy_border_radius['value'],
		// 	'right'  => $brandy_border_radius['value'],
		// 	'bottom' => $brandy_border_radius['value'],
		// );
		// $kit_settings['button_border_radius']       = $border_radius;
		// $kit_settings['button_hover_border_radius'] = $border_radius;
		// $kit_settings['button_padding']             = $padding;
		// $kit_settings['__globals__']['button_text_color']             = 'globals/colors?id=brandy_button_color_normal';
		// $kit_settings['__globals__']['button_hover_text_color']       = 'globals/colors?id=brandy_button_color_hover';
		// $kit_settings['__globals__']['button_background_color']       = 'globals/colors?id=brandy_button_background_normal';
		// $kit_settings['__globals__']['button_hover_background_color'] = 'globals/colors?id=brandy_button_background_hover';
	}

	public function override_kit_settings( $sync_items = array( 'button' ) ) {
		if ( ! is_elementor_installed() ) {
			return;
		}

		$kit_settings = $this->get_settings();

		if ( in_array( 'button', $sync_items, true ) ) {
			$this->override_button_settings( $kit_settings );
		}

		$this->save_settings( $kit_settings );
	}
}
