<?php

//Public functions:
//anps_create_text_option
//anps_create_color_option
//anps_create_number_option
//anps_create_checkbox
//anps_create_select
//anps_get_sidebars_array
//anps_create_upload

class AnpsFramework {
    protected $prefix='anps_';

    protected function set_option($arr=array(), $option_name=null) {
        $arr_save=array();

        foreach($arr as $name=>$value) {
            if($option_name=='google_fonts') {
                $arr_save[] = array('value'=>urlencode($value['family']), 'name'=>$value['family'], 'variants'=>$value['variants'], 'subsets'=>$value['subsets']);
            } else {
                $arr_save[] = array('value'=>$value, 'name'=>$name);
            }
        }
        update_option($this->prefix.$option_name, $arr_save);
    }

    /* Create simple text inputbox */
    /**
     * @param $option (wp database option name)
     * @param $label
     * @param description
     **/
    public function anps_create_text_option($option, $label="", $description="") {
        $output = "";
        if ($label!="") {
            $output .= "<label for='".$option."'>".$label."</label>";
        }
        $output .= "<input type='text' value='".stripslashes(htmlentities(get_option($option)))."' name='".$option."' id='".$option."'>";

        if ($description!="") {
            $output .= "<p>".$description."</p>";
        }

        echo wp_kses($output, array(
            'label' => array(
                'for' => array()
            ),
            'input' => array(
                'type' => array(),
                'value' => array(),
                'name' => array(),
                'id' => array()
            ),
            'p' => array()
        ));
    }

    /* Add colorpicker */
    /**
     * creates a color picker option.
     * @param  string $option_name
     * @param  string $hex         color value
     * @param  string $label       short explanation text for the user
     * @param  string $description text below the color picker (optional)
     * @return html ouutput
     */
    public function anps_create_color_option($option_name, $hex, $label, $description="") {
        //Return nothing, if input data is missing
        if (!isset($option_name, $hex, $label)) {return;}

        //get data from database
        $color_option = get_option($option_name, $hex);

        //create output
        $output = "<div class='color-input'><label for='$option_name'>$label</label>";
        $output .= "<input data-value='$color_option' class='color-pick-color' readonly>";
        $output .= "<input class='color-pick' type='text' name='$option_name' value='$color_option' id='$option_name'></div>";

        //optional description
        if($description != "") {
            $output .= "<p>$description</p>";
        }
        echo wp_kses($output, array(
            'div' => array(
                'class'=>array()
            ),
            'label' => array(
                'for' => array()
            ),
            'input' => array(
                'data-value' => array(),
                'style' => array(),
                'class' => array(),
                'readonly' => array(),
                'type' => array(),
                'name' => array(),
                'value' => array(),
                'id' => array()
            ),
            'p' => array()
        ));
    }

    /**
     * Create a number input type
     * @param  string $option_name
     * @param  int $number      default value
     * @param  string $label       short explanation text for the user
     * @param  string $units       (ie: 'px')
     * @param  HTML output
     */
    public function anps_create_number_option($option_name, $number="", $label="", $units="", $description="") {
        //Return nothing, if input data is missing
        if (!isset($option_name)) {return;}

        $option = get_option($option_name, $number);

        $output = "<div class='anps-number'>";
        if($label!="") {
            $output .= "<label for='$option_name'>$label</label>";
        }
        $output .= "<input class='size' type='number' name='$option_name' value='$option' id='$option_name' placeholder='$number'/><span>$units</span></div>";

        //optional description
        if($description != '') {
            $output .= "<p>$description</p>";
        }
        echo wp_kses($output, array(
            'div' => array(
                'class' => array()
            ),
            'label' => array(
                'for' => array()
            ),
            'input' => array(
                'class' => array(),
                'type' => array(),
                'name' => array(),
                'value' => array(),
                'id' => array(),
                'placeholder' => array()
            ),
            'span' => array(),
            'p' => array()
        ));
    }

    /**
     * create a checkbox option
     * @param  string $option
     * @param  string $label   short explanation text for the user
     * @param  bolean $default default value (true false)
     * @return HTML output
     */
    public function anps_create_checkbox ($option, $label="", $default="") {
        $ischecked = checked(get_option($option, $default), '1', false);
        $output = '<div class="anps-checkbox">';
        $output .= "<label for='".$option."'>".$label."</label>";
        $output .= "<input id='hidden-".$option."' type='hidden' value='' name='".$option."'/>";
        $output .= "<input value='1' id='".$option."' type='checkbox' name='".$option."' ".$ischecked."/>";
        $output .= '</div>';
        echo wp_kses($output, array(
            'div' => array(
                'class' => array()
            ),
            'label' => array(
                'for' => array()
            ),
            'input' => array(
                'class' => array(),
                'type' => array(),
                'name' => array(),
                'value' => array(),
                'id' => array(),
                'checked'=>array()
            ),
        ));
    }

    /**
     * Create radio option
     * @param  string $option
     * @param  array $radio_array    array of radio options
     * ie:
     $radiooptions = array (
        '1' => array (
            'label' => 'classic',
            'image' => 'top-background-menu.jpg',
            'value' => 'classic',
            ),
        '2' => array (
            'label' => 'abovemenu',
            'image' => 'top-transparent-menu.jpg',
            'value' => 'abovemenu',
            ),
        '3' => array (
            'label' => 'bellowmenu',
            'image' => 'bottom-transparent-menu.jpg',
            'value' => 'bellowmenu',
            ),
        '4' => array (
            'label' => 'vertical',
            'image' => 'bottom-transparent-menu.jpg',
            'value' => 'vertical',
            )
     )
     * @param  string $grid_class    bootstrap grid class (optional)
     * @param  bolean $toggleoptions set to true if you want to hide/show something based on the chosen radio value
     * @param  string $label         short explanation text for the user
     * @param  string $default        default value
     * @param  bolean $clearfix       bootstrap clearfix class
     */
    public function anps_create_radio ($option, $radio_array, $grid_class="", $toggleoptions=false, $label="", $default="", $clearfix=false) {
        $class= "anps-radio";
        if ($toggleoptions == "true") { $class .= " toggleoptions"; }
        if ($clearfix == "true") { $class .= " clearfix"; }

        $output = "<div class='".$class."'>";

        $output .= "<p>".$label."</p>";

        foreach ($radio_array as $index => $option_array) {

            $output.= "<label class='".$grid_class."' data-show='".$index."'>";
                foreach ($option_array as $key => $value) {
                    if ($key == "label") {
                        $output .= "<p>".$value."</p>";
                    }
                    if ($key == "imgbefore") {
                        $output .= $value;
                    }
                    if ($key == "image") {
                        $output .= "<img src='".get_template_directory_uri()."/anps-framework/images/".$value."'/>";
                    }
                    if ($key == "imgafter") {
                        $output .= $value;
                    }
                    if ($key == "value") {
                        $ischecked = checked(get_option($option, $default), $value, false);
                        $output .="<input type='radio' name=".$option." value=".$value." ".$ischecked.">";
                    }
                }
            $output.= '</label>';
        }
        $output .= '</div>';
        echo wp_kses($output, array(
            'div' => array(
                'class' => array()
            ),
            'p' => array(
            ),
            'label' => array(
                'data-show' => array(),
                'class' => array()
            ),
            'img' => array(
                'src' => array(),
            ),
            'input' => array(
                'type' => array(),
                'name' => array(),
                'value' => array(),
                'checked' => array()
            )
        ));
    }

    /**
     * Create select options
     * @param  string $option
     * @param  array  $optionArray   array of select options ie:
     *                               $optionArray = array('style-1'=>'Style 1', 'style-2'=>'Style 2', 'style-3'=>'Style 3');
     * @param  string $label         short explanation text for the user
     * @param  string $default_val   default value
     * @param  string $remove_option should there be an option to unselect the value?
     * @param  string $dafault_title remove option friendly name
     */
    public function anps_create_select ($option, $optionArray, $label='', $default_val='', $remove_option='0', $dafault_title = '') {
        if ($dafault_title == '') {
            $dafault_title = esc_html__('*** Select ***', 'industrial');
        }

        $output = '<div class="anps-select">';
        if (isset($label) && $label !='') {
            $output .= "<label for='$option'>$label</label>";
        }
        $output .= "<select name='$option' id='$option'>";
        if($remove_option=='0') {
            $output .= "<option value='0'>$dafault_title</option>";
        }
        foreach ($optionArray as $key => $value) {
            if(get_option($option, $default_val)==$key) { $selected = ' selected'; } else {$selected = '';}
            $output .="<option value='$key'$selected>$value</option>";
        }
        $output .= '</select></div>';
        echo wp_kses($output, array(
            'div' => array(
                'class' => array()
            ),
            'label' => array(
                'for' => array()
            ),
            'select' => array(
                'name' => array(),
                'id' => array()
            ),
            'option' => array(
                'value' => array(),
                'selected' => array()
            )
        ));
    }

    /**
     * @return sidebars array to add into select field
     */
    public function anps_get_sidebars_array() {
        global $wp_registered_sidebars;
        $anps_sidebars = array();

        foreach ($wp_registered_sidebars as $value) {
            $anps_sidebars[$value['id']] = $value['name'];
        }
        return $anps_sidebars;
    }

    /**
     * @return pages array to add into select field
     */
    public function anps_get_pages_array() {
        $pages = get_pages();
        $anps_pages = array();

        foreach ($pages as $page) {
            $anps_pages[$page->ID] = $page->post_title;
        }
        return $anps_pages;
    }

    /**
     * create an upload option
     * @param  string  $option      database option name
     * @param  string  $label       short explanation text for the user
     * @param  boolean $preview     image preview toggle
     * @param  string  $description text below the color picker (optional)
     * @return HTML output
     */
    public function anps_create_upload($option, $label="", $preview=true, $description="") {

        $output = '<div class="anps_upload">';

        if ($label!="") {
            $output .= "<label for='".$option."'>".$label."</label>";
        }


        $output .= "<input id='".$option."' type='text' name='".$option."' value='".get_option($option) ."'>";
        $output .= "<input class='upload_image_button' type='button' value='&#xf0ee;'>";

        //image preview (optional)
        if ($preview) {
            $imgclass = '';
            if (get_option($option, '')=='') {
                $imgclass = " hidden";
            }
            $output .= "<div class='preview-img".$imgclass."'><img src='". get_option($option, '')."'></div>";
        }

        if ($description!="") {
            $output .= "<p>". $description ."</p>";
        }
        $output .= "</div>";

        echo wp_kses($output, array(
            'div' => array(
                'class' => array()
            ),
            'label' => array(),
            'img' => array(
                'src' => array()
            ),
            'input' => array(
                'id' => array(),
                'type' => array(),
                'name' => array(),
                'value' => array(),
                'class' => array()
            ),
            'p' => array()
        ));
    }

/**
 * creates demo content options from array
 * @param  $dummy_array (check example below)
 * @return HTML output
*/
/*
example dummy_array
      $dummy_array = array (
        'dummy1' => array (
            'image' => 'demoimport_screen.jpg',
            'title' => 'The ultimate demo',
            'link'  => 'http://google.com'
        ),
        'dummy2' => array (
            'image' => 'demoimport_screen.jpg',
            'title' => 'Demo two',
            'link'  => 'http://google.com'
        ),
        'dummy2' => array (
            'image' => 'demoimport_screen.jpg',
            'title' => 'Demo two',
            'link'  => 'http://google.com'
        )
     );
 */
    public function anps_create_dummy_options($dummy_array) {
        if ( !is_array($dummy_array) ) {
            return;
        }

        $imported_class= "";
        if (get_option('anps_dummy')==1) {
            $imported_class = 'already-imported';
        }

        $output = '<div class="dummy-options '.$imported_class.'">';
        foreach ($dummy_array as $dummy => $key) {
            $output .= '<div class="col-md-6 dummy" id="dummy-'.$dummy.'">';

                if (isset($key['image'])) {
                    $output .= "<img src='" . get_template_directory_uri() . "/anps-framework/images/" . $key['image'] . "' />";
                }

                if (isset($key['title'])) {
                    $output .= "<h4>".$key['title']."</h4>";
                }

                $output .= '<footer>';
                    $output .= '<input type="submit" class="dummy" name="'.$dummy.'" value="'.esc_html__('Insert demo content','industrial').'" />';

                    if (isset($key['link'])) {
                       $output .= '<a href="'.$key['link'].'" target="_blank">'.esc_html__('Launch demo preview', 'industrial') .'</a>';
                    }

                $output .= '</footer>';

            $output .= '</div>';
        }
        $output .= '</div>';

        $output .='<div class="absolute fullscreen importspin">';
        $output .='<div class="table">';
        $output .='<div class="table-cell center">';
        $output .='<div class="messagebox">';
        $output .='<i class="fa fa-cog fa-spin font-size-30"></i>';
        $output .='<h2><strong>' . esc_html__('Import might take some time, please be patient', 'industrial') . '</strong></h2>';
        $output .='</div></div></div></div>';

        echo wp_kses($output, array(
            'div' => array(
                'class' => array(),
                'id' => array()
            ),
            'img' => array(
                'src' => array(),
            ),
            'footer' => array(),
            'h2' => array(),
            'h4' => array(),
            'strong' => array(),
            'input' => array(
                'type' => array(),
                'class' => array(),
                'name' => array(),
                'value' => array()
            ),
            'a' => array(
                'href' => array(),
                'target' => array()
            ),
            'i' => array(
                'class' => array(),
                'style' => array()
            )
        ));
    }

    public function anps_create_textarea($name, $value='', $rows=5, $description='') {
        if(!isset($name)){return;}
        $output = '';
        $output .= '<div class="anps-textarea">';
        $output .= "<textarea id='$name' name='$name' rows='$rows'>";
        $output .= $value;
        $output .= '</textarea>';
        $output .= '</div>';
        echo wp_kses($output, array(
            'div' => array(
                'class' => array()
            ),
            'textarea' => array(
                'name' => array(),
                'id' => array(),
                'rows' => array()
            )
        ));
    }

    /* Save button */
    public function anps_save_button() {
        $output = '';
        $output .= '<div class="fixsave"><button type="submit">' . esc_html__('Save', 'industrial') . '<i class="fa fa-floppy-o"></i></button></div>';
        $output .= '<button type="submit" class="bottom-save absolute"><i class="fa fa-floppy-o"></i>' . esc_html__('Save all changes', 'industrial') . '</button>';
        echo wp_kses($output, array(
            'div' => array(
                'class' => array(),
            ),
            'button' => array(
                'type' => array(),
                'class' => array(),
            ),
            'i' => array(
                'class' => array()
            )
        ));
    }
}
