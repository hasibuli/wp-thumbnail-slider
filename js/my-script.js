jQuery(document).ready(function() {
//logo
 
jQuery(document).find("input[id^='upload_image_logobutton']").live('click', function(){
//var num = this.id.split('-')[1];
 formfield = jQuery('#logofile"').attr('name');
 tb_show('', 'media-upload.php?type=image&TB_iframe=true');
 
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#tylogofile').val(imgurl);
 tb_remove();
}
 
return false;
});
 
//favicon
jQuery(document).find("input[id^='upload_image_button_tyfavicon']").live('click', function(){
//jQuery('#upload_image_button_zkrfavicon').click(function() {
 formfield = jQuery('#favicon').attr('name');
 tb_show('', 'media-upload.php?type=image&TB_iframe=true');
 
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#tyfavicon').val(imgurl);
 tb_remove();
}
 
 return false;
});
 
});