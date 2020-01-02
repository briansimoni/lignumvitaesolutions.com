<?php
include_once(get_template_directory() . '/anps-framework/classes/AnpsOptions.php');
include_once(get_template_directory() . '/anps-framework/classes/AnpsStyle.php');
if (isset($_GET['save_options'])) {

    if(!isset($_POST['anps_footer_disable'])) {
        $_POST['anps_footer_disable'] = "";
    } else {
        $_POST['anps_footer_disable'] = "1";
    }
    $anps_options->anps_save_options("footer");
}
?>
<form action="themes.php?page=theme_options&sub_page=footer&save_options" method="post">
    <div class="content-inner">

       <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-level-down"></i><?php esc_html_e("Footer", 'industrial'); ?></h3>
            </div>
            <div class="col-md-4">
                <?php $anps_style->anps_create_checkbox('anps_enable_footer', esc_html__('Enable footer', 'industrial'), '1');?>
            </div>
            <!-- Footer style -->
            <div class="col-md-4">
                <label for="anps_footer_design"><?php esc_html_e("Footer style", 'industrial'); ?></label>
                <select name="anps_footer_design" id='anps_footer_design'>
                    <?php
                        $styles = array(
                            'default' => esc_html__('Default', 'industrial'),
                            'modern' => esc_html__('Modern', 'industrial'),
                        );
                        foreach ($styles as $key => $item) :
                            if (get_option('anps_footer_design') == $key) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            } ?>
                            <option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr($item); ?></option>
                        <?php endforeach;
                    ?>
                </select>
            </div>
            <!-- Footer columns -->
            <div class="col-md-4">
                <label for="anps_footer_style"><?php esc_html_e("Footer columns", 'industrial'); ?></label>
                <select name="anps_footer_style" id='anps_footer_style'>
                    <option value="0"><?php esc_html_e('*** Select ***', 'industrial'); ?></option>
                    <?php $pages = array('2'=>esc_html__('2 columns', 'industrial'), '3' => esc_html__('3 columns', 'industrial'), '4' => esc_html__('4 columns', 'industrial'));
                    foreach ($pages as $key => $item) :
                        if (get_option('anps_footer_style') == $key) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        } ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr($item); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <!-- Copyright footer columns -->
            <div class="col-md-4">
                <label for="anps_copyright_footer"><?php esc_html_e("Copyright footer columns", 'industrial'); ?></label>
                <select name="anps_copyright_footer" id="anps_copyright_footer">
                    <option value="0"><?php esc_html_e('*** Select ***', 'industrial'); ?></option>
                    <?php $pages = array('1'=>esc_html__('1 column', 'industrial'), '2' => esc_html__('2 columns', 'industrial'));
                    foreach ($pages as $key => $item) :
                        if (get_option('anps_copyright_footer') == $key) {
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        } ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr($item); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-12">
                <h3><i class="fa fa-level-down"></i><?php esc_html_e("Desktop style", 'industrial'); ?></h3>
            </div>
            <div class="col-md-12">
                <?php $layout = array('classic'=>esc_html__('Classic', 'industrial'), 'fixed-footer'=>esc_html__('Fixed', 'industrial'));
                 $anps_style->anps_create_select('anps_footer_style_fixed', $layout) ;?>
            </div>

            <!-- Mobile layout -->
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e("Mobile layout", 'industrial'); ?></h3>
            </div>

            <div class="col-md-12">
                <?php $layout = array('1'=>esc_html__('1 column', 'industrial'), '2'=>esc_html__('2 columns', 'industrial'));
                 $anps_style->anps_create_select('anps_mobile_footer_columns', $layout) ;?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $anps_options->anps_save_button(); ?>
</form>
