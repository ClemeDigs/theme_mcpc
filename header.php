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

    <header class="header">
        <nav class="header-content">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/logo_header.svg" alt="Logo">
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
    </header>