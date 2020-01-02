<?php
add_action('admin_init', array('AnpsUpgrade','init'), 1);
class AnpsUpgrade {
    var $author;
    var $tf_user;
    var $tf_api;
    
    function __construct() { 
        $this->author = "AnpsThemes";
        $this->tf_user = get_option("tf_username");
        $this->tf_api = get_option("tf_api_key");
        if(!empty($this->tf_user) && !empty($this->tf_api)) { 
            require_once(get_template_directory() . "/anps-framework/classes/theme-update/class-pixelentity-theme-update.php");

            PixelentityThemeUpdate::init($this->tf_user, $this->tf_api, $this->author);
        } 
    }
    /* Init class */
    public static function init() { 
        new AnpsUpgrade();
    }
    /* Check for updates */
    public static function check_theme_update() {
        $updates = get_site_transient('update_themes'); 
        if(!empty($updates) && !empty($updates->response)) { 
            $theme = wp_get_theme();
            if($key = array_key_exists($theme->get_template(), $updates->response)) {
                return $updates->response[$theme->get_template()];
            }
        }
        return false;
    }
    /* Check theme name */
    public function get_theme_name() {
            $theme = wp_get_theme();
            if(is_child_theme()) {
                $theme = wp_get_theme( $theme->get('Template') );
            }
            return $theme->get_template();
    }
    /* Check theme version */
    public function get_version() {
        $theme = wp_get_theme();
        if(is_child_theme()) {
            $theme = wp_get_theme( $theme->get('Template') );
        }
        return $theme->get('Version');
    }
}