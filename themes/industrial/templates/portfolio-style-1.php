<?php
$num_of_sidebars = anps_num_sidebars();
$class = '';

if( $num_of_sidebars > 0 ) {
    $class = 'page-content';
}
?>
<div class="<?php echo esc_attr($class); ?> col-md-<?php echo 12-esc_attr($num_of_sidebars)*3; ?>">
    <div class="row">
        <div class="col-md-5">
            <h3 class="title text-uppercase"><?php the_title(); ?></h3>
            <?php the_content(); ?>
        </div>
        <div class="col-md-7">
            <?php anps_header_media_single(get_the_ID()); ?>
            <p>&nbsp;</p>
            <!-- Project info table -->
            <?php if(get_post_meta($id, $key ='anps_portfolio_table_repeater', $single = true) && get_post_meta($id, $key ='anps_portfolio_table_repeater', $single = true) != ';') : ?>
            <?php $explode_tr = explode('|', get_post_meta($id, $key ='anps_portfolio_table_repeater', $single = true)); ?>
            <table class="info-table">
                <tbody>
                    <?php foreach($explode_tr as $item) : ?>
                    <?php $exploded_item = explode(';', $item); ?>
                    <tr class="info-table-row">
                        <th class="info-table-icon"><i class="fa <?php echo esc_attr($exploded_item[0]); ?>"></i></th>
                        <td class="info-table-content"><?php echo wp_kses($exploded_item[1],
                                array(
                                    'span' => array(
                                        'style' => array(),
                                        'class' => array()
                                    ),
                                    'a' => array(
                                        'href' => array(),
                                        'target' => array(),
                                        'class' => array(),
                                        'style' => array(),
                                    ),
                                    'strong' => array(
                                        'style' => array(),
                                        'class' => array()
                                    ),
                                    'em' => array(
                                        'style' => array(),
                                        'class' => array()
                                    )
                                )); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>
