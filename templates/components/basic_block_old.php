<section class="block__container">
    <div class="block__bonhomme-haut">
        <?php afficher_bonhomme('choix_du_bonhomme_haut'); ?>
    </div>
    <div class="block__sections">
    <?php 
    $block_sections = [
        get_field('basic-block_section_1'),
        get_field('basic-block_section_2')
    ];

    foreach ($block_sections as $section) :
        if ($section) :
            // Affichez les sous-champs ici
            $section_image = isset($section['block_image']) ? $section['block_image'] : null;
            $block_arrow = isset($section['block_arrow']) ? $section['block_arrow'] : null;
            $block_title = isset($section['block_title']) ? $section['block_title'] : null;
            $block_text = isset($section['block_text']) ? $section['block_text'] : null;
            ?>
            <div class="block_section">
                <?php if ($section_image) :
                    $image_url = $section_image['url'];
                    $image_alt = $section_image['alt'];
                ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
                
                <?php if ($block_arrow) : ?>
                    <div class="block_arrow">
                        <img src="<?php echo esc_url($block_arrow['url']); ?>" alt="<?php echo esc_attr($block_arrow['alt']); ?>">
                    </div>
                <?php endif; ?>
                
                <?php if ($block_title) : ?>
                    <h2 class="block_title"><?php echo esc_html($block_title); ?></h2>
                <?php endif; ?>
                
                <?php if ($block_text) : ?>
                    <p class="block_text"><?php echo esc_html($block_text); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
    <div class="block__text-container">
    <?php 
    $block_title = get_field('block_title');
    $block_text = get_field('block_text');
    $block_arrow = get_field('block_arrow');
    if ($block_title) : ?>
        <h2><?php echo esc_html($block_title); ?></h2>
    <?php endif; ?>
    <?php if ($block_text) : ?>
        <p><?php echo esc_html($block_text); ?></p>
    <?php endif; ?>
    <?php if ($block_arrow) : ?>
        <div class="block_arrow">
            <img src="<?php echo esc_url($block_arrow['url']); ?>" alt="<?php echo esc_attr($block_arrow['alt']); ?>">
        </div>
    <?php endif; ?>
    <?php 
    $cta = get_field('cta_section');
    if ($cta) {
        afficher_bouton_cta($cta['cta_section_button_link'], $cta['cta_section_button_label']); 
    }
    ?>
</div>
</section>