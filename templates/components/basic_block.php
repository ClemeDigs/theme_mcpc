<?php
// Fonction pour afficher une image dans un bloc
function bloc_section_image($image) {
    if (!empty($image) && isset($image['url'], $image['alt'])) :
?>
    <div class="block__section-image">
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
        !empty($block['image_position']) ||
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
    <div class="block__sections">
        <?php foreach ($basic_block_sections as $block) : ?>
            <div class="block__section">
                <?php if (isset($block['image_position']) && $block['image_position'] == 1) bloc_section_image($block['block_image']); ?>
                <div class="block__content">
                    <div class="block__header">
                        <?php if (!empty($block['block_title'])) : ?>
                            <h2><?php echo esc_html($block['block_title']); ?></h2>
                        <?php endif; ?>
                        <?php 
                        // Utilisation de la nouvelle fonction afficher_arrow
                        if (!empty($block['block_arrow'])) :
                            afficher_arrow($block['block_arrow']);
                        endif;
                        ?>
                    </div>
                    <?php if (!empty($block['block_text'])) : ?>
                        <p><?php echo esc_html($block['block_text']); ?></p>
                    <?php endif; ?>
                </div>
                <?php if (isset($block['image_position']) && $block['image_position'] == 0) bloc_section_image($block['block_image']); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php endif; ?>