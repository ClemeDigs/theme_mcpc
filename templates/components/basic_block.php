<?php
// Fonction pour afficher une image dans un bloc
function bloc_section_image($image, $image_position) {
    if (!empty($image) && isset($image['url'], $image['alt'])) :
        $position_class = 'image-position-' . esc_attr($image_position);
?>
    <div class="block__section-image <?php echo $position_class; ?>">
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
    </div>
<?php
    endif;
}
?>

<?php
// Récupération des sections ACF
$basic_block_sections = [
    get_field('basic-block_section_1'),
    get_field('basic-block_section_2')
];

// Filtrer les sections vides
$basic_block_sections = array_filter($basic_block_sections, function ($block) {
    return is_array($block) && (
        !empty($block['block_image']) ||
        isset($block['image_position']) ||
        !empty($block['block_arrow']) ||
        !empty($block['block_title']) ||
        !empty($block['block_text']) ||
        !empty($block['block_link-1']) ||
        !empty($block['block_link-2'])
    );
});

if (!empty($basic_block_sections)) :
?>

<section class="block__container">
    <div class="block__bonhomme-reg <?php echo $position_class = ajouter_position_bonhomme('block_position_du_bonhomme');
    $position_class ? ' ' . $position_class : ''; ?>">
        <?php afficher_bonhomme('block_choix_du_bonhomme'); ?>
    </div>
    <div class="block__sections <?php 
    $bg_class = ajouter_classe_background_acf('block_background');
    echo $bg_class ? ' ' . $bg_class : ''; 
?>">
        <?php foreach ($basic_block_sections as $block) : ?>
            <div class="block__section">
                <?php 
                $image_position = isset($block['image_position']) ? intval($block['image_position']) : null;
                if ($image_position === 1) {
                    bloc_section_image($block['block_image'], $image_position);
                }
                ?>
                <div class="block__content">
                    <div class="block__header">
                        <?php if (!empty($block['block_title'])) : ?>
                            <h2><?php echo esc_html($block['block_title']); ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($block['block_arrow']) && $block['block_arrow'] !== 'aucun') : ?>
                            <div class="block__arrow">
                                <?php afficher_arrow(['block_arrow' => $block['block_arrow']]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($block['block_text'])) : ?>
                        <div class="block__text">
                            <p>
                                <?php echo wp_kses($block['block_text'], array('br' => array())); ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php 
                    // Vérifiez les champs block_link-1 et block_link-2
                    if (isset($block['block_link-1'])) 
                    if (isset($block['block_link-2'])) 
                    ?>
                    <?php if (!empty($block['block_link-1'])) : ?>
                        <div class="block__link-1">
                            <?php affichier_bouton_block($block['block_link-1']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($block['block_link-2'])) : ?>
                        <div class="block__link-2">
                            <?php afficher_bouton_block($block['block_link-2']); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php 
                if ($image_position === 0) {
                    bloc_section_image($block['block_image'], $image_position);
                }
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php endif; ?>