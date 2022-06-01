(function($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
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

    var wavesurfer = WaveSurfer.create({
        container: document.querySelector('#waveform'),
        waveColor: '#000',
        progressColor: '#fff',
        barWidth: 1,
        barHeight: 1, // the height of the wave
        barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
        responsive: true,
        hideScrollbar: true,
        barRadius: 2
    });

    const playBtnnnn = document.getElementById('playpause');
    playBtnnnn.onclick = function() {
        wavesurfer.playPause();
        //document.getElementById('music-container').classList.toggle('play');
    }

    const audio = document.getElementById('audio');
    wavesurfer.load(audio.getAttribute("src"));

    // wavesurfer.on('finish', function() {
    //     alert("start");
    //     //wavesurfer.params.container.style.opacity = 0.9;
    // });

    // wavesurfer.on('ready', function() {
    //     wavesurfer.play();
    // });


    $('.Boxes__Box-sc-c98zp8-0[role="button"]').click(function() {
        alert("taber");

        $('.Boxes__Box-sc-c98zp8-0[role="button"]').removeClass('bwrXcM');
        $(this).addClass("bwrXcM");
        //$(".tab[data-id='" + $(this).attr('aria-pressed') + "']").addClass("tab-active");
        //$(".tab-a").removeClass('active-a');
        //$(this).parent().find(".tab-a").addClass('active-a');
    });

})(jQuery);