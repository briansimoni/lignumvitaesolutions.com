<?php
wp_enqueue_style('fontawesome');
wp_enqueue_style('bootstrap');
wp_enqueue_style('anps_admin_styles');
wp_enqueue_script('anps_theme_options');
?>
<div class="anps-admin">
    <ul class="anps-admin-menu">
        <li>
            <a class="anpslogo hidden-sm hidden-xs hidden-md" href="http://anpsthemes.com" target="_blank">&nbsp;</a>
            <h2 class="hidden-sm hidden-md hidden-xs small_lh"><?php esc_html_e("Plugin Options", 'anps_theme_plugin'); ?><br/><span class="version"><?php echo esc_html_e('version', 'anps_theme_plugin') . ': ' . esc_attr(ANPS_PLUGIN_VERSION);?></span></h2>
        </li>
        <li>
            <a class="anpslogo-mobile hidden-lg " href="http://anpsthemes.com" target="_blank" class="hidden-md hidden-xs small_lh">
                <i><img src=" <?php echo get_template_directory_uri() . '/anps-framework/images/anpslogo-mobile.png';?>" /></i>
            </a>
        </li>
        <li>
            <a <?php if (!isset($_GET['sub_page']) || $_GET['sub_page'] == "google_analytics") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=anps_plugin_options&sub_page=google_analytics">
                <i class="fa fa-google"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e('Google analytics', 'anps_theme_plugin'); ?></span>
            </a>
        </li>
        <li>
            <a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "google_maps") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=anps_plugin_options&sub_page=google_maps">
                <i class="fa fa-map"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e('Google Maps', 'anps_theme_plugin'); ?></span>
            </a>
        </li>
    </ul>
    <?php
        if(!isset($_GET['sub_page'])) {
            $_GET['sub_page']='';
        }
    ?>
    <div class="anps-admin-content <?php echo esc_attr($_GET['sub_page']);?>">
    <?php
    switch($_GET['sub_page']) {
        case 'google_analytics': include_once ANPS_PLUGIN_PATH . '/views/google_analytics_view.php'; break;
        case 'google_maps': include_once ANPS_PLUGIN_PATH . '/views/google_maps_view.php'; break;
        default: include_once ANPS_PLUGIN_PATH . '/views/google_analytics_view.php';
    }
    ?>
    </div>
</div>
