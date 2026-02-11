<?php
// Enqueue scripts and styles for MioSlidebar
 if ( ! defined( 'ABSPATH' ) ) exit;
// Frontend scripts e stili
add_action('wp_enqueue_scripts', 'mio_slidebar_frontend_scripts');

function mio_slidebar_frontend_scripts() {
    $options = get_option('mioslidebar_settings');
    
    if (!isset($options['enable_slidebar']) || $options['enable_slidebar'] != '1') {
        return;
    }
    
    // Carica Dashicons
    wp_enqueue_style('dashicons');
    
    // Stili del plugin
    wp_enqueue_style(
        'mio-slide-bar-style',
        MIOSLIDEBAR_PLUGIN_URL . 'assets/css/frontend-style.css',
        array(),
        MIOSLIDEBAR_VERSION
    );
    
    // Script del plugin
    wp_enqueue_script(
        'mio-slide-bar-script',
        MIOSLIDEBAR_PLUGIN_URL . 'assets/js/frontend-script.js',
        array('jquery'),
        MIOSLIDEBAR_VERSION,
        true
    );
    
    // Passa variabili allo script
    wp_localize_script('mio-slide-bar-script', 'mioslidebar_vars', array(
        'position' => isset($options['position']) ? $options['position'] : 'right'
    ));
}