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
    get_template_part('/templates/components/pop-up_newsletter'); ?>

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
    get_template_part('/templates/components/partners');
    ?>


</main>

<?php
get_footer();
?>