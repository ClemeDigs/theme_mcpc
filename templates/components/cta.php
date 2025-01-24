<?php
$cta_section = new WP_Query([
    'post_type' => 'cta_section',
    'posts_per_page' => -1,
]);

if ($cta_section->have_posts()) :
    while ($cta_section->have_posts()) : $cta_section->the_post();
?>

        <section>
            <div class="cta__section">
                <?php
                $image = get_field('cta_section_photo');
                if ($image) :
                    $image_url = is_array($image) ? $image['url'] : $image;
                ?>
                    <img class="cta__section-photo" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <div class="cta__section-content">
                    <h2 class="cta__section-content-title"><?php the_field('cta_section_title'); ?></h2>
                    <p class="cta__section-content-description corps-texte"><?php the_field('cta_section_description'); ?></p>
                    <button class="cta__section-content-button"><?php the_field('cta_section_button'); ?></button>
                </div>
            </div>
        </section>

<?php
    endwhile;
endif;
wp_reset_postdata();
?>