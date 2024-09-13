<?php
/**
 * The Wishlist Panel class is responsible for loading and
 * registering the customizer settings and controls for the Header Builder module.
 *
 * @package Brandy\Customizer
 * @since   1.0.0
 */

namespace Brandy\Customizer\Panels;

use Brandy\Abstracts\AbstractCustomizerModuleLoader;
use Brandy\Core\Services\WishlistService;
use Brandy\Traits\SingletonTrait;

/**
 * Register Header stuffs
 * Header panel and section are registered here
 */
class WishlistPanel extends AbstractCustomizerModuleLoader {

	use SingletonTrait;

	public const PANEL_ID = 'wishlist-settings';

	public const SETTING_ID = 'wishlist_settings';

	protected function __construct() {

		parent::__construct();

		add_action( 'brandy_print_global_css', array( $this, 'print_wishlist_css' ) );
		add_filter( 'brandy_customizer_extra_panels', array( $this, 'register_extra_panels' ) );
	}

	public function register_extra_panels( $panels ) {
		$panels[] = array(
			'id'    => self::PANEL_ID,
			'title' => __( 'Wishlist', 'brandy' ),
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
				'title'              => __( 'Wishlist', 'brandy' ),
				'description'        => '',
				'priority'           => 10,
				'type'               => 'brandy_panel',
			),
		);

		$configurations[] = array(
			'configuration_type' => 'section',
			'id'                 => self::SETTING_ID,
			'title'              => __( 'Wishlist', 'brandy' ),
			'panel'              => self::PANEL_ID,
			'type'               => 'brandy-section',
			'description_hidden' => true,
		);

		$configurations[] = array(
			'configuration_type' => 'control',
			'id'                 => self::SETTING_ID,
			'label'              => __( 'Wishlist', 'brandy' ),
			'section'            => self::SETTING_ID,
			'type'               => 'brandy_settings',
			'input_attrs'        => array(
				'value' => '',
				'style' => 'display:none;',
			),
			'partial'            => false,
			'default'            => WishlistService::get_default_settings(),
			'transport'          => 'postMessage',
		);

		return $configurations;
	}

	public static function get_settings() {
		return WishlistService::get_settings();
	}
	public static function get_add_to_wishlist_text() {
		return self::get_settings()['add_to_wishlist_text'];
	}

	public static function get_already_in_package_text() {
		return self::get_settings()['already_in_package_text'];
	}

	public static function get_added_text() {
		return self::get_settings()['added_text'];
	}

	public static function get_wishlist_page() {
		return self::get_settings()['wishlist_page'];
	}

	public static function get_view_wishlist_text() {
		return self::get_settings()['view_wishlist_text'];
	}

	public static function print_wishlist_css() { ?>
		<style id="brandy-wishlist-variables">
		<?php
		WishlistService::print_css();
		?>
		</style>
		<?php
	}

}
