<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( "Can't load this file directly" );
}

/*==========================================================================
	Logo Showcase wordpress shortcode callback function
==========================================================================*/
function logo_showcase_wordpress_shortcode_register( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'id' => "",
		), $atts 
	);
	global $post;
	$postid = $atts['id'];
	
	$featuress 											 = get_post_meta( $postid, 'logo_showcase_columns');
	$logo_showcase_columns_post_themes 					 = get_post_meta( $postid, 'logo_showcase_columns_post_themes', true );
	$logo_showcase_items_background_color 				 = get_post_meta( $postid, 'logo_showcase_items_background_color', true );
	$logo_showcase_items_hover_background 				 = get_post_meta( $postid, 'logo_showcase_items_hover_background', true );
	$logo_showcase_item_roderwidth 			 			 = get_post_meta( $postid, 'logo_showcase_item_roderwidth', true );
	$logo_showcase_columns_border_color 				 = get_post_meta( $postid, 'logo_showcase_columns_border_color', true );
	$logo_showcase_columns_border_hover_color 			 = get_post_meta( $postid, 'logo_showcase_columns_border_hover_color', true );
	$logo_showcase_item_padding 			 			 = get_post_meta( $postid, 'logo_showcase_item_padding', true );
	
	$logo_showcase_free_show_title_hide 				 = get_post_meta( $postid, 'logo_showcase_free_show_title_hide', true );
	$logo_showcase_columns_title_position 				 = get_post_meta( $postid, 'logo_showcase_columns_title_position', true );
	$logo_showcase_columns_title_font_size 				 = get_post_meta( $postid, 'logo_showcase_columns_title_font_size', true );
	$logo_showcase_free_title_font_style 				 = get_post_meta( $postid, 'logo_showcase_free_title_font_style', true );
	$logo_showcase_columns_title_font_color 			 = get_post_meta( $postid, 'logo_showcase_columns_title_font_color', true );
	
	$logo_showcase_free_show_desc_hide 		    		 = get_post_meta( $postid, 'logo_showcase_free_show_desc_hide', true );
	$logo_showcase_columns_desc_position 		    	 = get_post_meta( $postid, 'logo_showcase_columns_desc_position', true );
	$logo_showcase_columns_desc_font_size 		    	 = get_post_meta( $postid, 'logo_showcase_columns_desc_font_size', true );
	$logo_showcase_free_desc_font_style 		    	 = get_post_meta( $postid, 'logo_showcase_free_desc_font_style', true );
	$logo_showcase_columns_desc_font_color 		    	 = get_post_meta( $postid, 'logo_showcase_columns_desc_font_color', true );
	$logo_showcase_columns_image_effect  				 = get_post_meta( $postid, 'logo_showcase_columns_image_effect', true );
	$logo_showcase_columns_image_effect_hover  			 = get_post_meta( $postid, 'logo_showcase_columns_image_effect_hover', true );
	$logo_showcase_columns_hover_effect  				 = get_post_meta( $postid, 'logo_showcase_columns_hover_effect', true );
	$grid_normal_column							 		= get_post_meta( $postid, 'grid_normal_column', true );
	$logo_showcase_columns_show_auto_play		 		= get_post_meta( $postid, 'logo_showcase_columns_show_auto_play', true );
	$logo_showcase_columns_show_items		     		= get_post_meta( $postid, 'logo_showcase_columns_show_items', true );
	$logo_showcase_columns_show_slide_speed		 		= get_post_meta( $postid, 'logo_showcase_columns_show_slide_speed', true );
	$stop_hover_play  									= get_post_meta( $postid, 'stop_hover_play', true );
	$autoplaytimeout		                     		= get_post_meta( $postid, 'autoplaytimeout', true );
	$itemsdesktop 								 		= get_post_meta( $postid, 'itemsdesktop', true );
	$itemsdesktopsmall 							 		= get_post_meta( $postid, 'itemsdesktopsmall', true );
	$itemsmobile 								 		= get_post_meta( $postid, 'itemsmobile', true );
	$loop 										 		= get_post_meta( $postid, 'loop', true );
	$margin 									 		= get_post_meta( $postid, 'margin', true );
	$logo_showcase_navigation 							= get_post_meta( $postid, 'logo_showcase_navigation', true );
	$logo_showcase_navigation_position 					= get_post_meta( $postid, 'logo_showcase_navigation_position', true );
	$logo_showcase_navigation_style 					= get_post_meta( $postid, 'logo_showcase_navigation_style', true );
	$logo_showcase_navigation_text_color 				= get_post_meta( $postid, 'logo_showcase_navigation_text_color', true );
	$logo_showcase_navigation_bg_color 					= get_post_meta( $postid, 'logo_showcase_navigation_bg_color', true );
	$logo_showcase_navigation_hover_text_color 			= get_post_meta( $postid, 'logo_showcase_navigation_hover_text_color', true );
	$logo_showcase_navigation_hover_bg_color 			= get_post_meta( $postid, 'logo_showcase_navigation_hover_bg_color', true );
	$logo_showcase_pagination 							= get_post_meta( $postid, 'logo_showcase_pagination', true );
	$logo_showcase_pagination_position 					= get_post_meta( $postid, 'logo_showcase_pagination_position', true );
	$logo_showcase_pagination_style  	 				= get_post_meta( $postid, 'logo_showcase_pagination_style', true );
	$logo_showcase_pagination_bg_color 					= get_post_meta( $postid, 'logo_showcase_pagination_bg_color', true );
	$logo_showcase_pagination_active_bg_color 			= get_post_meta( $postid, 'logo_showcase_pagination_active_bg_color', true );
	$logo_showcase_columns_show_hide_tooltips 			= get_post_meta( $postid, 'logo_showcase_columns_show_hide_tooltips', true );
	$logo_showcase_tooltips_positions 					= get_post_meta( $postid, 'logo_showcase_tooltips_positions', true );
	$logo_showcase_tooltips_color 						= get_post_meta( $postid, 'logo_showcase_tooltips_color', true );
	$logo_showcase_tooltips_bgcolor 					= get_post_meta( $postid, 'logo_showcase_tooltips_bgcolor', true );

	ob_start();
	switch ( $logo_showcase_columns_post_themes ) {
	    case 'theme1':

	        include __DIR__ . '/themes/style-1.php';

	        break;
	    case 'theme2':

	        include __DIR__ . '/themes/style-2.php';

	        break;
	    case 'theme3':

	        include __DIR__ . '/themes/style-3.php';

	    break;
	}
	return ob_get_clean();
}

// shortcode hook
add_shortcode( 'logo_showcase', 'logo_showcase_wordpress_shortcode_register' );