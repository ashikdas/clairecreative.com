<?php // phpcs:ignore
/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 *
 * @package skylith-core
 */

/**
 * Skylith_Recent_Posts_Widget
 */
class Skylith_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
    /**
     * Outputs the content for the current Recent Posts widget instance.
     *
     * @since 2.8.0
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Posts widget instance.
     */
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'skylith-core' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        /**
         * Filters the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args     An array of arguments used to retrieve the recent posts.
         * @param array $instance Array of settings for the current widget.
         */
        $r = new WP_Query( apply_filters(
            'widget_posts_args',
            array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
            ),
            $instance
        ) );

        if ( ! $r->have_posts() ) {
            return;
        }
        ?>
        <?php echo wp_kses_post( $args['before_widget'] ); ?>
        <?php
        if ( $title ) {
            echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
        }
        ?>
        <div class="nk-recent-posts">
            <?php foreach ( $r->posts as $recent_post ) : ?>
                <?php
                $post_title = get_the_title( $recent_post->ID );
                $title      = ( ! empty( $post_title ) ) ? $post_title : esc_html__( '(no title)', 'skylith-core' );
                ?>
                <div class="nk-recent-post">
                    <div class="nk-recent-post-thumb">
                        <a href="<?php the_permalink( $recent_post->ID ); ?>">
                            <?php
                                echo get_the_post_thumbnail(
                                    $recent_post->ID,
                                    'skylith_128x128_crop',
                                    array(
                                        'class' => 'nk-img-stretch',
                                    )
                                );
                            ?>
                        </a>
                    </div>
                    <div class="nk-recent-post-cont">
                        <h3 class="nk-recent-post-title"><a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo wp_kses_post( $title ); ?></a></h3>
                        <?php if ( $show_date ) : ?>
                            <div class="nk-recent-post-date post-date"><?php echo get_the_date( '', $recent_post->ID ); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        echo wp_kses_post( $args['after_widget'] );
    }
}

unregister_widget( 'WP_Widget_Recent_Posts' );
register_widget( 'Skylith_Recent_Posts_Widget' );
