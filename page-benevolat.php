<?php
/* 
Template Name: Bénévolat
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
    get_template_part('/templates/components/volunteer');
    ?>

    <?php
    get_template_part('/templates/components/basic_block');
    ?>

</main>

<?php
get_footer();
?>