<?php get_header(); ?>
<?php get_template_part('nav-page'); ?>
<section class="p-single">
    <div class="p-single-wrap l-container">
        <section class="p-single-conts">
            <div class="p-single-conts__date">
                <?php the_time('Y年m月d日'); ?>
            </div>
            <div class="p-single-conts__ttl">
                <?= the_title(); ?>
            </div>
            <div class="p-single-conts__sns">
                <?php get_template_part('_sns'); ?>
            </div>
            <div class="p-single-conts__catch">
                <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>
            </div>
            <div class="p-single-conts__post">
                <?php while(have_posts()): the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
            <div class="p-single-conts__back">
                <a href="#" onclick="history.back(); return false;">Back</a>
            </div>
        </section>
        <?php get_sidebar(); ?>
    </div>
</section>
<?php get_template_part('contact'); ?>
<?php get_footer(); ?>
