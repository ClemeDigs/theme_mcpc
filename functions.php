<?php

// ! CUSTOM POST TYPES //

function create_posttype()
{

    register_post_type(
        'contact',
        array(
            'labels' => array(
                'name' => __('Contacts'),
                'singular_name' => __('Contact')
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
        'partners',
        array(
            'labels' => array(
                'name' => __('Partenaires'),
                'singular_name' => __('Partenaire')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-groups',
            'rewrite' => array('slug' => 'partners'),
        )
    );

    register_post_type(
        'residence_musicale',
        array(
            'labels' => array(
                'name' => __('Résidences musicales'),
                'singular_name' => __('Résidence musicale')
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-format-audio',
            'rewrite' => array('slug' => 'residence_musicale'),
            'show_in_rest' => true,
            'supports' => array('title', 'id'),
        )
    );
    // register_post_type(
    //     'gallery',
    //     array(
    //         'labels' => array(
    //             'name' => __('Galerie photo'),
    //             'singular_name' => __('Galerie photo'),
    //         ),
    //         'public' => true,
    //         'has_archive' => true,
    //         'menu_icon' => 'dashicons-camera',
    //         'rewrite' => array('slug' => 'gallery'),
    //         'show_in_rest' => true,
    //         'supports' => array('title', 'id', 'thumbnail'),
    //     )
    // );

    register_post_type(
        'exposition',
        array(
            'labels' => array(
                'name' => __('Expositions'),
                'singular_name' => __('Exposition'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-art',
            'rewrite' => array('slug' => 'exposition'),
            'show_in_rest' => true,
            'supports' => array('title', 'id', 'thumbnail'),
        )
    );
}



// // ! BANQUE IMAGES BONHOMMES //

// /**
//  * @param string $field_name Nom du champ ACF.
//  * @param string $default_image Chemin de l'image par défaut.
//  */
// function afficher_bonhomme($field_name, $default_image = '/assets/img/illustrations/bonhomme/bonhomme-classic.svg')
// {
//     $image_choice = get_field($field_name);

//     $image_choices = [
//         'Théâtre' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_acting2.svg',
//         'Peinture' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_painting2.svg',
//         'Musique' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_guitar2.svg',
//         'Radio' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_radio2.svg',
//         'Danse' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_balet2.svg',
//         'Hip-hop' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_hiphop2.svg',
//         'Classique' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_classic2.svg',
//         'Parle' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_talking2.svg',
//         'Pense' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_thinking2.svg',
//     ];

//     if ($image_choice === 'Aucun') {
//         return;
//     }

//     $selected_image = get_template_directory_uri() . $default_image;

//     if ($image_choice && array_key_exists($image_choice, $image_choices)) {
//         $selected_image = $image_choices[$image_choice];
//     }
//     // Ajouter une classe conditionnelle pour les bonhommes plus larges
//     $additional_class = in_array($image_choice, ['Parle', 'Pense', 'Radio']) ? ' bonhomme-wide' : '';

//     echo '<img src="' . esc_url($selected_image) . '" alt="Bonhomme" class="bonhomme-image' . esc_attr($additional_class) . '">';
// }


function afficher_bonhomme($field_name, $default_image = '/assets/img/illustrations/bonhomme/bonhomme-classic.svg')
{
    $image_choice = get_field($field_name);

    $image_choices = [
        'Théâtre' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_acting2.svg',
        'Peinture' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_painting2.svg',
        'Musique' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_guitar2.svg',
        'Radio' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_radio2.svg',
        'Danse' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_balet2.svg',
        'Hip-hop' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_hiphop2.svg',
        'Classique' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_classic2.svg',
        'Parle' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_talking2.svg',
        'Pense' => get_template_directory_uri() . '/assets/img/illustrations/bonhomme/bonhomme_thinking2.svg',
    ];

    if ($image_choice === 'Aucun') {
        return;
    }

    $selected_image = get_template_directory_uri() . $default_image;

    if ($image_choice && array_key_exists($image_choice, $image_choices)) {
        $selected_image = $image_choices[$image_choice];
    }

    // Ajouter une classe spécifique pour chaque bonhomme
    $class_name = 'bonhomme-' . strtolower(str_replace(' ', '-', $image_choice));

    echo '<img src="' . esc_url($selected_image) . '" alt="Bonhomme" class="bonhomme-image ' . esc_attr($class_name) . '">';
}











// ! LARGEUR DU SOUS-TITRE //

function afficher_largeur_sous_titre($field_name)
{
    $width_choice = get_field($field_name);

    if ($width_choice === 'large') {
        return 'subtitle__large';
    } else {
        return 'subtitle__small';
    }
}

// ! BANQUE IMAGES HINGES //

/**
 * @param string $field_name Nom du champ ACF.
 * @param string $default_image Chemin de l'image par défaut.
 * @return string URL de l'image sélectionnée.
 */
function get_hinge_image_url($field_name, $default_image = '/assets/img/illustrations/hinge/hinge_02.svg')
{
    $hinge_choice = get_field($field_name);

    $hinge_options = [
        'hinge_1' => get_template_directory_uri() . '/assets/img/illustrations/hinge/hinge_01.svg',
        'hinge_2' => get_template_directory_uri() . '/assets/img/illustrations/hinge/hinge_02.svg',
        'hinge_3' => get_template_directory_uri() . '/assets/img/illustrations/hinge/hinge_03.svg',
    ];

    $selected_hinge = get_template_directory_uri() . $default_image;

    if ($hinge_choice && array_key_exists($hinge_choice, $hinge_options)) {
        $selected_hinge = $hinge_options[$hinge_choice];
    }

    return esc_url($selected_hinge);
}

// ! BANQUE IMAGES HANDS //

/**
 * @param string $field_name Nom du champ ACF.
 * @param string $default_image Chemin de l'image par défaut.
 */
function afficher_hand($field_name, $default_image = '/assets/img/illustrations/hands/hand_big_paintbrush.svg')
{
    $hand_choice = get_field($field_name);

    $hand_options = [
        'gros_pinceau' => get_template_directory_uri() . '/assets/img/illustrations/hands/hand_big_paintbrush.svg',
        'palette' => get_template_directory_uri() . '/assets/img/illustrations/hands/hand_color_pallete.svg',
        'petit_pinceau' => get_template_directory_uri() . '/assets/img/illustrations/hands/hand_small_paintbrush.svg',
    ];

    // Initialisation des variables par défaut
    $selected_hand = get_template_directory_uri() . $default_image;
    $hand_class = ''; // Classe par défaut vide

    if ($hand_choice && array_key_exists($hand_choice, $hand_options)) {
        $selected_hand = $hand_options[$hand_choice];
        $hand_class = 'subtitle__hand-' . $hand_choice;
    }

    echo '<img src="' . esc_url($selected_hand) . '" class="' . esc_attr($hand_class) . '" alt="Illustration d\'une main d\'artiste">';
}


// ! BOUTON EN SAVOIR PLUS... //

/**
 * Affiche un bouton "En savoir plus" si un lien est défini dans le champ ACF 'learn_more'.
 *
 * @param string $field_name Nom du champ ACF.
 */
function afficher_bouton_en_savoir_plus($field_name)
{
    $link = get_field($field_name);

    if ($link) {
        $url = $link['url'];
        $title = $link['title'] ? $link['title'] : 'En savoir plus';
        $target = $link['target'] ? $link['target'] : '_self';

        echo '<a href="' . esc_url($url) . '" class="" target="' . esc_attr($target) . '">' . esc_html($title) . '</a>';
    }
}

/**
 * Affiche un bouton CTA avec un lien et un texte personnalisé défini dans ACF.
 *
 * @param array $link Tableau contenant les infos du lien.
 * @param string|null $label Texte du bouton choisi par le client.
 */
function afficher_bouton_cta($link, $label = null)
{
    if ($link) {
        $url = esc_url($link['url']);
        $target = esc_attr($link['target'] ?: '_self');

        // Vérifie si un label est défini, sinon utilise le titre du lien ACF
        $button_text = !empty($label) ? esc_html($label) : esc_html($link['title']);

        echo '<a href="' . $url . '" class="cta__section-content-button" target="' . $target . '">' . $button_text . '</a>';
    }
}

// ! FUNCTION PAGE NON PERSONNALISABLE //

function remove_wysiwyg()
{
    remove_post_type_support('page', 'editor');
}


// ! SCRIPT SLIDER //

function enqueue_slider_script()
{
    wp_enqueue_script(
        'slider',
        get_template_directory_uri() . '/assets/js/slider.js',
        array(),
        null,
        true
    );
}

// ! SCRIPT DIALOG //

function enqueue_dialog_script()
{
    wp_enqueue_script(
        'dialog',
        get_template_directory_uri() . '/assets/js/dialog.js',
        array(),
        null,
        true
    );
}

// ! SCRIPT PHOTO-GALLERY //
function enqueue_gallery_script()
{
    wp_enqueue_script(
        'gallery',
        get_template_directory_uri() . '/assets/js/photo_gallery.js',
        array(),
        null,
        true
    );
}

// ! HOOKS WORDPRESS //
add_action('init', 'remove_wysiwyg');
add_action('wp_enqueue_scripts', 'enqueue_slider_script');
add_action('wp_enqueue_scripts', 'enqueue_gallery_script');
add_action('init', 'create_posttype');
add_action('wp_enqueue_scripts', 'enqueue_dialog_script');
