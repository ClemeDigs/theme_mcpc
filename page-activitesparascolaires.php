<?php
/* 
Template Name: Activités parascolaires
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
    <div class="bwt-flip">
        <?php
        get_template_part('/templates/components/block_without_image');
        ?>
    </div>
    <div class="main-content <?php echo $has_new_activity ? 'no-gap' : ''; ?>">
        <div class="main-content <?php echo $has_new_activity ? 'no-gap' : ''; ?>">
            <?php get_template_part('templates/components/accordeon-activites'); ?>
        </div>

        <?php
        get_template_part('/templates/components/accordeon-termes-activites');
        ?>
    </div>
    <?php
    get_template_part('/templates/components/basic_block');
    ?>
</main>

<?php
get_footer();
?>