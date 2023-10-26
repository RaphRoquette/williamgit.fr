<?php

function register_taxes() {

    /**
     * Taxonomy: Custom Taxonomy.
     */

    $labels = [
        "name" => esc_html__( "Custom Taxonomy", "roquette-twig" ),
        "singular_name" => esc_html__( "Custom Taxonomy", "roquette-twig" ),
        "menu_name" => esc_html__( "Custom Taxonomy", "roquette-twig" ),
    ];

    
    $args = [
        "label" => esc_html__( "Custom Taxonomy", "roquette-twig" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'custom-tax', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "custom-tax",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "custom-tax", [ "post" ], $args );
}
// add_action( 'init', 'register_taxes' );