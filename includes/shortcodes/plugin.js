(function () {
    tinymce.PluginManager.add('ucf_com_shortcodes_key', function (editor, url){

        // Add a button that opens a window
        editor.addButton('ucf_com_shortcodes_key', {
            title: 'Custom UCF Shortcodes',
            text: 'Shortcodes',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    title: 'Image Boxes image layout',
                    text: 'Image Boxes',
                    icon: 'icon dashicons-format-image', // video icon
                    onclick: function(){
                        editor.insertContent('[image_boxes]');
                    }
                },
                {
                    title: 'Accordion layout',
                    text: 'Accordion',
                    icon: 'icon dashicons-format-image', // video icon
                    onclick: function(){
                        editor.insertContent('[accordion]');
                    }
                },
            ]


        });


    });


})();