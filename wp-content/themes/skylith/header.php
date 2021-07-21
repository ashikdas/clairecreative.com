<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package skylith
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php
$preloader_show         = Ghost_Framework::get_theme_mod( 'preloader_show' );
$preloader_logo         = Ghost_Framework::get_theme_mod( 'preloader_logo' );
$preloader_spinner_dark = Ghost_Framework::get_theme_mod( 'preloader_spinner_dark' );
$preloader_logo_width   = Ghost_Framework::get_theme_mod( 'preloader_logo_width' );
$preloader_logo_size    = 'skylith_128x128';

if ( $preloader_logo_width > 128 && $preloader_logo_width < 256 ) {
    $preloader_logo_size = 'skylith_256x256';
} elseif ( $preloader_logo_width >= 256 ) {
    $preloader_logo_size = 'skylith_512x512';
}

?>

<?php if ( $preloader_show ) : ?>
    <div class="nk-preloader">
        <div class="nk-preloader-wrap">
            <?php
            if ( $preloader_logo ) {
                // phpcs:ignore
                echo Ghost_Framework::get_image( $preloader_logo, $preloader_logo_size );
            }
            ?>
            <div class="nk-preloader-spinner<?php echo ( $preloader_spinner_dark ? ' nk-preloader-spinner-dark' : '' ); ?>"></div>
        </div>
    </div>
<?php endif; ?>

<?php

$main_nav_show               = Ghost_Framework::get_theme_mod( 'main_navigation_show' );
$main_nav_opaque             = Ghost_Framework::get_theme_mod( 'main_navigation_opaque' );
$main_nav_logo               = Ghost_Framework::get_theme_mod( 'main_navigation_logo' );
$main_nav_logo_light         = Ghost_Framework::get_theme_mod( 'main_navigation_logo_light' );
$main_nav_logo_width         = Ghost_Framework::get_theme_mod( 'main_navigation_logo_width' );
$main_nav_items_align        = Ghost_Framework::get_theme_mod( 'main_navigation_items_align' );
$main_nav_items_collapsed    = Ghost_Framework::get_theme_mod( 'main_navigation_collapsed_items' ) && 'top' === $main_nav_show && has_nav_menu( 'top_menu' );
$main_nav_large              = Ghost_Framework::get_theme_mod( 'main_navigation_large_height' );
$main_nav_sticky             = Ghost_Framework::get_theme_mod( 'main_navigation_sticky' );
$main_nav_autohide           = Ghost_Framework::get_theme_mod( 'main_navigation_autohide' );
$main_nav_transparent        = Ghost_Framework::get_theme_mod( 'main_navigation_transparent' );
$main_nav_transparent_always = Ghost_Framework::get_theme_mod( 'main_navigation_transparent_always' );
$main_nav_white_text_on_top  = Ghost_Framework::get_theme_mod( 'main_navigation_white_text_on_top' );
$main_nav_dark               = Ghost_Framework::get_theme_mod( 'main_navigation_dark' );
$main_nav_in_container       = Ghost_Framework::get_theme_mod( 'main_navigation_in_container' );

// mobile nav.
$mobile_nav_show = 'top' === $main_nav_show || 'left' === $main_nav_show ? Ghost_Framework::get_theme_mod( 'mobile_navigation_show' ) : false;

// left nav.
if ( 'left' === $main_nav_show ) {
    $main_nav_logo       = Ghost_Framework::get_theme_mod( 'main_navigation_left_logo' );
    $main_nav_logo_light = Ghost_Framework::get_theme_mod( 'main_navigation_left_logo_light' );
    $main_nav_logo_width = Ghost_Framework::get_theme_mod( 'main_navigation_left_logo_width' );
}
$main_nav_left_items_effect = Ghost_Framework::get_theme_mod( 'main_navigation_left_items_effect' );
$main_nav_left_drop_effect  = Ghost_Framework::get_theme_mod( 'main_navigation_left_drop_effect' );
$main_nav_left_large        = Ghost_Framework::get_theme_mod( 'main_navigation_left_large' );

?>

<?php if ( 'top' === $main_nav_show || 'top_fullscreen' === $main_nav_show || 'top_side' === $main_nav_show || 'left' === $main_nav_show ) : ?>
    <!-- START: Nav Header -->
    <header class="nk-header<?php echo ( 'left' === $main_nav_show ? ' nk-header-left' : '' ); ?><?php echo ( $main_nav_opaque ? ' nk-header-opaque' : '' ); ?>">

        <?php if ( 'top' === $main_nav_show || 'top_fullscreen' === $main_nav_show || 'top_side' === $main_nav_show ) : ?>
            <!-- START: Navbar -->
            <nav class="nk-navbar nk-navbar-top<?php echo ( $main_nav_items_collapsed ? ' nk-navbar-items-collapsed' : '' ); ?><?php echo ( $main_nav_large ? ' nk-navbar-lg' : '' ); ?><?php echo ( $main_nav_sticky ? ' nk-navbar-sticky' : '' ); ?><?php echo ( $main_nav_autohide ? ' nk-navbar-autohide' : '' ); ?><?php echo ( $main_nav_transparent ? ' nk-navbar-transparent' : '' ); ?><?php echo ( $main_nav_transparent_always ? ' nk-navbar-transparent-always' : '' ); ?><?php echo ( $main_nav_white_text_on_top ? ' nk-navbar-white-text-on-top' : '' ); ?><?php echo ( $main_nav_dark ? ' nk-navbar-dark' : '' ); ?>">
                <div class="container<?php echo ( $main_nav_in_container ? '' : '-fluid' ); ?>">
                    <div class="nk-nav-table">
                        <?php if ( $main_nav_logo || $main_nav_logo_light ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-nav-logo">
                                <?php
                                if ( $main_nav_logo ) {
                                    // phpcs:ignore
                                    echo Ghost_Framework::get_image(
                                        $main_nav_logo,
                                        'skylith_512x512',
                                        '',
                                        array(
                                            'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                            'class' => 'nk-nav-logo-img-dark',
                                        )
                                    );
                                }
                                if ( $main_nav_logo_light ) {
                                    // phpcs:ignore
                                    echo Ghost_Framework::get_image(
                                        $main_nav_logo_light,
                                        'skylith_512x512',
                                        '',
                                        array(
                                            'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                            'class' => 'nk-nav-logo-img-light',
                                        )
                                    );
                                }
                                ?>
                            </a>
                        <?php endif; ?>

                        <?php
                        if ( 'top' === $main_nav_show ) {
                            if ( has_nav_menu( 'top_menu' ) ) {
                                Ghost_Framework::print_nav_menu(
                                    array(
                                        // default args.
                                        'theme_location' => 'top_menu',
                                        'container'      => '',
                                        'items_wrap'     => '<ul id="%1$s" class="%2$s" data-nav-mobile="#nk-nav-mobile">%3$s</ul>',

                                        // ghost menu walker args.
                                        'classes'        => array(
                                            'menu'        => 'nk-nav nk-nav-' . $main_nav_items_align . ' d-none d-lg-block' . ( $main_nav_items_collapsed ? ' nk-nav-collapsed' : '' ),
                                            'item_parent' => 'nk-drop-item',
                                            'sub_menu'    => 'dropdown',
                                            'item_active' => 'active',
                                            'item_active_ancestor' => 'active',
                                        ),
                                    )
                                );
                            } else {
                                // fix height of navigation by adding emty menu.
                                echo '<ul class="nk-nav"><li><a>&#8203;</a></li></ul>';
                            }
                        }

                        if ( $main_nav_items_collapsed || 'top_fullscreen' === $main_nav_show || 'top_side' === $main_nav_show || $mobile_nav_show ) :
                            ?>
                            <ul class="nk-nav nk-nav-right nk-nav-icons">
                                <?php if ( $main_nav_items_collapsed ) : ?>
                                    <li class="single-icon d-none d-lg-inline-block">
                                        <a href="<?php echo esc_url( '#' ); ?>" class="nk-navbar-collapsed-toggle">
                                        <span class="nk-icon-burger">
                                            <span class="nk-t-1"></span>
                                            <span class="nk-t-2"></span>
                                            <span class="nk-t-3"></span>
                                        </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( 'top_fullscreen' === $main_nav_show || 'fullscreen' === $mobile_nav_show ) : ?>
                                    <li class="single-icon<?php echo ( $mobile_nav_show ? ' d-lg-none' : '' ); ?>">
                                        <a href="<?php echo esc_url( '#' ); ?>" class="nk-navbar-full-toggle">
                                            <span class="nk-icon-burger">
                                                <span class="nk-t-1"></span>
                                                <span class="nk-t-2"></span>
                                                <span class="nk-t-3"></span>
                                            </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( 'top_side' === $main_nav_show || 'side' === $mobile_nav_show ) : ?>
                                    <li class="single-icon<?php echo ( $mobile_nav_show ? ' d-lg-none' : '' ); ?>">
                                        <a href="<?php echo esc_url( '#' ); ?>" data-nav-toggle="#nk-side">
                                            <span class="nk-icon-burger">
                                                <span class="nk-t-1"></span>
                                                <span class="nk-t-2"></span>
                                                <span class="nk-t-3"></span>
                                            </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if ( has_nav_menu( 'social_menu' ) && Ghost_Framework::get_theme_mod( 'social_navigation_show_in_top_nav' ) ) : ?>
                            <div class="nk-social nk-nav-right">
                                <?php
                                Ghost_Framework::print_nav_menu(
                                    array(
                                        // default args.
                                        'theme_location' => 'social_menu',
                                        'container'      => '',
                                        'classes'        => array(
                                            'menu' => 'nk-social nk-nav-right',
                                        ),
                                    )
                                );
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
            <!-- END: Navbar -->
        <?php elseif ( 'left' === $main_nav_show ) : ?>
            <!-- START: Navbar -->
            <nav class="nk-navbar nk-navbar-cont<?php echo ( $main_nav_dark ? ' nk-navbar-dark' : '' ); ?> d-none d-lg-flex">
                <?php if ( $main_nav_logo || $main_nav_logo_light ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-nav-logo">
                        <?php
                        if ( $main_nav_logo ) {
                            // phpcs:ignore
                            echo Ghost_Framework::get_image(
                                $main_nav_logo,
                                'skylith_128x128',
                                '',
                                array(
                                    'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                    'class' => 'nk-nav-logo-img-dark',
                                )
                            );
                        }
                        if ( $main_nav_logo_light ) {
                            // phpcs:ignore
                            echo Ghost_Framework::get_image(
                                $main_nav_logo_light,
                                'skylith_128x128',
                                '',
                                array(
                                    'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                    'class' => 'nk-nav-logo-img-light',
                                )
                            );
                        }
                        ?>
                    </a>
                <?php endif; ?>

                <a href="<?php echo esc_url( '#' ); ?>" class="nk-navbar-left-toggle">
                    <span class="nk-icon-burger">
                        <span class="nk-t-1"></span>
                        <span class="nk-t-2"></span>
                        <span class="nk-t-3"></span>
                    </span>
                </a>

                <?php if ( has_nav_menu( 'social_menu' ) && Ghost_Framework::get_theme_mod( 'social_navigation_show_in_left_nav' ) ) { ?>
                    <div class="nk-social">
                        <?php
                        Ghost_Framework::print_nav_menu(
                            array(
                                // default args.
                                'theme_location' => 'social_menu',
                                'container'      => '',
                            )
                        );
                        ?>
                    </div>
                <?php } ?>
            </nav>
            <!-- END: Navbar -->

            <!-- START: Navbar Left -->
            <div class="nk-navbar nk-navbar-left nk-navbar-overlay-content<?php echo ( $main_nav_left_large ? ' nk-navbar-lg' : '' ); ?><?php echo ( $main_nav_dark ? ' nk-navbar-dark' : '' ); ?> nk-navbar-items-effect-<?php echo esc_attr( $main_nav_left_items_effect ); ?> nk-navbar-drop-effect-<?php echo esc_attr( $main_nav_left_drop_effect ); ?> d-none d-lg-block">
                <div class="nk-nav-table">
                    <div class="nk-nav-row nk-nav-row-full nk-nav-row-center">
                        <?php
                        if ( has_nav_menu( 'top_menu' ) ) {
                            Ghost_Framework::print_nav_menu(
                                array(
                                    // default args.
                                    'theme_location' => 'top_menu',
                                    'container'      => '',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s" data-nav-mobile="#nk-nav-mobile">%3$s</ul>',

                                    // ghost menu walker args.
                                    'classes'        => array(
                                        'menu'        => 'nk-nav',
                                        'item_parent' => 'nk-drop-item',
                                        'sub_menu'    => 'dropdown',
                                        'item_active' => 'active',
                                        'item_active_ancestor' => 'active',
                                    ),
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- END: Navbar Left -->
            <!-- START: Navbar -->
            <nav class="nk-navbar nk-navbar-top<?php echo ( $main_nav_large ? ' nk-navbar-lg' : '' ); ?><?php echo ( $main_nav_dark ? ' nk-navbar-dark' : '' ); ?> d-lg-none">
                <div class="container">
                    <div class="nk-nav-table">
                        <?php if ( $main_nav_logo || $main_nav_logo_light ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-nav-logo">
                                <?php
                                if ( $main_nav_logo ) {
                                    // phpcs:ignore
                                    echo Ghost_Framework::get_image(
                                        $main_nav_logo,
                                        'skylith_128x128',
                                        '',
                                        array(
                                            'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                            'class' => 'nk-nav-logo-img-dark',
                                        )
                                    );
                                }
                                if ( $main_nav_logo_light ) {
                                    // phpcs:ignore
                                    echo Ghost_Framework::get_image(
                                        $main_nav_logo_light,
                                        'skylith_128x128',
                                        '',
                                        array(
                                            'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                            'class' => 'nk-nav-logo-img-light',
                                        )
                                    );
                                }
                                ?>
                            </a>
                        <?php endif; ?>
                        <?php if ( $mobile_nav_show ) : ?>
                            <ul class="nk-nav nk-nav-right nk-nav-icons">
                                <?php if ( 'fullscreen' === $mobile_nav_show ) : ?>
                                    <li class="single-icon d-lg-none">
                                        <a href="<?php echo esc_url( '#' ); ?>" class="nk-navbar-full-toggle">
                                            <span class="nk-icon-burger">
                                                <span class="nk-t-1"></span>
                                                <span class="nk-t-2"></span>
                                                <span class="nk-t-3"></span>
                                            </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( 'side' === $mobile_nav_show ) : ?>
                                    <li class="single-icon d-lg-none">
                                        <a href="<?php echo esc_url( '#' ); ?>" data-nav-toggle="#nk-side">
                                            <span class="nk-icon-burger">
                                                <span class="nk-t-1"></span>
                                                <span class="nk-t-2"></span>
                                                <span class="nk-t-3"></span>
                                            </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
            <!-- END: Navbar -->
        <?php endif; ?>
    </header>
    <!-- END: Nav Header -->
<?php endif; ?>


<?php if ( 'top_side' === $main_nav_show || 'side' === $mobile_nav_show ) : ?>
    <?php
    $side_nav_side             = Ghost_Framework::get_theme_mod( 'side_navigation_side' );
    $side_nav_items_align      = Ghost_Framework::get_theme_mod( 'side_navigation_items_align' );
    $side_nav_large            = Ghost_Framework::get_theme_mod( 'side_navigation_large' );
    $side_nav_dark             = Ghost_Framework::get_theme_mod( 'side_navigation_dark' );
    $side_nav_items_effect     = Ghost_Framework::get_theme_mod( 'side_navigation_items_effect' );
    $side_nav_drop_effect      = Ghost_Framework::get_theme_mod( 'side_navigation_drop_effect' );
    $side_nav_background_image = Ghost_Framework::get_theme_mod( 'side_navigation_background' );
    ?>
    <!-- START: Side Navbar -->
    <nav class="nk-navbar nk-navbar-side nk-navbar-overlay-content nk-navbar-<?php echo esc_attr( $side_nav_side ); ?>-side<?php echo ( $side_nav_large ? ' nk-navbar-lg' : '' ); ?> nk-navbar-align-<?php echo esc_attr( $side_nav_items_align ); ?><?php echo ( $side_nav_dark ? ' nk-navbar-dark' : '' ); ?> nk-navbar-items-effect-<?php echo esc_attr( $side_nav_items_effect ); ?> nk-navbar-drop-effect-<?php echo esc_attr( $side_nav_drop_effect ); ?>" id="nk-side">

        <?php if ( $side_nav_background_image ) : ?>
            <div class="nk-navbar-bg">
                <div class="bg-image">
                    <?php
                    // phpcs:ignore
                    echo Ghost_Framework::get_image(
                        $side_nav_background_image,
                        'skylith_1920x1080',
                        '',
                        array(
                            'class' => 'jarallax-img',
                        )
                    );
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Close Icon -->
        <span class="nk-navbar-side-close" data-nav-toggle="#nk-side">
            <span class="nk-icon-close"></span>
        </span>

        <div class="nk-nav-table">
            <div class="nk-nav-row nk-nav-row-full nk-nav-row-center">
                <?php
                if ( has_nav_menu( 'top_side' === $main_nav_show ? 'top_menu' : 'mobile_menu' ) ) {
                    Ghost_Framework::print_nav_menu(
                        array(
                            // default args.
                            'theme_location' => 'top_side' === $main_nav_show ? 'top_menu' : 'mobile_menu',
                            'container'      => '',

                            // ghost menu walker args.
                            'classes'        => array(
                                'menu'                 => 'nk-nav',
                                'item_parent'          => 'nk-drop-item',
                                'sub_menu'             => 'dropdown',
                                'item_active'          => 'active',
                                'item_active_ancestor' => 'active',
                            ),
                        )
                    );
                }
                ?>
            </div>
            <?php if ( has_nav_menu( 'social_menu' ) && Ghost_Framework::get_theme_mod( 'social_navigation_show_in_side_nav' ) ) { ?>
                <div class="nk-nav-row">
                    <div class="nk-social nk-social-left">
                        <?php
                        Ghost_Framework::print_nav_menu(
                            array(
                                // default args.
                                'theme_location' => 'social_menu',
                                'container'      => '',
                            )
                        );
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </nav>
    <!-- END: Side Navbar -->
<?php endif; ?>


<?php if ( 'top_fullscreen' === $main_nav_show || 'fullscreen' === $mobile_nav_show ) : ?>
    <?php
    $fullscreen_nav_style            = Ghost_Framework::get_theme_mod( 'fullscreen_navigation_style' );
    $fullscreen_nav_items_align      = Ghost_Framework::get_theme_mod( 'fullscreen_navigation_items_align' );
    $fullscreen_nav_dark             = Ghost_Framework::get_theme_mod( 'fullscreen_navigation_dark' );
    $fullscreen_nav_items_effect     = Ghost_Framework::get_theme_mod( 'fullscreen_navigation_items_effect' );
    $fullscreen_nav_drop_effect      = Ghost_Framework::get_theme_mod( 'fullscreen_navigation_drop_effect' );
    $fullscreen_nav_background_image = Ghost_Framework::get_theme_mod( 'fullscreen_navigation_background' );
    ?>
    <!-- START: Fullscreen Navbar -->
    <nav class="nk-navbar nk-navbar-full<?php echo ( 'widgetized' === $fullscreen_nav_style ? ' nk-navbar-full-style-2' : '' ); ?> nk-navbar-align-<?php echo esc_attr( $fullscreen_nav_items_align ); ?><?php echo ( $fullscreen_nav_dark ? ' nk-navbar-dark' : '' ); ?> nk-navbar-items-effect-<?php echo esc_attr( $fullscreen_nav_items_effect ); ?> nk-navbar-drop-effect-<?php echo esc_attr( $fullscreen_nav_drop_effect ); ?>" id="nk-full">
        <?php if ( $fullscreen_nav_background_image ) : ?>
            <div class="nk-navbar-bg">
                <div class="bg-image">
                    <?php
                    // phpcs:ignore
                    echo Ghost_Framework::get_image(
                        $fullscreen_nav_background_image,
                        'skylith_1920x1080',
                        '',
                        array(
                            'class' => 'jarallax-img',
                        )
                    );
                    ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="nk-nav-table">
            <div class="nk-nav-row">
                <div class="container<?php echo ( $main_nav_in_container ? '' : '-fluid' ); ?>">
                    <div class="nk-nav-header">
                        <?php if ( $main_nav_logo || $main_nav_logo_light ) : ?>
                        <div class="nk-nav-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nk-nav-logo">
                                <?php
                                if ( $main_nav_logo ) {
                                    // phpcs:ignore
                                    echo Ghost_Framework::get_image(
                                        $main_nav_logo,
                                        'skylith_512x512',
                                        '',
                                        array(
                                            'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                            'class' => 'nk-nav-logo-img-dark',
                                        )
                                    );
                                }
                                if ( $main_nav_logo_light ) {
                                    // phpcs:ignore
                                    echo Ghost_Framework::get_image(
                                        $main_nav_logo_light,
                                        'skylith_512x512',
                                        '',
                                        array(
                                            'style' => 'width: ' . $main_nav_logo_width . 'px; height: auto;',
                                            'class' => 'nk-nav-logo-img-light',
                                        )
                                    );
                                }
                                ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        <div class="nk-nav-close nk-navbar-full-toggle">
                            <span class="nk-icon-close"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-nav-row-full nk-nav-row">
                <?php if ( 'widgetized' === $fullscreen_nav_style ) : ?>
                    <div class="container">
                        <div class="row vertical-gap text-left">
                            <div class="col-md-6 col-lg-4 offset-lg-2">
                                <div class="nk-gap-3"></div>
                                <?php
                                if ( has_nav_menu( 'top_fullscreen' === $main_nav_show ? 'top_menu' : 'mobile_menu' ) ) {
                                    Ghost_Framework::print_nav_menu(
                                        array(
                                            // default args.
                                            'theme_location' => 'top_fullscreen' === $main_nav_show ? 'top_menu' : 'mobile_menu',
                                            'container' => '',

                                            // ghost menu walker args.
                                            'classes'   => array(
                                                'menu'     => 'nk-nav',
                                                'item_parent' => 'nk-drop-item',
                                                'sub_menu' => 'dropdown',
                                                'item_active' => 'active',
                                                'item_active_ancestor' => 'active',
                                            ),
                                        )
                                    );
                                }
                                ?>
                                <div class="nk-gap-3 d-none d-lg-block"></div>
                                <div class="nk-gap-3"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="nk-gap-3 d-none d-md-block"></div>

                                <?php if ( is_active_sidebar( 'sidebar-fullscreen-menu' ) ) : ?>
                                    <?php dynamic_sidebar( 'sidebar-fullscreen-menu' ); ?>
                                <?php endif; ?>

                                <div class="nk-gap-3"></div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="nk-nav-table">
                        <div class="nk-nav-row nk-nav-row-full nk-nav-row-center">
                            <?php
                            if ( has_nav_menu( 'top_fullscreen' === $main_nav_show ? 'top_menu' : 'mobile_menu' ) ) {
                                Ghost_Framework::print_nav_menu(
                                    array(
                                        // default args.
                                        'theme_location' => 'top_fullscreen' === $main_nav_show ? 'top_menu' : 'mobile_menu',
                                        'container'      => '',

                                        // ghost menu walker args.
                                        'classes'        => array(
                                            'menu'        => 'nk-nav',
                                            'item_parent' => 'nk-drop-item',
                                            'sub_menu'    => 'dropdown',
                                            'item_active' => 'active',
                                            'item_active_ancestor' => 'active',
                                        ),
                                    )
                                );
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php
            if ( 'default' === $fullscreen_nav_style ) :
                if ( has_nav_menu( 'social_menu' ) && Ghost_Framework::get_theme_mod( 'social_navigation_show_in_fullscreen_nav' ) ) {
                    ?>
                    <div class="nk-nav-row">
                        <div class="container">
                            <div class="nk-social">
                            <?php
                            Ghost_Framework::print_nav_menu(
                                array(
                                    // default args.
                                    'theme_location' => 'social_menu',
                                    'container'      => '',
                                )
                            );
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            endif;
            ?>
        </div>
    </nav>
    <!-- END: Fullscreen Navbar -->
<?php endif; ?>

<?php
// Left side image.
$general_left_side_image = Ghost_Framework::get_theme_mod( 'general_left_side_image' );
if ( $general_left_side_image ) {
    ?>
    <div class="nk-side-image">
        <div class="bg-image">
            <?php
            // phpcs:ignore
            echo Ghost_Framework::get_image( $general_left_side_image, 'skylith_1920x1080', false );
            ?>
        </div>
    </div>
    <?php
}
?>

<div id="page" class="hfeed site nk-main<?php echo Ghost_Framework::get_theme_mod( 'general_dark_content' ) ? ' nk-main-dark' : ''; ?>">
    <div id="content" class="site-content">
