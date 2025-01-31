<?php
    /* Header Template */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>La Maison de la Culture du Pic Champlain</title>
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/assets/img/mcpc_favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?php bloginfo('template_url')  ?>/style.css">
    <link rel="stylesheet" href="./assets/styles/scss/main.scss" />
    <?php wp_head(); ?>
</head>
<body>

<?php 
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
                    wp_nav_menu( $arg = array (
                    'menu' => 'Header',
                    'menu_class' => 'header__nav',
                    'theme_location' => 'primary'
                    )); 
                ?>
            </nav>
            <div class="header__btns">
                <div class="header__btns-cta">
                    <button class="header__dons">
                        <i class="fa-solid fa-hand-holding-dollar"></i>Don
                    </button>
                    <button class="header__connexion">
                        <a href="<?php echo get_permalink(get_page_by_path('connexion')); ?>" class="header__connexion">
                            <i class="fa-regular fa-user"></i>
                            <?php if (SwpmMemberUtils::is_member_logged_in()): ?>
                            <?php echo $initials; ?>
                            <?php else: ?>
                                Connexion
                            <?php endif; ?>
                        </a>
                    </button>
                </div>
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
                    wp_nav_menu( $arg = array (
                    'menu' => 'Header',
                    'menu_class' => 'mobile-menu__nav',
                    'theme_location' => 'primary'
                    )); 
                ?>
                            <div class="mobile-menu__btns">
                <button class="header__connexion">
                    <a href="<?php echo get_permalink(get_page_by_path('connexion')); ?>" class="header__connexion">
                        <i class="fa-regular fa-user"></i>
                        <?php if (SwpmMemberUtils::is_member_logged_in()): ?>
                        <?php echo $initials; ?>
                        <?php else: ?>
                            Connexion
                        <?php endif; ?>
                    </a>
                </button>
                <button class="header__dons">
                    <i class="fa-solid fa-hand-holding-dollar"></i>Don
                </button>
            </div>
            </div>
        </div>
    </header>