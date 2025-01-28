<section class="gallery-container">
    <div class="gallery">
        <?php
        $gallery = new WP_Query([
            'post_type' => 'gallery',
            'posts_per_page' => 10,
        ]);

        if ($gallery->have_posts()) :
            while ($gallery->have_posts()) : $gallery->the_post();
                $photo = get_field('photo');
                $legende = get_field('legende');
                $size_class = get_field('size_class');

                if ($photo) :
                    $photo_url = is_array($photo) ? $photo['url'] : $photo;
        ?>
                    <div class="gallery__item <?php echo esc_attr($size_class); ?>">
                        <div class="gallery__image-container">
                            <img
                                src="<?php echo esc_url($photo_url); ?>"
                                alt="<?php the_title(); ?>"
                                class="gallery__image">
                            <?php if ($legende): ?>
                                <p class="gallery__photo-caption">
                                    <?php echo esc_html($legende); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
        <?php
                endif;
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>




<!-- <div id="galleryModal" class="modal hidden">
        <span class="modal__close">&times;</span>
        <img class="modal__image" src="" alt="">
        <p class="modal__caption"></p>
        <button class="modal__arrow modal__arrow--prev">&lt;</button>
        <button class="modal__arrow modal__arrow--next">&gt;</button>
    </div> -->