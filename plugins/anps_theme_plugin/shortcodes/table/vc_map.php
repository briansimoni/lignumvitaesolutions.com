<?php
//include js file
vc_add_shortcode_param('table' , 'anps_table_field', plugin_dir_url(__FILE__) . "/vc-table.js", __FILE__);
/* Custom field for Table shortcode */
function anps_table_field($settings, $value) {
    if($value == "") {
    	$value = "[table_head][table_row][table_heading_cell][/table_heading_cell][/table_row][/table_head][table_body][table_row][table_cell][/table_cell][/table_row][/table_body]";
    }
    $matches = array();
    $match_vals = array(
        'row-start' => array('[table_row]', '<tr>'),
        'row-end' => array('[/table_row]', '</tr>'),
        'heading-start' => array('[table_heading_cell]', '<th><input type="text" placeholder="' . esc_html__("Table heading", 'anps_theme_plugin') . '" value="'),
        'heading-end' => array('[/table_heading_cell]', '" /></th>'),
        'cell-start' => array('[table_cell]', '<td><input type="text" placeholder="' . esc_html__("Table cell", 'anps_theme_plugin') . '" value="'),
        'cell-end' => array('[/table_cell]', '" /></td>')
    );
    /* Get table head */
    $head = preg_match('/\[table_head\](.*?)\[\/table_head\]/s', $value, $matches);
    $head = $matches[1];
    $head = str_replace($match_vals['row-start'][0], $match_vals['row-start'][1], $head);
    $head = str_replace($match_vals['row-end'][0], $match_vals['row-end'][1], $head);
    $head = str_replace($match_vals['heading-start'][0], $match_vals['heading-start'][1], $head);
    $head = str_replace($match_vals['heading-end'][0], $match_vals['heading-end'][1], $head);
    /* Get table body */
    $body = preg_match('/\[table_body\](.*?)\[\/table_body\]/s', $value, $matches);
    $body = $matches[1];
    $body = str_replace($match_vals['row-start'][0], $match_vals['row-start'][1], $body);
    $body = str_replace($match_vals['row-end'][0], $match_vals['row-end'][1], $body);
    $body = str_replace($match_vals['cell-start'][0], $match_vals['cell-start'][1], $body);
    $body = str_replace($match_vals['cell-end'][0], $match_vals['cell-end'][1], $body);
    /* Get table foot */
    $foot = preg_match('/\[table_foot\](.*?)\[\/table_foot\]/s', $value, $matches);
    if( isset($matches[1]) ) {
    	$foot = $matches[1];
	}
    $foot = str_replace($match_vals['row-start'][0], $match_vals['row-start'][1], $foot);
    $foot = str_replace($match_vals['row-end'][0], $match_vals['row-end'][1], $foot);
    $foot = str_replace($match_vals['cell-start'][0], $match_vals['cell-start'][1], $foot);
    $foot = str_replace($match_vals['cell-end'][0], $match_vals['cell-end'][1], $foot);

    $number_of_rows = substr_count($value, '[table_row]');
    $number_of_cells = substr_count($head, '<th>');

    $data = '<input type="text" value="'.$value.'" name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-input wpb-select anps_custom_val '.$settings['param_name'].' '.$settings['type'].'" id="anps_custom_prod">';
    $data .= '<div class="anps-table-field">';
        $data .= '<div class="anps-table-field-remove-rows">';
        for($i=0;$i<$number_of_rows;$i++) {
        	if( $i == 0 ) {
        		$data .= '<button style="visibility: hidden;" title="' . esc_html__("Remove row", 'anps_theme_plugin') . '">&#215;</button>';
        	} else {
        		$data .= '<button title="' . esc_html__("Remove row", 'anps_theme_plugin') . '">&#215;</button>';
        	}
        }
        $data .= '</div>';
        $data .= '<div class="scroll-x"><table class="anps-table-field-remove-cells"><tbody><tr>';
        for($i=0;$i<$number_of_cells;$i++) {
            $data .= '<td><button title="' . esc_html__("Remove cell", 'anps_theme_plugin') . '">&#215;</button></td>';
        }
        $data .= '</tr></tbody></table>';
        $data .= '<table data-heading-placeholder="' . esc_html__("Table heading", 'anps_theme_plugin') . '" data-cell-placeholder="' . esc_html__("Table cell", 'anps_theme_plugin') . '" class="anps-table-field-vals">';
        $data .= '<thead>' . $head . '</thead>';
        $data .= '<tbody>' . $body . '</tbody>';
        //$data .= '<tfoot>' . $foot . '</tfoot>';
        $data .= '</table></div>';
        $data .= '<div class="anps-table-field-add-cells">';
            $data .= '<button title="' . esc_html__("Add cells", 'anps_theme_plugin') . '">+</button>';
        $data .= '</div>';
        $data .= '<div class="anps-table-field-add-rows">';
            $data .= '<button title="' . esc_html__("Add row", 'anps_theme_plugin') . '">+</button>';
        $data .= '</div>';
    $data .= '</div>';
    return $data;
}
/* VC Tables */
vc_map( array(
   'name' => esc_html__('Table', 'anps_theme_plugin'),
   'base' => 'table',
   'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
   'category' => 'Anps Shortcodes',
   'params' => array(
        array(
            'type' => 'table',
            'heading' => esc_html__('Content', 'anps_theme_plugin'),
            'description' => 'Table content',
            'param_name' => 'content',
            'admin_label' => false
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Striped', 'anps_theme_plugin'),
            'param_name' => 'striped',
            'admin_label' => false
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Bordered', 'anps_theme_plugin'),
            'param_name' => 'bordered',
            'admin_label' => false
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Table heading style 2', 'anps_theme_plugin'),
            'param_name' => 'head_style',
            'admin_label' => false
        )
    )
));
/* END VC Tables */