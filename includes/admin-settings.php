<?php
// Admin settings for MioSlidebar
 if ( ! defined( 'ABSPATH' ) ) exit;

// Registra le impostazioni
add_action('admin_init', 'mio_slidebar_register_settings');

function mio_slidebar_register_settings() {
    // Registra le opzioni
    register_setting('mioslidebar_options', 'mioslidebar_settings', 'mio_slidebar_sanitize_settings');
    
    // Sezione generale
    add_settings_section(
        'mioslidebar_general_section',
        __('General Settings', 'mio-slide-bar'),
        'mioslidebar_general_section_callback',
        'miopgb'
    );
    
    // Campo per abilitare/disabilitare
    add_settings_field(
        'enable_slidebar',
        __('Enable Slidebar', 'mio-slide-bar'),
        'mioslidebar_enable_field_callback',
        'miopgb',
        'mioslidebar_general_section'
    );

     // Campo per abilitare/disabilitare su mobile
    add_settings_field(
    'enable_on_mobile',
    __('Show on Mobile Devices', 'mio-slide-bar'),
    'mioslidebar_mobile_field_callback',
    'miopgb',
    'mioslidebar_general_section'
);

    
    // Campo per la posizione
    add_settings_field(
        'slidebar_position',
        __('Position', 'mio-slide-bar'),
        'mioslidebar_position_field_callback',
        'miopgb',
        'mioslidebar_general_section'
    );
    
    // Campo per colore di sfondo
    add_settings_field(
        'background_color',
        __('Background Color', 'mio-slide-bar'),
        'mioslidebar_background_color_callback',
        'miopgb',
        'mioslidebar_general_section'
    );
    
    // Sezione per le icone
    add_settings_section(
        'mioslidebar_icons_section',
        __('Icon Settings', 'mio-slide-bar'),
        'mioslidebar_icons_section_callback',
        'miopgb'
    );
    
    // Aggiunge campi dinamici per le icone
    $icons = get_option('mioslidebar_icons', array());
    
    for ($i = 1; $i <= 5; $i++) { // change this for must icons
        add_settings_field(
            "icon_{$i}_settings",
            /* translators:  %d: Icon */
            sprintf(__('Icon %d', 'mio-slide-bar'), $i),
            function() use ($i) {
                mio_slidebar_icon_fields_callback($i);
            },
            'miopgb',
            'mioslidebar_icons_section'
        );
    }
}

// Callback per la sezione generale
function mioslidebar_general_section_callback() {
    echo '<p>' . esc_html__('Configure the general settings for the slidebar.', 'mio-slide-bar') . '</p>';
}

// Callback per abilitare/disabilitare
function mioslidebar_enable_field_callback() {
    $options = get_option('mioslidebar_settings');
    $enabled = isset($options['enable_slidebar']) ? $options['enable_slidebar'] : '1';
    ?>
    <select name="mioslidebar_settings[enable_slidebar]">
        <option value="1" <?php selected($enabled, '1'); ?>><?php esc_html_e('Enabled', 'mio-slide-bar'); ?></option>
        <option value="0" <?php selected($enabled, '0'); ?>><?php esc_html_e('Disabled', 'mio-slide-bar'); ?></option>
    </select>
    <?php
}

// Callback per abilitare/disabilitare su Mobile
function mioslidebar_mobile_field_callback() {
    $options = get_option('mioslidebar_settings');
    $mobile_enabled = isset($options['enable_on_mobile']) ? $options['enable_on_mobile'] : '0'; // Default: 0 (no)
    // $mobile_enabled = isset($options['enable_on_mobile']) ? $options['enable_on_mobile'] : '1'; 
    ?>
    <select name="mioslidebar_settings[enable_on_mobile]">
        <option value="1" <?php selected($mobile_enabled, '1'); ?>><?php esc_html_e('Yes', 'mio-slide-bar'); ?></option>
        <option value="0" <?php selected($mobile_enabled, '0'); ?>><?php esc_html_e('No', 'mio-slide-bar'); ?></option>
    </select>
    <p class="description"><?php esc_html_e('Disable slidebar on mobile devices for better user experience', 'mio-slide-bar'); ?></p>
    <?php
}


// Callback per la posizione
function mioslidebar_position_field_callback() {
    $options = get_option('mioslidebar_settings');
    $position = isset($options['position']) ? $options['position'] : 'right';
    ?>
    <select name="mioslidebar_settings[position]">
        <option value="right" <?php selected($position, 'right'); ?>><?php esc_html_e('Right', 'mio-slide-bar'); ?></option>
        <option value="left" <?php selected($position, 'left'); ?>><?php esc_html_e('Left', 'mio-slide-bar'); ?></option>
    </select>
    <?php
}

// Callback per colore di sfondo
function mioslidebar_background_color_callback() {
    $options = get_option('mioslidebar_settings');
    $color = isset($options['background_color']) ? $options['background_color'] : '#333333';
    ?>
    <input type="color" name="mioslidebar_settings[background_color]" value="<?php echo esc_attr($color); ?>" />
    <span class="description"><?php esc_html_e('Select background color for the slidebar', 'mio-slide-bar'); ?></span>
    <?php
}

// Callback per la sezione icone
function mioslidebar_icons_section_callback() {
    echo '<p>' . esc_html__('Configure your icons and links. Leave fields empty to hide an icon.', 'mio-slide-bar') . '</p>';
}


// Callback per i campi delle icone
function mio_slidebar_icon_fields_callback($icon_number) {
    $options = get_option('mioslidebar_settings');
    $icon_enabled = isset($options["icon_{$icon_number}_enabled"]) ? $options["icon_{$icon_number}_enabled"] : '1';
    $icon_class = isset($options["icon_{$icon_number}_class"]) ? $options["icon_{$icon_number}_class"] : 'dashicons dashicons-email';
    $icon_url = isset($options["icon_{$icon_number}_url"]) ? $options["icon_{$icon_number}_url"] : '';
    $icon_text = isset($options["icon_{$icon_number}_text"]) ? $options["icon_{$icon_number}_text"] : '';
    $icon_color = isset($options["icon_{$icon_number}_color"]) ? $options["icon_{$icon_number}_color"] : '#ffffff';
    ?>
    <div class="icon-settings-group">
        <h4><?php
         /* translators:  %d: Icon setting */
        echo sprintf(esc_html__('Icon %d Settings', 'mio-slide-bar'), esc_attr($icon_number) ); 
        ?></h4>
        
        <p>
            <label>
                <input type="checkbox" name="mioslidebar_settings[icon_<?php echo esc_attr($icon_number); ?>_enabled]" value="1" <?php checked($icon_enabled, '1'); ?> />
                <?php esc_html_e('Enable this icon', 'mio-slide-bar'); ?>
            </label>
        </p>
        
        <p>
            <label><?php esc_html_e('Icon Class:', 'mio-slide-bar'); ?><br />
                <input type="text" name="mioslidebar_settings[icon_<?php echo esc_attr($icon_number); ?>_class]" value="<?php echo esc_attr($icon_class); ?>" class="regular-text" />
                <span class="description"><?php esc_html_e('Use Dashicons classes (e.g., dashicons dashicons-email) or Font Awesome classes', 'mio-slide-bar'); ?></span>
            </label>
        </p>
        
        <p>
            <label><?php esc_html_e('Link URL:', 'mio-slide-bar'); ?><br />
                <input type="url" name="mioslidebar_settings[icon_<?php echo esc_attr($icon_number); ?>_url]" value="<?php echo esc_url($icon_url); ?>" class="regular-text" placeholder="https://example.com" />
            </label>
        </p>
        
        <p>
            <label><?php esc_html_e('Tooltip Text:', 'mio-slide-bar'); ?><br />
                <input type="text" name="mioslidebar_settings[icon_<?php echo esc_attr($icon_number); ?>_text]" value="<?php echo esc_attr($icon_text); ?>" class="regular-text" />
            </label>
        </p>
        
        <p>
            <label><?php esc_html_e('Icon Color:', 'mio-slide-bar'); ?><br />
                <input type="color" name="mioslidebar_settings[icon_<?php echo esc_attr($icon_number); ?>_color]" value="<?php echo esc_attr($icon_color); ?>" />
            </label>
        </p>
        
        <hr />
    </div>
    <?php
}

// Sanitizza le impostazioni
function mio_slidebar_sanitize_settings($input) {
    $sanitized = array();
    
    // Sanitizza i campi generali
    $sanitized['enable_slidebar'] = isset($input['enable_slidebar']) ? sanitize_text_field($input['enable_slidebar']) : '1';
    $sanitized['enable_on_mobile'] = isset($input['enable_on_mobile']) ? sanitize_text_field($input['enable_on_mobile']) : '0';
    $sanitized['position'] = isset($input['position']) && in_array($input['position'], array('left', 'right')) ? $input['position'] : 'right';
    $sanitized['background_color'] = isset($input['background_color']) ? sanitize_hex_color($input['background_color']) : '#333333';
    
    // Sanitizza i campi delle icone
    for ($i = 1; $i <= 5; $i++) {
        $sanitized["icon_{$i}_enabled"] = isset($input["icon_{$i}_enabled"]) ? '1' : '0';
        $sanitized["icon_{$i}_class"] = isset($input["icon_{$i}_class"]) ? sanitize_text_field($input["icon_{$i}_class"]) : '';
        $sanitized["icon_{$i}_url"] = isset($input["icon_{$i}_url"]) ? esc_url_raw($input["icon_{$i}_url"]) : '';
        $sanitized["icon_{$i}_text"] = isset($input["icon_{$i}_text"]) ? sanitize_text_field($input["icon_{$i}_text"]) : '';
        $sanitized["icon_{$i}_color"] = isset($input["icon_{$i}_color"]) ? sanitize_hex_color($input["icon_{$i}_color"]) : '#ffffff';
    }
    
    return $sanitized;
}

// Pagina delle opzioni HTML
function mio_slidebar_options_page_html() {
    // Controlla i permessi
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <div class="mioslidebar-admin-container">
            <div class="mioslidebar-admin-content">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('mioslidebar_options');
                    do_settings_sections('miopgb');
                    submit_button(__('Save Settings', 'mio-slide-bar'));
                    ?>
                </form>
            </div>
            <div class="mioslidebar-admin-sidebar">
                <div class="mioslidebar-admin-box">
                    <h3><?php esc_html_e('Plugin Information', 'mio-slide-bar'); ?></h3>
                    <p><strong><?php esc_html_e('Version:', 'mio-slide-bar'); ?></strong> <?php echo esc_html(MIOSLIDEBAR_VERSION); ?></p>
                    <p><strong><?php esc_html_e('Author:', 'mio-slide-bar'); ?></strong> Sergio Cornacchione</p>
                </div>
                <div class="mioslidebar-admin-box">
                    <h3><?php esc_html_e('How to Use', 'mio-slide-bar'); ?></h3>
                    <ol>
                        <li><?php esc_html_e('Enable/disable the slidebar', 'mio-slide-bar'); ?></li>
                        <li><?php esc_html_e('Choose left or right position', 'mio-slide-bar'); ?></li>
                        <li><?php esc_html_e('Configure up to 5 icons with links and tooltips', 'mio-slide-bar'); ?></li>
                        <li><?php esc_html_e('Customize colors to match your theme', 'mio-slide-bar'); ?></li>
                        <li><?php esc_html_e('Save and view your website!', 'mio-slide-bar'); ?></li>
                    </ol>
                </div>
                <div class="mioslidebar-admin-box">
                    <h3><?php esc_html_e('Icon Classes', 'mio-slide-bar'); ?></h3>
                    <p><?php esc_html_e('Use Dashicons (e.g.):', 'mio-slide-bar'); ?></p>
                    <ul>
                        <li>dashicons dashicons-email</li>
                        <li>dashicons dashicons-phone</li>
                        <li>dashicons dashicons-facebook</li>
                        <li>dashicons dashicons-whatsapp</li>
                        <li>dashicons dashicons-instagram</li>
                    </ul>
                    <p><?php esc_html_e('Or Font Awesome classes if you have Font Awesome installed.', 'mio-slide-bar'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Aggiunge la pagina del menu admin
add_action('admin_menu', 'mio_slidebar_options_page');

function mio_slidebar_options_page() {
    add_menu_page(
        'MioSlide Bar Settings',
        'MioSlide Bar',
        'manage_options',
        'miopgb',
        'mio_slidebar_options_page_html',
        'dashicons-slides',
        20
    );
}

// Aggiunge stili per l'admin
add_action('admin_enqueue_scripts', 'mio_slidebar_admin_styles');

function mio_slidebar_admin_styles($hook) {
    if ($hook != 'toplevel_page_miopgb') {
        return;
    }
    
    wp_enqueue_style(
        'mio-slide-bar-admin',
        MIOSLIDEBAR_PLUGIN_URL . 'assets/css/admin-style.css',
        array(),
        MIOSLIDEBAR_VERSION
    );
}