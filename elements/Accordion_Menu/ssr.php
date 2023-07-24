<?php
$settings = $propertiesData['content'];
$text_indent = isset( $settings['general']['text_indent'] ) ? $settings['general']['text_indent'] : 10;
$source = isset( $settings['general']['source'] ) ? $settings['general']['source'] : 'menu';
$config['df'] = '';
$config['transition'] = isset( $settings['general']['transition'] ) ? $settings['general']['transition'] : 400;
$config['effect'] = !empty( $settings['general']['isAccordion'] ) ? 'yes' : 'no';
$config['collapsed'] = !empty( $settings['general']['always_collapsed'] ) ? 'yes' : 'no';

// Icon
$icon_html = '';
if ( isset( $settings['toggle_icon']['icon']['svgCode'] ) ) {
	$icon_html = '<span class="ue-menu-items-arrow">' . $settings['toggle_icon']['icon']['svgCode'] . '</span>';
}

$GLOBALS[ 'arrow_btn' ] = $icon_html;

/**
 * WP Menu
 */
if( $source == 'menu' ) {
	$acrd_menu = isset( $settings['general']['wp_menu'] ) ? $settings['general']['wp_menu'] : 'none';
	if( $acrd_menu == 'none' || $acrd_menu == 'nomenu' ) {
		if( \Upadans\Plugin::isBuilderEditor() ) {
			echo \Breakdance\Elements\getSsrErrorMessage( esc_html__( 'Select a menu', 'upadans' ) );
		}

		return;
	}

	if( ! empty( $settings['menu_heading']['display_menu_name'] ) && ! empty( $acrd_menu ) ) {
		$tag = isset( $settings['menu_heading']['html_tag'] ) ? $settings['menu_heading']['html_tag'] : 'h4';
		echo '<' . $tag . ' class="ue-acrd-menu-title">'. wp_get_nav_menu_object($acrd_menu)->name . '</' . $tag .'>';
	}

	$args = array(
		'echo'        => false,
		'menu'        => $acrd_menu,
		'menu_class'  => 'ue-acrd-menu-items',
		'menu_id'     => 'menu-%%ID%%',
		'link_before' => '<span itemprop="name" class="ue-menu-item-text">',
		'link_after'  => '</span>' . $icon_html,
		'container'   => '',
		'text_indent' => absint( $text_indent )
	);

	add_filter( 'nav_menu_item_args', '\Upadans\ue_acrd_menu_items_args', 10, 3 );
	add_filter( 'nav_menu_link_attributes', '\Upadans\ue_acrdmenu_link_attributes', 10, 4 );

	$menu = '<nav itemscope itemtype="https://schema.org/SiteNavigationElement" data-acrd-config=\'' . wp_json_encode($config ) . '\'>';
	$menu .= wp_nav_menu( $args );
	$menu .= '</nav>';

	echo $menu;

	remove_filter( 'nav_menu_item_args', '\Upadans\ue_acrd_menu_items_args', 10, 3 );
	remove_filter( 'nav_menu_link_attributes', '\Upadans\ue_acrdmenu_link_attributes', 10, 4 );
}
/**
 * Taxonomy
 */
if( $source == 'tax' ) {
	$menu = '<nav itemscope="" itemtype="https://schema.org/SiteNavigationElement" data-acrd-config="'. wp_json_encode($config ) . '">';
	$menu .= '<ul id="menu-%%ID%%" class="ue-acrd-menu-items">';

	$taxonomy = isset( $settings['general']['taxonomy'] ) ? $settings['general']['taxonomy'] : 'category';

	$args = array(
		'show_option_all'    => '',
		'style'              => 'list',
		'show_count'         => 0,
		'hide_empty'         => 1,
		'hierarchical'       => 1,
		'title_li'           => '',
		'show_option_none'   => '',
		'number'             => null,
		'echo'               => 0,
		'depth'              => 0,
		'current_category'   => 0,
		'pad_counts'         => 0,
		'taxonomy'           => $taxonomy,
		'text_indent' 		 => $text_indent,
		'walker'             => new \Upadans\BeAccordionMenuWalker,
	);

	$include_ids = isset( $settings['general']['include_terms'] ) ? $settings['general']['include_terms'] : false;
	if( $include_ids ) {
		$args['include'] = array_filter( array_map( 'trim', explode( ',', $include_ids ) ) );
	}

	$exclude_ids = isset( $settings['general']['exclude_terms'] ) ? $settings['general']['exclude_terms'] : false;
	if( $exclude_ids ) {
		$args['exclude'] = array_filter( array_map( 'trim', explode( ',', $exclude_ids ) ) );
	}

	$child_of = isset( $settings['general']['child_of'] ) ? $settings['general']['child_of'] : false;
	if( $child_of ) {
		$args['child_of'] = absint( $child_of );
	}

	$limit = isset( $settings['general']['limit'] ) ? $settings['general']['limit'] : false;
	if( $limit ) {
		$args['number'] = absint( $limit );
	}

	$args['hide_empty'] = ! empty( $settings['general']['hide_empty_terms'] ) ? true : false;
	$args['orderby'] = isset( $settings['general']['orderby'] ) ? $settings['general']['orderby'] : 'name';
	$args['order'] = isset( $settings['general']['order'] ) ? $settings['general']['order'] : 'ASC';

	$menu .= wp_list_categories( $args );

	$menu .= '</ul></nav>';

	echo $menu;
}