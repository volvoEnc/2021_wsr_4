<?php
/*
    Template Name: Страница с животными
*/
get_header();
?>

<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">Наши питомцы</h1>
        </div>
    </div>

    <div class="row entries-wrap wide">
        <div class="entries">

            <?php

            $posts = get_posts([
                'post_type' => 'animal',
                'numberposts' => -1
            ]);

            /** @var WP_Post $post */
            foreach($posts as $post): ?>
                <article class="col-block">

                    <div class="item-entry aos-init aos-animate" data-aos="zoom-in">
                        <div class="item-entry__thumb">
                            <a href="<?=$post->guid?>" class="item-entry__thumb-link">
                                <img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="">
                            </a>
                        </div>

                        <div class="item-entry__text">
                            <h1 class="item-entry__title"><a href="<?=$post->guid?>"><?= $post->post_title; ?></a></h1>

                            <div class="item-entry__text">
                                <?=get_post_meta($post->ID, 'areal', 1)?>
                            </div>
                        </div>
                    </div> <!-- item-entry -->

                </article> <!-- end article -->

            <?php endforeach; ?>

        </div> <!-- end entries -->
    </div> <!-- end entries-wrap -->
</section>
<?php get_footer(); ?>