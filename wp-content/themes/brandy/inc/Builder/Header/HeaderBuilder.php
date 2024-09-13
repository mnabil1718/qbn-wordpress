<?php

namespace Brandy\Builder\Header;

use Brandy\Builder\Element\ElementBuilder;
use Brandy\Builder\RowBuilder;
use Brandy\Traits\SingletonTrait;

class HeaderBuilder {

	use SingletonTrait;

	protected function __construct() {
		$this->load_dependencies();
		add_action( 'brandy_header', array( $this, 'render_header' ) );
		add_action( 'brandy_render_header_placement', array( $this, 'render_placement' ), 10, 2 );
	}

	private function load_dependencies() {
		ToggleOffCanvasBuilder::get_instance();
	}

	public function render_header() {
		get_template_part( 'template-parts/builder/header/header-layout' );
	}

	public function render_placement( string $row, $device ) {
		$current_template = brandy_get_header_template();
		$columns          = $current_template['placements'][ 'tablet' === $device ? 'mobile' : $device ][ $row ];
		foreach ( $columns as $index => $col_elements ) {
			if ( empty( $col_elements ) ) {
				continue;
			}
			$is_center = count( $columns ) % 2 !== 0 && intval( count( $columns ) / 2 ) == $index;
			?>
			<div class="header-col <?php echo esc_attr( 'col-' . ( $index + 1 ) ); ?> <?php echo $is_center ? 'is-center justify-center' : ''; ?> <?php echo $index > ( count( $columns ) / 2 ) ? esc_attr( 'justify-end' ) : ''; ?>">
											  <?php
												foreach ( $col_elements as $element_id ) {
													$element  = $current_template['elements'][ $element_id ];
													$renderer = new ElementBuilder( 'header', $element, $device );
													$renderer->render();
												}
												?>
			</div>
			<?php
		}
	}

	public function render_row( $row = 'top', $device = 'desktop' ) {
		( new RowBuilder( 'header', $row, $device ) )->render();
	}
}
