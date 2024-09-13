<?php
/**
 * The Template for displaying 404 page
 *
 * @package Brandy
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template_html = get_the_block_template_html();

get_header();
?>
	<main class="page-404">
		<?php
			/**
			 * Hook: brandy_before_404_content
			 */
			do_action( 'brandy_before_404_content' );
		?>
		<?php
			echo $template_html; //PHPCS: XSS ok.
		?>
		<?php
			/**
			 * Hook: brandy_after_404_content
			 */
			do_action( 'brandy_after_404_content' );
		?>
	</main>
<?php
get_footer();
