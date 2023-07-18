<?php
/**
 * @var array $propertiesData
 */
$id = $propertiesData['content']['general']['form'];

echo do_shortcode('[fluentform id="' . $id . '"]');

if ( function_exists( 'wpFluentForm' ) && ( isset( $_SERVER['HTTP_REFERER'] ) && strstr( $_SERVER['HTTP_REFERER'], 'breakdance' ) ) ) {
    $app = wpFluentForm();

    echo '<link rel="stylesheet" id="fluent-form-styles-css" href="'.$app->publicUrl('css/fluent-forms-public.css').'?ver='.FLUENTFORM_VERSION .'" type="text/css" media="all">';
    echo '<link rel="stylesheet" id="fluentform-public-default-css" href="'.$app->publicUrl('css/fluentform-public-default.css').'?ver='.FLUENTFORM_VERSION .'" type="text/css" media="all">';
    echo '<link rel="stylesheet" id="flatpickr-css" href="'.$app->publicUrl('libs/flatpickr/flatpickr.min.css').'?ver='.FLUENTFORM_VERSION .'" type="text/css" media="all">';
    echo '<link rel="stylesheet" id="ff-choices-css" href="'.$app->publicUrl('css/choices.css').'?ver='.FLUENTFORM_VERSION .'" type="text/css" media="all">';
}