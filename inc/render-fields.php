<?php

function imo_numbers_render() {
    $options = get_option( 'imo_meta' );
    if(isset($options['imo_numbers_field'])) {
        $numbers = $options['imo_numbers_field'];
    }
    if ( empty($numbers) ) $numbers = 1;
?>

<input type="number" name="imo_meta[imo_numbers_field]" value="<?php echo $numbers; ?>" min="1" max="100" placeholder="1">

<?php }

function imo_minification_render() {
    $options = get_option( 'imo_meta' );
    if(isset($options['imo_minification_field'])) {
        $minification = $options['imo_minification_field'];
    }
    if ( empty($minification) ) $minification = 0;
?>

<select name='imo_meta[imo_minification_field]' value="<?php echo $minification; ?>">
    <option value="0" <?php if($minification == 0): ?>selected<?php endif; ?>><?php esc_html_e('Use regural files (not minified)', 'imoptimal'); ?></option>
    <option value="1" <?php if($minification == 1): ?>selected<?php endif; ?>><?php esc_html_e('Use minified files', 'imoptimal'); ?></option>
</select>

<?php }

function imo_items_render($args) { 
    $options = get_option( 'imo_settings' );
    $field_items = 'imo_items_' . $args['index'];
    if(isset($options[$field_items])) {
        $value = $options[$field_items];
    }
    if ( empty($value) ) $value = '';

    echo "<textarea class='imo-items' type='text' name='imo_settings[{$field_items}]' placeholder='#id, .class, div'>" . $value . "</textarea>";

}

function imo_animation_type_render($args) {
    $options = get_option( 'imo_settings' );
    $field_type = 'imo_animation_type_' . $args['index'];
    if(isset($options[$field_type])) {
        $value = $options[$field_type];
    }
    if ( empty($value) ) $value = 'bounce';

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
    <select class='imo-animation-type {$args['index']}' name='imo_settings[{$field_type}]' value=" . $value . ">

    <optgroup label='Attention Seekers'>";
    foreach ($attention_seekers as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Bouncing Entrances'>";
    foreach ($bouncing_entrances as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Bouncing Exits'>";
    foreach ($bouncing_exits as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Fading Entrances'>";
    foreach ($fading_entrances as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>        
    <optgroup label='Fading Exits'>";
    foreach ($fading_exits as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>    
    <optgroup label='Flippers'>";
    foreach ($flippers as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup> 
    <optgroup label='Lightspeed'>";
    foreach ($lightspeed as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>    
    <optgroup label='Rotating Entrances'>";
    foreach ($rotating_entrances as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>    
    <optgroup label='Rotating Exits'>";
    foreach ($rotating_exits as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup> 
    <optgroup label='Sliding Entrances'>";
    foreach ($sliding_entrances as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Sliding Exits'>";
    foreach ($sliding_exits as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>
    <optgroup label='Zoom Entrances'>";
    foreach ($zoom_entrances as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>   
    <optgroup label='Zoom Exits'>";
    foreach ($zoom_exits as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>  
    <optgroup label='Specials'>";
    foreach ($specials as $animation) {
        $selected = ($value == $animation) ? 'selected="selected"' : '';
        echo "<option value='$animation' $selected>$animation</option>";
    }
    echo "</optgroup>  
    </select>
    
    <div class='imo-preview'>
        <div class='imo-example-area {$args['index']}'>
           <div class='example-block'></div>
        </div>
        <span class='preview-button'>Preview</span>
    </div>

    </div>";
}

function imo_animation_duration_render($args) {
    $options = get_option( 'imo_settings' );
    $field_duration = 'imo_animation_duration_' . $args['index'];
    if(isset($options[$field_duration])) {
        $value = $options[$field_duration];
    }
    if ( empty($value) ) $value = '0.5';
    
    $duration = array();
    $sec = 's';

    for($i=0.5; $i<=5; $i += 0.1) {
        $duration[] = $i . $sec;  
    }
    
    echo "<select class='imo-animation-duration' name='imo_settings[{$field_duration}]' value=' . $value . '>";
    foreach ($duration as $selection) {
        $selected = ($value == $selection) ? 'selected="selected"' : '';
        echo "<option value='$selection' $selected>$selection</option>";
    }
    echo "</select>";
}

function imo_animation_repetition_render($args) {
    $options = get_option( 'imo_settings' );
    $field_repetition = 'imo_animation_repetition_' . $args['index'];
    if(isset($options[$field_repetition])) {
        $value = $options[$field_repetition];
    }
    if ( empty($value) ) $value = '1';
    
    $repetition = array();

    for($i=1; $i<=5; $i++) {
        $repetition[] = $i;  
    }
    array_push($repetition, 'infinite');
    
    echo "<select class='imo-animation-repetition' name='imo_settings[{$field_repetition}]' value=' . $value . '>";
    foreach ($repetition as $selection) {
        $selected = ($value == $selection) ? 'selected="selected"' : '';
        echo "<option value='$selection' $selected>$selection</option>";
    }
    echo "</select>";
}

function imo_animation_timing_render($args) {
    $options = get_option( 'imo_settings' );
    $field_timing = 'imo_timing_' . $args['index'];
    if(isset($options[$field_timing])) {
        $value = $options[$field_timing];
    }
    if ( empty($value) ) $value = 'linear';
    
    $timing = array('linear', 'ease', 'ease-in', 'ease-out', 'ease-in-out');
    
    echo "<select class='imo-animation-timing' name='imo_settings[{$field_timing}]' value=' . $value . '>";
    foreach ($timing as $selection) {
        $selected = ($value == $selection) ? 'selected="selected"' : '';
        echo "<option value='$selection' $selected>$selection</option>";
    }
    echo "</select>";
}

function imo_animation_delay_render($args) {
    $options = get_option( 'imo_settings' );
    $field_delay = 'imo_delay_' . $args['index'];
    if(isset($options[$field_delay])) {
        $value = $options[$field_delay];
    }
    if ( empty($value) ) $value = '0';
    
    $delay = array();
    $sec = 's';

    for($i=0; $i<=5; $i+=0.1) {
        $delay[] = $i . $sec; 
    }
    
    echo "<select class='imo-animation-delay' name='imo_settings[{$field_delay}]' value=' . $value . '>";
    foreach ($delay as $selection) {
        $selected = ($value == $selection) ? 'selected="selected"' : '';
        echo "<option value='$selection' $selected>$selection</option>";
    }
    echo "</select>";
}

function imo_reanimation_render($args) {
    $options = get_option( 'imo_settings' );
    $field_reanimation = 'imo_reanimation_' . $args['index'];
    if(isset($options[$field_reanimation])) {
        $value = $options[$field_reanimation];
    }
    if ( empty($value) ) $value = '0';

    echo "<select name='imo_settings[{$field_reanimation}]' value=" . $value . ">
    <option value='0' " . (($value == 0)? "selected='selected'":"") . ">" . esc_html__('False (Do not re-animate)', 'imoptimal') . "</option>
    <option value='1' " . (($value == 1)? "selected='selected'":"") . ">" . esc_html__('Re-animate when items enter viewport', 'imoptimal') . "</option>
    <option value='2' " . (($value == 2)? "selected='selected'":"") . ">" . esc_html__('Animate items on hover/touch', 'imoptimal') . "</option>
</select>";
}?>
