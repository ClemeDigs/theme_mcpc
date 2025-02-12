<?php
/* 
Template Name: Conditions d'utilisation
*/
?>

<?php
    get_header();
?>


<main>

    <?php
        get_template_part('/templates/components/hero');
    ?>

    <section class="conditions-utilisation">
        <h2>Conditions d'utilisation</h2>
        <?php the_field('conditions-utilisation'); ?>
    </section>

</main>


<?php
get_footer();
?>