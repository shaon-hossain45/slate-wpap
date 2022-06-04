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




    $('.goJgHx').each(function(i, item) {
        const thisele = $(this).find('.music-container');
        //console.log($(this));
        var $datatemp = $(this).data('template');
        //console.log($datatemp);

        var $thisjkl555 = $(this);

        var wavcontainer = this.querySelector('.waveform-' + $datatemp);
        //console.log('.waveform-' + i);

        var wavesurfer = WaveSurfer.create({
            container: wavcontainer,
            waveColor: '#000',
            progressColor: '#fff',
            barWidth: 1,
            barHeight: 1, // the height of the wave
            barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
            responsive: true,
            hideScrollbar: true,
            barRadius: 2,
            backend: 'MediaElement'
        });

        $(this).find('button').on('click', 'i.fa-play', function() {
            //alert("play");
            wavesurfer.play();

            //console.log($(this));
            var thisjkl = $(this);


            thisjkl.closest('.music-container').addClass('play');
            thisjkl.removeClass('fa-play');
            thisjkl.addClass('fa-pause');

            // wavesurfer.on('play', function() {

            //     console.log($(this));

            //     //alert("pause");
            //     thisjkl.closest('.music-container').addClass('play');
            //     thisjkl.removeClass('fa-play');
            //     thisjkl.addClass('fa-pause');
            // });

            // wavesurfer.on('pause', function() {
            //     //alert("pause");
            //     thisjkl.closest('.music-container').removeClass('play');
            //     //$(this).find('button').children().removeClass('fa-pause');
            //     //$(this).find('button').children().addClass('fa-play');
            // });

        });

        $(this).find('button').on('click', 'i.fa-pause', function() {
            //alert("pause");
            wavesurfer.pause();

            //console.log($(this));
            var thisjkl = $(this);

            thisjkl.closest('.music-container').removeClass('play');
            thisjkl.removeClass('fa-pause');
            thisjkl.addClass('fa-play');

            // wavesurfer.on('play', function() {

            //     //console.log($(this));

            //     //alert("pause");
            //     thisjkl.closest('.music-container').addClass('play');
            //     //$(this).find('button').children().removeClass('fa-pause');
            //     //$(this).find('button').children().addClass('fa-play');
            // });

            // wavesurfer.on('pause', function() {
            //     //alert("pause");
            //     thisjkl.closest('.music-container').removeClass('play');
            //     //$(this).find('button').children().removeClass('fa-pause');
            //     //$(this).find('button').children().addClass('fa-play');
            // });

        });


        $(this).find('.bMyBW').on("click", function() {
            $(this).toggleClass("newjkl");
            $(this).closest('.styledes__ComponentWrapper-sc-1uhtj7h-0').children("input").attr("aria-checked", "true");
            //console.log($(this).closest('.styledes__ComponentWrapper-sc-1uhtj7h-0').children("input").val());
        });

        wavesurfer.on('finish', function() {
            //alert("pause");
            var thisjkl = $(this);
            $thisjkl555.find('.music-container').removeClass('play');
            //$(this).find('button').children().removeClass('fa-pause');
            //$(this).find('button').children().addClass('fa-play');
        });

        const audio = this.querySelector('.audio' + $datatemp);

        //console.log(audio);

        wavesurfer.load(audio.getAttribute("src"));


        $('.Boxes__Box-sc-c98zp8-0[role="button"]').click(function() {
            //alert("taber");

            $(this).closest(".pzTSG").find('.Boxes__Box-sc-c98zp8-0[role="button"]').removeClass('bwrXcM');
            $(this).addClass("bwrXcM");

            var tabdata = $(this).attr("data-id");
            $(this).closest(".pzTSG").next('.tab-container').find(".dTIbbW").removeClass("active");
            var jkl = $(this).closest(".pzTSG").next('.tab-container').find(".dTIbbW[data-id='" + tabdata + "']").addClass("active");

            $(this).closest('.enePwt').find("input[type='checkbox']").attr("aria-checked", "true");
            $(this).closest('.enePwt').find(".bMyBW").addClass("newjkl");

            //console.log(jkl);
            // $(".dTIbbW.dTIbbW[data-id='" + $(this).attr('aria-pressed') + "']").addClass("active");
            //$(".tab-a").removeClass('active-a');
            //$(this).parent().find(".tab-a").addClass('active-a');
        });

    });

})(jQuery);