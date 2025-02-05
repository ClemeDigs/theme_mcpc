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
    <div>
        <?php
        get_template_part('/templates/components/accordeon-rapports-assembles');
        ?>
        <?php
        get_template_part('/templates/components/accordeon-rapports-annuels');
        ?>
    </div>
</main>

<?php
get_footer();
?>