<?php

namespace Brandy\Customizer\Elements;

use Brandy\Abstracts\AbstractBaseElement;
use Brandy\Core\Services\TypographyService;

class BaseLogo extends AbstractBaseElement {

	protected $element_id = 'logo';

	protected $builders = array( 'header' );

	public function template_path() {
		return 'template-parts/builder/elements/logo';
	}

	protected function register_components() {
		return array(
			'logo_reset'              => array(
				'title'       => array(
					'text' => __( 'Logo', 'brandy' ),
					'type' => 'bold',
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'logo', 'url' ),
				),
			),
			'logo_url'                => array(
				'value_path'     => array( 'logo', 'url' ),
				'default_value'  => 'http://img.wpbrandy.com/uploads/yaycommerce-logo-desktop.png',
				'type'           => 'Image',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-logo[logo-type="primary"] img.logo-desktop',
							'name'       => 'src',
							'value_path' => array( 'logo', 'url' ),
						),
					),
				),
			),
			'logo_height'             => array(
				'value_path'     => array( 'logo', 'height' ),
				'title'          => array(
					'text' => 'Height',
					'type' => 'normal',
				),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'unit'  => 'px',
					'value' => 30,
					'min'   => 24,
					'max'   => 80,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-logo-height',
							'value_path' => array( 'logo', 'height' ),
						),
					),
				),
			),
			'logo_mobile_reset'       => array(
				'title'       => array(
					'text' => __( 'Logo on mobile', 'brandy' ),
					'type' => 'bold',
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'logo_mobile', 'url' ),
				),
			),
			'logo_mobile_url'         => array(
				'value_path'     => array( 'logo_mobile', 'url' ),
				'default_value'  => 'http://img.wpbrandy.com/uploads/yaycommerce-logo-tablet.png',
				'type'           => 'Image',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-logo[logo-type="primary"] img.logo-mobile',
							'name'       => 'src',
							'value_path' => array( 'logo_mobile', 'url' ),
						),
					),
				),
			),
			'logo_mobile_height'      => array(
				'value_path'     => array( 'logo_mobile', 'height' ),
				'title'          => array(
					'text' => 'Height',
					'type' => 'normal',
				),
				'units'          => array( 'px' ),
				'default_value'  => array(
					'unit'  => 'px',
					'value' => 30,
					'min'   => 24,
					'max'   => 80,
				),
				'type'           => 'Dimension',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-logo-mobile-height',
							'value_path' => array( 'logo_mobile', 'height' ),
						),
					),
				),
			),
			'sticky_logo_enabled'     => array(
				'value_path'     => array( 'sticky_logo', 'enabled' ),
				'title'          => array(
					'text' => __( 'Sticky Logo', 'brandy' ),
					'type' => 'bold',
				),
				'default_value'  => true,
				'type'           => 'Switcher',
				'render_options' => array(
					'type' => 'force_refresh',
				),
			),
			'sticky_logo_url'         => array(
				'value_path'         => array( 'sticky_logo', 'url' ),
				'default_value'      => 'http://img.wpbrandy.com/uploads/yaycommerce-logo-tablet.png',
				'type'               => 'Image',
				'render_options'     => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-logo[logo-type="sticky"] img',
							'name'       => 'src',
							'value_path' => array( 'sticky_logo', 'url' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'sticky_logo', 'enabled' ),
						'value'      => true,
					),
				),
			),
			'sticky_logo_height'      => array(
				'value_path'         => array( 'sticky_logo', 'height' ),
				'title'              => array(
					'text' => 'Height',
					'type' => 'normal',
				),
				'units'              => array( 'px' ),
				'default_value'      => array(
					'unit'  => 'px',
					'value' => 30,
					'min'   => 24,
					'max'   => 80,
				),
				'type'               => 'Dimension',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'dimension',
							'name'       => '--brandy-sticky-logo-height',
							'value_path' => array( 'sticky_logo', 'height' ),
						),
					),
				),
				'visible_conditions' => array(
					array(
						'value_path' => array( 'sticky_logo', 'enabled' ),
						'value'      => true,
					),
				),
			),
			'title_text'              => array(
				'title'         => array(
					'text' => __( 'Site title', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'    => array( 'title', 'text' ),
				'default_value' => get_bloginfo( 'name' ),
				'type'          => 'SiteTitle',
			),
			'title_enabled'           => array(
				'title'          => array(
					'text' => __( 'Enable on', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'EnabledDevices',
				'value_path'     => array( 'title', 'enabled_devices' ),
				'default_value'  => array(),
				'render_options' => array(
					'type'     => 'custom',
					'selector' => '.brandy-logo__title',
				),
			),
			'tagline_text'            => array(
				'title'         => array(
					'text' => __( 'Tagline', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'    => array( 'tagline', 'text' ),
				'default_value' => get_bloginfo( 'description' ),
				'type'          => 'SiteTagline',
			),
			'tagline_enabled'         => array(
				'title'          => array(
					'text' => __( 'Enable on', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'EnabledDevices',
				'value_path'     => array( 'tagline', 'enabled_devices' ),
				'default_value'  => array(),
				'render_options' => array(
					'type'     => 'custom',
					'selector' => '.brandy-logo__tagline',
				),
			),
			'content_position'        => array(
				'value_path'         => array( 'content_position' ),
				'title'              => array(
					'text' => __( 'Content position', 'brandy' ),
					'type' => 'bold',
				),
				'default_value'      => 'right',
				'type'               => 'Position',
				'render_options'     => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'   => '.brandy-logo',
							'name'       => 'content-position',
							'value_path' => array( 'content_position' ),
						),
					),
				),
				'visible_conditions' => array(
					'relation' => 'OR',
					array(
						'value_path' => array( 'title', 'enabled_devices' ),
						'value'      => array( 'desktop', 'mobile' ),
						'operator'   => 'CONTAIN',
					),
					array(
						'value_path' => array( 'tagline', 'enabled_devices' ),
						'value'      => array( 'desktop', 'mobile' ),
						'operator'   => 'CONTAIN',
					),
				),
			),
			'content_alignment'       => array(
				'value_path'         => array( 'content_alignment' ),
				'title'              => array(
					'text' => __( 'Content alignment', 'brandy' ),
					'type' => 'bold',
				),
				'default_value'      => 'left',
				'type'               => 'Alignment',
				'render_options'     => array(
					'type' => 'variable',
					'data' => array(
						array(
							'name'       => '--brandy-content-alignment',
							'value_path' => array( 'content_alignment' ),
						),
					),
				),
				'visible_conditions' => array(
					'relation' => 'AND',
					array(
						'value_path' => array( 'title', 'enabled_devices' ),
						'value'      => array( 'desktop', 'mobile' ),
						'operator'   => 'CONTAIN',
					),
					array(
						'value_path' => array( 'tagline', 'enabled_devices' ),
						'value'      => array( 'desktop', 'mobile' ),
						'operator'   => 'CONTAIN',
					),
				),
			),
			'css_classes'             => array(
				'title'          => array(
					'text' => __( 'Add CSS class', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'     => array( 'css_classes' ),
				'default_value'  => '',
				'type'           => 'TextInput',
				'render_options' => array(
					'type' => 'data_attribute',
					'data' => array(
						array(
							'selector'      => '.brandy-element-wrapper',
							'name'          => 'class',
							'value_path'    => array( 'css_classes' ),
							'default_class' => 'brandy-element-wrapper',
						),
					),
				),
			),
			'title_reset'             => array(
				'title'       => array(
					'text' => __( 'Title', 'brandy' ),
					'type' => 'bold',
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'title' ),
				),
			),
			'title_text_color'        => array(
				'title'          => array(
					'text'  => __( 'Text color', 'brandy' ),
					'style' => 'normal',
				),
				'value_path'     => array( 'title', 'color' ),
				'default_value'  => array(
					'normal' => 'var(--wp--preset--color--brandy-primary-text)',
					'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-logo-title-color',
							'value_path' => array( 'title', 'color' ),
						),
					),
				),
			),
			'title_text_typography'   => array(
				'title'          => array(
					'text'  => __( 'Typography', 'brandy' ),
					'style' => 'normal',
				),
				'value_path'     => array( 'title', 'typography' ),
				'default_value'  => TypographyService::get_default_typography_value(),
				'type'           => 'Typography',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--brandy-logo-title',
							'value_path' => array( 'title', 'typography' ),
						),
					),
				),
			),
			'tagline_reset'           => array(
				'title'       => array(
					'text' => __( 'Tagline', 'brandy' ),
					'type' => 'bold',
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'tagline' ),
				),
			),
			'tagline_text_color'      => array(
				'title'          => array(
					'text'  => __( 'Tagline color', 'brandy' ),
					'style' => 'normal',
				),
				'value_path'     => array( 'tagline', 'color' ),
				'default_value'  => array(
					'normal' => 'var(--wp--preset--color--brandy-primary-text)',
					'hover'  => 'var(--wp--preset--color--brandy-primary-text)',
				),
				'type'           => 'ColorGroup',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--brandy-logo-tagline-color',
							'value_path' => array( 'tagline', 'color' ),
						),
					),
				),
			),
			'tagline_text_typography' => array(
				'title'          => array(
					'text'  => __( 'Typography', 'brandy' ),
					'style' => 'normal',
				),
				'value_path'     => array( 'tagline', 'typography' ),
				'default_value'  => TypographyService::get_default_typography_value(
					array(
						'font_size' => array(
							'desktop' => array(
								'value' => 12,
							),
						),
					)
				),
				'type'           => 'Typography',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'typography',
							'name'       => '--brandy-logo-tagline',
							'value_path' => array( 'tagline', 'typography' ),
						),
					),
				),
			),
			'padding'                 => array(
				'value_path'     => array( 'padding' ),
				'title'          => array(
					'text'         => 'Padding',
					'type'         => 'bold',
					'show_devices' => true,
				),
				'section'        => 'spacing_section',
				'units'          => array( 'px', '%' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'px',
						'top'            => 0,
						'right'          => 0,
						'bottom'         => 0,
						'left'           => 0,
						'is_constraints' => false,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Spacing',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-padding',
							'value_path' => array( 'padding' ),
						),
					),
				),
			),
			'margin'                  => array(
				'value_path'     => array( 'margin' ),
				'title'          => array(
					'text'         => 'Margin',
					'type'         => 'bold',
					'show_devices' => true,
				),
				'section'        => 'spacing_section',
				'units'          => array( 'px', '%' ),
				'default_value'  => array(
					'desktop' => array(
						'unit'           => 'px',
						'top'            => 0,
						'right'          => 0,
						'bottom'         => 0,
						'left'           => 0,
						'is_constraints' => false,
					),
					'tablet'  => null,
					'mobile'  => null,
				),
				'type'           => 'Spacing',
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--brandy-margin',
							'value_path' => array( 'margin' ),
						),
					),
				),
			),
		);
	}

	public function register_element( $elements = array() ) {
		$elements[ $this->element_id ] = array(
			'id'       => $this->element_id,
			'title'    => __( 'Logo', 'brandy' ),
			'settings' => $this->map_settings( $this->components ),
			'builders' => $this->builders,
			'icon'     => '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 16.0003C6.5 11.3057 10.3057 7.5 15.0003 7.5C19.6949 7.5 23.5006 11.3057 23.5006 16.0003C23.5006 16.2767 23.4874 16.5499 23.4616 16.8195L19.0595 14.4184C18.8072 14.2808 18.4984 14.2995 18.2645 14.4665L15.352 16.5469L12.026 15.2996C11.8119 15.2193 11.5729 15.2411 11.3768 15.3587L6.76752 18.1243C6.59288 17.4454 6.5 16.7337 6.5 16.0003ZM7.25937 19.5172C8.59706 22.4568 11.56 24.5006 15.0003 24.5006C18.8735 24.5006 22.1416 21.9102 23.1667 18.3673L18.7539 15.9603L15.8987 17.9997C15.6955 18.1449 15.4333 18.1793 15.1994 18.0916L11.8382 16.8312L7.52339 19.4201C7.4397 19.4703 7.35016 19.5023 7.25937 19.5172ZM15.0003 6C9.47728 6 5 10.4773 5 16.0003C5 21.5233 9.47728 26.0006 15.0003 26.0006C20.5233 26.0006 25.0006 21.5233 25.0006 16.0003C25.0006 10.4773 20.5233 6 15.0003 6Z" fill="' . BRANDY_ICON_COLOR_NORMAL . '"/>
			</svg>
			',
		);
		return $elements;
	}

	public function add_layout( $layouts = array() ) {
		$layout                       = array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array(
							'logo_reset',
							'logo_url',
							'logo_height',
						),
					),
					array(
						'components' => array(
							'logo_mobile_reset',
							'logo_mobile_url',
							'logo_mobile_height',
						),
					),
					array(
						'components' => array(
							'sticky_logo_enabled',
							'sticky_logo_url',
							'sticky_logo_height',
						),
					),
					array(
						'components' => array(
							'title_text',
							'title_enabled',
						),
					),
					array(
						'components' => array(
							'tagline_text',
							'tagline_enabled',
						),
					),
					array(
						'components'         => array(
							'content_position',
							'content_alignment',
						),
						'visible_conditions' => array(
							'relation' => 'OR',
							array(
								'value_path' => array( 'title', 'enabled_devices' ),
								'value'      => array( 'desktop', 'mobile' ),
								'operator'   => 'CONTAIN',
							),
							array(
								'value_path' => array( 'tagline', 'enabled_devices' ),
								'value'      => array( 'desktop', 'mobile' ),
								'operator'   => 'CONTAIN',
							),
						),
					),
					array(
						'components' => array(
							'css_classes',
						),
					),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array(
							'title_reset',
							'title_text_typography',
							'title_text_color',
						),
					),
					array(
						'components' => array(
							'tagline_reset',
							'tagline_text_typography',
							'tagline_text_color',
						),
					),
					array(
						'components' => array(
							'padding',
						),
					),
					array(
						'components' => array(
							'margin',
						),
					),
				),
			),
		);
		$mapped_layout                = $this->map_layout( $layout );
		$layouts[ $this->element_id ] = $mapped_layout;
		return $layouts;
	}
}
