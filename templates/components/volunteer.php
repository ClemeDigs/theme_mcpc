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
$volunteer_section_link_2 = get_field('volunteer_section_link_2');
$cta_choix_du_bonhome = get_field('volunteer_choix_du_bonhome');

if (!empty($volunteer_sections)) :
?><div>
        <div class="block__bonhomme block__bonhomme--volunteer
    <?php
    $position_class = ajouter_position_bonhomme('block_position_du_bonhomme');
    echo $position_class ? ' ' . $position_class : '';
    ?>">
            <?php afficher_bonhomme('volunteer_choix_du_bonhome'); ?>
        </div>

        <section class="volunteerSection__container" id="volunteer">

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
        </section>
        <div class="volunteer__section-links">
            <button class="volunteer__section-link"> <?php afficher_bouton_benevoltat_general($volunteer_section_link); ?></button>
            <button class="volunteer__section-link"> <?php afficher_bouton_benevoltat_residences($volunteer_section_link_2); ?></button>

        </div>
    </div>
<?php endif; ?>