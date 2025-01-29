<?php
// Fonction pour nettoyer le nom des expositions en supprimant les accents et les caractères spéciaux
function sanitize_exposition_name($name) {
    $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name); // Supprime les accents
    $name = strtolower($name); // Convertit en minuscules
    $name = preg_replace('/[^a-z0-9]+/', '-', $name); // Remplace espaces et caractères spéciaux par des tirets
    $name = trim($name, '-'); // Supprime les tirets en début ou fin
    return $name . '-' . uniqid(); // Ajoute un ID unique pour éviter les conflits
}
?>

<section class="expositions">
    <div class="slider">
        <div class="slider__title">
            <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <h2>Expositions passées</h2>
            <button class="slider__btn slider__btn--next" aria-label="Slide suivant">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div class="slider__images">
            <?php
            $exposition = new WP_Query([
                'post_type' => 'exposition',
                'posts_per_page' => -1,
            ]);

            if ($exposition->have_posts()) :
                while ($exposition->have_posts()) : $exposition->the_post();
                    $image = get_field('exposition_image1');
                    if ($image) :
                        $image_url = is_array($image) ? $image['url'] : $image;
                        $exposition_name = get_field('exposition_name');
                        $exposition_id = sanitize_exposition_name($exposition_name);
            ?>
                <!-- Slide pour chaque exposition -->
                <div class="slider__item">
                    <div class="slider__image">
                        <img 
                            src="<?php echo esc_url($image_url); ?>" 
                            alt="<?php echo esc_attr($exposition_name); ?>"
                            data-dialog="#exposition-modal-<?php echo $exposition_id; ?>"
                        >
                    </div>
                    <div class="slider__infos">
                        <h2><?php the_field('exposition_name'); ?> - <?php the_field('exposition_artist_name'); ?></h2>
                        <div class='exposition__infos-acces'>
                            <div class="exposition__infos-date">
                                <i class="fa-regular fa-calendar"></i>
                                <div>
                                    <p>Du <span><?php the_field('exposition_start_date'); ?></span></p>
                                    <p>au <span><?php the_field('exposition_end_date'); ?></span></p>
                                </div>
                            </div>
                            <div class="exposition__infos-place">
                                <i class="fa-solid fa-location-dot"></i>
                                <p><?php the_field('exposition_adress'); ?></p>
                            </div>
                        </div>
                        <p><?php the_field('exposition_resume'); ?></p>
                        <a class="btn-open-modal" data-dialog="#exposition-modal-<?php echo $exposition_id; ?>" href="#">En savoir plus</a>
                    </div>
                </div>

                <!-- Modale correspondante -->
                <div class="dialog" id="exposition-modal-<?php echo $exposition_id; ?>">
                    <div class="exposition-modal__content">
                        <div class="exposition-modal__header">
                            <button class="btn-close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <h2><?php the_field('exposition_name'); ?> - <?php the_field('exposition_artist_name'); ?></h2>
                        </div>
                        <div class="exposition-modal__infos">
                            <div class="exposition-modal__infos-date">
                                <i class="fa-regular fa-calendar"></i>
                                <div>
                                    <p>Du <span><?php the_field('exposition_start_date'); ?></span></p>
                                    <p>au <span><?php the_field('exposition_end_date'); ?></span></p>
                                </div>
                            </div>
                            <div class="exposition-modal__infos-place">
                                <i class="fa-solid fa-location-dot"></i>
                                <p><?php the_field('exposition_adress'); ?></p>
                            </div>
                        </div>
                        <div class="exposition-modal__resume">
                            <h3>Résumé</h3>
                            <p><?php the_field('exposition_resume'); ?></p>
                        </div>
                        <!-- Slider des images de l'exposition -->
                        <div class="exposition-modal__slider">
                            <div class="slider">
                                <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>
                                <div class="slider__images">
                                    <?php 
                                    for ($i = 1; $i <= 6; $i++) {
                                        $image = get_field('exposition_image' . $i);
                                        if ($image) :
                                            $image_url = is_array($image) ? $image['url'] : $image;
                                    ?>
                                        <div class="slider__image">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($exposition_name); ?>">
                                        </div>
                                    <?php 
                                        endif;
                                    }
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
                        <div class="exposition-modal__artist">
                            <a href="<?php echo esc_url(get_field('exposition_artist_link')); ?>" target="_blank">Visitez le site de l'artiste</a>
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
    </div>
</section>
