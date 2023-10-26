<?php
/**
 * Template Name: Accueil
 * Description: Template de la page accueil
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

$posts = 'post_type=post&numberposts=3';
$context['posts'] = Timber::get_posts( $posts );

Timber::render( array( 'modele/tpl-accueil.twig' ), $context );