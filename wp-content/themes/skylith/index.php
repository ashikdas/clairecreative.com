<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skylith
 */

get_header();

if ( have_posts() ) {
    get_template_part( '/template-parts/header/archive' );
}

get_template_part( '/template-parts/content-wrap-start' );

if ( Ghost_Framework::get_theme_mod( 'archive_show_title' ) && ! Ghost_Framework::get_theme_mod( 'archive_header_show' ) ) : ?>
    <div class="nk-gap-4"></div>
    <?php
    if ( is_front_page() ) {
        echo '<h1 class="nk-title">';
        echo esc_html( wp_get_document_title() );
        echo '</h1>';
    } else {
        the_archive_title( '<h1 class="nk-title">', '</h1>' );
    }
    ?>
    <?php
endif;

get_template_part( '/template-parts/content-archive-list' );

get_template_part( '/template-parts/content-wrap-end' );

Ghost_Framework::posts_pagination(
    array(
        'templates' => array(
            'wrap' => '
                <div class="nk-pagination nk-pagination-center alignfull">
                    <div class="container">
                        <div class="ghost-pagination">
                            {$pagination_items}
                        </div>
                    </div>
                </div>
            ',
            'item' => '{$link}',
        ),
        'classes'   => array(
            'item'          => 'nk-pagination-item',
            'item_previous' => 'nk-pagination-prev',
            'item_next'     => 'nk-pagination-next',
            'item_current'  => 'nk-pagination-item-current',
            'item_dots'     => 'nk-pagination-item-dots',
        ),
        'prev_text' => '<span><span class="fas fa-angle-left"></span></span>' . esc_html__( 'Previous', 'skylith' ),
        'next_text' => esc_html__( 'Next', 'skylith' ) . '<span><span class="fas fa-angle-right"></span></span>',
    )
);

get_footer();
