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

<?php get_footer(); ?>

