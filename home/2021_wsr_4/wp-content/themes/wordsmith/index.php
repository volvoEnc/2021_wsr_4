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

            $posts = get_posts([
                'post_type' => 'animal'
            ]);
            $limit = 6;
            $postsFiltered = [];
            shuffle($posts);

            foreach ($posts as $post) {
                if ($limit > 0) {
                    $limit--;
                    $postsFiltered[] = $post;
                }
            }

            /** @var WP_Post $post */
            foreach($postsFiltered as $post): ?>
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

<section class="s-content" id="section_contacts">

    <div class="row narrow">
        <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">Контакты</h1>
        </div>
    </div>

    <div class="row entries-wrap wide">
        <p><b>Номер телефона: </b><?=get_theme_mod('phone')?></p>
        <p><b>Адрес зоопарка: </b><?=get_theme_mod('address')?></p>
        <p><b>Правила посещения: </b><?=get_theme_mod('rules')?></p>
        <p><b>Время работы: </b><?=get_theme_mod('job_time')?></p>
    </div> <!-- end entries-wrap -->
</section>

<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">Заявка на посещение зоопарка</h1>
        </div>
    </div>

    <div class="row narrow">
        <div class="col-full aos-init aos-animate" data-aos="fade-up">
            <form name="cForm" id="cForm" class="contact-form" method="post">
                <fieldset>

                    <div>
                        <input name="cName" id="cName" class="full-width" placeholder="Дата посещения" value="" type="text">
                    </div>

                    <div class="form-field">
                        <input name="cEmail" id="cEmail" class="full-width" placeholder="Время посещения" value="" type="text">
                    </div>

                    <div class="form-field">
                        <input name="cWebsite" id="cWebsite" class="full-width" placeholder="Имя" value="" type="text">
                    </div>

                    <div class="message form-field">
                        <textarea name="cMessage" id="cMessage" class="full-width" placeholder="WhatsApp номер"></textarea>
                    </div>

                    <input type="button" id="send_m" class="submit btn btn--primary btn--large full-width" value="Отправить" onclick="send()">

                </fieldset>
            </form>
        </div>
    </div>
</section>

<script>
    function send() {
        $el = document.getElementById('send_m');
        $el.value = 'Заявка отправлена'
    }
</script>

<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
            <h1 class="display-1 display-1--with-line-sep">Карта</h1>
        </div>
    </div>

    <div class="row narrow">
        <div class="col-full aos-init aos-animate" style="display: flex; justify-content: center;" data-aos="fade-up">
            <img src="<?=get_theme_mod('map_image')?>" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
        </div>
    </div>
</section>

<?php get_footer(); ?>

