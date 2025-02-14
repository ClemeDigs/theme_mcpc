<div class="block-without-img__wrapper">
<div class="block-without-img__bonhomme-haut <?php echo $position_class = ajouter_position_bonhomme('block_position_du_bonhomme');
    $position_class ? ' ' . $position_class : ''; ?>">
    <?php afficher_bonhomme('block-without-img_choix_du_bonhomme_haut'); ?>
    </div>
    <section class="block-without-img__container<?php 
    $bg_class = ajouter_classe_background_acf('block-without-img_background');
    echo $bg_class ? ' ' . esc_attr($bg_class) : ''; 
    ?>">
        <div class="block-without-img__section">
            <div class="block-without-img__content">
                <div class="block-without-img__header">
                    <?php if (get_field('block-without-img_title')) : ?>
                        <h2><?php echo esc_html(get_field('block-without-img_title')); ?></h2>
                    <?php endif; ?>
                </div>
                <?php if (get_field('block-without-img_text')) : ?>
                    <p><?php echo esc_html(get_field('block-without-img_text')); ?></p>
                <?php endif; ?>
                <div class="block-without-img__links">
                <?php if (get_field('block-without-img_link-1')) : ?>
                    <div class="block-without-img__link-1">
                        <?php afficher_bouton_block(get_field('block-without-img_link-1')); ?>
                    </div>
                <?php endif; ?>
                <?php if (get_field('block-without-img_link-2')) : ?>
                    <div class="block-without-img__link-2">
                        <?php afficher_bouton_block(get_field('block-without-img_link-2')); ?>
                    </div>
                <?php endif; ?>
                <?php if (get_field('block-without-img_link-3')) : ?>
                    <div class="block-without-img__link-3">
                        <?php afficher_bouton_block(get_field('block-without-img_link-3')); ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="block-without-img__bonhomme-bas">
            <?php afficher_bonhomme('block-without-img_choix_du_bonhomme_int'); ?>
        </div>

</section>
</div>


