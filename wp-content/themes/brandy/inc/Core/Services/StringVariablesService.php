<?php

namespace Brandy\Core\Services;

class StringVariablesService {

	/**
	 * Returns current year
	 *
	 * @return string current year
	 */
	public static function get_current_year() {
		return gmdate( 'Y' );
	}

	/**
	 * Returns site title
	 *
	 * @return string Site title
	 */
	public static function get_site_title() {
		return get_bloginfo( 'name' );
	}

	/**
	 * Returns theme author
	 *
	 * @return string Theme author
	 */
	public static function get_theme_author() {
		$theme = wp_get_theme();
		return $theme->get( 'Author' );
	}

	public static function get_heart_icon() {
		return '&hearts;';
	}

	/**
	 * Get all data
	 */
	public static function get_data() {
		return array(
			'current_year'      => self::get_current_year(),
			'site_title'        => self::get_site_title(),
			'theme_author'      => self::get_theme_author(),
			'heart_icon'        => self::get_heart_icon(),
			'shop_page_url'     => brandy_get_shop_page_url(),
			'cart_page_url'     => brandy_get_cart_page_url(),
			'checkout_page_url' => brandy_get_checkout_page_url(),
			'home_page_url'     => home_url(),
			'login_url'         => brandy_get_login_url(),
		);
	}

	public static function replace_variables( $content ) {
		$data    = self::get_data();
		$search  = array_map(
			function( $item ) {
				return "[$item]";
			},
			array_keys( $data )
		);
		$replace = array_values( $data );
		$content = str_replace( $search, $replace, $content );
		return $content;
	}

	public static function get_list_variables() {
		return array_map(
			function( $variable_name ) {
				return "[$variable_name]";
			},
			array_keys( self::get_data() )
		);
	}

	public static function get_string_list_variables() {
		return implode( ', ', self::get_list_variables() );
	}
}
