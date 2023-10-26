<?php

	
function roquette_scripts() {

// Déclaration des sripts et dépendances
wp_deregister_script( 'jquery' );
wp_register_script('jquery', get_template_directory_uri() . '/static/js/jquery/jquery.min.js',false,'3.6.0', true);
wp_register_script('slick', get_template_directory_uri() . '/static/js/slick/slick.min.js', array( 'jquery' ),'1.8.1', true);
wp_register_script('gsap', get_template_directory_uri() . '/static/js/gsap/gsap.min.js', false,'3.9.1', true);
wp_register_script('scrollTrigger', get_template_directory_uri() . '/static/js/gsap/ScrollTrigger.min.js', array( 'gsap' ), '3.9.1', true);
wp_register_script('splitText', get_template_directory_uri() . '/static/js/gsap/SplitText.min.js', array( 'gsap' ), '3.9.1', true);
wp_register_script('fonctions', get_template_directory_uri() . '/static/js/fonctions.js',array( 'jquery' ),'1.0', true);
wp_register_script('animJs', get_template_directory_uri() . '/static/js/animations.js',array( 'jquery' ),'1.0', true);

// Ajout des scripts sur le front
// SLICK
	wp_enqueue_script('slick');
	

// Gsap
// wp_enqueue_script('scrollTrigger');
// wp_enqueue_script('splitText');

// Fonctions JS
wp_enqueue_script('fonctions');

// Animations
// wp_enqueue_script('animJs');
}

add_action( 'wp_enqueue_scripts', 'roquette_scripts' );  