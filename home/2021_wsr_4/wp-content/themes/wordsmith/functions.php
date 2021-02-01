<?php

function includeCss() {
    wp_enqueue_style('base_css', get_stylesheet_directory_uri() . '/css/base.css');
    wp_enqueue_style('vendor_css', get_stylesheet_directory_uri() . '/css/vendor.css');
    wp_enqueue_style('main_css', get_stylesheet_directory_uri() . '/css/main.css');
}

function includeJs() {
    wp_enqueue_script('modernizr_js', get_stylesheet_directory_uri() . '/js/modernizr.js');
    wp_enqueue_script('jquery_js', get_stylesheet_directory_uri() . '/js/jquery-3.2.1.min.js', false, false, true);
    wp_enqueue_script('plugins_js', get_stylesheet_directory_uri() . '/js/plugins.js', false, false, true);
    wp_enqueue_script('main_js', get_stylesheet_directory_uri() . '/js/main.js', false, false, true);
}

add_action('wp_enqueue_scripts', 'includeCss');
add_action( 'wp_enqueue_scripts', 'includeJs' );