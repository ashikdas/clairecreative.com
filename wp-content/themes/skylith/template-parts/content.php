<?php
/**
 * The default template for displaying content
 *
 * Used for single posts.
 *
 * @package skylith
 */

$is_post_type            = skylith_post_type_is();
$show_title              = 'single_post' !== $is_post_type || Ghost_Framework::get_theme_mod( $is_post_type . '_show_title' );
$show_paddings           = 'single_post' !== $is_post_type || Ghost_Framework::get_theme_mod( $is_post_type . '_paddings' );
$show_meta               = Ghost_Framework::get_theme_mod( $is_post_type . '_show_meta' );
$title_meta_center       = Ghost_Framework::get_theme_mod( $is_post_type . '_title_meta_center' );
$featured_image_position = 'single_post' === $is_post_type ? Ghost_Framework::get_theme_mod( $is_post_type . '_featured_image_position' ) : '';

$gap_class = ! $show_title && ! $show_meta ? 'nk-gap-3' : 'nk-gap-4';

if ( $show_paddings ) :
    ?>
    <div class="<?php echo esc_attr( $gap_class ); ?>"></div>
    <?php
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'nk-blog-post nk-blog-post-single nk-blog-post-single-style-2' ); ?>>
    <?php
    if ( ! $featured_image_position ) {
        skylith_content_show_image();
    }

    if ( $show_title ) :
        ?>
            <header class="entry-header">
                <?php
                the_title( '<h1 class="h2">', '</h1>' );
                ?>
            </header><!-- .entry-header -->
        <?php
    endif;

    if ( $show_meta ) :
        ?>
        <div class="nk-post-meta nk-post-meta-<?php echo esc_attr( $title_meta_center ); ?>">
            <div class="nk-post-date posted-on">
                <?php
                echo sprintf(
                    '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated sr-only" datetime="%3$s">%4$s</time>',
                    esc_attr( get_the_date( 'c' ) ),
                    esc_html( get_the_date() ),
                    esc_attr( get_the_modified_date( 'c' ) ),
                    esc_html( get_the_modified_date() )
                );
                ?>
            </div>

            <?php $category = get_the_category(); ?>
            <?php foreach ( $category as $key => $cat_item ) : ?>
                <div class="nk-post-category">
                    <a href="<?php echo esc_url( get_category_link( $cat_item->cat_ID ) ); ?>"><?php echo esc_html( $cat_item->name ); ?></a>
                </div>
            <?php endforeach; ?>

            <div class="nk-post-comments-count">
                <?php
                $comments_num = get_comments_number( get_the_ID() );

                // translators: %s - number of comments.
                printf( esc_html( _n( '%s Comment', '%s Comments', $comments_num, 'skylith' ) ), esc_html( $comments_num ) );
                ?>
            </div>

            <div class="byline sr-only">
                <?php
                // translators: %s - author name.
                echo sprintf( esc_html_x( 'by %s', 'post author', 'skylith' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' );
                ?>
            </div>
        </div>
        <?php
    endif;

    if ( 'before_content' === $featured_image_position ) {
        ?>
        <div class="nk-gap-3"></div>
        <?php
        skylith_content_show_image();
    }

    ?>

    <div class="entry-content nk-post-text">
        <?php
        the_content();
        ?>

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

        <div class="clearfix"></div>
    </div>

    <?php
    the_tags( '<div class="page-tags"><span>' . esc_html__( 'Tags:', 'skylith' ) . '</span> ', '', '</div>' );

    // phpcs:ignore
    do_action( 'sociality-sharing' );

    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

    if ( Ghost_Framework::get_theme_mod( $is_post_type . '_show_prev_next' ) ) :
        $archive_url = Ghost_Framework::get_theme_mod( $is_post_type . '_archive_url' );
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
                            <span><span class="fas fa-angle-left"></span></span> <?php echo esc_html__( 'Previous Post', 'skylith' ); ?>
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
                            <?php echo esc_html__( 'Next Post', 'skylith' ); ?> <span><span class="fas fa-angle-right"></span></span>
                        </a>
                    <?php else : ?>
                        <span class="nk-pagination-next"></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        }

        ?>

    <?php else : ?>
        <div class="<?php echo esc_attr( $gap_class ); ?>"></div>
    <?php endif; ?>
</article><!-- #post-## -->

<?php

if ( $show_paddings ) :
    ?>
    <div class="<?php echo esc_attr( $gap_class ); ?>"></div>
    <?php
endif;
