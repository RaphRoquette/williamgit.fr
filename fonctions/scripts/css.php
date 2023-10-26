<?php

function roquette_styles() {
wp_register_style('main-stylesheet', get_template_directory_uri() . '/static/css/style.css',false,'1.0','all');
wp_register_style('print-stylesheet', get_template_directory_uri() . '/static/css/impression.css',false,'1.0','print');
wp_enqueue_style('main-stylesheet');
wp_enqueue_style('print-stylesheet');

wp_dequeue_style( 'wp-block-library' );
wp_dequeue_style( 'wp-block-library-theme' );
wp_dequeue_style( 'wc-blocks-style' );
wp_dequeue_style( 'classic-theme-styles' );
}

// function bloc_admin_styles() {
// wp_register_style('blocs-admin', get_template_directory_uri() . '/static/css/blocs-admin.css',false,'1.0','all');
// wp_enqueue_style('blocs-admin');
// }

add_action( 'wp_enqueue_scripts', 'roquette_styles' );  
// add_action( 'admin_enqueue_scripts', 'bloc_admin_styles' );  