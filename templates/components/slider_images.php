<section class="bloc-slider-parent">
    <div class="bloc-slider">
        <div class="bloc-slider__bonhomme">
            <?php afficher_bonhomme('slider_choix_du_bonhomme'); ?>
        </div>
        <div class="slider__text">
            <div class="slider__title">
                <h2><?php the_field('slider_title1');?></h2>
                <h2><?php the_field('slider_title2');?></h2>
            </div>
            <p><?php the_field('slider_text');?></p>
        </div>
        <div class="slider">
            <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="slider__images">
                <?php 
                $images = [];
                for ($i = 1; $i <= 8; $i++) { // Boucle jusqu'à 8 images
                    $image = get_field('slider_image_' . $i);
                    $legend = get_field('slider_image_legend_' . $i);

                    if ($image) {
                        $image_url = is_array($image) ? $image['url'] : $image;
                        $image_id = is_array($image) ? $image['ID'] : null; // Récupérer l'ID de l'image
                        $alt_text = get_acf_image_alt($image_id, 'slider_image_' . $i); // Utilisation de la fonction

                        $images[] = [
                            'url' => $image_url,
                            'alt' => $alt_text, // Ajout du texte alternatif
                            'legend' => $legend
                        ];
                    }
                }

                if (!empty($images)) :
                    foreach ($images as $image) :
                ?>
                        <div class="slider__image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php if (!empty($image['legend'])) : ?>
                                <p class="image-legend"><?php echo esc_html($image['legend']); ?></p>
                            <?php endif; ?>
                        </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>

            <button class="slider__btn slider__btn--next" aria-label="Slide suivant">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div class="slider__progress">
            <div class="slider__progress-bar"></div>
        </div>
    </div>
</section>