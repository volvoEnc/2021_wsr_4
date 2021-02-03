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

function theme_register_nav_menu() {
    register_nav_menu( 'main', 'Основное меню' );
}

function customize_register(WP_Customize_Manager $customizer) {
    $customizer->add_section(
        'about_text_s',
        [
            'title' => 'Главная страница',
            'description' => 'Редактирование информации на главной странице',
            'priority' => 11
        ]
    );
    $customizer->add_setting(
        'about_test_sett'
    );
    $customizer->add_control(
        'about_test_sett',
        [
            'label' => 'О зоопарке',
            'section' => 'about_text_s',
            'type' => 'textarea'
        ]
    );
}



add_action('customize_register', 'customize_register');

add_action('wp_enqueue_scripts', 'includeCss');
add_action('wp_enqueue_scripts', 'includeJs');
add_action('after_setup_theme', 'theme_register_nav_menu');
