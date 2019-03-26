<?php
/**
 * Show error messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/error.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

?>
<ul class="woocommerce-error" role="alert">
    <?php
  foreach ( $messages as $message ) :
  if($message=="<strong>Billing First name</strong> is a required field.") { $message="<strong>First name</strong> is a required field."; }	
  if($message=="<strong>Billing Last name</strong> is a required field.") { $message="<strong>Last name</strong> is a required field."; }
  if($message=="<strong>Billing Street address</strong> is a required field.") { $message="<strong>Street address</strong> is a required field."; }  
  if($message=="<strong>Billing Town / City</strong> is a required field.") { $message="<strong>Town / City</strong> is a required field."; }
  if($message=="<strong>Billing State</strong> is a required field.") { $message="<strong>State</strong> is a required field."; }
  if($message=="<strong>Billing ZIP</strong> is a required field.") { $message="<strong>ZIP</strong> is a required field."; }
  if($message=="<strong>Billing Email address</strong> is a required field.") { $message="<strong>Email address</strong> is a required field."; }
  ?>
        <li><?php echo wp_kses_post( $message ); ?></li>
    <?php endforeach; ?>
</ul>
