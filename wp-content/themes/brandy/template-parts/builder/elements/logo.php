<?php
/**
 * Template for logo section
 *
 * @package Brandy\Templates\Builder\Elements
 */


	$element       = $args['element'];
	$section_id    = $element['id'];
	$section_title = $element['title'];
	$settings      = $element['settings'];
	$attributes    = array(
		'data-builder'       => $args['builder'],
		'data-section-id'    => $section_id,
		'data-section-title' => $section_title,
		'data-element-type'  => 'logo',
	);

	$sticky_logo_enabled = isset( $settings['sticky_logo']['enabled'] ) ? $settings['sticky_logo']['enabled'] : false;

	if ( ! function_exists( 'render_logo_item' ) ) {
		function render_logo_item( $logo_type, $settings ) {
			$logo_settings        = 'primary' === $logo_type ? $settings['logo'] : $settings['sticky_logo'];
			$mobile_logo_settings = $settings['logo_mobile'];
			$content_position     = $settings['content_position'];
			$logo_attributes      = array(
				'logo-type'        => esc_attr( $logo_type ),
				'content-position' => esc_attr( $content_position ),
			);
			?>
			<div class="brandy-logo" <?php echo esc_attr( brandy_print_dom_attributes( $logo_attributes ) ); ?>>
				<a href="<?php echo esc_url( home_url() ); ?>">
					<img class="brandy-logo__img logo-desktop" src="<?php echo esc_url( $logo_settings['url'] ); ?>" alt="Site logo"/>
					<img class="brandy-logo__img logo-mobile" src="<?php echo esc_url( $mobile_logo_settings['url'] ); ?>" alt="Site mobile logo"/>
				</a>
				<div class="brandy-logo__content">
					<?php
					$types = array( 'title', 'tagline' );
					foreach ( $types as $type ) :
						if ( 'title' === $type ) {
							$text = get_bloginfo( 'name' );
						} else {
							$text = get_bloginfo( 'description' );
						}
						$attributes = array(
							'class' => "brandy-logo__{$type} " . brandy_enabled_devices_classes( $settings[ $type ]['enabled_devices'] ),
						);
						?>
							<div <?php brandy_print_dom_attributes( $attributes ); ?>><?php echo esc_html( $text ); ?></div>
						<?php
					endforeach;
					?>
				</div>
			</div>
			<?php
		}
	}

	?>

<div class="brandy-element brandy-logo-element <?php echo esc_attr( brandy_get_editable_class() ); ?>" <?php brandy_print_dom_attributes( $attributes ); ?>>
	<div class="brandy-element-wrapper <?php echo esc_attr( $settings['css_classes'] ); ?>">
		<?php render_logo_item( 'primary', $settings ); ?>
		<?php if ( $sticky_logo_enabled ) : ?>
			<?php render_logo_item( 'sticky', $settings ); ?>
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
