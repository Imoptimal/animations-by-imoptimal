jQuery(function($){function debounce(func,wait,immediate=!0){var timeout;return function(){var context=this,args=arguments;var later=function(){timeout=null;if(!immediate)func.apply(context,args)};var callNow=immediate&&!timeout;clearTimeout(timeout);timeout=setTimeout(later,wait);if(callNow)func.apply(context,args)}}
var i;var $imoptimalPhp=imoptimalPhp;function animation(imoptimal){var animation_items=$(imoptimal.imoanim_items);var $window=$(window);function check_if_in_view(){var window_height=$window.height();var window_top_position=$window.scrollTop();var window_bottom_position=(window_top_position+window_height);$.each(animation_items,function(){var $element=$(this);if(imoptimal.imoanim_reanimation==2){$element.mouseover(function(){$(this).addClass(imoptimal.imoanim_animation_type).css({'animation-duration':imoptimal.imoanim_animation_duration,'animation-timing-function':imoptimal.imoanim_animation_timing,'animation-iteration-count':imoptimal.imoanim_animation_repetition,'animation-delay':imoptimal.imoanim_animation_delay})}).mouseout(function(){$(this).removeClass(imoptimal.imoanim_animation_type)});var touchInitiate=function(){$(this).addClass(imoptimal.imoanim_animation_type).css({'animation-duration':imoptimal.imoanim_animation_duration,'animation-timing-function':imoptimal.imoanim_animation_timing,'animation-iteration-count':imoptimal.imoanim_animation_repetition,'animation-delay':imoptimal.imoanim_animation_delay})};$element.on('touchstart',touchInitiate).removeClass(imoptimal.imoanim_animation_type);$element.on('touchmove',touchInitiate).removeClass(imoptimal.imoanim_animation_type)}else{$element.css('visibility','hidden');var element_height=$element.outerHeight();var element_top_position=$element.offset().top;var element_bottom_position=(element_top_position+element_height);if((element_bottom_position>=window_top_position)&&(element_top_position<=window_bottom_position)){$element.css({'visibility':'visible','animation-duration':imoptimal.imoanim_animation_duration,'animation-timing-function':imoptimal.imoanim_animation_timing,'animation-iteration-count':imoptimal.imoanim_animation_repetition,'animation-delay':imoptimal.imoanim_animation_delay}).addClass(imoptimal.imoanim_animation_type)}else{if(imoptimal.imoanim_reanimation==1){$element.css('visibility','hidden').removeClass(imoptimal.imoanim_animation_type)}}}})}
function reanimation(){$window.on('scroll resize',debounce(check_if_in_view,10));$window.trigger('scroll')}
reanimation()}
for(i=0;i<$imoptimalPhp.length;i++){animation($imoptimalPhp[i])}})