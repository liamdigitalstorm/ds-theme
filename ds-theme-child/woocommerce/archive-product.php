<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Designed for Toolset Layouts Plugin Compatibility
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    get_header();
	if ( have_posts()) : while ( have_posts() ) : the_post();
	    the_content();the_content();
        if ( comments_open( get_the_id() ) ) { ?>
                <div class="container">
            <?php comments_template(); ?>
                </div>
        <?php
        }
    endwhile; endif; // WP Loop
    get_footer();
?>
