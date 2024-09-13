<?php

namespace Brandy\Customizer\Elements;

use Brandy\Abstracts\AbstractBaseElement;
use Brandy\Core\Services\StringVariablesService;
use Brandy\Traits\SingletonTrait;

class Copyright extends AbstractBaseElement {

	use SingletonTrait;

	protected $element_id = 'copyright';

	protected $builders = array( 'footer' );

	protected function register_components() {
		return array(
			'content'           => array(
				'type'           => 'PrefilledHTML',
				'default_value'  => 'Copyright © [current_year]. Make with [heart_icon] by [theme_author]',
				'description'    => sprintf( __( 'Arbitrary HTML code or shortcode. Available tags: %s', 'brandy' ), StringVariablesService::get_string_list_variables() ),
				'value_path'     => array( 'content' ),
				'prefilleds'     => array(
					array(
						'label' => '© [current_year] All Rights Reserved. Made with by [theme_author]',
						'value' => '© [current_year] All Rights Reserved. Made with by [theme_author]',
					),
					array(
						'label' => '© [current_year], [theme_author]. All Rights Reserved.',
						'value' => '© [current_year], [theme_author]. All Rights Reserved.',
					),
					array(
						'label' => '© [current_year], [theme_author]',
						'value' => '© [current_year], [theme_author]',
					),
					array(
						'label' => '© copyright [current_year], [theme_author], Inc',
						'value' => '© copyright [current_year], [theme_author], Inc',
					),
					array(
						'label' => 'All rights reserved © [theme_author] [current_year], Make it better.',
						'value' => 'All rights reserved © [theme_author] [current_year], Make it better.',
					),
					array(
						'label' => 'Copyright [current_year] [theme_author], all rights reserved.',
						'value' => 'Copyright [current_year] [theme_author], all rights reserved.',
					),
				),
				'render_options' => array(
					'type' => 'content',
					'data' => array(
						array(
							'selector'   => '.brandy-element-wrapper',
							'value_path' => array( 'content' ),
						),
					),
				),
			),
			'content_alignment' => array(
				'title'          => array(
					'text'         => __( 'Content Alignment', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'           => 'Alignment',
				'value_path'     => array( 'content_alignment' ),
				'default_value'  => array(
					'desktop' => 'left',
					'tablet'  => null,
					'mobile'  => null,
				),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'name'       => '--element-copyright-content-alignment-desktop',
							'value_path' => array( 'content_alignment', 'desktop' ),
						),
						array(
							'name'       => '--element-copyright-content-alignment-tablet',
							'value_path' => array( 'content_alignment', 'tablet' ),
						),
						array(
							'name'       => '--element-copyright-content-alignment-mobile',
							'value_path' => array( 'content_alignment', 'mobile' ),
						),
					),
				),
			),
			'text_reset'        => array(
				'title'       => array(
					'text'         => __( 'Text', 'brandy' ),
					'type'         => 'bold',
					'show_devices' => true,
				),
				'type'        => 'Reset',
				'reset_paths' => array(
					array( 'text' ),
				),
			),
			'text_color'        => array(
				'title'          => array(
					'text' => __( 'Text color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-primary-text)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'value_path'     => array( 'text_color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--element-copyright-text-color',
							'value_path' => array( 'text_color' ),
						),
					),
				),
			),
			'link_color'        => array(
				'title'          => array(
					'text' => __( 'Link color', 'brandy' ),
					'type' => 'normal',
				),
				'type'           => 'ColorGroup',
				'default_value'  => array(
					'normal' => array(
						'desktop' => 'var(--wp--preset--color--brandy-accent)',
						'tablet'  => null,
						'mobile'  => null,
					),
					'hover'  => array(
						'desktop' => 'var(--wp--preset--color--brandy-accent)',
						'tablet'  => null,
						'mobile'  => null,
					),
				),
				'value_path'     => array( 'link_color' ),
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'color',
							'name'       => '--element-copyright-link-color',
							'value_path' => array( 'link_color' ),
						),
					),
				),
			),
			'margin'            => array(
				'title'          => array(
					'text' => __( 'Margin', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'     => array( 'margin' ),
				'type'           => 'Spacing',
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
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--element-copyright-margin',
							'value_path' => array( 'margin' ),
						),
					),
				),
			),
			'padding'           => array(
				'title'          => array(
					'text' => __( 'Padding', 'brandy' ),
					'type' => 'bold',
				),
				'value_path'     => array( 'padding' ),
				'type'           => 'Spacing',
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
				'render_options' => array(
					'type' => 'variable',
					'data' => array(
						array(
							'type'       => 'spacing',
							'name'       => '--element-copyright-padding',
							'value_path' => array( 'padding' ),
						),
					),
				),
			),
		);
	}

	public function register_element( $elements = array() ) {
		$elements[ $this->element_id ] = array(
			'id'       => $this->element_id,
			'title'    => __( 'Copyright', 'brandy' ),
			'settings' => $this->get_settings(),
			'builders' => $this->builders,
			'icon'     => '<svg
			width="30"
			height="30"
			viewBox="0 0 30 30"
			fill="none"
			xmlns="http://www.w3.org/2000/svg"
		  >
			<path
			  d="M25 15C25 9.49 20.51 5 15 5C9.48 5 5 9.49 5 15C5 20.52 9.48 25 15 25C20.51 25 25 20.52 25 15ZM12.78 20.37L9.37 11.22C9.92 11.2 10.54 11.14 10.54 11.14C11.04 11.08 10.98 10.01 10.48 10.03C10.48 10.03 9.03 10.14 8.11 10.14C7.93 10.14 7.74 10.14 7.53 10.13C9.12 7.69 11.87 6.11 15 6.11C17.33 6.11 19.45 6.98 21.05 8.45C20.37 8.34 19.4 8.84 19.4 10.03C19.4 10.77 19.85 11.39 20.3 12.13C20.65 12.74 20.85 13.49 20.85 14.59C20.85 16.08 19.45 19.59 19.45 19.59L16.42 11.22C16.96 11.2 17.24 11.05 17.24 11.05C17.74 11 17.68 9.8 17.18 9.83C17.18 9.83 15.74 9.95 14.8 9.95C13.93 9.95 12.47 9.83 12.47 9.83C11.97 9.8 11.91 11.03 12.41 11.05L13.33 11.13L14.59 14.54L12.78 20.37ZM22.41 15C22.65 14.36 23.15 13.13 22.84 10.75C23.54 12.04 23.89 13.46 23.89 15C23.89 18.29 22.16 21.24 19.49 22.78C20.46 20.19 21.43 17.58 22.41 15ZM11.1 23.09C8.12 21.65 6.11 18.53 6.11 15C6.11 13.7 6.34 12.52 6.83 11.41C8.25 15.3 9.67 19.2 11.1 23.09ZM15.13 16.46L17.71 23.44C16.85 23.73 15.95 23.89 15 23.89C14.21 23.89 13.43 23.78 12.71 23.56C13.52 21.18 14.33 18.82 15.13 16.46Z"
			  fill="' . BRANDY_ICON_COLOR_NORMAL . '"
			/>
		  </svg>',
		);
		return $elements;
	}

	public function add_layout( $layouts = array() ) {
		$layout                       = array(
			'general' => array(
				'sections' => array(
					array(
						'components' => array( 'content' ),
					),
					array(
						'components' => array( 'content_alignment' ),
					),
				),
			),
			'designs' => array(
				'sections' => array(
					array(
						'components' => array( 'text_reset', 'text_color', 'link_color' ),
					),
					array(
						'components' => array( 'margin' ),
					),
					array(
						'components' => array( 'padding' ),
					),
				),
			),
		);
		$mapped_layout                = $this->map_layout( $layout );
		$layouts[ $this->element_id ] = $mapped_layout;
		return $layouts;
	}

}
