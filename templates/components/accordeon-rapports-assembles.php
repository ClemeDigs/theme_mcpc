<?php
$documents = new WP_Query([
    'post_type' => 'documents',
    'posts_per_page' => -1,
]);

if ($documents->have_posts()) :
?>
    <div class="accordeon__container">
        <div class="assemblee__bonhomme-container">
            <div class="assemblee__bonhomme">
                <?php afficher_bonhomme('assemblee_choix_du_bonhomme'); ?>
            </div>
        </div>
        <div class="accordeon__header">
            <h3 class="accordeon__title">
                Rapports des Assemblées Générales Annuelles
            </h3>
            <i class="fa-solid fa-chevron-down accordeon__icon"></i>
        </div>
        <div class="accordeon__content">
            <?php while ($documents->have_posts()) : $documents->the_post(); ?>
                <div class="rapport">
                    <?php
                    $image = get_field('image');
                    if (!empty($image)) :
                        $image_url = wp_get_attachment_image_url($image, 'large');
                    ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_field('titre_ag')); ?>" class="rapport__image">
                    <?php endif; ?>

                    <div class="rapport__content">
                        <?php
                        $titre_ag = get_field('titre_ag');
                        $description = get_field('description');
                        $statistiques = get_field('statistiques');
                        $lien_document = get_field('lien_document');
                        ?>
                        <?php if ($titre_ag) : ?>
                            <h3><?php echo esc_html($titre_ag); ?></h3>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>

                        <?php if (!empty($statistiques)) : ?>
                            <div class="rapport__statistiques">
                                <?php
                                $statistique_images = [
                                    1 => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_hiphop2.svg',
                                    2 => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_guitar2.svg',
                                    3 => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_balet2.svg'
                                ];

                                for ($j = 1; $j <= 3; $j++) :
                                    $statistique = $statistiques["statistiques_$j"] ?? null;
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

                        <?php if ($lien_document) : ?>
                            <a href="<?php echo esc_url($lien_document); ?>" class="btn" target="_blank" aria-label="Télécharger le document">
                                <i class="fa-solid fa-arrow-down" aria-hidden="true"></i> Télécharger le document
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
endif;
wp_reset_postdata();
?>