<?php
/* 
Template Name: Ruche d'art
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
    get_template_part('/templates/components/basic_block');
    ?>
    <?php
    get_template_part('/templates/components/accordeon-termes-activites');
    ?>
    <?php
    get_template_part('/templates/components/slider_images');
    ?>


</main>

<?php
get_footer();
?>