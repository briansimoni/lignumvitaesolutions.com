<?php
if(!function_exists('anps_alert_func')) {
    function anps_alert_func($atts, $content) {
        extract( shortcode_atts( array(
            'type' => ''
        ), $atts ) );
        wp_enqueue_script('alert');
        switch($type) {
            case "info":
                $type_class = " alert-info";
                $icon = "bell-o";
                break;
            case "danger":
                $type_class = " alert-danger";
                $icon = "exclamation";
                break;
            case "warning":
                $type_class = " alert-warning";
                $icon = "info";
                break;
            case "success":
                $type_class = " alert-success";
                $icon = "check";
                break;
            case "useful":
                $type_class = " alert-useful";
                $icon = "lightbulb-o";
                break;
            case "normal":
                $type_class = " alert-normal";
                $icon = "hand-o-right";
                break;
            case "info-2":
                $type_class = " alert-info-style-2";
                $icon = "bell-o";
                break;
            case "danger-2":
                $type_class = " alert-danger-style-2";
                $icon = "exclamation";
                break;
            case "warning-2":
                $type_class = " alert-warning-style-2";
                $icon = "info";
                break;
            case "success-2":
                $type_class = " alert-success-style-2";
                $icon = "check";
                break;
            case "useful-2":
                $type_class = " alert-useful-style-2";
                $icon = "lightbulb-o";
                break;
            case "normal-2":
                $type_class = " alert-normal-style-2";
                $icon = "hand-o-right";
                break;
        }
        return '<div class="alert'.$type_class.'">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button>
                    <i class="fa fa-'.$icon.'"></i> '.$content.'
                </div>';
    }
}
add_shortcode('alert', 'anps_alert_func');