<section class="gallery-container">
    <div class="gallery__bonhomme">
        <?php afficher_bonhomme('gallery_choix_du_bonhome'); ?>
    </div>
    <div class="gallery">
        <?php
        // Boucler sur les sous-groupes
        for ($i = 1; $i <= 10; $i++) {
            $gallery = get_field('photo_gallery_' . $i);
            if ($gallery) :
                $photo_id = $gallery['photo'] ?? null;
                $legende = $gallery['legende'] ?? null;
                $size_class = $gallery['size_class'] ?? null;

                if ($photo_id) :
                    $photo_url = wp_get_attachment_url($photo_id);
                    if ($photo_url):
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
                endif;
            endif;
        }
        ?>
    </div>
</section>

<div id="galleryModal" class="modal hidden">
    <span class="modal__close">&times;</span>
    <img class="modal__image" src="" alt="">
    <p class="modal__caption"></p>
    <button class="modal__arrow modal__arrow--prev"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="modal__arrow modal__arrow--next"><i class="fa-solid fa-chevron-right"></i></button>
</div>