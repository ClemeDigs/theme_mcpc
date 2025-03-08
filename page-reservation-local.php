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

        <?php
        get_template_part('/templates/components/calendar-utilisation');
        ?>

        <div class="responsive-calendar mobile">
            <iframe src="https://calendar.google.com/calendar/embed?src=maisonculturebic%40gmail.com&ctz=America%2FToronto&mode=AGENDA" style="border: 0" frameborder="0" scrolling="no"></iframe>
            </iframe>
        </div>

        <div class="responsive-calendar desktop">
            <iframe src="https://calendar.google.com/calendar/embed?src=maisonculturebic%40gmail.com&ctz=America%2FToronto" style="border: 0" frameborder="0" scrolling="no"></iframe>
            </iframe>
        </div>

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
