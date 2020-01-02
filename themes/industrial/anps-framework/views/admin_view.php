<?php
/* Check for theme updates */
include_once(get_template_directory() . '/anps-framework/classes/AnpsUpgrade.php');
$tf_username = get_option("tf_username", "");
$tf_api_key = get_option("tf_api_key", "");
$notify = "";
if($update = AnpsUpgrade::check_theme_update() && !empty($tf_username) && !empty($tf_api_key)) {
    $notify = "";
    $notify .= "<span class='update-plugins count-1'><span class='update-count'>1</span></span>";
}

wp_enqueue_style('fontawesome');
wp_enqueue_style('bootstrap');
wp_enqueue_style('anps_admin_styles');
wp_enqueue_script('clipboard');
wp_enqueue_script('anps_theme_options');
wp_enqueue_style('anps_buttons');
?>
<div class="anps-admin">
<?php $themever = wp_get_theme(get_template()); $version = $themever["Version"]; ?>
    <ul class="anps-admin-menu">
        <li>
        <a class="anpslogo hidden-sm hidden-xs hidden-md" href="http://anpsthemes.com" target="_blank">&nbsp;</a>
        <h2 class="hidden-sm hidden-md hidden-xs small_lh"><?php esc_html_e("Theme Options", 'industrial'); ?><br/><span class="version"><?php echo esc_html__('Version', 'industrial') . ': ' . esc_attr($version);?></span></h2>
        </li>
        <li>
        <a class="anpslogo-mobile hidden-lg " href="http://anpsthemes.com" target="_blank" class="hidden-md hidden-xs small_lh"><i><img src=" <?php echo get_template_directory_uri() . '/anps-framework/images/anpslogo-mobile.png';?>" /></i></a>
        </li>
        <li><a <?php if (!isset($_GET['sub_page']) || $_GET['sub_page'] == "color_management") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=color_management"><i class="fa fa-tint"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Color Management", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "typography") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=typography"><i class="fa fa-text-height"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Typography", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "theme_style_google_font") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=theme_style_google_font"><i class="fa fa-google"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Update Google Fonts", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "theme_style_custom_font") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=theme_style_custom_font"><i class="fa fa-text-height"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Custom Fonts", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "theme_style_custom_css") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=theme_style_custom_css"><i class="fa fa-code"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Custom CSS", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "options") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=options"><i class="fa fa-columns"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Page Layout", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "options_page_setup") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=options_page_setup"><i class="fa fa-cog"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Page Setup", 'industrial'); ?></span></a></li>

        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "header") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=header"><i class="fa fa-bars"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Header Options", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "footer") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=footer"><i class="fa fa-level-down"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Footer Options", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "woocommerce") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=woocommerce"><i class="fa fa-shopping-basket"></i><span class="hidden-sm hidden-xs hidden-md">WooCommerce</span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "options_media") echo 'id="selected-menu-subitem"'; ?> href="themes.php?page=theme_options&sub_page=options_media"><i class="fa fa-picture-o"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Logos & Media", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "dummy_content") echo 'id="selected-menu-item"'; ?> href="themes.php?page=theme_options&sub_page=dummy_content"><i class="fa fa-dropbox"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Dummy Content", 'industrial'); ?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "theme_upgrade") echo 'id="selected-menu-item"'; ?> href="themes.php?page=theme_options&sub_page=theme_upgrade"><i class="fa fa-cloud-download"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Theme Update", 'industrial'); echo wp_kses($notify, array("span"=>array("class"=>array())));?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "import_export") echo 'id="selected-menu-item"'; ?> href="themes.php?page=theme_options&sub_page=import_export"><i class="fa fa-file-code-o"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Import/Export", 'industrial'); echo wp_kses($notify, array("span"=>array("class"=>array())));?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "import_export_widgets") echo 'id="selected-menu-item"'; ?> href="themes.php?page=theme_options&sub_page=import_export_widgets"><i class="fa fa-file-code-o"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("Import/Export Widgets", 'industrial'); echo wp_kses($notify, array("span"=>array("class"=>array())));?></span></a></li>
        <li><a <?php if (isset($_GET['sub_page']) && $_GET['sub_page'] == "system_req") echo 'id="selected-menu-item"'; ?> href="themes.php?page=theme_options&sub_page=system_req"><i class="fa fa-cogs"></i><span class="hidden-sm hidden-xs hidden-md"><?php esc_html_e("System Requirements", 'industrial'); echo wp_kses($notify, array("span"=>array("class"=>array())));?></span></a></li>
    </ul>

    <?php
        if(!isset($_GET['sub_page'])) {
            $_GET['sub_page'] = '';
        }
    ?>
    <div class="anps-admin-content <?php echo esc_attr($_GET['sub_page']);?>">
        <?php
        switch($_GET['sub_page']) {
            case 'typography': include_once(get_template_directory() . '/anps-framework/views/typography_view.php'); break;
            case 'options': include_once(get_template_directory() . '/anps-framework/views/options_page_layout_view.php'); break;
            case 'options_page': include_once(get_template_directory() . '/anps-framework/views/options_page_layout_view.php'); break;
            case 'options_page_setup': include_once(get_template_directory() . '/anps-framework/views/options_page_setup_view.php'); break;
            case 'header': include_once(get_template_directory() . '/anps-framework/views/header_view.php'); break;
            case 'footer': include_once(get_template_directory() . '/anps-framework/views/footer_view.php'); break;
            case 'woocommerce': include_once(get_template_directory() . '/anps-framework/views/woocommerce_view.php'); break;
            case 'options_media': include_once(get_template_directory() . '/anps-framework/views/options_media_view.php'); break;
            case 'dummy_content': include_once(get_template_directory() . '/anps-framework/views/dummy_view.php'); break;
            case 'theme_upgrade': include_once(get_template_directory() . '/anps-framework/views/theme_upgrade_view.php'); break;
            case 'theme_style_google_font': include_once(get_template_directory() . '/anps-framework/views/update_google_font_view.php'); break;
            case 'theme_style_custom_font': include_once(get_template_directory() . '/anps-framework/views/update_custom_font_view.php'); break;
            case 'theme_style_custom_css': include_once(get_template_directory() . '/anps-framework/views/custom_css_view.php'); break;
            case 'import_export': include_once(get_template_directory() . '/anps-framework/views/import_export_view.php'); break;
            case 'import_export_widgets': include_once(get_template_directory() . '/anps-framework/views/import_export_widgets_view.php'); break;
            case 'system_req': include_once(get_template_directory() . '/anps-framework/views/system_req_view.php'); break;
            default: include_once(get_template_directory() . '/anps-framework/views/color_management_view.php');
        }
        ?>
    </div>
</div>

<div class="empty-space"></div>
