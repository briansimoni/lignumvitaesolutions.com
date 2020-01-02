<?php 
include_once(get_template_directory() . '/anps-framework/classes/AnpsFramework.php');
class AnpsOptions extends AnpsFramework {        
    /* Save options */
    public function anps_save_options($redirect) { 
        foreach($_POST as $name=>$value) {  
            update_option($name, $value);
        }
        header("Location: themes.php?page=theme_options&sub_page=$redirect");
    }  
}
$anps_options = new AnpsOptions();