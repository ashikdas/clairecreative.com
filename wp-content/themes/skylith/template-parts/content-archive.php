<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 *
 * @package skylith
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'nk-isotope-item' ); ?>>
    <div class="nk-blog-post">
        <?php if ( get_post_thumbnail_id() ) : ?>
            <div class="nk-post-thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    // phpcs:ignore
                    echo Ghost_Framework::get_image(
                        get_post_thumbnail_id(),
                        'skylith_1920x1080',
                        false,
                        array(
                            'class' => 'nk-img-stretch',
                        )
                    );
                    ?>
                </a>

                <?php
                $category = get_the_category();
                if ( ! empty( $category ) ) {
                    $category = $category[0];
                    ?>
                    <div class="nk-post-category"><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></div>
                    <?php
                }
                ?>
            </div>
        <?php endif; ?>

        <header class="entry-header">
            <h2 class="nk-post-title h3">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        </header><!-- .entry-header -->

        <div class="nk-post-date posted-on">
            <?php
            if ( ! get_the_title() ) {
                echo '<a href="' . esc_url( get_the_permalink() ) . '">';
            }
            echo sprintf(
                '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated sr-only" datetime="%3$s">%4$s</time>',
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() ),
                esc_attr( get_the_modified_date( 'c' ) ),
                esc_html( get_the_modified_date() )
            );
            if ( ! get_the_title() ) {
                echo '</a>';
            }

            edit_post_link( esc_html__( 'Edit', 'skylith' ), ' <small class="edit-link">(', ')</small>' );

            ?>
        </div>

        <span class="byline sr-only">
            <?php
            // translators: %s - author name.
            echo sprintf( esc_html_x( 'by %s', 'post author', 'skylith' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' );
            ?>
        </span>

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
    </div>
</article><!-- #post-## -->
