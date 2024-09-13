<?php

namespace Brandy\Core;

use Brandy\Traits\SingletonTrait;
use WP_Query;

class Ajax {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'wp_ajax_nopriv_brandy_search', array( $this, 'search' ) );
		add_action( 'wp_ajax_brandy_search', array( $this, 'search' ) );

		add_action( 'wp_ajax_nopriv_brandy_send_subscribe_mail', array( $this, 'send_subscribe_mail' ) );
		add_action( 'wp_ajax_brandy_send_subscribe_mail', array( $this, 'send_subscribe_mail' ) );
	}

	public function send_subscribe_mail() {
		try {
			$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';

			if ( ! wp_verify_nonce( $nonce, 'send_subscribe_mail' ) ) {
				throw new \Error( __( 'Invalid nonce', 'brandy' ) );
			}

			$email = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';

			if ( empty( $email ) || ! is_email( $email ) ) {
				wp_send_json_success(
					array(
						'success' => false,
						'message' => __( 'Invalid email', 'brandy' ),
					)
				);
			}

			$message = __( 'Thank you for subscribing to our newsletter. We promise not to send spam to you!', 'brandy' );

			$subject = __( 'Brandy Subscribe Mail', 'brandy' );

			$headers = array( 'Content-Type: text/html; charset=UTF-8' );

			$sent_mail = wp_mail( $email, $subject, wp_strip_all_tags( $message ), $headers );

			if ( $sent_mail ) {
				wp_send_json_success(
					array(
						'success' => true,
						'message' => __( 'Thank you for subscribing to our newsletter!', 'brandy' ),
					)
				);
			} else {
				wp_send_json_success(
					array(
						'success' => false,
						'message' => __( 'Send email error', 'brandy' ),
					)
				);
			}
		} catch ( \Error $err ) {
			wp_send_json_success(
				array(
					'success' => false,
					'message' => $err->getMessage(),
				)
			);
		}
		die();
	}

	/**
	 * Search function for search box element
	 */
	public function search() {
		// $nonce = isset( $_GET['nonce'] ) ? sanitize_text_field( $_GET['nonce'] ) : '';
		// if ( ! wp_verify_nonce( $nonce, 'brandy_search_action' ) ) {
		// 	wp_send_json_error(
		// 		array(
		// 			'message' => __( 'Verify nonce failed', 'brandy' ),
		// 		)
		// 	);
		// }

		try {
			$search_term = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : ''; //phpcs:ignore.

			$post_types = isset( $_GET['post_types'] ) ? sanitize_text_field( $_GET['post_types'] ) : ''; //phpcs:ignore.
			$post_types = $post_types;

			$limit  = isset( $_GET['limit'] ) ? sanitize_text_field( $_GET['limit'] ) : ''; //phpcs:ignore.
			$offset = isset( $_GET['offset'] ) ? sanitize_text_field( $_GET['offset'] ) : ''; //phpcs:ignore.

			if ( empty( $post_types ) ) {
				wp_send_json_success(
					array(
						'data' => array(),
					)
				);
			}

			$query = new WP_Query(
				array(
					'post_type'      => $post_types,
					'posts_per_page' => $limit,
					'offset'         => $offset,
					'order'          => 'ASC',
					'orderby'        => 'title',
					's'              => $search_term,
				)
			);

			ob_start();
			get_template_part(
				'template-parts/builder/elements/search-results',
				'',
				array(
					'search_query' => $query,
				)
			);
			$html = ob_get_contents();
			ob_end_clean();

			wp_send_json_success(
				array(
					'html' => $html,
				)
			);

		} catch ( \Error $err ) {
			wp_send_json_error(
				array(
					'message' => $err->getMessage(),
				)
			);
		}

	}

}
