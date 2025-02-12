<?php
$args = [
    'post_type'      => 'testimonials', 
    'posts_per_page' => -1,
    'post_status'    => 'publish'
];

$testimonials_query = new WP_Query($args);

if ($testimonials_query->have_posts()) :
?>

<section class="testimonial">
    <h2>Témoignages</h2>
    <div class="slider">
        <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <div class="slider__images">
            <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post(); ?>
                <div class="slider__item">
                    <?php
                    $comment_name  = get_field('comment_name');
                    $comment_text  = get_field('comment_text');
                    $image         = get_field('comment_image'); 
                    $image_url     = !empty($image) ? esc_url($image['url']) : null; 
                    ?>

                    <div class="testimonial__comment">
                        <div class="testimonial__comment-image">
                            <?php if (!empty($image_url)) : ?>
                                <img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr($comment_name ?? ''); ?>">
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($comment_name)) : ?>
                            <h3 class="testimonial__comment-name"><?php echo esc_html($comment_name); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($comment_text)) : ?>
                            <p class="testimonial__comment-text"><?php echo esc_html($comment_text); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <button class="slider__btn slider__btn--next" aria-label="Slide suivant">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
    
    <div class="slider__progress">
        <div class="slider__progress-bar"></div>
    </div>

</section>

<?php
wp_reset_postdata();
endif;
?>
