<?php
/**
 * The Template for displaying all pages
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

<main <?php post_class(); ?>>
	<?php
		/**
		 * Hook: brandy_before_main_content.
		 */
		do_action( 'brandy_before_main_content' );
	?>

	<?php
	/**
	 * Render post
	 */
	?>
	<?php
		echo $template_html; //PHPCS: XSS ok.
	?>

	<?php
		/**
		 * Hook: brandy_after_main_content.
		 */

		do_action( 'brandy_after_main_content' );
	?>

	</main>

<?php
get_footer();
