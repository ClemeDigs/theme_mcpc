<?php
$image_activites = get_field('image_activites');
$image_activites_2 = get_field('image_activites_2');
?>

<div style="text-align: center;">
    <?php if ($image_activites): ?>
        <img src="<?php echo esc_url($image_activites['url']); ?>" alt="<?php echo esc_attr($image_activites['alt']); ?>" />
    <?php endif; ?>

    <?php if ($image_activites_2): ?>
        <img src="<?php echo esc_url($image_activites_2['url']); ?>" alt="<?php echo esc_attr($image_activites_2['alt']); ?>" />
    <?php endif; ?>
</div>