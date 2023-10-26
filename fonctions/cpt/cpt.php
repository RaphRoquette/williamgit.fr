<?php

function register_cpt() {

    /**
     * Post Type: Custom Post.
     */

    $labels = [
        "name" => __( "Custom Post", "Roquette" ),
        "singular_name" => __( "Custom Post", "Roquette" ),
        "menu_name" => __( "Custom Post", "Roquette" ),
        "all_items" => __( "Toutes les Custom Post", "Roquette" ),
    ];

    $args = [
        "label" => __( "Custom Post", "Roquette" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "custom-post", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail", "excerpt" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "custom-post", $args );
}

// add_action( 'init', 'register_cpt' );