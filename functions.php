<?php

function create_posttype()
{

    register_post_type(
        'hero',
        array(
            'labels' => array(
                'name' => __('HERO'),
                'singular_name' => __('HERO')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-info',
            'rewrite' => array('slug' => 'hero'),
            'show_in_rest' => true,
            'supports' => array('title', 'image'),
        )
    );

    register_post_type(
        'contact',
        array(
            'labels' => array(
                'name' => __('contact'),
                'singular_name' => __('contact')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-info',
            'rewrite' => array('slug' => 'contact'),
            'show_in_rest' => true,
            'supports' => array('title', 'id'),
        )
    );

    register_post_type(
        'ca_member',
        array(
            'labels' => array(
                'name' => __('Conseil d\'administration'),
                'singular_name' => __('Conseil d\'administration')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-buddicons-buddypress-logo',
            'rewrite' => array('slug' => 'ca_member'),
            'show_in_rest' => true,
            'supports' => array('title', 'id'),

        )
    );

    register_post_type(
        'cta_section',
        array(
            'labels' => array(
                'name' => __('Section CTA'),
                'singular_name' => __('Sections CTA\'s')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-buddicons-buddypress-logo',
            'rewrite' => array('slug' => 'cta_section'),
            'show_in_rest' => true,
            'supports' => array('title', 'id'),

        )
    );
}
?>

<?php
/**
 * @param string $field_name Nom du champ ACF.
 * @param string $default_image Chemin de l'image par défaut.
 */
function afficher_bonhomme($field_name, $default_image = '/assets/img/illustrations/bonhomme/bonhomme-classic.svg')
{
    $image_choice = get_field($field_name);

    $image_choices = [
        'Théâtre' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_acting.svg',
        'Peinture' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_painting.png',
        'Musique' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_guitar.svg',
        'Radio' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_radio.svg',
        'Danse' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_balet.svg',
        'Hip-hop' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_hiphop.svg',
        'Classique' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_classic.svg',
        'Parle' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_talking.svg',
        'Pense' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_thinking.svg',
    ];

    if ($image_choice === 'Aucun') {
        return;
    }

    $selected_image = get_template_directory_uri() . $default_image;

    if ($image_choice && array_key_exists($image_choice, $image_choices)) {
        $selected_image = $image_choices[$image_choice];
    }

    echo '<img src="' . esc_url($selected_image) . '" alt="Illustration d\'un bonhomme">';
}


function enqueue_slider_script() {
    wp_enqueue_script(
        'slider', 
        get_template_directory_uri() . '/assets/js/slider.js', 
        array(), 
        null, 
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_slider_script');
?>

<?php
add_action('init', 'create_posttype');
?>