<?php
$options = $propertiesData['content'];

$atts = 'data-coupon-nonce="'. \wp_create_nonce('apply-coupon') . '" ';
$class = "ue-input-field";
$label = isset( $options['input_field']['label'] ) ? $options['input_field']['label'] : __("Enter coupon code", "woocommerce");
$button = isset( $options['apply_button']['button_text'] ) ? $options['apply_button']['button_text'] : __("Apply", "woocommerce");

if( ! empty( $options['label_animation']['enable_animation'] ) ) {
	$class .= " ue-input-field--anim";
	$atts .= 'required';
} else {
	$atts .= 'placeholder="' . wp_kses_post( $label ) . '"';
}

if( \Upadans\Plugin::isBuilderEditor() ) {
	echo "<div class=\"woocommerce-message ue-in-builder\" role=\"alert\">Coupon code applied successfully.</div><ul class=\"woocommerce-error ue-in-builder\" role=\"alert\"><li>Coupon \"earlybird\" does not exist!</li></ul>";
}

echo '<div class="' . $class . '"><input type="text" name="ue_coupon_code" class="ue-coupon-inp-field" value="" ' . $atts . '/><label>' . $label .'</label></div><button type="button" name="applycoupon" class="apply-coupon-button">' . wp_kses_post( $button ) . '</button>';