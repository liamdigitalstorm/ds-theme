<?php
    get_header( );
    if (have_posts()) : while ( have_posts() ) : the_post(); ?>
       <article <?php post_class("post-archive");?>>
	        <h2 class="post-archive-title"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h2>
		    <div class="post-content"><?php the_excerpt(); ?></div>
       </article>
   <?php  endwhile; // WP Loop
    else : ?>
	    <p><?php _e( "No posts found", 'toolset_starter' ); ?> </p>
    <?php endif; // WP Loop
    get_footer(  );
?>
