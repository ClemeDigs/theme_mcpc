<?php
$rapports = [
    get_field('rapports_1'),
    get_field('rapports_2'),
    get_field('rapports_3'),
    get_field('rapports_4'),
    get_field('rapports_5')
];

$rapports = array_filter($rapports, function ($rapport) {
    return !empty($rapport) && is_array($rapport) && !empty($rapport['titre_ag']);
});

if (!empty($rapports)) :
?>

    <div class="assemblee__bonhomme-container">
        <div class="assemblee__bonhomme">
            <?php afficher_bonhomme('assemblee_choix_du_bonhomme'); ?>
        </div>
    </div>
    <div class="accordeon__container">
        <div class="accordeon__header">
            <h2 class="accordeon__title">
                Rapports des Assemblées Générales Annuelles
            </h2>
            <i class="fa-solid fa-chevron-down accordeon__icon"></i>
        </div>
        <div class="accordeon__content">
            <?php foreach ($rapports as $rapport) : ?>
                <div class="rapport">

                    <?php if (!empty($rapport['image'])) : ?>
                        <?php
                        $image_url = wp_get_attachment_image_url($rapport['image'], 'large');
                        ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($rapport['titre_ag']); ?>" class="rapport__image">
                    <?php endif; ?>
                    <div class="rapport__content">
                        <h3><?php echo esc_html($rapport['titre_ag']); ?></h3>
                        <p><?php echo esc_html($rapport['description']); ?></p>

                        <?php if (!empty($rapport['statistiques'])) : ?>

                            <div class="rapport__statistiques">
                                <?php

                                $statistique_images = [
                                    1 => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_hiphop2.svg',
                                    2 => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_guitar2.svg',
                                    3 => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_balet2.svg'
                                ];

                                for ($j = 1; $j <= 3; $j++) :
                                    $statistique = $rapport["statistiques"]["statistiques_$j"] ?? null;
                                    if (!empty($statistique) && !empty($statistique["titre_statistique_$j"])) :
                                ?>
                                        <div class="rapport__stat">
                                            <img src="<?php echo esc_url($statistique_images[$j]); ?>"
                                                alt="<?php echo esc_attr($statistique["titre_statistique_$j"]); ?>">
                                            <p><?php echo esc_html($statistique["titre_statistique_$j"]); ?></p>
                                            <h3><?php echo esc_html($statistique["nombre_statistique_$j"]); ?></h3>
                                        </div>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>

                        <?php endif; ?>

                        <a href="<?php echo esc_url($rapport["lien_document"]); ?>" class="btn" target="_blank" aria-label="Télécharger le document">
                            <i class="fa-solid fa-arrow-down" aria-hidden="true"></i> Télécharger le document
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>