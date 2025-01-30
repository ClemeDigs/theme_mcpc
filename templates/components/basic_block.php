<?php
// C'est un composant qui récupère l'image
function bloc_section_image($image) {
?>
    <div class="block__section-image">
        <?php if ($image) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
        <?php endif; ?>
    </div>
<?php
}
?>

<?php

$basic_block_sections = [
    get_field('basic-block_section_1'),
    get_field('basic-block_section_2')
];

$choix_bonhomme = get_field('block_choix_du_bonhomme');

// Filtrer les CTA vides (éviter d'afficher ceux qui ne sont pas remplis)
$basic_block_sections = array_filter($basic_block_sections, function ($block) {
    return !empty($block) && is_array($block) && (
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
        <?php afficher_bonhomme($choix_bonhomme); ?>
    </div>
    <div>
        <?php foreach ($basic_block_sections as $block) : ?>
            <div class="block__section">
                <?php if ($block['image_position'] == 0) bloc_section_image($block['block_image']); ?>
                <div>
                    <div>
                        <h2><?php echo esc_html($block['block_title']); ?></h2>
                        <?php if (!empty($block['block_arrow'])) : ?>
                            <img src="<?php echo esc_url($block['block_arrow']['url']); ?>" alt="<?php echo esc_attr($block['block_arrow']['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <p><?php echo esc_html($block['block_text']); ?></p>
                </div>
                <?php if ($block['image_position'] == 1) bloc_section_image($block['block_image']); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php endif; ?>