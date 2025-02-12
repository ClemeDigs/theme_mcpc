<section class="subtitle__container <?php echo afficher_largeur_sous_titre('width_choice'); ?>">
    <div class="subtitle__content">
        <div class="subtitle__title" style="background-image: url('<?php echo get_hinge_image_url('hinge_choice'); ?>');">
            <h2><?php the_field('subtitle_1'); ?></h2>
            <h2><?php the_field('subtitle_2'); ?></h2>
        </div>
        <div>
            <p class="subtitle__text"><?php the_field('subtitle_text'); ?></p>
        </div>
        <?php if (get_field('learn_more')) : ?>
            <div class="subtitle__learn-more">
                <?php afficher_bouton_en_savoir_plus('learn_more'); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="subtitle__hand">
        <?php afficher_hand('hand_choice'); ?>
    </div>
</section>