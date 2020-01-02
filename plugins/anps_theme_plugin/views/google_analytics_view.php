<?php
include_once ANPS_PLUGIN_PATH.'classes/AnpsAdminPlugin.php';
if (isset($_GET['save_ga'])) {
    $anps_plugin->save_options('google_analytics');
}
?>
<form action="themes.php?page=anps_plugin_options&sub_page=google_analytics&save_ga" method="post">
    <div class="content-inner">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-google"></i><?php esc_html_e("Google analytics", 'anps_theme_plugin'); ?></h3>
                <?php echo $anps_plugin->anps_create_textarea('anps_google_analytics', htmlentities(get_option('anps_google_analytics', ''))); ?>
            </div>
        </div>
    </div>
    <div class="fixsave"><button type="submit"><?php esc_html_e('Save', 'anps_theme_plugin'); ?><i class="fa fa-floppy-o"></i></button></div>
    <button type="submit" class="bottom-save absolute"><i class="fa fa-floppy-o"></i><?php esc_html_e('Save all changes', 'anps_theme_plugin'); ?></button>
</form>
