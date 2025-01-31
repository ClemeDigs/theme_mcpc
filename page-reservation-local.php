<?php
/* 
Template Name: Reservation du local
*/
?>

<?php
get_header();
?>

<main>
    <section class="calendar">
    <?php if (SwpmMemberUtils::is_member_logged_in()): ?>
        <?php echo do_shortcode('[calendar id="518"]'); ?>
    <?php else: ?>
        <div class="calendar__not-connected">
            <p>Veuillez vous connecter pour accéder à ce contenu.</p>
            <a href="<?php echo get_permalink(get_page_by_path('connexion')); ?>" class="calendar__btn-connexion">
                <i class="fa-regular fa-user"></i>Connexion
            </a>
        </div>
    <?php endif; ?>
    </section>
</main>

<?php
get_footer();
?>
