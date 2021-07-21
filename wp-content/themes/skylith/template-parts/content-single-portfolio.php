<?php
/**
 * Single portfolio
 *
 * @package skylith
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( Ghost_Framework::get_theme_mod( 'single_portfolio_paddings' ) && ! comments_open() && ! get_comments_number() ) : ?>
        <div class="nk-gap-4"></div>
    <?php endif; ?>

    <div class="nk-portfolio-single">
        <?php if ( Ghost_Framework::get_theme_mod( 'single_portfolio_show_title' ) ) : ?>
            <header class="entry-header">
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                ?>
            </header><!-- .entry-header -->
        <?php endif; ?>

        <div class="nk-portfolio-text">
            <?php the_content(); ?>

            <div class="clearfix"></div>

            <?php
            wp_link_pages(
                array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'skylith' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                )
            );
            ?>
        </div>
    </div>

    <?php
    if ( comments_open() || get_comments_number() ) :
        ?>
        <div class="nk-gap-2"></div>
        <?php
        comments_template();
    endif;
    ?>

    <?php if ( Ghost_Framework::get_theme_mod( 'single_portfolio_paddings' ) && ! comments_open() && ! get_comments_number() ) : ?>
        <div class="nk-gap-4"></div>
    <?php endif; ?>

    <?php
    if ( Ghost_Framework::get_theme_mod( 'single_portfolio_show_prev_next' ) ) :
        $archive_url = Ghost_Framework::get_theme_mod( 'single_portfolio_archive_url' );
        // phpcs:disable
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        // phpcs:enable

        if ( $archive_url || $prev_post || $next_post ) {
            ?>
            <div class="nk-pagination nk-pagination-center alignfull">
                <div class="container">
                    <?php if ( $prev_post ) : ?>
                        <a class="nk-pagination-prev" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
                            <span><span class="fas fa-angle-left"></span></span> <?php echo esc_html__( 'Previous Project', 'skylith' ); ?>
                        </a>
                    <?php else : ?>
                        <span class="nk-pagination-prev"></span>
                    <?php endif; ?>

                    <?php if ( $archive_url ) : ?>
                        <a class="nk-pagination-center" href="<?php echo esc_url( $archive_url ); ?>">
                            <span class="nk-icon-squares"></span>
                        </a>
                    <?php endif; ?>

                    <?php if ( $next_post ) : ?>
                        <a class="nk-pagination-next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                            <?php echo esc_html__( 'Next Project', 'skylith' ); ?> <span><span class="fas fa-angle-right"></span></span>
                        </a>
                    <?php else : ?>
                        <span class="nk-pagination-next"></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        }
    endif;
    ?>
</div>
