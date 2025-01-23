<?php 
/* 
Template Name: Notre organisme
*/
?>

<?php
    get_header();
?>

<main>
    <h2>Les membres du CA</h2>
    <?php 
        get_template_part('/templates/components/ca_member');
    ?>
</main>

<?php
    get_footer();
?>