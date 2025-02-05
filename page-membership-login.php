<?php
/* 
Template Name: Membership login
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
echo do_shortcode('[swpm_login_form]');
?>

</main>


<?php
get_footer();
?>

