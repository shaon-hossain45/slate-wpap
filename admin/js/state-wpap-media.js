(function($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    // Instantiates the variable that holds the media library frame.

    // Runs when the image button is clicked.


    $('a.csf--button').on('click', function(e) {
        //alert("hi kjkjk");
        // Prevents the default action from occuring.
        e.preventDefault();

        var $upload_button = $(this),
            $library = $upload_button.data('library') && $upload_button.data('library').split(',') || '',
            media_frame;

        //console.log(window.wp);
        if (typeof window.wp === 'undefined' || !window.wp.media || !window.wp.media.gallery) {
            return;
        }
        // If the frame already exists, re-open it.
        if (media_frame) {
            media_frame.open();
            return;
        }

        // Sets up the media library frame
        media_frame = wp.media.frames.media_frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Choose File'
            },
            library: { type: 'audio' },
            multiple: false // Set to true to allow multiple files to be selected
        });

        // Runs when an image is selected.
        media_frame.on('select', function() {

            if ($library.length && $library.indexOf(attributes.subtype) === -1 && $library.indexOf(attributes.type) === -1) {
                return;
            }

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = media_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $upload_button.parent().find('.csf--url').val(media_attachment.url).trigger('change');
            $upload_button.closest('.csf-placeholder').find('.csf--remove').removeClass('hidden');
        });

        // Opens the media library frame.
        media_frame.open();
    });



    $('a.csf--remove').on('click', function(e) {

        //alert("hiii");

        // Prevents the default action from occuring.
        e.preventDefault();

        var $remove_button = $(this);

        //$remove_button.closest('.csf-fieldset').find('.csf--preview').addClass('hidden');
        $remove_button.closest('.csf-placeholder').find('input').val('');
        $remove_button.addClass('hidden');
        $remove_button.closest('.csf-placeholder').find('.csf--remove').addClass('hidden');
        $remove_button.closest('.csf-placeholder').find('.csf--url').trigger('change');

    });

})(jQuery);


//
// Field: media
//
// $.fn.csf_field_media = function() {
//     return this.each(function() {

//         var $this = $(this),
//             $upload_button = $this.find('.csf--button'),
//             $remove_button = $this.find('.csf--remove'),
//             $library = $upload_button.data('library') && $upload_button.data('library').split(',') || '',
//             $auto_attributes = ($this.hasClass('csf-assign-field-background')) ? $this.closest('.csf-field-background').find('.csf--auto-attributes') : false,
//             wp_media_frame;

//         $upload_button.on('click', function(e) {

//             e.preventDefault();

//             if (typeof window.wp === 'undefined' || !window.wp.media || !window.wp.media.gallery) {
//                 return;
//             }

//             if (wp_media_frame) {
//                 wp_media_frame.open();
//                 return;
//             }

//             wp_media_frame = window.wp.media({
//                 library: {
//                     type: $library
//                 }
//             });

//             wp_media_frame.on('select', function() {

//                 var thumbnail;
//                 var attributes = wp_media_frame.state().get('selection').first().attributes;
//                 var preview_size = $upload_button.data('preview-size') || 'thumbnail';

//                 if ($library.length && $library.indexOf(attributes.subtype) === -1 && $library.indexOf(attributes.type) === -1) {
//                     return;
//                 }

//                 $this.find('.csf--id').val(attributes.id);
//                 $this.find('.csf--width').val(attributes.width);
//                 $this.find('.csf--height').val(attributes.height);
//                 $this.find('.csf--alt').val(attributes.alt);
//                 $this.find('.csf--title').val(attributes.title);
//                 $this.find('.csf--description').val(attributes.description);

//                 if (typeof attributes.sizes !== 'undefined' && typeof attributes.sizes.thumbnail !== 'undefined' && preview_size === 'thumbnail') {
//                     thumbnail = attributes.sizes.thumbnail.url;
//                 } else if (typeof attributes.sizes !== 'undefined' && typeof attributes.sizes.full !== 'undefined') {
//                     thumbnail = attributes.sizes.full.url;
//                 } else if (attributes.type === 'image') {
//                     thumbnail = attributes.url;
//                 } else {
//                     thumbnail = attributes.icon;
//                 }

//                 console.log(attributes);

//                 if ($auto_attributes) {
//                     $auto_attributes.removeClass('csf--attributes-hidden');
//                 }

//                 $remove_button.removeClass('hidden');

//                 $this.find('.csf--preview').removeClass('hidden');
//                 $this.find('.csf--src').attr('src', thumbnail);
//                 $this.find('.csf--thumbnail').val(thumbnail);
//                 $this.find('.csf--url').val(attributes.url).trigger('change');

//             });

//             wp_media_frame.open();

//         });

//         $remove_button.on('click', function(e) {

//             e.preventDefault();

//             if ($auto_attributes) {
//                 $auto_attributes.addClass('csf--attributes-hidden');
//             }

//             $remove_button.addClass('hidden');
//             $this.find('input').val('');
//             $this.find('.csf--preview').addClass('hidden');
//             $this.find('.csf--url').trigger('change');

//         });

//     });

// };