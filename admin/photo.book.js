jQuery(document).ready(function($) {
    var wcp_photo_book;
     
    jQuery('.upload_image_button').live('click', function( event ){
     
        event.preventDefault();
     
        // var parent = jQuery(this).closest('.tab-content').find('.thumbs-prev');
        // Create the media frame.
        wcp_photo_book = wp.media.frames.wcp_photo_book = wp.media({
          title: 'Select Pages for Photo Book',
          button: {
            text: 'Add',
          },
          multiple: true  // Set to true to allow multiple files to be selected
        });
     
        // When an image is selected, run a callback.
        wcp_photo_book.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            var selection = wcp_photo_book.state().get('selection');
            selection.map( function( attachment ) {
                attachment = attachment.toJSON();
                jQuery('.thumbs-prev').append('<div><img src="'+attachment.url+'"><span class="dashicons dashicons-dismiss"></span></div>');

            });  
        });
     
        // Finally, open the modal
        wcp_photo_book.open();
    });
    jQuery('.thumbs-prev').on('click', '.dashicons-dismiss', function() {
        jQuery(this).parent('div').remove();
    });
    jQuery(".thumbs-prev").sortable({
      placeholder: "ui-state-highlight"
    });

    jQuery('form').submit(function(event) {
        var pages = [];

        jQuery(this).find('.thumbs-prev div').each(function(index) {
            pages.push(jQuery(this).find('img').attr('src'));
        });
        jQuery('.wcp_photo_images').val(JSON.stringify(pages));
    }); 
});