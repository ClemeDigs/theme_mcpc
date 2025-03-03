<section class="residence">
    <div class="slider">
        <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <div class="slider__images">
            <?php
            $residence_musicale = new WP_Query([
                'post_type'      => 'residence_musicale',
                'posts_per_page' => -1,
                'meta_key'       => 'residence_musicale_year', // Champ personnalisé pour le tri
                'orderby'        => 'meta_value_num', // Trie par valeur numérique du champ
                'order'          => 'DESC', // Années les plus récentes en premier
            ]);

            if ($residence_musicale->have_posts()) :
                while ($residence_musicale->have_posts()) : $residence_musicale->the_post();
                    $image = get_field('residence_musicale_affiche');
                    if ($image) :
                        $image_url = is_array($image) ? $image['url'] : $image;
                        $image_id = is_array($image) ? $image['ID'] : null; // Récupérer l'ID de l'image
                        $alt_text = get_acf_image_alt($image_id, 'residence_musicale_affiche'); // Utilisation de la fonction
                        $residence_year = esc_attr(get_field('residence_musicale_year'));
            ?>
                        <!-- Affiche -->
                        <div class="slider__image slider__residences">
                            <img
                                src="<?php echo esc_url($image_url); ?>"
                                alt="<?php echo esc_attr($alt_text); ?>"
                                data-dialog="#residence-modal-<?php echo $residence_year; ?>">
                            <h3>Résidence Musicale <?php echo esc_html($residence_year); ?></h3>
                        </div>

                        <!-- Modale correspondante -->
                        <div class="dialog" id="residence-modal-<?php echo $residence_year; ?>">
                            <div class="residence-modal__content">
                                <div class="residence-modal__header">
                                    <div>
                                        <button class="btn-close ">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                    <div class="residence-modal__infos">
                                        <h2>Résidences Musicales <?php the_field('residence_musicale_year'); ?></h2>
                                        <div class="residence-modal__infos-date">
                                            <i class="fa-regular fa-calendar"></i>
                                            <div>
                                                <p>Du
                                                    <span><?php the_field('residence_musicale_start_date'); ?></span>
                                                </p>
                                                <p>
                                                    au
                                                    <span><?php the_field('residence_musicale_end_date'); ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="residence-modal__resume">
                                    <h3>Résumé</h3>
                                    <p><?php the_field('residence_musicale_resume'); ?></p>
                                </div>
                                <div class="residence-modal__slider">
                                    <div class="slider">
                                        <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
                                            <i class="fa-solid fa-chevron-left"></i>
                                        </button>
                                        <div class="slider__images">
                                            <?php
                                            $images = [];
                                            for ($i = 1; $i <= 6; $i++) {
                                                $image = get_field('residence_musicale_image' . $i);
                                                if ($image) {
                                                    $image_url = is_array($image) ? $image['url'] : $image;
                                                    $image_id = is_array($image) ? $image['ID'] : null; // Récupérer l'ID de l'image
                                                    $alt_text = get_acf_image_alt($image_id, 'residence_musicale_image' . $i); // Utilisation de la fonction

                                                    $images[] = [
                                                        'url' => $image_url,
                                                        'alt' => $alt_text, // Ajout du texte alternatif
                                                    ];
                                                }
                                            }

                                            if (!empty($images)) :
                                                foreach ($images as $image) :
                                            ?>
                                                    <div class="slider__image">
                                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
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
                                <?php
                                $text = get_field('residence_musicale_press');
                                if ($text): ?>
                                    <div class="residence-modal__article">
                                        <?php if ($text): ?>
                                            <?php echo $text; ?>
                                        <?php endif; ?>
                                    </div>
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
        <button class="slider__btn slider__btn--next" aria-label="Slide suivant">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</section>