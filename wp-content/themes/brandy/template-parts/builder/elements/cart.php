<?php
/**
 * Template for cart section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Customizer\Elements\Cart;
use Brandy\Utils\Helpers;

	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'             => $args['builder'],
		'data-section-id'          => $section_id,
		'data-section-title'       => $section_title,
		'data-element-type'        => $section_id,
		'data-auto-open-mini-cart' => empty( $settings['auto_open_mini_cart'] ) ? 'false' : 'true',
	);

	ob_start();?>
	<svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4112_69147)">
		<path d="M11.7465 11.0349C11.9074 11.1958 11.9979 11.4141 11.9979 11.6417C11.9979 11.8694 11.9074 12.0877 11.7465 12.2486C11.5855 12.4096 11.3672 12.5 11.1396 12.5C10.912 12.5 10.6937 12.4096 10.5327 12.2486L5.99964 7.71412L1.46515 12.2472C1.30419 12.4081 1.08589 12.4986 0.858264 12.4986C0.630638 12.4986 0.412335 12.4081 0.25138 12.2472C0.0904241 12.0862 2.39843e-09 11.8679 0 11.6403C-2.39843e-09 11.4127 0.0904241 11.1944 0.25138 11.0334L4.78587 6.50036L0.252807 1.96586C0.0918518 1.80491 0.00142799 1.5866 0.001428 1.35898C0.001428 1.13135 0.0918518 0.913049 0.252807 0.752094C0.413763 0.591138 0.632066 0.500714 0.859692 0.500714C1.08732 0.500714 1.30562 0.591138 1.46658 0.752094L5.99964 5.28659L10.5341 0.751379C10.6951 0.590424 10.9134 0.5 11.141 0.5C11.3686 0.5 11.5869 0.590424 11.7479 0.751379C11.9089 0.912335 11.9993 1.13064 11.9993 1.35826C11.9993 1.58589 11.9089 1.80419 11.7479 1.96515L7.21341 6.50036L11.7465 11.0349Z" fill="#A1ABB7"/>
	</g>
	<defs>
	<clipPath id="clip0_4112_69147">
		<rect width="12" height="12" fill="white" transform="translate(0 0.5)"/>
	</clipPath>
	</defs>
	</svg>
	<?php
	$close_icon = ob_get_contents();
	ob_end_clean();
	?>
<div class="brandy-cart-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper">
		<?php
		$href = '#';
		if ( 'cart_page' == $settings['click_effect'] ) {
			$href = '/cart';
		}
		$items_count = 14;
		if ( \is_wc_installed() ) {
			$items_count = \WC()->cart->get_cart_contents_count();
		}
		?>
		<div class="brandy-cart-wrapper">
			<a href="<?php echo esc_url( $href ); ?>" data-click_effect="<?php echo esc_attr( $settings['click_effect'] ); ?>" class="brandy-cart-a" aria-label="View cart">
				<span class="brandy-cart-icon-wrap">
					<?php
						$icon = Cart::get_icon( $settings['icon'], $settings['icon_style'] );
						brandy_render_icon( $icon );
					?>
					<?php
						brandy_render_badge( $items_count, '', 'brandy-cart-qtybadge' );
					?>
					
				</span>

				<?php
				//show - hide label
				$devices = brandy_get_devices();
				foreach ( $devices as $device ) :
					$label_enabled = Helpers::get_device_value( $settings['cart_name']['enabled'], $device );
					echo '<span class="brandy-cart-label brandy-cart-label-' . esc_attr( $device ) . ' " device="' . esc_attr( $device ) . '" display="' . esc_attr( 1 == $label_enabled ? 'show' : 'hide' ) . '">';
					echo esc_html( Helpers::get_device_value( $settings['cart_name']['label'], $device ) );
					echo '</span>';
				endforeach;
				?>
			</a>
			<?php if ( 'dropdown' == $settings['click_effect'] ) : ?>
				<div class="brandy-cart-dropdown brandy-mini-cart" type=<?php echo esc_attr( $settings['click_effect'] ); ?>>
					<?php
					if ( ! \is_wc_installed() ) {
						?>
						<div style="padding: 20px"><?php esc_html_e( 'Please install WooCommerce', 'brandy' ); ?></div>
						<?php
					}
					if ( function_exists( 'woocommerce_mini_cart' ) ) {
						\woocommerce_mini_cart();
					}
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>
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
	
	<?php
	if ( 'slide_in' == $settings['click_effect'] ) {
		?>
		<div class="brandy-drawer brandy-cart-drawer brandy-mini-cart">
			<div class="widget_shopping_cart_content">
			<?php
			if ( ! \is_wc_installed() ) {
				?>
				<div class="brandy-mini-cart-wrapper">
					<div class="brandy-mini-cart-top">
						<div class="brandy-mini-cart__title">
							<h2 class="brandy-mini-cart__title__text"><?php echo wp_kses_post( sprintf( __( 'Your cart (%s)', 'brandy' ), 14 ) ); ?></h2>
							<button class="brandy-mini-cart__close" type="button" tabindex="0" title="Close mini cart"><span class="sr-only">Close panel</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg></button>
						</div>
						<div>
							<?php esc_html_e( 'Please install WooCommerce', 'brandy' ); ?>
						</div>
					</div>
				</div>
				<?php
			}
			if ( function_exists( 'woocommerce_mini_cart' ) ) {
				?>
					<?php \woocommerce_mini_cart(); ?>
					<?php
			}
			?>
			</div>
		</div>
		<div class="brandy-cart-overlay"></div>
		<?php
	}
	?>
</div>
