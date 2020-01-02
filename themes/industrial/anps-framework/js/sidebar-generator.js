jQuery(function($) {
	/* Add sidebar event handler */
	$('[data-sidebar="add"]').on('click', function() {
		var sidebarName = prompt($('#sbg_table').attr('data-prompt'), '');

		if( sidebarName ) {
			addSidebar(sidebarName);
		}
	});

	/* Add sidebar AJAX function */
	function addSidebar( sidebarName ) {
		$.ajax({
			url: ajaxObject.url,
			type: 'post',
			data: {
				action      : 'add_sidebar',
                security    : $('#_wpnonce').val(),
				sidebar_name: sidebarName
			},
			success: function(response) {
				response = JSON.parse(response);

				if( response.error ) {
					alert(response.error);
				} else {
					$('.no-items').remove();
					$('#sbg_table tbody').append('<tr><td data-sidebar="name">' + response.name + '</td><td data-sidebar="slug">' + response.ID + '</td><td><button data-sidebar="remove" class="remove-sidebar">' + $('#sbg_table').attr('data-remove') + '</button></td></tr>');
				}
			}
		});
	}

	/* Remove sidebar event handler */
	$('#sbg_table').on('click', '[data-sidebar="remove"]', function() {
		var name        = $(this).parents('tr').find('[data-sidebar="name"]').text(),
			slug        = $(this).parents('tr').find('[data-sidebar="slug"]').text(),
			num         = $(this).parents('tr').index(),
			confirmText = $('#sbg_table').attr('data-confirm');

		answer = confirm(confirmText.replace(/\%s/g, name));

		if (answer) {
			remove_sidebar(slug, num);
		} else {
			return false;
		}
	});

	/* Remove sidebar AJAX function */
	function remove_sidebar( sidebarSlug, rowNum ) {
		$.ajax({
			url: ajaxObject.url,
			type: 'post',
			data: {
				action      : 'remove_sidebar',
				sidebar_slug: sidebarSlug,
                security    : $('#_wpnonce').val(),
				row_num     : rowNum
			},
			success: function(response) {
				response = JSON.parse(response);

				if( response.error ) {
					alert(response.error);
				} else {
					$('#sbg_table tbody tr').eq(response.rowNum).remove();

					if( !$('#sbg_table tbody tr').length ) {
						$('#sbg_table tbody').append('<tr class="no-items"><td class="colspanchange" colspan="3">' + $('#sbg_table').attr('data-none') + '</td></tr>');
					}
				}
			}
		});
	}
});
