<?php
/* Header Template */
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.juicer.io/embed/maison-de-la-culture-du-pic-champlain/embed-code.js" async defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>La Maison de la Culture du Pic Champlain</title>
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/img/mcpc_favicon.svg" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/img/mcpc_favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?php bloginfo('template_url')  ?>/style.css">
    <link rel="stylesheet" href="./assets/styles/scss/main.scss" />
    <link rel="stylesheet" href="./assets/styles/scss/main.scss" />
    <?php wp_head(); ?>
</head>

<body>

    <?php

    $liens_menu_query = new WP_Query(array(
        'post_type'      => 'liens-menu',
        'posts_per_page' => 1,
    ));

    $radio_img_url = ''; // Définition par défaut

    if ($liens_menu_query->have_posts()) {
        $liens_menu_query->the_post();
        $donation_link = get_field('donation_link', get_the_ID());
        $connexion_link = get_field('connexion_link', get_the_ID());
        $radio_link = get_field('radio_link', get_the_ID());
        $radio_img = get_field('radio_img', get_the_ID());
        wp_reset_postdata();

        // Vérifier si $radio_img est un tableau et récupérer l'URL
        if (is_array($radio_img) && isset($radio_img['url'])) {
            $radio_img_url = esc_url($radio_img['url']); 
        }
    }

    // Récupérer le prénom et le nom de famille avec les shortcodes
    $first_name = do_shortcode('[swpm_show_member_info column="first_name"]');
    $last_name = do_shortcode('[swpm_show_member_info column="last_name"]');

    // Extraire la première lettre de chaque
    $initials = strtoupper(substr($first_name, 0, 1)) . strtoupper(substr($last_name, 0, 1));

    ?>

    <header>
        <div class="header">
            <nav class="header__content">
                <div class="header__logo">
                    <a href="<?php echo site_url(); ?>">
                        <img class="header__image" src="<?php bloginfo('template_url'); ?>/assets/img/logo_header.svg" alt="Logo">
                    </a>
                </div>
                <?php
                wp_nav_menu(array(
                    'menu' => 'Header',
                    'menu_class' => 'header__nav',
                    'theme_location' => 'primary'
                ));
                ?>
            </nav>
            <div class="header__btns">
                <div class="header__btns-cta">
                    <a href="<?php echo esc_url($donation_link); ?>" target="_blank" class="header__dons" >
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/logo-donation.svg" alt="Icone don">
                        Don
                    </a>
                    <a href="<?php echo esc_url($connexion_link); ?>" class="header__connexion">
                        <i class="fa-regular fa-user"></i>
                        <?php if (SwpmMemberUtils::is_member_logged_in()): ?>
                            <?php echo $initials; ?>
                        <?php else: ?>
                            Connexion
                        <?php endif; ?>
                    </a>
<!--                     <button class="header__btn-music">
                        <div class="header__radio-img">
                            <?php if (!empty($radio_img_url)) : ?>
                                <img src="<?php echo $radio_img_url; ?>" alt="Radio Image">
                            <?php endif; ?>
                        </div>
                    </button>
                    <div class="header__radio">
                        <a href="<?php echo esc_url($radio_link); ?>" target="_blank" id="header__radio-btn" >
                            <i class="fa-brands fa-soundcloud"></i>
                            Écouter
                        </a>
                    </div>
                </div> -->
                <button class="header__mobile-icon">
                    <i data-dialog="#mobile-menu" class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="dialog mobile-menu__dialog">
            <div class="mobile-menu">
                <div class="mobile-menu__header">
                    <h2>Menu</h2>
                    <button class="btn-close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <?php
                wp_nav_menu($arg = array(
                    'menu' => 'Header',
                    'menu_class' => 'mobile-menu__nav',
                    'theme_location' => 'primary'
                ));
                ?>
                <div class="mobile-menu__btns">
                    <a href="<?php echo esc_url($connexion_link); ?>" class="header__connexion">
                        <i class="fa-regular fa-user"></i>
                        <?php if (SwpmMemberUtils::is_member_logged_in()): ?>
                            <?php echo $initials; ?>
                        <?php else: ?>
                            Connexion
                        <?php endif; ?>
                    </a>
                    <a href="<?php echo esc_url($donation_link); ?>" class="header__dons">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/logo-donation.svg" alt="Icone don">
                        Don
                    </a>
                </div>
            </div>
        </div>
    </header>