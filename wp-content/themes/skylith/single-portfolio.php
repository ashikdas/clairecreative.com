<?php
/**
 * Portfolio template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skylith
 */

get_header();

get_template_part( '/template-parts/header/portfolio-single' );

get_template_part( '/template-parts/content-wrap-start' );

while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content-single-portfolio' );

endwhile; // End of the loop.

get_template_part( '/template-parts/content-wrap-end' );

get_footer();
