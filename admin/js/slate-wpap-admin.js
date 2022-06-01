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

    /**
     * Dependable select type
     * @param  {[type]}   [description]
     * @return {[type]}   [description]
     */
    $(function() {
        $("select#audio_proorunpro").change(function() {
            var thisby = $(this);
            var selected = thisby.children("option:selected").val();
            if (selected == "processed") {
                thisby.closest('table').find("select#audio_preset").removeAttr("disabled");
            } else {
                thisby.closest('table').find("select#audio_preset").prop("disabled", true);
            }
        }).trigger("change");
    });

})(jQuery);