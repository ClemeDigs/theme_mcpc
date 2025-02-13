<section class="gallery-container" role="region" aria-labelledby="gallery-heading">
    <div class="block__bonhomme block__bonhomme--gallery
    <?php
    $position_class = ajouter_position_bonhomme('block_position_du_bonhomme_gallery');
    echo $position_class ? ' ' . $position_class : '';
    ?>">
        <?php afficher_bonhomme('gallery_choix_du_bonhome'); ?>
    </div>

    <div class="gallery">
        <?php
        // Boucler sur les sous-groupes
        for ($i = 1; $i <= 20; $i++) {
            $gallery = get_field('photo_gallery_' . $i);
            if ($gallery) :
                $photo_id = $gallery['photo'] ?? null;
                $legende = $gallery['legende'] ?? null;
                $size_class = $gallery['size_class'] ?? null;

                if ($photo_id) :
                    $photo_url = wp_get_attachment_url($photo_id);
                    if ($photo_url):
        ?>
                        <div class="gallery__item <?php echo esc_attr($size_class); ?>" role="group" aria-labelledby="photo-<?php echo $i; ?>-caption">
                            <div class="gallery__image-container">
                                <img
                                    src="<?php echo esc_url($photo_url); ?>"
                                    alt="<?php echo esc_attr($legende); ?>"
                                    class="gallery__image">
                                <?php if ($legende): ?>
                                    <p id="photo-<?php echo $i; ?>-caption" class="gallery__photo-caption">
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

<div id="galleryModal" class="modal hidden" role="dialog" aria-labelledby="modal-heading" aria-hidden="true">
    <h2 id="modal-heading" class="sr-only">Image Modal</h2>
    <span class="modal__close" role="button" aria-label="Close">&times;</span>
    <img class="modal__image" src="" alt="">
    <p class="modal__caption"></p>
    <button class="modal__arrow modal__arrow--prev" aria-label="Previous image"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="modal__arrow modal__arrow--next" aria-label="Next image"><i class="fa-solid fa-chevron-right"></i></button>
</div>