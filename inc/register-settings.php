<?php
add_action( 'admin_menu', 'imo_add_admin_menu' );
add_action( 'admin_init', 'imo_meta_init' );
add_action( 'admin_init', 'imo_settings_init' );

function imo_add_admin_menu() {

    add_submenu_page( 'options-general.php', // parent menu item - general settings in this case
                     'Animations by Imoptimal', // plugin's menu item title
                     'Animations by Imoptimal', // plugin's settings page title
                     'activate_plugins', // (user role) capability - restricted to admins
                     'imo_animations', // menu slug
                     'imo_options_page' ); //output function
}

function imo_meta_init() {

    register_setting( 'imo_meta_group', // option group
                     'imo_meta', // option name
                     'imo_validate_meta' // validate function
                    );
    // Number of groups selection section
    add_settings_section(
        'imo_numbers_section', // id
        '', // title
        'imo_settings_section_callback', // callback function 
        'imo_meta_group' // option group
    );

    add_settings_field( 
        'imo_numbers_field', // id
        'a) ' . esc_html__( 'Choose how many groups of items you need (to target with different type of animation)', 'imoptimal' ), // title
        'imo_numbers_render', // callback function
        'imo_meta_group', // option group
        'imo_numbers_section' // field output section
    );
    // Minification section
    add_settings_section(
        'imo_minification_section',
        '',
        'imo_settings_section_callback',
        'imo_meta_group'
    );

    add_settings_field( 
        'imo_minification_field',
        'b) ' . esc_html__( 'Choose if the plugin files (styles and scripts) will be loaded in regular or minified version', 'imoptimal' ),
        'imo_minification_render',
        'imo_meta_group',
        'imo_minification_section'
    );

}

function imo_settings_init() { 

    register_setting( 'imo_animations_group', // option group
                     'imo_settings', // option name
                     'imo_validate_settings' // validate function
                    );

    $options = get_option( 'imo_meta' );
    $numberChoosen = $options['imo_numbers_field'];
    if ( empty($numberChoosen) ) $numberChoosen = 1;
    // Main section loop
    for ($i = 1; $i <= $numberChoosen; $i++) {
    
        add_settings_section(
            'imo_animations_group_section_' . $i, // id
            '<div class="imo-collapsible">
            <div class="group-title">' . esc_html__( 'Animation Group', 'imoptimal' ) . ' #' . $i . '</div> 
            <div class="imo-info"></div> 
            <div class="collapsible-icon"></div>
            </div>',  // title
            'imo_settings_section_callback', // callback function 
            'imo_animations_group' // option group
        );

        add_settings_field( 
            'imo_items_' . $i, // id
            '1. ' . esc_html__( 'Items to animate (use CSS selectors). Separate individual items by commas', 'imoptimal' ),  // title
            'imo_items_render',  // callback function
            'imo_animations_group', // option group
            'imo_animations_group_section_' . $i, // field output section
            array( // Args
                'index' => $i,
            )
        );

        add_settings_field( 
            'imo_animation_type_'  . $i, 
            '2. ' .esc_html__('Select the animation type', 'imoptimal' ), 
            'imo_animation_type_render', 
            'imo_animations_group', 
            'imo_animations_group_section_' . $i,
            array( // Args
                'index' => $i,
            )
        );

        add_settings_field( 
            'imo_animation_duration_'  . $i, 
            '3. ' .esc_html__('Choose the duration of the animation', 'imoptimal' ), 
            'imo_animation_duration_render', 
            'imo_animations_group', 
            'imo_animations_group_section_' . $i,
            array( // Args
                'index' => $i,
            ) 
        );

        add_settings_field( 
            'imo_animation_repetition_'  . $i, 
            '4. ' . esc_html__('Choose the repetition count of the animation', 'imoptimal' ), 
            'imo_animation_repetition_render', 
            'imo_animations_group', 
            'imo_animations_group_section_' . $i,
            array( // Args
                'index' => $i,
            )
        );
        
        add_settings_field( 
            'imo_timing_'  . $i, 
            '5. ' . esc_html__('Choose the speed curve of the selected animation', 'imoptimal' ), 
            'imo_animation_timing_render', 
            'imo_animations_group', 
            'imo_animations_group_section_' . $i,
            array( // Args
                'index' => $i,
            )
        );

        add_settings_field( 
            'imo_delay_'  . $i, 
            '6. ' . esc_html__('Choose the delay of animation when entering screens viewport', 'imoptimal' ), 
            'imo_animation_delay_render', 
            'imo_animations_group', 
            'imo_animations_group_section_' . $i,
            array( // Args
                'index' => $i,
            )
        );
        
        add_settings_field( 
            'imo_reanimation_'  . $i, 
            '7. ' . esc_html__('Choose if the animation will be triggered repeatedly every time selected items enter screens viewport. There is also an option to trigger animation on mouse hover or screen tap instead.', 'imoptimal' ), 
            'imo_reanimation_render', 
            'imo_animations_group', 
            'imo_animations_group_section_' . $i,
            array( // Args
                'index' => $i,
            )
        );
    }
}

function imo_validate_settings( $input ) {

    // Create our array for storing the validated options
    $output = array();

    foreach( $input as $key => $value ) {

        // Check to see if the current option has a value. If so, process it.
        if( isset( $input[$key] ) ) {

            // Strip all HTML and PHP tags and properly handle quoted strings
            $output[$key] = sanitize_textarea_field( $input[ $key ] );

        } // end if
    } // end foreach
    // Return the array processing any additional functions filtered by this action
    return apply_filters( 'imo_settings', $output, $input );
}

function imo_validate_meta( $input ) {

    // Create our array for storing the validated options
    $output = array();

    foreach( $input as $key => $value ) {

        // Check to see if the current option has a value. If so, process it.
        if( isset( $input[$key] ) ) {

            // Strip all HTML and PHP tags and properly handle quoted strings
            $output[$key] = sanitize_textarea_field( $input[ $key ] );

        } // end if
    } // end foreach
    // Return the array processing any additional functions filtered by this action
    return apply_filters( 'imo_meta', $output, $input );
}

function imo_settings_section_callback() {
}

?>