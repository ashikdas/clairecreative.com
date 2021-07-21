<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skylith
 */

?>

<section class="no-results not-found">
    <div class="nk-header-title nk-header-title-full nk-header-title-parallax-content nk-header-content-center-center">
        <div class="nk-header-content">
            <div class="nk-header-content-inner">
                <div class="container text-center">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-9 col-sm-12">
                            <header class="page-header">
                                <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'skylith' ); ?></h1>
                            </header><!-- .page-header -->

                            <div class="nk-gap-1 mnt-3"></div>

                            <div class="page-content">

                                <?php if ( is_home() && ! have_posts() && current_user_can( 'publish_posts' ) ) : ?>

                                    <p class="lead">
                                        <?php
                                        printf(
                                            wp_kses(
                                                /* translators: 1: link to WP admin new post page. */
                                                __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'skylith' ),
                                                array(
                                                    'a' => array(
                                                        'href' => array(),
                                                    ),
                                                )
                                            ),
                                            esc_url( admin_url( 'post-new.php' ) )
                                        );
                                        ?>
                                    </p>

                                <?php elseif ( is_search() ) : ?>

                                    <p class="lead"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'skylith' ); ?></p>

                                    <div class="nk-gap-1 mnt-10"></div>
                                    <?php get_search_form(); ?>

                                <?php else : ?>

                                    <p class="lead"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'skylith' ); ?></p>

                                    <div class="nk-gap-1 mnt-10"></div>
                                    <?php get_search_form(); ?>

                                <?php endif; ?>

                            </div><!-- .page-content -->
                        </div>
                    </div>
                    <div class="nk-gap-3"></div>
                    <div class="nk-gap-3"></div>
                </div>
            </div>
        </div>
    </div>
</section><!-- .no-results -->
