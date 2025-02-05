<?php
/* 
Template Name: Profile
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
echo do_shortcode('[swpm_profile_form]');
?>

</main>


<?php
get_footer();
?>