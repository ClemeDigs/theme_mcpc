<?php
$rapports_annuels = [
    get_field('rapport_annuel_1'),
    get_field('rapport_annuel_2'),
    get_field('rapport_annuel_3'),
    get_field('rapport_annuel_4'),
    get_field('rapport_annuel_5')
];

$rapports_annuels = array_filter($rapports_annuels, function ($rapport) {
    return !empty($rapport) && is_array($rapport) && !empty($rapport['titre_ra']);
});

if (!empty($rapports_annuels)) :
?>

    <div class="rapports-annuel__container">
        <div class="accordeon__header">
            <h2 class="accordeon__title">
                Rapports Annuels
            </h2>
            <i class="fa-solid fa-chevron-down accordeon__icon"></i>
        </div>
        <div class="accordeon__content">
            <?php foreach ($rapports_annuels as $rapport) : ?>
                <div class="rapport">

                    <h3><?php echo esc_html($rapport['titre_ra']); ?></h3>
                    <a href="<?php echo esc_url($rapport['lien_document_ra']); ?>" class="btn" target="_blank" aria-label="Télécharger le document">
                        <i class="fa-solid fa-arrow-down" aria-hidden="true"></i> Télécharger le document
                    </a>

                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>