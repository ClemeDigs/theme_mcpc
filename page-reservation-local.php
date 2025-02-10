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
        get_template_part('/templates/components/hero');
    ?>

    <section class="calendar">
    <?php if (SwpmMemberUtils::is_member_logged_in()): ?>
        <?php echo do_shortcode('[calendar id="518"]'); ?>
    <?php else: ?>
        <div class="calendar__not-connected">
            <h2><?php the_field('connexion_title'); ?></h2>
            <p><?php the_field('connexion_message'); ?></p>
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
