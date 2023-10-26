<?php
/**
 * Template Name: Pleine largeur
 * Description: Template pour faire du design bord à bord.
 */

$context = Timber::context();
$timber_post     = new Timber\Post();

$context['post'] = $timber_post;
$context['posts'] = new Timber\PostQuery();

Timber::render( array( 'modele/tpl-page-pleine-largeur.twig' ), $context );