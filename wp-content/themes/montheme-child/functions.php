<?php
add_action( 'wp_enqueue_scripts', 'montheme_child_enqueue_styles' );

function montheme_child_enqueue_styles() {
    $parenthandle = 'style-montheme'; 
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), [$parenthandle] );
}

// On initialise l'API
add_action('customize_register', 'montheme_child_options');

function montheme_child_options(WP_Customize_Manager $wp_customize){
    // Changer font
    $wp_customize->add_setting(
        'all_font',
        [
            'default' => 'Roboto',
        ]
    );
    
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'all_font_control',
            [
                'label'    => __('All font', 'monthemechild'),
                'section'  => 'montheme_fonts_options',
                'settings' => 'all_font', // ATTENTION 1 paramètre mais settingSS
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

}

// On s'accroche (hook) à wp_head
add_action('wp_head', 'child_injection_css');

function child_injection_css(){
    $all_font = get_theme_mod('all_font', 'Roboto');

    // On génère la balise link
    wp_enqueue_style('all_font', "https://fonts.googleapis.com/css2?family=$all_font&display=swap");
?>

    <style>
        :not(h1), :not(h2), :not(h3), :not(h4), :not(h5), :not(h6){
            font-family: "<?= $all_font ?>", sans-serif;
        }

    </style>
<?php
}