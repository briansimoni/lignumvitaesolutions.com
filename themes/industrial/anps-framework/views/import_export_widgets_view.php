<?php 
include_once(get_template_directory() . '/anps-framework/classes/AnpsImport.php'); 
if (isset($_GET['save_file'])) {  
    $anps_import_export->save_file();
}
if (isset($_GET['save_import'])) {  
    $anps_import_export->import_theme_options();
}
/* Save widgets to txt file */
if(isset($_GET['save_file_widget'])) {  
    $anps_import_export->save_file_widgets();
}
/* Import widgets data */
if (isset($_GET['import_widgets'])) {  
    $anps_import_export->import_widgets_data();
}
?>
<div class="content-inner">
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-file-code-o"></i><?php esc_html_e('Export widgets', 'industrial'); ?></h3>
            <form action="themes.php?page=theme_options&sub_page=import_export_widgets&save_file_widget" method="post">
                <button type="submit" class="inline-save"><i class="fa fa-floppy-o"></i><?php esc_html_e('Export', 'industrial'); ?></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><i class="fa fa-file-code-o"></i><?php esc_html_e('Import widgets', 'industrial'); ?></h3>
            <form action="themes.php?page=theme_options&sub_page=import_export_widgets&import_widgets" method="post" enctype="multipart/form-data">
                <input type="file" class="custom pull-left import-export-file" name="import_file"/>
                <button type="submit" class="inline-save pull-right"><i class="fa fa-floppy-o"></i><?php esc_html_e('Import', 'industrial'); ?></button>
            </form>
        </div>
    </div>
</div>