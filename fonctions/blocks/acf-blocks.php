<?php

add_action( 'acf/init', 'my_acf_init' );

function my_acf_init() {
    // Bail out if function doesn’t exist.
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }

     acf_register_block( array(
        'name'            => 'Articles en relation',
        'title'           => __( 'En relation', 'your-text-domain' ),
        'description'     => __( 'En relation.', 'your-text-domain' ),
        'render_callback' => 'module_related_render_callback',
        'category'        => 'roquette',
        'icon'            => 'admin-comments',
        'keywords'        => array( 'example' ),
    ) );

     acf_register_block( array(
        'name'            => 'Bloc FAQ',
        'title'           => __( 'Bloc Faq', 'your-text-domain' ),
        'description'     => __( 'Bloc Faq.', 'your-text-domain' ),
        'render_callback' => 'bloc_faq_render_callback',
        'category'        => 'roquette',
        'icon'            => 'admin-comments',
        'keywords'        => array( 'example' ),
    ) );

     acf_register_block( array(
        'name'            => 'Texte + image',
        'title'           => __( 'Texte + image', 'your-text-domain' ),
        'description'     => __( 'Texte + image.', 'your-text-domain' ),
        'render_callback' => 'strate_texte_image_render_callback',
        'category'        => 'roquette',
        'icon'            => 'admin-comments',
        'keywords'        => array( 'example' ),
    ) );

     acf_register_block( array(
        'name'            => 'Texte en colonnes',
        'title'           => __( 'Texte en colonnes', 'your-text-domain' ),
        'description'     => __( 'Texte en colonnes.', 'your-text-domain' ),
        'render_callback' => 'strate_texte_colonnes_render_callback',
        'category'        => 'roquette',
        'icon'            => 'admin-comments',
        'keywords'        => array( 'example' ),
    ) );
}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function module_related_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render( 'block/articles.twig', $context );
}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function strate_texte_image_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render( 'block/strate_texte_image.twig', $context );
}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function bloc_faq_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render( 'block/bloc_faq.twig', $context );
}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function strate_texte_colonnes_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
    Timber::render( 'block/strate_texte_colonnes.twig', $context );
}