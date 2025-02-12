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
        <div class="bloc-ca-members__image">
            <h2>
                <span class="text-regular"><?php the_field('team_img_title1'); ?></span>
                <span><?php the_field('team_img_title2'); ?></span>
            </h2>
            <?php
            $image = get_field('team_img');
            if ($image) :
                $image_url = $image['url'];
                $image_alt = $image['alt'];
            ?>
            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt;?>">

            <?php endif; ?>
        </div>
        <div class="bloc-ca-members__cards">
            <h2>Notre équipe</h2>
            <div class="ca-members">
                <?php 
                    get_template_part('/templates/components/ca-members');
                ?>
            </div>
        </div>
    </section>

    <?php
    get_template_part('/templates/components/basic_block');
    ?>

    <?php
    get_template_part('/templates/components/slider_images');
    ?>


    
</main>

<?php
    get_footer();
?>