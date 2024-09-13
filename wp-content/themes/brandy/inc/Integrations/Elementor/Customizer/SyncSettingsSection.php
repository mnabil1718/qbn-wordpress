<?php
/**
 * The Button Settings Section class is responsible for loading and
 * registering the customizer settings and controls for the Header Builder module.
 *
 * @package Brandy\Customizer
 * @since   1.0.0
 */

namespace Brandy\Integrations\Elementor\Customizer;

use Brandy\Abstracts\AbstractCustomizerModuleLoader;
use Brandy\Traits\SingletonTrait;

/**
 * Register Header stuffs
 * Header panel and section are registered here
 */
class SyncSettingsSection extends AbstractCustomizerModuleLoader {

	use SingletonTrait;

	public const SECTION_ID = 'elementor_override_settings';

	protected function __construct() {
		add_filter(
			'brandy_elementor_sections',
			function( $sections ) {
				return array_merge(
					$sections,
					array_filter(
						self::get_configurations(),
						function( $item ) {
							return 'section' === $item['configuration_type'];
						}
					)
				);
			}
		);
		add_filter(
			'brandy_elementor_default_settings',
			function( $settings ) {
				$settings[ self::SECTION_ID ] = '';
				return $settings;
			}
		);

		parent::__construct();
	}

	/**
	 * Returns module configurations
	 * Because this is the main loader, so return panel configurations
	 *
	 * @override
	 */
	public static function get_configurations() {
		$configurations[] = array(
			'configuration_type' => 'section',
			'id'                 => self::SECTION_ID,
			'title'              => __( 'Sync settings', 'brandy' ),
			'panel'              => ElementorPanel::PANEL_ID,
			'type'               => 'brandy-section',
			'description_hidden' => true,
		);

		$configurations[] = array(
			'configuration_type' => 'control',
			'id'                 => self::SECTION_ID,
			'label'              => __( 'Sync settings', 'brandy' ),
			'section'            => self::SECTION_ID,
			'type'               => 'brandy_settings',
			'input_attrs'        => array(
				'value' => '',
				'style' => 'display:none;',
			),
			'partial'            => false,
			'default'            => '',
			'transport'          => 'postMessage',
		);

		return $configurations;
	}

}
