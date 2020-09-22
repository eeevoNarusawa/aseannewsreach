<?php get_header(); ?>
<?php get_template_part('nav-page'); ?>
<div class="p-page-column">
    <section class="p-page-column__kv">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/column_kv.png" alt="COLUMN">
    </section>
    <div class="p-page-column__wrap l-container">
        <div class="p-page-column__conts">
            <?php
                if (have_posts()) :
                while (have_posts()) :
                the_post();
            ?>
            <div class="p-page-column__post">
                <div class="p-page-column__post--catch">
                    <a href="<?= the_permalink(); ?>">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/column_no_image.jpg" alt="<?= the_title(); ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="p-page-column__post--date">
                    <?php the_time('Y.m.d'); ?>
                </div>
                <div class="p-page-column__post--cat">
                    <?php the_category('/'); ?>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <div class="p-page-column__post--ttl">        
                        <?= the_title(); ?> 
                    </div>
                </a>
                <div class="p-page-column__post--more">        
                    <a href="<?php the_permalink(); ?>">
                        MORE
                    </a>
                </div>
                <?php get_template_part('_sns'); ?>
            </div>
            <?php
                endwhile;
                else:
            ?>
            <p>記事はありません</p>
            <?php
                endif;
            ?>
            <?php if (function_exists("pagination")) {
                pagination($additional_loop->max_num_pages);
            } ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_template_part('contact'); ?>
<?php get_footer(); ?>
