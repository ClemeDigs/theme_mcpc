<?php
/* 
Template Name: Registration
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
echo do_shortcode('[swpm_registration_form]');
?>

</main>


<?php
get_footer();
?>
