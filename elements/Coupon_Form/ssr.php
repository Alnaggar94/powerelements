<?php
$options = $propertiesData['content'];

$atts = 'data-coupon-nonce="'. \wp_create_nonce('apply-coupon') . '" ';
$class = "ue-input-field";
$label = isset( $options['placeholder'] ) ? $options['placeholder'] : __("Enter coupon code", "woocommerce");
$button = isset( $options['btnText'] ) ? $options['btnText'] : __("Apply", "woocommerce");

$atts .= 'placeholder="' . $label .'"';

if( \Upadans\Plugin::isBuilderEditor() ) {
	echo "<div class=\"woocommerce-message ue-in-builder\" role=\"alert\">Coupon code applied successfully.</div><ul class=\"woocommerce-error ue-in-builder\" role=\"alert\"><li>Coupon \"earlybird\" does not exist!</li></ul>";
}

echo '<div class="' . $class . '"><input type="text" name="ue_coupon_code" class="ue-coupon-inp-field" value="" ' . $atts . '/><label>' . $label .'</label></div><button type="button" name="applycoupon" class="apply-coupon-button">' . $button . '</button>';