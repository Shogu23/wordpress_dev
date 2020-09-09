<?php
add_action( 'wp_enqueue_scripts', 'montheme_child_enqueue_styles' );

function montheme_child_enqueue_styles() {
    $parenthandle = 'style-montheme'; 
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), [$parenthandle] );
}