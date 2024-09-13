<?php
/**
 * The Template for displaying post breadcrumb
 *
 * @package Brandy
 * @version 1.0
 */

use Brandy\Core\Services\BreadcrumbService;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( empty( $args['crumbs'] ) ) {
	return;
}

$crumbs = $args['crumbs'];

$delimiter = BreadcrumbService::get_current_delimiter_icon();

?>

<div class="post__breadcrumb brandy-breadcrumb-container">
	<?php
	foreach ( $crumbs as $c_ind => $crumb ) {
		if ( 0 !== $c_ind ) {
			printf( '<span class="brandy-breadcrumb-separator">%s</span>', $delimiter ); // PHPCS:ignore.
		}

		if ( ( count( $crumbs ) - 1 ) === $c_ind ) {
			printf(
				'<span class="%s">%s</span>',
				'brandy-breadcrumb-item brandy-breadcrumb-item-active',
				empty( $crumb['title'] ) ? esc_html__( '(No title)', 'brandy' ) : esc_html( $crumb['title'] )
			);
		} else {
			printf(
				'<a class="%s" href="%s">%s</a>',
				'brandy-breadcrumb-item',
				esc_url( $crumb['url'] ),
				empty( $crumb['title'] ) ? esc_html__( '(No title)', 'brandy' ) : esc_html( $crumb['title'] )
			);
		}
	}
	?>
</div>
