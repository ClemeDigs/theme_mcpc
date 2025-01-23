<?php include get_template_directory() . '/global.php'; ?>
<div class="footer__contact">
    <h2>CONTACT</h2>
    <section class="footer__infos corps_texte">
        <div class="footer__adresse-mcpc">
            <i class="fa-solid fa-location-dot"></i>
            <div>
                <?php the_field('address_1', $contact) ?><br>
                <?php the_field('address_2', $contact) ?>
            </div>
        </div>
        <div class="footer__telephone-mcpc">
            <i class="fa-solid fa-phone"></i><?php the_field('phone', $contact) ?>
        </div>
        <div class="footer__courriel-mcpc">
            <i class="fa-regular fa-envelope"></i><?php the_field('general_email', $contact) ?>
        </div>
    </section>
</div>