<?php
$modal_title = get_field('modal_title');
$modal_content = get_field('modal_content');
$modal_button_link = get_field('modal_button_link');

if ($modal_title && $modal_content): ?>
    <div id="custom-modal" class="modal" role="dialog" aria-labelledby="modal-title" aria-describedby="modal-content" tabindex="-1">
        <div class="modal-content">
            <button class="close-modal" aria-label="Fermer le modal">&times;</button>

            <div class="modal-bonhomme">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/bonhomme/bonhomme_talking2.svg"
                    alt="Illustration d'un personnage parlant">
            </div>

            <h2 id="modal-title"><?php echo esc_html($modal_title); ?></h2>
            <p id="modal-content"><?php echo esc_html($modal_content); ?></p>

            <?php if ($modal_button_link): ?>
                <a href="<?php echo esc_url($modal_button_link['url']); ?>"
                    class="modal-newsletter-button"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="S'inscrire à l'infolettre">
                    <?php echo esc_html($modal_button_link['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>