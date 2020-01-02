<?php
include_once(get_template_directory() . '/anps-framework/classes/AnpsDummy.php');

if (isset($_GET['save_dummy'])) {
    $anps_dummy->save();
}
?>
<form action="themes.php?page=theme_options&sub_page=dummy_content&save_dummy" method="post">
    <div class="content-inner">

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-dropbox"></i><?php esc_html_e('Insert dummy content: posts, pages, categories', 'industrial'); ?></h3>
                <p><?php esc_html_e('Importing demo content is the fastest way to get you started. Please install all plugins required by the theme before importing content. If you already have some content on your site, make a backup just in case.', 'industrial'); ?></p>

                <?php if(ini_get('max_execution_time') < 600 || ini_get('memory_limit') < 256 || ini_get('upload_max_filesize')< 32 || ini_get('post_max_size') < 32): ?>
                <div class="alert alert-danger-style-2">
                    <i class="fa fa-exclamation"></i> <?php esc_html_e('One or more issues with server found! Please take a look at the System Requirements tab.', 'industrial'); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="col-md-12">
                <?php
                $anps_dummy_array = array (
                    'dummy1' => array (
                        'image' => 'industrial_demo1.jpg',
                        'title' => esc_html__('Demo 1', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-1/'
                    ),
                    'dummy2' => array (
                        'image' => 'industrial_demo2.jpg',
                        'title' => esc_html__('Demo 2', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-2/'
                    ),
                    'dummy3' => array (
                        'image' => 'industrial_demo3.jpg',
                        'title' => esc_html__('Demo 3', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-3/'
                    ),
                    'dummy4' => array (
                        'image' => 'industrial_demo4.jpg',
                        'title' => esc_html__('Demo 4', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-4/'
                    ),
                    'dummy5' => array (
                        'image' => 'industrial_demo5.jpg',
                        'title' => esc_html__('Demo 5', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-5/'
                    ),
                    'dummy6' => array (
                        'image' => 'industrial_demo6.jpg',
                        'title' => esc_html__('Demo 6', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-6/'
                    ),
                    'dummy7' => array (
                        'image' => 'industrial_demo7.jpg',
                        'title' => esc_html__('Demo 7', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-7/'
                    ),
                    'dummy8' => array (
                        'image' => 'industrial_demo8.jpg',
                        'title' => esc_html__('Demo 8', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-8/'
                    ),
                    'dummy9' => array (
                        'image' => 'industrial_demo9.jpg',
                        'title' => esc_html__('Demo 9', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-9/'
                    ),
                    'dummy10' => array (
                        'image' => 'industrial_demo10.jpg',
                        'title' => esc_html__('Demo 10', 'industrial'),
                        'link'  => 'http://anpsthemes.com/industrial/demo-10/'
                    ),
                 );
                $anps_dummy->anps_create_dummy_options($anps_dummy_array); ?>
            </div>
        </div>
    </div>
</form>
