<section class="hero">
    <div class="hero__image">
        <?php
        $image = get_field('hero_image');
        if ($image) :
            $image_url = $image['url'];
            $image_alt = $image['alt'];
        ?>
        <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt;?>">
        <?php endif; ?>
        <div class="hero__content">
            <h1 class="hero__title--white"><?php the_field('hero_title_1'); ?></h1>
            <h1 class="hero__title--black"><?php the_field('hero_title_2'); ?></h1>
        </div>
    </div>
</section>