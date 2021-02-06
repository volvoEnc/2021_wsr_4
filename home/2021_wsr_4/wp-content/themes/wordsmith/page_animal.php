<?php

/*
 * Template Name: О животном
 * Template Post Type: animal
 */

get_header();
the_post();
?>

<section class="s-content add-top-padding">
    <div class="row narrow">
        <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
            <h1 class="display-1"><?=the_title()?></h1>
            <h6 class="display-6 display-1--with-line-sep"><?=get_post_meta(get_the_ID(), 'name_lat', 1)?></h6>
        </div>
        <div class="col-full aos-init aos-animate" data-aos="fade-up"  style="display: flex; justify-content: center;">
            <img src="<?= get_the_post_thumbnail_url($post->ID); ?>" alt="">
        </div>
        <div class="col-full aos-init aos-animate" data-aos="fade-up" style="display: flex; justify-content: center;">
            <p>
                <b>Кличка: </b><?= get_post_meta(get_the_ID(), 'nickname', 1) ?>
                <br>
                <b>Возраст: </b><?= get_post_meta(get_the_ID(), 'age', 1) ?>
            </p>
        </div>
        <div class="col-full aos-init aos-animate" data-aos="fade-up">
            <h6 class="display-6">Описание</h6>
            <p><?=get_post_meta(get_the_ID(), 'description', 1)?></p>
        </div>
        <div class="col-full aos-init aos-animate" data-aos="fade-up">
            <h6 class="display-6">Научная классификация</h6>
            <p><?php echo str_replace(PHP_EOL, '<br>', get_post_meta(get_the_ID(), 'class', 1)); ?></p>
        </div>
        <?php if(shortcode_exists('qrpage')):?>
        <div class="col-full aos-init aos-animate" data-aos="fade-up">
            <h6 class="display-6">QR Code</h6>
            <?=do_shortcode('[qrpage]')?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>