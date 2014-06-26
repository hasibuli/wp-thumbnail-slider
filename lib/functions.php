<?php
function registerwptPage() {
	add_submenu_page( 'edit.php?post_type=wptpost', 'WPT Slider Settings', 'Slider Settings', 'manage_options', 'wptpost', 'wptPageFunction' ); 
}
add_action('admin_menu', 'registerwptPage');

function wptPageFunction() {
	
	echo '<div class="newsWrap">';
		echo '<h1>WPT Slider Configurations</h1>';
?>
   <div id="nhtLeft">  
    <form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
		        
		<div class="inside">
        <h3>Insert your text & background color</h3>
			<table class="form-table">
				<tr>
					<th><label for="wpt_border_radius">Border Radius</label></th>
					<td><input type="text" name="wpt_border_radius" value="<?php $wpt_border_radius = get_option('wpt_border_radius'); if(!empty($wpt_border_radius)) {echo $wpt_border_radius;} else {echo "5";}?>">px;</td>
				</tr>
				<tr>
					<th><label for="wpt_border">Slider Border </label></th>
					<td><input type="text" name="wpt_border" value="<?php $wpt_border = get_option('wpt_border'); if(!empty($wpt_border)) {echo $wpt_border;} else {echo "5";}?>">px;</td>
				</tr>
				<tr>
					<th><label for="wpt_border">Slider Border Color </label></th>
					<td>#<input type="text" name="wpt_bg_color" value="<?php $wpt_bg_color = get_option('wpt_border'); if(!empty($wpt_bg_color)) {echo $wpt_bg_color;} else {echo "569625";}?>"></td>
				</tr>				<tr>
					<th><label for="wpt_thumb_border">Thumbnail Border Color</label></th>
					<td>#<input type="text" name="wpt_thumb_border" value="<?php $wpt_thumb_border = get_option('wpt_thumb_border'); if(!empty($wpt_thumb_border)) {echo $wpt_thumb_border;} else {echo "0a0a0a";}?>"></td>
				</tr>
				<tr>
					<th><label for="wpt_thumb_hover">Thumbnail Border Hover</label></th>
					<td>#<input type="text" name="wpt_thumb_hover" value="<?php $wpt_thumb_hover = get_option('wpt_thumb_hover'); if(!empty($wpt_thumb_hover)) {echo $wpt_thumb_hover;} else {echo "ae66b0";}?>"></td>
				</tr>
		</table>
	
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="wpt_border_radius, wpt_border, wpt_bg_color, wpt_thumb_border, wpt_thumb_hover" />
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" /></p>
	</form>      
  </div>
  </div>
 
  
  <div id="nhtRight">
  
  <div class="nhtWidget">
  	
  </div>
  
  <div class="nhtWidget">
  
  </div>
  
  </div>
  
     
<div class="clrFix"></div>
<?php		
	echo '</div>';
}