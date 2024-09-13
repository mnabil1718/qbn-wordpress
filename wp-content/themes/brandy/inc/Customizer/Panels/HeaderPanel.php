<?php
/**
 * The Header Customizer Loader class is responsible for loading and
 * registering the customizer settings and controls for the Header Builder module.
 *
 * @package Brandy\Customizer
 * @since   1.0.0
 */

namespace Brandy\Customizer\Panels;

use Brandy\Abstracts\AbstractCustomizerModuleLoader;
use Brandy\Customizer\Layouts\HeaderRowSettings;
use Brandy\Customizer\Layouts\HeaderSettings;
use Brandy\Customizer\Layouts\ToggleOffCanvasSettings;
use Brandy\Traits\SingletonTrait;

/**
 * Register Header stuffs
 * Header panel and section are registered here
 */
class HeaderPanel extends AbstractCustomizerModuleLoader {

	use SingletonTrait;

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
				'id'                 => 'header',
				'title'              => __( 'Header', 'brandy' ),
				'description'        => '',
				'priority'           => 10,
				'type'               => 'brandy_panel',
			),
		);

		$configurations[] = array(
			'configuration_type' => 'section',
			'id'                 => 'header_settings',
			'title'              => __( 'Header', 'brandy' ),
			'panel'              => 'header',
			'type'               => 'brandy-section',
			'description_hidden' => true,
		);

		$configurations[] = array(
			'configuration_type' => 'control',
			'id'                 => 'header_settings',
			'label'              => __( 'Header', 'brandy' ),
			'section'            => 'header_settings',
			'type'               => 'brandy_settings',
			'input_attrs'        => array(
				'value' => '',
				'style' => 'display:none;',
			),
			'partial'            => false,
			'default'            => self::get_default_settings(),
			'transport'          => 'postMessage',
		);

		return $configurations;
	}

	/**
	 * Returns header default settings when initialize theme
	 *
	 * @return array
	 */
	public static function get_default_settings() {
		return array(
			'current_template_id' => 'preset_default',
			'templates'           => array(
				self::get_default_template(),
			),
		);
	}

	/**
	 * Returns header default template settings
	 *
	 * @return array
	 */
	public static function get_default_template() {
		$preset_default_path = BRANDY_TEMPLATE_DIR . '/inc/Presets/Header/preset_default.json';
		if ( file_exists( $preset_default_path ) ) {
			$template_data = json_decode( self::replace_preset_placeholder( file_get_contents( $preset_default_path ) ), true ); //phpcs:ignore
		} else {
			$template_data = array(
				'id'                 => 'preset_default',
				'elements'           => array_filter(
					apply_filters( 'brandy_elements', array() ),
					function( $element ) {
						return in_array( 'header', $element['builders'], true );
					}
				),
				'placements'         => array(
					'desktop' => array(
						'top'    => array(
							array(),
							array(),
							array(),
						),
						'middle' => array(
							array(),
							array(),
							array(),
						),
						'bottom' => array(
							array(),
							array(),
							array(),
						),
						'toggle' => array(),
					),
					'mobile'  => array(
						'top'    => array(
							array(),
							array(),
							array(),
						),
						'middle' => array(
							array(),
							array(),
							array(),
						),
						'bottom' => array(
							array(),
							array(),
							array(),
						),
						'toggle' => array(),
					),
				),
				'settings'           => array_merge(
					HeaderSettings::get_instance()->get_settings(),
					array(
						'name' => __( 'Default Header', 'brandy' ),
					)
				),
				'row_configurations' => array(
					'top'    => HeaderRowSettings::get_instance()->get_settings(),
					'middle' => HeaderRowSettings::get_instance()->get_settings(),
					'bottom' => HeaderRowSettings::get_instance()->get_settings(),
					'toggle' => ToggleOffCanvasSettings::get_instance()->get_settings(),
				),
			);
		}

		return apply_filters( 'migrated_header_template', $template_data );

	}

	/**
	 * Return all presets settings
	 */
	public static function get_preset_settings() {
		$presets_settings = array();

		$presets = array( 'preset_default', 'preset_1', 'preset_3', 'preset_4', 'preset_7', 'preset_11' );
		foreach ( $presets as $preset_key ) {
			$path_to_preset = BRANDY_TEMPLATE_DIR . "/inc/Presets/Header/$preset_key.json";
			if ( ! file_exists( $path_to_preset ) ) {
				continue;
			}
			$preset_data = json_decode( self::replace_preset_placeholder( file_get_contents( $path_to_preset ) ), true ); //phpcs:ignore
			$presets_settings[ $preset_key ] = apply_filters( 'migrated_header_template', $preset_data );
		}

		return apply_filters( 'brandy_header_presets', $presets_settings );
	}

	/**
	 * Replace presest placeholders with contents
	 *
	 * @param string $str Given preset string
	 *
	 * @return string
	 */
	private static function replace_preset_placeholder( $str ) {
		$final_content = $str;
		$final_content = str_replace( '{{yaycommerce-logo-desktop}}', 'http://img.wpbrandy.com/uploads/yaycommerce-logo-desktop.png', $final_content );
		$final_content = str_replace( '{{yaycommerce-logo-tablet}}', 'http://img.wpbrandy.com/uploads/yaycommerce-logo-tablet.png', $final_content );
		$final_content = str_replace( '{{preset-4-top-bg-image}}', 'http://img.wpbrandy.com/uploads/preset-4-bg-image.png', $final_content );
		return $final_content;
	}

}
