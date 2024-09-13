<?php
/**
 * The FooterPanel class is responsible for loading and
 * registering the customizer settings and controls for the Footer Builder module.
 *
 * @package Brandy\Customizer
 * @since   1.0.0
 */

namespace Brandy\Customizer\Panels;

use Brandy\Abstracts\AbstractCustomizerModuleLoader;
use Brandy\Customizer\Layouts\FooterRowSettings;
use Brandy\Customizer\Layouts\FooterSettings;
use Brandy\Traits\SingletonTrait;

/**
 * Declare
 */
class FooterPanel extends AbstractCustomizerModuleLoader {

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
				'id'                 => 'footer',
				'title'              => __( 'Footer', 'brandy' ),
				'description'        => '',
				'priority'           => 10,
				'type'               => 'brandy_panel',
			),
		);

		$configurations[] = array(
			'configuration_type' => 'section',
			'id'                 => 'footer_settings',
			'title'              => __( 'Footer', 'brandy' ),
			'panel'              => 'footer',
			'type'               => 'brandy-section',
			'description_hidden' => true,
		);

		$configurations[] = array(
			'configuration_type' => 'control',
			'id'                 => 'footer_settings',
			'label'              => __( 'Footer', 'brandy' ),
			'section'            => 'footer_settings',
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

	public static function get_default_settings() {
		return array(
			'current_template_id' => 'preset_default',
			'templates'           => array(
				self::get_default_template(),
			),
		);
	}

	public static function get_default_template() {
		$preset_default_path = BRANDY_TEMPLATE_DIR . '/inc/Presets/Footer/preset_default.json';
		if ( file_exists( $preset_default_path ) ) {
			$template_data = json_decode( self::replace_preset_placeholder( file_get_contents( $preset_default_path ) ), true ); //phpcs:ignore
		} else {
			$row_settings                    = FooterRowSettings::get_instance()->get_settings();
			$row_1_settings                  = $row_settings;
			$row_1_settings['number_column'] = array(
				'desktop' => 2,
				'tablet'  => 2,
				'mobile'  => 2,
			);
			$row_2_settings                  = $row_settings;
			$row_2_settings['number_column'] = array(
				'desktop' => 3,
				'tablet'  => 3,
				'mobile'  => 3,
			);
			$row_3_settings                  = $row_settings;
			$row_3_settings['number_column'] = array(
				'desktop' => 1,
				'tablet'  => 1,
				'mobile'  => 1,
			);
			$template_data                   = array(
				'id'                 => 'preset_default',
				'elements'           => array_filter(
					apply_filters( 'brandy_elements', array() ),
					function( $element ) {
						return in_array( 'footer', $element['builders'], true );
					}
				),
				'placements'         => array(
					'desktop' => array(
						'top'    => array(
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
						),
					),
					'mobile'  => array(
						'top'    => array(
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
						),
					),
				),
				'settings'           => array_merge(
					FooterSettings::get_instance()->get_settings(),
					array(
						'name' => __( 'Default Footer', 'brandy' ),
					)
				),
				'row_configurations' => array(
					'top'    => $row_1_settings,
					'middle' => $row_2_settings,
					'bottom' => $row_3_settings,
				),
			);
		}

		return apply_filters( 'migrated_footer_template', $template_data );
	}

	/**
	 * Return all presets settings
	 */
	public static function get_preset_settings() {
		$presets_settings = array();

		$presets = array( 'preset_default', 'preset_1', 'preset_3', 'preset_5', 'preset_13', 'preset_15' );
		foreach ( $presets as $preset_key ) {
			$path_to_preset = BRANDY_TEMPLATE_DIR . "/inc/Presets/Footer/$preset_key.json";
			if ( ! file_exists( $path_to_preset ) ) {
				continue;
			}
			$preset_data = json_decode( self::replace_preset_placeholder( file_get_contents( $path_to_preset ) ), true ); //phpcs:ignore
			$presets_settings[ $preset_key ] = apply_filters( 'migrated_footer_template', $preset_data );
		}

		return apply_filters( 'brandy_footer_presets', $presets_settings );
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
