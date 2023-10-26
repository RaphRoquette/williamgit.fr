<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );
/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );


// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );


		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/* functions.php */
add_filter( 'timber_context', 'add_to_context'  );

function add_to_context( $context ) {
    $sousMenus = array(
	'depth' => 3,
	);
    $context['menu'] = new \Timber\Menu( 'menu-principal',$sousMenus );
    $context['options'] = get_fields('options');
    $context['is_single'] = is_single();
	$context['is_page'] = is_page();
	$context['is_category'] = is_category();
	$context['is_accueil'] = is_front_page();
    return $context;
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Options',
		'menu_slug' 	=> 'coordonnees',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

/**
 * Add a block category for "Get With Gutenberg" if it doesn't exist already.
 *
 * @param array $categories Array of block categories.
 *
 * @return array
 */
function gwg_block_categories( $categories ) {
    $category_slugs = wp_list_pluck( $categories, 'slug' );
    return in_array( 'roquette', $category_slugs, true ) ? $categories : array_merge(
        $categories,
        array(
            array(
                'slug'  => 'roquette',
                'title' => __( 'Blocs Roquette', 'roquette' ),
                'icon'  => null,
            ),
        )
    );
}
add_filter( 'block_categories_all', 'gwg_block_categories' );

// Init des blocks ACF pour WP et Timber
$init_acf_blocs = __DIR__ . '/fonctions/blocks/acf-blocks.php';
require_once $init_acf_blocs;

// Init des custom post type
// $init_cpt = __DIR__ . '/fonctions/cpt/cpt.php';
// require_once $init_cpt;

// Init des custom taxonomy
// $init_ct = __DIR__ . '/fonctions/cpt/ct.php';
// require_once $init_ct;

// Init des CSS du theme
$init_css = __DIR__ . '/fonctions/scripts/css.php';
require_once $init_css;

// Init des JS du theme
$init_js = __DIR__ . '/fonctions/scripts/js.php';
require_once $init_js;


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	
	// Remove from TinyMCE
	// add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

function sp_pro_breadcrumbs_css() { 
	//Disable breadcrumbs inline CSS 
	return false; 
}
add_action('seopress_pro_breadcrumbs_css', 'sp_pro_breadcrumbs_css');

// Création du rôle client
add_role(
    'gestionnaire',
    __( 'Gestionnaire', 'gestionnaire' ),
    array(
    )
);

// AJOUT classe CTA au submit des formulaires
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='cta' id='gform_submit_button_{$form['id']}'><span>Envoyer</span></button>";
}

// Suppression des couleurs persos dans l'editeur Gutenberg
add_theme_support( 'disable-custom-colors' );

// Ajout des couleurs du config.scss dans l'editeur Gutenberg

// function mytheme_setup_theme_supported_features() {

// 	add_theme_support( 'editor-color-palette',
// 		[
// 			[ 'name' => 'texte', 'slug' => 'txt', 'color' => '#000000' ],
// 			[ 'name' => 'Tonique 1', 'slug' => 'tonique1', 'color' => '#76c18f' ],
// 			[ 'name' => 'Tonique 2', 'slug' => 'tonique2', 'color' => '#000000' ],
// 			[ 'name' => 'Complémentaire', 'slug' => 'complementaire', 'color' => '#CCCCCC' ]
// 		]
// 	);
// }


// add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

// Suppression des commentaires
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
     
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
 
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
 
// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
 
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
 
// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
 
// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

function script_cookies() {
	if( get_field("script_bandeau_cookie","option") ) {
		echo '<script src="https://tarteaucitron.io/load.js?domain='.$_SERVER['SERVER_NAME'].'&uuid=9169ca1d310af79beda444c3c35ff10e02ed8afc"></script>';
	}
}
add_action( 'wp_head', 'script_cookies' );

// AJout de SVG depuis le back
// function wpc_mime_types($mimes) {
// 	$mimes['svg'] = 'image/svg+xml';
// 	return $mimes;
// }
// add_filter('upload_mimes', 'wpc_mime_types');