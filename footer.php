<?php
/* Main footer file */
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
                    <a href="https://app.cyberimpact.com/clients/39645/subscribe-forms/83ED11E9-8819-4F3A-9C8A-86BC5C978CF3"
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
                        <a href="https://www.facebook.com/culturebic/"
                            target="_blank"
                            rel="noopener noreferrer">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/radiobic925/"
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