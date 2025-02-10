<?php
$titre_de_laccordeon = get_field('titre_de_laccordeon');
$section_title = get_field('section_title');
$periode_inscription = get_field('periode_inscription');
$termes_and_conditions = get_field('termes_and_conditions');
?>

<div class="activities__container">
    <div class="accordeon__header" role="button" aria-expanded="false" aria-controls="content-termes">
        <h3 class="accordeon__title">
            <?php echo esc_html($titre_de_laccordeon); ?>
        </h3>
        <i class="fa-solid fa-chevron-down accordeon__icon" aria-hidden="true"></i>
    </div>
    <div class="accordeon__content activities__content" id="content-termes" role="region" aria-labelledby="header-termes">
        <div class="activity">
            <div class="activity__title">
                <h3><?php echo esc_html($section_title); ?></h3>
            </div>
            <div class="activity__details">
                <div class="activity__detail">
                    <i class="fa-regular fa-calendar activity__icon" aria-hidden="true"></i>
                    <div>
                        <span>
                            <?php echo esc_html($periode_inscription); ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="activity__description">
                <p><?php echo wp_kses_post($termes_and_conditions); ?></p>
            </div>
        </div>
    </div>
</div>