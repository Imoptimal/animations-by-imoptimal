<?php
/*
   Plugin Name: Animations by Imoptimal
   Plugin URI: https://github.com/Imoptimal/animations-by-imoptimal
   Description: Make anything on Your website animate when its inside the screens viewport (using CSS selectors). It includes more than 70 types of animation (from animate.css library), and provides option to set the animation duration, number of repetitions, animation delay, as well as the option to trigger animation repeatedly every time the selected items enter screens viewport.
   Version: 1.0.0
   Author: Imoptimal
   Author URI: https://www.imoptimal.com/
   Requires at least: 4.9.8
   Requires PHP: 5.6
   License: GNU General Public License v3 or later
   License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
   Text Domain: imoptimal
   Domain Path: /lang
   */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die();
}

if(!function_exists('imoptimal_animation')) {

    function imoptimal_animation() {

        class Imoptimal_Animation {    

            public static function include_files() {
                include_once(plugin_dir_path( __FILE__ ) . 'inc/register-settings.php');
                include_once(plugin_dir_path( __FILE__ ) . 'inc/render-fields.php');
                include_once(plugin_dir_path( __FILE__ ) . 'inc/options-page.php');
                include_once(plugin_dir_path( __FILE__ ) . 'inc/enqueue-resources.php');
            }
        }
        Imoptimal_Animation::include_files();

    }
    add_action( 'init', 'imoptimal_animation' );
}
?>