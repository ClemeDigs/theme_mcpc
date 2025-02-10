<?php
$volunteer_sections = [
    get_field('volunteer_sections_1'),
    get_field('volunteer_sections_2'),
    get_field('volunteer_sections_3'),
    get_field('volunteer_sections_4'),
];

$volunteer_sections = array_filter($volunteer_sections, function ($section) {
    return !empty($section) && is_array($section) && (
        !empty($section['volunteer_section_title']) ||
        !empty($section['volunteer_section_subtitle']) ||
        !empty($section['volunteer_section_paragraph'])
    );
});

$volunteer_section_link = get_field('volunteer_section_link');
$cta_choix_du_bonhome = get_field('volunteer_choix_du_bonhome');

if (!empty($volunteer_sections)) :
?>
    <section class="volunteerSection__container" id="volunteer">
        <div class="volunteer__bonhomme">
            <?php afficher_bonhomme('volunteer_choix_du_bonhome'); ?>
        </div>
        <?php foreach ($volunteer_sections as $section) : ?>
            <div class="volunteer__section">
                <?php if (!empty($section['volunteer_section_title'])) : ?>
                    <h2 class="volunteer__section-title"><?php echo esc_html($section['volunteer_section_title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($section['volunteer_section_subtitle'])) : ?>
                    <span class="volunteer__section-subtitle"><?php echo esc_html($section['volunteer_section_subtitle']); ?></span>
                <?php endif; ?>
                <?php if (!empty($section['volunteer_section_paragraph'])) : ?>
                    <p class="volunteer__section-paragraph"><?php echo esc_html($section['volunteer_section_paragraph']); ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <?php if (!empty($volunteer_section_link)) : ?>
            <div class="volunteer__section-link">
                <a href="<?php echo esc_url($volunteer_section_link); ?>" class="btn btn-primary">Devenir bénévole</a>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>