<?php

namespace Brandy\Builder;

use Brandy\Builder\Element\ElementBuilder;

class PartialBuilder {

	protected $element_type;
	protected $builder;

	public function __construct( $builder, $element_type ) {
		$this->element_type = $element_type;
		$this->builder      = $builder;
	}

	public function render() {
		$fn = 'brandy_get_' . $this->builder . '_template';
		if ( ! is_callable( $fn ) ) {
			return;
		}
		$current_template = call_user_func( $fn );
		foreach ( $current_template['elements'] as $element ) {
			if ( $this->element_type === $element['id'] ) {
				$renderer = new ElementBuilder( $this->builder, $element );
				$renderer->render();
			}
		}
	}

}
