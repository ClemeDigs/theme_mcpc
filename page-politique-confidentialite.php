<?php
/* 
Template Name: Politique de confidentialité
*/
?>

<?php
    get_header();
?>


<main>

    <?php
        get_template_part('/templates/components/hero');
    ?>

    <section class="politique-confidentialite">
        <h2>Politique de confidentialité</h2>
        <?php the_field('politique_confidentialite'); ?>
    </section>

</main>


<?php
get_footer();
?>