<?php
$seoPlugin = $propertiesData['content']['general']['seo_plugin'];

if( $seoPlugin == 'allinone' && function_exists( 'aioseo_breadcrumbs' ) ) {
	add_filter( 'esc_html', 'ue_avoid_esc_html', 10, 2 );
	add_filter( 'aioseo_breadcrumbs_separator_symbol', 'ue_allinone_separator_symbol' );
	aioseo_breadcrumbs();
	remove_filter( 'aioseo_breadcrumbs_separator_symbol', 'ue_allinone_separator_symbol' );
	remove_filter( 'esc_html', 'ue_avoid_esc_html', 10, 2 );
	function ue_allinone_separator_symbol( $symbol ) {
		/*if( ! empty( $this->settings['sepIcon'] ) ) {
			$symbol = self::render_icon( $this->settings['sepIcon'] );
		}*/
		
		return $symbol;
	}

	function ue_avoid_esc_html( $esc_html_text, $text ) {
		return $text;
	}
} elseif( $seoPlugin == 'navxt' && function_exists( 'bcn_display' ) ) {
	$linked = isset( $propertiesData['content']['general']['disable_links'] ) ? false : true;
	$reverse = isset( $propertiesData['content']['general']['reverse_order'] ) ? true : false;
	$force = isset( $propertiesData['content']['general']['bypass_internal_caching'] ) ? true : false;

	bcn_display(false, $linked, $reverse, $force);
} elseif( $seoPlugin == 'rankmath' && function_exists( 'rank_math_the_breadcrumbs' )) {
	add_filter('rank_math/frontend/breadcrumb/settings', 'ue_rank_math_crumbs_settings' );
	add_filter('rank_math/frontend/breadcrumb/html', 'ue_rank_math_crumbs_html', 10, 3 );
	rank_math_the_breadcrumbs();
	remove_filter('rank_math/frontend/breadcrumb/settings', 'ue_rank_math_crumbs_settings' );
	remove_filter('rank_math/frontend/breadcrumb/html', 'ue_rank_math_crumbs_html', 10, 3 );

	function ue_rank_math_crumbs_settings( $settings ) {
		/*if( ! empty( $this->settings['sepIcon'] ) ) {
			$settings['separator'] = self::render_icon( $this->settings['sepIcon'] );
		}*/
		
		return $settings;
	}

	function ue_rank_math_crumbs_html( $html, $crumbs, $object ) {
		return str_replace( 'class="last"', 'class="last breadcrumb_last"', $html );
	}
} elseif( $seoPlugin == 'seopress' && function_exists( 'seopress_display_breadcrumbs' )) {
	seopress_display_breadcrumbs();
} elseif( $seoPlugin == 'slim' && class_exists( '\SlimSEO\Breadcrumbs' ) ) { //left
	$homeText = isset( $propertiesData['content']['settings']['home_label'] ) ? esc_html( $propertiesData['content']['settings']['home_label'] ) : 'Home';
	$current_page = isset( $propertiesData['content']['settings']['disable_current_page'] ) ? 'false' : 'true';
	$separator = isset( $settings['separator'] ) ? esc_html( $settings['separator'] ) : '&raquo;';
	$searchLabel = isset( $propertiesData['content']['settings']['search_label'] ) ? esc_html( $propertiesData['content']['settings']['search_label'] ) : 'Results for &#8220;%s&#8221;';
	$errorLabel = isset( $propertiesData['content']['settings']['error_label'] ) ? esc_html( $propertiesData['content']['settings']['error_label'] ) : 'Page not found';
	$taxonomy = isset( $propertiesData['content']['settings']['taxonomy'] ) ? $propertiesData['content']['settings']['taxonomy'] : 'category';

	$slimShortcode = '[slim_seo_breadcrumbs separator="' . $separator . '" display_current="' . $current_page . '" label_home="' . $homeText . '" label_search="' . $searchLabel . '" label_404="' . $errorLabel . '" taxonomy="' . $taxonomy . '"]';
	
	if ( shortcode_exists('slim_seo_breadcrumbs') ) {
		echo do_shortcode( $slimShortcode );
	}
} elseif( $seoPlugin == 'yoast' && function_exists( 'yoast_breadcrumb' )) {
	add_filter( 'wpseo_frontend_presentation', 'ue_wpseo_frontend_presentation', 10, 2 );
	add_filter( 'wpseo_breadcrumb_separator', 'ue_wpseo_yoast_separator' );

	yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

	remove_filter( 'wpseo_breadcrumb_separator', 'ue_wpseo_yoast_separator' );
	remove_filter( 'wpseo_frontend_presentation', 'ue_wpseo_frontend_presentation', 10, 2 );

	function ue_wpseo_frontend_presentation( $presentation, $context ) {
		if( Helpers::isBricksBuilderActive() && is_object( $presentation ) && empty( $presentation->model->breadcrumb_title ) ) {
			$presentation->model->breadcrumb_title = get_the_title();
		}

		return $presentation;
	}

	function ue_wpseo_yoast_separator( $separator ){
		/*if( ! empty( $this->settings['sepIcon'] ) ) {
			$separator = self::render_icon( $this->settings['sepIcon'] );
		}*/

		if( strpos( $separator, 'separator' ) > 0 )
			return $separator;
		else
			return '<span class="separator">' . $separator . '</span>';
	}
} elseif( function_exists('zynith_seo_breadcrumbs') ) {
		zynith_seo_breadcrumbs();
}