<?php get_header(); ?>
    <!-- featured
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-full">
                <?php if( function_exists('photo_gallery') ) { photo_gallery(1); } ?>
            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->

<section class="s-content s-content--top-padding" id="section_about">
    <div class="row narrow">
        <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">О зоопарке</h1>
            <p class="lead"><?=get_theme_mod('about_test_sett', 'Заполните описание')?></p>
        </div>
    </div>
</section>

<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">Наши питомцы</h1>
        </div>
    </div>

    <div class="row entries-wrap wide">
        <div class="entries">

            <?php

            $pages = get_pages([
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page_animal.php'
            ]);
            $limit = 6;
            $pagesFiltered = [];
            shuffle($pages);

            foreach ($pages as $page) {
                if ($limit > 0) {
                    $limit--;
                    $pagesFiltered[] = $page;
                }
            }

            /** @var WP_Post $page */
            foreach($pagesFiltered as $page): ?>
            <?php
                $filteredContent = str_replace('<br>', PHP_EOL, $page->post_content);
                $pageArialArray = [];
                preg_match("/Ареал.*\n/iu", $filteredContent, $pageArialArray);
                $arial = $pageArialArray[0];
            ?>
            <article class="col-block">

                <div class="item-entry aos-init aos-animate" data-aos="zoom-in">
                    <div class="item-entry__thumb">
                        <a href="<?=$page->guid?>" class="item-entry__thumb-link">
                            <img src="<?= get_the_post_thumbnail_url($page->ID); ?>" alt="">
                        </a>
                    </div>

                    <div class="item-entry__text">
                        <h1 class="item-entry__title"><a href="<?=$page->guid?>"><?= $page->post_title; ?></a></h1>

                        <div class="item-entry__text">
                            <?=$arial?>
                        </div>
                    </div>
                </div> <!-- item-entry -->

            </article> <!-- end article -->

            <?php endforeach; ?>

        </div> <!-- end entries -->
    </div> <!-- end entries-wrap -->
</section>

<?php get_footer(); ?>

