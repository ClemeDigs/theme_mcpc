<section class="radio">
    <div class="radio__part-1">
        <div class="radio__logo-1">
            <?php
            $image = get_field('logo_radio-bic_1');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt'];
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div>
        <div class="radio__text-1">
            <div class="radio__title-1">
                <h2 class="radio__title-1"><?php echo esc_html(get_field('title_radio-bic_1')); ?></h2>
                <div class="radio__little-arrow">        
                <?php
                $image = get_field('little_arrow_radio-bic');
                if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt'];
                ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                <?php endif; ?>
                </div> <!-- .radio__little-arrow -->
            </div> <!-- .radio__title-1 -->
            <p class="radio__text-1"><?php echo esc_html(get_field('text_radio-bic_1')); ?></p>
        </div> <!-- .radio__text-1 -->
    </div> <!-- .radio__part-1 -->
    <div class="radio__big-arrow">
        <?php
        // Chemin de l'image dans le dossier assets/img/illustrations/arrows
        $image_url = get_template_directory_uri() . '/assets/img/illustrations/arrows/arrow_radio_bic.svg';
        ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="Flèche Radio Bic">
    </div> <!-- .radio__big-arrow -->
    <div class="radio__part-2">

        <div class="radio__text-2">
            <div class="radio__title-2">
                <h2 class="radio__title-2"><?php echo esc_html(get_field('title_radio-bic_2')); ?></h2>
            </div> <!-- .radio__title-2 -->
            <p class="radio__text-2"><?php echo esc_html(get_field('text_radio-bic_2')); ?></p>
            <?php if (get_field('listen_online')) : ?>
                <div class="radio__link">
                    <i class="fa-brands fa-soundcloud"></i>
                    <?php afficher_bouton_block(get_field('listen_online')); ?>
                </div> <!-- .radio__link -->
            <?php endif; ?>
        </div> <!-- .radio__text-2 -->
        <div class="radio__logo-2">
            <?php
            $image = get_field('logo_radio-bic_2');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt'];
            ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
            <?php endif; ?>
        </div> <!-- .radio__logo-2 -->
    </div> <!-- .radio__part-2 -->
</section>