<?php
$rapports_annuels = new WP_Query([
    'post_type' => 'rapports-annuels',
    'posts_per_page' => -1,
]);

if ($rapports_annuels->have_posts()) :
?>

    <div class="rapports-annuel__container" role="region" aria-labelledby="rapports-annuels-title">
        <div class="accordeon__header" role="button" aria-expanded="false" aria-controls="rapports-annuels-content">
            <h3 class="accordeon__title" id="rapports-annuels-title">
                Rapports Annuels
            </h3>
            <i class="fa-solid fa-chevron-down accordeon__icon" aria-hidden="true"></i>
        </div>
        <div class="accordeon__content rapports-annuel__content" id="rapports-annuels-content">
            <?php while ($rapports_annuels->have_posts()) : $rapports_annuels->the_post(); ?>
                <div class="rapport-annuel">
                    <?php
                    $titre_ra = get_field('titre_ra');
                    $lien_document_ra = get_field('lien_document_ra');
                    ?>
                    <?php if ($titre_ra) : ?>
                        <h3><?php echo esc_html($titre_ra); ?></h3>
                    <?php endif; ?>
                    <?php if ($lien_document_ra) : ?>
                        <a href="<?php echo esc_url($lien_document_ra); ?>" class="btn" target="_blank" aria-label="Télécharger le document">
                            <i class="fa-solid fa-arrow-down" aria-hidden="true"></i> Télécharger le document
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php
endif;
wp_reset_postdata();
?>