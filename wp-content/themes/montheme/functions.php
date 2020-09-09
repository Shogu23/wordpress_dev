<?php
add_theme_support( 'post-thumbnails' );
add_shortcode('contact', 'contactForm');

function montheme_load_theme_textdomain() {
    load_theme_textdomain( 'montheme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'montheme_load_theme_textdomain' );

function contactForm(){
    $form = '<h2> Formulaire de contact </h2>
        <form method="post">
            <div>
                <label for="objet">Objet</label>
                <input id="objet" name="objet" type="text">
            </div>
            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message"></textarea>
            </div>
            <button>Envoyer</button>
        </form>
    ';
    return $form;
}


add_action( 'wp_enqueue_scripts', 'theme_name_scripts');
/**
 * Ajoute le fichier style.css à la liste des scripts executés
 *
 * @return void
 */
function theme_name_scripts() {
    wp_enqueue_style( 'style-montheme', get_stylesheet_uri() );
}

add_action( 'widgets_init', 'montheme_add_sidebar');
/**
 * Création des zones de widgets
 *
 * @return void
 */
function montheme_add_sidebar(){
    register_sidebar([
        'id'    => 'sidebar_zone',
        'name'  => __('Sidebar', 'montheme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ]);
    register_sidebar([
        'id'    => 'footer_left',
        'name'  => __('Footer left column', 'montheme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ]);
    register_sidebar([
        'id'    => 'footer_center',
        'name'  => __('Footer center column', 'montheme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ]);
    register_sidebar([
        'id'    => 'footer_right',
        'name'  => __('Footer right column', 'montheme'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ]);

}

add_action('init', 'montheme_add_menu');
/**
 * Creation zone de menu
 *  
 * @return void
 */
function montheme_add_menu(){
    register_nav_menu('main_menu', __('Main menu', 'montheme'));
}

// Personnalisation du theme
// On initialise l'API
add_action('customize_register', 'montheme_options');

/**
 * Options du thème
 *
 * @return void
 */
function montheme_options(WP_Customize_Manager $wp_customize){
    // Sections
    // On crée la section "Affichage"
    $wp_customize->add_section(
        'montheme_show_options',
        [
            'title'       =>    __('Display', 'montheme'),
            'priority'    =>    10,
            'capability'  =>    'edit_theme_options',
            'description' =>    __('Edit theme display options', 'montheme')
        ]
    );

    // On crée la section "Police"
    $wp_customize->add_section(
        'montheme_fonts_options',
        [
            'title'       =>    __('Fonts', 'montheme'),
            'priority'    =>    11,
            'capability'  =>    'edit_theme_options',
            'description' =>    __('Edit theme fonts', 'montheme')
        ]
    );

    // Paramètres (stockage en base de données)
    // Masquer la date
    $wp_customize->add_setting(
        'hide_date',
        [
            'default' => false
        ]
    );
  
    // Masquer la categorie
    $wp_customize->add_setting(
        'hide_categorie',
        [
            'default' => false
        ]
    );

    // Changer couleur titre
    $wp_customize->add_setting(
        'titles_color',
        [
            'default' => '#1DA1F2',
        ]
    );

    // Changer font titre
    $wp_customize->add_setting(
        'titles_font',
        [
            'default' => 'Roboto',
        ]
    );


    
    // Contrôles
    // Case à cocher "Masquer la date"
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'hide_date_control',
            [
                'label'    => __('Hide post date', 'montheme'),
                'section'  => 'montheme_show_options',
                'settings' => 'hide_date', // ATTENTION 1 paramètre mais settingSS
                'type'     => 'checkbox',
                'priority' => 10
            ]
        )
    );

    // Case à cocher "Masquer la categorie"
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'hide_categorie_control',
            [
                'label'    => __('Hide post categories', 'montheme'),
                'section'  => 'montheme_show_options',
                'settings' => 'hide_categorie', // ATTENTION 1 paramètre mais settingSS
                'type'     => 'checkbox',
                'priority' => 9
            ]
        )
    );

    // Color picker pour les titres
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'titles_color_control',
            [
                'label'    => __('Titles color', 'montheme'),
                'section'  => 'colors',
                'settings' => 'titles_color', // ATTENTION 1 paramètre mais settingSS
                'priority' => 10
            ]
        )
    );

    // Color picker pour les titres
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'fonts_control',
            [
                'label'    => __('Titles font', 'montheme'),
                'section'  => 'montheme_fonts_options',
                'settings' => 'titles_font', // ATTENTION 1 paramètre mais settingSS
                'type' => 'select',
                'choices' => [
                    'Anton' => 'Anton', // A gauche info stock dans la base, a droite info visible utilisateur
                    'Courgette' => 'Courgette',
                    'Raleway' => 'Raleway',
                    'Roboto' => 'Roboto'                      
                ],
                'priority' => 10
            ]
        )
    );
} // Fin montheme_options


// On s'accroche (hook) à wp_head
add_action('wp_head', 'injection_css');

/**
 * Cette fonction injecte du CSS dans le "head" du site
 *
 * @return void
 */
function injection_css(){
    $titles_font = get_theme_mod('titles_font', 'Roboto');

    // On génère la balise link
    wp_enqueue_style('titles_font', "https://fonts.googleapis.com/css2?family=$titles_font&display=swap");
?>

    <style>
        .date-article{
            display: <?= (get_theme_mod('hide_date')) ? "none" : "initial" ?>;
        }

        .cat-article{
            display: <?= (get_theme_mod('hide_categorie')) ? "none" : "initial" ?>;
        }

        h1, h2, h3, h4, h5, h6{
            color: <?= get_theme_mod('titles_color'); ?>;
            font-family: "<?= $titles_font ?>", sans-serif;
        }
    </style>
<?php
}
add_action('init', 'montheme_projets');

function montheme_projets(){
    register_post_type(
        'projet',
        [
            'label' => __('Projects', 'montheme'),
            'labels' => [
                'name'          =>    __('Projects', 'montheme'),
                'singular_name' =>    __('Project', 'montheme'),
                'menu_name'     =>    __('Projects', 'montheme'),
                'name_admin_bar'=>    __('Projects', 'montheme'),
                'add_new'       =>    __('Add', 'montheme'),
                'add_new_item'  =>    __('Add project', 'montheme'),
                'new_item'      =>    __('New project', 'montheme'),
                'edit_item'     =>    __('Edit project', 'montheme'),
                'view_item'     =>    __('View project', 'montheme'),
                'view_items'    =>    __('View projects', 'montheme'),
                'all_items'     =>    __('View All', 'montheme'),
                'search_items'  =>    __('Search in projects', 'montheme')
            ],
            'public' => true,
            'capability_type' => 'post',
            'supports' => [
                'title', 'editor', 'thumbnail'
            ],
            'has_archive' => true,
            'show_in_rest' => true,
            'rewrite' => [
                'slug' => 'projets'
            ],
            'taxonomies' => [
                'category', 'post_tag'
            ]
        ]
    );
}



