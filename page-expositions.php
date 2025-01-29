<?php 
/* 
Template Name: Expositions
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
    get_template_part('/templates/components/exposition');
    ?>

</main>

<?php
    get_footer();
?>