/**
 * Meta Box Image Upload
 */

jQuery(document).ready(function($) {
    
    $('.upload_image_button').click(function(e) {
        e.preventDefault();
        
        var button = $(this);
        var inputField = button.prev('input');
        
        var mediaUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });
        
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            inputField.val(attachment.url);
            
            var preview = inputField.parent().find('img');
            if (preview.length) {
                preview.attr('src', attachment.url);
            } else {
                inputField.parent().append(
                    '<p><img src="' + attachment.url + '" style="max-width: 300px; height: auto; display: block; margin-top: 10px;"></p>'
                );
            }
        });
        
        mediaUploader.open();
    });
    
});