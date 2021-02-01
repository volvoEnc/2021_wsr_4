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

        <h2 class="header__nav-heading h6">Navigate to</h2>

        <ul class="header__nav">
            <li class="current"><a href="index.html" title="">Home</a></li>
            <li class="has-children">
                <a href="#0" title="">Categories</a>
                <ul class="sub-menu">
                    <li><a href="category.html">Lifestyle</a></li>
                    <li><a href="category.html">Health</a></li>
                    <li><a href="category.html">Family</a></li>
                    <li><a href="category.html">Management</a></li>
                    <li><a href="category.html">Travel</a></li>
                    <li><a href="category.html">Work</a></li>
                </ul>
            </li>
            <li class="has-children">
                <a href="#0" title="">Blog</a>
                <ul class="sub-menu">
                    <li><a href="single-video.html">Video Post</a></li>
                    <li><a href="single-audio.html">Audio Post</a></li>
                    <li><a href="single-standard.html">Standard Post</a></li>
                </ul>
            </li>
            <li><a href="style-guide.html" title="">Styles</a></li>
            <li><a href="page-about.html" title="">About</a></li>
            <li><a href="page-contact.html" title="">Contact</a></li>
        </ul> <!-- end header__nav -->

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav> <!-- end header__nav-wrap -->

</header> <!-- s-header -->