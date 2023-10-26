<?php
/**
 * Template Name: Petite  largeur
 * Description: Template pour faire du contenu centré.
 */

$context = Timber::context();
$timber_post     = new Timber\Post();

$context['post'] = $timber_post;
$context['posts'] = new Timber\PostQuery();

Timber::render( array( 'modele/tpl-page-petite-largeur.twig' ), $context );