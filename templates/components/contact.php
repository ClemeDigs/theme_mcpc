<?php

    $contact = new WP_Query(array(
        'post_type'      => 'contact',
        'posts_per_page' => 1,
    ));

    if ($contact->have_posts()) {
        $contact->the_post();
            $address1 = get_field('address_1');
            $address2 = get_field('address_2');
            $full_address = urlencode($address1 . ' ' . $address2);
            $mcpc_phone = get_field('phone');
            $mcpc_email = get_field('general_email');
            $radio_email = get_field('radio-bic_email');
            $residences_email = get_field('residences_email');
            $ruche_email = get_field('ruche_email');
            $opening_hours = get_field('opening_hours');
            $map_image = get_field('map_location');
            if ($map_image) :
                $map_image_url = is_array($map_image) ? $map_image['url'] : $map_image;
            endif;
        wp_reset_postdata();
    }

?>

<section class="contact" id="join-us">
    <div class="contact__infos">
        <div>
            <h2>Nous joindre</h2>
            <div class="contact__infos-mcpc">
                <h3>Maison de la Culture du Pic Champlain</h3>
                <div class="contact__infos-mcpc-mail">
                    <i class="fa-regular fa-envelope"></i>
                    <a href="mailto:<?php echo $mcpc_email; ?>"><?php echo $mcpc_email; ?></a>
                </div>
                <div class="contact__infos-mcpc-phone">
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:<?php echo $mcpc_phone; ?>"><?php echo $mcpc_phone; ?></a>
                </div>
            </div>

            <div>
                <h3>Radio Bic</h3>
                <div class="contact__infos-radio">
                    <i class="fa-regular fa-envelope"></i>
                    <a href="mailto:<?php echo $radio_email; ?>"><?php echo $radio_email; ?></a>
                </div>
            </div>

            <div>
                <h3>Résidences musicales au Moulin</h3>
                <div class="contact__infos-residence">
                    <i class="fa-regular fa-envelope"></i>
                    <a href="mailto:<?php echo $residences_email; ?>"><?php echo $residences_email; ?></a>
                </div>
            </div>
            
            <div>
                <h3>Ruche d'art du Bic</h3>
                <div class="contact__infos-ruche">
                    <i class="fa-regular fa-envelope"></i>
                    <a href="mailto:<?php echo $ruche_email; ?>"><?php echo $ruche_email; ?></a>
                </div>
            </div>
            
        </div>

        <div class="contact__infos-hours">
            <h2>Heures d'ouverture</h2>
            <?php echo $opening_hours; ?>
        </div>
    </div>

    <div class="contact__adress">
        <h2>Comment se rendre</h2>
        <div>
            <i class="fa-solid fa-location-dot"></i>
            <a href="https://www.google.com/maps?q=<?php echo $full_address; ?>" target="_blank"><?php echo esc_html(urldecode($full_address)); ?></a>
        </div>
        <?php if (!empty($map_image_url)) : ?>
                <img class="contact__adress-map" src="<?php echo $map_image_url; ?>" alt="Carte de l'emplacement de la MCPC">
        <?php endif; ?>
    </div>
</section>

<section class="newsletter" id="newsletter">
    <div class="newsletter__bonhomme">
        <?php 
        if (!empty(get_field('newsletter_choix_du_bonhomme'))) :
            afficher_bonhomme('newsletter_choix_du_bonhomme');
        endif;
        ?>
    </div>
    <div class="newsletter__arrow">
        <?php 
        if (!empty(get_field('newsletter_arrow'))) :
            afficher_arrow('newsletter_arrow');
        endif;
        ?>
    </div>
    <div class="newsletter__content">
        <h2><?php the_field('newsletter_title');?></h2>
        <div class="newsletter__content-text">
            <p><?php the_field('newsletter_text_1');?></p>
            <p><?php the_field('newsletter_text_2');?></p>
        </div>
        <?php
            $liens_menu = get_posts([
                'post_type'      => 'liens-menu',
                'posts_per_page' => 1, 
            ]);
            $newsletter_link = !empty($liens_menu) ? get_field('newsletter_link', $liens_menu[0]->ID) : '';
            ?>
        <a href="<?php echo esc_url($newsletter_link); ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="footer__newsletter-btn">
            S'inscrire <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</section>