<?php
/* 
Template Name: Password reset
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
echo do_shortcode('[swpm_reset_form]');
?>

</main>


<?php
get_footer();
?>