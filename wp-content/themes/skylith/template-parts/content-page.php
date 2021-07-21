<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package skylith
 */

$show_comments = comments_open() || get_comments_number();

$is_post_type            = 'single_page';
$show_title              = Ghost_Framework::get_theme_mod( $is_post_type . '_show_title' );
$show_paddings           = Ghost_Framework::get_theme_mod( $is_post_type . '_paddings' );
$featured_image_position = Ghost_Framework::get_theme_mod( $is_post_type . '_featured_image_position' );

$gap_class = ! $show_title ? 'nk-gap-3' : 'nk-gap-4';

?>
<?php if ( $show_paddings ) : ?>
    <div class="<?php echo esc_attr( $gap_class ); ?>"></div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( ! $featured_image_position ) {
        skylith_content_show_image();
    }

    if ( $show_title ) :
        ?>
        <header class="entry-header">
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
            ?>
        </header><!-- .entry-header -->
        <?php
    endif;

    if ( 'before_content' === $featured_image_position ) {
        ?>
        <div class="nk-gap-3"></div>
        <?php
        skylith_content_show_image();
    }

    ?>

    <div class="entry-content">
        <?php
            the_content(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__( 'Continue reading %s', 'skylith' ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                )
            );
            ?>

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
    </div><!-- .entry-content -->

    <?php
    if ( $show_comments ) :
        comments_template();
    endif;
    ?>

</article><!-- #post-## -->

<?php if ( $show_paddings ) : ?>
    <div class="<?php echo esc_attr( $gap_class ); ?>"></div>
<?php endif; ?>
