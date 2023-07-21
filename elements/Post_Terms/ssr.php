<?php
$settings = $propertiesData['content'];

$taxonomy = isset( $settings['general']['taxonomy'] ) ? $settings['general']['taxonomy'] : 'category';
$limit    = isset( $settings['general']['limit'] ) ? $settings['general']['limit'] : 'all';

$terms    = \wp_get_object_terms(
	\get_the_ID(),
	$taxonomy,
	[
		'orderby' => isset( $settings['general']['orderby'] ) ? $settings['general']['orderby'] : 'name',
		'order'   => isset( $settings['general']['order'] ) ? $settings['general']['order'] : 'ASC',
	]
);
$terms = \wp_list_filter( $terms, [ 'slug' => 'uncategorized' ], 'NOT' );

if ( ! count( $terms ) || is_wp_error( $terms ) ) {
	if( \Upadans\Plugin::isBuilderEditor() ) {
		echo \Breakdance\Elements\getSsrErrorMessage( sprintf( esc_html__( 'This post has no %s terms.', 'upadans' ), ucfirst( get_taxonomy( $taxonomy )->name ) ) );
	}
} else {

	if( $limit != 'all' ) {
		$limit    = isset( $settings['general']['terms_limit'] ) ? $settings['general']['terms_limit'] : 3;
		$new_terms = array_splice( $terms, 0, $limit );
	} else {
		$new_terms = $terms;
	}

	unset( $terms );

	$icon = ! empty( $settings['icon']['icon']['svgCode'] ) ? sprintf( '<span class="ue-term-icon">%s</span>', $settings['icon']['icon']['svgCode']) : '';

	$list = [];
	$termAtts = [];
	$bg = $color = '';
	foreach ( $new_terms as $index => $term ) {
		$termAtts[] = 'class="ue-term-name ' . $taxonomy . '-' . esc_attr( $term->slug ) . ' ' . $taxonomy . '-'. $term->term_id .'"';

		if( isset( $settings['style']['dynamic_background'] ) && get_term_meta( $term->term_id, $settings['style']['dynamic_background'], true ) ) {
			$bg = "background-color: " . get_term_meta( $term->term_id, $settings['style']['dynamic_background'], true ) . ";";
		}

		if( isset( $settings['style']['dynamic_color'] ) && get_term_meta( $term->term_id, $settings['style']['dynamic_color'], true )) {
			$color = "color: " . get_term_meta( $term->term_id, $settings['style']['dynamic_color'], true ) . ";";
		}

		if( $bg || $color ) {
			$termAtts[] = "style=\"{$bg}{$color}\"";
		}
		
		if ( isset( $settings['general']['disable_link'] ) && $settings['general']['disable_link'] == true ) {
			$list[] = "<span " . implode(' ', $termAtts) . ">" . $icon . $term->name . '</span>';
		} else {
			$termAtts[] = 'rel="category tag"';
			$list[] = sprintf( '<a href="%s" %s>%s%s</a>', 
				esc_url( get_term_link( $term->term_id, $taxonomy ) ),
				implode(' ', $termAtts), 
				$icon,
				esc_html( $term->name ) 
			);
		}
	}
	unset( $new_terms );

	if( isset( $settings['general']['prefix'] ) ) {
		echo "<span class=\"ue-terms-prefix\">" . wp_kses_post( $settings['general']['prefix'] ) . '</span>';
	}

	$separator = isset( $settings['general']['separator'] ) ? $settings['general']['separator'] : '';

	echo implode( $separator, $list );
}