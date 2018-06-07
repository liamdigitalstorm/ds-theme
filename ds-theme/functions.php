<?php 

if (!function_exists('ref_enqueue_main_stylesheet')) {
	function ref_enqueue_main_stylesheet()
	{
		if (!is_admin()) {
			wp_enqueue_style('main', get_template_directory_uri() . '/style.css', array(), null);
		}
	}
	add_action('wp_enqueue_scripts', 'ref_enqueue_main_stylesheet');
}

function adding_scripts_browser() {
    if ( ! is_admin() ) {
   wp_deregister_script( 'jquery' );
   wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, false );  
   wp_register_script('bootstrap_code', get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', array('jquery'),NULL, true);
   wp_register_script('owlcarousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'),NULL, true);	
   wp_register_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'),NULL, true); 
   wp_enqueue_script('bootstrap_code');
   wp_enqueue_script('owlcarousel');	
   wp_enqueue_script('fancybox');
    }
}
add_action( 'wp_enqueue_scripts', 'adding_scripts_browser' ); 


function adding_styles() {
        if ( ! is_admin() ) {
 wp_register_style('bootstrap_style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css','','', 'screen' ); 
 wp_register_style('owlcarousel_style', get_template_directory_uri() . '/css/owl.carousel.min.css','','', 'screen' ); 
 wp_register_style('owlcarousel_theme', get_template_directory_uri() . '/css/owl.theme.default.min.css','','', 'screen' );
 wp_register_style('fancybox_style', get_template_directory_uri() . '/css/jquery.fancybox.min.css','','', 'screen' );
 //wp_register_style('animate', get_stylesheet_directory_uri() . '/css/animate.css','','', 'screen' );
 wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:200,300,400,700', true ); 
wp_enqueue_style('bootstrap_style');
 wp_enqueue_style('owlcarousel_style');
 wp_enqueue_style('owlcarousel_theme');
 wp_enqueue_style('fancybox_style');
 //wp_enqueue_style('animate');
        }
}
add_action( 'wp_enqueue_scripts', 'adding_styles' );

// WOOCOMMERCE - DECLARE THEME //
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// WOOCOMMERCE - ONLY LOAD STYLES WHEN NECASSARY //

// remove Woocommerce scripts on unnecessary pages
function woocommerce_de_script() {
    if (function_exists( 'is_woocommerce' )) {
     if (!is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page() ) { // if we're not on a Woocommerce page, dequeue all of these scripts
    	wp_dequeue_script('wc-add-to-cart');
    	wp_dequeue_script('jquery-blockui');
    	wp_dequeue_script('jquery-placeholder');
    	wp_dequeue_script('woocommerce');
    	wp_dequeue_script('jquery-cookie');
    	wp_dequeue_script('wc-cart-fragments');
      }
    }
}
add_action( 'wp_print_scripts', 'woocommerce_de_script', 100 );
add_action( 'wp_enqueue_scripts', 'remove_woocommerce_generator', 99 );
function remove_woocommerce_generator() {
    if (function_exists( 'is_woocommerce' )) {
	if (!is_woocommerce()) { // if we're not on a woo page, remove the generator tag
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
	}
    }
}
// remove woocommerce styles, then add woo styles back in on woo-related pages
function child_manage_woocommerce_css(){
    if (function_exists( 'is_woocommerce' )) {
	if (!is_woocommerce()) { // this adds the styles back on woocommerce pages. If you're using a custom script, you could remove these and enter in the path to your own CSS file (if different from your basic style.css file)
		wp_dequeue_style('woocommerce-layout');
		wp_dequeue_style('woocommerce-smallscreen');
		wp_dequeue_style('woocommerce-general');
	}
    }
}
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_css' );

//Register Wordpress Menus
function register_my_menus() {
	register_nav_menus(
	  array(
		'primary-menu' => __( 'Primary Menu' ),
		'top-menu' => __( 'Top Menu' ),
		'secondary-menu' => __( 'Secondary Menu' )
	  )
	);
  }
  add_action( 'init', 'register_my_menus' );

// Include custom navwalker
require_once('bs4navwalker.php');

/****************************************
Require Plugins
*****************************************/
require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
require get_template_directory() . '/lib/theme-require-plugins.php';
add_action( 'tgmpa_register', 'mb_register_required_plugins' );

?>