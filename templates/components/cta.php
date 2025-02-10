<?php
$cta_sections = [
    get_field('cta_section_1'),
    get_field('cta_section_2'),
    get_field('cta_section_3'),
    get_field('cta_section_4'),
];

// Filtrer les CTA vides (éviter d'afficher ceux qui ne sont pas remplis)
$cta_sections = array_filter($cta_sections, function ($cta) {
    return !empty($cta) && is_array($cta) && (!empty($cta['cta_section_photo']) || !empty($cta['cta_section_title']) || !empty($cta['cta_section_description']) || !empty($cta['cta_section_button_link']));
});

if (!empty($cta_sections)) :
?>
    <section class="ctaSection__container">
        <div class="ctaSection__bonhomme">
            <?php afficher_bonhomme('cta_choix_du_bonhome'); ?>
        </div>
        <?php foreach ($cta_sections as $cta) : ?>
            <div class="cta__section">
                <?php
                $image_id = isset($cta['cta_section_photo']) ? $cta['cta_section_photo'] : null;
                $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : null;
                ?>

                <?php if (!empty($image_url)) : ?>
                    <img class="cta__section-photo" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($cta['cta_section_title']); ?>">
                <?php endif; ?>

                <div class="cta__section-content">
                    <h2 class="cta__section-content-title"><?php echo esc_html($cta['cta_section_title']); ?></h2>
                    <p class="cta__section-description corps-texte"><?php echo esc_html($cta['cta_section_description']); ?></p>
                    <?php afficher_bouton_cta($cta['cta_section_button_link']); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif; ?>