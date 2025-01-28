<section>
    <div>
        <?php
        $ca_member = new WP_Query([            
        'post_type' => 'ca_member',
        'posts_per_page' => -1,
    ]);

        if ($ca_member->have_posts()) :
            while ($ca_member->have_posts()) : $ca_member->the_post();
            ?>

            <section class="ca-member">
                <div class="ca-member__image">
                <?php 
                $image = get_field('member_photo'); // Récupère la valeur du champ ACF
                if ($image) :
                    // Vérifie si c'est un tableau (au cas où le format de retour est un tableau)
                    $image_url = is_array($image) ? $image['url'] : $image;
                ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="ca-member__content">
                        <p><?php the_field('member_name');?></p>
                        <p><?php the_field('member_role');?></p>
                    </div>
                </div>
            </section>

        <?php
        endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>