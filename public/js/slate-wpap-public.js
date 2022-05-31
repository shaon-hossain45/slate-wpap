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
        waveColor: '#dde5ec',
        progressColor: '#000000',
        barWidth: 4,
        barHeight: 1, // the height of the wave
        barGap: null, // the optional spacing between bars of the wave, if not provided will be calculated in legacy format
        responsive: true,
        hideScrollbar: true,
        barRadius: 4
    });

    const playBtnnnn = document.getElementById('play');
    playBtnnnn.onclick = function() {
        wavesurfer.playPause();
    }


    wavesurfer.load('../wp-content/plugins/slate-wpap/public/music/summer.mp3');


    $('.Boxes__Box-sc-c98zp8-0[role="button"]').click(function() {
        alert("taber");

        $('.Boxes__Box-sc-c98zp8-0[role="button"]').removeClass('bwrXcM');
        $(this).addClass("bwrXcM");
        //$(".tab[data-id='" + $(this).attr('aria-pressed') + "']").addClass("tab-active");
        //$(".tab-a").removeClass('active-a');
        //$(this).parent().find(".tab-a").addClass('active-a');
    });

    // const musicContainer = document.getElementById('music-container');
    // const playBtn = document.getElementById('play');
    // // const prevBtn = document.getElementById('prev');
    // // const nextBtn = document.getElementById('next');

    // const audio = document.getElementById('audio');
    // const progress = document.getElementById('progress');
    // const progressContainer = document.getElementById('progress-container');
    // const title = document.getElementById('title');
    // const cover = document.getElementById('cover');
    // //const currTime = document.querySelector('#currTime');
    // //const durTime = document.querySelector('#durTime');

    // // Song titles
    // //const songs = ['hey', 'summer', 'ukulele'];

    // // Keep track of song
    // //let songIndex = 1;

    // // Initially load song details into DOM
    // //loadSong(songs[songIndex]);

    // //console.log(songs[songIndex]);

    // loadSong();

    // // Update song details
    // function loadSong(song) {
    //     title.innerText = audio.getAttribute("src").split('/').pop().substring(0, 20);
    //     audio.src = audio.getAttribute("src");
    //     //console.log(audio.src);
    //     cover.src = cover.getAttribute("src");
    // }

    // // Play song
    // function playSong() {
    //     musicContainer.classList.add('play');
    //     playBtn.querySelector('i.fas').classList.remove('fa-play');
    //     playBtn.querySelector('i.fas').classList.add('fa-pause');

    //     audio.play();
    // }

    // // Pause song
    // function pauseSong() {
    //     musicContainer.classList.remove('play');
    //     playBtn.querySelector('i.fas').classList.add('fa-play');
    //     playBtn.querySelector('i.fas').classList.remove('fa-pause');

    //     audio.pause();
    // }

    // // Previous song
    // function prevSong() {
    //     songIndex--;

    //     if (songIndex < 0) {
    //         songIndex = songs.length - 1;
    //     }

    //     loadSong(songs[songIndex]);

    //     playSong();
    // }

    // // Next song
    // function nextSong() {
    //     songIndex++;

    //     if (songIndex > songs.length - 1) {
    //         songIndex = 0;
    //     }

    //     loadSong(songs[songIndex]);

    //     playSong();
    // }

    // // Update progress bar
    // function updateProgress(e) {
    //     const { duration, currentTime } = e.srcElement;
    //     const progressPercent = (currentTime / duration) * 100;
    //     progress.style.width = `${progressPercent}%`;
    // }

    // // Set progress bar
    // function setProgress(e) {
    //     const width = this.clientWidth;
    //     const clickX = e.offsetX;
    //     const duration = audio.duration;

    //     audio.currentTime = (clickX / width) * duration;
    // }

    //get duration & currentTime for Time of song
    // function DurTime(e) {
    //     const { duration, currentTime } = e.srcElement;
    //     var sec;
    //     var sec_d;

    //     // define minutes currentTime
    //     let min = (currentTime == null) ? 0 :
    //         Math.floor(currentTime / 60);
    //     min = min < 10 ? '0' + min : min;

    //     // define seconds currentTime
    //     function get_sec(x) {
    //         if (Math.floor(x) >= 60) {

    //             for (var i = 1; i <= 60; i++) {
    //                 if (Math.floor(x) >= (60 * i) && Math.floor(x) < (60 * (i + 1))) {
    //                     sec = Math.floor(x) - (60 * i);
    //                     sec = sec < 10 ? '0' + sec : sec;
    //                 }
    //             }
    //         } else {
    //             sec = Math.floor(x);
    //             sec = sec < 10 ? '0' + sec : sec;
    //         }
    //     }

    //     get_sec(currentTime, sec);

    //     // change currentTime DOM
    //     //currTime.innerHTML = min + ':' + sec;

    //     // define minutes duration
    //     let min_d = (isNaN(duration) === true) ? '0' :
    //         Math.floor(duration / 60);
    //     min_d = min_d < 10 ? '0' + min_d : min_d;


    //     function get_sec_d(x) {
    //         if (Math.floor(x) >= 60) {

    //             for (var i = 1; i <= 60; i++) {
    //                 if (Math.floor(x) >= (60 * i) && Math.floor(x) < (60 * (i + 1))) {
    //                     sec_d = Math.floor(x) - (60 * i);
    //                     sec_d = sec_d < 10 ? '0' + sec_d : sec_d;
    //                 }
    //             }
    //         } else {
    //             sec_d = (isNaN(duration) === true) ? '0' :
    //                 Math.floor(x);
    //             sec_d = sec_d < 10 ? '0' + sec_d : sec_d;
    //         }
    //     }

    //     // define seconds duration

    //     get_sec_d(duration);

    //     // change duration DOM
    //     durTime.innerHTML = min_d + ':' + sec_d;

    // };

    // Event listeners
    // playBtn.addEventListener('click', () => {
    //     const isPlaying = musicContainer.classList.contains('play');

    //     if (isPlaying) {
    //         pauseSong();
    //     } else {
    //         playSong();
    //     }
    // });

    // Change song
    //prevBtn.addEventListener('click', prevSong);
    //nextBtn.addEventListener('click', nextSong);

    // Time/song update
    //audio.addEventListener('timeupdate', updateProgress);

    // Click on progress bar
    //progressContainer.addEventListener('click', setProgress);

    // Song ends
    //audio.addEventListener('ended', nextSong);

    //audio.addEventListener('ended', pauseSong);

    // Time of song
    //audio.addEventListener('timeupdate', DurTime);

})(jQuery);