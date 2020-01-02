jQuery(document).ready(function($) {  
    var formfield; 

    $('.upload_image_button').click(function() {
        $('html').addClass('Image');
        formfield = $(this).prev().attr('name'); 
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        return false;
    }); 

    window.original_send_to_editor = window.send_to_editor;

    window.send_to_editor = function(html){ 
        if (formfield) { 
            fileurl = jQuery('img','<div>' + html + '</div>').attr('src'); 
            $('#'+formfield).val(fileurl);
            tb_remove();
            $('html').removeClass('Image');
            formfield = '';
        } else { 
            window.original_send_to_editor(html);
        }
    }; 
 
});