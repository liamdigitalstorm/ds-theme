<?php
if ( ! function_exists( 'ref_enqueue_main_stylesheet' ) ) {
	function ref_enqueue_main_stylesheet() {
		if ( ! is_admin() ) {
			wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', array(), null );
			wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), null );
		}
	}
	add_action( 'wp_enqueue_scripts', 'ref_enqueue_main_stylesheet', 100 );
}


function wpb_adding_scripts_browser() {
   wp_register_script('onload', get_stylesheet_directory_uri() . '/js/onload.js', array('jquery'),NULL, true); 
   wp_enqueue_script('onload');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts_browser' ); 


function wpb_adding_styles() {
 // wp_register_style('fancy_select_style', get_stylesheet_directory_uri() . '/css/fancySelect.css','','', 'screen' ); 
 //wp_enqueue_style('owlcarousel_style');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' ); 

function easy_social($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
                $popup = "'popup'";
 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
			
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Digital%20Storm';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		//$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		//$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<div class="crunchify-social">';
		$content .='<a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" onclick="return popup(this, '.$popup.')">Twitter</a>';
		$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" onclick="return popup(this, '.$popup.')">Facebook</a>';
		//$content .= '<a class="crunchify-link crunchify-whatsapp" href="'.$whatsappURL.'" target="popup">WhatsApp</a>';
		$content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" onclick="return popup(this, '.$popup.')">Google+</a>';
		//$content .= '<a class="crunchify-link crunchify-buffer" href="'.$bufferURL.'" target="popup">Buffer</a>';
		$content .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" onclick="return popup(this, '.$popup.')">LinkedIn</a>';
		//$content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" >Pin It</a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};

add_shortcode('easy_social', 'easy_social');

// Image resize in content
function resize($atts, $content = null) {
	extract(shortcode_atts(array('w' => '600','h' => '450','q' => '90','a' => 'c','zc' => '1','s' => '1','class' => '','alt' => '','link' => '', 'data' =>''), $atts));
	return "<img src='". get_stylesheet_directory_uri() . "/resize.php?src=".$link."&w=".$w."&h=".$h."&q=".$q."&a=".$a."&zc=".$zc."&s=".$s."' alt='".$alt."' class='wp-post-img ".$class."' data-src='".$data."' />"; }
add_shortcode('img', 'resize');

// Add SVG Support
function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );

?>