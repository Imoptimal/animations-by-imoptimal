<?php

function imo_numbers_render() {
    $options = get_option( 'imo_meta' ); ?>

<input type="number" name="imo_meta[imo_numbers_field]" value="<?php echo $options['imo_numbers_field'] ?>" min="1" max="100" placeholder="1">

<?php }

function imo_minification_render() {
    $options = get_option( 'imo_meta' ); ?>

<select name='imo_meta[imo_minification_field]' value="<?php echo $options['imo_minification_field']; ?>">
    <option value="0" <?php if($options['imo_minification_field'] == 0): ?>selected<?php endif; ?>><?php esc_html_e('Use regural files (not minified)', 'imoptimal'); ?></option>
    <option value="1" <?php if($options['imo_minification_field'] == 1): ?>selected<?php endif; ?>><?php esc_html_e('Use minified files', 'imoptimal'); ?></option>
</select>

<?php }

function imo_items_render($args) { 
    $options = get_option( 'imo_settings' );
    $field_items = 'imo_items_' . $args['index'];

    echo "<textarea class='imo-items' type='text' name='imo_settings[{$field_items}]' placeholder='#id, .class, div'>" . $options[$field_items] . "</textarea>";

}

function imo_animation_type_render($args) {
    $options = get_option( 'imo_settings' );
    $field_type = 'imo_animation_type_' . $args['index'];
    $value = $options[$field_type];

    $attention_seekers = array('bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'tada', 'wobble', 'jello', 'heartBeat');
    $bouncing_entrances = array('bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp');
    $bouncing_exits = array('bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp');
    $fading_entrances = array('fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig');
    $fading_exits = array('fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig' );
    $flippers = array('flip', 'flipInX', 'flipInY', 'flipOutX', 'flipOutY');
    $lightspeed = array('lightSpeedIn', 'lightSpeedOut');
    $rotating_entrances = array('rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight');
    $rotating_exits = array('rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight');
    $sliding_entrances = array('slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight');
    $sliding_exits = array('slideOutUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight');
    $zoom_entrances = array('zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp');
    $zoom_exits = array('zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp');
    $specials = array('hinge', 'jackInTheBox', 'rollIn', 'rollOut');

    echo "<div class='flexing'>
    <select class='imo-animation-type {$args['index']}' name='imo_settings[{$field_type}]' value=" . $options[$field_type] . ">

    <optgroup label='Attention Seekers'>";
    foreach ($attention_seekers as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Bouncing Entrances'>";
    foreach ($bouncing_entrances as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Bouncing Exits'>";
    foreach ($bouncing_exits as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Fading Entrances'>";
    foreach ($fading_entrances as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>        
    <optgroup label='Fading Exits'>";
    foreach ($fading_exits as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>    
    <optgroup label='Flippers'>";
    foreach ($flippers as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup> 
    <optgroup label='Lightspeed'>";
    foreach ($lightspeed as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>    
    <optgroup label='Rotating Entrances'>";
    foreach ($rotating_entrances as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>    
    <optgroup label='Rotating Exits'>";
    foreach ($rotating_exits as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup> 
    <optgroup label='Sliding Entrances'>";
    foreach ($sliding_entrances as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Sliding Exits'>";
    foreach ($sliding_exits as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Zoom Entrances'>";
    foreach ($zoom_entrances as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>   
    <optgroup label='Zoom Exits'>";
    foreach ($zoom_exits as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>  
    <optgroup label='Specials'>";
    foreach ($specials as $animation) {
        $selected = ($options[$field_type] == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>  
    </select>
    
    <div class='imo-preview'>
        <div class='imo-example-area {$args['index']}'>
           <div class='example-block'></div>
        </div>
        <span>Preview</span>
    </div>

    </div>";
}

function imo_animation_duration_render($args) {
    $options = get_option( 'imo_settings' );
    $field_duration = 'imo_animation_duration_' . $args['index'];
    $value = $options[$field_duration];

    echo "<select name='imo_settings[{$field_duration}]' value=" . $options[$field_duration] . ">
    <option value='0' " . (($value == 0)? "selected='selected'":"") . ">" . esc_html__('Select duration of animation from the dropdown menu', 'imoptimal') . "</option>
    <option value='imo-duration-half' " . (($value == 'imo-duration-half')? "selected='selected'":"") . ">0.5 sec</option>
    <option value='imo-duration-one' " . (($value == 'imo-duration-one')? "selected='selected'":"") . ">1 sec</option>
    <option value='imo-duration-one-half' " . (($value == 'imo-duration-one-half')? "selected='selected'":"") . ">1.5 sec</option>
    <option value='imo-duration-two' " . (($value == 'imo-duration-two')? "selected='selected'":"") . ">2 sec</option>
    <option value='imo-duration-two-half' " . (($value == 'imo-duration-two-half')? "selected='selected'":"") . ">2.5 sec</option>
    <option value='imo-duration-three' " . (($value == 'imo-duration-three')? "selected='selected'":"") . ">3 sec</option>
    <option value='imo-duration-three-half' " . (($value == 'imo-duration-three-half')? "selected='selected'":"") . ">3.5 sec</option>
    <option value='imo-duration-four' " . (($value == 'imo-duration-four')? "selected='selected'":"") . ">4 sec</option>
    <option value='imo-duration-four-half' " . (($value == 'imo-duration-four-half')? "selected='selected'":"") . ">4.5 sec</option>
    <option value='imo-duration-five' " . (($value == 'imo-duration-five')? "selected='selected'":"") . ">5 sec</option>
</select>";

}

function imo_animation_repetition_render($args) {
    $options = get_option( 'imo_settings' );
    $field_repetition = 'imo_animation_repetition_' . $args['index'];
    $value = $options[$field_repetition];

    echo "<select name='imo_settings[{$field_repetition}]' value=" . $options[$field_repetition] . ">
    <option value='imo-repetition-one' " . (($value == 'imo-repetition-one')? "selected='selected'":"") . ">" . esc_html__('Once', 'imoptimal') . "</option>
    <option value='imo-repetition-two' " . (($value == 'imo-repetition-two')? "selected='selected'":"") . ">". esc_html__('Twice', 'imoptimal') . "</option>
    <option value='imo-repetition-three' " . (($value == 'imo-repetition-three')? "selected='selected'":"") . ">" . esc_html__('Three times', 'imoptimal') . "</option>
    <option value='imo-repetition-four' " . (($value == 'imo-repetition-four')? "selected='selected'":"") . ">" . esc_html__('Four times', 'imoptimal') . "</option>
    <option value='imo-repetition-five' " . (($value == 'imo-repetition-five')? "selected='selected'":"") . ">" . esc_html__('Five times', 'imoptimal') . "</option>
</select>";

}

function imo_reanimation_render($args) {
    $options = get_option( 'imo_settings' );
    $field_reanimation = 'imo_reanimation_' . $args['index'];
    $value = $options[$field_reanimation];

    echo "<select name='imo_settings[{$field_reanimation}]' value=" . $options[$field_reanimation] . ">
    <option value='0' " . (($value == 0)? "selected='selected'":"") . ">" . esc_html__('False (Do not re-animate)', 'imoptimal') . "</option>
    <option value='1' " . (($value == 1)? "selected='selected'":"") . ">" . esc_html__('Re-animate when items enter viewport', 'imoptimal') . "</option>
    <option value='2' " . (($value == 2)? "selected='selected'":"") . ">" . esc_html__('Animate items on hover', 'imoptimal') . "</option>
</select>";

}

function imo_animation_delay_render($args) {
    $options = get_option( 'imo_settings' );
    $field_delay = 'imo_delay_' . $args['index'];
    $value = $options[$field_delay];

    echo "<select name='imo_settings[{$field_delay}]' value=" . $options[$field_delay] . ">
    <option value='0' " . (($value == 0)? "selected='selected'":"") . ">" . esc_html__('No delay', 'imoptimal') . "</option>
    <option value='imo-delay-half' " . (($value == 'imo-delay-half')? "selected='selected'":"") . ">0.5 sec</option>
    <option value='imo-delay-one' " . (($value == 'imo-delay-one')? "selected='selected'":"") . ">1 sec</option>
    <option value='imo-delay-one-half' " . (($value == 'imo-delay-one-half')? "selected='selected'":"") . ">1.5 sec</option>
    <option value='imo-delay-two' " . (($value == 'imo-delay-two')? "selected='selected'":"") . ">2 sec</option>
    <option value='imo-delay-two-half' " . (($value == 'imo-delay-two-half')? "selected='selected'":"") . ">2.5 sec</option>
    <option value='imo-delay-three' " . (($value == 'imo-delay-three')? "selected='selected'":"") . ">3 sec</option>
    <option value='imo-delay-three-half' " . (($value == 'imo-delay-three-half')? "selected='selected'":"") . ">3.5 sec</option>
    <option value='imo-delay-four' " . (($value == 'imo-delay-four')? "selected='selected'":"") . ">4 sec</option>
    <option value='imo-delay-four-half' " . (($value == 'imo-delay-four-half')? "selected='selected'":"") . ">4.5 sec</option>
    <option value='imo-delay-five' " . (($value == 'imo-delay-five')? "selected='selected'":"") . ">5 sec</option>
</select>";

} ?>
