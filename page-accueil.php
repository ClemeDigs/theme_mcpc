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

    <div class="ctaSection__container">
        <?php
        get_template_part('/templates/components/cta');
        ?>
    </div>

    <?php
    get_template_part('/templates/components/slider_images');
    ?>

    <?php
    get_template_part('/templates/components/partners');
    ?>

</main>

<?php
get_footer();
?>