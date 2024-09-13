<?php

namespace Brandy\Builder\Header;

use Brandy\Builder\Element\ElementBuilder;
use Brandy\Traits\SingletonTrait;

class ToggleOffCanvasBuilder {
	use SingletonTrait;

	protected function __construct() {
		add_action( 'brandy_toggle_off_canvas', array( $this, 'render_toggle_off_canvas' ) );
	}

	public function render_toggle_off_canvas() {
		get_template_part( 'template-parts/builder/header/toggle-off-canvas-layout' );
	}

	public static function render_elements( $device ) {
		$current_template = brandy_get_header_template();
		$element_ids      = $current_template['placements'][ 'tablet' === $device ? 'mobile' : $device ]['toggle'];
		foreach ( $element_ids as $element_id ) {
			$element  = $current_template['elements'][ $element_id ];
			$renderer = new ElementBuilder( 'header', $element );
			$renderer->render();
		}
	}

	public static function render_close_icon() { ?>
	<div class="brandy-toc-close-icon">
		<?php ob_start(); ?>
		<svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_4752_84776)">
			<path d="M11.7465 11.0349C11.9074 11.1958 11.9979 11.4141 11.9979 11.6417C11.9979 11.8694 11.9074 12.0877 11.7465 12.2486C11.5855 12.4096 11.3672 12.5 11.1396 12.5C10.912 12.5 10.6937 12.4096 10.5327 12.2486L5.99964 7.71412L1.46515 12.2472C1.30419 12.4081 1.08589 12.4986 0.858264 12.4986C0.630638 12.4986 0.412335 12.4081 0.25138 12.2472C0.0904241 12.0862 2.39843e-09 11.8679 0 11.6403C-2.39843e-09 11.4127 0.0904241 11.1944 0.25138 11.0334L4.78587 6.50036L0.252807 1.96586C0.0918518 1.80491 0.00142799 1.5866 0.001428 1.35898C0.001428 1.13135 0.0918518 0.913049 0.252807 0.752094C0.413763 0.591138 0.632066 0.500714 0.859692 0.500714C1.08732 0.500714 1.30562 0.591138 1.46658 0.752094L5.99964 5.28659L10.5341 0.751379C10.6951 0.590424 10.9134 0.5 11.141 0.5C11.3686 0.5 11.587 0.590424 11.7479 0.751379C11.9089 0.912335 11.9993 1.13064 11.9993 1.35826C11.9993 1.58589 11.9089 1.80419 11.7479 1.96515L7.21341 6.50036L11.7465 11.0349Z" fill="#A1ABB7"/>
			</g>
			<defs>
			<clipPath id="clip0_4752_84776">
			<rect width="12" height="12" fill="white" transform="translate(0 0.5)"/>
			</clipPath>
			</defs>
			</svg>
		<?php
		$icon = ob_get_contents();
		ob_end_clean();
		brandy_render_icon( $icon );
		?>
	</div>
		<?php
	}

}
