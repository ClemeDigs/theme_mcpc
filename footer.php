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
                    <form action="" method="post" class="footer__newsletter-form">
                        <label for="email"><i class="fa-regular fa-envelope"></i> Inscris-toi à notre infolettre !</label>
                        <div>
                            <input type="email" name="newsletter_email" placeholder="exemple@exemple.com">
                            <i class="fa-regular fa-paper-plane"></i>
                            <!-- <button type="submit">Soumettre</button> -->
                        </div>
                    </form>
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
                    <li> <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li> <a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>