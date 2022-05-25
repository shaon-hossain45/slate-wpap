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

    var isAudioNameValid = true;
    var isAudioDescriptionValid = true;
    var isAudioSelectValid = true;
    var isAudioSelect2Valid = true;
    var isAudioSelect3Valid = true;
    var isAudioFileValid = true;

    /**
     * Register form submit
     * @param  {[type]}    [description]
     * @return {[type]}    [description]
     */
    $(document).on('submit', 'form#editor_audio', function(e) {
        // Stop Multiple form submission
        e.preventDefault();
        //alert("Hi audio");
        /**
         * Newsletter description validation
         * @return {[type]} [description]
         */
        editorNameValid();

        function editorNameValid() {
            isAudioNameValid = true;
            var editortitle = $("#audio_title");
            var editortitleval = editortitle.val();

            if (editortitleval == "") {
                isAudioNameValid = false;
                editortitle.addClass("error");
            } else {
                editortitle.removeClass("error");
            }
        }

        /**
         * Newsletter description validation
         * @return {[type]} [description]
         */
        editorDescriptionValid();

        function editorDescriptionValid() {
            isAudioDescriptionValid = true;
            var editordescription = $("#audio_description");
            var editordescriptionval = editordescription.val();
            if (editordescriptionval == "") {
                isAudioDescriptionValid = false;
                editordescription.addClass("error");
            } else {
                editordescription.removeClass("error");
            }
        }


        /**
         * Newsletter description validation
         * @return {[type]} [description]
         */
        editorSelectValid();

        function editorSelectValid() {
            isAudioSelectValid = true;
            var editorselect = $("#audio_proorunpro option:selected");
            var editorselectval = editorselect.val();
            if (editorselectval == "") {
                isAudioSelectValid = false;
                $("#audio_proorunpro").addClass("error");
            } else {
                $("#audio_proorunpro").removeClass("error");
            }
        }

        /**
         * Newsletter description validation
         * @return {[type]} [description]
         */
        editorSelect2Valid();

        function editorSelect2Valid() {
            isAudioSelect2Valid = true;
            var editorselect = $("#audio_preset option:selected");
            var editorselectval = editorselect.val();
            if (editorselectval == "") {
                isAudioSelectValid = false;
                $("#audio_preset").addClass("error");
            } else {
                $("#audio_preset").removeClass("error");
            }
        }


        /**
         * Newsletter description validation
         * @return {[type]} [description]
         */
        editorSelect3Valid();

        function editorSelect3Valid() {
            isAudioSelect3Valid = true;
            var editorselect = $("#audio_template option:selected");
            var editorselectval = editorselect.val();
            if (editorselectval == "") {
                isAudioSelectValid = false;
                $("#audio_template").addClass("error");
            } else {
                $("#audio_template").removeClass("error");
            }
        }


        /**
         * Newsletter description validation
         * @return {[type]} [description]
         */
        editorfileValid();

        function editorfileValid() {
            isAudioFileValid = true;
            var editorfile = $("#meta-image");
            var editorfileval = editorfile.val();
            if (editorfileval == "") {
                isAudioFileValid = false;
                editorfile.addClass("error");
            } else {
                editorfile.removeClass("error");
            }
        }


        var form = $(this);
        if (isAudioDescriptionValid == true && isAudioNameValid == true && isAudioFileValid == true && isAudioSelectValid == true && isAudioSelect2Valid == true && isAudioSelect3Valid == true) {

            /**
             * Data passing to the server with ajax
             * @param  {[type]}      [description]
             * @return {[type]}      [description]
             */
            var formData = form.serialize();

            var data = {
                value: formData,
                action: pluginkll_obj.action,
                security: pluginkll_obj.security,
            };

            $.post(pluginkll_obj.ajax_url, data, function(response) {

                if (response['data']['exists']['updated'] == 'success') {
                    window.location.href = response['data']['exists']['url'];
                } else {
                    window.location.href = response['data']['exists']['url'];
                }
            }, 'json');
        } else {
            // Stop Multiple form submission
            e.preventDefault();
        }
        // Stop form submission
        return false;

    });

})(jQuery);