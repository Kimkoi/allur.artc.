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
 <div id="hero-bg">  
	
	<div id="hero-image">
             <img src="http://localhost/Woocommerce/wp-content/uploads/2019/02/bg.jpeg" width="100%">
    </div>
 
	<div id="hero-cont"> 	 
	
	<div id="herohead1">Handy things for the house and on the go</div>
	<div id="herohead2">We offer FREE shipping for all our products!</div>
	<br>
	<div id="herolink" ><a href="http://localhost/Woocommerce/shop" style="color:#2b2b2b;" >Shop now</a></div>
	
	
		
	</div>	 
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
	<div class="site-info">
		&copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
	</div><!-- .site-info -->
<?php
}


