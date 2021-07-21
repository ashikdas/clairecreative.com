<?php
/**
 * Posts list
 *
 * @package skylith
 */

$class = have_posts() ? 'nk-isotope' : '';

$class .= ' nk-blog-isotope-2 nk-isotope-gap nk-isotope-1-cols';

if ( have_posts() ) {
    ?>
    <div class="nk-gap-4"></div>
    <?php
}

?>
<div class="<?php echo esc_attr( $class ); ?>">
    <?php
    if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content-archive', get_post_format() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</div>

<?php

if ( have_posts() ) {
    ?>
    <div class="nk-gap-4"></div>
    <?php
}
