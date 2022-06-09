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
        //var $datatemp = $(this).find('.hmYvbx').data('template');
        //console.log($datatemp);
        //var $datatemp = '0';
        var $thisjkl555 = $(this);

        //var wavcontainer = this.querySelector('.waveform-' + $datatemp);
        //console.log('.waveform-' + i);

        // var wavesurfer = WaveSurfer.create({
        //     container: wavcontainer,
        //     waveColor: '#000',
        //     progressColor: '#fff',
        //     barWidth: 1,
        //     barHeight: 1, // the height of the wave
        //     barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
        //     responsive: true,
        //     hideScrollbar: true,
        //     barRadius: 2,
        //     backend: 'MediaElement'
        // });


        var wavcontainer0 = this.querySelector('.waveform-0');
        if (wavcontainer0 != null) {

            var wavesurfer0 = WaveSurfer.create({
                container: wavcontainer0,
                waveColor: '#000',
                progressColor: '#fff',
                barWidth: 1,
                barHeight: 1, // the height of the wave
                barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
                responsive: true,
                hideScrollbar: true,
                barRadius: 2,
                //backend: 'MediaElement'
            });


            const audio0 = this.querySelector('.audio0');
            wavesurfer0.load(audio0.getAttribute("src"));

        }


        var wavcontainerp1 = this.querySelector('.waveform-p1');
        if (wavcontainerp1 != null) {

            var wavesurferp1 = WaveSurfer.create({
                container: wavcontainerp1,
                waveColor: '#000',
                progressColor: '#fff',
                barWidth: 1,
                barHeight: 1, // the height of the wave
                barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
                responsive: true,
                hideScrollbar: true,
                barRadius: 2,
                //backend: 'MediaElement'
            });


            const audiop1 = this.querySelector('.audiop1');
            wavesurferp1.load(audiop1.getAttribute("src"));

        }



        var wavcontainerp2 = this.querySelector('.waveform-p2');
        if (wavcontainerp2 != null) {
            var wavesurferp2 = WaveSurfer.create({
                container: wavcontainerp2,
                waveColor: '#000',
                progressColor: '#fff',
                barWidth: 1,
                barHeight: 1, // the height of the wave
                barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
                responsive: true,
                hideScrollbar: true,
                barRadius: 2,
                //backend: 'MediaElement'
            });

            const audiop2 = this.querySelector('.audiop2');
            wavesurferp2.load(audiop2.getAttribute("src"));
        }



        var wavcontainerp3 = this.querySelector('.waveform-p3');

        if (wavcontainerp3 != null) {
            var wavesurferp3 = WaveSurfer.create({
                container: wavcontainerp3,
                waveColor: '#000',
                progressColor: '#fff',
                barWidth: 1,
                barHeight: 1, // the height of the wave
                barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
                responsive: true,
                hideScrollbar: true,
                barRadius: 2,
                //backend: 'MediaElement'
            });

            const audiop3 = this.querySelector('.audiop3');
            wavesurferp3.load(audiop3.getAttribute("src"));

        }


        // const audio = this.querySelector('.audio' + $datatemp);
        // wavesurfer.load(audio.getAttribute("src"));

        $(this).find('button').on('click', 'i.fa-play', function() {
            //alert("play");

            var $pid = $(this).closest('.hmYvbx ').data('template');
            //alert($pid);
            if ($pid == "p1") {
                wavesurferp1.play();
            } else if ($pid == "p2") {
                wavesurferp2.play();
            } else if ($pid == "p3") {
                wavesurferp3.play();
            } else {
                wavesurfer0.play();
            }


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

            var $pid = $(this).closest('.hmYvbx ').data('template');
            //alert($pid);
            if ($pid == "p1") {
                wavesurferp1.pause();
            } else if ($pid == "p2") {
                wavesurferp2.pause();
            } else if ($pid == "p3") {
                wavesurferp3.pause();
            } else {
                wavesurfer0.pause();
            }


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


        $(this).find('.gxTSWG').on("click", function() {

            const thisby = $(this).closest('.styledes__ComponentWrapper-sc-1uhtj7h-0').children("input");
            //var vral = thisby.prop('checked');


            if (thisby.prop("checked") == true) {
                $(this).removeClass("newjkl");

                $(this).closest(".enePwt").find(".hmYvbx").addClass('hidden');
                $(this).closest(".enePwt").find(".hmYvbx[data-template='0']").removeClass('hidden');

                alert("Checkbox is checked");
            } else if (thisby.prop("checked") == false) {
                $(this).addClass("newjkl");

                $(this).closest(".enePwt").find(".hmYvbx[data-template='0']").addClass('hidden');

                //var tabdata = $(this).closest(".enePwt").find(".bwrXcM").data("id");

                //$(this).closest(".pzTSG").next('.tab-container').find(".dTIbbW[data-tab='" + tabdata + "']").removeClass("hidden");


                var tabdataid = $(this).closest(".cTsXBC").find(".bwrXcM").attr("data-id");
                //alert(tabdataid);
                $(this).closest(".enePwt").find(".hmYvbx[data-tab='" + tabdataid + "']").removeClass('hidden');

                //alert("Checkbox is unchecked");
            }



            // if (vral == true) {
            //     $(this).closest(".enePwt").find(".hmYvbx").addClass('hidden');
            //     $(this).closest(".enePwt").find(".hmYvbx[data-template='0']").removeClass('hidden');
            //     alert("original");
            // }

            //var rval = $(this).closest('.styledes__ComponentWrapper-sc-1uhtj7h-0').children("input").val();
            //console.log(ariach);
        });

        // wavesurfer.on('finish', function() {
        //     //alert("pause");
        //     var thisjkl = $(this);
        //     $thisjkl555.find('.music-container').removeClass('play');
        //     //$(this).find('button').children().removeClass('fa-pause');
        //     //$(this).find('button').children().addClass('fa-play');
        // });


        // wavesurfer.on('ready', function(e) {
        //     wavesurfer.playhead.setPlayheadTime(2.3);
        // });


        $('.Boxes__Box-sc-c98zp8-0[role="button"]').click(function() {
            //alert("taber");

            $(this).closest(".pzTSG").find('.Boxes__Box-sc-c98zp8-0[role="button"]').removeClass('bwrXcM');
            $(this).addClass("bwrXcM");


            var tabdata = $(this).attr("data-id");
            $(this).closest(".pzTSG").next('.tab-container').find(".dTIbbW").removeClass("active");
            $(this).closest(".pzTSG").next('.tab-container').find(".dTIbbW[data-id='" + tabdata + "']").addClass("active");


            //var $thisby = $(this).closest('.enePwt').find("input[type='checkbox']");



            $(this).closest(".enePwt").find(".hmYvbx").addClass('hidden');
            $(this).closest(".enePwt").find(".hmYvbx[data-tab='" + tabdata + "']").removeClass('hidden');

            // $(".dTIbbW.dTIbbW[data-id='" + $(this).attr('aria-pressed') + "']").addClass("active");
            //$(".tab-a").removeClass('active-a');
            //$(this).parent().find(".tab-a").addClass('active-a');

        });

    });

})(jQuery);