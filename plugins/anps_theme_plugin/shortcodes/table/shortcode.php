<?php
/* Table */
if(!function_exists('anps_table_func')) {
    function anps_table_func( $atts,  $content ) {
        extract( shortcode_atts( array(
                'striped' => '',
                'bordered' => '',
                'head_style' => ''
            ), $atts ) );
        $striped_class = '';
        if($striped) {
            $striped_class = ' table-striped';
        }
        $bordered_class = '';
        if($bordered) {
            $bordered_class = ' table-bordered';
        }
        if($head_style) {
            $content = str_replace('[table_head]', '[table_head class="bg-primary"]', $content);
        }
        return "<div class='table-responsive'><table class='table$striped_class$bordered_class'>".do_shortcode($content)."</table></div>";
    }
}
//thead
if(!function_exists('anps_table_thead_func')) {
    function anps_table_thead_func( $atts,  $content ) {
        extract( shortcode_atts( array(
                'class' => ''
            ), $atts ) );
        $head_class = '';
        if($class) {
            $head_class = " class='$class'";
        }
        return "<thead $head_class>".do_shortcode($content)."</thead>";
    }
}
//tbody
if(!function_exists('anps_table_tbody_func')) {
    function anps_table_tbody_func( $atts,  $content ) {
        return "<tbody>".do_shortcode($content)."</tbody>";
    }
}
//tfoot
if(!function_exists('anps_table_tfoot_func')) {
    function anps_table_tfoot_func( $atts,  $content ) {
        return "<tfoot>".do_shortcode($content)."</tfoot>";
    }
}
//data row
if(!function_exists('anps_table_row_func')) {
    function anps_table_row_func( $atts,  $content ) {
        return "<tr>".do_shortcode($content)."</tr>";
    }
}
//data column
if(!function_exists('anps_table_td_func')) {
    function anps_table_td_func( $atts,  $content ) {
        return "<td>".do_shortcode($content)."</td>";
    }
}
//data head column
if(!function_exists('anps_table_th_func')) {
    function anps_table_th_func( $atts,  $content ) {
        return "<th>".do_shortcode($content)."</th>";
    }
}
/* END Table */
/* Load shortcodes */
add_shortcode('table', 'anps_table_func');
add_shortcode('table_head', 'anps_table_thead_func');
add_shortcode('table_body', 'anps_table_tbody_func');
add_shortcode('table_foot', 'anps_table_tfoot_func');
add_shortcode('table_row', 'anps_table_row_func');
add_shortcode('table_cell', 'anps_table_td_func');
add_shortcode('table_heading_cell', 'anps_table_th_func');