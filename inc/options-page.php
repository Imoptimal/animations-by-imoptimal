<?php
function imo_options_page() {
?>
<div id="imo-options" class="imo-wrap">
    <h1>
        <span class="imo-title"><?php esc_html_e('Animations by Imoptimal', 'imoptimal'); ?></span>
        <a class="imo-logo" href="https://www.imoptimal.com/" target="_blank"></a>
    </h1>

    <h2 class="imo-instructions"><?php esc_html_e('Instructions', 'imoptimal'); ?><span class="pointer"></span></h2>

    <ol class="imo-list">
        <li>a) <?php esc_html_e('First of all, set the number of animation groups that you can target with different animation settings (up to 100 groups).', 'imoptimal'); ?></li>
        <li>b) <?php esc_html_e('Choose if the plugin files (styles and scripts) will be loaded in regular or minified version. Default: not minified.', 'imoptimal'); ?></li>
        <li><?php esc_html_e('Open each animation group by clicking on its title bar.', 'imoptimal'); ?></li>
        <li>1. <?php esc_html_e('Add the items you would like to animate either when they enter the screens viewport (visible area of a web page), or when they are hovered on/tapped on touchscreen.', 'imoptimal');?></li>
        <li>2. <?php esc_html_e('Select the type of animation for that group of items (check the preview on every selection to see the effect in action).', 'imoptimal'); ?></li>
        <li>3. <?php esc_html_e('Choose the duration of the animation (0.5 - 5 sec; with increments of 0.1 sec).', 'imoptimal'); ?></li>
        <li>4. <?php esc_html_e('Choose the repetition of the animation (1 - 5 times; Infinite is also an option).', 'imoptimal'); ?></li>
        <li>5. <?php esc_html_e('Choose the speed curve of the selected animation. Default: linear.', 'imoptimal'); ?></li>
        <li>6. <?php esc_html_e('Choose the delay duration of animation when entering screens viewport (0.1 - 5 sec; with increments of 0.1 sec). Default: no delay.', 'imoptimal'); ?></li>
        <li>7. <?php esc_html_e('Choose if the animation will be triggered every time selected items enter screens viewport. There is also an option to trigger animation on hover/tapped on touchscreen instead. Default: false.', 'imoptimal'); ?></li>
    </ol>

    <p class="note"><?php esc_html_e('Note: "Save Meta Options" button is used to save the number of animation groups and the minification of plugin files, while "Save Animation Options" button is used for all of the options inside of every animation group.', 'imoptimal'); ?></p>

    <noscript><?php esc_html_e('IMPORTANT: Javascript must be turned ON in your browser settings in order for this plugin to work!', 'imoptimal'); ?></noscript>

    <div class="imo-content">

        <form action='options.php' method='post' id='imo-meta'>
            <div class="meta-border-top"><span><?php esc_html_e('Meta Options', 'imoptimal') ?></span></div>
            <?php 
    settings_fields( 'imo_meta_group' );
                             do_settings_sections( 'imo_meta_group' );
                             submit_button(esc_html('Save meta options', 'imoptimal'));
            ?>
            <div class="meta-border-bottom"><span><?php esc_html_e('Animation Options', 'imoptimal') ?></span></div>
        </form>

        <form action='options.php' method='post' id='imo-animations'>
            <?php 
                settings_fields( 'imo_animations_group' );
                             do_settings_sections( 'imo_animations_group' );
                             submit_button(esc_html('Save animation options', 'imoptimal'));
            ?>
            <div class="animations-border-bottom"></div>
        </form>

        <div class="imo-sidebar">

            <div class="rating">
                <h3><?php esc_html_e('Ratings & Reviews', 'imoptimal'); ?></h3>
                <p>
                    <strong><?php esc_html_e('If you like this plugin, please consider leaving a', 'imoptimal') ?></strong> 
                    ★★★★★ 
                    <strong><?php esc_html_e('rating', 'imoptimal'); ?></strong><br>
                    <strong><?php esc_html_e('A huge thanks in advance!', 'imoptimal'); ?></strong>
                </p>
                <a href="https://wordpress.org/plugins/" target="_blank" class="button button-primary"><?php esc_html_e('Leave us a rating', 'imoptimal'); ?></a>
            </div>

            <div class="meta-info">
                <h3><?php esc_html_e('About the plugin', 'imoptimal'); ?></h3>
                <strong><?php esc_html_e('Developed by: ', 'imoptimal'); ?></strong> <a href="https://www.imoptimal.com/" target="_blank">Imoptimal</a>

                <div class="contact-info">
                    <strong><?php esc_html_e('Need some support?', 'imoptimal'); ?></strong> <br>
                    <strong><?php esc_html_e('Contact the developers via the Support Forum', 'imoptimal'); ?></strong>
                    <div>
                        <a href="https://wordpress.org/support/plugin/" target="_blank" class="button button-primary"><?php esc_html_e('Contact us', 'imotpimal'); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<?php 
                            } ?>