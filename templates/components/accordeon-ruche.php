<!-- <?php
        $ruche = new WP_Query([
            'post_type' => 'ruche',
            'posts_per_page' => -1,
        ]);

        if ($ruche->have_posts()) :
        ?>
    <?php while ($ruche->have_posts()) : $ruche->the_post(); ?>
        <?php
                $ruche_color = get_field('activity_color');
        ?>
        <div class="activities__container" style="--activity-color: <?php echo esc_attr(ruche_color); ?>;">
            <div class="accordeon__header" role="button" aria-expanded="false" aria-controls="content-<?php the_ID(); ?>">
                <h3 class="accordeon__title">
                    <?php the_field('titre_de_laccordeon'); ?>
                </h3>
                <i class="fa-solid fa-chevron-down accordeon__icon" aria-hidden="true"></i>
            </div>
            <div class="accordeon__content activities__content" id="content-<?php the_ID(); ?>" role="region" aria-labelledby="header-<?php the_ID(); ?>">

                <div class="activity">
                    <?php
                    $ruche_opening_date = get_field('activity_opening_date');
                    $ruche_ending_date = get_field('activity_ending_date');
                    $ruche_day = get_field('activity_day');
                    $ruche_time_window = get_field('activity_time_window');
                    $ruche_address = get_field('activity_address');
                    $ruche_target_audience = get_field('activity_target_audience');
                    $ruche_description = get_field('activity_description');
                    $ruche_image_1 = get_field('activity_image_1');
                    $ruche_image_2 = get_field('activity_image_2');
                    $ruche_image_3 = get_field('activity_image_3');
                    $ruche_image_4 = get_field('activity_image_4');
                    $ruche_image_5 = get_field('activity_image_5');
                    $ruche_image_6 = get_field('activity_image_6');
                    $ruche_button = get_field('activity_button');
                    ?>
                    <div class="activity__title">
                        <h3><?php the_field('activity_title1'); ?></h3>
                        <h3><?php the_field('activity_title2'); ?></h3>
                        <div class="activity__stars">
                            <?php echo file_get_contents(get_template_directory() . '/assets/img/illustrations/arrows/stars.svg'); ?>
                        </div>
                    </div>
                    <div class="activity__details">
                        <div class="activity__detail">
                            <i class="fa-regular fa-calendar activity__icon" aria-hidden="true"></i>
                            <div>
                                <span>
                                    <?php if ($ruche_opening_date) : ?>
                                        <?php echo esc_html($ruche_opening_date); ?><br>
                                    <?php endif; ?>
                                </span>
                                <span>
                                    <?php if ($ruche_ending_date) : ?>
                                        <?php echo esc_html($ruche_ending_date); ?><br>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <div class="activity__detail">
                            <i class="fa-regular fa-clock activity__icon" aria-hidden="true"></i>
                            <div>
                                <span>
                                    <?php if ($ruche_day) : ?>
                                        <?php echo esc_html($ruche_day); ?><br>
                                    <?php endif; ?>
                                </span>
                                <span>
                                    <?php if ($ruche_time_window) : ?>
                                        <?php echo esc_html($activity_time_window); ?><br>
                                    <?php endif; ?> </span>
                            </div>
                        </div>
                        <div class="activity__detail">
                            <i class="fa-solid fa-location-dot activity__icon" aria-hidden="true"></i>
                            <?php if ($ruche_address) : ?>
                                <?php echo esc_html($ruche_address); ?><br>
                            <?php endif; ?>
                        </div>
                        <div class="activity__detail">
                            <i class="fa-regular fa-user activity__icon" aria-hidden="true"></i>
                            <?php if ($ruche_target_audience) : ?>
                                <?php echo esc_html($ruche_target_audience); ?><br>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="activity__description">
                        <h4>Resumé</h4>
                        <?php if ($ruche_description) : ?>
                            <p><?php echo esc_html($ruche_description); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="slider" role="region" aria-label="Activity images slider">
                        <button class="slider__btn slider__btn--previous" aria-label="Slide précédent">
                            <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                        </button>
                        <div class="slider__images activity__images">
                            <?php
                            $images = [];
                            for ($i = 1; $i <= 6; $i++) {
                                $image = get_field('activity_image_' . $i);
                                if ($image) {
                                    $images[] = [
                                        'url' => is_array($image) ? $image['url'] : $image,
                                    ];
                                }
                            }
                            if (!empty($images)) :
                                foreach ($images as $image) :
                            ?>
                                    <div class="slider__image activity__image">
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <button class="slider__btn slider__btn--next" aria-label="Slide suivant">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                        </button>
                    </div>

                    <?php if ($ruche_button) : ?>
                        <div class="activity__button">
                            <a href="<?php echo esc_url($ruche_button['url']); ?>" class="btn" target="<?php echo esc_attr($ruche_button['target']); ?>">
                                <?php echo esc_html($ruche_button['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php
        endif;
        wp_reset_postdata();
?> -->