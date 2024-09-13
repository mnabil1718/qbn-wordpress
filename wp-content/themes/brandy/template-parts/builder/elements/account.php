<?php
/**
 * Template for account section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Customizer\Elements\Account;
use Brandy\Utils\Helpers;

if ( empty( $args['element'] ) ) {
	return;
}

$element       = $args['element'];
$section_id    = $element['id'];
$section_title = $element['title'];
$attributes    = array(
	'class'              => 'brandy-account-element ' . esc_attr( brandy_get_editable_class() ),
	'data-builder'       => $args['builder'],
	'data-section-id'    => $section_id,
	'data-section-title' => $section_title,
	'data-element-type'  => $section_id,
);
$settings      = $element['settings'];

if ( empty( $settings ) ) {
	return;
}

$icon         = Account::get_account_icon( $settings );
$label        = Account::get_account_label( $settings );
$account_link = Account::get_account_link( $settings );
$state        = Account::get_state();
$icon_style   = $settings[ $state ]['icon']['style'] ?? 'outline';
?>
<div <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper">
		<?php
		if ( is_user_logged_in() ) :
			$profile_type = $settings[ Account::LOGGED_IN_STATE ]['profile_type'] ?? 'avatar';
			foreach ( brandy_get_devices() as $device ) :
				$label_position     = Helpers::get_device_value( $settings[ Account::LOGGED_IN_STATE ]['label']['position'], $device );
				$wrapper_attributes = array(
					'label-position' => Account::LOGGED_IN_STATE === $state ? $label_position : null,
					'device'         => $device,
					'href'           => $account_link,
					'state'          => $state,
					'target'         => ! empty( $settings[ Account::LOGGED_IN_STATE ]['target'] ) ? '_blank' : '_self',
				);
				?>
				<a class="brandy-account" <?php brandy_print_dom_attributes( $wrapper_attributes ); ?> profile-type=<?php echo esc_attr( $profile_type ); ?> aria-label="View account">
					<?php if ( 'text' !== $profile_type ) : ?>
						<?php
						brandy_render_icon(
							$icon,
							array(
								'class' => 'brandy-account__icon',
								'type'  => esc_attr( $icon_style ),
							)
						);
						?>
					<?php endif; ?>
					<?php
					$label_display = Helpers::get_device_value( $settings[ Account::LOGGED_IN_STATE ]['label']['enabled'], $device ) ? 'show' : 'hide';
					?>
					<div class="brandy-account__label" device=<?php echo esc_attr( $device ); ?> <?php echo esc_attr( 'display-mode=' . $label_display ); ?>>
						<?php echo wp_kses_post( Helpers::get_device_value( $label, $device ) ); ?>
					</div>
				</a>
				<?php
			endforeach;
		else :
			$profile_type       = $settings[ Account::LOGGED_OUT_STATE ]['profile_type'] ?? 'text';
			$wrapper_attributes = array(
				'href'   => $account_link,
				'state'  => $state,
				'target' => ! empty( $settings[ Account::LOGGED_OUT_STATE ]['target'] ) ? '_blank' : '_self',
			);
			?>
			<a class="brandy-account" <?php brandy_print_dom_attributes( $wrapper_attributes ); ?> aria-label="View account">
				<?php if ( 'icon' === $profile_type ) : ?>
					<?php
					brandy_render_icon(
						$icon,
						array(
							'class' => 'brandy-account__icon',
							'type'  => esc_attr( $icon_style ),
						)
					);
					?>
				<?php endif; ?>
				<?php
				foreach ( brandy_get_devices() as $device ) :
					?>
					<?php
					$label_display = Helpers::get_device_value( $settings[ Account::LOGGED_OUT_STATE ]['label']['enabled'] ?? false, $device ) ? 'show' : 'hide';
					?>
				<div class="brandy-account__label" device=<?php echo esc_attr( $device ); ?> <?php echo esc_attr( 'display-mode=' . $label_display ); ?>>
					<?php echo wp_kses_post( Helpers::get_device_value( $label, $device ) ); ?>
				</div>
				<?php endforeach; ?>
			</a>
		<?php endif; ?>
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
