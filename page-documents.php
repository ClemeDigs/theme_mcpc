<?php 
/* 
Template Name: Documents
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
    get_template_part('/templates/components/accordeon-rapports-assembles');
    ?>

<?php
    get_template_part('/templates/components/accordeon-rapports-annuels');
    ?>

</main>

<?php
    get_footer();
?>