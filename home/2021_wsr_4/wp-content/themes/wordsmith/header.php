<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <?php wp_head(); ?>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Wordsmith</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?=get_stylesheet_directory_uri().'/favicon.ico'?>" type="image/x-icon">
    <link rel="icon" href="<?=get_stylesheet_directory_uri().'/favicon.ico'?>" type="image/x-icon">

</head>

<body id="top">

<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-fade">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>


<!-- header
================================================== -->
<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="index.html">
            <img src="<?=get_template_directory_uri(). '/images/logo.svg'?>" alt="Homepage">
        </a>
    </div> <!-- end header__logo -->

    <a class="header__search-trigger" href="#0"></a>
    <div class="header__search">

        <form role="search" method="get" class="header__search-form" action="#">
            <label>
                <span class="hide-content">Search for:</span>
                <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

    </div>  <!-- end header__search -->

    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
    <nav class="header__nav-wrap">
        <?php
        wp_nav_menu([
            'theme_location'  => 'main',
            'container'       => 'ul',
            'menu_class'      => 'header__nav',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'items_wrap'      => '<ul class="header__nav">%3$s</ul>',
            'depth'           => 0
        ]);
        ?>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav> <!-- end header__nav-wrap -->

</header> <!-- s-header -->