<?php


function includeCss() {
    wp_enqueue_style('base_css', get_stylesheet_directory_uri() . '/css/base.css');
    wp_enqueue_style('vendor_css', get_stylesheet_directory_uri() . '/css/vendor.css');
    wp_enqueue_style('main_css', get_stylesheet_directory_uri() . '/css/main.css');
}

function includeJs() {
    wp_enqueue_script('modernizr_js', get_stylesheet_directory_uri() . '/js/modernizr.js');
    wp_enqueue_script('jquery_js', get_stylesheet_directory_uri() . '/js/jquery-3.2.1.min.js', false, false, false);
    wp_enqueue_script('plugins_js', get_stylesheet_directory_uri() . '/js/plugins.js', false, false, true);
    wp_enqueue_script('qrcode_js', get_stylesheet_directory_uri() . '/js/qrcode.js', false, false, false);
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
    $customizer->add_setting('about_test_sett');
    $customizer->add_setting('phone');
    $customizer->add_setting('address');
    $customizer->add_setting('rules');
    $customizer->add_setting('job_time');
    $customizer->add_setting('map_image', [
            'height' => 300
    ]);

    $customizer->add_control(
        'about_test_sett',
        [
            'label' => 'О зоопарке',
            'section' => 'about_text_s',
            'type' => 'textarea'
        ]
    );
    $customizer->add_control(
        'phone',
        [
            'label' => 'Телефон',
            'section' => 'about_text_s',
            'type' => 'text'
        ]
    );
    $customizer->add_control(
        'address',
        [
            'label' => 'Адрес зоопарка',
            'section' => 'about_text_s',
            'type' => 'text'
        ]
    );
    $customizer->add_control(
        'rules',
        [
            'label' => 'Правила посещения',
            'section' => 'about_text_s',
            'type' => 'textarea'
        ]
    );
    $customizer->add_control(
        'job_time',
        [
            'label' => 'Время работы зоопарка',
            'section' => 'about_text_s',
            'type' => 'textarea'
        ]
    );
    $customizer->add_control(new WP_Customize_Image_Control($customizer, 'map_image', [
        'label' => 'Карта-заглушка',
        'section' => 'about_text_s',
        'settings' => 'map_image'
    ]));
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
    add_meta_box( 'animal_fields', 'Информация о животном', 'animal_fields_call', 'animal', 'normal', 'high');
}

function add_animal_save($postId) {
    if (!empty($_POST['animal'])) {
        foreach ($_POST['animal'] as $key => $value) {
            update_post_meta($postId, $key, $value);
        }
    }
    return $postId;
}

function animal_fields_call($post){ ?>
    <p>
        <b>Название животного (лат)</b>
        <br>
        <label>
            <input type="text" name="animal[name_lat]" value="<?php echo get_post_meta($post->ID, 'name_lat', 1); ?>" style="width:30%" />
        </label>
    </p>
    <p>
        <b>Кличка питомца</b>
        <br>
        <label>
            <input type="text" name="animal[nickname]" value="<?php echo get_post_meta($post->ID, 'nickname', 1); ?>" style="width:30%" />
        </label>
    </p>
    <p>
        <b>Ареал</b>
        <br>
        <label>
            <input type="text" name="animal[areal]" value="<?php echo get_post_meta($post->ID, 'areal', 1); ?>" style="width:30%" />
        </label>
    </p>
    <p>
        <b>Возраст</b>
        <br>
        <label>
            <input type="text" name="animal[age]" value="<?php echo get_post_meta($post->ID, 'age', 1); ?>" style="width:30%" />
        </label>
    </p>
    <p>
        <b>Ссылка на дополнительные материалы</b>
        <br>
        <label>
            <input type="text" name="animal[link]" value="<?php echo get_post_meta($post->ID, 'link', 1); ?>" style="width:30%" />
        </label>
    </p>
    <p>
        <b>Описание</b>
        <br>
        <label>
            <textarea name="animal[description]" style="width:50%"><?=get_post_meta($post->ID, 'description', 1)?></textarea>
        </label>
    </p>
    <p>
        <b>Научная классификация</b>
        <br>
        <label>
            <textarea name="animal[class]" id="description" style="width:50%"><?=get_post_meta($post->ID, 'class', 1)?></textarea>
        </label>
    </p>
    <?php
}


add_action('customize_register', 'customize_register');
add_action('add_meta_boxes', 'animal_add_fields');
add_action('wp_enqueue_scripts', 'includeCss');
add_action('wp_enqueue_scripts', 'includeJs');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action('init', 'add_animal_type_post');
add_action('save_post', 'add_animal_save');

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );