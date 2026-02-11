<?php
// If uninstall not called from WordPress, exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Delete plugin options
delete_option( 'mioslidebar_settings' );

// Remove any transients - CON PREFISSO
$mioslidebar_transients = array(
    'mioslidebar_cache',
    'mioslidebar_settings_cache',
    'mioslidebar_icons_cache',
);

foreach ( $mioslidebar_transients as $mioslidebar_transient ) {
    delete_transient( $mioslidebar_transient );
}

// Clear any cached data
if ( function_exists( 'wp_cache_flush' ) ) {
    wp_cache_flush();
}

// Remove any scheduled events
$mioslidebar_timestamp = wp_next_scheduled( 'mioslidebar_daily_cleanup' );
if ( $mioslidebar_timestamp ) {
    wp_unschedule_event( $mioslidebar_timestamp, 'mioslidebar_daily_cleanup' );
}