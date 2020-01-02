<?php
include_once(get_template_directory() . '/anps-framework/classes/AnpsStyle.php');
if (isset($_GET['save_font'])) {
    $anps_style->update_gfonts();
}
?>
<form action="themes.php?page=theme_options&sub_page=theme_style_google_font&save_font" method="post">
    <div class="content-inner">
	    <div class="row">
	    	<div class="col-md-12">
	    		<h3><i class="fa fa-google"></i><?php esc_html_e('Update Google Fonts', 'industrial'); ?></h3>
	        	<p><?php esc_html_e('As Google Fonts are not updated automatically, you can update Google Fonts by clicking the button below.', 'industrial'); ?></p>
	        	<br>
	        	<center><input class="no-margin" type="submit" value="<?php esc_html_e('Update Google Fonts', 'industrial'); ?>" /></center>
	    	</div>
	    </div>
    </div>
</form>
