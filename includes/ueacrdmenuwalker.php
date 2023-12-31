<?php
namespace PowerElements;

if ( ! defined( 'ABSPATH' ) ) exit;

class BeAccordionMenuWalker extends \Walker_Category {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( 'list' !== $args['style'] ) {
            return;
        }
 
        $output .= "<ul class='sub-menu'>\n";
    }

	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		global $arrow_btn;

		$cat_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);

		// Don't generate an element if the category name is empty.
		if ( ! $cat_name ) {
			return;
		}

		if ( 'list' == $args['style'] ) {
			$link = '<a href="' . esc_url( get_term_link( $category ) ) . '" itemprop="url" data-title="' . esc_attr( $cat_name ) . '">';
			$link .= '<span itemprop="name" class="ue-menu-item-text" style="margin-left:' . ( $depth * $args['text_indent'] ). 'px;">' . $cat_name . '</span>';

			$output .= "\t<li";
			$css_classes = array(
				'menu-item',
				'tax-item',
				'tax-item-' . $category->term_id,
				esc_attr( $category->taxonomy ) . '-' . esc_attr( $category->slug )
			);

			$termchildren = get_term_children( $category->term_id, $category->taxonomy );

			if( count($termchildren) > 0 ) {
				$css_classes[] = 'menu-item-has-children';
				$link .= $arrow_btn;
			}

			$link .= '</a>';

			if ( ! empty( $args['current_category'] ) ) {
				$_current_category = get_term( $args['current_category'], $category->taxonomy );
				if ( $category->term_id == $args['current_category'] ) {
					$css_classes[] = 'current-menu-item';
				} elseif ( $category->term_id == $_current_category->parent ) {
					$css_classes[] = 'current-menu-ancestor';
				}
			}

			$css_classes = implode( ' ', apply_filters( 'acrd_category_css_class', $css_classes, $category, $depth, $args ) );

			$output .= ' class="' . $css_classes . '"';
			$output .= ">$link\n";
		} else {
            $output .= "\t$link<br />\n";
        }
	}
}

function pe_acrd_menu_items_args( $args, $item, $depth ) {
	$rp_item = '<span style="margin-left:' . ( $depth * $args->text_indent ). 'px;"';

	$args->link_before = str_replace( '<span', $rp_item, $args->link_before );

	return $args;
}

function pe_acrdmenu_link_attributes( $atts, $item, $args, $depth ) {
	$atts['itemprop'] = 'url';
	if( isset( $item->title ) ) {
		$atts['data-title'] = esc_attr( $item->title );
	}

	return $atts;
}