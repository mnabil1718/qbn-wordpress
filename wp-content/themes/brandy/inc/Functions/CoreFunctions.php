<?php
/**
 * Register theme global functions
 *
 * @package Brandy\Functions
 */

use Brandy\Core\ThemeSetup;
use Brandy\Customizer\Panels\FooterPanel;
use Brandy\Customizer\Panels\HeaderPanel;

if ( ! function_exists( 'brandy_register_configuration' ) ) {
	/**
	 * Register module for customizer
	 *
	 * @param \WP_Customize_Manager $manager Customize Manager.
	 * @param array                 $configuration {
	 * Module configuration.
	 * @type string     configuration_type  Config type.
	 * @type string     id                  Config id.
	 * @type string     label               Config label.
	 * @type string     type                Define class when panel/section is registered.
	 * @type any        default
	 * @type any        partial
	 * }
	 */
	function brandy_register_configuration( \WP_Customize_Manager $manager, $configuration ) {
		switch ( $configuration['configuration_type'] ) {
			case 'section':
				$method = 'add_section';
				break;
			case 'control':
				$method = 'add_control';
				break;
			default:
				$method = 'add_panel';
				break;
		}
		if ( 'control' === $configuration['configuration_type'] ) {
			$manager->add_setting(
				$configuration['id'],
				array(
					'default'   => $configuration['default'],
					'transport' => $configuration['transport'],
				)
			);
		}
		call_user_func( array( $manager, $method ), $configuration['id'], $configuration );
	}
}

if ( ! function_exists( 'is_block_editor_screen' ) ) {

	/**
	 * Check is block editor screen
	 *
	 * @return boolean
	 *
	 * @since 1.0
	 */
	function is_block_editor_screen() {
		if ( ! is_admin() ) {
			return false;
		}
		$screen = get_current_screen();
		if ( ! $screen->is_block_editor ) {
			return false;
		}
		return true;
	}
}

if ( ! function_exists( 'is_wc_installed' ) ) {

	/**
	 * Check whether WC is installed
	 *
	 * @return boolean
	 *
	 * @since 1.0
	 */
	function is_wc_installed() {
		return function_exists( 'WC' );
	}
}

if ( ! function_exists( 'is_elementor_installed' ) ) {

	/**
	 * Check whether Elementor is installed
	 *
	 * @return boolean
	 *
	 * @since 1.0
	 */
	function is_elementor_installed() {
		return class_exists( 'Elementor\Plugin' );
	}
}

if ( ! function_exists( 'is_bts_installed' ) ) {

	/**
	 * Check whether WC is installed
	 *
	 * @return boolean
	 *
	 * @since 1.0
	 */
	function is_bts_installed() {
		return defined( 'BRANDYSITES_VERSION' );
	}
}

if ( ! function_exists( 'is_brandy_blocks_installed' ) ) {

	/**
	 * Check whether Brandy blocks plugin is installed
	 *
	 * @return boolean
	 *
	 * @since 1.0
	 */
	function is_brandy_blocks_installed() {
		return defined( 'BRANDY_BLOCKS_VERSION' );
	}
}

if ( ! function_exists( 'brandy_get_reading_time' ) ) {

	/**
	 * Get reading time for given content.
	 * Calculate by minutes.
	 *
	 * @return string.
	 *
	 * @since 1.0
	 */
	function brandy_get_reading_time( $content = '' ) {
		$wordcount = str_word_count( wp_strip_all_tags( $content ) );

		$time = ceil( $wordcount / 250 ); // Default 250 words for 1 minute.

		$text = sprintf( '%1$s %2$s', $time, 1 >= $time ? __( 'minute', 'brandy' ) : __( 'minutes', 'brandy' ) );

		return $text;
	}
}

if ( ! function_exists( 'brandy_current_niche' ) ) {

	/**
	 * Get current site niche.
	 *
	 * @return string|boolean Current niche.
	 *
	 * @since 1.0
	 */
	function brandy_current_niche() {
		return get_option( 'brandy_current_niche', false );
	}
}

if ( ! function_exists( 'brandy_is_current_niche' ) ) {

	/**
	 * Check whether is current site niche.
	 *
	 * @return string|boolean Result.
	 *
	 * @since 1.0
	 */
	function brandy_is_current_niche( $niche ) {
		return brandy_current_niche() == $niche;
	}
}

if ( ! function_exists( 'brandy_get_template_part' ) ) {

	/**
	 * Get template part by niche.
	 * Allow developer to alter theme template part.
	 * Developer can alter part by function brandy_register_template_part.
	 *
	 * @param   string          $slug   Part slug.
	 * @param   string|null     $name   Template name.
	 * @param   array           $args   Same as get_template_part args
	 *
	 * @since 1.0
	 */
	function brandy_get_template_part( $slug, $name = \null, $args = array() ) {

		$template = $slug . ( ! empty( $name ) ? "-$name" : '' );

		$template_file = apply_filters( "brandy/$template", '' );

		if ( empty( $template_file ) || ! file_exists( $template_file ) ) {
			return get_template_part( $slug, $name, $args );
		}

		require $template_file;
	}
}

if ( ! function_exists( 'brandy_register_template_part' ) ) {

	/**
	 * Get register template part 3rd party.
	 * Allow developer to register template file to a specific part.
	 *
	 * @param   string          $slug   Part slug.
	 * @param   string|null     $name   Template name.
	 * @param   string          $file   Path to custom template file
	 *
	 * @since 1.0
	 */
	function brandy_register_template_part( $slug, $name, $file, $priority = 10 ) {

		if ( ! file_exists( $file ) ) {
			return;
		}

		$template = $slug . ( ! empty( $name ) ? "-$name" : '' );

		add_filter(
			"brandy/$template",
			function() use ( $file ) {
				return $file;
			},
			$priority
		);
	}
}

if ( ! function_exists( 'brandy_has_custom_template_part' ) ) {

	/**
	 * Check whether template part has been registered by 3rd party.
	 *
	 * @param   string          $slug   Part slug.
	 * @param   string|null     $name   Template name.
	 *
	 * @since 1.0
	 */
	function brandy_has_custom_template_part( $slug, $name = \null ) {

		$template = $slug . ( ! empty( $name ) ? "-$name" : '' );

		$action_name = "brandy/$template";

		$template_file = apply_filters( $action_name, '' );

		return ! empty( $template_file ) && file_exists( $template_file );
	}
}

if ( ! function_exists( 'brandy_get_blog_page_id' ) ) {
	/**
	 * Get blog page id.
	 * Returns null blog page isn't assigned.
	 *
	 * @return int|null Id for blog page
	 *
	 * @since 1.0
	 */
	function brandy_get_blog_page_id() {
		$show_on_front = get_option( 'show_on_front' );

		if ( 'page' !== $show_on_front ) {
			return null;
		}

		$blog_page_id = get_option( 'page_for_posts', null );

		return $blog_page_id;

	}
}

if ( ! function_exists( 'brandy_get_home_page_id' ) ) {
	/**
	 * Get home page id.
	 * Returns null home page isn't assigned.
	 *
	 * @return int|null Id for home page
	 *
	 * @since 1.0
	 */
	function brandy_get_home_page_id() {
		$show_on_front = get_option( 'show_on_front' );

		if ( 'page' !== $show_on_front ) {
			return null;
		}

		$home_page_id = get_option( 'page_on_front', null );

		return $home_page_id;

	}
}

if ( ! function_exists( 'brandy_is_home' ) ) {
	/**
	 * Check is homepage
	 *
	 * @return bool
	 *
	 * @since 1.0
	 */
	function brandy_is_home() {

		$home_page_id = brandy_get_home_page_id();

		return is_home() || ( brandy_get_current_page_id() == $home_page_id );

	}
}

if ( ! function_exists( 'brandy_get_blog_page_url' ) ) {
	/**
	 * Get blog page url.
	 * Returns # blog page isn't assigned.
	 *
	 * @return string Url for blog page
	 *
	 * @since 1.0
	 */
	function brandy_get_blog_page_url() {

		$blog_page_id = brandy_get_blog_page_id();

		if ( empty( $blog_page_id ) ) {
			return '#';
		}

		$url = add_query_arg( array( 'page_id' => $blog_page_id ), home_url() );

		return $url;
	}
}
if ( ! function_exists( 'brandy_get_shop_page_url' ) ) {
	/**
	 * Get shop page url.
	 * Returns # when WooCommerce is not installed.
	 *
	 * @return string Url for shop page
	 *
	 * @since 1.0
	 */
	function brandy_get_shop_page_url() {
		return function_exists( 'wc_get_page_permalink' ) ? \wc_get_page_permalink( 'shop' ) : '#';
	}
}
if ( ! function_exists( 'brandy_get_cart_page_url' ) ) {
	/**
	 * Get cart page url.
	 * Returns # when WooCommerce is not installed.
	 *
	 * @return string Url for cart page
	 *
	 * @since 1.0
	 */
	function brandy_get_cart_page_url() {
		return function_exists( 'wc_get_cart_url' ) ? \wc_get_cart_url() : '#';
	}
}
if ( ! function_exists( 'brandy_get_checkout_page_url' ) ) {
	/**
	 * Get checkout page url.
	 * Returns # when WooCommerce is not installed.
	 *
	 * @return string Url for checkout page
	 *
	 * @since 1.0
	 */
	function brandy_get_checkout_page_url() {
		return function_exists( 'wc_get_checkout_url' ) ? \wc_get_checkout_url() : '#';
	}
}
if ( ! function_exists( 'brandy_get_login_url' ) ) {
	/**
	 * Get login page url.
	 * Returns wp login page when WooCommerce is not installed.
	 *
	 * @return string Url for login page
	 *
	 * @since 1.0
	 */
	function brandy_get_login_url() {
		return function_exists( 'wc_get_account_endpoint_url' ) ? \wc_get_account_endpoint_url( 'dashboard' ) : wp_login_url();
	}
}

if ( ! function_exists( 'brandy_get_logout_url' ) ) {
	/**
	 * Get logout page url.
	 * Returns wp logout page when WooCommerce is not installed.
	 *
	 * @return string Url for logout page
	 *
	 * @since 1.0
	 */
	function brandy_get_logout_url() {
		return function_exists( 'wc_get_account_endpoint_url' ) ? \wc_get_account_endpoint_url( 'customer-logout' ) : wp_logout_url();
	}
}

if ( ! function_exists( 'brandy_get_nav_menu_name' ) ) {
	/**
	 * Returns menu name.
	 * If menu doesn't exist, find menu name based on where the menu is placing (Header/Footer).
	 *
	 * @param string $menu_name Menu name to check exists
	 * @param string $builder Header or Footer builder
	 * @return string Menu name
	 *
	 * @since 1.0
	 */
	function brandy_get_nav_menu_name( $menu_name, $builder = 'header' ) {
		if ( wp_get_nav_menu_object( $menu_name ) ) {
			return $menu_name;
		}
		$builder_locations = array();
		if ( 'header' === $builder ) {
			$builder_locations = ThemeSetup::get_header_locations();
		}
		if ( 'footer' === $builder ) {
			$builder_locations = ThemeSetup::get_footer_locations();
		}
		$all_locations = array_merge(
			array_keys( $builder_locations ),
			array_keys( ThemeSetup::get_main_locations() )
		);
		while ( ! empty( $all_locations ) ) {
			$location              = array_shift( $all_locations );
			$menu_name_by_location = wp_get_nav_menu_name( $location );
			if ( ! empty( $menu_name_by_location ) ) {
				return $menu_name_by_location;
			}
		}

		return $menu_name;
	}
}

if ( ! function_exists( 'brandy_the_post_thumbnail' ) ) {
	/**
	 * Print current post thumbnail.
	 * Show default thumbnail when post doesn't have featured image.
	 *
	 * @param int|WP_Post
	 *
	 * @since 1.0
	 */
	function brandy_the_post_thumbnail( $post = null ) {
		$thumbnail = get_the_post_thumbnail( $post );
		if ( empty( $thumbnail ) ) {
			echo wp_kses_post( brandy_get_post_placeholder_thumbnail() );
		} else {
			echo wp_kses_post( $thumbnail );
		}
	}
}

if ( ! function_exists( 'brandy_get_post_placeholder_thumbnail' ) ) {
	/**
	 * Returns placeholder feature image for post
	 * which doesn't have thumnbnail
	 *
	 * @return string Image tag
	 * @since 1.0
	 */
	function brandy_get_post_placeholder_thumbnail( $attr = array() ) {
		$src          = brandy_get_post_placeholder_thumbnail_url();
		$default_attr = array(
			'src' => esc_url( $src ),
			'alt' => 'Thumbnail placeholder',
		);
		$attr         = wp_parse_args( $default_attr, $attr );
		$attr_string  = '';

		ob_start();
		brandy_print_dom_attributes( $attr );
		$attr_string = ob_get_contents();
		ob_end_clean();

		return sprintf( '<img %s/>', $attr_string );
	}
}

if ( ! function_exists( 'brandy_get_post_placeholder_thumbnail_url' ) ) {
	/**
	 * Returns placeholder feature image for post
	 * which doesn't have thumnbnail
	 *
	 * @return string Image tag
	 * @since 1.0
	 */
	function brandy_get_post_placeholder_thumbnail_url() {
		return BRANDY_TEMPLATE_URL . '/assets/images/default-placeholder.png';
	}
}

if ( ! function_exists( 'brandy_render_gutenberg_blocks' ) ) {
	/**
	 * Render content includes gutenberg blocks
	 *
	 * @param string Input content
	 * @since 1.0
	 */
	function brandy_render_gutenberg_blocks( $content ) {
		$parsed_blocks = parse_blocks( $content );
		if ( $parsed_blocks ) {
			foreach ( $parsed_blocks as $block ) {
				echo wp_kses_post( apply_filters( 'the_content', render_block( $block ) ) );
			}
		}
	}
}

if ( ! function_exists( 'brandy_get_builder_template' ) ) {

	/**
	 * Returns template data for specific builder
	 *
	 * @param string $builder Given builder.
	 *
	 * @return array|null Builder template data.
	 */
	function brandy_get_builder_template( $builder ) {

		$fn = 'brandy_get_' . $builder . '_template';

		if ( ! is_callable( $fn ) ) {
			return null;
		}
		return call_user_func( $fn );
	}
}

if ( ! function_exists( 'brandy_get_current_page_id' ) ) {
	function brandy_get_current_page_id() {
		if ( function_exists( 'is_shop' ) && is_shop() ) {
			return wc_get_page_id( 'shop' );
		}
		if ( function_exists( 'is_cart' ) && is_cart() ) {
			return wc_get_page_id( 'cart' );
		}
		if ( function_exists( 'is_checkout' ) && is_checkout() ) {
			return wc_get_page_id( 'checkout' );
		}

		if ( is_block_editor_screen() ) {
			return get_the_ID();
		}

		global $wp_query;

		if ( empty( $wp_query ) ) {
			return get_the_ID();
		}

		$page_id = $wp_query->get_queried_object_id();

		return $page_id;
	}
}

if ( ! function_exists( 'brandy_get_relative_tags' ) ) {
	function brandy_get_relative_tags( $post_id ) {
		$post_tags = get_the_tags( $post_id );
		if ( false === $post_tags || is_wp_error( $post_tags ) ) {
			$post_tags = array();
		}
		$all_tags      = get_tags(
			array(
				'hide_empty' => false,
				'number'     => BRANDY_MAXIMUM_TAGS_DISPLAY,
			)
		);
		$relative_tags = array_filter(
			$all_tags,
			function( $item ) use ( $post_tags ) {
				foreach ( $post_tags as $p ) {
					if ( $item->name == $p->name ) {
						return false;
					}
				}
				return true;
			}
		);

		return $relative_tags;
	}
}


if ( ! function_exists( 'brandy_is_thankyou_page' ) ) {
	function brandy_is_thankyou_page() {
		return \is_wc_installed() && function_exists( 'is_wc_endpoint_url' ) && \is_wc_endpoint_url( 'order-received' );
	}
}

if ( ! function_exists( 'brandy_get_shop_page_id' ) ) {
	function brandy_get_shop_page_id() {
		return function_exists( 'wc_get_page_id' ) ? \wc_get_page_id( 'shop' ) : null;
	}
}

if ( ! function_exists( 'brandy_get_cart_page_id' ) ) {
	function brandy_get_cart_page_id() {
		return function_exists( 'wc_get_page_id' ) ? \wc_get_page_id( 'cart' ) : null;
	}
}

if ( ! function_exists( 'brandy_get_checkout_page_id' ) ) {
	function brandy_get_checkout_page_id() {
		return function_exists( 'wc_get_page_id' ) ? \wc_get_page_id( 'checkout' ) : null;
	}
}

if ( ! function_exists( 'brandy_get_page_type' ) ) {
	function brandy_get_page_type() {
		$page_type = 'page';

		if ( brandy_is_home() ) {
			$page_type = 'home';
		}
		if ( is_single() ) {
			$page_type = 'post';
		}
		return $page_type;
	}
}

if ( ! function_exists( 'brandy_get_empty_header' ) ) {
	function brandy_get_empty_header() {
		$template = HeaderPanel::get_default_template();

		$template['placements'] = array(
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
		);
		return $template;
	}
}

if ( ! function_exists( 'brandy_get_empty_footer' ) ) {
	function brandy_get_empty_footer() {
		$template = FooterPanel::get_default_template();

		$template['placements'] = array(
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
		);
		return $template;
	}
}

if ( ! function_exists( 'brandy_get_menu_location' ) ) {
	function brandy_get_menu_location( $menu ) {
		$menu_locations = get_nav_menu_locations();
		$menu_object    = wp_get_nav_menu_object( $menu );

		if ( false === $menu_object ) {
			return '';
		}

		foreach ( $menu_locations as $location => $menu_id ) {
			if ( $menu_object->term_id === $menu_id ) {
				return $location;
			}
		}

		return '';
	}
}

if ( ! function_exists( 'brandy_is_comment_opened' ) ) {
	function brandy_is_comment_opened( $post = null ) {
		if ( null == $post ) {
			global $post;
		}

		return 'open' === $post->comment_status;
	}
}

if ( ! function_exists( 'brandy_render_install_wc_notice' ) ) {
	function brandy_render_install_wc_notice() {
		\brandy_get_template_part( 'template-parts/install-wc-notice' );
	}
}
