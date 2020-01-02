jQuery(document).ready(function( $ ) {
	$(".admin-patern-select img").bind("click", function() {
		$(".admin-patern-radio input").eq($(this).index()).click();
		
		$(".admin-patern-select img").removeAttr("id");
		$(this).attr("id", "selected-pattern");
		
		if ( $(this).index() == 0 ) {
			$("#patern-type-wrapper, #custom-patern-wrapper").show();
		} else {
			$("#patern-type-wrapper, #custom-patern-wrapper").hide();
		}
		
	});

    /* Pattern change */
    $('.admin-patern-select, #patern-type-wrapper').on('click', function(){
        anps_pattern_color_visibility()
    })

    /* Toggle */
    $('#anps_is_boxed').on('click', function(){
        anps_boxed_toggle()
    })

    anps_boxed_toggle()

    function anps_pattern_color_visibility() {
        if ($('.admin-patern-select > img:first-child').is('#selected-pattern')) {
            if ($('#back-type-custom-color').is(':checked')) {
                $('#custom-background-color-wrapper').show();
                $('#custom-patern-wrapper').hide();
            } else {
                $('#custom-background-color-wrapper').hide();
                $('#custom-patern-wrapper').show();
            } 
        } else  {
            $('#custom-patern-wrapper, #custom-background-color-wrapper').hide();
        }
    }

    function anps_boxed_toggle() {
        if ($('#anps_is_boxed').is(':checked')) {
            $('.boxed-wrapper').show();
            anps_pattern_color_visibility()
        } else  {
            $('.boxed-wrapper').hide();
        }
    }
});