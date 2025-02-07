<?php
/* Main footer file */
?>

<?php

    $liens_menu_query = new WP_Query(array(
        'post_type'      => 'liens-menu',
        'posts_per_page' => 1,
    ));

    if ($liens_menu_query->have_posts()) {
        $liens_menu_query->the_post();
        $facebook_link = get_field('facebook_link', get_the_ID());
        $instagram_link = get_field('instagram_link', get_the_ID());
        $newsletter_link = get_field('newsletter_link', get_the_ID());
        wp_reset_postdata();
    } else {
        $facebook_link = null;
        $instagram_link = null;
        $newsletter_link = get_field('newsletter_link', get_the_ID());
    }

?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__content">
            <div class="footer__logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/logo_footer_02.svg" alt="Logo">
                </a>
            </div>
            <?php
            get_template_part('/templates/components/footer');
            ?>
            <div>
                <div class="footer__newsletter">
                    <h2>INFOLETTRE</h2>
                    <span>Inscris-toi à notre infolettre !</span>
                    <a href="<?php echo esc_url($newsletter_link); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="footer__newsletter-btn">
                        S'inscrire <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div>
                <?php
                wp_nav_menu(array(
                    'menu' => 'Footer',
                    'menu_class' => 'footer__nav',
                    'theme_location' => 'primary'
                ));
                ?>
            </div>
            <div class="footer__social">
                <h2>NOUS SUIVRE</h2>
                <ul class="footer__social-icons">
                    <li>
                        <a href="<?php echo esc_url($facebook_link); ?>"
                            target="_blank"
                            rel="noopener noreferrer">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url($instagram_link); ?>"
                            target="_blank"
                            rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>