<?php
    get_header();
	if ( have_posts()) : while ( have_posts() ) : the_post();
	    the_content();
        if ( comments_open( get_the_id() ) ) { ?>
                <div class="container">
            <?php comments_template(); ?>
                </div>
        <?php
        }
    endwhile; endif; // WP Loop
    get_footer();
?>
