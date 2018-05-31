jQuery(document).ready(function($) {

    var menu_upload_image;
    
    $('.add_image_button').unbind('click').live('click', function(e) {
 
        e.preventDefault();

        var row = $(this).closest('.image-part');    
        var menu_upload_image = parseInt(menu_upload_image);

 
        //If the uploader object has already been created, reopen the dialog
        if (menu_upload_image) {
            menu_upload_image.open();
            return;
        }
 
        //Extend the wp.media object
        menu_upload_image = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        menu_upload_image.on('select', function() {
            attachment = menu_upload_image.state().get('selection').first().toJSON();

            $(row).find('.image_save').val(attachment.url).trigger('change');
            $(row).find('.image-preview').attr('src',attachment.sizes.hlm_sports_20x20.url).trigger('change');
        });
        //Open the uploader dialog
        menu_upload_image.open();

    });
            
});