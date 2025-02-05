<?php
/*
Template Name: Accueil
*/
?>

<?php
get_header();
?>

<main>

    <?php
    get_template_part('/templates/components/hero');
    ?>

    <?php
    get_template_part('/templates/components/subtitle');
    ?>


    <?php
    get_template_part('/templates/components/cta');
    ?>

<?php
    get_template_part('/templates/components/basic_block');
    ?>

<?php
    get_template_part('/templates/components/juicer');
    ?>


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