<?php

// Récupérer les expositions
$today = date('Ymd'); // Format de date pour ACF (ou modifier si nécessaire)

// Expositions en cours
$exposition_now = new WP_Query([
    'post_type' => 'exposition',
    'posts_per_page' => 1, // Afficher une seule exposition
    'meta_key' => 'exposition_start_date', // Trier par date de début
    'orderby' => 'meta_value_num', // Comparaison numérique
    'order' => 'ASC', // Trier par la plus proche
    'meta_query' => [
        'relation' => 'AND', // Toutes les conditions doivent être respectées
        [
            'relation' => 'OR', // Inclure les expositions en cours ou à venir
            [
                'key' => 'exposition_start_date',
                'compare' => '<=',
                'value' => $today,
                'type' => 'NUMERIC',
            ],
            [
                'key' => 'exposition_end_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'NUMERIC',
            ],
        ],
        // Exclure explicitement les expositions passées
        [
            'key' => 'exposition_end_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'NUMERIC',
        ],
    ],
]);

// Expositions passées
$past_expositions = new WP_Query([
    'post_type' => 'exposition',
    'posts_per_page' => -1,
    'meta_query' => [
        [
            'key' => 'exposition_end_date',
            'compare' => '<',
            'value' => $today,
        ],
    ],
]);

// Fonction pour nettoyer le nom des expositions en supprimant les accents et les caractères spéciaux
function sanitize_exposition_name($name) {
    $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name); // Supprime les accents
    $name = strtolower($name); // Convertit en minuscules
    $name = preg_replace('/[^a-z0-9]+/', '-', $name); // Remplace espaces et caractères spéciaux par des tirets
    $name = trim($name, '-'); // Supprime les tirets en début ou fin
    return $name . '-' . uniqid(); // Ajoute un ID unique pour éviter les conflits
}

function format_date($date, $format = '%e %B %Y') {
    if (!$date) {
        return ''; // Retourne une chaîne vide si aucune date n'est fournie
    }

    // Configurer la locale en français
    setlocale(LC_TIME, 'fr_FR.UTF-8', 'fr_FR', 'fra', 'fr');

    // Convertir la date du format Ymd
    $datetime = DateTime::createFromFormat('Ymd', $date);
    if ($datetime) {
        // Utiliser strftime pour formater la date avec les accents
        return utf8_encode(strftime($format, $datetime->getTimestamp()));
    }

    return $date; // Si la conversion échoue, retourne la date brute
}
?>

<section class="exposition-now">
    <?php if ($exposition_now->have_posts()) : ?>
        <?php while ($exposition_now->have_posts()) : $exposition_now->the_post(); ?>
            <?php
            // Déterminer le titre en fonction de la date
            $start_date = get_field('exposition_start_date');
            $end_date = get_field('exposition_end_date');
            $image = get_field('exposition_image1');
            $title = ($start_date <= $today && $end_date >= $today) ? "Exposition en cours" : "Exposition à venir";

            if ($image) :
                $image_url = is_array($image) ? $image['url'] : $image;
                $image_id = is_array($image) ? $image['ID'] : null; // Récupérer l'ID de l'image
                $exposition_name = get_field('exposition_name');
                $alt_text = get_acf_image_alt($image_id, 'exposition_image1'); // Utilisation de la fonction
                $exposition_id = sanitize_exposition_name($exposition_name);
            ?>
            <h2><?php echo $title; ?></h2>
            <div class="exposition-now__item">
                <div class="exposition-now__item-text">
                    <h3><?php the_field('exposition_name'); ?> - <?php the_field('exposition_artist_name'); ?></h3>
                    <div class="exposition-now__item-infos">
                        <div class="exposition-now__item-infos-date">
                            <i class="fa-regular fa-calendar"></i>
                            <p>
                                Du <span><?php echo format_date($start_date); ?></span>
                                au <span><?php echo format_date($end_date); ?></span>
                            </p>
                        </div>
                        <div class="exposition-now__item-infos-place">
                            <i class="fa-solid fa-location-dot"></i>
                            <p><?php the_field('exposition_adress'); ?></p>
                        </div>
                    </div>
                    <div class="exposition-now__item-resume">
                        <p><?php the_field('exposition_resume'); ?></p>
                    </div>
                    <a class="btn-open-modal" data-dialog="#exposition-modal-<?php echo $exposition_id; ?>" href="#">En savoir plus</a>
                </div>
                <div class="exposition-now__item-image">
                    <img 
                        src="<?php echo esc_url($image_url); ?>" 
                        alt="<?php echo esc_attr($alt_text); ?>" 
                        data-dialog="#exposition-modal-<?php echo $exposition_id; ?>"
                    >
                </div>
            </div>

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
                                <p>
                                    Du <span><?php echo format_date($start_date); ?></span>
                                    au <span><?php echo format_date($end_date); ?></span>
                                </p>
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
                                            $image_id = is_array($image) ? $image['ID'] : null; // Récupérer l'ID de l'image
                                            $alt_text = get_acf_image_alt($image_id, 'exposition_image' . $i); // Utilisation de la fonction
                                    ?>
                                        <div class="slider__image">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
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
            <?php endif; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Aucune exposition à venir ou en cours pour le moment. Revenez bientôt pour découvrir nos nouvelles expositions !</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</section>

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
            if ($past_expositions->have_posts()) :
                while ($past_expositions->have_posts()) : $past_expositions->the_post();
                    $image = get_field('exposition_image1');
                    $start_date = get_field('exposition_start_date');
                    $end_date = get_field('exposition_end_date');
                    
                    if ($image) :
                        $image_url = is_array($image) ? $image['url'] : $image;
                        $image_id = is_array($image) ? $image['ID'] : null; // Récupérer l'ID de l'image
                        $alt_text = get_acf_image_alt($image_id, 'exposition_image1'); // Utilisation de la fonction
                        $exposition_name = get_field('exposition_name');
                        $exposition_id = sanitize_exposition_name($exposition_name);
            ?>
                <!-- Slide pour chaque exposition -->
                <div class="slider__item">
                    <div class="slider__image">
                        <img 
                            src="<?php echo esc_url($image_url); ?>" 
                            alt="<?php echo esc_attr($alt_text); ?>"
                            data-dialog="#exposition-modal-<?php echo $exposition_id; ?>"
                        >
                    </div>
                    <div class="slider__infos">
                        <h3><?php the_field('exposition_name'); ?> - <?php the_field('exposition_artist_name'); ?></h3>
                        <div class='exposition__infos-acces'>
                            <div class="exposition__infos-date">
                                <i class="fa-regular fa-calendar"></i>
                                <p>
                                    Du <span><?php echo format_date($start_date); ?></span>
                                    au <span><?php echo format_date($end_date); ?></span>
                                </p>
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
                                <p>
                                    Du <span><?php echo format_date($start_date); ?></span>
                                    au <span><?php echo format_date($end_date); ?></span>
                                </p>
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
                                            $image_id = is_array($image) ? $image['ID'] : null; // Récupérer l'ID de l'image
                                            $alt_text = get_acf_image_alt($image_id, 'exposition_image' . $i); // Utilisation de la fonction
                                    ?>
                                        <div class="slider__image">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
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
