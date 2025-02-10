<section class="hero">
    <div class="hero__image">
        <?php
        $image = get_field('hero_image');
        if ($image) :
            $image_url = $image['url'];
            $image_id = $image['ID']; 
            $image_alt = get_acf_image_alt($image_id, 'hero_image');
        ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">

        <?php endif; ?>
        <div class="hero__content">
            <h1 class="hero__title--white"><?php the_field('hero_title_1'); ?></h1>
            <h1 class="hero__title--black"><?php the_field('hero_title_2'); ?></h1>
        </div>
    </div>
</section>
