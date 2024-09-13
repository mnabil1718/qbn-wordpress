<?php
/**
 * Template for currency section
 *
 * @package Brandy\Templates\Builder\Elements
 */

 //TODO:AT HOME
//  Show currency icon
//  Icon position
//  Show arraw icon
// Design:
// Currency icon
// Currency codes
// Icon arrow
// Item spacing

$element       = $args['element'];
$section_id    = $element['id'];
$section_title = $element['title'];
$settings      = $element['settings'];
$attributes    = array(
	'data-builder'       => $args['builder'],
	'data-section-id'    => $section_id,
	'data-section-title' => $section_title,
	'data-element-type'  => 'menu',
);

if ( ! function_exists( 'brandy_currency_dropdown' ) ) {
	function brandy_currency_dropdown( $settings, $echo = true ) {
		$currency_icon_position = isset( $settings['currency_icon_position'] ) ? $settings['currency_icon_position'] : 'left';
		if ( ! class_exists( '\Yay_Currency\Helpers\Helper' ) || ! class_exists( '\Yay_Currency\Helpers\YayCurrencyHelper' ) ) {
			return '';
		}

		$selected_currency_ID = apply_filters( 'yay_currency_get_id_selected_currency', \Yay_Currency\Helpers\YayCurrencyHelper::get_id_selected_currency() );
		$selected_currency    = null;

		$currencies = $settings['currencies'];

		foreach ( $currencies as $cur ) {
			if ( $cur['yay_id'] == $selected_currency_ID ) {
				$selected_currency = $cur;
				break;
			}
		}
		if ( is_null( $selected_currency ) ) {
			$selected_currency = $currencies[0];
		}
		$html = '';
		ob_start();
		?>
		<div class="brandy-element-wrapper relative">
			<div class="brandy-currency-switcher__placeholder">
				<div class="brandy-currency-box" flag-position=<?php echo esc_attr( $currency_icon_position ); ?>>
					<span class="brandy-currency-flag">
						<img src="<?php echo esc_url( $selected_currency['flag'] ); ?>" alt="currency-flag">
					</span>
					<span class="brandy-currency-name"><?php echo esc_html( $selected_currency['id'] ); ?></span>
				</div>
				<div class="brandy-currency-arrow" 
				<?php
				$arrow_status = array();
				foreach ( brandy_get_devices() as $device ) {
					$arrow_status[ "$device-enabled" ] = $settings['arrow_icon_enabled'] ? 'true' : 'false';
				}
				brandy_print_dom_attributes( $arrow_status );
				?>
				>
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 8L10 12L6 8" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</div>
			</div>
			<div class="brandy-currency-options">
				<?php

				foreach ( $currencies as $currency ) {
					?>
					<div class="brandy-currency-option <?php echo esc_attr( $selected_currency_ID == $currency['yay_id'] ? 'current-currency' : '' ); ?>" data-yay_id="<?php echo esc_attr( $currency['yay_id'] ); ?>" data-currency="<?php echo esc_attr( $currency['id'] ); ?>">
						<div class="brandy-currency-box" flag-position=<?php echo esc_attr( $currency_icon_position ); ?>>
							<span class="brandy-currency-flag">
								<img src="<?php echo esc_url( $currency['flag'] ); ?>" alt="currency-flag">
							</span>
							<span class="brandy-currency-name"><?php echo esc_html( $currency['id'] ); ?></span>
						</div>
						<span class="brandy-currency-option__suffix">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M17.3274 7.53122L10.5767 16.6102L6.66221 13.6996" stroke="#2271B1" stroke-width="1.5"/>
							</svg>
						</span>
					</div>
					<?php
				}
				?>
			</div>
			</div>
		<?php
		$html = ob_get_contents();
		ob_end_clean();
		if ( $echo ) {
			echo $html; //PHPCS: XSS ok.
		} else {
			return $html;
		}
	}
}
if ( ! function_exists( 'brandy_yaycurrency_form' ) ) {
	function brandy_yaycurrency_form() {
		if ( ! class_exists( '\Yay_Currency\Helpers\Helper' ) || ! class_exists( '\Yay_Currency\Helpers\YayCurrencyHelper' ) ) {
			return '';
		}
		$selected_currencies     = apply_filters( 'yay_currency_get_currencies_posts', \Yay_Currency\Helpers\Helper::get_currencies_post_type() );
		$selected_currency_ID    = apply_filters( 'yay_currency_get_id_selected_currency', \Yay_Currency\Helpers\YayCurrencyHelper::get_id_selected_currency() );
		$yay_currency_use_params = \Yay_Currency\Helpers\Helper::use_yay_currency_params();
		$name                    = $yay_currency_use_params ? 'yay_currency' : 'currency';

		?>
		<form action-xhr="<?php echo esc_url( get_home_url() ); ?>" method='POST' class='yay-currency-form-switcher brandy-yay-currency-form'>
			<?php \Yay_Currency\Helpers\Helper::create_nonce_field(); ?>
			<select class='yay-currency-switcher' name='<?php echo esc_attr( $name ); ?>' onchange='this.form.submit()'>
				<?php
				foreach ( $selected_currencies as $currency ) {
					echo '<option value="' . esc_attr( $currency->ID ) . '" ' . selected( $selected_currency_ID, $currency->ID, false ) . '></option>';
				}
				?>
			</select>
		</form>
		<?php
	}
}
?>
<div class="brandy-currency-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper">
		<?php
		if ( ! is_customize_preview() ) {
			brandy_yaycurrency_form();
		}
		?>
		<div class="brandy-currency">
			<?php
			if ( is_array( $settings['currencies'] ) && count( $settings['currencies'] ) > 0 ) {
				brandy_currency_dropdown( $settings );
			}

			?>
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
</div>
