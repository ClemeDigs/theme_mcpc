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

    register_post_type(
        'documents',
        array(
            'labels' => array(
                'name' => __('Documents'),
                'singular_name' => __('Document'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-media-document',
            'rewrite' => array('slug' => 'documents'),
            'show_in_rest' => true,
            'supports' => array('title', 'id', 'thumbnail'),
        )
    );

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

    register_post_type(
        'liens-menu',
        array(
            'labels' => array(
                'name' => __('Liens des menus'),
                'singular_name' => __('Lien du menu'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-links',
            'rewrite' => array('slug' => 'liens-menu'),
            'show_in_rest' => true,
            'supports' => array('title', 'id', 'thumbnail'),
        )
    );
}



// ! BANQUE IMAGES BONHOMMES //

function afficher_bonhomme($field_name, $default_image = '/assets/img/illustrations/bonhomme/bonhomme_classic2.svg'/* , $default_class_name = 'bonhomme-classique' */)
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

// ! BANQUE IMAGES ARROWS //

/**
 * Affiche une image de flèche en fonction du choix de l'utilisateur.
 *
 * @param string $field_name Nom du champ ACF.
 * @param string $default_image Chemin de l'image par défaut.
 */
function afficher_arrow($field_name, $default_image = '/assets/img/illustrations/arrows/arrow_big_loop.svg')
{
    $arrow_choice = get_field($field_name);

    $arrow_options = [
        'grosse_boucle' => get_template_directory_uri() . '/assets/img/illustrations/arrows/arrow_big_loop.svg',
        'boucle' => get_template_directory_uri() . '/assets/img/illustrations/arrows/arrow_loop.svg',
        'u' => get_template_directory_uri() . '/assets/img/illustrations/arrows/arrow_u.svg',
        'etoiles' => get_template_directory_uri() . '/assets/img/illustrations/arrows/arrow_stars.svg'
    ];

    // Initialisation des variables par défaut
    $selected_arrow = get_template_directory_uri() . $default_image;
    $arrow_class = ''; // Classe par défaut vide


    if ($arrow_choice && array_key_exists($arrow_choice, $arrow_options)) {
        $selected_arrow = $arrow_options[$arrow_choice];
        $arrow_class = 'block__arrow-' . $arrow_choice;
    } elseif ($arrow_choice === 'null') {
        return;
    }

    echo '<img src="' . esc_url($selected_arrow) . '" class="' . esc_attr($arrow_class) . '" alt="Illustration d\'une flèche">';
}

// ! BOUTONS //

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

        echo '<a href="' . esc_url($url) . '" class="button" target="' . esc_attr($target) . '">' . esc_html($title) . '</a>';
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

/**
 * Affiche un bouton BLOCK avec un lien et un texte personnalisé défini dans ACF.
 *
 * @param array $link Tableau contenant les infos du lien.
 * @param string|null $label Texte du bouton choisi par le client.
 */
function afficher_bouton_block($link, $label = null)
{
    if ($link) {
        $url = esc_url($link['url']);
        $target = esc_attr($link['target'] ?: '_self');

        // Vérifie si un label est défini, sinon utilise le titre du lien ACF
        $button_text = !empty($label) ? esc_html($label) : esc_html($link['title']);

        echo '<a href="' . $url . '" class="" target="' . $target . '">' . $button_text . '</a>';
    }
}

/**
 * Affiche un bouton BLOCK avec un lien et un texte personnalisé défini dans ACF.
 *
 * @param array $link Tableau contenant les infos du lien.
 * @param string|null $label Texte du bouton choisi par le client.
 */
function afficher_bouton_radio($link, $label = null)
{
    if ($link) {
        $url = esc_url($link['url']);
        $target = esc_attr($link['target'] ?: '_self');

        // Vérifie si un label est défini, sinon utilise le titre du lien ACF
        $button_text = !empty($label) ? esc_html($label) : esc_html($link['title']);

        echo '<a href="' . $url . '" class="" target="' . $target . '">' . $button_text . '</a>';
    }
}

// ! FUNCTION PAGE NON PERSONNALISABLE //

function remove_wysiwyg()
{
    remove_post_type_support('page', 'editor');
}


// ! FUNCTION POUR ENLEVER COMMENTS ET ARTICLES DU TABLEAU DE BORD WP //

function remove_dashboard_menus()
{
    remove_menu_page('edit.php'); // Supprime "Articles"
    remove_menu_page('edit-comments.php'); // Supprime "Commentaires"
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

function enqueue_accordeon_script()
{
    wp_enqueue_script(
        'accordeon',
        get_template_directory_uri() . '/assets/js/accordeon.js',
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
add_action('wp_enqueue_scripts', 'enqueue_accordeon_script');
add_action('wp_enqueue_scripts', 'enqueue_dialog_script');
add_action('admin_menu', 'remove_dashboard_menus');

// ! UPLOAD SVG //

function autoriser_upload_svg($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'autoriser_upload_svg');
