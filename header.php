<?php
    /* Header Template */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Maison de la Culture du Pic Champlain</title>
    <link rel="stylesheet" href="<?php bloginfo('template_url')  ?>/style.css">
    <?php wp_head(); ?>
</head>
<body>

    <header>
        <nav class="header-content">
            <div class="logo">
                <a href="<?php echo site_url(); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="Logo">
                </a>
            </div>
            <?php
                /* wp_nav_menu( $arg = array (
                'menu' => 'Header',
                'menu_class' => 'main-navigation',
                'theme_location' => 'primary'
                )); */
            ?>
        </nav>
    </header>
