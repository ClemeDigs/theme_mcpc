<?php
/* Main footer file */
?>

<footer class="footer">
    <div class="footer__content">
        <div class="footer__logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/logo_footer_02.svg" alt="Logo">
            </a>
        </div>
        <div class="footer__div">
            <div>
                <h2>CONTACT</h3>
                    <p><i class="fa-solid fa-location-dot"></i>126, rue du Mont-Saint-Louis<br>
                        Rimouski (Québec) G0L 1B0</p>
                    <p><i class="fa-solid fa-phone"></i>418 736-5237</p>
                    <p><i class="fa-regular fa-envelope"></i><a href="mailto:maisonculturebic@gmail.com">maisonculturebic@gmail.com</a></p>
            </div>
            <div>
                <div class="infolettre">
                    <h2>INFOLETTRE</h3>
                        <p><i class="icon-mail"></i> Inscris-toi à notre infolettre !</p>
                        <form action="" method="post" class="newsletter-form">
                            <input type="email" name="newsletter_email" placeholder="Adresse courriel">
                            <button type="submit">Soumettre</button>
                        </form>
                </div>
                <div class="footer-social">
                    <h2>NOUS SUIVRE</h3>
                        <p>
                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        </p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__menu">

        <?php
        wp_nav_menu(array(
            'menu' => 'Footer',
            'menu_class' => 'footer__nav',
            'theme_location' => 'primary'
        ));
        ?>

    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>