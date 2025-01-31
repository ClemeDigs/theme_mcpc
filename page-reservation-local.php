<?php
/* 
Template Name: Reservation du local
*/
?>

<?php
get_header();
?>

<main>
<?php
if (SwpmMemberUtils::is_member_logged_in()) {
    echo 'Ce contenu est réservé aux membres connectés.';
} else {
    echo 'Veuillez vous connecter pour accéder à ce contenu.';
}
?>
</main>

<?php
get_footer();
?>
