<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

add_action( 'init', 'woa_add_hero_image_init' );
function woa_add_hero_image_init () {
   add_action( 'storefront_before_content', 'woa_add_hero_image', 5 );
}
function woa_add_hero_image() {
   if ( is_front_page() ) :
      ?>
 
	<div id="hero-cont"> 
		 
	
	<div id="herohead1">Making your leisure time better</div>
	<div id="herohead2">One exciting item at a time</div>
	<br>
	<div id="herolink" ><a href="http://localhost/Woocommerce/shop" style="color:#2b2b2b;" >Shop now</a></div>
	
	
		
	</div>	 
  
      <?php
   endif;
}

add_action( 'init', 'custom_remove_footer_credit', 10 );

function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
} 

function custom_storefront_credit() {
	?>
	<a href="localhost/Woocommerce/contact-us/" >Contact Us </a>/	service@alluringarticles.com
	<div class="site-info">
		&copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
	</div><!-- .site-info -->
<?php
}
function woocommerce_checkout_state_dropdown_fix() {
    if ( function_exists( 'is_checkout' ) && !is_checkout() ) {
        return;
    }
    $script = '<script>' . PHP_EOL;
    $script .= "jQuery(function() {" . PHP_EOL;
    $script .= "\tjQuery('#billing_country').trigger('change');" . PHP_EOL;
    $script .= "\tjQuery('#billing_state_field').removeClass('woocommerce-invalid');" . PHP_EOL;
    $script .= "});" . PHP_EOL;
    $script .= '</script>' . PHP_EOL;
    echo $script;
}
add_action( 'wp_footer', 'woocommerce_checkout_state_dropdown_fix', 50 );


add_filter('woocommerce_billing_fields','wpb_custom_billing_fields');
// remove some fields from billing form
// ref - https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
function wpb_custom_billing_fields( $fields = array() ) {
	unset($fields['billing_company']);
	unset($fields['billing_phone']);
	return $fields;
}

 /* @snippet       WooCommerce Remove "What is PayPal?" @ Checkout */
 
add_filter( 'woocommerce_gateway_icon', 'bbloomer_remove_what_is_paypal', 10, 2 );
 
function bbloomer_remove_what_is_paypal( $icon_html, $gateway_id ) {
if( 'paypal' == $gateway_id ) {
   $icon_html = '<img src="http://localhost/Woocommerce/wp-content/uploads/2019/03/paypal.png" alt="PayPal Acceptance Mark">';
}
return $icon_html;
}