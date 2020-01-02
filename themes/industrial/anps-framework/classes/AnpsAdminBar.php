<?php

class AnpsAdminBar {

  function __construct() {
      //add_action( 'admin_bar_menu', array( $this, "themeoptions_links" ), 100 );
  }

  function add_root_menu($name, $id, $href = FALSE) {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;

    $wp_admin_bar->add_menu( array(
        'id'   => $id,
        'meta' => array(),
        'title' => $name,
        'href' => esc_url($href) ) );
  }

  function add_sub_menu($name, $id ,$link, $root_menu, $meta = FALSE) {
      global $wp_admin_bar;
      if ( ! is_super_admin() || ! is_admin_bar_showing() )
          return;

      $wp_admin_bar->add_menu( array(
          'id' => $id,
          'parent' => $root_menu,
          'title' => $name,
          'href' => esc_url($link),
          'meta' => $meta
      ) );
  }

  function themeoptions_links() {
      $this->add_root_menu(esc_html__('Theme Options', 'industrial'), 'industrial', admin_url('themes.php?page=theme_options'));
  }

}
add_action( "init", "themeOptionsMenuInit" );

function themeOptionsMenuInit() {
    global $anps_adminBar;
    $anps_adminBar = new AnpsAdminBar();
}
