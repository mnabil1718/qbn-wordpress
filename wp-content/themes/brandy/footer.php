<?php
/**
 * The Template for displaying site footer
 *
 * @package Brandy
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
		</div>

		<?php
		/**
		 * Hook: brandy_after_site_content
		 */
		do_action( 'brandy_after_site_content' );
		?>

		<?php wp_footer(); ?>

		<?php brandy_footer(); ?>

	</body>
</html>
