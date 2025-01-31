<section class="residence">
        <div class="slider">
            <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="slider__images">
                <?php
                $residence_musicale = new WP_Query([
                    'post_type' => 'residence_musicale',
                    'posts_per_page' => -1,
                ]);

                if ($residence_musicale->have_posts()) :
                    while ($residence_musicale->have_posts()) : $residence_musicale->the_post();
                        $image = get_field('residence_musicale_affiche');
                        if ($image) :
                            $image_url = is_array($image) ? $image['url'] : $image;
                            $residence_year = esc_attr(get_field('residence_musicale_year'));
                ?>
                    <!-- Affiche -->
                    <div class="slider__image">
                        <img 
                            src="<?php echo esc_url($image_url); ?>" 
                            alt="<?php echo esc_attr(get_the_title()); ?>"
                            data-dialog="#residence-modal-<?php echo $residence_year; ?>"
                        >
                        <h3>Résidence Musicale <?php the_field('residence_musicale_year'); ?></h3>
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
                                            <span><?php the_field('residence_musicale_start_date'); ?></span></p>
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
                                                $images[] = [
                                                    'url' => is_array($image) ? $image['url'] : $image,
                                                ];
                                            }
                                        }

                                        if (!empty($images)) :
                                            foreach ($images as $image) :
                                        ?>
                                            <div class="slider__image">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
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
                            <div class="residence-modal__article">
                                <h3>On parle de nous !</h3>
                                <p><?php the_field('residence_musicale_press_text'); ?></p>
                                <a href="<?php echo esc_url(get_field('residence_musicale_press_url')); ?>" target="_blank">Voir l'article</a>
                            </div>
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


