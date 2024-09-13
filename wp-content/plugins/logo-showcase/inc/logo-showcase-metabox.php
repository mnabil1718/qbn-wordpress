<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( "Can't load this file directly" );
}

// Adds a box to the main column on the Post and Page edit screens
function logo_showcase_wordpress_add_custom_box() {
	$screens = array( 'tplogoshowcase' );
	foreach ( $screens as $screen ) {
		add_meta_box( 'logo_showcase_sectionid', __( 'Logo Showcase Configure','logoshowcase' ),'logo_showcase_wordpress_inner_custom_box', $screen );
	}
}
add_action( 'add_meta_boxes', 'logo_showcase_wordpress_add_custom_box' );

function logo_showcase_wordpress_inner_custom_box() {
	global $post;
	// Use nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'logo_showcase_wordpress_dynamicMeta_noncename' );

	$repeatable_fields = get_post_meta( $post->ID, 'logo_showcase_columns', false );
	//get the saved meta as an arry
	$logo_showcase_columns_post_themes 						= get_post_meta( $post->ID, 'logo_showcase_columns_post_themes', true );
	$logo_showcase_pagination 								= get_post_meta( $post->ID, 'logo_showcase_pagination', true );
	$logo_showcase_pagination_position 						= get_post_meta( $post->ID, 'logo_showcase_pagination_position', true );
	$logo_showcase_pagination_style 						= get_post_meta( $post->ID, 'logo_showcase_pagination_style', true );
	$logo_showcase_pagination_bg_color 						= get_post_meta( $post->ID, 'logo_showcase_pagination_bg_color', true );
	$logo_showcase_pagination_active_bg_color 				= get_post_meta( $post->ID, 'logo_showcase_pagination_active_bg_color', true );
	$logo_showcase_navigation 								= get_post_meta( $post->ID, 'logo_showcase_navigation', true );
	$logo_showcase_navigation_position 						= get_post_meta( $post->ID, 'logo_showcase_navigation_position', true );
	$logo_showcase_navigation_style 						= get_post_meta( $post->ID, 'logo_showcase_navigation_style', true );
	$logo_showcase_columns_image_effect 					= get_post_meta( $post->ID, 'logo_showcase_columns_image_effect', true );
	$logo_showcase_columns_image_effect_hover 				= get_post_meta( $post->ID, 'logo_showcase_columns_image_effect_hover', true );
	$logo_showcase_columns_hover_effect 					= get_post_meta( $post->ID, 'logo_showcase_columns_hover_effect', true );
	$logo_showcase_columns_show_hide_tooltips 				= get_post_meta( $post->ID, 'logo_showcase_columns_show_hide_tooltips', true );
	$logo_showcase_tooltips_positions 						= get_post_meta( $post->ID, 'logo_showcase_tooltips_positions', true );
	$logo_showcase_tooltips_color 							= get_post_meta( $post->ID, 'logo_showcase_tooltips_color', true );
	$logo_showcase_tooltips_bgcolor 						= get_post_meta( $post->ID, 'logo_showcase_tooltips_bgcolor', true );
	$logo_showcase_items_background_color 					= get_post_meta( $post->ID, 'logo_showcase_items_background_color', true );
	$logo_showcase_items_hover_background 					= get_post_meta( $post->ID, 'logo_showcase_items_hover_background', true );
	$logo_showcase_columns_border_color 					= get_post_meta( $post->ID, 'logo_showcase_columns_border_color', true );
	$logo_showcase_item_roderwidth 					        = get_post_meta( $post->ID, 'logo_showcase_item_roderwidth', true );
	$logo_showcase_item_padding 					        = get_post_meta( $post->ID, 'logo_showcase_item_padding', true );
	$grid_column_pleft 					        			= get_post_meta( $post->ID, 'grid_column_pleft', true );
	$grid_column_pright 					        		= get_post_meta( $post->ID, 'grid_column_pright', true );
	$grid_column_pbottom 					        		= get_post_meta( $post->ID, 'grid_column_pbottom', true );	
	$logo_showcase_columns_border_hover_color 				= get_post_meta( $post->ID, 'logo_showcase_columns_border_hover_color', true );
	$logo_showcase_columns_show_items 						= get_post_meta( $post->ID, 'logo_showcase_columns_show_items', true );
	$itemsdesktop 											= get_post_meta( $post->ID, 'itemsdesktop', true );
	$itemsdesktopsmall 										= get_post_meta( $post->ID, 'itemsdesktopsmall', true );
	$itemsmobile 										    = get_post_meta( $post->ID, 'itemsmobile', true );
	$loop 										            = get_post_meta( $post->ID, 'loop', true );
	$margin 										        = get_post_meta( $post->ID, 'margin', true );
	$stop_hover_play 										= get_post_meta( $post->ID, 'stop_hover_play', true );
	$autoplaytimeout	 									= get_post_meta( $post->ID, 'autoplaytimeout', true );
	$logo_showcase_free_show_title_hide 					= get_post_meta( $post->ID, 'logo_showcase_free_show_title_hide', true );
	$logo_showcase_columns_title_position 					= get_post_meta( $post->ID, 'logo_showcase_columns_title_position', true );
	$logo_showcase_columns_title_font_size 					= get_post_meta( $post->ID, 'logo_showcase_columns_title_font_size', true );
	$logo_showcase_free_title_font_style 					= get_post_meta( $post->ID, 'logo_showcase_free_title_font_style', true );
	$logo_showcase_free_show_desc_hide 					    = get_post_meta( $post->ID, 'logo_showcase_free_show_desc_hide', true );
	$logo_showcase_columns_desc_font_color 				    = get_post_meta( $post->ID, 'logo_showcase_columns_desc_font_color', true );
	$logo_showcase_columns_desc_position 					= get_post_meta( $post->ID, 'logo_showcase_columns_desc_position', true );
	$logo_showcase_free_desc_font_style 					= get_post_meta( $post->ID, 'logo_showcase_free_desc_font_style', true );
	$logo_showcase_columns_desc_font_size 					= get_post_meta( $post->ID, 'logo_showcase_columns_desc_font_size', true );
	$logo_showcase_columns_title_font_color 				= get_post_meta( $post->ID, 'logo_showcase_columns_title_font_color', true );
	$logo_showcase_columns_show_slide_speed 				= get_post_meta( $post->ID, 'logo_showcase_columns_show_slide_speed', true );
	$logo_showcase_columns_show_auto_play 					= get_post_meta( $post->ID, 'logo_showcase_columns_show_auto_play', true );
	$logo_showcase_navigation_text_color 					= get_post_meta( $post->ID, 'logo_showcase_navigation_text_color', true );
	$logo_showcase_navigation_bg_color 						= get_post_meta( $post->ID, 'logo_showcase_navigation_bg_color', true );
	$logo_showcase_navigation_hover_text_color 				= get_post_meta( $post->ID, 'logo_showcase_navigation_hover_text_color', true );
	$logo_showcase_navigation_hover_bg_color 				= get_post_meta( $post->ID, 'logo_showcase_navigation_hover_bg_color', true );
	$grid_normal_column 									= get_post_meta( $post->ID, 'grid_normal_column', true );
	$nav_value 												= get_post_meta( $post->ID, 'nav_value', true );

	$logo_showcase_columns_show_items         				= ($logo_showcase_columns_show_items) ? $logo_showcase_columns_show_items : 3;
	$grid_normal_column         							= ($grid_normal_column) ? $grid_normal_column : 3;
	$itemsdesktopsmall         								= ($itemsdesktopsmall) ? $itemsdesktopsmall : 2;
	$autoplaytimeout         								= ($autoplaytimeout) ? $autoplaytimeout : 3000;
	if ( empty( $nav_value ) ) { $nav_value = 1; }

	?>
	<input type="hidden" name="nav_value" id="nav_value" value="<?php echo $nav_value; ?>">
	<div class="tupsetings post-grid-metabox">
		<!-- <div class="wrap"> -->
		<ul class="tab-nav">
			<li nav="1" class="nav1 <?php if ( $nav_value == 1 ) { echo "active"; } ?>"><?php _e( 'New Showcase', 'logoshowcase' ); ?></li>
			<li nav="2" class="nav2 <?php if ( $nav_value == 2 ) { echo "active"; } ?>"><?php _e( 'General Settings', 'logoshowcase' ); ?></li>
			<li nav="3" class="nav3 <?php if ( $nav_value == 3 ) { echo "active"; } ?>"><?php _e( 'Slider Settings', 'logoshowcase' ); ?></li>
			<li nav="5" class="nav5 <?php if ( $nav_value == 5 ) { echo "active"; } ?>"><?php _e( 'Shortcodes', 'logoshowcase' ); ?></li>
		</ul> <!-- tab-nav end -->
	</div>
	<ul class="box">
		<!-- Tab 1 -->
		<li style="<?php if ( $nav_value == 1 ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>" class="box1 tab-box <?php if ( $nav_value == 1 ) { echo 'active'; } ?>">
			<div class="wrap">
				<div class="option-box">
					<div id="repeatable-fieldset-one">
						<div id="ask-sortable">
						<?php
							if ( $repeatable_fields ) :
								foreach ( $repeatable_fields as $field ) { ?>
									<div class="ui-state-default">
										<div class="tpsl-repeater-logo-wrapper">
											<?php if ( $field['logo_showcase_uploader'] ) { ?>
											<div>
												<?php
													$full_image_url = wp_get_attachment_image_src( $field['logo_showcase_uploader'], 'full');
												?>
												<img src="<?php echo esc_url( $full_image_url[0] ); ?>"/>
											</div>
											<?php } ?>	
											<input type="hidden" class="ask-logo" name="logo_showcase_uploader[]" value="<?php if ( $field['logo_showcase_uploader'] != '' ) echo esc_attr( $field['logo_showcase_uploader'] ); ?>" />
											<button type="button" class="ask-upload_image_button button" style="display:<?php echo ( $field['logo_showcase_uploader'] ) ? 'none' : 'block'; ?>;"><?php _e( 'Upload', 'logoshowcase' ); ?></button>
											<button type="button" class="ask-remove_image_button button" style="display:<?php echo ( ! $field['logo_showcase_uploader'] ) ? 'none' : 'block'; ?>;"><?php _e( 'Remove', 'logoshowcase' ); ?></button>
										</div>
										<div class="ask-repeater-content-wrapper">
											<div class="lsp_title">
												<strong><?php _e( 'Title', 'logoshowcase' ); ?>: </strong>
												<input type="text" placeholder="Title" class="widefat" name="logo_showcase_title[]" value="<?php if ( $field['logo_showcase_title'] != '' ) echo esc_attr( $field['logo_showcase_title'] ); ?>"/>
											</div>
											<div class="lsp_desc">
												<strong><?php _e( 'Description', 'logoshowcase' ); ?>: </strong>
												<textarea name="logo_showcase_desc[]" class="widefat" rows="3"><?php if ( $field['logo_showcase_desc'] != '' ) echo esc_attr( $field['logo_showcase_desc'] ); ?></textarea>
											</div>
											<div class="lsp_link">
												<strong><?php _e( 'Link', 'logoshowcase' ); ?>: </strong>
												<input type="text" name="logo_showcase_link_url[]" value="<?php if ( $field['logo_showcase_link_url'] != '' ) echo esc_attr( $field['logo_showcase_link_url'] ); ?>" class="widefat">
											</div>
										</div>
										<div class="lsp_remove">
											<a class="button remove-row" href="#"><?php echo __( 'Delete', 'logoshowcase' ); ?></span></a>
										</div>
									</div>
								<?php
								}
							else :
							// show a blank one
							?>
							<div class="ui-state-default">
								<div class="tpsl-repeater-logo-wrapper">
									<input type="hidden" class="ask-logo" name="logo_showcase_uploader[]" />
									<button type="button" class="ask-upload_image_button button"><?php _e( 'Upload', 'logoshowcase' ); ?></button>
									<button type="button" class="ask-remove_image_button button" style="display:none;"><?php _e( 'Remove', 'logoshowcase' ); ?></button>
								</div>
								<div class="ask-repeater-content-wrapper">
									<div class="lsp_title">
										<strong><?php _e( 'Title', 'logoshowcase' ); ?>: </strong>
										<input type="text" placeholder="Title" class="widefat" name="logo_showcase_title[]"/>
									</div>
									<div class="lsp_desc">
										<strong><?php _e( 'Description', 'logoshowcase' ); ?>: </strong>
										<textarea name="logo_showcase_desc[]" class="widefat" rows="3"></textarea>
									</div>
									<div class="lsp_link">
										<strong><?php _e( 'Link', 'logoshowcase' ); ?>: </strong>
										<input type="text" name="logo_showcase_link_url[]" class="widefat">
									</div>
								</div>
								<div class="lsp_remove">
									<a class="button remove-row" href="#"><?php echo __( 'Delete', 'logoshowcase' ); ?></span></a>
								</div>
							</div>
							<?php endif; ?>	
							<!-- empty hidden one for jQuery -->
							<div class="ui-state-default empty-row screen-reader-text">
								<div class="tpsl-repeater-logo-wrapper">
									<input type="hidden" class="ask-logo" name="logo_showcase_uploader[]" />
									<button type="button" class="ask-upload_image_button button"><?php _e( 'Upload', 'logoshowcase' ); ?></button>
									<button type="button" class="ask-remove_image_button button" style="display:none;"><?php _e( 'Remove', 'logoshowcase' ); ?></button>
								</div>
								<div class="ask-repeater-content-wrapper">
									<div class="lsp_title">
										<strong><?php _e( 'Title', 'logoshowcase' ); ?>: </strong>
										<input type="text" placeholder="Title" class="widefat" name="logo_showcase_title[]"/>
									</div>
									<div class="lsp_desc">
										<strong><?php _e( 'Description', 'logoshowcase' ); ?>: </strong>
										<textarea name="logo_showcase_desc[]" class="widefat" rows="3"></textarea>
									</div>
									<div class="lsp_link">
										<strong><?php _e( 'Link', 'logoshowcase' ); ?>: </strong>
										<input type="text" name="logo_showcase_link_url[]" class="widefat">
									</div>
								</div>
								<div class="lsp_remove">
									<a class="button remove-row" href="#"><?php echo __( 'Delete', 'logoshowcase' ); ?></span></a>
								</div>
							</div>
						</div>
					</div>
					<p class="lsw-add-logo-items">
						<a id="add-row" class="button" href="#"><?php _e( 'Add New Logo', 'logoshowcase' ); ?></a>
					</p>
				</div>
			</div>
		</li>
		<!-- Tab 2 -->
		<li style="<?php if ( $nav_value == 2 ) { echo "display: block;"; } else { echo "display: none;"; } ?>" class="box2 tab-box <?php if ( $nav_value == 2 ) { echo "active"; } ?>">
			<div class="wrap">
				<div class="option-box">
					<div class="wrap">				
						<table class="form-table">
							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_post_themes"><?php echo __( 'Layout', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="radio-three" name="logo_showcase_columns_post_themes" value="theme1" <?php if ( $logo_showcase_columns_post_themes == 'theme1' || $logo_showcase_columns_post_themes == '' ) echo 'checked'; ?>/>
										<label for="radio-three"><?php _e( 'Slider', 'logoshowcase' ); ?></label>
										<input type="radio" id="radio-four" name="logo_showcase_columns_post_themes" value="theme2" <?php if ( $logo_showcase_columns_post_themes == 'theme2' ) echo 'checked'; ?>/>
										<label for="radio-four"><?php _e( 'Grid', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
										<input type="radio" id="radio-five" name="logo_showcase_columns_post_themes" value="theme3" <?php if ( $logo_showcase_columns_post_themes == 'theme3' ) echo 'checked'; ?>/>
										<label for="radio-five"><?php _e( 'List', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
									</div>
									<span class="logo_manager_hint">Select a layout to display the Logo Showcase. To unlock all Layouts, <a href="https://www.themepoints.com/shop/logo-showcase-pro" target="_blank">Upgrade To Pro!</a></span>
								</td>
							</tr><!-- End Logo Showcase Theme -->

							<tr valign="top" id="grid_col_controller" style="<?php if ( $logo_showcase_columns_post_themes != 'theme2') { echo "display:none;"; }?>">
								<th scope="row">
									<label for="grid_normal_column"><?php _e( 'Number of columns', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<select name="grid_normal_column" id="grid_normal_columns" class="timezone_string">
										<option value="1" <?php if ( isset ( $grid_normal_column ) ) selected( $grid_normal_column, '1' ); ?>><?php _e( 'Column 1', 'logoshowcase' ); ?></option>
										<option value="2" <?php if ( isset ( $grid_normal_column ) ) selected( $grid_normal_column, '2' ); ?>><?php _e( 'Column 2', 'logoshowcase' ); ?></option>
										<option value="3" <?php if ( isset ( $grid_normal_column ) ) selected( $grid_normal_column, '3' ); ?>><?php _e( 'Column 3', 'logoshowcase' ); ?></option>
										<option value="4" <?php if ( isset ( $grid_normal_column ) ) selected( $grid_normal_column, '4' ); ?>><?php _e( 'Column 4', 'logoshowcase' ); ?></option>
										<option value="5" <?php if ( isset ( $grid_normal_column ) ) selected( $grid_normal_column, '5' ); ?>><?php _e( 'Column 5', 'logoshowcase' ); ?></option>
										<option value="6" <?php if ( isset ( $grid_normal_column ) ) selected( $grid_normal_column, '6' ); ?>><?php _e( 'Column 6', 'logoshowcase' ); ?></option>
									</select>
									<span class="logo_manager_hint"><?php echo __( 'Choose an option for posts column.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Logo Showcase Item column -->


							<tr valign="top" id="grid_col_controller2" style="<?php if ( $logo_showcase_columns_post_themes != 'theme2') { echo "display:none;"; }?>">
								<th scope="row">
									<label for="grid_column_pleft"><?php _e( 'Column Padding Left', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input size="5" type="number" name="grid_column_pleft" id="grid_column_pleft" maxlength="3" class="timezone_string" value="<?php if ( $grid_column_pleft != '' ) { echo $grid_column_pleft; } else { echo '5'; } ?>">
									<br/>
									<span class="logo_manager_hint"><?php echo __( 'Insert grid column padding left.', 'logoshowcase' ); ?></span>
								</td>
							</tr>

							<tr valign="top" id="grid_col_controller3" style="<?php if ( $logo_showcase_columns_post_themes != 'theme2') { echo "display:none;"; }?>">
								<th scope="row">
									<label for="grid_column_pright"><?php _e( 'Column Padding Right', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input size="5" type="number" name="grid_column_pright" id="grid_column_pright" maxlength="3" class="timezone_string" value="<?php if ( $grid_column_pright != '' ) { echo $grid_column_pright; } else { echo '5'; } ?>">
									<br/>
									<span class="logo_manager_hint"><?php echo __( 'Insert grid column padding left.', 'logoshowcase' ); ?></span>
								</td>
							</tr>

							<tr valign="top" id="grid_col_controller4" style="<?php if ( $logo_showcase_columns_post_themes != 'theme2') { echo "display:none;"; }?>">
								<th scope="row">
									<label for="grid_column_pbottom"><?php _e( 'Column Margin Bottom', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input size="5" type="number" name="grid_column_pbottom" id="grid_column_pbottom" maxlength="3" class="timezone_string" value="<?php if ( $grid_column_pbottom != '' ) { echo $grid_column_pbottom; } else { echo '10'; } ?>">
									<br/>
									<span class="logo_manager_hint"><?php echo __( 'Insert grid column margin bottom.', 'logoshowcase' ); ?></span>
								</td>
							</tr>

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_items_background_color"><?php echo __( 'Item Background Color', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo_showcase_items_background_color" name="logo_showcase_items_background_color" value="<?php if ( $logo_showcase_items_background_color !='' ) {echo $logo_showcase_items_background_color; }else{echo "transparent"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint"><?php _e( 'Choose logo showcase item background color.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Logo Showcase Item background color -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_items_hover_background"><?php echo __( 'Item Hover Background Color', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo_showcase_items_hover_background" name="logo_showcase_items_hover_background" value="<?php if ( $logo_showcase_items_hover_background !='' ) {echo $logo_showcase_items_hover_background; }else{echo "transparent"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint"><?php _e( 'Choose logo showcase item hover background color.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Logo Showcase Item hover background color -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_item_roderwidth"><?php echo __( 'Item Border Width', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input size="5" type="number" name="logo_showcase_item_roderwidth" id="logo_showcase_item_roderwidth" maxlength="3" class="timezone_string" value="<?php if ( $logo_showcase_item_roderwidth != '' ) { echo $logo_showcase_item_roderwidth; } else { echo '0'; } ?>">
									<br/>
									<span class="logo_manager_hint"><?php echo __('Choose logo showcase item border width.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Logo Showcase Item border width -->

							<tr valign="top" >
								<th scope="row" >
									<label for="logo-showcase-column-border-color"><?php echo __( 'Item Border Color', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo-showcase-column-border-color" name="logo_showcase_columns_border_color" value="<?php if ( $logo_showcase_columns_border_color !='' ) {echo $logo_showcase_columns_border_color; }else{echo "transparent"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint"><?php echo __( 'Choose logo showcase item border color.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Logo Showcase Item border color -->

							<tr valign="top" >
								<th scope="row" ><label for="logo-showcase-column-border-hover-color"><?php echo __( 'Item Border Hover Color', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo-showcase-column-border-hover-color" name="logo_showcase_columns_border_hover_color" value="<?php if ( $logo_showcase_columns_border_hover_color !='' ) {echo $logo_showcase_columns_border_hover_color; }else{echo "transparent"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint"><?php echo __('Choose logo showcase border hover color.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Logo Showcase Item border hover color -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_item_padding"><?php echo __( 'Item Padding', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input size="5" type="number" name="logo_showcase_item_padding" id="logo_showcase_item_padding" maxlength="3" class="timezone_string" value="<?php if ( $logo_showcase_item_padding != '' ) { echo $logo_showcase_item_padding; } else { echo '15'; } ?>">
									<br/>
									<span class="logo_manager_hint"><?php echo __('Choose logo showcase item padding.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Logo Showcase Item Padding -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_free_show_title_hide"><?php echo __( 'Logo Title', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="tp_img_show" name="logo_showcase_free_show_title_hide" value="1" <?php if ( $logo_showcase_free_show_title_hide == '1' || $logo_showcase_free_show_title_hide == '' ) echo 'checked'; ?>/>
										<label for="tp_img_show"><?php _e( 'Show', 'logoshowcase' ); ?></label>
										<input type="radio" id="tp_img_hide" name="logo_showcase_free_show_title_hide" value="0" <?php if ( $logo_showcase_free_show_title_hide == '0' ) echo 'checked'; ?>/>
										<label for="tp_img_hide" class="hide_logo_title"><?php _e( 'Hide', 'logoshowcase' ); ?></label>
									</div>
									<span class="logo_manager_hint"><?php echo __('Show/Hide logo showcase Title.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Title Show/Hide -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_title_position"><?php echo __( 'Title Position', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="title_left" name="logo_showcase_columns_title_position" value="left" <?php if ( $logo_showcase_columns_title_position == 'left' ) echo 'checked'; ?>/>
										<label for="title_left"><?php _e( 'Left', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
										<input type="radio" id="title_center" name="logo_showcase_columns_title_position" value="center" <?php if ( $logo_showcase_columns_title_position == 'center' || $logo_showcase_columns_title_position == '' ) echo 'checked'; ?>/>
										<label for="title_center"><?php _e( 'Center', 'logoshowcase' ); ?></label>
										<input type="radio" id="title_right" name="logo_showcase_columns_title_position" value="right" <?php if ( $logo_showcase_columns_title_position == 'right' ) echo 'checked'; ?>/>
										<label for="title_right"><?php _e( 'Right', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Choose Your Title Position.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Title Position -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_columns_title_font_size"><?php echo __( 'Title Font Size', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input name='logo_showcase_columns_title_font_size' class='logo-showcase-column-title-font-color' id="logo_showcase_columns_title_font_size" type='number' value='<?php if($logo_showcase_columns_title_font_size!='') echo sanitize_text_field( $logo_showcase_columns_title_font_size ); else echo '17'; ?>' />
									<br/>
									<span class="logo_manager_hint"><?php echo __( 'Choose Title Font Size.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Title Font Size -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_free_title_font_style"><?php echo __( 'Title Font Style', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="title_normal" name="logo_showcase_free_title_font_style" value="normal" <?php if ( $logo_showcase_free_title_font_style == 'normal' || $logo_showcase_free_title_font_style == '' ) echo 'checked'; ?>/>
										<label for="title_normal"><?php _e( 'Normal', 'logoshowcase' ); ?></label>
										<input type="radio" id="title_italic" name="logo_showcase_free_title_font_style" value="italic" <?php if ( $logo_showcase_free_title_font_style == 'italic' ) echo 'checked'; ?>/>
										<label for="title_italic"><?php _e( 'Italic', 'logoshowcase' ); ?></label>
									</div>
									<span class="logo_manager_hint"><?php echo __('Choose logo showcase Title Style Normal/Italic.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Title Font Style -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_columns_title_font_color"><?php echo __( 'Title Font Color', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo-showcase-column-title-font-color" name="logo_showcase_columns_title_font_color" value="<?php if ( $logo_showcase_columns_title_font_color !='' ) {echo $logo_showcase_columns_title_font_color; }else{echo "#282828"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint">Choose Title Font Color.<span class="only_pro_v">(Only Pro)</span></span>
								</td>
							</tr><!-- End Title Font Color -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_free_show_desc_hide"><?php echo __( 'Logo Description', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="desc_show" name="logo_showcase_free_show_desc_hide" value="1" <?php if ( $logo_showcase_free_show_desc_hide == '1' || $logo_showcase_free_show_desc_hide == '' ) echo 'checked'; ?>/>
										<label for="desc_show"><?php _e( 'Show', 'logoshowcase' ); ?></label>
										<input type="radio" id="desc_hide" name="logo_showcase_free_show_desc_hide" value="0" <?php if ( $logo_showcase_free_show_desc_hide == '0' ) echo 'checked'; ?>/>
										<label for="desc_hide" class="hide_logo_desc"><?php _e( 'Hide', 'logoshowcase' ); ?></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Show/Hide logo showcase Description.', 'logoshowcase' ); ?><span class="only_pro_v">(Only Pro)</span></span>
								</td>
							</tr> <!-- End Description Show/Hide -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_desc_position"><?php echo __( 'Description Position', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="desc_left" name="logo_showcase_columns_desc_position" value="left" <?php if ( $logo_showcase_columns_desc_position == 'left' ) echo 'checked'; ?>/>
										<label for="desc_left"><?php _e( 'Left', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
										<input type="radio" id="desc_center" name="logo_showcase_columns_desc_position" value="center" <?php if ( $logo_showcase_columns_desc_position == 'center' || $logo_showcase_columns_desc_position == '' ) echo 'checked'; ?>/>
										<label for="desc_center"><?php _e( 'Center', 'logoshowcase' ); ?></label>
										<input type="radio" id="desc_right" name="logo_showcase_columns_desc_position" value="right" <?php if ( $logo_showcase_columns_desc_position == 'right' ) echo 'checked'; ?>/>
										<label for="desc_right"><?php _e( 'Right', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Choose Your Description Position.','logoshowcase' ); ?> To unlock all, <a href="https://www.themepoints.com/shop/logo-showcase-pro" target="_blank">Upgrade To Pro!</a></span>
								</td>
							</tr><!-- End Description Content Position -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_columns_desc_font_size"><?php echo __( 'Description Font Size', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input name='logo_showcase_columns_desc_font_size' class='logo-showcase-column-title-font-color' id="logo_showcase_columns_desc_font_size" type='number' value='<?php if($logo_showcase_columns_desc_font_size!='') echo sanitize_text_field( $logo_showcase_columns_desc_font_size ); else echo '17'; ?>' />
									<br/>
									<span class="logo_manager_hint">Choose Title Font Size.<span class="only_pro_v">(Only Pro)</span></span>
								</td>
							</tr><!-- End Description Title Font Size -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_free_desc_font_style"><?php echo __( 'Description Font Style', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="desc_normal" name="logo_showcase_free_desc_font_style" value="normal" <?php if ( $logo_showcase_free_desc_font_style == 'normal' || $logo_showcase_free_desc_font_style == '' ) echo 'checked'; ?>/>
										<label for="desc_normal"><?php _e( 'Normal', 'logoshowcase' ); ?></label>
										<input type="radio" id="desc_italic" name="logo_showcase_free_desc_font_style" value="italic" <?php if ( $logo_showcase_free_desc_font_style == 'italic' ) echo 'checked'; ?>/>
										<label for="desc_italic"><?php _e( 'Italic', 'logoshowcase' ); ?></label>
									</div>
									<span class="logo_manager_hint">logo showcase Description font style Normal/Italic.<span class="only_pro_v">(Only Pro)</span></span>
								</td>
							</tr><!-- End Description Font Style -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_columns_desc_font_color"><?php echo __( 'Description Font Color', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo_showcase_columns_desc_font_color" name="logo_showcase_columns_desc_font_color" value="<?php if ( $logo_showcase_columns_desc_font_color !='' ) {echo $logo_showcase_columns_desc_font_color; }else{echo "#282828"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint">Choose Description Font Color.<span class="only_pro_v">(Only Pro)</span></span>
								</td>
							</tr><!-- End Description Font Color -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_image_effect"><?php echo __( 'Image Effects', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<select class="timezone_string" name="logo_showcase_columns_image_effect">
										<option value="1" <?php if ( $logo_showcase_columns_image_effect == '1' ) echo "selected"; ?> >Normal</option>		
										<option disabled value="2" <?php if ( $logo_showcase_columns_image_effect == '2' ) echo "selected"; ?> >Grayscale (Pro)</option>
										<option disabled value="3" <?php if ( $logo_showcase_columns_image_effect == '3' ) echo "selected"; ?> >Blur (Pro)</option>
										<option disabled value="4" <?php if ( $logo_showcase_columns_image_effect == '4' ) echo "selected"; ?> >Blur & Grayscale (Pro)</option>
									</select><br/>
									<span class="logo_manager_hint"><?php echo __('Choose Logo/Image Effects.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Logo/Image Effects -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_image_effect_hover"><?php echo __( 'Image Hover Effects', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<select class="timezone_string" name="logo_showcase_columns_image_effect_hover">
										<option value="1" <?php if ( $logo_showcase_columns_image_effect_hover == '1' ) echo "selected"; ?> >Normal</option>
										<option disabled value="2" <?php if ( $logo_showcase_columns_image_effect_hover == '2' ) echo "selected"; ?> >Grayscale (Pro)</option>
										<option disabled value="3" <?php if ( $logo_showcase_columns_image_effect_hover == '3' ) echo "selected"; ?> >Blur (Pro)</option>
										<option disabled value="4" <?php if ( $logo_showcase_columns_image_effect_hover == '4' ) echo "selected"; ?> >Blur & Grayscale (Pro)</option>
									</select><br/>
									<span class="logo_manager_hint"><?php echo __('Choose Logo/Image Effects.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Logo/Image Hover Effects -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_hover_effect"><?php echo __( 'Image Animation', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<select class="timezone_string" name="logo_showcase_columns_hover_effect">
										<option value="0" <?php if ( $logo_showcase_columns_hover_effect == '0' ) echo "selected"; ?> >Normal</option>		
										<option value="1" <?php if ( $logo_showcase_columns_hover_effect == '1' ) echo "selected"; ?> >ZoomIn</option>
										<option disabled value="2" <?php if ( $logo_showcase_columns_hover_effect == '2' ) echo "selected"; ?> >ZoomOut (Pro)</option>
										<option disabled value="3" <?php if ( $logo_showcase_columns_hover_effect == '3' ) echo "selected"; ?> >SlideUp (Pro)</option>
									</select><br/>
									<span class="logo_manager_hint"><?php echo __('Choose Logo/Image Hover Animation.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Logo/Image Effects -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_show_hide_tooltips"><?php echo __( 'Tooltip:', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<div class="switch-field">
										<input type="radio" id="tooltip_enable" name="logo_showcase_columns_show_hide_tooltips" value="1" <?php if ( $logo_showcase_columns_show_hide_tooltips == '1' || $logo_showcase_columns_show_hide_tooltips == '' ) echo 'checked'; ?>/>
										<label for="tooltip_enable"><?php _e( 'Enable', 'logoshowcase' ); ?></label>
										<input type="radio" disabled id="tooltip_disable" name="logo_showcase_columns_show_hide_tooltips" value="2" <?php if ( $logo_showcase_columns_show_hide_tooltips == '2' ) echo 'checked'; ?>/>
										<label for="tooltip_disable" class="hide_logo_tooltip"><?php _e( 'Disable', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Set if you want to display the Tooltip or not.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Tooltip Show/Hide -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_tooltips_positions"><?php echo __( 'Tooltip Position', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<select class="timezone_string" name="logo_showcase_tooltips_positions">
										<option value="top" <?php if ( $logo_showcase_tooltips_positions == 'top' ) echo "selected"; ?> >Top</option>		
										<option disabled value="left" <?php if ( $logo_showcase_tooltips_positions == 'left' ) echo "selected"; ?> >Left (Pro)</option>
										<option disabled value="right" <?php if ( $logo_showcase_tooltips_positions == 'right' ) echo "selected"; ?> >Right (Pro)</option>
										<option disabled value="bottom" <?php if ( $logo_showcase_tooltips_positions == 'bottom' ) echo "selected"; ?> >Bottom (Pro)</option>
									</select><br/>
									<span class="logo_manager_hint"><?php echo __('Select Tooltip Position.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Tooltip Position -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_tooltips_color"><?php echo __( 'Tooltip Text Color', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo_showcase_tooltips_color" name="logo_showcase_tooltips_color" value="<?php if ( $logo_showcase_tooltips_color !='' ) {echo $logo_showcase_tooltips_color; }else{echo "#fff"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint"><?php echo __('Choose Tooltip Text Color.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Tooltip Text Color -->

							<tr valign="top" >
								<th scope="row" ><label for="logo_showcase_tooltips_bgcolor"><?php echo __( 'Tooltip Bg Color', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<input type="text" id="logo_showcase_tooltips_bgcolor" name="logo_showcase_tooltips_bgcolor" value="<?php if ( $logo_showcase_tooltips_bgcolor !='' ) {echo $logo_showcase_tooltips_bgcolor; }else{echo "#282828"; } ?>" class="timezone_string">
									<br/>
									<span class="logo_manager_hint"><?php echo __('Choose Tooltip Background Color.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Tooltip Background Color -->

						</table>		
					</div>
				</div>
			</div>
		</li>
		<!-- Tab 3 -->
		<li style="<?php if ( $nav_value == 3 ) { echo "display: block;"; } else { echo "display: none;"; } ?>" class="box3 tab-box <?php if ( $nav_value == 3 ) { echo "active"; } ?>">
			<div class="wrap">
				<div class="option-box">
					<div class="wrap">				
						<table class="form-table">
							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_show_auto_play"><?php echo __( 'Auto Play Mode', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align: middle;">
									<div class="switch-field">
										<input type="radio" id="autoplay_true" name="logo_showcase_columns_show_auto_play" value="true" <?php if ( $logo_showcase_columns_show_auto_play == 'true' || $logo_showcase_columns_show_auto_play == '' ) echo 'checked'; ?>/>
										<label for="autoplay_true"><?php _e( 'Yes', 'logoshowcase' ); ?></label>
										<input type="radio" id="autoplay_false" name="logo_showcase_columns_show_auto_play" value="false" <?php if ( $logo_showcase_columns_show_auto_play == 'false' ) echo 'checked'; ?>/>
										<label for="autoplay_false" class="autoplay_false"><?php _e( 'No', 'logoshowcase' ); ?></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Choose an option whether you want the slider autoplay or not.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Slide Autoplay -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_show_slide_speed"><?php echo __( 'SlideSpeed', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align: middle;" class="auto_play">
									<input type="range" step="100" min="100" max="5000" value="<?php  if ( $logo_showcase_columns_show_slide_speed !='' ) { echo $logo_showcase_columns_show_slide_speed; } else{ echo '700'; } ?>" class="slider" id="myRange"><br>
									<input size="5" type="text" name="logo_showcase_columns_show_slide_speed" id="logo_showcase_columns_show_slide_speed" maxlength="4" class="timezone_string" readonly  value="<?php  if ( $logo_showcase_columns_show_slide_speed !='' ) {echo $logo_showcase_columns_show_slide_speed; }else{ echo '700'; } ?>">
									<span class="logo_manager_hint"><?php echo __( 'Select a value for sliding speed.', 'logoshowcase' ); ?></span>							
								</td>
							</tr><!-- End SlideSpeed -->

							<tr valign="top">
								<th scope="row"><label for="stop_hover_play"><?php echo __( 'Stop On Hover', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align: middle;">
									<div class="switch-field">
										<input type="radio" id="stop_hover_true" name="stop_hover_play" value="true" <?php if ( $stop_hover_play == 'true' || $stop_hover_play == '' ) echo 'checked'; ?>/>
										<label for="stop_hover_true"><?php _e( 'Yes', 'logoshowcase' ); ?></label>
										<input type="radio" id="stop_hover_false" name="stop_hover_play" value="false" <?php if ( $stop_hover_play == 'false' ) echo 'checked'; ?>/>
										<label for="stop_hover_false" class="stop_hover_false"><?php _e( 'No', 'logoshowcase' ); ?></label>
									</div>	
									<span class="logo_manager_hint"><?php echo __( 'Select an option whether you want to pause sliding on mouse hover.', 'logoshowcase' ); ?></span>						
								</td>
							</tr><!-- End Stop On Hover -->

							<tr valign="top">
								<th scope="row">
									<label for="autoplaytimeout"><?php _e( 'Autoplay Time Out (Sec)', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<select name="autoplaytimeout" id="autoplaytimeout" class="timezone_string">
										<option value="1000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '1000' ); ?>><?php _e( '1', 'logoshowcase' ); ?></option>
										<option value="2000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '2000' ); ?>><?php _e( '2', 'logoshowcase' ); ?></option>
										<option value="3000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '3000' ); ?>><?php _e( '3', 'logoshowcase' ); ?></option>
										<option disabled value="4000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '4000' ); ?>><?php _e( '4', 'logoshowcase' ); ?></option>
										<option disabled value="5000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '5000' ); ?>><?php _e( '5', 'logoshowcase' ); ?></option>
										<option disabled value="6000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '6000' ); ?>><?php _e( '6', 'logoshowcase' ); ?></option>
										<option disabled value="7000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '7000' ); ?>><?php _e( '7', 'logoshowcase' ); ?></option>
										<option disabled value="8000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '8000' ); ?>><?php _e( '8', 'logoshowcase' ); ?></option>
										<option disabled value="9000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '9000' ); ?>><?php _e( '9', 'logoshowcase' ); ?></option>
										<option disabled value="10000" <?php if ( isset ( $autoplaytimeout ) ) selected( $autoplaytimeout, '10000' ); ?>><?php _e( '10', 'logoshowcase' ); ?></option>
									</select>
									<span class="logo_manager_hint"><?php echo __( 'Select an option for autoplay time out.', 'logoshowcase' ); ?></span>							
								</td>
							</tr> <!-- End Autoplay Time Out -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_columns_show_items"><?php echo __( 'Show Items:', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align: middle;">
									<select name="logo_showcase_columns_show_items" id="logo_showcase_columns_show_items" class="timezone_string">
										<option value="1" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '1' ); ?>><?php _e( '1', 'logoshowcase' ); ?></option>
										<option value="2" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '2' ); ?>><?php _e( '2', 'logoshowcase' ); ?></option>
										<option value="3" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '3' ); ?>><?php _e( '3', 'logoshowcase' ); ?></option>
										<option value="4" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '4' ); ?>><?php _e( '4', 'logoshowcase' ); ?></option>
										<option disabled value="5" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '5' ); ?>><?php _e( '5', 'logoshowcase' ); ?></option>
										<option disabled value="6" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '6' ); ?>><?php _e( '6', 'logoshowcase' ); ?></option>
										<option disabled value="7" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '7' ); ?>><?php _e( '7', 'logoshowcase' ); ?></option>
										<option disabled value="8" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '8' ); ?>><?php _e( '8', 'logoshowcase' ); ?></option>
										<option disabled value="9" <?php if ( isset ( $logo_showcase_columns_show_items ) )  selected( $logo_showcase_columns_show_items, '9' ); ?>><?php _e( '9', 'logoshowcase' ); ?></option>
										<option disabled value="10" <?php if ( isset ( $logo_showcase_columns_show_items ) ) selected( $logo_showcase_columns_show_items, '10' ); ?>><?php _e( '10', 'logoshowcase' ); ?></option>
									</select>
									<span class="logo_manager_hint"><?php echo __( 'Select number of items you want to show.', 'logoshowcase' ); ?></span>
								</td> 
							</tr><!-- End Total Items -->

							<tr valign="top">
								<th scope="row">
									<label for="itemsdesktop"><?php _e( 'Items Desktop', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<select name="itemsdesktop" id="itemsdesktop" class="timezone_string">
										<option value="3" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '3' ); ?>><?php _e( '3', 'logoshowcase' ); ?></option>
										<option value="1" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '1' ); ?>><?php _e( '1', 'logoshowcase' ); ?></option>
										<option value="2" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '2' ); ?>><?php _e( '2', 'logoshowcase' ); ?></option>
										<option value="4" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '4' ); ?>><?php _e( '4', 'logoshowcase' ); ?></option>
										<option disabled value="5" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '5' ); ?>><?php _e( '5', 'logoshowcase' ); ?></option>
										<option disabled value="6" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '6' ); ?>><?php _e( '6', 'logoshowcase' ); ?></option>
										<option disabled value="7" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '7' ); ?>><?php _e( '7', 'logoshowcase' ); ?></option>
										<option disabled value="8" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '8' ); ?>><?php _e( '8', 'logoshowcase' ); ?></option>
										<option disabled value="9" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '9' ); ?>><?php _e( '9', 'logoshowcase' ); ?></option>
										<option disabled value="10" <?php if ( isset ( $itemsdesktop ) ) selected( $itemsdesktop, '10' ); ?>><?php _e( '10', 'logoshowcase' ); ?></option>
									</select>
									<span class="logo_manager_hint"><?php echo __( 'Number of items you want to show for large desktop monitor.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Items Desktop -->

							<tr valign="top">
								<th scope="row">
									<label for="itemsdesktopsmall"><?php _e( 'Items Desktop Small', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<select name="itemsdesktopsmall" id="itemsdesktopsmall" class="timezone_string">
										<option value="1" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '1' ); ?>><?php _e( '1', 'logoshowcase' ); ?></option>
										<option value="2" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '2' ); ?>><?php _e( '2', 'logoshowcase' ); ?></option>
										<option value="3" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '3' ); ?>><?php _e( '3', 'logoshowcase' ); ?></option>
										<option value="4" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '4' ); ?>><?php _e( '4', 'logoshowcase' ); ?></option>
										<option disabled value="5" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '5' ); ?>><?php _e( '5', 'logoshowcase' ); ?></option>
										<option disabled value="6" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '6' ); ?>><?php _e( '6', 'logoshowcase' ); ?></option>
										<option disabled value="7" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '7' ); ?>><?php _e( '7', 'logoshowcase' ); ?></option>
										<option disabled value="8" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '8' ); ?>><?php _e( '8', 'logoshowcase' ); ?></option>
										<option disabled value="9" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '9' ); ?>><?php _e( '9', 'logoshowcase' ); ?></option>
										<option disabled value="10" <?php if ( isset ( $itemsdesktopsmall ) ) selected( $itemsdesktopsmall, '10' ); ?>><?php _e( '10', 'logoshowcase' ); ?></option>
									</select>
									<span class="logo_manager_hint"><?php echo __( 'Number of items you want to show for small desktop monitor.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Items Desktop Small -->

							<tr valign="top">
								<th scope="row">
									<label for="itemsmobile"><?php _e( 'Items Mobile', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<select name="itemsmobile" id="itemsmobile" class="timezone_string">
										<option value="1" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '1' ); ?>><?php _e( '1', 'logoshowcase' ); ?></option>
										<option value="2" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '2' ); ?>><?php _e( '2', 'logoshowcase' ); ?></option>
										<option value="3" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '3' ); ?>><?php _e( '3', 'logoshowcase' ); ?></option>
										<option value="4" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '4' ); ?>><?php _e( '4', 'logoshowcase' ); ?></option>
										<option disabled value="5" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '5' ); ?>><?php _e( '5', 'logoshowcase' ); ?></option>
										<option disabled value="6" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '6' ); ?>><?php _e( '6', 'logoshowcase' ); ?></option>
										<option disabled value="7" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '7' ); ?>><?php _e( '7', 'logoshowcase' ); ?></option>
										<option disabled value="8" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '8' ); ?>><?php _e( '8', 'logoshowcase' ); ?></option>
										<option disabled value="9" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '9' ); ?>><?php _e( '9', 'logoshowcase' ); ?></option>
										<option disabled value="10" <?php if ( isset ( $itemsmobile ) ) selected( $itemsmobile, '10' ); ?>><?php _e( '10', 'logoshowcase' ); ?></option>
									</select>
									<span class="logo_manager_hint"><?php echo __( 'Number of items you want to show for mobile device.', 'logoshowcase' ); ?></span>
								</td>
							</tr> <!-- End Items Mobile -->

							<tr valign="top">
								<th scope="row">
									<label for="item_no"><?php _e( 'Loop', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<div class="switch-field">
										<input type="radio" id="loop_true" name="loop" value="true" <?php if ( $loop == 'true' || $loop == '' ) echo 'checked'; ?>/>
										<label for="loop_true"><?php _e( 'Yes', 'logoshowcase' ); ?></label>
										<input type="radio" id="loop_false" name="loop" value="false" <?php if ( $loop == 'false' ) echo 'checked'; ?>/>
										<label for="loop_false" class="loop_false"><?php _e( 'No', 'logoshowcase' ); ?></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Choose an option whether you want to loop the sliders.', 'logoshowcase' ); ?></span>
								</td>
							</tr> <!-- End Loop -->

							<tr valign="top">
								<th scope="row">
									<label for="margin"><?php _e( 'Margin', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input size="5" type="number" name="margin" id="margin_top" maxlength="3" class="timezone_string" value="<?php if ( $margin != '' ) { echo $margin; } else { echo '15'; } ?>">
									<span class="logo_manager_hint"><?php echo __( 'Select margin for a slider item.', 'logoshowcase' ); ?></span>
								</td>
							</tr> <!-- End Margin -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_navigation"><?php echo __( 'Navigation:', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align: middle;">
									<div class="switch-field">
										<input type="radio" id="navigation_true" name="logo_showcase_navigation" value="true" <?php if ( $logo_showcase_navigation == 'true' || $logo_showcase_navigation == '' ) echo 'checked'; ?>/>
										<label for="navigation_true"><?php _e( 'Yes', 'logoshowcase' ); ?></label>
										<input type="radio" id="navigation_false" name="logo_showcase_navigation" value="false" <?php if ( $logo_showcase_navigation == 'false' ) echo 'checked'; ?>/>
										<label for="navigation_false" class="navigation_false"><?php _e( 'No', 'logoshowcase' ); ?></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Choose an option whether you want navigation option or not.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Navigation Show/Hide -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_navigation_position"><?php echo __( 'Navigation Position', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
								<select class="timezone_string" name="logo_showcase_navigation_position">
									<option value="topright" <?php if ( $logo_showcase_navigation_position == 'topright' ) echo "selected"; ?> ><?php _e( 'Top Right', 'logoshowcase' ); ?></option>
									<option disabled value="topleft" <?php if ( $logo_showcase_navigation_position == 'topleft' ) echo "selected"; ?> ><?php _e( 'Top Left (Pro)', 'logoshowcase' ); ?></option>
									<option disabled value="centred" <?php if ( $logo_showcase_navigation_position == 'centred' ) echo "selected"; ?> ><?php _e( 'Centred (Pro)', 'logoshowcase' ); ?></option>
								</select><br/>
								<span class="logo_manager_hint"><?php echo __('Choose Navigation Position.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Navigation Position -->

							<tr valign="top" id="navi_style_controller">
								<th scope="row">
									<label for="logo_showcase_navigation_style"><?php _e( 'Navigation Style', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<div class="switch-field">
										<input type="radio" id="navigation_style_left" name="logo_showcase_navigation_style" value="0" <?php if ( $logo_showcase_navigation_style == '0' ) echo 'checked'; ?>/>
										<label for="navigation_style_left"><?php _e( 'Default', 'logoshowcase' ); ?></label>
										<input type="radio" disabled id="navigation_style_center" name="logo_showcase_navigation_style" value="50" <?php if ( $logo_showcase_navigation_style == '50' || $logo_showcase_navigation_style == '' ) echo 'checked'; ?>/>
										<label for="navigation_style_center"><?php _e( 'Round', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
									</div>
									<span class="logo_manager_hint"><?php echo __( 'Set the style of navigation tool.' ); ?> To unlock all, <a href="https://www.themepoints.com/shop/logo-showcase-pro" target="_blank">Upgrade To Pro!</a></span>
								</td>
							</tr> <!-- End Navigation Style -->

							<tr valign="top" id="navi_color_controller">
								<th scope="row">
									<label for="logo_showcase_navigation_text_color"><?php _e( 'Navigation Color', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input type="text" id="logo_showcase_navigation_text_color" size="5" type="text" name="logo_showcase_navigation_text_color" value="<?php if ( $logo_showcase_navigation_text_color != '' ) {echo $logo_showcase_navigation_text_color; } else{ echo "#ffffff"; } ?>" class="timezone_string">
									<span class="logo_manager_hint"><?php echo __( 'Pick a color for navigation tool.', 'logoshowcase' ); ?></span>
								</td>
							</tr> <!-- End Navigation Color -->

							<tr valign="top" id="navi_bgcolor_controller">
								<th scope="row">
									<label for="logo_showcase_navigation_bg_color"><?php _e( 'Navigation Background', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input id="logo_showcase_navigation_bg_color" type="text" name="logo_showcase_navigation_bg_color" value="<?php if ( $logo_showcase_navigation_bg_color !='' ) {echo $logo_showcase_navigation_bg_color; } else{ echo "#dddddd"; } ?>" class="timezone_string">
									<span class="logo_manager_hint"><?php echo __( 'Pick a color for background of navigation tool.', 'logoshowcase' ); ?></span>
								</td>
							</tr> <!-- End Navigation Background Color -->

							<tr valign="top" id="navi_color_hover_controller">
								<th scope="row">
									<label for="logo_showcase_navigation_hover_text_color"><?php _e( 'Navigation Color(Hover)', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input id="logo_showcase_navigation_hover_text_color" type="text" name="logo_showcase_navigation_hover_text_color" value="<?php if ( $logo_showcase_navigation_hover_text_color != '' ) {echo $logo_showcase_navigation_hover_text_color; } else{ echo "#ffffff"; } ?>" class="timezone_string">
									<span class="logo_manager_hint"><?php echo __( 'Pick a color for navigation tool on mouse hover.', 'logoshowcase' ); ?></span>
								</td>
							</tr> <!-- End Navigation Color Hover -->

							<tr valign="top" id="navi_bgcolor_hover_controller">
								<th scope="row">
									<label for="logo_showcase_navigation_hover_bg_color"><?php _e( 'Navigation Background(Hover)', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input id="logo_showcase_navigation_hover_bg_color" type="text" name="logo_showcase_navigation_hover_bg_color" value="<?php if ( $logo_showcase_navigation_hover_bg_color !='' ) {echo $logo_showcase_navigation_hover_bg_color; } else{ echo "#938f8f"; } ?>" class="timezone_string">
									<span class="logo_manager_hint"><?php echo __( 'Pick a color for background of navigation tool on mouse hover.', 'logoshowcase' ); ?></span>
								</td>
							</tr> <!-- End Navigation Background Color -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_pagination"><?php echo __( 'Pagination:', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align: middle;">
									<div class="switch-field">
										<input type="radio" id="pagination_true" name="logo_showcase_pagination" value="true" <?php if ( $logo_showcase_pagination == 'true' || $logo_showcase_pagination == '' ) echo 'checked'; ?>/>
										<label for="pagination_true"><?php _e( 'Yes', 'logoshowcase' ); ?></label>
										<input type="radio" id="pagination_false" name="logo_showcase_pagination" value="false" <?php if ( $logo_showcase_pagination == 'false' ) echo 'checked'; ?>/>
										<label for="pagination_false" class="pagination_false"><?php _e( 'No', 'logoshowcase' ); ?></label>
									</div>	
									<span class="logo_manager_hint"><?php echo __( 'Choose an option whether you want pagination option or not.', 'logoshowcase' ); ?></span>						
								</td>
							</tr><!-- End Pagination Show/Hide -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_pagination_style"><?php echo __( 'Pagination Style', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align:middle;">
									<select class="timezone_string" name="logo_showcase_pagination_style">
										<option value="1" <?php if ( $logo_showcase_pagination_style == '1' ) echo "selected"; ?> ><?php _e( 'Round', 'logoshowcase' ); ?></option>		
										<option disabled value="2" <?php if ( $logo_showcase_pagination_style == '2' ) echo "selected"; ?> ><?php _e( 'Square (Pro)', 'logoshowcase' ); ?></option>
										<option disabled value="3" <?php if ( $logo_showcase_pagination_style == '3' ) echo "selected"; ?> ><?php _e( 'Line (Pro)', 'logoshowcase' ); ?></option>
									</select><br/>
									<span class="logo_manager_hint"><?php echo __('Choose Pagination Style.', 'logoshowcase'); ?></span>
								</td>
							</tr><!-- End Pagination Style -->

							<tr valign="top">
								<th scope="row"><label for="logo_showcase_pagination_position"><?php echo __( 'Pagination Position', 'logoshowcase' ); ?></label></th>
								<td style="vertical-align: middle;">
									<div class="switch-field">
										<input type="radio" id="pagination_align_left" name="logo_showcase_pagination_position" value="left" <?php if ( $logo_showcase_pagination_position == 'left' ) echo 'checked'; ?>/>
										<label for="pagination_align_left"><?php _e( 'Left', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
										<input type="radio" id="pagination_align_center" name="logo_showcase_pagination_position" value="center" <?php if ( $logo_showcase_pagination_position == 'center' || $logo_showcase_pagination_position == '' ) echo 'checked'; ?>/>
										<label for="pagination_align_center"><?php _e( 'Center', 'logoshowcase' ); ?></label>
										<input type="radio" id="pagination_align_right" name="logo_showcase_pagination_position" value="right" <?php if ( $logo_showcase_pagination_position == 'right' ) echo 'checked'; ?>/>
										<label for="pagination_align_right"><?php _e( 'Right', 'logoshowcase' ); ?><span class="mark"><?php _e( 'Pro', 'logoshowcase' ); ?></span></label>
									</div>	
									<span class="logo_manager_hint"><?php echo __( 'Set the alignment of pagination.' ); ?> To unlock all, <a href="https://www.themepoints.com/shop/logo-showcase-pro" target="_blank">Upgrade To Pro!</a></span>
								</td>
							</tr><!-- End Pagination Position -->

							<tr valign="top" id="pagi_color_controller">
								<th scope="row">
									<label for="logo_showcase_pagination_bg_color"><?php _e( 'Pagination Background Color', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input id="logo_showcase_pagination_bg_color" type="text" name="logo_showcase_pagination_bg_color" value="<?php if ( $logo_showcase_pagination_bg_color !='' ) {echo $logo_showcase_pagination_bg_color; } else{ echo "#ddd"; } ?>" class="timezone_string">
									<span class="logo_manager_hint"><?php echo __( 'Pick a color for pagination content.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Pagination Background Color -->

							<tr valign="top" id="pagi_color_active_controller">
								<th scope="row">
									<label for="logo_showcase_pagination_active_bg_color"><?php _e( 'Pagination Background(Active)', 'logoshowcase' ); ?></label>
								</th>
								<td style="vertical-align: middle;">
									<input id="logo_showcase_pagination_active_bg_color" type="text" name="logo_showcase_pagination_active_bg_color" value="<?php if ( $logo_showcase_pagination_active_bg_color !='' ) {echo $logo_showcase_pagination_active_bg_color; } else{ echo "#938f8f"; } ?>" class="timezone_string">
									<span class="logo_manager_hint"><?php echo __( 'Pick a color for active pagination content.', 'logoshowcase' ); ?></span>
								</td>
							</tr><!-- End Pagination Active Background Color -->
						</table>
					</div>
				</div>
			</div>
		</li>
		<!-- Tab 5 -->
		<li style="<?php if ( $nav_value == 5 ) { echo "display: block;"; } else { echo "display: none;"; } ?>" class="box5 tab-box <?php if ( $nav_value == 5 ) { echo "active"; } ?>">
			<div class="option-box">
				<div class="tp-accordions-pro-shortcodes">
					<h2><?php _e( 'Shortcodes', 'logoshowcase' ); ?></h2>
					<p><?php _e( 'Copy this shortcode and paste on page or post where you want to display Logo Showcase.', 'logoshowcase' ); ?></p>
					<textarea cols="30" rows="1" onClick="this.select();">[logo_showcase <?php echo 'id="'.$post->ID.'"'; ?>]</textarea>
					<p><?php _e( 'Use PHP code to your themes file to display logo showcase', 'logoshowcase' ); ?></p>
					<textarea cols="54" rows="1" onClick="this.select();"><?php echo '<?php echo do_shortcode( "[logo_showcase id='; echo "'".$post->ID."']"; echo '" ); ?>';?></textarea>
				</div>
			</div>
		</li>
		<!-- Tab 2 -->
	</ul>
<?php
}

/*==========================================================================
	When the post is saved, saves our custom data
==========================================================================*/	

function logo_showcase_wordpress_save_postdata( $post_id ) {

	$new = array();
	$count = 1;
	if ( ! empty( $_POST['logo_showcase_title'] ) || ! empty( $_POST['logo_showcase_link_url'] ) || ! empty( $_POST['logo_showcase_uploader'] ) || ! empty( $_POST['logo_showcase_desc'] ) ) {
		$logo_showcase_titles       = $_POST['logo_showcase_title'];
		$logo_showcase_link_urls    = $_POST['logo_showcase_link_url'];
		$logo_showcase_uploader     = $_POST['logo_showcase_uploader'];
		$logo_showcase_desc     	= $_POST['logo_showcase_desc'];
		$count = count( $logo_showcase_titles );
	}

	delete_post_meta( $post_id, 'logo_showcase_columns' );
	if ( $count > 1 ) {
		for ( $i = 0; $i < $count - 1; $i++ ) {
			$new['logo_showcase_title'] 	  = stripslashes( strip_tags( $logo_showcase_titles[$i] ) );
			$new['logo_showcase_desc'] 	  	  = stripslashes( strip_tags( $logo_showcase_desc[$i] ) );
			$new['logo_showcase_link_url'] 	  = stripslashes( strip_tags( $logo_showcase_link_urls[$i] ) );
			$new['logo_showcase_uploader'] 	  = stripslashes( $logo_showcase_uploader[$i] );
			add_post_meta( $post_id, 'logo_showcase_columns', $new );
		}
	}

	// verify if this is an auto save routine. 
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( ! isset( $_POST['logo_showcase_wordpress_dynamicMeta_noncename'] ) )
		return;
	if ( ! wp_verify_nonce( $_POST['logo_showcase_wordpress_dynamicMeta_noncename'], plugin_basename( __FILE__ ) ) )
		return;
	// OK, we're authenticated: we need to find and save the data

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_post_themes'] ) && ( $_POST['logo_showcase_columns_post_themes'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_post_themes', esc_html( $_POST['logo_showcase_columns_post_themes'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['grid_normal_column'] ) && ( $_POST['grid_normal_column'] != '' ) ) {
        update_post_meta( $post_id, 'grid_normal_column', esc_html( $_POST['grid_normal_column'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_item_roderwidth'] ) && ( $_POST['logo_showcase_item_roderwidth'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_item_roderwidth', esc_html( $_POST['logo_showcase_item_roderwidth'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_item_padding'] ) && ( $_POST['logo_showcase_item_padding'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_item_padding', esc_html( $_POST['logo_showcase_item_padding'] ) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if ( isset( $_POST['grid_column_pleft'] ) && ( $_POST['grid_column_pleft'] != '' ) ) {
        update_post_meta( $post_id, 'grid_column_pleft', esc_html( $_POST['grid_column_pleft'] ) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if ( isset( $_POST['grid_column_pright'] ) && ( $_POST['grid_column_pright'] != '' ) ) {
        update_post_meta( $post_id, 'grid_column_pright', esc_html( $_POST['grid_column_pright'] ) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if ( isset( $_POST['grid_column_pbottom'] ) && ( $_POST['grid_column_pbottom'] != '' ) ) {
        update_post_meta( $post_id, 'grid_column_pbottom', esc_html( $_POST['grid_column_pbottom'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_show_items'] ) && ( $_POST['logo_showcase_columns_show_items'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_show_items', esc_html( $_POST['logo_showcase_columns_show_items'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_hover_effect'] ) && ( $_POST['logo_showcase_columns_hover_effect'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_hover_effect', esc_html( $_POST['logo_showcase_columns_hover_effect'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_image_effect'] ) && ( $_POST['logo_showcase_columns_image_effect'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_image_effect', esc_html( $_POST['logo_showcase_columns_image_effect'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_image_effect_hover'] ) && ( $_POST['logo_showcase_columns_image_effect_hover'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_image_effect_hover', esc_html( $_POST['logo_showcase_columns_image_effect_hover'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_show_hide_tooltips'] ) && ( $_POST['logo_showcase_columns_show_hide_tooltips'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_show_hide_tooltips', esc_html( $_POST['logo_showcase_columns_show_hide_tooltips'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_tooltips_positions'] ) && ( $_POST['logo_showcase_tooltips_positions'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_tooltips_positions', esc_html( $_POST['logo_showcase_tooltips_positions'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_tooltips_color'] ) && ( $_POST['logo_showcase_tooltips_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_tooltips_color', esc_html( $_POST['logo_showcase_tooltips_color'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_tooltips_bgcolor'] ) && ( $_POST['logo_showcase_tooltips_bgcolor'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_tooltips_bgcolor', esc_html( $_POST['logo_showcase_tooltips_bgcolor'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_items_background_color'] ) && ( $_POST['logo_showcase_items_background_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_items_background_color', esc_html( $_POST['logo_showcase_items_background_color'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_items_hover_background'] ) && ( $_POST['logo_showcase_items_hover_background'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_items_hover_background', esc_html( $_POST['logo_showcase_items_hover_background'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_border_color'] ) && ( $_POST['logo_showcase_columns_border_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_border_color', esc_html( $_POST['logo_showcase_columns_border_color'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_border_hover_color'] ) && ( $_POST['logo_showcase_columns_border_hover_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_border_hover_color', esc_html( $_POST['logo_showcase_columns_border_hover_color'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['itemsdesktop'] ) && ( $_POST['itemsdesktop'] != '' ) ) {
        update_post_meta( $post_id, 'itemsdesktop', esc_html( $_POST['itemsdesktop'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['itemsdesktopsmall'] ) && ( $_POST['itemsdesktopsmall'] != '' ) ) {
        update_post_meta( $post_id, 'itemsdesktopsmall', esc_html( $_POST['itemsdesktopsmall'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['itemsmobile'] ) && ( $_POST['itemsmobile'] != '' ) ) {
        update_post_meta( $post_id, 'itemsmobile', esc_html( $_POST['itemsmobile'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['loop'] ) && ( $_POST['loop'] != '' ) ) {
        update_post_meta( $post_id, 'loop', esc_html( $_POST['loop'] ) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if ( isset( $_POST['margin'] ) && ( $_POST['margin'] != '' ) ) {
        update_post_meta( $post_id, 'margin', esc_html( $_POST['margin'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_free_show_title_hide'] ) && ( $_POST['logo_showcase_free_show_title_hide'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_free_show_title_hide', esc_html( $_POST['logo_showcase_free_show_title_hide'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_title_position'] ) && ( $_POST['logo_showcase_columns_title_position'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_title_position', esc_html( $_POST['logo_showcase_columns_title_position'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_title_font_size'] ) && ( $_POST['logo_showcase_columns_title_font_size'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_title_font_size', esc_html( $_POST['logo_showcase_columns_title_font_size'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_free_title_font_style'] ) && ( $_POST['logo_showcase_free_title_font_style'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_free_title_font_style', esc_html( $_POST['logo_showcase_free_title_font_style'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_title_font_color'] ) && ( $_POST['logo_showcase_columns_title_font_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_title_font_color', esc_html( $_POST['logo_showcase_columns_title_font_color'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_desc_font_size'] ) && ( $_POST['logo_showcase_columns_desc_font_size'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_desc_font_size', esc_html( $_POST['logo_showcase_columns_desc_font_size'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_free_show_desc_hide'] ) && ( $_POST['logo_showcase_free_show_desc_hide'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_free_show_desc_hide', esc_html( $_POST['logo_showcase_free_show_desc_hide'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_desc_position'] ) && ( $_POST['logo_showcase_columns_desc_position'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_desc_position', esc_html( $_POST['logo_showcase_columns_desc_position'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_free_desc_font_style'] ) && ( $_POST['logo_showcase_free_desc_font_style'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_free_desc_font_style', esc_html( $_POST['logo_showcase_free_desc_font_style'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_desc_font_color'] ) && ( $_POST['logo_showcase_columns_desc_font_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_desc_font_color', esc_html( $_POST['logo_showcase_columns_desc_font_color'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_show_slide_speed'] ) && ( $_POST['logo_showcase_columns_show_slide_speed'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_show_slide_speed', esc_html( $_POST['logo_showcase_columns_show_slide_speed'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_columns_show_auto_play'] ) && ( $_POST['logo_showcase_columns_show_auto_play'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_columns_show_auto_play', esc_html( $_POST['logo_showcase_columns_show_auto_play'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['stop_hover_play'] ) && ( $_POST['stop_hover_play'] != '' ) ) {
        update_post_meta( $post_id, 'stop_hover_play', esc_html( $_POST['stop_hover_play'] ) );
    }

 	#Checks for input and sanitizes/saves if needed    
    if ( isset( $_POST['autoplaytimeout'] ) && ( $_POST['autoplaytimeout'] != '' ) ) {
        update_post_meta( $post_id, 'autoplaytimeout', esc_html( $_POST['autoplaytimeout'] ) );
    }

	#Value check and saves if needed
	if ( isset( $_POST[ 'nav_value' ] ) ) {
		update_post_meta( $post_id, 'nav_value', $_POST['nav_value'] );
	} else {
		update_post_meta( $post_id, 'nav_value', 1 );
	}

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_pagination'] ) && ( $_POST['logo_showcase_pagination'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_pagination', esc_html( $_POST['logo_showcase_pagination'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_pagination_style'] ) && ( $_POST['logo_showcase_pagination_style'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_pagination_style', esc_html( $_POST['logo_showcase_pagination_style'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_pagination_position'] ) && ( $_POST['logo_showcase_pagination_position'] != '' ) ) {
   		update_post_meta( $post_id, 'logo_showcase_pagination_position', esc_html( $_POST['logo_showcase_pagination_position'] ) );
    }

    #Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_pagination_bg_color'] ) && ( $_POST['logo_showcase_pagination_bg_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_pagination_bg_color', esc_html( $_POST['logo_showcase_pagination_bg_color'] ) );
    }

    #Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_pagination_active_bg_color'] ) && ( $_POST['logo_showcase_pagination_active_bg_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_pagination_active_bg_color', esc_html( $_POST['logo_showcase_pagination_active_bg_color'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_navigation'] ) && ( $_POST['logo_showcase_navigation'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_navigation', esc_html( $_POST['logo_showcase_navigation'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_navigation_position'] ) && ( $_POST['logo_showcase_navigation_position'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_navigation_position', esc_html( $_POST['logo_showcase_navigation_position'] ) );
    }

 	#Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_navigation_style'] ) && ( $_POST['logo_showcase_navigation_style'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_navigation_style', esc_html( $_POST['logo_showcase_navigation_style'] ) );
    }

    #Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_navigation_text_color'] ) && ( $_POST['logo_showcase_navigation_text_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_navigation_text_color', esc_html( $_POST['logo_showcase_navigation_text_color'] ) );
    }

    #Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_navigation_bg_color'] ) && ( $_POST['logo_showcase_navigation_bg_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_navigation_bg_color', esc_html( $_POST['logo_showcase_navigation_bg_color'] ) );
    }

    #Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_navigation_hover_text_color'] ) && ( $_POST['logo_showcase_navigation_hover_text_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_navigation_hover_text_color', esc_html( $_POST['logo_showcase_navigation_hover_text_color'] ) );
    }

    #Checks for input and sanitizes/saves if needed
    if ( isset( $_POST['logo_showcase_navigation_hover_bg_color'] ) && ( $_POST['logo_showcase_navigation_hover_bg_color'] != '' ) ) {
        update_post_meta( $post_id, 'logo_showcase_navigation_hover_bg_color', esc_html( $_POST['logo_showcase_navigation_hover_bg_color'] ) );
    }
}
add_action( 'save_post', 'logo_showcase_wordpress_save_postdata' );


function tlsw_logoshowcase_notice_message() {
    // Show only to Admins
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $installed = get_option( 'tlsw_logoshowcase_activation_time' );
    if ( !$installed ) {
        update_option( 'tlsw_logoshowcase_activation_time', time() );
        $installed = time(); // Initialize $installed if not set
    }

    $dismiss_notice  = get_option( 'tlsw_logoshowcase_notice_dismiss', 'no' );
    $activation_time = get_option( 'tlsw_logoshowcase_activation_time' ); // Retrieving activation time
    $days_installed = floor((time() - $activation_time) / (60 * 60 * 24)); // Calculating days since installation

    $plugin_url      = 'https://wordpress.org/support/plugin/logo-showcase/reviews/#new-post';

    // Nonce field
    $nonce_field = wp_nonce_field( 'tlsw_logoshowcase_dismiss_notice_nonce', '_nonce', true, false );

    // check if it has already been dismissed
    if ( 'yes' === $dismiss_notice ) {
        return;
    }

    if ( time() - $activation_time < 604800 ) {
        return;
    }

    ?>

    <div id="tlsw-logoshowcase-review-notice" class="tlsw-logoshowcase-review-notice">
        <div class="testimonial-review-text">
            <h3><?php echo wp_kses_post( 'Enjoying Logo Showcase?', 'logoshowcase' ); ?></h3>
            <p><?php echo wp_kses_post( 'Awesome, you\'ve been using <strong>Logo Showcase Plugin</strong> for more than 1 week. May we ask you to give it a <strong>5-star rating</strong> on Wordpress? </br>
                    This will help to spread its popularity and to make this plugin a better one.
                    <br><br>Your help is much appreciated. Thank you very much,<br> Themepoints', 'logoshowcase' ); ?></p>
            <ul class="testimonial-review-ul">
                <li><a href="<?php echo esc_url( $plugin_url ); ?>" target="_blank"><span class="dashicons dashicons-external"></span><?php esc_html_e( 'Sure! I\'d love to!', 'logoshowcase' ); ?></a></li>
                <li><a href="#" class="notice-dismiss" data-nonce="<?php echo esc_attr(wp_create_nonce('tlsw_logoshowcase_dismiss_notice_nonce')); ?>"><span class="dashicons dashicons-smiley"></span><?php esc_html_e( 'I\'ve already left a review', 'logoshowcase' ); ?></a></li>
                <li><a href="#" class="notice-dismiss" data-nonce="<?php echo esc_attr(wp_create_nonce('tlsw_logoshowcase_dismiss_notice_nonce')); ?>"><span class="dashicons dashicons-dismiss"></span><?php esc_html_e( 'Never show again', 'logoshowcase' ); ?></a></li>
            </ul>
        </div>
    </div>

    <style type="text/css">
        #tlsw-logoshowcase-review-notice .notice-dismiss{
            padding: 0 0 0 26px;
        }
        #tlsw-logoshowcase-review-notice .notice-dismiss:before{
            display: none;
        }
        #tlsw-logoshowcase-review-notice.tlsw-logoshowcase-review-notice {
            padding: 15px;
            background-color: #fff;
            border-radius: 3px;
            margin: 30px 20px 0 0;
            border-left: 4px solid transparent;
        }
        #tlsw-logoshowcase-review-notice .testimonial-review-text {
            overflow: hidden;
        }
        #tlsw-logoshowcase-review-notice .testimonial-review-text h3 {
            font-size: 24px;
            margin: 0 0 5px;
            font-weight: 400;
            line-height: 1.3;
        }
        #tlsw-logoshowcase-review-notice .testimonial-review-text p {
            font-size: 15px;
            margin: 0 0 10px;
        }
        #tlsw-logoshowcase-review-notice .testimonial-review-ul {
            margin: 0;
            padding: 0;
        }
        #tlsw-logoshowcase-review-notice .testimonial-review-ul li {
            display: inline-block;
            margin-right: 15px;
        }
        #tlsw-logoshowcase-review-notice .testimonial-review-ul li a {
            display: inline-block;
            color: #2271b1;
            text-decoration: none;
            padding-left: 26px;
            position: relative;
        }
        #tlsw-logoshowcase-review-notice .testimonial-review-ul li a span {
            position: absolute;
            left: 0;
            top: -2px;
        }
    </style>

    <script>
        jQuery(document).ready(function($) {
            // Dismiss notice
            $('.notice-dismiss').on('click', function(e) {
                e.preventDefault();

                var nonce = $(this).data('nonce');
                var data = {
                    action: 'tlsw_logoshowcase_dismiss_review_notice',
                    _nonce: nonce,
                    dismissed: true // Indicate that the notice is being dismissed
                };

                $.post(ajaxurl, data, function(response) {
                    $('#tlsw-logoshowcase-review-notice').remove();
                });
            });
        });
    </script>
    <?php
}
add_action( 'admin_notices', 'tlsw_logoshowcase_notice_message' );

function tlsw_logoshowcase_dismiss_review_notice() {
    check_ajax_referer( 'tlsw_logoshowcase_dismiss_notice_nonce', '_nonce' ); // Verifying nonce

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( __( 'Unauthorized operation', 'logoshowcase' ) );
    }

    if ( ! isset( $_POST['_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['_nonce'] ), 'tlsw_logoshowcase_dismiss_notice_nonce' ) ) {
        wp_send_json_error( __( 'Unauthorized operation', 'logoshowcase' ) );
    }

    if ( isset( $_POST['dismissed'] ) ) {
        update_option( 'tlsw_logoshowcase_notice_dismiss', 'yes' );
        wp_send_json_success( __( 'Notice dismissed successfully', 'logoshowcase' ) );
    } else {
        wp_send_json_error( __( 'Dismissal data missing', 'logoshowcase' ) );
    }
}
add_action( 'wp_ajax_tlsw_logoshowcase_dismiss_review_notice', 'tlsw_logoshowcase_dismiss_review_notice' );