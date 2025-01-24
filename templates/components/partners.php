<section class="partner">
    <div class="partner__slider">
        <?php
        $partner = new WP_Query([
            'post_type' => 'partner',
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
                        <a href="<?php echo esc_url($website); ?>" target="_blank">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>
        <?php
                endif;
            endwhile;
        endif;
        ?>
        <?php if ($partner->have_posts()) :
            while ($partner->have_posts()) : $partner->the_post();
                $image = get_field('partner_logo');
                $website = get_field('partner_web_site');
                if ($image) :
                    $image_url = is_array($image) ? $image['url'] : $image;
        ?>
                    <div class="partner__logo">
                        <a href="<?php echo esc_url($website); ?>" target="_blank">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>
        <?php
                endif;
            endwhile;
        endif; ?>
    </div>
</section>