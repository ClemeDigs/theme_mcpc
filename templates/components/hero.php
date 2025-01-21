<section>
    <div>
        <?php
        $hero = new WP_Query([            
        'post_type' => 'hero',
        'posts_per_page' => 1]
        );

        if ($hero->have_posts()) :
            while ($hero->have_posts()) : $hero->the_post();
            ?>

            <section class="hero">
                <div class="hero__image">
                    <?php
                    $image = get_field('hero__image');
                    if ($image) :
                        $image_url = is_array($image) ? $image['url'] : $image;
                    ?>
                    <img src="<?php echo hero__image($image_url); ?>" alt="<?php the_title();?>">
                    <?php endif; ?>
                    <div class="hero__content">
                    <h1><?php the_title(); ?></h1>
                </div>
                </div>
            </section>

        <?php
        endwhile;
        endif;
        ?>
    </div>
</section>