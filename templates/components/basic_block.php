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
$section_1 = get_field('basic-block_section_1');
$section_2 = get_field('basic-block_section_2');

// Vérifier si le second bloc contient une image ou du texte
$section_2_valid = is_array($section_2) && (
    !empty($section_2['block_image']) ||
    !empty($section_2['block_text'])
);

// Construire le tableau des sections valides
$basic_block_sections = array_filter([$section_1, $section_2_valid ? $section_2 : null]);

if (!empty($basic_block_sections)) :
?>

<section class="block__container">
    <div class="block__bonhomme-reg <?php echo esc_attr(ajouter_position_bonhomme('block_position_du_bonhomme')); ?>">
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
                    
                    <?php if (!empty($block['block_link-1'])) : ?>
                        <div class="block__link-1">
                            <?php afficher_bouton_block($block['block_link-1']); ?>
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
