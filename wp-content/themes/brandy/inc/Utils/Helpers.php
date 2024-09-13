<?php
/**
 * Helpers
 */
namespace Brandy\Utils;

class Helpers {

	/**
	 * Update Object nested value with given path.
	 *
	 * @param array     $object Object to change value.
	 * @param array     $path   Given path.
	 * @param           $value  Value to set.
	 */
	public static function set_nested_value( &$object, $path, $value ) {
		$nested_data = &$object;
		$path_length = count( $path );
		while ( 1 < $path_length ) {
			$attribute_key = array_shift( $path );
			if ( ! isset( $nested_data[ $attribute_key ] ) ) {
				$nested_data[ $attribute_key ] = array();
			}
			$nested_data = &$nested_data[ $attribute_key ];
			$path_length = count( $path );
		}
		$attribute_key                 = array_shift( $path );
		$nested_data[ $attribute_key ] = $value;
	}

	/**
	 * Get Object nested value with given path.
	 *
	 * @param array     $object Object to change value.
	 * @param array     $path   Given path.
	 */
	public static function get_nested_value( &$object, $path, $default_value = null ) {
		$nested_data = &$object;
		$path_length = count( $path );
		while ( 1 < $path_length ) {
			$attribute_key = array_shift( $path );
			if ( ! isset( $nested_data[ $attribute_key ] ) ) {
				$nested_data[ $attribute_key ] = array();
			}
			$nested_data = &$nested_data[ $attribute_key ];
			$path_length = count( $path );
		}
		$attribute_key = array_shift( $path );
		return isset( $nested_data[ $attribute_key ] ) ? $nested_data[ $attribute_key ] : $default_value;
	}

	/**
	 * Make wp_parse_args function applying for nested
	 *
	 * @param array $args_1
	 * @param array $args_2
	 */
	public static function recursive_wp_parse_args( &$args_1, $args_2 ) {
		$args_1 = (array) $args_1;
		$args_2 = (array) $args_2;
		$result = $args_2;
		foreach ( $args_1 as $key => &$value ) {
			if ( is_array( $value ) && isset( $result[ $key ] ) ) {
				$result[ $key ] = self::recursive_wp_parse_args( $value, $result[ $key ] );
			} else {
				$result[ $key ] = $value;
			}
		}
		return $result;
	}

	/**
	 * Get value for given device.
	 *
	 * If given data cannot be responsived, do not process. Returns itself.
	 *
	 * @param           $data       Given data. This can be anything.
	 * @param string    $device     Given device.
	 */
	public static function get_device_value( $data, $device = 'desktop' ) {
		if ( StylesDataHelpers::is_responsive_data( $data ) ) {

			if ( 'mobile' === $device ) {
				return $data['mobile'] ?? $data['tablet'] ?? $data['desktop'];
			}

			return $data[ $device ] ?? $data['desktop'];

		}
		return $data;
	}
	public static function replace_language_url( $lang ) {
		$current_url = self::get_currentUrl();
		$origin_url  = get_home_url();
		return str_replace( $origin_url, $origin_url . '/' . $lang, $current_url );
	}
	public static function get_currentUrl() {
		$protocol = is_ssl() ? 'https://' : 'http://';
		return ( $protocol ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
}
