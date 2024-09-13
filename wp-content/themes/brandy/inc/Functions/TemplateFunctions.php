<?php
/**
 * Register theme template functions
 *
 * @package Brandy\Functions
 */

use Brandy\Core\Services\ProductCatalogService;

if ( ! function_exists( 'brandy_get_body_attributes' ) ) {
	function brandy_get_body_attributes() {
		global $post;
		$current_niche = brandy_current_niche();
		return apply_filters(
			'brandy_body_attributes',
			array_merge(
				empty( $current_niche ) ? array() : array(
					'data-current-niche' => $current_niche,
				),
				array(
					'data-loop-product-layout' => ProductCatalogService::get_product_layout(),
				)
			)
		);
	}
}

if ( ! function_exists( 'brandy_get_editable_class' ) ) {
	/**
	 * Returns class for wrapper when in customize mode
	 */
	function brandy_get_editable_class( $edit_type = 'section' ) {
		if ( is_customize_preview() ) {
			return 'row' === $edit_type ? 'editable-part editable-row-part' : 'editable-part editable-element-part';
		}
		return '';
	}
}

if ( ! function_exists( 'brandy_get_editable_attributes' ) ) {
	/**
	 * Returns attrubutes for wrapper when in customize mode
	 *
	 * @param string $section_id Section id.
	 */
	function brandy_get_editable_attributes( string $section_id ) {
		return true ? "data-section-id=$section_id" : '';
	}
}

if ( ! function_exists( 'brandy_print_dom_attributes' ) ) {
	/**
	 * Print DOM element attributes from given array
	 *
	 * @param array $attributes
	 *
	 * @return void
	 */
	function brandy_print_dom_attributes( $attributes ) {
		foreach ( $attributes as $attr_name => $attr_value ) {
			echo esc_attr( $attr_name );
			if ( ! empty( $attr_value ) ) {
				echo '="' . esc_attr( $attr_value ) . '"';
			}
		}
	}
}

if ( ! function_exists( 'brandy_get_devices' ) ) {
	/**
	 * Returns all device of theme
	 *
	 * @return array
	 */
	function brandy_get_devices() {
		return array( 'desktop', 'tablet', 'mobile' );
	}
}

if ( ! function_exists( 'brandy_enabled_devices_classes' ) ) {

	/**
	 * Return classes which indicate which device is hidden
	 *
	 * @param array $enabled_devices List enabled devices.
	 *
	 * @return string
	 */
	function brandy_enabled_devices_classes( $enabled_devices ) {
		if ( ! is_array( $enabled_devices ) ) {
			return '';
		}
		$hidden_devices = array_diff( array( 'desktop', 'mobile' ), $enabled_devices );
		$classes        = implode(
			' ',
			array_map(
				function( $device ) {
					if ( 'mobile' === $device ) {
						return 'hide-mobile hide-tablet';
					}
					return 'hide-' . $device;
				},
				$hidden_devices
			)
		);
		return $classes;
	}
}

if ( ! function_exists( 'brandy_render_badge' ) ) {
	/**
	 * Render Brandy badge
	 *
	 * @param string $number
	 * @param string $attrs
	 * @param string $class
	 *
	 * @return void
	 */
	function brandy_render_badge( $number, $attrs = '', $class = '' ) {
		get_template_part(
			'template-parts/common/badge',
			'',
			array(
				'number' => $number,
				'attrs'  => $attrs,
				'class'  => $class,
			)
		);
	}
}

if ( ! function_exists( 'brandy_render_icon' ) ) {
	/**
	 * Render Brandy icon
	 *
	 * @param string $icon Icon source
	 * @param string $class
	 * @param string $attrs
	 *
	 * @return void
	 */
	function brandy_render_icon( $icon, $attrs = array() ) {
		get_template_part(
			'template-parts/common/icon',
			'',
			array(
				'icon'  => $icon,
				'attrs' => $attrs,
			)
		);
	}
}


if ( ! class_exists( 'Brandy_Walker_Menu' ) ) {
	class Brandy_Walker_Menu extends Walker_Nav_Menu {

		public $menu_settings = null;

		public $layout = 'horizontal';

		public $level_output = array(
			'parent' => 'menu_item_parent',
			'id'     => 'db_id',
		);

		public $max_depth = PHP_INT_MAX;

		public $sub_menus = array();

		public function __construct( $settings, $layout = 'horizontal', $max_depth = PHP_INT_MAX ) {
			$this->menu_settings = $settings;
			$this->layout        = $layout;
			$this->max_depth     = $max_depth;
			add_filter( 'wp_nav_menu', array( $this, 'push_submenus' ), 100, 2 );
			add_filter( 'wp_page_menu', array( $this, 'push_submenus' ), 100, 2 );

		}

		public function push_submenus( $menu, $args ) {
			if ( 'vertical' === $this->layout ) {
				foreach ( array_reverse( $this->sub_menus ) as $sub_menu ) {
					$menu .= $sub_menu;
				}
			}
			remove_filter( 'wp_nav_menu', array( $this, 'push_submenus' ), 100 );
			remove_filter( 'wp_page_menu', array( $this, 'push_submenus' ), 100 );
			return $menu;
		}

		public function start_lvl( &$output, $depth = 1, $args = null, $element = null ) {
			if ( 'horizontal' === $this->layout ) {
				$output .= "\n<ul class='brandy-sub-menu'>\n";
			} else {
				$output .= "\n<ul class='brandy-sub-menu' parent-key='" . $element->object_id . "'>\n";
			}
		}

		public function end_lvl( &$output, $depth = 1, $args = null ) {
			$output .= '</ul>';
		}

		public function start_el( &$output, $item, $depth = 1, $args = array(), $id = 0 ) {
			if ( 'horizontal' === $this->layout ) {
				$this->start_el_horizontal( $output, $item, $depth, $args, $id );
			} else {
				$this->start_el_vertical( $output, $item, $depth, $args, $id );
			}
		}

		public function start_el_horizontal( &$output, $item, $depth = 1, $args = array(), $id = 0 ) {
			$item->classes       = empty( $item->classes ) ? array() : $item->classes;
			$has_children        = in_array( 'menu-item-has-children', $item->classes, true );
			$current_parent_item = $item->current_item_parent || in_array( 'current-menu-ancestor', $item->classes, true );
			$item_classes        = 'brandy-menu__item';
			if ( $item->current ) {
				$item_classes .= ' current-menu-item';
			}
			if ( $current_parent_item ) {
				$item_classes .= ' current-parent-item';
			}
			if ( $depth > 0 ) {
				$item_classes .= ' brandy-sub-menu__item';
			}
			if ( $has_children ) {
				$item_classes .= ' menu-item-has-children';
			}

			$item_attributes = array(
				'class'      => esc_attr( $item_classes ),
				'aria-label' => esc_html( $item->title ),
				'menu-key'   => esc_attr( $item->object_id ),
				'role'       => 'menuitem',
			);

			ob_start();
			?>
			<li <?php brandy_print_dom_attributes( $item_attributes ); ?> tabindex="<?php echo ( $item->current || $current_parent_item ) ? '0' : '-1'; ?>">
				<?php
				if ( 'yaycurrency-switcher' === $item->post_name ) :
					echo '<div>';
					echo do_shortcode( '[yaycurrency-menu-item-switcher]' );
					echo '</div>';
					?>
				<?php else : ?>
					<a href=<?php echo esc_url( $item->url ); ?>>
						<span class="brandy-menu-item__title"><?php echo esc_html( $item->title ); ?></span>
						<?php if ( $has_children ) : ?>
							<span class="brandy-menu-item__arrow"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.5034 7.91837L9.00006 12.0124L4.49668 7.91837L5.25343 7.08594L9.00006 10.492L12.7467 7.08594L13.5034 7.91837Z" fill="#1E1E1E"></path></svg></span>
						<?php endif; ?>
					</a>
				<?php endif; ?>
			<?php
			$html = ob_get_contents();
			ob_end_clean();
			$output .= $html;
		}

		public function start_el_vertical( &$output, $item, $depth = 1, $args = array(), $id = 0 ) {
			$item->classes       = empty( $item->classes ) ? array() : $item->classes;
			$has_children        = in_array( 'menu-item-has-children', $item->classes, true );
			$current_parent_item = $item->current_item_parent || in_array( 'current-menu-ancestor', $item->classes, true );

			$item_classes = 'brandy-menu__item';
			if ( $item->current ) {
				$item_classes .= ' current-menu-item';
			}
			if ( $current_parent_item ) {
				$item_classes .= ' current-parent-item';
			}
			if ( $depth > 0 ) {
				$item_classes .= ' brandy-sub-menu__item';
			}
			if ( $has_children ) {
				$item_classes .= ' menu-item-has-children';
			}

			$item_attributes = array(
				'class'      => esc_attr( $item_classes ),
				'aria-label' => esc_html( $item->title ),
				'menu-key'   => esc_attr( $item->object_id ),
				'role'       => 'menuitem',
			);
			ob_start();
			?>
			<li <?php brandy_print_dom_attributes( $item_attributes ); ?> tabindex="<?php echo ( $item->current || $current_parent_item ) ? '0' : '-1'; ?>">
				<a href=<?php echo esc_url( $item->url ); ?>>
					<span class="brandy-menu-item__title"><?php echo esc_html( $item->title ); ?></span>
					<?php if ( $has_children && 1 != $this->max_depth ) : ?>
					<span class="brandy-menu-item__arrow"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.25 14.5L11.0429 9.70711C11.4334 9.31658 11.4334 8.68342 11.0429 8.29289L6.25 3.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
					<?php endif; ?>
				</a>
			</li>
			<?php
			$html = ob_get_contents();
			ob_end_clean();
			$output .= $html;
		}

		public function end_el( &$output, $item, $depth = 1, $args = array() ) {
			$output .= '</li>';
		}

		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( 'page' === $element->post_type ) {
				if ( get_the_id() === $element->ID ) {
					$element->current = true;
				}
				$element->title     = $element->post_title;
				$element->url       = get_permalink( $element->ID );
				$element->object_id = $element->ID;
			}

			if ( 'horizontal' === $this->layout ) {
				$this->start_el_horizontal( $output, $element, $depth, $args );
				foreach ( $children_elements as $parent_id => $sub_elements ) {
					if ( $element->ID !== $parent_id ) {
						continue;
					}
					$this->start_lvl( $output );
					foreach ( $sub_elements as $sub_element ) {
						$this->display_element( $sub_element, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
					$this->end_lvl( $output );
				}
				$this->end_el( $output, $element );
			} else {
				$this->start_el_vertical( $output, $element, $depth, $args );
				$this->end_el( $output, $element );
				foreach ( $children_elements as $parent_id => $sub_elements ) {
					if ( $element->ID !== $parent_id ) {
						continue;
					}
					$sub_menu_content = '';
					$this->start_lvl( $sub_menu_content, $depth + 1, $args, $element );
					foreach ( $sub_elements as $sub_element ) {
						$this->display_element( $sub_element, $children_elements, $max_depth, $depth + 1, $args, $sub_menu_content );
					}
					$this->end_lvl( $sub_menu_content );
					$this->sub_menus[] = $sub_menu_content;
				}
			}
		}

	}
}

if ( ! function_exists( 'brandy_wishlist' ) ) {

	/**
	 * Render wishlist content template
	 */
	function brandy_wishlist( $settings ) {
		get_template_part(
			'template-parts/wishlist/wishlist-drawer',
			'',
			array(
				'settings' => $settings,
			)
		);
	}
}

if ( ! function_exists( 'brandy_get_rating_html' ) ) {
	/**
	 * Display product ratings
	 *
	 * @param int $rating               Rating for this product (overall or single)
	 * @param int $count                Total reviews for this product
	 * @param boolean $only_stars       Show only stars or not
	 * @param boolean $total_reviews    .
	 */
	function brandy_get_rating_html( $product, $rating, $rating_count = 0, $show_only_stars = false, $show_overall = false, $review_count = 0 ) {

		if ( empty( $product ) ) {
			return;
		}

		brandy_get_template_part(
			'template-parts/rating',
			null,
			array(
				'product'         => $product,
				'rating'          => $rating,
				'rating_count'    => $rating_count,
				'show_only_stars' => $show_only_stars,
				'review_count'    => $review_count,
				'show_overall'    => $show_overall,
			)
		);
	}
}

if ( ! function_exists( 'brandy_post_breadcrumb' ) ) {
	function brandy_post_breadcrumb( $crumbs = array(), $post = null ) {
		brandy_get_template_part(
			'template-parts/breadcrumb',
			null,
			array(
				'crumbs' => $crumbs,
			)
		);
	}
}

if ( ! function_exists( 'brandy_get_current_page_id' ) ) {
	/**
	 * Get current page ID
	 */
	function brandy_get_current_page_id() {
		if ( is_front_page() ) {
			return get_option( 'page_on_front' );
		} elseif ( is_home() ) {
			return get_option( 'page_for_posts' );
		} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			return wc_get_page_id( 'shop' );
		} else {
			return get_the_ID();
		}
	}
}

if ( ! function_exists( 'brandy_render_button_link' ) ) {
	function brandy_render_button_link( $args ) {
		$default_args = array(
			'text'  => __( 'Button', 'brandy' ),
			'href'  => '#',
			'class' => '',
		);
		$args         = wp_parse_args( $args, $default_args );
		?>
			<a class="wp-block-button__link wp-element-button <?php echo esc_attr( $args['class'] ); ?>" href="<?php echo esc_url( $args['href'] ); ?>"><?php echo esc_html( $args['text'] ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'brandy_render_button_link' ) ) {
	function brandy_render_button( $args ) {
		$default_args = array(
			'text'  => __( 'Button', 'brandy' ),
			'href'  => '#',
			'class' => '',
		);
		$args         = wp_parse_args( $args, $default_args );
		?>
		<?php
		printf(
			'<button class="wp-element-button%s" %s>%s</button>',
			! empty( $args['class'] ) ? esc_attr( ' ' . $args['class'] ) : '',
			esc_attr( ! empty( $args['href'] ) ? ( 'href="' . esc_url( $args['href'] ) . '"' ) : '' ),
			esc_html( $args['text'] )
		)
		?>
		<?php
	}
}
