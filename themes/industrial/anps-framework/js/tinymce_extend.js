(function() {
    tinymce.create('tinymce.plugins.anps', {
        init : function(editor, url) {
            editor.addButton('dropcap', {
                title : 'Dropcap',
                cmd : 'dropcap',
                image : url.replace('/js', '/images/dropcap.png'),
                onPostRender: function() {
                    var cm = this;
                    editor.on('NodeChange', function(e) {
                        cm.active(e.element.className == 'dropcap');
                    });
                }
            });

            editor.addCommand('dropcap', function() {
                var selectedText = editor.selection.getContent();
                var returnText = '';
                var selectedHTML = jQuery(editor.selection.getNode()).text();

                if( editor.selection.getNode().className != 'dropcap' ) {
                    returnText = '<span class="dropcap">' + selectedText + '</span>';
                } else {
                    returnText = selectedHTML;
                }

                editor.execCommand('mceInsertContent', 0, returnText);
            });
        },
    });
    // Register plugin
    tinymce.PluginManager.add( 'anps', tinymce.plugins.anps );
})();