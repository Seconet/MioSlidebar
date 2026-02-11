<?php
// Frontend display for MioSlidebar
 if ( ! defined( 'ABSPATH' ) ) exit;
add_action('wp_footer', 'mio_slidebar_display_frontend');

function mio_slidebar_display_frontend() {
    $options = get_option('mioslidebar_settings');
    
    if (!isset($options['enable_slidebar']) || $options['enable_slidebar'] != '1') {
        return;
    }
    
    $position = isset($options['position']) ? $options['position'] : 'right';
    $bg_color = isset($options['background_color']) ? $options['background_color'] : '#333333';
    $mobile_enabled = isset($options['enable_on_mobile']) ? $options['enable_on_mobile'] : '1'; // Default yes
    
    $position_class = ($position == 'left') ? 'mioslidebar-left' : 'mioslidebar-right';
    $arrow_direction = ($position == 'left') ? 'right' : 'left';
    ?>
    
    <!-- SIDEBAR -->
    <div id="mioslidebar-container" 
         class="mioslidebar-container <?php echo esc_attr($position_class); ?>" 
         style="background-color: <?php echo esc_attr($bg_color); ?>;"
         data-mobile-enabled="<?php echo esc_attr($mobile_enabled); ?>">
        
        <div id="mioslidebar-arrow" class="mioslidebar-arrow">
            <span class="dashicons dashicons-arrow-<?php echo esc_attr($arrow_direction); ?>"></span>
        </div>
        
        <div class="mioslidebar-icons-wrapper">
            <?php for ($i = 1; $i <= 5; $i++):
                $enabled = isset($options["icon_{$i}_enabled"]) ? $options["icon_{$i}_enabled"] : '0';
                $icon_class = isset($options["icon_{$i}_class"]) ? $options["icon_{$i}_class"] : '';
                $icon_url = isset($options["icon_{$i}_url"]) ? $options["icon_{$i}_url"] : '';
                $icon_text = isset($options["icon_{$i}_text"]) ? $options["icon_{$i}_text"] : '';
                $icon_color = isset($options["icon_{$i}_color"]) ? $options["icon_{$i}_color"] : '#ffffff';
                
                if ($enabled == '1' && !empty($icon_class) && !empty($icon_url)): ?>
               
                    <a href="<?php echo esc_url($icon_url); ?>" 
                       class="mioslidebar-icon" 
                       target="_self"
                       rel="noopener noreferrer"
                       title="<?php echo esc_attr($icon_text); ?>"
                       style="color: <?php echo esc_attr($icon_color); ?>;">
                        <span class="<?php echo esc_attr($icon_class); ?>"></span>
                        <?php if (!empty($icon_text)): ?>
                            <span class="mioslidebar-tooltip"><?php echo esc_html($icon_text); ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif;
            endfor; ?>
        </div>
    </div>
    
    <?php
    // Aggiungi CSS inline per nascondere su mobile se disabilitato
    if ($mobile_enabled == '0') {
        ?>
        <style>
        @media (max-width: 768px) {
            #mioslidebar-container[data-mobile-enabled="0"] {
                display: none !important;
            }
        }
        </style>
        <?php
    }
}
