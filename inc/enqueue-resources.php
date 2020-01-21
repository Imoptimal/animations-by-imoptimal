<?php
// Public resources
add_action('wp_enqueue_scripts', 'imoanim_public_resources');

if(!function_exists('imoanim_public_resources')) {
    function imoanim_public_resources() {
        $options = get_option( 'imoanim_settings' );

        wp_register_script('imoptimal-public-script', plugin_dir_url( __FILE__ ) . '../js/imoptimal-public.js', array('jquery'), true);
        wp_register_script('imoptimal-public-script-min', plugin_dir_url( __FILE__ ) . '../js/imoptimal-public-min.js', array('jquery'), true);

        // Passing php option variables into the javascript
        $options_array = get_option('imoanim_settings');

        // Dividing single array into groups of 7 (based on number of fields)
        $divided_array = array_chunk($options_array, 7, true);

        // Reset array keys to numbers
        $numeric_array = array_map('array_values', $divided_array);

        // Set up function to change key names in a multidimensional array (all levels)
        function change_keys($arr, $set) {
            //$arr => original array
            //$set => array containing old keys as keys and new keys as values
            if (is_array($arr) && is_array($set)) {
                $newArr = array();
                foreach ($arr as $k => $v) {
                    $key = array_key_exists( $k, $set) ? $set[$k] : $k;
                    $newArr[$key] = is_array($v) ? change_keys($v, $set) : $v;
                }
                return $newArr;
            }
            return $arr;
        }

        $renamed_array = change_keys($numeric_array, array(
            '0' => 'imoanim_items',
            '1' => 'imoanim_animation_type',
            '2' => 'imoanim_animation_duration',
            '3' => 'imoanim_animation_repetition',
            '4' => 'imoanim_animation_timing',
            '5' => 'imoanim_animation_delay',
            '6' => 'imoanim_reanimation'
        ));

        // Reset first level keys to index numbers
        $reset_array = array_values($renamed_array);

        wp_localize_script('imoptimal-public-script', 'imoptimalPhp', $reset_array);
        wp_localize_script('imoptimal-public-script-min', 'imoptimalPhp', $reset_array);

        $optionsMeta = get_option( 'imoanim_meta' );

        if ($optionsMeta['imoanim_minification_field'] == 1) { // if minified selected

            wp_enqueue_script('imoptimal-public-script-min');
            wp_enqueue_style( 'imoptimal-public-style-min', plugin_dir_url( __FILE__ ) . '../css/imoptimal-public-min.css', array());

        } else { // not minified

            wp_enqueue_script('imoptimal-public-script');
            wp_enqueue_style( 'imoptimal-public-style', plugin_dir_url( __FILE__ ) . '../css/imoptimal-public.css', array());

        }

    }
}

// Admin resources
add_action('admin_enqueue_scripts', 'imoanim_admin_resources');

if(!function_exists('imoanim_admin_resources')) {
    function imoanim_admin_resources($hook) {
        // used print_r(get_current_screen();) under ID = $hook
        if ( 'settings_page_imoanim_animations' != $hook ) {
            return;
        }

        $optionsMeta = get_option( 'imoanim_meta' );

        wp_register_script('imoptimal-admin-script', plugin_dir_url( __FILE__ ) . '../js/imoptimal-admin.js', array('jquery'), true);
        wp_register_script('imoptimal-admin-script-min', plugin_dir_url( __FILE__ ) . '../js/imoptimal-admin-min.js', array('jquery'), true);

        $translateEmpty = esc_html__('No items selected', 'imoptimal_animation');
        $translateSelected = esc_html__('Selected item(s) to be animated: ', 'imoptimal_animation');

        wp_localize_script('imoptimal-admin-script', 'imoptimalPhp', array(
            'empty' => $translateEmpty,
            'selected' => $translateSelected
        ));

        wp_localize_script('imoptimal-admin-script-min', 'imoptimalPhp', array(
            'empty' => $translateEmpty,
            'selected' => $translateSelected
        ));

        if ($optionsMeta['imoanim_minification_field'] == 1) { // if minified selected

            wp_enqueue_script('imoptimal-admin-script-min');
            wp_enqueue_style('imoptimal-admin-style-min', plugin_dir_url( __FILE__ ) . '../css/imoptimal-admin-min.css', array());

        } else { // not minified

            wp_enqueue_script('imoptimal-admin-script');
            wp_enqueue_style('imoptimal-admin-style', plugin_dir_url( __FILE__ ) . '../css/imoptimal-admin.css', array());

        }
    }
}
?>