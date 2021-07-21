<?php
/**
 * Custom SCSS.
 *
 * @package skylith
 */

?>

// version: 1.3.3

@import "_variables.scss";

// main colors
$color_main: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_main' ) ); ?>;
$color_secondary: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_secondary' ) ? : 'none' ); ?>;

$color_text: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_text' ) ); ?>;
$color_text_blog: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_text_blog' ) ); ?>;
$color_titles: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_titles' ) ); ?>;
$color_bg: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_bg' ) ); ?>;
$color_bg_footer: #ebebeb;

// dark content style
$dark_color_text: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_dark_text' ) ); ?>;
$dark_color_titles: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_dark_titles' ) ); ?>;

// dark colors
$color_dark_main: <?php echo esc_attr( Ghost_Framework::get_theme_mod( 'custom_colors_color_main_dark' ) ); ?>;
$color_dark_05: lighten($color_dark_main, 3%);
$color_dark_1: lighten($color_dark_main, 8.4%);
$color_dark_2: lighten($color_dark_1, 4%);
$color_dark_3: lighten($color_dark_1, 8%);
$color_dark_4: lighten($color_dark_1, 12%);

// gray colors
$color_gray_mid: #8e8e8e;
$color_gray_1: #fafafa;
$color_gray_2: darken($color_gray_1, 1%);
$color_gray_3: darken($color_gray_1, 2%);
$color_gray_4: darken($color_gray_1, 3%);
$color_gray_5: darken($color_gray_1, 4%);
$color_gray_6: darken($color_gray_1, 5%);
$color_gray_7: #d9d9d9;

// main colors list
$colors: (
    "main"    : $color_main,
    "white"   : #fff,
    "black"   : #000,
    "dark"    : $color_dark_main,
    "dark-05" : $color_dark_05,
    "dark-1"  : $color_dark_1,
    "dark-2"  : $color_dark_2,
    "dark-3"  : $color_dark_3,
    "dark-4"  : $color_dark_4,
    "gray-1"  : $color_gray_1,
    "gray-2"  : $color_gray_2,
    "gray-3"  : $color_gray_3,
    "gray-4"  : $color_gray_4,
    "gray-5"  : $color_gray_5,
    "gray-6"  : $color_gray_6,
    "gray-7"  : $color_gray_7,
    "gray": $color_gray_mid
);

@import "_include.scss"
