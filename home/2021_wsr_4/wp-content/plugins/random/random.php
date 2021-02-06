<?php
/*
 * Plugin Name: Random Line
 */

add_action('admin_menu', function (){
    add_menu_page('Random Line', 'Random Line', 'read', 'random_line_admin', function () {

    });
});
