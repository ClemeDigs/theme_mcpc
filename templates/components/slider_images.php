<section class="bloc-slider">
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
            for ($i = 1; $i <= 8; $i++) { // Boucle jusqu'à 8
                $image = get_field('slider_image_' . $i);
                $legend = get_field('slider_image_legend_' . $i);
                if ($image) {
                    $images[] = [
                        'url' => is_array($image) ? $image['url'] : $image,
                        'legend' => $legend
                    ];
                }
            }

            if (!empty($images)) :
                foreach ($images as $image) :
            ?>
                    <div class="slider__image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                        <p><?php echo esc_html($image['legend']); ?></p>
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
</section>