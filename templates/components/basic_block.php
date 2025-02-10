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
        !empty($block['block_link'])
    );
});

if (!empty($basic_block_sections)) :
?>

<section class="block__container">
    <div class="block__bonhomme">
        <?php afficher_bonhomme('block_choix_du_bonhomme'); ?>
    </div>
    <div class="block__sections <?php 
    $bg_class = ajouter_classe_background_acf('block_background');
    echo $bg_class ? ' ' . $bg_class : ''; 
?>">
        <?php foreach ($basic_block_sections as $block) : ?>
            <div class="block__section">
                <?php 
                $image_position = isset($block['image_position']) ? intval($block['image_position']) : null; // Convertir en entier
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
                    <?php if (!empty($block['block_link'])) : ?>
                        <div class="block__link">
                            <?php afficher_bouton_block($block['block_link']); ?>
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