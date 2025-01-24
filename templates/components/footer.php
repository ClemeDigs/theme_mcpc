<?php include get_template_directory() . '/global.php'; ?>
<div class="footer__contact">
    <h2>CONTACT</h2>
    <section class="footer__infos corps_texte">
        <div class="footer__address-mcpc">
            <i class="fa-solid fa-location-dot"></i>
            <?php
            $address1 = get_field('address_1', $contact);
            $address2 = get_field('address_2', $contact);
            $full_address = urlencode($address1 . ' ' . $address2);
            ?>
            <div>
                <a
                    href="https://www.google.com/maps?q=<?php echo $full_address; ?>"
                    target="_blank"
                    rel="noopener noreferrer">
                    <?php echo esc_html($address1); ?><br>
                    <?php echo esc_html($address2); ?>
                </a>
            </div>
        </div>

        <div class="footer__phone-mcpc">
            <i class="fa-solid fa-phone"></i>
            <a
                href="tel:<?php the_field('phone', $contact); ?>">
                <?php the_field('phone', $contact); ?>
            </a>
        </div>

        <div class="footer__email-mcpc">
            <i class="fa-regular fa-envelope"></i>
            <a
                href="mailto:<?php the_field('general_email', $contact); ?>">
                <?php the_field('general_email', $contact); ?>
            </a>
        </div>
    </section>
</div>