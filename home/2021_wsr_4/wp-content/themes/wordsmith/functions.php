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

function add_animal_type_post(){
    register_post_type('animal', array(
        'labels'             => array(
            'name'               => 'Животные', // Основное название типа записи
            'singular_name'      => 'Животное', // отдельное название записи типа Book
            'add_new'            => 'Добавить нового',
            'add_new_item'       => 'Добавить нового животного',
            'edit_item'          => 'Редактировать животное',
            'new_item'           => 'Новое животное',
            'view_item'          => 'Посмотреть животное',
            'search_items'       => 'Найти животное',
            'not_found'          => 'Животных не найдено',
            'menu_name'          => 'Животные'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'thumbnail')
    ) );
}


function animal_add_fields() {
    add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func', 'animal', 'normal', 'high');
}

// код блока
function extra_fields_box_func( $post ){
    ?>
    <p><label><input type="text" name="extra[title]" value="<?php echo get_post_meta($post->ID, 'title', 1); ?>" style="width:50%" /> ? заголовок страницы (title)</label></p>

    <p>Описание статьи (description):
        <textarea type="text" name="extra[description]" style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'description', 1); ?></textarea>
    </p>

    <p><select name="extra[select]">
            <?php $sel_v = get_post_meta($post->ID, 'select', 1); ?>
            <option value="0">----</option>
            <option value="1" <?php selected( $sel_v, '1' )?> >Выбери меня</option>
            <option value="2" <?php selected( $sel_v, '2' )?> >Нет, меня</option>
            <option value="3" <?php selected( $sel_v, '3' )?> >Лучше меня</option>
        </select> ? выбор за вами</p>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}


add_action('customize_register', 'customize_register');
add_action('add_meta_boxes', 'animal_add_fields', 1);
add_action('wp_enqueue_scripts', 'includeCss');
add_action('wp_enqueue_scripts', 'includeJs');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action('init', 'add_animal_type_post');

add_theme_support( 'post-thumbnails' );
