<?php
/**
 * Template for logo section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Customizer\Elements\Wishlist;
use Brandy\Utils\Helpers;
use Brandy\Wishlist\Initialize as WishlistInitialize;

	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'       => $args['builder'],
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => $section_id,
		'slide-position'     => $settings['slide_position'] ?? 'right',
	);

	$icon_style = $settings['icon_style'];
	$label      = $settings['label'];
	$devices    = brandy_get_devices();
	ob_start();
	get_template_part( Wishlist::$path_to_icons . $icon_style . '/' . $settings['icon_type'] );
	$icon = ob_get_contents();
	ob_end_clean();
	?>
<div class="brandy-wishlist-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper <?php echo esc_attr( $settings['css_classes'] ); ?>">
		<?php
		if ( 'page' === $settings['click_effect'] ) :
			$wishlist_page = WishlistInitialize::get_wishlist_url();
			?>
			<a href="<?php echo esc_url( $wishlist_page ); ?>">
		<?php endif; ?>
		<div class="brandy-wishlist">
			<div class="brandy-wishlist__icon">
				<?php brandy_render_icon( $icon ); ?>
				<?php
				foreach ( $devices as $device ) {
					brandy_render_badge( WishlistInitialize::count(), "device=$device display=" . ( Helpers::get_device_value( $settings['show_badge'], $device ) ? 'show' : 'hide' ) );
				}
				?>
			</div>
			<?php
			foreach ( $devices as $device ) :
				$label_attributes = array(
					'device'      => $device,
					'position'    => Helpers::get_device_value( $label['position'], $device ),
					'display'     => Helpers::get_device_value( $label['enabled'], $device ) ? 'show' : 'hide',
					'aria-device' => $device,
					'aria-text'   => esc_html( Helpers::get_device_value( $label['text'], $device ) ),
				);
				?>
				<div class="brandy-wishlist__label" <?php brandy_print_dom_attributes( $label_attributes ); ?>><?php echo esc_html( Helpers::get_device_value( $label['text'], $device ) ); ?></div>
			<?php endforeach; ?>
		</div>
		<?php if ( 'page' === $settings['click_effect'] ) : ?>
		</a>
		<?php endif; ?>
		<?php if ( 'dropdown' === $settings['click_effect'] ) : ?>
			<div class="brandy-wishlist-dropdown">
				<?php
				if ( function_exists( 'brandy_wishlist' ) ) {
					\brandy_wishlist( $settings );
				}
				?>
			</div>
		<?php endif; ?>
	</div>
	<?php
	if ( 'slide_in' == $settings['click_effect'] ) {
		?>
			<div class="brandy-drawer brandy-wishlist-drawer">
			<?php
			if ( function_exists( 'brandy_wishlist' ) ) {
				\brandy_wishlist( $settings );
			}
			?>
			</div>
			<div class="brandy-wishlist-overlay"></div>
			<?php
	}
	?>
	<?php
		get_template_part(
			'template-parts/common/edit-section-button',
			'',
			array(
				'part_id'   => $section_id,
				'part_name' => $section_title,
			)
		);
		?>
</div>
