<?php
include_once(get_template_directory() . '/anps-framework/classes/AnpsStyle.php');

if (isset($_GET['save_css'])) {
    if (function_exists('wp_get_custom_css')) {
        $custom_css_post = wp_get_custom_css_post();

        if($custom_css_post == null) {
            $args = array(
                'post_type' => 'custom_css',
                'post_title' => get_stylesheet(),
                'post_name' => get_stylesheet()
            );

            wp_insert_post($args);
            $query = new WP_Query($args);
            set_theme_mod('custom_css_post_id', $result->ID->post);
            $custom_css_post = wp_get_custom_css_post();
        }

        $css_post = array(
            'ID'           => $custom_css_post->ID,
            'post_content' => stripcslashes($_POST['anps_custom_css']),
        );

        wp_update_post($css_post);
        update_option("anps_custom_css", '');
    } else {
        update_option("anps_custom_css", stripcslashes($_POST['anps_custom_css']));
    }

    header("Location: themes.php?page=theme_options&sub_page=theme_style_custom_css");
}

function anps_get_custom_css() {
    if (function_exists('wp_get_custom_css') && strpos(wp_get_custom_css(), '{') !== false ) {
        return wp_get_custom_css();
    }
    return get_option('anps_custom_css', '');
}
?>
<form action="themes.php?page=theme_options&sub_page=theme_style_custom_css&save_css" method="post">
    <div class="content-inner">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-code"></i><?php esc_html_e('Custom css', 'industrial'); ?></h3>
                <div class="input fullwidth" id="anps_custom_css_wrapper">
                    <label for="anps_custom_css"><?php esc_html_e('Custom css', 'industrial'); ?></label>
                    <textarea name="anps_custom_css" id="anps_custom_css" class="fullwidth"><?php echo anps_get_custom_css(); ?> </textarea>
                </div>

                <!-- Editor -->
                <div class="input fullwidth">
                    <div class="anps-editor-wrapper">
                        <div class="anps-editor" id="editor"><?php echo anps_get_custom_css(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $anps_style->anps_save_button(); ?>
</form>

<script>
    ace.config.set("basePath", "<?php echo get_template_directory_uri(); ?>/anps-framework/js");
    var editor = ace.edit("editor");
    editor.getSession().setMode("ace/mode/css");

    jQuery('#anps_custom_css_wrapper').hide()

    var textarea = jQuery('#anps_custom_css');
    editor.getSession().on('change', function(){
        textarea.val(editor.getSession().getValue());
    });
</script>
