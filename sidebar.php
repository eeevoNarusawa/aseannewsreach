<section class="l-sidebar">
    <div class="l-sidebar--ranking">
        <div class="l-sidebar--ranking__ttl">
            Popular Post
        </div>
        <div class="l-sidebar--ranking__list">
            <?php
            // views post metaで記事のPV情報を取得する
            setPostViews(get_the_ID());
            // ループ開始
            query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=5&order=DESC'); while(have_posts()) : the_post(); ?>
            <a href="<?php echo get_permalink(); ?>">
                <div class="l-sidebar--ranking__list-item">
                    <div class="l-sidebar--ranking__list-item-img">
                        <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/column_no_image.jpg" alt="<?= the_title(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="l-sidebar--ranking__list-item-ttl">
                        <?php the_title(); ?>
                    </div>
                </div>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="l-sidebar--cat">
        <div class="l-sidebar--cat__ttl">
            Category
        </div>
        <div class="l-sidebar--cat__list">
            <?php
                $args = array(
                    'parent' => 0,
                    'orderby' => 'term_order',
                    'order' => 'ASC'
                );
                $categories = get_categories( $args );
            ?>
            <?php foreach( $categories as $category ) : ?>
                <a href="<?php echo get_category_link( $category->term_id ); ?>" class="l-sidebar--cat__list-item"><?php echo $category->name; ?></a>
            <?php endforeach; ?>
            </div>
    </div>
    <div class="l-sidebar--country">
        <div class="l-sidebar--country__ttl">
            Country
        </div>
        <div class="l-sidebar--country__list">
            <?php
            $term_list = get_terms('post_tag');
            $result_list = [];
            foreach ($term_list as $term) {
            $u = (get_term_link( $term, 'post_tag' ));
                echo "<a class='l-sidebar--country__list-item' href='".$u."'>".$term->name."</a>";
            }
            ?>
        </div>
    </div>
</section>