<?php
/**
 * Post template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skylith
 */

get_header();

get_template_part( '/template-parts/header/post' );

if ( have_posts() ) :

    get_template_part( '/template-parts/content-wrap-start' );

    if ( is_home() && ! is_front_page() ) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
        <?php
    endif;

    // Start the loop.
    while ( have_posts() ) :
        the_post();

        /*
            * Include the Post-Format-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            */
        get_template_part( 'template-parts/content', get_post_format() );

        // End the loop.
    endwhile;

    // Previous/next page navigation.
    the_posts_pagination(
        array(
            'prev_text'          => esc_html__( 'Previous page', 'skylith' ),
            'next_text'          => esc_html__( 'Next page', 'skylith' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'skylith' ) . ' </span>',
        )
    );

    get_template_part( '/template-parts/content-wrap-end' );

    // If no content, include the "No posts found" template.
else :
    get_template_part( '/template-parts/content', 'none' );

endif;

get_footer();
