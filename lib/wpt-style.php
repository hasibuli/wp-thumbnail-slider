<?php 
function EditableCSS(){
    ?>
<style type="text/css">
 #wptSlider {
	 border-radius: <?php $wpt_border_radius = get_option('wpt_border_radius'); if(!empty($wpt_border_radius)) {echo $wpt_border_radius;} else {echo "5";}?>px;
 	 border: <?php $wpt_border = get_option('wpt_border'); if(!empty($wpt_border)) {echo $wpt_border;} else {echo "5";}?>px solid #<?php $wpt_border_color = get_option('wpt_border_color'); if(!empty($wpt_border_color)) {echo $wpt_border_color;} else {echo "569625";}?>;
 }
 #carousel > .flex-viewport > .slides > li{
	 border:3px solid #<?php $wpt_thumb_border = get_option('wpt_thumb_border'); if(!empty($wpt_thumb_border)) {echo $wpt_thumb_border;} else {echo "0a0a0a";}?>;
}
#carousel > .flex-viewport > .slides > .flex-active-slide{
	border:3px solid #<?php $wpt_thumb_hover = get_option('wpt_thumb_hover'); if(!empty($wpt_thumb_hover)) {echo $wpt_thumb_hover;} else {echo "ae66b0";}?>;
	} 
</style>
<?php
}
add_action('wp_footer','EditableCSS', 100);
?>