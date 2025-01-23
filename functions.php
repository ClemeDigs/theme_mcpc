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
}

add_action('init', 'create_posttype');
