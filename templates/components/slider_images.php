<section class="slider">
        <?php afficher_bonhomme('slider_choix_du_bonhomme'); ?>
        <div>
            <h3><?php the_field('slider_title');?></h3>
            <p><?php the_field('slider_text');?></p>
        </div>
        <div class="slider__images">
        <?php 
        $image1 = get_field('slider_image_1'); // Récupère la valeur du champ ACF
        if ($image1) :
            // Vérifie si c'est un tableau (au cas où le format de retour est un tableau)
            $image1_url = is_array($image1) ? $image1['url'] : $image1;
        ?>
            <img src="<?php echo esc_url($image1_url); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>

        <?php 
        $image2 = get_field('slider_image_2'); // Récupère la valeur du champ ACF
        if ($image2) :
            // Vérifie si c'est un tableau (au cas où le format de retour est un tableau)
            $image2_url = is_array($image2) ? $image2['url'] : $image2;
        ?>
            <img src="<?php echo esc_url($image2_url); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>3
        <?php 
        $image3 = get_field('slider_image_3'); // Récupère la valeur du champ ACF
        if ($image3) :
            // Vérifie si c'est un tableau (au cas où le format de retour est un tableau)
            $image3_url = is_array($image3) ? $image3['url'] : $image3;
        ?>
            <img src="<?php echo esc_url($image3_url); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        </div>
    </section>