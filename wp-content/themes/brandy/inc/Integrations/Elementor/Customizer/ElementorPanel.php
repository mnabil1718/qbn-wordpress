<?php
/**
 * The Elementor Panel class is responsible for loading and
 * registering the customizer settings and controls for the Header Builder module.
 *
 * @package Brandy\Customizer
 * @since   1.0.0
 */

namespace Brandy\Integrations\Elementor\Customizer;

use Brandy\Abstracts\AbstractCustomizerModuleLoader;
use Brandy\Integrations\Elementor\ElementorService;
use Brandy\Traits\SingletonTrait;

/**
 * Register Header stuffs
 * Header panel and section are registered here
 */
class ElementorPanel extends AbstractCustomizerModuleLoader {

	use SingletonTrait;

	public const PANEL_ID = 'elementor-settings';

	public const SECTION_ID = 'elementor_settings';

	protected function __construct() {

		if ( ! function_exists( 'is_elementor_installed' ) || ! is_elementor_installed() ) {
			return;
		}

		parent::__construct();

		SyncSettingsSection::get_instance();
		add_filter( 'brandy_extra_localize', array( $this, 'add_localize_data' ) );
		add_filter( 'brandy_customizer_extra_panels', array( $this, 'register_extra_panels' ) );

	}

	public function register_extra_panels( $panels ) {
		$panels[] = array(
			'id'    => self::PANEL_ID,
			'title' => __( 'Elementor', 'brandy' ),
		);
		return $panels;
	}

	/**
	 * Returns module configurations
	 * Because this is the main loader, so return panel configurations
	 *
	 * @override
	 */
	public static function get_configurations() {
		$configurations = array(
			array(
				'configuration_type' => 'panel',
				'id'                 => self::PANEL_ID,
				'title'              => __( 'Elementor', 'brandy' ),
				'description'        => '',
				'priority'           => 10,
				'type'               => 'brandy_panel',
			),
			array(
				'configuration_type' => 'section',
				'id'                 => self::SECTION_ID,
				'title'              => __( 'Colors', 'brandy' ),
				'panel'              => self::PANEL_ID,
				'type'               => 'brandy-section',
				'description_hidden' => true,
			),
			array(
				'configuration_type' => 'control',
				'id'                 => self::SECTION_ID,
				'label'              => __( 'Colors', 'brandy' ),
				'section'            => self::SECTION_ID,
				'type'               => 'brandy_settings',
				'input_attrs'        => array(
					'value' => '',
					'style' => 'display:none;',
				),
				'partial'            => false,
				'default'            => ElementorService::get_default_settings(),
				'transport'          => 'postMessage',
			),
		);

		return $configurations;
	}

	public function add_localize_data( $data ) {
		$data['elementor'] = array(
			'sections'         => apply_filters( 'brandy_elementor_sections', array() ),
			'default_settings' => apply_filters( 'brandy_elementor_default_settings', array() ),
		);
		return $data;
	}

}
