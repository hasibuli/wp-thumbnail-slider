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
        <p>WP Thumbnail Slider is a fully responsive wordpress image slider plugin with thumbnail. "PLEASE DON'T USE VARIOUS SIZE IMAGE ON SLIDER. USE SAME SIZE IMAGE". <br />
        Just copy and paste "<strong>if(function_exists('wptThumbnailSlider')){wPTPostLoop();}</strong> in the template code or <strong>[WPT-SLIDER]</strong> in the post/page" where you want to display imgae slider.</p>
        

			<table class="form-table">
				<tr>
					<th><label for="wpt_border_radius">Border Radius</label></th>
					<td><input type="text" name="wpt_border_radius" value="<?php $wpt_border_radius = get_option('wpt_border_radius'); if(!empty($wpt_border_radius)) {echo $wpt_border_radius;} else {echo "0";}?>">px;</td>
				</tr>
				<tr>
					<th><label for="wpt_border">Slider Border </label></th>
					<td><input type="text" name="wpt_border" value="<?php $wpt_border = get_option('wpt_border'); if(!empty($wpt_border)) {echo $wpt_border;} else {echo "0";}?>">px;</td>
				</tr>
				<tr>
					<th><label for="wpt_bg_color">Slider Border Color </label></th>
					<td><input type="text" name="wpt_bg_color" id="wpt_bg_color" value="<?php $wpt_bg_color = get_option('wpt_bg_color'); if(!empty($wpt_bg_color)) {echo $wpt_bg_color;} else {echo "#569625";}?>" class="color-picker nht_bg_color" /></td>
				</tr>				<tr>
					<th><label for="wpt_thumb_border">Thumbnail Border Color</label></th>
					<td><input type="text" name="wpt_thumb_border" id="wpt_thumb_border" value="<?php $wpt_thumb_border = get_option('wpt_thumb_border'); if(!empty($wpt_thumb_border)) {echo $wpt_thumb_border;} else {echo "#0a0a0a";}?>" class="color-picker wpt_thumb_border" /></td>
				</tr>
				<tr>
					<th><label for="wpt_thumb_hover">Thumbnail Border Hover</label></th>
					<td><input type="text" name="wpt_thumb_hover" id="wpt_thumb_hover" value="<?php $wpt_thumb_hover = get_option('wpt_thumb_hover'); if(!empty($wpt_thumb_hover)) {echo $wpt_thumb_hover;} else {echo "#ae66b0";}?>" class="color-picker wpt_thumb_hover" /></td>
				</tr>
		</table>
	
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="wpt_border_radius, wpt_border, wpt_thumb_size, wpt_bg_color, wpt_thumb_border, wpt_thumb_hover" />
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" class="button button-primary" /></p>
	</form>
    
  </div>
  </div>
 
  
  <div id="nhtRight">
    <div class="nhtWidget">
    <h3>Need Responsive Web Design?</h3>
	<?php
	 $urls_total = array("http://www.e2soft.com/web-design/","http://www.e2soft.com/web-development/","http://www.e2soft.com/web-hosting/","http://www.e2soft.com/portfolio");
	$random_urls = array_rand($urls_total);
	?>
	<iframe class="border_1" src="<?php echo $urls_total["$random_urls"]; ?>" width="320" height="300">
	</iframe>
	</div>
  <div class="clrFix"></div>
  <div class="nhtWidget">
  		<a href="http://www.e2soft.com" title="Web Design Company" target="_blank"><img src="<?php bloginfo('url' ); echo"/wp-content/plugins/wp-thumbnail-slider/img/responsive-web-design.png"; ?>" alt="Web Design Company" /></a>
        
<p><h3>Donate and support the development.</h3> With your help I can make Simple Fields even better! $5, $10, $100 – any amount is fine! :)</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="82C6LTLMFLUFW">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>

  </div>
  </div>
 <div class="clrFix"></div> 
  </div>
<div class="clrFix"></div>
<?php		
	echo '</div>';
}
