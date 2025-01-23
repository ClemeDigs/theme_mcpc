<?php

function create_posttype() {

    register_post_type( 'hero',
        array(
            'labels' => array(
                'name' => __( 'HERO' ),
                'singular_name' => __( 'HERO' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-info',
            'rewrite' => array('slug' => 'hero'),
            'show_in_rest' => true,
            'supports' => array('title', 'id'),   
        )
    );

    register_post_type( 'ca_member',
        array(
            'labels' => array(
                'name' => __( 'Conseil d\'administration' ),
                'singular_name' => __( 'Conseil d\'administration' )
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-buddicons-buddypress-logo',
            'rewrite' => array('slug' => 'ca_member'),
            'show_in_rest' => true,
            'supports' => array('title', 'id'),   
        )
    );
}

add_action('init', 'create_posttype');

?>


<?php
/**
 * @param string $field_name Nom du champ ACF.
 * @param string $default_image Chemin de l'image par défaut.
 */
function afficher_bonhomme($field_name, $default_image = '/assets/img/bonhomme-classique.svg') {
    $image_choice = get_field($field_name);

    $image_choices = [
        'Théâtre' => get_template_directory_uri() . '/assets/img/bonhomme-theatre.svg',
        'Peinture' => get_template_directory_uri() . '/assets/img/bonhomme-painting.svg',
        'Musique' => get_template_directory_uri() . '/assets/img/bonhomme-music.svg',
        'Radio' => get_template_directory_uri() . '/assets/img/bonhomme-radio.svg',
        'Danse' => get_template_directory_uri() . '/assets/img/bonhomme-dance.svg',
        'Hip-hop' => get_template_directory_uri() . '/assets/img/bonhomme-hiphop.svg',
        'Classique' => get_template_directory_uri() . '/assets/img/bonhomme-classique.svg',
        'Parle' => get_template_directory_uri() . '/assets/img/bonhomme-parle.svg',
        'Pense' => get_template_directory_uri() . '/assets/img/bonhomme-pense.svg',
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
?>