<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skylith
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

$is_post_type   = skylith_post_type_is();
$comments_style = Ghost_Framework::get_theme_mod( $is_post_type . '_comments_style' ) ? Ghost_Framework::get_theme_mod( $is_post_type . '_comments_style' ) : '2';

?>


<div id="comments"></div>

<?php if ( have_comments() ) : ?>
    <div class="nk-comments nk-comments-style-<?php echo esc_attr( $comments_style ); ?>">
        <?php
        if ( '1' === $comments_style ) {
            ?>
            <div class="bg-color alignfull"></div>
            <?php
        }

        ?>

        <div class="nk-gap-3"></div>
        <h3 class="nk-title">
            <?php echo esc_html__( 'Comments:', 'skylith' ); ?>
        </h3>
        <div class="nk-gap-1"></div>

        <?php
        wp_list_comments(
            array(
                'walker'      => new Skylith_Comments_Walker(),
                'short_ping'  => true,
                'avatar_size' => 200,
                'max_depth'   => 4,
            )
        );
        ?>
        <!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <div class="nk-gap-2"></div>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="sr-only"><?php esc_html_e( 'Comment navigation', 'skylith' ); ?></h2>
                <?php
                $cpage_num = get_query_var( 'cpage' );

                if ( isset( $cpage_num ) ) :
                    ?>
                    <div class="nk-pagination ">
                        <?php
                        previous_comments_link( '<span class="nk-icon-arrow-left"></span>' . esc_html__( 'Older Comments', 'skylith' ) );
                        ?>
                        <?php
                        next_comments_link( esc_html__( 'Newer Comments', 'skylith' ) . '<span class="nk-icon-arrow-right"></span>' );
                        ?>
                    </div><!-- .nav-links -->
                <?php endif; ?>
            </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation. ?>
        <div class="nk-gap-3"></div>
    </div>
<?php else : ?>
    <?php if ( '1' !== $comments_style ) : ?>
        <div class="nk-gap-3"></div>
    <?php endif; ?>
<?php endif; // Check for have_comments(). ?>

<div class="nk-reply nk-reply-style-<?php echo esc_attr( $comments_style ); ?>">
    <div class="nk-gap-3"></div>
    <?php

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>

        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'skylith' ); ?></p>
        <?php
    endif;
    $commenter       = wp_get_current_commenter();
    $required_fields = array(
        'email' => array(
            'req_class'       => get_option( 'require_name_email' ) ? ' required' : '',
            'req_placeholder' => get_option( 'require_name_email' ) ? ' *' : '',
        ),
        'author' => array(
            'req_class'       => get_option( 'require_name_author' ) ? ' required' : '',
            'req_placeholder' => get_option( 'require_name_author' ) ? ' *' : '',
        ),
        'url' => array(
            'req_class'       => get_option( 'require_name_url' ) ? ' required' : '',
            'req_placeholder' => get_option( 'require_name_url' ) ? ' *' : '',
        ),
    );

    $button_class = 'nk-btn-color-main nk-btn-hover-color-dark-2';

    if ( Ghost_Framework::get_theme_mod( 'custom_colors_color_secondary' ) ) {
        $button_class = 'nk-btn-color-main nk-btn-hover-color-main';
    } elseif ( Ghost_Framework::get_theme_mod( 'general_dark_content' ) ) {
        $button_class = 'nk-btn-color-dark-2 nk-btn-hover-color-main';
    }

    $button_class .= ' nk-btn mt-30';

    comment_form(
        array(
            'title_reply'          => '<h3 id="reply-title" class="nk-title">' . esc_html__( 'Leave a Comment:', 'skylith' ) . '<small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;"> ' . esc_html__( 'Cancel reply', 'skylith' ) . '</a></small></h3> <div class="nk-gap-1"></div>',
            'comment_notes_before' => '',
            'fields'               => array(
                'email' => '<div class="row vertical-gap">
                                <div class="col-md">
                                    <input type="email" class="' . esc_attr( 'form-control' . $required_fields['email']['req_class'] ) . '" name="email" placeholder="' . esc_attr__( 'Your Email', 'skylith' ) . $required_fields['email']['req_placeholder'] . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '">
                                </div>',
                'author' => '<div class="col-md">
                                <input type="text" class="' . esc_attr( 'form-control' . $required_fields['author']['req_class'] ) . '" name="author" placeholder="' . esc_attr__( 'Your Name', 'skylith' ) . $required_fields['author']['req_placeholder'] . '" value="' . esc_attr( $commenter['comment_author'] ) . '">
                            </div>',
                'url' => '<div class="col-md">
                                    <input type="url" class="' . esc_attr( 'form-control' . $required_fields['url']['req_class'] ) . '" name="url" placeholder="' . esc_attr__( 'Your Website', 'skylith' ) . $required_fields['url']['req_placeholder'] . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '">
                                </div>
                            </div>',
            ),
            'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
            'class_submit'         => $button_class,
            'class_form'           => 'nk-form nk-form-style-1',
            'comment_field'        => '<div class="nk-gap-1"></div><textarea class="form-control required" name="comment" rows="5" placeholder="' . esc_attr__( 'Comment', 'skylith' ) . ' *" aria-required="true"></textarea>
                            <div class="nk-form-response-success"></div>
                            <div class="nk-form-response-error"></div>',
        )
    );

    ?>
</div>
