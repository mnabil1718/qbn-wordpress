<?php

use Brandy\Wishlist\Initialize;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="brandy-wishlist-drawer__title">
	<h2 class="brandy-wishlist-drawer__title__text"><?php esc_html_e( 'Your wishlist', 'brandy' ); ?></h2>
	<button class="brandy-wishlist-drawer__close" type="button" tabindex="0" title="Close wishlist"><span class="sr-only">Close panel</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg></button>
</div>
<?php
echo Initialize::wishlist_shortcode(); //PHPCS: XSS ok.
// echo do_shortcode( '[brandy_wishlist]' );
