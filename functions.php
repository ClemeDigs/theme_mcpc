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
            'supports' => array('title', 'image'),   
        )
    );
}

add_action('init', 'create_posttype');

?>