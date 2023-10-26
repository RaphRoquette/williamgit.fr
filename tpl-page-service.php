<?php
/**
 * Template Name: Service
 * Description: Template pour faire une page de service.
 */

$context = Timber::context();
$timber_post     = new Timber\Post();

$context['post'] = $timber_post;
$context['posts'] = new Timber\PostQuery();

Timber::render( array( 'modele/tpl-page-service.twig' ), $context );