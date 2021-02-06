<?php
get_header();
if (have_posts()) {
    while (have_posts()):
        the_post(); ?>
        <section class="s-content s-content--top-padding">
            <div class="row narrow">
                <div class="col-full s-content__header aos-init aos-animate" data-aos="fade-up">
                    <h1 class="display-1 display-1--with-line-sep"><?=the_title()?></h1>
                </div>
                <div class="col-full aos-init aos-animate" data-aos="fade-up">
                    <?=the_content()?>
                </div>
            </div>
        </section>
    <?php endwhile;
}
get_footer();