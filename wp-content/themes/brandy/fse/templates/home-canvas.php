<?php
/**
 * The Template for displaying index page
 *
 * @package Brandy
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$template_html = get_the_block_template_html();

get_header();

do_action( 'brandy_before_home_page' );

?>
	<main class="home-page">
		<?php echo $template_html; //PHPCS: XSS ok. ?>
	</main>
<?php
do_action( 'brandy_after_home_page' );
get_footer();
