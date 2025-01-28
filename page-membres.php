<?php 
/* 
Template Name: Nos membres
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
        get_template_part('/templates/components/slider_images');
    ?>
</main>

<?php
    get_footer();
?>