<?php
/**
 * @package MioSlidebar
 */

 /**
 * Plugin Name:       MioSlide Bar
 * Plugin URI:        https://github.com/Seconet/MioSlidebar
 * Description:       Add customizable media buttons slidebar to the right or left side of your website.
 * Version:           1.0.0
 * Author:            Sergio Cornacchione
 * Author URI:        https://seconet.it
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mio-slide-bar 
 * Domain Path:       /languages
 * Note The plugin use Dashicons wordpress and/or Font Awesome if installed
 */

// Exit if accessed directly.
if (! defined('ABSPATH')) {
    exit;
}

// Definisce le costanti del plugin
define('MIOSLIDEBAR_VERSION', '1.0.1');
define('MIOSLIDEBAR_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MIOSLIDEBAR_PLUGIN_URL', plugin_dir_url(__FILE__));

// Inizializza il plugin
add_action('plugins_loaded', 'mio_slidebar_init');

function mio_slidebar_init() {
    // Carica le funzionalità
    require_once MIOSLIDEBAR_PLUGIN_DIR . 'includes/admin-settings.php';
    require_once MIOSLIDEBAR_PLUGIN_DIR . 'includes/frontend-display.php';
    require_once MIOSLIDEBAR_PLUGIN_DIR . 'includes/enqueue-scripts.php';
}