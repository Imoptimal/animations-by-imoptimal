jQuery(function($){function debounce(func,wait,immediate=!0){var timeout;return function(){var context=this,args=arguments;var later=function(){timeout=null;if(!immediate)func.apply(context,args)};var callNow=immediate&&!timeout;clearTimeout(timeout);timeout=setTimeout(later,wait);if(callNow)func.apply(context,args)}}
var i;var $imoptimalPhp=imoptimalPhp;function animation(imoptimal){var animation_items=$(imoptimal.imo_items);var $window=$(window);function check_if_in_view(){var window_height=$window.height();var window_top_position=$window.scrollTop();var window_bottom_position=(window_top_position+window_height);$.each(animation_items,function(){var $element=$(this);if(imoptimal.imo_reanimation==2){$element.mouseover(function(){$(this).addClass(imoptimal.imo_animation_type).addClass(imoptimal.imo_animation_duration).addClass(imoptimal.imo_animation_repetition).addClass(imoptimal.imo_animation_delay)}).mouseout(function(){$(this).removeClass(imoptimal.imo_animation_type)})}else{var element_height=$element.outerHeight();var element_top_position=$element.offset().top;var element_bottom_position=(element_top_position+element_height);if((element_bottom_position>=window_top_position)&&(element_top_position<=window_bottom_position)){$element.addClass(imoptimal.imo_animation_type).addClass(imoptimal.imo_animation_duration).addClass(imoptimal.imo_animation_repetition).addClass(imoptimal.imo_animation_delay)}else{if(imoptimal.imo_reanimation==1){$element.removeClass(imoptimal.imo_animation_type)}}}})}
function reanimation(){$window.on('scroll resize',debounce(check_if_in_view,20));$window.trigger('scroll')}
reanimation()}
for(i=0;i<$imoptimalPhp.length;i++){animation($imoptimalPhp[i])}})