<?php 
/* 
Template Name: Résicences musicales
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
        get_template_part('/templates/components/residence_musicale');
    ?>

<?php 
        get_template_part('/templates/components/block_without_image');
    ?>

<?php 
        get_template_part('/templates/components/slider_images');
    ?>
    
</main>

<?php
    get_footer();
?>