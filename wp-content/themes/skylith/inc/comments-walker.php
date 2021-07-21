<?php // phpcs:ignore
/**
 * Comments Walker
 *
 * @package skylith
 */

if ( ! function_exists( 'skylith_move_comment_field_to_bottom' ) ) :
    /**
     * Move comment field to the bottom.
     *
     * @param array $fields - fields list.
     *
     * @return array
     */
    function skylith_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }
endif;
add_filter( 'comment_form_fields', 'skylith_move_comment_field_to_bottom' );

/**
 * Class Skylith_Comments_Walker
 */
class Skylith_Comments_Walker extends Walker_Comment {
    /**
     * Starts the list before the elements are added.
     *
     * @since 2.7.0
     *
     * @see Walker::start_lvl()
     * @global int $comment_depth
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of the current comment. Default 0.
     * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        // phpcs:ignore
        $GLOBALS['comment_depth'] = $depth + 1;
    }

    /**
     * Ends the list of items after the elements are added.
     *
     * @since 2.7.0
     *
     * @see Walker::end_lvl()
     * @global int $comment_depth
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Optional. Depth of the current comment. Default 0.
     * @param array  $args   Optional. Will only append content if style argument value is 'ol' or 'ul'.
     *                       Default empty array.
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        // phpcs:ignore
        $GLOBALS['comment_depth'] = $depth + 1;
        ?>
        <!-- /.children -->
        <?php
    }

    /**
     * Starts the element output.
     *
     * @since 2.7.0
     *
     * @see Walker::start_el()
     * @see wp_list_comments()
     * @global int        $comment_depth
     * @global WP_Comment $comment
     *
     * @param string     $output  Used to append additional content. Passed by reference.
     * @param WP_Comment $comment Comment data object.
     * @param int        $depth   Optional. Depth of the current comment in reference to parents. Default 0.
     * @param array      $args    Optional. An array of arguments. Default empty array.
     * @param int        $id      Optional. ID of the current comment. Default 0 (unused).
     */
    public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        // phpcs:ignore
        $GLOBALS['comment_depth'] = $depth;
        // phpcs:ignore
        $GLOBALS['comment'] = $comment;
        $parent_class       = empty( $args['has_children'] ) ? '' : 'parent';
        $is_ping            = ( 'pingback' === $comment->comment_type || 'trackback' === $comment->comment_type ) && $args['short_ping'];

        ?>

        <div class="nk-comment" <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID(); ?>">
            <?php if ( $is_ping ) : ?>
                <div class="nk-comment-cont nk-comment-pingback">
                    <div class="nk-comment-text">
                        <?php echo esc_html__( 'Pingback:', 'skylith' ); ?> <?php comment_author_link( $comment ); ?> <?php edit_comment_link( esc_html__( 'Edit', 'skylith' ), '<span class="edit-link">', '</span>' ); ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="nk-comment-avatar">
                    <?php echo 0 !== $args['avatar_size'] ? get_avatar( $comment, $args['avatar_size'] ) : ''; ?>
                </div>
                <div class="nk-comment-cont">
                    <div class="nk-comment-meta">
                        <div class="nk-comment-name"><?php echo get_comment_author_link(); ?></div>
                        <div class="nk-comment-date"><?php comment_date(); ?></div>
                        <div class="nk-comment-reply">
                            <?php
                            comment_reply_link(
                                array_merge(
                                    $args,
                                    array(
                                        'add_below'  => isset( $args['add_below'] ) ? $args['add_below'] : 'comment',
                                        'depth'      => $depth,
                                        'max_depth'  => $args['max_depth'],
                                        'reply_text' => esc_html__( 'Reply', 'skylith' ),
                                    )
                                ),
                                $comment->comment_ID
                            );
                            ?>
                        </div>
                        <?php edit_comment_link( esc_html__( '(Edit)', 'skylith' ), '<div class="nk-comment-reply d-none d-md-block">', '</div>' ); ?>
                    </div>
                    <div class="nk-comment-text">
                        <p>
                            <?php
                            if ( ! $comment->comment_approved ) {
                                ?>
                                <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'skylith' ); ?></em>
                                <?php
                            } else {
                                echo wp_kses_post( get_comment_text() );
                            }
                            ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>
        <?php
    }

    /**
     * Ends the element output, if needed.
     *
     * @since 2.7.0
     *
     * @see Walker::end_el()
     * @see wp_list_comments()
     *
     * @param string     $output  Used to append additional content. Passed by reference.
     * @param WP_Comment $comment The current comment object. Default current comment.
     * @param int        $depth   Optional. Depth of the current comment. Default 0.
     * @param array      $args    Optional. An array of arguments. Default empty array.
     */
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
        ?>
        </div><!-- /#comment-' . get_comment_ID() . ' -->
        <?php
    }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    public function __destruct() {
        ?>
        <!-- /#comment-list -->
        <?php
    }
}
