<?php
/**
 * Template for language switcher section
 *
 * @package Brandy\Templates\Builder\Elements
 */

use Brandy\Utils\Helpers;

	$element          = $args['element'];
	$section_id       = $element['id'];
	$section_title    = $element['title'];
	$settings         = $element['settings'];
	$attributes       = array(
		'data-builder'       => $args['builder'],
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => $section_id,
	);
	$languages        = $settings['languages'];
	$flag_icon_style  = $settings['flag_icon_style'];
	$flag_name        = $settings['flag_name'];
	$current_language = $languages[0]['id'];

	if ( ! function_exists( 'language_render_item' ) ) {
		function language_render_item( $language, $flag_name, $flag_icon_style ) {
			?>
			<span class="brandy-lang-flag" icon-style="<?php echo esc_attr( $flag_icon_style ); ?>">
				<span class="flag-wrapper">
				<?php
					$flag = BRANDY_TEMPLATE_DIR . '/template-parts/flags/' . $language['flag'] . '.svg';
				if ( file_exists( $flag ) ) {
					require $flag;
				}
				?>
				</span>
			</span>
			<span class="brandy-lang-name">
				<?php
				foreach ( brandy_get_devices() as $device ) :
					$flag_name_type = Helpers::get_device_value( $flag_name['type'], $device );
					?>
					<span class="brandy-lang-name-<?php echo esc_attr( $device ); ?>" name-type=<?php echo esc_attr( $flag_name_type ); ?>><?php echo esc_html( 'country_language' === $flag_name_type ? $language['language_name'] : $language['country_code'] ); ?></span>
				<?php endforeach; ?>
			</span>
			<?php
		}
	}

	$show_type = $settings['show_type'];

	?>
<div class="brandy-lang-switcher-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper relative" show-type=<?php echo esc_attr( $show_type ); ?>>
		<?php if ( 'dropdown' === $show_type ) : ?> 
		<div class="brandy-lang-switcher__placeholder">
			<?php
			language_render_item( $languages[0], $flag_name, $flag_icon_style );
			?>
			
			<span class="brandy-lang-arrow">
				<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M14 8L10 12L6 8" stroke="<?php echo esc_attr( BRANDY_ICON_COLOR_NORMAL ); ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</span>
		</div>
		<?php endif; ?>
		<div class="brandy-lang-options" type=<?php echo esc_attr( $show_type ); ?>>
			<?php
			foreach ( $languages as $language ) :
				// $lang_url = esc_url( empty( $language['url'] ) ? '#' : $language['url'] );
				$lang_url = Helpers::replace_language_url( $language['id'] );
				?>
				<a class="brandy-lang-option <?php echo esc_attr( $current_language === $language['id'] ? 'selected' : '' ); ?>" data-lang="<?php echo esc_attr( $language['id'] ); ?>" href="<?php echo esc_url( $lang_url ); ?>">
					<div class="brandy-lang-option__content">
						<?php
						language_render_item( $language, $flag_name, $flag_icon_style );
						?>
					</div>
					<?php if ( 'dropdown' === $show_type ) : ?>
					<!-- <span class="brandy-lang-option__suffix">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M17.3274 7.53122L10.5767 16.6102L6.66221 13.6996" stroke="#2271B1" stroke-width="1.5"/>
						</svg>
					</span> -->
					<?php endif; ?>
				</a>
			<?php endforeach; ?>
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
