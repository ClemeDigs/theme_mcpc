<?php
/*
Template Name: Accueil
*/
?>

<?php
get_header();
?>

<main id="main" class="main">

    <?php
    get_template_part('/templates/components/hero');
    ?>


    <?php
    get_template_part('/templates/components/cta');
    ?>

<?php 
        get_template_part('/templates/components/slider_images');
    ?>

</main>

<?php
get_footer();
?>