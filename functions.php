<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

function jpg_exemple_register_assets()
{



    // Déclarer style.css à la racine du thème
    wp_enqueue_style(
        'jpg_exemple',
        get_stylesheet_uri(),
        array(),
        '1.0'
    );

    //Seulement la page d'acceuil//
    if (is_page()) {
        wp_enqueue_style(
            'jpg_exemple-front-page',
            get_template_directory_uri() . '/assets/styles/front-page.css',
            array(),
            '1.0'
        );
    }
    if (is_front_page()) {
        wp_enqueue_style(
            'jpg_exemple-page',
            get_template_directory_uri() . '/assets/styles/page.css',
            array(),
            '1.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'jpg_exemple_register_assets');


function jpg_exemple_register_post_types()
{

    // CPT Portfolio
    $labels = array(
        'name' => 'Projects',
        'all_items' => 'Tous les projets',  // affiché dans le sous menu
        'singular_name' => 'Projet',
        'add_new_item' => 'Ajouter un projet',
        'edit_item' => 'Modifier le projet',
        'menu_name' => 'Project'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
    );

    register_post_type('portfolio', $args);
}
add_action('init', 'jpg_exemple_register_post_types'); // Le hook init lance la fonction