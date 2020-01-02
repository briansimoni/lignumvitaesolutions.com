<?php
class AnpsAdminMenu {
    function __construct() {
        add_action('init', array($this, 'add_filters'));        
    }    
    static function anps_wp_edit_nav_menu_walker() {
        return 'Anps_Walker_Nav_Menu_Edit';
    }
    function add_filters() {
        //edit menu walker
        add_filter('wp_edit_nav_menu_walker', array( 'AnpsAdminMenu', 'anps_wp_edit_nav_menu_walker'));
        add_action('save_post', array($this, 'save_data' ), 10, 2);
    }
    function save_data($post_id, $post) {
        if ($post->post_type !== 'nav_menu_item') {
            return $post_id; 
        }
        if(!empty($_POST['menu-item-anps-megamenu'])) {
            foreach($_POST['menu-item-anps-megamenu'] as $key=>$value) { 
                update_post_meta($key, 'anps-megamenu', $value);
            }
        }
    }
}
require_once ABSPATH . 'wp-admin/includes/nav-menu.php';
class Anps_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        $item_output = '';
        parent::start_el($item_output, $item, $depth, $args);
        //add custom field to admin menu
        if($depth == 0) {
            $item_output = preg_replace('/(?=<div[^>]+class="[^"]*submitbox)/', $this->anps_field('Megamenu', 'checkbox', $item->ID, 'anps-megamenu', '1'), $item_output);
        }
        $output .= $item_output;
    }
    function anps_field($title, $input_type, $item_id, $post_meta_key, $value='') {
        $checked = '';
        $input_hidden = '';
        if($input_type=='checkbox') {
            $checked_value = get_post_meta($item_id, $post_meta_key, true);
            if($checked_value=='1') {
                $checked = ' checked';
            } else {
                $checked = '';
            }
            $input_hidden = "<input type='hidden' name='menu-item-anps-megamenu[$item_id]' value='0'>";
        }
        $data = '';
        $data .= "<p class='anps-megamenu description description-wide'>";
        $data .= "<label for='edit-menu-item-anps-megamenu-$item_id'>";
        $data .= $title.'<br>';
        $data .= $input_hidden;
        $data .= "<input type='$input_type' value='$value' class='widefat code edit-menu-item-anps-megamenu' id='edit-menu-item-anps-megamenu-$item_id' name='menu-item-anps-megamenu[$item_id]'$checked>";
        $data .= '</label>';
        $data .= '</p>';
        return $data;
    }
}
$anps_admin_menu = new AnpsAdminMenu();