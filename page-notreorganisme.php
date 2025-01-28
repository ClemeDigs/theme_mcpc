<?php 
/* 
Template Name: Notre organisme
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

    <section class="bloc-ca-members">
        <h2>Les membres du CA</h2>
        <div class="ca-members">
            <?php 
                get_template_part('/templates/components/ca-members');
            ?>
        </div>
        </div>
    </section>

    <?php
    get_template_part('/templates/components/slider_images');
    ?>
    
</main>

<?php
    get_footer();
?>