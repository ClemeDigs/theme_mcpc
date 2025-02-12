<section class="partner">
    <div class="partner__slider">
        <?php
        $partner = new WP_Query([
            'post_type' => 'partners',
            'posts_per_page' => -1,
        ]);

        if ($partner->have_posts()) :
            while ($partner->have_posts()) : $partner->the_post();
                $image = get_field('partner_logo');
                $website = get_field('partner_web_site');
                if ($image) :
                    $image_url = is_array($image) ? $image['url'] : $image;
        ?>
                    <div class="partner__logo">
                        <a href="<?php echo esc_url($website); ?>" target="_blank" aria-label="Visit <?php the_title(); ?> website">
                            <img src="<?php echo esc_url($image_url); ?>" alt="Logo of <?php the_title(); ?>">
                        </a>
                    </div>
        <?php
                endif;
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
        <?php if ($partner->have_posts()) :
            while ($partner->have_posts()) : $partner->the_post();
                $image = get_field('partner_logo');
                $website = get_field('partner_web_site');
                if ($image) :
                    $image_url = is_array($image) ? $image['url'] : $image;
        ?>
                    <div class="partner__logo">
                        <a href="<?php echo esc_url($website); ?>" target="_blank" aria-label="Visit <?php the_title(); ?> website">
                            <img src="<?php echo esc_url($image_url); ?>" alt="Logo of <?php the_title(); ?>">
                        </a>
                    </div>
        <?php
                endif;
            endwhile;
        endif;
        wp_reset_postdata(); ?>

    </div>
</section>