<?php
$seoPlugin = $propertiesData['content']['general']['seo_plugin'];

if( $seoPlugin == 'allinone' && function_exists( 'aioseo_breadcrumbs' ) ) {
	aioseo_breadcrumbs();
} elseif( $seoPlugin == 'navxt' && function_exists( 'bcn_display' ) ) {
	$linked = isset( $propertiesData['content']['general']['disable_links'] ) ? false : true;
	$reverse = isset( $propertiesData['content']['general']['reverse_order'] ) ? true : false;
	$force = isset( $propertiesData['content']['general']['bypass_internal_caching'] ) ? true : false;

	bcn_display(false, $linked, $reverse, $force);
} elseif( $seoPlugin == 'rankmath' && function_exists( 'rank_math_the_breadcrumbs' ) ) {
	add_filter('rank_math/frontend/breadcrumb/html', [ '\Upadans\Plugin', 'ue_rank_math_crumbs_html' ], 10, 3 );
	rank_math_the_breadcrumbs();
	remove_filter('rank_math/frontend/breadcrumb/settings', [ '\Upadans\Plugin', 'ue_rank_math_crumbs_settings' ] );
} elseif( $seoPlugin == 'seopress' && function_exists( 'seopress_display_breadcrumbs' )) {
	seopress_display_breadcrumbs();
} elseif( $seoPlugin == 'slim' && class_exists( '\SlimSEO\Breadcrumbs' ) ) { //left
	$homeText = isset( $propertiesData['content']['settings']['home_label'] ) ? esc_html( $propertiesData['content']['settings']['home_label'] ) : 'Home';
	$current_page = isset( $propertiesData['content']['settings']['disable_current_page'] ) ? 'false' : 'true';
	$separator = isset( $propertiesData['content']['settings']['separator_symbol'] ) ? esc_html( $propertiesData['content']['settings']['separator_symbol'] ) : '&raquo;';
	$searchLabel = isset( $propertiesData['content']['settings']['search_label'] ) ? esc_html( $propertiesData['content']['settings']['search_label'] ) : 'Results for &#8220;%s&#8221;';
	$errorLabel = isset( $propertiesData['content']['settings']['error_label'] ) ? esc_html( $propertiesData['content']['settings']['error_label'] ) : 'Page not found';
	$taxonomy = isset( $propertiesData['content']['settings']['taxonomy'] ) ? $propertiesData['content']['settings']['taxonomy'] : 'category';

	$slimShortcode = '[slim_seo_breadcrumbs separator="' . $separator . '" display_current="' . $current_page . '" label_home="' . $homeText . '" label_search="' . $searchLabel . '" label_404="' . $errorLabel . '" taxonomy="' . $taxonomy . '"]';
	
	if ( shortcode_exists('slim_seo_breadcrumbs') ) {
		echo do_shortcode( $slimShortcode );
	}
} elseif( $seoPlugin == 'yoast' && function_exists( 'yoast_breadcrumb' )) {
	yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
} elseif( function_exists('zynith_seo_breadcrumbs') ) {
		zynith_seo_breadcrumbs();
}